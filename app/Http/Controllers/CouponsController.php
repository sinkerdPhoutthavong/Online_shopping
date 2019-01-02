<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')){
             $data = $request->all();
           //  echo "<pre>";print_r($data);die;
           if(empty($data['status'])){
               $data['status']="0";
           }
           if($data['status']=='on'){
            $data['status'] = "1";  
            }
             $coupon = new Coupon;
             $coupon->coupon_code = $data['coupon_code'];
             $coupon->amount = $data['amount'];
             $coupon->amount_type = $data['amount_type'];
             $coupon->expiry_date = $data['datepicker'];
             $coupon->status = $data['status'];
             $coupon->save();
             return redirect()->back()->with('flash_message_success','ທ່ານເພີ່ມ Coupon ສຳເລັດແລ້ວ!!');
        }
        return view('admin.coupons.add_coupon');
    }
    public function viewCoupons(){
        // $coupons = Coupon::orderBy('id','DESC')->get();
        // $coupons= json_decode(json_encode($coupons));
        // // foreach ($coupons as $key => $val) {
        // //     $category_name = Category::where(['id'=>$val->category_id])->first();
        // //     $products[$key]->category_name = $category_name->name;
        // // }
        // //echo "<pre>";print_r($products);die;
        $coupons = Coupon::get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }
    public function deleteCoupon($id=null){
        if(!empty($id)){
            Coupon::where(['id'=>$id])->delete();
            return redirect('/admin/view-coupons')->with('flash_message_success','ລຶບ Coupon ສຳເລັດແລ້ວ!!');
        }
    }
}
