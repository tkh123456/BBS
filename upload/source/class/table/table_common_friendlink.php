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

class table_common_friendlink extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_friendlink';
		$this->_pk    = 'id';

		parent::__construct();
	}

	public function fetch_all_by_displayorder($type = '')
	{
		$args = array($this->_table);
		if($type) {
			$sql = 'WHERE (`type` & %s > 0)';
			$args[] = $type;
		}
		return DB::fetch_all("SELECT * FROM %t $sql ORDER BY displayorder", $args, $this->_pk);
	}

}

?>