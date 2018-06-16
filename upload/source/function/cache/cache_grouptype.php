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

function build_cache_grouptype() {
	$data = array();
	$query = C::t('forum_forum')->fetch_all_group_type(1);
	$data['second'] = $data['first'] = array();
	foreach($query as $group) {
		if($group['type'] == 'forum') {
			$data['second'][$group['fid']] = $group;
		} else {
			$data['first'][$group['fid']] = $group;
		}
	}
	foreach($data['second'] as $fid => $secondgroup) {
		$data['first'][$secondgroup['fup']]['groupnum'] += $secondgroup['groupnum'];
		$data['first'][$secondgroup['fup']]['secondlist'][] = $secondgroup['fid'];
	}
	savecache('grouptype', $data);
}

?>