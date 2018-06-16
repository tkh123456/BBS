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

class table_forum_relatedthread extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_relatedthread';
		$this->_pk    = 'tid';

		parent::__construct();
	}
	public function delete_by_tid($tids) {
		return DB::delete($this->_table, DB::field('tid', $tids));
	}

}

?>