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

function build_cache_click() {
	$data = $keys = array();
	foreach(C::t('home_click')->fetch_all_by_available() as $value) {
		if(count($data[$value['idtype']]) < 8) {
			$keys[$value['idtype']] = $keys[$value['idtype']] ? ++$keys[$value['idtype']] : 1;
			$data[$value['idtype']][$keys[$value['idtype']]] = $value;
		}
	}

	savecache('click', $data);
}

?>