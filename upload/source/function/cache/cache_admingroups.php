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

function build_cache_admingroups() {
	foreach(C::t('common_admingroup')->range() as $data) {
		savecache('admingroup_'.$data['admingid'], $data);
	}
}

?>