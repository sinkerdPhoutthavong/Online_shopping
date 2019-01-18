@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('.')}}"><font face="phetsarath OT">ໜ້າຫຼັກ</font></a></li>
                  <li><a href="{{url('orders')}}"><font face="phetsarath OT">ສິນຄ້າທີ່ສັ່ງຊື້</a></font></li>
                  <li class="active"><font face="phetsarath OT">ເລກທີ: {{$orderDetails->id}}</font></li>
				</ol>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading" align="center">
                {{-- <h2><font face="phetsarath OT">ທ່ານດໍາເນີນການສັ່ງຊື້ສິີນຄ້າສໍາເລັດແລ້ວ</font></h2> --}}
            <h2><font face="phetsarath OT" color="teal">ລາຍລະອຽດຂອງການສັ່ງຊື້ສີນຄ້າ ເລກທີ {{$orderDetails->id}}</font></h2>
                <table id="example" class="table table-striped table-bordered" style="margin-top:20px;width:100%">
                        <thead>
                            <tr>
                                <th><center><font face="phetsarath OT" color="teal">ໝາຍເລກສິນຄ້າ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ຊື່ຂອງສິນຄ້າ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ຂະໜາດສິນຄ້າ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ສີສິນຄ້າ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ລາຄາ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ຈໍານວນສິນຄ້າທີ່ສັ່ງຊື້</center></font></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails->orders as $pro)
                                <tr>
                                    <td>{{$pro->product_code}}</td>
                                    <td>{{$pro->product_name}}</td>
                                    <td>{{$pro->product_size}}</td>
                                    <td>{{$pro->product_color}}</td>
                                    <td>
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
                                    <td>{{$pro->product_qty}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection