<?php
// TODO Insert functions for redirecting and 404 error.

// Try to find item with $path that was in $_GET['q'].
$result = $db->query('SELECT * FROM content_item WHERE path = "'.$path.'"');
$row = $result->fetch(PDO::FETCH_ASSOC);
if ($row == false) {
	// Try to find out, if there have been older versions of this item at $path.
	$result = $db->query('SELECT * FROM path_redirect WHERE source_path = "'.$path.'"');
	$row = $result->fetch(PDO::FETCH_ASSOC);
	if ($row != false) {
		// Get the equivalent item.
		$result = $db->query('SELECT path FROM content_item WHERE id = "'.$row['target_id'].'"');
		$row = $result->fetch(PDO::FETCH_ASSOC);
		if ($row != false) {
			// If it exists, redirect to the updated URL.
			header('HTTP/1.1 301 Moved Permanently');
			header('Location: '.$row['path']);
			die;
		} else {
			header('HTTP/1.1 404 Not Found');
			header('Location: '.ERROR_404.'?s='.trim(strtr($path, '/', ','), ','));
			die;
		}
	} else {
		header('HTTP/1.1 404 Not Found');
		header('Location: '.ERROR_404.'?s='.trim(strtr($path, '/', ','), ','));
		die;
	}
}
?>