-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 07:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multivendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin Dev', 'admin@gmail.com', '$2y$10$UT24wVPLG5G9eUBZCuIq.u/YtaE.QV3ynOi3YdgisNLp3r..w4ywC', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conditional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `conditional`, `slug`, `description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hot Summmer Collection', 'promo', 'hot-summmer-collection1665783375-hot-summmer-collection', 'Buy one Get one Offer is active now', 'upload/banners/banner1031612242.jpg', 'active', '2022-10-14 15:05:35', '2022-10-14 15:36:15'),
(2, '30% mega Discount for the Season', 'banner', '30-mega-discount-for-the-season', 'ega Discount for the Seasonega Discount for the Seasonega Discount for the Season', 'upload/banners/banner1078031415.jpg', 'active', '2022-10-14 15:08:15', '2022-10-14 15:35:30'),
(3, 'Dama offer only today', 'banner', 'dama-offer-only-today1665783418-dama-offer-only-today', 'Dama offer only todayDama offer only todayDama offer only todayDama offer only today', 'upload/banners/banner1099226266.jpg', 'active', '2022-10-14 15:25:49', '2022-10-14 15:36:58'),
(4, 'Winter Product 50% Flat sell', 'promo', 'winter-product-50-flat-sell', 'Winter Product 50% Flat sell  Winter Product 50% Flat sell  Winter Product 50% Flat sell', 'upload/banners/banner1024545598.jpg', 'active', '2022-10-14 15:29:36', '2022-10-14 15:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `order_id`, `name`, `email`, `address1`, `address2`, `country`, `city`, `zip_code`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'customer jk', 'customer@gmail.com', 'fjfj', 'jfjfj', 'fjfjfj', 'fjfjfj', '89', '9898098808', NULL, NULL, NULL),
(2, 3, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address2', 'bd', 'mb', '3230', '9898098808', 'ffff', NULL, NULL),
(3, 4, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address2', 'bd', 'moulvibazar', '3032', '9898098808', 'fff', NULL, NULL),
(4, 7, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1d', 'Bangladesh', 'demo city', '4585', '9898098808', 'ddd', NULL, NULL),
(5, 13, 'customer jk', 'customer@gmail.com', 'fjffj', 'demo address1', 'Bangladesh', 'demo city', '52652', '9898098808', NULL, NULL, NULL),
(6, 14, 'customer jk', 'customer@gmail.com', 'demo address1', 'fjffj', 'Bangladesh', 'moulvibazar', '25888', '9898098808', 'jjjjj', NULL, NULL),
(7, 15, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', 'ddd', NULL, NULL),
(8, 16, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', 'ddd', NULL, NULL),
(9, 17, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', 'ddd', NULL, NULL),
(10, 18, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', 'ddd', NULL, NULL),
(11, 19, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', 'ddd', NULL, NULL),
(12, 20, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', 'ddd', NULL, NULL),
(13, 21, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'bangladesh', 'Kulaura', '3433', '9898098808', 'dddd', NULL, NULL),
(14, 22, 'customer jk', 'developerjk9356@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'demo city', '4848484', '9898098808', 'ddd', NULL, NULL),
(15, 23, 'developer', 'developerjk9356@gmail.com', 'demo address1', 'demo address2', 'Bangladesh', 'demo city', '3032', '01601158098', 'fddfffdddd', NULL, NULL),
(16, 25, 'developer', 'developerjk9356@gmail.com', 'demo address1', 'demo address1', 'ddd', 'demo city', '333', '01601158098', 'ddd', NULL, NULL),
(17, 26, 'developer', 'developerjk9356@gmail.com', 'demo address1', 'demo address1', 'ddd', 'demo city', '3230', '01601158098', NULL, NULL, NULL),
(18, 27, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'demo address1', 'Bangladesh', 'moulvibazar', '2020', '01601158098', 'dd', NULL, NULL),
(19, 28, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'demo address1', 'Bangladesh', 'moulvibazar', '2020', '01601158098', 'dd', NULL, NULL),
(20, 29, 'developer', 'developerjk9356@gmail.com', 'jishan address1', 'Kularua Mouvlibazar', 'Bangladesh', 'demo city', '3032', '01601158098', 'hhhh', NULL, NULL),
(21, 30, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'jishan address1', 'Bangladesh', 'moulvibazar', '2828', '01601158098', NULL, NULL, NULL),
(22, 31, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '3220', '01601158098', 'ddd', NULL, NULL),
(23, 32, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '3220', '01601158098', 'ddd', NULL, NULL),
(24, 33, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '3220', '01601158098', 'ddd', NULL, NULL),
(25, 34, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '2020', '01601158098', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'voluptatem', 'et-sed-aut-corporis', 'https://via.placeholder.com/120x100.png/00aaff?text=corrupti', 'active', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(2, 'id', 'consequuntur-cupiditate-qui-voluptatum-laboriosam-quae-minus-quibusdam', 'https://via.placeholder.com/120x100.png/00ee66?text=tenetur', 'inactive', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(3, 'repellat', 'fugit-nihil-officia-id-at-nemo-animi', 'https://via.placeholder.com/120x100.png/008811?text=repellat', 'active', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(4, 'porro', 'nesciunt-sunt-qui-est-perspiciatis-animi-omnis', 'https://via.placeholder.com/120x100.png/00ff99?text=iusto', 'inactive', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(5, 'Zara', 'Zara', 'https://via.placeholder.com/120x100.png/0055dd?text=qui', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:57:25'),
(6, 'hic', 'tenetur-doloremque-quia-et-est-et', 'https://via.placeholder.com/120x100.png/00ee55?text=et', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(7, 'nostrum', 'quisquam-dolorem-reiciendis-quia-eaque-asperiores-dignissimos', 'https://via.placeholder.com/120x100.png/001100?text=earum', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(8, 'rem', 'aut-quia-rem-perferendis-aut-repudiandae-amet-dolorum-qui', 'https://via.placeholder.com/120x100.png/00ee99?text=magnam', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(9, 'perspiciatis', 'error-accusamus-cumque-doloribus-qui-odio-beatae-et', 'https://via.placeholder.com/120x100.png/00dd55?text=a', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(10, 'rerum', 'eos-eum-quia-odio', 'https://via.placeholder.com/120x100.png/009988?text=porro', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(11, 'suscipit', 'impedit-dignissimos-ut-facere-ratione-cupiditate-dolore', 'https://via.placeholder.com/120x100.png/0088ee?text=voluptatem', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(12, 'quis', 'aut-voluptatem-nesciunt-minus-qui-qui-et-officiis', 'https://via.placeholder.com/120x100.png/00ffbb?text=aperiam', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(13, 'nemo', 'et-laborum-nostrum-optio-molestias', 'https://via.placeholder.com/120x100.png/002288?text=nobis', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(14, 'repellendus', 'nemo-sit-quae-quo-necessitatibus-eum', 'https://via.placeholder.com/120x100.png/00eeff?text=ratione', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(15, 'modi', 'expedita-vitae-quia-atque-repudiandae-quis-placeat-porro', 'https://via.placeholder.com/120x100.png/0088dd?text=incidunt', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(16, 'esse', 'dolorem-ipsam-voluptatem-hic', 'https://via.placeholder.com/120x100.png/003300?text=qui', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(17, 'ut', 'voluptas-est-qui-libero-est-id-delectus', 'https://via.placeholder.com/120x100.png/0055ff?text=et', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(18, 'culpa', 'et-vel-eaque-eum-qui-tempore', 'https://via.placeholder.com/120x100.png/00ccee?text=et', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(19, 'animi', 'et-id-provident-veniam-et-ut-quidem', 'https://via.placeholder.com/120x100.png/00aa88?text=et', 'active', '2022-10-04 01:01:57', '2022-10-04 01:01:57'),
(20, 'et', 'voluptatem-libero-error-ut-ut', 'https://via.placeholder.com/120x100.png/009977?text=voluptatibus', 'inactive', '2022-10-04 01:01:57', '2022-10-04 01:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men`s Fashion', '1665784098-', 'upload/category/category1023761466.jpg', 'active', '2022-10-04 01:52:51', '2022-10-14 15:48:18'),
(2, 'Women`s Fashion', '1665635074-', 'upload/category/category1089893631.webp', 'active', '2022-10-04 01:54:25', '2022-10-12 22:24:34'),
(3, 'Health & Beauty', 'health-beauty', 'upload/category/category1020739601.webp', 'active', '2022-10-12 22:12:30', '2022-10-12 22:12:30'),
(4, 'Babies & Toys', 'babies-toys', 'upload/category/category1030796601.webp', 'active', '2022-10-12 22:13:41', '2022-10-12 22:13:41'),
(5, 'TV & Home Appliances', 'tv-home-appliances', 'upload/category/category1068627240.webp', 'active', '2022-10-12 22:15:58', '2022-10-12 22:15:58'),
(6, 'Home & Lifestyle', 'home-lifestyle', 'upload/category/category1046161651.webp', 'active', '2022-10-12 22:18:41', '2022-10-12 22:18:41'),
(7, 'Groceries & Pets', 'groceries-pets', 'upload/category/category1043236671.png', 'active', '2022-10-12 22:20:11', '2022-10-12 22:20:11'),
(8, 'Electronics Devices', 'electronics-devices', 'upload/category/category1016126372.webp', 'active', '2022-10-12 22:22:14', '2022-10-12 22:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, '2222', 'inactive', '2022-10-04 01:01:58', '2022-10-13 03:28:29'),
(2, 'red', 'active', '2022-10-04 01:01:59', '2022-10-13 03:12:36'),
(3, 'blue', 'active', '2022-10-04 01:01:59', '2022-10-13 03:13:11'),
(4, 'white', 'active', '2022-10-04 01:01:59', '2022-10-13 03:14:01'),
(5, 'black', 'active', '2022-10-04 01:01:59', '2022-10-13 03:15:16'),
(6, 'yellow', 'active', '2022-10-13 03:32:38', '2022-10-13 03:32:38'),
(7, 'orange', 'active', '2022-10-13 03:33:15', '2022-10-13 03:33:15'),
(8, 'gray', 'active', '2022-10-13 03:33:53', '2022-10-13 03:33:53'),
(9, 'purple', 'active', '2022-10-13 03:34:31', '2022-10-13 03:34:31'),
(10, 'brown', 'active', '2022-10-13 03:35:01', '2022-10-13 03:35:01'),
(11, 'green', 'active', '2022-10-13 03:35:47', '2022-10-13 03:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `value` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `exchange_rate`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BDT', 'ট', '100', 'bdt', 'active', '2022-10-12 22:08:01', '2022-10-12 22:10:03');

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
-- Table structure for table `file_uploads`
--

CREATE TABLE `file_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grand_child_categories`
--

CREATE TABLE `grand_child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grand_child_categories`
--

INSERT INTO `grand_child_categories` (`id`, `sub_cat_id`, `name`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, 'Ballet Flats', '1665642985-', '', 'active', '2022-10-13 00:09:42', '2022-10-13 00:36:25'),
(2, 19, 'Pumps', '', '', 'active', '2022-10-13 00:22:35', '2022-10-13 00:35:45'),
(3, 19, 'Flat Sandals', '1665643721-', '', 'active', '2022-10-13 00:41:07', '2022-10-13 00:48:41'),
(4, 19, 'Fashion Boots', '1665643685-', '', 'active', '2022-10-13 00:41:57', '2022-10-13 00:48:05'),
(5, 19, 'Flip Flops', '1665643646-', '', 'active', '2022-10-13 00:42:39', '2022-10-13 00:47:26'),
(6, 19, 'Heeled Sandals', '1665643600-', '', 'active', '2022-10-13 00:43:24', '2022-10-13 00:46:40'),
(7, 19, 'House Slippers', 'house-slippers', '', 'active', '2022-10-13 00:45:51', '2022-10-13 00:45:51'),
(8, 19, 'Sneakers', 'sneakers', '', 'active', '2022-10-13 00:49:44', '2022-10-13 00:49:44'),
(9, 19, 'Wedge Sandals', 'wedge-sandals', '', 'active', '2022-10-13 00:50:51', '2022-10-13 00:50:51'),
(10, 18, 'Accessories', 'accessories', '', 'active', '2022-10-13 00:52:36', '2022-10-13 00:52:36'),
(11, 18, 'Dresses & Jumpsuits', 'dresses-jumpsuits', '', 'active', '2022-10-13 00:53:16', '2022-10-13 00:53:16'),
(12, 18, 'Hijabs', 'hijabs', '', 'active', '2022-10-13 00:54:00', '2022-10-13 00:54:00'),
(13, 18, 'Outerwear', 'outerwear', '', 'active', '2022-10-13 00:55:00', '2022-10-13 00:55:00'),
(14, 17, 'Dresses', 'dresses', '', 'active', '2022-10-13 01:24:44', '2022-10-13 01:24:44'),
(15, 2, 'Jeggings', 'jeggings', '', 'active', '2022-10-13 01:25:22', '2022-10-13 01:25:22'),
(16, 17, 'Plazzo Pants & Culotters', 'plazzo-pants-culotters', '', 'active', '2022-10-13 01:26:37', '2022-10-13 01:26:37'),
(17, 17, 'Kurtis', 'kurtis', '', 'active', '2022-10-13 01:26:55', '2022-10-13 01:26:55'),
(18, 17, 'Pants', 'pants', '', 'active', '2022-10-13 01:27:43', '2022-10-13 01:27:43'),
(19, 17, 'Sarees', 'sarees', '', 'active', '2022-10-13 01:27:59', '2022-10-13 01:27:59'),
(20, 17, 'Skirts', 'skirts', '', 'active', '2022-10-13 01:28:51', '2022-10-13 01:28:51'),
(21, 17, 'Tops', 'tops', '', 'active', '2022-10-13 01:29:09', '2022-10-13 01:29:09'),
(22, 17, 'T-shirts', 't-shirts', '', 'active', '2022-10-13 01:29:40', '2022-10-13 01:29:40'),
(23, 17, 'Tunics', 'tunics', '', 'active', '2022-10-13 01:30:16', '2022-10-13 01:30:16'),
(24, 17, 'Shalwar Kameez', 'shalwar-kameez', '', 'active', '2022-10-13 01:30:58', '2022-10-13 01:30:58'),
(25, 2, 'T-shirts', 't-shirts1665774340-t-shirts', '', 'active', '2022-10-14 13:05:40', '2022-10-14 13:05:40'),
(26, 2, 'Casual Shirts', 'casual-shirts', '', 'active', '2022-10-14 13:12:18', '2022-10-14 13:12:18'),
(27, 2, 'Jeans', 'jeans', '', 'active', '2022-10-14 13:12:37', '2022-10-14 13:12:37'),
(28, 2, 'Panjabi', 'panjabi', '', 'active', '2022-10-14 13:13:34', '2022-10-14 13:13:34'),
(29, 2, 'Polo T-shirt', 'polo-t-shirt', '', 'active', '2022-10-14 13:14:24', '2022-10-14 13:14:24'),
(30, 2, 'Socks', 'socks', '', 'active', '2022-10-14 13:15:20', '2022-10-14 13:15:20'),
(31, 2, 'Chinos', 'chinos', '', 'active', '2022-10-14 13:15:43', '2022-10-14 13:15:43'),
(32, 2, 'Joggers & Sweats', 'joggers-sweats', '', 'active', '2022-10-14 13:16:34', '2022-10-14 13:16:34'),
(33, 2, 'Trunks & Boxers', 'trunks-boxers', '', 'active', '2022-10-14 13:17:13', '2022-10-14 13:17:13'),
(34, 3, 'Sneakers', 'sneakers1665775097-sneakers', '', 'active', '2022-10-14 13:18:17', '2022-10-14 13:18:17'),
(35, 3, 'Slip-Ons & Loafers', 'slip-ons-loafers', '', 'active', '2022-10-14 13:19:24', '2022-10-14 13:19:24'),
(36, 2, 'Flip Flops', 'flip-flops', '', 'active', '2022-10-14 13:19:51', '2022-10-14 13:19:51'),
(37, 3, 'Formal Shoes', 'formal-shoes', '', 'active', '2022-10-14 13:20:38', '2022-10-14 13:20:38'),
(38, 3, 'Sandals', 'sandals', '', 'active', '2022-10-14 13:21:19', '2022-10-14 13:21:19'),
(39, 4, 'Backpacks', 'backpacks', '', 'active', '2022-10-14 13:48:19', '2022-10-14 13:48:19'),
(40, 4, 'Business Bags', 'business-bags', '', 'active', '2022-10-14 13:49:22', '2022-10-14 13:49:22'),
(41, 4, 'Crossbody Bags', 'crossbody-bags', '', 'active', '2022-10-14 13:49:48', '2022-10-14 13:49:48'),
(42, 4, 'Messenger Bags', 'messenger-bags', '', 'active', '2022-10-14 13:50:21', '2022-10-14 13:50:21'),
(43, 4, 'Wallets & Accessories', 'wallets-accessories', '', 'active', '2022-10-14 13:50:58', '2022-10-14 13:50:58'),
(44, 4, 'Tote Bags', 'tote-bags', '', 'active', '2022-10-14 13:51:46', '2022-10-14 13:51:46'),
(45, 5, 'Batik Shirts', '1665777225-', '', 'active', '2022-10-14 13:52:40', '2022-10-14 13:53:45'),
(46, 5, 'Jubbahs', 'jubbahs', '', 'active', '2022-10-14 13:54:09', '2022-10-14 13:54:09'),
(47, 5, 'Muslimin Shirts', 'muslimin-shirts', '', 'active', '2022-10-14 13:55:00', '2022-10-14 13:55:00'),
(48, 5, 'Accessories', 'accessories1665777336-accessories', '', 'active', '2022-10-14 13:55:36', '2022-10-14 13:55:36'),
(49, 6, 'Belts', 'belts', '', 'active', '2022-10-14 13:56:51', '2022-10-14 13:56:51'),
(50, 6, 'Bow Ties', 'bow-ties', '', 'active', '2022-10-14 13:57:18', '2022-10-14 13:57:18'),
(51, 6, 'Cufflinks', 'cufflinks', '', 'active', '2022-10-14 13:57:58', '2022-10-14 13:57:58'),
(52, 6, 'Hats & Caps', 'hats-caps', '', 'active', '2022-10-14 13:58:37', '2022-10-14 13:58:37'),
(53, 6, 'Umbrellas', 'umbrellas', '', 'active', '2022-10-14 13:58:48', '2022-10-14 13:58:48'),
(54, 6, 'Ties', 'ties', '', 'active', '2022-10-14 13:59:35', '2022-10-14 13:59:35'),
(55, 7, 'Business', 'business', '', 'active', '2022-10-14 14:02:48', '2022-10-14 14:02:48'),
(56, 7, 'Causel', 'causel', '', 'active', '2022-10-14 14:03:31', '2022-10-14 14:03:31'),
(57, 7, 'Fashion', 'fashion', '', 'active', '2022-10-14 14:04:00', '2022-10-14 14:04:00'),
(58, 7, 'Accessories', 'accessories1665777877-accessories', '', 'active', '2022-10-14 14:04:37', '2022-10-14 14:04:37'),
(59, 20, 'Fashion', 'fashion1665777999-fashion', '', 'active', '2022-10-14 14:06:39', '2022-10-14 14:06:39'),
(60, 20, 'Causel', 'causel1665778044-causel', '', 'active', '2022-10-14 14:07:24', '2022-10-14 14:07:24'),
(61, 20, 'Business', 'business1665778076-business', '', 'active', '2022-10-14 14:07:56', '2022-10-14 14:07:56'),
(62, 20, 'Sports', 'sports', '', 'active', '2022-10-14 14:08:17', '2022-10-14 14:08:17'),
(63, 20, 'Accessories', 'accessories1665778134-accessories', '', 'active', '2022-10-14 14:08:54', '2022-10-14 14:08:54'),
(64, 21, 'Backpacks', 'backpacks1665778196-backpacks', '', 'active', '2022-10-14 14:09:56', '2022-10-14 14:09:56'),
(65, 21, 'Crossbody & Shoulder Bags', 'crossbody-shoulder-bags', '', 'active', '2022-10-14 14:10:38', '2022-10-14 14:10:38'),
(66, 21, 'Clutches', 'clutches', '', 'active', '2022-10-14 14:11:25', '2022-10-14 14:11:25'),
(67, 21, 'Top  Handle Bags', 'top-handle-bags', '', 'active', '2022-10-14 14:12:00', '2022-10-14 14:12:00'),
(68, 21, 'Tote Bags', 'tote-bags1665778363-tote-bags', '', 'active', '2022-10-14 14:12:43', '2022-10-14 14:12:43'),
(69, 21, 'Wallets', 'wallets', '', 'active', '2022-10-14 14:13:13', '2022-10-14 14:13:13'),
(70, 21, 'Wristlets', 'wristlets', '', 'active', '2022-10-14 14:13:42', '2022-10-14 14:13:42'),
(71, 22, 'Nose Pin & Piercing', 'nose-pin-piercing', '', 'active', '2022-10-14 14:15:17', '2022-10-14 14:15:17'),
(72, 22, 'Bracelets', 'bracelets', '', 'active', '2022-10-14 14:15:42', '2022-10-14 14:15:42'),
(73, 22, 'Necklaces', 'necklaces', '', 'active', '2022-10-14 14:16:27', '2022-10-14 14:16:27'),
(74, 22, 'Earrings', 'earrings', '', 'active', '2022-10-14 14:17:08', '2022-10-14 14:17:08'),
(75, 22, 'Rings', 'rings', '', 'active', '2022-10-14 14:17:27', '2022-10-14 14:17:27'),
(76, 22, 'Jewellery Storage', 'jewellery-storage', '', 'active', '2022-10-14 14:18:30', '2022-10-14 14:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2022_05_08_062814_create_banners_table', 1),
(5, '2022_05_16_113801_create_mails_table', 1),
(6, '2022_05_16_150355_create_mobile_s_m_s_table', 1),
(7, '2022_05_25_114423_create_file_uploads_table', 1),
(8, '2022_05_25_141157_create_folders_table', 1),
(9, '2022_05_26_064231_create_multi_files_table', 1),
(10, '2022_06_21_141117_create_brands_table', 1),
(11, '2022_06_27_060920_create_sizes_table', 1),
(12, '2022_06_27_105926_create_colors_table', 1),
(13, '2022_07_09_065314_create_temp_images_table', 1),
(14, '2022_07_09_140438_create_mutli_product_imgs_table', 1),
(15, '2022_07_11_162103_create_sections_table', 1),
(16, '2022_07_12_055117_create_categories_table', 1),
(17, '2022_07_12_061745_create_sub_categories_table', 1),
(18, '2022_07_12_134908_create_grand_child_categories_table', 1),
(19, '2022_07_12_181942_create_products_table', 1),
(20, '2022_08_27_084407_create_coupons_table', 1),
(21, '2022_09_03_100102_create_billings_table', 1),
(22, '2022_09_03_100125_create_shippings_table', 1),
(23, '2022_09_03_100147_create_orders_table', 1),
(24, '2022_09_08_091609_create_ordered_products_table', 1),
(25, '2022_09_23_025724_create_currencies_table', 1),
(26, '2022_09_29_195810_create_settings_table', 1),
(27, '2022_09_29_212337_create_product_attributes_table', 1),
(28, '2022_09_30_145400_create_reviews_table', 1),
(29, '2022_10_02_082634_create_admins_table', 1),
(30, '2022_10_02_170712_create_sellers_table', 1),
(31, '2022_10_17_170540_create_verify_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_s_m_s`
--

CREATE TABLE `mobile_s_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multi_files`
--

CREATE TABLE `multi_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mutli_product_imgs`
--

CREATE TABLE `mutli_product_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutli_product_imgs`
--

INSERT INTO `mutli_product_imgs` (`id`, `product_id`, `user_id`, `file`, `created_at`, `updated_at`) VALUES
(1, '3', '1_admin', '1df476de4ea1d829385c3102e995b717.jpg_500x500.jpg_.webp', '2022-10-14 11:32:10', '2022-10-14 11:32:10'),
(2, '3', '1_admin', '684a7142d7df102692a1204173217bc0.jpg_400x400.jpg_.webp', '2022-10-14 11:32:10', '2022-10-14 11:32:10'),
(3, '4', '1_admin', '2823f1e547f53c91a492f93b463bc6d3.jpg_500x500.jpg_.webp', '2022-10-14 11:42:21', '2022-10-14 11:42:21'),
(4, '5', '1_admin', '436ef0811166e620e3609a4e9e07a66b.jpg_500x500.jpg_.webp', '2022-10-14 11:52:29', '2022-10-14 11:52:29'),
(5, '6', '1_admin', '0813904728248ba774fa0e60ed0ecc12.jpg_500x500.jpg_.webp', '2022-10-14 12:13:21', '2022-10-14 12:13:21'),
(6, '6', '1_admin', 'c8cf801f05f4f2a1cfab0d1665f50522.jpg_500x500.jpg_.webp', '2022-10-14 12:13:21', '2022-10-14 12:13:21'),
(7, '7', '1_admin', '28db0d5466df14459b76a59f95e5f140.jpg_400x400.jpg_.webp', '2022-10-14 12:18:47', '2022-10-14 12:18:47'),
(8, '7', '1_admin', '28db0d5466df14459b76a59f95e5f140.jpg_500x500.jpg_.webp', '2022-10-14 12:18:48', '2022-10-14 12:18:48'),
(9, '8', '1_seller', 'f89a490a3281632dfc460ed4ac3be4cd.jpg_500x500.jpg_.webp', '2022-10-14 12:30:51', '2022-10-14 12:30:51'),
(10, '8', '1_seller', 'c90f45949ff7b05487c4b949c927ed4e.jpg_500x500.jpg_.webp', '2022-10-14 12:30:52', '2022-10-14 12:30:52'),
(11, '8', '1_seller', 'efc8de631617ff23c2c2bcccbea462a5.jpg_360x624q80.jpg_.webp', '2022-10-14 12:30:52', '2022-10-14 12:30:52'),
(12, '9', '1_admin', '0d6bee101a77136397ed1ec95a0bb564.jpg_500x500.jpg_.webp', '2022-10-14 14:42:24', '2022-10-14 14:42:24'),
(13, '10', '1_admin', '0bb3961a1d5d76916c7f08a02109ee12.jpg_500x500.jpg_.webp', '2022-10-14 14:46:46', '2022-10-14 14:46:46'),
(14, '10', '1_admin', '0f6e61ee4c9747d34a274d7674d8aa53.jpg_500x500.jpg_.webp', '2022-10-14 14:46:46', '2022-10-14 14:46:46'),
(15, '11', '1_seller', '2a43c6c654af60c75a00c756ad58da94.png_500x500.jpg_.webp', '2022-10-14 14:52:37', '2022-10-14 14:52:37'),
(16, '12', '1_seller', '2a376a5f743bd6cf00b27b1627d444b3.jpg_400x400.jpg_.webp', '2022-10-14 14:55:57', '2022-10-14 14:55:57'),
(17, '13', '1_seller', '1e0861a956226d773ea82aa8a97380a1.jpg_500x500.jpg_.webp', '2022-10-14 15:02:31', '2022-10-14 15:02:31'),
(18, '14', '1_admin', '74145bdc1c81d9a0f5666bb30aa7ef6e.jpg_400x400.jpg_.webp', '2022-10-14 15:23:20', '2022-10-14 15:23:20'),
(19, '14', '1_admin', '74145bdc1c81d9a0f5666bb30aa7ef6e.jpg_500x500.jpg_.webp', '2022-10-14 15:23:20', '2022-10-14 15:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `customer_id`, `order_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 1, NULL, NULL),
(2, 1, 4, 3, 1, '2022-10-14 23:29:02', '2022-10-14 23:29:02'),
(3, 1, 4, 4, 1, '2022-10-14 23:29:02', '2022-10-14 23:29:02'),
(4, 1, 6, 6, 1, '2022-10-15 01:44:12', '2022-10-15 01:44:12'),
(5, 1, 7, 6, 1, '2022-10-16 13:06:15', '2022-10-16 13:06:15'),
(6, 1, 8, 7, 1, '2022-10-16 13:18:51', '2022-10-16 13:18:51'),
(7, 1, 9, 7, 1, '2022-10-16 13:19:59', '2022-10-16 13:19:59'),
(8, 1, 10, 7, 1, '2022-10-16 13:22:35', '2022-10-16 13:22:35'),
(9, 1, 11, 7, 1, '2022-10-16 13:24:27', '2022-10-16 13:24:27'),
(10, 1, 12, 7, 1, '2022-10-16 13:27:31', '2022-10-16 13:27:31'),
(11, 1, 13, 7, 1, '2022-10-16 13:28:29', '2022-10-16 13:28:29'),
(12, 1, 14, 9, 2, '2022-10-16 13:37:41', '2022-10-16 13:37:41'),
(13, 1, 14, 10, 1, '2022-10-16 13:37:41', '2022-10-16 13:37:41'),
(14, 1, 14, 14, 1, '2022-10-16 13:37:41', '2022-10-16 13:37:41'),
(15, 1, 15, 10, 1, '2022-10-16 14:44:42', '2022-10-16 14:44:42'),
(16, 1, 21, 6, 1, '2022-10-16 15:20:43', '2022-10-16 15:20:43'),
(17, 1, 22, 7, 1, '2022-10-16 15:24:06', '2022-10-16 15:24:06'),
(18, 24, 23, 4, 1, '2022-10-17 07:56:59', '2022-10-17 07:56:59'),
(19, 24, 25, 5, 1, '2022-10-17 08:05:13', '2022-10-17 08:05:13'),
(20, 24, 26, 6, 1, '2022-10-17 08:27:08', '2022-10-17 08:27:08'),
(21, 24, 27, 14, 1, '2022-10-17 08:38:59', '2022-10-17 08:38:59'),
(22, 24, 27, 7, 1, '2022-10-17 08:38:59', '2022-10-17 08:38:59'),
(23, 24, 29, 11, 1, '2022-10-17 08:48:03', '2022-10-17 08:48:03'),
(24, 24, 29, 12, 1, '2022-10-17 08:48:03', '2022-10-17 08:48:03'),
(25, 24, 30, 14, 1, '2022-10-17 08:55:36', '2022-10-17 08:55:36'),
(26, 24, 30, 12, 1, '2022-10-17 08:55:36', '2022-10-17 08:55:36'),
(27, 24, 31, 5, 1, '2022-10-17 09:07:15', '2022-10-17 09:07:15'),
(28, 24, 31, 6, 1, '2022-10-17 09:07:15', '2022-10-17 09:07:15'),
(29, 24, 34, 4, 1, '2022-10-17 09:12:47', '2022-10-17 09:12:47'),
(30, 24, 34, 6, 1, '2022-10-17 09:12:47', '2022-10-17 09:12:47'),
(31, 24, 34, 7, 1, '2022-10-17 09:12:47', '2022-10-17 09:12:47'),
(32, 24, 34, 14, 1, '2022-10-17 09:12:47', '2022-10-17 09:12:47'),
(33, 24, 34, 9, 4, '2022-10-17 09:12:47', '2022-10-17 09:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(1, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '6388d4b79a9a8', 'BDT'),
(2, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '6388d8af4838c', 'BDT'),
(3, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '6388da60cf26a', 'BDT'),
(4, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '6388db0f368d2', 'BDT'),
(5, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '6388dbb72c8e2', 'BDT'),
(6, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 10, 'Customer Address', 'Pending', '6388dda78d2a5', 'BDT');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aditional` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grand_child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `sell_price` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('new','feature','best-seller') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `return`, `aditional`, `stock`, `code`, `brand_id`, `category_id`, `child_category_id`, `grand_child_category_id`, `price`, `sell_price`, `discount`, `size_id`, `color_id`, `qty`, `added_by_id`, `condition`, `photo`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'new best sarees for the season', 'new-best-sarees-for-the-season', 'sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.sarees descripton.', NULL, NULL, 'yes', '773223', 1, 2, 17, 19, 1200, 100, 0, 3, 3, '10', '1_admin', 'new', 'upload/product/product1004328428.webp', NULL, 'inactive', NULL, NULL),
(4, 'Japani solft silk saree for women-lai Cofee', 'japani-solft-silk-saree-for-women-lai-cofee', 'dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe dmoe', NULL, NULL, 'yes', '852573', 1, 2, 17, 19, 850, 700, 0, 1, 10, '2', '1_admin', 'new', 'upload/product/product1068613899.webp', NULL, 'active', NULL, NULL),
(5, 'Nose Niqab for Mulim Women-custom color', 'nose-niqab-for-mulim-women-custom-color', 'descripton', NULL, NULL, 'yes', '310059', 18, 2, 18, 12, 50, 30, 0, 6, 10, '5', '1_admin', 'new', 'upload/product/product1095717563.webp', NULL, 'active', NULL, NULL),
(6, 'Ball print Borka,Dubai Cherry Borka,Dubai Cherry', 'ball-print-borkadubai-cherry-borkadubai-cherry', 'demo description', NULL, NULL, 'yes', '194417', 8, 2, 18, 11, 1500, 1200, 0, 1, 10, '4', '1_admin', 'new', 'upload/product/product1096734404.webp', NULL, 'active', NULL, NULL),
(7, 'Girls High Hill Weightless Wjomen Fashionable Shoes', 'girls-high-hill-weightless-wjomen-fashionable-shoes', 'Description', NULL, NULL, 'yes', '435779', 1, 2, 19, 6, 1600, 1500, 0, 6, 10, '3', '1_admin', 'new', 'upload/product/product1065718942.webp', NULL, 'active', NULL, NULL),
(8, 'Black & White Dhupiyan Check Saree For Woman', 'black-white-dhupiyan-check-saree-for-woman', 'description', NULL, NULL, 'yes', '904612', 3, 2, 17, 19, 550, 450, 0, 3, 5, '4', '1_seller', 'feature', 'upload/product/product1048108395.webp', NULL, 'inactive', NULL, NULL),
(9, 'New Stylish Army Green Cotton Long Sleeve Causal', 'new-stylish-army-green-cotton-long-sleeve-causal', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', NULL, NULL, 'yes', '917908', 1, 1, 2, 26, 300, 250, 0, 6, 11, '5', '1_admin', 'new', 'upload/product/product1005252520.webp', NULL, 'active', NULL, NULL),
(10, 'Stylish Cotton Semi Long Panjabi for Men', 'stylish-cotton-semi-long-panjabi-for-men', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', NULL, NULL, 'yes', '289317', 3, 1, 5, 47, 550, 450, 0, 5, 6, '10', '1_admin', 'feature', 'upload/product/product1040267349.webp', NULL, 'active', NULL, NULL),
(11, 'Black & Ass Cotton Full Sleeve Casual T-shirt for Man', 'black-ass-cotton-full-sleeve-casual-t-shirt-for-man', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', NULL, NULL, 'yes', '360135', 1, 1, 2, 25, 150, 120, 0, 5, 5, '4', '1_seller', 'feature', 'upload/product/product1040083526.webp', NULL, 'inactive', NULL, NULL),
(12, 'Cross body bag for men Official Messanger Bag Bike', 'cross-body-bag-for-men-official-messanger-bag-bike', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', NULL, NULL, 'yes', '224369', 7, 1, 4, 41, 500, 450, 0, 1, 10, '3', '1_seller', 'feature', 'upload/product/product1057328819.webp', NULL, 'inactive', NULL, NULL),
(13, 'Stylish Slim-Fit Stretchable Denim Jeans for man', 'stylish-slim-fit-stretchable-denim-jeans-for-man', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', NULL, NULL, 'yes', '507422', 7, 1, 2, 27, 400, 350, 0, 6, 5, '2', '1_seller', 'best-seller', 'upload/product/product1082887077.webp', NULL, 'inactive', NULL, NULL),
(14, 'Best Pumps Shoes for the women', 'best-pumps-shoes-for-the-women', NULL, NULL, NULL, 'yes', '370102', 8, 2, 19, 2, 4000, 350, 0, 1, 8, '2', '1_admin', 'feature', 'upload/product/product1027306721.webp', NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Women`s Fashion', 2, 'active', '2022-10-14 14:37:04', '2022-10-14 14:37:04'),
(2, 'Men Collection', 1, 'active', '2022-10-14 15:38:50', '2022-10-14 15:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification` enum('verify','not-verify') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not-verify',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `verification`, `password`, `photo`, `address`, `address2`, `country`, `city`, `zip_code`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Seller Dev', 'seller@gmail.com', 'not-verify', '$2y$10$1R/uoAlYyvUMjICb1pS1S.udTadyRLb/h2NHrAAEKkTyTTkilVpzK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saddress1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `saddress2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `scountry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `szip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `sname`, `semail`, `saddress1`, `saddress2`, `scountry`, `scity`, `szip_code`, `sphone`, `created_at`, `updated_at`) VALUES
(1, 1, 'customer jk', 'customer@gmail.com', 'fjfj', 'jfjfj', 'fjfjfj', 'fjfjfj', '89', '9898098808', NULL, NULL),
(2, 3, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address2', 'bd', 'mb', '3230', '9898098808', NULL, NULL),
(3, 4, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address2', 'bd', 'moulvibazar', '3032', '9898098808', NULL, NULL),
(4, 7, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1d', 'Bangladesh', 'demo city', '4585', '9898098808', NULL, NULL),
(5, 13, 'customer jk', 'customer@gmail.com', 'fjffj', 'demo address1', 'Bangladesh', 'demo city', '52652', '9898098808', NULL, NULL),
(6, 14, 'customer jk', 'customer@gmail.com', 'demo address1', 'fjffj', 'Bangladesh', 'moulvibazar', '25888', '9898098808', NULL, NULL),
(7, 15, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', NULL, NULL),
(8, 16, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', NULL, NULL),
(9, 17, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', NULL, NULL),
(10, 18, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', NULL, NULL),
(11, 19, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', NULL, NULL),
(12, 20, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'moulvibazar', '40404', '9898098808', NULL, NULL),
(13, 21, 'customer jk', 'customer@gmail.com', 'demo address1', 'demo address1', 'bangladesh', 'Kulaura', '3433', '9898098808', NULL, NULL),
(14, 22, 'customer jk', 'developerjk9356@gmail.com', 'demo address1', 'demo address1', 'Bangladesh', 'demo city', '4848484', '9898098808', NULL, NULL),
(15, 23, 'developer', 'developerjk9356@gmail.com', 'demo address1', 'demo address2', 'Bangladesh', 'demo city', '3032', '01601158098', NULL, NULL),
(16, 25, 'developer', 'developerjk9356@gmail.com', 'demo address1', 'demo address1', 'ddd', 'demo city', '333', '01601158098', NULL, NULL),
(17, 26, 'developer', 'developerjk9356@gmail.com', 'demo address1', 'demo address1', 'ddd', 'demo city', '3230', '01601158098', NULL, NULL),
(18, 27, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'demo address1', 'Bangladesh', 'moulvibazar', '2020', '01601158098', NULL, NULL),
(19, 28, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'demo address1', 'Bangladesh', 'moulvibazar', '2020', '01601158098', NULL, NULL),
(20, 29, 'developer', 'developerjk9356@gmail.com', 'jishan address1', 'Kularua Mouvlibazar', 'Bangladesh', 'demo city', '3032', '01601158098', NULL, NULL),
(21, 30, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'jishan address1', 'Bangladesh', 'moulvibazar', '2828', '01601158098', NULL, NULL),
(22, 31, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '3220', '01601158098', NULL, NULL),
(23, 32, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '3220', '01601158098', NULL, NULL),
(24, 33, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '3220', '01601158098', NULL, NULL),
(25, 34, 'developer', 'developerjk9356@gmail.com', 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '2020', '01601158098', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SM', 'active', '2022-10-04 01:01:58', '2022-10-13 02:57:48'),
(2, 'M', 'inactive', '2022-10-04 01:01:58', '2022-10-13 02:58:20'),
(3, 'XL', 'active', '2022-10-04 01:01:58', '2022-10-13 02:58:47'),
(4, 'L', 'inactive', '2022-10-04 01:01:58', '2022-10-13 02:59:24'),
(5, '40', 'active', '2022-10-04 01:01:58', '2022-10-13 02:59:52'),
(6, '42', 'active', '2022-10-13 03:01:04', '2022-10-13 03:01:04'),
(7, '38', 'active', '2022-10-13 03:02:47', '2022-10-13 03:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Clothing', 'clothing', '', 'active', '2022-10-12 22:31:53', '2022-10-12 22:31:53'),
(3, 1, 'Shoes', 'shoes', '', 'active', '2022-10-12 22:34:02', '2022-10-12 22:34:02'),
(4, 1, 'Bags', 'bags', '', 'active', '2022-10-12 22:34:38', '2022-10-12 22:34:38'),
(5, 1, 'Muslim Wear', 'muslim-wear', '', 'active', '2022-10-12 22:35:57', '2022-10-12 22:35:57'),
(6, 1, 'Accessories', 'accessories', '', 'active', '2022-10-12 22:36:44', '2022-10-12 22:36:44'),
(7, 1, 'Watches', 'watches', '', 'active', '2022-10-12 22:37:24', '2022-10-12 22:37:24'),
(8, 1, 'Eyewear', 'eyewear', '', 'active', '2022-10-12 22:38:11', '2022-10-12 22:38:11'),
(9, 1, 'Jewellery', 'jewellery', '', 'active', '2022-10-12 22:38:50', '2022-10-12 22:38:50'),
(10, 3, 'Bath & Body', 'bath-body', '', 'active', '2022-10-12 22:40:05', '2022-10-12 22:40:05'),
(11, 3, 'Beauty Tools', 'beauty-tools', '', 'active', '2022-10-12 22:40:50', '2022-10-12 22:40:50'),
(12, 3, 'Hair Care', 'hair-care', '', 'active', '2022-10-12 22:41:29', '2022-10-12 22:41:29'),
(13, 3, 'Makeup', 'makeup', '', 'active', '2022-10-12 22:42:04', '2022-10-12 22:42:04'),
(14, 3, 'Men`s Care', 'mens-care', '', 'active', '2022-10-12 22:42:50', '2022-10-12 22:42:50'),
(15, 3, 'Personal Care', 'personal-care', '', 'active', '2022-10-12 22:43:25', '2022-10-12 22:43:25'),
(16, 3, 'Skin Care', 'skin-care', '', 'active', '2022-10-12 22:43:56', '2022-10-12 22:43:56'),
(17, 2, 'Clothing', 'clothing1665636326-clothing', '', 'active', '2022-10-12 22:45:26', '2022-10-12 22:45:26'),
(18, 2, 'Muslim Wear', 'muslim-wear1665636371-muslim-wear', '', 'active', '2022-10-12 22:46:11', '2022-10-12 22:46:11'),
(19, 2, 'Shoes', 'shoes1665636402-shoes', '', 'active', '2022-10-12 22:46:42', '2022-10-12 22:46:42'),
(20, 2, 'Watches', 'watches1665636443-watches', '', 'active', '2022-10-12 22:47:23', '2022-10-12 22:47:23'),
(21, 2, 'Bags', 'bags1665636478-bags', '', 'active', '2022-10-12 22:47:58', '2022-10-12 22:47:58'),
(22, 2, 'Jewellery', 'jewellery1665636567-jewellery', '', 'active', '2022-10-12 22:49:27', '2022-10-12 22:49:27'),
(23, 2, 'Accessories', 'accessories1665636623-accessories', '', 'active', '2022-10-12 22:50:23', '2022-10-12 22:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `address`, `address2`, `country`, `city`, `zip_code`, `mobile`, `status`, `remember_token`, `token`, `created_at`, `updated_at`) VALUES
(1, 'customer jk', 'customer@gmail.com', NULL, '$2y$10$4zq3xeOVIAnq9lGH6Rkd1uJYgmJaiJT9yjFuSEfygiWUrZXf8trx.', NULL, 'demo address1', 'demo address1', 'Bangladesh', 'demo city', '4848484', '9898098808', 'active', NULL, 'verify', NULL, NULL),
(2, 'Myrl Connelly', 'jake.feeney@example.net', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00cc33?text=voluptate', '29475 Mustafa Rapid Apt. 632\nVioletborough, LA 78248-9508', NULL, NULL, NULL, NULL, '283-382-2229', 'active', 'x58JdvN5oG', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(3, 'Josephine Parisian', 'smith.angela@example.com', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0055ee?text=dolor', '203 Cole Lakes Suite 674\nNew Ezequielmouth, MN 43977', NULL, NULL, NULL, NULL, '985-282-9373', 'inactive', 'C7IxmcfT09', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(4, 'Hiram Zemlak', 'prosacco.shad@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00aa11?text=nemo', '5450 Madaline Knoll\nNorth Claudiaton, OH 80609', NULL, NULL, NULL, NULL, '(660) 380-3405', 'inactive', 'v6dNs4sXBk', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(5, 'Tressa Jacobi DVM', 'saul.mosciski@example.com', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/000077?text=eos', '773 Deshaun Throughway\nSouth Susanchester, UT 38606-1247', NULL, NULL, NULL, NULL, '689-689-7209', 'inactive', '2P9x4cnHKQ', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(6, 'Juwan Klocko', 'pemmerich@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0033dd?text=non', '5308 Stephen Station\nBridiehaven, NV 34933-7193', NULL, NULL, NULL, NULL, '413.501.4119', 'active', 'c3tWK6TuV4', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(7, 'Nannie Ratke', 'savanah.harvey@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0022aa?text=provident', '1620 Noe Centers Suite 989\nWest Sagefurt, NE 57189', NULL, NULL, NULL, NULL, '(757) 686-2221', 'active', 'RlMw11rjuP', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(8, 'Minnie McDermott', 'emilia.christiansen@example.net', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0066ff?text=id', '1431 Marie Village Apt. 742\nWalkerstad, TX 00521', NULL, NULL, NULL, NULL, '352.309.9902', 'inactive', 'JtFP6GYK0w', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(9, 'Dr. Floy Pacocha', 'aliya.rath@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0055ff?text=doloremque', '736 Dean Forest Suite 365\nLake Kaitlyn, NH 93147', NULL, NULL, NULL, NULL, '1-906-617-9932', 'inactive', 'ngfC7JdYSg', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(10, 'Stella McClure', 'mueller.curtis@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00cccc?text=consequatur', '4673 Wendy Forest Apt. 805\nHillshire, SD 92608-1800', NULL, NULL, NULL, NULL, '1-217-423-1490', 'active', 'X3Vaj20iVY', '', '2022-10-04 01:01:55', '2022-10-04 01:01:55'),
(11, 'Nicklaus Baumbach', 'teresa21@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0011bb?text=qui', '16392 Block Port\nRunteborough, AZ 36413', NULL, NULL, NULL, NULL, '+1-443-436-3732', 'active', 'JYillY76rR', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(12, 'Aisha Tillman', 'feest.madison@example.com', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/007700?text=occaecati', '61833 Bruce Oval\nBethelhaven, DE 09882', NULL, NULL, NULL, NULL, '+1 (316) 289-6126', 'inactive', 'e8mxs2mpTy', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(13, 'Kiana McKenzie', 'schiller.mona@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/008800?text=et', '219 Anderson Club Apt. 551\nChristopherberg, AR 24613-9607', NULL, NULL, NULL, NULL, '586.223.4790', 'inactive', 'x8F86Qv9FZ', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(14, 'Mr. Benny Turcotte DVM', 'melyssa65@example.net', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0011aa?text=quia', '627 Billie Knoll\nPort Jamal, PA 92336-8110', NULL, NULL, NULL, NULL, '283.213.1031', 'active', 'CsvJ3kZIfb', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(15, 'Tyler Gorczany', 'haylie21@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/0088bb?text=ex', '8404 Terrill Springs\nWest Alleneberg, MT 91247', NULL, NULL, NULL, NULL, '+1.520.501.4010', 'inactive', 'YsjpPLYr03', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(16, 'Arnold Torphy I', 'terry.isac@example.net', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00ff99?text=cumque', '25579 Janae Road Suite 445\nVolkmanside, CA 11928-0356', NULL, NULL, NULL, NULL, '540-947-3417', 'active', '79Xg6Xmdsu', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(17, 'Prof. Lola Raynor V', 'lratke@example.com', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00cc33?text=culpa', '649 Vita Circles Suite 934\nKayliebury, WI 51508', NULL, NULL, NULL, NULL, '445.295.6464', 'inactive', 'syX4eebDpB', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(18, 'Dr. Alfonso Grady V', 'lehner.shanel@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00bb33?text=dolor', '23582 Kaylee Run Suite 664\nBurniceview, SC 41522-5656', NULL, NULL, NULL, NULL, '724-580-8703', 'active', 'ivYp6DfPZ7', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(19, 'Jovanny Batz', 'scarlett58@example.net', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00bbaa?text=aperiam', '3681 Gerhold Ranch Apt. 077\nTurnertown, KS 55678', NULL, NULL, NULL, NULL, '(534) 740-9157', 'active', 'ikWdh8I0Cg', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(20, 'Lia Mohr', 'brycen.dickens@example.org', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/007711?text=occaecati', '618 Toby Coves\nNew Julius, NY 61874', NULL, NULL, NULL, NULL, '+15183103796', 'inactive', 'dCeYPMoxYi', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(21, 'Keira Herman DDS', 'rmcglynn@example.com', '2022-10-04 01:01:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x70.png/00dd22?text=non', '11748 Schamberger Forks Apt. 622\nPort Mckennaton, OR 27482', NULL, NULL, NULL, NULL, '1-272-659-1975', 'inactive', 'ZvAwK3SQmR', '', '2022-10-04 01:01:56', '2022-10-04 01:01:56'),
(22, 'demo', 'demo@gmail.com', NULL, 'demodemo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '', '2022-10-16 15:43:47', '2022-10-16 15:43:47'),
(24, 'developer', 'developerjk9356@gmail.com', NULL, '$2y$10$UUC8iLrKcAHWSR1wXswQSO4ezKPoHm1zwhUeWbyE.Jhu.5hzyrN.i', NULL, 'Kularua Mouvlibazar', 'Kularua Mouvlibazar', 'Bangladesh', 'moulvibazar', '2020', '01601158098', 'active', NULL, '', '2022-10-16 14:44:57', '2022-10-16 14:44:57'),
(34, 'ns it', 'nsitinfo9356@gmail.com', NULL, '$2y$10$aIBHTT2w5IZjVos/2OKrJegzbjgFKgU8ge3eGidr7Q4lh0Xh5m8qO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '', '2022-10-17 12:31:16', '2022-10-17 12:31:16'),
(35, 'business', 'businessfilance9356@gmail.com', NULL, '$2y$10$aJpoMEAyMLv9jNwfyvHcv.FopRgwgYkEG6j.OW37lgxKR7HmbFtRK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '12123', '2022-10-18 07:40:02', '2022-10-18 07:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `verify_customers`
--

CREATE TABLE `verify_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_customers`
--

INSERT INTO `verify_customers` (`id`, `customer_id`, `token`, `created_at`, `updated_at`) VALUES
(8, 34, 'verify', '2022-10-17 12:31:16', '2022-10-17 12:31:16'),
(9, 35, '46471', '2022-10-18 07:40:03', '2022-10-18 08:48:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_uploads`
--
ALTER TABLE `file_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grand_child_categories`
--
ALTER TABLE `grand_child_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_s_m_s`
--
ALTER TABLE `mobile_s_m_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_files`
--
ALTER TABLE `multi_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutli_product_imgs`
--
ALTER TABLE `mutli_product_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_size_id_foreign` (`size_id`),
  ADD KEY `products_color_id_foreign` (`color_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_child_category_id_foreign` (`child_category_id`),
  ADD KEY `products_grand_child_category_id_foreign` (`grand_child_category_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_customers`
--
ALTER TABLE `verify_customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_uploads`
--
ALTER TABLE `file_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grand_child_categories`
--
ALTER TABLE `grand_child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mobile_s_m_s`
--
ALTER TABLE `mobile_s_m_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multi_files`
--
ALTER TABLE `multi_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutli_product_imgs`
--
ALTER TABLE `mutli_product_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `verify_customers`
--
ALTER TABLE `verify_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_grand_child_category_id_foreign` FOREIGN KEY (`grand_child_category_id`) REFERENCES `grand_child_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
