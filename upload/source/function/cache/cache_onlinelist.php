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

function build_cache_onlinelist() {
	$data = array();
	$data['legend'] = '';
	foreach(C::t('forum_onlinelist')->fetch_all_order_by_displayorder() as $list) {
		$data[$list['groupid']] = $list['url'];
		$data['legend'] .= !empty($list['url']) ? "<img src=\"".STATICURL."image/common/$list[url]\" /> $list[title] &nbsp; &nbsp; &nbsp; " : '';
		if($list['groupid'] == 7) {
			$data['guest'] = $list['title'];
		}
	}

	savecache('onlinelist', $data);
}

?>