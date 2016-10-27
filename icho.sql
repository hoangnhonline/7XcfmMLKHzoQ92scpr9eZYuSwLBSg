-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2016 at 01:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icho`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `ads_url` varchar(255) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 : không liên kết, 2 : trỏ đến 1 trang, 3',
  `display_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

CREATE TABLE `cate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `loai_id` tinyint(4) NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `show_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`id`, `name`, `alias`, `slug`, `loai_id`, `display_order`, `created_user`, `updated_user`, `created_at`, `updated_at`, `is_hot`, `status`, `icon_url`, `image_url`, `show_product`) VALUES
(1, 'dgasg', 'dsgadsg', 'dsgds', 10, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hang_sx`
--

CREATE TABLE `hang_sx` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `loai_id` tinyint(4) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `icon_url` varchar(255) DEFAULT NULL,
  `bg_color` varchar(10) DEFAULT NULL,
  `home_style` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: banner lớn 2:banner nho 3 banner ngang',
  `display_order` tinyint(4) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`id`, `name`, `alias`, `slug`, `description`, `icon_url`, `bg_color`, `home_style`, `display_order`, `is_hot`, `status`, `created_user`, `updated_user`, `created_at`, `updated_at`) VALUES
(1, 'Server', 'Server', 'server', '', 'server-1468649211.png', '#EE484F', 1, 1, 0, 1, 1, 0, '2016-07-16 06:03:57', '2016-07-16 06:07:15'),
(2, 'Laptop', 'Laptop', 'laptop', '', 'laptop-1468649338.png', '#EE484F', 1, 2, 0, 1, 1, 0, '2016-07-16 06:08:45', '2016-07-16 06:09:16'),
(3, 'Desktop', 'Desktop', 'desktop', '', 'desktop-1468649638.png', '#EE484F', 1, 5, 0, 1, 1, 0, '2016-07-16 06:14:00', '2016-07-16 06:14:00'),
(4, 'Phần mềm', 'Phan mem', 'phan-mem', '', 'phan-mem-1468650127.png', '#EE484F', 1, 4, 0, 1, 1, 0, '2016-07-16 06:21:58', '2016-07-16 06:22:13'),
(5, 'Thiết bị mạng', 'Thiet bi mang', 'thiet-bi-mang', '', 'thiet-bi-mang-1468650315.png', '#EE484F', 1, 3, 0, 1, 1, 0, '2016-07-16 06:25:21', '2016-07-16 06:25:21'),
(6, 'Văn phòng', 'Van phong', 'van-phong', '', 'thiet-bi-van-phong-1468650358.png', '#EE484F', 1, 7, 0, 1, 1, 0, '2016-07-16 06:26:04', '2016-07-16 06:26:04'),
(7, 'Linh kiện', 'Linh kien', 'linh-kien', '', 'linh-phu-kien-1468650384.png', '#EE484F', 1, 8, 0, 1, 1, 0, '2016-07-16 06:26:29', '2016-07-16 06:26:29'),
(8, 'Điện thoại', 'Dien thoai', 'dien-thoai', '', 'dien-thoai-1468650408.png', '#EE484F', 1, 9, 0, 1, 1, 0, '2016-07-16 06:26:52', '2016-07-16 06:26:52'),
(9, 'Phụ kiện', 'Phu kien', 'phu-kien', '', 'linh-phu-kien-1468650451.png', '#EE484F', 1, 6, 0, 1, 1, 0, '2016-07-16 06:27:35', '2016-07-16 06:27:35'),
(10, 'dfgds', 'dfgds', 'dfgdssdgas', '', 'banner-intab2-1468658562.jpg', '#EE484F', 0, 0, 0, 1, 1, 0, '2016-07-16 08:42:45', '2016-07-16 08:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `loai_thuoc_tinh`
--

CREATE TABLE `loai_thuoc_tinh` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `loai_id` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ma_sp` char(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_extend` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `alias_extend` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `slug_extend` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `is_sale` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `hang_sx_id` tinyint(4) DEFAULT NULL,
  `loai_id` tinyint(4) NOT NULL,
  `cate_id` tinyint(4) NOT NULL,
  `mota_1` varchar(500) DEFAULT NULL,
  `mota_2` varchar(500) DEFAULT NULL,
  `xuat_xu` varchar(255) DEFAULT NULL,
  `khuyen_mai` text,
  `chi_tiet` text,
  `bao_hanh` varchar(500) DEFAULT NULL,
  `so_luong_ton` int(11) NOT NULL,
  `sale_percent` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_hinh`
--

CREATE TABLE `sp_hinh` (
  `id` int(11) NOT NULL,
  `sapham_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_linhkien`
--

CREATE TABLE `sp_linhkien` (
  `sanpham_id` int(11) NOT NULL,
  `linhkien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sp_sosanh`
--

CREATE TABLE `sp_sosanh` (
  `sanpham_id` int(11) NOT NULL,
  `sosanh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thuoc_tinh`
--

CREATE TABLE `thuoc_tinh` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  `loai_id` tinyint(4) NOT NULL,
  `loai_thuoc_tinh_id` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hang_sx`
--
ALTER TABLE `hang_sx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_thuoc_tinh`
--
ALTER TABLE `loai_thuoc_tinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_hinh`
--
ALTER TABLE `sp_hinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_linhkien`
--
ALTER TABLE `sp_linhkien`
  ADD PRIMARY KEY (`sanpham_id`,`linhkien_id`),
  ADD UNIQUE KEY `sanpham_id` (`sanpham_id`,`linhkien_id`);

--
-- Indexes for table `sp_sosanh`
--
ALTER TABLE `sp_sosanh`
  ADD PRIMARY KEY (`sanpham_id`,`sosanh_id`),
  ADD UNIQUE KEY `sanpham_id` (`sanpham_id`,`sosanh_id`);

--
-- Indexes for table `thuoc_tinh`
--
ALTER TABLE `thuoc_tinh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cate`
--
ALTER TABLE `cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hang_sx`
--
ALTER TABLE `hang_sx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loai_thuoc_tinh`
--
ALTER TABLE `loai_thuoc_tinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_hinh`
--
ALTER TABLE `sp_hinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thuoc_tinh`
--
ALTER TABLE `thuoc_tinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
