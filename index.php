<?php
/**
 * This is the root element of the CMS. Everything starts here.
 * 
 * @author Paul Vorbach <p.vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */

$start = microtime();

if (!file_exists('lib/config.inc.php')) {
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

// Load cache
require_once('lib/cache.inc.php');
// Load configuration
require_once('lib/config.inc.php');
// Initialize db connection
require_once('lib/db.inc.php');
// Load data
require_once('lib/data.inc.php');
// Load template
require_once('lib/tpl.inc.php');

if (CONF_STATUS == 'debug') {
	echo "\n".'<!--'."\n".'time: '.(microtime() - $start).' s'."\n".'-->';
}
?>