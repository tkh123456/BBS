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

function build_cache_announcements_forum() {
	$data = array();

	$data = C::t('forum_announcement')->fetch_by_displayorder(TIMESTAMP);
	if($data) {
		$memberdata = C::t('common_member')->fetch_uid_by_username($data['author']);
		$data['authorid'] = $memberdata['uid'];
		$data['authorid'] = intval($data['authorid']);
		if(empty($data['type'])) {
			unset($data['message']);
		}
	} else {
		$data = array();
	}
	savecache('announcements_forum', $data);
}

?>