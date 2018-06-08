<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: adv_blog.php 7169 2010-03-30 06:34:18Z monkey $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class adv_blog {

	var $version = '1.0';
	var $name = 'blog_name';
	var $description = 'blog_desc';
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $targets = array('home');
	var $imagesizes = array('120x60', '120x240');

	function getsetting() {
	}

	function setsetting(&$advnew, &$parameters) {
		global $_G;
		if(is_array($advnew['targets'])) {
			$advnew['targets'] = implode("\t", $advnew['targets']);
		}
	}

	function evalcode() {
		return array(
			'create' => '$adcode = $codes[$adids[array_rand($adids)]];',
		);
	}

}

?>