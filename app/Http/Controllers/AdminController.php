<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\user;
use App\admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
       if($request->isMethod('post')){
           $data = $request->input();
           $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=>1])->count();
           if($adminCount>0){
                Session::put('adminSession',$data['username']);
               return redirect('/admin/dashboard');  
           }else{
               return redirect('/admin')->with('flash_message_error','ອີເມວ ຫຼື ລະຫັດຜ່ານ ຂອງທ່ານບໍ່ຖືກຕ້ອງ');
           }
       }
        return view('admin.admin_login');
    }
    public function dashboard(){
       return view('admin.dashboard');
    }
    public function logout(){
        Session::forget('adminSession');
        return redirect('/admin')->with('flash_message_success','ທ່ານອອກຈາກລະບົບ ຮຽບຮ້ອຍແລ້ວ');
    }
    
    public function settings(){
        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
        // $adminDetails = json_decode(json_encode($adminDetails));
        // echo "<pre>";print_r($adminDetails);die;
        return view('admin.settings')->with(compact('adminDetails'));
    }
    public function chkPassword(Request $request){
            $data = $request->all();
            $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
            if ( $adminCount == 1){
                echo "true"; die;
            }else{
                echo "False"; die;
            }
    }
    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
            if ( $adminCount == 1){
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','ອັບເດດລະຫັດຜ່ານສຳເລັດແລ້ວ!!');
            }else{
                return redirect('/admin/settings')->with('flash_message_error','ລະຫັດຜ່ານປະຈຸບັນຂອງທ່ານບໍ່ຖືກຕ້ອງ !!');
            }
        }
    }
}
