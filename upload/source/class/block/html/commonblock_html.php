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

class commonblock_html  extends discuz_block{

	function fields() {
		return array();
	}

	function blockclass() {
		return array('html', lang('blockclass', 'blockclass_html_html'));
	}

}