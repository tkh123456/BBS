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

C::t('home_notification')->delete_clear(0, 2);
C::t('home_notification')->delete_clear(1, 30);

$deltime = $_G['timestamp'] - 7*3600*24;
C::t('home_pokearchive')->delete_by_dateline($deltime);

C::t('home_notification')->optimize();

?>