<?php
class Seo {
	private static $instance;
	private $header = null;
	private $text = null;
	private $page_id;


	/**
	 * @param int $id
	 * @return Seo
	 */
	public static function getInstance($id) {
		if (is_null(self::$instance)) {
			self::$instance = new self($id);
		}
		return self::$instance;
	}

	public function getHeader() {
		return $this->header;
	}

	public function getText() {
		return $this->text;
	}

	public function exist() {
		return $this->header != '' && $this->text != '';
	}

	private function __construct($id) {
		$this->page_id = get_the_ID() == false ? $id : get_the_ID();
		$this->header = get_field('seo_header', $this->page_id);
		$this->text = get_field('seo_text', $this->page_id);
	}
	private function __wakeup() {}
	private function __clone() {}
}
