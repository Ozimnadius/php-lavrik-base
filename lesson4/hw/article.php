<?php
declare(strict_types=1);
include_once('model/articles.php');

$hasPost = true;
$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
  // Перенаправляем на главную страницу
  header('Location: index.php');
  exit();
}

$article = getArticlesBySlug($slug);
if (!$article) {
  $hasPost = false;
}

?>
<div class="content">
  <? if ($hasPost): ?>
    <div class="article">
      <h1><?= $article['title'] ?></h1>
      <div><?= $article['content'] ?></div>
      <hr>
      <a href="delete.php?id=<?= $article['id_article'] ?>">Remove</a>
      <a href="edit.php?id=<?= $article['id_article'] ?>">Edit</a>
    </div>
  <? else: ?>
    <div class="e404">
      <h1>Not found!</h1>
    </div>
  <? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>