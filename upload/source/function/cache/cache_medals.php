<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cache_medals.php 29236 2012-03-30 05:34:47Z chenmengshu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function build_cache_medals() {
	$data = array();
	foreach(C::t('forum_medal')->fetch_all_data(1) as $medal) {
		$data[$medal['medalid']] = array('name' => $medal['name'], 'image' => $medal['image'], 'description' => dhtmlspecialchars($medal['description']));
	}

	savecache('medals', $data);
}

?>