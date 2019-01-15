<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin/dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  <li <?php if (preg_match("/dashboard/i", $url)){?> class="active"<?php }?>>
      <a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ປະເພດສິນຄ້າ</span> <span class="label label-important">4</span></a>
      <ul <?php if (preg_match("/category/i", $url)){?> style="display:block;"<?php }?>>
        <li  <?php if (preg_match("/add-category/i", $url)){?> class="active"<?php }?> > <a href="{{url('/admin/add-category')}}">ເພີ່ມ Category</a></li>
        <li <?php if (preg_match("/view-categories/i", $url)){?> class="active"<?php }?> > <a href="{{url('/admin/view-categories')}}">Category ທັງໝົດ</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ສິນຄ້າ</span> <span class="label label-important"></span></a>
      <ul <?php if (preg_match("/product/i", $url)){?> style="display:block;"<?php }?>>
        <li <?php if (preg_match("/add-product/i", $url)){?> class="active"<?php }?>><a href="{{url('/admin/add-product')}}">ເພີ່ມສິນຄ້າ</a></li>
        <li <?php if (preg_match("/view-products/i", $url)){?> class="active"<?php }?>><a href="{{url('/admin/view-products')}}">ສິນຄ້າທັງໝົດ</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ຄູປອງສ່ວນຫຼຸດ</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/coupon/i", $url)){?> style="display:block;"<?php }?>>
        <li <?php if (preg_match("/add-coupon/i", $url)){?> class="active"<?php }?>><a href="{{url('/admin/add-coupon')}}">ເພີ່ມ Coupon</a></li>
        <li <?php if (preg_match("/view-coupons/i", $url)){?> class="active"<?php }?>><a href="{{url('/admin/view-coupons')}}">Coupon ທັງໝົດ</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>ແບນເນີ່</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/banner/i", $url)){?> style="display:block;"<?php }?>>
        <li <?php if (preg_match("/add-banner/i", $url)){?> class="active"<?php }?>><a href="{{url('/admin/add-banner')}}">ເພີ່ມ Banners</a></li>
        <li <?php if (preg_match("/view-banners/i", $url)){?> class="active"<?php }?>><a href="{{url('/admin/view-banners')}}">Banners ທັງໝົດ</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->