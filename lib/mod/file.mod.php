<?php
/**
 * File management module.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

require_once 'mod.def.php';

class file extends mod {
	static $name = 'File Management Module';
	static $author = 'Paul Vorbach';
	static $email = 'p.vorbach@gmail.com';
	static $version = '0.1.0';
	static $type = 'core';

	/**
	 * Gets an associative array of all files and directories in $root.
	 *
	 * @param string $root path to the root directory
	 * @return Returns an associative array of filenames and directories.
	 *     Returns false if opendir($root) fails.
	 *
	 * @todo test the method
	 */
	static function get_file_tree($root = DIR_RES) {
		$t = array();

		$d = opendir(DIR_MOD);
		if ($d)
			while (($f = readdir($d)) !== false) {
				if ($f != '.' && $f != '..')
					if (is_dir($f)) {
						$t[] = self::get_file_tree($root.$f);
					} else {
						// TODO something
					}
			}
		else
			$t = false;

		closedir($d);
		return $t;
	}
}
?>
