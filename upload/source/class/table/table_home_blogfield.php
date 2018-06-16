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

class table_home_blogfield extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_blogfield';
		$this->_pk    = 'blogid';

		parent::__construct();
	}

	public function delete_by_uid($uids) {
		if(!$uids) {
			return null;
		}
		return DB::delete($this->_table, DB::field('uid', $uids));
	}

	public function fetch_targetids_by_blogid($blogid) {
		return DB::fetch_first('SELECT target_ids, hotuser FROM %t WHERE blogid = %d', array($this->_table, $blogid));
	}

	public function fetch_tag_by_blogid($blogid) {
		return DB::result_first('SELECT tag FROM %t WHERE blogid = %d', array($this->_table, $blogid));
	}

}

?>