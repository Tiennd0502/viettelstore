$(function() {

	var sync1 = $("#sync1");
	var sync2 = $("#sync2");
	sync1.owlCarousel({
		nav: true,
		navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
		items: 1,
		dots: false,
		autoplayHoverPause: true,
		autoplay: true,
		autoplayTimeout: 5000,
		rewind: true,
		startPosition: 0,
		responsiveRefreshRate: 200,
	}).on('changed.owl.carousel', syncPosition)
	.on("click", ".owl-nav", function(el) {
            // body...
          });
	$("#sync1 .owl-nav ").hide();
	$("#sync1").mouseenter(function() {
		$("#sync1 .owl-nav ").show();
	}).mouseleave(function() {
		$("#sync1 .owl-nav ").hide();
	})

	sync2.on('initialized.owl.carousel', function() {
		sync2.find(".owl-item").eq(0).addClass("synced");
	}).owlCarousel({
		nav: false,
		items: 4,
		dots: false,
		slideBy: 4,
		rewind: true,
		responsiveRefreshRate: 100,
	}).on("click", ".owl-item", function(el) {
		el.preventDefault();
		var number = $(this).index();
		sync1.data('owl.carousel').to(number, 300, true);

	});

	function syncPosition(el) {
		var count = el.item.count - 1;
      // var current = Math.round(el.item.index - (el.item.count/2));
      //console.log("current before if: " + el.item.index);
      var current = el.item.index;
      // if(current < 0) {
      //   current = count;
      // }
      // if(current > count) {
      //   current = 0;
      // }
      // console.log("current afrer if: " + current);

      $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced");

      if ($("#sync2").data("owl.carousel") !== undefined) {
      	var lenghtOption = sync2.find('.owl-item').length;
      	var listObj = sync2.find('.owl-item.active');
      	var listIndex = [];
      	for (var i = 0; i < 4; i++) {
      		listIndex[i] = listObj.eq(i).index();
      	};
      	center(current, listIndex, lenghtOption);
      }
    }

    function center(number, array, end) {
    	var found = false;
    	var num = number;
    	var listIndex = array;
    	for (var i in listIndex) {
    		if (num === listIndex[i]) {
    			var found = true;
    		}
    	}
    	if (found === false) {
    		if (num > listIndex[listIndex.length - 1]) {
    			if (num === 7) {
    				sync2.data('owl.carousel').to(end - listIndex.length, 100, true);
    			} else {
    				sync2.data('owl.carousel').to(num - listIndex.length + 2, 100, true);
    			}
            // console.log("current out ListIndex: th1");
        } else {
        	if (num - 1 === -1) {
        		num = 0;

        	}
        	sync2.data('owl.carousel').to(num, 100, true);
          // console.log("current out ListIndex: th2");
        }
      } else if (num === listIndex[listIndex.length - 1]) {
        // console.log("current == ListIndex end");
        if (num === end - 1) {
        	sync2.data('owl.carousel').to(listIndex[1] - 1, 100, true);
        } else {
        	sync2.data('owl.carousel').to(listIndex[1], 100, true);
        };
      } else if (num === listIndex[0]) {
      	if (num === 0) {
      		sync2.data('owl.carousel').to(0, 100, true);
      	} else {
      		sync2.data('owl.carousel').to(num - 1, 100, true);
      	};
        // console.log("current == ListIndex star");
      } else {
        // console.log("k làm gì cả");
      }
    }
    // slide-right
    $("#slide-right-1, #slide-right-2, #post-slide").owlCarousel({
    	nav: false,
    	items: 1,
    	dots: false,
    	autoplayHoverPause: true,
    	autoplay: true,
    	autoplayTimeout: 5000,
    	rewind: true,
    	startPosition: 0,
    	responsiveRefreshRate: 200,
    })
    // slide - product
    $("#slide-watch, #slide-laptop").owlCarousel({
    	nav: true,
    	navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
    	items: 5,
    	dots: false,
    	autoplayHoverPause: true,
	    // autoplay: true,
	    autoplayTimeout: 5000,
	    rewind: true,
	    startPosition: 0,
	    responsiveRefreshRate: 200,
	  })
    $("#slide-mobile").owlCarousel({
    	nav: true,
    	navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
    	items: 5,
    	slideBy: 5,
    	dots: false,
    	autoplayHoverPause: true,
    	autoplay: false,
    	rewind: true,
    	startPosition: 0,
    	responsiveRefreshRate: 200,
    })
    $("#detail-img").owlCarousel({
    	nav: true,
    	navText: ["<img src='./public/images/owl-prev.png' alt='' >", "<img src='./public/images/owl-next.png' alt=''>"],
    	items: 1,
    	dots: false,
    	autoplayHoverPause: true,
    	autoplay: false,
    	rewind: true,
    	startPosition: 0,
    	responsiveRefreshRate: 200,
    	URLhashListener:true,
    	startPosition: 'URLHash'
    })
    // Lazyloading image
    if ('loading' in HTMLImageElement.prototype) {
    	const images = document.querySelectorAll("img.lazyload");
    	images.forEach(img => {
    		img.src = img.dataset.src;
    	});
    } else {
      // import Lazysize
      let script = document.createElement("script");
      script.async = true;
      script.src =
      "/public/javascript/lazysizes.min.js";
      document.body.appendChild(script);
    }
    $(".footer-link,.js-content-filter ").hide();
    // Show link footer
    $("#show-link").click(function() {
    	$(".footer-link").toggle();
    	if ($(this).prev().css("display") == "none") {
    		console.log($(this).prev().css("display"));
    		$(this).html("Xem thêm <i class='fa fa-caret-down'></i>");
    	} else {
    		console.log($(this).prev().css("display"));
    		$(this).html("Ẩn bớt <i class='fa fa-caret-up'></i>");
    	}
    })

    // control  filter-feature
    $(".js-open-filter").click(function() {
        // $(".js-open-filter").next().slideUp(500, "linear");
        $(this).next().slideToggle(500, "linear");

      })
        // 
        $(".js-close-filter").click(function() {
        	$(this).parent().slideUp(500, "linear");
        })
        // control fill-sort
        $(".js-closesort ~ a").click(function() {
        	$(".js-closesort ~ a").removeClass("check");
        	$(this).addClass("check");
        });     
    // xem thêm bài viết trong detail
    $(".js-read-more").click(function () {
    	if($(this).prev().css("height") != "600px"){
    		$(this).prev().css("height","600px");
    		$(this).html("Đọc thêm <i class='fas fa-caret-down'></i>");
    	}else {
    		$(this).prev().css("height","auto");
    		$(this).html("Ẩn bớt <i class='fas fa-caret-up'></i>");
    	}
    });
     // số lượng(quantity) khi order
     $(".js-change-quantity").click(function () {
     	var current = $(this).attr("change");
     	switch(current){
     		case "abate" : {
     			var quantity = $(this).next().text();
     			if(quantity == "1"){
     				$(this).next().text(1);
     			}else if(quantity == "2"){
     				$(this).next().text(Number(quantity) - 1);
     				$(this).removeClass("active");
     			}else{
     				$(this).next().text(Number(quantity) - 1);
     				$(this).addClass("active");
     			}
     			var currentId = $(this).next().attr('data-id');
     			$.ajax({  
     				url : "./Cart/UpdateQuantity",
     				method : "post",
     				data: {
     					"id": Number(currentId),
     					"quantity" : Number($(this).next().text()),
     				},
     				success: function (data){
     					window.location.reload(true);
     				}
     			});
     			break;
     		}
     		case "augment" : {
     			var quantity = $(this).prev().text();
     			if(quantity == "5"){
     				$(this).prev().text(5);
     			}else{
     				$(this).prev().text(Number(quantity) + 1);
     				$(this).prev().prev().addClass("active");
     			}
     			var currentId = $(this).prev().attr('data-id');
     			$.ajax({  
     				url : "./Cart/UpdateQuantity",
     				method : "post",
     				data: {
     					"id": Number(currentId),
     					"quantity" : Number($(this).prev().text()),
     				},
     				success: function (data){
     					window.location.reload(true);
     				}
     			});
     			break;
     		}
     	}
     });
  // Xóa sản phẩm
  $(".js-delete").click(function(event) {
  	var productId = $(this).attr("data-id");
  	$.ajax({  
  		url : "./Cart/DeleteItemCart",
  		method : "post",
  		data: {
  			"id": Number(productId),
  		},
  		success: function (data){
  		}
  	});
  });
  $(".buy-now").click(function () {
  	var productId = $(this).attr("data-id");
  	console.log(productId);
  	$.ajax({  
  		url : "./Cart/AddToCart/"+productId,
  		method : "post",
  		data: {
  			"id": Number(productId),
  		},
  		success: function (data){

  		}
  	});
  })
  // chọn màu khi đặt hàng
  $(".js-cart-color").click(function () {
  	$(this).next().slideToggle("slow");
  });
  // cart address
  $(".js-change-address").change(function(){
    // var checked = $(this).prop("checked");
    // var name = $(this).attr("data-name");
    $(".js-delivery-address").toggle(0,"linear");
    $(".js-received-market").toggle(0,"linear");
  });
  //show nội dung khi chọn trong vipservices
  $(".js-show-vipservices").change(function () {
  	var show_more = $(this).parent().next();
  	$(show_more).slideToggle(500,"linear");
  });
  $("#pay-offline").click(function(event) {
  	$.ajax({  
  		url : "./Cart/Order",
  		method : "post",
  		data: $("#form-order").serialize(),
  		success: function (data){
  			data = JSON.parse(data);
  			if(data == true){
  				alert("Bạn đã đặt hàng thành công! Sẽ có Nhân viên liện hệ xác nhận đơn hàng");
  			}else{
  				alert("Bạn đã đặt hàng thất bại!");
  			}
  			window.location.reload(true);
  		}
  	});
  });
  // dánh giá
  $(".show-input").click(function () {
  	var nameClass = $(this).attr("class");
  	if (nameClass === "show-input") {
  		$(this).addClass("closebtt");
  		$(this).text("Đóng lại");
  		$(".input").fadeIn();
  	}else{
  		$(this).removeClass("closebtt");
  		$(this).text("Gửi đánh giá của bạn");
  		$(".input").fadeOut();
  	}
  })
  $("#s1, #s2, #s3, #s4, #s5").mouseenter(function(){
  	var evaluate = ["Không thích", "Tạm được", "Bình thường", "Rất tốt", "Tuyệt vời quá"];
  	$(this).prevAll().addClass('voted');
  	$(this).addClass('voted');
  	$(this).nextAll().removeClass('voted')
  	var index = $(this).index();
  	$(".lsStar").removeClass("hide");
  	$(".lsStar").text(evaluate[index]);   
  }).mouseleave(function () {
  	var evaluate = ["Không thích", "Tạm được", "Bình thường", "Rất tốt", "Tuyệt vời quá"];
  	var value = $("#hdfStar").val();
  	if ( value != 0) {
  		for (var i = 1; i < 6 ; i++) {
  			if (i <= value) {
  				$("#s"+ i).addClass("voted");
  			}else{
  				$("#s"+ i).removeClass("voted");
  			}
  		}
  		$(".lsStar").text(evaluate[value - 1]);   
  	}else{
  		$(this).parent().children().removeClass('voted');
  		$(".lsStar").addClass("hide");
  	};
  }).click(function () {
  	var currentIndex = $(this).index();
  	$("#hdfStar").val(currentIndex + 1);
  	$(".write-comment.hide").removeClass("hide");
  })

  $(".write > textarea").keyup(function() {
  	var countTxt = $.trim($(this).val()).length;
  	if(countTxt != 0 && countTxt < 80){
  		$(".ckeckWrite").text(countTxt + " ký tự (tối thiểu 80)")
  	}else{
  		$(".ckeckWrite").text("");
  	}
  });
  // Search product of custumer
  $("#js-search").keyup(function() {
  	var keyword = $.trim($(this).val());
  	if (keyword.length > 1) {
  		$.ajax({  url : "./Ajax/Search/"+ keyword,
  			method : "post",
            // data: $("#search").serialize(),
            success: function (data){
            	data = JSON.parse(data);
            	if (data == false) {
            		$("#js-wrap-suggestion").hide();
            	}else{
            		var _html ="";
            		var index = 1;
            		for (var item in data) {
            			_html += "<li>";
            			_html += '<a href="'+ data[item]["slug"] +'/Detail/'+ data[item]["id"] +'">';
            			_html += '<img src="public/images/avatar'+ data[item]["image"] +'" alt="">';
            			_html += '<div class="item-suggestion-infor">';
            			_html += '<div class="product__name">'+ data[item]["name"] +'</div>'; 
                  // _html += '<h6 class="text-promo">Hàng sắp về</h6>';
                  _html += '<div class="product__price">';
                  if (data[item]["discount"] != 0) {
                  	var discount = FormatCurrency(data[item]["price"],data[item]["discount"]);
                  	var price = FormatCurrency(data[item]["price"]);
                  	_html += ' '+ discount +'₫ ';
                  }else{
                  	var price = FormatCurrency(data[item]["price"]);
                  	_html += ' '+ price +'₫ ';
                  }
                  _html += '</div>';
                  _html += '</div>';
                  _html += '</a>';
                  _html += '</li>';
                  if (index == 7) {
                  	break;
                  };
                  index ++;
                }
                $("#js-wrap-suggestion").html(_html);
                $("#js-wrap-suggestion").show();
              }
            }
          });
  	}else{
  		$("#js-wrap-suggestion").html("");
  		$("#js-wrap-suggestion").hide();
  	};
  });
})

