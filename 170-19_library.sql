-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 16 2022 г., 10:23
-- Версия сервера: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `170-19_library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `b_name` varchar(500) NOT NULL,
  `genres` varchar(600) DEFAULT NULL,
  `b_photo` varchar(500) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publication_year` int(11) NOT NULL,
  `rating` float(10,0) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `b_name`, `genres`, `b_photo`, `description`, `author`, `publisher`, `publication_year`, `rating`, `read`, `date`) VALUES
(2, 'Ведьмак', '\'Боевое фэнтези\', \'Героическое фэнтези\', \'Зарубежное фэнтези\'', NULL, 'Геральт из Ривии – ведьмак, один из немногих представителей некогда большого и могущественного дома борцов с нечистью. Он один из лучших в своем деле, с детства наученный убивать упырей, ведьм, леших и всех, кто так или иначе угрожает людям. Но делает он это вовсе не из добрых побуждений. Ведьмак – это работа. А за работу, как известно, нужно платить. И не важно, требуется убить стрыгу в склепе или участвовать в политических интригах и человеческих войнах. Геральт знает цену собственного мастерства и своего не упустит.', 'Анджей Сапковский', 'Издательство АСТ', 2014, 3, 100, '2022-11-25'),
(3, 'Роковой подарок', '\'Современные детективы\'', NULL, 'Знаменитая писательница Марина Покровская – в миру Маня Поливанова – совсем приуныла. Чтобы немного собраться с мыслями, Маня уезжает в город Беловодск и становится свидетелем преступления. Маня начинает расследование, и оказывается, что жизнь убитого на самом деле была вовсе не такой уж идеальной!...', 'Татьяна Устинова', 'Эксмо', 2022, 5, 120, '2022-11-25'),
(6, 'Гойда', '\'Историческая литература\'', NULL, 'Юный сын бывалого воеводы Федор Басманов прибывает к царскому двору, чтобы служить государю словом и делом. Страна разрывается на части: воля владыки все больше вызывает сомнение у народа, а опричники сеют страх и смерть, где бы ни ступала их нога. Федору предстоит принять правила игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Джек Гельб', 'Like Book', 2022, 4, 100, '2022-12-09'),
(13, 'greg', 'романтика', NULL, 'kо воеводы Федор Басманов прибывает к царскому двору, чтоkа игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Дjtyжекk', 'Like Bookkkk', 2020, NULL, NULL, '2022-12-16'),
(14, 'kkkkk', 'horror', NULL, 'kо воеводы Федор Басманов прибывает к царскому двору, чтоkа игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Дjtyжекk', 'Like Bookkkk', 2020, 17, NULL, '2022-12-16'),
(17, 'hghgh', 'horror', NULL, 'kо воеводы Федор Басманов прибывает к царскому двору, чтоkа игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Дjtyжекk', 'Like Bookkkk', 2020, NULL, NULL, '2022-12-16'),
(18, 'hghgh', 'horror', NULL, 'kо воеводы Федор Басманов прибывает к царскому двору, чтоkа игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Дjtyжекk', 'Like Bookkkk', 2020, NULL, NULL, '2022-12-16'),
(19, 'hghgh', 'horror', NULL, 'kо воеводы Федор Басманов прибывает к царскому двору, чтоkа игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Дjtyжекk', 'Like Bookkkk', 2020, NULL, NULL, '2022-12-16'),
(20, 'hghgh', 'horror', '/assets/book_photo/TJ_h2ibTDHnHrAlhOvVDXflG2p3Ytf-v.png', 'kо воеводы Федор Басманов прибывает к царскому двору, чтоkа игры и выжить во всепоглощающем пламени жестокости и насилия. Сможет ли он сохранить свою душу или нет ей места в столь жутком мире царской воли?', 'Дjtyжекk', 'Like Bookkkk', 2020, NULL, NULL, '2022-12-16');

-- --------------------------------------------------------

--
-- Структура таблицы `commentaries`
--

CREATE TABLE `commentaries` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `rating` float(10,0) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `commentaries`
--

INSERT INTO `commentaries` (`id`, `b_id`, `u_id`, `rating`, `comment`, `date`) VALUES
(2, 3, 15, 4, 'not bad', '2022-12-12');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `administrator` tinyint(1) DEFAULT 0,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `photo` varchar(500) DEFAULT 'no photo',
  `read_books` int(11) DEFAULT 0,
  `registration_date` date DEFAULT current_timestamp(),
  `token` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `administrator`, `name`, `email`, `password`, `photo`, `read_books`, `registration_date`, `token`) VALUES
