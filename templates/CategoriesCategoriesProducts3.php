<?php
/*
 * Шаблон для страниц товаров, вложенных в рубрику "Магазин"
 */
?>
            <div class="category-page__block">  
                <p class="breadcrumbs"><?= Data::getBreadcrumbsCategory(FALSE) ?></p>
                <div class="container pt-3 pb-5">
            <?php foreach (Data::getCategoryChildren() as $category): ?>
                    <div class="cat__title product-heading">
                        <div class="open-icon__catalog">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/open-icon-grey.svg">
                        </div>
                        <div class="header category-page__content__item__heading cat__title">
                            <?= $category['name'] ?>
                        </div>                        
                        <div class="category-page__content__item__line product-line__position d-block d-sm-none"></div>                        
                    </div>                     
                    
                <?php if ($category['sub'] != NULL): ?>
                    <div class="row pb-sm-5 pb-4 cat__childs__catalog">
                <!-- <?php foreach ($category['sub'] as $key => $sub): ?> -->
                        <div class="col-lg-4 col-sm-6 col-12 pb-lg-5 pb-3 pt-3 pt-sm-0">
                            <a class="no-border" href="<?= $sub['url'] ?>">
                                <div class="header-2 product-page__content__item__heading">
                                    <?= $sub['name']; ?>
                                </div>
                                <div class="d-block">
                                    <img src="<?= $sub['image'] ?>">
                                </div>
                            </a>
                            
<!-- выводит записи данной категории в виде ссылки -->

                        <!-- <?php if ($sub['sub'] != NULL): ?>
                        <?php foreach ($sub['sub'] as $pKey => $product): ?>
                            <div>
                                <p class="header">
                                    <a href="<?= $product['url'] ?>"><?= $product['name']; ?></a>
                                </p>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?> -->

                        </div>                        
                <!-- <?php endforeach; ?> -->

<!-- выводит записи данной категории в виде заголовка с картинкой -->

                    <!-- <?php foreach ($category['subProduct'] as $product): ?> -->
                    <!--  <div class="col-4">
                        <div class="header-2">
                            <p class="header-2">
                                <a href="<?= $product['url'] ?>"><?= $product['name']; ?></a>
                            </p>
                        </div>
                        <img src="<?= $product['image'] ?>" />
                    </div> -->
                    <!-- <?php endforeach; ?> -->

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
                </div>
                <div style="clear: both;"></div>
                <?php require GARDA_THEME . '/blocks/random_action.php'; ?>
            </div>
        </div>
    </div>
</section>