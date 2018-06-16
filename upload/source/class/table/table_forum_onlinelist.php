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

class table_forum_onlinelist extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_onlinelist';
		$this->_pk    = '';

		parent::__construct();
	}
	public function fetch_all_order_by_displayorder() {
		return DB::fetch_all('SELECT * FROM %t ORDER BY displayorder', array($this->_table));
	}
	public function delete_all() {
		DB::query('DELETE FROM %t', array($this->_table));
	}

	public function delete_by_groupid($groupid) {
		$groupid = is_array($groupid) ? array_map('intval', (array)$groupid) : dintval($groupid);
		if($groupid) {
			return DB::delete($this->_table, DB::field('groupid', $groupid));
		}
		return 0;
	}

	public function update_by_groupid($groupid, $data) {
		$groupid = is_array($groupid) ? array_map('intval', (array)$groupid) : dintval($groupid);
		if($groupid && $data && is_array($data)) {
			return DB::update($this->_table, $data, DB::field('groupid', $groupid));
		}
		return 0;
	}
}

?>