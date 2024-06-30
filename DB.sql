-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 30 2024 г., 18:21
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testlard`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `name`, `text`, `datetime`) VALUES
(30, 'Владимир', 'Хорошая статья, рекомендую к ознакомлению', '30.06.2024 18:06'),
(31, 'Иванов Иван Иванович', 'Есть в статье противоречия!', '30.06.2024 18:07');

-- --------------------------------------------------------

--
-- Структура таблицы `subcomment`
--

CREATE TABLE `subcomment` (
  `id` int(255) NOT NULL,
  `idcomment` int(255) NOT NULL,
  `name` text NOT NULL,
  `text` text NOT NULL,
  `datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `subcomment`
--

INSERT INTO `subcomment` (`id`, `idcomment`, `name`, `text`, `datetime`) VALUES
(27, 30, 'Сергей', 'Подтверждаю!', '30.06.2024 18:06'),
(28, 31, 'Дмитрий', 'Не соглашусь!!', '30.06.2024 18:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcomment`
--
ALTER TABLE `subcomment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `subcomment`
--
ALTER TABLE `subcomment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
