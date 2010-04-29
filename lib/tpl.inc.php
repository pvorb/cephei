<?php
require('vendor/smarty/Smarty.class.php');

$tpl = new Smarty;
$tpl->caching = 0;

$tpl->assign('base', str_repeat('../', $row['level']));
$tpl->assign('title', $row['title']);
$tpl->assign('title_long', $row['title_long']);
$tpl->assign('content', $row['content']);
$tpl->assign('created', $row['created']);
$tpl->assign('keywords', $row['keywords']);
$tpl->assign('description', $row['description']);

$tpl->display('../lib/tpl/default.tpl');
?>