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

function build_cache_profilesetting() {
	$data = C::t('common_member_profile_setting')->fetch_all_by_available(1);

	savecache('profilesetting', $data);
}

?>