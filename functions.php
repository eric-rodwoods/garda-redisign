<?php

/* включаем поддержку миниатюр для постов*/
add_theme_support( 'post-thumbnails' );

/*Вывод столбца Title, Desscription и Keywords в админке*/
function true_add_post_columns($my_columns)
{

    $my_columns = array(
        'title' => 'Заголовок',

        '_title' => 'Title',
        '_description' => 'Description',
        'keywords' => 'Keywords',

        'date' => 'Дата'
    );
    return $my_columns;
}

function true_fill_post_columns($column)
{
    global $post;
    switch ($column) {
        case '_title':
            echo get_post_meta($post->ID, 'title', true);
            break;
        case '_description':
            echo get_post_meta($post->ID, 'description', true);
            break;
        case 'keywords':
            echo get_post_meta($post->ID, 'keywords', true);
            break;
    }
}

//add_filter( 'manage_edit-post_columns', 'true_add_post_columns', 10, 1 );
//add_action( 'manage_posts_custom_column', 'true_fill_post_columns', 10, 1 );

define('GARDA_THEME', WP_CONTENT_DIR . '/themes/garda');

include_once GARDA_THEME . '/class/Cache.php';
include_once GARDA_THEME . '/class/Url.php';
include_once GARDA_THEME . '/class/Contact.php';
include_once GARDA_THEME . '/class/Image.php';
include_once GARDA_THEME . '/class/Calc.php';
include_once GARDA_THEME . '/class/Category.php';
include_once GARDA_THEME . '/class/Product.php';
include_once GARDA_THEME . '/class/Seo.php';
include_once GARDA_THEME . '/class/Gallery.php';
include_once GARDA_THEME . '/class/String.php';
include_once GARDA_THEME . '/class/Meta.php';

/**
 * Используется для дебага
 */
final class Debug
{

    public static function dumpToPage($obj = null, $die = FALSE)
    {
        $dump = self::getDump($obj);
        $dump = preg_replace('#\[\"|\"\]#', '"', $dump);
        $dump = preg_replace('#=>\n[\s]+#', ' => ', $dump);

        $dump = preg_replace('#\n#', '<br>', $dump);
        $dump = preg_replace('#\s#', '&nbsp;', $dump);

        echo $dump;
        self::stop($die);
    }

    private static function getDump($obj)
    {
        ob_start();
        var_dump($obj);
        return ob_get_clean();
    }

    private static function stop($value)
    {
        if ($value) {
            die;
        }
    }

}

abstract class mTemplate
{

}

final class mUL extends mTemplate
{

    const mCont = '<ul class="menu-level-{lvl} {class}">{list}</ul>';
    const mElemActive = '<li><a href="{url}">{text}</a></li>';
    const mElemPassive1 = '<li><a href="{url}">{text}</a></li>';
    const mElemPassive = '<li><a href="{url}">{name}</a>{text}</li>';

}

final class mUL1 extends mTemplate
{

    const mCont = '<ul class="menu-level-{lvl}">{list}</ul>';
    const mElemActive = '<li><a data-active href="{url}">{text}</a></li>';
    const mElemPassive1 = '<li>{text}</li>';
    const mElemPassive = '<li><img src="/wp-content/themes/garda/img/icon/arr.png"><span>{name}</span>{text}</li>';

}

final class mDiv extends mTemplate
{

    const mCont = '<div class="menu-level-{lvl}">{list}</div>';
    const mElemActive = '<div><a href="{url}">{text}</a></div>';
    const mElemPassive = '<p>{text}</p>';

}

final class tBreadcrumbs extends mTemplate
{

    const link = '<a href="{url}">{name}</a>';
    const linkNull = '{name}';

}

class Html
{

