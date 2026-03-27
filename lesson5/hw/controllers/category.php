<?php
declare(strict_types=1);
include_once('model/categories.php');
include_once('model/articles.php');

$id = $_GET['id'] ?? '';
$category = getCategoryById($id);
if (!$category) {
  header('HTTP/1.1 404 Not Found');
  include('views/errors/v_404.php');
} else{
  $rows = getArticlesByCategoryId((int)$category['id_category']);
  include('views/category.php');
}




?>


