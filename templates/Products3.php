<?php
/*
 * Шаблон для рубрик второго уровня, вложенных в рубрику "Магазин",
 * отображается в виде каталога товаров
 */
?>
<?php $products = Data::getProductChildren(); ?>


            <div class="category-page__block">  
                <p class="breadcrumbs"><?= Data::getBreadcrumbsCategory(FALSE) ?></p>
                <div class="container-fluid">
                    <p class="header category-page__content__item__heading d-none d-sm-block"><?= Category::getHeader(); ?></p>
                    <div class="row">
<!--<?php foreach ($products as $product): ?>-->
                        <div class="col-12 d-block d-lg-flex pb-3 pb-sm-5 pt-3 justify-content-between">
                            <div class="category-page__content__item">
                                <div class="product-margin">
                                <?php if ($product['deny_url']): ?>
                                    <p class="header-1 objects-page__heading"><?= $product['title'] ?></p>
                                <?php else: ?>
                                    <p class="header-1">
                                        <a class="objects-page__heading" href="<?= $product['url'] ?>"><?= $product['title'] ?></a>
                                    </p>
                                <?php endif; ?>
                                    <div class="category-page__content__item__line"></div>
                                </div>                                  
                                <div class="category-page__content__item__text">
                                    <?= $product['description'] ?>
                                <?php if ($product['price'] > 0): ?>
                                    <p class="price">Розничная цена: <span><?= $product['price'] ?></span></p>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="category-page__content__img">
                                <img class="product image-fitting" src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" />
                            </div>
                        </div>
<!--<?php endforeach; ?>-->
                    </div>
                </div>
                <div style="clear: both;"></div>

                <section class="veter container" style="margin-bottom: 37px;">
                    <?php $categoryDescription = Category::getDescription(); ?>
                    <?php $seo_header = Category::getSeoHeader(); ?>
                    <?php if ($categoryDescription != "<p>"): ?>
                        <h1 class="category-page__content__item__heading"><?= $seo_header ? $seo_header : Category::getHeader(); ?></h1>
                        <div class="category-page__content__item__text">
                            <?= Category::getDescription(); ?>
                        </div>
                    <?php endif; ?>

                    <?php $categoryAdvantages = Category::getMetaAdvantages(); ?>
                    <?php if ($categoryAdvantages != ""): ?>
                        <div class="header"><p>Преимущества</p></div>
                        <div class="block">
                            <?= $categoryAdvantages ?>
                        </div>
                    <?php endif; ?>

                    <?php $categoryProperties = Category::getMetaProperties(); ?>
                    <?php if ($categoryProperties != ""): ?>
                        <div class="header"><p>Характеристики</p></div>
                        <div class="block">
                            <?= $categoryProperties; ?>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</section>