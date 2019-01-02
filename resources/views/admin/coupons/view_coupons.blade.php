@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Coupon</a> <a href="#" class="current">Coupon ທັງໝົດ</a> </div>
          <h1>Coupon ທັງໝົດ</h1>
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
                  <h5>Coupon ທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ລະຫັດ Coupon</th>
                        <th>ໝາຍເລກ Coupon</th>
                        <th>ຈໍານວນ Coupon</th>
                        <th>ຊະນິດ Coupon</th>
                        <th>ວັນໝົດອາຍຸ</th>
                        <th>ວັນທີໃຊ້ Coupon</th>
                        <th>ສະຖານະ</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                           <tr class="gradeX">
                           <td>{{$coupon->id}}</td>
                           <td>{{$coupon->coupon_code}}</td>
                           <td>
                               {{$coupon->amount}}
                               @if ($coupon->amount_type == "Percentage")
                                   %
                                @else
                                    ກິບ
                               @endif
                            </td>
                           <td>{{$coupon->amount_type}}</td>
                           <td>{{$coupon->expriry_date}}</td>
                           <td>{{$coupon->created_at}}</td>
                           <td>
                               @if ($coupon->status==1)
                                   ໃຊ້ງານ
                                   @else
                                   ບໍ່ໃຊ້ງານ
                               @endif
                            </td> 
                           <td class="center">
                                <a href="#myModal{{$coupon->id}}" data-toggle="modal" class="btn btn-warning btn-mini" title="ລາຍລະອຽດສິນຄ້າ">ລາຍລະອຽດ</a>
                                <a href="{{url('/admin/edit-coupon/'.$coupon->id)}}" class="btn btn-primary btn-mini" title="ແກ້ໄຂ Coupong">ແກ້ໄຂ</a>
                                <a <?php /*href="{{url('/admin/delete-product/'.$product->id)}}" */?> herf="javascript:" rel="{{$coupon->id}}" rel1="delete-coupon" class="btn btn-danger btn-mini deleteRecord" title="ລຶບ Coupon">ລືບ</a></td>
                            </tr>
                              <div id="myModal{{$coupon->id}}" class="modal hide">
                                <div class="modal-header">

                                  <button data-dismiss="modal" class="close" type="button">×</button>
                                  <h3>{{$coupon->coupon_code}} ລາຍລະອຽດທັງໝົດ</h3>
                                </div>
                                <div class="modal-body">
                                  <p>ໝາຍເລກຄູປອງ:  {{$coupon->coupon_code}}</p>
                                  <p>ຈໍານວນ Coupon:  {{$coupon->amount}}</p>
                                  <p>ຊະນິດ Coupon:  {{$coupon->amount_type}}</p>
                                  <p>ວັນໝົດອາຍຸ:  {{$coupon->expriry_date}}</p>
                                  <p>ວັນທີໃຊ້ Coupon:  {{$coupon->created_at}}</p>
                                  <p>ສະຖານະ:  {{$coupon->status}}</p>
                                </div>
                              </div>
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