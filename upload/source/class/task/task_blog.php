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

class task_blog {

	var $version = '1.0';
	var $name = 'blog_name';
	var $description = 'blog_desc';
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $icon = '';
	var $period = '';
	var $periodtype = 0;
	var $conditions = array();

	function csc($task = array()) {
		global $_G;

		if(C::t('home_blog')->count_by_uid($_G['uid'])) {
			return true;
		}
		return array('csc' => 0, 'remaintime' => 0);
	}

	function view() {
		return lang('task/blog', 'blog_view');
	}

}

?>