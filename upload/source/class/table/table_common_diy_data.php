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

class table_common_diy_data extends discuz_table
{
	public function __construct() {

		$this->_table = 'common_diy_data';
		$this->_pk    = '';

		parent::__construct();
	}

	public function fetch($targettplname, $tpldirectory) {
		return !empty($targettplname) ? DB::fetch_first('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('targettplname', $targettplname).' AND '.DB::field('tpldirectory', $tpldirectory)) : array();
	}

	public function delete($targettplname, $tpldirectory = null) {
		foreach($this->fetch_all($targettplname, $tpldirectory) as $value) {
			$file = ($value['tpldirectory'] ? $value['tpldirectory'].'/' : '').$value['targettplname'];
			@unlink(DISCUZ_ROOT.'./data/diy/'.$file.'.htm');
			@unlink(DISCUZ_ROOT.'./data/diy/'.$file.'.htm.bak');
			@unlink(DISCUZ_ROOT.'./data/diy/'.$file.'_diy_preview.htm');
		}
		return DB::delete($this->_table, DB::field('targettplname', $targettplname).($tpldirectory !== null ? ' AND '.DB::field('tpldirectory', $tpldirectory) : ''));
	}

	public function update($targettplname, $tpldirectory, $data) {
		if(!empty($targettplname) && !empty($data) && is_array($data)) {
			return DB::update($this->_table, $data, DB::field('targettplname', $targettplname).' AND '.DB::field('tpldirectory', $tpldirectory));
		}
		return false;
	}

	public function fetch_all($targettplname, $tpldirectory = null) {
		return !empty($targettplname) ? DB::fetch_all('SELECT * FROM '.DB::table($this->_table).' WHERE '.DB::field('targettplname', $targettplname).($tpldirectory !== null ? ' AND '.DB::field('tpldirectory', $tpldirectory) : '')) : array();
	}

	public function count_by_where($wheresql) {
		$wheresql = $wheresql ? ' WHERE '.$wheresql : '';
		return DB::result_first('SELECT COUNT(*) FROM '.DB::table($this->_table).$wheresql);
	}

	public function fetch_all_by_where($wheresql, $ordersql, $start, $limit) {
		$wheresql = $wheresql ? ' WHERE '.$wheresql : '';
		return DB::fetch_all('SELECT * FROM '.DB::table($this->_table).$wheresql.' '.$ordersql.DB::limit($start, $limit), null, $this->_pk ? $this->_pk : '');
	}
}

?>