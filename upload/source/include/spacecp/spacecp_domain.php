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

$domainlength = checkperm('domainlength');

if($_G['setting']['allowspacedomain'] && !empty($_G['setting']['domain']['root']['home']) && $domainlength) {
	checklowerlimit('modifydomain');
} else {
	showmessage('no_privilege_spacedomain');
}

if(submitcheck('domainsubmit')) {

	$setarr = array();
	$_POST['domain'] = strtolower(trim($_POST['domain']));
	if($_POST['domain'] != $space['domain']) {

		if(empty($domainlength) || empty($_POST['domain'])) {
			$setarr['domain'] = '';
		} else {
			require_once libfile('function/domain');
			if(domaincheck($_POST['domain'], $_G['setting']['domain']['root']['home'], $domainlength)) {
				$setarr['domain'] = $_POST['domain'];
			}
		}
	}
	if($setarr) {
		updatecreditbyaction('modifydomain');
		C::t('common_member_field_home')->update($_G['uid'], $setarr);
		require_once libfile('function/delete');
		deletedomain($_G['uid'], 'home');
		if(!empty($setarr['domain'])) {
			C::t('common_domain')->insert(array('domain' => $setarr['domain'], 'domainroot' => $_G['setting']['domain']['root']['home'], 'id' => $_G['uid'], 'idtype' => 'home'));
		}
	}

	showmessage('domain_succeed', 'home.php?mod=spacecp&ac=domain');
}

$defaultop = '';
$profilegroup = C::t('common_setting')->fetch('profilegroup', true);

$actives = array('profile' =>' class="a"');
$opactives = array('domain' =>' class="a"');

include_once template("home/spacecp_domain");

?>