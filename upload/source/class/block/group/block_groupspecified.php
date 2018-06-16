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

require_once libfile('block_group', 'class/block/group');

class block_groupspecified extends block_group {

	function block_groupspecified() {
		$this->setting = array(
			'fids' => array(
				'title' => 'grouplist_fids',
				'type' => 'text'
			),
			'titlelength' => array(
				'title' => 'grouplist_titlelength',
				'type' => 'text',
				'default' => 40
			),
			'summarylength'	=> array(
				'title' => 'grouplist_summarylength',
				'type' => 'text',
				'default' => 80
			)
		);
	}

	function name() {
		return lang('blockclass', 'blockclass_group_script_groupspecified');
	}
}

?>