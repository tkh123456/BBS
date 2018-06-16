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

class table_common_seccheck extends discuz_table
{
	private $_uids = array();
	public function __construct() {

		$this->_table = 'common_seccheck';
		$this->_pk    = 'ssid';

		parent::__construct();
	}

	public function delete_expiration($ssid = 0) {
		if($ssid) {
			$ssid = dintval($ssid);
			DB::delete($this->_table, "ssid='$ssid'");
		}
		DB::delete($this->_table, TIMESTAMP."-dateline>600");
		DB::delete($this->_table, "verified>4");
		DB::delete($this->_table, "succeed>1");
	}

	public function update_verified($ssid) {
		DB::query("UPDATE %t SET verified=verified+1 WHERE ssid=%d", array($this->_table, $ssid));
	}

	public function update_succeed($ssid) {
		DB::query("UPDATE %t SET verified=verified+1,succeed=succeed+1 WHERE ssid=%d", array($this->_table, $ssid));
	}

	public function truncate() {
		DB::query("TRUNCATE %t", array($this->_table));
	}

}

?>