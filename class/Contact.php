<?php
final class Contact {
    /**
     * ID page config
     * @var int
     */
	private $post_contact_id = 43;
    private static $instance = null;
    private $cache = array();

    /**
     * @return Contact
     */
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getParam($param) {
        if (!isset($this->cache[$param])) {
            $this->cache[$param] = get_field($param, $this->post_contact_id);
        }
        return $this->cache[$param];
    }

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}