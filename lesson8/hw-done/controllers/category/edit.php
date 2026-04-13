<?php
declare(strict_types=1);

$id = (int)URL_PARAMS['id'];
$category = getCategoryById($id);

if ($category && (int)$category['id_user'] !== (int)$user['id_user']) {
  extract(make404Response());
  return;
}


if ($category) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = categoryFields($_POST);
    $validateErrors = categoryValidate($fields);

    if (empty($validateErrors)) {
      editCategory($id, $fields);
      header("Location:" . BASE_URL . "category/$id");
      exit();
    }
  } else {
    $fields = categoryFields($category);
    $validateErrors = [];
  }

  $pageTitle = 'Edit category';
  $fieldsContent = template('category/_fields', [
    'fields' => $fields
  ]);
  $pageContent = template('common/form_layout', [
    'fieldsContent' => $fieldsContent,
    'validateErrors' => $validateErrors
  ]);

} else {
  extract(make404Response());
}
