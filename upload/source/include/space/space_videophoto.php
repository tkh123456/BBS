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

if(empty($_G['setting']['verify'][7]['available'])) {
	showmessage('no_open_videophoto');
}

require_once libfile('function/spacecp');
ckvideophoto($space);

$videophoto = getvideophoto($space['videophoto']);

include_once template("home/space_videophoto");

?>