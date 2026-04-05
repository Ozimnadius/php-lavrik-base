<?php
declare(strict_types=1);

$id = (int)($_GET['id'] ?? '');
$article = getArticleById($id);


if ($article) {
  $menu = template('article/menu', [
    'article' => $article,
  ]);

  $content = template('article/index', [
    'article' => $article,
    'category' => getCategoryById($article['id_category']),
  ]);

  $pageTitle = $article['title'];
  $pageContent = template('base/v_con2col', [
    'left' => $menu,
    'content' => $content,
  ]);

} else {
  header('HTTP/1.1 404 Not Found');
  $pageContent = template('errors/v_404');
}

?>
