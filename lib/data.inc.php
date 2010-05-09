<?php
/**
 * This file catches the
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

// Get the configuration table and store it into $conf
foreach ($db->query('SELECT name, value FROM conf', PDO::FETCH_NUM) as $row) {
	$conf[$row[0]] = $row[1];
}

if (strpos($path, $conf['site_path_admin']) === 1)
	include 'admin.inc.php';
elseif ((strpos($path, $conf['site_path_css']) === 1) || (strrpos($path, '.css') === 1))
	include 'mod/css.inc.php';
elseif (strpos($path, $conf['site_path_js']) === 1 || (strrpos($path, '.js') === 1))
	include 'mod/js.inc.php';
elseif (strpos($path, $conf['site_path_img']) === 1)
	include 'mod/img.inc.php';
else
	include 'content.inc.php';
?>