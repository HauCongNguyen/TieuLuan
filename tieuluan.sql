-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2022 lúc 08:35 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tieuluan`
--
CREATE DATABASE IF NOT EXISTS `tieuluan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tieuluan`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `sdt`, `password`) VALUES
(1, 'huyadmin', 123456789, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_chitietdonhang` int(11) NOT NULL,
  `code_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_chitietdonhang`, `code_donhang`, `id_sanpham`, `SoLuong`, `sale`) VALUES
(1, 4632, 3, 1, 5),
(2, 4632, 2, 3, 0),
(3, 4632, 1, 4, 0),
(4, 8292, 5, 2, 10),
(5, 8292, 9, 3, 0),
(6, 786, 6, 1, 0),
(7, 786, 12, 1, 0),
(8, 3993, 5, 4, 10),
(9, 3993, 6, 5, 0),
(10, 8620, 6, 1, 0),
(11, 8620, 9, 1, 0),
(12, 4822, 15, 2, 0),
(13, 4822, 2, 1, 0),
(14, 4822, 7, 3, 0),
(15, 4822, 14, 4, 0),
(16, 4318, 4, 2, 10),
(17, 688, 10, 5, 0),
(18, 2821, 1, 1, 0),
(19, 9560, 1, 1, 0),
(20, 1895, 1, 1, 5),
(21, 6528, 1, 1, 0),
(22, 1970, 1, 1, 0),
(23, 8504, 1, 2, 0),
(24, 897, 1, 1, 5),
(25, 8634, 1, 1, 0),
(26, 5471, 1, 1, 0),
(27, 3524, 1, 1, 5),
(28, 4996, 1, 1, 0),
(29, 4996, 2, 1, 0),
(30, 3377, 1, 1, 0),
(31, 3377, 2, 1, 0),
(32, 4248, 2, 1, 0),
(33, 4248, 1, 1, 0),
(34, 3311, 6, 1, 0),
(35, 3311, 7, 1, 0),
(36, 638, 7, 1, 2),
(37, 6166, 1, 1, 0),
(38, 4487, 1, 1, 0),
(39, 8112, 1, 1, 5),
(40, 3619, 1, 1, 5),
(41, 6931, 1, 1, 0),
(42, 5720, 1, 1, 5),
(43, 9969, 1, 1, 0),
(44, 1961, 1, 1, 0),
(45, 7240, 6, 1, 2),
(46, 9679, 24, 1, 0),
(47, 9679, 23, 1, 2),
(48, 5666, 23, 1, 2),
(49, 5666, 24, 1, 0),
(50, 6065, 23, 1, 0),
(51, 18, 22, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhgia`
--

CREATE TABLE `tbl_danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `noidung_danhgia` text NOT NULL,
  `ngaydanhgia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_sanpham` int(11) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhgia`
--

INSERT INTO `tbl_danhgia` (`id_danhgia`, `id_khachhang`, `noidung_danhgia`, `ngaydanhgia`, `id_sanpham`, `star`) VALUES
(1, 1, 'Sản phẩm này đẹp quá shop ơi!!!', '2022-10-30 18:44:48', 2, 5),
(2, 1, 'Sản phẩm này đẹp quá shop ơi!!!', '2022-10-30 18:51:05', 2, 5),
(3, 2, 'Sản phẩm này đẹp, sẽ quay lại ủng hộ!!!', '2022-10-30 18:52:32', 1, 4),
(4, 2, 'Sản phẩm này không đẹp, chê!!!', '2022-10-30 18:53:06', 1, 1),
(5, 2, 'Sản phẩm này đẹp, sẽ quay lại ủng hộ ạ!!!', '2022-10-30 18:53:55', 2, 5),
(6, 2, 'Sản phẩm này đẹp dã man, sẽ quay lại ủng hộ dài dài!!!', '2022-10-30 18:55:16', 2, 5),
(7, 2, 'Sản phẩm này đẹp dã man, sẽ quay lại ủng hộ dài dài!!!', '2022-10-30 18:56:17', 2, 5),
(8, 2, 'Sản phẩm này đẹp dã man, sẽ quay lại ủng hộ dài dài!!!', '2022-10-30 18:56:24', 2, 5),
(9, 2, 'Sản phẩm ok giao hàng cẩn thận cho 5 sao!!!', '2022-10-30 18:57:02', 2, 5),
(10, 2, 'Sản phẩm xấu quá :(((', '2022-10-30 19:06:46', 2, 1),
(11, 3, 'Sản phẩm ok nhưng giao hàng chậm cho 3 sao!!', '2022-10-30 19:07:50', 2, 3),
(12, 3, 'Cập nhật thông tin lẹ shop ơi !!!', '2022-10-30 19:13:14', 10, 3),
(13, 3, 'Sản phẩm đẹp, giao hàng nhanh, 1 ngày đã có , sẽ quay lại ủng hộ !!!', '2022-10-30 19:13:46', 10, 5),
(14, 3, 'Sản phẩm đẹp nha, xuất sắc!!!', '2022-10-30 19:20:30', 5, 5),
(15, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:21:10', 1, 5),
(16, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:21:25', 5, 5),
(17, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:21:36', 4, 5),
(18, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:21:48', 3, 5),
(19, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:21:57', 6, 5),
(20, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:22:16', 7, 5),
(21, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:22:31', 12, 1),
(22, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:22:39', 12, 2),
(23, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:22:47', 12, 3),
(24, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:22:55', 12, 4),
(25, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:09', 11, 4),
(26, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:16', 11, 1),
(27, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:32', 13, 4),
(28, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:39', 13, 3),
(29, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:45', 13, 5),
(30, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:53', 9, 3),
(31, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:23:57', 9, 1),
(32, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:24:02', 9, 5),
(33, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:24:11', 8, 2),
(34, 5, 'Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:24:18', 8, 4),
(35, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:24:23', 8, 1),
(36, 5, 'Sản phẩm đẹp xuất sắc!!!', '2022-10-30 19:24:41', 2, 5),
(37, 6, 'Sản phẩm tuyệt vời sẽ quay lại lần sau!!!', '2022-10-31 10:37:42', 10, 5),
(38, 2, 'Trên cả tuyệt vời, cho 5 sao', '2022-10-31 19:46:48', 14, 5),
(39, 2, 'Sản phẩm đẹp quá, rẻ quá trời :)))', '2022-10-31 19:47:29', 15, 5),
(40, 1, 'Không đẹp lắm', '2022-11-02 06:22:17', 16, 1),
(41, 1, 'Không đẹp lắm', '2022-11-02 06:31:43', 16, 1),
(42, 1, 'Sản phẩm đẹp tuyệt vời', '2022-11-02 06:32:03', 16, 5),
(43, 1, 'Sản phẩm đẹp !!!', '2022-11-02 06:58:12', 18, 5),
(44, 1, 'Không đẹp ', '2022-11-02 06:58:47', 17, 1),
(45, 1, 'Sản phẩm được ', '2022-11-02 07:21:24', 1, 4),
(46, 5, 'Sản phẩm tuyệt vời ', '2022-11-06 10:21:23', 24, 5),
(47, 5, 'Đẹp bền !1!111!!', '2022-11-06 10:21:46', 23, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'KHUYÊN TAI', 1),
(2, 'NHẪN', 2),
(3, 'DÂY CHUYỀN', 3),
(4, 'VÒNG TAY', 4),
(5, 'ĐỒNG HỒ', 5),
(7, 'BỘ NHẪN CẶP ĐÔI', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id_donhang` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_donhang` int(11) NOT NULL,
  `ngaydh` datetime NOT NULL,
  `donhang_tinhtrang` int(11) NOT NULL,
  `donhang_thanhtoan` varchar(100) NOT NULL,
  `donhang_vanchuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id_donhang`, `id_khachhang`, `code_donhang`, `ngaydh`, `donhang_tinhtrang`, `donhang_thanhtoan`, `donhang_vanchuyen`) VALUES
(1, 2, 4632, '2022-10-26 02:45:12', 0, 'Banking', 2),
(2, 2, 8292, '2022-10-26 13:06:43', 0, 'Cash', 2),
(3, 2, 786, '2022-10-26 13:20:20', 0, 'Cash', 2),
(4, 1, 3993, '2022-10-26 20:57:26', 0, 'Banking', 3),
(5, 3, 8620, '2022-10-26 20:59:23', 0, 'Cash', 4),
(6, 2, 4822, '2022-11-01 02:43:51', 0, 'Banking', 2),
(7, 1, 4318, '2022-11-02 15:16:28', 0, 'Cash', 3),
(8, 2, 688, '2022-11-04 18:05:56', 0, 'Cash', 2),
(9, 2, 2821, '2022-11-05 10:00:34', 0, 'Cash', 2),
(10, 2, 9560, '2022-11-05 10:03:05', 0, 'Banking', 2),
(11, 2, 1895, '2022-11-05 10:05:52', 0, 'Cash', 2),
(12, 2, 6528, '2022-11-05 10:16:19', 0, 'Cash', 2),
(13, 2, 1970, '2022-11-05 10:22:59', 0, 'Cash', 2),
(14, 2, 8504, '2022-11-05 10:23:56', 0, 'Cash', 2),
(15, 2, 897, '2022-11-05 10:24:47', 0, 'Cash', 2),
(16, 2, 8634, '2022-11-05 10:34:16', 0, 'Cash', 2),
(17, 2, 5471, '2022-11-05 10:55:34', 0, 'Cash', 2),
(18, 2, 3524, '2022-11-05 10:57:25', 0, 'Cash', 2),
(19, 2, 4996, '2022-11-05 11:00:24', 0, 'Cash', 2),
(20, 2, 3377, '2022-11-05 11:04:45', 0, 'Cash', 2),
(21, 2, 4248, '2022-11-05 11:05:53', 0, 'Cash', 2),
(22, 2, 3311, '2022-11-05 11:08:17', 0, 'Cash', 2),
(23, 2, 638, '2022-11-05 16:20:43', 0, 'Cash', 2),
(24, 2, 6166, '2022-11-05 16:37:57', 0, 'Cash', 2),
(25, 2, 4487, '2022-11-05 16:39:34', 0, 'Cash', 2),
(26, 2, 8112, '2022-11-05 16:40:42', 0, 'Cash', 2),
(27, 2, 3619, '2022-11-05 16:43:35', 0, 'Cash', 2),
(28, 2, 6931, '2022-11-05 16:44:15', 0, 'Cash', 2),
(29, 2, 5720, '2022-11-05 16:45:00', 0, 'Cash', 2),
(30, 2, 9969, '2022-11-05 16:46:47', 0, 'Cash', 2),
(31, 2, 1961, '2022-11-05 16:47:21', 0, 'Banking', 2),
(32, 2, 7240, '2022-11-05 22:25:37', 0, 'Cash', 2),
(36, 5, 5666, '2022-11-06 17:31:21', 0, 'VNPay', 6),
(37, 5, 6065, '2022-11-06 19:18:34', 0, 'Cash', 6),
(38, 5, 18, '2022-11-06 19:52:43', 0, 'MoMo', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id_khachhang`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(1, 'Phạm Thảo Nhi', 'nhiinhii1112@gmail.com', '89 Trần Hưng Đạo, phường 5, TP Cà Mau', 'e10adc3949ba59abbe56e057f20f883e', 888833352),
(2, 'Diệp Thanh Huy', 'huy@gmail.com', 'VĨnh  Lợi - Bạc Liêu', 'e10adc3949ba59abbe56e057f20f883e', 946850747),
(3, 'Diệp Bảo Hoàng', 'hoang@gmail.com', '89 Trần Hưng Đạo, phường 5, TP Bạc Liêu', '25f9e794323b453885f5181f1b624d0b', 123456789),
(4, 'Diệp Thanh Tuấn', 'tuan@gmail.com', 'Ấp Xẻo Chích, TT Châu Hưng, huyện Vĩnh Lợi, tỉnh Bạc Liêu', 'e10adc3949ba59abbe56e057f20f883e', 917724874),
(5, 'Trần Thị Kiều Oanh', 'oanh@gmail.com', ' TT Châu Hưng, huyện Vĩnh Lợi, TP Bạc Liêu ', 'e10adc3949ba59abbe56e057f20f883e', 919049451),
(6, 'Nguyễn Công Hậu', 'hau@gmail.com', 'Australia', 'e10adc3949ba59abbe56e057f20f883e', 999988885);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `id_momo` int(11) NOT NULL,
  `partnercode` varchar(100) NOT NULL,
  `orderid` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `orderinfo` varchar(100) NOT NULL,
  `ordertype` varchar(100) NOT NULL,
  `transid` int(11) NOT NULL,
  `paytype` varchar(100) NOT NULL,
  `code_donhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_momo`
--

INSERT INTO `tbl_momo` (`id_momo`, `partnercode`, `orderid`, `amount`, `orderinfo`, `ordertype`, `transid`, `paytype`, `code_donhang`) VALUES
(1, 'MOMOBKUN20180529', 1667739087, '2500000', 'Thanh toán qua ATM', 'momo_wallet', 2147483647, 'napas', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `id` int(11) NOT NULL,
  `tennhacungcap` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`id`, `tennhacungcap`, `diachi`, `dienthoai`, `thutu`) VALUES
(1, 'LOTUS_US', 'USA', 2534897, 1),
(2, 'MOTOCYCLE', 'Australia', 25312468, 2),
(3, 'NATURE STONE', 'Vietnamese', 946850747, 3),
(4, 'STALE', 'Hong Kong', 88833352, 4),
(5, 'Minh Thư', 'CTU', 123456, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhaphang`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhaphang`
--

INSERT INTO `tbl_nhaphang` (`id_nhaphang`, `tensanpham`, `ngaynhap`, `gianhap`, `soluong1`, `soluongdaban`, `hinhanh`, `tinhtrang`, `id_ncc`, `id_danhmuc`) VALUES
(1, 'Dây chuyền 1', '2022-10-26', 5000000, 5, 5, '1666722770_daychuyen2.webp', 1, 1, 3),
(2, 'Khuyên 1', NULL, 500000, 5, 2, '1666722414_khuyen1.webp', 1, 3, 1),
(3, 'Đồng hồ 1', NULL, 1000000, 1, 0, '1666722917_dongho.webp', 1, 2, 5),
(4, 'Nhẫn đôi 1', NULL, 3000000, 4, 0, '1666723395_nhancap1.png', 1, 3, 7),
(5, 'Nhẫn đôi 2', '2022-10-26', 15000000, 6, 0, '1666723767_nhancap2.png', 1, 4, 7),
(6, 'Vòng tay 1', NULL, 600000, 10, 2, '1666723994_vong3.webp', 1, 3, 4),
(7, 'Vòng tay 2', NULL, 600000, 5, 2, '1666724024_vong7.webp', 1, 3, 4),
(8, 'Nhẫn 1', '2022-10-26', 5000000, 8, NULL, '1666725216_nhan1.webp', 1, 1, 2),
(9, 'Nhẫn 2', NULL, 2000000, 6, 0, '1666725247_nhan2.webp', 1, 4, 2),
(10, 'Khuyên 2', NULL, 900000, 10, 0, '1666726264_khuyen7.webp', 1, 4, 1),
(11, 'Dây chuyền 2', NULL, 1000000, 5, NULL, '1666726350_daychuyen3.webp', 1, 4, 3),
(12, 'Test', NULL, 500000, 5, 0, '1666764830_daychuyen5.webp', 1, 5, 3),
(13, 'Test 2', '2022-10-26', 500000, 5, NULL, '1666798230_nhan4.webp', 1, 5, 2),
(14, 'Helios Original S925', '2022-11-01', 800000, 10, 0, '1667240268_nhan5.webp', 1, 3, 2),
(15, 'Mặt dây chuyền bạc', '2022-11-01', 500000, 5, 0, '1667240958_daychuyen6.webp', 1, 1, 3),
(16, 'Diamond', '2022-11-02', 1000000, 5, NULL, '1667369340_Diamonds-Ladies-Wedding-Anniversary-Ring-LR3414-768x576.jpg', 1, 3, 2),
(17, 'Diamond 2', '2022-11-02', 5000000, 10, NULL, '1667371902_Criss-Cross-RIng-768x768.jpg', 1, 5, 2),
(18, 'Diamond 3', '2022-11-02', 2000000, 5, NULL, '1667371944_Untitled-1-4-768x576.jpg', 1, 5, 2),
(19, 'Khuyên 4', '2022-11-05', 700000, 5, NULL, '1667615729_khuyen2.webp', 1, 5, 1),
(20, 'Khuyên 5', '2022-11-05', 1000000, 10, NULL, '1667655980_khuyen6.webp', 1, 5, 1),
(21, 'Khuyên 6', '2022-11-06', 1000000, 10, 1, '1667726276_khuyen5.webp', 1, 4, 1),
(22, 'Đồng hồ 2', '2022-11-06', 5000000, 10, 2, '1667726552_dongho2.jpg', 1, 3, 5),
(23, 'Đồng hồ 3', '2022-11-06', 2000000, 5, 1, '1667726593_dongho3.jpg', 1, 3, 5),
(24, 'Dây chuyền 4', '2022-11-13', 1000000, 5, NULL, '1668276907_daychuyen4.webp', 1, 5, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `gianhap`, `giasp`, `soluong`, `soluongdaban`, `loinhuan`, `hinhanh`, `tomtat`, `noidung`, `sale`, `tinhtrang`, `id_danhmuc`, `id_ncc`, `id_nh`) VALUES
(1, 'Dây chuyền 1', '1234AH', 5000000, 5500000, 0, 5, 1950000, '1666721558_daychuyen2.webp', '<p>Chất liệu : Mặt hợp kim titan trắng đ&uacute;c kh&ocirc;ng gỉ , d&acirc;y hợp kim chống gỉ&nbsp;</p>\r\n\r\n<p>Thiết kế:&nbsp;</p>\r\n\r\n<p>Ng&ocirc;i sao 6 c&aacute;nh c&ograve;n c&oacute; t&ecirc;n gọi ri&ecirc;ng l&agrave; &ldquo;Ng&ocirc;i sao David&rdquo;, &ldquo;Tấm khi&ecirc;n David&rdquo; hoặc &ldquo;Dấu ấn triển của Solomon&rdquo;, được đặt theo t&ecirc;n vua David của người Israel cổ đại - một người được mệnh danh l&agrave; thi&ecirc;n t&agrave;i, vị vua đ&atilde; gi&uacute;p người d&acirc;n Israel tho&aacute;t khỏi cuộc chiến dai dẳng với tộc người khổng lồ Philistine</p>\r\n\r\n<p>Người ta tin rằng, ng&ocirc;i sao 6 c&aacute;nh n&agrave;y c&ograve;n l&agrave; một phong ấn đầy quyền lực che chắn, bảo to&agrave;n cho người mang n&oacute; b&ecirc;n m&igrave;nh. Chỉ duy nhất dấu ấn n&agrave;y mới c&oacute; thể bảo vệ con người trước ma quỷ. N&oacute; l&agrave; sức mạnh v&ocirc; địch để chiến thắng mọi thế lực đen tối kh&aacute;c.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; &yacute; nghĩa ng&ocirc;i sao 6 c&aacute;nh ng&agrave;y c&agrave;ng được lan truyền rộng r&atilde;i hơn, trở th&agrave;nh biểu tượng chung tr&ecirc;n to&agrave;n thế giới.</p>\r\n', '<p>Chất liệu : Mặt hợp kim titan trắng đ&uacute;c kh&ocirc;ng gỉ , d&acirc;y hợp kim chống gỉ&nbsp;</p>\r\n\r\n<p>Thiết kế:&nbsp;</p>\r\n\r\n<p>Ng&ocirc;i sao 6 c&aacute;nh c&ograve;n c&oacute; t&ecirc;n gọi ri&ecirc;ng l&agrave; &ldquo;Ng&ocirc;i sao David&rdquo;, &ldquo;Tấm khi&ecirc;n David&rdquo; hoặc &ldquo;Dấu ấn triển của Solomon&rdquo;, được đặt theo t&ecirc;n vua David của người Israel cổ đại - một người được mệnh danh l&agrave; thi&ecirc;n t&agrave;i, vị vua đ&atilde; gi&uacute;p người d&acirc;n Israel tho&aacute;t khỏi cuộc chiến dai dẳng với tộc người khổng lồ Philistine</p>\r\n\r\n<p>Người ta tin rằng, ng&ocirc;i sao 6 c&aacute;nh n&agrave;y c&ograve;n l&agrave; một phong ấn đầy quyền lực che chắn, bảo to&agrave;n cho người mang n&oacute; b&ecirc;n m&igrave;nh. Chỉ duy nhất dấu ấn n&agrave;y mới c&oacute; thể bảo vệ con người trước ma quỷ. N&oacute; l&agrave; sức mạnh v&ocirc; địch để chiến thắng mọi thế lực đen tối kh&aacute;c.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; &yacute; nghĩa ng&ocirc;i sao 6 c&aacute;nh ng&agrave;y c&agrave;ng được lan truyền rộng r&atilde;i hơn, trở th&agrave;nh biểu tượng chung tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/17_082d425a496f4d76925e429c30e89d21_master_1728x.webp?v=1653036076\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/38.2_842fb80f70e04868bcf29e6888ff91f3_master_540x.jpg?v=1653036080\" style=\"height:199px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/Screenshot_20_540x.png?v=1654133039\" style=\"height:448px; width:300px\" /></p>\r\n', 0, 1, 3, 1, 1),
(2, 'Khuyên 1', '1467AH', 500000, 600000, 3, 2, 200000, '1666722699_khuyen1.webp', '<p>Chất liệu : Mặt hợp kim titan trắng đ&uacute;c kh&ocirc;ng gỉ , d&acirc;y hợp kim chống gỉ&nbsp;</p>\r\n\r\n<p>Thiết kế:&nbsp;</p>\r\n\r\n<p>Ng&ocirc;i sao 6 c&aacute;nh c&ograve;n c&oacute; t&ecirc;n gọi ri&ecirc;ng l&agrave; &ldquo;Ng&ocirc;i sao David&rdquo;, &ldquo;Tấm khi&ecirc;n David&rdquo; hoặc &ldquo;Dấu ấn triển của Solomon&rdquo;, được đặt theo t&ecirc;n vua David của người Israel cổ đại - một người được mệnh danh l&agrave; thi&ecirc;n t&agrave;i, vị vua đ&atilde; gi&uacute;p người d&acirc;n Israel tho&aacute;t khỏi cuộc chiến dai dẳng với tộc người khổng lồ Philistine</p>\r\n\r\n<p>Người ta tin rằng, ng&ocirc;i sao 6 c&aacute;nh n&agrave;y c&ograve;n l&agrave; một phong ấn đầy quyền lực che chắn, bảo to&agrave;n cho người mang n&oacute; b&ecirc;n m&igrave;nh. Chỉ duy nhất dấu ấn n&agrave;y mới c&oacute; thể bảo vệ con người trước ma quỷ. N&oacute; l&agrave; sức mạnh v&ocirc; địch để chiến thắng mọi thế lực đen tối kh&aacute;c.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; &yacute; nghĩa ng&ocirc;i sao 6 c&aacute;nh ng&agrave;y c&agrave;ng được lan truyền rộng r&atilde;i hơn, trở th&agrave;nh biểu tượng chung tr&ecirc;n to&agrave;n thế giới.</p>\r\n', '<p>Chất liệu : Mặt hợp kim titan trắng đ&uacute;c kh&ocirc;ng gỉ , d&acirc;y hợp kim chống gỉ&nbsp;</p>\r\n\r\n<p>Thiết kế:&nbsp;</p>\r\n\r\n<p>Ng&ocirc;i sao 6 c&aacute;nh c&ograve;n c&oacute; t&ecirc;n gọi ri&ecirc;ng l&agrave; &ldquo;Ng&ocirc;i sao David&rdquo;, &ldquo;Tấm khi&ecirc;n David&rdquo; hoặc &ldquo;Dấu ấn triển của Solomon&rdquo;, được đặt theo t&ecirc;n vua David của người Israel cổ đại - một người được mệnh danh l&agrave; thi&ecirc;n t&agrave;i, vị vua đ&atilde; gi&uacute;p người d&acirc;n Israel tho&aacute;t khỏi cuộc chiến dai dẳng với tộc người khổng lồ Philistine</p>\r\n\r\n<p>Người ta tin rằng, ng&ocirc;i sao 6 c&aacute;nh n&agrave;y c&ograve;n l&agrave; một phong ấn đầy quyền lực che chắn, bảo to&agrave;n cho người mang n&oacute; b&ecirc;n m&igrave;nh. Chỉ duy nhất dấu ấn n&agrave;y mới c&oacute; thể bảo vệ con người trước ma quỷ. N&oacute; l&agrave; sức mạnh v&ocirc; địch để chiến thắng mọi thế lực đen tối kh&aacute;c.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; &yacute; nghĩa ng&ocirc;i sao 6 c&aacute;nh ng&agrave;y c&agrave;ng được lan truyền rộng r&atilde;i hơn, trở th&agrave;nh biểu tượng chung tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/10copy_1728x.jpg?v=1654256681\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/eternity_da_trang_a4e2326dbcb14f4f9e873fdc3a04d7ce_master_540x.jpg?v=1654256681\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/s_alogo_1_a7e90ae1-ca35-40a2-a8a3-5970ee129da7_4935d4c81a5448b5b7cba5e98b2267d9_master_540x.jpg?v=1654256681\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/3_e1b4fe9b026344d0b486fe31afe3605d_master_540x.jpg?v=1654256568\" style=\"height:375px; width:300px\" /></p>\r\n', 2, 1, 1, 3, 2),
(3, 'Đồng hồ 1', '789HGI', 1000000, 3000000, 10, NULL, NULL, '1666723207_dongho.webp', '<p>Chất liệu : Mặt hợp kim titan trắng đ&uacute;c kh&ocirc;ng gỉ , d&acirc;y hợp kim chống gỉ&nbsp;</p>\r\n\r\n<p>Thiết kế:&nbsp;</p>\r\n\r\n<p>Ng&ocirc;i sao 6 c&aacute;nh c&ograve;n c&oacute; t&ecirc;n gọi ri&ecirc;ng l&agrave; &ldquo;Ng&ocirc;i sao David&rdquo;, &ldquo;Tấm khi&ecirc;n David&rdquo; hoặc &ldquo;Dấu ấn triển của Solomon&rdquo;, được đặt theo t&ecirc;n vua David của người Israel cổ đại - một người được mệnh danh l&agrave; thi&ecirc;n t&agrave;i, vị vua đ&atilde; gi&uacute;p người d&acirc;n Israel tho&aacute;t khỏi cuộc chiến dai dẳng với tộc người khổng lồ Philistine</p>\r\n\r\n<p>Người ta tin rằng, ng&ocirc;i sao 6 c&aacute;nh n&agrave;y c&ograve;n l&agrave; một phong ấn đầy quyền lực che chắn, bảo to&agrave;n cho người mang n&oacute; b&ecirc;n m&igrave;nh. Chỉ duy nhất dấu ấn n&agrave;y mới c&oacute; thể bảo vệ con người trước ma quỷ. N&oacute; l&agrave; sức mạnh v&ocirc; địch để chiến thắng mọi thế lực đen tối kh&aacute;c.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; &yacute; nghĩa ng&ocirc;i sao 6 c&aacute;nh ng&agrave;y c&agrave;ng được lan truyền rộng r&atilde;i hơn, trở th&agrave;nh biểu tượng chung tr&ecirc;n to&agrave;n thế giới.</p>\r\n', '<p>Chất liệu : Mặt hợp kim titan trắng đ&uacute;c kh&ocirc;ng gỉ , d&acirc;y hợp kim chống gỉ&nbsp;</p>\r\n\r\n<p>Thiết kế:&nbsp;</p>\r\n\r\n<p>Ng&ocirc;i sao 6 c&aacute;nh c&ograve;n c&oacute; t&ecirc;n gọi ri&ecirc;ng l&agrave; &ldquo;Ng&ocirc;i sao David&rdquo;, &ldquo;Tấm khi&ecirc;n David&rdquo; hoặc &ldquo;Dấu ấn triển của Solomon&rdquo;, được đặt theo t&ecirc;n vua David của người Israel cổ đại - một người được mệnh danh l&agrave; thi&ecirc;n t&agrave;i, vị vua đ&atilde; gi&uacute;p người d&acirc;n Israel tho&aacute;t khỏi cuộc chiến dai dẳng với tộc người khổng lồ Philistine</p>\r\n\r\n<p>Người ta tin rằng, ng&ocirc;i sao 6 c&aacute;nh n&agrave;y c&ograve;n l&agrave; một phong ấn đầy quyền lực che chắn, bảo to&agrave;n cho người mang n&oacute; b&ecirc;n m&igrave;nh. Chỉ duy nhất dấu ấn n&agrave;y mới c&oacute; thể bảo vệ con người trước ma quỷ. N&oacute; l&agrave; sức mạnh v&ocirc; địch để chiến thắng mọi thế lực đen tối kh&aacute;c.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy m&agrave; &yacute; nghĩa ng&ocirc;i sao 6 c&aacute;nh ng&agrave;y c&agrave;ng được lan truyền rộng r&atilde;i hơn, trở th&agrave;nh biểu tượng chung tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/7_088d29c4-9698-46b5-ab97-7a7ba8ba49d9_1728x.jpg?v=1659846899\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/5_24b84632-726d-483b-bdba-0197b1d4c23d_540x.jpg?v=1659846899\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/1_14f00d0d-69db-4029-ac55-80b299644bbc_540x.jpg?v=1659846898\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/9_96298d4c-26b9-40aa-ae2c-2eface4a7fd8_540x.jpg?v=1659846900\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/3_c0974b8d-1c37-48ee-8ba5-78077cbb085a_540x.jpg?v=1659846900\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/12_4c21df1b-d36b-4ade-b1dd-b78f5d8b379d_540x.jpg?v=1659846901\" style=\"height:375px; width:300px\" /></p>\r\n', 5, 1, 5, 2, 3),
(4, 'Nhẫn đôi 1', 'popui', 3000000, 4500000, 2, NULL, NULL, '1666723574_nhancap1.png', '', '<p><img alt=\"\" src=\"https://cdn.pnj.io/images/thumbnails/485/485/detailed/137/00361-00125-cap-nhan-cuoi-vang-18k-disneypnj-beauty-and-the-beast-02.png\" style=\"height:400px; width:400px\" /><img alt=\"\" src=\"https://cdn.pnj.io/images/thumbnails/485/485/detailed/137/00361-00125-cap-nhan-cuoi-vang-18k-disneypnj-beauty-and-the-beast-03.png\" style=\"height:400px; width:400px\" /><img alt=\"\" src=\"https://cdn.pnj.io/images/thumbnails/485/485/detailed/137/00361-00125-cap-nhan-cuoi-vang-18k-disneypnj-beauty-and-the-beast-01.png\" style=\"height:400px; width:400px\" /></p>\r\n', 10, 1, 7, 3, 4),
(5, 'Nhẫn đôi 2', 'OPUH', 15000000, 18500000, 0, NULL, NULL, '1666723891_nhancap2.png', '', '<p><img alt=\"\" src=\"https://cdn.pnj.io/images/thumbnails/485/485/detailed/137/bo-trang-suc-kim-cuong-vang-trang-14k-pnj-03597-02212-1.png\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://cdn.pnj.io/images/thumbnails/485/485/detailed/137/bo-trang-suc-kim-cuong-vang-trang-14k-pnj-03597-02212-2.png\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://cdn.pnj.io/images/thumbnails/485/485/detailed/137/bo-trang-suc-kim-cuong-vang-trang-14k-pnj-03597-02212-3.png\" style=\"height:300px; width:300px\" /></p>\r\n', 10, 1, 7, 4, 5),
(6, 'Vòng tay 1', 'PLKJ', 600000, 700000, 1, 2, 186000, '1666724086_vong3.webp', '', '', 2, 1, 4, 3, 6),
(7, 'Vòng tay 2', 'UTHY', 600000, 800000, 2, 0, 0, '1666724127_vong7.webp', '', '', 2, 1, 4, 3, 7),
(8, 'Nhẫn 1', 'ab01', 5000000, 6000000, 8, NULL, NULL, '1666725335_nhan1.webp', '<p>Chất liệu:&nbsp;Hợp kim Titan trắng, mạ m&agrave;u khi đ&uacute;c, cực bền m&agrave;u.</p>\r\n\r\n<p>Kiểu d&aacute;ng: Chiếc nhẫn được lấy cảm hứng từ&nbsp;c&acirc;u thần ch&uacute; l&acirc;u đời v&agrave; quan trọng nhất của Phật gi&aacute;o T&acirc;y Tạng:&nbsp;&quot;Lục Tự Đại Minh Ch&acirc;n Ng&ocirc;n&quot; tức l&agrave; &quot;Ch&acirc;n ng&ocirc;n s&aacute;ng r&otilde; bao gồm s&aacute;u chữ&quot;.</p>\r\n\r\n<p>&quot;Lục Tự Đại Minh Ch&acirc;n Ng&ocirc;n&quot; tức l&agrave; &quot;Ch&acirc;n ng&ocirc;n s&aacute;ng r&otilde; bao gồm s&aacute;u chữ&quot;.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; c&acirc;u thần ch&uacute; rất phổ biến v&agrave; được sử dụng rất nhiều trong c&aacute;c nghi lễ. N&oacute; c&oacute; c&ocirc;ng năng rất lớn,lớn đến nỗi n&oacute; gi&uacute;p cho h&agrave;nh giả tr&igrave; niệm ph&aacute;t sanh c&ocirc;ng đức nội t&acirc;m đưa h&agrave;nh giả đến gi&aacute;c ngộ v&agrave; giải tho&aacute;t. Khi bạn bực tức điều g&igrave;,h&atilde;y cố gắng tập trung v&agrave; th&agrave;nh k&iacute;nh tr&igrave; niệm v&agrave; sẽ thấy được kết quả, v&igrave; thần ch&uacute; n&agrave;y tượng trưng cho Từ Bi v&agrave; y&ecirc;u thương ph&aacute; tan s&acirc;n hận.</p>\r\n\r\n<p>C&ograve;n về &yacute; nghĩa của n&oacute; th&igrave; đc giải nghĩa như sau:</p>\r\n\r\n<p>- Om : Quy mệnh</p>\r\n\r\n<p>- Mani : Vi&ecirc;n ngọc như &yacute;</p>\r\n\r\n<p>- Padme : B&ecirc;n trong hoa sen</p>\r\n\r\n<p>- Hum : Tự ng&atilde; th&agrave;nh tựu</p>\r\n\r\n<p>C&acirc;u thần ch&uacute; c&oacute; nghĩa l&agrave; trong tất cả ch&uacute;ng ta đều l&agrave; hoa sen, n&oacute; chỉ bị che phủ bởi rất nhiều b&ugrave;n v&agrave; bụi bẩn. Nếu thần ch&uacute; n&agrave;y được lặp đi lặp lại với &yacute; định đ&uacute;ng đắn, được cho l&agrave; loại bỏ những mặt ti&ecirc;u cực cho đến khi ch&uacute;ng ta lấp l&aacute;nh, tinh khiết, từ bi v&agrave; kh&ocirc;n ngoan như ch&iacute;nh hoa sen.</p>\r\n\r\n<p>Với thiết kế c&oacute; thể xoay được, c&aacute;c bạn đeo vật phẩm b&ecirc;n m&igrave;nh c&oacute; thể dễ d&agrave;ng tr&igrave; niệm mong cầu an l&agrave;nh</p>\r\n\r\n<hr />\r\n<p>Chiếc nhẫn kh&ocirc;ng đơn giản chỉ l&agrave; một m&oacute;n phụ kiện, n&oacute; c&ograve;n chứa đựng những th&ocirc;ng điệp, niềm tin, lời hứa, th&agrave;nh tựu,&hellip; của chủ nh&acirc;n.&nbsp;</p>\r\n', '<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/9_63bec69dc80f4abd839043f63cfe48b1_master_1728x.webp?v=1653449244\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/Screenshot_3_540x.png?v=1654132518\" style=\"height:440px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/10_9c99be59a6a84795840736a69e71eb86_master_540x.jpg?v=1653449244\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/img_9904_d67e0c96f6d049228f939efc9f5fdfd5_master_540x.jpg?v=1654132518\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Chất liệu:&nbsp;Hợp kim Titan trắng, mạ m&agrave;u khi đ&uacute;c, cực bền m&agrave;u.</p>\r\n\r\n<p>Kiểu d&aacute;ng: Chiếc nhẫn được lấy cảm hứng từ&nbsp;c&acirc;u thần ch&uacute; l&acirc;u đời v&agrave; quan trọng nhất của Phật gi&aacute;o T&acirc;y Tạng:&nbsp;&quot;Lục Tự Đại Minh Ch&acirc;n Ng&ocirc;n&quot; tức l&agrave; &quot;Ch&acirc;n ng&ocirc;n s&aacute;ng r&otilde; bao gồm s&aacute;u chữ&quot;.</p>\r\n\r\n<p>&quot;Lục Tự Đại Minh Ch&acirc;n Ng&ocirc;n&quot; tức l&agrave; &quot;Ch&acirc;n ng&ocirc;n s&aacute;ng r&otilde; bao gồm s&aacute;u chữ&quot;.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; c&acirc;u thần ch&uacute; rất phổ biến v&agrave; được sử dụng rất nhiều trong c&aacute;c nghi lễ. N&oacute; c&oacute; c&ocirc;ng năng rất lớn,lớn đến nỗi n&oacute; gi&uacute;p cho h&agrave;nh giả tr&igrave; niệm ph&aacute;t sanh c&ocirc;ng đức nội t&acirc;m đưa h&agrave;nh giả đến gi&aacute;c ngộ v&agrave; giải tho&aacute;t. Khi bạn bực tức điều g&igrave;,h&atilde;y cố gắng tập trung v&agrave; th&agrave;nh k&iacute;nh tr&igrave; niệm v&agrave; sẽ thấy được kết quả, v&igrave; thần ch&uacute; n&agrave;y tượng trưng cho Từ Bi v&agrave; y&ecirc;u thương ph&aacute; tan s&acirc;n hận.</p>\r\n\r\n<p>C&ograve;n về &yacute; nghĩa của n&oacute; th&igrave; đc giải nghĩa như sau:</p>\r\n\r\n<p>- Om : Quy mệnh</p>\r\n\r\n<p>- Mani : Vi&ecirc;n ngọc như &yacute;</p>\r\n\r\n<p>- Padme : B&ecirc;n trong hoa sen</p>\r\n\r\n<p>- Hum : Tự ng&atilde; th&agrave;nh tựu</p>\r\n\r\n<p>C&acirc;u thần ch&uacute; c&oacute; nghĩa l&agrave; trong tất cả ch&uacute;ng ta đều l&agrave; hoa sen, n&oacute; chỉ bị che phủ bởi rất nhiều b&ugrave;n v&agrave; bụi bẩn. Nếu thần ch&uacute; n&agrave;y được lặp đi lặp lại với &yacute; định đ&uacute;ng đắn, được cho l&agrave; loại bỏ những mặt ti&ecirc;u cực cho đến khi ch&uacute;ng ta lấp l&aacute;nh, tinh khiết, từ bi v&agrave; kh&ocirc;n ngoan như ch&iacute;nh hoa sen.</p>\r\n\r\n<p>Với thiết kế c&oacute; thể xoay được, c&aacute;c bạn đeo vật phẩm b&ecirc;n m&igrave;nh c&oacute; thể dễ d&agrave;ng tr&igrave; niệm mong cầu an l&agrave;nh</p>\r\n\r\n<hr />\r\n<p>Chiếc nhẫn kh&ocirc;ng đơn giản chỉ l&agrave; một m&oacute;n phụ kiện, n&oacute; c&ograve;n chứa đựng những th&ocirc;ng điệp, niềm tin, lời hứa, th&agrave;nh tựu,&hellip; của chủ nh&acirc;n.&nbsp;</p>\r\n', 0, 1, 2, 1, 8),
(9, 'Nhẫn 2', 'POLU', 2000000, 3000000, 2, NULL, NULL, '1666725410_nhan2.webp', '', '', 0, 1, 2, 4, 9),
(10, 'Khuyên 2', 'OQDC', 900000, 1500000, 5, 5, NULL, '1666726315_khuyen7.webp', '', '', 0, 1, 1, 4, 10),
(11, 'Dây chuyền 2', 'PKMC', 1000000, 2000000, 5, NULL, NULL, '1666726381_daychuyen3.webp', '', '', 0, 1, 3, 4, 11),
(12, 'Test', 'OKJGJ', 500000, 600000, 4, NULL, NULL, '1666765167_daychuyen5.webp', '<p>D&acirc;y chuyền l&agrave; m&oacute;n phụ kiện gần như sẽ thu h&uacute;t &aacute;nh nh&igrave;n v&agrave; để lại ấn tượng rất lớn với người đối diện, thế n&ecirc;n m&oacute;n phụ kiện n&agrave;y l&agrave; thứ kh&ocirc;ng thế thiếu trong set đồ của bạn.</p>\r\n', '<p>D&acirc;y chuyền l&agrave; m&oacute;n phụ kiện gần như sẽ thu h&uacute;t &aacute;nh nh&igrave;n v&agrave; để lại ấn tượng rất lớn với người đối diện, thế n&ecirc;n m&oacute;n phụ kiện n&agrave;y l&agrave; thứ kh&ocirc;ng thế thiếu trong set đồ của bạn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/dc_d3_540x.jpg?v=1654018248\" style=\"height:500px; width:400px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/dc_d1_540x.jpg?v=1654018268\" style=\"height:500px; width:400px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/untitled-18_540x.jpg?v=1654599650\" style=\"height:500px; width:400px\" /></p>\r\n', 0, 1, 3, 5, 12),
(13, 'Test 2', 'OJHKA', 500000, 750000, 5, NULL, NULL, '1666798361_nhan4.webp', '', '', 0, 1, 2, 5, 13),
(14, 'Helios Original S925', 'OKLLAA', 800000, 1150000, 6, NULL, NULL, '1667240672_nhan5.webp', '<blockquote>\r\n<p><strong>NISHIKIKOI RING</strong></p>\r\n</blockquote>\r\n\r\n<hr />\r\n<p>Theo truyền thuyết, c&aacute; Koi l&agrave; h&igrave;nh ảnh ẩn dụ về sự quyết t&acirc;m v&agrave; ki&ecirc;n tr&igrave; bằng c&aacute;ch bơi ngược d&ograve;ng, kh&ocirc;ng ngừng di chuyển, chống chọi với d&ograve;ng nước. Lấy cảm hứng từ h&igrave;nh tượng đ&oacute;, ch&uacute;ng t&ocirc;i x&acirc;y dựng l&ecirc;n một t&aacute;c phẩm nghệ thuật với tinh thần đề cao sự ki&ecirc;n tr&igrave;, kh&ocirc;ng ngừng cố gắng vươn l&ecirc;n để vượt qua b&atilde;o tố.</p>\r\n', '<blockquote>\r\n<p><strong>NISHIKIKOI RING</strong></p>\r\n</blockquote>\r\n\r\n<hr />\r\n<p>Theo truyền thuyết, c&aacute; Koi l&agrave; h&igrave;nh ảnh ẩn dụ về sự quyết t&acirc;m v&agrave; ki&ecirc;n tr&igrave; bằng c&aacute;ch bơi ngược d&ograve;ng, kh&ocirc;ng ngừng di chuyển, chống chọi với d&ograve;ng nước. Lấy cảm hứng từ h&igrave;nh tượng đ&oacute;, ch&uacute;ng t&ocirc;i x&acirc;y dựng l&ecirc;n một t&aacute;c phẩm nghệ thuật với tinh thần đề cao sự ki&ecirc;n tr&igrave;, kh&ocirc;ng ngừng cố gắng vươn l&ecirc;n để vượt qua b&atilde;o tố.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/13_190ed2ea680d47f2a5d7dc1ff5547dea_master_1728x.webp?v=1653578907\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/14_0cb5408f29224742a409e9c0974e5b7d_master_540x.jpg?v=1653584365\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/15_6a77a58f2eeb47feb7d794a22ea6ed70_master_540x.jpg?v=1653584365\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/Screenshot_3_652dcb38-8b8f-4e43-87f6-730b50cb5ebd_540x.png?v=1653584365\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/mg_9501_4b9a1f2840d7472889b256544b533ca1_master_540x.webp?v=1653584365\" style=\"height:450px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/26631126815a00778d83115d7fe56cf0ad241824_2e6a67ad54004e35ac1ca635523d5551_master_540x.webp?v=1653584365\" style=\"height:600px; width:400px\" /></p>\r\n', 0, 1, 2, 3, 14),
(15, 'Mặt dây chuyền bạc', 'UHDA', 500000, 795000, 3, NULL, NULL, '1667241087_daychuyen6.webp', '<p>Chất liệu: Bạc S925&nbsp;</p>\r\n\r\n<p>Với định hướng ph&aacute;t triển &yacute; niệm về sức mạnh nội tại b&ecirc;n trong con người Việt th&agrave;nh một chế t&aacute;c độc nhất v&ocirc; nhị - mặt d&acirc;y chuyền Thuận&nbsp;Thi&ecirc;n với 3 phi&ecirc;n bản kh&aacute;c nhau.</p>\r\n\r\n<p><em>MẶT D&Acirc;Y CHUYỀN THUẬN THI&Ecirc;N</em></p>\r\n\r\n<p>Thuận Thi&ecirc;n kiếm hay c&ograve;n được biết đến l&agrave; thanh kiếm thần Thuận - thanh kiếm huyền thoại của vua L&ecirc; Lợi, vị anh h&ugrave;ng của d&acirc;n tộc Việt, người đ&atilde; đem lại độc lập cho Việt Nam từ &aacute;ch cai trị của nh&agrave; Minh phương Bắc.</p>\r\n\r\n<p>Được biết đến l&agrave; thanh kiếm c&oacute; ẩn chứa sức mạnh thần kỳ, gi&uacute;p cho L&ecirc; Lợi trở n&ecirc;n cao lớn v&agrave; c&oacute; sức mạnh của vạn người.&nbsp;</p>\r\n', '<p>Chất liệu: Bạc S925&nbsp;</p>\r\n\r\n<p>Với định hướng ph&aacute;t triển &yacute; niệm về sức mạnh nội tại b&ecirc;n trong con người Việt th&agrave;nh một chế t&aacute;c độc nhất v&ocirc; nhị - mặt d&acirc;y chuyền Thuận&nbsp;Thi&ecirc;n với 3 phi&ecirc;n bản kh&aacute;c nhau.</p>\r\n\r\n<p><em>MẶT D&Acirc;Y CHUYỀN THUẬN THI&Ecirc;N</em></p>\r\n\r\n<p>Thuận Thi&ecirc;n kiếm hay c&ograve;n được biết đến l&agrave; thanh kiếm thần Thuận - thanh kiếm huyền thoại của vua L&ecirc; Lợi, vị anh h&ugrave;ng của d&acirc;n tộc Việt, người đ&atilde; đem lại độc lập cho Việt Nam từ &aacute;ch cai trị của nh&agrave; Minh phương Bắc.</p>\r\n\r\n<p>Được biết đến l&agrave; thanh kiếm c&oacute; ẩn chứa sức mạnh thần kỳ, gi&uacute;p cho L&ecirc; Lợi trở n&ecirc;n cao lớn v&agrave; c&oacute; sức mạnh của vạn người.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/Thuanthientwinkle_1728x.jpg?v=1655534141\" style=\"height:375px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/1_8c6ac58e-c76e-41ea-bf28-07d19a807c0f_540x.jpg?v=1655534141\" style=\"height:375px; width:300px\" /></p>\r\n', 0, 1, 3, 1, 15),
(16, 'Diamond', 'QWER', 1000000, 2000000, 5, NULL, NULL, '1667369764_Diamonds-Ladies-Wedding-Anniversary-Ring-LR3414-768x576.jpg', '<p>Starting at&nbsp;$645/mo with&nbsp;Affirm.&nbsp;</p>\r\n\r\n<p>The ring is available in your choice of 14k and 18k white gold, 14k and 18k yellow gold, 14k and 18k pink gold and platinum.</p>\r\n', '<p>Starting at&nbsp;$645/mo with&nbsp;Affirm.</p>\r\n\r\n<p>The ring is available in your choice of 14k and 18k white gold, 14k and 18k yellow gold, 14k and 18k pink gold and platinum.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2018/01/Diamonds-Ladies-Wedding-Anniversary-Ring-LR3414-3-768x576.jpg\" style=\"height:225px; width:300px\" /><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2018/01/Diamonds-Ladies-Wedding-Anniversary-Ring-LR3414-4-768x576.jpg\" style=\"height:225px; width:300px\" /><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2018/01/Diamonds-Ladies-Wedding-Anniversary-Ring-LR3414-1-150x150.jpg\" style=\"height:225px; width:225px\" /></p>\r\n', 0, 1, 2, 3, 16),
(17, 'Diamond 2', 'VBNM', 5000000, 6500000, 10, NULL, NULL, '1667372063_Criss-Cross-RIng-768x768.jpg', '<p>Starting at&nbsp;$419/mo with&nbsp;Affirm.&nbsp;<a href=\"javascript:void(0)\">Prequalify now</a></p>\r\n\r\n<p>Available in 14 karat and 18 karat white, yellow, rose gold and also platinum.</p>\r\n', '<p>Starting at&nbsp;$419/mo with&nbsp;Affirm.&nbsp;<a href=\"javascript:void(0)\">Prequalify now</a></p>\r\n\r\n<p>Available in 14 karat and 18 karat white, yellow, rose gold and also platinum.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2017/08/Untitled-1-22-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2017/08/Criss-Cross-RIng-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2017/08/Untitled-2-24-768x768.jpg\" style=\"height:300px; width:300px\" /></p>\r\n', 0, 1, 2, 5, 17),
(18, 'Diamond 3', 'FGHJ', 2000000, 3000000, 5, NULL, NULL, '1667372165_Untitled-1-4-768x576.jpg', '<p>Starting at&nbsp;$487/mo with&nbsp;Affirm.&nbsp;<a href=\"javascript:void(0)\">Prequalify now</a></p>\r\n\r\n<p>Available in 14 karat and 18 karat white, yellow, rose gold and also platinum.</p>\r\n', '<p>Starting at&nbsp;$487/mo with&nbsp;Affirm.&nbsp;<a href=\"javascript:void(0)\">Prequalify now</a></p>\r\n\r\n<p>Available in 14 karat and 18 karat white, yellow, rose gold and also platinum.</p>\r\n\r\n<p><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2017/08/1-2-300x300.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2017/08/2-2-150x150.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://sarkisiansjewelry.com/wp-content/uploads/2017/08/Untitled-4-9-150x150.jpg\" style=\"height:300px; width:300px\" /></p>\r\n', 0, 1, 2, 5, 18),
(19, 'Khuyên 4', 'UJMN', 700000, 800000, 5, NULL, NULL, '1667615796_khuyen2.webp', '', '', 0, 1, 1, 5, 19),
(21, 'Khuyên 5', 'WESX', 1000000, 2000000, 10, NULL, NULL, '1667656025_khuyen6.webp', '', '', 0, 1, 1, 5, 20),
(22, 'Khuyên 6', 'OKMH', 1000000, 2500000, 9, 1, 1500000, '1667726349_khuyen5.webp', '<p>Được chế t&aacute;c thủ c&ocirc;ng từ bạc s925 mix đ&aacute; CZ<br />\r\nLoại khuy&ecirc;n: Stud Earring<br />\r\nVị tr&iacute; đeo khuy&ecirc;n: Th&ugrave;y tai.<br />\r\nPh&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; set đồ thời trang.<br />\r\nTất cả c&aacute;c sản phẩm được thiết kế v&agrave; sản xuất tại H&agrave; Nội bởi c&aacute;c thợ kim ho&agrave;n bậc thầy.</p>\r\n', '<p>Được chế t&aacute;c thủ c&ocirc;ng từ bạc s925 mix đ&aacute; CZ<br />\r\nLoại khuy&ecirc;n: Stud Earring<br />\r\nVị tr&iacute; đeo khuy&ecirc;n: Th&ugrave;y tai.<br />\r\nPh&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; set đồ thời trang.<br />\r\nTất cả c&aacute;c sản phẩm được thiết kế v&agrave; sản xuất tại H&agrave; Nội bởi c&aacute;c thợ kim ho&agrave;n bậc thầy.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/c_bac_ea746aa68af8484b8ba661c8adcc27e0_grande_a2df914c2cf348f2aad272a28663b459_master_540x.jpg?v=1653280034\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0644/2958/8701/products/s_alogo_1_a7e90ae1-ca35-40a2-a8a3-5970ee129da7_7cf5c9b66d59489ca7fe703f93ee29e2_master_540x.jpg?v=1653038016\" style=\"height:375px; width:300px\" /></p>\r\n', 0, 1, 1, 4, 21),
(23, 'Đồng hồ 2', 'UHGN', 5000000, 6000000, 8, 2, 2760000, '1667726845_dongho2.jpg', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Loại m&aacute;y</td>\r\n			<td>Japanese Miyota Automatic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hiển thị</td>\r\n			<td>Analog</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu vỏ</td>\r\n			<td>316L Stainless Steel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh vỏ</td>\r\n			<td>45mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ d&agrave;y vỏ</td>\r\n			<td>15mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu d&acirc;y đeo</td>\r\n			<td>Cao su&nbsp; cao cấp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chiều rộng d&acirc;y đeo</td>\r\n			<td>27mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu mặt k&iacute;nh</td>\r\n			<td>Mineral (K&iacute;nh Kho&aacute;ng Chất)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khả năng chịu nước</td>\r\n			<td>3ATM</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<p>Excalibur Spider Huracan STO c&oacute; vỏ bằng carbon dạng xương 45 mm với lớp phủ cao su ở tr&ecirc;n c&ugrave;ng với gờ titan v&agrave; tinh thể sapphire kim loại h&oacute;a, trong khi đ&oacute; d&acirc;y đeo bằng da b&ecirc; được đục lỗ v&agrave; lớp l&oacute;t b&ecirc;n trong bằng cao su.</p>\r\n\r\n<p>Chiếc đồng hồ n&agrave;y được trang bị bộ m&aacute;y tự động RD630 c&oacute; khả năng sử dụng l&ecirc;n tới 60 giờ. Bộ chuyển động kết hợp giữa b&aacute;nh xe c&acirc;n bằng g&oacute;c 12 độ với trọng lượng dao động 360 độ được lấy cảm hứng từ b&aacute;nh xe của chiếc Huracan STO.</p>\r\n\r\n<p>Điều th&uacute; vị l&agrave; trong khi Lamborghini kh&ocirc;ng sản xuất giới hạn chiếc Huracan STO th&igrave; Roger Dubuis x&aacute;c nhận sẽ chỉ l&agrave;m ra 88 chiếc đồng hồ Excalibur Spider Huracan STO với gi&aacute; b&aacute;n lẻ l&ecirc;n tới 56.500 USD (tương đương 1,3 tỷ đồng). Một con số khiến ch&uacute;ng ta phải chảy nước mắt khi m&agrave; mức gi&aacute; của bản th&acirc;n chiếc xe n&agrave;y từ 327.838 USD (tương đương 7,5 tỷ đồng) nhưng đ&oacute; cũng l&agrave; điều dễ hiểu khi m&agrave; đồng hồ của Roger Dubuis lu&ocirc;n l&agrave; một phụ kiện sang chảnh.</p>\r\n\r\n<p>Về chiếc xe truyền cảm hứng cho chiếc đồng hồ n&agrave;y, STO l&agrave; biến thể mạnh mẽ nhất của Huracan v&agrave; được trang bị động cơ V10 h&uacute;t kh&iacute; tự nhi&ecirc;n 5.2 L sản sinh c&ocirc;ng suất 631 m&atilde; lực v&agrave; m&ocirc; men xoắn 565 Nm. Kh&ocirc;ng giống như hầu hết c&aacute;c biến thể kh&aacute;c, STO sử dụng hệ thống dẫn động cầu sau v&agrave; nhẹ hơn 43 kg so với bản Performante.</p>\r\n\r\n<p><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2021/12/2-48-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2021/12/3-49-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2021/12/4-2-1-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2021/12/4-3-1-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2021/12/4-49-768x768.jpg\" style=\"height:300px; width:300px\" /></p>\r\n', 0, 1, 5, 3, 22),
(24, 'Đồng hồ 3', 'OIUJM', 2000000, 3000000, 4, 1, 2000000, '1667727042_dongho3.jpg', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Loại m&aacute;y</td>\r\n			<td>Automatic ETA Swiss</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hiển thị</td>\r\n			<td>Analog</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu vỏ</td>\r\n			<td>Th&eacute;p kh&ocirc;ng gỉ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đường k&iacute;nh vỏ</td>\r\n			<td>41mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ d&agrave;y vỏ</td>\r\n			<td>10mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu d&acirc;y đeo</td>\r\n			<td>&nbsp;Th&eacute;p kh&ocirc;ng gỉ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chiều rộng d&acirc;y đeo</td>\r\n			<td>26mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu mặt k&iacute;nh</td>\r\n			<td>Sapphire</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khả năng chịu nước</td>\r\n			<td>3ATM</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '<p>Trong những bộ sưu tập của c&aacute;c thương hiệu đồng hồ nổi tiếng tr&ecirc;n to&agrave;n thế giới, Royal Oak c&oacute; một sức h&uacute;t thực sự m&atilde;nh liệt. Chỉ cần nh&igrave;n tho&aacute;ng qua trong gi&acirc;y l&aacute;t, chắc chắn bạn sẽ nhận thấy ngay đ&acirc;u l&agrave; thiết kế của Royal Oak giữa h&agrave;ng ngh&igrave;n chiếc đồng hồ cao cấp. Một vẻ ngo&agrave;i c&aacute; t&iacute;nh t&aacute;o bạo, một n&eacute;t đẳng cấp ri&ecirc;ng c&oacute; m&agrave; Audermars Piguet đ&atilde; chắt chiu qua từng năm th&aacute;ng, để mỗi chiếc đồng hồ đều được thừa hưởng những gi&aacute; trị tinh hoa đặc sắc n&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2020/02/532225c82091d8cf8180-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2020/02/36ca6d2068799027c968-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2020/02/b6af0244071dff43a60c-768x768.jpg\" style=\"height:300px; width:300px\" /><img alt=\"\" src=\"https://donghodep.org/wp-content/uploads/2020/02/ca6b828687df7f8126ce-768x768.jpg\" style=\"height:300px; width:300px\" /></p>\r\n', 0, 1, 5, 3, 23),
(25, 'Dây chuyền 4', 'PLMJK', 1000000, 2000000, 5, NULL, NULL, '1668276989_daychuyen4.webp', '', '', 0, 1, 3, 5, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydh` date NOT NULL,
  `sodonhang` int(11) NOT NULL,
  `doanhthu` int(11) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydh`, `sodonhang`, `doanhthu`, `soluongban`) VALUES
(1, '2022-10-26', 4, 140350000, 24),
(2, '2022-10-25', 3, 20000000, 10),
(3, '2022-10-24', 2, 14000000, 13),
(4, '2022-10-23', 3, 20000000, 10),
(5, '2022-10-22', 2, 31000000, 12),
(6, '2022-10-21', 3, 6000000, 10),
(7, '2022-10-20', 2, 9500000, 13),
(8, '2022-10-19', 3, 25000000, 10),
(9, '2022-10-18', 2, 68950000, 13),
(10, '2022-10-17', 3, 20000000, 10),
(11, '2022-10-16', 2, 14000000, 13),
(12, '2022-10-15', 3, 20000000, 10),
(13, '2022-10-14', 2, 31000000, 12),
(14, '2022-10-13', 3, 6000000, 10),
(15, '2022-10-12', 2, 9500000, 13),
(16, '2022-10-11', 3, 25000000, 10),
(17, '2022-10-10', 2, 68950000, 13),
(18, '2022-10-09', 3, 20000000, 10),
(19, '2022-10-08', 2, 14000000, 13),
(20, '2022-10-07', 3, 20000000, 10),
(21, '2022-10-06', 2, 31000000, 12),
(22, '2022-10-05', 3, 6000000, 10),
(23, '2022-10-04', 2, 9500000, 13),
(24, '2022-10-03', 3, 25000000, 10),
(25, '2022-10-02', 2, 68950000, 13),
(26, '2022-10-01', 3, 20000000, 10),
(27, '2022-09-30', 2, 14000000, 13),
(28, '2022-09-29', 3, 20000000, 10),
(29, '2022-09-28', 2, 14000000, 13),
(30, '2022-09-27', 3, 20000000, 10),
(31, '2022-10-27', 1, 3700000, 2),
(32, '2022-11-01', 1, 9190000, 10),
(33, '2022-11-02', 1, 8100000, 2),
(34, '2022-11-04', 1, 7500000, 5),
(35, '2022-11-05', 24, 124120000, 29),
(36, '2022-11-06', 4, 26260000, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuc`
--

CREATE TABLE `tbl_tintuc` (
  `id` int(11) NOT NULL,
  `tentintuc` varchar(255) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuc`
--

INSERT INTO `tbl_tintuc` (`id`, `tentintuc`, `tomtat`, `noidung`, `hinhanh`, `tinhtrang`) VALUES
(1, 'Gemstone Ring Collection', '<blockquote>\r\n<p><strong>Những vi&ecirc;n đ&aacute; mang năng lượng từ đ&acirc;t</strong></p>\r\n</blockquote>\r\n', '<blockquote>\r\n<p><strong>Những vi&ecirc;n đ&aacute; mang năng lượng từ l&ograve;ng đất...</strong></p>\r\n</blockquote>\r\n\r\n<p>Mỗi một vi&ecirc;n đ&aacute; tồn tại tr&ecirc;n Tr&aacute;i Đất n&agrave;y đều mang trong m&igrave;nh vẻ đẹp trầm ổn ri&ecirc;ng biệt, trải qua nhiều chuyển biến, trầm t&iacute;ch, chẳng vi&ecirc;n n&agrave;o giống vi&ecirc;n n&agrave;o. Ch&uacute;ng được coi l&agrave; một loại k&igrave; quan của h&agrave;nh tinh, hầu hết những vi&ecirc;n đ&aacute; đều được h&igrave;nh th&agrave;nh trong c&aacute;c l&ograve; nung tự nhi&ecirc;n ở độ s&acirc;u h&agrave;ng ngh&igrave;n dặm b&ecirc;n dưới mặt đất. Bạn h&atilde;y thử nhặt l&ecirc;n một vi&ecirc;n đ&aacute; vỉa h&egrave; v&agrave; xem c&acirc;u chuyện đằng sau n&oacute;: c&oacute; thể ch&uacute;ng được sinh ra trong l&ograve;ng nham thạch, cũng c&oacute; thể được t&aacute;ch ra từ một ngọn n&uacute;i lửa, c&oacute; thể được h&igrave;nh th&agrave;nh qua sự t&iacute;ch tụ của c&aacute;c lớp trầm t&iacute;ch qua h&agrave;ng ngh&igrave;n năm tồn tại,...</p>\r\n\r\n<p>Lần đầu ti&ecirc;n xuất hiện tại Helios, bộ sưu tập nhẫn đ&iacute;nh đ&aacute; gồm 4 m&agrave;u sắc tự nhi&ecirc;n chủ đạo.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Lapis Lazuli:</strong>&nbsp;M&agrave;u xanh lam&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Nephrite Jade:</strong>&nbsp;&Aacute;nh xanh lục&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Amazonite:</strong>&nbsp;Xanh lục nhạt pha ch&uacute;t xanh lam&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Onyx:</strong>&nbsp;Vi&ecirc;n đ&aacute; mang sắc đen b&iacute; ẩn</p>\r\n	</li>\r\n	<li>\r\n	<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0589/2105/8473/files/bannerchu2_1024x1024.jpg?v=1629205422\" style=\"height:1024px; width:683px\" /></p>\r\n	</li>\r\n</ul>\r\n', '1667243761_br2.webp', 1),
(2, 'MOTORCYCLE', '<h1><strong>MOTORCYCLE COLLECTION by HELIOS</strong></h1>\r\n', '<p><a href=\"https://vimeo.com/586657143?embedded=true&amp;source=vimeo_logo&amp;owner=147579763\">https://vimeo.com/586657143?embedded=true&amp;source=vimeo_logo&amp;owner=147579763</a></p>\r\n\r\n<h1><strong>MOTORCYCLE COLLECTION by HELIOS</strong></h1>\r\n\r\n<blockquote>\r\n<p>&quot;Đi đ&acirc;u kh&ocirc;ng quan trọng,&nbsp;</p>\r\n\r\n<p>Quan trọng l&agrave; đi c&ugrave;ng ai...&quot;&nbsp;</p>\r\n</blockquote>\r\n\r\n<p>Bộ sưu tập PKL của Helios mang đến một phong c&aacute;ch nam t&iacute;nh, phong trần, bụi bặm. Với những thiết kế đ&atilde; được khẳng định, l&agrave; biểu tượng của d&acirc;n chơi PKL.&nbsp;</p>\r\n\r\n<p><strong>1. Nhẫn Fast:&nbsp;</strong>Biểu trưng cho Tốc Độ.&nbsp;</p>\r\n\r\n<p><strong>2. D&acirc;y chuyền Compass Key:</strong>&nbsp;Sự kết hợp ho&agrave;n hảo giữa ch&igrave;a kh&oacute;a v&agrave; la b&agrave;n, biểu tượng cho niềm đam m&ecirc; kh&aacute;m ph&aacute; điều mới lạ.&nbsp;</p>\r\n\r\n<p><strong>3. V&ograve;ng tay Power Wheel:</strong>&nbsp;Thể hiện sức mạnh cơ bắp, gan g&oacute;c với thiết kế b&aacute;nh răng.&nbsp;</p>\r\n\r\n<p><strong>4. Khuy&ecirc;n tai Compass:</strong>&nbsp;Một sự tinh tế với &yacute; nghĩa tượng trưng gi&uacute;p bạn t&igrave;m đ&uacute;ng hướng để thực hiện ước mơ v&agrave; kh&ocirc;ng lạc mất những thứ quan trọng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0589/2105/8473/files/banner1_1_2048x2048.jpg?v=1629182581\" style=\"height:625px; width:500px\" /></p>\r\n', '1667245228_banner1_1_2048x2048.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vanchuyen`
--

CREATE TABLE `tbl_vanchuyen` (
  `id_vanchuyen` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_vanchuyen`
--

INSERT INTO `tbl_vanchuyen` (`id_vanchuyen`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(2, 'HuyDiep', '0946850747', 'Hóc môn cần thơ', 'giao nhanh nhé', 2),
(3, 'nhiimeow', '0946850747', 'Trà vinh', 'giao lẹ nha shop', 1),
(4, 'Diệp Bảo Hoàng', '0123456789', '89, Trần Hưng Đạo, phường 5, TP Bạc Liêu', 'Giao hàng cẩn thận, hàng dễ vỡ', 3),
(5, 'Diệp Thanh Tuấn', '0917724874', 'Ấp Xẻo Chích, TT Châu Hưng, huyện Vĩnh Lợi, tỉnh Bạc Liêu', 'Giao hàng nhanh nhé', 4),
(6, 'Trần Thị Kiều Oanh', '0918805015', 'TT Châu Hưng, huyện Vĩnh Lợi, TP Bạc Liêu', 'Liên hệ số khác ( 0946850747 )', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` varchar(100) NOT NULL,
  `vnp_bankcode` varchar(100) NOT NULL,
  `vnp_banktranno` varchar(100) DEFAULT NULL,
  `vnp_cardtype` varchar(100) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(100) NOT NULL,
  `vnp_tmncode` varchar(100) NOT NULL,
  `vnp_transactionno` varchar(100) DEFAULT NULL,
  `code_donhang` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_vnpay`
--

INSERT INTO `tbl_vnpay` (`id_vnpay`, `vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `code_donhang`) VALUES
(1, '888000000', 'NCB', 'VNP13872233', 'ATM', 'Thanh toán hóa đơn', '20221106173116', '0NAK9QDT', '13872233', 5666);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id_chitietdonhang`);

--
-- Chỉ mục cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  ADD PRIMARY KEY (`id_danhgia`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id_donhang`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_momo`
--
ALTER TABLE `tbl_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Chỉ mục cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_nhaphang`
--
ALTER TABLE `tbl_nhaphang`
  ADD PRIMARY KEY (`id_nhaphang`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_vanchuyen`
--
ALTER TABLE `tbl_vanchuyen`
  ADD PRIMARY KEY (`id_vanchuyen`);

--
-- Chỉ mục cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id_chitietdonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_danhgia`
--
ALTER TABLE `tbl_danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_momo`
--
ALTER TABLE `tbl_momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_nhaphang`
--
ALTER TABLE `tbl_nhaphang`
  MODIFY `id_nhaphang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_vanchuyen`
--
ALTER TABLE `tbl_vanchuyen`
  MODIFY `id_vanchuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
