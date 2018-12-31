@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ເພີ່ມຄຸນລັກສະນະຂອງສິນຄ້າ</a> </div>
      <h1>ເພີ່ມຮູບພາບຂອງສິນຄ້າ</h1>
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
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h4>ເພີ່ມຮູບພາບຂອງສິນຄ້າ</h4>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/add-images/'.$productDetails->id)}}" name="add_image" id="add_image" >
                  {{csrf_field()}}
                  <input type="hidden" name="product_id" value="{{$productDetails->id}}">
                  <div class="control-group">
                    <label class="control-label">ຊື່ສິນຄ້າ :</label>
                    <label class="control-label"><strong>{{$productDetails->product_name}}</strong></label>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ໝາຍເລກສິນຄ້າ :</label>
                      <label class="control-label"><strong>{{$productDetails->product_code}}</strong></label>
                  </div>
                  <div class="control-group">
                        <label class="control-label">ຮູບພາບ</label>
                        <div class="controls">
                          <input type="file" name="image[]" id="image" multiple="multiple"/>
                        </div>
                    </div>
                  <div class="form-actions">
                    <input type="submit" value="Add Images Product" class="btn btn-success">
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>ລາຍລະອຽດທັງໝົດຂອງສິນຄ້າ</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>ລະຫັດຮູບພາບ</th>
                    <th>ລະຫັດສິນຄ້າ</th>
                    <th>ຮູບພາບ</th>
                    <th>ການຈັດການ</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($productImages as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td>{{$image->product_id}}</td>
                            <td style="width:200px;"><img src="{{asset('images/backend_images/products/small/'.$image->image)}}" alt=""></td>
                            <td>
                                    <a herf="javascript:" rel="{{$image->id}}" rel1="delete-alt-image" class="btn btn-danger deleteRecord" title="ລຶບຮູບພາບສິນຄ້າ">ລືບ</a></td>
                            </td>
                        </tr>
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