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

class table_forum_pollvoter extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_pollvoter';
		$this->_pk    = '';

		parent::__construct();
	}
	public function delete_by_tid($tids) {
		if(!$tids) {
			return;
		}
		return DB::delete($this->_table, DB::field('tid', $tids));
	}

}

?>