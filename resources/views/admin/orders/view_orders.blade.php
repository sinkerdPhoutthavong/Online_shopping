@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ສິນຄ້າທັງໝົດ</a> </div>
          <h1>ສິນຄ້າທັງໝົດ</h1>
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
        </div>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>ສິນຄ້າທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ເລກທີການສັ່ງຊື້ສິນຄ້າ</th>
                        <th>ວັນທີສັ່ງຊື້ສິນຄ້າ</th>
                        <th>ຊື່ລູກຄ້າ</th>
                        <th>ອີເມວລຸກຄ້າ</th>
                        <th>ສິນຄ້າທີ່ສັ່ງຊື້</th>
                        <th>ລາຄາລວມທັງໝົດ</th>
                        <th>ສະຖານະການສັ່ງຊື້</th>
                        <th>ຮູບແບບການຊໍາລະສິນຄ້າ</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                           <tr class="gradeX">
                           <td><center>{{$order->id}}</center></td>
                           <td><center>{{$order->created_at}}</center></td>
                           <td><center>{{$order->name}}</center></td>
                           <td><center>{{$order->user_email}}</center></td>
                           <td><center>
                                @foreach ($order->orders as $pro)
                                    {{$pro->product_code}}
                                    = ({{$pro->product_qty}})<br>
                                @endforeach
                            </center></td>
                           <td><center>
                                            <?php 
                                            $Grand_total = $order->grand_total;
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
                            </center></td>
                           <td><center>{{$order->order_status}}</center></td>
                           <td><center>{{$order->payment_method}}</center></td>
                           <td class="center">
                                <a href="{{url('/admin/view-orders/'.$order->id)}}" class="btn btn-success btn-mini" title="ລາຍລະອຽດຂອງການສັ່ງຊື້">ລາຍລະອຽດ</a>
                                <a href="{{url('/admin/view-order-invoice/'.$order->id)}}" class="btn btn-danger btn-mini" title="ລາຍລະອຽດຂອງການສັ່ງຊື້">ອອກໃບບິນ</a>
                                <a  herf="javascript:" rel="{{$order->id}}" rel1="delete-user-order" class="btn btn-danger btn-mini deleteRecord" title="ລຶບລາຍການສັ່ງຊື້">ລືບ</a></td>
                              </td>  
                           </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection