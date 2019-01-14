@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ແບນເນີ່</a> <a href="#" class="current">ເພີ່ມລາຍການແບນເນີ່</a> </div>
      <h1>ແບນເນີ່</h1>
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
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h4>ເພີ່ມລາຍການແບນເນີ່</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/add-banner')}}" name="add_banner" id="add_banner" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                        <label class="control-label">ຮູບພາບ</label>
                        <div class="controls">
                          <input type="file" name="image" id="image"/>
                        </div>
                  </div>
                <div class="control-group">
                  <label class="control-label">ຫົວຂໍ້</label>
                  <div class="controls">
                    <input type="text" name="title" id="title">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Link</label>
                    <div class="controls">
                      <input type="text" name="link" id="link">
                    </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ໃຊ້ງານ</label>
                      <div class="controls">
                        <input type="checkbox" name="status" id="status">
                      </div>
                  </div>
                <div class="form-actions">
                  <input type="submit" value="Add Product" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection