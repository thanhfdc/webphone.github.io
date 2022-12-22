-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 23, 2021 lúc 09:27 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelpro-unimart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL,
  `subtotal` bigint(20) UNSIGNED DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `masp`, `thumbnail`, `name`, `price`, `qty`, `subtotal`, `payment`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'Asus1234', 'public/image/products/img-pro-06.png', 'Laptop Asus Probook 4730s', 6990000, 1, 6990000, 'online', 56, '2021-07-18 08:19:51', '2021-07-18 08:19:51', NULL),
(18, 'Asus231', 'public/image/products/img-pro-23.png', 'Laptop Asus Probook 4735s', 8990000, 1, 8990000, 'at-home', 57, '2021-07-18 08:20:50', '2021-07-18 08:20:50', NULL),
(19, 'SAS123', 'public/image/products/img-pro-15.png', 'Samsung Galaxy A5', 7990000, 1, 7990000, 'at-home', 57, '2021-07-18 08:20:50', '2021-07-18 08:20:50', NULL),
(20, 'MTRL123', 'public/image/products/img-pro-16.png', 'Motorola Moto G5S Plus', 6990000, 2, 13980000, 'online', 58, '2021-07-18 08:21:55', '2021-07-18 08:21:55', NULL),
(21, 'HTC123', 'public/image/products/img-pro-11.png', 'HTC U Ultra Sapphire', 16490000, 1, 16490000, 'online', 58, '2021-07-18 08:21:55', '2021-07-18 08:21:55', NULL),
(22, 'Dell123', 'public/image/products/img-pro-21.png', 'Laptop Dell Probook 4630s', 5990000, 1, 5990000, 'online', 58, '2021-07-18 08:21:55', '2021-07-18 08:21:55', NULL),
(23, 'HTC123', 'public/image/products/img-pro-11.png', 'HTC U Ultra Sapphire', 16490000, 1, 16490000, 'at-home', 59, '2021-07-18 08:23:14', '2021-07-18 08:23:14', NULL),
(24, 'BPHO123', 'public/image/products/img-pro-10.png', 'Bphone 2017', 9790000, 1, 9790000, 'at-home', 59, '2021-07-18 08:23:14', '2021-07-18 08:23:14', NULL),
(25, 'd12', 'public/image/products/img-pro-18.png', 'Laptop Asus Probook 4430s', 16900000, 1, 16900000, 'online', 60, '2021-07-18 08:24:22', '2021-07-18 08:24:22', NULL),
(26, 'Asus1234', 'public/image/products/img-pro-06.png', 'Laptop Asus Probook 4730s', 6990000, 1, 6990000, 'online', 60, '2021-07-18 08:24:22', '2021-07-18 08:24:22', NULL),
(27, 'Hp4437', 'public/image/products/img-pro-19-1626168124.png', 'Laptop HP Probook 4437s', 22890000, 1, 22890000, 'at-home', 61, '2021-07-18 08:25:26', '2021-07-18 08:29:11', '2021-07-18 08:29:11'),
(28, 'HUEW123', 'public/image/products/img-pro-13.png', 'Huawei Nova 2i', 5990000, 1, 5990000, 'at-home', 61, '2021-07-18 08:25:26', '2021-07-18 08:29:11', '2021-07-18 08:29:11'),
(29, 'Dell123', 'public/image/products/img-pro-21.png', 'Laptop Dell Probook 4630s', 5990000, 1, 5990000, 'at-home', 62, '2021-07-18 08:26:29', '2021-07-18 08:28:54', '2021-07-18 08:28:54'),
(30, 'SAS123', 'public/image/products/img-pro-15.png', 'Samsung Galaxy A5', 7990000, 3, 23970000, 'at-home', 62, '2021-07-18 08:26:29', '2021-07-18 08:28:54', '2021-07-18 08:28:54'),
(34, 'A123', 'public/image/products/img-pro-17.png', 'Laptop HP Probook 4430s', 17900000, 1, 17900000, 'online', 64, '2021-07-21 08:34:00', '2021-07-21 08:34:00', NULL),
(35, 'd12', 'public/image/products/img-pro-18.png', 'Laptop Asus Probook 4430s', 16900000, 1, 16900000, 'online', 65, '2021-07-21 21:07:49', '2021-07-21 21:07:49', NULL),
(36, 'C123', 'public/image/products/img-pro-19.png', 'Laptop Asus Probook 4432s', 18900000, 2, 37800000, 'online', 65, '2021-07-21 21:07:49', '2021-07-21 21:07:49', NULL),
(41, 'A123', 'public/image/products/img-pro-17.png', 'Laptop HP Probook 4430s', 17900000, 1, 17900000, 'online', 68, '2021-07-22 03:43:19', '2021-07-22 03:43:19', NULL),
(42, 'Asus1234', 'public/image/products/img-pro-06.png', 'Laptop Asus Probook 4730s', 6990000, 2, 13980000, 'online', 68, '2021-07-22 03:43:19', '2021-07-22 03:43:19', NULL),
(43, 'C123', 'public/image/products/img-pro-19.png', 'Laptop Asus Probook 4432s', 18900000, 1, 18900000, 'online', 69, '2021-07-22 11:51:12', '2021-07-22 11:51:12', NULL),
(44, 'MTRL123', 'public/image/products/img-pro-16.png', 'Motorola Moto G5S Plus', 6990000, 3, 20970000, 'online', 69, '2021-07-22 11:51:12', '2021-07-22 11:51:12', NULL),
(45, 'A123', 'public/image/products/img-pro-17.png', 'Laptop HP Probook 4430s', 17900000, 1, 17900000, 'online', 70, '2021-07-23 12:19:35', '2021-07-23 12:19:35', NULL),
(46, 'DHO101', 'public/image/products/dong-ho-1.jpg.jpg', 'dong ho thoi trang 01', 1990000, 2, 3980000, 'online', 70, '2021-07-23 12:19:35', '2021-07-23 12:19:35', NULL),
(47, 'SONY123', 'public/image/products/img-pro-14.png', 'Sony Xperia XA Ultra', 6990000, 1, 6990000, 'online', 70, '2021-07-23 12:19:35', '2021-07-23 12:19:35', NULL),
(48, 'A123', 'public/image/products/img-pro-17.png', 'Laptop HP Probook 4430s', 17900000, 1, 17900000, 'online', 71, '2021-07-23 12:19:40', '2021-07-23 12:19:40', NULL),
(49, 'DHO101', 'public/image/products/dong-ho-1.jpg.jpg', 'dong ho thoi trang 01', 1990000, 2, 3980000, 'online', 71, '2021-07-23 12:19:40', '2021-07-23 12:19:40', NULL),
(50, 'SONY123', 'public/image/products/img-pro-14.png', 'Sony Xperia XA Ultra', 6990000, 1, 6990000, 'online', 71, '2021-07-23 12:19:40', '2021-07-23 12:19:40', NULL),
(51, 'SAS123', 'public/image/products/img-pro-15.png', 'Samsung Galaxy A5', 7990000, 1, 7990000, 'at-home', 72, '2021-07-23 12:21:01', '2021-07-23 12:21:01', NULL),
(52, 'MU102', 'public/image/products/mu-bao-hiem-2.jpg.jpg', 'mu bao hiem 102', 290000, 1, 290000, 'at-home', 72, '2021-07-23 12:21:01', '2021-07-23 12:21:01', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
