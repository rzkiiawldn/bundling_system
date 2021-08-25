-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Agu 2021 pada 13.43
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bundling_system`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_code` varchar(50) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `id_stock_allocation` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `active` varchar(11) NOT NULL,
  `id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `user_id`, `client_code`, `client_name`, `id_stock_allocation`, `created_date`, `active`, `id_location`) VALUES
(9, 7, 'C_IMCS_STORE', 'IMCS STORE', 2, '2021-07-02', 'Yes', 1),
(10, 12, 'C_ZOYA', 'ZOYA STORE', 3, '2021-07-02', 'Yes', 1),
(11, 13, 'C_HYPEFAST.ID', 'HYPEFAST.ID', 3, '2021-07-13', 'Yes', 1),
(12, 16, 'c_dummy', 'dummy', 7, '2021-08-10', 'Yes', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `kd_department` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`department_id`, `kd_department`, `name`, `created_date`, `created_by`) VALUES
(1, 'tech', 'TECH', '0000-00-00', 'riris'),
(2, 'hod_tech', 'HOD TECH', '0000-00-00', 'riris'),
(3, 'admin_store', 'ADMIN STORE', '0000-00-00', 'ristiani'),
(4, 'admin_operation', 'ADMIN OPERATION', '0000-00-00', 'ristiani'),
(5, 'client', 'CLIENT', '0000-00-00', 'ristiani'),
(6, 'supervisior', 'SUPERVISIOR', '0000-00-00', 'ristiani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_bundling`
--

