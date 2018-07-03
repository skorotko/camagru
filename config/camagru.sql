-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 02 2018 г., 04:11
-- Версия сервера: 5.7.22
-- Версия PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `camagru`
--
CREATE DATABASE IF NOT EXISTS `camagru` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `camagru`;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(128) NOT NULL,
  `path` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `comment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `path`, `login`, `comment`) VALUES
(6, '/images_users/5b30e1a770467.jpeg', 'skorotko', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;fdssdf&lt;p&gt;'),
(7, '/images_users/5b30e1a770467.jpeg', 'skorotko', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;sdads&lt;p&gt;'),
(8, '/images_users/5b30e1a770467.jpeg', 'skorotko', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;dsaads&lt;p&gt;'),
(9, '/images_users/5b30e1a770467.jpeg', 'skorotko', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;1&lt;p&gt;'),
(10, '/images_users/5b30e1a770467.jpeg', 'skorotko', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;2&lt;p&gt;'),
(11, '/images_users/5b30e1a770467.jpeg', 'skorotko', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;ads&lt;p&gt;'),
(12, '/images_users/5b390a05be232.jpeg', 'dominator', '&lt;b&gt;&lt;p align=\'left\'&gt;dominator:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;длддол&lt;p&gt;'),
(13, '/images_users/5b39fa712f560.jpeg', 'skorotko1', '&lt;b&gt;&lt;p align=\'left\'&gt;skorotko1:&lt;p&gt;&lt;/b&gt;&lt;p align=\'left\'&gt;&lt;script type=\'text/javascript\'&gt;alert(\'THE GAME\');&lt;/script&gt;&lt;p&gt;');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(128) NOT NULL,
  `path` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `path`, `login`) VALUES
(1, '/images_users/5b30d70fd650e.jpeg', 'vase'),
(2, '/images_users/5b30d70fd650e.jpeg', 'petya'),
(4, '/images_users/5b30d70fd650e.jpeg', 'vital'),
(9, '/images_users/5b30e1a770467.jpeg', 'skorotko');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(128) NOT NULL,
  `photo_name` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `likes` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `photo_name`, `login`, `likes`) VALUES
(91, '/images_users/5b39009a9d21e.jpeg', 'skorotko', 0),
(92, '/images_users/5b3909f0d5e93.jpeg', 'skorotko', 0),
(93, '/images_users/5b3909f9e187b.jpeg', 'skorotko', 0),
(94, '/images_users/5b390a05be232.jpeg', 'skorotko', 0),
(95, '/images_users/5b390a0e56557.jpeg', 'skorotko', 0),
(98, '/images_users/5b39fa712f560.jpeg', 'lol', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `email` varchar(256) NOT NULL,
  `f_s_name` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `rep_pass` varchar(256) NOT NULL,
  `verif_reg` varchar(256) DEFAULT NULL,
  `access_reg` int(6) NOT NULL,
  `notification` int(128) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `f_s_name`, `login`, `pass`, `rep_pass`, `verif_reg`, `access_reg`, `notification`) VALUES
(8, 'forjobaccss4@gmail.com', 'vitalii sarapin', 'dominator', '$2y$10$ybFkSqk.O.HY37XnoYz8yeSq5IaXcRQy1QaYpa6G/A9DoJCgvNPcO', '$2y$10$riTGjLUJLQzHkPKAECro4u4nBk2raR.3Isg3aGyxDdDPuVVbNpAAy', NULL, 1, 1),
(9, 'korotkovsergey96@gmail.com', 'Коротков Сергей', 'skorotko1', '$2y$10$98uoO.JmapnVKlV9kSUawOgVn4dPPFU0AKZIEo8uQko9vtaBJSNTO', '$2y$10$pVATcADwyt5gyClvmL7PK.s9iA/QXTG2bUHHykQMjRUemLnh5SFgC', '4e0114dcb63046c3a7700b132ddc82da', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
