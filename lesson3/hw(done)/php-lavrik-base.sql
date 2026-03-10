-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2024 г., 14:07
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 7.4.30

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
  `id_article` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_category` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `dt`, `id_user`, `id_category`) VALUES
(1, 'Первая статья', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:50:59', 1, 4),
(2, 'Вторая статья модератора', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:50:59', 2, 1),
(3, 'Третья статья модератора', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:51:38', 2, 2),
(4, 'Четвертая статья', 'Voluptate excepteur elit labore irure commodo voluptate quis fugiat culpa cupidatat. Et id aute laboris veniam aute irure est reprehenderit commodo cupidatat fugiat ullamco. Excepteur voluptate occaecat tempor ea. Magna ex id dolor amet velit. Magna anim ipsum ipsum exercitation amet quis id enim dolor.\r\nAliquip incididunt duis labore tempor deserunt culpa qui ut officia qui enim eu Lorem. Qui anim exercitation tempor labore incididunt ullamco commodo ad duis nisi nisi. Occaecat ut culpa velit consequat. Sit aliquip aute non excepteur tempor laboris pariatur.', '2024-10-28 10:51:38', 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `article_tags`
--

CREATE TABLE `article_tags` (
  `id_article` int(11) UNSIGNED NOT NULL,
  `id_tag` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `article_tags`
--

INSERT INTO `article_tags` (`id_article`, `id_tag`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `title`, `url`) VALUES
(1, 'Спорт', ''),
(2, 'Образование', ''),
(3, 'Здоровье', ''),
(4, 'Новости', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id_tag`, `title`, `url`) VALUES
(1, 'Травмы', ''),
(2, 'Победы', ''),
(3, 'Праздник', ''),
(4, 'Победа', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `dt`) VALUES
(1, 'Админ', '123456', '2024-10-28 10:47:42'),
(2, 'Модератор', '654321', '2024-10-28 10:47:42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `category_id` (`id_category`);

--
-- Индексы таблицы `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id_article`,`id_tag`),
  ADD KEY `tag_id` (`id_tag`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Ограничения внешнего ключа таблицы `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `article_tags_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `article_tags_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
