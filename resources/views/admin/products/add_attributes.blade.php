@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ເພີ່ມຄຸນລັກສະນະຂອງສິນຄ້າ</a> </div>
      <h1>ເພີ່ມຄຸນລັກສະນະຂອງສິນຄ້າ</h1>
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
              <h4>ເພີ່ມຄຸນລັກສະນະຂອງສິນຄ້າ</h4>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/add-attribute/.$productDetails->id')}}" name="add_product" id="add_attribute" novalidate="novalidate">
                  {{csrf_field()}}
                  <div class="control-group">
                    <label class="control-label">ຊື່ສິນຄ້າ :</label>
                    <label class="control-label"><strong>{{$productDetails->product_name}}</strong></label>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ໝາຍເລກສິນຄ້າ :</label>
                      <label class="control-label"><strong>{{$productDetails->product_code}}</strong></label>
                  </div>
                    <div class="control-group">
                        <label class="control-label">ສີຂອງສິນຄ້າ :</label>
                        <label class="control-label"><strong>{{$productDetails->product_color}}</strong></label>
                    </div>
                    <div class="control-group">
                        <label class="control-label"></label>
                        <div class="field_wrapper">
                            <div>
                                <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;"/>
                                <input type="text" name="size[]" id="size" placeholder="ຂະໜາດ" style="width:120px;"/>
                                <input type="text" name="price[]" id="price" placeholder="ລາຄາ" style="width:120px;"/>
                                <input type="text" name="stock[]" id="stock" placeholder="ເຄຶື່ອງໃນສາງ" style="width:120px;"/>
                                <a href="javascript:void(0);" class="add_button" title="Add field">ເພີ່ມ</a>
                            </div>
                        </div>
                    </div>
                  <div class="form-actions">
                    <input type="submit" value="Add Attributes Product" class="btn btn-success">
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection