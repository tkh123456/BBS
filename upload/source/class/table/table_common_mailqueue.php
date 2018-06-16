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

class table_common_mailqueue extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_mailqueue';
		$this->_pk    = 'qid';

		parent::__construct();
	}

	public function fetch_all_by_cid($cids) {
		if(empty($cids)) {
			return array();
		}
		return DB::fetch_all('SELECT * FROM %t WHERE '.DB::field('cid', $cids), array($this->_table));
	}

	public function delete_by_cid($cids) {
		if(empty($cids)) {
			return false;
		}
		return DB::query('DELETE FROM %t WHERE '.DB::field('cid', $cids), array($this->_table));
	}
}

?>