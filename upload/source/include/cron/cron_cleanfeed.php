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

if($_G['setting']['feedday'] < 3) $_G['setting']['feedday'] = 3;
$deltime = $_G['timestamp'] - $_G['setting']['feedday']*3600*24;
$f_deltime = $_G['timestamp'] - $_G['setting']['feedday']*3600*24;

C::t('home_feed')->delete_by_dateline($deltime);
C::t('home_feed_app')->delete_by_dateline($f_deltime);
C::t('home_feed')->optimize_table();
C::t('home_feed_app')->optimize_table();

?>