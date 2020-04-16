<?php $products = Data::getHits();
// var_dump($products);
?>
<?php if (count($products)): ?>
	<section class="product-list">
		<div>
			<p class="product-list__header">ЭКСКЛЮЗИВНЫЙ ПАРТНЁР АЛЮТЕХ<br>ПО COMUNELLO В ВОРОНЕЖЕ И ОБЛАСТИ</p>
			<div class="slider">
			<?php foreach ($products as $product): ?>
				<div class="product-item">
					<div class="product-item__header-block">
						<a class="product-item__header" href="<?= $product['product_url'] ?>"><?= $product['product_title'] ?></a>
					</div>
					<img class="product-item__img" src="<?= $product['product_image'] ?>" alt="<?= $product['product_title'] ?>" />
					<div class="product-item__description hide"><?= $product['product_description'] ?></div>
					<?php if ($product['product_price'] > 0): ?>
						<p class="product-item__price">Розничная цена: <span><?= $product['product_price'] ?></span></p>
					<?php endif;; ?>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
