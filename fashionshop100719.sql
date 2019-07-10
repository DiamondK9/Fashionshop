-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 12:08 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`, `active`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', '$2y$10$AuC2zrfXq9VhY1CiDd/FOOiXr/fQB/1COlgcmM32WdfIWnmvqyeym', 'admin@gmail.com', 1, '2019-07-10 02:59:09', '2019-07-10 02:59:09');

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
(3, '2019_06_12_124858_create_admins', 1),
(4, '2019_06_12_124923_create_products', 1),
(5, '2019_06_12_124950_create_product_types', 1),
(6, '2019_06_12_125037_create_producers', 1),
(7, '2019_06_21_041804_create_product_type_subs', 1),
(8, '2019_07_06_172645_create_producttypes', 2),
(9, '2019_07_10_084451_create_users_table', 3);

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
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `producer_id` bigint(191) UNSIGNED NOT NULL,
  `producer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producer_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producer_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`producer_id`, `producer_name`, `producer_image`, `producer_phone`, `producer_email`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Dior', '1562263900-icons8_nintendo_gamecube__200px_1.png', '0458560787', 'dior@gmail.com', 1, '2019-07-04 10:41:52', '2019-07-04 11:11:40'),
(2, 'Dior1', '1562262204-Games-alt-icon.png', '0458560787', 'tongquansinh13@yahoo.com', 1, '2019-07-04 10:43:24', '2019-07-04 10:43:24'),
(3, 'Safron1', '1562262967-icons8_nintendo_gamecube__200px_1.png', '0123456789', 'safron@gmail.com', 1, '2019-07-04 10:56:07', '2019-07-04 10:56:07'),
(5, 'Phuong Nguyen', '1562264520-icons8_nintendo_gamecube__200px_1.png', '0458560787', 'tongquansinh13@gmail.com', 1, '2019-07-04 11:22:00', '2019-07-04 11:22:00'),
(7, 'Bonnie White I', 'https://lorempixel.com/640/480/?43059', '48339', 'vwalsh@gmail.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(8, 'Cayla Waters Sr.', 'https://lorempixel.com/640/480/?21067', '23350', 'xharvey@howell.org', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(9, 'Summer Toy III', 'https://lorempixel.com/640/480/?34580', '41951', 'hauck.glenda@stehr.biz', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(10, 'Rodger Rippin', 'https://lorempixel.com/640/480/?93264', '76867', 'elva.rodriguez@wintheiser.org', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(11, 'Jamir Schumm', 'https://lorempixel.com/640/480/?28067', '21402', 'meffertz@hotmail.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(12, 'Ali Aufderhar DDS', 'https://lorempixel.com/640/480/?40625', '63008', 'white.jillian@steuber.biz', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(13, 'Dr. Merritt Harvey', 'https://lorempixel.com/640/480/?71371', '55697', 'reina.kessler@yahoo.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(14, 'Nick Hartmann DVM', 'https://lorempixel.com/640/480/?20951', '99066', 'nicholas12@marks.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(15, 'Marlin Rempel', 'https://lorempixel.com/640/480/?19019', '61183', 'oreilly.cathrine@turcotte.info', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(16, 'Norwood Crona', 'https://lorempixel.com/640/480/?60872', '11908', 'gflatley@christiansen.info', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(17, 'Mrs. Enola Bogisich IV', 'https://lorempixel.com/640/480/?54706', '77277', 'titus.streich@gmail.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(18, 'Gerda Schmeler', 'https://lorempixel.com/640/480/?52239', '78502', 'jerde.rusty@yahoo.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(19, 'Rylan Kreiger', 'https://lorempixel.com/640/480/?16323', '12918', 'flatley.lavinia@prohaska.net', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(20, 'Emanuel VonRueden', 'https://lorempixel.com/640/480/?38271', '52617', 'altenwerth.eldridge@hotmail.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(21, 'Audra Reynolds', 'https://lorempixel.com/640/480/?96689', '10632', 'fokon@windler.net', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(22, 'Maybelle McGlynn', 'https://lorempixel.com/640/480/?59773', '78221', 'dschowalter@padberg.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(23, 'Earnest Heathcote', 'https://lorempixel.com/640/480/?29933', '68893', 'tate.macejkovic@blick.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(24, 'Miss Gwen Bruen', 'https://lorempixel.com/640/480/?94596', '18744', 'thaddeus54@gmail.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(25, 'Dr. Rey Hintz V', 'https://lorempixel.com/640/480/?57477', '35933', 'gregoria17@lubowitz.org', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24'),
(26, 'Pauline Green', 'https://lorempixel.com/640/480/?70765', '73157', 'xokeefe@gmail.com', 1, '2019-07-08 23:37:24', '2019-07-08 23:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` int(191) UNSIGNED NOT NULL,
  `producer_id` int(191) UNSIGNED NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producer_size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `product_quantity` int(11) DEFAULT 0,
  `product_price` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type_id`, `producer_id`, `product_code`, `product_name`, `product_image`, `producer_size`, `product_quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(15, 3, 3, '24155', 'Test 2', '1562577068-icons8_nintendo_gamecube__200px_1.png', NULL, 2, 32314, '2019-07-04 11:41:40', '2019-07-08 02:11:08'),
(21, 4, 1, '24155', 'Test 2', '1562579193-icons8_nintendo_gamecube__200px_1.png', NULL, 1, 214, '2019-07-04 12:24:47', '2019-07-08 02:46:34'),
(22, 5, 5, '122321', 'Test 22', '1562579204-Games-alt-icon.png', NULL, 12, 13124, '2019-07-04 12:43:39', '2019-07-08 02:46:44'),
(23, 6, 6, '24155', 'fgsdfgfsdg', '1562579215-Games-alt-icon.png', NULL, 2, 3421, '2019-07-05 11:13:47', '2019-07-08 02:46:55'),
(24, 5, 1, '24155', 'fgsdfgfsdg', '1562579224-icons8_nintendo_gamecube__200px_1.png', NULL, 12, 2414, '2019-07-05 12:00:18', '2019-07-08 02:47:04'),
(25, 4, 1, '212', 'adfadfs', '1562579237-EP.jpg', NULL, 13, 165, '2019-07-05 19:56:23', '2019-07-08 02:47:17'),
(29, 3, 1, '123', 'adfadfs', '1562576187-Neiio-Prime-Dock-2-Games-alt.ico', NULL, 324, 214145, '2019-07-08 01:56:27', '2019-07-08 01:56:27'),
(30, 3, 1, '21223', 'df1w', '1562580272-icons8_nintendo_gamecube__200px_1.png', NULL, 213, 515115, '2019-07-08 03:04:32', '2019-07-08 03:04:32'),
(31, 4, 1, '6542', 'gthdfje', '1562580298-icons8_nintendo_gamecube__200px_1.png', NULL, 435, 7456, '2019-07-08 03:04:58', '2019-07-08 03:04:58'),
(32, 6, 1, '342', 'fg', '1562580383-Áo cộc tay Nữ.png', NULL, 324, 526, '2019-07-08 03:06:23', '2019-07-08 03:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `product_type_id` bigint(191) UNSIGNED NOT NULL,
  `product_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type_sub_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`product_type_id`, `product_type_name`, `product_type_image`, `product_type_sub_id`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Quần dài Nam', '1562579269-EP.jpg', NULL, 1, '2019-07-06 21:00:31', '2019-07-08 02:47:49'),
(4, 'Quần dài Nữ', '1562472099-Quần dài Nữ Icon.png', NULL, 1, '2019-07-06 21:01:39', '2019-07-06 21:01:39'),
(5, 'Áo cộc tay Nam', '1562472198-Áo cộc tay Nam.png', NULL, 1, '2019-07-06 21:03:18', '2019-07-06 21:03:18'),
(6, 'Áo cộc tay Nữ', '1562472648-Áo cộc tay Nữ.png', NULL, 1, '2019-07-06 21:04:38', '2019-07-06 21:10:48'),
(7, 'Đồng Hồ', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(8, 'Giày Dép', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(9, 'Trang Sức', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(10, 'Áo khoác', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(11, 'Phụ kiện', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(12, 'Bộ Trang Phục', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(13, 'Mũ', NULL, NULL, 1, '2019-07-08 22:00:45', '2019-07-08 22:00:45'),
(19, 'Trang phục Công Sở', NULL, NULL, 1, '2019-07-08 23:24:03', '2019-07-08 23:24:03'),
(20, 'Trang Phục Dạ Hội', NULL, NULL, 1, '2019-07-08 23:24:03', '2019-07-08 23:24:03'),
(21, 'Đồ lót', NULL, NULL, 1, '2019-07-08 23:24:03', '2019-07-08 23:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_subs`
--

CREATE TABLE `product_type_subs` (
  `product_type_sub_id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_type_sub_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phuong Nguyen', 'tongquansinh13@gmail.com', NULL, '$2y$10$x6rbWNjnlATJoTGiJvigI.Pi11.CpxYghpPifI4kwMI6gKc4DQIsq', NULL, '2019-07-10 02:38:57', '2019-07-10 02:38:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_admin_email_unique` (`email`);

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
-- Indexes for table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`producer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `product_type_subs`
--
ALTER TABLE `product_type_subs`
  ADD PRIMARY KEY (`product_type_sub_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `producer_id` bigint(191) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `product_type_id` bigint(191) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_type_subs`
--
ALTER TABLE `product_type_subs`
  MODIFY `product_type_sub_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
