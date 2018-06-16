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

function build_cache_grouplevels() {
	$data = array();
	$query = C::t('forum_grouplevel')->range();
	foreach($query as $level) {
		$level['creditspolicy'] = unserialize($level['creditspolicy']);
		$level['postpolicy'] = unserialize($level['postpolicy']);
		$level['specialswitch'] = unserialize($level['specialswitch']);
		$data[$level['levelid']] = $level;
	}

	savecache('grouplevels', $data);
}

?>