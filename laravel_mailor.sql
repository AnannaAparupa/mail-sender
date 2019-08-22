-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2019 at 04:42 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_mailor`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_email_lists`
--

CREATE TABLE `mailsender_email_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailsender_email_lists`
--

INSERT INTO `mailsender_email_lists` (`id`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'rsani152@gmail.com', 1, '2019-08-15 04:51:50', '2019-08-15 04:51:50'),
(5, 'sani.itclan@gmail.com', 1, '2019-08-15 04:51:50', '2019-08-15 04:51:50'),
(6, 'itclan@gmail.com', 1, '2019-08-15 04:51:50', '2019-08-15 04:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_email_sends`
--

CREATE TABLE `mailsender_email_sends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_email_send_individuals`
--

CREATE TABLE `mailsender_email_send_individuals` (
  `email_send_id` bigint(20) UNSIGNED NOT NULL,
  `email_list_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_jobs`
--

CREATE TABLE `mailsender_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_migrations`
--

CREATE TABLE `mailsender_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailsender_migrations`
--

INSERT INTO `mailsender_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_15_100208_create_email_lists_table', 2),
(4, '2019_08_15_100219_create_email_sends_table', 2),
(5, '2019_08_17_031452_create_jobs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_password_resets`
--

CREATE TABLE `mailsender_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailsender_users`
--

CREATE TABLE `mailsender_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mailsender_users`
--

INSERT INTO `mailsender_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Robius Sani', 'admin@gmail.com', '2019-07-29 18:00:00', '$2y$10$e37QvUpoj7ISrpM/iUSA1uS.XjQgZBcMEQ2XB9Zsl4nhmGBbT6p9y', 'oZ6dRfPlJvKThTEziIe5kbWkb4ZYMSC29t1kHhEZssrfscEaGZt6anMYZ0yg', '2019-07-30 02:20:34', '2019-07-30 02:20:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mailsender_email_lists`
--
ALTER TABLE `mailsender_email_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailsender_email_lists_user_id_foreign` (`user_id`);

--
-- Indexes for table `mailsender_email_sends`
--
ALTER TABLE `mailsender_email_sends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailsender_email_sends_user_id_foreign` (`user_id`);

--
-- Indexes for table `mailsender_email_send_individuals`
--
ALTER TABLE `mailsender_email_send_individuals`
  ADD KEY `mailsender_email_send_individuals_email_send_id_foreign` (`email_send_id`),
  ADD KEY `mailsender_email_send_individuals_email_list_id_foreign` (`email_list_id`);

--
-- Indexes for table `mailsender_jobs`
--
ALTER TABLE `mailsender_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailsender_jobs_queue_index` (`queue`);

--
-- Indexes for table `mailsender_migrations`
--
ALTER TABLE `mailsender_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailsender_password_resets`
--
ALTER TABLE `mailsender_password_resets`
  ADD KEY `mailsender_password_resets_email_index` (`email`);

--
-- Indexes for table `mailsender_users`
--
ALTER TABLE `mailsender_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mailsender_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mailsender_email_lists`
--
ALTER TABLE `mailsender_email_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mailsender_email_sends`
--
ALTER TABLE `mailsender_email_sends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailsender_jobs`
--
ALTER TABLE `mailsender_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailsender_migrations`
--
ALTER TABLE `mailsender_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mailsender_users`
--
ALTER TABLE `mailsender_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mailsender_email_lists`
--
ALTER TABLE `mailsender_email_lists`
  ADD CONSTRAINT `mailsender_email_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `mailsender_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mailsender_email_sends`
--
ALTER TABLE `mailsender_email_sends`
  ADD CONSTRAINT `mailsender_email_sends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `mailsender_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mailsender_email_send_individuals`
--
ALTER TABLE `mailsender_email_send_individuals`
  ADD CONSTRAINT `mailsender_email_send_individuals_email_list_id_foreign` FOREIGN KEY (`email_list_id`) REFERENCES `mailsender_email_lists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mailsender_email_send_individuals_email_send_id_foreign` FOREIGN KEY (`email_send_id`) REFERENCES `mailsender_email_sends` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
