<?php
declare(strict_types=1);
include_once('model/articles.php');

$id = (int)$_GET['id'] ?? '';
$article = getArticleById($id);
if (!$article) {
  header('HTTP/1.1 404 Not Found');
  include('views/errors/v_404.php');
} else{
  include('views/article.php');
}

?>