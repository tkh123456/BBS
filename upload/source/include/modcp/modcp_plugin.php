<?php

/**
 * 这里是注释
 *   
 *
 *       *
 */

if(!defined('IN_DISCUZ') || !defined('IN_MODCP')) {
	exit('Access Denied');
}

$modtpl = $_GET['id'];

include pluginmodule($_GET['id'], 'modcp_'.$op);

?>