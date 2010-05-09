<?php
/**
 * YAML (1.2) parser module.
 * @see http://yaml.org/spec/1.2/spec.pdf
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

$mod_name = 'YAML Parser Module';
$mod_author = 'Paul Vorbach';
$mod_email = 'p.vorbach@gmail.com';
$mod_version = '0.1.0';

function parse_yaml_file($file) {
	if (!file_exists($file)) {
		throw new Exception('File does not exist.');
	} else {
		// TODO YAML parsing goes here. See http://yaml.org/spec/1.2/spec.pdf.
	}
}
?>
