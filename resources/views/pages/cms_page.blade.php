@extends('layouts.frontLayout.front_design')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <br>
                @include('Layouts.frontLayout.front_sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <br>
                    <h2 class="title text-center"><font face="phetsarath OT">{{$cmsPageDetails->title}}</font></h2>
                    <p>{{$cmsPageDetails->description}}</p>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

@endsection