@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
          <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">ແກ້ໄຂ Category</a> </div>
          <h1>Categories</h1>
        </div>
        <div class="container-fluid"><hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                  <h4>ແກ້ໄຂ Category</h4>
                </div>
                <div class="widget-content nopadding">
                  <form class="form-horizontal" method="post" action="{{url('admin/edit-category/'.$categoryDetails->id)}}" name="edit_category" id="edit_category" novalidate="novalidate">
                    {{csrf_field()}}
                    <div class="control-group">
                      <label class="control-label">ຊື່ Category</label>
                      <div class="controls">
                      <input type="text" name="category_name" id="category_name" value="{{$categoryDetails->name}}">
                      </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">ລະດັບ Category</label>
                            <div class="controls">
                                    <select name="parent_id" style="width:220px;">
                                            <option value="0">Category ຫຼັກ</option>
                                            @foreach ($levels as $value)
                                              <option value="{{$value->id}}" @if ($value->id == $categoryDetails->parent_id)
                                                selected @endif>{{$value->name}}</option>
                                            @endforeach
                                          </select>
                            </div>
                          </div>
                    <div class="control-group">
                        <label class="control-label">ຄໍາອະທິບາຍ</label>
                        <div class="controls">
                            <textarea name="description" id="description">{{$categoryDetails->description}}</textarea>
                        </div>
                      </div>
                    <div class="control-group">
                      <label class="control-label">URL</label>
                      <div class="controls">
                        <input type="text" name="url" id="url"  value="{{$categoryDetails->url}}">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">ຫົວຂໍ້ Meta</label>
                      <div class="controls">
                      <input type="text" name="meta_title" id="meta_title" value="{{$categoryDetails->meta_title}}">
                      </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ຄຳອະທິບາຍ Meta</label>
                        <div class="controls">
                          <input type="text" name="meta_description" id="description"value="{{$categoryDetails->meta_description}}">
                        </div>
                    </div>
                    <div class="control-group">
                          <label class="control-label">keyword Meta</label>
                          <div class="controls">
                            <input type="text" name="meta_keyword" id="meta_keyword"value="{{$categoryDetails->meta_keywords}}">
                          </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ການໃຊ້ງານ Category</label>
                        <div class="controls">
                          <input type="checkbox" name="status" id="status" value="1" @if ($categoryDetails->status == "1") checked @endif >
                        </div>
                      </div>
                    <div class="form-actions">
                      <input type="submit" value="Confirm Update Category" class="btn btn-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection