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

define('NOROBOT', TRUE);

$ctl_obj = new register_ctl();
$ctl_obj->setting = $_G['setting'];
$ctl_obj->template = 'member/register';
$ctl_obj->on_register();

?>