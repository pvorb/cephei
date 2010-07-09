<?php
/**
 * This file fetches the content.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

require_once 'db.inc.php';

// Try to find something in index with source_path $path that was in $_GET['q'].
$res = $db->query('SELECT `target_id`, `target_type` FROM `content_index` WHERE `source_path` = "'.$path.'";');
$row = $res->fetch(PDO::FETCH_ASSOC);
if ($row == FALSE)
	redirect(404, ERROR_404, $path); // exit
else
	if ($row['target_type'] == 'static_redirection') {
		// If there is a "static redirection" the new path to will be read and then
		// the script will redirect to this path with status 301.
		$res = $db->query('SELECT `path` FROM `content_item_static` WHERE `id` = "'.$row['target_id'].'";');
		$row = $res->fetch(PDO::FETCH_ASSOC);
		redirect(301, $row['path']); // exit
	} elseif ($row['target_type'] == 'static_item') {
		require_once DIR_MOD.'static_item/static_item.frontend.controller.php';
		static_item_frontend_controller::display($row['target_id']);
	}
