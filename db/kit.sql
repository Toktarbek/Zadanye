-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 27 2019 г., 05:28
-- Версия сервера: 10.1.34-MariaDB
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `files` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `ischeck` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `tema`, `messages`, `name`, `email`, `files`, `created_at`, `ischeck`) VALUES
(1, 'tema1', 'teafbfbfb', 'Erbol', 'erbol@mail.ru', 'documents/1561551180.jpg', '2019-06-26', 0),
(4, 'tema2', 'djhfjdgfdhf', 'Ulzhan', 'ulia@mail.ru', 'documents/1561553039.png', '2019-06-26', 0),
(5, 'salem', 'salem kalaisin', 'Aidana', 'aidana@mail.ru', 'documents/1561553082.docx', '2019-06-26', 0),
(7, 'Мұнда тақырып жазу керек', 'мында текст жазамыз', 'Ardak', 'ardak@mail.ru', 'documents/1561570040.pdf', '2019-06-26', 0),
(14, 'How are you', '0123456789876543210\r\n0123456789876543210\r\n0123456789876543210\r\n0123456789876543210\r\n0123456789876543210', 'Bekzat', 'beka@mail.ru', 'documents/1561575903.html', '2019-06-26', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Elshat', 'elshat90@mail.ru', NULL, '$2y$10$1BuHiLsW/jCRlLLjJTvMc.mpYVD1R62IIVcuUGLPboh65c.anrmuK', NULL, '2019-06-25 21:50:56', '2019-06-25 21:50:56', 1),
(2, 'Erbol', 'erbol@mail.ru', NULL, '$2y$10$C6R1Eg/hcJ8j3Z0vvRsGHONL34H/fGPS1YavJ5vFNEwd1bGgYpcdG', NULL, '2019-06-25 21:51:56', '2019-06-25 21:51:56', 0),
(3, 'Aidana', 'aidana@mail.ru', NULL, '$2y$10$JZZElFnjNcUFUIMrNeQYD.xwKmiwTxC1ZL8sevZqJ7FZEkExG84ae', NULL, '2019-06-26 06:25:52', '2019-06-26 06:25:52', 0),
(4, 'Ardak', 'ardak@mail.ru', NULL, '$2y$10$yoCYudZL85qZJG2aX1iJG.QKzkhBAiCc5FjYVAnRpWr3yTPmAk0HC', NULL, '2019-06-26 06:33:05', '2019-06-26 06:33:05', 0),
(5, 'Bekzat', 'beka@mail.ru', NULL, '$2y$10$dvY6FEPUa1bYON/2h/9EeOhqi/IxjRq2vy1keCSIT5T5hZc4z2I8.', NULL, '2019-06-26 06:36:02', '2019-06-26 06:36:02', 0),
(6, 'Ulzhan', 'ulia@mail.ru', NULL, '$2y$10$LvQ.LXWv6tqkOVd2FJ5QxO5RC70iHB74cNDMaXhJEBKDlLBPOJCQ6', NULL, '2019-06-26 06:41:40', '2019-06-26 06:41:40', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
