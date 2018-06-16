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

class table_common_member_newprompt extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_member_newprompt';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'common_member_newprompt_';
		$this->_cache_ttl = 60;

		parent::__construct();
	}
	public function insert($uid, $data) {
		if(empty($uid) || empty($data)) {
			return false;
		}
		DB::insert($this->_table, array('uid' => intval($uid), 'data' => serialize($data)));
	}
}

?>