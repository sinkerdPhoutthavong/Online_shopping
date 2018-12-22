<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\user;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function login(Request $request){
       if($request->isMethod('post')){
           $data = $request->input();
           if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
               return redirect('/admin/dashboard');
               //Session::put('adminSession',$data['email']);
           }else{
               return redirect('/admin')->with('flash_message_error','ອີເມວ ຫຼື ລະຫັດຜ່ານ ຂອງທ່ານບໍ່ຖືກຕ້ອງ');
           }
       }
        return view('admin.admin_login');
   }
   public function dashboard(){
       //protected the path access
    //    if (Session::has('adminSession')) {
           
    //    }else {
    //        return redirect('/admin')->with('flash_message_error','ກາລຸນາລ໋ອກອິນ ໃນນາມຂອງຜູ່ບໍລິຫານລະບົບ');
    //    }
       return view('admin.dashboard');
   }
   public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','ທ່ານອອກຈາກລະບົບ ຮຽບຮ້ອຍແລ້ວ');
    }
    public function settings(){
        return view('admin.settings');
    }
    public function chkPassword(Request $request){
            $data = $request->all();
            $current_password = $data['current_pwd'];
            $check_password = User::where(['admin'=>'1'])->first();
            if(Hash::check($current_password,$check_password->password)){
                echo "true"; die;
            }else{
                echo "False"; die;
            }
    }
    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            $check_password = User::where(['email'=> Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','ອັບເດດລະຫັດຜ່ານສຳເລັດແລ້ວ!!');
            }else{
                return redirect('/admin/settings')->with('flash_message_error','ລະຫັດຜ່ານປະຈຸບັນຂອງທ່ານບໍ່ຖືກຕ້ອງ !!');
            }
        }
    }
}
