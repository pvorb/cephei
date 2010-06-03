<?php
/**
 * Tests the database connection.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms.test
 */

require_once 'PHPUnit/Extensions/Database/TestCase.php';
require_once 'lib/config.inc.php.test';

class DBTest extends PHPUnit_Extensions_Database_TestCase {
	protected function getConnection() {
		$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWD);
		return $this->createDefaultDBConnection($pdo, DB_NAME);
	}

	protected function getDataSet() {
		return;
	}

	public function testConnection() {
		return;
	}
}
?>
