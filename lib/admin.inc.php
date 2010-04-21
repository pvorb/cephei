<?php
// admin.inc.php

// trim the redundant part
$path = substr($path, strlen($conf['site_path_admin']) + 1);
include 'admin/index.static.php';
die;
?>
