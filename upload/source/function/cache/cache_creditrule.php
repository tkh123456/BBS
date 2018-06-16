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

function build_cache_creditrule() {
	$data = array();

	foreach(C::t('common_credit_rule')->fetch_all_rule() as $rule) {
		$rule['rulenameuni'] = urlencode(diconv($rule['rulename'], CHARSET, 'UTF-8', true));
		$data[$rule['action']] = $rule;
	}

	savecache('creditrule', $data);
}

?>