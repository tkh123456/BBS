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

class table_forum_post_location extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_post_location';
		$this->_pk    = 'pid';
		$this->_pre_cache_key = 'forum_post_location_';
		$this->_cache_ttl = 0;

		parent::__construct();
	}

	public function delete_by_uid($uid) {
		return $uid ? DB::delete($this->_table, DB::field('uid', $uid)) : false;
	}

	public function delete_by_tid($tid) {
		return $tid ? DB::delete($this->_table, DB::field('tid', $tid)) : false;
	}
}

?>