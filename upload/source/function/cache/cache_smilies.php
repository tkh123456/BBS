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

function build_cache_smilies() {
	$data = array();

	$data = array('searcharray' => array(), 'replacearray' => array(), 'typearray' => array());
	foreach(C::t('common_smiley')->fetch_all_cache() as $smiley) {
		$data['searcharray'][$smiley['id']] = '/'.preg_quote(dhtmlspecialchars($smiley['code']), '/').'/';
		$data['replacearray'][$smiley['id']] = $smiley['url'];
		$data['typearray'][$smiley['id']] = $smiley['typeid'];
	}

	savecache('smilies', $data);
}

?>