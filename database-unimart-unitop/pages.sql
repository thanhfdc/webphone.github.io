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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
