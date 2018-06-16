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

class table_forum_debate extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_debate';
		$this->_pk    = 'tid';

		parent::__construct();
	}

	public function update_voters($tid, $uid, $stand) {
		if($stand == 1) {
			DB::query("UPDATE %t SET affirmvotes=affirmvotes+1, affirmvoterids=CONCAT(affirmvoterids, '%d\t') WHERE tid=%d", array($this->_table, $uid, $tid));
		} elseif($stand == 2) {
			DB::query("UPDATE %t SET negavotes=negavotes+1, negavoterids=CONCAT(negavoterids, '%d\t') WHERE tid=%d", array($this->_table, $uid, $tid));
		}
	}

	public function update_debaters($tid, $stand) {
		if($stand == 1) {
			DB::query("UPDATE %t SET affirmdebaters=affirmdebaters+1 WHERE tid=%d", array($this->_table, $tid));
		} elseif($stand == 2) {
			DB::query("UPDATE %t SET negadebaters=negadebaters+1 WHERE tid=%d", array($this->_table, $tid));
		}
	}

	public function update_replies($tid, $stand) {
		if($stand == 1) {
			DB::query("UPDATE %t SET affirmreplies=affirmreplies+1 WHERE tid=%d", array($this->_table, $tid));
		} elseif($stand == 2) {
			DB::query("UPDATE %t SET negareplies=negareplies+1 WHERE tid=%d", array($this->_table, $tid));
		}
	}
	public function delete_by_tid($tids) {
		if(!$tids) {
			return;
		}
		return DB::delete($this->_table, DB::field('tid', $tids));
	}

}

?>