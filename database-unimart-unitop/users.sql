-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 23, 2021 lúc 09:28 PM
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
(17, 'Ho ten validate', 'validate@gmail.com', NULL, '$2y$10$CDkUGIC9n7KlYp3zDjB7.O4dFygHzOXtt2BZqeEukedQUGPIziYdC', NULL, '2021-07-09 08:02:41', '2021-07-09 08:02:41', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
