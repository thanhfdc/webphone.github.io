-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2021 lúc 03:43 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `uni`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customercancels`
--

CREATE TABLE `customercancels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customercancels`
--

INSERT INTO `customercancels` (`id`, `fullname`, `email`, `address`, `phone`, `note`, `subtotal`, `payment_method`, `created_at`, `updated_at`) VALUES
(4, 'Nguyen Thu Thuy', 'thuy@gmail.com', 'Ha Nam', '0355765189', 'Mua dien thoai kinh doanh online', 65930000, 'online', '2021-07-18 08:29:18', '2021-07-18 08:29:18');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `icons`
--

INSERT INTO `icons` (`id`, `image_icon`, `created_at`, `updated_at`) VALUES
(19, 'public/image/icons/icon-to-top.png', '2021-07-13 01:51:38', '2021-07-13 01:51:38'),
(20, 'public/image/icons/img-foot.png', '2021-07-13 01:51:50', '2021-07-13 01:51:50'),
(21, 'public/image/icons/logo.png', '2021-07-13 01:52:30', '2021-07-13 01:52:30'),
(22, 'public/image/icons/banner.png', '2021-07-13 01:52:37', '2021-07-13 01:52:37'),
(23, 'public/image/icons/banner-2.png', '2021-07-13 01:52:41', '2021-07-13 01:52:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_21_164722_add_soft_delete_to_users', 2),
(5, '2021_04_21_171448_add_soft_delete_to_users', 3),
(13, '2021_04_26_085950_create_pages_table', 4),
(14, '2021_04_27_082323_add_soft_delete_to_pages', 5),
(20, '2021_04_27_111605_add_soft_delete_to_products', 6),
(25, '2021_07_05_191515_create_postcats_table', 7),
(29, '2021_07_05_193003_create_posts_table', 9),
(35, '2021_07_07_184304_create_productcats_table', 11),
(39, '2021_07_05_192300_add_softdelete_to_postcats', 15),
(40, '2021_07_06_092854_add_softdelete_to_posts_table', 15),
(41, '2021_07_10_183924_add_softdelete_to_productcats_table', 16),
(42, '2021_07_11_165225_create_sliceders_table', 17),
(43, '2021_07_12_095136_create_icons_table', 18),
(46, '2021_04_27_094946_create_products_table', 19),
(47, '2021_07_08_093542_add_softdelete_to_products_table', 20),
(54, '2021_07_14_081956_create_customers_table', 21),
(55, '2021_07_15_190604_add_softdelete_to_customers_table', 21),
(56, '2021_07_14_081828_create_orders_table', 22),
(57, '2021_07_15_190758_add_softdelete_to_orders_table', 22),
(58, '2021_07_18_145925_create_customercancels_table', 23);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `title`, `thumbnail`, `content`, `category`, `cat_id`, `birthday`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 'Tieu de 1 gioi thieu', NULL, 'Noi dung 1 gioi thieu', 'Giới thiệu', 1, '2021-06-28', '2021-07-09 07:45:31', '2021-07-21 07:27:06', NULL),
(37, 'Tieu de 2 gioi thieu', NULL, 'Noi dung 2 gioi thieu', 'Giới thiệu', 1, '2021-06-07', '2021-07-09 07:45:58', '2021-07-21 07:54:10', NULL),
(38, 'Tieu de 3 gioi thieu', NULL, 'Noi dung 3  gioi thieu', 'Giới thiệu', 1, '2021-07-01', '2021-07-09 07:46:24', '2021-07-21 08:16:24', NULL),
(55, 'Tieu de 4 gioi thieu', NULL, 'Noi dung 4 gioi thieu', 'Giới thiệu', 1, '2021-07-11', '2021-07-21 08:18:39', '2021-07-21 08:18:39', NULL),
(56, 'Tieu de 5 gioi thieu', NULL, 'Noi dung 5 gioi thieu', 'Giới thiệu', 1, '2021-07-07', '2021-07-21 08:19:06', '2021-07-21 08:19:06', NULL),
(57, 'Tieu de 6 lien he update', '', 'Noi dung 6 lien he', 'Lien he', 2, '2021-06-08', '2021-07-06 00:57:52', '2021-07-21 08:21:12', NULL),
(58, 'Tieu de 7 lien he', NULL, 'Noi dung 7 lien he', 'Lien he', 2, '2021-05-03', '2021-07-21 08:21:49', '2021-07-21 08:21:49', NULL),
(59, 'Tieu de 8 lien he', NULL, 'Noi dung 8 lien he', 'Lien he', 2, '2021-04-07', '2021-07-21 08:22:14', '2021-07-21 08:22:14', NULL),
(60, 'Tieu de 9 lien he', NULL, 'Noi dung 9 lien he', 'Lien he', 2, '2021-07-18', '2021-07-21 08:22:35', '2021-07-21 08:22:35', NULL),
(61, 'Tieu de 10 lien he', NULL, 'Noi dung 10 lien he', 'Lien he', 2, '2021-07-04', '2021-07-21 08:23:12', '2021-07-21 08:23:12', NULL),
(62, 'Tieu de 11 lien he', NULL, 'Noi dung 11 lien he', 'Lien he', 2, '2021-07-23', '2021-07-21 08:23:39', '2021-07-21 08:23:39', NULL),
(63, 'Tieu de 12 lien he', NULL, 'Noi dung 12 lien he', 'Lien he', 2, '2021-03-09', '2021-07-21 08:24:01', '2021-07-21 08:24:01', NULL),
(64, 'Tieu de 13 gioi thieu', NULL, 'Noi dung 13 gioi thieu', 'Giới thiệu', 1, '2021-04-06', '2021-07-21 08:24:45', '2021-07-21 08:24:45', NULL),
(65, 'Tieu de 14 gioi thieu', NULL, 'Noi dung 14 gioi thieu', 'Giới thiệu', 1, '2021-07-14', '2021-07-21 08:25:11', '2021-07-21 08:25:11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `postcats`
--

CREATE TABLE `postcats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `postcats`
--

