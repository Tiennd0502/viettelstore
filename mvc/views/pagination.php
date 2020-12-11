<?php 
	if (isset($data["Data"]) && !empty($data["Data"]) ) {
		$products = json_decode($data["Data"],TRUE);
		foreach ($products as $product):?>
		
		<a class="product__item" href="Dien-thoai/Detail/<?= $product['id']?>">
			<div class="product__img">
				<img src="public/images/avatar<?= $product['image']?>" class="lazyload" loading="lazy" width="150" height="150" alt="">
			</div> 
			<div class="label-promo">
				<i class="icon icon-limit">Bán chạy</i>
			</div>
			<div class="product__name"><?= $product["name"]?></div>
			<div class="product__price">
				<span class="text13">Giá online:</span> 
				<?php if ($product["discount"] != 0){ 
					echo number_format(round($product["price"] - $product["price"] * $product["discount"] / 100, -4),0,",", ".");
				}else { 
					echo number_format($product["price"],0,",",".");
				} ?> ₫
			</div>

			<?php if ($product["discount"] != 0): ?>
				<div class="sale">
					Giá bán lẻ:
				<span> <?= number_format(round($product["price"] - $product["price"] * $product["discount"] / 100, -4),0,",", ".")  ?> ₫</span>
			</div>
			<?php endif ?>
			
			<div class="content__promo">
				<ul>
					<li>Trả góp 0% trên giá bán lẻ </li>
					<li>Trả góp không mất lãi, không phí, kỳ hạn 06 ...</li>
				</ul>
			</div>
		</a>
	<?php 
	 endforeach ;
	}else {
		echo "empty";
	}
	
 ?>