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

class table_home_picfield extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_picfield';
		$this->_pk    = 'picid';

		parent::__construct();
	}

}

?>