<?php
class Url {
	/**
	 * Возвращает текущий урл
	 * @global type $wp
	 * @return type
	 */
	public static function getCurrent() {
		global $wp;
		return home_url(add_query_arg(array(), $wp->request));
	}
}
