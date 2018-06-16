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

class table_forum_typeoption extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_typeoption';
		$this->_pk    = 'optionid';

		parent::__construct();
	}

	public function fetch_all_by_classid($classid, $start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t WHERE classid=%d ORDER BY displayorder '.DB::limit($start, $limit), array($this->_table, $classid));
	}

	public function fetch_all_by_identifier($identifier, $start = 0, $limit = 0, $not_optionid = null) {
		return DB::fetch_all('SELECT * FROM %t WHERE identifier=%s '.($not_optionid ? ' AND '.DB::field('optionid', $not_optionid, '<>').' ' : '').DB::limit($start, $limit), array($this->_table, $identifier));
	}

}

?>