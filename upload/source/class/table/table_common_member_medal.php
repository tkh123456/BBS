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

class table_common_member_medal extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_member_medal';
		$this->_pk    = '';

		parent::__construct();
	}

	public function fetch_all_by_uid($uid) {
		return !empty($uid) ? DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('uid', $uid), 'medalid') : array();
	}

	public function delete_by_uid_medalid($uid, $medalid) {
		return !empty($uid) && !empty($medalid) ? DB::delete($this->_table, DB::field('uid', $uid).' AND '.DB::field('medalid', $medalid)) : false;
	}

	public function count_by_uid_medalid($uid, $medalid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE uid=%d AND medalid=%d', array($this->_table, $uid, $medalid));
	}
}

?>