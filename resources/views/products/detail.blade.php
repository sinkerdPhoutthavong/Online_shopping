@extends('layouts.frontLayout.front_design')
@section('content')

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                       @include('Layouts.frontLayout.front_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
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
						<div class="col-sm-5">
							<div class="view-product">
									<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
										<a href="{{asset('images/backend_images/products/large/'.$productDetails->image)}}">
                                    		<img style="width:300px;" class="MainImage" src="{{asset('images/backend_images/products/medium/'.$productDetails->image)}}"  alt="" />
										{{-- <h3><font face="phetsarath OT">ຊຸມ</font></h3> --}}
										</a>
									</div>	
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active thumbnails">
												<a href="{{asset('images/backend_images/products/large/'.$productDetails->image)}}" data-standard="{{asset('images/backend_images/products/large/'.$productDetails->image)}}">
													<img class="ChangeImage" style="width:50px;" class="MainImage" src="{{asset('images/backend_images/products/medium/'.$productDetails->image)}}"  alt="" />
												{{-- <h3><font face="phetsarath OT">ຊຸມ</font></h3> --}}
												</a>
										@foreach ($productAltImage as $image)
										<a href="{{asset('images/backend_images/products/medium/'.$image->image)}}" data-standard="{{asset('images/backend_images/products/medium/'.$image->image)}}">
										<img class="ChangeImage" style="width:50px; cursor:pointer;" src="{{asset('images/backend_images/products/medium/'.$image->image)}}" alt="">
										</a>
										@endforeach
										</div>
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
				<div class="col-sm-7">
					 <form action="{{url('add-cart')}}" name="addtocartForm" id="addtocartForm" method="POST">
							{{ csrf_field() }}
						 <input type="hidden" name="product_id" value="{{$productDetails->id}}">
						 <input type="hidden" name="product_name" value="{{$productDetails->product_name}}">
						 <input type="hidden" name="product_code" value="{{$productDetails->product_code}}">
						 <input type="hidden" name="product_color" value="{{$productDetails->product_color}}">
						 <input type="hidden" name="price" id="price" 
						 value=" 
						 			<?php
                                                    $price_amount = $productDetails->price;
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
                                                                                    
                                    ?>">
								<div class="product-information"><!--/product-information-->
									<img src="" class="newarrival" alt="" />
										<h2><font face="phetsarath OT">{{$productDetails->product_name}}</font></h2>
										<p><font face="phetsarath OT">ລະຫັດສິນຄ້າ</font>: {{$productDetails->product_code}}</p>
										<p>
											<select id="selSize" name="size" style="width:150px;">
												<option value="">select size</option>
												@foreach ($productDetails->attributes as $sizes)
												<option value="{{$productDetails->id}}-{{$sizes->size}}">{{$sizes->size}}</option>
												@endforeach
											</select>
										</p>
										<span>
										<span id="getPrice"><font face="phetsarath OT">ລາຄາ:
											<?php
                                                    $price_amount = $productDetails->price;
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
                                            <font face="phetsarath OT">ກີບ</font></span>
										</span>
										<span>
											<label><font face="phetsarath OT">ຈໍານວນ:</font></label>
											<input type="text" name="quantity" value="1" readonly />
											@if ($total_stock>0)
												<button type="submit" class="btn btn-fefault cart" id="cartButton">
													<i class="fa fa-shopping-cart"></i>
													<font face="phetsarath OT"> ເພີ່ມລົງກະຕ່າ</font>
												</button>	
											@else
												<button type="button" class="btn btn-fefault cart" id="cartButton1">
													<i class="fa fa-shopping-cart"></i>
													<font face="phetsarath OT">ຂໍອະໄພ ສິນຄ້າໝົດ</font>
												</button>
											@endif
										</span>
										<p><b><font face="phetsarath OT">ສະຖານະຂອງສິນຄ້າ: </font></b>
											<span id="Availability">
											@if ($total_stock>0)
													
												<font face="phetsarath OT" color="green"> <b>ສິນຄ້າມີໃນສາງ </b> </font>
													
												@else
													
												<font face="phetsarath OT" color="red"><b>ຂໍອະໄພ !! ສິນຄ້າໝົດ</b></font>
											@endif
										</span></p>
										<p><b>Condition:</b> New</p>
								</div><!--/product-information-->
						</form>
					</div>
			</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#description" data-toggle="tab"><font face="phetsarath OT">ຄໍາອະທິບາຍ</font></a></li>
								<li><a href="#care" data-toggle="tab"><font face="phetsarath OT">ວັດສະດຸ</font></a></li>
								<li><a href="#delivery" data-toggle="tab"><font face="phetsarath OT">ຮູບແບບການຈັດສົ່ງ</font></a></li>
								<li class="active"><a href="#reviews" data-toggle="tab"><font face="phetsarath OT">ຄໍາແນະນໍາ (5)</font></a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="description" >
                                    <div class="col-sm-12">
                                            <center><p> {{$productDetails->description}}</p></center>
                                    </div>
							</div>
							
							<div class="tab-pane fade active in" id="care" >
                                    <div class="col-sm-12">
                                        <center><p> {{$productDetails->care}}</p></center>
                                    </div>
							</div>
							
							<div class="tab-pane fade active in" id="delivery" >
                                    <div class="col-sm-12">
                                            <center><P> ສິນຄ້າຂອງແທ້ 100% ຮັບປະກັນຄຸນນະພາບ<br>
                                            ຈ່າຍເງິນທີ່ປາຍທາງ</P></center>
                                    </div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center"><font face="phetsarath OT">ລາຍການສິນຄ້າແນະນໍາ</font></h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count=1; ?>
									@foreach($ralatedProducts->chunk(3) as $chunk)
										<div <?php if($count==1){?>  class="item active"  <?php } else {?>} class="item" <?php }?> >
											@foreach($chunk as $item)
												<div class="col-sm-4">
													<div class="product-image-wrapper">
														<div class="single-products">
															<div class="productinfo text-center">
																<img style="width:200px;" src="{{asset('images/backend_images/products/medium/'.$item->image)}}" alt="" />
																<h2>{{$item->price}}<font face="phetsarath OT"> ກີບ</font></h2>
																<p><font face="phetsarath OT">{{$item->product_name}}</font></p>
																<a href="{{url('product/'.$item->id)}}"<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font face="phetsarath OT"> ເພີ່ມລົງກະຕ່າ</a></font></button>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										</div>
										<?php $count++;?>
									@endforeach
									
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
@endsection