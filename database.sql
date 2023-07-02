-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2023 lúc 12:14 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `database`;

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `ID_HOADON` int(11) NOT NULL,
  `ID_PHONG` int(11) NOT NULL,
  `ID_DV` int(11) NOT NULL,
  `GIA_DV` int(11) NOT NULL,
  `GIA_PHONG` int(11) DEFAULT NULL,
  `CHECK_IN` date NOT NULL,
  `CHECK_OUT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`ID_HOADON`, `ID_PHONG`, `ID_DV`, `GIA_DV`, `GIA_PHONG`, `CHECK_IN`, `CHECK_OUT`) VALUES
(3, 18, 1, 500000, 2500000, '2023-04-18', '2023-04-20'),
(4, 5, 1, 500000, 2000000, '2023-04-21', '2023-04-23'),
(4, 18, 1, 500000, 2000000, '2023-04-21', '2023-04-23'),
(5, 1, 1, 500000, 2000000, '2023-04-21', '2023-04-22'),
(5, 1, 2, 200000, 2000000, '2023-04-21', '2023-04-22'),
(5, 1, 3, 200000, 2000000, '2023-04-21', '2023-04-22'),
(5, 1, 4, 200000, 2000000, '2023-04-21', '2023-04-22'),
(6, 2, 1, 500000, 2000000, '2023-04-22', '2023-04-23'),
(6, 2, 2, 200000, 2000000, '2023-04-22', '2023-04-23'),
(6, 2, 3, 200000, 2000000, '2023-04-22', '2023-04-23'),
(6, 2, 4, 200000, 2000000, '2023-04-22', '2023-04-23'),
(7, 4, 1, 500000, 2000000, '2023-04-22', '2023-04-23'),
(7, 4, 2, 200000, 2000000, '2023-04-22', '2023-04-23'),
(7, 4, 3, 200000, 2000000, '2023-04-22', '2023-04-23'),
(7, 4, 4, 200000, 2000000, '2023-04-22', '2023-04-23'),
(8, 3, 1, 500000, 2000000, '2023-04-22', '2023-04-23'),
(8, 3, 2, 200000, 2000000, '2023-04-22', '2023-04-23'),
(8, 3, 3, 200000, 2000000, '2023-04-22', '2023-04-23'),
(8, 3, 4, 200000, 2000000, '2023-04-22', '2023-04-23'),
(9, 6, 1, 500000, 2500000, '2023-04-22', '2023-04-23'),
(9, 6, 4, 200000, 2500000, '2023-04-22', '2023-04-23'),
(10, 8, 2, 200000, 2500000, '2023-04-22', '2023-04-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_dichvu`
--

