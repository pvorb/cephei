<?php
/**
 * This is the root element of the CMS. Everything starts here.
 * 
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

$start = microtime(TRUE);

require '../lib/functions.inc.php';

$config_file = '../lib/config.inc.php';

// Checks if the config.inc.php file is available.
// If there is the public/setup/install.php you will be redirected to it.
// Otherwise terminate the script and throw an error.
if (!file_exists($config_file)) {
	if (file_exists('setup/install.php')) {
		header('HTTP/1.1 307 Temporary Redirect');
		header('Location: setup/install.php');
		die;
	} else {
		die('The file "lib/config.inc.php" is missing.');
		// Maybe there will be a central error manager soon.
	}
}

// Load configuration file
require_once($config_file);
unset($config_file);

// Get the requested path.
$path = '/';
if (isset($_GET['q'])) {
	$path .= $_GET['q'];
	unset($_GET['q']);
}

// If there are search arguments, save them into an string array.
if (isset($_GET['s'])) {
	$search = explode('+', $_GET['s']);
	unset($_GET['s']);
}

// Load cache
require_once(DIR_LIB.'cache.inc.php');
// Load modules
require_once(DIR_LIB.'modules.inc.php');
// Initialize db connection
require_once(DIR_LIB.'db.inc.php');
// Load data
require_once(DIR_LIB.'data.inc.php');

// Show debug information.
if (CONF_STATUS == 'debug') {
	echo "\n".'<!--'."\n".'time: '.(microtime(TRUE) - $start).' s'."\n".'-->';
}
?>
