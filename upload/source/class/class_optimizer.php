<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *       *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class optimizer {

	private $optimizer = array();

	public function __construct($type) {
		$this->optimizer = new $type();
	}


	public function check() {
		return $this->optimizer->check();
	}

	public function optimizer() {
		return $this->optimizer->optimizer();
	}

	public function option_optimizer($options) {
		return $this->optimizer->option_optimizer($options);
	}

	public function get_option() {
		return $this->optimizer->get_option();
	}
}
?>