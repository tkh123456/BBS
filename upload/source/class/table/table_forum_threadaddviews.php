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
class table_forum_threadaddviews extends discuz_table {

	public function __construct() {
		$this->_table = 'forum_threadaddviews';
		$this->_pk    = 'tid';
		$this->_pre_cache_key = 'forum_threadaddviews_';
		$this->_cache_ttl = 0;
		parent::__construct();
	}

	public function update_by_tid($tid) {
		$ret = DB::query('UPDATE %t SET `addviews`=`addviews`+1 WHERE tid=%d', array($this->_table, $tid));
		$this->increase_cache(array($tid), array('addviews' => 1));
		return $ret;
	}
	public function fetch_all_order_by_tid($start = 0, $limit = 0) {
		return DB::fetch_all('SELECT * FROM %t ORDER BY tid'.DB::limit($start, $limit), array($this->_table), $this->_pk);
	}
}

?>