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

$queryf = C::t('forum_forum')->fetch_all_fids();
foreach($queryf as $forum) {
	$thread = C::t('forum_thread')->fetch_by_fid_displayorder($forum['fid']);
	$lastpost = "$thread[tid]\t$thread[subject]\t$thread[lastpost]\t$thread[lastposter]";

	C::t('forum_forum')->update($forum['fid'], array('lastpost' => $lastpost));
}
?>