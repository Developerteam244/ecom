<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use App\Models\Order;
use App\Models\Admin\User;
use App\Models\Payment;
use App\Models\Order_item;

use Validator;

class CartController extends Controller
{
    // add to cart function

    public function add_to_cart(Request $request) {





        if($request->session()->has("USER_ID")){
            $cart['user_id'] = $request->session()->get("USER_ID",0);
            $cart['user_type'] = "reg";
        }else{
            $cart['user_id']= temp_user();
            $cart['user_type'] = "non-reg";
        }

        $product_model=DB::table("products")->where([
            "slug"=>$request->post("slug"),

        ])->get();
        $attr_model=DB::table("product_attr")->where([
            "sizes.size"=>$request->post("size_id"),
            "colors.color"=>$request->post("color_id"),
            "product_attr.product_id"=>$product_model[0]->id
            ])->leftJoin('sizes','sizes.id','=','product_attr.size_id')
            ->leftJoin('colors','colors.id','=','product_attr.color_id')
        ->select("product_attr.id AS id")->get();
            $result['error'] =
            $cart['product_id'] = $product_model[0]->id;
            $cart['attr_id'] = $attr_model[0]->id;

            $cart['qty'] = $request->post('quantity');

        $cart['added_on'] = date("Y-m-d");

        $check = DB::table('cart')->where([
            "user_id"=>$cart['user_id'],
            "product_id"=>$cart['product_id'],
            "attr_id"=>$cart['attr_id'],
        ])->get();

            if (isset($check[0])) {

                $cart_model = DB::table('cart')->where([
                   "id"=>$check[0]->id
                ])->update($cart);
                $result['cart']= cart($check[0]->id);
                $result['task']= "update";
                $result['response']= "Cart Updated ";
            }else{
                $cart_model = DB::table('cart')->insertGetId($cart);
                $result['cart']= cart($cart_model);
                $result['task']= "insert";
                $result['response']= "Product Add in Cart";

            }







            return  response()->json($result);

        }


    public function delete_cart_item(Request $request) {
               $id = $request->post('id');
           $delete_cart_item = DB::table('cart')->where([
            'id'=>$id
           ])->delete();
           $result['response'] = $delete_cart_item;

        $result['res'] = $request->post('id');
            return  response()->json($result);
    }


    public function cart_quatity_update(Request $request){
            $id = $request->post('id');
            $value['qty'] = $request->post('value');
            $qty_update_model = DB::table('cart')->where([
                'id'=>$id
            ])->update($value);

            $result['status'] = $qty_update_model;
            $result['id']= $id;




            return  response()->json($result);
    }




    // checkout details
    function checkout_details(Request $request,$type) {
        if($request->session()->has("USER_ID")){
            $user_id = $request->session()->get("USER_ID",0);
            $user_type = "reg";
        }else{
            return redirect('user/login');
        }
        $user_model = User::find($user_id);
        $result['name']=$user_model->name;
        $result['mobile']=$user_model->mobile;
        $result['area']=$user_model->area;
        $result['city']=$user_model->city;
        $result['dist']=$user_model->dist;
        $result['state']=$user_model->state;
        $result['pin']=$user_model->pin;

        if ($type=='buy_now') {

            $result['buy'] = $request->all();

            $result['type'] = "buy_now";
        }else if($type=='cart'){
            $result['type'] = "cart";

        };



        return view('front.chechout_details',$result);
    }



    // checkout process;

    public function checkout_details_submit(Request $request) {

        if($request->session()->has("USER_ID")){
            $user_id = $request->session()->get("USER_ID",0);
            $user_type = "reg";
        }else{
            return redirect('user/login');
        }

                    $checkout_details_model = new Order();
                    $checkout_details_model->user_id = $user_id;
                    $checkout_details_model->name = $request->post('name');
                    $checkout_details_model->mobile = $request->post('mobile');
                    $checkout_details_model->area_point = $request->post('area_point');
                    $checkout_details_model->area = $request->post('area');
                    $checkout_details_model->lmark = $request->post('lmark');
                    $checkout_details_model->city = $request->post('city');
                    $checkout_details_model->dist = "Surguja";
                    $checkout_details_model->state = $request->post('state');
                    $checkout_details_model->pin = $request->post('pin');
                    $checkout_details_model->type = $request->post('type');
                    $checkout_details_model->order_status = "submit detail";

                    $checkout_details_model->save();
                    $order_id = $checkout_details_model->id;
                    $type = $request->post('type');

                    if ($type=="cart") {



                    $cart_model = DB::table("cart")
                        ->where([
                        'user_id'=>$user_id,
                        'user_type'=>$user_type
                                    ])
                        ->join("products","products.id","=","cart.product_id")
                        ->join("product_attr","product_attr.id","=","cart.attr_id")
                        ->select("products.id AS id","cart.qty AS qty","products.name AS name","product_attr.id AS paid","product_attr.price AS price","product_attr.image AS image")->get();
                        $result['product'] = $cart_model;
                       // $result['order_id'] = $checkout_details_model->id;

                       foreach ($cart_model as $list) {

                        $order_item_model = new Order_item();
                        $order_item_model->order_id = $order_id;
                        $order_item_model->product_id = $list->id;
                        $order_item_model->item_name = $list->name;
                        $order_item_model->qty = $list->qty;
                        $order_item_model->product_attr_id = $list->paid;
                        $order_item_model->save();


                       }
                    }elseif ($type=="buy_now"){
                        $size = $request->post('size');
                        $color = $request->post('color');
                        $slug = $request->post('slug');
                        $qty = $request->post('qty');

                        $product_model = DB::table('products')
                                            ->join('product_attr','product_attr.product_id','=','products.id')
                                            ->leftjoin('sizes','sizes.id','=','product_attr.size_id')
                                            ->leftjoin('colors','colors.id','=','product_attr.color_id')
                                            ->where([
                                                    'products.slug'=>$slug,
                                                    'sizes.size'=>$size,
                                                    'colors.color'=>$color
                                            ])
                                            ->select('products.id AS id','products.name AS name','product_attr.id AS paid')
                                            ->get();

                                            $order_item_model = new Order_item();
                                            $order_item_model->order_id = $order_id;
                                            $order_item_model->product_id = $product_model[0]->id;
                                            $order_item_model->item_name = $product_model[0]->name;
                                            $order_item_model->qty = $qty;
                                            $order_item_model->product_attr_id = $product_model[0]->paid;
                                            $order_item_model->save();
                                            $product_model[0]->qty = $qty;



                            }






                        return redirect()->route('checkout',['order_id'=>$order_id]);
                    // return view("front.checkout",$result);


    }
    // middle checkout

