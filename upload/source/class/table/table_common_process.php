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

class table_common_process extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_process';
		$this->_pk    = 'processid';

		parent::__construct();
	}

	public function delete_process($name, $time) {
		$name = addslashes($name);
		return DB::delete('common_process', "processid='$name' OR expiry<".intval($time));
	}
}

?>