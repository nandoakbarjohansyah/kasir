-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 05:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlahProduct` ()  BEGIN
SELECT COUNT(*) FROM menus;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(10) UNSIGNED NOT NULL,
  `meja` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `meja`, `status`, `created_at`, `updated_at`) VALUES
(1, '1a', 1, '2020-01-05 21:36:57', '2020-01-05 21:36:57'),
(2, '1b', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_menu` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `harga`, `tipe_id`, `created_at`, `updated_at`) VALUES
(1, 'bakso super', 34500, 1, '2020-01-05 21:36:37', '2020-01-05 21:36:37'),
(2, 'Bakso biasa', 33000, 1, '2020-01-05 21:36:49', '2020-01-05 21:36:49'),
(3, 'bakso telur', 20000, 1, '2020-01-06 21:04:37', '2020-01-06 21:04:37'),
(4, 'Bakwan', 3000, 4, '2020-01-06 21:04:49', '2020-01-06 21:04:49'),
(5, 'risol', 3000, 4, '2020-01-06 21:04:57', '2020-01-06 21:04:57'),
(6, 'pisang coklat', 3000, 4, '2020-01-06 21:05:18', '2020-01-06 21:05:18'),
(7, 'Mie ayam', 34500, 2, '2020-01-06 21:05:30', '2020-01-06 21:05:30'),
(8, 'Mie ayam spesial', 45000, 2, '2020-01-06 21:06:19', '2020-01-06 21:06:19'),
(9, 'Mie ayam kabur', 50000, 2, '2020-01-06 21:07:02', '2020-01-06 21:07:02'),
(10, 'Nasi Goreng', 34500, 3, '2020-01-06 21:07:22', '2020-01-06 21:07:22'),
(11, 'Nasi putih', 76000, 3, '2020-01-06 21:07:32', '2020-01-06 21:07:32'),
(12, 'Nasi uduk', 15000, 3, '2020-01-06 21:07:47', '2020-01-06 21:07:47'),
(13, 'sop', 12000, 5, '2020-01-06 21:07:58', '2020-01-06 21:07:58'),
(14, 'sayur asem', 15000, 5, '2020-01-06 21:08:20', '2020-01-06 21:08:20'),
(15, 'kikil', 23000, 5, '2020-01-06 21:08:36', '2020-01-06 21:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_01_02_035455_create_menus_table', 1),
(4, '2020_01_02_035509_create_pesanans_table', 1),
(5, '2020_01_02_035522_create_transaksis_table', 1),
(6, '2020_01_02_035545_create_pelanggans_table', 1),
(7, '2020_01_02_052657_create_tipes_table', 1),
(8, '2020_01_02_100320_create_role_users_table', 1),
(9, '2020_01_02_141326_create_tables_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `no_hp` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `table_id`, `nama_pelanggan`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, '1', 'joni', 2, '231321', 'depok', '2020-01-05 22:04:54', '2020-01-05 22:04:54'),
(4, '1', 'Bowo', 1, '123213', 'depok', '2020-01-06 01:52:15', '2020-01-06 01:52:15'),
(5, '1', 'wow', 1, '12321', 'depok', '2020-01-06 02:21:23', '2020-01-06 02:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `menu_id`, `pelanggan_id`, `user_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(8, 1, 4, 1, 3, NULL, NULL),
(10, 2, 5, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tipes`
--

CREATE TABLE `tipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe_makanan` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipes`
--

INSERT INTO `tipes` (`id`, `tipe_makanan`, `created_at`, `updated_at`) VALUES
(1, 'Bakso', '2020-01-05 21:36:31', '2020-01-05 21:36:31'),
(2, 'Mie', '2020-01-06 21:04:08', '2020-01-06 21:04:08'),
(3, 'Nasi', '2020-01-06 21:04:13', '2020-01-06 21:04:13'),
(4, 'Gorengan', '2020-01-06 21:04:18', '2020-01-06 21:04:18'),
(5, 'sayur', '2020-01-06 21:04:22', '2020-01-06 21:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@email.com', NULL, '$2y$10$DttCiJ3ko2saQIGZrmaD4uYOuS18i6fUNB5iO/6wX1njQE4gpY65u', NULL, '2020-01-05 21:36:23', '2020-01-05 21:36:23'),
(2, 'waiter', 'waiter@email.com', NULL, '$2y$10$qi/4j1OM8PAA9zBiA5Wg3eJjL36zEOLim7Vza/kkkGsy3XhBea32q', NULL, '2020-01-06 02:22:09', '2020-01-06 02:22:09'),
(3, 'kasir', 'kasir@email.com', NULL, '$2y$10$bT1/xKJx.CN/RJTcawvomOGVyvppVskkI5mlyIu79LVfFJqcejK/m', NULL, '2020-01-06 02:22:54', '2020-01-06 02:22:54'),
(4, 'owner', 'owner@email.com', NULL, '$2y$10$zMEB447OVraKhXiVN/ox4uU5IwM5yT5ffSTTZ2BidRWCkJiG3Mjb2', NULL, '2020-01-06 02:23:33', '2020-01-06 02:23:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipes`
--
ALTER TABLE `tipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipes`
--
ALTER TABLE `tipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
