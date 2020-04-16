
<section class="block-video">
	<div>
		<p id="header-video" class="header"></p>
        <iframe id="video" src=""></iframe>
		<p class="text-other">Смотрите также</p>
		<div class="slider-video">
            <?php
            foreach (Data::getVideo() as $video) {
            ?>
                <div class="embed" data-embed="<?= $video['embed']; ?>" data-title='<?= $video['title']; ?>'>
                    <img style="background-image: url(<?= $video['img']; ?>);" alt=""/>
                    <p><?= $video['title']; ?></p>
                </div>
            <?php
            }
            ?>
        </div>
	</div>
</section>