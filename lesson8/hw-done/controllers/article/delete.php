<?php
declare(strict_types=1);

$id = (int)URL_PARAMS['id'];
$article = getArticleById($id);

if ($article && (int)$article['id_user'] !== (int)$user['id_user']) {
  extract(make404Response());
  return;
}


if ($article) {
  $pageTitle = 'Удаление статьи';
  $pageContent = template('common/delete_result', [
    'deleted' => deleteArticle($id),
    'entityName' => 'Статья'
  ]);


} else {
  extract(make404Response());
}
