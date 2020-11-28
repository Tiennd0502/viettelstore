<?php 
  $orders = json_decode($data["Orders"], TRUE);
 ?>
  <?php 
  if (isset($data["Result"])) {
    $result = json_decode($data["Result"], TRUE);
    if ($result == "true") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Xóa đơn hàng thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }else { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Xóa đơn hàng thất bại!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }
  } ?>
<form action="" method="POST">
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th><input type="checkbox" name="selectAll"></th>
          <th>Tên KH</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Ngày đặt hàng</th>
          <th>Trạng thái</th>
          <th>Xem chi tiết</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($orders as $order) { ?>
            
          <tr>
            <td><input type="checkbox" name="select[]"></td>
            <td><?= $order["name"]?></td>
            <td class="text-center"><?= $order["phone"]?></td>
            <td><?= $order["address"]?></td>
            <td class="text-center"><?= date("d-m-Y",$order["created_time"]) ?></td>
            <td>
               <select id="js-update-active" data-id="<?= $order["id"] ?>" name="" class="form-control mr-2">
                <option value="0" <?= ($order["active"] == 0) ? " selected " : "" ?> >Chưa giao hàng</option>
                <option value="1" <?= ($order["active"] == 1) ? " selected " : "" ?> >Đang giao hàng</option>
                <option value="2" <?= ($order["active"] == 2) ? " selected " : "" ?> >Đã giao hàng </option>
              </select> 
            </td>
            <td><a class="btn btn-outline-success" href="Order/Detail/<?= $order["id"]?>">Xem chi tiết</a></td>
            <td>
              <a class="btn btn-outline-danger" data-id="<?= $order["id"]?>" href="Order/DeleteOrder/<?= $order["id"]?>" onclick=" return confirm('Bạn có chắc muốn xóa hóa đơn này?');">Xóa</a>
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