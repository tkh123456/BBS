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

class table_home_class extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_class';
		$this->_pk    = 'classid';

		parent::__construct();
	}

	public function fetch_all_by_uid($uid) {
		return DB::fetch_all('SELECT * FROM %t WHERE uid = %d', array($this->_table, $uid), $this->_pk);
	}

	public function fetch_classid_by_uid_classname($uid, $classname) {
		return DB::result_first('SELECT classid FROM %t WHERE uid = %d AND classname = %s', array($this->_table, $uid, $classname));
	}

	public function delete_by_uid($uids) {
		if(!$uids) {
			return null;
		}
		return DB::delete($this->_table, DB::field('uid', $uids));
	}
}

?>