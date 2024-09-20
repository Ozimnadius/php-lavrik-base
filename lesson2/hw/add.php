<?php
declare(strict_types=1);
include_once('model/articles.php');
include_once('model/logs.php');

addLog();

$isAdded = false;
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title === '' || $content === '') {
        $err = 'Заполните все поля!';
    } else if (mb_strlen($title, 'UTF8') < 2) {
        $err = 'Заголовок не короче 2 символов!';
    } else {
        $isAdded = addArticle($title, $content);
    }
} else {
    $title = '';
    $content = '';
}

?>
<div class="form">
    <? if ($isAdded): ?>
        <p>Article added!</p>
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
</div>
<hr>
<a href="index.php">Move to main page</a>