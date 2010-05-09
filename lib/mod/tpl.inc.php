<?php
/**
 * This file includes the templates.
 *
 * @author Paul Vorbach <p.vorbach@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package org.genitis.cms
 */
require(DIR_LIB.'vendor/smarty/Smarty.class.php');

$tpl = new Smarty;
$tpl->caching = 0;

$tpl->assign('base', str_repeat('../', $row['level']));
$tpl->assign('title', $row['title']);
$tpl->assign('title_long', $row['title_long']);
$tpl->assign('content', $row['content']);
$tpl->assign('created', $row['created']);
$tpl->assign('keywords', $row['keywords']);
$tpl->assign('description', $row['description']);

$tpl->display(DIR_LIB.'/tpl/default.tpl');
?>