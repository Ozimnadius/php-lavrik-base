<?php
declare(strict_types=1);
include_once 'core/arr.php';
include_once 'model/categories.php';
include_once 'model/articles.php';


$id = (int)($_GET['id'] ?? '');
$article = getArticleById($id);
$categories = getAllCategories();

if ($article === false) {
  show404();
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
} else {
  $fields = extractFields($article, ['title', 'content', 'id_category']);
  $validateErrors = [];
}

include 'views/edit.php';

?>
