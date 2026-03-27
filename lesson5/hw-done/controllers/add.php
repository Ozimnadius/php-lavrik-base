<?php
declare(strict_types=1);
include_once 'core/arr.php';
include_once 'model/articles.php';
include_once 'model/categories.php';

$categories = getAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = extractFields($_POST, ['title', 'content', 'id_category']);
  $validateErrors = articleValidate($fields);

  if (empty($validateErrors)) {
    $id = addArticle($fields);
    header("Location: index.php?c=article&id=$id");
    exit();
  }
} else {
  $fields = [
    'title' => '',
    'id_category' => '',
    'content' => '',
  ];
  $validateErrors = [];
}

include 'views/add.php';
?>
