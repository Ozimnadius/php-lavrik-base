<?php
declare(strict_types=1);

$id = (int)($_GET['id'] ?? '');
$article = getArticleById($id);

if ($article) {
  $pageTitle = 'Удаление статьи';
  $pageContent = template("article/delete", [
    'deleted' => deleteArticle($id)
  ]);

} else {
  header('HTTP/1.1 404 Not Found');
  $pageContent = template('errors/v_404');
}

?>
