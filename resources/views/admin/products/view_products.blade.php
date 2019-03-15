@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ການສັ່ງຊື້ທັງໝົດ</a> </div>
          <h1>ການສັ່ງຊື້ທັງໝົດ</h1>
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
        </div>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>ການສັ່ງຊື້ສິນຄ້າທັງໝົດ</h5>
                </div>
                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>ເລກທີສັ່ງຊື້ສິນຄ້າ</th>
                        <th>ລະຫັດ Category</th>
                        <th>ຊື່ Category</th>
                        <th>ຊື່ສິນຄ້າ</th>
                        <th>ໝາຍເລກສິນຄ້າ</th>
                        <th>ສີ</th>
                        <th>ລາຄາ</th>
                        <th>ລາຍການສິນຄ້າ</th>
                        <th>ຮູບພາບ</th>
                        <th>ການຈັດການ</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                           <tr class="gradeX">
                           <td>{{$product->id}}</td>
                           <td>{{$product->category_id}}</td>
                           <td>{{$product->category_name}}</td>
                           <td>{{$product->product_name}}</td>
                           <td>{{$product->product_code}}</td>
                           <td>{{$product->product_color}}</td>
                           <td>{{$product->price}}</td>
                           <td><?php
                              $use="";
                              $use = $product->feature_items;
                            if($use==0){
                              $show ="ປິດການໃຊ້ງານ";
                              ?><center><font color="Red">{{$show}}</font></center><?php
                            }else{
                              $show ="ເປີດໃຊ້ງານ";
                              ?><center><font color="Green">{{$show}}</font></center><?php
                            }?>
                            </td>


                           <td>
                                @if(!empty($product->image))
                                <img src="{{asset('/images/backend_images/products/medium/'.$product->image)}}" style="width:70px;">
                                @endif
                           </td>
                           <td class="center">
                                <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-warning btn-mini" title="ລາຍລະອຽດສິນຄ້າ">ລາຍລະອຽດ</a>
                                <a href="{{url('/admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-mini" title="ແກ້ໄຂສິນຄ້າ">ແກ້ໄຂ</a>
                                <a href="{{url('/admin/add-attributes/'.$product->id)}}" class="btn btn-success btn-mini" title="ເພີ່ມຄຸນນລັກສະນະຂອງສິນຄ້າ">ເພີ່ມ</a>
                                <a href="{{url('/admin/add-images/'.$product->id)}}" class="btn btn-info btn-mini" title="ເພີ່ມຮູບພາບຂອງສິນຄ້າ">ເພີ່ມຮູບພາບ</a>
                           <a <?php /*href="{{url('/admin/delete-product/'.$product->id)}}" */?> herf="javascript:" rel="{{$product->id}}" rel1="delete-product" class="btn btn-danger btn-mini deleteRecord" title="ລຶບສິນຄ້າ">ລືບ</a></td>
                           </tr>
                              <div id="myModal{{$product->id}}" class="modal hide">
                                <div class="modal-header">

                                  <button data-dismiss="modal" class="close" type="button">×</button>
                                  <h3>{{$product->product_name}} ລາຍລະອຽດທັງໝົດ</h3>
                                </div>
                                <div class="modal-body">
                                  <p>ລະຫັດສິນຄ້າ:  {{$product->id}}</p>
                                  <p>ລະຫັດ Category:  {{$product->category_id}}</p>
                                  <p>ໝາຍເລກສິນຄ້າ:  {{$product->product_code}}</p>
                                  <p>ສີ:  {{$product->product_color}}</p>
                                  <p>ລາຄາ:  {{$product->price}}</p>
                                  <p>ຄໍາອະທິບາຍ:  {{$product->description}}</p>
                                </div>
                              </div>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection