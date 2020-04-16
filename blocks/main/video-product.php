<?php if(sizeof(Data::getVideoProduct($post->ID)) > 0) { ?>
<section class="block-video block-video-product" >
    <div>
        <p id="header-video" class="header"></p>
        <iframe id="video" src=""></iframe>
        <p class="text-other">Смотрите также</p>
        <div class="slider-video">
            <?php foreach (Data::getVideoProduct($post->ID) as $video) { ?>
             
                <div class="embed" data-embed="<?= $video['embed']; ?>" data-title='<?= $video['title']; ?>'>
                    <img style="background-image: url(<?= $video['img']; ?>);" alt=""/>
                    <p><?= $video['title']; ?></p>
                </div>

            <?php } ?>
        </div>
    </div>
</section>
<?php  } ?>