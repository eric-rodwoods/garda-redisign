<?php
class Cache {
	private static $cache;

	public static function get($method, $key) {
		if (isset(self::$cache[$method][$key])) {
			return self::$cache[$method][$key];
		} else {
			return NULL;
		}
	}

	public static function set($method, $key, $value) {
		self::$cache[$method][$key] = $value;
	}

	public static function exist($method, $key) {
		return isset(self::$cache[$method][$key]);
	}
}
