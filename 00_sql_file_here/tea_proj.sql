-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:54 AM
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

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `audit_action`, `audit_dated_at`) VALUES
(1, 1, 'Account Created', '2024-06-14 06:39:58'),
(2, 1, 'Account Verified', '2024-06-14 06:40:46'),
(3, 1, 'Successful Login', '2024-06-14 06:41:12'),
(4, 1, 'Logout', '2024-06-14 06:41:20'),
(5, 2, 'Account Created', '2024-06-14 06:43:54'),
(6, 2, 'Account Verified', '2024-06-14 06:44:13'),
(7, 3, 'Account Created', '2024-06-14 06:46:57'),
(8, 3, 'Account Verified', '2024-06-14 06:47:12'),
(9, 4, 'Account Created', '2024-06-14 06:48:38'),
(10, 4, 'Account Verified', '2024-06-14 06:52:59'),
(11, 4, 'Account Verified', '2024-06-14 06:58:37'),
(12, 4, 'Account Verified', '2024-06-14 06:58:45'),
(13, 4, 'Account Verified', '2024-06-14 06:58:53'),
(14, 4, 'Account Verified', '2024-06-14 06:59:03'),
(15, 2, 'Successful Login', '2024-06-14 06:59:36'),
(16, 2, 'Added Item to Cart', '2024-06-14 07:00:42'),
(17, 2, 'Edited Cart Item', '2024-06-14 07:01:13'),
(18, 2, 'Checked Out Order #1', '2024-06-14 07:02:03'),
(19, 1, 'Logout', '2024-06-14 07:03:16'),
(20, 5, 'Account Created', '2024-06-14 07:08:57'),
(21, 5, 'Account Verified', '2024-06-14 07:09:33'),
(22, 5, 'Successful Login', '2024-06-14 07:10:02'),
(23, 5, 'Added Item to Cart', '2024-06-14 07:10:53'),
(24, 5, 'Edited Cart Item', '2024-06-14 07:11:06'),
(25, 5, 'Deleted an Item from Cart', '2024-06-14 07:11:11'),
(26, 5, 'Added Item to Cart', '2024-06-14 07:11:30'),
(27, 5, 'Added Item to Cart', '2024-06-14 07:11:49'),
(28, 5, 'Edited Cart Item', '2024-06-14 07:12:01'),
(29, 5, 'Edited Cart Item', '2024-06-14 07:12:07'),
(30, 5, 'Checked Out Order #2', '2024-06-14 07:12:55'),
(31, 5, 'Reordered Order #2', '2024-06-14 07:13:39'),
(32, 5, 'Edited Cart Item', '2024-06-14 07:13:47'),
(33, 5, 'Checked Out Order #3', '2024-06-14 07:14:10'),
(34, 1, 'Successful Login', '2024-06-14 07:15:03'),
(35, 5, 'Submitted a Feedback for Order ID #3', '2024-06-14 07:17:16'),
(36, 1, 'Logout', '2024-06-14 07:20:51'),
(37, 5, 'Successful Login', '2024-06-14 07:21:38'),
(38, 5, 'Added Item to Cart', '2024-06-14 07:21:59'),
(39, 5, 'Edited Cart Item', '2024-06-14 07:22:35'),
(40, 5, 'Checked Out Order #4', '2024-06-14 07:22:54'),
(41, 5, 'Reordered Order #3', '2024-06-14 07:23:28'),
(42, 5, 'Checked Out Order #5', '2024-06-14 07:23:54'),
(43, 5, 'Updated First Name', '2024-06-14 07:24:30'),
(44, 5, 'Updated Profile Picture', '2024-06-14 07:24:41'),
(45, 5, 'Reordered Order #3', '2024-06-14 07:25:36'),
(46, 5, 'Deleted an Item from Cart', '2024-06-14 07:25:44'),
(47, 5, 'Checked Out Order #6', '2024-06-14 07:25:56'),
(48, 5, 'Submitted a Feedback for Order ID #5', '2024-06-14 07:28:13'),
(49, 1, 'Downloaded Audit Trail Report', '2024-06-14 07:29:37'),
(50, 1, 'Backed Up Database', '2024-06-14 07:30:02'),
(51, 1, 'Logout', '2024-06-14 07:30:43'),
(52, 5, 'Successful Login', '2024-06-14 07:30:56'),
(53, 5, 'Login Verified Using Security Questions', '2024-06-14 07:31:12'),
(54, 1, 'Logout', '2024-06-14 07:31:21'),
(55, 5, 'Successful Login', '2024-06-14 07:31:31'),
(56, 5, 'Login Verified Using OTP', '2024-06-14 07:31:54'),
(57, 1, 'Logout', '2024-06-14 07:38:25'),
(58, 1, 'Logout', '2024-06-14 13:36:34'),
(59, 1, 'Successful Login', '2024-06-14 13:54:22'),
(60, 1, 'Backed Up Database', '2024-06-14 13:57:53'),
(61, 5, 'Successful Login', '2024-10-21 04:56:00'),
(62, 5, 'Login Verified Using OTP', '2024-10-21 04:56:20'),
(63, 5, 'Reordered Order #6', '2024-10-21 04:56:32'),
(64, 5, 'Checked Out Order #7', '2024-10-21 04:56:50'),
(65, 1, 'Logout', '2024-10-21 04:58:07'),
(66, 1, 'Successful Login', '2024-10-21 04:58:27'),
(67, 5, 'Successful Login', '2024-10-26 11:16:59'),
(68, 5, 'Added Item to Cart', '2024-10-26 11:17:15'),
(69, 5, 'Checked Out Order #8', '2024-10-26 11:17:42'),
(70, 5, 'Successful Login', '2024-10-30 01:40:17'),
(71, 5, 'Reordered Order #8', '2024-10-30 01:40:32'),
(72, 5, 'Added Item to Cart', '2024-10-30 02:01:08'),
(73, 5, 'Deleted an Item from Cart', '2024-10-30 03:14:46'),
(74, 5, 'Deleted an Item from Cart', '2024-10-30 03:14:48'),
(75, 5, 'Added Item to Cart', '2024-10-30 03:14:58'),
(76, 5, 'Edited Cart Item', '2024-10-30 03:22:31'),
(77, 5, 'Reordered Order #9', '2024-10-30 03:29:21'),
(78, 5, 'Added Item to Cart', '2024-10-30 03:29:31'),
(79, 5, 'Reordered Order #10', '2024-10-30 03:30:11'),
(80, 5, 'Reordered Order #11', '2024-10-30 03:32:33'),
(81, 1, 'Logout', '2024-10-30 03:33:02'),
(82, 1, 'Successful Login', '2024-10-30 03:33:31'),
(83, 1, 'Logout', '2024-10-30 03:37:28'),
(84, 5, 'Successful Login', '2024-10-30 03:37:32'),
(85, 5, 'Reordered Order #12', '2024-10-30 03:37:37'),
(86, 5, 'Checked Out Order #13', '2024-10-30 03:37:41'),
(87, 1, 'Logout', '2024-10-30 03:38:07'),
(88, 1, 'Successful Login', '2024-10-30 03:38:27'),
(89, 1, 'Logout', '2024-10-30 03:39:30'),
(90, 5, 'Successful Login', '2024-10-31 07:21:31'),
(91, 5, 'Reordered Order #13', '2024-10-31 07:21:37'),
(92, 5, 'Added Item to Cart', '2024-10-31 07:21:50'),
(93, 5, 'Checked Out Order #14', '2024-10-31 07:22:04'),
(94, 5, 'Reordered Order #14', '2024-10-31 07:24:32'),
(95, 5, 'Checked Out Order #15', '2024-10-31 07:24:36'),
(96, 5, 'Reordered Order #14', '2024-10-31 07:33:04'),
(97, 6, 'Account Created', '2024-10-31 09:38:24'),
(98, 6, 'Account Verified', '2024-10-31 09:38:42'),
(99, 6, 'Successful Login', '2024-10-31 09:38:53'),
(100, 6, 'Added Item to Cart', '2024-10-31 09:39:14'),
(101, 6, 'Added Item to Cart', '2024-10-31 09:39:23'),
(102, 6, 'Checked Out Order #17', '2024-10-31 09:40:32'),
(103, 1, 'Logout', '2024-10-31 09:41:47'),
(104, 1, 'Successful Login', '2024-10-31 09:41:54');

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fb_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `fb_message` varchar(300) DEFAULT NULL,
  `fb_stars` int(11) NOT NULL,
  `fb_dated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fb_id`, `user_id`, `order_id`, `fb_message`, `fb_stars`, `fb_dated_at`) VALUES
