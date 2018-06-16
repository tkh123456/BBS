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

function build_cache_domainwhitelist() {

	$data = C::t('common_setting')->fetch('domainwhitelist');
	$data = $data ? explode("\r\n", $data) : array();
	savecache('domainwhitelist', $data);
}

?>