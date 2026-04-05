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