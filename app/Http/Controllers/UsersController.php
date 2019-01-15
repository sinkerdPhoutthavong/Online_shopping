<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class UsersController extends Controller
{
    public function userLogin(){
        // return view('users.login_register');
        return view('users.login');
    }
    public function userRegister(){
        return view('users.register');
    }
    public function register(Request $request){
        if($request->isMethod('post')){
           $data = $request->all();
        //    echo "<pre>";print_r($data);die;
            //CHECK IF USER ALREADY EXISTS
            $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                return redirect()->back()->with('flash_message_error','ສະໝັກສະມາຊິກບໍ່ສໍາເລັດ ເນື່ອງຈາກທ່ານເປັນສະມາຊິກໃນລະບົບແລ້ວ!!');
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->admin = 0;
                $user->save();
                // if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                //     Session::put('frontSession',$data['email']);
                return redirect()->back()->with('flash_message_error','ສະໝັກສະມາຊິກສໍາເລັດແລ້ວ!!');
                // }
               
            }
        }
    }
    public function checkEmail(Request $request){
            $data = $request->all();
            $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                echo "false";
            }else{
                echo "true";die;
            }
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'0'])){
                Session::put('frontSession',$data['email']);
                return redirect('/cart');
                //Session::put('adminSession',$data['email']);
            }else{
                return redirect()->back()->with('flash_message_error','ອີເມວ ຫຼື ລະຫັດຜ່ານ ຂອງທ່ານບໍ່ຖືກຕ້ອງ');
            }
        }
    }
    public function account(){
        return view('users.account');
    }
    public function logout(){
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/');
    }
}

