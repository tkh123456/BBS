<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cron_member_optimize_daily.php 28623 2012-03-06 09:01:58Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
C::t('common_member')->split(100);

?>