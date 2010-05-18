<?php
/**
 * Authorization module. Provides authorization functionality.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms.mod.auth
 */

require_once 'mod.def.php';

class auth extends mod {
	static $name = 'Authorization Module';
	static $author = 'Paul Vorbach';
	static $email = 'p.vorbach@gmail.com';
	static $version = '0.1.0';
	static $type = 'core';

	const SECURE = TRUE;
	const INSECURE = FALSE;

	/**
	 * Fallback for authorize_sec().
	 * 
	 * @param string $usr
	 *   username or email adress
	 * @param string $pwd
	 *   unencrypted password
	 * @param boolean $is_sec
	 *   Default is <code>auth::INSECURE</code>.
	 *   <code>auth::SECURE</auth> if authorization mode is secure.
	 *   If this value is <code>auth::SECURE</code> the password given in $pwd
	 *   must already have been encrypted with SHA1 before.
	 * @return string
	 *   username if the authorizatuon was successfull, FALSE otherwise
	 */
	public static function authorize($usr, $pwd, $is_sec = auth::INSECURE) {
		global $db;
		$pwd = $is_sec ? '\''.$pwd.'\'' : 'SHA1(\''.$pwd.'\')';
		$usr = '\''.$usr.'\'';
		$q = 'SELECT `name` FROM `user` WHERE `passwd` = '.$pwd
				.' AND `name` = '.$usr.' OR `email` = '.$usr.';';
		$res = $db->query($q);
		if ($res !== FALSE) {
			$row = $res->fetch(PDO::FETCH_NUM);
			return $row[0];
		} else {
			return $res; // return FALSE
		}
	}

	/**
	 * Checks whether the email adress in $adress is valid or not.
	 *
	 * @param string $adress
	 *   Email adress that needs to be checked
	 * @return boolean
	 *   TRUE, if email adress is valid, FALSE otherwise
	 */
	public static function validate_email_adress($adress) {
		return preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $adress) ?
			TRUE : FALSE;
	}
}
?>
