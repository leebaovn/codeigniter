-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2020 lúc 07:24 SA
-- Phiên bản máy phục vụ: 5.7.14
-- Phiên bản PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ciblog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`) VALUES
(3, 3, 'Nhà đất'),
(5, 3, 'Thể thao'),
(6, 3, 'Công nghệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(6, 2, 'Bảo', 'leebao101@gmail.com', 'Tks bro for this project', '2020-06-09 09:43:06'),
(7, 14, 'Lý Hồng Bảo', 'leebao102@gmail.com', 'zxcxzcxzcz', '2020-06-10 06:48:45'),
(8, 12, 'Lý Hồng Bảo', 'taycam4u@gmail.com', 'zxcxzczxcxz', '2020-06-11 05:00:16'),
(9, 12, 'Đi chơi ', '1e', 'cvcxv', '2020-06-11 05:03:29'),
(10, 12, '17520270', 'leebao101@', 'zxcxzcxz', '2020-06-11 05:10:36'),
(11, 12, 'Công nghệ', '1e', 'bagfầ', '2020-06-11 05:13:59'),
(12, 14, 'zcxz', '17520270@gm.uit.edu.vn', 'toi day', '2020-06-12 03:10:19'),
(13, 16, 'Lý Hồng Bảo', 'taycam4u@gmail.com', 'zxczxczx', '2020-06-13 06:30:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(10, 4, 13),
(11, 4, 12),
(12, 3, 12),
(13, 3, 13),
(14, 5, 15),
(15, 5, 16),
(16, 5, 14),
(17, 5, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(12, 3, 3, 'Uoongs cf', 'Uoongs-cf', '<p>cf so good 3 round per day</p>\r\n', 'default.jpg', '2020-06-10 05:50:03'),
(13, 6, 4, 'Đi đá bóng', 'Dji-dja-bong', '<p>qưlkedjwqkldjkl&aacute;ncl&aacute;</p>\r\n', 'default.jpg', '2020-06-11 05:34:42'),
(14, 6, 5, 'uống cf tốt cho sức khỏe', 'uong-cf-tot-cho-suc-khoe', '<p>mới lạ &aacute;, tin cl</p>\r\n', 'default.jpg', '2020-06-11 16:20:22'),
(15, 6, 5, 'post thứ 2 của tôi', 'post-thu-2-cua-toi', '<p>đ&acirc;y l&agrave; post thứ 2 để test th&ocirc;i</p>\r\n', 'default.jpg', '2020-06-11 16:30:47'),
(16, 5, 5, 'title 3', 'title-3', '<p>zxz<img alt="" src="data:image/jpeg;base64,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" style="height:224px; width:224px" /></p>\r\n', 'default.jpg', '2020-06-11 16:57:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `register_date`) VALUES
(5, 'bảo', 'leebao101@gmail.com', 'bao', '4297f44b13955235245b2497399d7a93', '2020-06-11 16:19:43'),
(6, 'Lý Hồng Bảo', 'bao@gmail.com', 'lza', '7c156207f2f67d74ef1b8b81490a4f71', '2020-06-13 07:22:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
