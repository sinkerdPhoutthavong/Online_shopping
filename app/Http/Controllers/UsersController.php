<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
           $data = $request->all();
        //    echo "<pre>";print_r($data);die;
            //CHECK IF USER ALREADY EXISTS
            $userCount = User::where('email',$data['email'])->count();
            if($userCount>0){
                return redirect()->back()->with('flash_message_error','ສະໝັກສະມາຊິກບໍ່ສໍາເລັດ ເນື່ອງຈາກທ່ານເປັນສະມາຊິກໃນລະບົບແລ້ວ!!');
            }else{

            }
        }
        return view('users.login_register');
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
}
