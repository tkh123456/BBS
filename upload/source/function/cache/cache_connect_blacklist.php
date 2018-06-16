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

function build_cache_connect_blacklist() {
	global $_G;
	$data = array();

	foreach(C::t('common_uin_black')->fetch_all_by_uin() as $blacklist) {
		$data[] = $blacklist['uin'];
	}

	savecache('connect_blacklist', $data);
}

?>