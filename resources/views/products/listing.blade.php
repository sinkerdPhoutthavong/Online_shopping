@extends('layouts.frontLayout.front_design')
@section('content')

@include('.products.section');

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                {{-- <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                       
                        <div class="panel panel-default">
                                @foreach ($categories as $cat)
                                @if ($cat->status == 1)
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$cat->name}}
										</a>
									</h4>
								</div>
								<div id="{{$cat->id}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
                                            @foreach ($cat->categories as $subcat)
                                                @if ($subcat->status == 1)
                                                <li><a href="{{ asset('/products/'.$subcat->url)}}">{{$subcat->name}}</a></li>
                                                @endif
                                            @endforeach	
										</ul>
									</div>
                                </div>
                                @endif
                                @endforeach
							</div>
                    </div><!--/category-products-->
                
                </div> --}}
                @include('Layouts.frontLayout.front_sidebar')
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><font face="phetsarath OT">
                        @if (!empty($search_Products))
                            {{$search_Products}} Items
                        @else
                            {{$cateogoryDetails->name}} Items
                        @endif
                        
                    </font></h2>
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
                                    <a href="{{url('product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font face="phetsarath OT">ເພີ່ມລົງກະຕ່າ </font></a>
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
                </div><!--features_items-->
                
            </div>
        </div>
    </div>
</section>

@endsection