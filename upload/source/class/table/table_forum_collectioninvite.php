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

class table_forum_collectioninvite extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_collectioninvite';
		$this->_pk    = '';

		parent::__construct();
	}


	public function fetch_by_ctid_uid($ctid, $uid) {
		return DB::fetch_first('SELECT * FROM %t WHERE ctid=%d AND uid=%d', array($this->_table, $ctid, $uid));
	}

	public function delete_by_ctid_uid($ctid, $uid) {
		$condition = array();

		if($ctid) {
			$condition[] = DB::field('ctid', $ctid);
		}

		if($uid) {
			$condition[] = DB::field('uid', $uid);
		}

		if(!count($condition)) {
			return false;
		}

		DB::delete($this->_table, implode(' AND ', $condition));
	}

	public function delete_by_ctid($ctid) {
		return DB::delete($this->_table, DB::field('ctid', $ctid));
	}

	public function delete_by_dateline($dateline) {
		if(!is_numeric($dateline)) {
			return false;
		}
		return DB::delete($this->_table, DB::field('dateline', $dateline, '<='));
	}
}

?>