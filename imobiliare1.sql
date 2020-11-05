-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: oct. 28, 2020 la 10:22 AM
-- Versiune server: 10.4.13-MariaDB
-- Versiune PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `imobiliare1`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(30, 0, 'Garsoniere', NULL, 1, '1594563816-garsoniere.jpg', NULL, '2020-07-12 05:19:37', '2020-07-12 11:23:36'),
(31, 0, 'Case', NULL, 1, '1594563555-case.jpg', NULL, '2020-07-12 05:19:46', '2020-07-12 11:19:15'),
(51, 0, 'Terenuri', NULL, 1, '1596464302-terenuri.jpg', NULL, '2020-08-03 11:18:22', '2020-08-03 11:18:22'),
(50, 0, 'Apartamente', NULL, 1, '1596464263-apartamente.jpg', NULL, '2020-08-03 11:17:43', '2020-08-03 11:17:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_10_20_040609_create_categories_table', 3),
(27, '2018_10_24_075802_create_products_table', 7),
(11, '2018_11_20_055123_create_tblgallery_table', 6);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_price` float DEFAULT NULL,
  `p_pricemp2` float DEFAULT NULL,
  `p_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_negotiable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `p_rooms` int(11) DEFAULT NULL,
  `p_baths` int(11) DEFAULT NULL,
  `p_balconies` int(11) DEFAULT NULL,
  `p_hallways` int(11) DEFAULT NULL,
  `p_typeof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_furniture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_material` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_floor` int(11) DEFAULT NULL,
  `p_totalfloors` int(11) DEFAULT NULL,
  `p_totalsurface` double(8,2) DEFAULT NULL,
  `p_usablesurface` double(8,2) DEFAULT NULL,
  `p_year` int(11) DEFAULT NULL,
  `p_condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_cadastre` tinyint(4) NOT NULL DEFAULT 0,
  `p_tabulate` tinyint(4) NOT NULL DEFAULT 0,
  `p_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_addresslat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_addresslon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_neighborhood` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_seokeys` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_seodescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_clientname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_clientphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_clientaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_clientdescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `categories_id`, `p_type`, `p_name`, `p_code`, `p_status`, `image`, `p_description`, `p_price`, `p_pricemp2`, `p_currency`, `p_negotiable`, `p_rooms`, `p_baths`, `p_balconies`, `p_hallways`, `p_typeof`, `p_furniture`, `p_material`, `p_floor`, `p_totalfloors`, `p_totalsurface`, `p_usablesurface`, `p_year`, `p_condition`, `p_cadastre`, `p_tabulate`, `p_address`, `p_addresslat`, `p_addresslon`, `p_neighborhood`, `p_seokeys`, `p_seodescription`, `p_clientname`, `p_clientphone`, `p_clientaddress`, `p_clientdescription`, `created_at`, `updated_at`) VALUES
