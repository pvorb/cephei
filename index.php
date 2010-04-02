<?php
/**
 * This is the main entry point of the CMS.
 * @author Paul Vorbach <p.vorbach@genitis.org>
 */

$start = microtime();

if (!file_exists('lib/config.inc.php'))
	http_redirect('/setup/install.php', null, false, HTTP_REDIRECT_TEMP);

if (isset($_GET['q']))
	$uri = $_GET['q'];
else
	$uri = '/';

// Load cache
require('lib/cache.inc.php');
// Load configuration
require('lib/config.inc.php');
// Load data
require('lib/db.inc.php');
// Load template
require('lib/template.inc.php');

if ($status == 'debug') {
	echo "\n".'<!--'."\n".(microtime() - $start).' s'."\n".'-->';
}
?>