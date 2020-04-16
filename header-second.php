<!DOCTYPE html>
<html>
<head>
	<?= Html::getTitle() ?>
	<?= Html::getKeywords() ?>
	<?= Html::getDescription() ?>
	<?= Html::getCanonical() ?>
	<link rel="icon" type="image/png" href="/wp-content/themes/garda/img/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
	<link href="/wp-content/themes/garda/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/wp-content/themes/garda/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
	<link href="/wp-content/themes/garda/css/swiper.min.css" rel="stylesheet" type="text/css"/>
	<link href="/wp-content/themes/garda/css/index.css" rel="stylesheet" type="text/css"/>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script type="text/javascript" src="https://yastatic.net/jquery/2.2.3/jquery.min.js"></script>
</head>
<body>
	<section> 
 		<div class="category-page"> 			
			<div class="category-page__menu d-none d-md-block">
				<div class="second-header__logo">						
					<a class="second-header__logo__img" href="<?php echo get_home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/garda-logo.svg">
					</a>
				</div>
				<div class="category-page__menu__block">
					<a class="category-page__menu__block__item" href="#">
						<?php echo $catName; ?>
					</a>		
					<ul class="category-page__menu__block">
						<?php $categories = get_categories('parent=3&number=0'); 
						foreach( $categories as $cat ){
							$catId = $cat->term_id;
							$catName = $cat->name;
							$catSlug = $cat->slug;
							?>
							<li class="category-page__menu__block__item">
								<a class="category-page__menu__block__item" href="<?php echo get_category_link( $catId ); ?>">
									<?php echo $catName; ?>
								</a>
							</li>
						<?php }	?>
					</ul>	
				</div>
			</div>
			<div class="category-page__content">
				<div class="category-page__content__header">
					<div class="header__logo d-block d-sm-none">						
						<a class="header__logo__img" href="<?php echo get_home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/garda-logo.svg">
						</a>
					</div>
		 			<div class="mobile-burger products-position d-block d-sm-none">
						<div class="burger-menu__line"></div>
						<div class="burger-menu__line"></div>
						<div class="burger-menu__line"></div>
					</div>
					<div class="hidden-menu">
						<div class="hidden-menu__mobile d-block d-sm-none">
							<div class="hidden-menu__mobile__close">
								<img src="<?php echo get_template_directory_uri(); ?>/images/close-icon-grey.svg">
							</div>
							<div class="hidden-menu__mobile__text">						
								<a href="/category/product/">Продукция</a> 
							</div>
							<div class="hidden-menu__mobile__text">						
								<a href="/category/store/">Магазин</a> 
							</div>
							<div class="hidden-menu__mobile__text">
								<a href="/action">Акции</a>
							</div>
							<div class="hidden-menu__mobile__text">
								<a href="/objects">Наши объекты</a>
							</div>
							<div class="hidden-menu__mobile__text">
								<a href="/dealer">Дилерам</a>
							</div>
							<div class="hidden-menu__mobile__text">
								<a href="/about">О компании</a>
							</div>
							<div class="hidden-menu__mobile__text">
								<a href="/contact">Контакты</a>
							</div>
						</div>
					</div>
					<div class="category-page__content__header__nav d-none d-sm-flex">
						<a class="category-page__content__header__nav__item" href="/category/product/">
							ПРОДУКЦИЯ
						</a>	
						<a class="category-page__content__header__nav__item" href="/category/store/">
							МАГАЗИН
						</a>
						<a class="category-page__content__header__nav__item" href="/action">
							АКЦИИ
						</a>
						<a class="category-page__content__header__nav__item" href="/objects">
							НАШИ ОБЪЕКТЫ
						</a>
						<a class="category-page__content__header__nav__item" href="/dealer">
							ДИЛЕРАМ
						</a>
						<a class="category-page__content__header__nav__item" href="/about">
							О КОМПАНИИ
						</a>
						<a class="category-page__content__header__nav__item" href="/contact">
							КОНТАКТЫ
						</a>						
					</div>
					<div class="header__contact d-none d-sm-block">
						<div class="header__contact__text products-page-contact-color"><a id="" href="#footer-anchor">Заказать обратный звонок</a></div>						
						<div class="header__contact__phone">
							<a href="tel: <?= Contact::getInstance()->getParam('phone_prefix'); ?><?= Contact::getInstance()->getParam('number_phone') ?>">
								<span class="header__contact__phone-normal products-page-contact-color"><?= Contact::getInstance()->getParam('phone_prefix'); ?></span>
								<span class="header__contact__phone-strong adapt-font"><?= Contact::getInstance()->getParam('number_phone') ?></span>
							</a>							
						</div>									
					</div>
				</div>