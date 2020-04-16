<?php

class Product {

	public static function getProduct($id = null) {
		$id					 = self::getID($id);
		$product			 = get_post($id);
		$meta				 = Meta::getMeta($id, array('product_image', 'product_price', 'product_seo_header','product_noindex','product_gallery', 'characteristics','product_description'));
		$meta_2				 = Meta::getMeta($id, array('product_noindex','product_advantages', 'product_properties', 'product_capabilities', 'product_construction','product_type_gate'), true);
		$meta_3				 = Meta::getMeta($id, array('product_gallery'), false);
		$res['id']			 = $id;
		$res['title']		 = $product->post_title;
		$res['noindex']		 = $meta['product_noindex'];
		$res['seo_header']	 = $meta['product_seo_header'];
		$res['description']	 = $meta['product_description'];
		$res['advantages']	 = $meta_2['product_advantages'];
		$res['properties']	 = $meta_2['product_properties'];
		$res['capabilities'] = $meta_2['product_capabilities'];
		$res['construction'] = $meta_2['product_construction'];
		$res['type_gate']    = $meta_2['product_type_gate'];
		$res['image']		 = $meta['product_image']['id'];
		$res['gallery']		 = Gallery::findGalleryAndGetIdList($meta_3['product_gallery']);
		$res['price']		 = $meta['product_price'];
		$res['characteristics']		 = $meta['characteristics'];
		$res['url']			 = get_permalink($id);
		return $res;
	}

	public static function getRelatedProducts($productID = null) {
		$list	 = Meta::getMeta(self::getID($productID), array('product_related'));
		$res	 = array();
		if ($list['product_related']) {
			foreach ($list['product_related'] as $rID) {
				$res[] = self::getProduct($rID);
			}
		}
		return $res;
	}

	/**
	 * Получает ID продукта или возвращает ID текущего продукта
	 * @param type $id
	 * @return type
	 */
	public static function getID($id = null) {
		if ($id === null) {
			$id = get_the_ID();
		}
		return (int) $id;
	}

}
