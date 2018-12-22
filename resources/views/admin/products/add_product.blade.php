@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ສິນຄ້າ</a> <a href="#" class="current">ເພີ່ມລາຍການສິນຄ້າ</a> </div>
      <h1>ສິນຄ້າ</h1>
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
              <h4>ເພີ່ມສິນຄ້າ</h4>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/add-product')}}" name="add_product" id="add_product" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                    <label class="control-label">Category ຮອງ</label>
                    <div class="controls">
                        <select name="category_id" id="category_id" style="width:220px;">
                          <?php echo $categories_dropdown; ?>
                        </select>
                    </div>
                  </div>
                <div class="control-group">
                  <label class="control-label">ຊື່ສິນຄ້າ</label>
                  <div class="controls">
                    <input type="text" name="product_name" id="product_name">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">ໝາຍເລກສິນຄ້າ</label>
                    <div class="controls">
                      <input type="text" name="product_code" id="product_code">
                    </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ສີຂອງສິນຄ້າ</label>
                      <div class="controls">
                        <input type="text" name="product_color" id="product_color">
                      </div>
                    </div>
                <div class="control-group">
                    <label class="control-label">ຄໍາອະທິບາຍ</label>
                    <div class="controls">
                        <textarea name="description" id="description"></textarea>
                    </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">ລາຄາ</label>
                      <div class="controls">
                        <input type="text" name="price" id="price">
                      </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">ຮູບພາບ</label>
                        <div class="controls">
                          <input type="file" name="image" id="image"/>
                        </div>
                      </div>
                <div class="form-actions">
                  <input type="submit" value="Add Product" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection