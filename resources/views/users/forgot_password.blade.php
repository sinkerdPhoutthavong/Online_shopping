@extends('layouts.frontLayout.front_design')
@section('content')
<section id="form" style="margin-top:10px;"><!--form-->
    <div class="container">
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
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form"><!--login form-->
                        <h2><font face="phetsarath OT">ລືມລະຫັດຜ່ານ ?</font></h2>
                        <form id="forgotPasswordForm" name="forgotPasswordForm" action="{{url('/forgot-password')}}" method="POST">
                            {{ csrf_field() }}
                            <input name="email" type="email" placeholder="Email Address" required />
                            <button type="submit" class="btn btn-default"><font face="phetsarath OT">ຢືນຢັນ</font></button>
                        </form>
                    </div><!--/login form-->
                </div>
        </div>
    </div>
</section><!--/form-->
@endsection
