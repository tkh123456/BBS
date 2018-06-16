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

class table_common_sphinxcounter extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_sphinxcounter';
		$this->_pk    = 'indexid';

		parent::__construct();
	}

}

?>