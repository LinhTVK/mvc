<?php
use MVC\Dispatcher;
include '../vendor/autoload.php';
define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
// echo(WEBROOT);
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
// echo(ROOT);
$dispatch = new Dispatcher();
// $dispatch->dispatch();
?>