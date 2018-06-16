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

function build_cache_magics() {
	$data = array();
	foreach(C::t('common_magic')->fetch_all_data(1) as $magic) {
		$data[$magic['magicid']] = $magic;
	}

	savecache('magics', $data);
}

?>