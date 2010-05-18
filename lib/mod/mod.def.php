<?php
/**
 * Base class for modules.
 *
 * A module must override the following properties:
 *  - $name The name of the module
 *  - $author The author's name
 *  - $email The author's email adress
 *  - $version The version of the module. It should match the pattern 'x.y.z'.
 *  - $type The package of the module. One of the following: 'core', 'extra',
 *     'common' or 'custom'.
 *
 * You may also define:
 *  - $url A link to the Webpage of the module
 */
class mod {
	static $name = 'Module Name';
	static $author = 'Author\'s name';
	static $email = 'author@example.com';
	static $version = '0.1.0';
	static $type = 'custom';
}
?>
