<?php

/**
 * 这里是注释
 *   
 *
 *       *
 */

header('Expires: '.gmdate('D, d M Y H:i:s', time() + 60).' GMT');

if(!defined('IN_API')) {
	exit('document.write(\'Access Denied\')');
}

loadcore();

$adid = $_GET['adid'];
$data = adshow($adid);

echo 'document.write(\''.preg_replace("/\r\n|\n|\r/", '\n', addcslashes($data, "'\\")).'\');';

?>