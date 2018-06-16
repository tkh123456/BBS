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

class secqaa_calc {

	var $version = '1.0';
	var $name = 'calc_name';
	var $description = 'calc_desc';
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $customname = '';

	function make(&$question) {
		$a = rand(1, 90);
		$b = rand(1, 10);
		if(rand(0, 1)) {
			$question = $a.' + '.$b.' = ?';
			$answer = $a + $b;
		} else {
			$question = $a.' - '.$b.' = ?';
			$answer = $a - $b;
		}
		return $answer;
	}

}

?>