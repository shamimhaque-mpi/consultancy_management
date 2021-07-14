-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 09:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `mobile`, `gender`, `address`, `img`, `email_verified_at`, `password`, `trash`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'admin', 'admin@admin.com', '01983667657', 'male', 'Mymensingh Sadar', NULL, NULL, '$2y$10$yUgPiLZWIlX9KZc3BCh7tueVepmJtaIhv9Bv.gHd4r6GRaFhfl4RW', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `trash`, `created_at`, `updated_at`) VALUES
(1, 'furious-13', 0, '2021-07-05 01:19:11', '2021-07-06 06:07:10'),
(2, 'furious', 0, '2021-07-05 01:19:58', '2021-07-05 01:19:58'),
(3, 'furious-1', 0, '2021-07-06 06:04:36', '2021-07-06 06:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `trash` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `tax_id`, `type`, `telephone`, `mobile`, `place_of_birth`, `citizenship`, `address_line_one`, `address_line_two`, `city`, `region`, `postcode`, `date_of_birth`, `company_name`, `user_id`, `trash`, `created_at`, `updated_at`) VALUES
(1, 'Cain Macdonald', 'DSDK5236LSDF', 'person', '+1 (554) 414-1608', 'Nihil aspernatur ill', 'Ad eum consectetur', 'Ut dolore optio dol', 'Enim culpa ut quibu', 'Sed distinctio Prae', 'Libero quis tenetur', 'Magnam ab adipisci a', 'Vero incididunt dolo', '2001-02-10', NULL, 1, 0, '2021-07-06 01:28:35', '2021-07-06 02:39:22'),
(2, 'Kasper William', 'Voluptas inventore v', 'person', '+1 (894) 786-9177', 'Nesciunt nihil perf', 'Dolore dolor veritat', 'Reprehenderit quis a', 'Enim excepturi sint', 'Dolores ratione impe', 'Velit sunt asperiore', 'Porro adipisicing el', 'Quis eum nihil minus', '1977-02-20', NULL, 1, 0, '2021-07-06 01:33:50', '2021-07-06 01:33:50'),
(3, 'Dominique Colon', 'Quia qui esse delec', 'person', '+1 (946) 692-7537', 'Fugiat velit nobis', 'Odit blanditiis qui', 'Aut non ratione pers', 'Eveniet qui ducimus', 'Enim cupiditate reru', 'Reprehenderit repel', 'Sunt quasi animi e', 'Laborum exercitation', '2004-02-18', NULL, 1, 0, '2021-07-06 01:34:22', '2021-07-06 01:34:22'),
(4, 'Elijah Mason', 'Sed nostrud numquam', 'company', '+1 (872) 759-8977', 'Aliquip consectetur', 'Veritatis aut perfer', 'Fugit accusamus ill', 'Itaque est autem aut', 'Est et voluptate dol', 'Enim pariatur Ex ve', 'Ab qui est consectet', 'Inventore similique', '1970-01-08', 'sfsdfsdfdsfds', 1, 0, '2021-07-06 21:25:10', '2021-07-06 21:25:10'),
(5, 'Developer', 'Veniam dolorem ad q', 'person', '+1 (964) 612-4805', 'Quos maxime cupidita', 'Harum omnis nesciunt', 'Sint mollitia sed of', 'Quis sequi ratione i', NULL, 'Repudiandae veritati', 'Quia facilis et dele', 'Vitae eaque doloremq', '1986-02-28', NULL, 1, 0, '2021-07-07 06:13:46', '2021-07-07 06:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `tax_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `common` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_or_standard_isee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isee_universita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isee_for_minors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isee_socio_sanitario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_isee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `household` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_rent_property_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `trash` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `service_id`, `tax_id`, `designation`, `name`, `common`, `address`, `postal_code`, `telephone`, `email`, `ordinary_or_standard_isee`, `isee_universita`, `isee_for_minors`, `isee_socio_sanitario`, `current_isee`, `household`, `house_rent_property_other`, `date`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'DSDK5236LSDF', 'Eveniet in et qui t', 'Hoyt Decker', 'Ullam non enim cum i', 'Quis consectetur ad', 'Et dolore aperiam pr', '+1 (276) 962-8372', 'qujo@mailinator.com', 'Temporibus sit omnis', 'Id ut at optio volu', 'Dicta fugiat digniss', 'Id eos dolor at id', 'Voluptatem aliquip r', 'Ipsum labore pariatu', 'Esse m', '2021-07-06', 'pending', 0, '2021-07-06 04:03:41', '2021-07-07 06:09:31'),
(2, 1, 2, 'DSDK5236LSDF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2021-07-07', 'pending', 1, '2021-07-06 23:21:34', '2021-07-07 05:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_03_094141_create_admins_table', 2),
(5, '2021_07_05_051754_create_services_table', 3),
(6, '2021_07_05_070526_create_categories_table', 4),
(7, '2021_07_05_082328_create_customers_table', 5),
(8, '2021_07_06_091911_create_files_table', 6),
(9, '2021_07_06_115203_create_shops_table', 7),
(10, '2021_07_07_070818_create_comments_table', 8),
(11, '2021_07_07_075715_create_attachments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_fee` decimal(10,2) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `trash` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_fee`, `cat_id`, `trash`, `created_at`, `updated_at`) VALUES
(1, 'MS Service', '60.00', 0, 0, '2021-07-04 23:51:45', '2021-07-05 00:46:44'),
(2, 'MS Service', '56.00', 1, 0, '2021-07-05 01:37:48', '2021-07-05 01:37:48'),
(3, 'MS Service-2', '70.00', 1, 0, '2021-07-05 01:38:25', '2021-07-05 02:02:26'),
(4, 'MS Service-2', '70.00', 2, 0, '2021-07-05 01:38:53', '2021-07-05 01:38:53'),
(5, 'MS Service-2', '70.00', 2, 0, '2021-07-05 01:39:26', '2021-07-05 01:39:26'),
(6, 'MS Service', '30.00', 2, 0, '2021-07-05 01:43:28', '2021-07-05 01:43:28'),
(7, 'MS Service', '70.00', 2, 0, '2021-07-05 01:44:43', '2021-07-05 01:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_name`, `shop_address`, `created_at`, `updated_at`) VALUES
(1, 'Shop One-01', 'skljfklsjdlfsdf', '2021-07-06 05:56:04', '2021-07-06 06:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `address`, `mobile`) VALUES
(1, 'Italiyan', '34534534@gmail.com', NULL, '$2y$10$2qpGISAyj/fEDPM5Q1BtEeb7CBCmeu1UwDCl265yZeCzrw43GTm2u', NULL, '2021-07-04 21:30:58', '2021-07-05 23:28:17', 'admin', 'ferwer', '3435345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
