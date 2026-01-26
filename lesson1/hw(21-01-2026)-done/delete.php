<?php
declare(strict_types=1);

include_once('functions.php');
$articles = getArticles();
$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;
$hasPost = ($post !== null);

if ($hasPost):?>
  <? if (removeArticle($id)): ?>
    <p>Article deleted successfully!</p>
  <? else: ?>
    <p>Article not deleted!</p>
  <? endif; ?>
<? else: ?>
  <p>Article not found!</p>
<? endif; ?>

<hr>
<a href="index.php">Move to main page</a>