-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2024 lúc 06:07 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `onishop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan1`
--

CREATE TABLE `binhluan1` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL,
  `sosao` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan1`
--

INSERT INTO `binhluan1` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`, `sosao`) VALUES
(1, 3, 7, '2020-08-14', '  gghnn', 3),
(2, 4, 7, '2020-08-14', '  nhẹ và đẹp', 2),
(3, 3, 5, '2020-08-14', 'lịch sự, nhã nhặn', 5),
(4, 3, 5, '2020-08-14', '  đẹp và lịch sự', 1),
(5, 3, 5, '2020-08-14', '  đẹp và lịch sự', 2),
(6, 3, 5, '2020-08-14', '  đẹp và lịch sự', 3),
(7, 3, 5, '2020-08-14', '  đẹp và lịch sự', 4),
(8, 3, 5, '2020-08-14', '  dfgdfsg', 2),
(9, 3, 5, '2020-08-14', '  dfgdfsg', 1),
(10, 3, 5, '2020-08-14', '  dfgdfsg', 4),
(11, 3, 5, '2020-08-14', '  dfgdfsg', 2),
(12, 3, 5, '2020-08-14', '  dfgdfsg', 3),
(13, 3, 5, '2020-08-14', '  hello', 3),
(14, 3, 5, '2020-08-14', '  hello', NULL),
(15, 3, 5, '2020-08-14', '  hello', NULL),
(16, 11, 8, '2024-05-03', '  đẹp', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon1`
--

CREATE TABLE `cthoadon1` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon1`
--

INSERT INTO `cthoadon1` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`, `tinhtrang`) VALUES
(7, 3, 2, 'Màu Hồng', 35, 1090000, 0),
(9, 3, 2, ' Màu Hồng', 35, 1090000, 0),
(9, 12, 2, 'Màu Be ', 0, 1150000, 0),
(10, 9, 2, 'Màu Kem ', 38, 1490000, 0),
(10, 15, 1, 'Màu Xám Nhạt ', 37, 545000, 0),
(11, 9, 2, 'Màu Kem ', 38, 1490000, 0),
(11, 15, 1, 'Màu Xám Nhạt ', 37, 545000, 0),
(12, 9, 2, 'Màu Kem ', 38, 1490000, 0),
(12, 15, 1, 'Màu Xám Nhạt ', 37, 545000, 0),
(13, 2, 1, 'Màu Trắng', 0, 545000, 0),
(13, 24, 3, 'Màu Đen ', 38, 1800000, 0),
(14, 2, 1, 'Màu Trắng', 0, 545000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `Nhom` int(4) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `Nhom`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `size`) VALUES
(1, 'House Sofa Classic', 140, 129, 'product-2.jpg', 1, 0, b'0', 29, '2020-08-08', '', 50, 'Màu Xám', 0),
(2, 'Ghế Phòng Khách', 90, 0, 'product-4.jpg', 4, 0, b'0', 30, '2020-08-08', '', 50, ' Màu Caro', 0),
(3, 'Tủ Kết Hợp Đèn Đầu Giường', 270, 259, 'product-1.jpg', 3, 0, b'0', 10, '2020-08-08', '', 50, 'Màu Xanh Navy ', 0),
(4, 'Tủ Đầu Giường', 199, 0, 'product-3.jpg', 3, 0, b'0', 34, '2020-08-08', '', 50, '', 0),
(5, 'Ghế Thư Giãn ', 169, 159, 'product-5.jpg', 4, 0, b'0', 22, '2020-08-08', '', 50, 'Màu Xanh Navy ', 37),
(6, 'Đèn Trang Trí', 111, 0, 'product-6.jpg', 1, 0, b'0', 45, '2020-08-08', '', 50, 'Màu Đen ', 36),
(9, 'Ghế Thiết Kế Hiện Đại', 125, 0, 'product-7.jpg', 4, 5, b'1', 23, '2020-08-08', '', 50, 'Màu Trắng ', 38),
(10, 'Ghế Phụ Sofa', 99, 0, 'product-8.jpg', 1, 5, b'1', 15, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi học', 50, 'Màu Kem ', 37),
(11, 'Sofa Hiện Đại', 200, 0, 'product-9.jpg', 1, 1, b'0', 44, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Be ', 38),
(12, 'Sofa Kết Hợp Tân-Cổ', 219, 0, 'product-10.jpg', 1, 1, b'0', 23, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Đen ', 38),
(15, 'Bàn Làm Việc Hiện Đại', 545, 0, 'product-11.jpeg', 2, 1, b'0', 34, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Xám Nhạt ', 37),
(16, 'Bàn Phong Cách Tối Giản', 400, 0, 'product-12.jpg', 2, 1, b'0', 11, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Hồng Đậm ', 37),
(17, 'Bàn Chữ L Hiện Đại', 699, 599, 'product-13.jpg', 2, 1, b'1', 66, '2020-08-08', 'Chất liệu nhân tạo. Phù hợp đi làm, đi chơi và đi tiệc', 50, 'Màu Đen ', 38),
(18, 'Bàn Làm Việc Chữ L Độc Đáo', 559, 0, 'product-14.jpg', 2, 8, b'0', 32, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 50, 'Xanh Bạc Hà ', 37),
(19, 'Bàn Phong Cách Hiện Đại', 299, 0, 'product-16.jpg', 3, 8, b'1', 12, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 50, 'Màu Vàng Đậm ', 35),
(20, 'Bàn Đầu Giường Tối Giản', 189, 0, 'product-18.jpg', 3, 8, b'0', 33, '2020-08-08', 'Da nhân tạo, Phù hợp đi chơi', 50, 'Màu Đen', 36),
(21, 'Tủ Đầu Giường 1 Ngăn', 215, 0, 'product-21.png', 3, 4, b'0', 19, '2020-08-15', 'Giày Búp Bê Đính Nơ Phối Họa Tiết Nhiệt Đới. Thích hợp đi làm, du lịch, đi dạo phố', 50, 'Màu vàng', 35),
(22, 'Tủ 1 Ngăn V2', 220, 0, 'product-22.png', 3, 4, b'0', 20, '2020-08-04', 'Thoải mái, đẹp', 23, 'Màu vàng nâu', 36),
(23, 'Ghế Lắc Lư', 110, 0, 'product-25.jpg', 4, 7, b'1', 17, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội', 12, 'Xanh đen', 38),
(24, 'Ghế Vải', 60, 0, 'product-23.jpg', 4, 7, b'1', 9, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội', 12, 'Xanh đen', 38),
(25, 'Ghế Gỗ ', 90, 80, 'product-24.jpg', 4, 7, b'1', 44, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội', 12, 'Xanh đen', 38),
(27, 'Tủ Quần Áo Kèm Gương', 799, 659, 'product-26.png', 5, 7, b'1', 99, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội', 12, 'Xanh đen', 38),
(28, 'Tủ Quần Áo Nhỏ', 399, 0, 'product-27.png', 5, 7, b'1', 56, '2020-07-04', 'Thời trang đi tiệc, đi chơi, dạ hội', 12, 'Xanh đen', 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon1`
--

CREATE TABLE `hoadon1` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon1`
--

INSERT INTO `hoadon1` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 7, '2020-08-13', 2240000),
(2, 7, '2020-08-13', 2240000),
(3, 7, '2020-08-13', 2240000),
(4, 7, '2020-08-13', 2240000),
(5, 7, '2020-08-13', 2240000),
(6, 7, '2020-08-13', 2240000),
(7, 7, '2020-08-13', 2240000),
(8, 7, '2020-08-13', 2240000),
(9, 7, '2020-08-13', 2240000),
(10, 7, '2020-08-13', 2035000),
(11, 7, '2020-08-13', 2035000),
(12, 7, '2020-08-13', 2035000),
(13, 5, '2020-09-02', 545000),
(14, 7, '2020-09-09', 545000),
(15, 8, '2024-05-03', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang1`
--

CREATE TABLE `khachhang1` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang1`
--

INSERT INTO `khachhang1` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `vaitro`) VALUES
(3, 'a', 'a', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(4, 'a', 'a', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(5, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(6, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(7, 'Nguyên', 'nguyen', '202cb962ac59075b964b07152d234b70', 'nguyen@gmail.com', '', '', 0),
(8, 'Nguyễn Thành Luân', 'oni123', 'c8b9e50a7feb88fa2c4d77f10aab7e02', 'aetaxongpha03@gmail.com', '0353088072', 'Ấp 11, xã bì', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Giày Cao Gót', 3),
(3, 'Giày Sandals', 3),
(4, 'Giày Búp Bê', 3),
(5, 'Giày Sneaker', 3),
(6, 'Giày Boots', 3),
(7, 'Giày Da Thật', 3),
(8, 'Giày Lười', 3),
(10, 'Túi da', 4),
(13, 'túi da', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `link`) VALUES
(1, 'Trang Chủ', 'index.php'),
(3, 'Giày', ''),
(4, 'Túi Xách', 'View/sanphamtui.php'),
(5, 'Liên Hệ', 'View/lienhe.php'),
(6, 'Tài Khoản', 'View/gioithieu.php');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `fk_bl_kh` (`makh`),
  ADD KEY `fk_bl_mahh` (`mahh`);

--
-- Chỉ mục cho bảng `cthoadon1`
--
ALTER TABLE `cthoadon1`
  ADD PRIMARY KEY (`masohd`,`mahh`),
  ADD KEY `fk_cthd_mahh` (`mahh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Chỉ mục cho bảng `hoadon1`
--
ALTER TABLE `hoadon1`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `fk_hoadon_kh` (`makh`);

--
-- Chỉ mục cho bảng `khachhang1`
--
ALTER TABLE `khachhang1`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`),
  ADD KEY `FK_loai_menu` (`idmenu`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan1`
--
ALTER TABLE `binhluan1`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `hoadon1`
--
ALTER TABLE `hoadon1`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khachhang1`
--
ALTER TABLE `khachhang1`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD CONSTRAINT `fk_bl_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`),
  ADD CONSTRAINT `fk_bl_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Các ràng buộc cho bảng `cthoadon1`
--
ALTER TABLE `cthoadon1`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `hoadon1` (`masohd`),
  ADD CONSTRAINT `fk_cthd_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Các ràng buộc cho bảng `hoadon1`
--
ALTER TABLE `hoadon1`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`);

--
-- Các ràng buộc cho bảng `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `FK_loai_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
