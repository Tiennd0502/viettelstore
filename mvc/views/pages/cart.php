<?php 
	// echo "<pre>";
	// print_r($_SESSION["cart"]);	exit;
	// echo "</pre>";
 ?>
 
<section id ="container__cart">
	<div class="bar__top">
		<a href="home"><i class="fal fa-chevron-left"></i>Mua thêm sản phẩm khác</a>
		<p>Giỏ hàng của bạn</p>
	</div>
	<div class="container__cart">
		<form method="POST" id="form-order" autocomplete="off">
			<div class="list__order">
				<?php 
					$total = 0;
					$discount = 0; 
					foreach ($_SESSION["cart"] as $key => $item) { ?>
						<div class="order__item">
							<div class="">
								<a href="<?= $item["slug"]?>/Detail/<?= $key?>"><img src="public/images/avatar/<?= $item["image"]?>" alt="">
								</a>
								<a href="Cart" class="btn btn--border btn--rounded delete js-delete" data-id="<?= $key?>">XÓA</a>
							</div>
							<div class="prd-infor">
								<div>
									<a href="<?= $item["slug"]?>/Detail/<?= $key?>"><?= $item["name"]?></a>
									<strong><?= number_format($item["price"],0,",", ".") ?>₫</strong>
								</div>
								<div class="" style="display: flex;justify-content: space-between;align-items: center">
									<div class="choose__color">
										<span class="js-cart-color">Màu: Đen <i class="fas fa-caret-down"></i></span>
										<div class="content__choose">
											<div class="choose__item js-color-item">
												<img src="public/images/avatar/<?= $item["image"]?>" alt="">
												<span>Đen</span>
											</div>
											<div class="choose__item js-color-item">
												<img src="public/images/avatar/<?= $item["image"]?>" alt="">
												<span>Trắng</span>
											</div>
											<div class="choose__item js-color-item">
												<img src="public/images/avatar/<?= $item["image"]?>" alt="">
												<span>Xanh Dương</span>
											</div>
										</div>
									</div>
									<div class="choose__number">
			              <input type="hidden" class="" name="quantity[<?= $key?>]" id="quantity<?= $key ?>" value="1">
			              <div class="abate js-change-quantity" change="abate"></div>
			              <div class="number" data-id="<?= $key ?>"><?= $item["quantity"]?></div>
			              <div class="augment js-change-quantity" change="augment" ></div>
			          	</div>
								</div>
								<div class="promotion">
									<?php 
										if ($item["discount"] != 0) { ?>
											<span>Giảm giá <?= number_format(round($item["price"] * $item["discount"] / 100, -4),0,",", ".") ?>đ</span>
									<?php } ?>
									<span>Phụ kiện mua kèm giảm 20% (không áp dụng phụ kiện hãng, không áp dụng đồng thời KM khác)</span>
									<span>Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)<a href="">(click xem chi tiết)</a></span>
								</div>

								<!-- <?php 
									if ($item["discount"] != 0) { ?>
										<div><span>Giảm 
											<strong ><?= number_format(round($item["price"] * $item["discount"] / 100, -4),0,",", ".") ?>₫</strong>
											 còn 
											 <strong><?= number_format(round($item["price"] - $item["price"] * $item["discount"] / 100, -4),0,",", ".")  ?>₫</strong>
											</span>
										</div>
								<?php } ?> -->
			          <div style="display: none">
			            <div class="addmore">
			              <p>Chọn màu sản phẩm (không mua không sao)</p>
			              <div class="theme">
			                <div class="option">
			                  <div><img src="./images/oppo-reno3-den-200x200-1-180x125.png"></div>
			                  <div class="barpage-item">
			                    <label class="barpage-title">Đen
			                      <input type="checkbox" class="js-chosse-color">
			                      <span class="checkmark"></span>
			                    </label>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
							</div>
						</div>

					<?php 
						$total +=  $item["price"] * $item["quantity"] ;
						$discount += round($item["price"] * $item["discount"] / 100, -4) * $item["quantity"] ; } ?>
				
			</div>
			
			<div class="area__total">
				<div >
					<span>Tổng tiền: </span>
					<span class="total"><?= number_format($total,0,",", ".") ?>₫</span>
				</div>
				<?php 
					if ($discount != 0) { ?>
						<div>
							<span>Giảm: </span>
							<span class="all-discount">-<?= number_format($discount,0,",", ".") ?>₫</span>
						</div>
				<?php } ?>
				<div>
					<span><b style="font-weight: 600">Cần thanh toán: </b></span>
					<strong><?= number_format($total - $discount,0,",", ".") ?>₫</strong>
				</div>
				<!-- <div class="coupon-code">
					<div class="text-code js-text-code" id="js-text-code">Sử dụng mã giảm giá
					</div>
					<div class="input-code js-input-code" style="display: none">
						<input type="text" name="" placeholder="Nhập mã giảm giá">
						<span class="btn">Áp dụng</span>
					</div>
				</div> -->
			</div>
			<div class="infor__user">
				<div class="checkradio">
					<div class="barpage-item">
	          <label class="barpage-title">Anh
	            <input type="radio" name="gender" checked="">
	            <span class="checkmark"></span>
	          </label>
	        </div>
	        <div class="barpage-item">
	          <label class="barpage-title">Chị
	            <input type="radio" name="gender">
	            <span class="checkmark"></span>
	          </label>
	        </div>
				</div>
				<div class="area__infor">
					<input type="text" name="name" placeholder="Họ và tên" >
					<input type="text" name="phone" placeholder="Số điện thoại">
				</div>
				<div class="other__note">
					<input type="text" name="otherNote" placeholder="Yêu cầu khác (không bắt buộc)">
				</div>
				<div class="area__orther">
					<div><b>Để được phục vụ nhanh hơn,</b> hãy chọn thêm:</div>
					<div>
						<label class="checkbox" style="display: inline-block;margin-right: 2rem">Địa chỉ giao hàng
							<input type="radio" checked="" name="address" data-name="delivery-address" class="js-change-address">
							<span class="checkmark"></span>
						</label>
						<label class="checkbox" style="display: inline-block">Nhận tại siêu thị
							<input type="radio" name="address" data-name="received-market" class="js-change-address">
							<span class="checkmark"></span>
						</label>
						<div class="area-address js-delivery-address">
							<div class="address-list">
								<div class="address-item">
									<span>Hà Nội</span><i class="fas fa-caret-down"></i>
								</div>
								<div class="address-item">
									<span>Chọn quận, huyện</span><i class="fas fa-caret-down"></i>
								</div>
								<div class="address-item">
									<span>Chọn phường, xã</span><i class="fas fa-caret-down"></i>
								</div>
								<div class="address-item">
									<input type="text" name="address" placeholder="Số nhà, tên, đường">
								</div>
							</div>
						</div>
						
						<div class="area-address area-market js-received-market" style="display: none">
							<div class="address-list">
								<div class="address-item">
									<span>Hà Nội</span><i class="fas fa-caret-down"></i>
								</div>
								<div class="address-item">
									<span>Chọn quận, huyện</span><i class="fas fa-caret-down"></i>
								</div>
							</div>
							<div class="bring-more" style="display: block;margin-top: 0;">
		            <input type="text" name="" placeholder="Nhập tên đường để tìm nhanh siêu thị">
		          </div>
		          <div style="display: flex;flex-direction: column">
		          	<label class="checkbox">Đạc 7, xã Thọ Xuân, H. Đan Phượng, TP. Hà Nội
									<input type="checkbox" >
									<span class="checkmark"></span>
								</label>
								<label class="checkbox">Số 193 - 195 đường Cầu Diễn, Phường Phúc Diễn, Quận Bắc Từ Liêm, Thành phố Hà Nội
									<input type="checkbox" >
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
	          <label class="checkbox">Xuất hóa đơn công ty
							<input type="checkbox" class="js-show-vipservices">
							<span class="checkmark"></span>
						</label>
						<div class="bring-more" >
	            <input type="text" name="" placeholder="Tên công ty">
	            <input type="text" name="" placeholder="Địa chỉ">
	            <input type="text" name="" placeholder="Mã số thuế">
	          </div>
	          <label class="checkbox">Hình thức thanh toán
							<input type="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<!-- <div class="barpage-item">
            <label class="barpage-title">Gọi người khác nhận hàng nếu có
              <input type="checkbox" class="js-show-vipservices">
              <span class="checkmark"></span>
            </label>
          </div>
          <div style="display: none; margin-bottom: 10px;" >
        		<div class="addmore">
        			<div class="checkradio">
	  						<div class="barpage-item">
		              <label class="barpage-title">Anh
		                <input type="radio" name="ortherGender" checked="">
		                <span class="checkmark"></span>
		              </label>
		            </div>
		            <div class="barpage-item">
		              <label class="barpage-title">Chị
		                <input type="radio" name="ortherGender">
		                <span class="checkmark"></span>
		              </label>
		            </div>
	  					</div>
	  					<div class="area-infor">
	  						<input type="text" name="name" placeholder="Họ và tên">
	  						<input type="text" name="name" placeholder="Số điện thoại">
	  					</div>
        		</div>
        	</div> -->
					</div>
					<div class="choose-pay area-order">
						<a class="buy-now" id="pay-offline" href="javascript:void(0);">THANH TOÁN KHI NHẬN HÀNG<br><span>Xem hàng trước, không mua không sao</span></a>
						<a class="buy-bank"href="javasctipt:void(0)" >THANH TOÁN ONLINE<br><span>Qua thẻ ATM, Visa, Master Card,</span></a>
					</div>
					<p class="provision" style="font-size: 1.6rem">Tư vấn bán hàng <strong style="font-weight: 600; color:#ff4200">1800.8123</strong></p>
				</div>
			</div>
		</form>
	</div>
</section>
<p class="provision">Bằng cách đặt hàng, bạn đồng ý với <a href="/tos" target="_blank">Điều khoản sử dụng</a> của Viettel Store</p>