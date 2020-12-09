<div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=609494949900356&autoLogAppEvents=1"></script>
<?php 
	if (isset($data["Product"]) && !empty($data["Product"])) {
		$product = json_decode($data["Product"],TRUE);
	}
	if (isset($data["Trademark"]) && !empty($data["Trademark"])) {
		$trademark = json_decode($data["Trademark"],TRUE);
	}
	if (isset($data["AllTrademarkProduct"]) && !empty($data["AllTrademarkProduct"])) {
		$trademarkPrds = json_decode($data["AllTrademarkProduct"],TRUE);
	}
	if (isset($data["Evaluate"]) && !empty($data["Evaluate"])) {
		$evaluates = json_decode($data["Evaluate"],TRUE);
	}
	if (isset($data["ContentEvaluate"]) && !empty($data["ContentEvaluate"])) {
		$contentEvaluates = json_decode($data["ContentEvaluate"],TRUE);
	}
 ?>
<div class="row submenu">
  <a href="home">Trang chủ </a><i class="fal fa-angle-right"></i><a href="<?= $data["CurrentPage"] ?>"><?= $data["SubLink"] ?></a><i class="fal fa-angle-right"></i><a href="<?= $data["CurrentPage"] ?>/Detail/"><?= $trademark["name"] ?></a>
</div>
<div class="row ">
  <div class="slide-detail">
    <div id="detail-img" class="owl-carousel owl-theme">
      <?php 
      if (!empty($product["image_library"])) {
        foreach ($product["image_library"] as $key => $item) { ?>
          <div class="item" data-hash="img<?= $key ?>">
            <img src="public/images/image_library<?= $item["path"]?>" alt="">
          </div>
      <?php }} ?>
    </div>
    <div class="link-img">
      <?php 
        if (!empty($product["image_library"])) {
        foreach ($product["image_library"] as $key => $item) { ?>
          <a href="Dien-thoai/Detail/<?= $product["infor"]["id"] ?>#img<?= $key ?>"><img src="public/images/image_library<?= $item["path"]?>" alt=""></a>
      <?php } } ?>
      
      <!-- <a href="Dien-thoai/Detail/1#three"><img src="public/images/200-note-20-ultra-5g-180x125.png" alt=""></a> -->
    </div>
  </div>
  <div class="center-detail">
    <h1><?= $product["infor"]["name"] ?>
      <div class="label-promo">
        <i class="icon icon-limit">Số lượng có hạn</i>
      </div>
    </h1>
    <div class="product__price">
      <?php 
        if ($product["infor"]["discount"] != 0) { ?>
          <?= number_format(round($product["infor"]["price"] - $product["infor"]["price"] * $product["infor"]["discount"] / 100, -4),0,",", ".")  ?>₫
          <span class="product__saleprice"><?= number_format($product["infor"]["price"],0,",",".") ?>₫</span>
      <?php }else { ?>
        <?= number_format($product["infor"]["price"],0,",", ".") ?>₫
      <?php }?>
    </div>
    <div class="product__size-color">
      <span class="btn btn--border btn--rounded">BROWN</span>
      <span class="btn btn--border btn--rounded">GREEN</span>
      <span class="btn btn--border btn--rounded">GRAY</span>
    </div>
    <div class="product__promotion">
      <div class="head__promotion">
        KHUYỄN MÃI ÁP DỤNG:
        <br>
        <i>Áp dụng hết 06/12/2020</i>
      </div>
      <div class="body__promotion">
        <span class="option-promotion"><i class="fas fa-check-circle"></i>Trả góp 0% qua HC/FE hoặc qua thẻ tín dụng qua Galaxy Gift lên đến 24 tháng</span>
        <span class="option-promotion"><i class="fas fa-check-circle"></i>Thu cũ đổi mới trợ giá 3.000.000đ</span>
        <span class="option-promotion"><i class="fas fa-check-circle"></i>Nâng cấp gói cước Viettel trợ giá đến 3.000.000đ (Áp dụng kèm trả góp)</span>
        <span class="option-promotion"><i class="fas fa-check-circle"></i>Giảm thêm 5% tối đa 500.000đ khi thanh toán qua VNPAY-QR</span>
        <span class="option-promotion"><i class="fas fa-check-circle"></i>Nâng cấp lên gói bảo hành toàn diện Samsung Care+ (bao gồm rơi vỡ, rớt nước) (chi tiết <a href="">TẠI ĐÂY</a>)</span>
      </div>
    </div>
    <div class="area-order">
      <a class="buy-now"href="Cart" data-id="<?= $product["infor"]["id"] ?>">MUA NGAY<br><span>Thoải mái lựa chọn xem hàng tại nhà</span></a>
      <a class="installment-cash" href="">MUA TRẢ GÓP 0%<br><span>Thủ tục đơn giản</span></a>
      <a class="installment-card" href="">TRẢ GÓP QUA THẺ<br><span>Visa, Master, JBC</span></a>
    </div>
    <div class="call-order">
      <i class="fad fa-phone-alt"></i><span>Gọi đặt mua: <a href="">1800.8123</a> (Miễn phí)</span>
    </div>
  </div>
  <div class="policy">
    <div class="accessories">
      <strong>Trong hộp có:</strong>
      <p>
        <i class="fal fa-box-full"></i>
        Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng
      </p>
    </div>
    <div class="commit">
      <strong>Viettel Store cam kết:</strong>
      <p>
        <i class="fas fa-award"></i>
        Bảo hành chính hãng 12 tháng.
        <a href="">Xem điểm bảo hành</a>
      </p>
      <p>
        <i class="far fa-undo-alt"></i>
        1 đổi 1 trong 1 tháng đối với sản phẩm lỗi. 
        <a href="">Tìm hiểu</a>
      </p>
      <p>
        <i class="fal fa-truck-container"></i>
        Giao hàng tận nơi miễn phí trong vòng 10km
        <a href="">Tìm hiểu</a>
      </p>
      <p>
        <i class="fas fa-check-circle"></i>
        Giá bán đã bao gồm thuế VAT.
      </p>
      <p>
        <i class="fas fa-check-circle"></i>Sản phẩm mới 100%
      </p>
    </div>
    <div class="search__shop">
      <i class="fal fa-map-marker-alt"></i>
      Tìm shop có hàng gần nhất
    </div>
  </div>
