<?php

function show404(): void
{
  header('HTTP/1.1 404 Not Found');
  include __DIR__ . '/../views/errors/v_404.php';
  exit();
}
