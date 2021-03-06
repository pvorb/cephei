<?php
/**
 * This file provides several needful functions.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

/**
 * Redirects to the URL given in $location where $type is the HTTP status code
 * and $search is a string which contains keywords that will be sent in
 * $_GET['s'].
 *
 * This function always ends the execution of the current script.
 *
 * @param int $type HTTP status code
 * @param string $location URL that will be redirected to
 * @param string $search string with keywords. Slashes and '%20' serve as
 *     seperators.
 */
function redirect($type, $location, $search = null) {
	switch ($type) {
		case 301: header('HTTP/1.1 301 Moved Permanently'); break;
		case 307: header('HTTP/1.1 307 Temporary Redirect'); break;
		case 404: header('HTTP/1.1 404 Not Found'); break;
	}
	header('Location: '.$location.(isset($args) ? '?s='.trim(strtr($search, array('/' => '+', '%20' => '+')), '+') :''));
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

/**
 * Sanitizes a url string by using strip_tags() and stripping newlines.
 *
 * @param string $q url
 * @return string sanitized url string
 */
function sanitize_url($q) {
    return str_replace("\n", '', strip_tags($q));
}

/**
 * Returns a relative path string to <code>DIR_PUB</code>.
 *
 * Usually this is used by many templates to get an relative path to the
 * resources etc.
 *
 * @param int $level level of the document
 * @return string with relative path to <code>DIR_PUB</code>
 */
function rel_path($level) {
	$res = '';
	for ($i = 0; $i < $level; $i++)
		$res .= '../';
	return $res;
}

/**
 * Indents a given string and prints it.
 *
 * @param string $str string that shall be indented
 * @param int $num number of indents
 * @param string $char
 *
 * TODO Optimize
 */
function str_indent($str, $num = 1, $char = "\t") {
	if ($num == 0)
		return $str;

	$ind = str_repeat($char, $num);
	$str = explode("\n", $str);
	foreach ($str as $line)
		echo $ind.$line."\n";
}