CREATE TABLE `ds_dichvu` (
  `ID` int(11) NOT NULL,
  `TEN_DICHVU` varchar(30) NOT NULL,
  `GIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ds_dichvu`
--

INSERT INTO `ds_dichvu` (`ID`, `TEN_DICHVU`, `GIA`) VALUES
(1, 'Taxi', 500000),
(2, 'Breakfast', 200000),
(3, 'Lunch', 200000),
(4, 'Dinner', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_hoadon`
--

CREATE TABLE `ds_hoadon` (
  `id_hd` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ds_hoadon`
--

INSERT INTO `ds_hoadon` (`id_hd`, `id_kh`, `tongtien`, `ngay`) VALUES
(3, 4, 2500000, '2023-04-20'),
(4, 5, 5000000, '2023-04-19'),
(5, 9, 3100000, '2023-04-21'),
(6, 8, 3100000, '2023-04-22'),
(7, 8, 3100000, '2023-04-22'),
(8, 10, 3100000, '2023-04-22'),
(9, 11, 3200000, '2023-04-22'),
(10, 12, 2700000, '2023-04-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_khachhang`
--

CREATE TABLE `ds_khachhang` (
  `ID_KHACHHANG` int(10) NOT NULL,
  `TEN_KHACHHANG` varchar(30) NOT NULL,
  `DIACHI` varchar(50) NOT NULL,
  `SDT` varchar(13) NOT NULL,
  `PICTURE` varchar(100) DEFAULT NULL,
  `SO_THE` varchar(19) DEFAULT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `DOB` date NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ds_khachhang`
--

INSERT INTO `ds_khachhang` (`ID_KHACHHANG`, `TEN_KHACHHANG`, `DIACHI`, `SDT`, `PICTURE`, `SO_THE`, `USERNAME`, `DOB`, `EMAIL`) VALUES
(4, 'LÊ THỊ PHI DU', 'BẾN TRE', '0386207465', NULL, '0386207465293721', 'phidu123', '0000-00-00', ''),
(5, 'PHẠM TRẦN THẢO NGUYÊN', 'TPHCM', '0773339855', NULL, NULL, NULL, '0000-00-00', ''),
(7, 'Phi Du', '123 Tp. HCM', '0123456798', 'Screenshot from 2022-11-26 14-15-19.png', '43326543454345', 'du1', '2003-04-20', 'du1@gmail.com'),
(8, 'The Anh', 'Mỏ Cày Nam, Bến Tre', '0386207464', 'Screenshot (263).png', '8392938474937289', 'thenanh', '1999-12-11', 'theanh@gmail.com'),
(9, 'HUỲNH MINH TUẤN', 'Mỏ Cày Nam, Bến Tre', '0738933927', 'Screenshot (265).png', '848409304839203', 'minhtuan', '2003-11-13', 'minhtuan@gmail.com'),
(10, 'diệu mơ', '', '386207465', NULL, '949403023833', NULL, '0000-00-00', ''),
(11, 'Thảo Nguyên', '', '3862794872', NULL, '749302404389202', NULL, '0000-00-00', ''),
(12, 'Lê Thị Phi Du', 'Mỏ Cày Nam, Bến Tre', '0386207465', 'avt.jpg', '5210078252100782', 'phidu', '2003-01-01', 'lethiphidu2212@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_loaiphong`
--

CREATE TABLE `ds_loaiphong` (
  `ID_LOAIPHONG` char(10) NOT NULL,
  `TEN_LOAIPHONG` varchar(20) NOT NULL,
  `SOLUONG` int(1) NOT NULL,
  `GIA` int(1) NOT NULL,
  `HINHANH` varchar(100) NOT NULL,
  `FEATURES` varchar(50) NOT NULL,
  `FACILITIES` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ds_loaiphong`
--

INSERT INTO `ds_loaiphong` (`ID_LOAIPHONG`, `TEN_LOAIPHONG`, `SOLUONG`, `GIA`, `HINHANH`, `FEATURES`, `FACILITIES`) VALUES
('L01', 'Single Room (SGL)', 5, 2000000, 'room (1).jpg', '1 Bed    |    1 Bathroom    |    1 Balcony', 'Telivision    |    Wifi    |     Air-conditioner'),
('L02', 'Twin Room (TWN)', 5, 2000000, 'room (2).jpg', '2 Beds   |    1 Bathroom    |    1 Balcony', 'Telivision    |    Wifi    |     Air-conditioner'),
('L03', 'Double Room (DBL)', 5, 2500000, 'room (3).jpg', '1 Large Bed    |    1 Bathroom    |    1 Balcony', 'Telivision    |    Wifi    |     Air-conditioner'),
('L04', 'Triple Room(TRPL)', 5, 5000000, 'room (4).jpg', ' 3 Small Beds or 1 Large Bed + 1 Small Bed', 'Telivision    |    Wifi    |     Air-conditioner');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_phong`
--

CREATE TABLE `ds_phong` (
  `ID_PHONG` int(10) NOT NULL,
  `TEN_PHONG` varchar(30) NOT NULL,
  `ID_LOAIPHONG` varchar(10) NOT NULL,
  `DANHGIA` int(1) DEFAULT NULL,
  `HINHANH` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ds_phong`
--

INSERT INTO `ds_phong` (`ID_PHONG`, `TEN_PHONG`, `ID_LOAIPHONG`, `DANHGIA`, `HINHANH`, `status`) VALUES
(1, 'P-101', 'L01', 5, 'images (2).jpg', 1),
(2, 'P-102', 'L01', 5, 'room (2).jpg', 1),
(3, 'P-201', 'L02', 5, 'room (3).jpg', 1),
(4, 'P-202', 'L02', 5, 'room (14).jpg', 1),
(5, 'P-203', 'L02', 5, 'room (12).jpg', 1),
(6, 'P-301', 'L03', 5, 'room (11).jpg', 1),
(7, 'P-302', 'L03', 5, 'room (3).jpg', 1),
(8, 'P-303', 'L03', 5, 'room (11).jpg', 1),
(10, 'P-103', 'L01', 5, 'room (3).jpg', 1),
(11, 'P-104', 'L01', 5, 'room (9).jpg', 1),
(12, 'P-205', 'L02', 5, 'room (15).jpg', 1),
(13, 'P-304', 'L03', 5, 'room (10).jpg', 1),
(14, 'P-305', 'L03', 5, 'room (11).jpg', 1),
(15, 'P-403', 'L04', 5, 'room (18).jpg', 1),
(17, 'P-405', 'L04', 5, 'room (19).jpg', 1),
(18, 'P-105', 'L01', 5, 'room (3).jpg', 1),
(20, 'P-106', 'L04', 5, 'room (1).jpg', 1),
(21, 'P-306', 'L04', 5, 'room (12).jpg', 1),
(22, 'P-401', 'L04', 5, 'room (8).jpg', 1),
(23, 'P-110', 'L04', 5, 'room (6).jpg', 1),
(24, 'P-208', 'L04', 5, 'images (1).jpg', 1),
(25, 'P-204', 'L04', 5, 'images (2).jpg', 1),
(26, 'P-207', 'L04', 5, 'images (4).jpg', 1),
(27, 'P-307', 'L04', 5, 'tải xuống (1).jpg', 1),
(28, 'P-308', 'L04', 5, 'tải xuống.jpg', 1),
(29, 'P-309', 'L04', 5, 'images (5).jpg', 1),
(30, 'P-407', 'L04', 5, 'images (1).jpg', 1),
(31, 'P-409', 'L04', 5, 'tải xuống (4).jpg', 1),
(32, 'P-109', 'L04', 5, 'images (4).jpg', 1),
(33, 'Single', 'L04', 5, 'tải xuống.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(30) NOT NULL,
  `site_about` varchar(5000) NOT NULL,
  `shut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_about`, `shut`) VALUES
(1, 'AURORA HOTEL', 'Welcome to our luxury hotel website! We are excited to showcase our exceptional property that offers unparalleled accommodations and world-class services to our esteemed guests. Our hotel is situated in a prime location, with stunning views of the cityscape, and provides easy access to local attractions, entertainment, and dining options.\n\nOur elegantly designed rooms and suites are tastefully decorated to create a soothing atmosphere that guarantees ultimate relaxation and comfort. We offer a wide range of room types, including deluxe rooms, premium suites, and exclusive presidential suites, each with their own unique features and amenities.\n\nOur dedicated team of professionals is committed to ensuring that your stay with us is unforgettable. From our attentive housekeeping staff to our knowledgeable concierge team, we strive to exceed your expectations and provide personalized service that caters to your every need.\n\nAt our hotel, we offer a variety of on-site amenities and services that cater to both leisure and business travelers. Our state-of-the-art fitness center is equipped with the latest equipment and technology, and our spa offers a range of rejuvenating treatments that are sure to leave you feeling refreshed and renewed.\n\nFor your dining pleasure, we offer a selection of dining options that are sure to satisfy any palate. From our fine-dining restaurant that serves up an array of delicious international cuisines to our cozy café that offers a variety of snacks and drinks, we have something to suit every taste.\n\nWe also offer an array of facilities and services for our business guests, including fully equipped meeting rooms, a business center, and high-speed internet access throughout the hotel.\n\nWe invite you to explore our website to learn more about our hotel, amenities, and special offers. We are confident that you will find everything you need for an unforgettable stay at our luxury hotel. Thank you for considering our hotel for your next trip, and we look forward to welcoming you soon!', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isActivated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`USERNAME`, `PASSWORD`, `isAdmin`, `isActivated`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
('du1', '202cb962ac59075b964b07152d234b70', 0, 1),
('minhtuan', 'c33367701511b4f6020ec61ded352059', 0, 1),
('phidu', 'e10adc3949ba59abbe56e057f20f883e', 0, 1),
('phidu123', '123456', 0, 1),
('thenanh', 'fcea920f7412b5da7be0cf42b8c93759', 0, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`ID_HOADON`,`ID_PHONG`,`ID_DV`),
  ADD KEY `cthd_ibfk_2` (`ID_DV`),
  ADD KEY `ID_PHONG` (`ID_PHONG`);

--
-- Chỉ mục cho bảng `ds_dichvu`
--
ALTER TABLE `ds_dichvu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `ds_hoadon`
--
ALTER TABLE `ds_hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `ds_khachhang`
--
ALTER TABLE `ds_khachhang`
  ADD PRIMARY KEY (`ID_KHACHHANG`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Chỉ mục cho bảng `ds_loaiphong`
--
ALTER TABLE `ds_loaiphong`
  ADD PRIMARY KEY (`ID_LOAIPHONG`);

--
-- Chỉ mục cho bảng `ds_phong`
--
ALTER TABLE `ds_phong`
  ADD PRIMARY KEY (`ID_PHONG`),
  ADD KEY `FK_ID` (`ID_LOAIPHONG`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ds_dichvu`
--
ALTER TABLE `ds_dichvu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ds_hoadon`
--
ALTER TABLE `ds_hoadon`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ds_khachhang`
--
ALTER TABLE `ds_khachhang`
  MODIFY `ID_KHACHHANG` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `ds_phong`
--
ALTER TABLE `ds_phong`
  MODIFY `ID_PHONG` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_1` FOREIGN KEY (`ID_HOADON`) REFERENCES `ds_hoadon` (`id_hd`),
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`ID_DV`) REFERENCES `ds_dichvu` (`ID`),
  ADD CONSTRAINT `cthd_ibfk_3` FOREIGN KEY (`ID_PHONG`) REFERENCES `ds_phong` (`ID_PHONG`);

--
-- Các ràng buộc cho bảng `ds_hoadon`
--
ALTER TABLE `ds_hoadon`
  ADD CONSTRAINT `ds_hoadon_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `ds_khachhang` (`ID_KHACHHANG`);

--
-- Các ràng buộc cho bảng `ds_khachhang`
--
ALTER TABLE `ds_khachhang`
  ADD CONSTRAINT `ds_khachhang_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `taikhoan` (`USERNAME`);

--
-- Các ràng buộc cho bảng `ds_phong`
--
ALTER TABLE `ds_phong`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`ID_LOAIPHONG`) REFERENCES `ds_loaiphong` (`ID_LOAIPHONG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
