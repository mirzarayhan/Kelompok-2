-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2020 pada 08.14
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Abdul Ajiz', 'L', '081358588519', 'Malioboro, Jogja', '2020-05-04 10:24:38', NULL),
(2, 'Intan Nur Ja\'a Al Faricha', 'P', '081443244233', 'Cluring, Banyuwangi', '2020-05-04 10:25:08', NULL),
(3, 'Abdurrosyid Muhasibi', 'L', '085667443666', 'Kediri, Jawa Timur', '2020-05-04 10:25:42', NULL),
(4, 'Septianda Reza Maulana', 'L', '082257125415', 'Perumahan Jati Asri Blok A3, Kebon Agung, Kraksaan-Probolinggo', '2020-05-04 10:27:23', NULL),
(5, 'Silvia Amali', 'P', '082255667344', 'Lumajang, Jawa Timur', '2020-05-04 10:27:50', NULL),
(6, 'Herlina Sari', 'P', '089933267788', 'Rogojampi, Banyuwangi, Jawa Timur', '2020-05-04 10:29:07', NULL),
(7, 'Syefil Angela', 'P', '082226677344', 'Terusan Surabaya, Malang', '2020-05-04 10:30:22', NULL),
(8, 'Irgi Saputra', 'L', '081776543882', 'Jombang, Jawa Timur', '2020-05-04 10:31:08', NULL),
(9, 'Iqbaludin Alhuda', 'L', '085441991833', 'Pati, Mojokerto, Jawa Timur', '2020-05-04 10:32:04', NULL),
(10, 'Alta Larik Yusuf', 'L', '081226775590', 'Blimbing, Malang, Jawa Timur', '2020-05-04 10:32:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `status` enum('E','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`, `status`) VALUES
(1, 'East Java Tour', '2020-05-04 10:34:34', NULL, 'E'),
(2, 'Bali Tour', '2020-05-04 05:39:31', NULL, 'E'),
(3, 'Lombok Tour', '2020-05-04 05:39:42', NULL, 'D'),
(4, 'Central Java Tour', '2020-05-04 10:35:05', NULL, 'E'),
(5, 'West Java', '2020-05-04 10:35:35', NULL, 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `duration` varchar(50) NOT NULL,
  `groupsize` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `overview` text NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_type`
--

CREATE TABLE `p_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `status` enum('E','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_type`
--

INSERT INTO `p_type` (`type_id`, `name`, `created`, `updated`, `status`) VALUES
(1, 'Daily Tour', '2020-05-04 05:41:21', NULL, 'E'),
(2, 'Family Tour', '2020-05-04 05:42:42', NULL, 'E'),
(3, 'Education', '2020-05-04 05:45:30', NULL, 'D'),
(4, 'Snorkeling', '2020-05-04 05:49:07', NULL, 'D'),
(5, 'Scuba Diving', '2020-05-04 05:51:57', NULL, 'E'),
(6, 'City Tour', '2020-05-04 05:52:28', NULL, 'E'),
(7, 'History Tour', '2020-05-04 05:53:47', NULL, 'E'),
(8, 'Cultural Tour', '2020-05-04 05:56:34', NULL, 'D'),
(9, 'Adventure Tour', '2020-05-07 05:26:33', '2020-05-07 00:26:33', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `stock`, `created`, `updated`) VALUES
(1, 'Sendang Gile Waterfall', 50, '2020-05-07 05:25:02', NULL),
(2, 'Gili Trawangan', 40, '2020-05-07 05:25:24', NULL),
(3, 'BROMO Mounthain', 70, '2020-05-07 05:25:50', NULL),
(4, 'Jatimpark 2', 48, '2020-05-07 05:26:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Agen Tour Songgon', '081336914904', 'Songgon, Banyuwangi', 'Agen Rumahan', '2020-05-04 05:34:54', NULL),
(2, 'Miftahul Huda', '081358588519', 'Purwoharjo, Banyuwangi', 'Supliyer ke 2', '2020-05-04 05:35:30', NULL),
(3, 'Tour Fun', '087755635625', 'Ambulu, Jember', 'Hanya melayani tour  pada Hari libur', '2020-05-04 05:36:00', NULL),
(4, 'Septianda Reza Maulana', '082257125415', ' Perumahan Jati Asri Blok A3, Kebon Agung, Kraksaan-Probolinggo', 'Agen Perjalanan daerah probolinggo saja', '2020-05-04 05:36:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `level` enum('1','2') NOT NULL COMMENT '	1:admin, 2:kasir',
  `status` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `gender`, `email`, `password`, `address`, `level`, `status`, `created`, `updated`) VALUES
(1, 'M. Irvan Alfi Hidayat', 'Admin', 'L', 'irvanhidayat0623@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Banyuwangi', '1', 'Y', '2020-05-04 05:25:59', NULL),
(2, 'Septianda Reza Maulana', 'septiandareza', 'L', 'septiandareza07@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Perumahan Jati Asri Blok A3', '1', 'Y', '2020-05-04 05:30:52', NULL),
(3, 'Mirza Zarqani Rayhan', 'mirza', 'L', 'mirza@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Malang', '1', 'Y', '2020-05-07 05:11:38', NULL),
(4, 'Miftahul Huda', 'huda123', 'L', 'miftahkonae95@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Banyuwangi', '2', 'N', '2020-05-04 05:33:49', NULL),
(5, 'Sifa Safira', 'safira', 'P', 'safira14@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Malang Jawa Timur', '2', 'Y', '2020-05-07 05:13:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `FK_p_item_p_item` (`type_id`),
  ADD KEY `FK_p_item_p_category` (`category_id`);

--
-- Indeks untuk tabel `p_type`
--
ALTER TABLE `p_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `p_type`
--
ALTER TABLE `p_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `FK_p_item_p_category` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_p_item_p_item` FOREIGN KEY (`type_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
