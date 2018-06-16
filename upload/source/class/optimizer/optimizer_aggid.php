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

class optimizer_aggid {

	public function __construct() {

	}

	public function check() {
		$flag = true;
		$aggid = C::t('common_usergroup_field')->fetch_all(array(1, 2, 3));
		foreach($aggid as $group) {
			if($group['forcelogin'] != 1) {
				$flag = false;
				break;
			}
		}
		if(!$flag) {
			$return = array('status' => 1, 'type' =>'header', 'lang' => lang('optimizer', 'optimizer_aggid_need'));
		} else {
			$return = array('status' => 0, 'type' =>'none', 'lang' => lang('optimizer', 'optimizer_aggid_no_need'));
		}
		return $return;
	}

	public function optimizer() {
		$adminfile = defined(ADMINSCRIPT) ? ADMINSCRIPT : 'admin.php';
		dheader('Location: '.$_G['siteurl'].$adminfile.'?action=setting&operation=accountguard');
	}
}

?>