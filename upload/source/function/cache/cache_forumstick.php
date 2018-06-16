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

function build_cache_forumstick() {
	$data = array();
	$forumstickthreads = C::t('common_setting')->fetch('forumstickthreads', true);
	$forumstickcached = array();
	if($forumstickthreads) {
		foreach($forumstickthreads as $forumstickthread) {
			foreach($forumstickthread['forums'] as $fid) {
				$forumstickcached[$fid][] = $forumstickthread['tid'];
			}
		}
		$data = $forumstickcached;
	} else {
		$data = array();
	}

	savecache('forumstick', $data);
}

?>