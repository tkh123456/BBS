<?php

/**
 * 这里是注释
 *   
 *
 *       *
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

function import_smilies() {
	$smileyarray = getimportdata('Discuz! Smilies');

	$renamed = 0;
	if(C::t('forum_imagetype')->count_by_name('smiley', $smileyarray['name'])) {
		$smileyarray['name'] .= '_'.random(4);
		$renamed = 1;
	}
	$data = array(
	    'name' => $smileyarray['name'],
	    'type' => 'smiley',
	    'directory' => $smileyarray['directory'],
	);
	$typeid = C::t('forum_imagetype')->insert($data, true);


	foreach($smileyarray['smilies'] as $key => $smiley) {
		C::t('common_smiley')->insert(array('type'=>'smiley', 'typeid'=>$typeid, 'displayorder'=>$smiley['displayorder'], 'code'=>'', 'url'=>$smiley['url']));
	}
	C::t('common_smiley')->update_code_by_typeid($typeid);

	updatecache(array('smileytypes', 'smilies', 'smileycodes', 'smilies_js'));
	return $renamed;
}

function import_styles($ignoreversion = 1, $dir = '', $restoreid = 0, $updatecache = 1, $validate = 1) {
	global $_G, $importtxt, $stylearray;
	if(!isset($dir)) {
		$stylearrays = array(getimportdata('Discuz! Style'));
	} else {
		require_once libfile('function/cloudaddons');
		if(!$restoreid) {
			$dir = str_replace(array('/', '\\'), '', $dir);
			$templatedir = DISCUZ_ROOT.'./template/'.$dir;
			if($validate) {
				cloudaddons_validator($dir.'.template');
			}
		} else {
			$templatedir = DISCUZ_ROOT.$dir;
			$dir = basename($dir);
			if($validate) {
				cloudaddons_validator($dir.'.template');
			}
		}
		$searchdir = dir($templatedir);
		$stylearrays = array();
		while($searchentry = $searchdir->read()) {
			if(substr($searchentry, 0, 13) == 'discuz_style_' && fileext($searchentry) == 'xml') {
				$importfile = $templatedir.'/'.$searchentry;
				$importtxt = implode('', file($importfile));
				$stylearrays[] = getimportdata('Discuz! Style');
			}
		}
	}

	foreach($stylearrays as $stylearray) {
		if(empty($ignoreversion) && !versioncompatible($stylearray['version'])) {
			cpmsg('styles_import_version_invalid', 'action=styles', 'error', array('cur_version' => $stylearray['version'], 'set_version' => $_G['setting']['version']));
		}

		if(!$restoreid) {
			$renamed = 0;
			if($stylearray['templateid'] != 1) {
				$templatedir = DISCUZ_ROOT.'./'.$stylearray['directory'];
				if(!is_dir($templatedir)) {
					if(!@mkdir($templatedir, 0777)) {
						$basedir = dirname($stylearray['directory']);
						cpmsg('styles_import_directory_invalid', 'action=styles', 'error', array('basedir' => $basedir, 'directory' => $stylearray['directory']));
					}
				}

				if(!($templateid = C::t('common_template')->get_templateid($stylearray['tplname']))) {
					$templateid = C::t('common_template')->insert(array(
						'name' => $stylearray['tplname'],
						'directory' => $stylearray['directory'],
						'copyright' => $stylearray['copyright']
					), true);
				}
			} else {
				$templateid = 1;
			}

			if(C::t('common_style')->check_stylename($stylearray['name'])) {
				$renamed = 1;
			} else {
				$styleidnew = C::t('common_style')->insert(array('name' => $stylearray['name'], 'templateid' => $templateid), true);
			}
		} else {
			$styleidnew = $restoreid;
			C::t('common_stylevar')->delete_by_styleid($styleidnew);
		}

		foreach($stylearray['style'] as $variable => $substitute) {
			$substitute = @dhtmlspecialchars($substitute);
			C::t('common_stylevar')->insert(array('styleid' => $styleidnew, 'variable' => $variable, 'substitute' => $substitute));
		}
	}

	if($dir) {
		cloudaddons_installlog($dir.'.template');
		cloudaddons_clear('template', $dir);
	}

	if($updatecache) {
		updatecache('styles');
		updatecache('setting');
	}
	return $renamed;
}

function import_block($xmlurl, $clientid, $xmlkey = '', $signtype = '', $ignoreversion = 1, $update = 0) {
	global $_G, $importtxt;
	$_GET['importtype'] = $_GET['importtxt'] = '';
	$xmlurl = strip_tags($xmlurl);
	$clientid = strip_tags($clientid);
	$xmlkey = strip_tags($xmlkey);
	$parse = parse_url($xmlurl);
	if(!empty($parse['host'])) {
		$queryarr = explode('&', $parse['query']);
		$para = array();
		foreach($queryarr as $value){
			$k = $v = '';
			list($k,$v) = explode('=', $value);
			if(!empty($k) && !empty($v)) {
				$para[$k] = $v;
			}
		}
		$para['clientid'] = $clientid;
		$para['op'] = 'getconfig';
		$para['charset'] = CHARSET;
		$signurl = create_sign_url($para, $xmlkey, $signtype);
		$pos = strpos($xmlurl, '?');
		$pos = $pos === false ? strlen($xmlurl) : $pos;
		$signurl = substr($xmlurl, 0, $pos).'?'.$signurl;
		$importtxt = @dfsockopen($signurl);
	} else {
		$importtxt = @implode('', file($xmlurl));
	}
	$blockarrays = getimportdata('Discuz! Block', 0);
	if(empty($blockarrays['name']) || empty($blockarrays['fields']) || empty($blockarrays['getsetting'])) {
		cpmsg(cplang('import_data_typeinvalid').cplang($importtxt), '', 'error');
	}
	if(empty($ignoreversion) && !versioncompatible($blockarrays['version'])) {
		cpmsg(cplang('blockxml_import_version_invalid'), '', 'error', array('cur_version' => $blockarrays['version'], 'set_version' => $_G['setting']['version']));
	}
	$data = array(
		'name' => dhtmlspecialchars($blockarrays['name']),
		'version' => dhtmlspecialchars($blockarrays['version']),
		'url' => $xmlurl,
		'clientid' => $clientid,
		'key' => $xmlkey,
		'signtype' => !empty($signtype) ? 'MD5' : '',
		'data' => serialize($blockarrays)
	);
	if(!$update) {
		C::t('common_block_xml')->insert($data);
	} else {
		C::t('common_block_xml')->update($update, $data);
	}
}

function create_sign_url($para, $key = '', $signtype = ''){
	ksort($para);
	$url = http_build_query($para);
	if(!empty($signtype) && strtoupper($signtype) == 'MD5') {
		$sign = md5(urldecode($url).$key);
		$url = $url.'&sign='.$sign;
	} else {
		$url = $url.'&sign='.$key;
	}
	return $url;
}
?>