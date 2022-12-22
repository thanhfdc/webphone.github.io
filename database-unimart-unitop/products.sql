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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_productcat_id_foreign` (`productcat_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_productcat_id_foreign` FOREIGN KEY (`productcat_id`) REFERENCES `productcats` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
