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

class table_home_click extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_click';
		$this->_pk    = 'clickid';

		parent::__construct();
	}

	public function fetch_all_by_idtype($idtype) {
		return DB::fetch_all('SELECT * FROM %t WHERE idtype=%s ORDER BY displayorder DESC', array($this->_table, $idtype), $this->_pk);
	}

	public function fetch_all_by_available($available = 1) {
		return DB::fetch_all('SELECT * FROM %t WHERE available=%d ORDER BY displayorder DESC', array($this->_table, $available), $this->_pk);
	}

}

?>