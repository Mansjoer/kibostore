-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 03:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kibostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2022-02-23 07:30:12', '2022-02-24 05:53:08'),
(2, 2, 0, '2022-02-24 05:56:44', '2022-02-24 05:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `change_logs`
--

CREATE TABLE `change_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_logs`
--

INSERT INTO `change_logs` (`id`, `title`, `description`, `version`, `created_at`, `updated_at`) VALUES
(1, NULL, '<ul>\r\n<li>\r\nAdd changelog page\r\n</li>\r\n<li>\r\nAdd current time in dashboard\r\n</li>\r\n<ul>', '1.0.0 Pre-Alpha', '2022-02-19 10:53:35', '2022-02-19 10:53:35'),
(2, NULL, '<ul>\r\n<li>\r\nAdd users page\r\n</li>\r\n<li>\r\nUpdate auth users & roles page to new page\r\n</li>\r\n</ul>', '1.0.1 Pre-Alpha', '2022-02-19 11:39:34', '2022-02-19 11:39:34'),
(3, NULL, '<ul>\r\n<li>\r\nAdd API connection to providers\r\n</li>\r\n<li>\r\nAdd games & products page\r\n</li>\r\n<li>\r\nAdd tickets/help page\r\n</li>\r\n<li>\r\nAdd balance widget to dashboard\r\n</li>\r\n</ul>', '1.0.2 Pre-Alpha', '2022-02-20 17:01:04', '2022-02-20 17:01:04'),
(4, 'More coming on next update!!', '<ul>\r\n<li>\r\nFix games & products page\r\n</li>\r\n<li>\r\nFix games didn\'t show correct products\r\n</li>\r\n<li>\r\nAdd users profile\r\n</li>\r\n<li>\r\nAdd images to game list\r\n</li>\r\n</ul>', '1.0.3 Pre-Alpha', '2022-02-21 03:17:29', '2022-02-21 03:17:29'),
(5, 'Get ready for Alpha Release!', '<ul>\r\n<li>\r\nAdd deposit page\r\n</li>\r\n<li>\r\nAdd deposit history page\r\n</li>\r\n<li>\r\nUpdated products in games\r\n</li>\r\n<li>\r\nDisabled logs page\r\n</li>\r\n<li>\r\nFix add, edit, delete games\r\n</li>\r\n<li>\r\nFix add, edit, delete games\r\n</li>\r\n</ul>', '1.0.4 Pre-Alpha', '2022-02-22 19:17:16', '2022-02-22 19:17:16'),
(6, NULL, '<ul>\r\n<li>\r\nAdd win rate calculator\r\n</li>\r\n<li>\r\nAdd order page\r\n</li>\r\n<li>\r\nAdd games & products to order page\r\n</li>\r\n<li>\r\nDisabled order products for a moment\r\n</li>\r\n</ul>', '1.0.5 Alpha', '2022-02-23 20:10:07', '2022-02-23 20:10:07'),
(7, NULL, '<ul>\r\n<li>\r\nAdd invoice page\r\n</li>\r\n<li>\r\nAdd landing page\r\n</li>\r\n<li>\r\nUpdate profile page\r\n</li>\r\n</ul>', '1.0.6 Alpha', '2022-02-25 12:44:31', '2022-02-25 12:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `display_name`, `slug`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ML', 'Mobile Legends', 'mobile-legends', 1, 'https://menorigaming.com/assets/images/1641713892705.png', '2022-02-20 12:24:07', '2022-02-22 13:51:09'),
(2, 'FF', 'Free Fire', 'free-fire', 1, 'https://menorigaming.com/assets/images/1641713959499.png', '2022-02-20 18:01:36', '2022-02-22 13:35:28'),
(3, 'ML', 'Mobile Legends Starlight', 'mobile-legends-starlight', 1, 'https://menorigaming.com/assets/images/1645244133337.png', '2022-02-21 07:42:17', '2022-02-22 13:35:30'),
(4, 'LOLWR', 'LOL Wild Rift', 'lol-wild-rift', 1, 'https://menorigaming.com/assets/images/1614510768264.png', '2022-02-21 08:05:22', '2022-02-25 16:33:22'),
(5, 'VLRNT', 'Valorant', 'valorant', 0, 'https://menorigaming.com/assets/images/1613384714374.png', '2022-02-22 00:24:59', '2022-02-25 15:10:25'),
(6, 'PB', 'Point Blank', 'point-blank', 0, 'https://menorigaming.com/assets/images/1615357433443.png', '2022-02-22 00:27:20', '2022-02-22 13:35:39'),
(7, 'PUBGM', 'PUBG Mobile', 'pubg-mobile', 0, 'https://menorigaming.com/assets/images/1641714041121.png', '2022-02-22 00:28:35', '2022-02-22 13:35:42'),
(8, 'CODM', 'COD Mobile', 'cod-mobile', 0, 'https://menorigaming.com/assets/images/1616010840819.png', '2022-02-22 00:28:56', '2022-02-22 13:35:44'),
(10, 'SM', 'Sausage Man', 'sausage-man', 0, 'https://menorigaming.com/assets/images/1642931211302.png', '2022-02-23 19:37:17', '2022-02-23 19:37:22'),
(11, 'AOV', 'Arena of Valor', 'arena-of-valor', 0, 'https://menorigaming.com/assets/images/1643164434509.png', '2022-02-23 19:38:01', '2022-02-23 19:38:05'),
(12, 'GI', 'Genshin Impact', 'genshin-impact', 0, 'https://ae01.alicdn.com/kf/H73ab531171ed4bf08c2e275d8164af4c4/Keqing-Wallpaper-Genshin-Impact-Wall-Murals-Custom-3D-Wallpaper-Anime-game-Cosplay-Bedroom-Living-room-Sofa.jpg_Q90.jpg_.webp', '2022-02-23 19:39:04', '2022-02-23 19:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `game_product`
--

CREATE TABLE `game_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_product`
--

INSERT INTO `game_product` (`id`, `game_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '2022-02-21 07:46:16', '2022-02-21 07:46:16'),
(2, '3', '2', '2022-02-21 07:46:42', '2022-02-21 07:46:42'),
(3, '3', '3', '2022-02-21 07:47:06', '2022-02-21 07:47:06'),
(4, '4', '4', '2022-02-21 08:06:11', '2022-02-21 08:06:11'),
(5, '4', '5', '2022-02-21 08:06:45', '2022-02-21 08:06:45'),
(6, '4', '6', '2022-02-21 08:07:13', '2022-02-21 08:07:13'),
(7, '4', '7', '2022-02-21 08:07:47', '2022-02-21 08:07:47'),
(8, '4', '8', '2022-02-21 08:08:16', '2022-02-21 08:08:16'),
(9, '4', '9', '2022-02-21 08:08:42', '2022-02-21 08:08:42'),
(10, '2', '10', '2022-02-22 00:44:13', '2022-02-22 00:44:13'),
(11, '1', '11', '2022-02-22 10:45:52', '2022-02-22 10:45:52'),
(13, '1', '12', '2022-02-24 08:26:27', '2022-02-24 08:26:27'),
(14, '1', '13', '2022-02-24 08:26:45', '2022-02-24 08:26:45'),
(15, '1', '14', '2022-02-24 08:27:45', '2022-02-24 08:27:45'),
(16, '1', '15', '2022-02-24 08:28:14', '2022-02-24 08:28:14'),
(17, '1', '16', '2022-02-24 08:28:37', '2022-02-24 08:28:37'),
(18, '1', '17', '2022-02-24 08:29:06', '2022-02-24 08:29:06'),
(19, '1', '18', '2022-02-24 08:29:21', '2022-02-24 08:29:21'),
(20, '1', '19', '2022-02-24 08:31:36', '2022-02-24 08:31:36'),
(21, '1', '20', '2022-02-24 08:31:55', '2022-02-24 08:31:55'),
(22, '1', '21', '2022-02-24 08:32:29', '2022-02-24 08:32:29'),
(23, '1', '22', '2022-02-24 08:32:55', '2022-02-24 08:32:55'),
(24, '1', '23', '2022-02-24 08:33:17', '2022-02-24 08:33:17'),
(25, '1', '24', '2022-02-24 08:33:46', '2022-02-24 08:33:46'),
(26, '1', '25', '2022-02-24 08:36:17', '2022-02-24 08:36:17'),
(27, '3', '26', '2022-02-26 05:37:22', '2022-02-26 05:37:22'),
(28, '3', '27', '2022-02-26 05:38:13', '2022-02-26 05:38:13');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_18_221006_create_roles_table', 2),
(6, '2022_02_19_065251_add_last_seen_to_users_table', 3),
(7, '2022_02_19_083948_add_login_fields_to_users_table', 4),
(8, '2022_02_19_163737_create_change_logs_table', 5),
(9, '2022_02_19_200805_create_tickets_table', 6),
(10, '2022_02_20_174249_create_games_table', 7),
(11, '2022_02_20_232027_create_products_table', 8),
(12, '2022_02_21_020636_create_game_products_table', 9),
(13, '2022_02_21_122739_create_games_products_table', 10),
(14, '2022_02_21_123740_create_game_product_table', 11),
(15, '2022_02_22_103153_create_activity_log_table', 12),
(16, '2022_02_22_103154_add_event_column_to_activity_log_table', 12),
(17, '2022_02_22_103155_add_batch_uuid_column_to_activity_log_table', 12),
(18, '2022_02_22_232640_create_deposits_table', 13),
(19, '2022_02_23_031352_create_dd_table', 14),
(20, '2022_02_23_142148_create_balances_table', 15),
(21, '2022_02_24_134713_create_orders_table', 16),
(22, '2022_02_24_134752_create_invoices_table', 16),
(23, '2022_02_25_001839_create_orders_table', 17),
(24, '2022_02_25_002138_create_order_product_table', 17),
(25, '2022_02_26_112511_create_subscribers_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_price` int(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `profit` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_sku`, `name`, `slug`, `seller_price`, `price`, `profit`, `created_at`, `updated_at`) VALUES
(1, 'MLSMP', 'MOBILELEGEND Startlight Member Plus', 'mlsmp', 192000, 235000, 43000, '2022-02-21 07:46:16', '2022-02-22 14:03:43'),
(2, 'MLSM', 'MOBILELEGEND Startlight Member', 'mlsm', 89000, 115000, 26000, '2022-02-21 07:46:42', '2022-02-22 14:03:54'),
(3, 'MLTP', 'MOBILELEGEND Twilight Pass', 'mltp', 89000, 115000, 26000, '2022-02-21 07:47:06', '2022-02-22 14:03:58'),
(4, 'LOL420', 'League of Legends Wild Rift 420 Wild Cores', 'lol420', 48500, 50000, 1500, '2022-02-21 08:06:11', '2022-02-22 14:04:08'),
(5, 'LOL720', 'League of Legends Wild Rift 700 Wild Cores', 'lol720', 77600, 79000, 1400, '2022-02-21 08:06:45', '2022-02-22 14:04:12'),
(6, 'LOL1375', 'League of Legends Wild Rift 1375 Wild Cores', 'lol1375', 145500, 148000, 2500, '2022-02-21 08:07:13', '2022-02-22 14:04:15'),
(7, 'LOL2400', 'League of Legends Wild Rift 2400 Wild Cores', 'lol2400', 242500, 248000, 5500, '2022-02-21 08:07:47', '2022-02-22 14:04:18'),
(8, 'LOL4000', 'League of Legends Wild Rift 4000 Wild Cores', 'lol4000', 388025, 395000, 6975, '2022-02-21 08:08:16', '2022-02-22 14:04:21'),
(9, 'LOL8150', 'League of Legends Wild Rift 8150 Wild Cores', 'lol8150', 776025, 785000, 8975, '2022-02-21 08:08:42', '2022-02-22 14:04:24'),
(10, 'FF50', 'Free Fire 50 Diamond', 'ff50', 6500, 7000, 500, '2022-02-22 00:44:13', '2022-02-23 19:07:12'),
(12, 'ML172', 'MOBILELEGEND - 172 Diamond', 'ml172', 39200, 40000, 800, '2022-02-24 08:26:27', '2022-02-24 08:26:27'),
(13, 'ML257', 'MOBILELEGEND - 257 Diamond', 'ml257', 59000, 60000, 1000, '2022-02-24 08:26:45', '2022-02-24 08:26:45'),
(14, 'ML344', 'MOBILELEGEND - 344 Diamond', 'ml344', 79200, 80000, 800, '2022-02-24 08:27:45', '2022-02-24 08:27:45'),
(15, 'ML429', 'MOBILELEGEND - 429 Diamond', 'ml429', 94200, 105000, 10800, '2022-02-24 08:28:14', '2022-02-24 08:28:14'),
(16, 'ML514', 'MOBILELEGEND - 514 Diamond', 'ml514', 113000, 125000, 12000, '2022-02-24 08:28:37', '2022-02-24 08:28:37'),
(17, 'ML706', 'MOBILELEGEND - 706 Diamond', 'ml706', 156000, 165000, 9000, '2022-02-24 08:29:06', '2022-02-24 08:29:06'),
(18, 'ML878', 'MOBILELEGEND - 878 Diamond', 'ml878', 196000, 210000, 14000, '2022-02-24 08:29:21', '2022-02-24 08:29:21'),
(19, 'ML963', 'MOBILELEGEND - 963 Diamond', 'ml963', 220220, 230000, 9780, '2022-02-24 08:31:36', '2022-02-24 08:31:36'),
(20, 'ML1412', 'MOBILELEGEND - 1412 Diamond', 'ml1412', 320320, 335000, 14680, '2022-02-24 08:31:55', '2022-02-24 08:31:55'),
(21, 'ML2195', 'MOBILELEGEND - 2195 Diamond', 'ml2195', 470000, 495000, 25000, '2022-02-24 08:32:29', '2022-02-24 08:32:29'),
(22, 'ML3688', 'MOBILELEGEND - 3688 Diamond', 'ml3688', 783935, 825000, 41065, '2022-02-24 08:32:55', '2022-02-24 08:32:55'),
(23, 'ML4830', 'MOBILELEGEND - 4830 Diamond', 'ml4830', 1095025, 1150000, 54975, '2022-02-24 08:33:17', '2022-02-24 08:35:44'),
(24, 'ML5532', 'MOBILELEGEND - 5532 Diamond', 'ml5532', 1177305, 1240000, 62695, '2022-02-24 08:33:46', '2022-02-24 08:33:46'),
(25, 'ML9288', 'MOBILELEGEND - 9288 Diamond', 'ml9288', 1961215, 2070000, 108785, '2022-02-24 08:36:17', '2022-02-24 08:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Owner', '2022-02-18 16:10:53', '2022-02-18 16:10:53'),
(2, 'admin', 'Admin', '2022-02-18 17:10:06', '2022-02-18 17:10:06'),
(3, 'member', 'Member', '2022-02-18 17:10:29', '2022-02-25 12:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role_id`, `email`, `email_verified_at`, `phone`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`, `last_seen`, `last_login_at`, `last_login_ip`) VALUES
(1, 'Aditya Ramadhana', 'Bisquit', 1, 'ramabljredit@gmail.com', NULL, '0812 9944 0855', 'bronze-b.png', '$2y$10$VV4SLhlM2ZSNUL2lsugL4.Rt6g7LYcqpx1iRN/4nFlVdslQkzBpPi', 'ief5PjJwlqEqMjYARfkpiCxfhLV4fBejSHWO4KpNCul0K0FlhxGtVfI5Bq0A', '2022-02-09 06:34:55', '2022-02-27 17:30:17', '2022-02-27 17:30:17', '2022-02-27 21:48:55', NULL),
(2, 'Zildan Abubakar Yusuf', 'Tango', 1, 'tango@kibostore.com', NULL, '____ ____ ____', 'default.png', '$2y$10$4enp/ALWiNH88qCUyzengOR/dobK00Luuva1B6/pu6sCXW3C.nIe6', 'ief5PjJwlqEqMjYARfkpiCxfhLV4fBejSHWO4KpNCul0K0FlhxGtVfI5Bq0Y', '2022-02-25 15:06:50', '2022-02-27 13:22:37', '2022-02-27 13:22:37', '2022-02-27 20:21:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `balances_user_id_unique` (`user_id`);

--
-- Indexes for table `change_logs`
--
ALTER TABLE `change_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `game_product`
--
ALTER TABLE `game_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `change_logs`
--
ALTER TABLE `change_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `game_product`
--
ALTER TABLE `game_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
