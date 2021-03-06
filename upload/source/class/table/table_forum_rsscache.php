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

class table_forum_rsscache extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_rsscache';
		$this->_pk    = 'tid';

		parent::__construct();
	}

	public function fetch_all_by_fid($fid, $limit = 20) {
		return $fid ? DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('fid', $fid).' ORDER BY dateline DESC LIMIT '.$limit, null, 'tid') : array();
	}

	public function fetch_all_by_guidetype($type, $limit = 20) {
		 return DB::fetch_all('SELECT * FROM %t WHERE guidetype=%s ORDER BY dateline DESC LIMIT %d', array($this->_table, $type, $limit));
	}

	public function delete_by_guidetype($type){
		DB::query('DELETE FROM %t WHERE guidetype=%s', array($this->_table, $type));
	}

}

?>