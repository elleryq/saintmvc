<?php
//index.php
$r = require 'router.php';
$r->dispatch($_SERVER['PATH_INFO']);
?>