    public static function getMenu($list, mTemplate $template, $class = '')
    {
        $menuList = '';
        foreach ($list as $key => $value) {
            if (is_null($value['child'])) {
                $str = $value['active'] ? $template::mElemActive : preg_replace('#data\-active#', '', $template::mElemActive);
                $menuList .= preg_replace('#{url}#', $value['url'], preg_replace('#{text}#', $value['name'], $str));
            } else {
                $childMenu = Html::getMenu($value['child'], $template);
                if ($value['level'] == 1) {
                    $menuList .= preg_replace('#{text}#', $value['name'] . $childMenu, preg_replace('#{url}#', $value['url'], $template::mElemPassive1));
                } else {
                    $menuList .= preg_replace('#{name}#', $value['name'], preg_replace('#{url}#', $value['url'], preg_replace('#{text}#', $childMenu, $template::mElemPassive)));
                }
//				$menuList .= preg_replace('#{name}#', $value['name'], preg_replace('#{url}#', $value['url'], preg_replace('#{text}#', $childMenu, $template::mElemPassive)));
            }
        }
        $res = $value['level'] == 1 ? preg_replace('#{class}#', $class, $template::mCont) : preg_replace('#{class}#', '', $template::mCont);
        return preg_replace('#{list}#', $menuList, preg_replace('#{lvl}#', $value['level'], $res));
    }

    /**
     * Возвращает заголовок страницы
     * @return string
     */
    public static function getTitle()
    {
        if (!is_404()) {
            if (Category::getSeoTitle()) {
                $title = Category::getSeoTitle();
            } elseif (get_field('title') != '') {
                $title = get_field('title');
            } elseif (wp_title('', FALSE) !== '') {
                $title = get_bloginfo('description') . ' | ' . preg_replace('#^\s+#', '', wp_title('', FALSE));
            } else {
                $title = get_bloginfo('description');
            }
        } else {
            $title = '404 - Страница не найдена';
        }
        return "<title>$title</title>\r\n";
    }

    public static function getKeywords()
    {
        if (Category::getSeoKeywords()) {
            return "<meta name=\"keywords\" content=\"" . Category::getSeoKeywords() . "\">\r\n";;
        } elseif (get_field('keywords')) {
            return "<meta name=\"keywords\" content=\"" . get_field('keywords') . "\">\r\n";
        } else {
            return "\r\n";
        }
    }

    public static function getDescription()
    {
        if (Category::getSeoDescription()) {
            return "<meta name=\"description\" content=\"" . Category::getSeoDescription() . "\">\r\n";
        } elseif (get_field('description')) {
            return "<meta name=\"description\" content=\"" . get_field('description') . "\">\r\n";
        } else {
            return "\r\n";
        }
    }

    public static function getCanonical()
    {
        $canonical_url = get_field('canonical_url');
        if ($canonical_url != '') {
            return '<link rel="canonical" href="http://' . $_SERVER['SERVER_NAME'] . $canonical_url . "\" />\r\n";
        } elseif (Category::getCanonicalURL()) {
            return '<link rel="canonical" href="http://' . $_SERVER['SERVER_NAME'] . Category::getCanonicalURL() . "\" />\r\n";
        } else {
            return "\r\n";
        }
    }

}

class Data
{

    private static $id_video_block = 43;
    private static $id_photo_block = 44;
    private static $id_category_product = 3;
    private static $id_category_action = 40;
    private static $id_category_objects = 34;
    private static $cache = array();

    public static function getVideo()
    {
        return self::getVideoProduct();
    }

    public static function getVideoProduct()
    {
        $res = array();
        $posts = self::get_posts(self::$id_video_block);
        foreach ($posts as $post) {
            $meta = get_post_meta($post->ID);
            if ($meta['image'][0] != '') {
                $src = wp_get_attachment_image_src($meta['image'][0], '240x143');
                $image = $src[0];
            } else {
                $image = '/wp-content/themes/garda/img/default/video.jpg';
            }
            $res[] = array(
                'id' => $post->ID,
                'title' => $post->post_title,
                'embed' => $meta['embed'][0],
                'img' => $image
            );
        }

        return $res;
    }

    public static function getPhotoPosts()
    {
        $res = array();
        $posts = self::get_posts(self::$id_photo_block);
        foreach ($posts as $post) {
            $res[] = array(
                'id' => $post->ID,
                'title' => $post->post_title,
                'gallery' => self::get_gallery_1($post->post_content)
            );
        }
        return $res;
    }

    public static function getHits($count = null, $category = NULL)
    {
        $category = is_null($category) ? self::$id_category_product : (int)$category;
        return self::get_product_hit($count, $category);
    }

    public static function getAction()
    {
        $res = array();
        $posts = self::get_posts(self::$id_category_action);

        foreach ($posts as $post) {
            $meta = get_post_meta($post->ID);
            $src = wp_get_attachment_image_src($meta['action_banner'][0], '560xauto');
            $image = $src[0];
            $res[] = array(
                'id' => $post->ID,
                'action-title' => $post->post_title,
                'action-content' => $post->post_content,
                'action-image' => $image
            );
        }
        return $res;
    }

    public static function pageDialer()
    {
        $id = get_the_ID();
        $query1 = new WP_Query('page_id=' . $id);
        $query1->the_post();
//		var_dump(the_content());
        return '';
    }

    public static function getBanner()
    {
        $res = null;
        $img = get_field('banner');
        if ($img) {
            $res['banner'] = $img['sizes']['1000xauto'];
        }
        return $res;
    }

    public static function getPageHeader()
    {
        return get_the_title();
    }

    public static function getBreadcrumbs($array)
    {
        $array = is_null($array) ? array('Главная' => '/', Data::getPageHeader() => NULL) : $array;
        $separator = ' / ';
        $res = '';
        $i = 1;
        foreach ($array as $name => $url) {
            if ($i !== 1) {
                $res .= $separator;
            }
            $i++;
            if (!is_null($url)) {
                $res .= preg_replace('#{name}#', $name, preg_replace('#{url}#', $url, tBreadcrumbs::link));
            } else {
                $res .= preg_replace('#{name}#', $name, tBreadcrumbs::linkNull);
            }
        }
        return $res;
    }

    private static function getParamBreadcrumbsForCategory($list, $lastUrl)
    {
        $param = array('Главная' => '/');
        $i = 0;
        $listLen = count($list);
        foreach ($list as $id) {
            $last = $i == $listLen - 1;
            if ($last) {
                if ($lastUrl) {
                    $param[get_category($id)->name] = get_category_link($id);
                } else {
                    $param[get_category($id)->name] = null;
                }
            } else {
                $param[get_category($id)->name] = get_category_link($id);
            }
            $i++;
        }
        return $param;
    }

    public static function getBreadcrumbsCategory($lastUrl = TRUE)
    {
        return self::getBreadcrumbs(self::getParamBreadcrumbsForCategory(Category::getListID_ByCurrentURL(), $lastUrl));
    }

    public static function getBreadcrumbsProduct()
    {
        $catID = self::get_category_id_by_this_product();
        $list = array();
        self::get_category_tree_by_child_id($catID, $list);
        $param = self::getParamBreadcrumbsForCategory($list, TRUE);
        $param[get_the_title()] = null;
        return self::getBreadcrumbs($param);
    }

    private static function get_category_id_by_this_product()
    {
        $res = 0;
        $categories = get_the_category();
        foreach ($categories as $category) {
            if ($category->parent != 0) {
                $res = $category->term_id;
                break;
            }
        }
        return $res;
    }

    public static function getAllObjects()
    {
        $res['count'] = 0;
//		$categoriesList = get_category_list(115);
        $categoriesList = get_category_list(self::$id_category_objects);
        foreach ($categoriesList as $id => $catInfo) {
            $gallery = array();
            $posArray = null;
            foreach (self::get_posts($id) as $post) {
                $meta = Meta::getMeta($post->ID, array('object_image', 'object_gallery', 'object_description_small', 'object_description_full'), false);
//				$galRes	 = Gallery::findGalleryAndGetIdList($meta['object_gallery']);
                $galRes = Gallery::getGalleryDescription($meta['object_gallery'], $meta['object_description_full']);

//				var_dump($galRes);
//				$index = Image::getImagesSrc(array((int)$meta['object_image']), '');
//				$gallery[$index] = $meta['object_description_full'];
//				var_dump($gallery);

                if (!is_null($galRes)) {
                    foreach ($galRes as $key => $desc) {
                        $gallery[$key] = $desc;
                    }
                }

//				var_dump($gallery);
                $posArray[] = array(
                    'name' => $post->post_title,
                    'image' => self::get_images_src(array($meta['object_image']), '220x150'),
                    'image_full' => self::get_images_src(array($meta['object_image']), ''),
                    'desc_small' => $meta['object_description_small'],
                    'desc_full' => $meta['object_description_full'],
                    'gallery' => $galRes
                );
            }
            $res[] = array(
                'id' => $id,
                'name' => $catInfo['name'],
                'posts' => $posArray,
                'gallery' => $gallery
            );
            $res['count'] = $res['count'] < count($posArray) ? count($posArray) : $res['count'];

        }
        return $res;
    }

    /**
     * По URL определяет тип страницы ctaegory или product
     * @return string category | product | null
     */
    public static function getPageType()
    {
        $currenurl = Url::getCurrent();
        if (preg_match('#^http://[a-zA-Z.\-_]+/category/.+$#', $currenurl)) {
            return 'category';
        } elseif (preg_match('#^http://[a-zA-Z.\-_]+/product/.+$#', $currenurl)) {
            return 'product';
        } else {
            return null;
        }
    }

