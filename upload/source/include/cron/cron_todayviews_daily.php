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
$updateviews = array();
$deltids = array();
foreach(C::t('forum_threadaddviews')->fetch_all_order_by_tid(500) as $tid => $addview) {
	$deltids[$tid] = $updateviews[$addview['addviews']][] = $tid;
}
if($deltids) {
	C::t('forum_threadaddviews')->delete($deltids);
}
foreach($updateviews as $views => $tids) {
	C::t('forum_thread')->increase($tids, array('views' => $views), true);
}

?>