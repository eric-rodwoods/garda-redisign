<?php
/*
 * Шаблон для страниц рубрики продукция
 */
?>
<?php $calc = Calc::getInstance(); ?>
<?php $products = Data::getProductChildren(); ?>


			<div class="category-page__block">  
                <p class="breadcrumbs"><?= Data::getBreadcrumbsProduct() ?></p>
			    <div class="container-fluid">
					<div class="row justify-content-center mb-5">
					<?php $product = Product::getProduct(); ?>
					<?= $product['noindex'] ? '<noindex>' : '' ?>

						<div class="col-12 mb-3">
						<?php if ($product['seo_header'] || $product['title'] && $product['description']): ?>
							<div class="category-page__content__item">			
								<h1 class="category-page__content__item__heading"><?= $product['seo_header'] ? $product['seo_header'] : $product['title'] ?></h1>
							</div>	
						<?php endif; ?>
						</div>
						<div class="col-lg-4 col-md-6 col-6 mb-3 mb-sm-5">
							<img class="image-fitting" style="max-height: 500px;" src="<?= Image::getImagesSrc(array($product['image']), '694x521'); ?>" />
						</div>
						<div class="col-lg-8 col-md-12 col-sm-6 col-12 mb-5">
							<div class="category-page__content__item">
								<div class="category-page__content__item__text">
									<?= $product['description'] ?>
								</div>
							</div>							
						</div>
						<div class="col-12 mb-4">
							<div class="char">
								<?= $product['characteristics'] ?>
							</div>
						</div>

					<?php if( get_field('gallery_new') ): ?>				
						<div class="col-12">						
							<div class="swiper-container product-slider cat__slider__height">
							    <div class="swiper-wrapper">
							<?php $images = acf_photo_gallery('gallery_new', $post->ID);
							    if( count($images) ):
							    foreach($images as $image):?>
							    	<div class="swiper-slide">
							        	<div style="height: 100%">
							        		<img class="image-fitting" src="<?php echo $image['full_image_url']; ?>">
							        	</div>
							        </div>
							<?php endforeach; endif; ?>
							    </div>
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>
							</div>
						</div>	
					<?php else: ?>
						<div></div>
					<?php endif; ?>					
						
					</div>
				</div>
				<div style="clear: both;"></div>
				<section class="veter">
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

				<div class="store-button">
					<a href="/category/store">В магазин</a>
				</div>

			<?php require GARDA_THEME . '/blocks/calc.php'; ?>

            </div>
        </div>
    </div>
</section>