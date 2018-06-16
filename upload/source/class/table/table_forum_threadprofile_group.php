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

class table_forum_threadprofile_group extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_threadprofile_group';
		$this->_pk    = 'gid';

		parent::__construct();
	}

	public function fetch_all() {
		return DB::fetch_all('SELECT * FROM %t', array($this->table), $this->_pk);
	}

	public function delete_by_tpid($tpid) {
		DB::delete($this->table, "tpid='$tpid'");
	}

}

?>