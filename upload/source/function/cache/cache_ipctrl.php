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

function build_cache_ipctrl() {
	$data = C::t('common_setting')->fetch_all(array('ipregctrl', 'ipverifywhite'));
	savecache('ipctrl', $data);
}

?>