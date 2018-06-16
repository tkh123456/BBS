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

function build_cache_groupicon() {
	$data = array();
	foreach(C::t('forum_onlinelist')->fetch_all_order_by_displayorder() as $list) {
		if($list['url']) {
			$data[$list['groupid']] = STATICURL.'image/common/'.$list['url'];
		}
	}

	savecache('groupicon', $data);
}

?>