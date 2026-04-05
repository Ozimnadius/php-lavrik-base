<?php
declare(strict_types=1);

$id = (int)($_GET['id'] ?? '');
$article = getArticleById($id);
$categories = getAllCategories();

if ($article === false) {
  header('HTTP/1.1 404 Not Found');
  $pageContent = template('errors/v_404');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fields = extractFields($_POST, ['title', 'content', 'id_category']);
  $validateErrors = articleValidate($fields);

  if (empty($validateErrors)) {
    editArticle($id, $fields);
    header("Location: index.php?c=article&id=$id");
    exit();
  }
} else {
  $fields = extractFields($article, ['title', 'content', 'id_category']);
  $validateErrors = [];
}

$pageTitle = 'Edit article';
$pageContent = template('article/edit', [
  'fields' => $fields,
  'categories' => $categories,
  'validateErrors' => $validateErrors
]);
?>
