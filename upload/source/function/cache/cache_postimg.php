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

function build_cache_postimg() {
	$imgextarray = array('jpg', 'gif', 'png');
	$imgdir = array('hrline', 'postbg');
	$postimgjs = 'var postimg_type = new Array();';
	foreach($imgdir as $perdir) {
		$count = 0;
		$pdir = DISCUZ_ROOT.'./static/image/'.$perdir;
		$postimgdir = dir($pdir);
		$postimgjs .= 'postimg_type["'.$perdir.'"]=[';
		while($entry = $postimgdir->read()) {
			if(in_array(strtolower(fileext($entry)), $imgextarray) && preg_match("/^[\w\-\.\[\]\(\)\<\> &]+$/", substr($entry, 0, strrpos($entry, '.'))) && strlen($entry) < 30 && is_file($pdir.'/'.$entry)) {
				$postimg[$perdir][] = array('url' => $entry);
				$postimgjs .= ($count ? ',' : '').'"'.$entry.'"';
				$count++;
			}
		}
		$postimgjs .='];';
		$postimgdir->close();
	}
	savecache('postimg', $postimg);
	$cachedir = DISCUZ_ROOT.'./data/cache/';
	if(@$fp = fopen($cachedir.'common_postimg.js', 'w')) {
		fwrite($fp, $postimgjs);
		fclose($fp);
	} else {
		exit('Can not write to cache files, please check directory ./data/ and ./data/cache/ .');
	}
}

?>