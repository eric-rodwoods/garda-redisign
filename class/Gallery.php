<?php
class Gallery {
	public static function getListImage($post_id, $field_name, $image_size) {
		$meta = get_post_meta($post_id, $field_name);
		$list = Data::find_gallery_and_get_id_list($meta[0]);
		return Data::get_images_src($list, $image_size);
	}

	public static function  findGalleryAndGetIdList($str) {
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

	public static function getGalleryDescription($str, $desc) {
		$gallery = self::findGalleryAndGetIdList($str);
		$res = null;
		if (!is_null($gallery)) {
			foreach ($gallery as $id) {
				$res[Image::getImagesSrc(array($id), '')] = $desc;
			}
		}
		return $res;
	}
}
