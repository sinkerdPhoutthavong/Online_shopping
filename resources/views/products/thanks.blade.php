@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('.')}}"><font face="phetsarath OT">ໜ້າຫຼັກ</font></a></li>
				  <li class="active">Success</li>
				</ol>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading" align="center">
                {{-- <h2><font face="phetsarath OT">ທ່ານດໍາເນີນການສັ່ງຊື້ສິີນຄ້າສໍາເລັດແລ້ວ</font></h2> --}}
                <h3><font face="phetsarath OT" color="red">ກະລຸນາຊໍາລະຄ່າສິນຄ້າເພື່ອສໍາເລັດການສັ່ງຊື້</font></h3>
            <p><font face="phetsarath OT">ເລກທີສັ່ງຊື້ຂອງທ່ານແມ່ນ {{Session::get('order_id')}} </font></p>
            <p> ລາຄາສິນຄ້າທັງໝົດແມ່ນ
                    <?php
                        $price_amount = Session::get('grand_total');
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
			</div>
		</div>
	</section><!--/#do_action-->
@endsection
<?php
    Session::forget('grand_total');
    Session::forget('order_id');
?>