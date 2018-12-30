@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Category ທັງໝົດ</a> </div>
          <h1>Categories</h1>
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
                  <h5>Categories ທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>Category ID</th>
                        <th>ຊື່ Category</th>
                        <th>ລະດັບ Category</th>
                        <th>Category URL</th>
                        <th>ການໃຊ້ງານ Category</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                           <tr class="gradeX">
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>
                           <td>{{$category->parent_id}}</td>
                           <td>{{$category->url}}</td>
                           <td>{{$category->status}}</td>
                           <td class="center">
                                <a href="{{url('/admin/edit-category/'.$category->id)}}" class="btn btn-primary">ແກ້ໄຂ</a>
                                <a <?php /*href="{{url('/admin/delete-product/'.$product->id)}}" */?> herf="javascript:" rel="{{$category->id}}" rel1="delete-category" class="btn btn-danger deleteRecord">ລືບ</a></td>
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