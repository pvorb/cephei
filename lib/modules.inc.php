<?php
/**
 * Manages the modules.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

/**
 * Lists all modules in 'lib/mod'.
 *
 * @return array of all modules
 */
function list_modules() {
	$m = array();

	$d = opendir(DIR_MOD);
	if ($d)
		while (($f = readdir($d)) !== false) {
			if ($f != '.' && $f != '..' && $f != 'mod.inc.php')
				$m[] = substr($f, 0, -8);
		}
	else
		$m = false;

	closedir($d);
	return $m;
}
?>
