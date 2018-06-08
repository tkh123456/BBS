<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cache_relatedlink.php 24479 2011-09-21 06:40:33Z liulanbo $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

function build_cache_relatedlink() {
	global $_G;

	$data = array();
	$query = C::t('common_relatedlink')->range();
	foreach($query as $link) {
		if(!(strpos($link['url'], '://'))) {
			$link['url'] = 'http://'.$link['url'];
		}
		$data[] = $link;
	}
	savecache('relatedlink', $data);
}

?>