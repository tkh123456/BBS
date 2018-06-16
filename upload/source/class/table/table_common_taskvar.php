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

class table_common_taskvar extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_taskvar';
		$this->_pk    = 'taskvarid';

		parent::__construct();
	}

	public function fetch_all_by_taskid($taskid, $variable = '') {
		if(!$taskid) {
			return;
		}
		$variable = $variable ? ' AND '.($variable !== 'IS NOT NULL' ? DB::field('variable', $variable) : 'variable IS NOT NULL') : '';
		return DB::fetch_all("SELECT * FROM %t WHERE %i%i", array($this->_table, DB::field('taskid', $taskid), $variable));
	}

	public function get_value_by_taskid($taskid, $variable) {
		$result = $this->fetch_all_by_taskid($taskid, $variable);
		return $result[0]['value'];
	}

	public function update_by_taskid($taskid, $variable, $val) {
		if(!$val || !is_array($val)) {
			return;
		}
		return DB::update($this->_table, $val, array('taskid' => $taskid, 'variable' => $variable), 'UNBUFFERED');
	}

	public function delete_by_taskid($taskid) {
		if(!$taskid) {
			return;
		}
		return DB::delete($this->_table, DB::field('taskid', $taskid));
	}

}

?>