(1, 5, 3, '', 5, '2024-06-14 07:17:16'),
(2, 5, 5, 'Ang sarap!', 5, '2024-06-14 07:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `uaddress_id` int(11) NOT NULL,
  `order_sub_total` float(9,2) DEFAULT NULL,
  `order_del_fee` float(9,2) NOT NULL,
  `order_grand_total` float(9,2) NOT NULL,
  `order_opened_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_placed_at` timestamp NULL DEFAULT NULL,
  `order_delivered_at` timestamp NULL DEFAULT NULL,
  `order_cancel_reason` varchar(300) DEFAULT NULL,
  `order_cancelled_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_status`, `order_qty`, `uaddress_id`, `order_sub_total`, `order_del_fee`, `order_grand_total`, `order_opened_at`, `order_placed_at`, `order_delivered_at`, `order_cancel_reason`, `order_cancelled_at`) VALUES
(1, 2, 'Refunded', 5, 1, 925.00, 30.00, 955.00, '2024-06-14 07:00:42', '2024-06-14 07:02:02', '0000-00-00 00:00:00', 'Malaks Ulan', '2024-06-14 01:17:53'),
(2, 5, 'Canceled', 4, 2, 440.00, 20.00, 460.00, '2024-06-14 07:10:53', '2024-06-14 07:12:55', '0000-00-00 00:00:00', 'Malakas Ulan', '2024-06-14 01:16:16'),
(3, 5, 'Delivered', 2, 3, 170.00, 30.00, 200.00, '2024-06-14 07:13:38', '2024-06-14 07:14:10', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 5, 'Canceled', 2, 4, 450.00, 30.00, 480.00, '2024-06-14 07:21:59', '2024-06-14 07:22:54', '0000-00-00 00:00:00', 'Malakas Ulan', '2024-06-14 01:26:36'),
(5, 5, 'Delivered', 2, 5, 170.00, 20.00, 190.00, '2024-06-14 07:23:28', '2024-06-14 07:23:54', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 5, 'Refunded', 1, 6, 75.00, 30.00, 105.00, '2024-06-14 07:25:36', '2024-06-14 07:25:56', '0000-00-00 00:00:00', 'Malakas Ulan', '2024-06-14 01:26:49'),
(7, 5, 'Delivered', 1, 6, 75.00, 30.00, 105.00, '2024-10-21 04:56:32', '2024-10-21 04:56:50', '2024-10-20 22:59:12', NULL, NULL),
(8, 5, 'Placed', 3, 7, 345.00, 30.00, 375.00, '2024-10-26 11:17:15', '2024-10-26 11:17:42', NULL, NULL, NULL),
(9, 5, 'Placed', 4, 6, 460.00, 0.00, 460.00, '2024-10-30 01:40:32', '2024-10-30 03:28:59', NULL, NULL, NULL),
(10, 5, 'Placed', 6, 6, 650.00, 0.00, 650.00, '2024-10-30 03:29:21', '2024-10-30 03:29:37', NULL, NULL, NULL),
(11, 5, 'Placed', 6, 6, 650.00, 0.00, 650.00, '2024-10-30 03:30:11', '2024-10-30 03:30:14', NULL, NULL, NULL),
(12, 5, 'Placed', 6, 6, 650.00, 0.00, 650.00, '2024-10-30 03:32:33', '2024-10-30 03:32:35', NULL, NULL, NULL),
(13, 5, 'Processing', 6, 6, 650.00, 0.00, 650.00, '2024-10-30 03:37:37', '2024-10-30 03:37:41', NULL, NULL, NULL),
(14, 5, 'Placed', 9, 8, 1145.00, 0.00, 1145.00, '2024-10-31 07:21:37', '2024-10-31 07:22:04', NULL, NULL, NULL),
(15, 5, 'Placed', 9, 6, 1145.00, 0.00, 1145.00, '2024-10-31 07:24:32', '2024-10-31 07:24:36', NULL, NULL, NULL),
(16, 5, 'Open', 9, 0, 1145.00, 0.00, 0.00, '2024-10-31 07:33:03', '2024-10-31 07:33:03', NULL, NULL, NULL),
(17, 6, 'Delivered', 3, 9, 305.00, 0.00, 305.00, '2024-10-31 09:39:14', '2024-10-31 09:40:32', '2024-10-31 02:42:38', NULL, NULL);

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
(3, 1, 6, 25, 500.00, '2024-06-14 07:01:13'),
(5, 3, 7, 6, 120.00, '2024-06-14 07:11:30'),
(6, 7, 7, 4, 80.00, '2024-06-14 07:21:59'),
(7, 7, 8, 4, 80.00, '2024-06-14 07:21:59'),
(8, 7, 2, 6, 120.00, '2024-06-14 07:22:35'),
(9, 13, 4, 3, 60.00, '2024-10-26 11:17:15'),
(16, 16, 5, 8, 160.00, '2024-10-30 03:22:31'),
(17, 18, 6, 2, 40.00, '2024-10-30 03:29:31'),
(18, 27, 6, 6, 120.00, '2024-10-31 07:21:50'),
(19, 27, 8, 6, 120.00, '2024-10-31 07:21:50'),
(20, 34, 3, 2, 40.00, '2024-10-31 09:39:14');

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
(1, 1, 10, 'Large', '100', 5, 925.00, '2024-06-14 07:00:42', '2024-06-14 07:01:13'),
(3, 2, 9, 'Regular', '50', 3, 345.00, '2024-06-14 07:11:30', '2024-06-14 07:12:01'),
(4, 2, 21, 'Large', '100', 1, 95.00, '2024-06-14 07:11:49', '2024-06-14 07:12:07'),
(5, 3, 9, 'Regular', '25', 1, 75.00, '2024-06-14 07:13:39', '2024-06-14 07:13:47'),
(6, 3, 21, 'Large', '100', 1, 95.00, '2024-06-14 07:13:39', '2024-06-14 07:13:39'),
(7, 4, 9, 'Large', '100', 2, 450.00, '2024-06-14 07:21:59', '2024-06-14 07:22:35'),
(8, 5, 9, 'Regular', '25', 1, 75.00, '2024-06-14 07:23:28', '2024-06-14 07:23:28'),
(9, 5, 21, 'Large', '100', 1, 95.00, '2024-06-14 07:23:28', '2024-06-14 07:23:28'),
(10, 6, 9, 'Regular', '25', 1, 75.00, '2024-06-14 07:25:36', '2024-06-14 07:25:36'),
(12, 7, 9, 'Regular', '25', 1, 75.00, '2024-10-21 04:56:32', '2024-10-21 04:56:32'),
(13, 8, 16, 'Large', '50', 3, 345.00, '2024-10-26 11:17:15', '2024-10-26 11:17:15'),
(16, 9, 11, 'Regular', '0', 4, 460.00, '2024-10-30 03:14:58', '2024-10-30 03:22:31'),
(17, 10, 11, 'Regular', '0', 4, 460.00, '2024-10-30 03:29:21', '2024-10-30 03:29:21'),
(18, 10, 12, 'Regular', '75', 2, 190.00, '2024-10-30 03:29:31', '2024-10-30 03:29:31'),
(19, 11, 11, 'Regular', '0', 4, 460.00, '2024-10-30 03:30:11', '2024-10-30 03:30:11'),
(20, 11, 12, 'Regular', '75', 2, 190.00, '2024-10-30 03:30:11', '2024-10-30 03:30:11'),
(21, 12, 11, 'Regular', '0', 4, 460.00, '2024-10-30 03:32:33', '2024-10-30 03:32:33'),
(22, 12, 12, 'Regular', '75', 2, 190.00, '2024-10-30 03:32:33', '2024-10-30 03:32:33'),
(23, 13, 11, 'Regular', '0', 4, 460.00, '2024-10-30 03:37:37', '2024-10-30 03:37:37'),
(24, 13, 12, 'Regular', '75', 2, 190.00, '2024-10-30 03:37:37', '2024-10-30 03:37:37'),
(25, 14, 11, 'Regular', '0', 4, 460.00, '2024-10-31 07:21:37', '2024-10-31 07:21:37'),
(26, 14, 12, 'Regular', '75', 2, 190.00, '2024-10-31 07:21:37', '2024-10-31 07:21:37'),
(27, 14, 12, 'Large', '100', 3, 495.00, '2024-10-31 07:21:50', '2024-10-31 07:21:50'),
(28, 15, 11, 'Regular', '0', 4, 460.00, '2024-10-31 07:24:32', '2024-10-31 07:24:32'),
(29, 15, 12, 'Regular', '75', 2, 190.00, '2024-10-31 07:24:32', '2024-10-31 07:24:32'),
(30, 15, 12, 'Large', '100', 3, 495.00, '2024-10-31 07:24:32', '2024-10-31 07:24:32'),
(31, 16, 11, 'Regular', '0', 4, 460.00, '2024-10-31 07:33:04', '2024-10-31 07:33:04'),
(32, 16, 12, 'Regular', '75', 2, 190.00, '2024-10-31 07:33:04', '2024-10-31 07:33:04'),
(33, 16, 12, 'Large', '100', 3, 495.00, '2024-10-31 07:33:04', '2024-10-31 07:33:04'),
(34, 17, 40, 'Large', '50', 2, 230.00, '2024-10-31 09:39:14', '2024-10-31 09:39:14'),
(35, 17, 13, 'Regular', '0', 1, 75.00, '2024-10-31 09:39:23', '2024-10-31 09:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_ref_num` varchar(30) DEFAULT NULL,
  `pay_cod_proof` varchar(300) DEFAULT NULL,
  `pay_amount` float(9,2) NOT NULL,
  `pay_change` float(9,2) NOT NULL,
  `pay_paid_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_status` varchar(30) DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `order_id`, `pay_mode`, `pay_ref_num`, `pay_cod_proof`, `pay_amount`, `pay_change`, `pay_paid_at`, `pay_status`) VALUES
