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

class table_forum_postlog extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_postlog';
		$this->_pk    = '';

		parent::__construct();
	}
	public function delete_by_pid($pid) {
		return DB::delete($this->_table, DB::field('pid', $pid));
	}
	public function fetch_all_order_by_dateline($start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t ORDER BY dateline '.DB::limit($start, $limit), array($this->_table));
	}

}

?>