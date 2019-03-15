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
                        <h2><font face="phetsarath OT"><center>ເຂົ້າສູ່ລະບົບບັນຊີຂອງທ່ານ</center></font></h2>
                        <form id="loginForm" name="login" action="{{url('/user-login')}}" method="POST">
                            {{ csrf_field() }}
                            <input name="email" type="email" placeholder="Email Address" />
                            <input name="password" id="loginPassword" type="password" placeholder="Password"/>
                            <a  href="{{url('forgot-password')}}"><i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i><font face="phetsarath OT"> ລືມລະຫັດຜ່ານ ?</font></a>
                            
                            <center><button type="submit" class="btn btn-default"><font face="phetsarath OT">ເຂົ້າສູ່ລະບົບ</font></button></center>
                            <div><br>
                                <center><a href="{{url('/user-registerpage')}}"><i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i><font face="phetsarath OT"> ສະໝັກສະມາຊິກ</font></a></center></div>
                        </form>
                    </div><!--/login form-->
                </div>
        </div>
    </div>
</section><!--/form-->
@endsection
