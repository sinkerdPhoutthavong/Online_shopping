@extends('layouts.adminLayout.admin_design')
@section('content')

  <!--main-container-part-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> ໜ້າຫຼັກ</a> <a href="{{url('/admin/view-orders')}}" class="current">ສິນຄ້າທີ່ສັ່ງຊື້</a>
            <a href="#" class="current">ເລກທີສິນຄ້າທີ່ສັ່ງຊື້ {{$orderDetails->id}}</a>  </div>
          <h1>ເລກທີສິນຄ້າທີ່ສັ່ງຊື້ {{$orderDetails->id}}</h1>
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
            <div class="span6">
                <div class="widget-box">
                            <div class="widget-title">
                              <h5>ລາຍລະອຽດຂອງການສັ່ງຊື້ສີນຄ້າ</h5>
                            </div>
                            <div class="widget-content nopadding">
                              <table class="table table-striped table-bordered">
                                <tbody>
                                  <tr>
                                    <td class="taskDesc">ວັນທີການສັ່ງຊື້</td>
                                  <td class="taskStatus"><span class="in-progress">{{$orderDetails->created_at}}</span></td>
                                  </tr>
                                  <tr>
                                    <td class="taskDesc">ລາຄາສິນຄ້າ</td>
                                    <td class="taskStatus"><span class="pending">
                                        <?php
                                        $price_amount = $orderDetails->grand_total;
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
                                    <font face="phetsarath OT"> ກີບ</font>
                                    </span></td>
                                  </tr>
                                  <tr>
                                        <td class="taskDesc">ສະຖານະການສັ່ງຊື້</td>
                                        <td class="taskStatus"><span class="pending">{{$orderDetails->order_status}}</span></td>
                                </tr>
                                <tr>
                                    <td class="taskDesc">ລະຫັດຄູປອງ</td>
                                    <td class="taskStatus"><span class="pending">{{$orderDetails->coupon_code}}</span></td>
                                  </tr>
                                  <tr>
                                        <td class="taskDesc">ສ່ວນຫຼຸດຈາກຄູປອງ</td>
                                        <td class="taskStatus"><span class="pending">
                                            <?php
                                        $price_amount = $orderDetails->coupon_amount;
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
                                    <font face="phetsarath OT"> ກີບ</font>
                                        </span></td>
                                      </tr>
                                      <tr>
                                            <td class="taskDesc">ການຊໍາລະເງິນ</td>
                                            <td class="taskStatus"><span class="pending">{{$orderDetails->payment_method}}</span></td>
                                          </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
            <div class="accordion" id="collapse-group">
                <div class="accordion-group widget-box">
                  <div class="accordion-heading">
                    <div class="widget-title">
                      <h5>ລາຍລະອຽດຜູ່ຊໍາລະສີນຄ້າ</h5>
                      </a> </div>
                  </div>
                  <div class="collapse in accordion-body" id="collapseGOne">
                    <div class="widget-content"> 
                        <h5>ຊື່ລຸກຄ້າ: {{$userDetails->name}}
                        <h5>ອີເມວລູກຄ້າ: {{$userDetails->email}}<h5>
                        <h5>ທີ່ຢູ່ລູກຄ້າ: {{$userDetails->address}}<h5>
                        <h5>ເມືອງ: {{$userDetails->city}}<h5>
                        <h5>ແຂວງ: {{$userDetails->state}}<h5>
                        <h5>ປະເທດ: {{$userDetails->country}}<h5>
                        <h5>ລະຫັດໄປສະນີ: {{$userDetails->pincode}}<h5>
                        <h5>ເບີໂທລະສັບ: {{$userDetails->mobile}}<h5>
                    </div>
                  </div>
            </div>
             </div>
    </div>

            <div class="span6">
                    <div class="widget-box">
                            <div class="widget-title">
                              <h5>ລາຍລະອຽດ ຂໍ້ຜູ່ສັ່ງຊື້ສິນຄ້າ</h5>
                            </div>
                            <div class="widget-content nopadding">
                              <table class="table table-striped table-bordered">
                                <tbody>
                                  <tr>
                                    <td class="taskDesc">ຊື່ລູກຄ້າ</td>
                                    <td class="taskStatus"><span class="in-progress">{{$orderDetails->name}}</span></td>
                                  </tr>
                                  <tr>
                                    <td class="taskDesc">ອີເມວລູກຄ້າ</td>
                                    <td class="taskStatus"><span class="pending">{{$orderDetails->user_email}}</span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        <div class="accordion" id="collapse-group">
                                <div class="accordion-group widget-box">
                                     <div class="accordion-heading">
                                            <div class="widget-title">
                                              <h5>ອັບເດດສະຖານະການສັ່ງຊື້</h5>
                                     </a> </div>
                                </div>
                                    <div class="collapse in accordion-body" id="collapseGOne">
                                            <div class="widget-content"> 
                                                <form action="{{url('/admin/update-order-status')}}" method="POST">
                                                    {{ csrf_field() }}
                                                <input type="hidden" name="order_id" value="{{$orderDetails->id}}">
                                                    <table width="100%">
                                                        <tr>
                                                            <td>
                                                                <select name="order_status" id="order_status" class="control-label" required>
                                                                    <option value="NEW" @if ($orderDetails->order_status=="ໃໝ່") selected @endif>ໃໝ່</option>
                                                                    <option value="ລໍຖ້າລູກຄ້າຊໍາລະເງິນ"@if ($orderDetails->order_status=="ລໍຖ້າລູກຄ້າຊໍາລະເງິນ") selected @endif>ລໍຖ້າລູກຄ້າຊໍາລະເງິນ</option>
                                                                    <option value="ຍົກເລິກການຈັດຊື້"@if ($orderDetails->order_status=="ຍົກເລິກການຈັດຊື້") selected @endif>ຍົກເລິກການຈັດຊື້</option>
                                                                    <option value="ກໍາລັງດໍາເນີນການຈັດຊື້"@if ($orderDetails->order_status=="ກໍາລັງດໍາເນີນການຈັດຊື້") selected @endif>ກໍາລັງດໍາເນີນການຈັດຊື້</option>
                                                                    <option value="ຈັດສົ່ງສິນຄ້າແລ້ວ"@if ($orderDetails->order_status=="ຈັດສົ່ງສິນຄ້າແລ້ວ") selected @endif>ຈັດສົ່ງສິນຄ້າແລ້ວ</option>
                                                                    <option value="ລຸກຄ້າຮັບສິນຄ້າຮຽບຮ້ອຍແລ້ວ"@if ($orderDetails->order_status=="ລຸກຄ້າຮັບສິນຄ້າຮຽບຮ້ອຍແລ້ວ") selected @endif>ລຸກຄ້າຮັບສິນຄ້າຮຽບຮ້ອຍແລ້ວ</option>
                                                                    <option value="ຊໍາລະຄ່າສິນຄ້າຮຽບຮ້ອຍແລ້ວ"@if ($orderDetails->order_status=="ຊໍາລະຄ່າສິນຄ້າຮຽບຮ້ອຍແລ້ວ") selected @endif>ຊໍາລະຄ່າສິນຄ້າຮຽບຮ້ອຍແລ້ວ</option>
                                                                </select>
                                                            </td>
                                                                <td>
                                                                <input type="submit" class="btn btn-success" value="Update status">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>  
                                            </div>
                                    </div>
                                </div>
                        </div>
                    <div class="accordion" id="collapse-group">
                        <div class="accordion-group widget-box">
                             <div class="accordion-heading">
                                    <div class="widget-title">
                                      <h5>ລາຍລະອຽດ ທີ່ຢູ່ການຈັດສົ່ງສິນຄ້າ</h5>
                             </a> </div>
                        </div>
                            <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content"> 
                                            <h5>ຊື່ລຸກຄ້າ: {{$orderDetails->name}}
                                            <h5>ອີເມວລູກຄ້າ: {{$orderDetails->user_email}}<h5>
                                            <h5>ທີ່ຢູ່ລູກຄ້າ: {{$orderDetails->address}}<h5>
                                            <h5>ເມືອງ: {{$orderDetails->city}}<h5>
                                            <h5>ແຂວງ: {{$orderDetails->state}}<h5>
                                            <h5>ປະເທດ: {{$orderDetails->country}}<h5>
                                            <h5>ລະຫັດໄປສະນີ: {{$orderDetails->pincode}}<h5>
                                            <h5>ເບີໂທລະສັບ: {{$userDetails->mobile}}<h5>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
          </div>
          <div class="row-fluid">
                <table id="Order_product" class="table table-bordered data-table" style="margin-top:20px;width:100%">       
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
      </div>
      <!--main-container-part-->

@endsection