<?php
/**
 * Interface for modules.
 *
 * A module must define the following fields:
 *  - $name The name of the module
 *  - $author The author's name
 *  - $email The author's email adress
 *  - $version The version of the module. It should match the pattern: x.y.z
 *  - $package The package of the module. One of the following: 'core', 'common' or 'custom'.
 *
 * You may also define:
 *  - $url A link to the Webpage(s) of the module
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms.mod
 */

interface mod {
	static $name;
	static $author;
	static $email;
	static $version;
	static $package;
}
?>
