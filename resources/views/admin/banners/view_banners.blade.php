@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ແບນເນີ່</a> <a href="#" class="current">ແບນເນີ່ທັງໝົດ</a> </div>
          <h1>ແບນເນີ່ທັງໝົດ</h1>
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
                  <h5>ແບນເນີ່ທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ລະຫັດແບນເນີ່</th>
                        <th>ຫົວຂໍ້</th>
                        <th>Link</th>
                        <th>ຮູບພາບ</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                           <tr class="gradeX">
                           <td class="center">{{$banner->id}}</td>
                           <td class="center">{{$banner->title}}</td>
                           <td class="center">{{$banner->link}}</td>
                           <td class="center">
                                @if(!empty($banner->image))
                                <img src="{{asset('images/frontend_images/banners/'.$banner->image)}}" style="width:150px;">
                                @endif
                           </td>
                           <td class="center">
                                <a href="#myModal{{$banner->id}}" data-toggle="modal" class="btn btn-warning btn-mini" title="ລາຍລະອຽດສິນຄ້າ">ລາຍລະອຽດ</a>
                                <a href="{{url('/admin/edit-banner/'.$banner->id)}}" class="btn btn-primary btn-mini" title="ແກ້ໄຂສິນຄ້າ">ແກ້ໄຂ</a>
                                <a href="{{url('/admin/add-images/'.$banner->id)}}" class="btn btn-info btn-mini" title="ເພີ່ມຮູບພາບຂອງສິນຄ້າ">ເພີ່ມຮູບພາບ</a>
                               <a  herf="javascript:" rel="{{$banner->id}}" rel1="delete-banner" class="btn btn-danger btn-mini deleteRecord" title="ລຶບສິນຄ້າ">ລືບ</a></td>
                           </tr>
                              <div id="myModal{{$banner->id}}" class="modal hide">
                                <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">×</button>
                                  <h3>{{$banner->product_name}} ລາຍລະອຽດທັງໝົດ</h3>
                                </div>
                                <div class="modal-body">
                                  <p>ລະຫັດສິນຄ້າ:  {{$banner->id}}</p>
                                  <p>ຫົວຂໍ້:  {{$banner->title}}</p>
                                  <p>link:  {{$banner->link}}</p>
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