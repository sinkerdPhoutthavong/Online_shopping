@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ແກ້ໄຂ Cms Page</a> <a href="#" class="current">ລາຍການແກ້ໄຂ Cms Page</a> </div>
      <h1>ແກ້ໄຂ Cms Page</h1>
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
              <h4>ແກ້ໄຂ Cms Page</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/edit-cms-page/'.$PageDetails->id)}}" name="edit_cms_page" id="edit_cms_page" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">ຫົວຂໍ້</label>
                  <div class="controls">
                  <input type="text" name="title" id="title" value="{{$PageDetails->title}}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ແກ້ໄຂ Cms Page Url</label>
                    <div class="controls">
                      <input type="text" name="url" id="url"value="{{$PageDetails->url}}">
                    </div>
                  </div>
                  <div>
                    <label class="control-label">ຄໍາອະທິບາຍ</label>
                    <div class="controls">
                        <textarea name="description" id="description">{{$PageDetails->description}}</textarea>
                    </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ຫົວຂໍ້ Meta</label>
                      <div class="controls">
                      <input type="text" name="meta_title" id="meta_title" value="{{$PageDetails->meta_title}}">
                      </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ຄຳອະທິບາຍ Meta</label>
                        <div class="controls">
                          <input type="text" name="meta_description" id="description"value="{{$PageDetails->meta_description}}">
                        </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">keyword Meta</label>
                          <div class="controls">
                            <input type="text" name="meta_keyword" id="meta_keyword"value="{{$PageDetails->meta_keywords}}">
                          </div>
                        </div>
                  <div class="control-group">
                      <label class="control-label">ການໃຊ້ງານ</label>
                      <div class="controls">
                        <input type="checkbox" name="status" id="status"@if ($PageDetails->status == "1") checked @endif value="1">
                      </div>
                  </div>
                <div class="form-actions">
                  <input type="submit" value="Edit Cms Page" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection