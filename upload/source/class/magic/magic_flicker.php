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

class magic_flicker {
	var $version = '1.0';
	var $name = 'flicker_name';
	var $description = 'flicker_desc';
	var $price = '20';
	var $weight = '20';
	var $useevent = 0;
	var $targetgroupperm = false;
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $magic = array();
	var $parameters = array();

	function getsetting(&$magic) {}

	function setsetting(&$magicnew, &$parameters) {}

	function usesubmit() {
		global $_G;

		C::t('home_comment')->update($_GET['id'], array('magicflicker' => 1), $_G['uid']);
		usemagic($this->magic['magicid'], $this->magic['num']);
		updatemagiclog($this->magic['magicid'], '2', '1', '0');
		showmessage(lang('magic/flicker', 'flicker_succeed'), dreferer(), array(), array('alert' => 'right', 'showdialog' => 1, 'closetime' => true, 'locationtime' => true));
	}

	function show() {
		global $_G;
		magicshowtips(lang('magic/flicker', 'flicker_info'));
	}
}

?>