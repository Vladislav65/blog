-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 04 2021 г., 14:13
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(40) NOT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `img`, `title`, `content`, `date`, `views`) VALUES
(1, 'templates/images/php_8_released.png', 'PHP 8 — Что нового?', 'PHP, начиная с 7 версии, кардинально изменился. Код стал куда быстрее и надёжнее, и писать его стало намного приятнее. Но вот, уже релиз 8 версии! Ноябрь 26, 2020 — примерно на год раньше, чем обещали сами разработчики. И всё же, не смотря на это, мажорная версия получилась особенно удачной. В этой статье я попытаюсь выложить основные приятные изменения, которые мы должны знать.\r\n\r\n\r\n1. JIT\r\n\r\nКак говорят сами разработчики, они выжали максимум производительности в 7 версии (тем самым сделав PHP наиболее шустрым среди динамических ЯПов). Для дальнейшего ускорения, без JIT-компилятора не обойтись. Справедливости ради, стоит сказать, что для веб-приложений использование JIT не сильно улучшает скорость обработки запросов (в некоторых случаях скорость будет даже меньше, чем без него). А вот, где нужно выполнять много математических операций — там прирост скорости очень даже значительный. Например, теперь можно делать такие безумные вещи, как ИИ на PHP.\r\nВключить JIT можно в настройках opcache в файле php.ini.', '2021-02-04 01:29:26', 1),
(2, 'templates/images/d2ywh8knslm8ttn9yfoln48gpic.jpeg', 'Удивительный Angular', '1.1. Что дает вам Angular?\r\n\r\nAngular позволяет вам из \"коробки\" создавать большие и сложные по части бизнес-логики приложения. Angular было полным переосмыслением AngularJS, наверное, это было самое болезненное, но оно того стоило, сам фреймворк стал куда чище и гибче, более enterprise-подобным и с этой точки зрения обладает высокой масштабируемостью.\r\n\r\n\r\nКакие плюсы можно выделить:\r\n\r\n\r\nПоддержка Google, Microsoft;\r\nИнструменты разработчика (CLI);\r\nЕдиная структура проекта;\r\nTypeScript из \"коробки\" (вы можете писать строго типизированный код);\r\nРеактивное программирование с RxJS;\r\nЕдинственный фреймворк с Dependency Injection из \"коробки\";\r\nШаблоны, основанные на расширении HTML;\r\nКроссбраузерный Shadow DOM из коробки (либо его эмуляция);\r\nКроссбраузерная поддержка HTTP, WebSockets, Service Workers;\r\nНе нужно ничего дополнительно настраивать. Больше никаких оберток;\r\nБолее современный фреймворк, чем AngularJS (на уровне React, Vue);\r\nБольшое комьюнити.', '2021-02-04 01:31:28', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'reader',
  `cookie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `surname`, `email`, `password`, `status`, `cookie`) VALUES
(1, 'admin_name', 'admin_surname', 'admin@admin', '$2y$10$zu/bBl/r8Bt81yl7SXYd5eGd0CK4qIsXGmE9sehcfs197oz2hbMbq', 'admin', NULL),
(2, 'reader_name', 'reader_surname', 'reader@reader', '$2y$10$uRPkKd6AquJtzGAPA8upBOJe4r8sQ9QYzZfkStXP.ciKdkrs4yLyW', 'reader', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
