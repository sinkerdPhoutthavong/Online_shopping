@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ຜູ່ໃຊ້ລະບົບ</a> <a href="#" class="current">ຜູ່ໃຊ້ລະບົບທັງໝົດ</a> </div>
          <h1>ຜູ່ໃຊ້ລະບົບທັງໝົດ</h1>
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
                  <h5>ຜູ່ໃຊ້ລະບົບທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ລະຫັດຜູ່ໃຊ້ລະບົບ</th>
                        <th>ຊື່</th>
                        <th>ທີ່ຢູ່ບ້ານ</th>
                        <th>ເມືອງ</th>
                        <th>ແຂວງ</th>
                        <th>ປະເທດ</th>
                        <th>ລະຫັດໄປສະນີ</th>
                        <th>ເບີໂທລະສັບ</th>
                        <th>ອີເມວຜູ່ໃຊ້</th>
                        <th>ສະຖານະ</th>
                        <th>ວັນທີສະໝັກສະມາຊິກຂອງລະບົບ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                           <tr class="gradeX">
                           <td>{{$user->id}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->address}}</td>
                           <td>{{$user->city}}</td>
                           <td>{{$user->state}}</td>
                           <td>{{$user->country}}</td>
                           <td>{{$user->pincode}}</td>
                           <td>{{$user->mobile}}</td>
                           <td>{{$user->email}}</td>
                           <td>
                               @if($user->status==1)
                                    <font face="phetsarath OT" color="#2E7D32"> <b>ຢືນຢັນບັນຊີແລ້ວ</b> </font>
                               @else
                                    <font face="phetsarath OT" color="#E64A19"><b> ຍັງບໍ່ຢືຶນຢັນບັນຊີ</b> </font>
                               @endif
                            </td>
                           <td>{{$user->created_at}}</td>
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