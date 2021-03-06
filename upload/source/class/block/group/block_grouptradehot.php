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

require_once libfile('block_grouptrade', 'class/block/group');

class block_grouptradehot extends block_grouptrade {
	function block_grouptradehot() {
		$this->setting = array(
			'gtids' => array(
				'title' => 'grouptrade_gtids',
				'type' => 'mselect',
				'value' => array(
				),
			),
			'orderby' => array(
				'title' => 'grouptrade_orderby',
				'type'=> 'mradio',
				'value' => array(
					array('todayhots', 'grouptrade_orderby_todayhots'),
					array('weekhots', 'grouptrade_orderby_weekhots'),
					array('monthhots', 'grouptrade_orderby_monthhots'),
				),
				'default' => 'weekhots'
			),
			'gviewperm' => array(
				'title' => 'grouptrade_gviewperm',
				'type' => 'mradio',
				'value' => array(
					array('0', 'grouptrade_gviewperm_only_member'),
					array('1', 'grouptrade_gviewperm_all_member')
				),
				'default' => '1'
			),
			'titlelength' => array(
				'title' => 'grouptrade_titlelength',
				'type' => 'text',
				'default' => 40
			),
			'summarylength' => array(
				'title' => 'grouptrade_summarylength',
				'type' => 'text',
				'default' => 80
			),
			'startrow' => array(
				'title' => 'grouptrade_startrow',
				'type' => 'text',
				'default' => 0
			),
		);
	}

	function name() {
		return lang('blockclass', 'blockclass_grouptrade_script_grouptradehot');
	}
}

?>