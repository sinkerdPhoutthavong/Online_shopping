/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){ 
	$(function () { 
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

// show product attributes on html product details
$(document).ready(function(){ 
	//Change price && size in stock with size
	$("#selSize").change(function(){
			var idSize = $(this).val();
			if(idSize== ""){
				return false;
			}
			$.ajax({
				type: 'get',
				url:'/get-product-price',
				data:{idSize},
				success:function(resp){
					// alert(resp);
					//define this for show product becuase 2500#0 2500 is price and 0 instock
					var arr = resp.split('#');
					$("#getPrice").html("<font face='phetsarath OT'>ລາຄາ: "+ arr[0] +" ກີບ</font>");
					$("#price").val(arr[0]); 
					if(arr[1]==0){
						$("#cartButton1").show();
						$("#Availability").html("<font face='phetsarath OT' color='red'><b>ຂໍອະໄພ !! ສິນຄ້າໝົດ</b></font>");
					}else{
						$("#cartButton").show();
						$("#Availability").html("<font face='phetsarath OT' color='green'> <b>ສິນຄ້າມີໃນສາງ </b> </font>");
					}
				},error:function(){
					alert("Erorr");
				}
			});
	});
});
  
//Replace Main Image with select  Alternate Image
$(document).ready(function(){ 
	$(".ChangeImage").click(function(){
		var image = $(this).attr('src');
		$(".MainImage").attr("src",image);
	});
});

	// Instantiate EasyZoom instances
	var $easyzoom = $('.easyzoom').easyZoom();

	// Setup thumbnails example
	var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

	$('.thumbnails').on('click', 'a', function(e) {
		var $this = $(this);

		e.preventDefault();

		// Use EasyZoom's `swap` method
		api1.swap($this.data('standard'), $this.attr('href'));
	});

	// Setup toggles example
	var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

	$('.toggle').on('click', function() {
		var $this = $(this);

		if ($this.data("active") === true) {
			$this.text("Switch on").data("active", false);
			api2.teardown();
		} else {
			$this.text("Switch off").data("active", true);
			api2._init();
		}
	});

$().ready(function(){
	//REGISTER FORM
	$("#registerForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
			},
			password:{
				required:true,
				minlength:6
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
			}
		},
		messages:{
			name:{
				required:"ກະລຸນາປ້ອນຊື່ຂອງທ່ານ",
				minlength:"ຊື່ຂອງຜູ່ໃຊ້ຕ້ອງຫຼາຍກວ່າ 2 ຕົວອັກສອນ",
			},
			password:{
				required:"ກະລຸນາໃສ່ລະຫັດຜ່ານຂອງທ່ານ",
				minlength:"ລະຫັດຜ່ານຂອງທ່ານຕ້ອງມີ 6 ຕົວອັກສອນຂື້ນໄປ"
			},
			email:{
				required:"ກະລຸນາປ້ອນອີເມວຂອງທ່ານ",
				email:"ກາລຸນາໃສ່ອີເມວໃຫ້ຖືກຕ້ອງ",
				remote:"ອີເມວມີຢູ່ແລ້ວ ກະລຸນາລອງອີເມວໃໝ່!!"
				
			}
		}
	});
	//LOGIN FORM
	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email:true,
			},
			password:{
				required:true,
			}
		},
		messages:{
			email:{
				required:"ກະລຸນາປ້ອນອີເມວຂອງທ່ານ",
				email:"ກາລຸນາໃສ່ອີເມວໃຫ້ຖືກຕ້ອງ",	
			},
			password:{
				required:"ກະລຸນາໃສ່ລະຫັດຜ່ານຂອງທ່ານ",
			}
		}
	});
	//UPDATE ACCOUNT
	$("#accountForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept:"[a-zA-Z]+"
			},
			address:{
				required:true,
				minlength:6
			},
			city:{
				required:true,
				minlength:2
			},
			state:{
				required:true,
				minlength:2
			},
			country:{
				required:true,
			}

		},
		messages:{
			name:{
				required:"ກະລຸນາປ້ອນຊື່ຂອງທ່ານ",
				minlength:"ຊື່ຂອງຜູ່ໃຊ້ຕ້ອງຫຼາຍກວ່າ 2 ຕົວອັກສອນ",
				accept:"ຊຶ່ຜູ່ໃຊ້ຕ້ອງເປັນຕົວອັກສອນເທົ່ານັ້ນ"
			},
			address:{
				required:"ກະລຸນາປ້ອນທີ່ຢູ່ຂອງທ່ານ",
				minlength:"ທີ່ຢູ່ຂອງຜູ່ໃຊ້ລະບົບຕ້ອງຫຼາຍກ່ວາ 6 ຕົວອັກສອນ",
			},
			city:{
				required:"ກະລຸນາປ້ອນເມືອງຂອງທ່ານ",
				minlength:"ເມືອງຂອງຜູ່ໃຊ້ລະບົບຕ້ອງຫຼາຍກ່ວາ 2 ຕົວອັກສອນ",
			},
			state:{
				required:"ກະລຸນາປ້ອນແຂວງຂອງທ່ານ",
				minlength:"ແຂວງຂອງຜູ່ໃຊ້ລະບົບຕ້ອງຫຼາຍກ່ວາ 2 ຕົວອັກສອນ",
			},
			country:{
				required:"ກະລຸນາເລືອກປະເທດຂອງທ່ານ",
			}
		}
	});
	// PASSWORD STRENGTH SCRIPT
	$('#myPassword').passtrength({
		minChars: 4,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	});
	$('#new_pwd').passtrength({
		minChars: 4,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	});
	$('#confirm_pwd').passtrength({
		minChars: 4,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	});
	$('#loginPassword').passtrength({
		minChars: 4,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	});

	//Check Current User Password
	$("#current_pwd").keyup(function(){
		var current_pwd = $(this).val();
		$.ajax({
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type:'post',
			url:'/check-user-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if(resp=="false"){
					$("#chkPwd").html("<font face='phetsarath OT' color='red'>ລະຫັດຜ່ານປະຈຸບັນຂອງທ່ານບໍ່ຖືກຕ້ອງ</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font face='phetsarath OT' color='green'>ລະຫັດຜ່ານປະຈຸບັນຂອງທ່ານຖືກຕ້ອງ</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	$("#passwordForm").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	//COPY Billing Address to Shipping Address Script

	$("#copyAddress").click(function(){
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_email").val($("#billing_email").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_state").val($("#billing_state").val());
			$("#shipping_country").val($("#billing_country").val());
			$("#shipping_pincode").val($("#billing_pincode").val());
			$("#shipping_mobile").val($("#billing_mobile").val());
		}else{
			$("#shipping_name").val('');
			$("#shipping_address").val('');
			$("#shipping_email").val('');
			$("#shipping_city").val('');
			$("#shipping_state").val('');
			$("#shipping_country").val('');
			$("#shipping_pincode").val('');
			$("#shipping_mobile").val('');
		}
	});
	
	$('#Order_product').DataTable();
});

function selectPaymentMethod(){
	if($('#Paypal').is(':checked') || $('#bank').is(':checked') || $('#COD').is(':checked') || $('#pay_in_offices').is(':checked')){
		// alert("checked");
	}else{
		alert("ກະລຸນາເລືອກຊ່ອງທາງໃນການຊໍາລະສິນຄ້າ");
		return false;
	}
}