// Gửi đánh giá sản phẩm 
function InsertEvaluate(){
	var count = $.trim($("#js-content-evaluated").val());
	var name  = $.trim($("#name").val());
	var phone = $.trim($("#phone").val());
	var email = $.trim($("#email").val());
	if ($("#hdfStar").val() == 0) {
		$("#js-error-message").text("Bạn chưa đánh giá điểm sao, vui lòng đánh giá.");
		return false;
	}else {
		$("#js-error-message").val("");
	}
	if (count == "") {
		$("#js-error-message").text("Vui lòng nhập nội dung đánh giá về sản phẩm.");
		$("#js-content-evaluated").val("");
		$("#js-content-evaluated").css("border","1px solid #d0021b");
		$("#js-content-evaluated").focus();
		return false;
	}else{
		if (count.length < 80) {
			$("#js-error-message").text("Nội dung đánh giá quá ít. Vui lòng nhập thêm nội dung đánh giá về sản phẩm.");
			$("#js-content-evaluated").focus();
			$("#js-content-evaluated").css("border","1px solid #d0021b");
			return false;
		}else{
			$("#js-content-evaluated").css("border","none");
			$("#js-error-message").text("");
		}
	}
	if(name == ""){
		$("#js-error-message").text("Vui lòng nhập họ và tên.");
		$("#name").focus();
		$("#name").css("border-color","#d0021b");
		return false;
	}else{
		$("#name").css("border-color","#ddd");
		$("#js-error-message").text("");
	}
	if(phone == "" ){
		$("#js-error-message").text("Vui lòng nhập số điện thoại.");
		$("#phone").focus();
		$("#phone").css("border-color","#d0021b");
		return false;
	}else{
		if (phone.length != 10) {
			$("#js-error-message").text("Số điện thoại không hợp lệ.");
			alert("Số điện thoại không hợp lệ.");
			$("#phone").focus();
			return false;
		}else{
			$("#phone").css("border-color","#ddd");
			$("#js-error-message").text("");
		};
	}

	$.ajax({  url : "./Ajax/PostEvaluate",
		method : "post",
		data: $("#js-my-evaluate").serialize(),
		success: function (data){
			jQuery("#js-reset-evaluate").click();
			$("#hdfStar").val("0");
			jQuery("#s5").mouseleave();
			jQuery(".show-input").click();
			alert(data);
		}
	});
}

