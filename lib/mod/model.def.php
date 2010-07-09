<?php

interface model {
	// Installation/activation
	static function install();
	static function activate();
	static function deactivate();
	static function uninstall();

	// Database access
	static function get_entries($cols = '*', $cond = NULL);
	static function get_entry($id);
	static function add_entry($assoc_array);
	static function update_entry($assoc_array);
	static function remove_entry($cond);
}
