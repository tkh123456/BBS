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

$url = '';
if($_G['setting']['domain']['app']['home'] || $_G['setting']['domain']['app']['default']) {
	$domain = '';
	if($_G['setting']['domain']['app']['home']) {
		$domain = $_G['setting']['domain']['app']['home'];
	} else {
		$domain = $_G['setting']['domain']['app']['default'];
	}
	$url = $_G['scheme'].'://'.$domain.$_G['siteport'].'/';
}
$url .= 'home.php?mod=spacecp&ac=search';
if($_GET['srchtxt']) {
	$url .= '&username='.$_GET['srchtxt'].'&searchsubmit=yes';
}

dheader('Location: '.$url);

?>