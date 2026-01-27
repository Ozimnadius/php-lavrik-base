<?php
// your functions may be here

/* start --- black box */
/**
 * Получить все статьи из базы данных.
 *
 * @return array Массив, содержащий все статьи. Каждая статья представлена в виде ассоциативного
 * массива, где ключ - это идентификатор статьи, а значение - это сама статья.
 */
function getArticles(): array {
  return json_decode(file_get_contents('db/articles.json'), true);
}

/**
 * Добавить новую статью в базу данных.
 *
 * @param string $title Заголовок статьи.
 * @param string $content Содержимое статьи.
 * @return bool Возвращает true, если статья успешно добавлена, и false в противном случае.
 */
function addArticle(string $title, string $content): bool {
  $articles = getArticles();

  $lastId = end($articles)['id'];
  $id = $lastId + 1;

  $articles[$id] = [
    'id' => $id,
    'title' => $title,
    'content' => $content
  ];

  saveArticles($articles);
  return true;
}

/**
 * Удалить статью из базы данных.
 *
 * @param int $id Идентификатор статьи.
 * @return bool Возвращает true, если статья успешно удалена, и false в противном случае.
 */
function removeArticle(int $id): bool {
  $articles = getArticles();

  if (isset($articles[$id])) {
    unset($articles[$id]);
    saveArticles($articles);
    return true;
  }

  return false;
}

/**
 * Сохранить статьи в базе данных.
 *
 * @param array $articles Массив, содержащий статьи. Каждая статья представлена в виде ассоциативного
 * массива, где ключ - это идентификатор статьи, а значение - это сама статья.
 * @return bool Возвращает true, если статьи успешно сохранены, и false в противном случае.
 */
function saveArticles(array $articles): bool {
  file_put_contents('db/articles.json', json_encode($articles));
  return true;
}

/**
 * Изменить статью в базе данных.
 *
 * @param int $id Идентификатор статьи.
 * @param string $title Заголовок статьи.
 * @param string $content Содержимое статьи.
 * @return bool Возвращает true, если статья успешно изменена, и false в противном случае.
 */
function editArticle(int $id, string $title, string $content): bool {
  $articles = getArticles();
  $article = $articles[$id];

  if (!isset($article)) return false;

  $articles[$id] = [
    'id' => $id,
    'title' => $title,
    'content' => $content
  ];
  saveArticles($articles);
  return true;
}

/* end --- black box */