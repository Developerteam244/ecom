<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $result['data'] = Color::all();
        return view('admin/color',$result);
    }

    // manage color

    public function manage_color(Request $request,$id='')
    {
        if($id>0){
            $arr = Color::where(['id'=>$id])->get();
            $result['color'] = $arr[0]->color;

            $result['color_id'] = $arr[0]->id;

        }else{
            $result['color'] = '';

            $result['color_id'] = 0;
        }

        return view('admin/manage_color',$result);
    }


    public function manage_Color_process(Request $request)
    {
        $request->validate([

            'color'=>'required|unique:colors,color,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Color::find($id);

            $request->session()->flash('message','color Updated');
        }else{

            $model = new Color();
            $request->session()->flash('message','color Inserted');
        }
        $model->color = ucfirst($request->post('color'));

        $model->save();
        return redirect('admin/color');
    }

    // delete Color row

    public function delete(Request $request,$id )
    {
        $model= Color::find($id);
        $model->delete();
        $request->session()->flash('message','color Deleted');
        return redirect('admin/color');

    }
}
