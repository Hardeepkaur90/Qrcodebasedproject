-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 11:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `material_free_livewire`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocarts`
--

CREATE TABLE `addtocarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addtocarts`
--

INSERT INTO `addtocarts` (`id`, `table_id`, `item_id`, `qty`, `created_at`, `updated_at`) VALUES
(42, '19', '23', 1, '2023-04-23 23:12:23', '2023-04-23 23:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'drinks', 'category/V0yeSer0AYk5NevVVgg8CRWoPQZXyhpZQVU2uRCv.jpg', '1', '2023-03-22 06:55:12', '2023-04-20 22:44:58'),
(8, 'fastfood', 'category/yaINSgwlq0GXGy4M82fHf5uiFMuvEH1kZWW2faBO.png', '1', '2023-03-22 22:46:34', '2023-04-21 00:08:44'),
(9, 'non-veg', 'category/fB33SKNpqimmsINWWnpddwvxiGl7O1gPTawuzk4e.jpg', '1', '2023-04-07 00:35:12', '2023-04-21 00:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quentity` varchar(255) NOT NULL,
  `cooking` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `vendor_id`, `type`, `slug`, `image`, `price`, `quentity`, `cooking`, `content`, `instructions`, `status`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'pizza', 5, '2', 'pizza', 'files/X1tqvswpa1OkNHz1ZN2p0silPcgIdRYQf5fcqhv3.jpg', 100, '1', 'rgrdhftj', 'htgjfg', 'grtjytgk', 1, '1', '2023-03-20 05:18:40', '2023-03-22 00:38:14'),
