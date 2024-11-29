-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 10:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgs_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(6, 'Espresso'),
(7, 'Fruit Tea'),
(8, 'Mocktails'),
(9, 'Smoothies'),
(10, 'Frappe'),
(11, 'Croffle'),
(12, 'Fries'),
(13, 'Cakes'),
(14, 'Sandwich'),
(15, 'Rice Meal');

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders_details`
--

CREATE TABLE `completed_orders_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` varchar(255) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `package_quantity` int(11) NOT NULL,
  `measurement_per_package` int(11) NOT NULL,
  `total_measurement` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `Expiry_Date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `supplier`, `product_name`, `package_quantity`, `measurement_per_package`, `total_measurement`, `category`, `unit`, `Expiry_Date`, `created_at`, `updated_at`, `created_by`) VALUES
('1', 'saiden corp', 'kerbs', 12, 12, '144.00', '', 'grams', '2024-11-30', '2024-11-26 01:57:14', '2024-11-26 01:57:14', NULL),
('2', 'coffeebean', 'Milk', 12, 12, '144.00', '', 'milliliter', '2024-11-30', '2024-11-26 01:49:38', '2024-11-26 01:49:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_reference` varchar(50) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image`, `price`, `category`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'chesses', 'images/67422a9269e9f.jpg', 1000000.00, '', '2024-11-24 03:18:42', '2024-11-24 03:18:42', 0),
(2, 'saiden', 'images/6742bf67b547a.png', 123.00, '', '2024-11-24 13:53:43', '2024-11-24 13:53:43', 0),
(7, '21', 'images/674a3330e0056.png', 123.00, 'Espresso', '2024-11-30 05:33:36', '2024-11-30 05:33:36', 0),
(8, 'gian', 'images/674a3352e0c32.png', 1000.00, 'Fruit Tea', '2024-11-30 05:34:10', '2024-11-30 05:34:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `po_number` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `qty_received` int(11) NOT NULL,
  `acc_id` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `received_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `po_number`, `created_at`, `qty_received`, `acc_id`, `total_amount`, `received_date`) VALUES
(156, 'PORD0001', '2024-11-30 04:19:15', 0, NULL, 2100.00, '2024-11-30 04:19:15'),
(157, 'PORD0002', '2024-11-30 04:19:47', 0, NULL, 252.00, '2024-11-30 04:19:47'),
(158, 'PORD0003', '2024-11-30 04:20:30', 0, NULL, 2583.00, '2024-11-30 04:20:30'),
(159, 'PORD0004', '2024-11-30 04:22:18', 0, NULL, 2583.00, '2024-11-30 04:22:18'),
(160, 'PORD0005', '2024-11-30 04:23:17', 0, NULL, 2100.00, '2024-11-30 04:23:17'),
(161, 'PORD0006', '2024-11-30 04:23:29', 0, NULL, 2583.00, '2024-11-30 04:23:29'),
(162, 'PORD0007', '2024-11-30 04:27:29', 0, NULL, 2583.00, '2024-11-30 04:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `id` int(11) NOT NULL,
  `po_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `qty_received` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `supplier_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`id`, `po_id`, `product_name`, `unit_price`, `quantity`, `qty_received`, `status`, `supplier_name`, `amount`) VALUES
(138, '160', 'Milk', 100, 21, 0, 'pending', 'asd', 0.00),
(139, '161', 'kerbs', 123, 21, 0, 'pending', '', 0.00),
(140, '162', 'kerbs', 123, 21, 0, 'pending', '', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `contact_number` bigint(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `contact_number`, `email`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(5, 'coffeebean', 0, 'giancarlo@gmail.com', 'inactive', '2024-11-23 04:03:10', '2024-11-24 03:19:18', NULL),
(6, 'saiden corp', 0, 'saidenabbas21@gmail.com', 'active', '2024-11-23 08:58:11', '2024-11-23 08:58:11', NULL),
(7, 'Esdelac Company', 0, 'samsam@gmail.com', 'active', '2024-11-23 13:40:37', '2024-11-23 13:40:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

CREATE TABLE `supplier_products` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`id`, `supplier`, `product_name`, `price`, `category`, `created_at`, `updated_at`, `created_by`) VALUES
(13, 'Esdelac Company', 'sairenz', 100.00, '', '2024-11-23 18:13:29', '2024-11-24 22:40:59', NULL),
(14, 'saiden corp', 'kerbs', 123.00, 'asd', '2024-11-23 18:13:40', '2024-11-23 18:13:40', NULL),
(15, 'coffeebean', 'beans', 12.00, '', '2024-11-23 18:13:58', '2024-11-24 04:56:44', NULL),
(16, 'coffeebean', 'Milk', 100.00, 'Espresso', '2024-11-23 18:16:57', '2024-11-23 18:16:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_po`
--

CREATE TABLE `temporary_po` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(31, '123', 'asdasdasd2123', 'abbas.104661@laspinas.sti.edu.ph', '123', 'superadmin', '2024-11-23 02:55:03', '2024-11-24 22:36:16'),
(32, 'gian', 'ganub', 'ganub@gmial.com', '123123123', 'admin', '2024-11-23 14:06:02', '2024-11-24 22:36:28'),
(34, '', '', '', '', '', '2024-11-29 19:42:36', '2024-11-29 19:42:36'),
(35, '123', '123', 'qweasd@laspinas.sti.edu.ph', '123456', 'admin', '2024-11-30 04:00:38', '2024-11-30 04:00:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `completed_orders_details`
--
ALTER TABLE `completed_orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `po_id` (`po_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `temporary_po`
--
ALTER TABLE `temporary_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `completed_orders_details`
--
ALTER TABLE `completed_orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_products`
--
ALTER TABLE `supplier_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `temporary_po`
--
ALTER TABLE `temporary_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `completed_orders_details`
--
ALTER TABLE `completed_orders_details`
  ADD CONSTRAINT `completed_orders_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `completed_orders` (`order_id`),
  ADD CONSTRAINT `completed_orders_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `completed_orders` (`order_id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD CONSTRAINT `supplier_products_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
