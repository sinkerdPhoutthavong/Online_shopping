@extends('layouts.frontLayout.front_design')
@section('content')
<section id="form"><!--form-->
    <div class="container">
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
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
                        <input type="password" placeholder="Password"/>
                        <button type="submit" class="btn btn-default"><font face="phetsarath OT">ລົງທະບຽນ</font></button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
