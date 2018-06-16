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

class magic_friendnum {

	var $version = '1.0';
	var $name = 'friendnum_name';
	var $description = 'friendnum_desc';
	var $price = '20';
	var $weight = '20';
	var $useevent = 0;
	var $targetgroupperm = false;
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $magic = array();
	var $parameters = array();

	function getsetting(&$magic) {
		$settings = array(
			'addnum' => array(
				'title' => 'friendnum_addnum',
				'type' => 'select',
				'value' => array(
					array('5', '5'),
					array('10', '10'),
					array('20', '20'),
					array('50', '50'),
				),
				'default' => '10'
			),
		);
		return $settings;
	}

	function setsetting(&$magicnew, &$parameters) {
		$magicnew['addnum'] = in_array($parameters['addnum'], array(5,10,20,50)) ? intval($parameters['addnum']) : '10';
	}

	function usesubmit() {
		global $_G;

		$addnum = !empty($this->parameters['addnum']) ? intval($this->parameters['addnum']) : 10;
		C::t('common_member_field_home')->increase($_G['uid'], array('addfriend' => $addnum));
		usemagic($this->magic['magicid'], $this->magic['num']);
		updatemagiclog($magic['magicid'], '2', '1', '0', '0', 'uid', $_G['uid']);
		showmessage('magics_friendadd_message', '', array('num'=>intval($this->parameters['addnum'])), array('alert' => 'right', 'showdialog' => 1));
	}

	function show() {
		magicshowtips(lang('magic/friendnum', 'friendnum_info', array('num'=>intval($this->parameters['addnum']))));
	}

}

?>