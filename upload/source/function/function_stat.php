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

function updatestat($type, $primary=0, $num=1) {
	$uid = getglobal('uid');
	$updatestat = getglobal('setting/updatestat');
	if(empty($uid) || empty($updatestat)) return false;
	C::t('common_stat')->updatestat($uid, $type, $primary, $num);
}

?>