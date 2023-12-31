<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{







    public function index()
    {
        $result['data'] = Brand::all();
        return view('admin/brand',$result);
    }

    // manage brand

    public function manage_brand(Request $request,$id='')
    {
        if($id>0){
            $arr = Brand::where(['id'=>$id])->get();
            $result['brand'] = $arr[0]->brand;
            $result['in_home'] = '';
            $result['in_home'] = '';
            if ($arr[0]->in_home ==1) {
                $result['in_home'] = 'checked';

            }

            $result['brand_id'] = $arr[0]->id;

        }else{
            $result['brand'] = '';
            $result['in_home'] = '';

            $result['brand_id'] = 0;
        }

        return view('admin/manage_brand',$result);
    }


    public function manage_Brand_process(Request $request)
    {
        $request->validate([

            'brand'=>'required|unique:brands,brand,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Brand::find($id);

            $request->session()->flash('message','brand Updated');
        }else{

            $model = new Brand();
            $request->session()->flash('message','brand Inserted');
        }
        $model->brand = ucfirst($request->post('brand'));
        $model->in_home = 0;
            if ($request->post('in_home')) {
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
