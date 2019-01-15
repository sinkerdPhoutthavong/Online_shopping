<?php
    use App\Http\Controllers\Controller;
    $mainCategories = Controller::mainCategories();
?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +856 20 77632536</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Devn.info@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img style="width:239px;" src="{{asset('images/frontend_images/home/logo1.png')}}" alt="" /></a>
                    </div>
                    {{-- <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                
                            <li><a href="#"><i class="fa fa-star"></i><font face="phetsarath OT">ສີ່ງທີ່ທ່ານຕ້ອງການ</font></a></li>
                            <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i><font face="phetsarath OT">ກະຕ່າສິນຄ້າ</font></a></li>
                            @if (empty(Auth::check()))
                                <li><a href="{{url('/user-registerpage')}}"><i class="fa fa-user"></i><font face="phetsarath OT">ສະໝັກສະມາຊິກ</font></a></li>
                                <li><a href="{{url('/user-Login')}}"><i class="fa fa-lock"></i><font face="phetsarath OT">ເຂົ້າສູ່ລະບົບ</font></a></li>
                            @else
                                 <li><a href="#"><i class="fa fa-user"></i><font face="phetsarath OT">ບັນຊີ</font></a></li>
                                 <li><a href="{{url('/user-logout')}}"><i class="fa fa-sign-out"></i><font face="phetsarath OT">ອອກຈາກລະບົບ</font></a></li>
                            @endif  
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{asset('.')}}" class="active"><font face="phetsarath OT">ໜ້າຫຼັກ</font></a></li>
                            <li class="dropdown"><a href="#"><font face="phetsarath OT">ສິນຄ້າ</font><i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($mainCategories as $cat)
                                        @if ($cat->status==1)
                                        <li><a href="{{asset('/products/'.$cat->url)}}">{{$cat->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> 
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html"><font face="phetsarath OT">ຕິດຕໍ່ພວກເຮົາ</font></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
