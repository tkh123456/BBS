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

global $_G;

if(!empty($_GET['fromuid'])) {
	$fromuid = intval($_GET['fromuid']);
	$fromuser = '';
} else {
	$fromuser = $_GET['fromuser'];
	$fromuid = '';
}

if(!$_G['uid'] || !($fromuid == $_G['uid'] || $fromuser == $_G['username'])) {

	if($_G['setting']['creditspolicy']['promotion_visit']) {
		if(!C::t('forum_promotion')->fetch($_G['clientip'])) {
			C::t('forum_promotion')->insert(array('ip' => $_G['clientip'], 'uid' => $fromuid, 'username' => $fromuser), false, true);
			updatecreditbyaction('promotion_visit', $fromuid);
		}
	}

	if($_G['setting']['creditspolicy']['promotion_register']) {
		if(!empty($fromuser) && empty($fromuid)) {
			if(empty($_G['cookie']['promotion'])) {
				$fromuid = C::t('common_member')->fetch_uid_by_username($fromuser);
			} else {
				$fromuid = intval($_G['cookie']['promotion']);
			}
		}
		if($fromuid) {
			dsetcookie('promotion', ($_G['cookie']['promotion'] = $fromuid), 1800);
		}
	}

}

?>