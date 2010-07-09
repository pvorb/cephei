<?php
/**
 * Data type handler.
 *
 * This file decides, which type of data is requested and includes the
 * necessary handler file. It is also responsible for loading the configuration
 * data in the corresponding database table.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

// Get the configuration table and store it into $conf
foreach ($db->query('SELECT name, value FROM conf', PDO::FETCH_NUM) as $row) {
	$conf[$row[0]] = $row[1];
}

// Matching $path to $conf[…]
if (strpos($path, $conf['site_path_backend']) === 1)
	include_once 'backend.inc.php';
//elseif ((strpos($path, $conf['site_path_css']) === 1) || (strrpos($path, '.css') === 1))
//	include_once 'mod/css.inc.php';
//elseif (strpos($path, $conf['site_path_js']) === 1 || (strrpos($path, '.js') === 1))
//	include_once 'mod/js.inc.php';
//elseif (strpos($path, $conf['site_path_img']) === 1)
//	include_once 'mod/img.inc.php';
else
	include_once 'frontend.inc.php';
