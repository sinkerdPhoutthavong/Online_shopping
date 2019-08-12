<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller
{
    public function addCurrency(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            if($data['status']=="on"){
                $status="1";
            }else{
                $status="0";
            }
            $currency = new Currency;
            $currency->currency_code = $data['currency_code'];
            $currency->exchange_rate = $data['exchange_rate'];
            $currency->status = $status;
            $currency->save();
            return redirect('/admin/view-currencies')->with('flash_message_success','ເພີ່ມສະກຸນເງິນສໍາເລັດແລ້ວ');
        }
        return view('admin.currencies.add_currency');
    }
    public function viewCurrencies(){
        $currencies = Currency::get();
        return view('admin.currencies.view_currencies')->with(compact('currencies'));
    }
    public function editCurrency(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            //   echo "<pre>";print_r($data);die;
            if($data['status']=="1"){
                $status="1";
            }else{
                $status="0";
            }
            Currency::where(['id'=>$id])->update(['currency_code'=>$data['currency_code'],'exchange_rate'=>$data['exchange_rate'],'status'=>$status]);
            return redirect('/admin/view-currencies')->with('flash_message_success','ແກ້ໄຂສະກຸນເງິນສໍາເລັດແລ້ວ');
       }
        $currencyDetails = Currency::where('id',$id)->first();
        return view('admin.currencies.edit_currency')->with(compact('currencyDetails'));
    }
    public function deleteCurrency($id = null){
        if(!empty($id)){
            Currency::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','ລຶບສະກຸນເງິນສຳເລັດແລ້ວ!!');
        }
    }
}
