@extends('layouts.frontLayout.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('.')}}"><font face="phetsarath OT">ໜ້າຫຼັກ</font></a></li>
				  <li class="active">ສິນຄ້າທີ່ສັ່ງຊື້ທັງໝົດ</li>
				</ol>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading" align="center">
                {{-- <h2><font face="phetsarath OT">ທ່ານດໍາເນີນການສັ່ງຊື້ສິີນຄ້າສໍາເລັດແລ້ວ</font></h2> --}}
                <h2><font face="phetsarath OT" color="teal">ສິນຄ້າທີ່ສັ່ງຊື້ທັງໝົດ</font></h2>
                <table id="example" class="table table-striped table-bordered" style="margin-top:20px;width:100%">
                        <thead>
                            <tr>
                                <th><center><font face="phetsarath OT" color="teal">ເລກທີການສັ່ງຊື້</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ສິນຄ້າທີ່ສັ່ງຊື້</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ຊ່ອງທາງການຊໍາລະສິນຄ້າ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ລາຄາສິນຄ້າທັງໝົດ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ວັນທີການສັ່ງຊື້ສິນຄ້າ</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ສະຖານະການສັ່ງຊື້</center></font></th>
                                <th><center><font face="phetsarath OT" color="teal">ການຈັດການ</center></font></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        @foreach ($order->orders as $pro)
                                            <a href="{{url('/orders/'.$order->id)}}">{{$pro->product_code}}<br></a>
                                        @endforeach
                                    </td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>
                                        <?php
                                            $price_amount = $order->grand_total;
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
                                    <td>{{$order->created_at}}</td>
                                    <td><font face="phetsarath OT" color="red">ບໍ່ສໍາເລັດ</font></td>
                                    <td><font face="phetsarath OT" color="teal">ເບີ່ງລາຍລະອຽດ</font></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection