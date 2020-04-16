<?php

class Category {

	private static $cache;

	/**
	 * Возвращает Массив с ID категорий для текущего URL
	 * @return array
	 */
	public static function getListID_ByCurrentURL() {
		$currenurl = Url::getCurrent();

		if (!Cache::exist(__METHOD__, $currenurl)) {
			$match	 = array();
			$res	 = array();
			preg_match('#^http://[a-zA-Z.\-_]+/category/(.+)$#', $currenurl, $match);
			if (!empty($match)) {
				$cats = explode('/', $match[1]);
				foreach ($cats as $cat) {
					$term	 = get_term_by('slug', $cat, 'category');
					$res[]	 = $term->term_id;
				}
			}
			Cache::set(__METHOD__, $currenurl, $res);
		}

		return Cache::get(__METHOD__, $currenurl);
	}

	/**
	 * Возвращает имя категории для текущего URL если $id = null или для укзанного ID
	 * @param int|null $id
	 * @return string
	 */
	public static function getHeader($id = null) {
		if ($id === null) {
			$list = self::getListID_ByCurrentURL();
			$id = $list[count($list) - 1];
		} else {
			$id = (int)$id;
		}

		if (!Cache::exist(__METHOD__, $id)) {
			Cache::set(__METHOD__, $id, get_category($id)->name);
		}

		return Cache::get(__METHOD__, $id);
	}

	/**
	 * Возвращает описание категории
	 * @param int|null $id
	 * @return string
	 */
	public static function getDescription($id = NULL) {
		if ($id === null) {
			$list = self::getListID_ByCurrentURL();
			$id = $list[count($list) - 1];
		} else {
			$id = (int)$id;
		}

		if (!Cache::exist(__METHOD__, $id)) {
			$description = '<p>'.preg_replace('#<p>$#', '', preg_replace('#\n#', '</p><p>', get_category($id)->description));
			Cache::set(__METHOD__, $id, $description);
		}
		return Cache::get(__METHOD__, $id);
	}

	public static function getProductIds($id) {
		$res = array();
		global $wpdb;
		$sql = "SELECT object_id FROM $wpdb->term_relationships WHERE term_taxonomy_id = $id";
		foreach ($wpdb->get_results($sql, OBJECT) as $product) {
			$res[] = Product::getProduct($product->object_id);
		}
		return $res;
	}

	public static function getMetaField($id = null, $key) {
		if ($id === null) {
			$id = (int)array_pop(Category::getListID_ByCurrentURL());
		} else {
			$id = (int)$id;
		}
		$cacheKey = $id.$key;
		if (!Cache::exist(__METHOD__, $cacheKey)) {
			global $wpdb;
			$sql = "SELECT meta_value FROM $wpdb->taxonomymeta WHERE taxonomy_id = $id AND meta_key = '$key' LIMIT 1";
			$res = $wpdb->get_results($sql, OBJECT);
			if (empty($res)) {
				$res =  null;
			} else {
				$res = $res[0]->meta_value;
			}
			Cache::set(__METHOD__, $cacheKey, $res);
		}
		return Cache::get(__METHOD__, $cacheKey);
	}

    public static function showProductInCategory($id = null) {
        $res = self::getMetaField($id,'product_show');
        return $res == 'Да' ? TRUE : FALSE ;
    }

	public static function getSeoHeader($id = NULL) {
        return self::getMetaField($id,'seo_category_header');
    }

    public static function getTemplate($id = NULL) {
        return self::getMetaField($id,'template');
    }

    public static function getSeoTitle($id = NULL) {
        return self::getMetaField($id,'category_title');
    }
    public static function getSeoKeywords($id = NULL) {
        return self::getMetaField($id,'category_keywords');
    }
    public static function getSeoDescription($id = NULL) {
        return self::getMetaField($id,'category_description');
    }
    public static function getCanonicalURL($id = NULL) {
        return self::getMetaField($id,'category_canonical_url');
    }

    public static function getCategory($id = null) {
        if ($id === null) {
			$id = (int)array_pop(Category::getListID_ByCurrentURL());
		} else {
			$id = (int)$id;
		}

        return get_category($id);
    }

    public static function getCategoryChldren($id = null) {
		$id = self::getId($id);
        $res = array();
        $str = preg_replace('#^/+#', '', get_category_children($id));
        $list = explode('/', $str);
        foreach ($list as $cur_id) {
            $category = self::getCategory($cur_id);
            $res[] = array(
                'name' => $category->name,
                'url' => get_category_link((int) $cur_id),
                'image_id' => Image::getRandomIdIamgeForCategory($cur_id)

            );
        }

        return $res;
    }

	public static function getId($id = null) {
		if ($id === null) {
			$id = array_pop(Category::getListID_ByCurrentURL());
		}
		return (int)$id;
	}

	/**
	 * Преимущества
	 * @param int $id
	 * @return string
	 */
	public static function getMetaAdvantages($id = null) {
		$str = self::getMetaField($id,'category_advantages');
		$res = '';
		$list = array();
		preg_match_all('#(.+)\n#', $str, $list);
		if ($list[1]) {
			$res = '<p>' . implode('</p><p>', $list[1]) . '</p>';
		}
		return $res;
	}

	/**
	 * Характеристики
	 * @param type $id
	 * @return string
	 */
	public static function getMetaProperties($id = null) {
		$str = self::getMetaField($id,'category_properties');
		$res = '';
		$list = array();
		preg_match_all('#(.+)\n#', $str, $list);
		if ($list[1]) {
			$res = '<p>' . implode('</p><p>', $list[1]) . '</p>';
		}
		return $res;

	}

}
