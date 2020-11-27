<?php 
  if (isset($data["Result"])) {

    $data["Result"] = json_decode($data["Result"]);

    if (is_object($data["Result"]) && isset($data["Action"])) {
      foreach ($data["Result"] as $key => $values) {
        if(is_array($values)){
          foreach ($values as $value) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?= $value ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php  }
        }else {
          if($key == "error"){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?= $values ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php }
        }
      }
    }else { 
      if ($data["Result"] == "true") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?= $data["Action"]?> hàng hóa thành công!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php }else{ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><?= $data["Action"]?> hàng hóa thất bại!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } 
    }
  }
?>
<?php 
  if (isset($data['Item'])) {
     $data["Item"] = json_decode($data["Item"]);
  }
 ?>
 <?php 
  $categorys = json_decode($data["Categorys"],TRUE);
  $trademarks = json_decode($data["Trademarks"],TRUE);
 ?>
<form action="Product/<?= isset($data["Item"]) && !isset($data["Insert"]) ? "editProduct/".$data["Item"]->infor->id : "addProduct" ?>" method="POST" enctype="multipart/form-data">
	<div class="form-row" id="form-row">
    <div class="form-group col-md-4">
      <label for="category">Loại hàng</label>
      <select id="categoryId" name="category_id" class="form-control" >
        <?php foreach ($categorys as $category) { ?>
           <option value="<?= $category["id"]?>" <?= (isset($data["Item"]) && $data["Item"]->infor->category_id == $category["id"]) ? "selected" : "" ?> ><?= $category["name"]?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="Trademarks">Thương hiệu</label>
      <select id="Trademarks" name="trademark_id" class="form-control ">
        <?php foreach ($trademarks as $trademark) { 
          if($trademark["category_id"] == 1) {?>
           <option value="<?= $trademark["id"]?>" <?= (isset($data["Item"]->infor) && $data["Item"]->infor->trademark_id == $trademark["id"]) ? "selected" : "" ?>  ><?= $trademark["name"]?></option>
        <?php } } ?>
      </select>
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Id">Mã sản phẩm</label>
      <input type="text" name="id" class="form-control" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->id : "" ?>" id="Id" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="Name">Tên sản phẩm</label>
      <input type="text" name="name" class="form-control" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->name : "" ?>" id="Name" placeholder="Tên sản phẩm">
    </div>
    <div class="form-group col-md-4 ">
      <div class="form-upload" id="Avatar" >
        <label class="insert-attach"><i class="fas fa-camera-retro mr-2" ></i> Ảnh đại diện( Chỉ chọn 1 ảnh)</label>
      </div>
      <div class="list-attach">
        <ul class="attach-view" id="attach-view-image">
          <?php if(isset($data["Item"]->infor) && !empty($data["Item"]->infor->image)){ ?>
            <li class="img-box">
              <input type="hidden" name="linkImage" value="./public/images/avatar/<?=$data["Item"]->infor->image ?>">
              <span class="icon-close" onclick="DelDataImg(this,'products','<?=$data["Item"]->infor->id ?>','image','./public/images/avatar/<?=$data["Item"]->infor->image ?>')"><i class="fas fa-times-circle"></i></span> 
              <img src="./public/images/avatar/<?=$data["Item"]->infor->image ?>" alt="">
            </li>
          <?php } ?>
          <li class="" id="insert-attach-image">
            <label class="insert-attach " onclick="AttachImg(this, 'image')"><i class="far fa-plus"></i></label>
          </li>
        </ul>
      </div>
    </div>
    <div class="form-group col-md-4 ">
      <div class="form-upload" id="Icon" >
        <label class="insert-attach"><i class="fas fa-camera-retro mr-2" ></i> Icon( Chỉ chọn 1 ảnh)</label>
      </div>
      <div class="list-attach">
        <ul class="attach-view" id="attach-view-icon">
          <?php if(isset($data["Item"]->infor) && !empty($data["Item"]->infor->icon)){ ?>
            <li class="img-box">
              <input type="hidden" name="LinkIcon" value="./public/images/icon/<?=$data["Item"]->infor->icon ?>">
              <span class="icon-close" onclick="DelDataImg(this,'products','<?=$data["Item"]->infor->id ?>','icon','./public/images/icon/<?=$data["Item"]->infor->icon?>')"><i class="fas fa-times-circle"></i></span> 
              <img src="./public/images/icon/<?=$data["Item"]->infor->icon?>" alt="">
            </li>
          <?php } ?>
          <li class="" id="insert-attach-icon">
            <label class="insert-attach " onclick="AttachImg(this, 'icon')"><i class="far fa-plus"></i></label>
          </li>
        </ul>
      </div>
    </div>
    <div class="form-group col-md-4 ">
      <div class="form-upload" id="Library">
        <label class="insert-attach"><i class="fas fa-camera-retro mr-2" ></i> Ảnh chi tiết</label>
      </div>
      <div class="list-attach">
        <ul class="attach-view" id="attach-view-library">
           <?php if (isset($data["Item"]->image_library) && !empty($data["Item"]->image_library)) { 
              foreach ($data["Item"]->image_library as $key => $value) { ?>
                <li class="img-box">
                  <span class="icon-close" onclick="DelDataImg(this,'image_library','<?=$value->id ?>','','./public/images/image_library/<?=$value->path?>')"><i class="fas fa-times-circle"></i></span>
                  <img src="./public/images/image_library<?= $value->path ?>" alt="">
                </li>
              <?php } 
            } ?>
          <li class="" id="insert-attach-library">
            <label class="insert-attach " onclick="AttachImgs(this, 'library')"><i class="far fa-plus"></i></label>
          </li>
        </ul>
      </div>   
    </div>
    <div class="form-group col-md-4 ">
      <div class="form-upload" id="Image_hot" >
        <label class="insert-attach"><i class="fas fa-camera-retro mr-2" ></i> Ảnh nổi bật nhất( Chỉ chọn 1 ảnh)</label>
      </div>
      <div class="list-attach img-carousel">
        <ul class="attach-view" id="attach-view-image_hot">
          <?php if(isset($data["Item"]->infor) && !empty($data["Item"]->infor->image_hot)){ ?>
            <li class="img-box">
              <input type="hidden" name="image_hot" value="./public/images/avatar/<?=$data["Item"]->infor->image_hot ?>">
              <span class="icon-close" onclick="DelDataImg(this,'products','<?=$data["Item"]->infor->id ?>','image_hot','./public/images/avatar_hot/<?=$data["Item"]->infor->image_hot ?>')"><i class="fas fa-times-circle"></i></span> 
              <img src="./public/images/avatar_hot/<?=$data["Item"]->infor->image_hot ?>" alt="">
            </li>
          <?php } ?>
          <li class="" id="insert-attach-image_hot">
            <label class="insert-attach " onclick="AttachImg(this, 'image_hot')"><i class="far fa-plus"></i></label>
          </li>
        </ul>
      </div>
    </div>
    <div class="form-group col-md-4 ">
      <div class="form-upload" id="Carousel" >
        <label class="insert-attach"><i class="fas fa-camera-retro mr-2" ></i> Ảnh carousel( ảnh slide)</label>
      </div>
      <div class="list-attach img-carousel">
        <ul class="attach-view" id="attach-view-carousel">
          <?php if (isset($data["Item"]->image_carousel) && !empty($data["Item"]->image_carousel)) { 
              foreach ($data["Item"]->image_carousel as $value) { ?>
                <li class="img-box">
                  <span class="icon-close" onclick="DelDataImg(this,'image_carousel','<?=$value->id ?>','','./public/images/image_carousel/<?=$value->path?>')"><i class="fas fa-times-circle"></i></span>
                  <img src="./public/images/image_carousel<?= $value->path ?>" alt="">
                </li>
              <?php } 
            } ?>
          <li class="" id="insert-attach-carousel">
            <label class="insert-attach " onclick="AttachImgs(this, 'carousel')"><i class="far fa-plus"></i></label>
          </li>
        </ul>
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="Price">Đơn giá</label>
      <input type="text" name="price" class="form-control" id="Price" placeholder="Đơn giá" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->price : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="Discount">Giảm giá( %)</label>
      <input type="text" name="discount" class="form-control" id="Discount" placeholder="Giảm giá" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->discount : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="Installment">Trả góp( %)</label>
      <input type="text" name="installment" class="form-control" id="Installment" placeholder="Trả góp" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->installment : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="Gift">Quà tặng kèm</label>
      <input type="text" name="gift" class="form-control" id="Gift" placeholder="Quà tặng kèm" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->gift : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="Hot">Sản phẩm nổi bật</label>
      <select id="Hot" class="form-control" name="hot">
	      <option value="0" <?= (isset($data["Item"]->infor) && $data["Item"]->infor->hot == 0 ) ? 'selected=""' : "" ?>>Không</option>
	      <option value="1" <?= (isset($data["Item"]->infor) && $data["Item"]->infor->hot == 1 ) ? 'selected=""': "" ?>>Có</option>
	    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="Active">Trạng thái</label>
      <select id="Active" class="form-control" name="active">
	      <option value="0" <?= (isset($data["Item"]->infor) && $data["Item"]->infor->active == 0 ) ? 'selected=""' : "" ?>>Hiển thị</option>
	      <option value="1" <?= (isset($data["Item"]->infor) && $data["Item"]->infor->active == 1 ) ? 'selected=""' : "" ?>>Ẩn</option>
	    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="Screen">Màn hình</label>
      <input type="text" name="screen" class="form-control" id="Screen" placeholder="Màn hình" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->screen : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="HDH">Hệ điều hành</label>
      <input type="text" name="operating_system" class="form-control" id="HDH" placeholder="Hệ điều hành" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->operating_system : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="RearCamera">Camera sau</label>
      <input type="text" name="rear_camera" class="form-control" id="RearCamera" placeholder="Camera sau" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->rear_camera : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="FrontCamera">Camera trước</label>
      <input type="text" name="front_camera" class="form-control" id="FrontCamera" placeholder="Camera trước" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->front_camera : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="CPU">CPU</label>
      <input type="text" name="cpu" class="form-control" id="CPU" placeholder="CPU" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->cpu : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="RAM">RAM</label>
      <input type="text" name="ram" class="form-control" id="RAM" placeholder="RAM" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->ram : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="InternalMemory">Bộ nhớ trong</label>
      <input type="text" name="internal_memory" class="form-control" id="InternalMemory" placeholder="Bộ nhớ trong" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->internal_memory : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="MemoryStick">Thẻ nhớ</label>
      <input type="text" name="memory_stick" class="form-control" id="MemoryStick" placeholder="Hỗ trợ thẻ nhớ" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->memory_stick : "" ?>">
    </div>
    <div class="form-group col-md-4  ">
      <label for="SIM">SIM</label>
      <input type="text" name="sim" class="form-control" id="SIM" placeholder="Sim" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->sim : "" ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="Battery">Dung lượng pin</label>
      <input type="text" name="battery_capacity" class="form-control" id="Battery" placeholder="Dung lượng pin" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->battery_capacity : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="PortConnect">Cổng kết nối</label>
      <input type="text" name="port_connect" class="form-control" id="PortConnect" placeholder="Cổng kết nối" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->port_connect : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Conversation">Đàm thoại</label>
      <input type="text" name="conversation" class="form-control" id="Conversation" placeholder="Đàm thoại" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->conversation : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="GraphicCard">Card Màn hình</label>
      <input type="text" name="graphic_card" class="form-control" id="GraphicCard" placeholder="Card Màn hình" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->graphic_card : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Design">Thiết kế</label>
      <input type="text" name="design" class="form-control" id="Design" placeholder="Thiết kế" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->design : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Size">Kích thước ()</label>
      <input type="text" name="size" class="form-control" id="Size" placeholder="Kích thước" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->size : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="LaunchTime">Thời điểm ra mắt</label>
      <input type="text" name="launch_time" class="form-control" id="LaunchTime" placeholder="Thời điểm ra mắt" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->launch_time : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="OpticalDrive">Ổ đĩa quang</label>
      <input type="text" name="optical_drive" class="form-control" id="OpticalDrive" placeholder="Ổ đĩa quang" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->optical_drive: "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="MachineType">Loại máy</label>
      <input type="text" name="machine_type" class="form-control" id="MachineType" placeholder="Loại máy" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->machine_type : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Function">Chức năng</label>
      <select id="Function" class="form-control" name="function" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->function : "" ?>">
        <option value="0" selected="">In 2 mặt</option>
        <option value="1">In 1 mặt</option>
      </select>
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Wattage">Công suất khuyến nghị</label>
      <input type="text" name="wattage" class="form-control" id="Wattage" placeholder="Công suất khuyến nghị" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->wattage : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="PrintSpeed">Tốc độ in</label>
      <input type="text" name="print_speed" class="form-control" id="PrintSpeed" placeholder="Tốc độ in" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->print_speed : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="PrintingLife">Tuổi thọ in</label>
      <input type="text" name="printing_life" class="form-control" id="PrintingLife" placeholder="Tuổi thọ in" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->printing_life : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="PrintQuality">Chất lượng in</label>
      <input type="text" name="print_quality" class="form-control" id="PrintQuality" placeholder="Chất lượng in" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->print_quality : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="InkTypes">Loại mực in</label>
      <input type="text" name="ink_types" class="form-control" id="InkTypes" placeholder="Loại mực in" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->ink_types : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="FirstPage">Thời gian in trang đầu</label>
      <input type="text" name="first_page_time" class="form-control" id="FirstPage" placeholder="Thời gian in trang đầu" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->first_page_time : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="WhereProduction">Nơi sản xuất</label>
      <input type="text" name="where_product" class="form-control" id="WhereProduction" placeholder="Nơi sản xuất" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->where_product : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="PrinterCompatibility">Máy in tương thích</label>
      <input type="text" name="printer_compatibility" class="form-control" id="PrinterCompatibility" placeholder="Máy in tương thích" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->printer_compatibility : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="MaxPrinterPage">Số trang in tối đa(phủ 5%)</label>
      <input type="text" name="max_printer_page" class="form-control" id="MaxPrinterPage" placeholder="1000" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->max_printer_page : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="FaceDiameter">Đường kính mặt</label>
      <input type="text" name="face_diameter" class="form-control" id="FaceDiameter" placeholder="39 mm" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->face_diameter : "" ?>">
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="FaceMaterial">Chất liệu mặt</label>
      <input type="text" name="face_material" class="form-control" id="FaceMaterial" placeholder="Kính khoáng (Mineral)" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->face_material : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="FrameMaterial">Chất liệu khung viền</label>
      <input type="text" name="frame_material" class="form-control" id="FrameMaterial" placeholder="Thép không gỉ" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->frame_material : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="WireMaterial">Chất liệu dây</label>
      <input type="text" name="wire_material" class="form-control" id="WireMaterial" placeholder="Chất liệu dây" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->wire_material : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="WireWidth">Độ rộng dây (mm)</label>
      <input type="text" name="wire_width" class="form-control" id="WireWidth" placeholder="Độ rộng dây" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->wire_width : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Utilities">Tiện ích</label>
      <input type="text" name="utilities" class="form-control" id="Utilities" placeholder="Tiện ích" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->utilities : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="Waterproof">Chống nước</label>
      <input type="text" name="waterproof" class="form-control" id="Waterproof" placeholder="Chống nước" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->waterproof : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="BatteryLifeTime">Thời gian Pin</label>
      <input type="text" name="battery_life_time" class="form-control" id="BatteryLifeTime" placeholder="Thời gian Pin" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->battery_life_time : "" ?>" >
    </div>
    <div class="form-group col-md-4 d-none">
      <label for="ObjectUser">Đối tượng sử dụng (Nam/Nữ)</label>
      <input type="text" name="object_use" class="form-control" id="ObjectUser" placeholder="Nam/Nữ" value="<?= isset($data["Item"]->infor) ? $data["Item"]->infor->object_use : "" ?>" >
    </div>
    <div class="form-group col-md-12">
      <label for="Description">Bài viết về sản phẩm</label>
      <textarea name="description" id="Description">
        <?= isset($data["Item"]->infor) ? $data["Item"]->infor->description : "" ?> 
      </textarea>
     </div>
  </div>
  <div class="form-group">
  	<button type="submit" name="<?= isset($data["Item"]->infor) && !isset($data["Insert"])  ? "editProduct" : "addProduct" ?>" class="btn btn-primary" id="submitProduct">Lưu lại</button>
  	<button type="reset" class="btn btn-primary">Nhập lại</button>
  	<a href="Product/AllProduct" class="btn btn-primary">Danh sách </a>
  </div>
</form>