-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2016 at 07:38 PM
-- Server version: 5.6.30-1+deb.sury.org~wily+2
-- PHP Version: 7.0.9-1+deb.sury.org~wily+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameduaxe_t_b134`
--

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
  `icon_mau` varchar(255) DEFAULT NULL,
  `bg_color` varchar(10) DEFAULT NULL,
  `home_style` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: banner lớn 2:banner nho 3 banner ngang',
  `is_hover` tinyint(1) NOT NULL DEFAULT '0',
  `display_order` tinyint(4) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_user` tinyint(4) NOT NULL,
  `updated_user` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `meta_id` bigint(20) DEFAULT NULL,
  `menu_ngang` tinyint(1) NOT NULL DEFAULT '1',
  `menu_doc` tinyint(1) NOT NULL DEFAULT '1',
  `phi_dich_vu` int(11) NOT NULL DEFAULT '0',
  `icon_url` varchar(255) DEFAULT NULL,
  `icon_km` varchar(255) DEFAULT NULL,
  `banner_menu` varchar(255) DEFAULT NULL,
  `price_sort` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`id`, `name`, `alias`, `slug`, `description`, `icon_mau`, `bg_color`, `home_style`, `is_hover`, `display_order`, `is_hot`, `status`, `created_user`, `updated_user`, `created_at`, `updated_at`, `meta_id`, `menu_ngang`, `menu_doc`, `phi_dich_vu`, `icon_url`, `icon_km`, `banner_menu`, `price_sort`) VALUES
(1, 'Server', 'Server', 'server', '', '2016/09/22/icon-10-1474542035.png', '#EE484F', 2, 0, 1, 1, 1, 1, 1, '2016-07-16 06:03:57', '2016-10-07 09:57:10', 3, 1, 1, 0, '2016/09/19/icon-10-1474281088.png', NULL, '2016/10/06/server-1475740013.png', 0),
(2, 'Laptop', 'Laptop', 'laptop', '', '2016/09/22/icon-14-1474542054.png', '#EE484F', 2, 1, 2, 1, 1, 1, 1, '2016-07-16 06:08:45', '2016-10-06 07:47:12', 10, 1, 1, 0, '2016/09/19/icon-14-1474281132.png', NULL, '2016/10/06/laptop-1475740030.png', 0),
(3, 'Desktop', 'Desktop', 'desktop', '', '2016/09/22/icon-03-1474542061.png', '#EE484F', 2, 0, 3, 1, 1, 1, 1, '2016-07-16 06:14:00', '2016-10-06 07:51:23', 11, 1, 1, 0, '2016/09/19/icon-03-1474281150.png', NULL, '2016/10/06/desktop-1475740283.png', 0),
(4, 'Phần mềm', 'Phan mem', 'phan-mem', '', '2016/09/22/icon-13-1474542091.png', '#EE484F', 2, 0, 4, 1, 1, 1, 1, '2016-07-16 06:21:58', '2016-10-06 07:52:47', 13, 0, 1, 0, '2016/09/19/icon-13-1474281194.png', NULL, '2016/10/06/phan-mem-1475740366.png', 0),
(5, 'Thiết bị mạng', 'Thiet bi mang', 'thiet-bi-mang', '', '2016/09/22/icon-01-1474542118.png', '#EE484F', 2, 0, 5, 1, 1, 1, 1, '2016-07-16 06:25:21', '2016-10-06 07:52:57', 16, 0, 1, 0, '2016/09/19/icon-01-1474281218.png', NULL, '2016/10/06/thiet-bi-mang-1475740376.png', 0),
(6, 'Văn phòng', 'Van phong', 'van-phong', '', '2016/09/22/icon-09-1474542152.png', '#EE484F', 2, 0, 6, 1, 1, 1, 1, '2016-07-16 06:26:04', '2016-10-06 07:53:09', 17, 0, 1, 0, '2016/09/19/icon-09-1474281258.png', NULL, '2016/10/06/van-phong-1475740388.png', 0),
(7, 'Linh kiện', 'Linh kien', 'linh-kien', '', '2016/09/22/icon-02-1474542161.png', '#EE484F', 2, 0, 7, 1, 1, 1, 1, '2016-07-16 06:26:29', '2016-10-06 07:53:16', 19, 0, 1, 0, '2016/09/19/icon-02-1474281289.png', NULL, '2016/10/06/linh-kien-1475740394.png', 1),
(8, 'Smartphone', 'Smartphone', 'smartphone', '', '2016/09/22/icon-05-1474542083.png', '#EE484F', 2, 1, 8, 1, 1, 1, 1, '2016-07-16 06:26:52', '2016-10-14 23:02:35', 12, 1, 1, 0, '2016/09/19/icon-05-1474281179.png', NULL, '2016/10/06/smartphone-1475740434.png', 1),
(9, 'Phụ kiện', 'Phu kien', 'phu-kien', '', '2016/09/22/icon-02-1474542136.png', '#EE484F', 1, 0, 12, 0, 1, 1, 1, '2016-07-16 06:27:35', '2016-09-22 11:02:17', 18, 0, 0, 0, '2016/09/19/icon-02-1474281248.png', NULL, NULL, 0),
(10, 'Tablet', 'Tablet', 'tablet', '', '2016/09/22/icon-04-1474542126.png', '#EE484F', 2, 1, 11, 1, 1, 1, 1, '2016-09-05 04:05:16', '2016-10-14 23:01:20', 14, 1, 1, 0, '2016/09/19/icon-04-1474281228.png', NULL, '2016/10/06/tablet-1475740548.png', 1),
(11, 'Phụ kiện máy tính', 'Phu kien may tinh', 'phu-kien-may-tinh', '', '2016/09/22/icon-12-1474542171.png', '#EE484F', 2, 0, 9, 1, 1, 1, 1, '2016-09-06 02:08:35', '2016-10-06 07:54:21', 20, 0, 1, 0, '2016/09/19/icon-12-1474281567.png', NULL, '2016/10/06/phu-kien-may-tinh-1475740459.png', 0),
(12, 'Phụ kiện diện thoại', 'Phu kien dien thoai', 'phu-kien-dien-thoai', '', '2016/09/22/icon-06-1474542182.png', '#EE484F', 2, 0, 10, 1, 1, 1, 1, '2016-09-06 02:12:42', '2016-10-06 07:57:02', 15, 0, 1, 0, '2016/09/19/icon-06-1474281309.png', NULL, '2016/10/06/linh-kien-dien-thoai-1475740620.png', 0),
(17, 'aegag', 'aegag', 'aegag', '', '2016/10/18/girl-xinh-facebook-tu-suong-1476784748.jpg', '#EE484F', 0, 0, 0, 0, 1, 0, 0, '2016-10-18 10:00:35', '2016-10-18 10:05:36', 434, 0, 0, 20000, '2016/10/18/11248161-400985900112600-4201496101092023263-n-1476784926.jpg', '2016/10/18/1339337386492583760-574-574-1476784751.jpg', '2016/10/18/nguoi-mau-teen-xinh-ee90aa-1476784778.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`,`slug`),
  ADD KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
