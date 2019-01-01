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
                                    <p>{{$cart->price}}</p>
                                </td>
                                <td class="cart_color">
                                        <p>{{$cart->product_color}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
                                        @if ($cart->quantity>1)
                                            
                                        @endif
                                        <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                <p class="cart_total_price">{{$cart->price * $cart->quantity}}<font face="phetsarath OT"> ກີບ</font></p>
                                </td>
                                <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection