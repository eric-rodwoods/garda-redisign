<?php
class Meta {

	public static function getMeta($post_id, array $params, $format = true) {
		$res	 = array();
		if ($format) {
			foreach ($params as $param) {
				$field = get_field($param, $post_id);
				$res[$param] = $field;
			}
		} else {
			$meta = get_post_meta($post_id);
			foreach ($params as $param) {
				$res[$param] = isset($meta[$param]) && isset($meta[$param][0]) && $meta[$param][0] != '' ? $meta[$param][0] : NULL;
			}
		}
		return $res;
	}

}
