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
		$t = array(); // file tree array

		$d = opendir($root);
		if ($d) {
			while (($f = readdir($d)) !== FALSE) {
				if ($f != '.' && $f != '..') {
					$path = $root.$f.'/';
					if (is_dir($path)) {
						$t[basename($path)] = self::get_file_tree($path);
					} else {
						$t[] = basename($path); // name of the file
					}
				}
			}
		} else {
			$t = FALSE;
		}

		closedir($d);
		return $t;
	}
}
