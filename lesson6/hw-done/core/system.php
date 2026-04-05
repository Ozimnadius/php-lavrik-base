<?php

function checkControllerName(string $name): bool
{
  return !!preg_match('/^[A-Za-z0-9_-]+$/', $name);
}

function template(string $path, array $vars = []): string
{
  $systemTemplateRendererIntoFullPath = "views/$path.php";
  extract($vars);
  ob_start();
  include($systemTemplateRendererIntoFullPath);
  return ob_get_clean();
}

function fail404(): void
{
  header('HTTP/1.1 404 Not Found');
  $pageTitle = 'Ошибка 404';
  $pageContent = template('errors/v_404');
}