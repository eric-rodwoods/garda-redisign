<section class="random-action container">	
	<p class="header">Акции</p>
	<div class="row">
		<?php $actions = Data::getRandomAction(); ?>
		<?php if ($actions): ?>
	<!--<?php foreach ($actions as $action): ?>-->
		<div class="col-sm-6 col-12 pb-3 pt-3">
			<a href="/action">
				<img class="image-fitting" src="<?= $action['banner'] ?>" >
			</a>
		</div>	
	<!--<?php endforeach; ?>-->
		<?php endif; ?>
	</div>	
</section>