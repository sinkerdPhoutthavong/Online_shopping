@extends('layouts.frontLayout.front_design')
@section('content')
<section>
<div id="app">   
    <div class="container">
        
        <div class="row">
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="col-sm-3">
                <br>
                @include('Layouts.frontLayout.front_sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <br>
                <h2 class="title text-center"><font face="phetsarath OT">@{{test}}</font></h2>
                <h2 class="title text-center"><font face="phetsarath OT">@{{responsemsg}}</font></h2>
                    <div id="contact-page" class="container">
                        <div class="bg">   	
                            <div class="row">  	
                                <div class="col-sm-9">
                                    <div class="contact-form"> 
                                        <div class="status alert alert-success" style="display: none"></div>
                                        <form  id="main-contact-form" class="contact-form row" name="contact-form" method="post" v-on:submit.prevent="addPost">
                                            {{ csrf_field() }}
                                            <div class="form-group col-md-6">
                                                <input type="text" v-model="name" class="form-control"  placeholder="ຊື່" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" v-model="email" class="form-control"  placeholder="ອີເມວ"required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" v-model="subject" class="form-control"  placeholder="ເລື່ອງ"required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea v-model="message" id="message" class="form-control" rows="8" placeholder="ຂໍ້ຄວາມລາຍລະອຽດ"required></textarea>
                                            </div>                        
                                            <div class="form-group col-md-12">
                                                <button type="submit"  class="btn btn-primary pull-right">ຢືນຢັນ ສົ່ງຂໍ້ມູນ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> 			
                            </div>
                            <div class="row">
                                    <div class="col-sm-4">
                                            <div class="contact-info">
                                                <h2 class="title text-center"><font face="phetsarath OT">ຂໍ້ມູນ ການຕິດຕໍ່</font></h2>
                                                <address>
                                                    <p>E-Shopper Inc.</p>
                                                    <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                                                    <p>Newyork USA</p>
                                                    <p>Mobile: +2346 17 38 93</p>
                                                    <p>Fax: 1-714-252-0026</p>
                                                    <p>Email: info@e-shopper.com</p>
                                                </address>
                                            </div>
                                        </div> 
                                    <div class="col-sm-4">
                                        <div class="contact-info">
                                                <div class="social-networks">
                                                <h2 class="title text-center"><font face="Times new roman">Social Networking</font></h2>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                             </div> 
                                        </div>
                                    </div>
                                    </div>  
                        </div>	
                    </div><!--/#contact-page-->
                </div><!--features_items-->
                
        
            </div>
        </div>
    </div>
</div>
</section>

@endsection