<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: cron_cleanup_monthly.php 26922 2011-12-27 10:00:36Z svn_project_zhangjie $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


C::t('common_mytask')->delete_exceed(2592000);

?>