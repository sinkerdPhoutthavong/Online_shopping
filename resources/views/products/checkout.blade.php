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
                <center><h1 class="heading"><font face="phetsarath OT">ຂັ້ນຕອນການຊໍາລະສິນຄ້າ</font></h1></center>
            </div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2">
						<div class="shopper-info">
                             <p><font face="phetsarath OT">ຂໍ້ມູນຜູ່ສັ່ງຊື້ສິນຄ້າ</font></p>
                            <form>
                                {{ csrf_field() }}
                                    <input id="billing_name" name="billing_name" type="text" placeholder="Name" value="{{$userDetails->name}}">
                                    <input id="billing_address" name="billing_address" type="text" placeholder="Address" value="{{$userDetails->address}}">
                                    <input id="billing_email" name="billing_email" type="email" placeholder="Email" value="{{$userDetails->email}}">
                                    <input id="billing_city" name="billing_city" type="text" placeholder="City" value="{{$userDetails->city}}">
                                    <input id="billing_state" name="billing_state" type="text" placeholder="State" value="{{$userDetails->state}}">
                                    <select name="billing_country" id="billing_country">
                                            <option value=""><font face="phetsarath OT">ເລືອກປະເທດ</font></option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->country_name}}" 
                                                @if ($country->country_name == $userDetails->country) selected @endif
                                            ><font face="phetsarath OT">{{$country->country_name}}</font></option>
                                        @endforeach
                                    </select>
                                    {{-- <input style="margin-top:10px;" id="billing_country" name="billing_country" type="text" placeholder="Country" value="{{$userDetails->country}}"> --}}
                                    <input style="margin-top:10px;" id="billing_pincode" name="billing_pincode" type="text" placeholder="Pincode" value="{{$userDetails->pincode}}">
                                    <input id="billing_mobile" name="billing_mobile" type="text" placeholder="Mobile" value="{{$userDetails->mobile}}">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="copyAddress">
                                        <label type="form-check-lable" for="copyAddress" ><font face="phetsarath OT"> ສະຖານທີ່ຈັດສົ່ງສິນຄ້າ ຄື ກັນກັບຂໍ້ມູນຜູ່ສັ່ງຊື້ສິນຄ້າ</font></label>
                                    </div>
                                    
                            </form>
						</div>
					</div>
					<div class="col-sm-4 col-sm-offset-0">
						<div class="shopper-info">
							<p><font face="phetsarath OT">ສະຖານທີ່ຈັດສົ່ງສິນຄ້າ</font></p>
                                <form action="{{url('/checkout')}}" method="POST">
                                    {{ csrf_field() }}
                                <input id="shipping_name" name="shipping_name" type="text" placeholder="Name" value="{{$shippingDetails->name}}">
                                    <input id="shipping_address" name="shipping_address" type="text" placeholder="Address" value="{{$shippingDetails->address}}">
                                    <input id="shipping_email" name="shipping_email" type="email" placeholder="Email" value="{{$shippingDetails->user_email}}">
                                    <input id="shipping_city" name="shipping_city" type="text" placeholder="City" value="{{$shippingDetails->city}}">
                                    <input id="shipping_state" name="shipping_state"type="text" placeholder="Province" value="{{$shippingDetails->state}}">
                                    <select name="shipping_country" id="shipping_country">
                                            <option value=""><font face="phetsarath OT">ເລືອກປະເທດ</font></option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->country_name}}" 
                                            @if ($country->country_name == $shippingDetails->country) selected @endif
                                            ><font face="phetsarath OT">{{$country->country_name}}</font></option>
                                        @endforeach
                                    </select>
                                    <input style="margin-top:10px;" id="shipping_pincode" name="shipping_pincode" type="text" placeholder="Pincode" value="{{$shippingDetails->pincode}}">
                                    <input id="shipping_mobile" name="shipping_mobile" type="text" placeholder="Mobile" value="{{$shippingDetails->mobile}}">
                                    <button type="submit" class="btn btn-primary"><font face="phetsarath OT">ດໍາເນີນການຕໍ່</font></button>
                                </form>
                               
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