<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cron_security_daily.php 29568 2012-04-19 03:39:25Z songlixin $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

C::t('#security#security_failedlog')->optimize();