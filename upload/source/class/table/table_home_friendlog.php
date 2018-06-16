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

class table_home_friendlog extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_friendlog';
		$this->_pk    = '';

		parent::__construct();
	}
	public function fetch_all_order_by_dateline($start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t ORDER BY dateline'.DB::limit($start, $limit), array($this->_table));
	}
	public function delete_by_uid_fuid($uid, $fuid) {
		return DB::delete($this->_table, DB::field('uid', $uid).' AND '.DB::field('fuid', $fuid));
	}

}

?>