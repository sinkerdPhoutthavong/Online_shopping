@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ແກ້ໄຂລາຍການສິນຄ້າ</a> </div>
      <h1>ສິນຄ້າ</h1>
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
              <h4>ແກ້ໄຂສິນຄ້າ</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/edit-banner/'.$bannerDetails->id)}}" name="edit_banner" id="edit_banner" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                    <label class="control-label">ຮູບພາບ</label>
                        <div class="controls">
                          <input type="file" name="image" id="image"/>
                          <input type="hidden" name="current_image" value="{{$bannerDetails->image}}">
                          @if (!empty($bannerDetails->image))
                                <img src="{{asset('images/frontend_images/banners/'.$bannerDetails->image)}}  " style="width:60px;">
                                <a href="{{url('/admin/delete-banner-image/'.$bannerDetails->id)}}"> || ລືບຮູບພາບ</a>
                          @endif
                        </div>
                  </div>
                <div class="control-group">
                  <label class="control-label">ຫົວຂໍ້</label>
                  <div class="controls">
                  <input type="text" name="title" id="title" value="{{$bannerDetails->title}}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Link</label>
                    <div class="controls">
                    <input type="text" name="link" id="link" value="{{$bannerDetails->link}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ຄໍາອະທິບາຍ ແລະ ວັນໝົດອາຍຸ</label>
                    <div class="controls">
                        <textarea name="description" id="description">{{$bannerDetails->description}}</textarea>
                    </div>
                </div>
                  <div class="control-group">
                      <label class="control-label">ການໃຊ້ງານ ແບນເນີ່</label>
                      <div class="controls">
                        <input type="checkbox" name="status" id="status"  @if ($bannerDetails->status == "1") checked @endif value="1">
                      </div>
                    </div>
                <div class="form-actions">
                  <input type="submit" value="Edit Banner" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection