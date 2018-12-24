
$(document).ready(function(){
	$("#current_pwd").keyup(function() {
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type : 'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){	
				//  alert(resp);
				if(resp=="False"){
					$("#chkPwd").html("<font color='red'>ລະຫັດຜ່ານທີ່ທ່ານປ້ອນບໍ່ຖືກຕ້ອງ</font>");
				}
				if(resp=="true"){
					$("#chkPwd").html("<font color='green'> ລະຫັດຜ່ານທີ່ທ່ານປ້ອນຖືກຕ້ອງ</font>");
				}
			},error:function() {
				alert("Error");
			}
		})
	});

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
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

	// add Category
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			Description:{
				required:true,
			},
			url:{
				required:true,
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
		// add product
		$("#add_product").validate({
			rules:{
				category_id:{
					required:true
				},
				product_name:{
					required:true
				},
				product_code:{
					required:true
				},
				product_color:{
					required:true
				},
				price:{
					required:true,
					number : true,
				},
				image:{
					required:true
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
		// edit product
		$("#edit_product").validate({
			rules:{
				category_id:{
					required:true
				},
				product_name:{
					required:true
				},
				product_code:{
					required:true
				},
				product_color:{
					required:true
				},
				price:{
					required:true,
					number : true,
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
	// edit Category
    $("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			Description:{
				required:true,
			},
			url:{
				required:true,
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
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
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
	
	$("#password_validate").validate({
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

	// $("#delCat").click(function(){
	// 	if(confirm('ທ່ານຕ້ອງການລົບ Category ນີ້ແທ້ບໍ?')){
	// 		return true;
	// 	}
	// 	return false;
	// });

	// $("#delProduct").click(function(){
	// 	if(confirm('ທ່ານຕ້ອງການລົບສິນຄ້ານີ້ແທ້ບໍ?')){
	// 		return true;
	// 	}
	// 	return false;
	// });
	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title : "Are you sure?",
			text : "!! You will can't Recover this inforamtion !!",
			type : "warning",
			showCancelButton : true,
			confirmButtonColor: '#3085d6',
			confirmButtonClass : "btn-danger",
			cancelButtonText: 'No Cancle',
			CancelButton: '#d33',
			confirmButtonText : 'Yes, Delete',
			reverseButtons: true,
		},
		function(){
			window.location.href="/admin/"+deleteFunction+"/"+id;
		});
	});
	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div class="field_wrapper" style="margin-left:180px;"><input type="text" name="sku[]" name="sku[]" id="sku" placeholder="SKU" style="width:120px;margin-right:4px;margin-top:5px;"/><input type="text" name="size[]" id="size" placeholder="ຂະໜາດ" style="width:120px;margin-right:4px;margin-top:5px;"/><input type="text" name="price[]" id="price" placeholder="ລາຄາ" style="width:120px;margin-right:4px;margin-top:5px;"/><input type="text" name="stock[]"  id="stock" placeholder="ເຄື່ອງໃນສາງ" style="width:120px;margin-right:4px;margin-top:5px;"/><a href="javascript:void(0);" class="remove_button"> ລຶບ</a></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter   
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
	
});
