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

class adv_custom {

	var $version = '1.0';
	var $name = 'custom_name';
	var $description = 'custom_desc';
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $targets = array('portal', 'home', 'member', 'forum', 'group', 'plugin', 'api');
	var $imagesizes = array('60x120', '60x250', '60x468', '120x60', '120x240', '120x60', '250x60', '100x100', '468x40', '468x60', '658x60', '728x90', '760x90', '950x90', '950x130');
	var $customname = '';

	function getsetting() {
		global $_G;
		$custom = C::t('common_advertisement_custom')->fetch($_GET['customid']);
		if(!$custom) {
			echo '<br >';cpmsg(lang('adv/custom', 'custom_id_notfound'));
		}
		$this->customname = $custom['name'];
	}

	function setsetting(&$advnew, &$parameters) {
		global $_G;
		$advnew['targets'] = implode("\t", $this->targets);
	}

	function evalcode($adv) {
		return array(
			'check' => '
			if($customid != $parameter[\'customid\']) {
				$checked = false;
			}',
			'create' => '$adcode = $codes[$adids[array_rand($adids)]];',
		);
	}

}

?>