CREATE
DATABASE IF NOT EXISTS blog_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_0900_ai_ci;

USE
blog_db;

SET
FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS categories;

SET
FOREIGN_KEY_CHECKS = 1;

-- =========================
-- Таблица категорий
-- =========================
CREATE TABLE categories
(
    id_category INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name        VARCHAR(100) NOT NULL,
    slug        VARCHAR(120) NOT NULL,
    created_at  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_category),
    UNIQUE KEY uq_categories_name (name),
    UNIQUE KEY uq_categories_slug (slug)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_0900_ai_ci;

-- =========================
-- Таблица статей
-- =========================
CREATE TABLE articles
(
    id_article  INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_category INT UNSIGNED NOT NULL,
    title       VARCHAR(255) NOT NULL,
    slug        VARCHAR(255) NOT NULL,
    content     TEXT         NOT NULL,
    created_at  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_article),
    UNIQUE KEY uq_articles_slug (slug),
    KEY         idx_articles_id_category (id_category),
    KEY         idx_articles_created_at (created_at),
    CONSTRAINT fk_articles_category
        FOREIGN KEY (id_category)
            REFERENCES categories (id_category)
            ON UPDATE CASCADE
            ON DELETE RESTRICT
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_0900_ai_ci;

-- =========================
-- Категории
-- =========================
INSERT INTO categories (name, slug)
VALUES ('PHP', 'php'),
       ('MySQL', 'mysql'),
       ('Frontend', 'frontend'),
       ('Backend', 'backend');

-- =========================
-- Статьи
-- =========================
INSERT INTO articles (id_category, title, slug, content)
VALUES (1,
        'Основы PHP для начинающих',
        'osnovy-php-dlya-nachinayushchih',
        'PHP — это серверный язык программирования, который часто используется для создания сайтов и веб-приложений. В этой статье рассмотрены базовые конструкции языка: переменные, типы данных, условные операторы, циклы и функции.'),
       (2,
        'Как работать с MySQL в PHP',
        'kak-rabotat-s-mysql-v-php',
        'Для работы с MySQL в PHP чаще всего используют расширение PDO или mysqli. В статье показано, как создать подключение, выполнить SELECT, INSERT, UPDATE и DELETE-запросы, а также обработать ошибки.'),
       (3,
        'Что такое адаптивная вёрстка',
        'chto-takoe-adaptivnaya-verstka',
        'Адаптивная вёрстка позволяет странице корректно отображаться на устройствах с разной шириной экрана. Обычно для этого используют media queries, гибкие сетки, относительные единицы измерения и современные CSS-инструменты.'),
       (4,
        'Роутинг и структура backend-приложения',
        'routing-i-struktura-backend-prilozheniya',
        'В backend-приложении важно правильно организовать структуру файлов, маршрутизацию, контроллеры и работу с данными. Такой подход упрощает поддержку проекта и делает код более понятным.');