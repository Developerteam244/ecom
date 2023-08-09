<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Banner::orderBy('rank')->get();
        $result['banner'] = $model;

        return view('admin.banner',$result);
    }

    public function manage_banner(Request $request,$id='') {

        if ($id>0) {
            $model = Banner::find($id);
            $result['id']= $model->id;
            $result['name']= $model->name;
            $result['desc']= $model->desc;
            $result['link']= $model->link;
            $result['image']= $model->image;
            $result['rank']= $model->rank;
        }else{
            $result['id']= '';
            $result['name']='';
            $result['desc']= '';
            $result['link']='';
            $result['image']= '';
            $result['rank']= '';
        }

        return view('admin.manage_banner',$result);
    }

    public function manage_banner_process(Request $request) {


        if ($request->post('id')>0) {
            $id = $request->post('id');
            $model = Banner::find($id);
            $image_condi = "mimes:jpg,jpeg";
            $msg = "Banner Successfully Updated";
            if ($request->hasFile('image')) {
                $this->delete_image('banners',$id,'banner/');

            }
        }else{
            $model = new Banner();
            $image_condi = "required|mimes:jpg,jpeg";
            $model->status = 1;
            $msg = "Banner Successfully Added";
        }

        $request->validate([
            'name'=>'required',
            'link'=>'required',
            'rank'=>'required',
            'image'=>$image_condi
        ]);


        $model->name = $request->post('name');
        $model->desc = $request->post('desc');
        $model->link = $request->post('link');
        $model->rank = $request->post('rank');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_ext = $image->extension();
            $image_name = time().'.'.$image_ext;
            $image->storeAS('public/media/banner',$image_name);
            $model->image = $image_name;
        }
        // echo '<pre>';
        // print_r($request->file());

        $request->session()->flash('message',$msg);
        $model->save();
        return redirect('admin/banner');

    }

    public function status(Request $request,$status,$id) {
        $model= Banner::find($id);
        $model->status= $status;
        $model->save();
        $msg = "Status Updated";
        $request->session()->flash('message',$msg);
        return redirect('admin/banner');
    }

    public function delete(Request $request,$id) {
        $model = Banner::find($id);
        $this->delete_image('banners',$id,'banner/');
        $model->delete();

        $request->session()->flash('message','Banner Deleted');
        return redirect('admin/banner');

    }

    // delete image
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
