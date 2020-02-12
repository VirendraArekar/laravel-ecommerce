-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2020 at 10:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nike', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(2, 'Addidas', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(3, 'Topshop', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(4, 'Puma', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(5, 'Mango', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(6, 'Zara', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(7, 'Bershka', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(8, 'Asos', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(9, 'River Island', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `images` json NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `sku`, `name`, `brand`, `category`, `size`, `color`, `price`, `images`, `qty`, `description`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'sku_ivu4kpeb3h1c6mt', 'Men Solid Round Neck T-shirt', 1, 5, 1, 1, '490.00', '[\"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/11077774/2019/12/24/29bdd2c8-3e2f-43aa-8ce5-55f3a501a4fa1577166621272-Difference-of-Opinion-Men-Sea-Green-Solid-Round-Neck-T-shirt-1.jpg\", \"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/11077774/2019/12/24/2e3bf45f-91fd-4c4d-9122-9c78d8525a6c1577166621181-Difference-of-Opinion-Men-Sea-Green-Solid-Round-Neck-T-shirt-3.jpg\"]', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"tshirt\", \"mens\"]', '2020-02-11 19:27:29', '2020-02-11 19:27:29', NULL),
(5, 1, 'sku_y2lbd6ioaj7z8np', 'Men Printed Round Neck T-Shirt', 3, 2, 1, 1, '130.00', '[\"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1700944/2019/6/8/972c9498-3a37-4d5d-976c-4493b4d5c0021559989322793-HRX-by-Hrithik-Roshan-Men-Yellow-Printed-Round-Neck-T-Shirt--1.jpg\", \"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1700944/2019/6/8/c3d336e4-8c86-4434-94b2-c9b28b6dd6471559989322777-HRX-by-Hrithik-Roshan-Men-Yellow-Printed-Round-Neck-T-Shirt--2.jpg\"]', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"tshirt\", \"mens\"]', '2020-02-11 21:31:58', '2020-02-11 21:31:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mens', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(2, 'Woman', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(3, 'Children', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'white', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(2, 'green', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(3, 'red', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(4, 'blue', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(5, 'orange', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(6, 'brown', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(7, 'black', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL),
(8, 'yellow', '2020-02-11 18:26:53', '2020-02-11 18:26:53', NULL);

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
(3, '2020_02_11_203512_create_brands_table', 2),
(4, '2020_02_11_203543_create_categories_table', 2),
(5, '2020_02_11_203609_create_sizes_table', 2),
(6, '2020_02_11_203630_create_products_table', 2),
(7, '2020_02_11_203650_create_carts_table', 2),
(8, '2020_02_11_203712_create_addresses_table', 2),
(9, '2020_02_11_203739_create_orders_table', 2),
(10, '2020_02_11_203854_create_transactions_table', 2),
(11, '2020_02_11_210036_create_colors_table', 2),
(12, '2020_02_11_211707_add_delivery_address_to_users', 3),
(13, '2020_02_11_215149_update_products_table', 4),
(14, '2020_02_11_221706_add_images_products_table', 5),
(15, '2020_02_11_223913_update_products_table', 6),
(16, '2020_02_11_224835_add_deleted_at_products_table', 7),
(17, '2020_02_12_003519_drop_deleted_at_to_carts', 8),
(18, '2020_02_12_003543_add_deleted_at_to_carts', 8),
(19, '2020_02_12_005450_add_images_at_to_carts', 9),
(20, '2020_02_12_010536_add_qty_to_cart', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `transid` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime NOT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `size` json NOT NULL,
  `color` json NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `images` json DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `brand`, `category`, `size`, `color`, `price`, `images`, `description`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'sku_43a0sur9we12nv6', 'Men Printed Round Neck T-shirt', 4, 3, '[3, 1, 4, 5]', '[3, 1, 4, 5]', '330.00', '[\"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/4318138/2018/5/4/11525433792765-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-1.jpg\", \"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/4318138/2018/5/4/11525433792736-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-2.jpg\"]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"tshirt\", \"mens\"]', '2020-02-11 17:23:45', '2020-02-11 17:23:45', NULL),
(10, 'sku_y2lbd6ioaj7z8np', 'Men Printed Round Neck T-Shirt', 3, 2, '[3, 1, 4, 5]', '[3, 1, 4, 5]', '130.00', '[\"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1700944/2019/6/8/972c9498-3a37-4d5d-976c-4493b4d5c0021559989322793-HRX-by-Hrithik-Roshan-Men-Yellow-Printed-Round-Neck-T-Shirt--1.jpg\", \"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/1700944/2019/6/8/c3d336e4-8c86-4434-94b2-c9b28b6dd6471559989322777-HRX-by-Hrithik-Roshan-Men-Yellow-Printed-Round-Neck-T-Shirt--2.jpg\"]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"tshirt\", \"mens\"]', '2020-02-11 17:23:45', '2020-02-11 17:23:45', NULL),
(11, 'sku_ivu4kpeb3h1c6mt', 'Men Solid Round Neck T-shirt', 1, 5, '[3, 1, 4, 5]', '[3, 1, 4, 5]', '490.00', '[\"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/11077774/2019/12/24/29bdd2c8-3e2f-43aa-8ce5-55f3a501a4fa1577166621272-Difference-of-Opinion-Men-Sea-Green-Solid-Round-Neck-T-shirt-1.jpg\", \"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/11077774/2019/12/24/2e3bf45f-91fd-4c4d-9122-9c78d8525a6c1577166621181-Difference-of-Opinion-Men-Sea-Green-Solid-Round-Neck-T-shirt-3.jpg\"]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"tshirt\", \"mens\"]', '2020-02-11 17:23:45', '2020-02-11 17:23:45', NULL),
(12, 'sku_szdgjbw60tlp4a2', 'Men Printed Round Neck T-Shirt', 1, 5, '[3, 1, 4, 5]', '[3, 1, 4, 5]', '550.00', '[\"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2297835/2018/3/14/11521020286596-Roadster-Men-Tshirts-4241521020286395-1.jpg\", \"https://assets.myntassets.com/h_1440,q_90,w_1080/v1/assets/images/2297835/2018/3/14/11521020286536-Roadster-Men-Tshirts-4241521020286395-3.jpg\"]', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"tshirt\", \"mens\"]', '2020-02-11 17:23:45', '2020-02-11 17:23:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'XS', '2020-02-11 18:27:45', '2020-02-11 18:27:45', NULL),
(2, 'S', '2020-02-11 18:27:45', '2020-02-11 18:27:45', NULL),
(3, 'M', '2020-02-11 18:27:45', '2020-02-11 18:27:45', NULL),
(4, 'L', '2020-02-11 18:27:45', '2020-02-11 18:27:45', NULL),
(5, 'XL', '2020-02-11 18:27:45', '2020-02-11 18:27:45', NULL),
(6, 'XLL', '2020-02-11 18:27:45', '2020-02-11 18:27:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime NOT NULL
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
  `delivery_address` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `delivery_address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Virendra Arekar', 'virendra.arekar@gmail.com', NULL, NULL, '$2y$10$2PsOaY46uADr3jsWL0tqq.3VagX3SjOBjyQw.ENpsGeGln52aCXDC', NULL, '2020-02-11 14:47:56', '2020-02-11 14:47:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
