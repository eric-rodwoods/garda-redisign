<?php
/**
 * Шаблон для страниц товаров
 * /product/{product name}/
 */
?>

<?php $calc = Calc::getInstance(); ?>
			<div class="category-page__block">
				<p class="breadcrumbs"><?= Data::getBreadcrumbsProduct() ?></p>
				<div class="content-1 container-fluid">
					<div class="row justify-content-center pt-sm-3 pt-0">
					<?php $product = Product::getProduct(); ?>
					<?= $product['noindex'] ? '<noindex>' : '' ?>
						<div class="col-xl-3 col-lg-4 col-md-6 col-6 mb-3 mb-sm-5 mr-0 mr-lg-4">
						<?php if( get_field('gallery_new') ): ?>
							<div class="swiper-container product-slider cat__slider__height">
							    <div class="swiper-wrapper">
							<?php $images = acf_photo_gallery('gallery_new', $post->ID);
							    if( count($images) ):
							    foreach($images as $image):?>
							    	<div class="swiper-slide">
							        	<div class="cat__slider__img">
							        		<img src="<?php echo $image['full_image_url']; ?>">
							        	</div>
							        </div>
							<?php endforeach; endif; ?>
							    </div>
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>
							</div>
						<?php else: ?>
							<img class="image-fitting" style="max-height: 400px;" src="<?= Image::getImagesSrc(array($product['image']), '694x521'); ?>" />
						<?php endif; ?>
						</div>
						<div class="col-xl-8 col-lg-7 col-md-12 col-sm-6 col-12 mb-5">
						<?php if ($product['seo_header'] || $product['title'] && $product['description']): ?>
							<div class="category-page__content__item">
								<div class="product-margin">
									<h1 class="objects-page__heading"><?= $product['seo_header'] ? $product['seo_header'] : $product['title'] ?></h1>
									<div class="category-page__content__item__line"></div>
								</div>
									<div class="category-page__content__item__text">
										<?= $product['description'] ?>
									</div>								
							<?php if ($product['price'] > 0): ?>
								<p class="product-item__price">Розничная цена: <span><?= $product['price'] ?></span></p>
							<?php endif; ?>

							</div>
						<?php endif; ?>

						</div>
						<div class="col-sm-10 col-12 mb-lg-5 mb-3">
							<div class="char">
								<?= $product['characteristics'] ?>
							</div>
						</div>

					<?= $product['noindex'] ? '</noindex>' : '' ?>
					</div>
				</div>
			<?= $product['noindex'] ? '<noindex>' : '' ?>

				<section class="veter">
					<style>
						h2, h3, .veter ul li{
							margin-left: 53px;
						}
						.veter ul li, .veter ol li {
							font-family: "Exo2Medium";
							font-size: 18px;
							margin: 10px 53px 0px 73px;
						}
					</style>
					<?php //var_dump($product); ?>
					<?php if($product['type_gate']): ?>
						<div class="header"><p>Типы ворот</p></div>
						<div class="block">
							<?=  $product['type_gate']; ?>
						</div>
					<?php endif; ?>

					<?php if($product['advantages']): ?>
						<div class="header"><p>Преимущества</p></div>
						<div class="block">
							<?=  $product['advantages']; ?>
						</div>
					<?php endif; ?>

					<?php if($product['properties']): ?>
						<div class="header"><p>Характеристики</p></div>
						<div class="block">
							<?=  $product['properties']; ?>
						</div>
					<?php endif; ?>

					<?php if($product['capabilities']): ?>
						<div class="header"><p>Способы управления</p></div>
						<div class="block">
							<?=  $product['capabilities']; ?>
						</div>
					<?php endif; ?>

					<?php if($product['construction']): ?>
						<div class="header"><p>Эксплуатационные возможности</p></div>
						<div class="block">
							<?=  $product['construction']; ?>
						</div>
					<?php endif; ?>
				</section>
				<?= $product['noindex'] ? '</noindex>' : '' ?>

				<?php require GARDA_THEME . '/blocks/calc.php'; ?>

				<?php require GARDA_THEME . '/blocks/random_action.php'; ?>

				<?php $relatedProducts = Product::getRelatedProducts(); ?>
			<?php if (count($relatedProducts)): ?>
				<section class="product-list" style="margin-top: 32px;">
					<div>
						<p class="product-list__header">С этим товаром покупают</p>
						<div class="slider">
						<?php foreach ($relatedProducts as $rProduct): ?>
							<div class="product-item">
								<div class="product-item__header-block">
									<a class="product-item__header" href="<?= $rProduct['url'] ?>"><?= $rProduct['title'] ?></a>
								</div>
								<img class="product-item__img" src="<?= Image::getImagesSrc(array($rProduct['image']), '222x218') ?>" alt="<?= $rProduct['title'] ?>" />
								<div class="product-item__description hide"><?= $rProduct['description'] ?></div>
								<?php if ($rProduct['price'] > 0): ?>
									<p class="product-item__price">Розничная цена: <span><?= $rProduct['price'] ?></span></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>


