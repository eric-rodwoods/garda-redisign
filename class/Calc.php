<?php

final class Calc {

    const POST_ID_CONFIG_CALC = 303;

    private static $instance;
    private $post_id;
    private $percent;
    private $email;
    private $text;
    private $calcs = array();
    private $code  = '<script src="http://www.alutech-group.com/app/calc/calcLoader.js"></script><script>calcLoader.ready(function(){ourJquery("{container}").alutechCalc({calc: [{calcs}],{percent}{email}});});</script>';

    /**
     * @return Calc
     */
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param string $container
     * @return string
     */
    public function getCalc($container) {
        $calcs   = '"' . implode('", "', $this->calcs) . '"';
        $percent = "margin: $this->percent";
        $email   = $this->email != '' ? ', email: "' . $this->email . '"' : '';
        return preg_replace('#{calcs}#', $calcs, preg_replace('#{percent}#', $percent, preg_replace('#{email}#', $email, preg_replace('#{container}#', $container, $this->code))));
    }

	public function getText() {
		return $this->text;
	}

    /**
     * @return bool
     */
    public function enabled() {
        return !empty($this->calcs);
    }

	public function textExist() {
		return $this->text != '' ;
	}

    private function __construct() {
        $this->percent = get_field('calc_percent', Calc::POST_ID_CONFIG_CALC) / 100;
        $this->email   = get_field('calc_email', Calc::POST_ID_CONFIG_CALC);
        $this->text   = get_field('calc_text', Calc::POST_ID_CONFIG_CALC);
        $this->post_id = get_the_ID();

        if (get_field('calc_shutter', $this->post_id)) {
            $this->calcs[] = 'shutter';
        }
        if (get_field('calc_gate', $this->post_id)) {
            $this->calcs[] = 'gate';
        }
        if (get_field('calc_ads400', $this->post_id)) {
            $this->calcs[] = 'ads400';
        }
    }

    private function __clone() {}
    private function __wakeup() {}
}