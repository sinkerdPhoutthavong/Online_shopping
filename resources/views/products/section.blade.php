
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($banners as $key=> $banner)
                        <li data-target="#slider-carousel" data-slide-to="0" @if($key==0) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($banners as $key=> $banner)
                            <div class="item @if($key==0) active @endif">
                                    <div class="col-sm-6">
                                            <h1><span>E</span>-SMSHOPPING</h1>
                                            <h2><font face="phetsarath OT" color="#FFCA28">{{$banner->title}}</font></h2>
                                            <p><font face="phetsarath OT" color="#212121">{{$banner->description}}</font></p>
                                            <button type="button" class="btn btn-default get"><font face="phetsarath OT">ສັ່ງຊື້ດຽວນີ້</font></button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{$banner->link}}">
                                            <img src="{{asset('images/frontend_images/banners/'.$banner->image) }}">
                                            <img src="{{asset('images/frontend_images/home/pricing.png')}}"  class="pricing" alt="" /></a>
                                        </div>
                            </div>
                        @endforeach
                           
                        {{-- <div class="item active">
                                <div class="col-sm-6">
                                        <h1><span>E</span>-SMSHOPPING</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get"><font face="phetsarath OT">ສັ່ງຊື້ດຽວນີ້</font></button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{asset('images/frontend_images/banners/banner6.png')}}">
                                        <img src="{{asset('images/frontend_images/home/pricing.png')}}"  class="pricing" alt="" />
                                    </div>
                        </div>
                        <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SMSHOPPING</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get"><font face="phetsarath OT">ສັ່ງຊື້ດຽວນີ້</font></button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{asset('images/frontend_images/banners/banner2.png')}}">
                                    <img src="{{asset('images/frontend_images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SMSHOPPING</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get"><font face="phetsarath OT">ສັ່ງຊື້ດຽວນີ້</font></button>
                            </div>
                            <div class="col-sm-6">
                                    <img src="{{asset('images/frontend_images/banners/banner3.png')}}">
                                <img src="{{asset('images/frontend_images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SMSHOPPING</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get"><font face="phetsarath OT">ສັ່ງຊື້ດຽວນີ້</font></button>
                                </div>
                                <div class="col-sm-6">
                                        <img src="{{asset('images/frontend_images/banners/banner4.png')}}">
                                    <img src="{{asset('images/frontend_images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                        <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SMSHOPPING</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get"><font face="phetsarath OT">ສັ່ງຊື້ດຽວນີ້</font></button>
                                    </div>
                                    <div class="col-sm-6">
                                            <img src="{{asset('images/frontend_images/banners/banner5.png')}}">
                                        <img src="{{asset('images/frontend_images/home/pricing.png')}}"  class="pricing" alt="" />
                                    </div>
                                </div>
                        </div> --}}
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->