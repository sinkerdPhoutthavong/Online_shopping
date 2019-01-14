<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin/dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
      <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ປະເພດສິນຄ້າ</span> <span class="label label-important">4</span></a>
        <ul>
        <li><a href="{{url('/admin/add-category')}}">ເພີ່ມ Category</a></li>
          <li><a href="{{url('/admin/view-categories')}}">Category ທັງໝົດ</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ສິນຄ້າ</span> <span class="label label-important"></span></a>
        <ul>
        <li><a href="{{url('/admin/add-product')}}">ເພີ່ມສິນຄ້າ</a></li>
          <li><a href="{{url('/admin/view-products')}}">ສິນຄ້າທັງໝົດ</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ຄູປອງສ່ວນຫຼຸດ</span> <span class="label label-important">1</span></a>
        <ul>
        <li><a href="{{url('/admin/add-coupon')}}">ເພີ່ມ Coupon</a></li>
          <li><a href="{{url('/admin/view-coupons')}}">Coupon ທັງໝົດ</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ແບນເນີ່</span> <span class="label label-important">1</span></a>
        <ul>
        <li><a href="{{url('/admin/add-banner')}}">ເພີ່ມ Banners</a></li>
          <li><a href="{{url('/admin/view-banners')}}">Banners ທັງໝົດ</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!--sidebar-menu-->