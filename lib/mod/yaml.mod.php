<?php
/**
 * YAML (1.2) parser module.
 *
 * @see http://www.php.net/manual/en/book.yaml.php
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

require_once 'mod.def.php';

class yaml extends mod {
	static $name = 'YAML Parser Module';
	static $author = 'Paul Vorbach';
	static $email = 'p.vorbach@gmail.com';
	static $version = '0.1.0';
	static $type = 'extra';

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
			if ($f) {
				while (!feof($f)) {
					$buff = fgets($f, 4096);
				}
				fclose($f);
			} else {
				throw new Exception('Unable to open file at "'.$file.'".');
			}
		}
	}
}
