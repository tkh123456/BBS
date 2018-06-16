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

class table_common_word_type extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_word_type';
		$this->_pk    = 'id';

		parent::__construct();
	}
	public function fetch_by_typename($typename) {
		$data = array();
		if(!empty($typename)) {
			$data = DB::fetch_first('SELECT * FROM %t WHERE typename=%s', array($this->_table, $typename), $this->_pk);
		}
		return $data;
	}
	public function fetch_all() {
		return DB::fetch_all('SELECT * FROM %t', array($this->_table), $this->_pk);
	}

}

?>