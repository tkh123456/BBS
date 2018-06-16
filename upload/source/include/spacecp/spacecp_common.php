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

$op = empty($_GET['op'])?'':trim($_GET['op']);

if($op == 'ignore') {

	$type = empty($_GET['type'])?'':preg_replace("/[^0-9a-zA-Z\_\-\.]/", '', $_GET['type']);
	if(submitcheck('ignoresubmit')) {
		$authorid = empty($_POST['authorid']) ? 0 : intval($_POST['authorid']);
		if($type) {
			$type_uid = $type.'|'.$authorid;
			if(empty($space['privacy']['filter_note']) || !is_array($space['privacy']['filter_note'])) {
				$space['privacy']['filter_note'] = array();
			}
			$space['privacy']['filter_note'][$type_uid] = $type_uid;
			privacy_update();
		}
		showmessage('do_success', dreferer(), array(), array('showdialog'=>1, 'showmsg' => true, 'closetime' => true));
	}
	$formid = random(8);

} elseif($op == 'closefeedbox') {

	dsetcookie('closefeedbox', 1);

} elseif($op == 'modifyunitprice') {
	$showinfo = C::t('home_show')->fetch($_G['uid']); //DB::fetch_first("SELECT credit, unitprice FROM ".DB::table('home_show')." WHERE uid='$_G[uid]'");
	if(submitcheck('modifysubmit')) {
		$unitprice = intval($_POST['unitprice']);
		if($unitprice < 1) {
			showmessage('showcredit_error', '', array(), array('return' => 1));
		}
		$unitprice = $unitprice > $showinfo['credit'] ? $showinfo['credit'] : $unitprice;
		C::t('home_show')->update($_G['uid'], array('unitprice' => $unitprice));

		showmessage('do_success', dreferer(), array('unitprice' => $unitprice), array('showdialog'=>1, 'showmsg' => true, 'closetime' => true));
	}
}

include template('home/spacecp_common');

?>