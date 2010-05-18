<?php
/**
 * Template management module.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

require_once 'mod.def.php';
require_once DIR_LIB.'vendor/smarty/Smarty.class.php';

class tpl extends mod {
	static $name = 'Template Management Module';
	static $author = 'Paul Vorbach';
	static $email = 'p.vorbach@gmail.com';
	static $version = '0.1.0';
	static $type = 'core';

	const DIR_TPL = 'tpl';
}
?>
