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
class discuz_block
{

	public function cookparameter($parameter) {
		return daddslashes($parameter);
	}
}
?>