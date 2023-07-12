<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\User;
use Validator;

class UserController extends Controller
{
     // login page

     public function login ()  {
        if(session()->has('USER_ID')){
            return redirect('user/dashboard');
        }else{

            return view('front.login');
        }
    }

    /// end login page

    // signup page

    public function singup_view ()  {
        return view('front.signup');
    }


    /// end signup page

    // create user account
    public function signup(Request $request){
        //  $input = $request->post();
        // $rules = [
        //     'name'=>'required|regex:/[A-Za-z]+/',
        //     'email'=>'required|email|unique:user,email',
        //     'password'=>'required|regex:/[A-Za-z]+/',
        //     'cpassword'=>'requird|same:password'
        // ];

        // $messages = [
        //     'name'=>'Please Enter Valid Name',
        //     'email'=>'Please Enter Valid Email',
        //     'password'=>'Password must consist ',
        //     'cassword'=>'Password must consist ',

        // ];

        // $validator = Validator::make($input, $rules, $messages);
        // prx($validator);
        // die();

// if ($validator->fails()) {
//     return back()->withInput()->withErrors($validator->messages());
// }

        $request->validate([
            'name'=>'required|regex:/[A-Za-z]+/',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|regex:/[A-Za-z]+/',
            'cpassword'=>'required|same:password',
        ]);

        $data['name'] = ucfirst($request->post('name'));
        $data['email']= $request->post('email');
        $data['password'] = Hash::make($request->post('password'));
        $user_model= DB::table('users')->insert($data);

        return redirect('user/login');
     }


    // end create user account


    // signin user

    public function signin(Request $request) {
        $request->validate([
            'email'=>"required|email",
            'password'=>'required'
        ]);

        $email = $request->post('email');
        $password= $request->post('password');



        $user_model= DB::table('users')->where([
            'email'=>$email

        ])->get();

        if(isset($user_model[0])){
            if(Hash::check($password, $user_model[0]->password)){

                $request->session()->put("USER_ID",$user_model[0]->id);
                $request->session()->put("USER_NAME",$user_model[0]->name);

                return redirect('user/dashboard');
            }
        }
        return redirect('user/login',session->flash('message','Please Enter Valid Details'));
    }


    // end signin user

    // user account

    // dashboard

    public function user_dashboard() {

            $usre_id = session('USER_ID');
            $order_model = Order::where(['user_id'=>$usre_id])->orderBy('created_at','desc')->get();
            $index = 0;
        foreach ($order_model as $key=> $list)       {

            $items = Order_item::where(['order_id'=>$list->id])->get();
                foreach ($items as  $value) {
                    $index++;
                    $result['item'][$index] = $value;
                    $result['item'][$index]->order_status = $list->order_status;
                    $result['item'][$index]->status = $list->status;
                }



            }









                return view('user.user_dashboard',$result);
    }


    // dashboard end


    // user account end



}
