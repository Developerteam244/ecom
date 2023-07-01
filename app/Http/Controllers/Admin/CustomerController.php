<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $model['data'] = Customer::all();

        return view('admin.customer',$model);
    }

    public function show(Request $request,$id)
    {
        $model = Customer::find($id);

        $result['name']= $model->name;
        $result['mobile']= $model->mobile;
        $result['address']= $model->address;
        $result['city']= $model->city;
        $result['district']= $model->district;
        $result['area_pin']= $model->area_pin;
        $result['state']= $model->state;



        return view('admin.show_customer',$result);
    }
}
