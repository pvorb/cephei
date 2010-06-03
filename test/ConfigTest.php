<?php
/**
 * Tests the authentification module.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms.tests
 */

require_once 'PHPUnit/Framework.php';
require_once 'lib/config.inc.php.test';

/**
 * @todo Implement data tests.
 */
class ConfigTest extends PHPUnit_Framework_TestCase {

	public function testConfigFileExists() {
		$this->assertFileExists('lib/config.inc.php.default');
	}

	public function testDirs() {
		$this->assertTrue(DIR_LIB !== NULL);
		$this->assertTrue(DIR_MOD !== NULL);
		$this->assertTrue(DIR_RES !== NULL);
	}

	public function testDB() {
		$this->assertTrue(DB_CHARSET !== NULL);
		$this->assertTrue(DB_NAME !== NULL);
		$this->assertTrue(DB_PASSWD !== NULL);
		$this->assertTrue(DB_PREFIX !== NULL);
		$this->assertTrue(DB_HOST !== NULL);
		$this->assertTrue(DB_TYPE !== NULL);
		$this->assertTrue(DB_USER !== NULL);
	}

	public function testDBConnection() {
		define('DB_DSN', DB_TYPE.':host='.DB_HOST.';:dbname='.DB_NAME);
		try {
			$db = new PDO(DB_DSN, DB_USER, DB_PASSWD);
		} catch(PDOException $e) {
			$this->fail('Database connection could not be established.');
		}
	}

	public function testAdditional() {
		$this->assertTrue(CONF_STATUS !== NULL);
		$this->assertTrue(ERROR_404 !== NULL);
	}
}
?>
