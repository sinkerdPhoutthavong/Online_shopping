<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
                <h2><font face="phetsarath OT" color="#26A69A">ເວັບໄຊ</font><font face="times new roman" color="#616161"> E-SMSHOPPER.COM</font></h2><hr>
            <center><h3><font face="phetsarath OT">ໃບບິນການສັ່ງຊື້ສິນຄ້າ ເລກທີສັ່ງຊື້: {{$orderDetails->id}} </h3></center>
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
                    <div class="col-xs-12 text-right">
                    <?php
                            $date_times = explode(" ",$orderDetails->created_at);
                            $date = explode("-",$date_times[0]);
                            echo " <h4>ເວລາ: ".$date_times[1]."</h4>";
                            $date = "<h4>ວັນທີ ".$date[2]." ເດືອນ ".$date[1]." ປີ ".$date[0]."</h4>";
                            echo $date;
                        ?>
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
                                            <th class="text-center"><center><font face="phetsarath OT" color="teal">ລະຫັດສິນຄ້າ</center></font></th>
                                            <th class="text-center"><center><font face="phetsarath OT" color="teal">ຊື່</center></font></th>
                                            <th class="text-center"><center><font face="phetsarath OT" color="teal">ຂະໜາດ</center></font></th>
                                            <th class="text-center"><center><font face="phetsarath OT" color="teal">ສີ</center></font></th>
                                            <th class="text-center"><center><font face="phetsarath OT" color="teal">ລາຄາ</center></font></th>
                                            <th class="text-center"><center><font face="phetsarath OT" color="teal">ຈໍານວນສິນຄ້າ</center></font></th>
                                            <th class="text-right"><center><font face="phetsarath OT" color="teal">ລາຄາລວມສິນຄ້າ</center></font></th>
                                        </tr>
    						</thead>
    						<tbody>
                                <?php $total_amount = 0;
                                    $Subtotal=0;?>
                                @foreach ($orderDetails->orders as $pro)
                                <tr>
                                    <td class="text-center">{{$pro->product_code}}</td>
                                    <td class="text-center">{{$pro->product_name}}</td>
                                    <td class="text-center">{{$pro->product_size}}</td>
                                    <td class="text-center">{{$pro->product_color}}</td>
                                    <td class="text-center">
                                        <?php
                                            $price_amount = $pro->product_price;
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
                                    <td class="text-center">{{$pro->product_qty}}</td>
                                    <td class="text-right">
                                            <?php
                                            $price_amount = $pro->product_price * $pro->product_qty;
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
                                </tr>

                                <?php 
                                    $Subtotal = $Subtotal + ($pro->product_price * $pro->product_qty);
                                 ?>
                            @endforeach
                           
                                            <table class="table table-condensed total-result">
                                                <tr>
                                                    <td class="col-xs-10 text-right"><font face="phetsarath OT">ລາຄາລວມສິນຄ້າ</font></td>
                                                    <td class="text-right">
                                                        <?php 
                                                                $total_amount = $Subtotal;
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
                                                        <font face="phetsarath OT"> ກີບ</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td class="col-xs-10 text-right"><font face="phetsarath OT"> ຄ່າຂົນສົ່ງ (+)</font></td>
                                                        <td class="text-right"><font face="phetsarath OT"> ຟຣີ</font></td>
                                                </tr>
                                                <tr class="shipping-cost">
                                                    <td class="col-xs-10 text-right"><font face="phetsarath OT"> ສ່ວນຫຼຸດທີ່ໄດ້ຮັບ (-)</font></td>
                                                    <td class="text-right">  <font color="red">
                                                        @if ($orderDetails->coupon_amount>0)
                                                        <?php 
                                                        $total_amount_coupong = $orderDetails->coupon_amount;
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
                                                    </font><font face="phetsarath OT"> ກີບ</font>
                                                        @else  
                                                            <?php 
                                                            $total_amount_coupong =0 ?>
                                                            0 </font><font face="phetsarath OT"> ກີບ</font>
                                                        @endif
                                                    </td>									
                                                </tr>
                                                <tr>
                                                    <td class="col-xs-10 text-right"><font face="phetsarath OT"> ລວມລາຄາສິນຄ້າທັງໝົດທີ່ຕ້ອງຈ່າຍ</font></td>
                                                    <td class="text-right"> <font color="green">
                                                    <span>
                                                        <?php 
                                                            if ($total_amount_coupong>0) {
                                                                    $Grand_total = $Subtotal - $total_amount_coupong;
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
                                                            }else{
                                                                    $Grand_total = $Subtotal;
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
                                                            }
                                                            
                                                    ?></font><font face="phetsarath OT"> ກິບ</font>
                                                    </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        </td>
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