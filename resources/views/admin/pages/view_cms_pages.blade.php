@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">Cms Page ທັງໝົດ</a> </div>
          <h1>Cms Page ທັງໝົດ</h1>
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
                  <h5>Cms Page ທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ເລກທີ CMS Page</th>
                        <th>ຫົວຂໍ້</th>
                        <th>Url</th>
                        <th>ສະຖານະ</th>
                        <th>ວັນທີສ້າງ</th>
                        <th>ວັນທີອັບເດດ</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                                @foreach ($cmsPages as $cmsPage)
                                <tr class="gradeX">
                                <td>{{$cmsPage->id}}</td>
                                <td>{{$cmsPage->title}}</td>
                                <td>{{$cmsPage->url}}</td>
                                <td><?php
                                    $use="";
                                    $use = $cmsPage->status;
                                    if($use==0){
                                    $show ="ປິດການໃຊ້ງານ";
                                    ?><center><font color="Red"><b>{{$show}}</b></font></center><?php
                                    }else{
                                    $show ="ເປີດໃຊ້ງານ";
                                    ?><center><font color="Green"><b>{{$show}}</b></font></center><?php
                                    }?>
                                    </td>
                                <td>{{$cmsPage->created_at}}</td>
                                <td>{{$cmsPage->updated_at}}</td>
                                <td class="center">
                                        <a href="#myModal{{$cmsPage->id}}" data-toggle="modal" class="btn btn-warning btn-mini" title="ລາຍລະອຽດສິນຄ້າ">ລາຍລະອຽດ</a>
                                        <a href="{{url('/admin/edit-cms-page/'.$cmsPage->id)}}" class="btn btn-primary btn-mini" title="ແກ້ໄຂສິນຄ້າ">ແກ້ໄຂ</a>
                                <a <?php /*href="{{url('/admin/delete-cms-page/'.$cmsPage->id)}}" */?> herf="javascript:" rel="{{$cmsPage->id}}" rel1="delete-cms-page" class="btn btn-danger btn-mini deleteRecord" title="ລຶບສິນຄ້າ">ລືບ</a></td>
                                </tr>
                                    <div id="myModal{{$cmsPage->id}}" class="modal hide">
                                        <div class="modal-header">

                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>ລາຍລະອຽດທັງໝົດຂອງ {{$cmsPage->title}} </h3>
                                        </div>
                                        <div class="modal-body">
                                        <p><strong>ລະຫັດສິນຄ້າ:</strong>  {{$cmsPage->id}}</p>
                                        <p><strong>ຫົວຂໍ້:</strong>  {{$cmsPage->title}}</p>
                                        <p><strong>URL:</strong>  {{$cmsPage->url}}</p>
                                        <p><strong>ສະຖານະ:</strong>  {{$cmsPage->status}}</p>
                                        <p><strong>ຄໍາອະທິບາຍ:</strong>  {{$cmsPage->description}}</p>
                                        <p><strong>ວັນທີສ້າງ:</strong>  {{$cmsPage->created_at}}</p>
                                        <p><strong>ວັນທີອັບເດດ:</strong>  {{$cmsPage->updated_at}}</p>
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