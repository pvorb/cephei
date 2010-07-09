<?php

require_once DIR_MOD.'model.def.php';

class static_item_model implements model {

	/**
	 * Creates a database table <em>content_item_static</em> for the models
	 * content.
	 *
	 * @param PDO $db database connection
	 * @return <code>TRUE</code> on success
	 */
	static function install() {
		global $db;

		$statement = <<<EOT
CREATE TABLE IF NOT EXISTS `content_item_static` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `path` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `title_long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(32) NOT NULL COMMENT 'user id',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `authors` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `keywords` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'de_DE',
  `theme_id` int(32) NOT NULL,
  `scripts` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `menu_index` smallint(6) NOT NULL DEFAULT '0',
  `menu_title` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `searchable` tinyint(1) NOT NULL DEFAULT '1',
  `cacheable` tinyint(1) NOT NULL DEFAULT '1',
  `comments_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `comments_number` int(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
EOT;
		$db->exec($statement);
		return TRUE;
	}

	static function activate() {

	}

	static function deactivate() {

	}

	/**
	 * Drops the database table <em>content_item_static</em>.
	 *
	 * @param PDO $db database connection
	 * @return <code>TRUE</code> on success
	 */
	static function uninstall() {
		global $db;

		$statement = <<<EOT
DROP TABLE `content_item_static`;
EOT;
		$db->exec($statement);
		return TRUE;
	}

	/**
	 * Gets the entries of database table <em>content_item_static</em>.
	 *
	 * @param PDO $db database connection
	 * @param string/array $cols table colums that shall be queried
	 * @param unknown_type $cond condition
	 * @throws ErrorException
	 * @return query results as a <code>PDOStatement</code>
	 */
	static function get_entries($cols = '*', $cond = NULL) {
//		if ($db == NULL)
//			throw new ErrorException('Parameter "$db" must specify a valid PDO connection', 0, 1, __FILE__, __LINE__);
//		else
		if ($cols == NULL)
			throw new ErrorException('Parameter "$cols" must be either of type string or array of strings', 0, 1, __FILE__, __LINE__);
		else if (is_array($cols))
			$cols = implode(', ', $cols);

		return $db->query('SELECT '.$cols.' FROM `content_item_static` WHERE '.$cond.';');
	}

	/**
	 * Get a specific entry as a whole.
	 *
	 * @param PDO $db database connection
	 * @param string/int $id ID or 'path' of the entry
	 * @throws ErrorException
	 * @return query result as a <code>PDOStatement</code>
	 */
	static function get_entry($id) {
		global $db;
		if (is_string($id))
			return $db->query('SELECT * FROM `content_item_static` WHERE `path` = "'.$id.'";');
		else if (is_int($id))
			return $db->query('SELECT * FROM `content_item_static` WHERE `id` = "'.$id.'";');

		throw new ErrorException('Parameter "$id" must be either of type string or int', 0, 1, __FILE__, __LINE__);
	}

	/**
	 * Inserts a new entry.
	 *
	 * @param PDO $db database connection
	 * @param array $assoc_array entry data
	 * @throws ErrorException
	 */
	static function add_entry($assoc_array) {
		global $db;

		if (!is_array($assoc_array))
			throw new ErrorException('Parameter "$assoc_array" must be an associative array', 0, 1, __FILE__, __LINE__);

		$cols = array();
		$values = array();
		foreach ($assoc_array as $key => $value) {
			$keys[] = $key;
			$values[] = $value;
		}

		//return
		$db->exec('INSERT INTO `content_item_static` ('.implode(', ', $keys).') VALUES ('.implode(', ', $values).');');
	}

	static function update_entry($assoc_array) {

	}

	static function remove_entry($cond) {

	}
}
