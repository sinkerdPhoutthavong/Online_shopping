@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('.')}}"><font face="phetsarath OT">ໜ້າຫຼັກ</font></a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
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
                                    <p>
										<?php
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
                                    <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
                                        <input  class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
                                        @if ($cart->quantity>1)
										<a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
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
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3><font face="phetsarath OT"># ກະລຸນາປ້ອນລະຫັດ</font><font face="Times New Roman">Coupon</font><font face="phetsarath OT">ທີ່ທ່ານຕ້ອງການຈະໃຊ້</font></h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
								<li class="single_field zip-field">
							<form action="{{url('/cart/apply-coupon')}}" method="POST">
											{{ csrf_field() }}
									<label><font face="phetsarath OT">ລະຫັດຄູປອງ: </font></label>
								<form action="{{url('/cart/apply-coupon')}}" method="POST">
									{{ csrf_field() }}
										<input  type="text" name="coupon_code">
										<input type="submit" value="Apply" class="btn btn-success">
									
								</form>
							</li>		
						</ul>		
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							@if (!empty(Session::get('CouponAmount')))
										<li><font face="phetsarath OT">ລາຄາລວມສິນຄ້າທັງໝົດ</font><span>
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
										?>
								<font face="phetsarath OT"> ກິບ</font></span></li>
								<li>
									<font face="phetsarath OT">ຈໍານວນສ່ວນຫຼຸດຈາກ Coupon</font><span>
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
								</span></li>
								<li>
									<font face="phetsarath OT">ລາຄາລວມສິນຄ້າທັງໝົດ ທີ່ຕ້ອງຈ່າຍ</font>
									<span>
										<?php 
										$Grand_total = $total_amount-$total_amount_coupong;
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
								?><font face="phetsarath OT"> ກິບ</font></span></li>
							@else
								<li><font face="phetsarath OT">ລາຄາລວມສິນຄ້າທັງໝົດ</font><span>
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
									<font face="phetsarath OT"> ກີບ</font></p></span></li>
							@endif
						</ul>
							<a class="btn btn-default update" href=""><font face="phetsarath OT">ອັບເດດ</font></a>
							<a class="btn btn-default check_out" href="{{url('/checkout')}}"><font face="phetsarath OT">ດຳເນີນການສັ່ງຊື້ສິນຄ້າ</font></a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection