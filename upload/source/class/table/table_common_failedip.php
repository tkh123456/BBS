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

class table_common_failedip extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_failedip';
		$this->_pk    = '';

		parent::__construct();
	}

	public function get_ip_count($ip, $time) {
		return DB::result_first("SELECT SUM(`count`) FROM %t WHERE ip=%s AND lastupdate>%d", array($this->_table, $ip, $time));
	}

	public function insert_ip($ip) {
		if(DB::result_first("SELECT COUNT(*) FROM %t WHERE ip=%s AND lastupdate=%d", array($this->_table, $ip, TIMESTAMP))) {
			DB::query("UPDATE %t SET `count`=`count`+1 WHERE ip=%s AND lastupdate=%d", array($this->_table, $ip, TIMESTAMP));
		} else {
			DB::query("INSERT INTO %t VALUES (%s, %d, 1)", array($this->_table, $ip, TIMESTAMP));
		}
		DB::query("DELETE FROM %t WHERE lastupdate<%d", array($this->_table, TIMESTAMP - 3600));
	}

}

?>