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

class table_common_member_log extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_member_log';
		$this->_pk    = 'uid';

		parent::__construct();
	}
	public function fetch_all_range($start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t ORDER BY dateline'.DB::limit($start, $limit), array($this->_table));
	}

}

?>