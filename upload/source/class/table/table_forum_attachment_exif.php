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

class table_forum_attachment_exif extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_attachment_exif';
		$this->_pk    = 'aid';

		parent::__construct();
	}

	public function insert($aid, $exif) {
		DB::insert($this->_table, array('aid' => $aid, 'exif' => $exif), false, true, true);
	}

}

?>