-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2017 at 06:56 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dathang`
--

CREATE TABLE IF NOT EXISTS `tbl_dathang` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `MaNguoiDung` int(10) NOT NULL,
  `DiaChiGiaoHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dathang_chitiet`
--

CREATE TABLE IF NOT EXISTS `tbl_dathang_chitiet` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `MaDatHang` int(10) NOT NULL,
  `MaSach` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGiaBan` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loaisach`
--

CREATE TABLE IF NOT EXISTS `tbl_loaisach` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TenLoai` (`TenLoai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_loaisach`
--

INSERT INTO `tbl_loaisach` (`ID`, `TenLoai`) VALUES
(1, 'Kinh tế'),
(2, 'Ngoại ngữ'),
(3, 'Pháp luật'),
(7, 'Thể thao - Du lịch'),
(5, 'Tin học'),
(6, 'Toán học'),
(4, 'Từ điển'),
(9, 'Văn hóa xã hội'),
(8, 'Văn học');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nguoidung`
--

CREATE TABLE IF NOT EXISTS `tbl_nguoidung` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `HoVaTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `QuyenHan` tinyint(1) NOT NULL,
  `Khoa` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TenDangNhap` (`TenDangNhap`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`ID`, `HoVaTen`, `TenDangNhap`, `MatKhau`, `QuyenHan`, `Khoa`) VALUES
(1, 'Nguyễn Hoàng Tùng', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0),
(2, 'Nguyễn Văn An', 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhaxuatban`
--

CREATE TABLE IF NOT EXISTS `tbl_nhaxuatban` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `TenNhaXB` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TenNhaXB` (`TenNhaXB`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_nhaxuatban`
--

INSERT INTO `tbl_nhaxuatban` (`ID`, `TenNhaXB`) VALUES
(1, 'Giáo Dục'),
(3, 'Hội Nhà Văn'),
(4, 'Phụ Nữ'),
(5, 'Thanh Niên'),
(2, 'Tổng Hợp TP.Hồ Chí Minh'),
(7, 'Văn Hóa Thông Tin'),
(6, 'Văn Học');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sach`
--

CREATE TABLE IF NOT EXISTS `tbl_sach` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `MaLoai` int(10) NOT NULL,
  `MaNhaXB` int(10) NOT NULL,
  `TenSach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  `DonGia` int(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `MaLoai` (`MaLoai`),
  KEY `MaNhaXB` (`MaNhaXB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_sach`
--

INSERT INTO `tbl_sach` (`ID`, `MaLoai`, `MaNhaXB`, `TenSach`, `MoTa`, `DonGia`, `SoLuong`, `HinhAnh`) VALUES
(1, 1, 5, 'Bạn làm việc vì ai?', '', 120000, 99, 'ban-lam-viec-vi-ai.jpg'),
(2, 8, 3, 'Cái tết của mèo con', '', 85000, 99, 'cai-tet-cua-meo-con.jpg'),
(3, 8, 5, 'Chạm tới giấc mơ', '', 99000, 90, 'cham-toi-giac-mo.jpg'),
(4, 1, 7, 'Mã Vân giày vải', '', 130000, 99, 'ma-van-giay-vai.jpg'),
(5, 8, 7, 'Nhập môn nghe nói Hán ngữ', '', 150000, 100, 'nhap-mon-nghe-noi-han-ngu.jpg'),
(6, 8, 5, 'Vấp nhưng đừng ngã', '', 45000, 100, 'vap-nhung-dung-nga.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
