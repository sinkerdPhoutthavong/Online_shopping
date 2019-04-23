@extends('layouts.frontLayout.front_design')
@section('content')
        
@include('.products.section');
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('Layouts.frontLayout.front_sidebar')
            </div>        
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                     
                    <h2 class="title text-center"><font face="phetsarath OT">ສິນຄ້າທັງໝົດ</font></h2>
                    @foreach ($productsAll as $product)   
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/images/backend_images/products/medium/'.$product->image)}}" style="width:200px;">
                                        <h2>
                                                <?php
                                                $price_amount = $product->price;
                                                //use for split yaek array
                                                $totals = preg_split('//', $price_amount, -1, PREG_SPLIT_NO_EMPTY);
                                                                    // print_r($totals);
                                                                    //count index in array
                                                                    $countArray = count($totals) ;
                                                                    // echo $countArray;
                                                                    if($countArray==8){
                                                                        echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                                                    }
                                                                    elseif ($countArray==7) {
                                                                        echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                                                    }
                                                                    elseif ($countArray==6) {
                                                                        echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                                                    }
                                                                    elseif ($countArray==5) {
                                                                        echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                                                    }elseif ($countArray==4) {
                                                                        echo $totals[0].".".$totals[1].$totals[2].$totals[3];
                                                                    }                               
                                        ?>
                                            <font face="phetsarath OT"> ກີບ</font></h2>
                                        <p><font face="phetsarath OT"> {{$product->product_name}}</font></p>
                                        <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font face="phetsarath OT">ເພີ່ມລົງກະຕ່າ</font></a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <img src="{{asset('/images/backend_images/products/medium/'.$product->image)}}" style="width:200px;">
                                            <h2>
                                                <?php
                                                $price_amount = $product->price;
                                                //use for split yaek array
                                                $totals = preg_split('//', $price_amount, -1, PREG_SPLIT_NO_EMPTY);
                                                                    // print_r($totals);
                                                                    //count index in array
                                                                    $countArray = count($totals) ;
                                                                    // echo $countArray;
                                                                    if($countArray==8){
                                                                        echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                                                    }
                                                                    elseif ($countArray==7) {
                                                                        echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                                                    }
                                                                    elseif ($countArray==6) {
                                                                        echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                                                    }
                                                                    elseif ($countArray==5) {
                                                                        echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                                                    }elseif ($countArray==4) {
                                                                        echo $totals[0].".".$totals[1].$totals[2].$totals[3];
                                                                    }                               
                                        ?>
                                            <font face="phetsarath OT"> ກີບ</font></h2>
                                            <p><font face="phetsarath OT"> {{$product->product_name}}</font></p>
                                            <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font face="phetsarath OT">ເພີ່ມລົງກະຕ່າ</font></a>
                                        </div>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i><font face="phetsarath OT">ເພີ່ມສີ່ງທີ່ຢາກໄດ້</font></a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i><font face="phetsarath OT">ເພີ່ມເພື່ອປຽບທຽບ</font></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div align="center">{{$productsAll->links()}}</div>
                </div><!--features_items-->
                
        
            </div>
        </div>
    </div>
</section>

@endsection