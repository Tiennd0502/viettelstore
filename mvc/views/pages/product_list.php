<?php 
  $categorys = json_decode($data["Categorys"],TRUE);
  $trademarks = json_decode($data["Trademarks"],TRUE);
  $products = json_decode($data["Products"],TRUE);
 ?>
<?php if (isset($data["Result"]) && isset($data["Action"])): ?>
  <?php if ($data["Result"] == "true"){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><?= $data["Action"] ?> hàng hóa thành công!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php }else { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><?= $data["Action"] ?> hàng hóa thành thất bại!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php } ?>
<?php endif; ?>


<div class="row mb-2">
  <div class="col-10 ">
    <form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control mr-sm-2" type="search" name="name" placeholder="Tìm kiếm theo tên" aria-label="Search" style="width: 30%">
      <select id="categoryId" name="category_id" class="form-control mr-2">
        <option value="0" selected>Xem tất cả các sản phẩm</option>
        <?php foreach ($categorys as $category) { ?>
           <option value="<?= $category["id"]?>"><?= $category["name"]?></option>
        <?php } ?>
      </select>
      <select id="trademarkId" name="trademark_id" class="form-control mr-2">
        <option value="0" selected>Xem tất cả các thương hiệu</option>
        <?php foreach ($trademarks as $trademark) { ?>
           <option value="<?= $trademark["id"]?>"><?= $trademark["name"]?></option>
        <?php } ?>
      </select>
      <button class="btn btn-dark my-2 my-sm-0" type="submit" name="search"><i class="far fa-search"></i></button>
    </form>
  </div>
  <div class="col-md-2 text-right">
    <a href="Product/AddProduct" class="btn btn-success" >Thêm sản phẩm</a>
  </div>
</div>
<!-- Danh sách danh mục -->
<form action="" method="POST">
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th><input type="checkbox" name="selectAll"></th>
          <th>Hình ảnh</th>
          <th>Tên</th>
          <th>Giá</th>
          <th>Lượt xem</th>
          <th>Xem chi tiết</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach ($products as $product) { ?>
            
          <tr>
            <td><input type="checkbox" name="select[]"></td>
            <td><img src="./public/images/avatar<?= $product["image"]?>" alt="IMG"></td>
            <td style="max-width: 400px;"><?= $product["name"]?></td>
            <td><?= number_format($product["price"])?></td>
            <td><?= $product["number_view"]?></td>
            <td><a class="btn btn-outline-success" href="Product/Detail/<?= $product["id"]?>">Xem chi tiết</a></td>
            <td>
            	<a class="btn btn-outline-success" href="Product/CopyProduct/<?= $product["id"]?>">Copy</a>
              <a class="btn btn-outline-primary" href="Product/EditProduct/<?= $product["id"]?>">Sửa</a>
              <a class="btn btn-outline-danger" href="Product/DeleteProduct/<?= $product["id"]?>" onclick=" return confirm('Bạn có chắc muốn xóa hàng hóa này?');">Xóa</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-12 text-right mt-2">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="first">First</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="1">1</a></li>
          <li class="page-item active" aria-current="page"><a class="page-link " href="javascript:void(0)" data-page="2">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="3">3</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="">&raquo;</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="last">Last</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
  <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
  <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
  <a href="Product/AddProduct" class="btn btn-success" >Thêm sản phẩm</a>
</form>