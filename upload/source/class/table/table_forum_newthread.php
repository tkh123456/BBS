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

class table_forum_newthread extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_newthread';
		$this->_pk    = '';

		parent::__construct();
	}
	public function fetch_all_by_fids($fids, $start = 0, $limit = 20) {
		if(empty($fids)) {
			return array();
		}
		return DB::fetch_all("SELECT * FROM %t WHERE %i ORDER BY dateline DESC %i", array($this->_table, DB::field('fid', $fids), DB::limit($start, $limit)), 'tid');
	}
	public function delete_by_fids($fids) {
		return DB::delete($this->_table, DB::field('fid', $fids));
	}

	public function delete_by_tids($tids) {
		return DB::delete($this->_table, DB::field('tid', $tids));
	}

	public function delete_by_dateline($timestamp) {
		return DB::delete($this->_table, DB::field('dateline', $timestamp, '<'));
	}
}

?>