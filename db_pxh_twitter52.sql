-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 07:17 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pxh_twitter52`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_users`
--

CREATE TABLE `data_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_users`
--

INSERT INTO `data_users` (`id`, `user_id`, `bio`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Someone Who Love to Code', '/assets/images/1510025650.jpg', '2017-11-05 16:57:40', '2017-11-06 20:34:10'),
(2, 2, NULL, NULL, '2017-11-05 19:27:12', '2017-11-05 19:27:12'),
(3, 3, 'Another Alien', NULL, '2017-11-05 21:26:28', '2017-11-06 21:00:37'),
(4, 4, NULL, NULL, '2017-11-06 03:32:14', '2017-11-06 03:32:14'),
(5, 5, NULL, NULL, '2017-11-06 20:41:01', '2017-11-06 20:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(11, 1, 3, '2017-11-06 06:30:00', '2017-11-06 06:30:00'),
(13, 3, 1, '2017-11-06 09:48:00', '2017-11-06 09:48:00'),
(14, 4, 1, '2017-11-06 09:48:01', '2017-11-06 09:48:01'),
(15, 1, 5, '2017-11-06 20:45:46', '2017-11-06 20:45:46'),
(16, 2, 5, '2017-11-06 20:45:48', '2017-11-06 20:45:48'),
(17, 5, 3, '2017-11-06 20:48:08', '2017-11-06 20:48:08'),
(18, 2, 3, '2017-11-06 20:59:11', '2017-11-06 20:59:11'),
(19, 4, 3, '2017-11-06 20:59:13', '2017-11-06 20:59:13'),
(20, 5, 1, '2017-11-06 21:51:02', '2017-11-06 21:51:02'),
(21, 2, 1, '2017-11-06 21:58:17', '2017-11-06 21:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_11_03_073148_create_data_users_table', 1),
('2017_11_03_073213_create_friends_table', 1),
('2017_11_03_073900_create_statuses_table', 1),
('2017_11_03_073913_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `image`, `likes`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Update Status', NULL, NULL, 1, '2017-11-05 16:57:33', '2017-11-05 16:57:33'),
(2, 'abc', NULL, NULL, 2, '2017-11-05 19:38:34', '2017-11-05 19:38:34'),
(3, 'kamu', NULL, NULL, 2, '2017-11-05 20:40:16', '2017-11-05 20:40:16'),
(4, 'aih sia ', NULL, NULL, 1, '2017-11-05 20:40:34', '2017-11-05 20:40:34'),
(5, 'hai', NULL, NULL, 3, '2017-11-05 21:25:20', '2017-11-05 21:25:20'),
(6, 'haha', NULL, NULL, 1, '2017-11-06 10:11:47', '2017-11-06 10:11:47'),
(7, 'wattaww', NULL, NULL, 1, '2017-11-06 10:37:58', '2017-11-06 10:37:58'),
(8, 'haloo', NULL, NULL, 1, '2017-11-06 19:46:08', '2017-11-06 19:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aditya Renaldi R', 'adit@gmail.com', '$2y$10$hcTzMmit96Q4vNh5EWk74.AYR/0mGkU1xtu/koSOpiMSp/.by.WHu', 'LHBuPpl1Ypvhy9lxFxQKwFMt0S5K9QLFHUnud1pF2a0kFPvOXfIayXjAMKBQ', '2017-11-05 16:57:22', '2017-11-06 21:52:26'),
(2, 'Steven', 'steven@gmail.com', '$2y$10$lAueBYl2pkZMqRZ9Db5AW.zrHhsFBNyyuWkb4Hwlaei/d6CZC/m0a', 'lfZyLM6z1uT460SILs28RHkLSp7cSCiKbenJwH8GeyGvcCAJ8uFkCpjAvPrM', '2017-11-05 19:27:08', '2017-11-06 02:55:32'),
(3, 'venomm', 'venom@gmail.com', '$2y$10$lDshpV/JlK0r4az15pVWsuNpUx.Hlif96vOYKbiYyXpC9PRhYnHwi', 'G5yr8XAzoXBacz0yrEwd5gnYt46V0zXOYxUdCtlsPEywl6r0z8ZQY9YQNXv0', '2017-11-05 21:25:13', '2017-11-06 21:04:35'),
(4, 'Thor', 'thor@gmail.com', '$2y$10$rA5hBUTnlAmz7H7k3r4I.uyeQtCQGQ09RDiDeBUG1r3SXE3juDrrq', NULL, '2017-11-06 03:31:42', '2017-11-06 03:31:42'),
(5, 'Joko', 'joko@gmail.com', '$2y$10$.iWe/k8sv3JHvqaXaC1Mve.5xQQdwv6UqZNUJR8EfmuIkqi0YQDkG', '1dO2fHOX0QPD8vQSP7t3CYJ6s2Rm19JoarhMdXzLAEUt4fpYeTurx17kEpYE', '2017-11-06 20:41:00', '2017-11-06 20:47:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
