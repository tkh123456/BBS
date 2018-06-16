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

function build_cache_focus() {
	$data = array();

	$focus = C::t('common_setting')->fetch('focus', true);
	$data['title'] = $focus['title'];
	$data['cookie'] = intval($focus['cookie']);
	$data['data'] = array();
	if(is_array($focus['data'])) foreach($focus['data'] as $k => $v) {
		if($v['available']) {
			$data['data'][$k] = $v;
		}
	}

	savecache('focus', $data);
}

?>