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

if(!$_G['group']['allowviewip']) {
	showmessage('no_privilege_viewip');
}

$pid = $_GET['pid'];
$member = array();
$post = C::t('forum_post')->fetch('tid:'.$_G['tid'], $pid, false);
if($post && $post['tid'] == $_G['tid']) {
	$member = getuserbyuid($post['authorid']);
	$member = array_merge($post, $member);
}
if(!$member) {
	showmessage('thread_nonexistence', NULL);
} elseif(($member['adminid'] == 1 && $_G['adminid'] > 1) || ($member['adminid'] == 2 && $_G['adminid'] > 2)) {
	showmessage('admin_getip_nopermission', NULL);
}

$member['iplocation'] = convertip($member['useip']);

include template('forum/topicadmin_getip');

?>