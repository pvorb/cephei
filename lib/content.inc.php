<?php
/**
 * This file catches the content.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

// Try to find item with $path that was in $_GET['q'].
$res = $db->query('SELECT * FROM content_item WHERE path = "'.$path.'"');
$row = $res->fetch(PDO::FETCH_ASSOC);
if ($row == false) {
	// Try to find out if there have been older versions of this item at $path.
	$res = $db->query('SELECT * FROM path_redirect WHERE source_path = "'.$path.'"');
	$row = $res->fetch(PDO::FETCH_ASSOC);
	if ($row != false) {
		// Get the equivalent item.
		$res = $db->query('SELECT path FROM content_item WHERE id = "'.$row['target_id'].'"');
		$row = $res->fetch(PDO::FETCH_ASSOC);
		if ($row != false) {
			// If it exists, redirect to the updated URL.
			header('HTTP/1.1 301 Moved Permanently');
			header('Location: '.$row['path']);
			redirect(301, $row['path']);
		} else {
			// Else redirect to an 404 error and search for possible alternatives.
			redirect(404, ERROR_404, $path);
		}
	} else {
		// Redirect to an 404 error and search for possible alternatives.
		redirect(404, ERROR_404, $path);
	}
}
?>