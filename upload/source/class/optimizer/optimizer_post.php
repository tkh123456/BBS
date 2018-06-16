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

class optimizer_post {

	public function __construct() {

	}

	public function check() {
		global $_G;
		loadcache('posttable_info');

		$count = 0;
		$posttableids = array_keys($_G['cache']['posttable_info']);
		foreach ($posttableids as $id) {
			$table = empty($id) ? 'forum_post' : (is_numeric($id) ? 'forum_post_'.$id : $id);
			$status = helper_dbtool::gettablestatus(DB::table($table), false);
			if($status && $status['Data_length'] > 400 * 1048576) {
				$count++;
			}
		}
		if($count) {
			$return = array('status' => '1','type' => 'header', 'lang' => lang('optimizer', 'optimizer_post_need_split', array('count' => $count)));
		} else {
			$return = array('status' => '0', 'type' => 'header', 'lang' => lang('optimizer', 'optimizer_post_not_need'));
		}
		return $return;
	}

	public function optimizer() {
		$adminfile = defined(ADMINSCRIPT) ? ADMINSCRIPT : 'admin.php';
		dheader('Location: '.$_G['siteurl'].$adminfile.'?action=postsplit');
	}
}

?>