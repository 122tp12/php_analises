-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 23 2021 г., 18:50
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lazokifc_analis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--
-- Создание: Июн 12 2021 г., 06:41
-- Последнее обновление: Июн 12 2021 г., 06:41
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'login', 'password');

-- --------------------------------------------------------

--
-- Структура таблицы `analis_param`
--
-- Создание: Июн 16 2021 г., 15:44
--

DROP TABLE IF EXISTS `analis_param`;
CREATE TABLE `analis_param` (
  `id` int(11) NOT NULL,
  `id_analis_type` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` varchar(24) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `scale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `analis_param`
--

INSERT INTO `analis_param` (`id`, `id_analis_type`, `name`, `value`, `from`, `to`, `scale`) VALUES
(1, 1, 'D count', 'N/nm', 0, 50, 0.5),
(2, 2, 'aa', 'W/km', 0, 0, 0),
(3, 2, 'name', 'value', 0, 0, 0),
(4, 3, 'Кількість хромосом', '', 46, 46, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `analis_type`
--
-- Создание: Июн 12 2021 г., 06:41
--

DROP TABLE IF EXISTS `analis_type`;
CREATE TABLE `analis_type` (
  `id` int(11) NOT NULL,
  `name` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `analis_type`
--

INSERT INTO `analis_type` (`id`, `name`) VALUES
(1, 'D vitamin'),
(2, 'some else test'),
(3, 'Хромосомальний тест');

-- --------------------------------------------------------

--
-- Структура таблицы `change_user`
--
-- Создание: Июн 16 2021 г., 14:59
-- Последнее обновление: Июн 23 2021 г., 15:39
--

DROP TABLE IF EXISTS `change_user`;
CREATE TABLE `change_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `change_user`
--

INSERT INTO `change_user` (`id`, `user_id`) VALUES
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--
-- Создание: Июн 12 2021 г., 06:41
-- Последнее обновление: Июн 12 2021 г., 06:41
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `result`
--
-- Создание: Июн 16 2021 г., 15:00
-- Последнее обновление: Июн 23 2021 г., 15:41
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_analis_param` int(11) NOT NULL,
  `value` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `result`
--

INSERT INTO `result` (`id`, `id_user`, `id_analis_param`, `value`, `date`) VALUES
(16, 1, 1, '3', '0000-00-00'),
(17, 1, 1, '7', '0000-00-00'),
(18, 1, 2, '1', '0000-00-00'),
(19, 1, 3, '2', '0000-00-00'),
(20, 1, 1, '40', '0000-00-00'),
(21, 1, 1, '905', '0000-00-00'),
(22, 1, 1, '905', '0000-00-00'),
(23, 1, 1, '111', '0000-00-00'),
(24, 1, 1, '111', '2021-06-10'),
(25, 1, 1, '111', '2021-05-31'),
(26, 1, 2, '12132', '2021-06-04'),
(27, 1, 2, '12132', '2021-06-12'),
(28, 1, 2, '12132', '2021-06-12'),
(29, 1, 2, '12132', '2021-06-19'),
(30, 1, 2, '12132', '2021-06-10'),
(31, 1, 2, '12132', '2021-06-10'),
(32, 1, 2, '12132', '2021-06-10'),
(33, 1, 2, '12132', '2021-06-10'),
(34, 1, 2, 'ooao', '2021-06-10'),
(35, 1, 2, '12132', '2021-07-01'),
(36, 1, 2, 'oaoaando', '2021-07-01'),
(37, 1, 3, '47', '2021-06-26'),
(38, 1, 3, '47', '2022-04-20'),
(39, 1, 4, '47', '2021-07-01'),
(40, 1, 1, '40', '2021-07-03'),
(41, 1, 1, '0', '2021-06-18'),
(42, 2, 1, '30', '2021-06-20'),
(43, 1, 1, '40', '2021-06-09'),
(44, 15, 1, '11', '2021-06-04'),
(45, 14, 4, '46', '2021-06-26'),
(46, 12, 1, '40', '2021-06-09'),
(47, 12, 1, '55', '2021-06-11'),
(48, 13, 2, '34', '2021-06-22'),
(49, 13, 3, '', '2021-06-22');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--
-- Создание: Июн 23 2021 г., 14:34
-- Последнее обновление: Июн 23 2021 г., 15:40
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `man` tinyint(1) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`, `man`, `email`) VALUES
(1, 'user', 'lll', 'UUU', 1, 'lazokivan0@gmail.com'),
(2, 'Name2', 'lll2', 'qwe', 0, ''),
(3, 'Nameeeee', 'man', 'newPass', 1, ''),
(4, 'Nameeeee', 'man', 'newPass', 1, ''),
(5, 'asd', 'man', 'newPass', 1, ''),
(6, 'asdasd', 'man', 'qweqwe', 1, ''),
(7, 'wer', 'man', 'sdf', 1, ''),
(8, 'asdwe', 'woman', 'qwqe', 0, ''),
(9, 'kkk', 'zzz', '', 1, ''),
(10, 'kkk', 'mmm', 'qwe', 1, ''),
(11, 'dsa', 'lll3', 'qwe', 1, 'lazokivan0@gmail.com'),
(12, 'Name', 'qwerty', 'Qwerty123', 1, 'lazokivan0@gmail.com'),
(13, 'ann', 'anna', '111', 0, 'ann@ukr'),
(14, 'Тарас', 'Тарас', '1234', 1, 'bbb@gmail.com'),
(15, 'sometimedead', 'sometimedead', '123123123', 1, 'riko03030303@gmail.com'),
(16, 'rrr', 'anna1', '111', 1, 'kissann@ukr.net'),
(17, 'ww', 'ad', '11', 0, 'dsfds@sddf'),
(18, 'asd', 'lll1123', 'qwerty', 1, 'fddsfa@ukr');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `analis_param`
--
ALTER TABLE `analis_param`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_analis_type` (`id_analis_type`);

--
-- Индексы таблицы `analis_type`
--
ALTER TABLE `analis_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `change_user`
--
ALTER TABLE `change_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_analis_param` (`id_analis_param`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `analis_param`
--
ALTER TABLE `analis_param`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `analis_type`
--
ALTER TABLE `analis_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `change_user`
--
ALTER TABLE `change_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `analis_param`
--
ALTER TABLE `analis_param`
  ADD CONSTRAINT `analis_param_ibfk_1` FOREIGN KEY (`id_analis_type`) REFERENCES `analis_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `change_user`
--
ALTER TABLE `change_user`
  ADD CONSTRAINT `change_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`id_analis_param`) REFERENCES `analis_param` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
