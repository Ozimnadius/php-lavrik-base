<?php
declare(strict_types=1);
include_once('model/categories.php');
include_once('model/articles.php');

$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
  // Перенаправляем на главную страницу
  header('Location: index.php');
  exit();
}

$category = getCategoryBySlug($slug);
$rows = getArticlesByCategoryId((int)$category['id_category']);
?>

<div class="articles">
  <h1><?=$category['name'] ?></h1>
  <div class="articles__list">
    <? foreach ($rows as $row): ?>
      <a href="article.php?slug=<?= $row['slug'] ?>"
         class="articles__item"
      >
        <h3><?= $row['title'] ?></h3>
      </a>
    <? endforeach; ?>
  </div>
</div>
<hr>
<a href="index.php">Move to main page</a>