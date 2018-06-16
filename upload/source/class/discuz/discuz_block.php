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
class discuz_block
{

	public function cookparameter($parameter) {
		return daddslashes($parameter);
	}
}
?>