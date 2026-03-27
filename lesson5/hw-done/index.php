<?php
include_once __DIR__ . '/core/systems.php';
$cname = $_GET['c'] ?? 'index';

if (checkControllerName($cname)) {
  show404();
}

$path = __DIR__ . "/controllers/$cname.php";

if (!is_file($path)) {
  show404();
}

include_once $path;
