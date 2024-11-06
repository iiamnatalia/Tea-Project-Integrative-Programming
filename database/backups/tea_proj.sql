-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 06:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tea_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `audit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `audit_action` varchar(100) NOT NULL,
  `audit_dated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE `failed_logins` (
  `failed_login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `failed_login_dated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_amount` float(9,2) DEFAULT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `uaddress_id` int(11) NOT NULL,
  `order_opened_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_placed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_status`, `order_amount`, `order_qty`, `uaddress_id`, `order_opened_at`, `order_placed_at`) VALUES
(1, 1, 'Placed', 165.00, 1, 0, '2024-06-03 11:08:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_add_ons`
--

CREATE TABLE `order_add_ons` (
  `oadd_id` int(11) NOT NULL,
  `oitem_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `oadd_qty` int(11) NOT NULL,
  `oadd_total` float(9,2) NOT NULL,
  `oadd_added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_add_ons`
--

INSERT INTO `order_add_ons` (`oadd_id`, `oitem_id`, `prod_id`, `oadd_qty`, `oadd_total`, `oadd_added_at`) VALUES
(29, 18, 3, 4, 80.00, '2024-06-03 15:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `oitem_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `oitem_size` varchar(50) NOT NULL,
  `oitem_sweetness` varchar(20) NOT NULL,
  `oitem_qty` int(11) NOT NULL,
  `oitem_total` float(9,2) NOT NULL,
  `oitem_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `oitem_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`oitem_id`, `order_id`, `prod_id`, `oitem_size`, `oitem_sweetness`, `oitem_qty`, `oitem_total`, `oitem_added_at`, `oitem_updated_at`) VALUES
(18, 1, 16, 'Regular', '75', 1, 165.00, '2024-06-03 15:12:45', '2024-06-03 15:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_wallet` varchar(30) DEFAULT NULL,
  `pay_ref_num` varchar(30) DEFAULT NULL,
  `pay_proof` varchar(300) DEFAULT NULL,
  `pay_amount` float(9,2) NOT NULL,
  `pay_change` float(9,2) NOT NULL,
  `pay_paid_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(80) NOT NULL,
  `prod_category` varchar(50) NOT NULL,
  `prod_base_price` float(9,2) NOT NULL,
  `prod_img` varchar(300) NOT NULL,
  `prod_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prod_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_category`, `prod_base_price`, `prod_img`, `prod_added_at`, `prod_updated_at`) VALUES
(1, 'Coffee Jelly', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 21:45:12'),
(2, 'Crystals', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 21:45:12'),
(3, 'Cream Cheese', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 21:45:12'),
(4, 'Cream Puff', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(5, 'Crushed Oreo', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 21:45:12'),
(6, 'Pearls', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 21:45:12'),
(7, 'Popping Boba', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 21:45:12'),
(8, 'Pudding', 'Add-Ons', 20.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(9, 'Blueberry', 'Fruit Tea', 75.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(10, 'Green Apple', 'Fruit Tea', 75.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(11, 'Kiwi', 'Fruit Tea', 75.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(12, 'Lychee', 'Fruit Tea', 75.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(13, 'Passion', 'Fruit Tea', 75.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(14, 'Chocolate', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(15, 'Cookies & Cream', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(16, 'Dark Choco', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(17, 'Dark Choco Vanilla', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(18, 'Hokkaido', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(19, 'Honey Dew Slush', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(20, 'Kingkong\'s Delight', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(21, 'Matcha', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(22, 'Okinawa', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(23, 'Premium Thai Classic', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(24, 'Taiwan\'s Classic', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(25, 'Taro', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(26, 'Wintermelon', 'Milk Tea with Pearl', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(27, 'Cappuccino', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(28, 'Choco Banana', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(29, 'Dark Choco', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(30, 'Double Dutch', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(31, 'Java Chip', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(32, 'Matcha', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(33, 'Matcha Oreo', 'Smoothies Edition', 100.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(34, 'Milky Taro', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(35, 'Mocha', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(36, 'Salted Caramel', 'Smoothies Edition', 90.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(37, 'Blueberry', 'Yakult Edition', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(38, 'Green Apple', 'Yakult Edition', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(39, 'Kiwi', 'Yakult Edition', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(40, 'Lychee', 'Yakult Edition', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30'),
(41, 'Passion', 'Yakult Edition', 85.00, 'assets/products/sample.jpg', '2024-06-02 01:47:04', '2024-06-02 01:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `user_num` varchar(11) NOT NULL,
  `user_sec_que_1` varchar(100) NOT NULL,
  `user_sec_ans_1` varchar(20) NOT NULL,
  `user_sec_que_2` varchar(100) NOT NULL,
  `user_sec_ans_2` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'Registered',
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_verification_code` varchar(6) DEFAULT NULL,
  `user_verified_at` timestamp NULL DEFAULT NULL,
  `user_locked_until` timestamp NULL DEFAULT NULL,
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_num`, `user_sec_que_1`, `user_sec_ans_1`, `user_sec_que_2`, `user_sec_ans_2`, `user_status`, `user_created_at`, `user_verification_code`, `user_verified_at`, `user_locked_until`, `user_updated_at`) VALUES
(1, 1, 'Natalia', 'Molito', 'nataliamolito120101@gmail.com', '$2y$10$y4JrQj9yovWs8qpU3ecjGesZzjDdzee6Mi57.///VBgbdymmJ6nii', '09655439799', 'What is the name of your first pet?', '$2y$10$lFnT.ceaIYodd', 'In what city were you born?', '$2y$10$SGe9.zNHkbpOl', 'Verified', '2024-06-02 19:08:39', NULL, '2024-06-02 19:41:04', NULL, '2024-06-02 19:49:12'),
(2, 1, 'Natalia Second', 'Molito', 'natalia.styles.molito@gmail.com', '$2y$10$sMs67Mev7JNIB7Rt7F5oze8cCsL.pT9VY2z/xmSb6CMTG33CFiRLC', '09655439798', 'What is the name of your first pet?', '$2y$10$d1EW8Y3iwixG8', 'In what city were you born?', '$2y$10$BjDeV7IDjJ5td', 'Registered', '2024-06-02 19:11:56', NULL, NULL, NULL, '2024-06-02 19:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `uaddress_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uaddress_name` varchar(50) NOT NULL,
  `uaddress_type` varchar(50) NOT NULL,
  `uaddress_house_num` varchar(50) DEFAULT NULL,
  `uaddress_street` varchar(50) NOT NULL,
  `uaddress_brgy` varchar(50) NOT NULL,
  `uaddress_city` varchar(50) NOT NULL,
  `uaddress_province` varchar(50) NOT NULL,
  `uaddress_landmark` varchar(100) NOT NULL,
  `uaddress_added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`uaddress_id`, `user_id`, `uaddress_name`, `uaddress_type`, `uaddress_house_num`, `uaddress_street`, `uaddress_brgy`, `uaddress_city`, `uaddress_province`, `uaddress_landmark`, `uaddress_added_at`) VALUES
(1, 1, 'Home Address', 'Saved', NULL, 'Purok Uno', 'Tenejero', 'Candaba', 'Pampanga', '', '2024-06-03 13:27:53'),
(2, 1, 'Bahay ni Lola', 'Saved', '12', 'Purok Uno', 'Tenejero', 'Candaba', 'Pampanga', 'Tapat ng SJSC', '2024-06-03 13:58:59'),
(3, 1, 'Bahay ni Bazil', 'Saved', '1234', 'Green Peas', 'Tangos', 'Baliwag', 'Bulacan', 'NU Baliwag', '2024-06-03 13:59:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`failed_login_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_add_ons`
--
ALTER TABLE `order_add_ons`
  ADD PRIMARY KEY (`oadd_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`oitem_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`uaddress_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `failed_login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_add_ons`
--
ALTER TABLE `order_add_ons`
  MODIFY `oadd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `oitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `uaddress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
