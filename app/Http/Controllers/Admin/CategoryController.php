<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $result['data'] = Category::all();
        return view('admin/category',$result);
    }

    // manage category

    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr = Category::where(['id'=>$id])->get();
            $result['parent_category'] = Category::all();
            $result['category_name'] = $arr[0]->category_name;
            $result['parent_id'] = $arr[0]->parent_id;
            $result['category_slug'] = $arr[0]->category_slug;
            $result['in_home'] = '';
            if ($arr[0]->in_home ==1) {
                $result['in_home'] = 'checked';

            }
            $result['category_id'] = $arr[0]->id;

        }else{
            $result['parent_category'] = Category::all();
            $result['category_name'] = '';
            $result['parent_id'] = 0;
            $result['category_slug'] = '';
            $result['category_id'] = 0;
            $result['in_home'] = '';
            $result['in_home'] = '';
        }

        return view('admin/manage_category',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Category::find($id);
            $request->session()->flash('message','Category Updated');
        }else{

            $model = new Category();
            $model->status = 1;
            $request->session()->flash('message','Category Inserted');
        }
        $model->in_home = '';
        if($request->post('in_home')){
            $model->in_home = $request->post('in_home');

        }
        $model->category_name = ucfirst($request->post('category_name'));
        $model->parent_id = $request->post('parent_id');
        $model->category_slug = $request->post('category_slug');
        //prx($request->post());
        $model->save();
        return redirect('admin/category');
    }

    // delete category row

    public function delete(Request $request,$id )
    {
        $model= Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');

    }
    // change status
    public function status(Request $request,$status,$id )
    {
        $model= Category::find($id);
        $model->status = $status;
        $model->save();


         return redirect('admin/category');


    }
}
