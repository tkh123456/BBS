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

class mod_index extends remote_service {

	var $config;
	function mod_index() {
		parent::remote_service();
	}

	function run() {
		$this->success('Discuz! Remote Service API '.$this->version);
	}
}