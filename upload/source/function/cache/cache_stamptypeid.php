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

function build_cache_stamptypeid() {
	$data = array();

	foreach(C::t('common_smiley')->fetch_all_by_type('stamp') as $stamp) {
		if($stamp['typeid'] < 0) {
			continue;
		}
		$data[$stamp['typeid']] = $stamp['displayorder'];
	}

	savecache('stamptypeid', $data);
}

?>