(1, 1, 'Пупкин', 'qwerty@adm.com', '1234', 'no photo', NULL, '2022-11-01', ''),
(2, 1, 'Клювик', 'kluv@adm.com', 'qwerty', 'no photo', NULL, '2022-11-01', ''),
(6, 0, 'poolina', 'pool@gmail.com', '$2y$13$mJc8AaSV01f.c3p4Yfshjeb5wVZWcHIx/kYHaSEWs5ikBERncwt2G', 'no photo', 0, '2022-12-05', 'ELIERmNgOeqJxtPoxw0Im7ir-M1gN64T'),
(7, 1, 'tverk', 'tverk@mail.com', '$2y$13$p9OuCpi3Ym1QlCCfGeNBmuw0a/cvT/z98viaKIXpLHlJPlS7kRFga', 'no photo', 0, '2022-12-05', 'yLWBjYvSWQvmfMd9OosIcJCBWnUOexie'),
(8, 0, 'somik', 'somik@mail.com', '$2y$13$2WdTpVWbk9PpY/a9lM4N8.I6JaVAy4EOK32oErvtL0zhg1WaR6uzO', 'no photo', 0, '2022-12-05', NULL),
(9, 0, 'pavline', 'pavline2mail.com', '$2y$13$Wo6ysfsclgIhuW9/0iVqEOLx3Yc4hJWvEIoyDkXQdJ7pmagpxpdcC', 'no photo', 0, '2022-12-05', NULL),
(10, 0, 'flamingo', 'flamingo@mail.com', '$2y$13$nAGrb5x/4dBbFO4nf5gju.tcGxnA9FLql.nYJN2upGmMkQWEGNXRG', NULL, 0, '2022-12-05', NULL),
(11, 0, 'text', 'text@mail.com', '$2y$13$elhUZ9nGn5tAcd4ftPWjme6zlsh4HWsgWRBs1boRidJLJ9PPrNZ.6', NULL, 0, '2022-12-05', NULL),
(12, 0, 'file', 'file@mail.com', '$2y$13$eVFt8CrOS1GIzgIzmWvg/OLoj1QQ0XH7B/7t6md1ouAidM0gQNVHe', NULL, 0, '2022-12-05', 'lQ5r1gpuBgPLUxPJXVbqUv0Lt4CLp5_a'),
(14, 0, 'sova', 'sova@mail.com', '$2y$13$SEjh95krdiVP1VBrT7VMM.Ib3dlYHvn4Q33wavPdQq1Fu7YT21n7u', NULL, 0, '2022-12-09', NULL),
(15, 0, 'hfghgd', 'cheza@mail.com', '$2y$13$V7jLVp3y1T5eX9nhKWM4EeFiNh/c944XdjsIGMNqNdqWxfTYjWt4u', '/assets/upload/p8yAKIB7n1kVXmnqhq3162egUWlPNf2W.jpg', 0, '2022-12-09', 'dPr1p0Sfa1gz9RDMnH3KSlKWh-s66iUh'),
(17, 1, 'snake', 'dog@', '$2y$13$sZO4LCM3XkSu3XsHf7tiHOm2U02qt6gYIWBQH3dTYvOoKeZxWJLty', '/assets/upload/qstKfiQ1WZaN0Km0s7B1aJjNVSyP8XCv.jpg', 0, '2022-12-09', 'G0DEXhVIF5SRCDyVIklnExH8Rvqu4OjW'),
(18, 0, 'gus', 'gus11', '$2y$13$7BQqeA5dkbgBnfy9mNjDJui4Zum26piym5hmpV0X51vJ5/oplNFoW', '/assets/upload/6mq8epGfEQf9oAg_NHgUcV171e2VFxqM.jpg', 0, '2022-12-11', NULL),
(19, 1, 'utka', 'utka@mail.com', '$2y$13$6mhrUwLKQdYFlXXl7PCpCe2wDrRKc5Usb9vFAlM62fnWoy7tgdUe6', '/assets/upload/ZN1cpFoq4vaIJezV-N7WIrHyvDDLjLgW.png', 0, '2022-12-12', '8mNva7-FdWRQSujSHEluisXF_D-1EDyB'),
(24, 0, 'lol', 'lol@mail.com', '$2y$13$ixfkat17tIBMdcK3N9CI5eIjycEClyk2WKbFaYF1dquJtUS9yIc1K', '/assets/upload/t66tVbseo1LiW3-e7o62xeOKoG_pw5ww.jpg', 0, '2022-12-16', NULL),
(25, 0, '1ggg', 'ggg@mail.com', '$2y$13$1VVRt/XzFnD9Hi6YbIkLMO05fmV42cJgsRgxdy8rdl.UtY7cnvbbO', '/assets/upload/4B-RlThw-WGal5l4xPoFwbtYXVSURL6H.jpg', 0, '2022-12-16', 'udtyP9jYDPWH0Ys2Vi47OHDrpQHGU1gR'),
(26, 0, 'ooo', 'ooo@mail.com', '$2y$13$X5lBVGQ0mIo/VTVq2vHlOeL/HWpbBmMlTz08DK8C0DrkckrUr1mwu', '/assets/upload/XVE5_powWwZQa1ExEN0B6hkoYcSlrnNm.jpg', 0, '2022-12-16', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `commentaries`
--
ALTER TABLE `commentaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `commentaries`
--
ALTER TABLE `commentaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `commentaries`
--
ALTER TABLE `commentaries`
  ADD CONSTRAINT `commentaries_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaries_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
