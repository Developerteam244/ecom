<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $result['category_name'] = $arr[0]->category_name;
            $result['category_slug'] = $arr[0]->category_slug;
            $result['category_id'] = $arr[0]->id;

        }else{
            $result['category_name'] = '';
            $result['category_slug'] = '';
            $result['category_id'] = 0;
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
        $model->category_name = ucfirst($request->post('category_name'));
        $model->category_slug = $request->post('category_slug');
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
