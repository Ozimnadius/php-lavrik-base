<?php
declare(strict_types=1);
include_once 'core/db.php';

/**
 * Возвращает все категории из базы данных
 *
 * @return array Массив категорий, отсортированных по имени
 */
function getAllCategories(): array
{
  $sql = "SELECT * FROM categories ORDER BY name ASC;";
  $query = dbQuery($sql);
  return $query->fetchAll();
}

/**
 * Возвращает категорию по её id
 *
 * @param string $id ID категории
 * @return array|false Массив данных категории или false если не найдена
 */
function getCategoryById(string $id): array|false
{
  $sql = "SELECT * FROM categories WHERE id_category = :id;";
  $query = dbQuery($sql, ['id' => $id]);
  return $query->fetch();
}
