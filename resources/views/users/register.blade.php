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
                <div class="signup-form"><!--sign up form-->
                    <h2><font face="phetsarath OT"><center>ສະໝັກສະມາຊິກໃໝ່!!</center></font></h2>
                    <form id="registerForm" name="registerForm" action="{{url('/user-register')}}" method="POST">
                    {{ csrf_field() }}
                        <input id="name" name="name" type="text" placeholder="Name" />
                        <input id="email" name="email" type="email" placeholder="Email Address" />
                        <input id="myPassword" name="password" type="password" placeholder="Password"/>
                        <button type="submit" class="btn btn-default"><font face="phetsarath OT">ລົງທະບຽນ</font></button>
                        <div>
                            <br>
                            <a href="{{url('/user-Login')}}"><i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i><font face="phetsarath OT"> ເຂົ້າສູ່ລະບົບ</font></a>
                        </div>
                        
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
