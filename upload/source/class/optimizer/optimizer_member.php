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

class optimizer_member {

	public function __construct() {

	}

	public function check() {
		global $_G, $lang;
		loadcache(array('membersplitdata', 'userstats'));
		$membercount = $_G['cache']['userstats']['totalmembers'];

		if($membercount < 20000) {
			$color = 'green';
			$msg = $lang['membersplit_without_optimization'];
		} else {
			$color = empty($_G['cache']['membersplitdata']) || $_G['cache']['membersplitdata']['dateline'] < TIMESTAMP - 86400*10 ?
				'red' : 'green';
			$msg = empty($_G['cache']['membersplitdata']) ? $lang['membersplit_has_no_check'] : dgmdate($_G['cache']['membersplitdata']['dateline']);
		}
		return array('status' => ($color == 'red' ? 1 : 0), 'type' => 'header', 'lang' => $msg);
	}

	public function optimizer() {
		$adminfile = defined(ADMINSCRIPT) ? ADMINSCRIPT : 'admin.php';
		dheader('Location: '.$_G['siteurl'].$adminfile.'?action=membersplit');
	}
}

?>