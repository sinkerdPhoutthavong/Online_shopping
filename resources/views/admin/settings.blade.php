@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
          <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#" class="current">ການຕັ້ງຄ່າ</a> </div>
          <h1>ການຕັ້ງຄ່າ ຜູ່ບໍລິຫານລະບົບ</h1>
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
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h3>ອັບເດດລະຫັດຜ່ານ</h3>
                  </div>
                  <div class="widget-content nopadding">
                  <form class="form-horizontal" method="post" action="{{url('/admin/update-pwd')}}" name="password_validate" id="password_validate" novalidate="novalidate">
                        {{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">ຊື່ີຜູ່ບໍລິຫານລະບົບ</label>
                            <div class="controls">
                              <input type="text" value="{{$adminDetails->username}}" readonly/>
                            </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">ລະຫັດຜ່ານເກົ່າ</label>
                            <div class="controls">
                              <input type="password" name="current_pwd" id="current_pwd" />
                              <span id="chkPwd"></span>
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ລະຫັດຜ່ານໃໝ່</label>
                        <div class="controls">
                          <input type="password" name="new_pwd" id="new_pwd" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ຢືນຢັນລະຫັດຜ່ານ</label>
                        <div class="controls">
                          <input type="password" name="confirm_pwd" id="confirm_pwd" />
                        </div>
                    </div>
                      <div class="form-actions">
                        <input type="submit" value="Update Password" class="btn btn-success">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection