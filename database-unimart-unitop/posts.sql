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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`postcat_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`postcat_id`) REFERENCES `postcats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
