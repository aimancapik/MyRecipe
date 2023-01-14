-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 03:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maajundatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_desc`) VALUES
(1, 'Warisan Nenda Empire is a company that was founded by Amir Firdaus and Tengku Massheilawati in the year of 2018. The main product sold by this company is Maajun Nenda which is a food supplement that can improve the health of the body. The name Maajun Nenda was inherited by one of the midwife palace family and the name has been used for more than 100 years. Nowadays, most of the products from other companies was made using high technology machines, but Maajun Nenda Empire proudly retains its tradition which produces its product by using handmade process. That’s the most interesting part of the products.\r\nAdvanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every product tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_address`, `admin_job`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin123', 'user-profile-min.png', '0123456789', 'No. 14, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'Manager'),
(2, 'Muhammad Zairi Yasar Bin Diri', 'zairi@gmail.com', 'zairi123', 'user-profile-min.png', '01163887426', 'No. 16, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'Staff'),
(3, 'Amirul Hazieq Bin Zolkifli', 'amirul@gmail.com', 'amirul123', 'user-profile-min.png', '01111784725', 'No. 130, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'Staff'),
(4, 'Muhammad Zulhilmi Bin Md Siam', 'zul@gmail.com', 'zul123', 'user-profile-min.png', '01169392194', 'No. 60, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'Staff'),
(5, 'Khairul Hakimi Azwad Bin Zaidi Amrol', 'kimi@gmail.com', 'kimi123', 'user-profile-min.png', '0104047456', 'No. 12, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'Developer'),
(6, 'Muhammad Aiman Syafiq Bin Abd Talib', 'aiman@gmail.com', 'aiman123', 'user-profile-min.png', '0195308755', 'No. 1, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_price`) VALUES
(2, '::1', 3, '50'),
(4, '::1', 3, '100');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(1, 'Imran', 'imran@gmail.com', 'imran123', '0182554984', 'No. 131, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'download.png', '::1', '1665131273'),
(2, 'aiman alias', 'aimanalias@gmail.com', 'aimanalias123', '0125359670', 'No. 190, Jalan Bunga Raya, Hulu Terengganu, Terengganu', 'hand-drawn-doodle-little-bird-cartoon-line-art-coloring-hand-drawn-doodle-little-bird-cartoon-line-art-coloring-108507142.jpg', '::1', '1715666287');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(1, 1, 400, 123538765, 2, '2022-06-25 01:18:34', 'Complete'),
(2, 1, 300, 1284769548, 3, '2022-06-25 01:28:02', 'Complete'),
(3, 1, 400, 1360217876, 2, '2022-06-25 01:31:30', 'Complete'),
(4, 2, 150, 2009632345, 3, '2022-06-25 01:37:58', 'Complete'),
(5, 2, 300, 565636083, 3, '2022-06-25 01:37:25', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(1, 35366, 300, 'DuitNow', 53456465, '2022-06-25'),
(2, 2147483647, 400, 'Online Banking', 2147483647, '2022-06-25'),
(3, 2147483647, 300, 'Online Banking', 2147483647, '2022-06-25'),
(4, 2147483647, 150, 'Online Banking', 2147483647, '2022-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(1, 1, 123538765, '7', 2, 'Complete'),
(2, 1, 1284769548, '4', 3, 'Complete'),
(3, 1, 1360217876, '7', 2, 'Complete'),
(4, 2, 2009632345, '2', 3, 'Complete'),
(5, 2, 565636083, '4', 3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_price`, `product_desc`) VALUES
(1, '2022-06-21 20:54:35', 'Maajun Nenda', 'Maajun-nenda-satu', 'DSC05144-1-510x1024.png', 50, 'Produk ini untuk perempuan.'),
(2, '2022-06-21 20:55:54', 'Maajun Ayahanda', 'Maajun-ayahanda-satu', 'Ayahanda-2 (1).png', 50, 'Produk ini untuk kegunaan lelaki.'),
(3, '2022-06-21 20:57:15', 'Maajun Nenda Combo', 'Maajun-nenda-combo', 'Nenda-01-1-863x1024.png', 100, 'Produk ini untuk kegunaan perempuan.'),
(4, '2022-06-21 20:57:58', 'Maajun Ayahanda Combo', 'Maajun-ayahanda-combo', 'Ayah-2-01-863x1024.png', 100, 'Produk ini untuk kegunaan lelaki.'),
(5, '2022-06-21 20:59:10', 'Maajun Nenda & Ayahanda', 'Maajun-nenda-ayahanda', 'Nenda-ayah-01-863x1024.png', 100, 'Produk ini untuk kegunaan combo perempuan dan lelaki'),
(6, '2022-06-21 21:01:04', 'Maajun Nenda 3X Combo', 'Maajun-nenda-3X-COMBO', 'nenda-3-01-997x1024.png', 150, 'Produk ini untuk kegunaan wanita.'),
(7, '2022-06-21 21:02:10', 'Maajun Nenda 4X Combo', 'Maajun-nenda-4x-combo', 'nenda-4-01-1024x909.png', 200, 'Produk ini untuk kegunaan wanita.');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(1, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
