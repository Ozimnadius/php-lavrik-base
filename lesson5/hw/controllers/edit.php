<?php
declare(strict_types=1);
include_once('core/arr.php');
include_once('model/categories.php');
include_once('model/articles.php');


$id = (int)($_GET['id'] ?? '');
$post = getArticleById($id);
$categories = getAllCategories();
$hasPost = ($post !== false);

if (!$hasPost) {
  header('HTTP/1.1 404 Not Found');
  include('views/errors/v_404.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = extractFields($_POST, ['title', 'content', 'id_category']);
  $fields['id_article'] = $id;
  $validateErrors = articleValidate($fields);

  if (empty($validateErrors)) {
    editArticle($fields);
    header("Location: index.php?c=article&id=$id");
    exit();
  }
} else{
  $fields = extractFields($post, ['title', 'content', 'id_category']);
  $validateErrors = [];
}

include('views/edit.php');

?>
