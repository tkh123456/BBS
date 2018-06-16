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

function build_cache_split() {
	global $_G;
	$splitcaches = array('threadtableids', 'threadtable_info', 'posttable_info', 'posttableids');
	foreach($splitcaches as $splitcache) {
		loadcache($splitcache);
		if(empty($_G['cache'][$splitcache])) {
			savecache($splitcache, '');
		}
	}
}

?>