-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 27 2020 г., 16:35
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php1simple`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id_message` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `dt_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_message`, `name`, `text`, `dt_add`, `status`, `id_cat`) VALUES
(1, 'Nmae', 'test one!!!!', '2020-02-26 12:31:57', 0, 0),
(2, 'Name', 'test two!!!!', '2020-02-26 12:32:03', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
