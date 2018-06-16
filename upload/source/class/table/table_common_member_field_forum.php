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

class table_common_member_field_forum extends discuz_table_archive
{
	public function __construct() {

		$this->_table = 'common_member_field_forum';
		$this->_pk    = 'uid';
		$this->_pre_cache_key = 'common_member_field_forum_';

		parent::__construct();
	}

}

?>