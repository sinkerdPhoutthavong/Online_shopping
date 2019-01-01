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
					$("#getPrice").html("<font face='phetsarath OT'>ລາຄາ: "+arr[0]+" ກີບ</font>");
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
