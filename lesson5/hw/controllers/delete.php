<?php
declare(strict_types=1);
include_once('model/articles.php');

$id = (int)($_GET['id'] ?? '');
$post = getArticleById($id);
$hasPost = ($post !== false);

if (!$hasPost) {
  header('HTTP/1.1 404 Not Found');
  include('views/errors/v_404.php');
} else {
  if (deleteArticle($id)){
    include('views/deleted.php');
  } else {
    include('views/not_deleted.php');
  }
}
?>