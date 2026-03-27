<?php
declare(strict_types=1);
include_once 'model/categories.php';
include_once 'model/articles.php';

$id = $_GET['id'] ?? '';
$category = getCategoryById($id);
if (!$category) {
  show404();
}

$rows = getArticlesByCategoryId((int)$category['id_category']);
include 'views/category.php';


?>


