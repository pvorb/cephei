<?php
/**
 * This is the root element of the CMS. Everything starts here.
 * 
 * @author Paul Vorbach <p.vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

$start = microtime();

require '../lib/functions.inc.php';

//
if (!file_exists('../lib/config.inc.php')) {
	header('HTTP/1.1 307 Temporary Redirect');
	header('Location: setup/install.php');
	die;
}

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

// Load configuration
require_once('../lib/config.inc.php');
// Load cache
require_once(DIR_LIB.'cache.inc.php');
// Initialize db connection
require_once(DIR_LIB.'db.inc.php');
// Load data
require_once(DIR_LIB.'data.inc.php');
// Load template
require_once(DIR_LIB.'mod/tpl.inc.php');

// Show debug information.
if (CONF_STATUS == 'debug') {
	echo "\n".'<!--'."\n".'time: '.(microtime() - $start).' s'."\n".'-->';
}
?>