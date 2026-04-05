<?php

function checkControllerName(string $name): bool
{
  return !!preg_match('/^[aA-zZ0-9_-]+$/', $name);
}

function template(string $path, array $vars = []): string
{
  static $twig;

  if ($twig === null) {
    $loader = new \Twig\Loader\FilesystemLoader('views', dirname(__DIR__));

    $twig = new \Twig\Environment($loader, [
      'cache' => 'cache/twig',
      'auto_reload' => true,
      'autoescape' => false,
      'strict_variables' => true
    ]);
  }

  return $twig->render("$path.twig", $vars);
}
