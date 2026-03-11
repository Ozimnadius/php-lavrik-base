<?php
declare(strict_types=1);
include_once('model/articles.php');
include_once('model/categories.php');

$categories = getAllCategories();
$fields = [
  'title' => '',
  'id_category' => '',
  'content' => '',
  'slug' => ''
];
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields['title'] = trim($_POST['title']);
  $fields['id_category'] = trim($_POST['id_category']);
  $fields['content'] = trim($_POST['content']);
  $fields['slug'] = trim($_POST['slug']);

  if ($fields['name'] === '' || $fields['text'] === '' || $fields['id_category'] === '' || $fields['slug'] === '') {
    $err = 'Заполните все поля!';
  } else {
    addArticle($fields);
    header('Location: index.php');
    exit();
  }
}

?>
<form method="post">
  Заголовок:<br>
  <input type="text"
         name="title"
         value="<?= $fields['title'] ?>"
  >
  <br>
  Категория:<br>
  <select name="id_category">
    <? foreach ($categories as $category): ?>
      <option <? if ($fields['id_category'] == $category['id_category']): ?>selected<? endif; ?>
              value="<?= $category['id_category']
              ?>"
      >
        <?= $category['name'] ?>
      </option>
    <? endforeach; ?>
  </select>
  <br>
  URL:<br>
  <input type="text"
         name="slug"
         value="<?= $fields['slug'] ?>"
  >
  <br>
  Content:<br>
  <textarea name="content"
            id=""
            cols="30"
            rows="10"
  ><?= $fields['content'] ?></textarea>
  <button>Send</button>
  <p><?= $err ?></p>
</form>