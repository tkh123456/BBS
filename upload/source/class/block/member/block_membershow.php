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

require_once libfile('block_member', 'class/block/member');

class block_membershow extends block_member {
	function block_membershow() {
		$this->setting = array(
			'startrow' => array(
				'title' => 'memberlist_startrow',
				'type' => 'text',
				'default' => 0
			),
		);
	}

	function cookparameter($parameter) {
		$parameter['orderby'] = 'show';
		return parent::cookparameter($parameter);
	}

	function name() {
		return lang('blockclass', 'blockclass_member_script_membershow');
	}
}

?>