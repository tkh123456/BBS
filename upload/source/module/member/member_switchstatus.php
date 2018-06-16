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

if($_G['uid']) {

	if(!$_G['group']['allowinvisible']) {
		showmessage('group_nopermission', NULL, array('grouptitle' => $_G['group']['grouptitle']), array('login' => 1));
	}

	$_G['session']['invisible'] = $_G['session']['invisible'] ? 0 : 1;
	C::app()->session->update_by_uid($_G['uid'], array('invisible' => $_G['session']['invisible']));
	C::t('common_member_status')->update($_G['uid'], array('invisible' => $_G['session']['invisible']), 'UNBUFFERED');
	if(!empty($_G['setting']['sessionclose'])) {
		dsetcookie('ulastactivity', TIMESTAMP.'|'.getuserprofile('invisible'), 31536000);
	}
	$language = lang('forum/misc');
	$msg = $_G['session']['invisible'] ? $language['login_invisible_mode'] : $language['login_normal_mode'];
	showmessage('<a href="member.php?mod=switchstatus" title="'.$language['login_switch_invisible_mode'].'" onclick="ajaxget(this.href, \'loginstatus\');return false;" class="xi2">'.$msg.'</a>', dreferer(), array(), array('msgtype' => 3, 'showmsg' => 1));

}

?>