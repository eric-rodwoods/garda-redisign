<?php
/*
Template Name: О компании
*/
?>
<?php
	get_header();
?>

	<section class="content  container">
		<?php $query1 = new WP_Query('page_id='.  get_the_ID()); ?>
		<?php if ($query1->have_posts()): ?>
			<p class="breadcrumbs"><?= Data::getBreadcrumbs(NULL) ?></p>
			<?php $banner = Data::getBanner(); ?>
			<?php if ($banner): ?>
				<img class="banner" src="<?= $banner['banner'] ?>" alt="<?= Data::getPageHeader(); ?>" />
			<?php endif; ?>
			<h1 style="text-align: center;"><?= Data::getPageHeader(); ?></h1>
			<div class="column-2">
				<?php $query1->the_post(); the_content(); ?>
			</div>

			<style>
				h2 {
					text-align: center;
					text-transform: uppercase;
					font-size: 29px;
				}
				.cert {
					margin-top: 30px;
					text-align: center;
					margin-bottom: 30px;
				}
				.cert a {
					border-bottom: none;
				}
			</style>
			<h2>Сертификат</h2>

			<div class="cert">
				<a class="fancybox" href="/wp-content/themes/garda/img/cert/cert-1-full.jpg"><img
						src="/wp-content/themes/garda/img/cert/cert-1-full.jpg" width="400" alt=""></a>
			</div>
		<?php else: ?>
			<p>Нет материала для отображения</p>
		<?php endif; ?>
	</section>
<?php
	get_footer();
?>
