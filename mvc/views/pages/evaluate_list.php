<?php 
  $evaluates = json_decode($data["Evaluates"], TRUE);
 ?>
<?php 
  if (isset($data["Result"])) {
    $result = json_decode($data["Result"], TRUE);
    if ($result == "true") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Xóa đánh giá thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }else { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Xóa đánh giá thất bại!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }
  } ?>
  
<div class="row mb-2">
  <div class="col-10 ">
    <form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control mr-sm-2" type="search" name="name" placeholder="Tìm theo tên sản phẩm" aria-label="Search" style="width: 30%">
      <select id="number_star" name="number_star" class="form-control mr-2">
        <option value="0" selected>Xem tất cả sao</option>
        <option value="1">1 <i class="fas fa-star voted"></i></option>
        <option value="2">2 <i class="fas fa-star voted"></i></option>
        <option value="3">3 <i class="fas fa-star voted"></i></option>
        <option value="4">4 <i class="fas fa-star voted"></i></option>
        <option value="5">5 <i class="fas fa-star voted"></i></option>
      </select>
      <select id="number_voted" name="number_voted" class="form-control mr-2">
        <option value="0" selected>Xem tất cả lượt đánh giá</option>
        <option value="1">Dưới 50 lượt</option>
        <option value="1">Từ 51 - 100 lượt</option>
        <option value="1">Từ 101 - 150 lượt</option>
        <option value="1">Trên 151 lượt</option>
      </select>
      <button class="btn btn-dark my-2 my-sm-0" type="submit" name="search"><i class="far fa-search"></i></button>
    </form>
  </div>
</div>
<!-- Danh sách đánh giá -->
<form action="" method="POST">
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th><input type="checkbox" name="selectAll"></th>
          <th>Mã SP</th>
          <th>Tên Sản phẩm</th>
          <th class="text-center">Số sao</th>
          <th class="text-center">Số lượt </th>
          <!-- <th>Đánh giá cũ nhất</th>
          <th>Đánh giá mới nhất</th> -->
          <th>Xem chi tiết</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($evaluates as $evaluate) { ?>
          <tr>
            <td><input type="checkbox" name="select[]"></td>
            <td><?= $evaluate["id"]?></td>
            <td><?= $evaluate["name"]?></td>
            <td class="text-center"><?= $evaluate["avg"]?><i class=" ml-1 text-warning fas fa-star voted"></i></td>
            <td class="text-center"><?= $evaluate["count"]?></td>
            <!-- <td class="text-center"><?//= date("d-m-Y",$evaluate["old_rating"]) ?></td>
            <td class="text-center"><?//= date("d-m-Y",$evaluate["new_rating"]) ?></td> -->
            <td><a class="btn btn-outline-success" href="Evaluate/ViewDetail/<?= $evaluate["id"]?>"> Xem chi tiết</a></td>
            <td>
              <a class="btn btn-outline-danger" href="Evaluate/DelEvaluatePrd/<?= $evaluate["id"]?>" onclick=" return confirm('Bạn có chắc muốn xóa hết đánh giá về sản phẩm này?');">Xóa</a>
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