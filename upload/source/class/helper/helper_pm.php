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

class helper_pm {


	public static function sendpm($toid, $subject, $message, $fromid = '', $replypmid = 0, $isusername = 0, $type = 0) {
		global $_G;
		if($fromid === '') {
			$fromid = $_G['uid'];
		}
		$author = '';
		if($fromid) {
			if($fromid == $_G['uid']) {
				$sendpmmaxnum = $_G['group']['allowsendpmmaxnum'];
				$author = $_G['username'];
			} else {
				$user = getuserbyuid($fromid);
				$author = $user['username'];
				loadcache('usergroup_'.$user['groupid']);
				$sendpmmaxnum = $_G['cache']['usergroup_'.$user['groupid']]['allowsendpmmaxnum'];
			}
			$currentnum = C::t('common_member_action_log')->count_day_hours(getuseraction('pmid'), $fromid);
			if($sendpmmaxnum && $currentnum >= $sendpmmaxnum) {
				return -16;
			}
		}

		loaducenter();
		$return = uc_pm_send($fromid, $toid, addslashes($subject), addslashes($message), 1, $replypmid, $isusername, $type);
		if($return > 0 && $fromid) {
			foreach(explode(',', $fromid) as $v) {
				useractionlog($fromid, 'pmid');
			}
		}

		return $return;
	}
}

?>