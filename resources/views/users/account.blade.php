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
                        <h2><font face="phetsarath OT">ອັບເດດບັນຊີຂອງທ່ານ</font></h2>
                    </div>
                </div>
                    <div class="col-sm-1">
                        <h2 class="or"><font face="phetsarath OT">ຫຼື</font></h2>
                    </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--login form-->
                        <h2><font face="phetsarath OT">ອັບເດດລະຫັດຜ່ານຂອງທ່ານ</font></h2>
                    </div>
                </div>
        </div>
    </div>
</section><!--/form-->
@endsection
