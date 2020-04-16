<section class="block-car-1">
</section>
<script>
	$(document).ready(function(){
		<?php $str = new String(Gallery::getListImage($page_id, 'main_top_gallery', 'full')); ?>
		var list = <?= $str->getJSArray(); ?>;
		$('.block-car-1').bgSlider({
			auto: true,
			timeAnimation : 1500,
			timeDelay : 5000,
			list : list
		});
	});
</script>