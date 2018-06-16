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

class table_common_relatedlink extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_relatedlink';
		$this->_pk    = 'id';

		parent::__construct();
	}

}

?>