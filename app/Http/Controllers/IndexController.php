<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
    public function index(){
        //In ascending order by default
        $productsAll = product::get();

        //In ascending order 
        $productsAll = Product::orderBy('id','DESC')->get();

        //In Random Order
        $productsAll = product::inRandomOrder()->get();
        return view('index')->with(compact('productsAll'));
    }
}
