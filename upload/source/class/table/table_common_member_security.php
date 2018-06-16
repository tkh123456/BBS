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

class table_common_member_security extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_member_security';
		$this->_pk    = 'securityid';

		parent::__construct();
	}

}

?>