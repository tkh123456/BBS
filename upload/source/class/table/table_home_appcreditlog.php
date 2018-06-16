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

class table_home_appcreditlog extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_appcreditlog';
		$this->_pk    = 'logid';

		parent::__construct();
	}

}

?>