    public function checkout(Request $request,$id)  {
        if($request->session()->has("USER_ID")){
            $user_id = $request->session()->get("USER_ID",0);
            $user_type = "reg";
        }else{
            return redirect('user/login');
        }

            $order_item_model = Order_item::where(['order_id'=>$id])
                         ->join('product_attr','product_attr.id','=','order_items.product_attr_id')
                         ->select('order_items.item_name AS name','order_items.qty AS qty','product_attr.price AS price','product_attr.image AS image')
                        ->get();




        $result['product'] = $order_item_model;
        $result['order_id'] = $id;



        return view("front.checkout",$result);

    }

    // checkout order create

    public function checkout_order(Request $request) {

        if($request->session()->has("USER_ID")){
            $user_id = $request->session()->get("USER_ID",0);
            $user_type = "reg";
        }else{
            return redirect('user/login');
        }
        $order_id = $request->post('id');
        $order_model = Order::find($order_id);
        $order_model->order_status = "order";
        $user_id = $order_model->user_id;
        $sub_total = 0;
        $order_item_model =Order_item::where('order_id','=',$order_id)->get();
        foreach ($order_item_model as $list) {

            $product_attr_model = DB::table('product_attr')->where('id','=',$list->product_attr_id)->first();

            $sub_total += $product_attr_model->price*$list->qty;
        }





            $option['currency'] = "INR";
            $option['receipt'] = "User Order Id :".$order_id;
            $option['amount'] = $sub_total*100;


            $option['key'] = env('RAZOR_ID');
            $option['name'] = "Ecom Company";
            $option['description'] = "$order_model->name Order for $order_model->pin ";
            $option['notes'] = ['address'=>"$order_model->city Dist. $order_model->dist  $order_model->state"];
            $option['prefill'] = [
                        "name"=> $order_model->name,

                            "contact"=> $order_model->mobile
                                ];

             $order_model->save();
            $option['theme'] = ['color'=>"#3399cc"];

            $result['option']= $option;



            return response()->json($result);
    }

    public function checkout_payment(Request $request) {
        if($request->session()->has("USER_ID")){
            $user_id = $request->session()->get("USER_ID",0);
            $user_type = "reg";
        }else{
            return redirect('user/login');
        }

        $order_id = $request->post('id');
        $res = $request->post('res');

        $order_model = Order::find($order_id);
        $order_item_model = Order_item::where(['order_id'=>$order_id])->get();
        $payment_model = new Payment();
        $sub_total = 0;

        foreach ($order_item_model as $list)     {
            $product_attr_model = DB::table('product_attr')
            ->where('id','=',$list->product_attr_id)->first();
            $sub_total += $product_attr_model->price*$list->qty;
            $order_item_change_model = Order_item::where(['id'=>$list->id])
                            ->update(['price'=>$product_attr_model->price]);

            // manage the qty
            $paid = $list['product_attr_id'];
            $qty = $list['qty'];
             $product_attr_model = DB::table('product_attr')->where(['id'=>$list->product_attr_id])
             ->decrement('qty',$list->qty);

        }




        $payment_model->payment_id = $res['razorpay_payment_id'];
        $payment_model->user_id = $user_id;
        $payment_model->total =  $sub_total;
        $payment_model->save();
        $order_model->order_status = "Paid";
        $order_model->sub_total =  $sub_total;
        $order_model->pay_id =  $payment_model->id;
        $order_model->save();

        if ($order_model->type == "cart") {

            $cart_model = DB::table('cart')->where(['user_id'=>$user_id,'user_type'=>$user_type])
            ->delete();
        };


        $api_id = env("RAZOR_ID");
        $api_key = env("RAZOR_KEY");
        $api = new Api($api_id,$api_key);
        $api->payment->fetch($payment_model->payment_id)
            ->capture(array('amount'=>$sub_total*100,'currency' => 'INR'));

            $result['res'] = 'true';
        $result['response']= $request->post();

        return response()->json($result);
    }



    // checkout function







        }
