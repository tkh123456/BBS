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

class optimizer_newbiespan {

	public function __construct() {

	}

	public function check() {
		$newbiespan = C::t('common_setting')->fetch('newbiespan');
		if($newbiespan) {
			$return = array('status' => 0, 'type' =>'none', 'lang' => lang('optimizer', 'optimizer_newbiespan_no_need'));
		} else {
			$return = array('status' => 1, 'type' =>'header', 'lang' => lang('optimizer', 'optimizer_newbiespan_need'));
		}
		return $return;
	}

	public function optimizer() {
		$adminfile = defined(ADMINSCRIPT) ? ADMINSCRIPT : 'admin.php';
		dheader('Location: '.$_G['siteurl'].$adminfile.'?action=setting&operation=access');
	}
}

?>