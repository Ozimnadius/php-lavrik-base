<?php
declare(strict_types=1);
include_once('model/db.php');

function getAllCategories(): array {
  $sql = "SELECT * FROM categories ORDER BY name ASC;";
  $query = dbQuery($sql);
  return $query->fetchAll();
}

function getCategoryBySlug(string $slug): array|false {
  $sql = "SELECT * FROM categories WHERE slug = :slug;";
  $query = dbQuery($sql, ['slug' => $slug]);
  return $query->fetch();
}
