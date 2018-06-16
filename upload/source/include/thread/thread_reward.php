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

$bapid = 0;
$rewardprice = abs($_G['forum_thread']['price']);
$dateline = $_G['forum_thread']['dateline'] + 1;
$bestpost = array();
if($_G['forum_thread']['price'] < 0 && $page == 1) {
	foreach($postlist as $key => $post) {
		if($post['dbdateline'] == $dateline) {
			$bapid = $key;
			break;
		}
	}
}

if($bapid) {
	$bestpost = C::t('forum_post')->fetch($posttableid, $bapid);
	$bestpost['message'] = messagecutstr($bestpost['message'], 400);
	$bestpost['avatar'] = avatar($bestpost['authorid'], 'small');
}

?>