(2, 'cheeze pizza', 5, '3', 'cheeze pizza', 'files/d04o7eXOiwx45FSIZwD70THBi5rp2i3ngLdjOFDG.jpg', 200, '2', 'rgtfgjfgk', 'fdbhfgjgf', 'bhfgjfghk', 0, '2', '2023-03-20 05:20:51', '2023-03-20 05:20:51'),
(3, 'drink1', 4, '9', 'drink1', 'files/PBlDUFCXkasVGKeVC6EDiypByjhdFXbzDklj3VtQ.jpg', 100, '2', 'fdgfdh', 'dfgfdjh', 'fdhfgj', 1, '2', '2023-03-20 05:22:59', '2023-04-06 01:58:05'),
(4, 'drink2', 4, '7', 'drink2', 'files/HPO7FIB0MmraVJREEVS50DLeF8LQS5HCeOktdVvi.jpg', 200, '2', 'dvfgdh', 'dgdfh', 'fdhfdj', 1, '3', '2023-03-20 05:23:33', '2023-04-06 01:58:14'),
(21, 'Pizza', 3, '8', 'Pizza', 'files/RIrl4Aejx9x6gLi0INL6evxF38SZhCB6v2h1ieJG.jpg', 200, '1', 'ghgcjgh', 'fghfgj', 'fhgj', 1, '0', '2023-04-07 00:22:40', '2023-04-21 01:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_03_06_104621_create_tables_table', 1),
(6, '2023_03_10_092403_create_roles_table', 1),
(7, '2023_03_14_042003_create_items_table', 1),
(8, '2023_03_17_102404_create_categories_table', 1),
(9, '2023_03_21_113802_create_orders_table', 2),
(10, '2023_03_21_113847_create_payments_table', 2),
(11, '2023_03_21_115016_create_order_details_table', 2),
(13, '2023_03_27_074118_add_status_to_users_table', 4),
(14, '2023_03_31_043615_create_payments_table', 5),
(15, '2023_04_05_081749_profile_pik', 6),
(16, '2023_03_23_064658_create_addtocarts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `table_id` int(11) NOT NULL,
  `payment_id` varchar(2556) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2023-03-20 03:24:56', '2023-03-20 03:24:56'),
(4, 'admin', '2023-03-20 03:31:49', '2023-03-20 03:31:49'),
(6, 'user', '2023-03-21 04:28:14', '2023-03-21 04:28:14'),
(7, 'chef', '2023-03-21 04:28:21', '2023-03-21 04:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `qrcode` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `rest_id`, `name`, `description`, `qrcode`, `created_at`, `updated_at`) VALUES
(19, 3, 'table2', 'this is two person table  updated', 'F:\\xamppupdated8\\htdocs\\material_free_livewire\\public\\assets/qrcode/1682418675.svg', '2023-04-10 01:42:23', '2023-04-25 05:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `role`, `profile`, `company_id`, `location`, `about`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'superadmintt', 'superadmin@gmail.com', NULL, '1234567848', 1, 'profiles/RLgkNzJTlWz7mpDUrSfmnTP9QKz13TQBnxy1QTc3.jpg', NULL, 'ldhdd', 'fhgjdf44', '$2y$10$DvdKoAk/GyzH9/6kjXJDx.x5ornsUEVpVIyp.D1579zSKlozbEKcS', NULL, '2023-03-20 03:21:43', '2023-04-12 04:11:36', 'Active'),
(3, 'Devid', 'user@gmail.com', NULL, '0123456789', 4, 'profiles/qkiq65k8Mtl22ye09MiabztzcA9bGkpZ2Jkh7kU3.jpg', NULL, 'ldhdd', 'testing', '$2y$10$W8esKzo9Q2oMyBy.gzqsc.ZhZaOHS3eY9W5PqlA8BcUeB0yFLR50i', NULL, '2023-03-20 05:09:04', '2023-04-25 04:25:48', 'Active'),
(4, 'user1', 'user1@gmail.com', NULL, '0123456789', 4, NULL, NULL, 'ldh', 'trghtj', '$2y$10$REbnZIiR0V3ahUNBdhx/0uLwg8nvB0WsEFNkipgqH9gSsKWsxZlzS', NULL, '2023-03-20 05:09:38', '2023-04-06 02:08:27', NULL),
(5, 'user2', 'user2@gmail.com', NULL, '1234567890', 4, '', NULL, 'admin@crudboosldher.com', NULL, '$2y$10$XXmkBuZUfoYrJxCRsSdsBOwGCt0ATSTydCvBv0OGCyD.Fi1JeZZYu', NULL, '2023-03-20 05:14:57', '2023-03-20 05:14:57', NULL),
(6, 'rohit', 'rohit@gmail.com', NULL, '1234567890', 7, '', NULL, 'ludhinana', NULL, '$2y$10$C1cNvZFdQ6gVkIGxj45hqu.p3cDFKcGkDdceMGomwyOIAYj3mTDbq', NULL, '2023-03-21 05:12:40', '2023-03-21 05:12:40', NULL),
(12, 'bbc', 'bbc@gmail.com', NULL, NULL, 4, '', NULL, NULL, NULL, '$2y$10$my8FONsPJqMl4cYN6MiW5euFSQjblG/uTvQOkhYcqE9DcjmU60Upa', NULL, '2023-03-27 02:01:31', '2023-03-27 02:01:31', NULL),
(13, 'rohit', 'testing@gmail.com', NULL, '01234567890', 4, NULL, NULL, 'ludh', NULL, '$2y$10$3YBmbyVlXoa2Q1VOmunk0.TFvQtprQOqIPk2CPA450kfgHIwqMzh.', NULL, '2023-04-05 03:04:52', '2023-04-12 01:26:15', 'Active'),
(14, 'testing11', 'testing11@gmail.com', NULL, NULL, 4, NULL, NULL, NULL, NULL, '$2y$10$sfGFhT9aEINBke/5O1DipedC7aYR.TnYH9vzgoZ/y.6a.OuSsRsiG', NULL, '2023-04-05 03:08:55', '2023-04-05 03:08:55', NULL),
(15, 'rohit', 'rohit3@gmail.com', NULL, '01234567890', 4, NULL, NULL, 'ludh', NULL, '$2y$10$EswBkNzaeRm8SoV/6dYWBepl.4OF0LiZmbcw2IBeCX61Cl.Gd.P3e', NULL, '2023-04-05 03:10:28', '2023-04-05 03:46:48', 'Active'),
(17, 'urmilakumari', 'urmila@gmail.com', NULL, '1234567890', 4, 'profiles/4Wp87wB8WyZmOri96hf4iavtjkmCpA3oyY9M1Nqe.jpg', NULL, 'ludhiana', 'fdcdgbf', '$2y$10$ujVUfS3TzMAsLDdoXXFAJeA.DWIynu3Nntjjvn5nXUu6tKw1BbKpy', NULL, '2023-04-12 00:56:02', '2023-04-21 00:23:16', 'Active'),
(21, 'rohit', 'chef11@gmail.com', NULL, '01234567890', 7, 'profiles/28GihyHtm6KyBq08OQ7VQKH24Q8PLI9A17D6EMKV.jpg', 17, 'fgg', 'testing', '$2y$10$DnoPw4Ii8wS5nNhCgtGxAuigai0oDNqOMreipDXO.KX.Fbbj9D0Uy', NULL, '2023-04-12 23:19:22', '2023-04-21 05:36:40', 'Active'),
(22, 'chef11', 'chef1@gmail.com', NULL, '0987654321', 7, 'profiles/Py0NOK1ZcYPg3c2a8Sb7UMNg32YeZqZw5spw9QOk.jpg', 3, 'ludhiana11', NULL, '$2y$10$0fbxcXXHXucosxqd61XYfO4J00O2RS60TmvbFzb3eCNZ9ML7CujDW', NULL, '2023-04-21 03:54:54', '2023-04-25 05:29:50', 'Active'),
(23, 'testing chef', 'testing22@gmail.com', NULL, NULL, 7, 'imagetesting/snbOc98Rob2NeHaGHRR7jiaUfD0Vlx6pXYd4mVmX.jpg', 3, NULL, NULL, '$2y$10$jR/EOmJZPZK.JdsPdUBN.u7LJpCFYljdA/vB0e2.qRUZb25ExIRti', NULL, '2023-04-25 05:46:41', '2023-04-25 05:46:41', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocarts`
--
ALTER TABLE `addtocarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `addtocarts`
--
ALTER TABLE `addtocarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
