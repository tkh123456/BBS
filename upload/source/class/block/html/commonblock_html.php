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

class commonblock_html  extends discuz_block{

	function fields() {
		return array();
	}

	function blockclass() {
		return array('html', lang('blockclass', 'blockclass_html_html'));
	}

}