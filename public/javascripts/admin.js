$(function(){
  //admin logout
  $("#logout").click(function() {
    var result = confirm("Bạn có thực sự muốn đăng xuất khỏi trang quản trị?");
    if (result) {
      $.post("./Admin/LogOut/", {}, function (data){
      });
    };
  });
 	var inforGenerals = [
												"Name", "Avatar", "Icon",
												"Trademarks", "Library", "Price", "Gift",
												"Discount", "Active", "Hot",
												"Screen","HDH", "CPU", "RAM", "Image_hot",
												"InternalMemory", "Description", "Carousel",
												"Installment"
											];
	var inforMobiles = [	
											"RearCamera", "FrontCamera", "MemoryStick",
											"SIM" , "Battery"
									];
	var inforTablets = [
											"RearCamera", "FrontCamera", "PortConnect",
											"SIM", "Size"
										]	;
	var inforLaptops = [
											"GraphicCard", "PortConnect", "Design",
											"Size", "LaunchTime"
										];
	var inforPC_Printer	= [
											"GraphicCard", "PortConnect", "OpticalDrive",
											"Name", "Avatar",
											"Avatar", "Price", "Discount",
											"GraphicCard", "PortConnect", "OpticalDrive",
											"MachineType", "Function", "Wattage",
											"PrintSpeed","PrintingLife", "PrintQuality", 
											"FirstPage","InkTypes",  "InternalMemory",
											"PortConnect","Trademarks",
										];
	var inforInkTypes = [
												"Name", "Avatar",
												"Avatar", "Price", "Discount",
												"WhereProduction", "Trademarks",
												"PrinterCompatibility", "MaxPrinterPage"
											];
	var inforFWatchs	= [
											"Name", "Trademarks", "Icon","Library", 
											"Avatar", "Price", "Discount", "Gift",
											"Hot", "Active", "FaceDiameter",
											"FaceMaterial", "FrameMaterial","WireMaterial", 
                      "WireWidth", "Utilities", "Waterproof", 
                      "BatteryLifeTime", "ObjectUser", "Description"
										];
  var inforSWatchs  = [
                      "Name", "Trademarks", "Icon","Library", "Carousel", 
                      "Avatar", "Price", "Discount", "Gift",
                      "Hot", "Active", "Screen","GraphicCard", "HDH", "FaceDiameter",
                      "FaceMaterial", "PortConnect", "Utilities", 
                      "BatteryLifeTime", "Description",
                    ];
	$("#categoryId").change(function() {
		var categoryId = $(this).val();
		$.post("./Ajax/ViewTrademark",{id: categoryId}, function (data) {
			var text = "";
			var data = JSON.parse(data);
			for (var item in data) {
				text += "<option value='" + data[item]["id"] + "'>"+ data[item]["name"] + "</option>";
			}
			$("#Trademarks").html(text);
		});
		// $(this).parent().nextAll().hide();
		$(this).parent().nextAll().removeClass('d-block');
		$(this).parent().nextAll().addClass('d-none');
		switch (categoryId) {
			case "1":	
				inforGenerals.forEach(function(currentValue){
				  var temp = "#"+ currentValue;
				  // $(temp).parent().show();
				  $(temp).parent().addClass('d-block');
				  $(temp).parent().removeClass('d-none');
				})
				inforMobiles.forEach(function(currentValue){
				  var temp = "#"+ currentValue;
				  // $(temp).parent().show();
				  $(temp).parent().addClass('d-block');
				  $(temp).parent().removeClass('d-none');
				})
				break;
			case "2":	
				inforGenerals.forEach(function(currentValue){
				  var temp = "#"+ currentValue;
				  // $(temp).parent().show();
				  $(temp).parent().addClass('d-block');
				  $(temp).parent().removeClass('d-none');
				})
				inforLaptops.forEach(function(currentValue){
				  var temp = "#"+ currentValue;
				  // $(temp).parent().show();
				  $(temp).parent().addClass('d-block');
				  $(temp).parent().removeClass('d-none');
				})
				break;
			case "3":
				inforGenerals.forEach(function(currentValue){
				  var temp = "#"+ currentValue;
				  // $(temp).parent().show();
				  $(temp).parent().addClass('d-block');
				  $(temp).parent().removeClass('d-none');
				})
				inforTablets.forEach(function(currentValue){
				  var temp = "#"+ currentValue;
				  // $(temp).parent().show();
				  $(temp).parent().addClass('d-block');
				  $(temp).parent().removeClass('d-none');
				})
				break;
			case "4":
        // inforGenerals.forEach(function(currentValue){
        //   var temp = "#"+ currentValue;
        //   // $(temp).parent().show();
        //   $(temp).parent().addClass('d-block');
        //   $(temp).parent().removeClass('d-none');
        // })
        // inforTablets.forEach(function(currentValue){
        //   var temp = "#"+ currentValue;
        //   // $(temp).parent().show();
        //   $(temp).parent().addClass('d-block');
        //   $(temp).parent().removeClass('d-none');
        // })
        // break;
				break;
			case "5":
				inforFWatchs.forEach(function(currentValue){
          var temp = "#"+ currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
      case "6": 
        inforSWatchs.forEach(function(currentValue){
          var temp = "#"+ currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
        break;
			case "7":	
        inforPC_Printer.forEach(function(currentValue){
          var temp = "#"+ currentValue;
          // $(temp).parent().show();
          $(temp).parent().addClass('d-block');
          $(temp).parent().removeClass('d-none');
        })
				break;
			default:
				break;
		}
	});
})
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