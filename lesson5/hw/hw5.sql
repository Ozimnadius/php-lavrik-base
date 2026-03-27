-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2026 г., 15:51
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hw5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id_article` int UNSIGNED NOT NULL,
  `id_category` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `id_category`, `title`, `slug`, `content`, `created_at`) VALUES
(1, 1, 'Основы PHP для начинающих', 'osnovy-php-dlya-nachinayushchih', 'PHP — это серверный язык программирования, который часто используется для создания сайтов и веб-приложений. В этой статье рассмотрены базовые конструкции языка: переменные, типы данных, условные операторы, циклы и функции.', '2026-03-10 13:44:25'),
(2, 2, 'Как работать с MySQL в PHP', 'kak-rabotat-s-mysql-v-php', 'Для работы с MySQL в PHP чаще всего используют расширение PDO или mysqli. В статье показано, как создать подключение, выполнить SELECT, INSERT, UPDATE и DELETE-запросы, а также обработать ошибки.', '2026-03-10 13:44:25'),
(3, 3, 'Что такое адаптивная вёрстка', 'chto-takoe-adaptivnaya-verstka', 'Адаптивная вёрстка позволяет странице корректно отображаться на устройствах с разной шириной экрана. Обычно для этого используют media queries, гибкие сетки, относительные единицы измерения и современные CSS-инструменты.', '2026-03-10 13:44:25'),
(4, 4, 'Роутинг и структура backend-приложения', 'routing-i-struktura-backend-prilozheniya', 'В backend-приложении важно правильно организовать структуру файлов, маршрутизацию, контроллеры и работу с данными. Такой подход упрощает поддержку проекта и делает код более понятным.', '2026-03-10 13:44:25'),
(5, 1, 'Переменные и типы данных в PHP', 'peremennye-i-tipy-dannyh-v-php', 'В этой статье рассмотрены основные типы данных в PHP, работа с переменными, строками, числами и логическими значениями.', '2026-03-10 13:48:20'),
(6, 1, 'Условные операторы и циклы в PHP', 'uslovnye-operatory-i-cikly-v-php', 'Разбираем конструкции if, else, elseif, switch, а также циклы for, while и foreach на простых примерах.', '2026-03-10 13:48:20'),
(9, 3, 'Основы HTML для создания страниц', 'osnovy-html-dlya-sozdaniya-stranic', 'Краткое введение в HTML: структура документа, заголовки, абзацы, ссылки, изображения и списки.', '2026-03-10 13:48:20'),
(10, 3, 'Что такое CSS и как подключить стили', 'chto-takoe-css-i-kak-podklyuchit-stili', 'Рассматриваем способы подключения CSS, базовые свойства оформления и работу с классами и селекторами.', '2026-03-10 13:48:20'),
(11, 4, 'Что делает backend-разработчик', 'chto-delaet-backend-razrabotchik', 'Разбираем задачи backend-разработки: обработка запросов, работа с базой данных, бизнес-логика и безопасность.', '2026-03-10 13:48:20'),
(12, 4, 'Как устроено взаимодействие клиента и сервера', 'kak-ustroeno-vzaimodejstvie-klienta-i-servera', 'В статье объясняется, как браузер отправляет запросы на сервер, как сервер их обрабатывает и возвращает ответ.', '2026-03-10 13:48:20'),
(13, 2, 'Tempor explicabo Co', 'Rem id ullamco maxi', 'Harum esse et tempor', '2026-03-11 08:42:11'),
(14, 3, 'Dignissimos eiusmod', 'Expedita nesciunt n', 'Non et assumenda qua', '2026-03-11 11:32:18'),
(15, 2, 'Proident maxime par', 'Sequi enim sint porr', 'Temporibus neque qui', '2026-03-11 11:32:32'),
(16, 1, 'Ut delectus laboris', 'Dicta non harum sed', 'In nobis nulla maior', '2026-03-11 11:34:17'),
(18, 3, 'Perferendis rerum pr', 'Eum mollitia id inc', 'Ducimus eum sed off', '2026-03-27 07:36:17'),
(19, 1, 'Consequuntur est do', NULL, 'Elit qui incididunt', '2026-03-27 09:33:23'),
(20, 1, 'Quia omnis adipisici', NULL, 'Consequatur ut quibu', '2026-03-27 09:33:44'),
(21, 2, 'Quis alias non sed a', NULL, 'Culpa sunt natus adi', '2026-03-27 09:33:58'),
(22, 1, 'Deserunt autem ullam', NULL, 'Voluptatem consequat', '2026-03-27 09:41:36'),
(23, 3, 'Ea quam soluta qui s', NULL, 'Atque irure eum aut', '2026-03-27 09:41:47'),
(24, 1, 'Ea sint vel vel in', NULL, 'Fugiat irure amet', '2026-03-27 10:29:12');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `slug`, `created_at`) VALUES
(1, 'PHP', 'php', '2026-03-10 13:44:25'),
(2, 'MySQL', 'mysql', '2026-03-10 13:44:25'),
(3, 'Frontend', 'frontend', '2026-03-10 13:44:25'),
(4, 'Backend', 'backend', '2026-03-10 13:44:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `uq_articles_slug` (`slug`),
  ADD KEY `idx_articles_id_category` (`id_category`),
  ADD KEY `idx_articles_created_at` (`created_at`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `uq_categories_name` (`name`),
  ADD UNIQUE KEY `uq_categories_slug` (`slug`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
