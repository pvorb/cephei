<?php
/**
 * This file establishes the database connection.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */

define(DB_DSN, DB_TYPE.':dbname='.DB_NAME.':host='.DB_HOST);

$db = new PDO(DB_DSN, DB_USER, DB_PASSWD);
?>