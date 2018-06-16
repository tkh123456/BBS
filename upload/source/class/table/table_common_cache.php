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

class table_common_cache extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_cache';
		$this->_pk    = 'cachekey';

		parent::__construct();
	}

}

?>