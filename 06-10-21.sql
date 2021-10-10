-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2021 at 12:52 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_kart`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_list`
--

CREATE TABLE `area_list` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_name` varchar(20) NOT NULL,
  `country_name` varchar(20) DEFAULT NULL,
  `city_name` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_list`
--

INSERT INTO `area_list` (`id`, `country_id`, `city_id`, `area_name`, `country_name`, `city_name`, `status`, `edited_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Mogbazar', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 02:02:01', '2021-09-07 02:42:54'),
(2, 2, 1, 'Dhanmondi', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 03:50:56', '2021-09-07 03:50:56'),
(3, 2, 1, 'Zigatola', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 03:51:42', '2021-09-07 03:51:42'),
(4, 2, 1, 'Mouchak', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 03:51:53', '2021-09-07 03:51:53'),
(6, 2, 1, 'Banani', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:09:14', '2021-09-07 04:09:14'),
(7, 2, 1, 'Kawran Bazar', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:10:01', '2021-09-07 04:10:01'),
(8, 2, 1, 'New Market', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:16:08', '2021-09-07 04:16:08'),
(9, 2, 1, 'Mirpur', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:16:21', '2021-09-07 04:16:21'),
(10, 2, 1, 'Mohammadpur', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:16:34', '2021-09-07 04:16:34'),
(11, 2, 1, 'Rampura', 'Bangladesh', 'Dhaka', 1, 'Sakib Hossain', '2021-09-07 04:16:57', '2021-09-11 05:38:27'),
(12, 2, 1, 'Motijhil', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:17:20', '2021-09-07 04:17:20'),
(13, 2, 1, 'Uttora', 'Bangladesh', 'Dhaka', 1, 'Admin', '2021-09-07 04:23:06', '2021-09-07 04:23:06'),
(14, 2, 2, 'New Market', 'Bangladesh', 'Chittagong', 1, 'Admin', '2021-09-07 04:38:52', '2021-09-07 04:38:52'),
(15, 2, 2, 'Chawkbazar', 'Bangladesh', 'Chittagong', 1, 'Admin', '2021-09-07 04:39:43', '2021-09-07 04:39:43'),
(16, 2, 2, 'Agrabad', 'Bangladesh', 'Chittagong', 1, 'Admin', '2021-09-07 04:40:07', '2021-09-07 04:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `image`, `url_slug`, `created_at`, `updated_at`) VALUES
(18, 'Fashion & Accessories', 1, 'category20092021_61483c3940885.jpeg', 'fashion-&-accessories', '2021-03-24 23:23:33', '2021-09-20 01:46:01'),
(19, 'Clothing', 1, 'category27032021_605f205819fed.jpeg', 'clothing', '2021-03-25 05:58:00', '2021-03-27 06:08:56'),
(20, 'Jewellery', 1, 'category28032021_606069db5329d.jpg', 'jewellery', '2021-03-28 05:34:51', '2021-03-28 05:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `country_name` varchar(20) DEFAULT NULL,
  `delivery_cost` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `edited_by` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`id`, `country_id`, `city_name`, `country_name`, `delivery_cost`, `status`, `edited_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dhaka', 'Bangladesh', 60, 1, 'Sakib Hossain', '2021-09-06 06:28:52', '2021-09-11 06:06:32'),
(2, 2, 'Chittagong', 'Bangladesh', 150, 1, 'Sakib Hossain', '2021-09-07 00:54:15', '2021-09-11 06:07:39'),
(3, 2, 'Syhlet', 'Bangladesh', NULL, 1, 'Admin', '2021-09-07 00:55:09', '2021-09-07 00:55:09'),
(7, 2, 'Faridpur', 'Bangladesh', 150, 1, 'Sakib Hossain', '2021-09-11 05:54:37', '2021-09-11 05:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `google_map` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_no_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_address` text COLLATE utf8_unicode_ci NOT NULL,
  `email_address_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_address_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_address_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `google_map`, `phone_no_1`, `phone_no_2`, `contact_address`, `email_address_1`, `email_address_2`, `fax_address_1`, `fax_address_2`, `status`, `created_at`, `updated_at`) VALUES
(2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.7089652240875!2d90.40198281536321!3d23.79337589304936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70e6cda9999%3A0x4fd2ccb95a8d52c3!2sBashati%20Horizon%2C%2013%20Rd%20No%2017%2C%20Dhaka%201213!5e0!3m2!1sen!2sbd!4v1620545909988!5m2!1sen!2sbd\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '+91 123 - 456 - 7890', '+86 163 - 451 - 7894', 'ABC Complex,Near xyz, New York  USA 123456', 'info@shopcart.com', 'info@shopcart.com', 'Support@Shopcart.com', 'info@shopcart.com', 1, '2021-05-09 00:34:30', '2021-05-09 01:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE `country_list` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) DEFAULT '1',
  `edited_by` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_list`
--

INSERT INTO `country_list` (`id`, `name`, `status`, `edited_by`, `created_at`, `updated_at`) VALUES
(2, 'Bangladesh', 1, 'Sakib Hossain', '2021-09-06 04:26:26', '2021-09-06 06:01:47'),
(4, 'Test', 1, 'Rakib Hossain', NULL, NULL),
(5, 'Update Country', 2, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `name`, `slide_title`, `slide_subtitle`, `slide_image`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Fashion Slide 1', 'All Jewellery', 'An exemplart gateway to happiness', 'slider28032021_606044c5c03d3.jpg', 1, '2021-03-28 02:36:12', '2021-03-28 02:57:04'),
(10, 'Fashion Slide 2', 'flat 30% off', '75th birthday sale', 'slider28032021_6060452d9ad8e.jpg', 1, '2021-03-28 02:58:21', '2021-03-28 03:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `images`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Al Islam', 'gallery08022021_6020dd12cc787.jpg', '2021-02-08 00:41:22', '2021-02-08 00:41:22', NULL),
(3, 'Bangladesh', 'gallery20092021_61483b37e111a.jpeg', '2021-09-20 01:41:43', '2021-09-20 01:41:43', NULL),
(4, 'Bangladesh', 'gallery20092021_61483b507f7b0.jpeg', '2021-09-20 01:42:08', '2021-09-20 01:42:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_cancel`
--

CREATE TABLE `order_cancel` (
  `id` int(11) NOT NULL,
  `order_master_no` int(11) NOT NULL,
  `order_note` text,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_master_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `regular_price` int(255) DEFAULT NULL,
  `discount_price` int(255) DEFAULT NULL,
  `product_subtotal` int(255) DEFAULT NULL,
  `product_image` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_master_no`, `product_id`, `product_name`, `product_qty`, `regular_price`, `discount_price`, `product_subtotal`, `product_image`, `status`, `created_at`, `updated_at`) VALUES
(27, 23, 32, 'Diamond Cut Blue Stone Necklace', 3, 2600, 30, 7800, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-13 02:45:06', '2021-09-13 02:45:06'),
(28, 23, 31, 'Stylish Gold Plated Locket', 2, 2200, NULL, 4400, 'prod_29032021_60616c518c837.jpg', 0, '2021-09-13 02:45:06', '2021-09-13 02:45:06'),
(29, 23, 29, 'Silver White Stone Neckles', 2, 2500, 30, 5000, 'prod_29032021_60616b8a22554.jpg', 0, '2021-09-13 02:45:06', '2021-09-13 02:45:06'),
(30, 24, 27, 'White Stone Silver Rings', 2, 1300, NULL, 2600, 'prod_29032021_606166f9d7d64.jpg', 0, '2021-09-13 02:52:06', '2021-09-13 02:52:06'),
(31, 25, 27, 'White Stone Silver Rings', 1, 1300, NULL, 1300, 'prod_29032021_606166f9d7d64.jpg', 0, '2021-09-13 02:53:18', '2021-09-13 02:53:18'),
(32, 26, 28, 'Fashionable Feathers Earings', 3, 1500, NULL, 4500, 'prod_29032021_6061677aca252.jpg', 0, '2021-09-13 05:37:58', '2021-09-13 05:37:58'),
(33, 26, 27, 'White Stone Silver Rings', 2, 1300, NULL, 2600, 'prod_29032021_606166f9d7d64.jpg', 0, '2021-09-13 05:37:58', '2021-09-13 05:37:58'),
(34, 26, 26, 'Fashionable Gold Pearl Earings', 2, 1300, NULL, 2600, 'prod_29032021_6061666dc028b.jpg', 0, '2021-09-13 05:37:58', '2021-09-13 05:37:58'),
(35, 26, 25, 'White and Blue Stone Rings', 1, 1100, NULL, 1100, 'prod_29032021_6061662158eaf.jpg', 0, '2021-09-13 05:37:58', '2021-09-13 05:37:58'),
(36, 27, 32, 'Diamond Cut Blue Stone Necklace', 1, 2600, 30, 2600, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-14 01:03:54', '2021-09-14 01:03:54'),
(43, 34, 26, 'Fashionable Gold Pearl Earings', 2, 1300, NULL, 2600, 'prod_29032021_6061666dc028b.jpg', 0, '2021-09-14 05:17:34', '2021-09-14 05:17:34'),
(44, 35, 32, 'Diamond Cut Blue Stone Necklace', 1, 2600, 30, 2600, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-14 22:49:11', '2021-09-14 22:49:11'),
(45, 36, 29, 'Silver White Stone Neckles', 2, 2500, 30, 5000, 'prod_29032021_60616b8a22554.jpg', 0, '2021-09-15 01:32:05', '2021-09-15 01:32:05'),
(46, 37, 27, 'White Stone Silver Rings', 1, 1300, NULL, 1300, 'prod_29032021_606166f9d7d64.jpg', 0, '2021-09-15 06:06:20', '2021-09-15 06:06:20'),
(47, 37, 25, 'White and Blue Stone Rings', 1, 1100, NULL, 1100, 'prod_29032021_6061662158eaf.jpg', 0, '2021-09-15 06:06:20', '2021-09-15 06:06:20'),
(48, 38, 28, 'Fashionable Feathers Earings', 1, 1500, NULL, 1500, 'prod_29032021_6061677aca252.jpg', 0, '2021-09-16 01:07:53', '2021-09-16 01:07:53'),
(49, 39, 28, 'Fashionable Feathers Earings', 1, 1500, NULL, 1500, 'prod_29032021_6061677aca252.jpg', 0, '2021-09-16 01:15:27', '2021-09-16 01:15:27'),
(50, 40, 32, 'Diamond Cut Blue Stone Necklace', 1, 2600, 15, 2600, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-19 03:36:15', '2021-09-19 03:36:15'),
(51, 40, 24, 'White and Rubi Stone Silver Ring', 2, 1400, 10, 2800, 'prod_17082021_611b4cb8132d1.jpg', 0, '2021-09-19 03:36:15', '2021-09-19 03:36:15'),
(52, 40, 26, 'Fashionable Gold Pearl Earings', 2, 1300, 5, 2600, 'prod_29032021_6061666dc028b.jpg', 0, '2021-09-19 03:36:15', '2021-09-19 03:36:15'),
(53, 40, 25, 'White and Blue Stone Rings', 2, 1100, NULL, 2200, 'prod_29032021_6061662158eaf.jpg', 0, '2021-09-19 03:36:15', '2021-09-19 03:36:15'),
(54, 41, 26, 'Fashionable Gold Pearl Earings', 2, 65, 5, 130, 'prod_29032021_6061666dc028b.jpg', 0, '2021-09-19 04:15:36', '2021-09-19 04:15:36'),
(55, 41, 32, 'Diamond Cut Blue Stone Necklace', 1, 390, 15, 390, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-19 04:15:36', '2021-09-19 04:15:36'),
(56, 41, 27, 'White Stone Silver Rings', 2, 1300, NULL, 2600, 'prod_29032021_606166f9d7d64.jpg', 0, '2021-09-19 04:15:36', '2021-09-19 04:15:36'),
(57, 42, 32, 'Diamond Cut Blue Stone Necklace', 2, 2210, 15, 4420, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-19 04:40:13', '2021-09-19 04:40:13'),
(58, 42, 27, 'White Stone Silver Rings', 2, 1300, NULL, 2600, 'prod_29032021_606166f9d7d64.jpg', 0, '2021-09-19 04:40:13', '2021-09-19 04:40:13'),
(59, 43, 28, 'Fashionable Feathers Earings', 1, 1500, NULL, 1500, 'prod_29032021_6061677aca252.jpg', 0, '2021-09-19 06:38:06', '2021-09-19 06:38:06'),
(60, 44, 30, 'White Stone Chain Neckles', 1, 2800, NULL, 2800, 'prod_31032021_606426e9e2877.jpg', 0, '2021-09-20 06:07:39', '2021-09-20 06:07:39'),
(61, 45, 29, 'Silver White Stone Neckles', 1, 2500, NULL, 2500, 'prod_29032021_60616b8a22554.jpg', 0, '2021-09-21 03:54:20', '2021-09-21 03:54:20'),
(62, 45, 28, 'Fashionable Feathers Earings', 1, 1500, NULL, 1500, 'prod_29032021_6061677aca252.jpg', 0, '2021-09-21 03:54:20', '2021-09-21 03:54:20'),
(63, 46, 32, 'Diamond Cut Blue Stone Necklace', 1, 2210, 15, 2210, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-21 05:41:11', '2021-09-21 05:41:11'),
(64, 47, 32, 'Diamond Cut Blue Stone Necklace', 1, 2210, 15, 2210, 'prod_01042021_606576fc51c2b.jpg', 0, '2021-09-21 05:46:40', '2021-09-21 05:46:40'),
(65, 47, 30, 'White Stone Chain Neckles', 1, 2800, NULL, 2800, 'prod_31032021_606426e9e2877.jpg', 0, '2021-09-21 05:46:40', '2021-09-21 05:46:40'),
(66, 47, 31, 'Stylish Gold Plated Locket', 1, 2200, NULL, 2200, 'prod_29032021_60616c518c837.jpg', 0, '2021-09-21 05:46:40', '2021-09-21 05:46:40'),
(67, 48, 24, 'White and Rubi Stone Silver Ring', 1, 1400, NULL, 1400, 'prod_17082021_611b4cb8132d1.jpg', 0, '2021-10-06 00:11:52', '2021-10-06 00:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_area` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8_unicode_ci,
  `product_subtotal` int(20) DEFAULT NULL,
  `order_sum` int(11) NOT NULL,
  `delivery_cost` int(20) DEFAULT NULL,
  `is_cancel` int(11) DEFAULT '0',
  `is_paid` int(11) DEFAULT '0',
  `is_cod` int(11) DEFAULT '0',
  `is_active` int(11) DEFAULT '0',
  `cancel_request` int(11) DEFAULT '0',
  `transection_id` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `order_id`, `customer_id`, `customer_name`, `customer_mobile`, `from_country`, `from_city`, `from_area`, `from_postcode`, `customer_address`, `product_subtotal`, `order_sum`, `delivery_cost`, `is_cancel`, `is_paid`, `is_cod`, `is_active`, `cancel_request`, `transection_id`, `created_at`, `updated_at`) VALUES
(23, 7503, 20, 'Hannan Ali', '01687192141', 'Bangladesh', 'Dhaka', 'Dhanmondi', '1202', 'Dhanmondi, 15/A, Stamford college, Dhaka.', 17200, 17260, 60, 0, 0, 1, NULL, 0, NULL, '2021-09-13 02:45:06', '2021-09-13 02:45:06'),
(24, 9317, 20, 'Hannan Ali', '01687192141', 'Bangladesh', 'Dhaka', 'Dhanmondi', '1202', 'Dhanmondi, 15/A, Stamford college, Dhaka.', 2600, 2660, 60, 0, 0, 1, 0, 0, NULL, '2021-09-13 02:52:06', '2021-09-13 02:52:06'),
(25, 5545, 20, 'Hannan Ali', '01687192141', 'Bangladesh', 'Chittagong', 'New Market', '1202', 'New Market, Hazir Goli, Chittagong', 1300, 1450, 150, 0, 0, 1, 1, 0, NULL, '2021-09-13 02:53:18', '2021-09-16 04:14:49'),
(26, 9193, 21, 'Joynal Abedin', '01727677799', 'Bangladesh', 'Dhaka', 'Mouchak', '1213', 'Anarkoli Super Market, Mouchak, Dhaka', 10800, 10860, 60, 0, 0, 1, 1, 0, NULL, '2021-09-13 05:37:58', '2021-09-15 06:16:03'),
(27, 1150, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 2600, 2660, 60, 1, 0, 1, 0, 0, NULL, '2021-09-14 01:03:54', '2021-09-15 02:31:39'),
(34, 4224, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 2600, 2660, 60, 0, 2, 0, 1, 0, 'xDFGDF5646541DGSD', '2021-09-14 05:17:34', '2021-09-15 04:20:48'),
(35, 9309, 12, 'Sifatullah Rahman', '01817116364', 'Bangladesh', 'Dhaka', 'Banani', '1211', '17/A, Bashati Horizon, Banani C/A, Dhaka.', 2600, 2660, 60, 0, 0, 1, 0, 0, NULL, '2021-09-14 22:49:11', '2021-09-14 22:49:11'),
(36, 4194, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 5000, 5060, 60, 1, 0, 1, 1, 0, NULL, '2021-09-15 01:32:05', '2021-09-16 04:14:36'),
(37, 5681, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 2400, 2460, 60, 1, 0, 1, 0, 0, NULL, '2021-09-15 06:06:20', '2021-09-16 04:15:00'),
(38, 7266, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 1500, 1560, 60, 0, 2, 0, 1, 0, 'dfkkgjfkgjdfasdfsd', '2021-09-16 01:07:53', '2021-09-19 05:44:49'),
(39, 589, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 1500, 1560, 60, 0, 0, 1, 0, 0, NULL, '2021-09-16 01:15:27', '2021-09-16 01:15:27'),
(40, 8590, 18, 'Ruhul Alamin', '01717637555', 'Bangladesh', 'Chittagong', 'New Market', '1201', 'Banani C/A', 10200, 10350, 150, 1, 0, 1, 0, 0, NULL, '2021-09-19 03:36:15', '2021-09-19 04:02:58'),
(41, 7560, 18, 'Ruhul Alamin', '01717637555', 'Bangladesh', 'Chittagong', 'New Market', '1201', 'Banani C/A', 3120, 3270, 150, 0, 0, 1, 1, 0, NULL, '2021-09-19 04:15:36', '2021-09-20 02:26:27'),
(42, 4155, 18, 'Ruhul Alamin', '01717637555', 'Bangladesh', 'Chittagong', 'New Market', '1201', 'Banani C/A', 7020, 7170, 150, 0, 0, 1, 1, 0, NULL, '2021-09-19 04:40:13', '2021-09-19 05:15:50'),
(43, 4707, 17, 'Mijba Uddin', '01717637547', 'Bangladesh', 'Dhaka', 'New Market', '7550', 'Millon Baby\'s Smart, Chandrima Market, New Market, Dhaka.', 1500, 1560, 60, 1, 0, 1, 1, 0, NULL, '2021-09-19 06:38:06', '2021-09-20 02:26:56'),
(44, 905, 12, 'Sifatullah Rahman', '01817116364', 'Bangladesh', 'Dhaka', 'Banani', '1211', '17/A, Bashati Horizon, Banani C/A, Dhaka.', 2800, 2860, 60, 0, 0, 1, 1, 0, NULL, '2021-09-20 06:07:39', '2021-09-20 06:08:53'),
(45, 201, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 4000, 4060, 60, 0, 0, 1, 0, 0, NULL, '2021-09-21 03:54:20', '2021-09-21 03:54:20'),
(46, 5148, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 2210, 2270, 60, 0, 0, 1, 0, 0, NULL, '2021-09-21 05:41:11', '2021-09-21 05:41:11'),
(47, 4449, 12, 'Sifatullah Rahman', '01817116364', 'Bangladesh', 'Dhaka', 'Banani', '1211', '17/A, Bashati Horizon, Banani C/A, Dhaka.', 7210, 7270, 60, 0, 0, 1, 0, 0, NULL, '2021-09-21 05:46:40', '2021-09-21 05:46:40'),
(48, 6672, 1, 'Sakib Hossain', '01717637555', 'Bangladesh', 'Dhaka', 'Banani', '1204', 'Banani C/A, Road-17, Bashati Harizon. Dhaka', 1400, 1460, 60, 1, 0, 1, 0, 0, NULL, '2021-10-06 00:11:52', '2021-10-06 01:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@admin.com', '$2y$10$2yQYSamtb7RTqBYlVcBvGO5Ar65N9Npq8etpOJQL/1mg5b/iAMYjC', '2021-04-06 05:53:58'),
('test@admin.com', '$2y$10$/wwqqvUepECKIDoOTF3lhuiXKruQhBOzACP0qYIrzJDEdcvNeXtCe', '2021-04-06 05:53:58'),
('sifat@gmail.com', '$2y$10$sh6D/MRwJM1xYOaKYsFb6e6cN.0p7sv6foukCuxRL/tqSPud6v3pq', '2021-09-20 06:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_categories` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `discount_value` float DEFAULT NULL,
  `discount_start` date DEFAULT NULL,
  `discount_end` date DEFAULT NULL,
  `discount_status` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_feature` int(11) DEFAULT NULL,
  `best_sell` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `url_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `categories`, `sub_categories`, `color_id`, `size_id`, `summary`, `description`, `price`, `discount_value`, `discount_start`, `discount_end`, `discount_status`, `status`, `is_feature`, `best_sell`, `meta_title`, `meta_description`, `url_slug`, `view_count`, `created_at`, `updated_at`) VALUES
(24, 'White and Rubi Stone Silver Ring', 'WR021', '20', 9, 4, 3, 'Fashionable White and ruby stone for women rings.', '<p>Fashionable White and rubi stone for women rings.</p>', 1400, 15, '2021-10-05', '2021-10-05', 1, 1, 1, NULL, 'White and Rubi Stone Silver Ring', 'White and Rubi Stone Silver Ring', 'white-and-rubi-stone-silver-ring', 2, '2021-03-28 23:21:55', '2021-10-05 23:42:37'),
(25, 'White and Blue Stone Rings', 'WB021', '20', 9, 5, 1, 'Fashionable White and bluestone rings for women', '<p>Fashionable White and bluestone rings for women</p>', 1100, NULL, NULL, NULL, NULL, 1, 1, 1, 'White and Blue Stone Rings', 'White and Blue Stone Rings', 'white-and-blue-stone-rings', 3, '2021-03-28 23:31:13', '2021-08-14 07:29:12'),
(26, 'Fashionable Gold Pearl Earings', 'GP021', '20', 10, 6, 1, 'Fashionable gold pearl earrings for women', '<p>Fashionable gold pearl earings for women</p>', 1300, NULL, NULL, NULL, NULL, 1, 1, 1, 'Fashionable gold pearl earings for women', 'Fashionable gold pearl earings for women', 'fashionable-gold-pearl-earings', 5, '2021-03-28 23:32:29', '2021-10-05 23:12:08'),
(27, 'White Stone Silver Rings', 'WSR03', '20', 9, 3, 1, 'White stone silver rings for women', '<p>Fashionable gold pearl earings for women</p>', 1300, NULL, NULL, NULL, NULL, 1, 1, 1, 'Fashionable gold pearl earings for women', 'Fashionable gold pearl earings for women', 'white-stone-silver-rings', 9, '2021-03-28 23:34:49', '2021-09-19 02:14:20'),
(28, 'Fashionable Feathers Earings', 'FE021', '20', 10, 3, 1, 'Fashionable feather earings for men ঈদ উপলক্ষে', '<p>Fashionable feather earings for men ঈদ উপলক্ষে</p>', 1500, NULL, NULL, NULL, NULL, 1, 1, 1, 'Fashionable feather earings for men ঈদ উপলক্ষে', 'Fashionable feather earings for men ঈদ উপলক্ষে', 'fashionable-feathers-earings', 3, '2021-03-28 23:36:58', '2021-08-14 07:32:11'),
(29, 'Silver White Stone Neckles', 'NS021', '20', 11, 3, 3, 'Round Shape Fashionable Silver Neckles for Women', '<p>Round Shape Fashionable Silver Neckles for Women</p>', 2500, NULL, NULL, NULL, NULL, 1, 1, 1, 'Round Shape Fashionable Silver Neckles for Women', 'Round Shape Fashionable Silver Neckles for Women', 'silver-white-stone-neckles', 14, '2021-03-28 23:54:18', '2021-09-19 02:07:52'),
(30, 'White Stone Chain Neckles', 'CN01', '20', 11, 3, 2, 'White stone fashionable chain necklace for women', '<p>White stone fashionable chain necklace for women</p>', 2800, NULL, NULL, NULL, NULL, 1, 1, 1, 'White stone fashionable chain necklace for women', 'White stone fashionable chain necklace for women', 'white-stone-chain-neckles', 21, '2021-03-28 23:56:15', '2021-09-21 05:45:42'),
(31, 'Stylish Gold Plated Locket', 'LGP01', '20', 11, 6, 3, 'Fashionable gold plated with white stone necklace for women', '<p>Fashionable gold plated with white stone necklace for women</p>', 2200, NULL, NULL, NULL, NULL, 1, 1, 1, 'Fashionable gold plated with white stone necklace for women', 'Fashionable gold plated with white stone necklace for women', 'stylish-gold-plated-locket', 18, '2021-03-28 23:57:37', '2021-09-21 05:45:47'),
(32, 'Diamond Cut Blue Stone Necklace', 'DNB01', '20', 11, 5, 3, 'Fashionable diamond cut blue stone necklace for women', '<p>Fashionable diamond cut blue stone necklace for women</p>', 2600, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Fashionable diamond cut blue stone necklace for women', 'Fashionable diamond cut blue stone necklace for women', 'diamond-cut-blue-stone-necklace', 26, '2021-03-31 04:39:36', '2021-10-05 23:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_code` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `name`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(3, 'White', '#FFF', 1, '2021-08-14 00:46:47', '2021-08-14 00:46:47'),
(4, 'Ruby', '#E0115F', 1, '2021-08-14 06:37:15', '2021-08-14 06:37:15'),
(5, 'Blue', '#0066ff', 1, '2021-08-14 07:25:22', '2021-08-14 07:25:22'),
(6, 'Golden', '#edbe12', 1, '2021-08-14 07:31:00', '2021-08-14 07:31:00'),
(8, 'jhfgh', 'hfgh', 1, '2021-09-20 01:45:10', '2021-09-20 01:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(100) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relative_path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`, `relative_path`, `created_at`, `updated_at`) VALUES
(29, 'prod_29032021_6061662158eaf.jpg', '25', '/images/product/', '2021-03-28 23:31:13', '2021-03-28 23:31:13'),
(30, 'prod_29032021_6061666dc028b.jpg', '26', '/images/product/', '2021-03-28 23:32:29', '2021-03-28 23:32:29'),
(31, 'prod_29032021_606166f9d7d64.jpg', '27', '/images/product/', '2021-03-28 23:34:49', '2021-03-28 23:34:49'),
(32, 'prod_29032021_6061677aca252.jpg', '28', '/images/product/', '2021-03-28 23:36:58', '2021-03-28 23:36:58'),
(33, 'prod_29032021_60616b8a22554.jpg', '29', '/images/product/', '2021-03-28 23:54:18', '2021-03-28 23:54:18'),
(35, 'prod_29032021_60616c518c837.jpg', '31', '/images/product/', '2021-03-28 23:57:37', '2021-03-28 23:57:37'),
(39, 'prod_31032021_606426e9e2877.jpg', '30', '/images/product/', '2021-03-31 01:38:17', '2021-03-31 01:38:17'),
(46, 'prod_01042021_606576fc51c2b.jpg', '32', '/images/product/', '2021-04-01 01:32:12', '2021-04-01 01:32:12'),
(52, 'prod_17082021_611b4cb8132d1.jpg', '24', '/images/product/', '2021-08-16 23:44:24', '2021-08-16 23:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `review_details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `user_id`, `product_id`, `review_title`, `review_details`, `created_at`, `updated_at`) VALUES
(2, 1, 30, 'Very Good Product', 'আলহামদুলিল্লাহ ভালো পণ্য ● ● ●\r\n10 টাকায় কিনেছি ~ ~ ~\r\nআশা করি ভবিষ্যতে আরো কম দামে পাব ♧ ♧ ♧\r\nছবির সাথে মিল ছিল ☆ ☆ ☆\r\n6 দিনে ডেলিভারি পেয়েছি ~ ~ ~\r\nডেলিভারি আরো ফাস্ট করা উচিত ।\r\nপ্যাকেজিং কোনরকম ছিল ¤ ¤ ¤\r\nপ্যাকেজিং আরও ভালো করা উচিত ।\r\nমেয়াদ ঠিকঠাক আছে ● ● ●\r\nনতুন পণ্য দেয়া হয়েছে ■ ■ ■\r\nসবকিছুর জন্য ধন্যবাদ ।', '2021-05-19 03:35:47', '2021-05-19 03:35:47'),
(4, 13, 32, 'Very Good Product', 'Thank you for giving such a nice product!!!', '2021-05-19 04:25:49', '2021-05-19 04:25:49'),
(5, 13, 31, 'Quality full product', 'Very nice and gorgeous Necklace!!! Thank you for giving me with nice packaging', '2021-05-19 05:46:36', '2021-05-19 05:46:36'),
(6, 12, 30, 'Top quality product!!!', 'Very quality full and shiny product', '2021-05-19 05:48:08', '2021-05-19 05:48:08'),
(7, 15, 32, 'Nice Product', 'Thank you for giving nice product!!', '2021-09-05 06:01:43', '2021-09-05 06:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Small', 'S', 1, '2021-08-12 12:31:48', '2021-08-12 12:31:48'),
(2, 'Large', 'L', 1, '2021-08-13 23:45:09', '2021-08-13 23:45:09'),
(3, 'Medium', 'M', 1, '2021-08-13 23:45:24', '2021-08-13 23:45:24'),
(5, 'Extra Large', 'XL', 1, '2021-08-13 23:49:20', '2021-08-13 23:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `registration_verify`
--

CREATE TABLE `registration_verify` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `register_token` varchar(200) NOT NULL,
  `is_token_active` int(11) NOT NULL,
  `token_expires_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_verify`
--

INSERT INTO `registration_verify` (`id`, `email`, `register_token`, `is_token_active`, `token_expires_at`) VALUES
(1, 'testing1@gmail.com', '6VAZE5vOAHrnOfTxMvrZn4LKayLXQcGyQuJMnjsP7Jj5JwbcS7r9A6hSwSK0', 1, '2021-10-06 05:57:10'),
(2, 'testin2@gmail.com', '4pEBmrvyszX0Dzeps5gtsQXPZtUkezorh3Lsle0EIM5EpI9RCqQqlst5RJzn', 1, '2021-10-06 06:10:48'),
(5, 'body83292@gmail.com', 'aYays8FD18yDZHyDV7d1Dwlg3sBr9xZMxw00oBN4H5bKtykt7WanAqffmJBW', 1, '2021-10-06 06:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-03-25 10:05:07', '2021-03-25 10:05:07'),
(2, 'user', '2021-03-25 10:05:07', '2021-03-25 10:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '2021-05-03 04:23:30'),
(4, 2, 12, '2021-05-03 04:01:28', '2021-05-03 13:19:24'),
(5, 2, 15, '2021-05-06 04:41:47', '2021-05-06 04:41:47'),
(6, 1, 16, '2021-06-26 03:07:52', '2021-06-26 03:07:52'),
(7, 2, 17, '2021-08-17 01:36:27', '2021-08-17 01:36:27'),
(8, 2, 18, '2021-08-27 23:19:39', '2021-08-27 23:19:39'),
(9, 2, 19, '2021-09-04 04:30:25', '2021-09-04 04:30:25'),
(10, 2, 20, '2021-09-12 23:11:11', '2021-09-12 23:11:11'),
(11, 2, 21, '2021-09-13 05:36:51', '2021-09-13 05:36:51'),
(13, 2, 23, '2021-10-06 05:40:45', '2021-10-06 05:40:45'),
(14, 2, 24, '2021-10-06 05:42:10', '2021-10-06 05:42:10'),
(15, 2, 25, '2021-10-06 05:55:48', '2021-10-06 05:55:48'),
(16, 2, 26, '2021-10-06 06:29:37', '2021-10-06 06:29:37'),
(17, 2, 27, '2021-10-06 06:32:12', '2021-10-06 06:32:12'),
(18, 2, 28, '2021-10-06 06:40:06', '2021-10-06 06:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `categories_id`, `status`, `images`, `url_slug`, `created_at`, `updated_at`) VALUES
(3, 'Shoes', 18, 1, 'subcategory25032021_605c6b08da5a7.jpeg', 'shoes', '2021-03-25 04:50:48', '2021-03-25 04:50:48'),
(4, 'Watches', 18, 1, 'subcategory25032021_605c79c48ea1f.jpg', 'watches', '2021-03-25 05:53:40', '2021-03-25 05:53:40'),
(5, 'Belts', 18, 1, 'subcategory25032021_605c7a424c081.jpg', 'belts', '2021-03-25 05:55:46', '2021-03-25 05:55:46'),
(8, 'Polo T-shirts', 19, 1, 'subcategory27032021_605f0410b41e6.jpg', 'polo-t-shirts', '2021-03-27 04:08:16', '2021-03-27 04:08:16'),
(9, 'Rings', 20, 1, 'subcategory28032021_606069f11c1a9.jpg', 'rings', '2021-03-28 05:35:13', '2021-03-28 05:35:13'),
(10, 'Earings', 20, 1, 'subcategory28032021_60606ada9b728.jpg', 'earings', '2021-03-28 05:39:06', '2021-03-28 05:39:06'),
(11, 'Neckles', 20, 1, 'subcategory29032021_60616b4394460.jpg', 'neckles', '2021-03-28 23:53:07', '2021-03-28 23:53:07'),
(12, 'Bengales', 20, 1, 'subcategory31032021_60645efe1ddea.jpg', 'bengales', '2021-03-31 05:37:34', '2021-03-31 05:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_token_active` int(11) DEFAULT NULL,
  `token_expires_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` int(11) DEFAULT '0',
  `user_status` int(11) DEFAULT '0',
  `user_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `password_token`, `is_token_active`, `token_expires_at`, `remember_token`, `user_type`, `user_status`, `user_image`, `created_at`, `updated_at`) VALUES
(1, 'Sakib Hossain', 'sakib129@gmail.com', NULL, '$2y$10$aqtsiRxJYw.ony0oYoKgKOdDwDhdE8jeS/NcM0j93bzV/mnuSyoyS', 'QZKhsNpp3V9sDQuoHVKLfKZWunUoNlgxO39yjK8BuKg9sLdhSZ9ksS2G9al4', 1, '2021-10-04 02:44:57', 'wN7FluXoQDgQE2sH8WwIecu3w3aZzn4kJj92UTACRcMlyBD7j5F73hBum9BS', 1, 1, 'users29042021_608a4d0090fec.png', '2021-02-04 02:48:56', '2021-10-04 02:29:57'),
(12, 'Sifat Rahman', 'sifat@gmail.com', NULL, '$2y$10$iPvlPNhvO132ncJTcojS6uN.813KurtT9LY.6IjmYgh.r2LQDhLVK', 'n4UYLi32H9SdZmYDbGoO922AoUe5iwwkZsZe0Y0yG74xUhLWMl52vgrSK6Gi', 1, '2021-09-21 02:36:48', NULL, 0, 1, 'users03052021_608fc9f87f930.jpg', '2021-05-03 04:01:28', '2021-09-21 02:21:48'),
(13, 'Ziaur Rahman', 'zia@gmail.com', NULL, '$2y$10$jY3f8.CazP9R64KrAd1NLOQSVYN2IkamaCLrz3TBJE5aARHZ9YPP.', NULL, NULL, NULL, NULL, 0, 1, NULL, '2021-05-05 23:17:01', '2021-05-05 23:17:01'),
(15, 'Test', 'test@gmail.com', NULL, '$2y$10$C4kp0thxs9iX50yN7383kuQTlHefLFg2RAxWJbEeYC6PlyLx4sHkC', NULL, NULL, NULL, NULL, 0, 0, NULL, '2021-05-06 04:41:47', '2021-09-19 06:10:37'),
(16, 'Admin', 'admin@admin.com', NULL, '$2y$10$cvoWSX0zL1RlkpL2Y4bFduSX0FnbxPO9NimbLnXblYbbpwYuM3DHu', NULL, NULL, NULL, NULL, 0, 1, NULL, '2021-06-26 03:07:52', '2021-06-26 03:07:52'),
(17, 'Mijba Uddin', 'mijba13@gmail.com', NULL, '$2y$10$kt8rtir6OsGsRNiRm/SzwuemoMbt0jPA5Ce0N0RzOQGqncNYXnb5y', NULL, NULL, NULL, NULL, 0, 1, NULL, '2021-08-17 01:36:27', '2021-08-17 01:36:27'),
(18, 'Hannan Ali', 'hannan@gmail.com', NULL, '$2y$10$xF6bIxmThR3/6orYtRdXwOuEiK2REBhyNeEU2V/ZF3keO2cL07WCe', 'ZWV65IzU1RlBfiIT5x9AanC9CYN7fYeftDLXbFZRxlwkuoTQMDZn3Z1O9gav', 1, '2021-09-21 03:38:43', NULL, 0, 1, NULL, '2021-08-27 23:19:39', '2021-09-21 03:23:43'),
(19, 'Rahul', 'rahul@gmail.com', NULL, '$2y$10$b9oTS4noAYl85LH.0jpev.PFNPpSF1UMeDJexqvXAo8aAXo0Jq3Mi', NULL, NULL, NULL, NULL, 0, 1, NULL, '2021-09-04 04:30:25', '2021-09-04 04:30:25'),
(20, 'Testing', 'testing@gmail.com', NULL, '$2y$10$OzhYr3eAlktP4T.WpPSeZuxvxZiy2iM2YkCYK6If8R6l5Yh78WmnK', NULL, NULL, NULL, NULL, 0, 1, NULL, '2021-09-12 23:11:11', '2021-09-12 23:11:11'),
(21, 'Joynal Abedin', 'joynal@gmail.com', NULL, '$2y$10$B4iFdXr5hEo95s69TUrmxO/pGWv/LRM/rz/eno0xN1QrsBqxo/T5q', NULL, NULL, NULL, NULL, 0, 1, NULL, '2021-09-13 05:36:51', '2021-09-13 05:36:51'),
(24, 'Testing', 'testing1@gmail.com', NULL, '$2y$10$6DHmlDsQNWVGlSTiC86vt.ycoaRWRAXi2aYZ./bxM.lCtGGx1Uxyq', NULL, NULL, NULL, NULL, 0, 0, NULL, '2021-10-06 05:42:10', '2021-10-06 05:42:10'),
(25, 'Testing 2', 'testin2@gmail.com', NULL, '$2y$10$KbgXUFXH3WTfUWKWBaeOe.lIaQ.agUeX6z9LLgwVdSniz9PmHlGsy', NULL, NULL, NULL, NULL, 0, 0, NULL, '2021-10-06 05:55:48', '2021-10-06 05:55:48'),
(28, 'Developer Account', 'body83292@gmail.com', NULL, '$2y$10$Th0jRgTkias4Ktb6JA7hceu/j2mOk5vS2CuMYpl11pI7WLy1Qefjm', NULL, NULL, NULL, NULL, 0, 0, NULL, '2021-10-06 06:40:06', '2021-10-06 06:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `billing_address` int(11) DEFAULT NULL,
  `shipping_address` int(11) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `post_code` int(11) DEFAULT NULL,
  `address` text,
  `phone_no` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `first_name`, `last_name`, `user_id`, `billing_address`, `shipping_address`, `area`, `country`, `city`, `country_id`, `city_id`, `area_id`, `post_code`, `address`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 12, 1, NULL, NULL, 'Bangladesh', 'Dhaka', NULL, NULL, NULL, 1203, 'Dhanmondi, Dhaka.', '01717637555', '2021-05-03 20:36:26', '2021-05-05 03:46:47'),
(2, 'Sifatullah', 'Rahman', 12, 0, 1, 'Banani', 'Bangladesh', 'Dhaka', 2, 1, 6, 1211, '17/A, Bashati Horizon, Banani C/A, Dhaka.', '01817116364', '2021-03-25 10:05:07', '2021-09-14 22:49:01'),
(19, NULL, NULL, 13, NULL, 1, NULL, 'Bangladesh', 'Nokhali', NULL, NULL, NULL, 7550, 'Sonamuri', '01919631254', '2021-05-06 00:23:29', '2021-05-06 00:25:46'),
(20, NULL, NULL, 13, 1, NULL, NULL, 'Bangladesh', 'Dhaka', NULL, NULL, NULL, 1213, 'Bashati Horizon, House No- 21, 10/A, Road-17, Banani C/A', '01717637555', '2021-05-06 00:23:56', '2021-05-06 00:28:57'),
(21, NULL, NULL, 15, NULL, 1, NULL, 'Bangladesh', 'Dhaka', NULL, NULL, NULL, 7550, 'test', '01717637555', '2021-05-17 23:58:52', '2021-05-17 23:59:13'),
(22, NULL, NULL, 15, 1, NULL, NULL, 'Bangladesh', 'Dhaka', NULL, NULL, NULL, 7550, '24/A', '01717637555', '2021-05-17 23:59:24', '2021-05-17 23:59:24'),
(23, 'Sakib', 'Hossain', 1, 0, 1, 'Banani', 'Bangladesh', 'Dhaka', 2, 1, 6, 1204, 'Banani C/A, Road-17, Bashati Harizon. Dhaka', '01717637555', '2021-06-08 06:17:09', '2021-09-11 06:58:08'),
(24, 'Mijba', 'Uddin', 17, 0, 1, 'New Market', 'Bangladesh', 'Dhaka', 2, 1, 8, 7550, 'Millon Baby\'s Smart, Chandrima Market, New Market, Dhaka.', '01717637547', '2021-08-17 02:42:49', '2021-09-19 06:38:00'),
(28, 'Sakib', 'Hossain', 18, 1, NULL, 'Mogbazar', 'Bangladesh', 'Dhaka', 2, 1, 1, 1203, 'Dhanmondi 15/A, IBN Sina.', '01446587564', '2021-09-08 05:39:03', '2021-09-08 05:39:03'),
(36, 'Ruhul', 'Alamin', 18, 0, 1, 'New Market', 'Bangladesh', 'Chittagong', 2, 2, 14, 1201, 'Banani C/A', '01717637555', '2021-09-11 01:54:00', '2021-09-11 02:14:38'),
(39, 'Hannan', 'Ali', 20, 0, 1, 'New Market', 'Bangladesh', 'Chittagong', 2, 2, 14, 1202, 'New Market, Hazir Goli, Chittagong', '01687192141', '2021-09-12 23:55:47', '2021-09-13 02:53:07'),
(40, 'Joynal', 'Abedin', 21, 0, 1, 'Mouchak', 'Bangladesh', 'Dhaka', 2, 1, 4, 1213, 'Anarkoli Super Market, Mouchak, Dhaka', '01727677799', '2021-09-13 05:37:42', '2021-09-13 05:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `web_cart`
--

CREATE TABLE `web_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` int(255) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_list`
--
ALTER TABLE `area_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cancel`
--
ALTER TABLE `order_cancel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_verify`
--
ALTER TABLE `registration_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_cart`
--
ALTER TABLE `web_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_list`
--
ALTER TABLE `area_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `city_list`
--
ALTER TABLE `city_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_cancel`
--
ALTER TABLE `order_cancel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration_verify`
--
ALTER TABLE `registration_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `web_cart`
--
ALTER TABLE `web_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
