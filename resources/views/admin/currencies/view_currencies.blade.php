@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສະກຸນເງິນ</a> <a href="#" class="current">ສະກຸນເງິນທັງໝົດ</a> </div>
          <h1>ສະກຸນເງິນ</h1>
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
                  <h5>ສະກຸນເງິນທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ເລກທີ</th>
                        <th>ລະຫັດສະກຸນເງິນ</th>
                        <th>ອັດຕາການແລກປ່ຽນ</th>
                        <th>ສະຖານະການໃຊ້ງານ</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                            @foreach ($currencies as $currency)
                           <tr class="gradeX">
                           <td>{{$currency->id}}</td>
                           <td>{{$currency->currency_code}}</td>
                           <td>{{$currency->exchange_rate}}</td>
                           <td><?php
                            $use="";
                            $use = $currency->status;
                            if($use==0){
                                $show ="ປິດການໃຊ້ງານ";
                                ?><center><font color="Red"><b>{{$show}}</b></font></center><?php
                            }else{
                                $show ="ເປີດໃຊ້ງານ";
                                ?><center><font color="Green"><b>{{$show}}</b></font></center><?php
                            }?>
                          </td>
                           <td class="center">
                                <a href="{{url('/admin/edit-currency/'.$currency->id)}}" class="btn btn-primary">ແກ້ໄຂ</a>
                                <a href="{{url('/admin/delete-currency/'.$currency->id)}}" class="btn btn-danger" >ລືບ</a></td>
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