// them 1 img
function AttachImg(el,insertNames){
	var lasting = jQuery('#attach-view-'+insertNames+' li').last().prev().find('input[type="file"]').val();
	if(lasting != ""){
		var date = new Date();
		var time = date.getTime();
		var _html = '<li class="img-box d-none" id="'+ insertNames + time +'">';
		_html += '<input type="file" name="'+insertNames+'" class="form-control d-none" onchange="ShowImg(this,\''+ time + '\',\''+ insertNames +'\')" >';
		_html += '<span class="icon-close" onclick="DelImgs(this)">';
		_html += '<i class="fas fa-times-circle"></i></span>';
		_html += '</li>';
		var inserAttach = $("#insert-attach-"+ insertNames);
		inserAttach.before(_html);
		jQuery('#attach-view-'+insertNames+' li').last().prev().find('input[type="file"]').click();
	}else {
		if (lasting == "") {
			jQuery('#attach-view-'+insertNames+' li').last().prev().find('input[type="file"]').click();
		};
	}
}
function ShowImg(el, time, insertNames){
	var fileSelected = el.files;
	if(fileSelected.length > 0){
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImg = document.createElement("img");
			newImg.src = srcData;
			$("#"+ insertNames + time).append(newImg.outerHTML);
		}
		fileReader.readAsDataURL(fileToLoad);
	}
	$(el).parent().removeClass('d-none');
}

