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

require_once libfile('block_pic', 'class/block/space');

class block_picspecified extends block_pic {
	function block_picspecified() {
		$this->setting = array(
			'picids'	=> array(
				'title' => 'piclist_picids',
				'type' => 'text',
				'value' => ''
			),
			'uids'	=> array(
				'title' => 'piclist_uids',
				'type' => 'text',
				'value' => ''
			),
			'aids'	=> array(
				'title' => 'piclist_aids',
				'type' => 'text',
				'value' => ''
			),
			'titlelength' => array(
				'title' => 'piclist_titlelength',
				'type' => 'text',
				'default' => 40
			)
		);
	}

	function name() {
		return lang('blockclass', 'blockclass_pic_script_picspecified');
	}
}

?>