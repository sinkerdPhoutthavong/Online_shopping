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
                        <h2><font face="phetsarath OT"><center>ອັບເດດບັນຊີຂອງທ່ານ</center></font></h2>
                        <form id="accountForm" name="registerForm" action="{{url('/account')}}" method="POST">
                            {{ csrf_field() }}
                                <input value="{{$userDetails->name}}" id="name" name="name" type="text" placeholder="Name" />
                                <input value="{{$userDetails->address}}" id="address" name="address" type="text" placeholder="Address" />
                                <input value="{{$userDetails->city}}" id="city" name="city" type="text" placeholder="City" />
                                <input value="{{$userDetails->state}}" id="state" name="state" type="text" placeholder="State" />
                                <select name="country" id="country">
                                        <option value=""><font face="phetsarath OT">ເລືອກປະເທດ</font></option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->country_name}}" 
                                            @if ($country->country_name== $userDetails->country) selected @endif
                                        ><font face="phetsarath OT">{{$country->country_name}}</font></option>
                                    @endforeach
                                </select>
                                <input value="{{$userDetails->pincode}}" style="margin-top:10px;" type="pincode" name="pincode" type="text" placeholder="Pincode">
                                <input value="{{$userDetails->mobile}}" type="mobile" name="mobile" type="text" placeholder="Mobile">
                                <button type="submit" class="btn btn-default"><font face="phetsarath OT">ອັບເດດບັນຊີ</font></button>
                        </form>
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
