<?php $seo = Seo::getInstance($page_id); ?>
<?php if ($seo->exist()): ?>
	<section class="veter">
		<h1><?= $seo->getHeader(); ?></h1>
		<?= $seo->getText(); ?>
	</section>
<?php endif; ?>