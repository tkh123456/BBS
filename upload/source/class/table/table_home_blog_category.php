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

class table_home_blog_category extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_blog_category';
		$this->_pk    = 'catid';

		parent::__construct();
	}

	public function fetch_all_by_displayorder() {
		return DB::fetch_all("SELECT * FROM %t ORDER BY displayorder", array($this->_table), $this->_pk);
	}

	public function fetch_all_numkey($numkey) {
		$allow_numkey = array('portal', 'articles', 'num');
		if(!in_array($numkey, $allow_numkey)) {
			return null;
		}
		return DB::fetch_all("SELECT catid, $numkey FROM %t", array($this->_table), $this->_pk);
	}

	public function update_num_by_catid($num, $catid, $numplus = true, $numlimit = false) {
		$args = array($this->_table, $num, $catid);
		if($numlimit !== false) {
			$sql = ' AND num>0';
			$args[] = $numlimit;
		}
		return DB::query("UPDATE %t SET num=".(($numplus) ? 'num+' : '')."%d WHERE catid=%d {$sql}", $args);
	}

	public function fetch_catname_by_catid($catid) {
		return DB::result_first("SELECT catname FROM %t WHERE catid=%d", array($this->_table, $catid));
	}

}

?>