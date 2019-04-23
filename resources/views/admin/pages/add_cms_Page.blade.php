@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cms Page</a> <a href="#" class="current">ເພີ່ມລາຍການCms Page</a> </div>
      <h1>Cms Page</h1>
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
              <h4>ເພີ່ມ Cms Page</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/add-cms-page')}}" name="add_cms_page" id="add_cms_page" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">ຫົວຂໍ້</label>
                  <div class="controls">
                    <input type="text" name="title" id="title">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cms Page Url</label>
                    <div class="controls">
                      <input type="text" name="url" id="url">
                    </div>
                  </div>
                  <div>
                    <label class="control-label">ຄໍາອະທິບາຍ</label>
                    <div class="controls">
                        <textarea name="description" id="description"></textarea>
                    </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ຫົວຂໍ້ Meta</label>
                      <div class="controls">
                        <input type="text" name="meta_title" id="meta_title" required>
                      </div>
                  </div>
                  <div class="control-group">
                        <label class="control-label">ຄຳອະທິບາຍ Meta</label>
                        <div class="controls">
                          <input type="text" name="meta_description" id="description">
                        </div>
                  </div>
                  <div class="control-group">
                          <label class="control-label">keyword Meta</label>
                          <div class="controls">
                            <input type="text" name="meta_keyword" id="meta_keyword">
                          </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ການໃຊ້ງານ</label>
                      <div class="controls">
                        <input type="checkbox" name="status" id="status">
                      </div>
                  </div>
                <div class="form-actions">
                  <input type="submit" value="Add Cms Page" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection