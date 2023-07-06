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

                $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->orderBy('price','asc')->first();
                $price = $home_product_price_model->price;
                $result['product'][$value->category_name][$product_key]->price = $price;
                $mrp = $home_product_price_model->mrp;
                $result['product'][$value->category_name][$product_key]->mrp = $mrp;
                $discount = round(($price/$mrp)*100);
                $result['product'][$value->category_name][$product_key]->discount = $discount;
                $result['product'][$value->category_name][$product_key]->size_id = $home_product_price_model->size;
                $result['product'][$value->category_name][$product_key]->color_id = $home_product_price_model->color_id;

            }


        }



        // end category

        //featured product

        $home_feature_product_model = DB::table('products')->where(['is_featured'=>1, 'status'=>1])->get();

        $result['feature_product']= $home_feature_product_model;
        foreach ($home_feature_product_model as $product_key => $product_value) {

            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['feature_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['feature_product'][$product_key]->mrp = $mrp;
            $discount = 100- round(($price/$mrp)*100);
            $result['feature_product'][$product_key]->discount = $discount;
            $result['feature_product'][$product_key]->size_id = $home_product_price_model->size;
            $result['feature_product'][$product_key]->color_id = $home_product_price_model->color_id;

        }

        // featured product end

        // tranding product

        $home_tranding_product_model = DB::table('products')->where(['is_tranding'=>1, 'status'=>1])->get();

        $result['tranding_product']= $home_tranding_product_model;
        foreach ($home_tranding_product_model as $product_key => $product_value) {

            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['tranding_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['tranding_product'][$product_key]->mrp = $mrp;
            $discount =100- round(($price/$mrp)*100);
            $result['tranding_product'][$product_key]->discount = $discount;
            $result['tranding_product'][$product_key]->size_id = $home_product_price_model->size;
            $result['tranding_product'][$product_key]->color_id = $home_product_price_model->color_id;

        }

        // tranding product end

        // disocunted product


        $home_discounted_product_model = DB::table('products')->where(['is_discounted'=>1, 'status'=>1])->get();

        $result['discounted_product']= $home_discounted_product_model;
        foreach ($home_discounted_product_model as $product_key => $product_value) {

            $home_product_category_model = DB::table('categories')->where('id', '=', $product_value->category_id)->first();
            $category = $home_product_category_model->category_name;
            $result['discounted_product'][$product_key]->category = $category;
            $home_product_price_model = DB::table('product_attr')->where('product_id', '=', $product_value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->orderBy('price','asc')->first();
            $price = $home_product_price_model->price;
            $result['discounted_product'][$product_key]->price = $price;
            $mrp = $home_product_price_model->mrp;
            $result['discounted_product'][$product_key]->mrp = $mrp;
            $discount = 100- round(($price/$mrp)*100);
            $result['discounted_product'][$product_key]->discount = $discount;
            $result['discounted_product'][$product_key]->size_id = $home_product_price_model->size;
            $result['discounted_product'][$product_key]->color_id = $home_product_price_model->color_id;

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
         )->where('id','!=',$result['product']->id)->paginate(3);

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




        // category sectoin

        public function category(Request $request,$slug){





            $product_model = DB::table('products')
            ->join('categories AS cat','products.category_id','=','cat.id')
            ->where(['cat.category_slug'=>$slug])
            ->select('products.*','cat.category_name','cat.category_slug')->paginate(3);

            if (isset($product_model[0])) {
                $result['category_name'] = $product_model[0]->category_name;
                $result['category_slug'] = $product_model[0]->category_slug;
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

                    $result['count'] = count($product_model);
                    $abc = $product_model;
                    $try = $abc->toArray();
                    // prx($try);

                    // die();
                    foreach ($try as $key => $value) {
                        $try[$key] = (array)$value;
                    }








                    $order_type = "asc";
                    function arr_sort($a,$b) {
                        if ($order_type == "asc") {
                            ($b["name"]<$a["name"])-($a["name"]<$b["name"]);
                        }else{
                            ($a["name"]<$b["name"])-($b["name"]<$a["name"]);

                        }

                    }




                    return view('.front.category',$result);

                }

        // category section end

        // top filter
        public function top_filter(Request $request){


            $where = ['products.status'=>1];
            $page = $request->post('page');
            $query  = "";
            //$order = isset($request->post('order'))?$request->post('order'):"asc";
            $order_column = "created_at";
            $order_type = "desc";
            $order_filter_column = [
                'name'=>'name',
                'price'=>'price',
                'date'=>'created_at'


            ];
            if (!is_null($request->post('order_filter'))) {
                $order_column = $order_filter_column[$request->post('order_filter')['short_by']];
                $order_type = $request->post('order_filter')['short_type'];
                $result['null'] = $order_column;
                $result['null_tyhpe'] = $order_type;
            };
            if($page =="category"){
                $slug = $request->post('filter');
                $where['cat.category_slug'] = $slug;

            }




                    $product_model = DB::table('products')
                    ->join('categories AS cat','products.category_id','=','cat.id')
                    ->where($where)
                    ->select('products.*')
                    ->get();
                    if (isset($product_model[0])) {
                        foreach ($product_model as $key => $value) {
                            $product_attr_model = DB::table('product_attr')->where('product_id','=',$value->id)->leftJoin('sizes','sizes.id','=','product_attr.size_id')->first();
                            $product_model[$key]->price = $product_attr_model->price;
                            $product_model[$key]->mrp = $product_attr_model->mrp;
                            $product_model[$key]->size_id = $product_attr_model->size;
                            $product_model[$key]->color_id = $product_attr_model->color_id;

                        }

                        $model = $product_model->toArray();


                        foreach ($model as $key => $value) {
                            $model[$key] = (array)$value;
                        }


                        usort($model,function ($a,$b) use ($order_type,$order_column) {
                            if ($order_type == "asc") {
                                return ($b[$order_column]<$a[$order_column])-($a[$order_column]<$b[$order_column]);
                            }else{
                                return ($a[$order_column]<$b[$order_column])-($b[$order_column]<$a[$order_column]);

                            }
                        });

                        $result['model'] = $model;

                        $result['products'] = $model;

                    }

                        $result['check'] = $request->post('order_filter');
                        $result['count'] = count($product_model);
                        return  response()->json($result);
















        }

        // top filter end


    }
