<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cron_onlinetime_monthly.php 24402 2011-09-16 12:18:32Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

C::t('common_onlinetime')->update_thismonth();

?>