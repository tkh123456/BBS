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

class table_portal_rsscache extends discuz_table
{
	public function __construct() {

		$this->_table = 'portal_rsscache';
		$this->_pk    = 'aid';

		parent::__construct();
	}

	public function fetch_all_by_catid($catid, $limit = 20) {
		return $catid ? DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('catid', $catid).' ORDER BY dateline DESC LIMIT '.dintval($limit), null, 'aid') : array();
	}
}

?>