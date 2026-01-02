-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 03 2026 р., 01:30
-- Версія сервера: 8.0.30
-- Версія PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `Web20205`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `sport_id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`id`, `sport_id`, `parent_id`, `user_name`, `content`, `created_at`) VALUES
(5, 2, 4, 'Admin', 'asdasdasd', '2025-12-28 23:47:26'),
(7, 2, 6, 'User', 'asdas', '2025-12-28 23:49:08'),
(10, 2, 9, 'Admin', 'фівфів', '2025-12-28 23:55:16'),
(12, 2, 11, 'Admin', 'фівф', '2025-12-29 00:05:36'),
(13, 2, NULL, 'Admin', 'фівфів', '2025-12-29 00:05:41');

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `published_at` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `published`, `published_at`, `image`, `created_at`, `category_id`) VALUES
(1, 'Перший пост', 'Текст першого поста...', 1, '2024-10-01 12:00:00', NULL, '2025-12-25 01:02:09', NULL),
(2, 'Другий пост', 'Текст другого поста...', 0, NULL, NULL, '2025-12-25 01:02:09', NULL),
(3, 'Yii2 ActiveRecord', 'Приклад роботи з базою даних...', 1, '2024-11-10 19:40:00', NULL, '2025-12-25 01:02:09', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `sport`
--

CREATE TABLE `sport` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `sport`
--

INSERT INTO `sport` (`id`, `name`, `category`, `tags`, `description`, `image`, `created_at`) VALUES
(2, 'Боротьба', 'Єдиноборство ', 'Боротьба', 'вид спорту, єдиноборство за певними правилами.', '694c55d993e96.jpg', '2025-12-14 18:42:58'),
(3, 'Хокей', 'Хокей', 'Хокей', 'Гра на льодовому майданчику, в якій дві команди намагаються ключками закинути круглу шайбу у ворота суперника, які захищає воротар.', '1766956203_xokkej-U20.jpg', '2025-12-29 00:10:03');

-- --------------------------------------------------------

--
-- Структура таблиці `sport_tag`
--

CREATE TABLE `sport_tag` (
  `sport_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `tag`
--

CREATE TABLE `tag` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `auth_key`, `role`) VALUES
(8, 'Admin', 'Admin@gmail.com', '$2y$13$opI1GL56HlyrwBNaEDx0r.j6A1VyfjMKDIdwj7k2UiLlDEQSB5zqu', 'uDi9hZ50ibOZxoucUaTZ5rq0EVA-sc3c', 'admin'),
(9, 'User', 'User@gmail.com', '$2y$13$TS9UIPZYuf9kjEhMVwnBx.R64i6qboUl2hoBomeH7PKCtObL5EcMG', 'cdyD2-oHmlAkrsw4Gk4Lll_tbGZRjTOv', 'user');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_category` (`category_id`);

--
-- Індекси таблиці `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
