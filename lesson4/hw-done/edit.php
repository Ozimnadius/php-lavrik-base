<?php
declare(strict_types=1);
include_once('model/categories.php');
include_once('model/articles.php');


$id = (int) ($_GET['id'] ?? '');
$post = getArticleById($id);
$categories = getAllCategories();
$hasPost = ($post !== null);
$fields = [
  'id_article' => $id,
  'title' => '',
  'id_category' => '',
  'content' => '',
  'slug' => ''
];
$isChanged = false;
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields['title'] = trim($_POST['title']);
  $fields['id_category'] = trim($_POST['id_category']);
  $fields['content'] = trim($_POST['content']);
  $fields['slug'] = trim($_POST['slug']);

  if ($fields['title'] === '' || $fields['content'] === '' || $fields['slug'] === '' || $fields['id_category'] === '') {
    $err = 'Заполните все поля!';
  } else {
    $isChanged = editArticle($fields);
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
        <input type="text"
               name="title"
               value="<?= $post['title'] ?>"
        >
        <br>
        Категория:<br>
        <select name="category"

        >
          <? foreach ($categories as $category): ?>
            <option <? if ($post['id_category'] == $category['id_category']): ?>selected<? endif; ?>
                    value="<?= $category['id_category']
                    ?>"
            ><?= $category['name']
              ?></option>
          <? endforeach; ?>
        </select>
        <br>
        URL:<br>
        <input type="text"
               name="slug"
               value="<?= $post['slug'] ?>"
        >
        <br>
        Content:<br>
        <textarea name="content"
                  id=""
                  cols="30"
                  rows="10"
        ><?= $post['content'] ?></textarea>
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