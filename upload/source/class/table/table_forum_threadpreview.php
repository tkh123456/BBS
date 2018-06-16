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
class table_forum_threadpreview extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_threadpreview';
		$this->_pk    = 'tid';

		parent::__construct();
	}
	public function count_by_tid($tid) {
		return DB::result_first('SELECT COUNT(*) FROM %t WHERE tid=%d', array($this->_table, $tid));
	}
	public function update_relay_by_tid($tid, $value) {
		return DB::query('UPDATE %t SET relay=relay+\'%d\' WHERE tid=%d', array($this->_table, $value, $tid));
	}
	public function delete_by_tid($tids) {
		return DB::delete($this->_table, DB::field('tid', $tids));
	}
}
?>