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

class table_forum_attachment_unused extends discuz_table
{
	public function __construct() {

		$this->_table = 'forum_attachment_unused';
		$this->_pk    = 'aid';

		parent::__construct();
	}

	public function clear() {
		require_once libfile('function/forum');
		$delaids = array();
		$query = DB::query("SELECT aid, attachment, thumb FROM %t WHERE %i", array($this->_table, DB::field('dateline', TIMESTAMP - 86400)));
		while($attach = DB::fetch($query)) {
			dunlink($attach);
			$delaids[] = $attach['aid'];
		}
		if($delaids) {
			DB::query("DELETE FROM %t WHERE %i", array('forum_attachment', DB::field('aid', $delaids)), false, true);
			DB::query("DELETE FROM %t WHERE %i", array($this->_table, DB::field('dateline', TIMESTAMP - 86400)), false, true);
		}
	}

}

?>