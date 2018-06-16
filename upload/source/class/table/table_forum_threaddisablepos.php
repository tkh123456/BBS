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
class table_forum_threaddisablepos extends discuz_table {

	public function __construct() {
		$this->_table = 'forum_threaddisablepos';
		$this->_pk    = 'tid';
		$this->_pre_cache_key = 'forum_threaddisablepos_';
		$this->_cache_ttl = 0;
		parent::__construct();
	}
	public function truncate() {
		DB::query("TRUNCATE ".DB::table('forum_threaddisablepos'));
	}
}

?>