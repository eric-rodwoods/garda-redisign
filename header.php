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
	<header>
		<div class="header__background"></div>
		<div class="container-fluid">				
			<div class="row">				
				<div class="hidden-menu">
					<div class="hidden-menu__left-block  d-none d-md-block">
						<div class="hidden-menu__left-block__logo">
							<div class="hidden-menu__left-block__logo__img">
								<img src="<?php echo get_template_directory_uri(); ?>/images/menu-logo.svg">
							</div>
							<div class="hidden-menu__left-block__logo__text d-none d-lg-block">
								АВТОРИЗОВАННЫЙ ДИЛЕР ГК АЛЮТЕХ
							</div>
						</div>
						<ul class="hidden-menu__left-block__content">
							<?php $categories = get_categories('parent=3&number=0'); 
							foreach( $categories as $cat ){
								$catId = $cat->term_id;
								$catName = $cat->name;
								$catSlug = $cat->slug;
								?>
								<li class="hidden-menu__left-block__item"><?php echo $catName; ?>
									<ul class="hidden-menu__right-block__content">
									<?php $childrens = get_categories( [
											'parent'       => $catId,
											'number'	 => '0',
										] );
										//проверка наличия дочерних рубрик
										if ($childrens) { 
											foreach( $childrens as $child ){
												$childId = $child->term_id;
												$childName = $child->name;
												$childSlug = $child->slug;
												?>
										<li><a class="hidden-menu__right-block__content__item menu-category__item" href="<?php echo get_category_link($childId); ?>">
											<?php echo $childName; ?>
											</a>
										</li>
											<?php }
										} else {
											// если рубрик нет - получаем посты категории
											$catPosts = new WP_Query( [
											'cat'       => $catId,
											'showposts' => -1,
										] );
											while ($catPosts -> have_posts()) { $catPosts -> the_post(); ?>
										<li><a class="hidden-menu__right-block__content__item menu-category__item" href="<?php echo get_permalink(); ?>">
											<?php echo the_title(); ?>
											</a>
										</li>
											<?php }
											wp_reset_query();
										} ?>
									</ul>
							<?php }	?>
						</ul>
					</div>
					<div class="hidden-menu__right-block  d-none d-md-block">
						<div class="hidden-menu__close">
							<img src="<?php echo get_template_directory_uri(); ?>/images/close-icon-pink.svg">
						</div>
						<div class="hidden-menu__right-block__slogan">
							СИЛЬНАЯ СТОРОНА ВАШЕГО ДОМА
						</div>
				
					</div>
					<div class="hidden-menu__mobile d-block d-md-none">
						<div class="hidden-menu__mobile__close">
							<img src="<?php echo get_template_directory_uri(); ?>/images/close-icon-grey.svg">
						</div>
						<div class="hidden-menu__mobile__text">						
							<a href="/category/product/">Продукция</a> 
						</div>
						<div class="hidden-menu__mobile__text">
							<a href="category/store">Магазин</a>
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
			</div>
			<div id="scroll-close" class="row justify-content-md-around justify-content-between pt-2 pt-md-3 pr-lg-5 pr-md-3 pr-3 pl-lg-5 pl-md-3 pl-0">
				<div class="mobile-burger d-block d-md-none">
					<div class="burger-menu__line"></div>
					<div class="burger-menu__line"></div>
					<div class="burger-menu__line"></div>
				</div>	
				<div class="col-sm-8 col-12">
					<div class="header__logo">						
						<a class="header__logo__img" href="<?php echo get_home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/images/garda-logo.svg">
						</a>
						<div class="header__logo__text d-none d-sm-block">
							Авторизованный дилер<br>ГК АЛЮТЕХ
						</div>
					</div>
				</div>
				<div id="scroll-close" class="col-lg-3 col-sm-4 col-6 d-none d-md-block">
					<div class="header__contact">
						<div class="header__contact__phone">
							<a href="tel: <?= Contact::getInstance()->getParam('phone_prefix'); ?><?= Contact::getInstance()->getParam('number_phone') ?>">
								<span class="header__contact__phone-normal"><?= Contact::getInstance()->getParam('phone_prefix'); ?></span>
								<span class="header__contact__phone-strong"><?= Contact::getInstance()->getParam('number_phone') ?></span>
							</a>							
						</div>
						<div class="header__contact__text">
							<a id="" href="#footer-anchor">Заказать обратный звонок</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row no-gutters justify-content-center align-items-center pt-lg-2 pt-sm-1 pt-0 pb-lg-2 pb-sm-1 pb-0 d-none d-md-flex">
				<div class="col-auto">
					<div id="menu-opening" class="header__category__text d-flex align-items-center">
						<div class="burger-menu">
							<div class="burger-menu__line"></div>
							<div class="burger-menu__line"></div>
							<div class="burger-menu__line"></div>
						</div>						
						<div>Продукция</div>
					</div>
				</div>
				<div class="col-auto">
					<div id="action" class="header__category__text">
						<a href="category/store">Магазин</a>
					</div>
				</div>
				<div class="col-auto">
					<div id="action" class="header__category__text">
						<a href="/action">Акции</a>
					</div>
				</div>
				<div class="col-auto">
					<div id="objects" class="header__category__text">
						<a href="/objects">Наши объекты</a>
					</div>
				</div>
				<div class="col-auto">
					<div id="dealer" class="header__category__text">
						<a href="/dealer">Дилерам</a>
					</div>
				</div>
				<div class="col-auto">
					<div id="about" class="header__category__text">
						<a href="/about">О компании</a>
					</div>
				</div>
				<div class="col-auto">
					<div id="contact" class="header__category__text">
						<a href="/contact">Контакты</a>
					</div>
				</div>
			</div>			
		</div>
	</header>

