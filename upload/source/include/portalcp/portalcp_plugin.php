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

$pluginkey = 'portalcp';
$navtitle = $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];

include pluginmodule($_GET['id'], $pluginkey);

include template('portal/portalcp_plugin');

?>