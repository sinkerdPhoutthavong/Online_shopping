<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use App\Country;
use function GuzzleHttp\json_decode;

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
    public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $userDetails = json_decode(json_encode($userDetails));
        // echo "<pre>";print_r($userDetails);die;
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['state'])){
                $data['address'] = '';
            }
            if(empty($data['address'])){
                $data['address'] = '';
            }
            if(empty($data['city'])){
                $data['city'] = '';
            }
            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','ກາລຸນາປ້ອນຊື່ຜູ່ໃຊ້!!');
            }else{
                $mobile = is_numeric ($data['mobile']) ? true : false;
                if($mobile==true){
                    $user = User::find($user_id);
                    $user->name = $data['name'];
                    $user->address = $data['address'];
                    $user->city = $data['city'];
                    $user->state = $data['state'];
                    $user->country = $data['country'];
                    $user->pincode = $data['pincode'];
                    $user->mobile = $data['mobile'];
                    $user->save();
                    return redirect()->back()->with('flash_message_success','ທ່ານອັບເດດບັນຊີສໍາເລັດແລ້ວ!!');
                }else{
                    return redirect()->back()->with('flash_message_error','ກະລຸນາປ້ອນເບີໂທລະສັບໃຫ້ຖືກຕ້ອງ!!');
                }
            }
        }
        $countries = Country::get();
        return view('users.account')->with(compact("countries","userDetails"));
    }
    public function logout(){
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/');
    }
}

