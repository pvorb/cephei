<?php
/**
 * Tests the file module.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms.test
 */

require_once 'PHPUnit/Framework.php';
require_once 'lib/mod/file.mod.php';

/**
 * @todo Implement data tests.
 */
class FileTest extends PHPUnit_Framework_TestCase {

	public function testFullFileTree() {
		$file_tree = file::get_file_tree('test/res/test_file_tree/');
		$reference_file_tree = array();
		$reference_file_tree['dir1'] = array();
		$reference_file_tree['dir2'] = array();
		$reference_file_tree['dir1']['dir'] = array('file');
		$reference_file_tree['dir1'][] = 'file1';
		$reference_file_tree['dir1'][] = 'file2';

		$this->assertEquals($reference_file_tree, $file_tree);
	}

	public function testEmptyFileTree() {
		$file_tree = file::get_file_tree('test/res/test_file_tree/dir2/');

		$this->assertEquals(array(), $file_tree);
	}
}
?>
