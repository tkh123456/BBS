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

function build_cache_founder() {
	global $_G;

	$allowadmincp = $status0 = $status1 = array();
	$founders = explode(',', str_replace(' ', '', $_G['config']['admincp']['founder']));
	if($founders) {
		foreach($founders as $founder) {
			if(is_numeric($founder)) {
				$fuid[] = $founder;
			} else {
				$fuser[] = $founder;
			}
		}
		if($fuid) {
			$allowadmincp = C::t('common_member')->fetch_all($fuid, false, 0);
		}
		if($fuser) {
			$allowadmincp = $allowadmincp + C::t('common_member')->fetch_all_by_username($fuser);
		}
	}
	$allowadmincp = $allowadmincp + C::t('common_admincp_member')->range();

	$allallowadmincp = C::t('common_member')->fetch_all_by_allowadmincp('0', '>') + C::t('common_member')->fetch_all(array_keys($allowadmincp), false, 0);
	foreach($allallowadmincp as $uid => $user) {
		if(isset($allowadmincp[$uid]) && !getstatus($user['allowadmincp'], 1)) {
			$status1[$uid] = $uid;
		} elseif(!isset($allowadmincp[$uid]) && getstatus($user['allowadmincp'], 1)) {
			$status0[$uid] = $uid;
		}
	}
	if(!empty($status0)) {
		C::t('common_member')->clean_admincp_manage($status0);
	}
	if(!empty($status1)) {
		C::t('common_member')->update_admincp_manage($status1);
	}

}

?>