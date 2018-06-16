<?php

/**
 * 这里是注释
 *      This is NOT a freeware, use is subject to license terms
 *
 *       *
 */
if (!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class memory_driver_apcu {

	public $cacheName = 'APCu';
	public $enable;

	public function env() {
		return function_exists('apcu_cache_info') && @apcu_cache_info();
	}

	public function init($config) {
		$this->enable = $this->env();
	}

	public function get($key) {
		return apcu_fetch($key);
	}

	public function set($key, $value, $ttl = 0) {
		return apcu_store($key, $value, $ttl);
	}

	public function rm($key) {
		return apcu_delete($key);
	}

	public function clear() {
		return apcu_clear_cache('user');
	}

	public function inc($key, $step = 1) {
		return apcu_inc($key, $step) !== false ? apcu_fetch($key) : false;
	}

	public function dec($key, $step = 1) {
		return apcu_dec($key, $step) !== false ? apcu_fetch($key) : false;
	}

}