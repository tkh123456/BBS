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

if(!in_array($_GET['action'], array('login', 'logout'))) {
	showmessage('undefined_action');
}

$ctl_obj = new logging_ctl();
$ctl_obj->setting = $_G['setting'];
$method = 'on_'.$_GET['action'];
$ctl_obj->template = 'member/login';
$ctl_obj->$method();

?>