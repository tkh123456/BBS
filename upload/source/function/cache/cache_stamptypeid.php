<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cache_stamptypeid.php 24968 2011-10-19 09:51:28Z zhengqingpeng $
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