</div>
<div class="row box-content">
  <aside class="left-content">
    <h2>Đặc điểm nổi bật của <?= $product["infor"]["name"] ?></h2>
    <article class="area-article">
      <?= $product["infor"]["description"]?>
    </article>
    <p class="read-more js-read-more">Đọc thêm <i class="fas fa-caret-down"></i></p>
    <div class="same-kind" id="same-kind">
      <h4>Các sản phẩm cùng loại</h4>
      <div class="same-kind__list">
        <?php 
          $count = 0;
          foreach ($trademarkPrds as $item) { ?>
            <div class="same-kind__item">
              <a href="Dien_thoai/Detail/<?= $item["id"] ?>" class="product">
                <img class="product__img" src="public/images/avatar<?= $item["image"] ?>" alt="" >
                <div class="product__name"><?= $item["name"] ?></div>
                <div class="product__price">
                  <?php 
                    if ($item["discount"] != 0) { ?>
                      <?= number_format(round($item["price"] - $item["price"] * $item["discount"] / 100, -4),0,",", ".")  ?>₫
                      <span class="product__saleprice"><?= number_format($item["price"],0,",",".") ?>₫</span>
                  <?php }else { ?>
                    <?= number_format($item["price"],0,",", ".") ?>₫
                  <?php }?>
                </div>
                <div class="rating-result">
                  <i class="fas fa-star voted"></i>
                  <i class="fas fa-star voted"></i>
                  <i class="fas fa-star voted"></i>
                  <i class="fas fa-star "></i>
                  <i class="fas fa-star "></i>
                </div>
              </a>
            </div>
        <?php 
          $count ++ ;
          if ($count == 4) { break; }
          } 
        ?>
      </div>
    </div>
    <div class="evaluate">
      <div class="evaluate__content">
        <div class="rating-result">
          <b><?= isset($evaluates["avg"]) ? $evaluates["avg"] : 0 ?><i class="fas fa-star voted"></i></b>
        </div>
        <div class="evaluate__detail">
          <div class="evaluate__item">
            <span> 5 <i class="fas fa-star voted"></i></span>
            <div class="bgb">
              <div class="bgb-in" style="width: <?= isset($evaluates["percent"]["Star5"]) ? $evaluates["percent"]["Star5"] : 0 ?>%"></div>
            </div>
            <span><strong><?= isset($evaluates["count"]["Star5"]) ? $evaluates["count"]["Star5"] : 0 ?> </strong>đánh giá</span>
          </div>
          <div class="evaluate__item">
            <span> 4 <i class="fas fa-star voted"></i></span>
            <div class="bgb">
              <div class="bgb-in" style="width: <?= isset($evaluates["percent"]["Star4"]) ? $evaluates["percent"]["Star4"] : 0 ?>%"></div>
            </div>
            <span><strong><?= isset($evaluates["count"]["Star4"]) ? $evaluates["count"]["Star4"] : 0 ?> </strong>đánh giá</span>
          </div>
          <div class="evaluate__item">
            <span> 3 <i class="fas fa-star voted"></i></span>
            <div class="bgb">
              <div class="bgb-in" style="width: <?= isset($evaluates["percent"]["Star3"]) ? $evaluates["percent"]["Star3"] : 0 ?>%"></div>
            </div>
            <span><strong><?= isset($evaluates["count"]["Star3"]) ? $evaluates["count"]["Star3"] : 0 ?> </strong>đánh giá</span>
          </div>
          <div class="evaluate__item">
            <span> 2 <i class="fas fa-star voted"></i></span>
            <div class="bgb">
              <div class="bgb-in" style="width: <?= isset($evaluates["percent"]["Star2"]) ? $evaluates["percent"]["Star2"] : 0 ?>%"></div>
            </div>
            <span><strong><?= isset($evaluates["count"]["Star2"]) ? $evaluates["count"]["Star2"] : 0 ?> </strong>đánh giá</span>
          </div>
          <div class="evaluate__item">
            <span> 1 <i class="fas fa-star voted"></i></span>
            <div class="bgb">
              <div class="bgb-in" style="width: <?= isset($evaluates["percent"]["Star1"]) ? $evaluates["percent"]["Star1"] : 0 ?>%"></div>
            </div>
            <span><strong><?= isset($evaluates["count"]["Star1"]) ? $evaluates["count"]["Star1"] : 0 ?> </strong>đánh giá</span>
          </div>
        </div>
        <div class="send-myevaluate">
          <a href="javascript:void(0)" class="show-input">Gửi đánh giá của bạn</a>
        </div>
      </div>
      <form class="input" style="display: none" method="POST" id="js-my-evaluate">
        <div class="myevaluate">
          <span>Chọn đánh giá của bạn</span>
          <input type="hidden" name="product_id" value='<?= $product["infor"]["id"] ?>'>
          <input type="hidden" name="voted" id="hdfStar" value="0" data-value="0">
          <span class="rating-result" id="js-myevaluate">
            <i class="fas fa-star" id="s1"></i>
            <i class="fas fa-star" id="s2"></i>
            <i class="fas fa-star" id="s3"></i>
            <i class="fas fa-star" id="s4"></i>
            <i class="fas fa-star" id="s5"></i>
          </span>
          <span class="lsStar hide"> Không thích</span>
        </div>
        <div class="write-comment hide" >
          <div class="write">
            <textarea name="content_evaluated" id ="js-content-evaluated" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 80 ký tự)"></textarea>
            <div class="attach-photo">
              <div class="attach">
                <label onmousedown="ShowAttach('attach-evaluate')" onclick="AttachImgs(this, 'image-evaluate')"><i class="fas fa-camera-retro mr-2"></i> Đính kèm ảnh</label>
                <span class="ckeckWrite"></span>
              </div>
              <!-- <label for="fileRatingUpload"><i class="fas fa-camera-retro"></i>Đính kèm ảnh</label>
              <span class="ckeckWrite"></span>
              <input type="file" id="fileRatingUpload" style="display: none"> -->
            </div>
          </div>
          <div class="person-infor">
            <input type="text" name="name" id="name" placeholder="Họ và tên">
            <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" required placeholder="Số điện thoại">
            <input type="Email" name="email" id="email" placeholder="Email">
            <a class="" href="javascript:void(0)" onclick="InsertEvaluate()">Gửi đánh giá</a>
            <button type="reset" id="js-reset-evaluate" class="hide"></button>
          </div>
          <div class="list-attach" id="attach-evaluate" style="border-top: none; background-color: #fff; width: 100%">
            <ul class="attach-view" id="attach-view-image-evaluate">
              <li class="" id="insert-attach-image-evaluate">
              </li>
            </ul>
          </div>
          <div class="share" style="width: 100%">
            <label class="checkbox">Tôi sẽ giới thiệu sản phẩm này cho bạn bè người thân
              <input type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
          <div id="js-error-message" style="color: #d0021b;width: 100%"></div>
        </div>
      </form>
    </div>
    <div class="view-evaluate">
      <ul class="list-evaluate">
        <?php
          foreach ($contentEvaluates as $item) { ?>
            <li class="evaluate-ask">
              <div class="custumer">
                <strong><?= $item["fullname"] ?></strong>
                <label class="check-buy">
                  <i class="fas fa-badge-check"></i> 
                  Đã mua tại Viettel Store
                </label>
              </div>
              <div class="custumer-evaluate">
                <span class="rating-result">
                <?php 
                  for ($i = 0; $i < 5; $i++) { 
                    if ($i + 1 <= $item["voted"]) { ?>
                      <i class="fas fa-star voted"></i>
                    <?php }else{ ?>
                      <i class="fas fa-star "></i>
                    <?php }
                  }
                 ?>
                </span>
                <i><?= $item["content"] ?></i>
              </div>
              <div class="view-share">
                <?php 
                  if ($item["share"] =="1") { ?>
                    <i class="fas fa-heart"></i> Sẽ giới thiệu sản phẩm này cho bạn bè, người thân
                <?php } ?>
                
              </div>
              <div class="answer">
                <a class="respondent" onclick="ShowReply(id)" href="javascript:void(0)">Thảo luận</a>
                <?php 
                  $time = (time() - $item["created_time"]);
                  $date = $time/(24*60*60);
                  $hour = $time/(60*60);
                  $minute = $time/60;
                  if ( $date >=1){ ?>
                    <a class="time-respont" href="javascript:void(0)"> <?= round($date)?> ngày trước</a>
                  <?php }elseif($hour >= 1){ ?>
                    <a class="time-respont" href="javascript:void(0)"> <?= round($hour) ?> giờ trước</a>
                  <?php }else{ ?> 
                    <a class="time-respont" href="javascript:void(0)"> <?= round($minute) ?> phút trước</a> 
                  <?php }?>
              </div>
            </li>
          <?php }?>
      </ul>
      <?php if (!empty($contentEvaluates)): ?>
        <div style="padding: 0.5rem;">
          <a class="btn-bgc-none" href="Dien_thoai/<?= $product["infor"]["id"]?>/danh-gia"><i class="far fa-hand-point-right"></i> Xem tất cả đánh giá</a>
        </div>
      <?php endif ?>
      
    </div>
    <div class="comment" style="width: 100%; display:block">
      <div class="fb-comments" data-href="http://localhost/PRO1014/dien_thoai/Detail/<?= $product["infor"]["id"]?>" data-numposts="7" data-width="100%"></div> 
    </div>

  </aside>
  <aside class="right-content">
    <h2>Thông số kỹ thuật</h2>
    <div class="specification">
      <div class="specification__item">
        <span>Màn hình:</span>
        <span><?= $product["infor"]["screen"]?></span>  
      </div>
      <div class="specification__item">
        <span>Hệ điều hành:</span>
        <span><?= $product["infor"]["operating_system"] ?></span>  
      </div>
      <div class="specification__item">
        <span>Camera sau: </span>
        <span><?= $product["infor"]["rear_camera"] ?></span>  
      </div>
      <div class="specification__item">
        <span>Camera trước:</span>
        <span><?= $product["infor"]["front_camera"] ?></span>  
      </div>
      <div class="specification__item">
        <span>CPU:</span>
        <span><?= $product["infor"]["cpu"] ?></span>  
      </div>
      <div class="specification__item">
        <span>RAM:</span>
        <span><?= $product["infor"]["ram"] ?></span>  
      </div>
      <div class="specification__item">
        <span>Bộ nhớ trong:</span>
        <span><?= $product["infor"]["internal_memory"] ?></span>  
      </div>
      <?php 
        if ($product["infor"]["memory_stick"] != "") { ?>
          <div class="specification__item">
            <span>Thẻ nhớ:</span>
            <span><?= $product["infor"]["memory_stick"] ?></span>  
          </div>
      <?php } ?>
      <!-- <div class="specification__item">
        <span></span>
        <span><b>HOT</b><a href="" target="_blank"></a></span>  
      </div> -->
      <div class="specification__item">
        <span>Dung lượng pin:</span>
        <span><?= $product["infor"]["battery_capacity"] ?></span>  
      </div>
      <div class="view-detail-more">
        <a class="btn btn--border btn--rounded" href="">Hiển thị cấu hình chi tiết <i class="far fa-angle-down"></i></a>
      </div>
    </div>
    <?php 
      $positon = strpos($product["infor"]["name"], "(");
      if($positon == false){
       $name = $product["infor"]["name"];
      }else{
       $name = trim(substr($product["infor"]["name"], 0, $positon));
      } 
    ?>
    <div class="news__list">
      <h4>Tin tức về <?= $name ?></h4>
      <ul>
        <li>
          <a href="" class="news__item">
            <img src="public/images/meo-chup-anh-dep-bang-Galaxy-Note-20-10-350x250.jpg" alt="">
            <div class="news__title">
              <h3>Bỏ túi ngay 5 mẹo chụp ảnh đẹp bằng Galaxy Note 20</h3>
              <time>01/12/2020 | 09:00 AM</time>
            </div>
          </a>
        </li>
        <li>
          <a href="" class="news__item">
            <img src="public/images/tinh-nang-hay-tren-Galaxy-Note-20-Series-1-1-350x250.jpg" alt="">
            <div class="news__title">
              <h3>Gợi ý 5 tính năng hay trên Samsung Galaxy Note 20 series</h3>
              <time>18/11/2020 | 09:00 AM</time>
            </div>
          </a>
        </li>
        <li>
          <a href="" class="news__item">
            <img src="public/images/tinh-nang-hay-tren-s-pen-10-350x250.jpg" alt="">
            <div class="news__title">
               <h3>Tổng hợp những tính năng hay trên S Pen giúp bạn trải nghiệm Note 20 series tốt hơn</h3>
              <time>01/12/2020 | 09:00 AM</time>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </aside>
</div>