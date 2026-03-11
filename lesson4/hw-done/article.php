<?php
declare(strict_types=1);
include_once('model/articles.php');

$slug = $_GET['slug'] ?? '';
$article = getArticleBySlug($slug);
if (!$article) {
  header('Location: index.php');
  exit();
}

?>
<div class="content">

  <div class="article">
    <h1><?= $article['title'] ?></h1>
    <div><?= $article['content'] ?></div>
    <hr>
    <a href="delete.php?id=<?= $article['id_article'] ?>">Remove</a>
    <a href="edit.php?id=<?= $article['id_article'] ?>">Edit</a>
  </div>

</div>
<hr>
<a href="index.php">Move to main page</a>