<?php
declare(strict_types=1);
include_once('model/db.php');

/**
 * Возвращает все категории из базы данных
 * 
 * @return array Массив категорий, отсортированных по имени
 */
function getAllCategories(): array {
  $sql = "SELECT * FROM categories ORDER BY name ASC;";
  $query = dbQuery($sql);
  return $query->fetchAll();
}

/**
 * Возвращает категорию по её slug (человеко-понятный URL)
 * 
 * @param string $slug Slug категории
 * @return array|false Массив данных категории или false если не найдена
 */
function getCategoryBySlug(string $slug): array|false {
  $sql = "SELECT * FROM categories WHERE slug = :slug;";
  $query = dbQuery($sql, ['slug' => $slug]);
  return $query->fetch();
}
