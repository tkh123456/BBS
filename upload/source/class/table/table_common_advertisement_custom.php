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

class table_common_advertisement_custom extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_advertisement_custom';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function fetch_all_data() {
		return DB::fetch_all("SELECT * FROM %t ORDER BY id", array($this->_table));
	}

	public function fetch_by_name($name) {
		return DB::fetch_first("SELECT * FROM %t WHERE name=%s", array($this->_table, $name));
	}

	public function get_id_by_name($name) {
		$result = $this->fetch_by_name($name);
		return $result['id'];
	}
}

?>