-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2022 lúc 02:03 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `milktea`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `andress` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `data_order` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total_bill` int(255) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `fullname`, `andress`, `phone`, `date_order`, `data_order`, `total_bill`, `username`) VALUES
(2, 'tetset', 'test', '23434', '2022-11-10', '{\"title\":[\"Ô long sữa\"],\"quantity\":[\"5\"],\"summ\":[\"100000\"]}', 100000, 'testuser1'),
(3, 'test', 'test', '2342', '2022-11-10', '{\"title\":[\"Sữa tươi chân trâu đường đen\"],\"quantity\":[\"3\"],\"summ\":[\"60000\"]}', 60000, 'testuser1'),
(4, 'test', 'tet34', '356323443', '2022-11-10', '{\"title\":[\"Ô long sữa\",\"Trà chanh\"],\"quantity\":[\"5\",\"2\"],\"summ\":[\"100000\",\"40000\"]}', 140000, 'testuser1'),
(5, 'test', 'tét', '2342', '2022-11-10', '{\"title\":[\"Trà chanh\",\"Ô long sữa\"],\"quantity\":[\"6\",\"2\"],\"summ\":[\"120000\",\"40000\"]}', 160000, 'testuser');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `title`, `img`, `quantity`, `price`, `username`, `id_product`) VALUES
(12, 'Trà chanh', 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/186496799_118417237044412_7996815157559839057_n.jpg', 6, 20000, 'admin', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `img`) VALUES
(1, 'Trà sữa', 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/milktea.jpg'),
(2, 'Trà', 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/215-2154368_-tea-logo-tea-drinks.png'),
(3, 'Cà phê', 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/5cad92b70babb2514f8d47e54ea54b1a.png'),
(4, 'Đồ ăn nhanh', 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/food.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regular_price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `descrip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `regular_price`, `sale_price`, `price`, `img`, `descrip`, `id_category`) VALUES
(1, 'Ô long sữa', 20000, NULL, 20000, 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/201891491_136509795235156_9109126174305572158_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.', 1),
(2, 'Trà chanh', 20000, NULL, 20000, 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/186496799_118417237044412_7996815157559839057_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.', 2),
(3, 'Sữa tươi chân trâu đường đen', 20000, NULL, 20000, 'https://72.arrowhitech.net/tn3/giang_reactjs/wp-content/uploads/2022/08/245475837_203961185156683_2094285448265039495_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.', 1),
(4, 'Nâu đá', 20000, NULL, 20000, 'https://suckhoedoisong.qltns.mediacdn.vn/zoom/600_315/Images/duylinh/2018/04/27/ca-phe-loi-hay-hai-cho-suc-khoe1524762701.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `name`) VALUES
(1, 'Manager'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `id_role`) VALUES
(1, 'admin', 'admin', 1),
(11, 'testuser1', '123456789', 2),
(13, 'testuser', '12345678', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
