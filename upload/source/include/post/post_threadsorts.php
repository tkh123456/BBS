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

require_once libfile('function/threadsort');

threadsort_checkoption($sortid);
$forum_optionlist = getsortedoptionlist();

loadcache(array('threadsort_option_'.$sortid, 'threadsort_template_'.$sortid));
$sqlarr = array();
foreach($_G['cache']['threadsort_option_'.$sortid] AS $key => $val) {
	if($val['profile']) {
		$sqlarr[] = $val['profile'];
	}
}
if($sqlarr) {
	$member_profile = array();
	$_member_profile = C::t('common_member_profile')->fetch($_G['uid']);
	foreach($sqlarr as $val) {
		$member_profile[$val] = $_member_profile[$val];
	}
	unset($_member_profile);
}
threadsort_optiondata($pid, $sortid, $_G['cache']['threadsort_option_'.$sortid], $_G['cache']['threadsort_template_'.$sortid]);



?>