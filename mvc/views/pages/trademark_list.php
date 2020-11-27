<?php 
  if(isset($data["Result"])){ 
    if($data["Result"]){?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>
          <?= isset($data["Delete"])? " Xóa" :"Sửa" ?>
           thương hiệu thành công!
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }else { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> <?= isset($data["Delete"])? " Xóa" :"Sửa" ?> thương hiệu thất bại!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php } ?>
  <?php } ?>

<div class="row mb-2">
  <div class="col-10">
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm thương hiệu" aria-label="Search" style="width: 25%">
      <select class="form-control" id="category" name="category_id">
      <?php 
        $data["Categorys"] = json_decode($data["Categorys"],TRUE); ?>
        <option value="" selected="">Xem tất cả thương hiệu</option>
        <?php foreach ($data["Categorys"] as $category) { ?>
          <option value="<?= $category["id"]?>"><?= $category["name"]?></option>
        <?php } ?>
      </select>
      <button class="btn btn-dark ml-2 my-sm-0" type="submit"><i class="far fa-search"></i></button>
    </form>
  </div>
  <div class="col-md-2 text-right">
    <a href="Trademark/AddTrademark" class="btn btn-success">Thêm thương hiệu</a>
  </div>
</div>
<!-- Danh sách danh mục -->
<form action="" method="POST">
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th><input type="checkbox" name="checkAll"></th>
          <th>Id</th>
          <th>Tên </th>
          <th class="text-center">Hình ảnh</th>
          <th>Ngày tạo</th>
          <th>Ngày cập nhật</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $trademarks = json_decode($data["Trademarks"] ,TRUE);
          foreach ($trademarks as $value) { ?>
            <tr>
              <td><input type="checkbox" name="check[<?= $value["id"]?>]"></td>
              <td><?= $value["id"]?></td>
              <td><?= $value["name"]?></td>
              <td class="text-center"><img src="public/images/trademark/<?= $value["path"]?>" alt="" ></td>
              <td><?= $value["created_time"]?></td>
              <td><?= $value["updated_time"]?></td>
              <td>
                <a class="btn btn-outline-primary" href="Trademark/EditTrademark/<?= $value["id"]?>">Sửa</a>
                <a class="btn btn-outline-danger" href="Trademark/DeleteTrademark/<?= $value["id"]?>" onclick=" return confirm('Bạn có chắc muốn xóa k');">Xóa</a>
              </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
  <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
  <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
    <a href="Trademark/AddTrademark" class="btn btn-success" >Thêm thương hiệu</a>
</form>
<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 -->
