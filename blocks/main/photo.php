<section class="block-photo">
	<div>
		<p class="header">Мы предлагаем АЛЮТЕХ</p>
		<ul class="menu">
        <?php
        $data = Data::getPhotoPosts();
        foreach ($data as $post) {
            if (!is_null($post['gallery'])) { ?>
            <li class="gallery-tab"><a data-gallery="gallery-<?= $post['id'] ?>" href="javascript:void(0);"><?= $post['title'] ?></a></li>
        <?php             }
        } ?>
		</ul>
        <?php foreach ($data as $post) {
            if (!is_null($post['gallery'])) {
        ?>
            <div id="gallery-<?= $post['id'] ?>" class="jssor-slider-container">
                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 850px; height: 638px; overflow: hidden;">
                <?php foreach ($post['gallery'] as $img) { ?>
                    <div><img u="image" src2="<?= $img; ?>"></div>
                <?php } ?>
                </div>
                <div u="navigator" class="jssorb05" style="bottom: 16px; right: 6px;">
                    <div u="prototype"></div>
                </div>
            </div>
        <?php             }
        } ?>

	</div>
</section>