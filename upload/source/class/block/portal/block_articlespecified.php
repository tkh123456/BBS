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

require_once libfile('block_article', 'class/block/portal');

class block_articlespecified extends block_article {
	function block_articlespecified() {
		$this->setting = array(
			'aids'	=> array(
				'title' => 'articlelist_aids',
				'type' => 'text',
				'value' => ''
			),
			'uids'	=> array(
				'title' => 'articlelist_uids',
				'type' => 'text',
				'value' => ''
			),
			'tag' => array(
				'title' => 'articlelist_tag',
				'type' => 'mcheckbox',
				'value' => array(
				),
			),
			'starttime' => array(
				'title' => 'articlelist_starttime',
				'type' => 'calendar',
				'default' => ''
			),
			'endtime' => array(
				'title' => 'articlelist_endtime',
				'type' => 'calendar',
				'default' => ''
			),
			'titlelength' => array(
				'title' => 'articlelist_titlelength',
				'type' => 'text',
				'default' => 40
			),
			'summarylength'	=> array(
				'title' => 'articlelist_summarylength',
				'type' => 'text',
				'default' => 80
			)
		);
	}

	function name() {
		return lang('blockclass', 'blockclass_article_script_articlespecified');
	}

}

?>