INSERT INTO `postcats` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(76, 'Kinh doanh', '2021-07-20 10:26:18', '2021-07-20 10:26:18', NULL),
(77, 'Thể thao', '2021-07-20 10:26:28', '2021-07-20 10:26:28', NULL),
(78, 'Giáo dục', '2021-07-20 10:26:38', '2021-07-20 10:26:38', NULL),
(79, 'Sức khỏe', '2021-07-20 10:26:49', '2021-07-20 10:26:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `thumbnail`, `content`, `postcat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(67, 'Kinh doanh 1', 'public/image/posts/hinh-anh-3.jpg', 'Noi dung kinh doanh 1', 76, '2021-07-20 10:28:29', '2021-07-20 10:28:29', NULL),
(68, 'Kinh doanh 2', 'public/image/posts/img-detail.jpg', 'Noi dung kinh doanh 2', 76, '2021-07-20 10:29:39', '2021-07-20 10:29:39', NULL),
(69, 'Thể thao Châu Âu', 'public/image/posts/HA5.jpg', 'Noi dung thể thao châu âu', 77, '2021-07-20 10:32:11', '2021-07-20 10:32:11', NULL),
(70, 'Thể thao châu mỹ', 'public/image/posts/HA3.jpg', 'Nội dung thể thao châu mỹ', 77, '2021-07-20 10:32:50', '2021-07-20 10:32:50', NULL),
(71, 'Giáo dục mầm non', 'public/image/posts/HA2.jpg', 'Nội dung giáo dục mầm non', 78, '2021-07-20 10:34:05', '2021-07-20 10:34:05', NULL),
(72, 'Giáo dục phổ cập', 'public/image/posts/hinh-anh-3-1626802607.jpg', 'Nội dung giáo dục phổ cập', 78, '2021-07-20 10:36:47', '2021-07-20 10:36:47', NULL),
(73, 'Sức khỏe người cao tuổi', 'public/image/posts/hinh-anh-4.jpg', 'Nội dung sức khỏe người cao tuổi', 79, '2021-07-20 10:38:11', '2021-07-20 10:38:11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcats`
--

CREATE TABLE `productcats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcats`
--

INSERT INTO `productcats` (`id`, `catname`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Điện thoại', '2021-07-10 11:52:44', '2021-07-13 01:34:32', NULL),
(10, 'Lap top', '2021-07-10 11:52:52', '2021-07-13 01:34:32', NULL),
(11, 'Dongho', '2021-07-10 11:52:59', '2021-07-13 01:34:14', '2021-07-13 01:34:14'),
(12, 'Thoi trang', '2021-07-10 11:53:12', '2021-07-10 12:09:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productcat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `the_firm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `masp`, `thumbnail`, `name`, `price`, `description`, `productcat_id`, `status`, `the_firm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 'A123', 'public/image/products/img-pro-17.png', 'Laptop HP Probook 4430s', 17900000, 'Laptop HP Probook 4430s la san pham moi ra mat', 10, 'Con hang', 'HP', '2021-07-13 02:07:46', '2021-07-13 02:48:57', NULL),
(23, 'd12', 'public/image/products/img-pro-18.png', 'Laptop Asus Probook 4430s', 16900000, 'Laptop Asus Probook 4430s la san pham tot va dep', 10, 'Con hang', 'Asus', '2021-07-13 02:09:53', '2021-07-13 02:48:57', NULL),
(24, 'C123', 'public/image/products/img-pro-19.png', 'Laptop Asus Probook 4432s', 18900000, 'Laptop Asus Probook 4432s vua ra mat...', 10, 'het hang', 'Asus', '2021-07-13 02:12:03', '2021-07-13 02:48:57', NULL),
(25, 'Acer123', 'public/image/products/img-pro-07.png', 'Laptop Acer Probook 4530s', 18900000, 'Laptop Acer Probook 4530s la san pham ben va dep', 10, 'Con hang', 'Acer', '2021-07-13 02:13:33', '2021-07-13 02:48:57', NULL),
(26, 'Dell123', 'public/image/products/img-pro-21.png', 'Laptop Dell Probook 4630s', 14990000, 'Laptop Dell Probook 4630s la san pham noi dong coi da', 10, 'Con hang', 'Dell', '2021-07-13 02:15:42', '2021-07-13 02:48:57', NULL),
(27, 'Asus1234', 'public/image/products/img-pro-06.png', 'Laptop Asus Probook 4730s', 6990000, 'Laptop Asus Probook 4730s la san pham chinh hang', 10, 'Con hang', 'Asus', '2021-07-13 02:17:21', '2021-07-13 02:48:57', NULL),
(28, 'Asus231', 'public/image/products/img-pro-23.png', 'Laptop Asus Probook 4735s', 8990000, 'Laptop Asus Probook 4735s la san pham dang duoc ua chuong', 10, 'het hang', 'Asus', '2021-07-13 02:19:45', '2021-07-13 02:48:57', NULL),
(29, 'Hp4437', 'public/image/products/img-pro-19-1626168124.png', 'Laptop HP Probook 4437s', 22890000, 'Laptop HP Probook 4437s la san pham hien dang hot tren thi truong', 10, 'Con hang', 'HP', '2021-07-13 02:22:04', '2021-07-13 02:48:57', NULL),
(30, 'MTRL123', 'public/image/products/img-pro-16.png', 'Motorola Moto G5S Plus', 6990000, 'Motorola Moto G5S Plus la san pham o tam trung', 9, 'het hang', 'Motorola', '2021-07-13 02:28:30', '2021-07-13 02:48:57', NULL),
(31, 'SAS123', 'public/image/products/img-pro-15.png', 'Samsung Galaxy A5', 7990000, 'Samsung Galaxy A5 la san pham cua hang sam sung', 9, 'Con hang', 'Samsung', '2021-07-13 02:30:25', '2021-07-13 02:48:57', NULL),
(32, 'SONY123', 'public/image/products/img-pro-14.png', 'Sony Xperia XA Ultra', 6990000, 'Sony Xperia XA Ultra la san pham dong sony tam trung', 9, 'het hang', 'Sony', '2021-07-13 02:32:24', '2021-07-13 02:48:57', NULL),
(33, 'HUEW123', 'public/image/products/img-pro-13.png', 'Huawei Nova 2i', 12990000, 'Huawei Nova 2i la san pham vua ra mat tren thi truong', 9, 'het hang', 'Huewei', '2021-07-13 02:34:32', '2021-07-13 02:48:57', NULL),
(34, 'XM123', 'public/image/products/img-pro-12.png', 'Xiaomi Mi A1', 5990000, 'Xiaomi Mi A1 la san pham cua hang ximao', 9, 'Con hang', 'Ximao', '2021-07-13 02:35:53', '2021-07-13 02:48:57', NULL),
(35, 'HTC123', 'public/image/products/img-pro-11.png', 'HTC U Ultra Sapphire', 16490000, 'HTC U Ultra Sapphire la san pham cua hang HTC', 9, 'Con hang', 'HTC', '2021-07-13 02:37:08', '2021-07-13 02:48:57', NULL),
(36, 'SON234', 'public/image/products/img-pro-08.png', 'Sony Xperia XZ Dual', 12990000, 'Sony Xperia XZ Dual la san pham cua hang sony', 9, 'het hang', 'Sony', '2021-07-13 02:38:11', '2021-07-13 02:48:57', NULL),
(37, 'BPHO123', 'public/image/products/img-pro-10.png', 'Bphone 2017', 9790000, 'Bphone 2017 la san pham thuoc nhanh iphone', 9, 'het hang', 'Bphone', '2021-07-13 02:39:25', '2021-07-13 02:48:57', NULL),
(38, 'SASU1241', '	\r\npublic/image/products/img-pro-15.png', 'sam sung galaxy E500', 14990000, 'sam sung galaxy E500 la 1 san pham ben va deo, nam trong tam gia trung', 9, 'con hang', 'Samsung', '2021-07-06 00:57:52', '2021-07-06 11:20:46', NULL),
(39, 'LAT20020', '	\r\npublic/image/products/img-pro-07.png', 'Lap top L2020pro', 12990000, 'Lap top L2020pro la san pham moi ra mat, san pham co thiet ke doc dao va dep mat', 10, 'con hang', 'HP', '2021-07-06 00:57:52', '2021-07-06 11:20:46', NULL),
(40, 'DHO101', 'public/image/products/dong-ho-1.jpg.jpg', 'dong ho thoi trang 01', 1990000, 'Dong ho thoi trang 01 la san pham moi ra, thanh lich, nhe nhang', 12, 'Con hang', 'Senco', '2021-07-23 07:23:30', '2021-07-23 07:23:30', NULL),
(41, 'DHO102', 'public/image/products/dong-ho-2.jpg.jpg', 'dong ho thoi trang 02', 2590000, 'Dong ho thoi trang 02 la san pham hang Senco, san pham nam trong tam gia trung, dep va sang trong', 12, 'Con hang', 'Senco', '2021-07-23 07:25:29', '2021-07-23 07:25:29', NULL),
(42, 'DHO103', 'public/image/products/dong-ho-3.jpg.jpg', 'dong ho thoi trang 03', 2990000, 'Dong ho thoi trang 03 la dong ho chinh hang Senco, dep va sang trong', 12, 'Con hang', 'Senco', '2021-07-23 07:28:04', '2021-07-23 07:28:04', NULL),
(43, 'DHO104', 'public/image/products/dong-ho-4.jpg.jpg', 'dong ho thoi trang 04', 3390000, 'Dong ho thoi trang 04 la san pham cua hang Senco, muc gia hop ly voi nguoi tieu dung', 12, 'Con hang', 'Senco', '2021-07-23 07:29:25', '2021-07-23 07:29:25', NULL),
(44, 'DHO105', 'public/image/products/dong-ho-5.jpg.jpg', 'dong ho thoi trang 05', 3590000, 'Dong ho thoi trang 05 la san pham hang Senco, mau ma dep, ben  va sang trong', 12, 'Con hang', 'Senco', '2021-07-23 07:31:02', '2021-07-23 07:31:02', NULL),
(45, 'DHO106', 'public/image/products/dong-ho-6.jpg.jpg', 'dong ho thoi trang 06', 2690000, 'dong ho thoi trang 06 la san pham hang Senco, gia ca trung binh nhung phong cach tre trung, nhe nhang....', 12, 'Con hang', 'Senco', '2021-07-23 07:32:42', '2021-07-23 07:32:42', NULL),
(46, 'DAl101', 'public/image/products/day-lung-1.jpg.jpg', 'Day lung nam 01', 1290000, 'Day lung nam 01 moi ra mat, san pham hang Sendo, dep va sang trong...', 12, 'Con hang', 'Sendo', '2021-07-23 07:35:38', '2021-07-23 07:35:38', NULL),
(47, 'DAL102', 'public/image/products/day-lung-2.jpg.jpg', 'Day lung nam 02', 1490000, 'Day lung nam 02 la san pham moi ra mat cua hang Sendo, tam gia trung binh, dep, ben, sang trong la nhung....', 12, 'Con hang', 'Sendo', '2021-07-23 07:37:48', '2021-07-23 07:37:48', NULL),
(48, 'DAL103', 'public/image/products/day-lung-3.jpg.jpg', 'Day lung nam 03', 1660000, 'Day lung nam 03 cung la san pham nam trong tam gia trung binh nhung phong cach dep, gia ca phai trang', 12, 'Con hang', 'Sendo', '2021-07-23 07:39:23', '2021-07-23 07:39:23', NULL),
(49, 'DAL104', 'public/image/products/day-lung-4.jpg.jpg', 'Day lung nam 04', 1890000, 'Day lung nam 04 la san pham ben, mong va dep', 12, 'Con hang', 'Sendo', '2021-07-23 07:41:56', '2021-07-23 07:41:56', NULL),
(50, 'TDU101', 'public/image/products/tui-dung-1.jpg.jpg', 'Tui dung lap top 01', 390000, 'Tui dung lap top 01', 12, 'Con hang', 'UNIMAX', '2021-07-23 07:49:06', '2021-07-23 07:49:06', NULL),
(51, 'TDU102', 'public/image/products/tui-dung-2.jpg.jpg', 'Tui dung lap top 02', 490000, 'Tui dung lap top 02 la san pham ben, dep va gia ca phai trang', 12, 'Con hang', 'UNIMAX', '2021-07-23 07:50:32', '2021-07-23 07:50:32', NULL),
(52, 'TDU103', 'public/image/products/tui-dung-3.jpg.jpg', 'Tui dung lap top 03', 550000, 'Tui dung lap top 03 la san pham hang Lato, dung duoc cac loai laptop to khac nhau', 12, 'Con hang', 'UNIMAX', '2021-07-23 07:52:08', '2021-07-23 07:52:08', NULL),
(53, 'TDU104', 'public/image/products/tui-dung-4.jpg.jpg', 'Tui dung lap top 04', 490000, 'Tui dung lap top 04 cung la 1 san pham cua hang Lato, ben, dep...la nhung gi ma tui dung nay mang lai....', 12, 'Con hang', 'UNIMAX', '2021-07-23 07:55:11', '2021-07-23 07:55:11', NULL),
(54, 'TUD105', 'public/image/products/Ba-lo.jpg', 'Tui dung lap top 05', 690000, 'Tui dung lap top 05 la san pham hang Lato, phu hop di du lich, dung lap top va cac vat nhe cac loai', 12, 'Con hang', 'UNIMAX', '2021-07-23 07:57:04', '2021-07-23 07:57:04', NULL),
(55, 'TAI101', 'public/image/products/tai-nghe-1.jpg.jpg', 'Tai nghe 01', 390000, 'Tai nghe 01 la san pham hang Sam sung, dep, sang trong va gia ca vua phai', 12, 'Con hang', 'Samsung', '2021-07-23 07:59:36', '2021-07-23 07:59:36', NULL),
(56, 'TAI102', 'public/image/products/tai-nghe-2.jpg.jpg', 'Tai nghe 02', 490000, 'Tai nghe 02 la san pham hang samsung, chat luong am thanh tuyet voi', 12, 'Con hang', 'Samsung', '2021-07-23 08:07:09', '2021-07-23 08:07:09', NULL),
(57, 'TAI103', 'public/image/products/tai-nghe-3.jpg.jpg', 'Tai nghe 03', 550000, 'Tai nghe 03 la san pham hang sam sung, chat luong am thanh lon, trong', 12, 'Con hang', 'Samsung', '2021-07-23 08:08:32', '2021-07-23 08:08:32', NULL),
(58, 'MAY101', 'public/image/products/May-anh.jpg', 'May anh 101', 2890000, 'May anh 101 la san pham hang sa sung, san pham mang lai nhung hinh anh dep, sac net....', 12, 'Con hang', 'Samsung', '2021-07-23 08:11:21', '2021-07-23 08:11:21', NULL),
(59, 'MU101', 'public/image/products/mu-bao-hiem-1.jpg.jpg', 'mu bao hiem 101', 490000, 'mu bao hiem 101 la san pham hang Ximao', 12, 'Con hang', 'Lato', '2021-07-23 08:16:02', '2021-07-23 08:16:02', NULL),
(60, 'MU102', 'public/image/products/mu-bao-hiem-2.jpg.jpg', 'mu bao hiem 102', 290000, 'mu bao hiem 102 la san pham hang Lato, chac chan, ben la nhung gi ....', 12, 'Con hang', 'Lato', '2021-07-23 08:17:05', '2021-07-23 08:17:05', NULL),
(61, 'MU103', 'public/image/products/mu-bao-hiem-3.jpg.jpg', 'mu bao hiem 103', 390000, 'mu bao hiem 103 la san pham hang Lato, ben, chac chan va chong bui tot', 12, 'Con hang', 'Lato', '2021-07-23 08:18:04', '2021-07-23 08:18:04', NULL),
(62, 'MU104', 'public/image/products/mu-bao-hiem-4.jpg.jpg', 'mu bao hiem 04', 590000, 'mu bao hiem 04 la san pham moi ra, chac chan, ben, dep va phong cach....', 12, 'Con hang', 'Lato', '2021-07-23 08:19:43', '2021-07-23 08:19:43', NULL),
(63, 'MU105', 'public/image/products/mu-bao-hiem-5.jpg.jpg', 'mu bao hiem 05', 690000, 'mu bao hiem 05 la san pham hang Lato, ben, dep, chac chan.....', 12, 'Con hang', 'Lato', '2021-07-23 08:21:09', '2021-07-23 08:21:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliceders`
--

CREATE TABLE `sliceders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_sliceder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliceders`
--

INSERT INTO `sliceders` (`id`, `image_sliceder`, `created_at`, `updated_at`) VALUES
(17, 'public/image/sliceders/slider-01.png', '2021-07-13 01:53:00', '2021-07-13 01:53:00'),
(18, 'public/image/sliceders/slider-02.png', '2021-07-13 01:53:05', '2021-07-13 01:53:05'),
(19, 'public/image/sliceders/slider-03.png', '2021-07-13 01:53:11', '2021-07-13 01:53:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'MinhTuan', 'tuanss41@gmail.com', NULL, '$2y$10$6mRGV5NquCrYgeyPL8wQtOGHUcWPVShbu21L4qxy04vdXk1Hi4P/q', NULL, '2021-04-22 10:08:45', '2021-04-22 10:08:45', NULL),
(10, 'Dieulinh', 'linh@gmail.com', NULL, '$2y$10$4sTF3I945I2GkcKv5XES1umJJuclj5nM7UtMbu2uGFoakHouvvqA.', NULL, '2021-04-22 10:09:13', '2021-04-23 08:42:50', NULL),
(11, 'thuylinh', 'thuylinh@gmail.com', NULL, '$2y$10$IAtVP8jN2bbZlqgoYW6iAevRjmAbPnt/2RRTG6Jkm2hZLuM.PLMju', NULL, '2021-04-22 10:09:52', '2021-07-09 01:45:32', NULL),
(12, 'QuachMinhHung', 'hung@gmail.com', NULL, '$2y$10$kgN2ogeqM3EwlwpP.bfW1eNb6sWkM8vLpUWjDDfQ4vDndRtloo7Ry', NULL, '2021-04-22 10:10:31', '2021-07-07 10:49:42', NULL),
(14, 'Nguyen Thi Lan nua', 'lan@gmail.com', NULL, '$2y$10$LU8BtjrkYagl8ycL/0v2G..OdC55pBpqI4.JUTg.TPffzX5IYXgLK', NULL, '2021-07-04 09:23:44', '2021-07-09 04:20:30', '2021-07-09 04:20:30'),
(17, 'Ho ten validate', 'validate@gmail.com', NULL, '$2y$10$CDkUGIC9n7KlYp3zDjB7.O4dFygHzOXtt2BZqeEukedQUGPIziYdC', NULL, '2021-07-09 08:02:41', '2021-07-09 08:02:41', NULL),
(18, 'Nguyễn Chí Trung', 'trung9ckk@gmail.com', NULL, '$2y$10$ErSs72VYdhAAEZqzRyT9R.v7rI.LTSZz8OWWuZ27RBqL4Drderobe', NULL, '2021-07-24 02:50:12', '2021-07-24 02:50:12', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customercancels`
--
ALTER TABLE `customercancels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `postcats`
--
ALTER TABLE `postcats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`postcat_id`);

--
-- Chỉ mục cho bảng `productcats`
--
ALTER TABLE `productcats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_productcat_id_foreign` (`productcat_id`);

--
-- Chỉ mục cho bảng `sliceders`
--
ALTER TABLE `sliceders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customercancels`
--
ALTER TABLE `customercancels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `postcats`
--
ALTER TABLE `postcats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `productcats`
--
ALTER TABLE `productcats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `sliceders`
--
ALTER TABLE `sliceders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`postcat_id`) REFERENCES `postcats` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_productcat_id_foreign` FOREIGN KEY (`productcat_id`) REFERENCES `productcats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
