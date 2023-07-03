<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index ()
    {

        if (session()->has("ADMIN_ID")) {

            return redirect('admin/dashboard');

        }else{

            return view('admin.login');
        }

    }


    public function auth(Request $resquest)
    {


        $email = $resquest->post('email');
        //$password = $resquest->post('password');


        $result = Admin::where(['email'=>$email])->first();



        if($result){

            if (Hash::check($resquest->post('password'),$result->password)) {
                $resquest->session()->put('ADMIN_LOGIN',true);
                $resquest->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');

            }else{

                $resquest->session()->flash('error','Please enter a valid Password');
                return redirect('admin');
            }
            }else{
            $resquest->session()->flash('error','Please enter a valid information');
            return redirect('admin');
        }
    }

    // dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // category
    public function category()
    {
        return view('admin.category');
    }

    public function updatepassword()
    {
        $r=Admin::find(1);
        $r->password= Hash::make('nawab');
        $r->save();
    }
}
