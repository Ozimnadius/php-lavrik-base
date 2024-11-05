-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 12 2020 г., 17:35
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
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_message`, `name`, `text`, `dt_add`, `status`) VALUES
(1, '3234', '324324', '2020-02-12 11:48:16', 0),
(2, 'Dmitry', '34324', '2020-02-12 11:51:39', 0),
(3, 'rtetre', '43543543', '2020-02-12 11:52:05', 0),
(4, 'rtetre', '43543543', '2020-02-12 11:52:30', 0),
(5, 'rtetre', '43543543', '2020-02-12 11:52:31', 0),
(6, 'werewr', '3432432', '2020-02-12 11:53:03', 0),
(7, '', '', '2020-02-12 11:56:42', 0),
(8, '45435', 'rtreter', '2020-02-12 11:57:00', 0),
(9, 'rftre', 'tretre', '2020-02-12 12:12:34', 0),
(10, '546', '546', '2020-02-12 13:03:01', 0),
(11, '546', '546546', '2020-02-12 13:11:05', 0),
(12, '345', '43534', '2020-02-12 13:12:53', 0),
(13, '32432', '4324', '2020-02-12 13:57:57', 0);

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
  MODIFY `id_message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
