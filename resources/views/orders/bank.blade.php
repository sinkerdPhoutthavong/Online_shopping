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
                <h3><font face="phetsarath OT" color="red">ກະລຸນາຊໍາລະຄ່າສິນຄ້າເພື່ອສໍາເລັດການສັ່ງຊື້ ໂດຍການໂອນເງິນເຂົ້າບັນຊີທະນາຄານ</font></h3>
                    <table style="margin-top:20px;" id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                        <th><center><font color="teal">ເລກທີສັ່ງຊື້</font><center></th>
                                            <th><center><font color="teal">ລາຄາສິນຄ້າທັງໝົດແມ່ນ</font><center></th>
                                                <th><center><font color="teal">ກົດເພື່ອຊໍາລະສິນຄ້າ</font><center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{Session::get('order_id')}}</td>
                                    <td>
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
                                                            }else{
                                                                echo "0";
                                                            }                     
                                        ?>
                                        <font face="phetsarath OT"> ກີບ</font>
                                    </td>
                                    <td><form action="https://www.bcel.com.la:8083/" method="post">

                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="221">
                                      
                                        <input type="image" name="submit"
                                          src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                          alt="PayPal - The safer, easier way to pay online">
                                        <img alt="" width="1" height="1"
                                          src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                                      
                                    </form></td>
                                </tr>
                            </tbody>
                    </table>
                    <h2 style="margin-top:50px;"><font face="phetsarath OT" color="#616161">ບັນຊີທະນະຄານຂອງເວັບໄຊ<font face="times new roman" color="teal"> E-</font><font face="times new roman" color="#9E9E9E">SMSHOPPER</font></h2>
                    <table style="margin-top:20px;" id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><center><font color="teal">ທະນາຄານ</font><center></th>
                                    <th><center><font color="teal">ເລກບັນຊີ</font><center></th>
                                    <th><center><font color="teal">ອອກຊື່</font><center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ທະນາຄານການຄ້າຕ່າງປະເທດລາວ ມະຫາຊົນ BCEL</td>
                                    <td>162003 8548415 0205454</td>
                                    <td>ສິນເກີດ ພຸດທະວົງ</td>
                                </tr>
                                <tr>
                                    <td>ທະນາຄານພັດທະນາລາວ</td>
                                    <td>162003 8548415 0205454</td>
                                    <td>ສິນເກີດ ພຸດທະວົງ</td>
                                </tr>
                                <tr>
                                    <td>ທະນາຄານ JDB</td>
                                    <td>162003 8548415 0205454</td>
                                    <td>ມິຣິນດາ ສີຄໍາພັນ</td>
                                </tr>
                                <tr>
                                    <td>ທະນາຄານຮ່ວມທຸລະກິດ ລາວ-ຫວຽດ</td>
                                    <td>162003 8548415 0205454</td>
                                    <td>ມິຣິນດາ ສີຄໍາພັນ</td>
                                </tr>
                            </tbody>
                    </table>
            </div>
		</div>
	</section><!--/#do_action-->
@endsection
<?php
    Session::forget('grand_total');
    Session::forget('order_id');
?>