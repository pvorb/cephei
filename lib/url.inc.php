<?php
// Gets parent and item out of a query string. (Unused)
function get_hierarchy($q) {
	if ($q[0] == '/')
		$q = substr($q, 1);
	if ($q[strlen($q) - 1] == '/')
		$q = substr($q, 0, -1);
	$parent = dirname($q);
	$parent = ($parent == '.') ? '' : $parent;
	$item = basename($q);
	return array($parent, $item);
}

// Sanitization
function sanitize_url($q) {
    return str_replace("\n", '', strip_tags($q));
}
?>