// thêm nhiều ảnh
function AttachImgs(el,insertNames){
	var lasting = jQuery('#attach-view-'+insertNames+' li').last().prev().find('input[type="file"]').val();
	if(lasting != ""){
		var date = new Date();
		var time = date.getTime();
		var _html = '<li class="img-box d-none" id="'+ insertNames + time +'">';
		_html += '<input type="file" name="'+insertNames+'[]" class="form-control d-none" onchange="ShowImgs(this,\''+ time + '\',\''+ insertNames +'\')" >';
		_html += '<span class="icon-close" onclick="DelImgs(this)">';
		_html += '<i class="fas fa-times-circle"></i></span>';
		_html += '</li>';
		var inserAttach = $("#insert-attach-"+ insertNames);
		inserAttach.before(_html);
		jQuery('#attach-view-'+insertNames+' li').last().prev().find('input[type="file"]').click();
	}else {
		if (lasting == "") {
			jQuery('#attach-view-'+insertNames+' li').last().prev().find('input[type="file"]').click();
		};
	}
	
}
function ShowImgs(el, time, insertNames){
	var fileSelected = el.files;
	if(fileSelected.length > 0){
		var fileToLoad = fileSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(fileLoaderEvent){
			var srcData = fileLoaderEvent.target.result;
			var newImg = document.createElement("img");
			newImg.src = srcData;
			$("#"+ insertNames + time).append(newImg.outerHTML);
		}
		fileReader.readAsDataURL(fileToLoad);
	}
	$(el).parent().removeClass('d-none');
}
function DelImgs (el) {
	$(el).parent().remove();
}
// Gọi ajax để xóa ảnh trên data
function DelDataImg(el, tableName, id, col, path){
	var tableName = tableName;
	var id = id;
	var col = col;
	var path = path;
	$.post("./Ajax/DelProductImg", {tableName : tableName, id : id, col : col, path : path }, function (data){
		// var data = JSON.parse(data);
		// alert(data);
	});
	$(el).parent().remove();
}
// hàm xử lý kiểu tiền tệ 
function FormatCurrency(olded, discount = 0 ){
	var result = "";
	if (discount != 0) {
		var number = olded *(100 - discount)/100;
	}else{
		var number = olded;
	}
	number = number.toString(10);
	var index = 0;
	for (var i = number.length - 1; i >= 0; i--) {
		if(index < 3){
			result += "0";
		}else if(index == 3 || index == 6){
			result += "." + number[i];
		}else if(index == 4 && number[i+1] > 5) {
			result += number[i] + 1;
		}else{
			result += number[i];
		};
		index++;
	};
	result = result.split("").reverse().join("");
  // console.log(result);
  return result;
}