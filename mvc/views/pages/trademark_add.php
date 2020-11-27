
<?php if(isset($data["Item"])){
  $trademark = json_decode($data["Item"], TRUE);
} ?>

<?php 
  if(isset($data["Result"])){ 
    if($data["Result"] == "true"){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thêm thương hiệu thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }else { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>
            <?= isset($trademark) ? "Sửa thương hiệu thất bại!" : "Thêm thương hiệu thất bại!" ?>
           
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php } ?>
  <?php } ?>

<!-- form thêm danh mục -->
  <form action="Trademark/<?= isset($trademark) ? "Edittrademark/".$trademark["id"] : "Addtrademark" ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">Mã thương hiệu</label>
      <input type="text" name="id" class="form-control" placeholder="" value='<?= isset($trademark) ? $trademark["id"] : "" ?>' readonly="" >
    </div>
    <div class="form-group">
	    <label for="category">Danh mục</label>
	    <select class="form-control" id="category" name="category_id">
	    <?php 
	    	$data["Categorys"] = json_decode($data["Categorys"],TRUE);
	    	foreach ($data["Categorys"] as $category) { 
          if(isset($trademark) && $trademark["category_id"] == $category["id"]){?>
	    		<option value="<?= $category["id"]?>" selected><?= $category["name"]?></option>
	    	<?php }else { ?>
          <option value="<?= $category["id"]?>"><?= $category["name"]?></option>
        <?php } } ?>
	    </select>
	  </div>
    <div class="form-group">
      <label for="">Tên thương hiệu</label>
      <input type="text" name="name" class="form-control" value="<?= isset($trademark) ? $trademark["name"] : "" ?>" placeholder="Tên thương hiệu" >
    </div>
    <div class="form-group">
      <label for="" class="d-block">Logo</label>
      <input type="text" name="path" class="form-control d-inline-block w-25" value='<?= isset($trademark) ? $trademark["path"] : "" ?>' id="uploadFile">
      <input type="file" name="image" class="form-control d-none" id="ImageTrademark">
      <label for="ImageTrademark" class=" btn btn-dark " style="margin-bottom: .2rem!important;">Chọn ảnh<i class="fas fa-cloud-upload-alt ml-2"></i></label>

      <?php 
        if(isset($trademark)){ ?>
          <img class="ml-3" src="./public/images/<?= isset($trademark) ? $trademark["path"] : "" ?>" width="120" alt="">
        <?php } ?>
    </div>

    <button type="submit" name="<?= isset($trademark) ? "updateTrademark" : "addTrademark" ?>" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="Trademark" class="btn btn-primary">Danh sách</a>
  </form>