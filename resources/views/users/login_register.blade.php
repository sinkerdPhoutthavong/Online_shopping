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
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2><font face="phetsarath OT"><center>ເຂົ້າສູ່ລະບົບບັນຊີຂອງທ່ານ</center></font></h2>
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            <font face="phetsarath OT">ໃຫ້ຢູ່ໃນລະບົບຕໍ່ໄປ</font>
                        </span>
                        <button type="submit" class="btn btn-default"><font face="phetsarath OT">ເຂົ້າສູ່ລະບົບ</font></button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or"><font face="phetsarath OT"><center><b>ຫຼື</b></center></font></h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2><font face="phetsarath OT"><center>ສະໝັກສະມາຊິກໃໝ່!!</center></font></h2>
                <form id="registerForm" name="registerForm" action="{{url('/login-register')}}" method="POST">
                    {{ csrf_field() }}
                        <input id="name" name="name" type="text" placeholder="Name" />
                        <input id="email" name="email" type="email" placeholder="Email Address" />
                        <input id="password" name="password" type="password" placeholder="Password"/>
                        <button type="submit" class="btn btn-default"><font face="phetsarath OT">ລົງທະບຽນ</font></button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
