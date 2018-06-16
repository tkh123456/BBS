<?php

/**
 * 这里是注释
 *   
 *
 *       *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_postcache extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_postcache';
		$this->_pk    = 'pid';
		$this->_pre_cache_key = 'forum_postcache_';

		parent::__construct();
	}

	public function delete_by_dateline($dateline) {
		return DB::delete($this->_table, DB::field('dateline', $dateline, '<'));
	}
}

?>