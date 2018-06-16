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

function build_cache_attachtype() {
	$attachtypes = C::t('forum_attachtype')->fetch_all_data();
	$data = array();
	foreach($attachtypes as $row) {
		$data[$row['fid']][strtolower($row['extension'])] = $row['maxsize'];
	}

	savecache('attachtype', $data);
}

?>