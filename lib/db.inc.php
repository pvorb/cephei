<?php
/**
 * This file establishes the database connection.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */
$db = new PDO(DB_DSN, DB_USER, DB_PASSWD);
?>