<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\tex;
use Illuminate\Http\Request;

class TexController extends Controller
{
    public function index()
    {
        $result['tax'] = Tex::all();
        return view('admin/tex',$result);
    }

    // manage tex

    public function manage_tex(Request $request,$id='')
    {
        if($id>0){
            $arr = Tex::where(['id'=>$id])->get();
            $result['tex_name'] = $arr[0]->name;
            $result['tex_value'] = $arr[0]->value;

            $result['id'] = $arr[0]->id;

        }else{

            $result['tex_name'] = '';
            $result['tex_value'] = '';
            $result['id'] = 0;
        }

        return view('admin/manage_tex',$result);
    }


    public function manage_Tex_process(Request $request)
    {
        $request->validate([

            'tex_name'=>'required|unique:texes,name,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Tex::find($id);

            $request->session()->flash('message','Tex Updated');
        }else{

            $model = new Tex();
            $request->session()->flash('message','Tex Inserted');
        }
        $model->name = ucfirst($request->post('tex_name'));
        $model->value = ucfirst($request->post('tex_value'));

        $model->save();
        return redirect('admin/tex');
    }

    // delete Tex row

    public function delete(Request $request,$id )
    {
        $model= Tex::find($id);
        $model->delete();
        $request->session()->flash('message','tex Deleted');
        return redirect('admin/tex');

    }
}
