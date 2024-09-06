<?php
declare(strict_types=1);
include_once('functions.php');

$articles = getArticles();

$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;
$hasPost = ($post !== null);

?>
<? if ($hasPost): ?>
    <? $isDeleted = removeArticle($id); ?>
    <? if ($isDeleted): ?>
        <h1>Deleted</h1>
    <? else: ?>
        <h1>Not Deleted</h1>
    <? endif; ?>
<? else: ?>
    <h1>Error!</h1>
<? endif; ?>

<hr>
<a href="index.php">Move to main page</a>