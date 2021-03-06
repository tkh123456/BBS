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

class table_common_secquestion extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_secquestion';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function fetch_all($start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t'.DB::limit($start, $limit), array($this->_table));
	}

	public function delete_by_type($type) {
		DB::query('DELETE FROM %t WHERE type=%d', array($this->_table, $type));
	}

}

?>