<?php

function show404(): void
{
  header('HTTP/1.1 404 Not Found');
  include __DIR__ . '/../views/errors/v_404.php';
  exit();
}

function checkControllerName(string $controllerName): bool
{
  return !preg_match('~^[a-z][a-z0-9_]*$~i', $controllerName);
}