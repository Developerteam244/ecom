<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $result['category'] = Category::all();
        return view('admin/category', $result);
    }

    // manage category

    public function manage_category(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Category::find($id);
            $result['parent_category'] = Category::all();
            $result['category_name'] = $arr->category_name;
            $result['parent_id'] = $arr->parent_id;
            $result['category_slug'] = $arr->category_slug;
            $result['in_home'] = $arr->in_home;
            $result['description'] = $arr->description;
            $result['keywords'] = $arr->keywords;
            $result['category_id'] = $arr->id;
            $result['image'] = $arr->image;
            $result['id'] = $arr->id;

        } else {
            $result['parent_category'] = Category::all();
            $result['category_name'] = '';
            $result['parent_id'] = 0;
            $result['category_slug'] = '';
            $result['category_id'] = 0;
            $result['in_home'] = '';
            $result['keywords'] = '';
            $result['description'] = '';
            $result['image'] = '';
            $result['id'] = 0;

        }

        return view('admin/manage_category', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories,category_slug,' . $request->post('id'),
            'keywords' => 'required|regex:/^[a-zA-Z0-9, ]+$/u',
            'description' => 'required'

        ]);

        if ($request->post('id') > 0) {
            $id = $request->post('id');
            $model = Category::find($id);

            $request->session()->flash('message', 'Category Updated');
        } else {

            $model = new Category();
            $model->status = 1;
            $request->session()->flash('message', 'Category Inserted');
            $id = 0;
        }

        if (!is_null($request->post('in_home'))) {
            $model->in_home = 1;

        } else {
            $model->in_home = 0;

        }
        $model->category_name = ucfirst($request->post('category_name'));
        $model->parent_id = $request->post('parent_id');
        $model->category_slug = $request->post('category_slug');
        $model->keywords = $request->post('keywords');
        $model->description = $request->post('description');
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $image_ext = $image->extension();
            $image_name = time() . '.' . $image_ext;
            $image->storeAs('/public/media/category', $image_name);

            $model->image = $image_name;
            $this->delete_image('categories', $id, 'category/');
        }

        $model->save();
        return redirect('admin/category');
    }

    // delete category row

    public function delete(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('message', 'Category Deleted');
        return redirect('admin/category');

    }
    // change status
    public function status(Request $request, $status, $id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();

        return redirect('admin/category');

    }
    // delete image
    public function delete_image($table, $id, $path = '')
    {

        $model = DB::table($table)->where(['id' => $id])->first();

        if (!is_null($model)) {

            $image = $model->image;

            if (Storage::exists('public/media/' . $path . $image)) {
                Storage::delete('public/media/' . $path . $image);

            }

        }

    }
}
