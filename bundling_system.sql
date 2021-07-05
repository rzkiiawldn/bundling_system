-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 14.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `client_code` varchar(100) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `id_stock_allocation` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `active` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `user_id`, `client_code`, `client_name`, `id_stock_allocation`, `created_date`, `active`) VALUES
(9, 7, 'C_1', 'Client 1', 2, '2021-07-02', 'Yes'),
(10, 12, 'C_2', 'Client 2', 3, '2021-07-02', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `kd_department` varchar(200) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(200) NOT NULL
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
  `item_bundling_code` varchar(155) NOT NULL,
  `item_bundling_name` varchar(225) NOT NULL,
  `item_bundling_barcode` varchar(225) NOT NULL,
  `manage_by` varchar(225) NOT NULL,
  `qty` int(20) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_bundling`
--

INSERT INTO `item_bundling` (`id_item_bundling`, `item_bundling_code`, `item_bundling_name`, `item_bundling_barcode`, `manage_by`, `qty`, `total_price`, `id_client`, `id_location`, `created_date`, `created_by`) VALUES
(1, 'BUND-1', 'bundling 1', 'BUND-1', 'Expired Date', 4, '26000', 10, 1, '2021-07-02', '8'),
(2, 'BUND-2', 'bundling 2', 'BUND-2', 'Batch Inbound', 4, '44000', 9, 1, '2021-07-02', '8');

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
(1, 1, 1, 1, '20000'),
(2, 1, 2, 2, '4000'),
(3, 2, 1, 2, '40000'),
(4, 2, 2, 2, '4000'),
(5, 1, 3, 1, '2000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_nonbundling`
--

CREATE TABLE `item_nonbundling` (
  `id_item_nonbundling` int(11) NOT NULL,
  `item_nonbundling_code` varchar(200) NOT NULL,
  `item_nonbundling_name` varchar(200) NOT NULL,
  `item_nonbundling_barcode` varchar(200) NOT NULL,
  `manage_by` varchar(100) NOT NULL,
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
  `weight` int(20) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL,
  `is_fragile` varchar(10) NOT NULL,
  `cool_storage` varchar(100) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_nonbundling`
--

INSERT INTO `item_nonbundling` (`id_item_nonbundling`, `item_nonbundling_code`, `item_nonbundling_name`, `item_nonbundling_barcode`, `manage_by`, `description`, `brand`, `model`, `category`, `minimum_stock`, `publish_price`, `additional_expired`, `size`, `length`, `width`, `height`, `weight`, `dimension`, `active`, `is_fragile`, `cool_storage`, `id_client`, `id_location`, `created_date`, `created_by`) VALUES
(1, 'CODE-1', 'Item 1', 'CODE-1', 'Expired Date', 'nothing', 'nothing', 'nothing', 'nothing', 100, 20000, 7, 'S', 10, 10, 10, 1, '0.001', 'Yes', 'Yes', 'Yes', 9, 1, '2021-07-02', '8'),
(2, 'CODE-2', 'Item 2', 'CODE-2', 'Expired Date', 'nothing', 'nothing', 'nothing', 'nothing', 10, 2000, 2, 'S', 1, 1, 1, 1, '0.000001', 'Yes', 'Yes', 'Yes', 9, 12, '2021-07-02', '8'),
(3, 'CODE-3', 'Item 3', 'CODE-3', 'Expired Date', 'nothing', 'nothing', 'nothing', 'nothing', 100, 2000, 8, 'S', 1, 2, 2, 1, '0.000004', 'Yes', 'Yes', 'Yes', 10, 1, '2021-07-02', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `location_code` varchar(100) NOT NULL,
  `location_name` varchar(500) NOT NULL,
  `address` varchar(200) NOT NULL,
  `province` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id_location`, `location_code`, `location_name`, `address`, `province`, `country`, `created_date`, `created_by`) VALUES
(1, 'L_1', 'Location 1', 'tgr', 'banten', 'indonesia', '0000-00-00', 'aa'),
(12, 'L_2', 'Location 2', 'jl. kp kelapa rt 03/005', 'Banten', 'Indonesia', '0000-00-00', 'bb'),
(13, 'L_3', 'Location 3', 'jl. kp kelapa rt 03/005', 'Banten', 'Indonesia', '2021-07-02', 'tech');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `nama_pihak1` varchar(225) NOT NULL,
  `posisi_pihak1` varchar(225) NOT NULL,
  `dept_pihak1` varchar(225) NOT NULL,
  `nama_pihak2` varchar(225) NOT NULL,
  `posisi_pihak2` varchar(225) NOT NULL,
  `dept_pihak2` varchar(225) NOT NULL,
  `lokasi` varchar(225) NOT NULL,
  `id_barang` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `created_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `nama_pihak1`, `posisi_pihak1`, `dept_pihak1`, `nama_pihak2`, `posisi_pihak2`, `dept_pihak2`, `lokasi`, `id_barang`, `tanggal`, `status`, `id_client`, `id_location`, `created_by`) VALUES
(3, 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', '2021-12-31', 0, 9, 1, '8'),
(4, 'asas', 'asas', 'asas', 'asas', 'asas', 'asas', 'asas', 'asas', '2021-12-31', 0, 9, 1, '8'),
(5, 'asas', 'asas', 'aaaaa', 'sssss', 's', 's', 's', 's', '2021-12-31', 0, 9, 1, '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_bundling`
--

CREATE TABLE `request_bundling` (
  `id_request_bundling` int(11) NOT NULL,
  `request_bundling_barcode` varchar(225) NOT NULL,
  `request_bundling_code` varchar(200) NOT NULL,
  `bundling_type` enum('Bundling from inbound') NOT NULL,
  `id_item_bundling` int(20) NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `packing_type` varchar(100) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request_bundling`
--

INSERT INTO `request_bundling` (`id_request_bundling`, `request_bundling_barcode`, `request_bundling_code`, `bundling_type`, `id_item_bundling`, `request_quantity`, `packing_type`, `id_status`, `id_user`, `id_client`, `id_location`, `report`) VALUES
(13, 'REQ-1', 'REQ-1', 'Bundling from inbound', 1, 6, 'PLASTIC', 4, '8', 10, 1, 1),
(14, 'REQ-2', 'REQ-2', 'Bundling from inbound', 2, 2, 'BOX', 4, '8', 10, 1, 1),
(15, 'REQ-3', 'REQ-3', 'Bundling from inbound', 2, 2, 'BUBBLE WRAP', 1, '8', 9, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'success'),
(4, 'pending'),
(6, 'cancel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_allocation`
--

CREATE TABLE `stock_allocation` (
  `id_stock_allocation` int(11) NOT NULL,
  `stock_allocation_code` varchar(100) NOT NULL,
  `stock_allocation_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock_allocation`
--

INSERT INTO `stock_allocation` (`id_stock_allocation`, `stock_allocation_code`, `stock_allocation_name`) VALUES
(2, 'ALLOCATION_1', 'ALLOC_1'),
(3, 'ALLOCATION_2', 'ALLOC_2'),
(4, 'ALLOCATION_3', 'ALLOC_3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `email`, `no_telp`, `password`, `image`, `department_id`, `created_date`, `created_by`) VALUES
(1, 'riris', 'risti', 'risti@gmail.com', '123', '1234', 'default.jpg', 1, '0000-00-00', 'riris'),
(4, 'supervisior', 'supervisior', 'user@gmail.com', '111', '1234', 'default.jpg', 6, '0000-00-00', ''),
(5, 'Admin Store', 'admin_store', 'admin_st@gmail.com', '12211', '1234', 'default.jpg', 3, '0000-00-00', ''),
(6, 'admin operational', 'admin_operation', 'admin_op@gmail.com', '1221', '1234', 'default.jpg', 4, '0000-00-00', ''),
(7, 'client_1', 'client_1', 'user@gmail.com', '021123', '1234', 'artikel5.jpg', 5, '0000-00-00', ''),
(8, 'tech', 'tech', 'hcy@gmail.comm', '010111', '1234', 'default.jpg', 1, '0000-00-00', ''),
(10, 'hod tech', 'hod_tech', 'abc@abc.abc', '121212', '1234', 'default.jpg', 2, '0000-00-00', 'tech'),
(12, 'client_2', 'client_2', 'qwe@gmail.com', '021111', '1234', 'artijel4.jpg', 5, '0000-00-00', 'tech');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_stock_allocation` (`id_stock_allocation`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_location` (`id_location`);

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
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_location` (`id_location`);

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
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_location` (`id_location`);

--
-- Indeks untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  ADD PRIMARY KEY (`id_request_bundling`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_location` (`id_location`),
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
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  MODIFY `id_item_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `item_bundling_detail`
--
ALTER TABLE `item_bundling_detail`
  MODIFY `id_item_bundling_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `item_nonbundling`
--
ALTER TABLE `item_nonbundling`
  MODIFY `id_item_nonbundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  MODIFY `id_request_bundling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `stock_allocation`
--
ALTER TABLE `stock_allocation`
  MODIFY `id_stock_allocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_stock_allocation`) REFERENCES `stock_allocation` (`id_stock_allocation`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `item_bundling`
--
ALTER TABLE `item_bundling`
  ADD CONSTRAINT `item_bundling_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `item_bundling_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`);

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
  ADD CONSTRAINT `item_nonbundling_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `item_nonbundling_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`);

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`);

--
-- Ketidakleluasaan untuk tabel `request_bundling`
--
ALTER TABLE `request_bundling`
  ADD CONSTRAINT `request_bundling_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `request_bundling_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`),
  ADD CONSTRAINT `request_bundling_ibfk_3` FOREIGN KEY (`id_item_bundling`) REFERENCES `item_bundling` (`id_item_bundling`),
  ADD CONSTRAINT `request_bundling_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
