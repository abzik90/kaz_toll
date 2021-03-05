-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 04 2021 г., 19:49
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kaztoll`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `author` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `link` varchar(512) NOT NULL,
  `date` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `author`, `text`, `link`, `date`) VALUES
(17, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/c5ea32a7739b2776e4945aa8beea3d4ce2287ebf.jpg', 1614816236),
(16, 'admin@kaztoll.com', 'testing feedback', '', 1614815979),
(15, 'admin@kaztoll.com', 'testing feedback', '', 1614815957),
(18, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/1ac85d96caf3c635f57d0dd58d861157f68031f2.jpg', 1614816717),
(19, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/f1f008ebab6958fb7a4432f799bfdc3a29c3d166.jpg', 1614817756),
(20, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/ca06e13665ef06950358f18a244ee90d26334966.jpg', 1614818043),
(21, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/858b59fb4f31369d204b281b6db4ebe31ad3a0a4.jpg', 1614818092),
(22, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/d5655761addb38c2263f89a9ccd5e775d23355b6.jpg', 1614818264),
(23, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/994302a8a420a211510cc770ab8ca6ef9a1a9f68.jpg', 1614818285),
(24, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/e0503024cae04038f64a21b5a2233d94c175bf2f.jpg', 1614818393),
(25, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/9cd6393a7295ad4869cfa373ef21e81ea22c0802.jpg', 1614818972),
(26, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/a06c35de7b34ae9a42ed64947669455eae6040a4.jpg', 1614819187),
(27, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/4f88834afd12f083b05f221272359bdad9a30f83.jpg', 1614819608),
(28, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/59416930df73dfb55925a361735b6f6179a8aa28.jpg', 1614819764),
(29, 'admin@kaztoll.com', 'test2', '../feedbackPhotos/6e23befa1fcde1a29da168807c080cf8f8081c5c.jpg', 1614819812);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `driverid` varchar(256) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `driverid`, `firstname`, `surname`, `email`, `password`, `date`) VALUES
(4, '123456', 'Admin', 'Admin', 'admin@kaztoll.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1614814560);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `driverid` (`driverid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
