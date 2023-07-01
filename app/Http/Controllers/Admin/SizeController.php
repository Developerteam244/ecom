<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $result['data'] = Size::all();
        return view('admin/size',$result);
    }

    // manage size

    public function manage_size(Request $request,$id='')
    {
        if($id>0){
            $arr = Size::where(['id'=>$id])->get();
            $result['size'] = $arr[0]->size;

            $result['size_id'] = $arr[0]->id;

        }else{
            $result['size'] = '';

            $result['size_id'] = 0;
        }

        return view('admin/manage_Size',$result);
    }


    public function manage_Size_process(Request $request)
    {
        $request->validate([

            'size'=>'required|unique:sizes,size,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Size::find($id);

            $request->session()->flash('message','size Updated');
        }else{

            $model = new Size();
            $request->session()->flash('message','size Inserted');
        }
        $model->size = ucfirst($request->post('size'));

        $model->save();
        return redirect('admin/size');
    }

    // delete Size row

    public function delete(Request $request,$id )
    {
        $model= Size::find($id);
        $model->delete();
        $request->session()->flash('message','size Deleted');
        return redirect('admin/size');

    }

}
