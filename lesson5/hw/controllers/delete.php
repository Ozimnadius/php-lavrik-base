<?php
declare(strict_types=1);
include_once 'model/articles.php';

$id = (int)($_GET['id'] ?? '');
$article = getArticleById($id);

if ($article === false) {
  show404();
}

if (deleteArticle($id)) {
  include 'views/deleted.php';
} else {
  include 'views/not_deleted.php';
}

?>
