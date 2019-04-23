
<div class="left-sidebar">
        <h2><font face="phetsarath OT">ປະເພດຂອງສິນຄ້າ</font></h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                    @foreach ($categories as $cat)
                    @if ($cat->status == 1)
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{$cat->name}}
                            </a>
                        </h4>
                    </div>
                    <div id="{{$cat->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($cat->categories as $subcat)
                                    @if ($subcat->status == 1)
                                    {{-- <li><a href="{{ asset('/products/'.$subcat->url)}}"><font face="phetsarath OT">{{$subcat->name}}</font></a></li> --}}
                                    <li><a href="{{asset('/products/'.$subcat->url)}}"><font face="phetsarath OT">{{$subcat->name}}</font></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
        </div><!--/category-products-->
    
</div>
