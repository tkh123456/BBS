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

function build_cache_modreasons() {
	$settings = C::t('common_setting')->fetch_all(array('modreasons', 'userreasons'));
	foreach($settings as $key => $data) {
		$data = str_replace(array("\r\n", "\r"), array("\n", "\n"), $data);
		$data = explode("\n", trim($data));
		savecache($key, $data);
	}
}

?>