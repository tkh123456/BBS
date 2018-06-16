<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *       *
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_forum_creditslog extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_creditslog';
		$this->_pk    = '';

		parent::__construct();
	}

}

?>