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

function build_cache_ipbanned() {
	C::t('common_banned')->delete_by_expiration(TIMESTAMP);
	$data = array();
	$bannedarr = C::t('common_banned')->fetch_all();
	if(!empty($bannedarr)) {
		$data['expiration'] = 0;
		$data['regexp'] = $separator = '';
	}
	foreach($bannedarr as $banned) {
		$data['expiration'] = !$data['expiration'] || $banned['expiration'] < $data['expiration'] ? $banned['expiration'] : $data['expiration'];
		$data['regexp'] .= $separator.
			($banned['ip1'] == '-1' ? '\\d+\\.' : $banned['ip1'].'\\.').
			($banned['ip2'] == '-1' ? '\\d+\\.' : $banned['ip2'].'\\.').
			($banned['ip3'] == '-1' ? '\\d+\\.' : $banned['ip3'].'\\.').
			($banned['ip4'] == '-1' ? '\\d+' : $banned['ip4']);
		$separator = '|';
	}

	savecache('ipbanned', $data);
}

?>