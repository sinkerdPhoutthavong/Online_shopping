<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
                <h2><font face="phetsarath OT" color="#26A69A">ເວັບໄຊ</font><font face="times new roman" color="#616161"> E-SMSHOPPER.COM</font></h2><hr>
            <center><h3><font face="phetsarath OT">ໃບບິນການສັ່ງຊື້ສິນຄ້າ</h3></center><h3 class="pull-right">ເລກທີສັ່ງຊື້: </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
                        <div class="shopper-info">
                            <br>
                                <h4><font face="phetsarath OT"><b>ຂໍ້ມູນຜູ່ສັ່ງຊື້ສິນຄ້າ</b></font></h4>
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
                                    <h5><font face="phetsarath OT">ເບີໂທລະສັບ: {{$userDetails->mobile}} </font></h5>
                                    </div>
                            </div>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
                            <h4><b><font face="phetsarath OT">ສະຖານທີ່ຈັດສົ່ງສິນຄ້າ</b></font></h4>
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
                                <h5><font face="phetsarath OT">ເບີໂທລະສັບ: {{$shippingDetails->mobile}} </font></h5>
                                </div>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			{{-- <div class="col-xs-6">
    				<address>
    					<strong><font face="phetsarath OT">ຮູບແບບການຊໍາລະສິນຄ້າ:</font></strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div> --}}
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong><font face="phetsarath OT">ວັນທີສັ່ງຊື້ສິນຄ້າ:</font></strong><br>
                        <?php
                            // $date = explode(" ",$orderDetails->created_at);
                            // $date = explode("-",$date[0]);
                            // echo "ວັນທີ ".$date[2]." ເດືອນ ".$date[1]." ປີ ".$date[0];
                        ?>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong><font face="phetsarath OT">ລາຍລະອຽດການສັ່ງຊື້:</font></strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                    <tr>
                                            <th><center><font face="phetsarath OT" color="teal">ເລກທີການສັ່ງຊື້</center></font></th>
                                            <th><center><font face="phetsarath OT" color="teal">ສິນຄ້າທີ່ສັ່ງຊື້</center></font></th>
                                            <th><center><font face="phetsarath OT" color="teal">ຊ່ອງທາງການຊໍາລະສິນຄ້າ</center></font></th>
                                            <th><center><font face="phetsarath OT" color="teal">ລາຄາສິນຄ້າ</center></font></th>
                                            <th><center><font face="phetsarath OT" color="teal">ວັນທີການສັ່ງຊື້ສິນຄ້າ</center></font></th>
                                            <th><center><font face="phetsarath OT" color="teal">ສະຖານະການສັ່ງຊື້</center></font></th>
                                        </tr>
    						</thead>
    						<tbody>
                                <?php $total_amount=0;?>
                                @foreach ($orderDetails['orders'] as $order)
                            <tr>
                                    <td class="cart_product">
                                   
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""><font face="phetsarath OT">{{$order->product_name}}</font></a></h4>
                                        <p><font face="phetsarath OT">{{$order->product_code}} || {{$order->size}}</font></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php
                                                $price_amount = $order->price;
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
                                            <p>{{$order->product_color}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            @if ($order->quantity>=1)
                                            <h4>{{$order->quantity}} </h4>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php
                                            $price_amount = $order->price * $order->quantity;
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
                                    <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$order->id)}}"><i class="fa fa-times"></i></a>
                                    </td>
                            </tr>
                            <?php $total_amount = $total_amount + ( $order->price * $order->quantity);?>
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
                                                        ?>
                                                <font face="phetsarath OT"> ກີບ</font>
                                                        @else   
                                                            0<font face="phetsarath OT"> ກີບ</font>
                                                        @endif
                                                    </td>									
                                                </tr>
                                                <tr>
                                                    <td><font face="phetsarath OT"> ລວມລາຄາສິນຄ້າທັງໝົດທີ່ຕ້ອງຈ່າຍ</font></td></td>
                                                <td>
                                                    <span>
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
    			</div>
    		</div>
    	</div>
    </div>
</div>