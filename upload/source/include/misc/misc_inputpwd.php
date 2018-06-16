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

if(submitcheck('pwdsubmit')) {

	$blogid = empty($_POST['blogid'])?0:intval($_POST['blogid']);
	$albumid = empty($_POST['albumid'])?0:intval($_POST['albumid']);

	$itemarr = array();
	if($blogid) {
		$itemarr = C::t('home_blog')->fetch($blogid);
		$itemurl = "home.php?mod=space&uid=$itemarr[uid]&do=blog&id=$itemarr[blogid]";
		$cookiename = 'view_pwd_blog_'.$blogid;
	} elseif($albumid) {
		$itemarr = C::t('home_album')->fetch($albumid);
		$itemurl = "home.php?mod=space&uid=$itemarr[uid]&do=album&id=$itemarr[albumid]";
		$cookiename = 'view_pwd_album_'.$albumid;
	}

	if(empty($itemarr)) {
		showmessage('news_does_not_exist');
	}

	if($itemarr['password'] && $_POST['viewpwd'] == $itemarr['password']) {
		dsetcookie($cookiename, md5(md5($itemarr['password'])));
		showmessage('proved_to_be_successful', $itemurl, array('succeed'=>1), array('showmsg'=>1, 'timeout'=>1));
	} else {
		showmessage('password_is_not_passed', $itemurl, array('succeed'=>0), array('showmsg'=>1));
	}
}

?>