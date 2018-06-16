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

class DbException extends Exception{

	public $sql;

	public function __construct($message, $code = 0, $sql = '') {
		$this->sql = $sql;
		parent::__construct($message, $code);
	}

	public function getSql() {
		return $this->sql;
	}
}
?>