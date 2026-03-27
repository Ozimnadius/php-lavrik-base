<?php
include_once __DIR__ . '/core/functions.php';
$cname = $_GET['c'] ?? 'index';

if (!preg_match('~^[a-z][a-z0-9_]*$~i', $cname)) {
  show404();
}

$path = __DIR__ . "/controllers/$cname.php";

if (!is_file($path)) {
  show404();
}

include_once $path;
