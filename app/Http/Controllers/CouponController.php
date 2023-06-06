<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $result['data'] = Coupon::all();
        return view('admin/coupon',$result);
    }

    // manage category

    public function manage_coupon(Request $request,$id='')
    {
        if($id>0){
            $arr = Coupon::where(['id'=>$id])->get();
            $result['coupon_name'] = $arr[0]->title;
            $result['coupon_code'] = $arr[0]->code;
            $result['coupon_value'] = $arr[0]->value;
            $result['coupon_type'] = $arr[0]->type;
            $result['coupon_min_order_amt'] = $arr[0]->min_order_amt;
            $result['coupon_is_one_time'] = $arr[0]->is_one_time;
            $result['coupon_id'] = $arr[0]->id;

        }else{
            $result['coupon_name'] = '';
            $result['coupon_code'] = '';
            $result['coupon_value'] = '';
            $result['coupon_type'] = '';
            $result['coupon_min_order_amt'] = '';
            $result['coupon_is_one_time'] = '';
            $result['coupon_id'] = 0;
        }

        return view('admin/manage_coupon',$result);
    }


    public function manage_coupon_process(Request $request)
    {
        $request->validate([
            'coupon_name'=>'required',
            'coupon_value'=>'required',
            'coupon_code'=>'required|unique:coupons,code,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $id =$request->post('id');
            $model = Coupon::find($id);
            $request->session()->flash('message','Coupon Updated');
        }else{

            $model = new Coupon();
            $model->status = 1;
            $request->session()->flash('message','Coupon Inserted');
        }
        $model->title = ucfirst($request->post('coupon_name'));
        $model->code = $request->post('coupon_code');
        $model->value = $request->post('coupon_value');
        $model->type = $request->post('coupon_type');
        $model->min_order_amt = $request->post('coupon_min_order_amt');
        $model->is_one_time = $request->post('coupon_is_one_time');
        $model->save();
        return redirect('admin/coupon');
    }

    // delete category row

    public function delete(Request $request,$id )
    {
        $model= Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','Coupon Deleted');
        return redirect('admin/coupon');

    }
    public function status(Request $request,$status,$id )
    {
        $model= Coupon::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','Coupon Status Updated');
        return redirect('admin/coupon');

    }
}
