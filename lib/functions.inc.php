<?php
/**
 * This file provides several needful functions.
 *
 * @author Paul Vorbach <p.vorbach@genitis.org>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

// redirects to $location with HTTP type $type.
function redirect($type, $location, $search = null) {
	switch ($type) {
		case 301: header('HTTP/1.1 301 Moved Permanently'); break;
		case 307: header('HTTP/1.1 307 Temporary Redirect'); break;
		case 404: header('HTTP/1.1 404 Not Found'); break;
	}
	header('Location: '.$location
			.(isset($args) ? '?s='.trim(strtr($search, array('/' => '+', '%20' => '+')), '+') :''));
	die;
}

// Gets parent and item out of a query string. (unused)
//function get_hierarchy($q) {
//	if ($q[0] == '/')
//		$q = substr($q, 1);
//	if ($q[strlen($q) - 1] == '/')
//		$q = substr($q, 0, -1);
//	$parent = dirname($q);
//	$parent = ($parent == '.') ? '' : $parent;
//	$item = basename($q);
//	return array($parent, $item);
//}

// Sanitization
function sanitize_url($q) {
    return str_replace("\n", '', strip_tags($q));
}
?>