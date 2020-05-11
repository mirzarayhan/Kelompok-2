-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2020 pada 16.21
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
(5, 'Silvia Amalia', 'P', '082255667344', 'Lumajang, Jawa Timur', '2020-05-07 22:25:58', '2020-05-07 17:25:58'),
(6, 'Herlina Sari', 'P', '089933267788', 'Rogojampi, Banyuwangi, Jawa Timur', '2020-05-04 10:29:07', NULL),
(7, 'Syefil Angela', 'P', '082226677344', 'Terusan Surabaya, Malang', '2020-05-04 10:30:22', NULL),
(8, 'Irgi Saputra', 'L', '081776543882', 'Jombang, Jawa Timur', '2020-05-04 10:31:08', NULL),
(9, 'Iqbaludin Alhuda', 'L', '085441991833', 'Pati, Mojokerto, Jawa Timur', '2020-05-04 10:32:04', NULL),
(10, 'Alta Larik ', 'L', '081226775590', 'Blimbing, Malang, Jawa Timur', '2020-05-07 20:27:07', '2020-05-07 15:27:07'),
(11, 'Mirza Zarqani', 'L', '082230913815', 'Pakis, Malang', '2020-05-07 20:28:03', NULL);

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
(1, 'Java Tour', '2020-05-07 22:34:24', '2020-05-07 17:34:24', 'E'),
(2, 'Bali Tour', '2020-05-04 05:39:31', NULL, 'E'),
(3, 'Lombok Tour', '2020-05-04 05:39:42', NULL, 'D');

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
  `stock` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `address`, `image`, `duration`, `groupsize`, `language`, `overview`, `type_id`, `category_id`, `stock`, `price`, `created`, `updated`) VALUES
(8, 'A001', 'BROMO', 'Probolinggo, Jawa Timur', 'item-070520-d21bae68bb.jpg', '2 Days', 'Unlimited', 'English', 'Bromo Mountain', 1, 1, 0, 2000000, '2020-05-11 12:46:13', '2020-05-07 17:49:52'),
(15, 'A002', 'Batu', 'Malang', 'item-070520-85759d47b3.jpg', '8 hours', 'Unlimited', 'English', 'Malang City', 2, 1, 0, 1000000, '2020-05-11 12:46:14', '2020-05-07 18:23:38'),
(19, 'A003', 'Gili ', 'West Nusa Tenggara, Indonesia', 'item-070520-3f2dc55bc9.jpg', '8 hours', 'Unlimited', 'English', 'Gili Bali', 1, 2, 0, 1200000, '2020-05-11 12:46:15', '2020-05-07 18:41:30'),
(21, 'A006', 'Sendang Gile', 'West Nusa Tenggara, Indonesia', 'item-070520-02437c1d16.jpg', '8 hours', 'Unlimited', 'English', 'Waterfall', 1, 3, 0, 950000, '2020-05-11 12:46:17', '2020-05-07 19:04:06'),
(23, 'A004', 'Bentar', 'Probolinggo', 'item-070520-1d8df7e34e.jpg', '8 hours', 'Unlimited', 'English', 'Bentar Beach', 1, 1, 0, 150000, '2020-05-11 12:46:18', '2020-05-07 19:07:08'),
(24, 'A008', 'Matos', 'Malang', 'item-070520-91d4f9302d.jpg', '3 Hours', 'Unlimited', 'English', 'Matos Mall', 1, 1, 0, 450000, '2020-05-11 12:46:20', NULL);

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
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `stock`, `created`, `updated`) VALUES
(1, 'Mout Bromo Tours', 12, '2020-05-07', '0000-00-00'),
(2, 'Banyuwangi', 10, '2020-05-07', '0000-00-00'),
(3, 'Malang', 4, '2020-05-07', '0000-00-00'),
(4, 'Yogyakarta', 2, '2020-05-07', '0000-00-00'),
(5, 'Bali Island Tour', 3, '2020-05-07', '0000-00-00'),
(6, 'Nusa Penida Tour', 6, '2020-05-07', '0000-00-00'),
(7, 'Nusa Lembongan Tour', 5, '2020-05-07', '0000-00-00'),
(8, 'Lombok Island  Tour', 9, '2020-05-07', '0000-00-00'),
(9, 'Mount Rinjani Trekking', 7, '2020-05-07', '0000-00-00'),
(10, 'Gili Islands Tour', 1, '2020-05-07', '0000-00-00');

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
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(225) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'Miftahul Huda', 'huda123', 'L', 'miftahkonae95@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Banyuwangi', '2', 'Y', '2020-05-07 20:37:41', NULL),
(5, 'Sifa Safira', 'safira', 'P', 'safira14@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'Malang Jawa Timur', '2', 'Y', '2020-05-07 21:34:28', NULL),
(6, 'Febri Alia Anggreini', 'febri', 'P', 'febrialia_anggreini@rocketmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Probolinggo', '2', 'N', '2020-05-07 20:46:48', NULL);

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
  ADD UNIQUE KEY `barcode` (`barcode`),
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
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `p_type`
--
ALTER TABLE `p_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `FK_p_item_p_category` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_p_item_p_item` FOREIGN KEY (`type_id`) REFERENCES `p_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
