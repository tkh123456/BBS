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

$maxday = 90;
$deltime = $_G['timestamp'] - $maxday*3600*24;

C::t('home_clickuser')->delete_by_dateline($deltime);

C::t('home_visitor')->delete_by_dateline($deltime);

?>