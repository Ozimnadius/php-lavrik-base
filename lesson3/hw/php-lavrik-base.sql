-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2024 г., 13:54
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-lavrik-base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `dt`, `user_id`, `category_id`) VALUES
(1, 'Первая статья', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:50:59', 1, 4),
(2, 'Вторая статья модератора', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:50:59', 2, 1),
(3, 'Третья статья модератора', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:51:38', 2, 2),
(4, 'Четвертая статья', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:51:38', 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `article_tags`
--

CREATE TABLE `article_tags` (
  `article_id` int(11) UNSIGNED NOT NULL,
  `tag_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `article_tags`
--

INSERT INTO `article_tags` (`article_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Спорт'),
(2, 'Образование'),
(3, 'Здоровье'),
(4, 'Новости');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`tag_id`, `name`) VALUES
(1, 'Травмы'),
(2, 'Победы'),
(3, 'Праздник'),
(4, 'Победа');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `dt`) VALUES
(1, 'Админ', '123456', '2024-10-28 10:47:42'),
(2, 'Модератор', '654321', '2024-10-28 10:47:42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `article_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
