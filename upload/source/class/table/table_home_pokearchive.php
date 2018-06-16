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

class table_home_pokearchive extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_pokearchive';
		$this->_pk    = 'pid';

		parent::__construct();
	}

	public function fetch_all_by_pokeuid($pokeuid) {
		return DB::fetch_all('SELECT * FROM %t WHERE pokeuid=%d ORDER BY dateline', array($this->_table, $pokeuid));
	}
	public function delete_by_dateline($dateline) {
		DB::query('DELETE FROM %t WHERE dateline<%d', array($this->_table, $dateline));
	}

}

?>