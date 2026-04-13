<?php
declare(strict_types=1);

$id = (int)URL_PARAMS['id'];
$category = getCategoryById($id);

if ($category && (int)$category['id_user'] !== (int)$user['id_user']) {
  extract(make404Response());
  return;
}


if ($category) {
  $pageTitle = 'Удаление категории';
  $pageContent = template('common/delete_result', [
    'deleted' => deleteCategory($id),
    'entityName' => 'Категория'
  ]);

} else {
  extract(make404Response());
}
