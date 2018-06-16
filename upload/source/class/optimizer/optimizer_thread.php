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

class optimizer_thread {

	public function __construct() {

	}

	public function check() {
		$return = array();
		$status = helper_dbtool::gettablestatus(DB::table('forum_thread'), false);
		if($status && $status['Data_length'] > 400 * 1048576) {
			$return = array('status' => '1','type' => 'header', 'lang' => lang('optimizer', 'optimizer_thread_need_optimizer'));
		} else {
			$return = array('status' => '0', 'type' => 'header', 'lang' => lang('optimizer', 'optimizer_thread_no_need'));
		}
		return $return;
	}

	public function optimizer() {
		$adminfile = defined(ADMINSCRIPT) ? ADMINSCRIPT : 'admin.php';
		dheader('Location: '.$_G['siteurl'].$adminfile.'?action=postsplit&operation=manage');
	}
}

?>