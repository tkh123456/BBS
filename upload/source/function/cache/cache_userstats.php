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

function build_cache_userstats() {
	global $_G;
	$totalmembers = C::t('common_member')->count();
	$member = C::t('common_member')->range(0, 1, 'DESC');
	$member = current($member);
	$newsetuser = $member['username'];
	$data = array('totalmembers' => $totalmembers, 'newsetuser' => $newsetuser);
	if($_G['setting']['plugins']['func'][HOOKTYPE]['cacheuserstats']) {
		$_G['userstatdata'] = & $data;
		hookscript('cacheuserstats', 'global', 'funcs', array(), 'cacheuserstats');
	}
	savecache('userstats', $data);
}

?>