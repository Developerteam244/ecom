<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::all();
        return view('admin/product',$result);
    }

    // manage product

    public function manage_product(Request $request,$id='')
    {



        if($id>0){
            $arr = Product::where(['id'=>$id])->get();
            $result['name'] = $arr[0]->name;
            $result['slug'] = $arr[0]->slug;
            $result['image'] = $arr[0]->image;
            $result['brand_id'] = $arr[0]->brand_id;
            $result['model'] = $arr[0]->model;
            $result['short_desc'] = $arr[0]->short_desc;
            $result['desc'] = $arr[0]->desc;
            $result['keywords'] = $arr[0]->keywords;
            $result['technical_specification'] = $arr[0]->technical_specification;
            $result['warranty'] = $arr[0]->warranty;
            $result['uses'] = $arr[0]->uses;
            $result['category_id'] = $arr[0]->category_id;
            $result['lead_time'] = $arr[0]->lead_time;
            $result['tex_id'] = $arr[0]->tex_id;
            $result['is_promo'] = $arr[0]->is_promo;
            $result['is_discounted'] = $arr[0]->is_discounted;
            $result['is_featured'] = $arr[0]->is_featured;
            $result['is_tranding'] = $arr[0]->is_tranding;


            $result['id'] = $arr[0]->id;
            $result['product_attr'] = DB::table('product_attr')->where('product_id',$id)->get();
            $result['product_img'] = DB::table('product_image')->where('product_id',$id)->get();

            // echo '<pre>';
            // print_r($pro_attr);




        }else{
            $result['name'] = '';
            $result['slug'] = '';
            $result['image'] = '';
            $result['brand_id'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['warranty'] = '';
            $result['uses'] = '';
            $result['category_id'] = '';
            $result['lead_time'] = '';
            $result['tex_id'] = '';
            $result['is_promo'] ='';
            $result['is_discounted'] = '';
            $result['is_featured'] = '';
            $result['is_tranding'] = '';

            $result['id'] = 0;
        $result['product_attr'] =[];
        $result['product_attr'][0] =[];

        $result['product_attr'][0]['size_id'] = 0;
        $result['product_attr'][0]['color_id'] = 0;
        $result['product_attr'][0]['sku'] = '';
        $result['product_attr'][0]['mrp'] = '';
        $result['product_attr'][0]['price'] = '';
        $result['product_attr'][0]['qty'] = '';
        $result['product_attr'][0]['id'] = '';
        $result['product_attr'][0]['image'] = '';
        $result['product_img'][0]['id']=0;
        $result['product_img'][0]['image']='';

        }
        $result['category'] = DB::table('categories')->where(['status'=>1])->get();
        $result['color'] = DB::table('colors')->get();
        $result['size'] = DB::table('sizes')->get();
        $result['brand'] = DB::table('brands')->get();
        $result['tex'] = DB::table('texes')->get();




       // print_r($result['product_attr']);



        return view('admin/manage_Product',$result);
    }


    public function manage_Product_process(Request $request)
    {
        // echo '<pre>';
        // print_r($request->post());
        // die();
        if($request->has('image')){

        }

        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Product::find($id);

            $image_required = '';
            $msg = 'Product Updated';



        }else{

            $model = new Product();
            $model['status'] = 1;
            $image_required = 'required|mimes:jpeg,jpg,png,webp';
            $msg = "Product Inserted";
            $id=0;

        }
        $request->validate([

            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
            'image'=> $image_required,
            'pimage.*'=>'mimes:jpeg,jpg,png,webp',
            'pmimage.*'=>'mimes:jpeg,jpg,png,webp',
            'tex_id' => 'required'

        ]);

        $mrp = $request->post('mrp');
        $price = $request->post('price');
        $size_id = $request->post('size_id');
        $color_id = $request->post('color_id');
        $pimage = $request->file('pimage');
        $qty = $request->post('qty');
        $paid = $request->post('paid');
        $sku = $request->post('sku');
        foreach ($sku as $key => $value) {
            $check = DB::table('product_attr')->where([
                ['sku','=',$value],
                ['id','!=',$paid[$key]]
            ])->get();

            if(isset($check[0])){



                $request->session()->flash('sku_error',$sku[$key].' is already used');
                return redirect($request->headers->get('referer'));
            }
        }


        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_ext = $image->extension();
            $image_name = time().'.'.$image_ext;
            $image->storeAs('/public/media/product',$image_name);

            $model->image = $image_name;
           $this->delete_image('products',$id,'product/');



        }



        $model['name'] = $request->post('name');
        $model['slug'] = $request->post('slug');

        $model['brand_id'] = $request->post('brand_id');
        $model['model'] = $request->post('model');
        $model['short_desc'] = $request->post('short_desc');
        $model['desc'] = $request->post('desc');
        $model['keywords'] = $request->post('keywords');
        $model['technical_specification'] = $request->post('technical_specification');
        $model['warranty'] = $request->post('warranty');
        $model['uses'] = $request->post('uses');
        $model['category_id'] = $request->post('category_id');
        $model['lead_time'] = $request->post('lead_time');
        $model['tex_id'] = $request->post('tex_id');
        $model['is_promo'] = $request->post('is_promo');
        $model['is_discounted'] = $request->post('is_discounted');
        $model['is_featured'] = $request->post('is_featured');
        $model['is_tranding'] = $request->post('is_tranding');



        $model->save();
        $pid = $model->id;
        // product attribute




        // mulitple img
        $pmimg = $request->file('pmimage');
         $piid = $request->post('piid');
        // echo '<pre>';
        // print_r($request->post('piid'));
        // die();

        if($piid){

            foreach ($piid as $key => $value) {
                if($request->file('pmimage.'.$key)){
                    $rand = rand(1,999999999);
                    $image = $pmimg[$key];

                $image_ext  = $image->extension();
                $image_name = $rand.time().'.'.$image_ext;
                $image->storeAs('public/media/product_img',$image_name);
                $image_arr['product_id'] = $pid;
                $image_arr['image'] = $image_name;
             $this->delete_image('product_image',$piid[$key],'product_img/');

                if($piid[$key] == ''){
                    $pmodel = DB::table('product_image')->insert($image_arr);
                }else{
                    $pmodel = DB::table('product_image')->where(['id'=>$piid[$key]])->update($image_arr);

                }
            }
        }


    }
        // multiple img end


        foreach ($sku as $key => $value) {

            $pattr_arr['product_id'] = $pid;
            $pattr_arr['sku'] = $value;
            $pattr_arr['mrp'] = $mrp[$key];
            $pattr_arr['price'] = $price[$key];
            if ( $color_id[$key]==NULL) {
                $pattr_arr['color_id'] = 0;

            }else{

                $pattr_arr['color_id'] = $color_id[$key];
            }
            if (  $size_id[$key]==NULL) {
                $pattr_arr['size_id'] = 0;

            }else{

                $pattr_arr['size_id'] = $size_id[$key];
            }



            $pattr_arr['qty'] = $qty[$key];
        //     echo '<pre>';
        // print_r($request->file('pimage'));
        // die();






            if ($paid[$key] == '') {
                if($request->file('pimage.'.$key)){


                    $rand = rand('1','999999999');
                    $image = $pimage[$key];
                    $image_ext = $image->extension();
                    $image_name = $rand.time().'.'.$image_ext;
                    $image->storeAS('public/media/attr_image',$image_name);
                    $pattr_arr['image'] = $image_name;
                    }else{
                       return redirect('admin/product/edit/'.$pid);
                    }


                DB::table('product_attr')->insert($pattr_arr);
            }else{

                if($request->file('pimage.'.$key)){


                    $rand = rand('1','999999999');
                    $image = $pimage[$key];
                    $image_ext = $image->extension();
                    $image_name = $rand.time().'.'.$image_ext;
                    $image->storeAS('public/media/attr_image',$image_name);
                    $pattr_arr['image'] = $image_name;
                $this->delete_image('product_attr',$paid[$key],'attr_image/');
            }

                DB::table('product_attr')->where(['id'=>$paid[$key]])->update($pattr_arr);

            }






        }
        // product attribute





        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }

    // delete Product row

    public function delete(Request $request,$id )
    {
        $model= Product::find($id);
        $this->delete_image('products',$id,'product/');
        $model_pmimg = DB::table('product_image')->where(['product_id'=>$id]);
        $product_pmimg = $model_pmimg->get();

        foreach($product_pmimg as $key=>$value){

            $this->delete_image('product_image',$value->id,'product_img/');
        }
        $model_pmimg->delete();
        $model_patr = DB::table('product_attr')->where(['product_id'=>$id]);
        $product_attr = $model_patr->get();

        foreach($product_attr as $key=>$value){

            $this->delete_image('product_attr',$value->id,'attr_image/');
        }
        $model_patr->delete();

        $model->delete();
        $request->session()->flash('message','product Deleted');
        return redirect('admin/product');

    }
    // delte product attribute
    public function delete_pattr(Request $request,$paid,$pid )
    {

        $this->delete_image('product_attr',$paid,'attr_image/');
        DB::table('product_attr')->where(['id'=>$paid])->delete();

        $request->session()->flash('message','Attribute Deleted');
        return redirect('admin/product/edit/'.$pid);

    }
    // delte product multi image
    public function delete_pimage(Request $request,$piid,$pid )
    {

        $this->delete_image('product_image',$piid,'product_img/');
        DB::table('product_image')->where(['id'=>$piid])->delete();

        $request->session()->flash('message','Attribute Deleted');
        return redirect('admin/product/edit/'.$pid);

    }

   // delete image functin

    public function delete_image($table,$id,$path='')
    {
        $model= DB::table($table)->where(['id'=>$id])->first();
        print_r($model);

        // die();
            if(!is_null($model)){


        $image = $model->image;

            if(Storage::exists('public/media/'.$path.$image)){
                Storage::delete('public/media/'.$path.$image);
                echo 'done';
            }else{

            }
        }



    }

}
