<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class FrontController extends Controller
{
    public function index() {

        $home_category_model = DB::table('categories')->where([
            'status'=>1,
        'in_home'=>1

        ])->get();

        // category

        $result['category'] = $home_category_model;

        foreach ($result['category'] as $key => $value) {

            $home_product_model = DB::table('products')->where(['category_id'=>$value->id, 'status'=>1])->get();

            $result['product'][$value->category_name]= $home_product_model;
            foreach ($home_product_model as $product_key => $product_value) {

                $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->orderBy('price','asc')->first();
                $price = $home_product_price_model->price;
                $result['product'][$value->category_name][$product_key]->price = $price;
                $mrp = $home_product_price_model->mrp;
                $result['product'][$value->category_name][$product_key]->mrp = $mrp;
                $discount = round(($price/$mrp)*100);
                $result['product'][$value->category_name][$product_key]->discount = $discount;

            }


        }



        // end category

        //featured product

        $home_feature_product_model = DB::table('products')->where(['is_featured'=>1, 'status'=>1])->get();

        $result['feature_product']= $home_feature_product_model;
        foreach ($home_feature_product_model as $product_key => $product_value) {

            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['feature_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['feature_product'][$product_key]->mrp = $mrp;
            $discount = 100- round(($price/$mrp)*100);
            $result['feature_product'][$product_key]->discount = $discount;

        }

        // featured product end

        // tranding product

        $home_tranding_product_model = DB::table('products')->where(['is_tranding'=>1, 'status'=>1])->get();

        $result['tranding_product']= $home_tranding_product_model;
        foreach ($home_tranding_product_model as $product_key => $product_value) {

            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['tranding_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['tranding_product'][$product_key]->mrp = $mrp;
            $discount =100- round(($price/$mrp)*100);
            $result['tranding_product'][$product_key]->discount = $discount;

        }

        // tranding product end

        // disocunted product


        $home_discounted_product_model = DB::table('products')->where(['is_discounted'=>1, 'status'=>1])->get();

        $result['discounted_product']= $home_discounted_product_model;
        foreach ($home_discounted_product_model as $product_key => $product_value) {

            $home_product_category_model = DB::table('categories')->where('id', '=', $product_value->category_id)->first();
            $category = $home_product_category_model->category_name;
            $result['discounted_product'][$product_key]->category = $category;
            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['discounted_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['discounted_product'][$product_key]->mrp = $mrp;
            $discount = 100- round(($price/$mrp)*100);
            $result['discounted_product'][$product_key]->discount = $discount;

        }

            // discounted product end

        // promotional  product


        $home_discounted_product_model = DB::table('products')->where(['is_promo'=>1, 'status'=>1])->get();

        $result['promo_product']= $home_discounted_product_model;
        foreach ($home_discounted_product_model as $product_key => $product_value) {

            $home_product_category_model = DB::table('categories')->where('id', '=', $product_value->category_id)->first();
            $category = $home_product_category_model->category_name;
            $result['promo_product'][$product_key]->category = $category;
            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['promo_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['promo_product'][$product_key]->mrp = $mrp;
            $discount =100- round(($price/$mrp)*100);
            $result['promo_product'][$product_key]->discount = $discount;

        }

            // promotional product end

         $home_banner_model = DB::table('banners')->where('status','=',1)->orderBy('rank')->get();

        $result['banner'] = $home_banner_model;







        //echo getTopNavCat();










        return view('front.index',$result);

    }

    // login page

    public function login ()  {
        if(session()->has('USER_ID')){
            return redirect('dashboard');
        }else{

            return view('front.login');
        }
    }


    /// end login page

    // signup page

    public function singup_view ()  {
        return view('front.signup');
    }


    /// end signup page

    // create user account
    public function signup(Request $request){
        //  $input = $request->post();
        // $rules = [
        //     'name'=>'required|regex:/[A-Za-z]+/',
        //     'email'=>'required|email|unique:user,email',
        //     'password'=>'required|regex:/[A-Za-z]+/',
        //     'cpassword'=>'requird|same:password'
        // ];

        // $messages = [
        //     'name'=>'Please Enter Valid Name',
        //     'email'=>'Please Enter Valid Email',
        //     'password'=>'Password must consist ',
        //     'cassword'=>'Password must consist ',

        // ];

        // $validator = Validator::make($input, $rules, $messages);
        // prx($validator);
        // die();

// if ($validator->fails()) {
//     return back()->withInput()->withErrors($validator->messages());
// }

        $request->validate([
            'name'=>'required|regex:/[A-Za-z]+/',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|regex:/[A-Za-z]+/',
            'cpassword'=>'required|same:password',
        ]);

        $data['name'] = ucfirst($request->post('name'));
        $data['email']= $request->post('email');
        $data['password'] = Hash::make($request->post('password'));
        $user_model= DB::table('users')->insert($data);

        return redirect('login');
     }


    // end create user account


    // signin user

    public function signin(Request $request) {
        $request->validate([
            'email'=>"required|email",
            'password'=>'required'
        ]);

        $email = $request->post('email');
        $password= $request->post('password');



        $user_model= DB::table('users')->where([
            'email'=>$email

        ])->get();

        if(isset($user_model[0])){
            if(Hash::check($password, $user_model[0]->password)){

                $request->session()->put("USER_ID",$user_model[0]->id);
                $request->session()->put("USER_NAME",$user_model[0]->name);

                return redirect('dashboard');
            }
        }
        return redirect('login',session->flash('message','Please Enter Valid Details'));
    }


    // end signin user

    // user account

    // dashboard

public function user_dashboard() {

    return view('front.user_dashboard');
}


    // dashboard end


    // user account end




    public function product(Request $request,$slug) {




        $product_model = DB::table('products')->where([
            'slug'=>$slug,
            'status'=>1
        ])->get();

        $result['product'] = $product_model[0];
      $product_attr_model = DB::table('product_attr')->where([
        'product_id'=>$result['product']->id
      ])->leftJoin('sizes','sizes.id','=','product_attr.size_id')->leftJoin('colors','colors.id','=','product_attr.color_id')->get();

      $result['product_attr'] = $product_attr_model;
      $sizes = [];
      $colors = [];

        foreach ($product_attr_model as $key => $value) {
            $sizes[$key]['size'] = $value->size;
            $sizes[$key]['size_id'] = $value->size_id;
            $sizes[$key]['id'] = $value->id;
            $colors[$key]['color'] = $value->color;
            $colors[$key]['image'] = $value->image;
            $colors[$key]['color_id'] = $value->color_id;
            $colors[$key]['id'] = $value->id;
            $colors[$key]['size'] = $value->size;
        }

        $unique_size =[];

            $size = array_filter($sizes,function ($item) use (&$unique_size) {
         if(!in_array($item['size'],$unique_size)){
        array_push($unique_size,$item['size']);
        return $item;
                    }

                });



         $result['product_size'] = $size;
            $result['product_color'] = $colors;



      $product_image = DB::table('product_image')->select('image')->where([
        'product_id'=>$result['product']->id
      ])->get();



      $min_price = 0;
      $min_mrp = 0;

        $result['product_image']=$product_image;
        // prx($result['product']);
        // die();

         // related product

         $releted_product_model = DB::table('products')->where(['category_id'=>$result['product']->category_id,

         'status'=>1]
         )->where('id','!=',$result['product']->id)->get();

            $result['related_product']= $releted_product_model;
            foreach ($releted_product_model as $product_key => $product_value) {

             $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->orderBy('price','asc')->first();
             $price = $home_product_price_model->price;
             $result['related_product'][$product_key]->price = $price;
             $mrp = $home_product_price_model->mrp;
             $result['related_product'][$product_key]->mrp = $mrp;
             $discount = 100- round(($price/$mrp)*100);
             $result['related_product'][$product_key]->discount = $discount;
             $result['related_product'][$product_key]->size_id = $home_product_price_model->size;
             $result['related_product'][$product_key]->color_id = $home_product_price_model->color_id;

         }


         // related product end


      return view('front.product',$result);


    }


    // add to cart function

    public function add_to_cart(Request $request) {

        prx($request->post());
        die();

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
            "product_attr.color_id"=>$request->post("color_id"),
            "product_attr.product_id"=>$product_model[0]->id
        ])->leftJoin('sizes','sizes.id','=','product_attr.size_id')->select("product_attr.id AS id")->get();

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




            return  response()->json($result);
        }

        // category sectoin

        public function category(Request $request,$slug){

            $category_model = DB::table('categories')->where(['category_slug'=>$slug])->get();

            if (isset($category_model[0])) {
                $result['category_name'] = $category_model[0]->category_name;

                    $product_model = DB::table('products')->where(['category_id'=>$category_model[0]->id])->get();
                    if (isset($product_model[0])) {
                        foreach ($product_model as $key => $value) {
                            $product_attr_model = DB::table('product_attr')->where('product_id','=',$value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->first();
                            $product_model[$key]->price = $product_attr_model->price;
                            $product_model[$key]->mrp = $product_attr_model->mrp;
                            $product_model[$key]->size_id = $product_attr_model->size;
                            $product_model[$key]->color_id = $product_attr_model->color_id;

                        }

                        $result['products'] = $product_model;
                    }else{
                         return redirect()->back()->with('categroy_msg','Sorry for incontinent Products out of stock');
                    }



                    return view('.front.category',$result);
                }else{

                     return redirect()->back()->with('categroy_msg','Sorry for incontinent The category is currently out of service.');
            }


        }

        // category section end


    }
