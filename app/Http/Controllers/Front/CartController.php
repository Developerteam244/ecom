<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    // checkout function

    public function checkout(Request $request)  {
        if($request->session()->has("USER_ID")){
            $user_id = $request->session()->get("USER_ID",0);
            $user_type = "reg";
        }else{
            $user_id= temp_user();
            $user_type = "non-reg";
        }
    $checkout_model = DB::table("cart")
                        ->where([
                            'user_id'=>$user_id,
                            'user_type'=>$user_type
                        ])
                        ->join("products","products.id","=","cart.product_id")
                        ->join("product_attr","product_attr.id","=","cart.attr_id")
                        ->select("cart.id AS id","cart.qty AS qty","products.name AS name","product_attr.image AS image","product_attr.price AS price")->get();
                            $result['product'] = $checkout_model;

                        return view("front.checkout",$result);

    }


}
