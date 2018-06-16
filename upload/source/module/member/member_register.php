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

define('NOROBOT', TRUE);

$ctl_obj = new register_ctl();
$ctl_obj->setting = $_G['setting'];
$ctl_obj->template = 'member/register';
$ctl_obj->on_register();

?>