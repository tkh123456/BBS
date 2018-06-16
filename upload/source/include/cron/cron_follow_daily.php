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
$removetime = TIMESTAMP - $_G['setting']['followretainday'] * 86400;

foreach(C::t('home_follow_feed')->fetch_all_by_dateline($removetime, '<=') as $feed) {
	C::t('home_follow_feed')->insert_archiver($feed);
	C::t('home_follow_feed')->delete($feed['feedid']);
}

?>