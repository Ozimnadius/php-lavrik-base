<?php
declare(strict_types=1);
include_once 'model/articles.php';

$id = (int)($_GET['id'] ?? '');
$article = getArticleById($id);
if (!$article) {
  show404();
}

include 'views/article.php';


?>
