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


$delnum = C::t('forum_announcement')->delete_all_by_endtime($_G['timestamp']);

if($delnum) {
	require_once libfile('function/cache');
	updatecache(array('announcements', 'announcements_forum'));
}

?>