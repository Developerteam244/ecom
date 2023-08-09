<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{







    public function index()
    {
        $result['brand'] = Brand::all();
        return view('admin/brand',$result);
    }

    // manage brand

    public function manage_brand(Request $request,$id='')
    {
        if($id>0){
            $arr = Brand::find($id);
            $result['name'] = $arr->name;
            $result['in_home'] = $arr->in_home;
            $result['id'] = $arr->id;
            $result['description'] = $arr->description;
            $result['keywords'] = $arr->keywords;
            $result['image'] = $arr->image;
            $result['slug'] = $arr->slug;


        }else{
            $result['id'] = 0;
            $result['name'] = '';
            $result['in_home'] = 0;
            $result['description'] ='';
            $result['keywords'] = '';
            $result['image'] = '';
            $result['slug'] = '';
        }

        return view('admin/manage_brand',$result);
    }


    public function manage_Brand_process(Request $request)
    {
        $request->validate([

            'name'=>'required|unique:brands,name,'.$request->post('id'),
            'slug'=>'required|unique:brands,slug,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Brand::find($id);

            $request->session()->flash('message','Brand Updated');
        }else{

            $model = new Brand();
            $request->session()->flash('message','Brand Inserted');
        }
        $model->name = ucfirst($request->post('name'));
        $model->slug = $request->post('slug');
        $model->keywords = $request->post('keywords');
        $model->description = $request->post('description');
        $model->in_home = 0;
            if (!is_null($request->post('in_home'))) {
                $model->in_home = 1;

            }

        $model->save();
        return redirect('admin/brand');
    }

    // delete Brand row

    public function delete(Request $request,$id )
    {
        $model= Brand::find($id);
        $model->delete();
        $request->session()->flash('message','brand Deleted');
        return redirect('admin/brand');

    }


}
