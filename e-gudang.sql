-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_owner` bigint(20) UNSIGNED NOT NULL,
  `name_building` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_building` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` bigint(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antarjemput` tinyint(1) NOT NULL,
  `pendingin` tinyint(1) NOT NULL,
  `sirkulasi_udara` tinyint(1) NOT NULL,
  `submission` tinyint(1) NOT NULL DEFAULT 1,
  `verif` tinyint(1) NOT NULL DEFAULT 0,
  `edit` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `id_owner`, `name_building`, `address_building`, `cost`, `capacity`, `description`, `files`, `antarjemput`, `pendingin`, `sirkulasi_udara`, `submission`, `verif`, `edit`, `created_at`, `updated_at`) VALUES
(32613, 2, 'Gudang anak lanang', 'Jl Yos Cokro Handoko 02', 700000, 5000, 'dkat dengan pasar cangkring', '1607877702_0621 OTOFLASH_MASTER.png', 1, 1, 1, 0, 1, 0, '2020-12-13 09:41:42', '2020-12-13 09:43:35'),
(63886, 2, 'artasari', 'Jl. Diponegoro no. 9', 500000, 100, 'Dekat dengan jalan tol', '1607862148_nebraska-169457_1920.png', 0, 0, 1, 0, 1, 0, '2020-12-13 05:22:28', '2020-12-13 07:50:43'),
(80102, 2, 'Gudang Lama Jaya', 'Jl Balongbendo 09', 500000, 2000, 'sangat luas dan dekat dengan pintu keluar masuk tol', '1607877597_warehouse-12-mmp_02-848x450.png', 1, 1, 1, 0, 1, 0, '2020-12-13 09:39:57', '2020-12-13 09:43:44'),
(97150, 2, 'Gudang Jaya Abadi', 'Jl. Jawa 07', 200000, 100, 'dekat dengan kota dan pasar', '1607877428_hall-3865370_1280.png', 0, 0, 1, 0, 1, 0, '2020-12-13 09:37:08', '2020-12-13 09:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2010_10_17_064115_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_10_17_183534_create_gedungs_table', 1),
(5, '2019_11_09_142918_create_rental_table', 1),
(6, '2019_11_09_143350_create_payments_table', 1),
(7, '2019_12_11_144249_create_penyesuaian_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary` bigint(20) NOT NULL,
  `approvement` enum('proses','verifikasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_tf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_building` bigint(20) UNSIGNED NOT NULL,
  `id_loaner` int(10) UNSIGNED NOT NULL,
  `day_start` date NOT NULL,
  `day_over` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `salary`, `approvement`, `bukti_tf`, `created_at`, `updated_at`, `id_building`, `id_loaner`, `day_start`, `day_over`) VALUES
(15, 1000000, 'verifikasi', 'bukti_tf/aRvUCUeJ8wksyJIjTDbzRTwXuJ3paTFJBAo7hCgs.png', '2020-12-13 07:53:01', '2020-12-13 07:53:01', 63886, 3, '2020-12-14', '2020-12-15'),
(16, 1500000, 'verifikasi', 'bukti_tf/Ncc3XRJOZngLNzLis3h8I6iKpIYfBDLv0aq4USZX.png', '2020-12-13 07:53:56', '2020-12-13 07:53:56', 63886, 3, '2020-12-13', '2020-12-15'),
(17, 3500000, 'verifikasi', 'bukti_tf/nPnMGal1WwxOCGPMBXjdqMatzEO5zxQxjzAbz9Dg.png', '2020-12-13 07:55:56', '2020-12-13 07:55:56', 63886, 3, '2020-12-18', '2020-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_building` bigint(20) UNSIGNED NOT NULL,
  `day_start` datetime NOT NULL,
  `day_over` datetime NOT NULL,
  `id_loaner` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `id_building`, `day_start`, `day_over`, `id_loaner`, `created_at`, `updated_at`) VALUES
(34, 32613, '2020-12-14 00:00:00', '2020-12-15 00:00:00', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-11-29 03:17:25', '2019-11-29 03:17:25'),
(2, 'owner', '2019-11-29 03:17:25', '2019-11-29 03:17:25'),
(3, 'masyarakat', '2019-11-29 03:17:25', '2019-11-29 03:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `user_address`, `email`, `phone`, `email_verified_at`, `password`, `id_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yosha', NULL, 'Jl diponegoro no 12 nganjuk', 'yosha@gmail.com', '08171286381237', NULL, '$2y$10$EP0QTkxRpp5VaWVVnvESlukT2hX3LIMHm84MV3qG2rjSwXKFd8xzm', 1, NULL, '2019-11-29 03:17:25', '2019-11-29 03:17:25'),
(2, 'Tedy', 'Tedy Dani', 'Jl hos cokroaminoto', 'tedy@gmail.com', '089876987954', NULL, '$2y$10$PNjvrQYzYUye6LwizJFAseHEOIRjoIUhu8/SxdKAxyGz8WM50RISa', 2, NULL, '2019-11-29 03:17:26', '2019-12-11 06:34:38'),
(3, 'pemri', NULL, 'Jl hos cokroaminoto', 'pemri@gmail.com', '081232332323', NULL, '$2y$10$/tGlXxSCJ.RvHOoORUkg/.FRbEj1QUIZlptknXxH43xyyt/l9.GBi', 3, NULL, '2019-11-29 03:17:26', '2019-11-29 03:17:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_id_owner_foreign` (`id_owner`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_building` (`id_building`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_id_building_foreign` (`id_building`),
  ADD KEY `rentals_id_loaner_foreign` (`id_loaner`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97151;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_id_owner_foreign` FOREIGN KEY (`id_owner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `buildings` (`id`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_id_building_foreign` FOREIGN KEY (`id_building`) REFERENCES `buildings` (`id`),
  ADD CONSTRAINT `rentals_id_loaner_foreign` FOREIGN KEY (`id_loaner`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
