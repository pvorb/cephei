<?php
/**
 * YAML (1.2) parser module.
 * @see http://yaml.org/spec/1.2/spec.pdf
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

require_once 'mod.inc.php';

class yaml extends mod {
	static $name = 'YAML Parser Module';
	static $author = 'Paul Vorbach';
	static $email = 'p.vorbach@gmail.com';
	static $version = '0.1.0';
	static $type = 'core';

	const DIR_TPL = 'tpl';

	/**
	 * Parses a YAML file.
	 * @param string $file Path to the file that should be parsed
	 *
	 * @todo Implement parsing.
	 */
	static function parse_yaml_file($file) {
		if (!file_exists($file)) {
			throw new Exception('File does not exist.');
		} else {
			$f = fopen($file, 'r');
			while (!feof($f)) {
				$buff = fgets($f, 4096);
			}
			fclose($f);
		}
	}
}
?>
