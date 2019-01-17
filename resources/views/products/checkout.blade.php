@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
				<div class="breadcrumbs">
						<ol class="breadcrumb">
						  <li><a href="{{url('/')}}">Home</a></li>
						  <li class="active"> <font face="phetsarath OT">ຂັ້ນຕອນການຊໍາລະສິນຄ້າ</font></li>
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
									<input id="billing_email" name="billing_email" type="email" placeholder="Email" value="{{$userDetails->email}}">
									<input id="billing_address" name="billing_address" type="text" placeholder="Address" value="{{$userDetails->address}}">
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
                                <input id="shipping_name" name="shipping_name" type="text" placeholder="Name" @if ($shippingCount>0)
								 value="{{$shippingDetails->name}}"@endif>
								 <input id="shipping_email" name="shipping_email" type="email" placeholder="Email"  @if ($shippingCount>0) value="{{$shippingDetails->user_email}}" @endif>
                                    <input id="shipping_address" name="shipping_address" type="text" placeholder="Address"  @if ($shippingCount>0) value="{{$shippingDetails->address}}" @endif>
                                    <input id="shipping_city" name="shipping_city" type="text" placeholder="City"  @if ($shippingCount>0) value="{{$shippingDetails->city}}" @endif>
                                    <input id="shipping_state" name="shipping_state"type="text" placeholder="Province"  @if ($shippingCount>0) value="{{$shippingDetails->state}}"@endif>
                                    <select name="shipping_country" id="shipping_country">
                                            <option value=""><font face="phetsarath OT">ເລືອກປະເທດ</font></option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->country_name}}" 
												@if ($shippingCount>0) 	@if ($country->country_name == $shippingDetails->country) selected @endif   @endif  
                                            ><font face="phetsarath OT">{{$country->country_name}}</font></option>
                                        @endforeach
                                    </select>
                                    <input style="margin-top:10px;" id="shipping_pincode" name="shipping_pincode" type="text" placeholder="Pincode"  @if ($shippingCount>0) value="{{$shippingDetails->pincode}}" @endif>
                                    <input id="shipping_mobile" name="shipping_mobile" type="text" placeholder="Mobile"  @if ($shippingCount>0) value="{{$shippingDetails->mobile}}"@endif>
                                    <button type="submit" class="btn btn-primary"><font face="phetsarath OT">ດໍາເນີນການຕໍ່</font></button>
                                </form>
                               
						</div>
					</div>			
				</div>
            </div>
            <div class="review-payment">
                    <h2><font face="Times new roman">i </font><b><font face="phetsarath OT">ສິນຄ້າພາຍໃນກະຕ່າ</b></font></h2>
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
                                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
                                                @if ($cart->quantity>1)
                                                    
                                                @endif
                                                <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
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

@endsection