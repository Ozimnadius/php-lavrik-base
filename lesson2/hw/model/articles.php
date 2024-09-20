<?php
declare(strict_types=1);


/**
 * Retrieves all articles from the JSON file 'db/articles.json'.
 *
 * @return array An associative array containing all articles with their respective IDs, titles, and contents.
 */
function getArticles(): array
{
    return json_decode(file_get_contents('db/articles.json'), true);
}

/**
 * Adds a new article to the database.
 *
 * @param string $title The title of the new article.
 * @param string $content The content of the new article.
 *
 * @return bool True if the article was successfully added, false otherwise.
 */
function addArticle(string $title, string $content): bool
{
    $articles = getArticles();

    $lastId = end($articles)['id'];
    $id = $lastId + 1;

    $articles[$id] = [
        'id' => $id,
        'title' => $title,
        'content' => $content
    ];

    return saveArticles($articles);
}

/**
 * Edits an existing article in the database.
 *
 * @param int $id The unique identifier of the article to be edited.
 * @param string $title The new title of the article.
 * @param string $content The new content of the article.
 *
 * @return bool True if the article was successfully edited, false otherwise.
 */
function editArticle(int $id, string $title, string $content): bool
{
    $articles = getArticles();

    $articles[$id] = [
        'id' => $id,
        'title' => $title,
        'content' => $content
    ];

    return saveArticles($articles);
}

/**
 * Removes an article from the database by its unique identifier.
 *
 * @param int $id The unique identifier of the article to be removed.
 *
 * @return bool True if the article was successfully removed, false otherwise.
 */
function removeArticle(int $id): bool
{
    $articles = getArticles();

    if (isset($articles[$id])) {
        unset($articles[$id]);
        return saveArticles($articles);
    }

    return false;
}

/**
 * Saves the provided articles to the JSON file 'db/articles.json'.
 *
 * @param array $articles An associative array containing all articles with their respective IDs, titles, and contents.
 *
 * @return bool True if the articles were successfully saved, false otherwise.
 */
function saveArticles(array $articles): bool
{
    return (bool)file_put_contents('db/articles.json', json_encode($articles));
}
