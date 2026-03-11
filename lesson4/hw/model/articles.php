<?php
declare(strict_types=1);
include_once('model/db.php');

function getArticlesByCategoryId(int $id): array {
  $sql = "SELECT * FROM articles WHERE id_category = :id_category ORDER BY created_at DESC;";
  $query = dbQuery($sql, ['id_category' => $id]);
  return $query->fetchAll();
}

function getArticlesBySlug(string $slug): array|false {
  $sql = "SELECT * FROM articles WHERE slug = :slug;";
  $query = dbQuery($sql, ['slug' => $slug]);
  return $query->fetch();
}

function getArticleById(int $id): array|false {
  $sql = "SELECT * FROM articles WHERE id_article = :id_article;";
  $query = dbQuery($sql, ['id_article' => $id]);
  return $query->fetch();
}

function deleteArticle(int $id): bool {
  $sql = "DELETE FROM articles WHERE id_article = :id_article;";
  $query = dbQuery($sql, ['id_article' => $id]);
  return $query->rowCount() > 0;
}

function editArticle(array $fields): bool {
  $sql = "UPDATE articles SET id_category = :id_category, title = :title, slug = :slug, content = :content WHERE id_article = :id_article;";
  $query = dbQuery($sql, $fields);
  return true;
}

function addArticle(array $fields): bool {
  $sql = "INSERT articles (id_category, title, slug, content) VALUES (:id_category, :title, :slug, :content);";
  dbQuery($sql, $fields);
  return true;
}
