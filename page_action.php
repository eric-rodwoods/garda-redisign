<?php
/*
Template Name: Акции
*/
?>
<?php
	get_header();
?>

	<?php $page_id = get_the_ID(); ?>
	<section class="content  container">
		<p class="breadcrumbs"><?= Data::getBreadcrumbs(NULL) ?></p>
		<p class="header"><?= Data::getPageHeader(); ?></p>
		<?php $actions = Data::getAction(); ?>
		<?php $i = 1; ?>
		<?php if ($actions): ?>
			<?php foreach ($actions as $action): ?>
			<div class="container-action" <?= $i == 1 ? 'style="margin-top: 18px;"': ''; ?>>
				<img src="<?= $action['action-image'] ?>" alt="<?= $action['action-title'] ?>" /><div><?=
					apply_filters( 'the_content', $action['action-content']) ?></div>
			</div>
			<?php ++$i; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<p>Нет материала для отображения</p>
		<?php endif; ?>
	</section>
	<?php require 'blocks/seo.php'; ?>

<?php
	get_footer();
?>
