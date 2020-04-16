<?php
/*
Template Name: Наши объекты
*/
?>
<?php
	get_header();
?>

	<section class="content container">
		<?php $page_id = get_the_ID(); ?>
		<p class="breadcrumbs"><?= Data::getBreadcrumbs(NULL) ?></p>

		<?php //require 'blocks/main/map.php'; ?>

		<?php $records = Data::getAllObjects(); ?>
		<?php if ($records['count']): ?>
			<p class="header" style="margin-left: 54px;"><?= Data::getPageHeader(); ?></p>
			<!--<p class="header-red-medium" style="margin-left: 54px;">Более 5 000 сданных объектов</p>-->
			<?php foreach ($records as $record): ?>
				<?php if (!is_null($record['posts'])): ?>
					<p class="header-object"><?= $record['name']; ?></p>
					<div class="slider-object">
					<?php foreach ($record['posts'] as $post): ?>
						<div class="obj">
							<a class="fancybox" <?= $post['desc_full'] ? 'title="'.$post['desc_full'].'"' : '' ?> rel="<?= $record['name'] ?>" href="<?= $post['image_full'] ?>">
								<img class="prev" src="<?= $post['image'] ?>" alt="<?= $post['name'] ?>" />
								<div class="desc-small">
									<p><?= $post['desc_small']; ?></p>
								</div>
							</a>

							<div style="display: none;">
							<?php foreach ($post['gallery'] as $src_img => $title ): ?>
								<a class="fancybox" <?= $title ? 'title="'.$title.'"'  : '';?> rel="<?= $record['name'] ?>" href="<?= $src_img ?>"></a>
							<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
<!--					<div style="display: none;">
					<?php foreach ($record['gallery'] as $src_img => $title): ?>
						<a class="fancybox" <?= $title ? 'title="'.$title.'"'  : '';?> rel="<?= $record['name'] ?>" href="<?= $src_img ?>"></a>
					<?php endforeach; ?>
					</div>-->
				<?php endif; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<!--<p>Нет материалов для отображения</p>-->
		<?php endif; ?>
	</section>
	<style type="text/css">
		body > section >.block-trust > div > p.header {
			margin-top: 10px;
			font-family: "Exo2Medium";
			font-size: 29px;
			line-height: 34px;
			color: #343434;
			text-transform: uppercase;
		}
	</style>
	<?php require 'blocks/main/trust.php'; ?>
	<?php require 'blocks/seo.php'; ?>
	
<?php
	get_footer();
?>