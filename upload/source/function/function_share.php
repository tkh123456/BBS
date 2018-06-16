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

function mkshare($share) {
	$share['body_data'] = unserialize($share['body_data']);

	$searchs = $replaces = array();
	if($share['body_data']) {
		if(isset($share['body_data']['flashaddr'])) {
			$share['body_data']['flashaddr'] = addslashes($share['body_data']['flashaddr']);
		} elseif(isset($share['body_data']['musicvar'])) {
			$share['body_data']['musicvar'] = addslashes($share['body_data']['musicvar']);
		}
		foreach (array_keys($share['body_data']) as $key) {
			$searchs[] = '{'.$key.'}';
			$replaces[] = $share['body_data'][$key];
		}
	}
	$share['body_template'] = str_replace($searchs, $replaces, $share['body_template']);

	return $share;
}
?>