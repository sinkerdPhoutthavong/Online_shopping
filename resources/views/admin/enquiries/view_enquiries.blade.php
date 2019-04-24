@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">ການສອບຖາມຂອງລູກຄ້າ</a> <a href="#" class="current">ການສອບຖາມຂອງລູກຄ້າ</a> </div>
      <h1>ການສອບຖາມຂອງລູກຄ້າ</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h4>ການສອບຖາມຂອງລູກຄ້າທັງໝົດ</h4>
            </div>
            <div class="widget-content nopadding">
                <div id="app">
                    <input type="text" style="margin-top:10px;margin-left:5px" class="form-control" v-model="search" placeholder="Search">
                    {{-- @{{enquiries}} --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: left;">ຊື່ ແລະ ນາມສະກຸນ: </th>
                                <th style="text-align: left;">ອີເມວ: </th>
                                <th style="text-align: left;">ຫົວຂໍ້: </th>
                                <th style="text-align: left;">ລາຍລະອຽດ: </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="enquiry in filtersEnquiries">
                                <td>
                                    @{{enquiry.name}}
                                </td>
                                <td>
                                    @{{enquiry.email}}
                                </td>
                                <td>
                                    @{{enquiry.subject}}
                                </td>
                                <td>
                                    @{{enquiry.message}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection