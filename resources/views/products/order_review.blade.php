@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
                <div class="breadcrumbs">
						<ol class="breadcrumb">
						  <li><a href="{{url('/')}}">Home</a></li>
						  <li class="active"> <font face="phetsarath OT">ການຊໍາລະສິນຄ້າ ແລະ ການຈັດສົ່ງ</font></li>
						</ol>
					</div><!--/breadcrums-->
                @if (Session::has('flash_message_error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                        <font face="phetsarath OT" size="2px">
                                <center>
                        <strong>{!!session('flash_message_error')!!}</strong>
                                 </center>
                        </font> 
                      </div>
                @endif  
                @if (Session::has('flash_message_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                        <font face="phetsarath OT" size="2px">
                                <center>
                        <strong>{!!session('flash_message_success')!!}</strong>
                                 </center>
                        </font> 
                      </div>
                @endif 
			<div class="step-one">
                <center><h1 class="heading"><font face="phetsarath OT">ການຊໍາລະສິນຄ້າ ແລະ ການຈັດສົ່ງ</font></h1></center>
            </div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-3">
						<div class="shopper-info">
                            <p><font face="phetsarath OT"><b>ຂໍ້ມູນຜູ່ສັ່ງຊື້ສິນຄ້າ</b></font></p>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ຊື່: {{$userDetails->name}}</font></h5>
                            </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ອີເມວ: {{$userDetails->email}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ບ້ານ: {{$userDetails->address}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ເມືອງ: {{$userDetails->city}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ແຂວງ: {{$userDetails->state}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ປະເທດ: {{$userDetails->country}}</font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ລະຫັດໄປສະນີ: {{$userDetails->pincode}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ເບີໂທລະສັບ: {{$userDetails->mobile}} </font></h5>
                                </div>
						</div>
					</div>
					<div class="col-sm-5 col-sm-offset-0">
						<div class="shopper-info">
                            <p><b><font face="phetsarath OT">ສະຖານທີ່ຈັດສົ່ງສິນຄ້າ</b></font></p>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ຊື່: {{$shippingDetails->name}}</font></h5>
                            </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ອີເມວ: {{$shippingDetails->user_email}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ບ້ານ: {{$shippingDetails->address}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ເມືອງ: {{$shippingDetails->city}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ແຂວງ: {{$shippingDetails->state}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ປະເທດ: {{$shippingDetails->country}}</font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ລະຫັດໄປສະນີ: {{$shippingDetails->pincode}} </font></h5>
                                </div>
                            <div class="form-group">
                                <h5><font face="phetsarath OT">ເບີໂທລະສັບ: {{$shippingDetails->mobile}} </font></h5>
                                </div>
                                
						</div>
					</div>			
				</div>
			</div>
			<div class="review-payment">
				<h2><font face="Times new roman">I </font><b><font face="phetsarath OT">ກວດສອບ ແລະ ການຊໍາລະສິນຄ້າ</b></font></h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
                        <thead>
                             <tr class="cart_menu">
                                    <td class="image"><font face="phetsarath OT">ຮູບພາບຂອງສິນຄ້າ</font></td>
                                    <td class="description"><font face="phetsarath OT">ຊື່ສິນຄ້າ</font></td>
                                    <td class="price"><font face="phetsarath OT">ລາຄາສິນຄ້າ</font></td>
                                    <td class="color"><font face="phetsarath OT">ສີ</font></td>
                                    <td class="quantity"><font face="phetsarath OT">ຈໍານວນ</font></td>
                                    <td class="total"><font face="phetsarath OT">ລາຄາລວມສິນຄ້າ</font></td>
                                    <td></td>
                                </tr>
                        </thead>
					<tbody>
                        <?php $total_amount = 0; ?>
                            @foreach ($userCart as $cart)
                            <tr>
                                    <td class="cart_product">
                                    <a href=""><img style="width:100px;" src="{{asset('images/backend_images/products/medium/'.$cart->image)}}" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""><font face="phetsarath OT">{{$cart->product_name}}</font></a></h4>
                                        <p><font face="phetsarath OT">{{$cart->product_code}} || {{$cart->size}}</font></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php
                                                $price_amount = $cart->price;
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
                                                                }                     
                                            ?>
                                            <font face="phetsarath OT"> ກີບ</font></p>
                                        </p>
                                    </td>
                                    <td class="cart_color">
                                            <p>{{$cart->product_color}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            @if ($cart->quantity>=1)
                                            <h4>{{$cart->quantity}} </h4>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php
                                            $price_amount = $cart->price * $cart->quantity;
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
                                                                }            
                                        ?>
                                        <font face="phetsarath OT"> ກີບ</font></p>
                                    </td>
                                    <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                                    </td>
                            </tr>
                            <?php $total_amount = $total_amount + ( $cart->price * $cart->quantity);?>
                        @endforeach
                                <tr>
                                        <td colspan="4">&nbsp;</td>
                                        <td colspan="2">
                                            <table class="table table-condensed total-result">
                                                <tr>
                                                    <td><font face="phetsarath OT">ລາຄາລວມສິນຄ້າ</font></td>
                                                    <td>
                                                        <?php 
                                                                //use for split yaek array
                                                                $totals = preg_split('//', $total_amount, -1, PREG_SPLIT_NO_EMPTY);
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
                                                                }
                                                                
                                                        ?>
                                                    <font face="phetsarath OT"> ກີບ</font></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="phetsarath OT"> ຄ່າຂົນສົ່ງ (+)</font></td>
                                                    <td><font face="phetsarath OT"> ຟຣີ</font></td>
                                                </tr>
                                                <tr class="shipping-cost">
                                                    <td><font face="phetsarath OT"> ສ່ວນຫຼຸດທີ່ໄດ້ຮັບ (-)</font></td>
                                                    <td>
                                                        @if (!empty(Session::get('CouponAmount')))
                                                        <?php 
                                                        $total_amount_coupong = Session::get('CouponAmount');
                                                        //use for split yaek array
                                                        $totals = preg_split('//', $total_amount_coupong, -1, PREG_SPLIT_NO_EMPTY);
                                                        // print_r($totals);
                                                        //count index in array
                                                        $countArray = count($totals) ;
                                                        // echo $countArray;

                                                        if($countArray==8){
                                                            echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                                        }
                                                        elseif($countArray==9){
                                                            echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5].".".$totals[6].$totals[7].$totals[8];
                                                        }
                                                        elseif ($countArray==7) {
                                                            echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                                        }
                                                        elseif ($countArray==6) {
                                                            echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                                        }
                                                        elseif ($countArray==5) {
                                                            
                                                            echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                                        }
                                                ?><font face="phetsarath OT"> ກີບ</font>
                                                        @else   
                                                            0<font face="phetsarath OT"> ກີບ</font>
                                                        @endif
                                                    </td>									
                                                </tr>
                                                <tr>
                                                    <td><font face="phetsarath OT"> ລວມລາຄາສິນຄ້າທັງໝົດທີ່ຕ້ອງຈ່າຍ</font></td></td>
                                                <td><span>
                                                        <?php 
                                                            $Grand_total = $total_amount - Session::get('CouponAmount');
                                                            //use for split yaek array
                                                            $totals = preg_split('//', $Grand_total, -1, PREG_SPLIT_NO_EMPTY);
                                                            // print_r($totals);
                                                            //count index in array
                                                            $countArray = count($totals) ;
                                                            // echo $countArray;

                                                            if($countArray==8){
                                                                echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4].".".$totals[5].$totals[6].$totals[7];
                                                            }
                                                            elseif($countArray==9){
                                                                echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5].".".$totals[6].$totals[7].$totals[8];
                                                            }
                                                            elseif ($countArray==7) {
                                                                echo $totals[0].".".$totals[1].$totals[2].$totals[3].".".$totals[4].$totals[5].$totals[6];
                                                            }
                                                            elseif ($countArray==6) {
                                                                echo $totals[0].$totals[1].$totals[2].".".$totals[3].$totals[4].$totals[5];
                                                            }
                                                            elseif ($countArray==5) {
                                                                
                                                                echo $totals[0].$totals[1].".".$totals[2].$totals[3].$totals[4];
                                                            }
                                                    ?><font face="phetsarath OT"> ກິບ</font>
                                                </span></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
					</tbody>
				</table>
            </div>
        <form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="POST">
            {{ csrf_field() }}
                <input type="hidden" name="grand_total" value="{{$Grand_total}}">
                <div class="payment-options">
                        <div class="signup-form">
                        <h4><font face="Times new roman">II </font><b><font face="phetsarath OT"> ທາງເລືອກສຳລັບການຊໍາລະສິນຄ້າ</b></font></h4>
                        <span>
                            <label for=""><strong><font face="phetsarath OT"> ການຊໍາລະສິນຄ້າ: </b></font></strong></label>
                        </span>
                        <span>
                            <label><input type="radio" name="payment_method" id="bank" value="bank"><strong><font face="phetsarath OT"> ໂອນຜ່ານບັນຊີທະນາຄານ</b></font></strong></label>
                        </span>
                        @if($codpincodeCount>0)
                        <span>
                                <label><input type="radio" name="payment_method" id="COD"value="COD"><strong><font face="phetsarath OT"> ຈ່າຍເງິນປາຍທາງ</b></font></strong></label>
                        </span>
                        @endif
                        <span>
                            <label><input type="radio" name="payment_method" id="pay_in_offices" value="pay_in_offices"><strong><font face="phetsarath OT"> ຈ່າຍເງິນສົດທີ່ຫ້ອງການ</b></font></strong></label>
                        </span>
                        <span style="float:right;">
                        <button type="submit" class="btn btn-success" onclick="return selectPaymentMethod();"><font face="phetsarath OT">ຢືນຢັນການສັ່ງຊື້ ແລະ ຊໍາລະສິນຄ້າ</font></button>
                        </span>
                </div>
            </div>
        </form>
		</div>
</section> <!--/#cart_items-->

@endsection