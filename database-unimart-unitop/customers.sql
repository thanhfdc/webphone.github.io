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
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `address`, `phone`, `note`, `subtotal`, `payment_method`, `created_at`, `updated_at`, `deleted_at`) VALUES
(56, 'Quach Minh Tuan', 'tuanss41@gmail.com', 'Soc Son', '0355765189', 'Mua laptop online', 6990000, 'online', '2021-07-18 08:19:51', '2021-07-18 08:19:51', NULL),
(57, 'Quach Minh Hung', 'hung@gmail.com', 'Soc Son', '0955245167', 'Mua laptop va dien thoai online', 16980000, 'at-home', '2021-07-18 08:20:50', '2021-07-18 08:20:50', NULL),
(58, 'Tran Thu Hien', 'hien@gmail.com', 'cao Bang', '0904123456', 'Mua dien thoai kinh doanh', 36460000, 'online', '2021-07-18 08:21:55', '2021-07-18 08:21:55', NULL),
(59, 'Nguyen Thi Huong', 'huong@gmail.com', 'Bac Giang', '0922127357', 'Mua dien thoai hoc tap va giai tri', 26280000, 'at-home', '2021-07-18 08:23:14', '2021-07-18 08:23:14', NULL),
(60, 'Nguyen Thu Quynh', 'quynh@gmail.com', 'Thai Nguyen', '0904222104', 'Mua laptop cho cong ty', 23890000, 'online', '2021-07-18 08:24:22', '2021-07-18 08:24:22', NULL),
(61, 'Tran Van Hiep', 'hiep@gmail.com', 'Soc son', '0942123456', 'Mua laptop lam viec', 28880000, 'at-home', '2021-07-18 08:25:26', '2021-07-18 08:29:11', '2021-07-18 08:29:11'),
(62, 'Nguyen Van Nam', 'nam@gmail.com', 'Dong Da -Ha Noi', '0946525127', 'Mua thiet bi van phong online', 29960000, 'at-home', '2021-07-18 08:26:29', '2021-07-18 08:28:54', '2021-07-18 08:28:54'),
(64, 'Le Thanh Nghi', 'nghi@gmail.com', 'Cong ty CPXDVN', '0912306553', 'Mualaptop online', 17900000, 'online', '2021-07-21 08:34:00', '2021-07-21 08:34:00', NULL),
(65, 'Kiem tra Lai', 'lai@gmail.com', 'Son tay - Ha tay', '0922422122', 'Mua hang dien tu online', 54700000, 'online', '2021-07-21 21:07:49', '2021-07-21 21:07:49', NULL),
(68, 'Nguyen Van Dien Lu', 'Nguyendienct08x2@gmail.com', 'Lu trung-Soc Son', '0355765189', 'Mua hang online-di uong ruou khong', 31880000, 'online', '2021-07-22 03:43:19', '2021-07-22 03:43:19', NULL),
(69, 'Wedquachactive', 'wedquach1981@gmail.com', 'Cong ty CPXDVN', '0355765189', 'Mua hang online', 39870000, 'online', '2021-07-22 11:51:12', '2021-07-22 11:51:12', NULL),
(70, 'Quach Dieu Linh', 'linh@gmail.com', 'Dong Da -Ha Noi', '0902101201', 'Mua lap top va do dung thoi trang online', 28870000, 'online', '2021-07-23 12:19:35', '2021-07-23 12:19:35', NULL),
(71, 'Quach Dieu Linh', 'linh@gmail.com', 'Dong Da -Ha Noi', '0902101201', 'Mua lap top va do dung thoi trang online', 28870000, 'online', '2021-07-23 12:19:40', '2021-07-23 12:19:40', NULL),
(72, 'Tran Le Thuan', 'thuan@gmail.com', 'Cong ty CPXDVN', '0972127357', 'Mua dien thoai va mu bao hiem online', 8280000, 'at-home', '2021-07-23 12:21:01', '2021-07-23 12:21:01', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
