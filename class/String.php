<?php
class String {
	private $value;

	public function __construct($value) {
		$this->value = $value;
	}

	public function getJSArray() {
		if (is_string($this->value)) {
			return '["'.$this->value.'"]';
		} else if (is_array($this->value)) {
			return '["'.implode('","', $this->value) . '"]';
		} else {
			return '[]';
		}
	}
}
