<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;
use DB;

class Product extends Model
{
    public function attributes(){
        return $this->hasMany('App\ProductsAttribute','product_id');
    }
    public static function cartCount(){
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $cartCount = DB::table('carts')->where('user_email',$user_email)->sum('quantity');
            //User is Logged, We will use Auth";
        }else{
            $session_id = Session::get('session_id');
            $cartCount = DB::table('carts')->where('session_id',$session_id)->sum('quantity');
            //User is not logged, WE will use Session";
        }
        return $cartCount;
    }
    public static function productCount($cat_id){
        $catCount = Product::where(['category_id'=>$cat_id,'status'=>1])->count();
        return $catCount;
    }
}
