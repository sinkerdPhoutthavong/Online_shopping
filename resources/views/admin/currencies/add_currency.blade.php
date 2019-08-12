@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">ເພີ່ມສະກຸນເງິນ</a> </div>
      <h1>ສະກຸນເງິນ</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h4>ເພີ່ມສະກຸນເງິນ</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{url('admin/add-currency')}}" name="add_currency" id="add_currency" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                    <label class="control-label">ລະຫັດສະກຸນເງິນ</label>
                    <div class="controls">
                        <input type="text" name="currency_code" id="currency_code">
                    </div>
                  </div>
                <div class="control-group">
                    <label class="control-label">ອັດຕາການແລກປ່ຽນ</label>
                    <div class="controls">
                        <input type="text" name="exchange_rate" id="exchange_rate">
                    </div>
                  </div>
                <div class="control-group">
                    <label class="control-label">ໃຊ້ງານ</label>
                    <div class="controls">
                      <input type="checkbox" name="status" id="status">
                    </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add currency" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection