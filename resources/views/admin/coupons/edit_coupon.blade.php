@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ຄູປອງ</a> <a href="#" class="current">ແກ້ໄຂ Coupon </a> </div>
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
              <h4>ແກ້ໄຂ Coupon</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal"  method="post" action="{{url('admin/edit-coupon/'.$couponDetails->id)}}" name="edit_coupon" id="edit_coupon" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">ລະຫັດ Coupon</label>
                  <div class="controls">
                  <input type="text" name="coupon_code" id="coupon_code" minlength="5" maxlength="15" value="{{$couponDetails->coupon_code}}">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ຈໍານວນ</label>
                    <div class="controls">
                      <input type="number" name="amount" id="amount" min="1" value="{{$couponDetails->amount}}" required>
                    </div>
                </div>
                <div class="control-group">
                        <label class="control-label">ປະເພດສ່ວນຫຼຸດ</label>
                        <div class="controls">
                            <select name="amount_type" id="amount_type" style="width:220px;">
                              <option 
                              @if ($couponDetails->amount_type=="Percentage")
                                  selected
                              @endif value="Percentage"><font face="phetsarath OT">ສ່ວນຫຼຸດເປັນເປີເຊັນ %</font></option>
                              <option
                              @if ($couponDetails->amount_type=="Fixed")
                                  selected
                                 @endif
                                   value="Fixed">Fixed</option>
                            </select>
                        </div>
                      </div>
                <div class="control-group">
                      <label class="control-label">ວັນໝົດອາຍຸ</label>
                      <div class="controls">
                        <input type="text" name="datepicker" id="datepicker" value="{{$couponDetails->expiry_date}}" required>
                      </div>
                    </div>
                <div class="control-group">
                      <label class="control-label">ໃຊ້ງານ</label>
                      <div class="controls">
                        <input type="checkbox" name="status" id="status" value="1"  
                        @if($couponDetails->status=="1") checked
                        @endif>
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