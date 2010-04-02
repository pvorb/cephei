<?php
require('vendor/smarty/Smarty.class.php');

$tpl = new Smarty();
$tpl->assign('site_name', 'Genitis');
$tpl->assign('base', '');
$tpl->assign('author', 'Paul Vorbach');
$tpl->assign('title', 'Startseite');
$tpl->assign('title_long', 'Willkommen bei Genitis');
$tpl->assign('content', '<div id="content"><p>Sehen Sie sich an, woran ich arbeite. Ansonsten gibt es bisher noch nicht sehr viel zu bestaunen. Dies soll sich in den kommenden Monaten jedoch ändern.</p></div>');
$tpl->assign('year', '2010');
$tpl->display('lib/tpl/default.tpl');
?>