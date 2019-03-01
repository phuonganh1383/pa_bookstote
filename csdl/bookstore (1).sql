-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 28, 2019 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `quantity`, `title`, `description`, `release_date`, `created_at`, `updated_at`) VALUES
(2, 12, 'Hoa Ban Food', 'Sách nấu ăn', '2019-02-12', '2019-02-27 12:05:49', '2019-02-27 12:51:27'),
(3, 89, 'hoa nắng', 'hoa nắng', '2000-01-21', '2019-02-27 12:09:52', '2019-02-28 16:22:07'),
(4, 210, 'hoa sen trên đá', 'sách nói về Tây Tạng', '2018-12-06', '2019-02-27 12:44:34', '2019-02-27 12:44:34'),
(5, 12, 'Đắc Nhân Tâm', 'sách nói về những trải nghiệm', '2019-02-21', '2019-02-27 14:45:57', '2019-02-27 14:45:57'),
(6, 12, 'Nàng tiên cá', 'chuyện cổ tích', '1990-12-12', '2019-02-28 15:45:40', '2019-02-28 15:45:40'),
(7, 30, 'Thuật đàm phám', 'Những kỹ năng đàm phán', '2011-11-11', '2019-02-28 16:01:09', '2019-02-28 16:01:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`username`, `id`, `created_at`, `updated_at`) VALUES
('minhkhoatran', 2, '2019-02-12 00:00:00', NULL),
('minhkhoatran', 3, NULL, NULL),
('thienminh123', 3, NULL, NULL),
('thienminh123', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text COLLATE utf8_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `firstname`, `lastname`, `birthday`, `created_at`, `updated_at`) VALUES
('minhkhoatran', '25f9e794323b453885f5181f1b624d0b', 'khoa', 'tran', '1999-10-10', '2019-02-27 16:43:26', '2019-02-27 16:43:26'),
('thienminh123', '25f9e794323b453885f5181f1b624d0b', 'Minh', 'Nguyen', '1999-10-20', '2019-02-28 00:00:00', '2019-02-28 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`username`,`id`),
  ADD KEY `fk_favorite_book1` (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fk_favorite_book1` FOREIGN KEY (`id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_favorite_user1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
