@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">ສ້າງ Category</a> </div>
      <h1>Category</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h4>ເພີ່ມ Category</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{url('admin/add-category')}}" name="add_category" id="add_category" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">ຊື່ Category</label>
                  <div class="controls">
                    <input type="text" name="category_name" id="category_name">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ລະດັບ Category</label>
                    <div class="controls">
                        <select name="parent_id" style="width:220px;">
                          <option value="0">Category ຫຼັກ</option>
                          @foreach ($levels as $value)
                            <option value="{{$value->id}}">
                              {{$value->name}}
                            </option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                <div class="control-group">
                    <label class="control-label">ຄໍາອະທິບາຍ</label>
                    <div class="controls">
                        <textarea name="description" id="description"></textarea>
                    </div>
                  </div>
                <div class="control-group">
                  <label class="control-label">URL</label>
                  <div class="controls">
                    <input type="text" name="url" id="url">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add Category" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection