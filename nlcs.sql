-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 01:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nlcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `sdt`, `password`) VALUES
(1, 'doanthuyadmin', '123456789', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `code_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_chitietdonhang`, `code_donhang`, `id_sanpham`, `SoLuong`, `sale`) VALUES
(52, 5821, 41, 1, 5),
(53, 221, 29, 2, 10),
(54, 5893, 27, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `noidung_danhgia` text NOT NULL,
  `ngaydanhgia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_sanpham` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_danhgia`
--

INSERT INTO `tbl_danhgia` (`id_danhgia`, `id_khachhang`, `noidung_danhgia`, `ngaydanhgia`, `id_sanpham`, `star`) VALUES
(48, 8, 'Ngon lắm ', '2023-10-06 07:32:52', 41, 5),
(49, 9, 'Cam cũng khá ngọt đó', '2023-10-06 09:25:25', 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Rau', 1),
(2, 'Củ', 2),
(3, 'Quả', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_donhang` int(11) NOT NULL,
  `ngaydh` datetime NOT NULL,
  `donhang_tinhtrang` int(11) NOT NULL,
  `donhang_thanhtoan` varchar(100) NOT NULL,
  `donhang_vanchuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `id_khachhang`, `code_donhang`, `ngaydh`, `donhang_tinhtrang`, `donhang_thanhtoan`, `donhang_vanchuyen`) VALUES
(39, 8, 5821, '2023-10-06 14:36:59', 0, 'Cash', 7),
(40, 8, 221, '2023-10-06 15:16:49', 0, 'Cash', 7),
(41, 9, 5893, '2023-10-06 16:27:35', 0, 'Cash', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id_khachhang`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(8, 'Nguyễn Lê Đoan Thùy', 'doanthuy@gmail.com', 'Can Tho', 'e10adc3949ba59abbe56e057f20f883e', '123456789'),
(9, 'Thái Minh Tuấn', 'tuanthai@gmail.com', 'CTU', 'e10adc3949ba59abbe56e057f20f883e', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `id` int(11) NOT NULL,
  `tennhacungcap` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`id`, `tennhacungcap`, `diachi`, `dienthoai`, `thutu`) VALUES
(1, 'BachHoaXanh', 'Ninh Kieu', 123456789, 1),
(2, 'GreenFarm', 'Cai Rang', 25312468, 2),
(3, 'DoanThuy', 'Vietnamese', 946850747, 3),
(4, 'IT', 'CTU', 88833352, 4),
(5, 'HiFarm', 'USA', 123456, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhaphang`
--

CREATE TABLE `tbl_nhaphang` (
  `id_nhaphang` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `ngaynhap` date DEFAULT NULL,
  `gianhap` int(11) NOT NULL,
  `soluong1` int(100) NOT NULL,
  `soluongdaban` int(11) DEFAULT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tinhtrang` int(100) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nhaphang`
--

INSERT INTO `tbl_nhaphang` (`id_nhaphang`, `tensanpham`, `ngaynhap`, `gianhap`, `soluong1`, `soluongdaban`, `hinhanh`, `tinhtrang`, `id_ncc`, `id_danhmuc`) VALUES
(25, 'Ca chua', '2023-09-29', 600000, 50, NULL, '1695953662_tomato.jpeg', 1, 5, 3),
(26, 'Chuối', '2023-10-02', 10000, 100, 2, '1696237994_000377497-1.webp', 1, 5, 3),
(27, 'Táo', '2023-10-02', 20000, 5, NULL, '1696238095_apple.jpg', 1, 2, 3),
(28, 'Cam', '2023-10-02', 10000, 10, 1, '1696238151_cam-sanh-ngot-gia-re.jpg', 1, 3, 3),
(29, 'Nho', '2023-10-02', 50000, 10, NULL, '1696238252_nho-do-khong-hat-uc-thompson-nhobonmuacom.webp', 1, 4, 3),
(30, 'Chôm chôm', '2023-10-02', 5000, 10, NULL, '1696239067_chomchom.png', 1, 1, 3),
(31, 'Sầu riêng', '2023-10-02', 100000, 50, NULL, '1696239139_saurieng.jpg', 1, 4, 3),
(32, 'Đu đủ', '2023-10-02', 5000, 5, NULL, '1696239189_dudu.webp', 1, 2, 3),
(33, 'Dưa leo', '2023-10-02', 2000, 10, NULL, '1696239264_dualeo.webp', 1, 1, 3),
(34, 'Khoai lang', '2023-10-03', 12000, 50, NULL, '1696325931_khoailang.webp', 1, 5, 2),
(35, 'Khoai tây', '2023-10-03', 10000, 10, NULL, '1696325954_khoaitay.jpg', 1, 1, 2),
(36, 'Cà rốt', '2023-10-03', 5000, 20, NULL, '1696325977_carot.webp', 1, 2, 2),
(37, 'Bắp cải', '2023-10-03', 15000, 20, NULL, '1696326027_bapcai.jpg', 1, 3, 1),
(38, 'Cải thảo', '2023-10-03', 7000, 20, NULL, '1696326059_caithao.webp', 1, 2, 1),
(39, 'Xà lách', '2023-10-03', 15000, 50, NULL, '1696326120_xalach.jpg', 1, 4, 1),
(40, 'Cải thìa', '2023-10-03', 10000, 50, 1, '1696328527_caithia.jpeg', 1, 1, 1),
(41, 'Mồng tơi', '2023-10-03', 8000, 20, NULL, '1696328571_mongtoi.webp', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `masp` varchar(255) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `giasp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `soluongdaban` int(11) DEFAULT NULL,
  `loinhuan` int(11) DEFAULT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `id_ncc` int(11) NOT NULL,
  `id_nh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `gianhap`, `giasp`, `soluong`, `soluongdaban`, `loinhuan`, `hinhanh`, `tomtat`, `noidung`, `sale`, `tinhtrang`, `id_danhmuc`, `id_ncc`, `id_nh`) VALUES
(26, 'Ca chua', '1403', 30000, 35000, 10, NULL, NULL, '1696323800_cachua.jpg', '<p>Hello</p>\r\n', '<p>Hello</p>\r\n', 0, 1, 3, 5, 25),
(27, 'Cam sành 1KG', '001', 10000, 12000, 9, 1, 2000, '1696238637_cam-sanh-ngot-gia-re.jpg', '<p>Chua, ch&aacute;t, kh&ocirc;ng ngọt.</p>\r\n', '<p>Chua, ch&aacute;t, kh&ocirc;ng ngọt.</p>\r\n', 0, 1, 3, 2, 28),
(28, 'Đu đủ 1KG', '002', 5000, 7000, 5, NULL, NULL, '1696239730_dudu.webp', '<p>Đu đủ vườn, tự nhi&ecirc;n.</p>\r\n', '<p>Uy t&iacute;n, chất lượng.</p>\r\n', 0, 1, 3, 2, 32),
(29, 'Chuối 0.5KG', '004', 10000, 12000, 98, 2, 1600, '1696324003_000377497-1.webp', '<p>Chuối ch&iacute;n v&agrave;ng</p>\r\n', '<p>Ngon bổ dưỡng</p>\r\n', 10, 1, 3, 5, 26),
(30, 'Cải thảo 1KG', '003', 7000, 10000, 20, NULL, NULL, '1696326346_caithao.webp', '<p>Cải thảo kh&ocirc;ng thuốc trừ s&acirc;u</p>\r\n', '<p>An to&agrave;n cho sức khỏe</p>\r\n', 5, 1, 1, 2, 38),
(31, 'Cà rốt 0.5KG', '005', 5000, 8000, 20, NULL, NULL, '1696326407_carot.webp', '<p>C&agrave; rốt</p>\r\n', '<p>C&agrave; rốt</p>\r\n', 0, 1, 2, 2, 36),
(32, 'Khoai lang 1KG', '006', 12000, 15000, 50, NULL, NULL, '1696326463_khoailang.webp', '<p>Khoai lang</p>\r\n', '<p>Khoai lang</p>\r\n', 0, 1, 2, 5, 34),
(33, 'Sầu riêng 1KG', '007', 100000, 120000, 50, NULL, NULL, '1696326626_saurieng.jpg', '<p>Sầu ri&ecirc;ng</p>\r\n', '<p>Sầu ri&ecirc;ng</p>\r\n', 0, 1, 3, 4, 31),
(34, 'Xà lách 1KG', '008', 15000, 17000, 50, NULL, NULL, '1696326686_xalach.jpg', '<p>X&agrave; l&aacute;ch</p>\r\n', '<p>X&agrave; l&aacute;ch</p>\r\n', 0, 1, 1, 4, 39),
(35, 'Khoai tây 1KG', '009', 10000, 12000, 10, NULL, NULL, '1696326748_khoaitay.jpg', '<p>Khoai t&acirc;y</p>\r\n', '<p>Khoai t&acirc;y</p>\r\n', 0, 1, 2, 1, 35),
(36, 'Dưa leo 0.5KG', '010', 2000, 5000, 10, NULL, NULL, '1696326817_dualeo.webp', '<p>Dưa leo</p>\r\n', '<p>Dưa leo</p>\r\n', 0, 1, 3, 1, 33),
(37, 'Chôm chôm 1KG', '011', 5000, 10000, 10, NULL, NULL, '1696328027_chomchom.png', '<p>Ch&ocirc;m Ch&ocirc;m</p>\r\n', '<p>Ch&ocirc;m Ch&ocirc;m</p>\r\n', 0, 1, 3, 1, 30),
(38, 'Táo 1KG', '012', 20000, 25000, 5, NULL, NULL, '1696328178_apple.jpg', '<p>T&aacute;o</p>\r\n', '<p>T&aacute;o</p>\r\n', 0, 1, 3, 2, 27),
(39, 'Nho 0.5KG', '013', 50000, 60000, 10, NULL, NULL, '1696328457_nho-do-khong-hat-uc-thompson-nhobonmuacom.webp', '<p>Nho</p>\r\n', '<p>Nho</p>\r\n', 0, 1, 3, 4, 29),
(40, 'Mồng tơi', '014', 8000, 10000, 20, NULL, NULL, '1696329330_mongtoi.webp', '<p>Mồng tơi</p>\r\n', '<p>Mồng tơi</p>\r\n', 0, 1, 1, 4, 41),
(41, 'Cải thìa 1KG', '015', 10000, 15000, 49, 1, 4250, '1696329372_caithia.jpeg', '<p>Cải th&igrave;a</p>\r\n', '<p>Cải th&igrave;a</p>\r\n', 5, 1, 1, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydh` date NOT NULL,
  `sodonhang` int(11) NOT NULL,
  `doanhthu` int(11) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydh`, `sodonhang`, `doanhthu`, `soluongban`) VALUES
(37, '2023-10-06', 3, 47850, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tintuc`
--

CREATE TABLE `tbl_tintuc` (
  `id` int(11) NOT NULL,
  `tentintuc` varchar(255) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vanchuyen`
--

CREATE TABLE `tbl_vanchuyen` (
  `id_vanchuyen` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vanchuyen`
--

INSERT INTO `tbl_vanchuyen` (`id_vanchuyen`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(7, 'Nguyễn Lê Đoan Thùy', '123456789', 'CanTho', 'Hi', 8),
(8, 'Thái Minh Tuấn', '123456', 'CTU', 'Thầy thích ăn cam lắm .', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdonhang`);

--
-- Indexes for table `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`id_danhgia`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Indexes for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nhaphang`
--
ALTER TABLE `tbl_nhaphang`
  ADD PRIMARY KEY (`id_nhaphang`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Indexes for table `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vanchuyen`
--
ALTER TABLE `tbl_vanchuyen`
  ADD PRIMARY KEY (`id_vanchuyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_nhaphang`
--
ALTER TABLE `tbl_nhaphang`
  MODIFY `id_nhaphang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vanchuyen`
--
ALTER TABLE `tbl_vanchuyen`
  MODIFY `id_vanchuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
