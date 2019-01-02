@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ເພີ່ມລາຍການສິນຄ້າ</a> </div>
      <h1>Coupons</h1>
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
              <h4>ເພີ່ມ Coupon</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal"  method="post" action="{{url('admin/add-coupon')}}" name="add_coupon" id="add_coupon" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">ລະຫັດ Coupon</label>
                  <div class="controls">
                    <input type="text" name="coupon_code" id="coupon_code" minlength="5" maxlength="15">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ຈໍານວນ</label>
                    <div class="controls">
                      <input type="number" name="amount" id="amount" min="1" required>
                    </div>
                </div>
                <div class="control-group">
                        <label class="control-label">ປະເພດສ່ວນຫຼຸດ</label>
                        <div class="controls">
                            <select name="amount_type" id="amount_type" style="width:220px;">
                              <option value="Percentage"><font face="phetsarath OT">ສ່ວນຫຼຸດເປັນເປີເຊັນ %</font></option>
                              <option value="Fixed">Fixed</option>
                            </select>
                        </div>
                      </div>
                <div class="control-group">
                      <label class="control-label">ວັນໝົດອາຍຸ</label>
                      <div class="controls">
                        <input type="text" name="datepicker" id="datepicker" required>
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