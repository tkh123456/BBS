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

if(!$_G['group']['allowlivethread']) {
	showmessage('no_privilege_livethread');
}

if(!submitcheck('modsubmit')) {

	include template('forum/topicadmin_action');

} else {

	$modaction = $_GET['live'] ? 'LIV' : 'LIC';
	$reason = checkreasonpm();
	$expiration = $_GET['expirationlive'] ? dintval($_GET['expirationlive']) : 0;

	if($modaction == 'LIV') {
		C::t('forum_forumfield')->update($_G['fid'], array('livetid' => $_G['tid']));
	} elseif($modaction == 'LIC') {
		if($_G['tid'] != $_G['forum']['livetid']) {
			showmessage('topicadmin_live_noset_error');
		}
		C::t('forum_forumfield')->update($_G['fid'], array('livetid' => 0));
	}

	$resultarray = array(
	'redirect'	=> "forum.php?mod=viewthread&tid=$_G[tid]&page=$page",
	'reasonpm'	=> ($sendreasonpm ? array('data' => array($thread), 'var' => 'thread', 'notictype' => 'post', 'item' => $_GET['live'] ? 'reason_live_update' : 'reason_live_cancle') : array()),
	'reasonvar'	=> array('tid' => $thread['tid'], 'subject' => $thread['subject'], 'modaction' => $modaction, 'reason' => $reason),
	'modaction'	=> $modaction,
	'modlog'	=> $thread
	);
	$modpostsnum = 1;

	updatemodlog($_G['tid'], $modaction, $expiration, 0, '', $modaction == 'LIV' ? 1 : 0);

}

?>