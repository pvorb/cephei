<?php
// TODO Insert functions for redirecting and 404 error.

// Load configuration
foreach ($db->query('SELECT name, value FROM conf', PDO::FETCH_NUM) as $row) {
	$conf[$row[0]] = $row[1];
}

if (strpos($path, $conf['site_path_admin']) === 1)
	include 'admin.inc.php';
elseif (strpos($path, $conf['site_path_css']) === 1)
	include 'css.inc.php';
elseif (strpos($path, $conf['site_path_js']) === 1)
	include 'js.inc.php';
elseif (strpos($path, $conf['site_path_img']) === 1)
	include 'img.inc.php';
else
	include 'content.inc.php';
?>