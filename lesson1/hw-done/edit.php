<?php
declare(strict_types=1);
include_once('functions.php');

$articles = getArticles();
$id = (int)($_GET['id'] ?? '');
$post = $articles[$id] ?? null;
$hasPost = ($post !== null);

$title = $post['title'] ?? '';
$content = $post['content'] ?? '';

$isChanged = false;
$err = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title === '' || $content === '') {
        $err = 'Заполните все поля!';
    } else if (mb_strlen($title, 'UTF8') < 2) {
        $err = 'Заголовок не короче 2 символов!';
    } else {
        $isChanged = editArticle($id,$title, $content);
    }
}

?>
<div class="form">
    <? if ($hasPost): ?>
        <? if ($isChanged): ?>
            <h1>Article changed!</h1>
        <? else: ?>
            <form method="post">
                Заголовок:<br>
                <input type="text" name="title" value="<?= $title ?>"><br>
                Content:<br>
                <textarea name="content" id="" cols="30" rows="10"><?= $content ?></textarea>
                <button>Send</button>
                <p><?= $err ?></p>
            </form>
        <? endif; ?>
    <? else: ?>
        <div class="e404">
            <h1>Not found!</h1>
        </div>
    <? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>