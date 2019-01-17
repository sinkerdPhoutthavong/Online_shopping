@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
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
					<div class="col-sm-4 col-sm-offset-2">
						<div class="shopper-info">
                            <p><font face="phetsarath OT">ຂໍ້ມູນຜູ່ສັ່ງຊື້ສິນຄ້າ</font></p>
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
					<div class="col-sm-4 col-sm-offset-0">
						<div class="shopper-info">
                            <p><font face="phetsarath OT">ສະຖານທີ່ຈັດສົ່ງສິນຄ້າ</font></p>
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
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/two.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/three.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
</section> <!--/#cart_items-->

@endsection