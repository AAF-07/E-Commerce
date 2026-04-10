-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2026 at 04:26 AM
-- Server version: 8.0.45-0ubuntu0.24.04.1
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_staff`
--

CREATE TABLE `akun_staff` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','staff') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_staff`
--

INSERT INTO `akun_staff` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'staff1', '$2y$12$g8s6zxqGyaRsxbor.8u/G.ghh44L1KBM2r14Pf4/9mnznHaQLHXGy', 'staff', '2026-04-07 02:52:33', '2026-04-07 02:52:33'),
(2, 'admin1', '$2y$12$anSdkuL.y9KVn3Mb2yV6hOCIIhCQPuZmS4sbIuEScQYmQ4q4LYzwG', 'admin', '2026-04-07 02:52:34', '2026-04-07 02:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Komik', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(2, 'Novel', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(3, 'Fantasi', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(4, 'Petualangan', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(5, 'Romansa', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(6, 'Misteri', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(7, 'Olahraga', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(8, 'Sci-fi', '2026-04-07 02:52:34', '2026-04-07 02:52:34'),
(9, 'Thriller', '2026-04-07 02:52:34', '2026-04-07 02:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `category_produk`
--

CREATE TABLE `category_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_produk`
--

INSERT INTO `category_produk` (`id`, `produk_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 2, 2),
(4, 2, 3),
(5, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2018_12_23_120000_create_shoppingcart_table', 1),
(5, '2026_02_09_003812_akun_staff', 1),
(6, '2026_02_09_015908_produk', 1),
(7, '2026_02_21_083959_create_categories_table', 1),
(8, '2026_02_21_084138_create_category_produk_table', 1),
(9, '2026_02_23_123416_orders', 1),
(10, '2026_02_23_124132_order_item', 1),
(11, '2026_04_06_005923_reported', 1),
(12, '2026_04_07_010106_create_notifications_table', 1),
(13, '2026_04_07_134000_change_produk_id_to_nullable_in_reported_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('08af345e-ea9e-42e4-9590-f56bd435f14b', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 2, '{\"order_id\":20,\"order_code\":\"ORDER-2-1775696605\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":76000}', '2026-04-09 01:04:23', '2026-04-09 01:03:58', '2026-04-09 01:04:23'),
('0a6a9da9-36d2-49bb-8a85-f9c1ad532492', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 2, '{\"order_id\":22,\"order_code\":\"ORDER-2-1775698246\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-09 01:31:21', '2026-04-09 01:31:09', '2026-04-09 01:31:21'),
('10ee6a81-c09e-49ee-bbc7-fdc7def8e727', 'App\\Notifications\\StatusChange', 'App\\Models\\User', 2, '{\"order_id\":19,\"status\":\"paid\",\"order_code\":\"ORDER-2-1775695081\",\"message\":\"Status pesanan Anda telah berubah menjadi paid\"}', '2026-04-09 01:03:09', '2026-04-09 01:01:26', '2026-04-09 01:03:09'),
('1f9e5aa8-294b-445c-ab76-c099d36fd12f', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":15,\"order_code\":\"ORDER-1-1775616969\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-08 04:22:28', '2026-04-08 02:56:38', '2026-04-08 04:22:28'),
('26c1ecef-6139-409a-bb60-62467d773162', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":18,\"order_code\":\"ORDER-1-1775628898\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":38000}', '2026-04-08 06:16:08', '2026-04-08 06:15:43', '2026-04-08 06:16:08'),
('315d0d55-17f3-4e85-91ac-9890d2928946', 'App\\Notifications\\StatusChange', 'App\\Models\\Staff', 1, '{\"order_id\":13,\"status\":\"paid\",\"order_code\":\"ORDER-1-1775577103\",\"message\":\"Status pesanan Anda telah berubah menjadi paid\"}', NULL, '2026-04-07 18:55:33', '2026-04-07 18:55:33'),
('341557da-7737-4cdc-a2d6-a09555bed32d', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":13,\"order_code\":\"ORDER-1-1775577103\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-07 08:52:26', '2026-04-07 08:52:15', '2026-04-07 08:52:26'),
('41e33f0b-71e1-4dc2-9040-4ee7dd3b2dac', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":9,\"order_code\":\"ORDER-1-1775567348\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":38000}', '2026-04-07 08:30:13', '2026-04-07 06:09:37', '2026-04-07 08:30:13'),
('44b1e3b2-d6b0-4e31-9669-0de9a46a5841', 'App\\Notifications\\StatusChange', 'App\\Models\\User', 1, '{\"order_id\":10,\"status\":\"shipped\",\"order_code\":\"ORDER-1-1775567551\",\"message\":\"Status pesanan Anda telah berubah menjadi shipped\"}', '2026-04-09 01:29:57', '2026-04-09 01:27:18', '2026-04-09 01:29:57'),
('4ed67bcf-7e6c-4f42-9126-e26ea94ea995', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 2, '{\"order_id\":21,\"order_code\":\"ORDER-2-1775696707\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-09 01:06:20', '2026-04-09 01:05:47', '2026-04-09 01:06:20'),
('7ff041b0-642d-4cf3-b605-cff4ec472287', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":10,\"order_code\":\"ORDER-1-1775567551\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-07 08:30:13', '2026-04-07 06:13:04', '2026-04-07 08:30:13'),
('82cb1d34-9ea8-40d5-bddb-9a8fe6364d56', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":14,\"order_code\":\"ORDER-1-1775616796\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-08 04:22:28', '2026-04-07 19:53:55', '2026-04-08 04:22:28'),
('85de26e5-4bd5-414d-a0c7-f85e63107bd7', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 2, '{\"order_id\":19,\"order_code\":\"ORDER-2-1775695081\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":38000}', '2026-04-09 00:39:22', '2026-04-09 00:38:38', '2026-04-09 00:39:22'),
('a0241f26-d9ed-4454-a37d-99b434f2e615', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 2, '{\"order_id\":23,\"order_code\":\"ORDER-2-1775699188\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', NULL, '2026-04-09 01:48:48', '2026-04-09 01:48:48'),
('a9d1068e-a5a5-4733-a3b6-c93f49d94cfe', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":16,\"order_code\":\"ORDER-1-1775617297\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-08 04:22:28', '2026-04-08 03:02:04', '2026-04-08 04:22:28'),
('ac7b6d14-5146-4102-aa2c-0f539fbba2a7', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":12,\"order_code\":\"ORDER-1-1775576346\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-07 08:42:31', '2026-04-07 08:39:54', '2026-04-07 08:42:31'),
('baaf8bf7-09f7-4778-870e-739a4df43a1c', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":11,\"order_code\":\"ORDER-1-1775569646\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":116000}', '2026-04-07 08:30:13', '2026-04-07 06:48:00', '2026-04-07 08:30:13'),
('c2769573-9a06-4c47-aba4-7da38ef85106', 'App\\Notifications\\StatusChange', 'App\\Models\\Staff', 1, '{\"order_id\":13,\"status\":\"shipped\",\"order_code\":\"ORDER-1-1775577103\",\"message\":\"Status pesanan Anda telah berubah menjadi shipped\"}', NULL, '2026-04-07 18:55:10', '2026-04-07 18:55:10'),
('d40986e3-31eb-4e9d-82d0-e2c18041ce74', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":17,\"order_code\":\"ORDER-1-1775617578\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-08 04:22:28', '2026-04-08 03:06:49', '2026-04-08 04:22:28'),
('dbed1805-12d5-4f2a-a494-d9dcfaa24c40', 'App\\Notifications\\StatusChange', 'App\\Models\\User', 2, '{\"order_id\":23,\"status\":\"shipped\",\"order_code\":\"ORDER-2-1775699188\",\"message\":\"Status pesanan Anda telah berubah menjadi shipped\"}', NULL, '2026-04-09 01:56:09', '2026-04-09 01:56:09'),
('dda160ac-dab1-4b86-8e66-aee6b1dab84f', 'App\\Notifications\\OrderShipped', 'App\\Models\\User', 1, '{\"order_id\":8,\"order_code\":\"ORDER-1-1775567262\",\"message\":\"Pembayaran berhasil diverifikasi\",\"total\":78000}', '2026-04-07 08:30:13', '2026-04-07 06:08:30', '2026-04-07 08:30:13'),
('f2648c41-ae11-4e62-9091-795d2d07232e', 'App\\Notifications\\StatusChange', 'App\\Models\\User', 1, '{\"order_id\":13,\"status\":\"cancelled\",\"order_code\":\"ORDER-1-1775577103\",\"message\":\"Status pesanan Anda telah berubah menjadi cancelled\"}', '2026-04-07 19:23:03', '2026-04-07 19:22:02', '2026-04-07 19:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengiriman` enum('jne','jt','sicepat','kurir_kami') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kurir_kami',
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `midtrans_order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `midtrans_transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `midtrans_response` json DEFAULT NULL,
  `payment_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_code`, `total_amount`, `status`, `no_hp`, `pengiriman`, `alamat`, `payment_method`, `midtrans_order_id`, `midtrans_transaction_id`, `midtrans_response`, `payment_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'ORDER-1-1775558225', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775558225', NULL, NULL, '2026-04-07 03:37:46', '2026-04-07 03:37:46', '2026-04-07 03:37:46'),
(2, 1, 'ORDER-1-1775558728', 0, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775558728', NULL, NULL, '2026-04-07 03:46:02', '2026-04-07 03:46:02', '2026-04-07 03:46:02'),
(3, 1, 'ORDER-1-1775559411', 0, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775559411', 'a2adca5e-b41d-40d7-898e-f9c757625317', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775559411\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661791761690901984165\"}], \"expiry_time\": \"2026-04-08 17:56:58\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"2c1bdc20a6c227a1df35cc8343882eea4ebe6086fa21fde1d125951f9d126d49da7f154ea7ee14b3a334ae8ba67d8d1098f59187571f5778429067a373168953\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"a2adca5e-b41d-40d7-898e-f9c757625317\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 17:57:09\", \"transaction_time\": \"2026-04-07 17:56:58\", \"transaction_status\": \"settlement\"}', '2026-04-07 03:57:17', '2026-04-07 03:57:17', '2026-04-07 03:57:17'),
(4, 1, 'ORDER-1-1775559638', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775559638', '262cfd5f-8b9c-43f4-b5e4-cc59948e5769', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775559638\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661515591236946796984\"}], \"expiry_time\": \"2026-04-08 18:00:47\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"f1fe5b4bc8b89256c1a8c2e98f2c67e7099f260e9d9fbf5561ddd21aafb3d22e84bc3e6f47803525dc6e2eea782d72320a054775239131bc9a68ec5d502ee9f1\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"262cfd5f-8b9c-43f4-b5e4-cc59948e5769\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 18:01:01\", \"transaction_time\": \"2026-04-07 18:00:47\", \"transaction_status\": \"settlement\"}', '2026-04-07 04:01:11', '2026-04-07 04:01:11', '2026-04-07 04:01:11'),
(5, 1, 'ORDER-1-1775559938', 0, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775559938', '84d3e2dd-48b0-43f7-bdd1-6905dc742bab', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775559938\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661283416917600245811\"}], \"expiry_time\": \"2026-04-08 18:05:43\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"c6001bfe0b7f1205ae3e8469802da937ecc07e0d6e860eb2ed33f733ddf7777c1ea3364f40f9723b4427ac9191817006795b06cb9edb03be0dd11fcc4c4c8448\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"84d3e2dd-48b0-43f7-bdd1-6905dc742bab\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 18:06:13\", \"transaction_time\": \"2026-04-07 18:05:44\", \"transaction_status\": \"settlement\"}', '2026-04-07 04:06:18', '2026-04-07 04:06:18', '2026-04-07 04:06:18'),
(6, 1, 'ORDER-1-1775563439', 0, 'reported', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775563439', 'b413edd7-165b-4bae-8b54-b265004b3bb5', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775563439\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661540355570171924461\"}], \"expiry_time\": \"2026-04-08 19:05:10\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"e90401968845ae62bb601c954947f4a6af819dd1bac349f42f00acd20fbfeb451fced02f1ec2a54abc314c8217f4047c9034c68c07fcba467fa9e7352feae883\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"b413edd7-165b-4bae-8b54-b265004b3bb5\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 19:05:24\", \"transaction_time\": \"2026-04-07 19:05:10\", \"transaction_status\": \"settlement\"}', '2026-04-07 05:05:39', '2026-04-07 05:05:39', '2026-04-07 08:59:43'),
(7, 1, 'ORDER-1-1775563565', 0, 'reported', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775563565', '2c118a47-7ea2-4d10-ae2e-54c827c8fe0d', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775563565\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661185987005504309138\"}], \"expiry_time\": \"2026-04-08 19:06:12\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"c13c9e1449f4a1a1b91a0eb5beb5c8411893f04de9b44a34d075b9aeadcc1b0381f95b67d8435a88cea152653bb5b9faf2d3f928033810ebc96d2548f4848c2f\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"2c118a47-7ea2-4d10-ae2e-54c827c8fe0d\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 19:06:31\", \"transaction_time\": \"2026-04-07 19:06:12\", \"transaction_status\": \"settlement\"}', '2026-04-07 05:06:37', '2026-04-07 05:06:37', '2026-04-07 06:46:53'),
(8, 1, 'ORDER-1-1775567262', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775567262', 'effd4b6f-696f-4b03-a719-3cb2058748a7', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775567262\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661269661562662831560\"}], \"expiry_time\": \"2026-04-08 20:07:52\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"0ffb0f435658e982b68d3cd93bc31aad0b051ea8aabf4d0c281503c24a7e52b1d5c0be68db40492cdb3d14a49f35489584a9915b43e0a2d70855734d89f807e4\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"effd4b6f-696f-4b03-a719-3cb2058748a7\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 20:08:19\", \"transaction_time\": \"2026-04-07 20:07:52\", \"transaction_status\": \"settlement\"}', '2026-04-07 06:08:30', '2026-04-07 06:08:30', '2026-04-07 06:08:30'),
(9, 1, 'ORDER-1-1775567348', 38000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775567348', 'da2b1332-16fc-4d9b-8650-d33fd29d6cc4', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775567348\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661499850533532474170\"}], \"expiry_time\": \"2026-04-08 20:09:16\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"28412e48358b79ddfc7153f49b5d8a972103d84bb5a14885d1f133f886d248092dcde6c75792740d4b20303360d59bcf88f40575dc860d5ce0ac7e643f5a9628\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"da2b1332-16fc-4d9b-8650-d33fd29d6cc4\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 20:09:29\", \"transaction_time\": \"2026-04-07 20:09:16\", \"transaction_status\": \"settlement\"}', '2026-04-07 06:09:37', '2026-04-07 06:09:37', '2026-04-07 06:09:37'),
(10, 1, 'ORDER-1-1775567551', 78000, 'shipped', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775567551', '69932c62-a4a9-4310-a499-f4e61752bddc', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775567551\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661621914516945859146\"}], \"expiry_time\": \"2026-04-08 20:12:39\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"63b18734afe077df0d0c80eede661912477d173635aa2ef717a04e5ae4588013f36b7c33d3e9b6834aad08aa12de900e36fb944dac9f84c47d4ba7fac9ffa3ab\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"69932c62-a4a9-4310-a499-f4e61752bddc\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 20:12:53\", \"transaction_time\": \"2026-04-07 20:12:39\", \"transaction_status\": \"settlement\"}', '2026-04-07 06:13:04', '2026-04-07 06:13:04', '2026-04-09 01:27:18'),
(11, 1, 'ORDER-1-1775569646', 116000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775569646', '6ba1a309-4f1d-486d-bcac-2211534cb955', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775569646\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661005069808226930360\"}], \"expiry_time\": \"2026-04-08 20:47:39\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"121000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"0b8e5239713310912d0ab280fff470bfc5412e7bf34382a09c4827d755945501853040fabe017afc6218317db7e95f3c49c9839c3c2a9eb1c27f0bdde8f156bc\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"6ba1a309-4f1d-486d-bcac-2211534cb955\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 20:47:49\", \"transaction_time\": \"2026-04-07 20:47:39\", \"transaction_status\": \"settlement\"}', '2026-04-07 06:48:00', '2026-04-07 06:48:00', '2026-04-07 06:48:00'),
(12, 1, 'ORDER-1-1775576346', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'bank_transfer', 'ORDER-1-1775576346', 'a9cbe26f-8840-44cf-94ea-e28f2ac5560d', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775576346\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661872584483163994085\"}], \"expiry_time\": \"2026-04-08 22:39:13\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"6c12a03c554db84a709ae298561ad510532796b9d60a1ca90acd307029f10c6a8182aa55ac93270c61540b2968cf590ed61c3318be929db11d1d20994b4206b9\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"a9cbe26f-8840-44cf-94ea-e28f2ac5560d\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-07 22:39:44\", \"transaction_time\": \"2026-04-07 22:39:13\", \"transaction_status\": \"settlement\"}', '2026-04-07 08:39:53', '2026-04-07 08:39:53', '2026-04-07 08:39:53'),
(13, 1, 'ORDER-1-1775577103', 78000, 'cancelled', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775577103', '7963867d-0a16-4a13-bd8c-ac5afae8b874', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775577103\", \"expiry_time\": \"2026-04-07 23:06:50\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"qris\", \"signature_key\": \"ade2ec3dbc60cb1ced3f098bef96186cba313d4bd7332f80fab5ec3af1338ff74d065096f8d74d3de4f1bf9353271127d43bc6d45839d19c45070082ba1de6be\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"7963867d-0a16-4a13-bd8c-ac5afae8b874\", \"settlement_time\": \"2026-04-07 22:52:05\", \"transaction_time\": \"2026-04-07 22:51:50\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-07 08:52:15', '2026-04-07 08:52:15', '2026-04-07 19:22:02'),
(14, 1, 'ORDER-1-1775616796', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775616796', '6259a2bb-ad18-433f-b524-ccfb57bd5e3b', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775616796\", \"expiry_time\": \"2026-04-08 10:08:25\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"qris\", \"signature_key\": \"10cea92376606f93a3f2a641f087404f92382854f19c308084da9c0a5811db3b14905c36e30868022268214e0f3499ca6ec2b4c98a512c6898280ca42ed6cd67\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"6259a2bb-ad18-433f-b524-ccfb57bd5e3b\", \"settlement_time\": \"2026-04-08 09:53:43\", \"transaction_time\": \"2026-04-08 09:53:25\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-07 19:53:55', '2026-04-07 19:53:55', '2026-04-07 19:53:55'),
(15, 1, 'ORDER-1-1775616969', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775616969', 'b21657c8-f6b3-4af7-aa4c-7723e8a0a142', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775616969\", \"expiry_time\": \"2026-04-08 10:11:16\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"qris\", \"signature_key\": \"c17ce20ff7a3a8d35c3a86fb78b94b4d733a2a9932042f618b5709b0390f887f361bd5e80e14d862d868d79fdc9be8d6f107a4858563a0b602f39a1e312ebcdc\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"b21657c8-f6b3-4af7-aa4c-7723e8a0a142\", \"settlement_time\": \"2026-04-08 09:56:31\", \"transaction_time\": \"2026-04-08 09:56:16\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-08 02:56:38', '2026-04-08 02:56:38', '2026-04-08 02:56:38'),
(16, 1, 'ORDER-1-1775617297', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775617297', 'c82b5e7e-5bb8-4688-8da3-06d5f64c3b9d', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775617297\", \"expiry_time\": \"2026-04-08 10:16:44\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"qris\", \"signature_key\": \"1f72b35f4ecc14909fcfa9cc69f00f1c5b19304aeb04b52fdba9e437190b53c642009d633fed3784096284d8bd1245dc5245d34073e1fb7f11df4ed0873c4d77\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"c82b5e7e-5bb8-4688-8da3-06d5f64c3b9d\", \"settlement_time\": \"2026-04-08 10:01:57\", \"transaction_time\": \"2026-04-08 10:01:44\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-08 03:02:04', '2026-04-08 03:02:04', '2026-04-08 03:02:04'),
(17, 1, 'ORDER-1-1775617578', 78000, 'paid', '08123', 'jt', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775617578', '4839ba4a-c942-43b1-a7df-de656ab13e09', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775617578\", \"expiry_time\": \"2026-04-08 10:21:25\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"qris\", \"signature_key\": \"3cbb0dff49ded24997b068b7492cc17fb7f24542e5439b0cf09b8901c2b40781456137770cf2b5c509f6ce152cb579ea62bafb1c0a26612d0bf68bad4cfd37fa\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"4839ba4a-c942-43b1-a7df-de656ab13e09\", \"settlement_time\": \"2026-04-08 10:06:41\", \"transaction_time\": \"2026-04-08 10:06:25\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-08 03:06:49', '2026-04-08 03:06:49', '2026-04-08 03:06:49'),
(18, 1, 'ORDER-1-1775628898', 38000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-1-1775628898', '4f6e1b1b-5a4a-44b1-88f0-52f0b1cffb19', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-1-1775628898\", \"expiry_time\": \"2026-04-08 13:30:11\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"qris\", \"signature_key\": \"8c09813dd90f963549648caa003791cacecfac6ffa776212ab68c8f06444ae49a9e87461427ff53406b13617585d3f4de668e817b01cce08b3c409c663b311b8\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"4f6e1b1b-5a4a-44b1-88f0-52f0b1cffb19\", \"settlement_time\": \"2026-04-08 13:15:36\", \"transaction_time\": \"2026-04-08 13:15:11\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-08 06:15:43', '2026-04-08 06:15:43', '2026-04-08 06:15:43'),
(19, 2, 'ORDER-2-1775695081', 38000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-2-1775695081', '587bbb0d-0348-43d2-b924-296879917e94', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-2-1775695081\", \"expiry_time\": \"2026-04-09 07:53:16\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"43000.00\", \"payment_type\": \"qris\", \"signature_key\": \"fa48a13208b49d8a8b7d4ca93dafc723d543efd6e445eecf2d480f449007decd5b34986abef3cc9d3ec3bcce861a51e51dd387af2f429159a32babad60ba3877\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"587bbb0d-0348-43d2-b924-296879917e94\", \"settlement_time\": \"2026-04-09 07:38:30\", \"transaction_time\": \"2026-04-09 07:38:17\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-09 00:38:38', '2026-04-09 00:38:38', '2026-04-09 01:01:26'),
(20, 2, 'ORDER-2-1775696605', 76000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika', 'qris', 'ORDER-2-1775696605', '8b71a27b-71c7-4449-b616-24a38434e0e0', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-2-1775696605\", \"expiry_time\": \"2026-04-09 08:18:33\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"81000.00\", \"payment_type\": \"qris\", \"signature_key\": \"8b96fe943de24a1122334892f844791fcfe434b43ec9a0070410fb731aba0fff65647c3e406b7ce264243d15d50e2c5a1d54bb46be62e606aeaaf01cd524ad93\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"8b71a27b-71c7-4449-b616-24a38434e0e0\", \"settlement_time\": \"2026-04-09 08:03:48\", \"transaction_time\": \"2026-04-09 08:03:33\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-09 01:03:58', '2026-04-09 01:03:58', '2026-04-09 01:03:58'),
(21, 2, 'ORDER-2-1775696707', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika 2', 'bank_transfer', 'ORDER-2-1775696707', 'dd2c1f0d-fafc-4b69-932a-856cd1b8890e', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-2-1775696707\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661037170011130852046\"}], \"expiry_time\": \"2026-04-10 08:05:25\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"d32e4fed45c5cedc36519725aa3859667c53c09453b994b2e5e166698fc7ad93656532da7f09cc5fabf734313ee9bb0ee5950b7e6aee451f4344922e9e0de074\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"dd2c1f0d-fafc-4b69-932a-856cd1b8890e\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-09 08:05:39\", \"transaction_time\": \"2026-04-09 08:05:25\", \"transaction_status\": \"settlement\"}', '2026-04-09 01:05:47', '2026-04-09 01:05:47', '2026-04-09 01:05:47'),
(22, 2, 'ORDER-2-1775698246', 78000, 'paid', '08123', 'kurir_kami', 'Komp. Villa Santika 2', 'bank_transfer', 'ORDER-2-1775698246', '81c67701-68be-4031-97e4-1ff83b97857f', '{\"currency\": \"IDR\", \"order_id\": \"ORDER-2-1775698246\", \"va_numbers\": [{\"bank\": \"bca\", \"va_number\": \"19661975693805902039132\"}], \"expiry_time\": \"2026-04-10 08:30:52\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"bank_transfer\", \"signature_key\": \"9ce92137e923ea079108e5849aa58fc4506d8c5dadd54b17c52fc6afe87184262d3addcbdb10f048d0d5809283716a9c9903149ab72edb80103445ef583cf139\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"81c67701-68be-4031-97e4-1ff83b97857f\", \"payment_amounts\": [], \"settlement_time\": \"2026-04-09 08:31:03\", \"transaction_time\": \"2026-04-09 08:30:52\", \"transaction_status\": \"settlement\"}', '2026-04-09 01:31:09', '2026-04-09 01:31:09', '2026-04-09 01:31:09'),
(23, 2, 'ORDER-2-1775699188', 78000, 'shipped', '08123', 'kurir_kami', 'Komp. Villa Santika 2', 'qris', 'ORDER-2-1775699188', '7312787d-0404-43e9-be62-ae74a7c50872', '{\"issuer\": \"gopay\", \"acquirer\": \"gopay\", \"currency\": \"IDR\", \"order_id\": \"ORDER-2-1775699188\", \"expiry_time\": \"2026-04-09 09:03:06\", \"merchant_id\": \"G188619661\", \"status_code\": \"200\", \"fraud_status\": \"accept\", \"gross_amount\": \"83000.00\", \"payment_type\": \"qris\", \"signature_key\": \"a7cc6493b6bc3ae406f2041f339eaf1700906b334afb383e4d1332ce0a1857e6762e74663bcb9b00a5cf13add816f82872b7f15bc653a0c7b9051bc990dc173c\", \"status_message\": \"Success, transaction is found\", \"transaction_id\": \"7312787d-0404-43e9-be62-ae74a7c50872\", \"settlement_time\": \"2026-04-09 08:48:37\", \"transaction_time\": \"2026-04-09 08:48:06\", \"transaction_type\": \"on-us\", \"transaction_status\": \"settlement\"}', '2026-04-09 01:48:48', '2026-04-09 01:48:48', '2026-04-09 01:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `produk_id`, `quantity`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 78000, 78000, '2026-04-07 03:37:46', '2026-04-07 03:37:46'),
(2, 4, 2, 1, 78000, 78000, '2026-04-07 04:01:11', '2026-04-07 04:01:11'),
(3, 8, 2, 1, 78000, 78000, '2026-04-07 06:08:30', '2026-04-07 06:08:30'),
(4, 9, 1, 1, 38000, 38000, '2026-04-07 06:09:37', '2026-04-07 06:09:37'),
(5, 10, 2, 1, 78000, 78000, '2026-04-07 06:13:04', '2026-04-07 06:13:04'),
(6, 11, 2, 1, 78000, 78000, '2026-04-07 06:48:00', '2026-04-07 06:48:00'),
(7, 11, 1, 1, 38000, 38000, '2026-04-07 06:48:00', '2026-04-07 06:48:00'),
(8, 12, 2, 1, 78000, 78000, '2026-04-07 08:39:53', '2026-04-07 08:39:53'),
(9, 13, 2, 1, 78000, 78000, '2026-04-07 08:52:15', '2026-04-07 08:52:15'),
(10, 14, 2, 1, 78000, 78000, '2026-04-07 19:53:55', '2026-04-07 19:53:55'),
(11, 15, 2, 1, 78000, 78000, '2026-04-08 02:56:38', '2026-04-08 02:56:38'),
(12, 16, 2, 1, 78000, 78000, '2026-04-08 03:02:04', '2026-04-08 03:02:04'),
(13, 17, 2, 1, 78000, 78000, '2026-04-08 03:06:49', '2026-04-08 03:06:49'),
(14, 18, 1, 1, 38000, 38000, '2026-04-08 06:15:43', '2026-04-08 06:15:43'),
(15, 19, 1, 1, 38000, 38000, '2026-04-09 00:38:38', '2026-04-09 00:38:38'),
(16, 20, 1, 2, 38000, 76000, '2026-04-09 01:03:58', '2026-04-09 01:03:58'),
(17, 21, 2, 1, 78000, 78000, '2026-04-09 01:05:47', '2026-04-09 01:05:47'),
(18, 22, 2, 1, 78000, 78000, '2026-04-09 01:31:09', '2026-04-09 01:31:09'),
(19, 23, 2, 1, 78000, 78000, '2026-04-09 01:48:48', '2026-04-09 01:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('firmansyahaziz38@gmail.com', '$2y$12$dl.z/hQI86iEOMMSTZT2HuXUTZ5hd7RX8Lft5n6juXxI9Hs109Qvu', '2026-04-07 07:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_terbit` date DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `gambar_produk`, `deskripsi`, `bahasa`, `penulis`, `penerbit`, `tanggal_terbit`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Blue Lock', 'produk_images/IRhJyjIkiYCBdab3JRSKTKfCXnCNnHUDj6QpLe86.webp', 'Blue Lock adalah manga dan anime sepak bola populer (ditulis Muneyuki Kaneshiro, diilustrasikan Yūsuke Nomura) yang berfokus pada pelatihan 300 striker muda di fasilitas khusus untuk menciptakan striker egois nomor satu di dunia demi memenangkan Piala Dunia. Ceritanya mengikuti Yoichi Isagi, yang menghadapi seleksi intensif dengan sistem gugur, mirip Squid Game, di mana egoisme individu diutamakan di atas kerja sama tim.', 'Indonesia', 'Muneyuki Kaneshiro', 'Phoenix Gramedia Indonesia', '2018-01-08', 38000.00, 8, '2026-04-07 03:06:28', '2026-04-09 01:03:58'),
(2, 'The Magic Library', 'produk_images/oEL4tc6W2YChA0uPC6WEqnGknQO9O85RWypqqQDB.jpg', '\"The Magic Library\" (judul asli: Bibbi Bokkens magische bibliothek) adalah novel misteri anak dan remaja karya Jostein Gaarder (penulis Dunia Sophie) dan Klaus Hagerup. Buku ini berkisah tentang dua sepupu, Berit dan Nils, yang menyelidiki konspirasi perbukuan misterius yang dilakukan oleh seorang wanita bernama Bibbi Bokken, melibatkan perburuan harta karun dan kecintaan pada literasi', 'Indonesia', 'Jostein Gaarder dan Klaus Hagerup', 'Phoenix Gramedia Indonesia', '2025-03-26', 78000.00, 9, '2026-04-07 03:10:52', '2026-04-09 01:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `reported`
--

CREATE TABLE `reported` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED DEFAULT NULL,
  `laporan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reported`
--

INSERT INTO `reported` (`id`, `order_id`, `user_id`, `produk_id`, `laporan`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 2, 'tes', '2026-04-07 06:32:50', '2026-04-07 06:32:50'),
(2, 7, 1, NULL, 'produk gak ada', '2026-04-07 06:46:53', '2026-04-07 06:46:53'),
(3, 6, 1, NULL, 'produk tidak terlihat namun pembayaran jalan', '2026-04-07 08:59:43', '2026-04-07 08:59:43'),
(4, 19, 2, 1, 'aneh bang', '2026-04-09 00:38:58', '2026-04-09 00:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iMjk3nNOH2Nyhhxv2glw7AWYjl8ryoXXCdXbXWGF', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 OPR/129.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGxUN3BScFlPYjV6eFFZYmtrNXl5TlVBS0JrdkJWMVBFVXVpOEU2ayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo1MjoibG9naW5fc3RhZmZfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1775708370);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto_profil`, `no_hp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aziz', 'firmansyahaziz38@gmail.com', NULL, '$2y$12$5bBZayFLM8Hz7h65LQI2me1Y.kEMTLlnjIm5DGxtkRZY5CGJ9r7YK', NULL, NULL, 'Komp. Villa Santika', NULL, '2026-04-07 03:11:22', '2026-04-07 03:22:29'),
(2, 'Abdul Aziz', 'firmansyahaziz1@gmail.com', NULL, '$2y$12$Et5o4djlumXNL4Dz1VGdd.1ihvi3vt5GRSWvcPetDS4M0BShzmMyO', 'profile/M42JM6EuCJJq2SId9Tha2V7sOPmPl64KTlbR0t1c.png', NULL, 'Komp. Villa Santika 2', NULL, '2026-04-09 00:21:36', '2026-04-09 01:05:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_staff`
--
ALTER TABLE `akun_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_staff_username_unique` (`username`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_produk`
--
ALTER TABLE `category_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_produk_produk_id_foreign` (`produk_id`),
  ADD KEY `category_produk_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported`
--
ALTER TABLE `reported`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reported_order_id_foreign` (`order_id`),
  ADD KEY `reported_user_id_foreign` (`user_id`),
  ADD KEY `reported_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

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
-- AUTO_INCREMENT for table `akun_staff`
--
ALTER TABLE `akun_staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_produk`
--
ALTER TABLE `category_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reported`
--
ALTER TABLE `reported`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_produk`
--
ALTER TABLE `category_produk`
  ADD CONSTRAINT `category_produk_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reported`
--
ALTER TABLE `reported`
  ADD CONSTRAINT `reported_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reported_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reported_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