CREATE TABLE `item_bundling` (
  `id_item_bundling` int(11) NOT NULL,
  `item_bundling_code` varchar(50) NOT NULL,
  `item_bundling_name` varchar(100) NOT NULL,
  `item_bundling_barcode` varchar(50) NOT NULL,
  `manage_by` varchar(50) NOT NULL,
  `qty` int(20) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `id_client` int(11) NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_bundling`
--

INSERT INTO `item_bundling` (`id_item_bundling`, `item_bundling_code`, `item_bundling_name`, `item_bundling_barcode`, `manage_by`, `qty`, `total_price`, `id_client`, `active`, `created_date`, `created_by`) VALUES
(11, 'ITMBUN_IMCS001', 'BUNDLING SEHAT', 'ITMBUN_IMCS001', 'Batch Inbound', 2, '82100', 9, 'yes', '2021-08-10', 'Admin Store'),
(12, 'ITMBUN_IMCS002', 'BUNDLING TOWEL', 'ITMBUN_IMCS002', 'Batch Inbound', 2, '22000', 9, 'yes', '2021-08-10', 'Admin Store'),
(13, 'BUNDIMCS003', 'PACKET IMCS SEHAT', '', 'Batch Inbound', 2, '40500', 9, 'yes', '2021-08-10', 'Admin Store'),
(14, 'ITMBUND_SCARF001', 'SCARF PACKET', 'ITMBUND_SCARF001', 'Batch Inbound', 2, '81000', 10, 'yes', '2021-08-11', 'Admin Store'),
(15, 'ITM_BUN_SC_BAN002', 'SCARF FREE BANDANA', 'ITM_BUN_SC_BAN002', 'Batch Inbound', 2, '45000', 10, 'yes', '2021-08-11', 'Admin Store'),
(16, 'BND_ZOYA0102', 'BUNDLING ZOYA', 'BND_ZOYA0102', 'Batch Inbound', 2, '90000', 10, 'yes', '2021-08-18', 'Admin Store');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_bundling_detail`
--

CREATE TABLE `item_bundling_detail` (
  `id_item_bundling_detail` int(11) NOT NULL,
  `id_item_bundling` int(11) NOT NULL,
  `id_item_nonbundling` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_bundling_detail`
--

INSERT INTO `item_bundling_detail` (`id_item_bundling_detail`, `id_item_bundling`, `id_item_nonbundling`, `item_qty`, `price`) VALUES
(33, 11, 40, 1, '25500'),
(34, 11, 39, 1, '56600'),
(35, 12, 1, 1, '20000'),
(36, 12, 2, 1, '2000'),
(37, 13, 41, 1, '15000'),
(38, 13, 40, 1, '25500'),
(39, 14, 49, 1, '46000'),
(40, 14, 47, 1, '35000'),
(41, 15, 45, 1, '35000'),
(42, 15, 48, 1, '10000'),
(43, 16, 52, 1, '45000'),
(44, 16, 54, 1, '45000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_nonbundling`
--

CREATE TABLE `item_nonbundling` (
  `id_item_nonbundling` int(11) NOT NULL,
  `item_nonbundling_code` varchar(50) NOT NULL,
  `item_nonbundling_name` varchar(100) NOT NULL,
  `item_nonbundling_barcode` varchar(50) NOT NULL,
  `manage_by` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `minimum_stock` int(20) NOT NULL,
  `publish_price` int(20) NOT NULL,
  `additional_expired` int(20) NOT NULL,
  `size` varchar(100) NOT NULL,
  `length` int(20) NOT NULL,
  `width` int(20) NOT NULL,
  `height` int(20) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL,
  `is_fragile` varchar(10) NOT NULL,
  `cool_storage` varchar(100) NOT NULL,
  `id_client` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_nonbundling`
--

INSERT INTO `item_nonbundling` (`id_item_nonbundling`, `item_nonbundling_code`, `item_nonbundling_name`, `item_nonbundling_barcode`, `manage_by`, `description`, `brand`, `model`, `category`, `minimum_stock`, `publish_price`, `additional_expired`, `size`, `length`, `width`, `height`, `weight`, `dimension`, `active`, `is_fragile`, `cool_storage`, `id_client`, `created_date`, `created_by`) VALUES
(1, 'ITM69783158', 'TRANSITION WRAP 2.0 CHANGING TOWEL AND SEAT COVER (CARIBBEAN BLUE)', 'ITM69783158', 'Batch Inbound', 'CHANGING TOWEL AND SEAT COVER', 'IMCS', 'STANDART', 'BATH', 10, 20000, 0, 'S', 10, 10, 10, '1.00', '0.001', 'Yes', 'Yes', 'Yes', 9, '2021-07-02', '8'),
(2, 'ITM69783157', 'TRANSITION WRAP 2.0 CHANGING TOWEL AND SEAT COVER (BLACK)', 'ITM69783157', 'Batch Inbound', 'CHANGING TOWEL AND SEAT COVER', 'IMCS', 'STANDART', 'BATH', 10, 20000, 0, 'S', 1, 1, 1, '1.00', '0.000001', 'Yes', 'Yes', 'Yes', 9, '2021-07-02', '8'),
(39, 'ITM69783153', 'TRAIL TOES FOOT AND BODY CREAM 2 OZ JARS', 'ITM69783153', 'Expired Date', 'BODY CREAM JARS', 'TRAIL', 'JAR', 'SKIN CARE', 10, 56600, 700, 'S', 15, 29, 16, '0.50', '0.00696', 'Yes', 'No', 'No', 9, '2021-08-10', 'Admin Store'),
(40, 'ITM29368170', 'IMCS DAILY MASK - NON MEDICAL MASK (1 INSERT)', 'ITM29368170', 'Batch Inbound', 'Masker Kain daily mask', 'IMCS', 'STANDART', 'HEALTH', 10, 25500, 700, '', 10, 10, 10, '0.20', '0.001', 'Yes', 'No', 'No', 9, '2021-08-10', 'Admin Store'),
(41, 'ITM08312549', 'STERILEX – HAND SANITIZER 100 ML SPRAY', 'ITM08312549', 'Expired Date', 'HAND SANITIZER', 'STERILEX', 'SPRAY', 'HEALTH', 10, 15000, 700, '', 10, 10, 10, '0.50', '0.001', 'Yes', 'No', 'No', 9, '2021-08-10', 'Admin Store'),
(44, 'ZRK3.TA.221434', 'MARSHA HB CASUAL LIGHT TOSCA', 'ZRK3.TA.221434', 'Batch Inbound', 'HIJAB', 'ZOYA', 'CASUAL', 'HIJAB', 10, 47000, 0, '', 30, 15, 10, '0.20', '0.0045', 'Yes', 'No', 'No', 10, '2021-08-10', 'Admin Store'),
(45, 'ZPL4.B2.917974', 'CHANDANI SCARF ICE GREY', 'ZPL4.B2.917974', 'Batch Inbound', 'SCARF', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 35000, 0, '', 30, 25, 10, '0.20', '0.0075', 'Yes', 'No', 'No', 10, '2021-08-10', 'Admin Store'),
(46, 'ZPL4.B2.917930', 'CHANDANI SCARF RASPBERRY ROSE', 'ZPL4.B2.917930', 'Batch Inbound', 'SCARF', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 40000, 0, '', 50, 25, 10, '0.20', '0.0125', 'Yes', 'No', 'No', 10, '2021-08-10', 'Admin Store'),
(47, 'ZPL4.B2.918202', 'QIERAN SCARF SILVER GREY', 'ZPL4.B2.918202', 'Batch Inbound', 'SCARF', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 35000, 0, '', 30, 25, 10, '0.20', '0.0075', 'No', 'Yes', 'Yes', 10, '2021-08-10', 'Admin Store'),
(48, 'ZPL4.B4.602504', 'BANDANA NAOMI 7 DARK BROWN', 'ZPL4.B4.602504', 'Batch Inbound', 'BANDANA', 'ZOYA', 'BANDANA', 'HIJAB', 10, 10000, 0, '', 25, 15, 10, '0.30', '0.00375', 'Yes', 'No', 'No', 10, '2021-08-10', 'Admin Store'),
(49, 'ZPL4.B2.899002', 'OMBRE SUPER SCARF', 'ZPL4.B2.899002', 'Batch Inbound', 'SCARF', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 46000, 0, '', 50, 25, 15, '0.20', '0.01875', 'Yes', 'No', 'No', 10, '2021-08-10', 'Admin Store'),
(50, 'NORTH002', 'ITEM NORTH 002', 'NORTH002', 'Batch Inbound', 'NORTH', 'NORTH', 'NORTH', 'NORTH', 10, 55000, 0, '', 20, 20, 20, '0.50', '0.008', 'Yes', 'No', 'No', 12, '2021-08-10', 'Admin Store'),
(51, 'ITM32598461', 'MASKER KAIN - IMCS DAILY MASK (SPECIAL EDITION 1 INSERT) - SMALL SIZE', 'ITM32598461', 'Batch Inbound', 'Masker Kain daily mask', 'IMCS', 'DAILY', 'HEALTH', 10, 25500, 0, 'S', 60, 30, 30, '0.20', '0.054', 'Yes', 'No', 'No', 9, '2021-08-10', 'Admin Store'),
(52, 'ITMZOYA001', 'ZOYA SCARF', 'ITMZOYA001', 'Batch Inbound', 'SCARF', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 45000, 0, '', 100, 50, 100, '0.20', '0.5', 'Yes', 'No', 'No', 10, '2021-08-15', 'Admin Store'),
(53, 'ITEMABC01', 'ITEM ABC', 'ITEMABC01', 'Batch Inbound', 'ITEM ABC', 'ZOYA', 'ABC', 'ABC', 10, 30000, 0, '', 30, 30, 10, '0.20', '0.009', 'Yes', 'No', 'No', 10, '2021-08-17', 'Admin Store'),
(54, 'ITMZOYA002', 'ZOYA SCARF 02', 'ITMZOYA002', 'Batch Inbound', 'LONG SCARF', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 45000, 0, '', 60, 30, 60, '0.20', '0.108', 'Yes', 'No', 'No', 10, '2021-08-18', 'Admin Store'),
(55, 'ITMZOYA0201', 'ZOYA MIRANDA SCARF DUSTY PINK', 'ITMTOUCH05', 'Batch Inbound', 'HIJAB', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 27000, 0, '', 20, 20, 20, '1.50', '0.008', 'YES', 'YES', '11', 9, '2021-08-18', 'Admin Store'),
(56, 'ITMZOYA0202', 'ZOYA DANISH DRESS XL', 'ITMTOUCH06', 'Batch Inbound', 'HIJAB', 'ZOYA', 'DRESS', 'DRESS', 10, 250000, 0, 'XL', 20, 20, 20, '1.50', '0.008', 'YES', 'YES', '11', 9, '2021-08-18', 'Admin Store'),
(57, 'ITMZOYA0203', 'ZOYA MIRANDA SCARF MINT', 'ITMTOUCH07', 'Batch Inbound', 'HIJAB', 'ZOYA', 'LONG SCARF', 'HIJAB', 10, 25000, 0, '', 20, 20, 20, '1.50', '0.008', 'YES', 'YES', '11', 9, '2021-08-18', 'Admin Store');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `location_code` varchar(50) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `province` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id_location`, `location_code`, `location_name`, `address`, `province`, `country`, `created_date`, `created_by`) VALUES
(1, 'LOC01', 'WH PALMERAH', 'tgr', 'banten', 'indonesia', '0000-00-00', 'aa'),
(12, 'LOC02', 'WH  KAMAL', 'jl. kp kelapa rt 03/005', 'Banten', 'Indonesia', '0000-00-00', 'bb'),
(13, 'LOC03', 'WH KELAPA GADING', 'jl. kp kelapa rt 03/005', 'Banten', 'Indonesia', '2021-07-02', 'tech'),
(15, 'LOC04', 'WH DUMMY', 'DUMMY', 'DUMMY', 'DUMMY', '2021-08-10', 'tech');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `nama_pihak1` varchar(100) NOT NULL,
  `posisi_pihak1` varchar(100) NOT NULL,
  `dept_pihak1` varchar(100) NOT NULL,
  `plat_code` varchar(100) NOT NULL,
  `nama_pihak2` varchar(100) NOT NULL,
  `posisi_pihak2` varchar(100) NOT NULL,
  `dept_pihak2` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `uom` varchar(100) NOT NULL,
  `remaks` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `nama_pihak1`, `posisi_pihak1`, `dept_pihak1`, `plat_code`, `nama_pihak2`, `posisi_pihak2`, `dept_pihak2`, `lokasi`, `uom`, `remaks`, `tanggal`, `status`, `id_client`, `created_by`, `created_date`) VALUES
(17, 'SUCIPTO', 'client staff', 'client', 'B 2345 KLM', 'Bani', 'admin operational', 'Operational', 'Palmerah', 'Pack', '2 JENIS ITEM BUNDLING', '2021-08-10', 1, 9, 'admin operational', '2021-08-10'),
(18, 'PT MULTIFORTUNA ASIA', 'CLIENT STAFF', 'CLIENT', 'B 2345 ABC', 'AHMAD', 'ADMIN OPERATIONAL', 'Operational', 'PALMERAH', 'Pack', 'ITEM BUNDLING TELAH DITERIMA', '2021-08-11', 1, 9, 'admin operational', '2021-08-11'),
(19, 'ZOYA', 'CLIENT', 'CLIENT', 'B 8798 ABC', 'STAFF OPERATIONAL', 'STAFF', 'OPERATIONAL', 'PALMERAH', 'Pcs', 'ITEM BUNDLING 98 PCS', '2021-08-17', 1, 10, 'admin operational', '2021-08-17'),
(20, 'CLIENT', 'client staff', 'client', 'B 2345 KLM', 'ADMIN OPERATIONAL', 'ADMIN OPERATIONAL', 'OPERATIONAL', 'Palmerah', 'Pack', 'ITEM BUNDLING TERDAPAT 100 PACK', '2021-08-18', 1, 10, 'admin operational', '2021-08-18'),
(21, 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'Pack', 'as', '2021-12-31', 0, 9, 'riris', '2021-08-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_detail`
--

CREATE TABLE `news_detail` (
  `id_news_detail` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_request_bundling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news_detail`
--

INSERT INTO `news_detail` (`id_news_detail`, `id_news`, `id_request_bundling`) VALUES
(23, 17, 24),
(24, 17, 25),
(25, 18, 26),
(26, 19, 27),
(27, 20, 28),
(28, 21, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_bundling`
--

CREATE TABLE `request_bundling` (
  `id_request_bundling` int(11) NOT NULL,
  `request_bundling_barcode` varchar(50) NOT NULL,
  `request_bundling_code` varchar(50) NOT NULL,
  `bundling_type` enum('Bundling from inbound') NOT NULL,
  `id_item_bundling` int(20) NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `packing_type` varchar(100) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request_bundling`
--

INSERT INTO `request_bundling` (`id_request_bundling`, `request_bundling_barcode`, `request_bundling_code`, `bundling_type`, `id_item_bundling`, `request_quantity`, `packing_type`, `id_status`, `id_client`, `report`, `created_date`, `created_by`, `photo`) VALUES
(24, 'REQ1008210002', 'REQ1008210002', 'Bundling from inbound', 11, 998, 'BOX', 1, 9, 1, '2021-08-10', 'admin operational', 'IMG_08401.JPG'),
(25, 'REQ1008210003', 'REQ1008210003', 'Bundling from inbound', 12, 900, 'PLASTIC', 1, 9, 0, '2021-08-10', 'Admin Store', 'IMG_08421.JPG'),
(26, 'REQ1108210004', 'REQ1108210004', 'Bundling from inbound', 13, 1000, 'BUBBLE WRAP', 1, 9, 0, '2021-08-11', 'Admin Store', 'IMG_0842.JPG'),
(27, 'REQ1508210005', 'REQ1508210005', 'Bundling from inbound', 14, 98, 'PLASTIC', 1, 10, 0, '2021-08-15', 'Admin Store', 'IMG_08422.JPG'),
(28, 'REQ1808210006', 'REQ1808210006', 'Bundling from inbound', 16, 100, 'PLASTIC', 1, 10, 0, '2021-08-18', 'Admin Store', 'IMG_08402.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'success'),
(4, 'request'),
(6, 'cancel'),
(8, 'process');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_allocation`
--

CREATE TABLE `stock_allocation` (
  `id_stock_allocation` int(11) NOT NULL,
  `stock_allocation_code` varchar(50) NOT NULL,
  `stock_allocation_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock_allocation`
--

INSERT INTO `stock_allocation` (`id_stock_allocation`, `stock_allocation_code`, `stock_allocation_name`) VALUES
(2, 'ALL01', 'TOKOPEDIA'),
(3, 'ALL02', 'LAZADA'),
(4, 'ALL01', 'BLIBLI'),
(6, 'ALL04', 'SHOPPEE'),
(7, 'ALL05', 'MULTICHANNEL'),
(8, 'ALL06', 'ZILINGGO'),
(9, 'ALL07', 'TOKO CABANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `id_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `email`, `no_telp`, `password`, `image`, `department_id`, `created_date`, `created_by`, `id_location`) VALUES
(1, 'riris', 'risti', 'risti@gmail.com', '123', '1234', 'default.jpg', 1, '0000-00-00', 'riris', NULL),
(4, 'supervisior', 'supervisior', 'user@gmail.com', '111', '1234', 'default.jpg', 6, '0000-00-00', '', 1),
(5, 'Admin Store', 'admin_store', 'admin_st@gmail.com', '12211', '1234', 'default.jpg', 3, '0000-00-00', '', NULL),
(6, 'admin operational', 'admin_operational', 'admin_op@gmail.com', '1221', '1234', 'default.jpg', 4, '0000-00-00', '', 1),
(7, 'IMCS STORE', 'c_imcs_store', 'user@gmail.com', '021123', '1234', 'bg31.png', 5, '0000-00-00', '', NULL),
(8, 'Staff Tech', 'tech', 'tech@gmail.comm', '010111', '12345', 'default.jpg', 1, '0000-00-00', '', NULL),
(10, 'staff tech', 'tech2', 'abc@abc.abc', '121212', '1234', 'default.jpg', 2, '0000-00-00', 'tech', NULL),
(12, 'client_zoya', 'c_zoya_store', 'qwe@gmail.com', '021111', '1234', '1024px-VisualEditor_-_Icon_-_Menu_svg.png', 5, '0000-00-00', 'tech', NULL),
(13, 'client_3', 'client_3', 'client@gmail.com', '1212', '1234', '1.PNG', 5, '2021-07-13', 'tech', NULL),
(14, 'ao_kamal', 'ao_kamal', 'admin_loc@gmail.com', '12321', '123qwe', '2.PNG', 4, '2021-07-14', 'tech', 12),
(15, 'spv loc2', 'spv_2', 'sanggar@tari.com', '1212', '1234', '3.PNG', 6, '2021-07-14', 'tech', 12),
(16, 'client_4', 'c_dummy', 'dummy@gmail.com', '087898776787', '1234', 'bg3.png', 5, '2021-08-10', 'tech', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_stock_allocation` (`id_stock_allocation`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_location` (`id_location`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indeks untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  ADD PRIMARY KEY (`id_item_bundling`),
  ADD KEY `id_client` (`id_client`);

--
-- Indeks untuk tabel `item_bundling_detail`
--
ALTER TABLE `item_bundling_detail`
  ADD PRIMARY KEY (`id_item_bundling_detail`),
  ADD KEY `id_item_bundling` (`id_item_bundling`),
  ADD KEY `id_item_nonbundling` (`id_item_nonbundling`);

--
-- Indeks untuk tabel `item_nonbundling`
--
ALTER TABLE `item_nonbundling`
  ADD PRIMARY KEY (`id_item_nonbundling`),
  ADD KEY `id_client` (`id_client`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_client` (`id_client`);

--
-- Indeks untuk tabel `news_detail`
--
ALTER TABLE `news_detail`
  ADD PRIMARY KEY (`id_news_detail`),
  ADD KEY `id_news` (`id_news`),
  ADD KEY `id_request_bundling` (`id_request_bundling`);

--
-- Indeks untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  ADD PRIMARY KEY (`id_request_bundling`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_item_bundling` (`id_item_bundling`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `stock_allocation`
--
ALTER TABLE `stock_allocation`
  ADD PRIMARY KEY (`id_stock_allocation`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  MODIFY `id_item_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `item_bundling_detail`
--
ALTER TABLE `item_bundling_detail`
  MODIFY `id_item_bundling_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `item_nonbundling`
--
ALTER TABLE `item_nonbundling`
  MODIFY `id_item_nonbundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `news_detail`
--
ALTER TABLE `news_detail`
  MODIFY `id_news_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  MODIFY `id_request_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `stock_allocation`
--
ALTER TABLE `stock_allocation`
  MODIFY `id_stock_allocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_stock_allocation`) REFERENCES `stock_allocation` (`id_stock_allocation`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `client_ibfk_3` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`);

--
-- Ketidakleluasaan untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  ADD CONSTRAINT `item_bundling_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Ketidakleluasaan untuk tabel `item_bundling_detail`
--
ALTER TABLE `item_bundling_detail`
  ADD CONSTRAINT `item_bundling_detail_ibfk_1` FOREIGN KEY (`id_item_bundling`) REFERENCES `item_bundling` (`id_item_bundling`),
  ADD CONSTRAINT `item_bundling_detail_ibfk_2` FOREIGN KEY (`id_item_nonbundling`) REFERENCES `item_nonbundling` (`id_item_nonbundling`);

--
-- Ketidakleluasaan untuk tabel `item_nonbundling`
--
ALTER TABLE `item_nonbundling`
  ADD CONSTRAINT `item_nonbundling_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Ketidakleluasaan untuk tabel `news_detail`
--
ALTER TABLE `news_detail`
  ADD CONSTRAINT `news_detail_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `news_detail_ibfk_2` FOREIGN KEY (`id_request_bundling`) REFERENCES `request_bundling` (`id_request_bundling`);

--
-- Ketidakleluasaan untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  ADD CONSTRAINT `request_bundling_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `request_bundling_ibfk_2` FOREIGN KEY (`id_item_bundling`) REFERENCES `item_bundling` (`id_item_bundling`),
  ADD CONSTRAINT `request_bundling_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
