<?php
/*
Template Name: Информация
*/
?>
<?php
	get_header();
?>

	<section class="content container">
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
		<?php else: ?>
			<p>Нет материала для отображения</p>
		<?php endif; ?>
	</section>

<?php
	get_footer();
?>