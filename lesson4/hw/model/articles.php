<?php
declare(strict_types=1);
include_once('model/db.php');

function getArticlesByCategory(int $id): array {
  $sql = "SELECT * FROM articles WHERE id_category = :id_category ORDER BY created_at DESC;";
  $query = dbQuery($sql, ['id_category' => $id]);
  return $query->fetchAll();
}