(9, 50, 'sale', 'Apartament Lux', 'A-01', 1, '1596464525-apartament-lux.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nulla iure dolores animi deserunt dignissimos perspiciatis sint harum similique vel, ab incidunt dolore eveniet nostrum eum facere cum debitis tempore maiores odio delectus earum officia. Expedita quis ad itaque dolor rerum consequuntur soluta obcaecati ipsa officiis, nobis earum eaque eligendi ut, ratione aut in sequi nam vel distinctio impedit blanditiis! Ut autem voluptates quae aut, sapiente dignissimos consectetur quo minus est tempora adipisci dicta voluptatem quia ipsa, quasi, ad consequatur vero non. Dicta ipsam autem accusantium quos et at illum, tenetur sit. Pariatur quae eum, animi doloribus aliquid consectetur repellat!', 60000, NULL, 'euro', '1', 2, 1, 1, 1, 'decomandat', 'mobilat', 'caramida', 2, 4, 50.00, 30.00, 1996, 'buna', 1, 1, 'Valea Roșie, Craiova, România', '44.3029504', '23.8192606', 'Valea Rosie', 'imobiliare, casa, craiova, vanzari, cartier', 'Apartament de inchiriat in zona Valea Rosie, Craiova, Romania', 'John Doe', '0000000000', 'Craiovita Noua, complex', 'Client prioritar', '2020-08-03 11:22:05', '2020-08-03 11:22:05'),
(10, 31, 'sale', 'Casa de vanzare', 'C-01', 1, '1596464731-casa-de-vanzare.jpg', 'Lorem Ipsum', 80000, NULL, 'euro', '1', 3, 2, 2, 2, 'decomandat', 'mobilat', 'caramida', 2, 2, 150.00, 105.00, 1990, 'buna', 1, 0, 'Centru, Craiova, România', '44.31795229999999', '23.7952673', 'Centru', 'imobiliare, casa, craiova, vanzari, cartier', 'Casa de vanzare Craiova Romania', 'Jane Doe', '0000000000', 'Craiovita Noua, complex', 'Test descriere client', '2020-08-03 11:25:31', '2020-08-03 11:26:13');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `products_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 27, '7664271544063472.jpg', '2018-12-05 19:31:12', '2018-12-05 19:31:12'),
(9, 27, '6768551544063472.jpg', '2018-12-05 19:31:13', '2018-12-05 19:31:13'),
(10, 27, '4131281544063473.jpg', '2018-12-05 19:31:13', '2018-12-05 19:31:13'),
(11, 28, '6720891544063734.jpg', '2018-12-05 19:35:34', '2018-12-05 19:35:34'),
(12, 28, '4686631544063734.jpg', '2018-12-05 19:35:34', '2018-12-05 19:35:34'),
(13, 28, '5960611544063759.jpeg', '2018-12-05 19:35:59', '2018-12-05 19:35:59'),
(14, 29, '5146071544063935.JPG', '2018-12-05 19:38:55', '2018-12-05 19:38:55'),
(15, 29, '762811544063935.jpg', '2018-12-05 19:38:55', '2018-12-05 19:38:55'),
(16, 29, '3716041544063935.jpg', '2018-12-05 19:38:56', '2018-12-05 19:38:56'),
(17, 30, '6832831544064156.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(18, 30, '1655391544064157.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(19, 30, '4693601544064157.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(20, 31, '9233341544064441.jpg', '2018-12-05 19:47:21', '2018-12-05 19:47:21'),
(21, 31, '8167501544064441.jpg', '2018-12-05 19:47:22', '2018-12-05 19:47:22'),
(22, 31, '3887071544064442.jpg', '2018-12-05 19:47:22', '2018-12-05 19:47:22'),
(23, 32, '3998691544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(24, 32, '1159141544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(25, 32, '2035101544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(26, 33, '2128501544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(27, 33, '5649911544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(28, 33, '3704141544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(29, 34, '3899431544065346.JPG', '2018-12-05 20:02:26', '2018-12-05 20:02:26'),
(30, 34, '119131544065346.jpg', '2018-12-05 20:02:27', '2018-12-05 20:02:27'),
(31, 34, '6905491544065347.jpg', '2018-12-05 20:02:27', '2018-12-05 20:02:27'),
(32, 35, '981591544065510.jpeg', '2018-12-05 20:05:10', '2018-12-05 20:05:10'),
(33, 35, '5320811544065510.jpg', '2018-12-05 20:05:11', '2018-12-05 20:05:11'),
(34, 35, '1153181544065511.jpg', '2018-12-05 20:05:11', '2018-12-05 20:05:11'),
(35, 36, '3881071594463655.jpg', '2020-07-11 07:34:15', '2020-07-11 07:34:15'),
(36, 36, '895281594463655.jpg', '2020-07-11 07:34:15', '2020-07-11 07:34:15'),
(37, 36, '8403001594463655.jpg', '2020-07-11 07:34:16', '2020-07-11 07:34:16'),
(41, 41, '8730581594477312.jpg', '2020-07-11 11:21:52', '2020-07-11 11:21:52'),
(39, 41, '5865001594477303.jpg', '2020-07-11 11:21:44', '2020-07-11 11:21:44'),
(40, 41, '5347721594477304.jpg', '2020-07-11 11:21:44', '2020-07-11 11:21:44'),
(73, 1, '9577891594579396.jpg', '2020-07-12 15:43:16', '2020-07-12 15:43:16'),
(74, 1, '3921161594579396.jpg', '2020-07-12 15:43:16', '2020-07-12 15:43:16'),
(75, 1, '6678591594579396.jpg', '2020-07-12 15:43:17', '2020-07-12 15:43:17'),
(66, 2, '280041594579241.jpg', '2020-07-12 15:40:41', '2020-07-12 15:40:41'),
(83, 8, '6723531595783500.jpg', '2020-07-26 14:11:40', '2020-07-26 14:11:40'),
(68, 2, '4948251594579241.jpg', '2020-07-12 15:40:41', '2020-07-12 15:40:41'),
(70, 2, '8752891594579250.jpg', '2020-07-12 15:40:51', '2020-07-12 15:40:51'),
(76, 1, '9294331594579407.jpg', '2020-07-12 15:43:28', '2020-07-12 15:43:28'),
(84, 8, '1924241595783500.jpg', '2020-07-26 14:11:40', '2020-07-26 14:11:40'),
(79, 6, '4782971594833095.jpg', '2020-07-15 14:11:35', '2020-07-15 14:11:35'),
(80, 6, '3667781594833095.jpg', '2020-07-15 14:11:36', '2020-07-15 14:11:36'),
(81, 6, '9256181594833096.jpg', '2020-07-15 14:11:36', '2020-07-15 14:11:36'),
(82, 6, '6781891594833096.jpg', '2020-07-15 14:11:36', '2020-07-15 14:11:36'),
(85, 8, '1381241595783500.jpg', '2020-07-26 14:11:40', '2020-07-26 14:11:40'),
(86, 8, '5471021595783500.jpg', '2020-07-26 14:11:40', '2020-07-26 14:11:40'),
(87, 8, '3977421595783500.png', '2020-07-26 14:11:40', '2020-07-26 14:11:40'),
(88, 10, '1392701596464795.jpg', '2020-08-03 11:26:35', '2020-08-03 11:26:35'),
(89, 10, '8295661596464795.jpg', '2020-08-03 11:26:35', '2020-08-03 11:26:35'),
(90, 10, '1459141596464795.jpg', '2020-08-03 11:26:35', '2020-08-03 11:26:35'),
(91, 9, '2826921596464811.jpg', '2020-08-03 11:26:51', '2020-08-03 11:26:51'),
(94, 9, '2057421596464825.jpg', '2020-08-03 11:27:05', '2020-08-03 11:27:05'),
(93, 9, '5100541596464811.jpg', '2020-08-03 11:26:52', '2020-08-03 11:26:52');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`, `address`, `city`, `state`, `country`, `pincode`, `mobile`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$StgXnuzxuj6u.ow.tuSUN.vfh/QmeqePgmb1KXOsvokpu0LieWBEW', 1, 'j1Ti9PrmRyAyIVoDZyRWMc1Zecaz5s2vWOvI5wpU9peAg3Fx3XLui1ebZEWo', '2018-12-06 01:40:27', '2020-07-11 08:29:36', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `xproducts`
--

CREATE TABLE `xproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexuri pentru tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`p_code`);

--
-- Indexuri pentru tabele `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexuri pentru tabele `xproducts`
--
ALTER TABLE `xproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `xproducts`
--
ALTER TABLE `xproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
