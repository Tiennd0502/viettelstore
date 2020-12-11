<?php 
if (isset($data["Mobile"])) {
 	$mobiles = json_decode($data["Mobile"],TRUE);
 } ?>
<div class="row two-banner">
	<div class="">
	<a href=""><img class="lazyload" loading="lazy" data-src="./public/images/tra-gop-dm.jpg" alt=""></a>
	</div>
	<div class="">
		<a href=""><img class="lazyload" loading="lazy" data-src="./public/images/V120-chuyen-trang.jpg" alt=""></a>
	</div>
</div>

<div class="filter">
	<div class="filter__trademark">
	<?php 
		if (isset($data["Trademarks"]) && !empty($data["Trademarks"])) {
      $trademarks = json_decode($data["Trademarks"],TRUE);
    
		foreach ($trademarks as $trademark) {?>
	    <a class="filter__link js-trademark" href="javascript:void(0)" data-name="<?= $trademark["name"]?>"><img class="filter__img" src="public/images/trademark/<?= $trademark["path"]?>" alt=""></a>
		<?php }
	} ?>
		<!-- <a class="filter__link check" href=""><img class="filter__img" src="public/images/trademark/28-11-2020/Samsung42-b_25.jpg" alt=""></a> -->
	</div>
	<div class="filter__other">
		<div class="filter__price">
				<label for="">Chọn mức giá:</label>
				<a href="">Dưới 1 triệu</a>
				<a href="">Từ 1 - 3 triệu</a>
				<a href="">Từ 3 - 7 triệu</a>
				<a href="">Từ 7 - 10 triệu</a>
				<a href="">Từ 10 - 15 triệu</a>
				<a href="">Trên 15 triệu</a>
		</div>
		<div class="filter__feature">
				<label class="criteria js-open-filter" id="js-filter-feature"> Tính năng<i class="fa fa-caret-down"></i>
				</label>
				<div class="content__feature js-content-filter">
						<label class="closefeature js-close-filter" id="js-close-filter"><i class="fal fa-times-circle"></i></label>
						<div class="feature__list">
								<div class="feature__item">
										<label>Màn hình</label>
										<label class="checkbox">Dưới 3 Inch
												<input type="checkbox">
												<span class="checkmark"></span>
										</label>
										
										<label class="checkbox">Khoảng 3 Inch
												<input type="checkbox">
												<span class="checkmark"></span>
										</label>
										
										<label class="checkbox">Khoảng 4 Inch
												<input type="checkbox">
												<span class="checkmark"></span>
										</label>
										
										<label class="checkbox">Khoảng 5 Inch
												<input type="checkbox">
												<span class="checkmark"></span>
										</label>
										
										<label class="checkbox">Khoảng 6 Inch
												<input type="checkbox">
												<span class="checkmark"></span>
										</label>
								</div>
								<div class="feature__item">
										<label>Camera sau</label>
										
												<label class="checkbox">Dưới 3mpx
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Từ 3 - 5mpx
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Từ 5 - 8mpx
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Từ 8 - 13mpx
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Trên 13mpx
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
								</div>
								<div class="feature__item">
										<label>Hệ điều hành</label>
										
												<label class="checkbox">IOS
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Adroid
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Windows Phone
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
								</div>
								<div class="feature__item">
										<label>Tính năng đặc biệt</label>
										
												<label class="checkbox">2 sim
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Chống nước
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
										
												<label class="checkbox">Nhận dạng vân tay
												<input type="checkbox">
												<span class="checkmark"></span>
												</label>
								</div>
						</div>
						<div class="result">
								<button type="button" class="btn view-result">Xem 6 kết quả</button>
								<button type="reset" class="btn clear-prop">Bỏ tất cả lựa chọn</button>
						</div>
				</div>
		</div>
		<div class="filter__sort">
				<span class="criteria js-open-filter" id="js-sort"> Sản phẩm nổi bật<i class="fa fa-caret-down"></i></span>
				<div class="content__sort js-content-filter">
						<label class="closesort js-close-filter "><i class="fal fa-times-circle"></i></label>
						<a href="javascript:void(0)" class="check"><i class="fal fa-check"></i> Sản phẩm nổi bật</a>
						<a href="javascript:void(0)"><i class="fal fa-check"></i> Mới nhất</a>
						<a href="javascript:void(0)"><i class="fal fa-check"></i> Xem nhiều nhất</a>
						<a href="javascript:void(0)"><i class="fal fa-check"></i> Giá cao đến thấp</a>
						<a href="javascript:void(0)"><i class="fal fa-check"></i> Giá thấp đến cao</a>
				</div>
		</div>
	</div>
</div>
<div class="row mobile_hot" >
	<div class="title">TOP ĐIỆN THOẠI NỖI BẬT</div>
	<div id="slide-mobile" class="top-product owl-carousel owl-theme ">

		<?php foreach ($mobiles as $mobile): ?>

			<div class="item">
				<a class="product" href="Dien-thoai/Detail/<?= $mobile['id']?>">
					<img class="product__img" src="./public/images/avatar<?= $mobile["image"]?>" alt="">
					<div class="label-promo">
						<i class="icon icon-limit">-<?= $mobile["discount"]?>%</i></br>
						<i class="icon icon-installment"> Trả góp 0%</i>
					</div>
					<div class="product__name"><?= $mobile["name"]?></div>
					<div class="product__price">
						<?php if ($mobile["discount"] != 0) { ?>
		          <?= number_format(round($mobile["price"] - $mobile["price"] * $mobile["discount"] / 100, -4),0,",", ".")  ?>₫
		          <span class="product__saleprice"><?= number_format($mobile["price"],0,",",".") ?>₫</span>
		        <?php }else { ?>
		          <?= number_format($mobile["price"],0,",", ".") ?>₫
		        <?php }?>
					</div>
					<p class=product__promo-message>
					Miễn phí trả góp khi thanh toán online qua thẻ tín dụng của 23 Ngân hàng trong danh sách. và 5 khuyễn mãi khác
					</p>
				</a>
			</div>
		<?php endforeach ?>
		
	</div>
</div>
<div class="row product__list product__list-mobile" id="list-mobile">
	<?php $index = 0; ?>
	<?php foreach ($mobiles as $mobile): $index ++ ;?>
		
	<a class="product__item" href="Dien-thoai/Detail/<?= $mobile['id']?>">
		<div class="product__img">
			<img data-src="./public/images/avatar<?= $mobile['image']?>" class="lazyload" loading="lazy" width="150" height="150" alt="">
		</div> 
		<div class="label-promo">
			<i class="icon icon-limit">Bán chạy</i>
		</div>
		<div class="product__name"><?= $mobile["name"]?></div>
		<div class="product__price">
			<span class="text13">Giá online:</span> 13.990.000 ₫
		</div>
		<div class="sale">
				Giá bán lẻ:
			<span> 12.990.000 ₫</span>
		</div>
		<div class="content__promo">
			<ul>
				<li>Trả góp 0% trên giá bán lẻ </li>
				<li>Trả góp không mất lãi, không phí, kỳ hạn 06 ...</li>
			</ul>
		</div>
	</a>

	<?php 
		if ($index == 15) break; endforeach ?>
	
</div>
<div class="row">
	<a href="javascript:void(0)" class="show-more js-show-more" data-page="1" data-category="<?= $data["CategoryId"]?>">Xem thêm sản phẩm <i class="fa fa-caret-down"></i></a>
</div>