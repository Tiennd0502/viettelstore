
<?php if(isset($data["Item"])){
  $category = json_decode($data["Item"], TRUE);
} ?>

<?php 
  if(isset($data["Result"])){ 
    if($data["Result"] == "true"){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thêm loại hàng thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }else { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>
            <?= isset($category) ? "Sửa loại hàng thất bại!" : "Thêm loại hàng thất bại!" ?>
           
          </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php } ?>
  <?php } ?>

<!-- form thêm danh mục -->
  <form action="Category/<?= isset($category) ? "EditCategory/".$category["id"] : "AddCategory" ?>" method="POSt" autocomplete="off" >
    <div class="form-group">
      <label for="">Mã loại</label>
      <input type="text" name="id" class="form-control" placeholder="Mã loại hàng" value='<?= isset($category) ? $category["id"] : "" ?>' readonly="" >
    </div>
    <div class="form-group">
      <label for="exampleInputName">Tên loại</label>
      <input type="text" name="name" class="form-control" value='<?= isset($category) ? $category["name"] : "" ?>' id="exampleInputName" placeholder="Tên loại hàng">
    </div>
    <div class="form-group">
      <label for="exampleInputSlug">Tên không dấu</label>
      <input type="text" name="slug" class="form-control" value='<?= isset($category) ? $category["slug"] : "" ?>' id="exampleInputSlug" placeholder="Ten-khong-dau">
    </div>
    <div class="form-group">
      <label class="d-block" for="exampleInputIcon">Icon (Vui lòng chọn icon trong <a href="https://fontawesome.com/icons?d=gallery" target="_blank">fontawesome.com</a>)</label>
      <input type="text" name="icon" class="form-control w-50 d-inline-block" value='<?= isset($category) ? $category["icon"] : "" ?>' id="exampleInputIcon" placeholder='<i class="fas fa-tasks"></i>'>
      <div class="d-inline-block w-25 ml-3" id="edit-icon" style="font-size: 22px"><?= isset($category) ? html_entity_decode($category["icon"]) : "" ?></div>
    </div>
    <button type="submit" name="<?= isset($category) ? "updateCategory" : "addCategory" ?>" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="Category" class="btn btn-primary">Danh sách</a>
  </form>