    /**
     * Проверяет существуют ли дочение категории
     * @return boolean
     */
    public static function categoryChildrenExist()
    {
        $categories = self::children_exist_for_category_id();
        if (!empty($categories)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Проверяет сущесивуют ли продукты в данной категории
     * @return boolean
     */
    public static function categoryProductExist()
    {
        $id = array_pop(Category::getListID_ByCurrentURL());
        $products = get_products_by_category_id($id, 0);
        if (!empty($products)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function getProductChildren()
    {
        $id = array_pop(Category::getListID_ByCurrentURL());
        $args =[
            'cat'=>  $id,
            'posts_per_page'=>-1,
            'orderby'=>'order',
            'order'=>'ASC',
        ];
        $products = query_posts($args);
        $res = array();
        foreach ($products as $product) {
//			var_dump($product->ID);
            $meta = self::get_meta_for_post($product->ID, array('product_image', 'product_description', 'product_price'));
            $res[] = array(
                'title' => $product->post_title,
                'description' => get_field('product_description', $product->ID),
                'image' => self::get_images_src(array($meta['product_image']), '222x218'),
                'image-483x300' => self::get_images_src(array($meta['product_image']), '483x300'),
                'price' => $meta['product_price'],
                'url' => get_permalink($product->ID)
            );
        }
        return $res;
    }

    public static function getTheProduct()
    {
        $res = array();
        $id = get_the_ID();
        $product = get_post(get_the_ID());
        $meta = self::get_meta_for_post($id, array('product_image', 'product_price'));
        $res['id'] = $product->ID;
        $res['title'] = $product->post_title;
        $res['description'] = get_field('product_description', $id);
        $res['image'] = self::get_images_src(array($meta['product_image']), '694xauto');
        $res['price'] = $meta['product_price'];
        return $res;
    }

    public static function getCategoryChildren()
    {
        $id = array_pop(Category::getListID_ByCurrentURL());
        return self::get_child_categories_or_products_for_category_id($id, 3);
    }

    public static function getRandomAction($count = 2)
    {
        $posts = query_posts('cat=' . self::$id_category_action . '&orderby=rand&posts_per_page=2');
        $res = array();
        foreach ($posts as $post) {
            $meta = self::get_meta_for_post($post->ID, array('action_banner'));
            $res[] = array(
                'banner' => self::get_images_src(array($meta['action_banner']), '476x267'),
            );
        }
        return $res;
    }

    private static function get_child_categories_or_products_for_category_id($id, $maxLvl = 3)
    {
        $res = null;
        if ($maxLvl > 0) {
            $categories = self::children_exist_for_category_id($id);
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $products = Category::getProductIds($category->term_id);
                    $sub = self::children_exist_for_category_id($category->term_id);
                    if (!empty($sub) || $maxLvl > 0) {
                        $sub = self::get_child_categories_or_products_for_category_id((int)$category->term_id, $maxLvl - 1);
                    } else {
                        $sub = NULL;
                    }
                    $subProduct = array();
                    if ($category->name == 'Промышленный сектор') {
                        foreach ($products as $product) {
                            $meta = self::get_meta_for_post($product->ID, array('product_image'));
                            $img = self::get_images_src(array($meta['product_image']), '222x218');
                            $subProduct[] = array(
                                'name' => $product->post_title,
                                'url' => get_permalink($product->ID),
                                'image' => $img
                            );
                        }
                    }
                    $img = Image::getImagesSrc(array(Image::getRandomIdIamgeForCategory($category->term_id)), '222x218');
                    $res[(int)$category->term_id] = array(
                        'type' => 'category',
                        'name' => $category->name,
                        'image' => $img,
                        'url' => get_category_link((int)$category->term_id),
                        'sub' => $sub,
                        'subProduct' => $subProduct
                    );
                }
            } else {
                $products = get_products_by_category_id($id, 0);
                foreach ($products as $key => $product) {
//					var_dump($product['name']);
                    $meta = self::get_meta_for_post($key, array('product_image'));
                    $img = self::get_images_src(array($meta['product_image']), '222x218');
                    $res[$key] = array(
                        'type' => 'product',
                        'name' => $product['name'],
                        'image' => $img,
                        'url' => $product['url'],
                        'sub' => null
                    );
                }
            }
        }
        return $res;
    }

    /**
     * Формирует массив дерева категорий для дочерней категории
     * @param type $id
     * @param type $list
     */
    private static function get_category_tree_by_child_id($id, &$list)
    {
        $cat = get_category($id);
        array_unshift($list, $id);
        if ($cat->parent != 0) {
            self::get_category_tree_by_child_id($cat->parent, $list);
        }
    }

    /**
     * Возвращает текущий урл
     * @return type
     * @global type $wp
     */
    private static function get_current_url()
    {
        global $wp;
        return home_url(add_query_arg(array(), $wp->request));
    }

    /**
     * Возвращает дерево ID категорий для текущего урл
     * @return type
     */
    private static function get_gallery_1($data)
    {
        $res = null;
        $gallery = array();
        preg_match_all("#\d+#", $data, $gallery);
        foreach ($gallery[0] as $value) {
            $tmp = wp_get_attachment_image_src($value, ' 850xAuto');
            $res[] = $tmp[0];
        }
        return $res;
    }

    /**
     * Возвращает продукты отмеченные как хиты продаж для главной страницы
     * @param type $count
     * @param type $category
     * @return type
     * @global type $wpdb
     */
    private function get_product_hit($count, $category)
    {
        $res = array();
        global $wpdb;
        $limit = $count > 0 ? "LIMIT $count" : '';
        $sql = "SELECT p.id, p.post_title FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta m ON m.post_id = p.id LEFT JOIN $wpdb->term_relationships tr ON tr.object_id = m.post_id WHERE tr.term_taxonomy_id = $category AND m.meta_key = 'product_hit' AND m.meta_value = 1 AND p.post_status = 'publish' AND p.post_type = 'post' ORDER BY RAND() $limit;";
        foreach ($wpdb->get_results($sql, OBJECT) as $product) {
            $meta = get_post_meta($product->id);
            if ($meta['product_image'][0] != '') {
                $src = wp_get_attachment_image_src($meta['product_image'][0], '222x218');
                $image = $src[0];
            } else {
                $image = '/wp-content/themes/garda/img/default/product.jpg';
            }
            $res[] = array(
                'id' => $product->id,
                'product_title' => $product->post_title,
                'product_description' => get_field('product_description', $product->id),
                'product_price' => $meta['product_price'][0],
                'product_image' => $image,
                'product_url' => get_permalink($product->id)
            );
        }
        return $res;
    }

    private static function get_posts($id, $count = 0)
    {
        if (!isset(self::$cache['get_post'][$id][$count])) {
            self::$cache['get_post'][$id][$count] = get_posts(array(
                'numberposts' => $count,
                'category' => $id,
                'orderby' => 'order',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
                'nopaging' => FALSE
            ));
        }
        return self::$cache['get_post'][$id][$count];
    }

    public static function get_random_posts($id, $count = 0)
    {
        $res = get_posts(array(
            'numberposts' => $count,
            'category' => $id,
            'orderby' => 'rand',
            'post_type' => 'post',
            'post_status' => 'publish',
            'nopaging' => FALSE
        ));
        return $res;
    }

    /**
     * Возвращает массив категорий которые являются потомками категории с id = $id
     * tckb $id = null то произвдит проверку для текущего урл
     * @param int $id
     * @return array
     */
    private static function children_exist_for_category_id($id = null)
    {
        $thisId = is_null($id) ? array_pop(Category::getListID_ByCurrentURL()) : (int)$id;
        if (!isset(self::$cache['children_exist_for_category_id'][$thisId])) {
            self::$cache['children_exist_for_category_id'][$thisId] = get_categories(array('parent' => $thisId, 'orderby' => 'order', 'order' => 'ASC'));
        }
        return self::$cache['children_exist_for_category_id'][$thisId];
    }

    /**
     * Возвращает мета информацию перечисленную в массиве $params для поста.
     * @param int $post_id
     * @param array $params
     * @return array
     */
    public static function get_meta_for_post($post_id, array $params)
    {
        $res = array();
        $meta = get_post_meta($post_id);
        foreach ($params as $param) {
            $res[$param] = isset($meta[$param]) && isset($meta[$param][0]) && $meta[$param][0] != '' ? $meta[$param][0] : NULL;
        }
        return $res;
    }

    /**
     * Возвращает путь к изображению или массив путей к изображениям ID которых перечислены в массиве $ids
     * с заданным размером $size
     * @param array $ids
     * @param string $size
     * @return string | array | null
     */
    public static function get_images_src(array $ids, $size)
    {
        $res = null;
        if (count($ids) == 1) {
            $src = wp_get_attachment_image_src($ids[0], $size);
            $res = $src[0];
        } else {
            foreach ($ids as $id) {
                $src = wp_get_attachment_image_src($id, $size);
                $res[] = $src[0];
            }
        }
        return $res;
    }

    /**
     * Получает произвольную строку $str ищет в ней галереи и возвращает массив id изображений.
     * В противном случае возвращает null
     * @param type $str
     * @return array | null
     */
    public static function find_gallery_and_get_id_list($str)
    {
        $res = null;
        if ($str == '') {
            return $res;
        }
        $galleries = null;
        preg_match_all('#\[gallery ids\=\"([\d,]+)\"\]#', $str, $galleries);
        if (isset($galleries[1])) {
            $res = array();
            foreach ($galleries[1] as $galery) {
                $res = array_merge($res, explode(',', $galery));
            }
            $res = array_unique($res);
        }
        return $res;
    }

}

function get_products_by_category_id($category_id, $lvl)
{
    $curId = Product::getID();
    $res = null;
    if (is_null($category_id)) {
        return $category_id;
    }
    $args = [
        'cat' => (int)$category_id,
        'posts_per_page' => -1,
    ];
    $posts = query_posts($args);
    foreach ($posts as $post) {
        $meta = Meta::getMeta($post->ID, array('product_small_header'));
        $res[$post->ID] = array(
            'level' => $lvl,
            'active' => $post->ID == $curId,
            'name' => $meta['product_small_header'] ? $meta['product_small_header'] : $post->post_title,
            'url' => get_permalink($post->ID),
            'child' => null
        );
    }

    return $res;
}

/**
 * Возвращает дерево категорий в виде ассоциативного массива
 * @param int $parrent_id ID родительско категории
 * @param int $lvl уровень вложения
 * @return array
 */
function get_category_list($parrent_id, $lvl = 1)
{
    $curId = Data::getPageType() == 'category' ? Category::getId() : Product::getID();
    $res = array();
    $args = array(
        'parent' => $parrent_id,
        'hide_empty' => 0,
        'exclude' => '21',
        'number' => '0',
        'taxonomy' => 'category',
        'pad_counts' => true,
        'orderby' => 'order',
        'order' => 'ASC'
    );

    $catlist = get_categories($args);
    foreach ($catlist as $categories_item) {
        $res[$categories_item->cat_ID]['level'] = $lvl;
        $small = (boolean)Category::getMetaField($categories_item->cat_ID, 'product_small');
        $child = null;
        $products = null;
        $isShowProduct = Category::showProductInCategory($categories_item->cat_ID);
        if (get_category_children($categories_item->cat_ID)) {
            $child = get_category_list($categories_item->cat_ID, $lvl + 1);
            if (count(Category::getProductIds($categories_item->cat_ID)) && $isShowProduct) {
                foreach (Category::getProductIds($categories_item->cat_ID) as $product) {
                    $child[] = array(
                        'level' => $lvl + 1,
                        'active' => $product->ID == $curId,
                        'name' => $product->post_title,
                        'url' => get_permalink($product->ID),
                        'child' => NULL
                    );
                }
//				var_dump($child);
            }
        } else {
            if ($isShowProduct) {
                $products = get_products_by_category_id($categories_item->cat_ID, $lvl + 1);
            } else {
                $product == null;
            }
        }

        $res[$categories_item->cat_ID]['name'] = $categories_item->name;
        $res[$categories_item->cat_ID]['active'] = $categories_item->cat_ID == $curId;
        $res[$categories_item->cat_ID]['url'] = get_category_link($categories_item->cat_ID);
        $res[$categories_item->cat_ID]['small'] = $small;
        $res[$categories_item->cat_ID]['child'] = !is_null($child) ? $child : $products;
    }
    return $res;
}

function categoryTreeToArray(array $array, &$res)
{
    foreach ($array as $key => $value) {
        $res[] = $key;
        if (is_array($value['child'])) {
            categoryTreeToArray($value['child'], $res);
        }
    }
}

//function home(){
//	if(is_page(6)){return true;}else{return false;}
//}


remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');

function wplift_remove_image_sizes($sizes)
{
    /* unset($sizes['thumbnail']);
      unset($sizes['medium']);
      unset($sizes['large']); */
    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'wplift_remove_image_sizes');

function mergeproducts()
{
    $array1 = json_decode(file_get_contents(get_template_directory() . '/json/products.json'));
    $array2 = json_decode(file_get_contents(get_template_directory() . '/json/productsBft.json'));
    $products = array_merge($array1, $array2);
    file_put_contents(get_template_directory() . '/json/allproducts.json', json_encode($products));
}

function importProducts($path)
{
    $products = json_decode(file_get_contents($path));
//    $item = array_shift($products);
//    importProduct($item);
    foreach ($products as $item){
        importProduct($item);
    }
}

function importProduct($item)
{
    $title = $item->title;
    $image = $item->imageLink;
    $desc = wp_kses($item->desc,'post');
    $table = wp_kses($item->table,'post');
    $price = $item->price;
    $catId = $item->cat;
    $post_data = [
        'post_title' => $title,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_category' => [107, $catId],
        'comment_status' => 'closed',
        'ping_status' => 'closed',
    ];
    if (!post_exists((string)$title, '', '', 'post')) {
        $postId = wp_insert_post($post_data);
        $imageId = media_sideload_image($image, $postId, $desc = null, 'id');
        update_field('product_image', $imageId, $postId);
        update_field('product_properties', '', $postId);
        update_field('characteristics', $table, $postId);
        update_field('product_description', $desc, $postId);
        update_field('product_price', $price, $postId);
        echo "Post  imported successfully <br>";
    } else {
        $postId = post_exists($title);
        update_field('product_properties', '', $postId);
        update_field('characteristics', $table, $postId);
        update_field('product_price', $price, $postId);
        update_field('product_description', $desc, $postId);
        echo "Post $postId seccessfully updated <br>";
    }
}