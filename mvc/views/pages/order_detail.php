<?php if (isset($data["Order"])){
  $order = json_decode($data["Order"], TRUE);
  // echo "<pre>";
  // print_r($order);
  // echo "</pre>";exit;
} ?>
<div class="row justify-content-end">
  <div class=" col-md-2 text-right">
    <a href="" class="btn btn-dark" target="_link">In hóa đơn</a>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <p><b>Người nhận</b></p>
    <p><b>Số điện thoại</b></p>
    <p><b>Địa chỉ</b></p>
    <p><b>Lời nhắn</b></p>
  </div>
  <div class="col-md-9">
    <p><?= $order['0']['name'] ?></p>
    <p><?= $order['0']['phone'] ?></p>
    <p><?= $order['0']['address'] ?></p>
    <p><?= $order['0']['note'] ?></p>
  </div>
</div>
<div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr>
          <th>STT</th>
          <th>Hình ảnh </th>
          <th>Tên HH</th>
          <th>Đơn giá</th>
          <th>Giảm giá (%)</th>
          <th>Số lượng</th>
          <th class="text-center" style="color: #dc3545; text-shadow: 0 0 2px #000" >Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $index = 1;
          $total = 0;
          $discount = 0; 
          foreach ($order as $item) {

            $tempTotal    =   $item["price"] * $item["quantity"];
            $tempDiscount =   round($item["price"] * $item["quantity"] * $item["discount"] / 100, -4);
            $total        += $tempTotal;
            $discount     += $tempDiscount;
          ?>   
          <tr>
            <td><?=$index++; ?></td>
            <td><img src="public/images/avatar/<?= $item["product_image"]?>" /></td>
            <td class="text-center"><?= $item["product_name"] ?></td>
            <td class="text-center"><?= number_format($item["price"],0,",",".") ?></td>
            <td class="text-center"><?= $item["discount"] ?></td>
            <td class="text-center"><?= $item["quantity"] ?></td>
            <td class="text-right pr-5"><?= number_format($tempTotal - $tempDiscount,0,",",".") ?> </td>
          </tr>
        <?php } ?>
      </tbody>
      <tr>
        <td colspan ="6" style="color: #dc3545; font-weight: 600" >Tổng</td>
        <td class="text-right pr-5" style="color: #dc3545;font-weight: 600"><?= number_format($total -$discount,0,",","."); ?></td>
      </tr>
      <tr>
        <td colspan ="6" style="color: #dc3545;font-weight: 600" >Giảm giá</td>
        <td class="text-right pr-5" style="color: #dc3545;font-weight: 600"><?= number_format(0,0,",","."); ?></td>
      </tr>
      <tr>
        <td colspan ="6" style="color: #dc3545;font-weight: 600" >Cần thanh toán</td>
        <td class="text-right pr-5" style="color: #dc3545;font-weight: 600"><?= number_format($total -$discount,0,",","."); ?></td>
      </tr>
    </table>

  </div>