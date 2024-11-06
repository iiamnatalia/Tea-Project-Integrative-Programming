-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 05:37 PM
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
(61, 1, 'Logout', '2024-06-14 13:58:25'),
(62, 2, 'Successful Login', '2024-06-14 13:58:59'),
(63, 2, 'Reordered Order #1', '2024-06-14 13:59:16'),
(64, 2, 'Checked Out Order #7', '2024-06-14 14:01:57'),
(65, 1, 'Successful Login', '2024-06-14 14:03:00'),
(66, 2, 'Added Item to Cart', '2024-06-14 14:04:09'),
(67, 2, 'Edited Cart Item', '2024-06-14 14:04:36'),
(68, 2, 'Checked Out Order #8', '2024-06-14 14:04:59'),
(69, 2, 'Reordered Order #8', '2024-06-14 14:07:29'),
(70, 2, 'Added Item to Cart', '2024-06-14 14:07:49'),
(71, 2, 'Checked Out Order #9', '2024-06-14 14:08:58'),
(72, 1, 'Logout', '2024-06-14 14:55:47'),
(73, 1, 'Logout', '2024-06-14 14:57:39'),
(74, 6, 'Account Created', '2024-06-14 15:08:37'),
(75, 6, 'Account Verified', '2024-06-14 15:09:41'),
(76, 6, 'Successful Login', '2024-06-14 15:10:32'),
(77, 1, 'Logout', '2024-06-14 15:10:43'),
(78, 6, 'Successful Login', '2024-06-14 15:10:51'),
(79, 6, 'Login Verified Using Security Questions', '2024-06-14 15:11:18'),
(80, 6, 'Updated Profile Picture', '2024-06-14 15:11:37'),
(81, 6, 'Updated Last Name', '2024-06-14 15:11:51'),
(82, 6, 'Added Item to Cart', '2024-06-14 15:12:37'),
(83, 6, 'Checked Out Order #10', '2024-06-14 15:12:58'),
(84, 6, 'Submitted a Feedback for Order ID #10', '2024-06-14 15:14:12'),
(85, 6, 'Successfully Updated Password', '2024-06-14 15:16:32'),
(86, 1, 'Logout', '2024-06-14 15:16:46'),
(87, 6, 'Successful Login', '2024-06-14 15:17:10'),
(88, 1, 'Logout', '2024-06-14 15:17:13'),
(89, 2, 'Account Retrieved', '2024-06-14 15:18:15'),
(90, 2, 'Failed to Update Password', '2024-06-14 15:18:36'),
(91, 2, 'Account Locked', '2024-06-14 16:07:25'),
(92, 2, 'Account Locked', '2024-06-14 16:12:55'),
(93, 2, 'Account Locked', '2024-06-14 16:24:03'),
(94, 1, 'Successful Login', '2024-06-14 16:31:09'),
(95, 1, 'Logout', '2024-06-14 17:19:35'),
(96, 2, 'Successful Login', '2024-06-14 17:19:46'),
(97, 2, 'Reordered Order #9', '2024-06-14 17:19:52'),
(98, 2, 'Checked Out Order #11', '2024-06-14 17:23:03'),
(99, 2, 'Successful Login', '2024-06-14 18:08:48'),
(100, 2, 'Added Item to Cart', '2024-06-14 18:09:02'),
(101, 2, 'Submitted a Feedback for Order ID #11', '2024-06-14 18:09:19'),
(102, 2, 'Submitted a Feedback for Order ID #11', '2024-06-14 18:09:30'),
(103, 2, 'Submitted a Feedback for Order ID #11', '2024-06-14 18:09:36'),
(104, 2, 'Reordered Order #11', '2024-06-14 18:10:16'),
(105, 2, 'Checked Out Order #12', '2024-06-14 18:11:01'),
(106, 1, 'Logout', '2024-06-14 18:59:37'),
(107, 1, 'Successful Login', '2024-06-14 18:59:50'),
(108, 1, 'Downloaded Audit Trail Report', '2024-06-14 18:59:56'),
(109, 1, 'Downloaded Package Ranking Report', '2024-06-14 19:00:06'),
(110, 1, 'Downloaded Package Ranking Report', '2024-06-14 19:10:19'),
(111, 1, 'Downloaded Audit Trail Report', '2024-06-14 21:11:40'),
(112, 1, 'Logout', '2024-06-14 21:24:09'),
(113, 2, 'Successful Login', '2024-06-14 21:24:18'),
(114, 1, 'Logout', '2024-06-14 21:25:11'),
(115, 1, 'Successful Login', '2024-06-14 21:25:20'),
(116, 1, 'Logout', '2024-06-14 21:26:59'),
(117, 2, 'Successful Login', '2024-06-14 21:27:11'),
(118, 2, 'Reordered Order #8', '2024-06-14 21:27:23'),
(119, 2, 'Checked Out Order #13', '2024-06-14 21:27:56'),
(120, 2, 'Reordered Order #13', '2024-06-14 21:28:02'),
(121, 2, 'Checked Out Order #14', '2024-06-14 21:28:17'),
(122, 2, 'Reordered Order #14', '2024-06-14 21:28:29'),
(123, 2, 'Checked Out Order #15', '2024-06-14 21:28:44'),
(124, 2, 'Reordered Order #15', '2024-06-14 21:28:51'),
(125, 2, 'Edited Cart Item', '2024-06-14 21:28:58'),
(126, 2, 'Checked Out Order #16', '2024-06-14 21:29:15'),
(127, 2, 'Reordered Order #12', '2024-06-14 21:29:23'),
(128, 2, 'Checked Out Order #17', '2024-06-14 21:29:46'),
(129, 2, 'Reordered Order #17', '2024-06-14 21:29:51'),
(130, 2, 'Checked Out Order #18', '2024-06-14 21:30:14'),
(131, 1, 'Logout', '2024-06-14 21:30:20'),
(132, 1, 'Successful Login', '2024-06-14 21:30:31'),
(133, 1, 'Downloaded Audit Trail Report', '2024-06-14 21:40:18'),
(134, 1, 'Downloaded Geographical Sales Report', '2024-06-14 21:42:26'),
(135, 1, 'Downloaded Geographical Sales Report', '2024-06-14 21:42:46'),
(136, 1, 'Downloaded Geographical Sales Report', '2024-06-14 21:45:00'),
(137, 1, 'Downloaded Geographical Sales Report', '2024-06-14 21:46:10'),
(138, 1, 'Downloaded Geographical Sales Report', '2024-06-14 21:46:32'),
(139, 1, 'Downloaded Package Ranking Report', '2024-06-14 21:48:19'),
(140, 1, 'Logout', '2024-06-14 22:06:35'),
(141, 3, 'Successful Login', '2024-06-14 22:06:47'),
(142, 1, 'Logout', '2024-06-14 22:15:00'),
(143, 1, 'Successful Login', '2024-06-15 02:01:56'),
(144, 1, 'Downloaded Package Ranking Report', '2024-06-15 03:05:32'),
(145, 1, 'Downloaded Sales Report', '2024-06-15 03:07:36'),
(146, 1, 'Downloaded Sales Report', '2024-06-15 03:07:46'),
(147, 2, 'Successful Login', '2024-06-15 03:19:44'),
(148, 2, 'Added Item to Cart', '2024-06-15 03:21:26'),
(149, 2, 'Checked Out Order #31', '2024-06-15 03:21:40'),
(150, 2, 'Added Item to Cart', '2024-06-15 03:23:10'),
(151, 2, 'Checked Out Order #32', '2024-06-15 03:23:20'),
(152, 2, 'Reordered Order #18', '2024-06-15 03:24:59'),
(153, 2, 'Reordered Order #32', '2024-06-15 03:27:20'),
(154, 2, 'Edited Cart Item', '2024-06-15 03:27:28'),
(155, 2, 'Deleted an Item from Cart', '2024-06-15 03:27:32'),
(156, 2, 'Added Item to Cart', '2024-06-15 03:27:45'),
(157, 2, 'Checked Out Order #33', '2024-06-15 03:27:59'),
(158, 1, 'Logout', '2024-06-15 03:28:15'),
(159, 2, 'Account Retrieved', '2024-06-15 03:28:48'),
(160, 2, 'Successfully Updated Password', '2024-06-15 03:31:13'),
(161, 2, 'Successful Login', '2024-06-15 03:31:30'),
(162, 1, 'Logout', '2024-06-15 03:32:35'),
(163, 1, 'Successful Login', '2024-06-15 04:15:24'),
(164, 1, 'Logout', '2024-06-15 04:39:20'),
(165, 7, 'Account Created', '2024-06-15 04:45:44'),
(166, 7, 'Account Verified', '2024-06-15 04:46:35'),
(167, 1, 'Successful Login', '2024-06-15 04:47:32'),
(168, 1, 'Downloaded Sales Report', '2024-06-15 04:56:31'),
(169, 1, 'Downloaded Sales Report', '2024-06-15 04:56:41'),
(170, 1, 'Downloaded Sales Report', '2024-06-15 04:56:59'),
(171, 1, 'Downloaded Geographical Sales Report', '2024-06-15 04:57:10'),
(172, 1, 'Downloaded Package Ranking Report', '2024-06-15 04:57:15'),
(173, 1, 'Downloaded Audit Trail Report', '2024-06-15 04:57:21'),
(174, 1, 'Downloaded Sales Report', '2024-06-15 04:58:21'),
(175, 1, 'Downloaded Sales Report', '2024-06-15 04:58:33'),
(176, 1, 'Logout', '2024-06-15 05:25:39'),
(177, 1, 'Successful Login', '2024-06-15 05:25:54'),
(178, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:25:57'),
(179, 1, 'Downloaded Sales Report', '2024-06-15 05:26:03'),
(180, 1, 'Downloaded Geographical Sales Report', '2024-06-15 05:26:06'),
(181, 1, 'Downloaded Audit Trail Report', '2024-06-15 05:26:11'),
(182, 1, 'Logout', '2024-06-15 05:34:37'),
(183, 1, 'Successful Login', '2024-06-15 05:34:41'),
(184, 1, 'Logout', '2024-06-15 05:34:52'),
(185, 1, 'Successful Login', '2024-06-15 05:39:58'),
(186, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:40:03'),
(187, 1, 'Downloaded Sales Report', '2024-06-15 05:40:08'),
(188, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:40:24'),
(189, 2, 'Successful Login', '2024-06-15 05:47:08'),
(190, 1, 'Logout', '2024-06-15 05:47:12'),
(191, 1, 'Successful Login', '2024-06-15 05:47:25'),
(192, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:47:52'),
(193, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:49:04'),
(194, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:51:07'),
(195, 1, 'Downloaded Package Ranking Report', '2024-06-15 05:55:19'),
(196, 1, 'Logout', '2024-06-15 06:00:58'),
(197, 8, 'Account Created', '2024-06-15 06:30:04'),
(198, 8, 'Account Verified', '2024-06-15 06:31:26'),
(199, 8, 'Successful Login', '2024-06-15 06:32:35'),
(200, 8, 'Added Item to Cart', '2024-06-15 06:35:03'),
(201, 8, 'Edited Cart Item', '2024-06-15 06:35:18'),
(202, 8, 'Checked Out Order #34', '2024-06-15 06:37:35'),
(203, 1, 'Successful Login', '2024-06-15 06:38:20'),
(204, 8, 'Reordered Order #34', '2024-06-15 06:41:16'),
(205, 1, 'Downloaded Audit Trail Report', '2024-06-15 06:43:27'),
(206, 1, 'Successful Login', '2024-06-15 12:25:19'),
(207, 1, 'Logout', '2024-06-15 12:27:12'),
(208, 2, 'Account Locked', '2024-06-15 12:29:13'),
(209, 2, 'Account Locked', '2024-06-15 12:30:07'),
(210, 2, 'Account Locked', '2024-06-15 12:30:34'),
(211, 2, 'Account Locked', '2024-06-15 12:30:52'),
(212, 2, 'Account Disabled', '2024-06-15 12:31:08'),
(213, 1, 'Successful Login', '2024-06-15 12:32:11'),
(214, 1, 'Logout', '2024-06-15 12:32:40'),
(215, 2, 'Account Disabled', '2024-06-15 12:32:45'),
(216, 2, 'Account Retrieved', '2024-06-15 12:34:15'),
(217, 8, 'Successful Login', '2024-06-15 12:35:21'),
(218, 1, 'Logout', '2024-06-15 12:35:41'),
(219, 8, 'Successful Login', '2024-06-15 12:35:51'),
(220, 8, 'Login Verified Using Security Questions', '2024-06-15 12:37:54'),
(221, 8, 'Reordered Order #34', '2024-06-15 12:38:22'),
(222, 8, 'Checked Out Order #35', '2024-06-15 12:39:05'),
(223, 8, 'Reordered Order #35', '2024-06-15 12:39:56'),
(224, 8, 'Checked Out Order #36', '2024-06-15 12:40:03'),
(225, 1, 'Logout', '2024-06-15 12:41:46'),
(226, 9, 'Account Created', '2024-06-15 12:42:39'),
(227, 9, 'Account Verified', '2024-06-15 12:43:34'),
(228, 9, 'Successful Login', '2024-06-15 12:43:46'),
(229, 1, 'Logout', '2024-06-15 12:44:15'),
(230, 1, 'Successful Login', '2024-06-15 12:44:24'),
(231, 10, 'Account Created', '2024-06-16 07:24:17'),
(232, 2, 'Account Retrieved', '2024-06-16 07:27:29'),
(233, 1, 'Successful Login', '2024-06-21 09:37:58'),
(234, 1, 'Logout', '2024-06-21 09:49:47'),
(235, 11, 'Account Created', '2024-06-21 09:50:22'),
(236, 2, 'Account Retrieved', '2024-06-24 10:51:31'),
(237, 5, 'Successful Login', '2024-06-24 10:51:58'),
(238, 5, 'Login Verified Using OTP', '2024-06-24 10:52:22'),
(239, 5, 'Reordered Order #6', '2024-06-24 10:52:52'),
(240, 5, 'Checked Out Order #37', '2024-06-24 10:54:49'),
(241, 5, 'Reordered Order #37', '2024-06-24 10:55:04'),
(242, 5, 'Checked Out Order #38', '2024-06-24 10:55:09'),
(243, 6, 'Successful Login', '2024-06-25 14:56:35'),
(244, 1, 'Logout', '2024-06-25 14:56:43'),
(245, 12, 'Account Created', '2024-06-25 14:59:28'),
(246, 2, 'Account Retrieved', '2024-06-25 15:00:30'),
(247, 1, 'Successful Login', '2024-06-25 15:05:28'),
(248, 1, 'Logout', '2024-06-25 15:06:59'),
(249, 5, 'Successful Login', '2024-06-25 15:15:45'),
(250, 5, 'Login Verified Using OTP', '2024-06-25 15:16:03'),
(251, 1, 'Logout', '2024-06-25 15:18:38'),
(252, 3, 'Successful Login', '2024-06-25 15:18:52'),
(253, 1, 'Logout', '2024-06-25 15:22:38'),
(254, 5, 'Successful Login', '2024-06-25 15:22:54'),
(255, 5, 'Login Verified Using Security Questions', '2024-06-25 15:23:03'),
(256, 5, 'Added Item to Cart', '2024-06-25 15:25:04'),
(257, 5, 'Added Item to Cart', '2024-06-25 15:25:13'),
(258, 5, 'Added Item to Cart', '2024-06-25 15:25:20'),
(259, 5, 'Added Item to Cart', '2024-06-25 15:25:29'),
(260, 5, 'Checked Out Order #39', '2024-06-25 15:25:55'),
(261, 5, 'Reordered Order #39', '2024-06-25 15:26:15'),
(262, 5, 'Deleted an Item from Cart', '2024-06-25 15:26:17'),
(263, 5, 'Checked Out Order #40', '2024-06-25 15:26:32'),
(264, 5, 'Reordered Order #39', '2024-06-25 15:26:40'),
(265, 5, 'Checked Out Order #41', '2024-06-25 15:26:55'),
(266, 5, 'Reordered Order #41', '2024-06-25 15:27:02'),
(267, 5, 'Checked Out Order #42', '2024-06-25 15:27:18'),
(268, 1, 'Logout', '2024-06-25 15:27:27'),
(269, 2, 'Successful Login', '2024-06-25 15:27:45'),
(270, 2, 'Added Item to Cart', '2024-06-25 15:27:57'),
(271, 2, 'Checked Out Order #43', '2024-06-25 15:28:15'),
(272, 2, 'Reordered Order #43', '2024-06-25 15:28:20'),
(273, 2, 'Checked Out Order #44', '2024-06-25 15:28:34'),
(274, 2, 'Reordered Order #44', '2024-06-25 15:28:40'),
(275, 2, 'Edited Cart Item', '2024-06-25 15:28:43'),
(276, 2, 'Added Item to Cart', '2024-06-25 15:28:48'),
(277, 2, 'Checked Out Order #45', '2024-06-25 15:29:01'),
(278, 2, 'Reordered Order #45', '2024-06-25 15:29:06'),
(279, 2, 'Checked Out Order #46', '2024-06-25 15:29:19'),
(280, 2, 'Reordered Order #46', '2024-06-25 15:29:24'),
(281, 2, 'Checked Out Order #47', '2024-06-25 15:29:37'),
(282, 2, 'Reordered Order #47', '2024-06-25 15:29:43'),
(283, 2, 'Checked Out Order #48', '2024-06-25 15:29:57'),
(284, 1, 'Logout', '2024-06-25 15:30:03'),
(285, 1, 'Successful Login', '2024-06-25 15:30:12'),
(286, 1, 'Logout', '2024-06-25 15:34:21');

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
(39, 5, 'Delivered', 6, 21, 600.00, 30.00, 630.00, '2024-06-25 15:25:04', '2024-06-25 15:25:55', '2024-06-25 09:31:45', NULL, NULL),
(40, 5, 'Delivered', 5, 22, 465.00, 30.00, 495.00, '2024-06-25 15:26:15', '2024-06-25 15:26:32', '2024-06-25 09:31:40', NULL, NULL),
(41, 5, 'Refunded', 6, 23, 600.00, 30.00, 630.00, '2024-06-25 15:26:39', '2024-06-25 15:26:55', NULL, 'Malaks ulan', '2024-06-25 09:31:35'),
(42, 5, 'Delivered', 6, 24, 600.00, 30.00, 630.00, '2024-06-25 15:27:02', '2024-06-25 15:27:18', '2024-06-25 09:31:31', NULL, NULL),
(43, 2, 'Refunded', 1, 25, 145.00, 30.00, 175.00, '2024-06-25 15:27:57', '2024-06-25 15:28:15', NULL, 'Malakas po ulan', '2024-06-25 09:31:25'),
(44, 2, 'Delivered', 1, 26, 145.00, 30.00, 175.00, '2024-06-25 15:28:20', '2024-06-25 15:28:33', '2024-06-25 09:31:21', NULL, NULL),
(45, 2, 'Delivered', 2, 27, 160.00, 20.00, 180.00, '2024-06-25 15:28:40', '2024-06-25 15:29:01', '2024-06-25 09:31:08', NULL, NULL),
(46, 2, 'Delivered', 2, 28, 160.00, 20.00, 180.00, '2024-06-25 15:29:06', '2024-06-25 15:29:19', '2024-06-25 09:31:04', NULL, NULL),
(47, 2, 'Delivered', 2, 29, 160.00, 20.00, 180.00, '2024-06-25 15:29:24', '2024-06-25 15:29:36', '2024-06-25 09:30:59', NULL, NULL),
(48, 2, 'Delivered', 2, 30, 160.00, 20.00, 180.00, '2024-06-25 15:29:43', '2024-06-25 15:29:57', '2024-06-25 09:30:54', NULL, NULL);

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
(33, 55, 4, 1, 20.00, '2024-06-25 15:25:13'),
(34, 55, 7, 1, 20.00, '2024-06-25 15:25:13'),
(35, 55, 8, 1, 20.00, '2024-06-25 15:25:13'),
(36, 57, 4, 1, 20.00, '2024-06-25 15:25:29'),
(37, 57, 8, 1, 20.00, '2024-06-25 15:25:29'),
(38, 70, 3, 1, 20.00, '2024-06-25 15:27:57'),
(39, 70, 4, 1, 20.00, '2024-06-25 15:27:57'),
(40, 70, 8, 1, 20.00, '2024-06-25 15:27:57');

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
(54, 39, 12, 'Regular', '0', 1, 75.00, '2024-06-25 15:25:04', '2024-06-25 15:25:04'),
(55, 39, 13, 'Regular', '0', 1, 135.00, '2024-06-25 15:25:13', '2024-06-25 15:25:13'),
(56, 39, 17, 'Regular', '0', 3, 255.00, '2024-06-25 15:25:20', '2024-06-25 15:25:20'),
(57, 39, 18, 'Large', '0', 1, 135.00, '2024-06-25 15:25:29', '2024-06-25 15:25:29'),
(58, 40, 12, 'Regular', '0', 1, 75.00, '2024-06-25 15:26:15', '2024-06-25 15:26:15'),
(60, 40, 17, 'Regular', '0', 3, 255.00, '2024-06-25 15:26:15', '2024-06-25 15:26:15'),
(61, 40, 18, 'Large', '0', 1, 135.00, '2024-06-25 15:26:15', '2024-06-25 15:26:15'),
(62, 41, 12, 'Regular', '0', 1, 75.00, '2024-06-25 15:26:40', '2024-06-25 15:26:40'),
(63, 41, 13, 'Regular', '0', 1, 135.00, '2024-06-25 15:26:40', '2024-06-25 15:26:40'),
(64, 41, 17, 'Regular', '0', 3, 255.00, '2024-06-25 15:26:40', '2024-06-25 15:26:40'),
(65, 41, 18, 'Large', '0', 1, 135.00, '2024-06-25 15:26:40', '2024-06-25 15:26:40'),
(66, 42, 12, 'Regular', '0', 1, 75.00, '2024-06-25 15:27:02', '2024-06-25 15:27:02'),
(67, 42, 13, 'Regular', '0', 1, 135.00, '2024-06-25 15:27:02', '2024-06-25 15:27:02'),
(68, 42, 17, 'Regular', '0', 3, 255.00, '2024-06-25 15:27:02', '2024-06-25 15:27:02'),
(69, 42, 18, 'Large', '0', 1, 135.00, '2024-06-25 15:27:02', '2024-06-25 15:27:02'),
(70, 43, 21, 'Regular', '75', 1, 145.00, '2024-06-25 15:27:57', '2024-06-25 15:27:57'),
(71, 44, 21, 'Regular', '75', 1, 145.00, '2024-06-25 15:28:20', '2024-06-25 15:28:20'),
(72, 45, 21, 'Regular', '75', 1, 85.00, '2024-06-25 15:28:40', '2024-06-25 15:28:43'),
(73, 45, 13, 'Regular', '0', 1, 75.00, '2024-06-25 15:28:48', '2024-06-25 15:28:48'),
(74, 46, 21, 'Regular', '75', 1, 85.00, '2024-06-25 15:29:06', '2024-06-25 15:29:06'),
(75, 46, 13, 'Regular', '0', 1, 75.00, '2024-06-25 15:29:06', '2024-06-25 15:29:06'),
(76, 47, 21, 'Regular', '75', 1, 85.00, '2024-06-25 15:29:24', '2024-06-25 15:29:24'),
(77, 47, 13, 'Regular', '0', 1, 75.00, '2024-06-25 15:29:24', '2024-06-25 15:29:24'),
(78, 48, 21, 'Regular', '75', 1, 85.00, '2024-06-25 15:29:43', '2024-06-25 15:29:43'),
(79, 48, 13, 'Regular', '0', 1, 75.00, '2024-06-25 15:29:43', '2024-06-25 15:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_ref_num` varchar(30) DEFAULT NULL,
  `pay_amount` float(9,2) NOT NULL,
  `pay_change` float(9,2) NOT NULL DEFAULT 0.00,
  `pay_paid_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pay_status` varchar(30) DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `order_id`, `pay_mode`, `pay_ref_num`, `pay_amount`, `pay_change`, `pay_paid_at`, `pay_status`) VALUES
(51, 39, 'GCash', '6709281547', 630.00, 0.00, '2024-06-25 15:25:55', 'Paid'),
(52, 40, 'GCash', '5973969018', 495.00, 0.00, '2024-06-25 15:26:32', 'Paid'),
(53, 41, 'GCash', '8304876520', 0.00, 0.00, '2024-06-25 15:26:55', 'Refunded'),
(54, 42, 'Cash on Delivery', NULL, 630.00, 0.00, '2024-06-25 15:27:18', 'Paid'),
(55, 43, 'GCash', '0197432348', 0.00, 0.00, '2024-06-25 15:28:15', 'Refunded'),
(56, 44, 'Cash on Delivery', NULL, 175.00, 0.00, '2024-06-25 15:28:33', 'Paid'),
(57, 45, 'GCash', '8610200009', 180.00, 0.00, '2024-06-25 15:29:01', 'Paid'),
(58, 46, 'GCash', '8233999994', 180.00, 0.00, '2024-06-25 15:29:19', 'Paid'),
(59, 47, 'Cash on Delivery', NULL, 180.00, 0.00, '2024-06-25 15:29:36', 'Paid'),
(60, 48, 'Cash on Delivery', NULL, 180.00, 0.00, '2024-06-25 15:29:57', 'Paid');

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
(1, 'Coffee Jelly', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-15 06:46:20'),
(2, 'Crystals', 'Add-Ons', 20.00, 'assets/products/add-ons.png', 'Available', '2024-06-01 17:47:04', '2024-06-14 20:41:30'),
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
(29, 'Dark Choco', 'Smoothies Edition', 90.00, 'assets/products/dark_choco_se.png', 'Available', '2024-06-01 17:47:04', '2024-06-15 05:29:50'),
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
(1, 3, 'Tea', 'Project', 'teaprojesip@gmail.com', '$2y$10$tWrPHPaF2XpiEmOD0tDTd.3xGqP2qNhBR5Ps4SCzzl7W0GkJsOiQ6', '09655439799', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$vd7p2D3V1tSr3zxnEXs3Oe6Jwyz/65CYGnon4dsu5IjmxASYivgwK', 'What is your favorite food?', '$2y$10$EEyC10CDWBesK.VyUmEQ1.F5cvU9uLM1A.M/TMQleRlRYraBI.IA.', 'Verified', 'Enabled', 'Disabled', '2024-06-14 06:39:58', NULL, '2024-06-14 06:40:46', NULL, '2024-06-14 07:04:47'),
(2, 1, 'Natalia', 'Molito', 'nataliamolito120101@gmail.com', '$2y$10$C65XLgekcwfVZW0CVs8TsOQ0evhi054BP/r4/wGFObFtfFnm62cnW', '09655439798', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$SysKfBEBbFmZZD//3k3eXeP7Hai9E6KU7zolAHM2Lz3epK4PAXJx.', 'In what city were you born?', '$2y$10$cV74vJOMOmXwqcGDVB.lPOI0u0UiZdo5krBWK26YtUwhoJ9ToWed2', 'Verified', 'Enabled', 'Disabled', '2024-06-14 06:43:54', NULL, '2024-06-14 06:44:13', NULL, '2024-06-25 15:21:47'),
(3, 2, 'Blu', 'Gfx', 'blugfxdesign@gmail.com', '$2y$10$ezcrlcAdwD7Xsk0/1z57KORoZPgSyLRUV3iB2TRPoXlWmEjpeunu6', '09655439796', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$s4lNsKZMcGGqdRqCZ7fsj.aPvDNQXFxHz3xPkhy/IB3PE95vQ8EQ2', 'In what city were you born?', '$2y$10$OtwUFoPlMNlHNSWZqgOWPuWyGkyFtWWV0p6PD/463O5h7xWGhV9bm', 'Verified', 'Enabled', 'Disabled', '2024-06-14 06:46:56', NULL, '2024-06-14 06:47:12', NULL, '2024-06-14 07:04:51'),
(5, 1, 'Natalia Cute', 'Molito', 'natalia.styles.molito@gmail.com', '$2y$10$09xJQGk8mPLgTgpFbcU2GeI0F0MZKRSutAdxntFa2SNXq5U7bIJq.', '09655439744', 'assets/profile-pictures/_5_Natalia Cute Molito_profile_pic_2024-06-14 09-24-41.jpg', 'In what city were you born?', '$2y$10$6ourrEME4mdAWHvFDMHn5u8u.7G3k8lJuWw3BAuxnHPDmFBiCjLDG', 'What is the name of your first pet?', '$2y$10$RJ9OeZBdXaP/TlNSZmhVtO6KB9aoIS9syUofAfDESaSLyKuJYsscC', 'Verified', 'Enabled', 'Enabled', '2024-06-14 07:08:57', NULL, '2024-06-14 07:09:33', NULL, '2024-06-25 15:16:03'),
(6, 1, 'Madelleine', 'Evangelistaaaaa', 'leileihplto@gmail.com', '$2y$10$r3T5jvEC7M3cybVQA/h5Hu/LzZlLEcWpFLsqa4/cuavHUxg43SvLu', '09655439423', 'assets/profile-pictures/_6_Madelleine Evangelista_profile_pic_2024-06-14 17-11-37.jpg', 'In what city were you born?', '$2y$10$uCBR8vOrbcuKyEIvByRLI.ObNHYuplJZ.l32Cuq3U8ir2r87Ihbu6', 'What is your favorite food?', '$2y$10$82Ert8D5h2coQm/eLC6Be.fDBPn4DE6GKV9Q4Hh.UugMrfqdQrrce', 'Verified', 'Enabled', 'Disabled', '2024-06-14 15:08:37', NULL, '2024-06-14 15:09:41', NULL, '2024-06-14 15:16:42'),
(7, 1, 'Rochelle', 'Sagnip', 'rochelle.sagnip12@gmail.com', '$2y$10$OMi1hjZZO2Yg/qfU798TeuqAjrY9QUwQ03BGqJDAtaaMPUDuv9ewa', '09655439893', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$018dYBtkoXqZLfO8k7kjIO5g3iVMZmxtvLt.FGpFC8BdOQI2md3fy', 'What is the name of your first employer?', '$2y$10$0Oz/RU1IVQaLgPQj.PC0jOi01BD1Mc08gpuL59ihhWPVMxZ6Loliu', 'Verified', 'Enabled', 'Disabled', '2024-06-15 04:45:44', NULL, '2024-06-15 04:46:35', NULL, '2024-06-15 05:29:16'),
(8, 1, 'Frances', 'Legaspi', 'legaspileanne@gmail.com', '$2y$10$a75QTpkFKaxw7jB8bPrGFeXghGbVTZ9YXJMF6M1n8wme8qTgFRBbG', '09655433432', 'assets/profile-pictures/default.webp', 'In what city were you born?', '$2y$10$lT9tkNBs/38NWl86YWkkoOiH7uyBglRGMiar5emhT2AVY0WBUeeea', 'What is the name of your first pet?', '$2y$10$WqCA8U9Ar8g.R0iVXNMfA.c6jQJNZaQPF0rqIsmrBgXgalHMz/ks6', 'Verified', 'Enabled', 'Enabled', '2024-06-15 06:30:03', NULL, '2024-06-15 06:31:26', NULL, '2024-06-15 12:35:37'),
(9, 1, 'Mak', 'Moral', 'macmacpongs02@gmail.com', '$2y$10$4t5JKQgT80lC6jTTvoQw4O3DHOUlBDw4ggIVl5Oso7TO6BD5Q.aCu', '09655434343', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$7pe3QpzUGmb9fZBBqRnqBusvvXQVxduzbFDpdc/IzSGMz/vLKPQ.S', 'In what city were you born?', '$2y$10$AqX8U8kO2jCGpTYYa0.acedXOWGPYJUbbnA0xOMaSQK6Hb361yEOq', 'Verified', 'Enabled', 'Disabled', '2024-06-15 12:42:39', NULL, '2024-06-15 12:43:34', NULL, '2024-06-15 12:43:34'),
(10, 1, 'Tea', 'Project', 'blugfxdesign123@gmail.com', '$2y$10$Idi/VrRKWAFGhRiIl.XV8.qmlUZ1bW1KDBeMIGhvLvRsfOMvrDhzG', '09655439732', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$69hJB2fqFCiqav97WWEoWOoqNGHAm3e4qErrkPh7oLhsYpvJp85am', 'In what city were you born?', '$2y$10$pHsd2pV3OkAOnbn2nF2oaOo0zQhUCjSYhzMgHYm6SQPqCad.h0jae', 'Registered', 'Enabled', 'Disabled', '2024-06-16 07:24:17', '201366', NULL, NULL, '2024-06-16 07:25:06'),
(11, 1, 'Madelleine', 'Project', 'madmad@gmail.com', '$2y$10$mfaxa0SvOkE/EwyBJx1mZeUP1lWR.XIHfRKgU0Wvauac13BTNH8j6', '09655434424', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$LBpQOvwykp6YTG011rTZcOjwUfCSCgsqnbYpiVukuB0z0yxzQLsZS', 'In what city were you born?', '$2y$10$5LkcRYzNm4oCB1cnUoTBuOHz9J2TWJgicFXD5qvMD5ECKIfTuQB1e', 'Registered', 'Enabled', 'Disabled', '2024-06-21 09:50:22', '306850', NULL, NULL, '2024-06-21 09:50:42'),
(12, 1, 'Marcela', 'Tolentino', 'marcela@gmail.com', '$2y$10$ID9BjAIYxNSobzsIT/wVxuDI36n2dEHildYDWJCFVFZsrxm/kPcSG', '09655439799', 'assets/profile-pictures/default.webp', 'What is the name of your first pet?', '$2y$10$/txmzi1GUzZwWvjiW3PfJuto5R6vVqjMFaV3fB1PSsbaCIcJZGfke', 'In what city were you born?', '$2y$10$LOmqcILV2sQU.725RtZI4.Lnz3YHxqPuBJVDrEcdjENKcr26U50Yu', 'Registered', 'Enabled', 'Disabled', '2024-06-25 14:59:28', '281743', NULL, NULL, '2024-06-25 14:59:51');

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
(21, 5, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Tenejero', 'Candaba', NULL, NULL, 'Hatdog Shop', 0, '2024-06-25 15:25:55'),
(22, 5, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Dos', 'Talang', 'Candaba', NULL, NULL, 'Hatdog', 0, '2024-06-25 15:26:32'),
(23, 5, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Barit', 'Candaba', NULL, NULL, 'Hatdog Shop', 0, '2024-06-25 15:26:55'),
(24, 5, 'Delivery Address Only', 'Not Saved', '12', 'Purok Dos', 'Dalayap', 'Candaba', NULL, NULL, 'Tapat ng SJSC', 0, '2024-06-25 15:27:18'),
(25, 2, 'Delivery Address Only', 'Not Saved', '15', 'Purok Singko', 'Talang', 'Candaba', NULL, NULL, 'Hatdog Shop', 0, '2024-06-25 15:28:15'),
(26, 2, 'Delivery Address Only', 'Not Saved', '20', 'Purok Uno', 'Mangga', 'Candaba', NULL, NULL, 'Tapat ng SJSC', 0, '2024-06-25 15:28:33'),
(27, 2, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'San Jose', 'San Luis', NULL, NULL, 'Hatdog Shop', 0, '2024-06-25 15:29:01'),
(28, 2, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Uno', 'Musni', 'San Luis', NULL, NULL, 'Hatdog Shop', 0, '2024-06-25 15:29:19'),
(29, 2, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Dos', 'San Roque', 'San Luis', NULL, NULL, 'Tapat ng SJSC', 0, '2024-06-25 15:29:36'),
(30, 2, 'Delivery Address Only', 'Not Saved', '1234', 'Purok Dos', 'Sto. Nino', 'San Luis', NULL, NULL, 'None', 0, '2024-06-25 15:29:57');

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
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `failed_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_add_ons`
--
ALTER TABLE `order_add_ons`
  MODIFY `oadd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `oitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `uaddress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
