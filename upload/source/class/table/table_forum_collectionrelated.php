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

class table_forum_collectionrelated extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_collectionrelated';
		$this->_pk    = 'tid';
		$this->_pre_cache_key = 'forum_collectionrelated_';

		parent::__construct();
	}

	public function update_collection_by_ctid_tid($ctid, $tid, $replace = false) {
		if($replace === false) {
			$ctid .= "\t";
			$collection = 'CONCAT(collection, %s)';
		} else {
			$collection = '%s';
		}

		$result = DB::query('UPDATE %t SET collection='.$collection.' WHERE tid=%d', array($this->_table, $ctid, $tid));
		if($this->_allowmem) {
			$this->clear_cache($tid);
			$this->clear_cache($tid, 'forum_collection_tid_');
		}
		return $result;
	}
}

?>