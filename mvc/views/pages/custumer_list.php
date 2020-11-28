<?php 
  $custumers = json_decode($data["Custumers"], TRUE);
 ?>
 <?php 
  if (isset($data["Result"])) {
    $result = json_decode($data["Result"], TRUE);
    if ($result == "true") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Xóa khách hàng thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }else { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Xóa khách hàng thất bại!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }
  } ?>
<!-- Danh sách khách hàng -->
<form action="" method="POST">
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th><input type="checkbox" name="selectAll"></th>
          <th>Tên</th>
          <th>Số điện thoại</th>
          <th>Email</th>
          <th>Ngày tạo</th>
          <th>Số lần đánh giá</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($custumers as $custumer) { ?>
            
          <tr>
            <td><input type="checkbox" name="select[]"></td>
            <td><?= $custumer["fullname"]?></td>
            <td><?= $custumer["phone"]?></td>
            <td><?= $custumer["email"]?></td>
            <td><?= date("d-m-Y",$custumer["created_time"]) ?></td>
            <td></td>
            <td>
              <a class="btn btn-outline-danger" href="Custumer/DeleteCustumer/<?= $custumer["id"]?>" onclick=" return confirm('Bạn có chắc muốn xóa khách hàng này?');">Xóa</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
  <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
  <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
</form>