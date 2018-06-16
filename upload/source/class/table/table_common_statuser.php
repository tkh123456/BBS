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

class table_common_statuser extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_statuser';
		$this->_pk    = '';

		parent::__construct();
	}

	public function check_exists($uid, $daytime, $type) {

		$setarr = array(
			'uid' => intval($uid),
			'daytime' => intval($daytime),
			'type' => $type
		);
		if(DB::result_first('SELECT COUNT(*) FROM '.DB::table($this->_table).' WHERE '.DB::implode_field_value($setarr, ' AND '))) {
			return true;
		} else {
			return false;
		}
	}

	public function clear_by_daytime($daytime) {
		$daytime = intval($daytime);
		DB::delete('common_statuser', "`daytime` != '$daytime'");
	}
}

?>