(1, 1, 'GCash', '9918321200', '', 0.00, 0.00, '2024-06-14 07:02:02', 'Refunded'),
(2, 2, 'Cash on Delivery', '', '', 0.00, 0.00, '2024-06-14 07:12:55', ''),
(3, 3, 'GCash', '9853610433', '', 200.00, 0.00, '2024-06-14 07:14:10', 'Paid'),
(4, 4, 'Cash on Delivery', '', '', 0.00, 0.00, '2024-06-14 07:22:54', ''),
(5, 5, 'GCash', '5884223379', '', 190.00, 0.00, '2024-06-14 07:23:54', 'Paid'),
(6, 6, 'GCash', '8371938618', '', 0.00, 0.00, '2024-06-14 07:25:56', 'Refunded'),
(7, 7, 'GCash', '6470140162', NULL, 105.00, 0.00, '2024-10-21 04:56:50', 'Paid'),
(8, 8, 'GCash', '3759846884', NULL, 375.00, 0.00, '2024-10-26 11:17:42', 'Paid'),
(9, 13, 'E-Wallet', '5259752146', NULL, 650.00, 0.00, '2024-10-30 03:37:41', 'Paid'),
(10, 14, 'E-Wallet', '2758057337', NULL, 1145.00, 0.00, '2024-10-31 07:22:04', 'Paid'),
(11, 15, 'E-Wallet', '7587410752', NULL, 1145.00, 0.00, '2024-10-31 07:24:36', 'Paid'),
(12, 17, 'E-Wallet', NULL, NULL, 305.00, 0.00, '2024-10-31 09:40:32', 'Paid');

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
  `prod_status` varchar(30) NOT NULL DEFAULT 'Available',
  `prod_added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `prod_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_category`, `prod_base_price`, `prod_img`, `prod_status`, `prod_added_at`, `prod_updated_at`) VALUES
(1, 'Coffee Jelly', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Archived', '2024-06-01 17:47:04', '2024-06-14 07:33:36'),
(2, 'Crystals', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Archived', '2024-06-01 17:47:04', '2024-06-14 13:56:54'),
(3, 'Cream Cheese', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:42:03'),
(4, 'Cream Puff', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:42:07'),
(5, 'Crushed Oreo', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:42:09'),
(6, 'Pearls', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:42:12'),
(7, 'Popping Boba', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:42:14'),
(8, 'Pudding', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:42:18'),
(9, 'Blueberry', 'Fruit Tea', 75.00, 'assets/products/blueberry_ft.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:41:16'),
(10, 'Green Apple', 'Fruit Tea', 75.00, 'assets/products/green_apple_ft.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:40:36'),
(11, 'Kiwi', 'Fruit Tea', 75.00, 'assets/products/kiwi_ft.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:39:58'),
(12, 'Lychee', 'Fruit Tea', 75.00, 'assets/products/lychee_ft.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:39:28'),
(13, 'Passion', 'Fruit Tea', 75.00, 'assets/products/passion_ft.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:38:55'),
(14, 'Chocolate', 'Milk Tea with Pearl', 85.00, 'assets/products/chocolate_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 03:57:54'),
(15, 'Cookies & Cream', 'Milk Tea with Pearl', 85.00, 'assets/products/cookies_and_cream_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:00:08'),
(16, 'Dark Choco', 'Milk Tea with Pearl', 85.00, 'assets/products/dark_chocolate_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:02:34'),
(17, 'Dark Choco Vanilla', 'Milk Tea with Pearl', 85.00, 'assets/products/dark_choco_vanilla_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:03:45'),
(18, 'Hokkaido', 'Milk Tea with Pearl', 85.00, 'assets/products/hokkaido_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:05:20'),
(19, 'Honey Dew Slush', 'Milk Tea with Pearl', 85.00, 'assets/products/honey_dew_slush_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:06:55'),
(20, 'Kingkong\'s Delight', 'Milk Tea with Pearl', 85.00, 'assets/products/kingkong_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:07:55'),
(21, 'Matcha', 'Milk Tea with Pearl', 85.00, 'assets/products/matcha_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:10:01'),
(22, 'Okinawa', 'Milk Tea with Pearl', 85.00, 'assets/products/okinawa_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:11:02'),
(23, 'Premium Thai Classic', 'Milk Tea with Pearl', 85.00, 'assets/products/premium_thai_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:12:33'),
(24, 'Taiwan\'s Classic', 'Milk Tea with Pearl', 85.00, 'assets/products/taiwan_classic_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:13:39'),
(25, 'Taro', 'Milk Tea with Pearl', 85.00, 'assets/products/taro_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:17:17'),
(26, 'Wintermelon', 'Milk Tea with Pearl', 85.00, 'assets/products/wintermelon_mtwp.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:18:33'),
(27, 'Cappuccino', 'Smoothies Edition', 90.00, 'assets/products/cappucino_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:20:31'),
(28, 'Choco Banana', 'Smoothies Edition', 90.00, 'assets/products/choco_banana_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:22:02'),
(29, 'Dark Choco', 'Smoothies Edition', 90.00, 'assets/products/dark_choco_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:25:15'),
(30, 'Double Dutch', 'Smoothies Edition', 90.00, 'assets/products/double_dutch_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:26:24'),
(31, 'Java Chip', 'Smoothies Edition', 90.00, 'assets/products/java_chip_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:27:13'),
(32, 'Matcha', 'Smoothies Edition', 90.00, 'assets/products/matcha_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:28:01'),
(33, 'Matcha Oreo', 'Smoothies Edition', 100.00, 'assets/products/matcha_oreo_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:28:54'),
(34, 'Milky Taro', 'Smoothies Edition', 90.00, 'assets/products/milky_taro_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:29:41'),
(35, 'Mocha', 'Smoothies Edition', 90.00, 'assets/products/mocha_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:30:45'),
(36, 'Salted Caramel', 'Smoothies Edition', 90.00, 'assets/products/salted_caramel_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:31:34'),
(37, 'Blueberry', 'Yakult Edition', 85.00, 'assets/products/blueberry_ye.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:34:30'),
(38, 'Green Apple', 'Yakult Edition', 85.00, 'assets/products/green_apple_ye.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:35:13'),
(39, 'Kiwi', 'Yakult Edition', 85.00, 'assets/products/kiwi_ye.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:35:56'),
(40, 'Lychee', 'Yakult Edition', 85.00, 'assets/products/lychee_ye.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:36:32'),
(41, 'Passion', 'Yakult Edition', 85.00, 'assets/products/passion_ye.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 04:37:13'),
(42, 'Strawberry', 'Smoothies Edition', 50.00, 'assets/products/strawberry_ye.png', 'Available', '2024-06-14 03:44:46', '2024-06-14 04:37:57');

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
  `user_pic` varchar(500) NOT NULL DEFAULT 'assets/profile-pictures/default.webp',
  `user_sec_que_1` varchar(100) NOT NULL,
  `user_sec_ans_1` varchar(256) NOT NULL,
  `user_sec_que_2` varchar(100) NOT NULL,
  `user_sec_ans_2` varchar(256) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'Registered',
  `user_state` varchar(30) DEFAULT 'Enabled',
  `user_mfa` varchar(10) NOT NULL DEFAULT 'Disabled',
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_verification_code` varchar(6) DEFAULT NULL,
  `user_verified_at` timestamp NULL DEFAULT NULL,
  `user_locked_until` timestamp NULL DEFAULT NULL,
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `user_num`, `user_pic`, `user_sec_que_1`, `user_sec_ans_1`, `user_sec_que_2`, `user_sec_ans_2`, `user_status`, `user_state`, `user_mfa`, `user_created_at`, `user_verification_code`, `user_verified_at`, `user_locked_until`, `user_updated_at`) VALUES
(1, 3, 'Tea', 'Project', 'teaprojesip@gmail.com', '$2y$10$tWrPHPaF2XpiEmOD0tDTd.3xGqP2qNhBR5Ps4SCzzl7W0GkJsOiQ6', '09655439799', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$vd7p2D3V1tSr3zxnEXs3Oe6Jwyz/65CYGnon4dsu5IjmxASYivgwK', 'What is your favorite food?', '$2y$10$EEyC10CDWBesK.VyUmEQ1.F5cvU9uLM1A.M/TMQleRlRYraBI.IA.', 'Verified', 'Enabled', 'Disabled', '2024-06-14 06:39:58', '', '2024-06-14 06:40:46', NULL, '2024-10-21 04:58:27'),
(2, 1, 'Natalia', 'Molito', 'nataliamolito120101@gmail.com', '$2y$10$mF6e0R/3XCq/YUuA2hqHc.A5yItWFc.w850IfzY0c7oN12pKjyCXm', '09655439798', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$SysKfBEBbFmZZD//3k3eXeP7Hai9E6KU7zolAHM2Lz3epK4PAXJx.', 'In what city were you born?', '$2y$10$cV74vJOMOmXwqcGDVB.lPOI0u0UiZdo5krBWK26YtUwhoJ9ToWed2', 'Verified', 'Enabled', 'Disabled', '2024-06-14 06:43:54', '', '2024-06-14 06:44:13', '0000-00-00 00:00:00', '2024-06-14 06:44:13'),
(3, 2, 'Blu', 'Gfx', 'blugfxdesign@gmail.com', '$2y$10$ezcrlcAdwD7Xsk0/1z57KORoZPgSyLRUV3iB2TRPoXlWmEjpeunu6', '09655439796', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$s4lNsKZMcGGqdRqCZ7fsj.aPvDNQXFxHz3xPkhy/IB3PE95vQ8EQ2', 'In what city were you born?', '$2y$10$OtwUFoPlMNlHNSWZqgOWPuWyGkyFtWWV0p6PD/463O5h7xWGhV9bm', 'Verified', 'Enabled', 'Disabled', '2024-06-14 06:46:56', '', '2024-06-14 06:47:12', '0000-00-00 00:00:00', '2024-06-14 07:04:51'),
(5, 1, 'Natalia Cute', 'Molito', 'natalia.styles.molito@gmail.com', '$2y$10$09xJQGk8mPLgTgpFbcU2GeI0F0MZKRSutAdxntFa2SNXq5U7bIJq.', '09655439744', 'assets/profile-pictures/_5_Natalia Cute Molito_profile_pic_2024-06-14 09-24-41.jpg', 'In what city were you born?', '$2y$10$6ourrEME4mdAWHvFDMHn5u8u.7G3k8lJuWw3BAuxnHPDmFBiCjLDG', 'What is the name of your first pet?', '$2y$10$RJ9OeZBdXaP/TlNSZmhVtO6KB9aoIS9syUofAfDESaSLyKuJYsscC', 'Verified', 'Enabled', 'Disabled', '2024-06-14 07:08:57', NULL, '2024-06-14 07:09:33', NULL, '2024-10-21 04:57:40'),
(6, 1, 'Natalia', 'Molito', 'molitomntibm@gmail.com', '$2y$10$RjD1gz91FUqjZmK7EOVDmeBYEqnaxlatTY9x6MPXqV0W.FonMZE1a', '09655439799', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$XziGVrDdpy0iH9BFJE4ht.f6cjEpQEUzWA.RniqNFqekGRH9SyXOS', 'What was the name of your first school?', '$2y$10$i1YqOnwrY3CB9XJdRgmdg.YmfMRt3MSlEUS5Yn2Hjhp.RIwYrzVJC', 'Verified', 'Enabled', 'Disabled', '2024-10-31 09:38:24', NULL, '2024-10-31 09:38:42', NULL, '2024-10-31 09:38:42');

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
  `uaddress_province` varchar(100) DEFAULT NULL,
  `uaddress_region` varchar(100) DEFAULT NULL,
  `uaddress_landmark` varchar(100) NOT NULL,
  `uaddress_archived` int(11) NOT NULL DEFAULT 0,
  `uaddress_added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`uaddress_id`, `user_id`, `uaddress_name`, `uaddress_type`, `uaddress_house_num`, `uaddress_street`, `uaddress_brgy`, `uaddress_city`, `uaddress_province`, `uaddress_region`, `uaddress_landmark`, `uaddress_archived`, `uaddress_added_at`) VALUES
(1, 2, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Tenejero', 'Candaba', '', '', 'None', 0, '2024-06-14 07:02:02'),
(2, 5, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Musni', 'San Luis', '', '', 'Hatdog Shop', 0, '2024-06-14 07:12:55'),
(3, 5, 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'Tenejero', 'Candaba', '', '', 'Tapat ng SJSC', 0, '2024-06-14 07:14:10'),
(4, 5, 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'Talang', 'Candaba', '', '', 'Hatdog Shop', 0, '2024-06-14 07:22:54'),
(5, 5, 'Delivery Address Only', 'Not Saved', '1234', '2321', 'San Jose', 'San Luis', '', '', 'Hatdog Shop', 0, '2024-06-14 07:23:54'),
(6, 5, 'Kath\'s House', 'Saved', '12', 'Purok Uno', 'Dalayap', 'Candaba', '', '', 'Tapat ng SJSC', 0, '2024-06-14 07:25:19'),
(7, 5, 'Delivery Address Only', 'Not Saved', 'D', 'D', 'Talang', 'Candaba', NULL, NULL, 'D', 0, '2024-10-26 11:17:42'),
(8, 5, 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'San Jose', 'San Luis', NULL, NULL, 'Tapat ng SJSC', 0, '2024-10-31 07:22:04'),
(9, 6, 'Delivery Address Only', 'Not Saved', '12', 'Purok Uno', 'Talang', 'Candaba', NULL, NULL, 'Tapat ng SJSC', 0, '2024-10-31 09:40:32');

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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fb_id`);

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
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `failed_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_add_ons`
--
ALTER TABLE `order_add_ons`
  MODIFY `oadd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `oitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `uaddress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
