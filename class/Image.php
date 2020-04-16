<?php
class Image {
	/**
	 * Возвращает путь к изображению или массив путей к изображениям ID которых перечислены в массиве $ids
	 * с заданным размером $size
	 * @param array $ids
	 * @param string $size
	 * @return string | array | null
	 */
	public static function getSrc(array $ids, $size) {
		$res = null;
		if (count($ids) == 1) {
			$src = wp_get_attachment_image_src($ids[0], $size);
			$res = $src[0];
		} else {
			foreach ($ids as $id) {
				$src	 = wp_get_attachment_image_src($id, $size);
				$res[]	 = $src[0];
			}
		}
		return $res;
	}

	public static function getImagesGalleryOnDescription(array $ids, $size) {
		$res = null;
		$list = array();
		foreach ($ids as $id => $desc) {
			$list[] = $id;
		}
		$list = self::getImagesSrc($list, $size);
		foreach ($list as $value) {
			$res[$value] = $desc;
		}
		return $res;
	}

	public static function getImagesSrc(array $ids, $size) {
		$res = null;
		if (count($ids) == 1) {
			$src = wp_get_attachment_image_src($ids[0], $size);
			$res = $src[0];
		} else {
			foreach ($ids as $id) {
				$src	 = wp_get_attachment_image_src($id, $size);
				$res[]	 = $src[0];
			}
		}
		return $res;
	}

    /**
     * Возвращает ID изображения случайного товара принадлежащего категории с id = $id
     * @param type $id
     * @return type
     */
    public static function getRandomIdIamgeForCategory($id) {
        $post = Data::get_random_posts((int)$id, 1);
        $meta = Data::get_meta_for_post($post[0]->ID, array('product_image'));
        return $meta['product_image'];
    }
}
