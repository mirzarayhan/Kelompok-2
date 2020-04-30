-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2020 pada 15.58
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
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Abdul Ajiz', 'L', '081358588519', 'Malioboro, Jogja', '2020-03-05 02:35:02', '2020-04-24 09:44:48'),
(2, 'Intan Nur Ja\'a Al Faricha', 'P', '081443244233', 'Cluring, Banyuwangi', '2020-03-05 02:37:49', '0000-00-00 00:00:00'),
(3, 'Abdurrosyid Muhasibi', 'L', '085667443666', 'Kediri, Jawa Timur', '2020-03-05 02:38:29', '2020-03-04 20:45:53'),
(5, 'Septianda Reza Maulana', 'L', '082257125415', 'Perumahan Jati Asri Blok A3, Kebon Agung, Kraksaan-Probolinggo', '2020-03-05 02:40:54', '2020-04-27 07:59:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`, `status`) VALUES
(1, 'Java Tours', '2020-03-05 03:40:11', '2020-04-29 05:50:49', 'aktif'),
(2, 'Bali Tours', '2020-03-05 03:40:57', '2020-04-29 05:51:01', 'aktif'),
(3, 'Lombok Tours', '2020-03-05 03:43:12', '2020-04-29 05:52:44', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(1000),
  `duration` varchar(50) NOT NULL,
  `groupsize` varchar(50) NOT NULL DEFAULT '',
  `language` varchar(50) NOT NULL,
  `overview` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `name`, `address`, `image`, `duration`, `groupsize`, `language`, `overview`, `type_id`, `category_id`, `created`, `updated`) VALUES
(8, 'Sendang Gile Waterfall', 'West Nusa Tenggara, Indonesia', 'unit-280420-.jpg', '8 hour', 'Unlimited', 'English', 'You will see the beautiful valley and some monkeys around the way. ', 0, 0, '2020-04-28 23:30:35', '2020-04-29 09:15:15'),
(9, 'Gili Trawangan', 'West Nusa Tenggara, Indonesia', 'unit-280420-1.jpg', '8 hours', 'Unlimited', 'English', 'You can see and enjoy the beautiful Mount Agung in Bali.', 0, 0, '2020-04-28 23:31:01', '2020-04-29 09:15:25'),
(10, 'BROMO', 'Probolinggo, East Java, Indonesia', 'unit-290420-.jpg', '2 days 1 night', 'Unlimited', 'English', 'You will see the beautiful mount.', 0, 0, '2020-04-29 11:53:39', '2020-04-29 09:15:33'),
(11, 'Batu', 'Malang, East Java, Indonesia', 'unit-290420-1.jpg', '2 days 1 night', 'Unlimited', 'English', 'Malang City located on the southwestern part of Indonesia, Java island.', 0, 0, '2020-04-29 14:17:46', '2020-04-29 09:17:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_type`
--

CREATE TABLE `p_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_type`
--

INSERT INTO `p_type` (`type_id`, `name`, `created`, `updated`, `status`) VALUES
(1, 'Daily Tour', '2020-03-08 00:49:39', NULL, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `barcode`, `name`, `category_id`, `item_id`, `price`, `stock`, `created`, `updated`) VALUES
(2, 'A001', 'Mout Bromo Tours', 1, 10, 500000, 0, '2020-04-29 12:11:46', '2020-04-29 09:20:49'),
(5, 'A002', 'Gili Islands Tour', 3, 8, 5000000, 0, '2020-04-29 13:17:52', NULL),
(6, 'A003', 'Malang', 1, 11, 1935000, 0, '2020-04-29 14:19:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Agen Tour Songgon', '081336914904', 'Songgon, Banyuwangi', 'Agen Rumahan', '2020-03-03 20:56:00', '2020-03-03 20:56:00'),
(3, 'Miftahul Huda', '081358588519', 'Purwoharjo, Banyuwangi', 'Supliyer ke 2', '2020-03-04 08:46:20', '2020-04-24 08:12:44'),
(4, 'Tour Fun', '087755635625', 'Ambulu, Jember', 'Hanya melayani tour  pada Hari libur', '2020-03-04 08:58:03', '2020-04-24 08:25:52'),
(5, 'Mujib Trour', '081443244233', 'Gumuk, Banyuwangi', 'Tour Guide', '2020-03-04 09:42:02', '2020-03-04 07:55:35'),
(10, 'Septianda Reza Maulana', '082257125415', ' Perumahan Jati Asri Blok A3, Kebon Agung, Kraksaan-Probolinggo', 'Agen Perjalanan daerah probolinggo saja', '2020-03-04 10:53:48', '2020-04-27 07:59:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(2) NOT NULL COMMENT '1:admin, 2:kasir',
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `name`, `password`, `address`, `level`, `status`) VALUES
(1, 'Admin', 'irvanhidayat0623@gmail.com', 'M. Irvan Alfi Hidayat', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Banyuwangi', 1, 'Y'),
(9, 'septiandareza', 'septiandareza07@gmail.com', 'Septianda Reza Maulana', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Perumahan Jati Asri Blok A3', 1, 'Y'),
(10, 'septianda', 'septiandareza07@gmail.com', 'Septianda Reza Maulana', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jhjggjg', 2, 'N'),
(11, 'mirza', 'mirza@gmail.com', 'Mirza Zarqani Rayhan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Malang', 2, 'N'),
(12, 'febri', 'febrialia_anggreini@rocketmail.com', 'Febri Alia Anggreini', '28556b717c75fbd8ca07639955f04eee22382c71', 'Probolinggo', 2, 'N'),
(13, 'suswantini', 'suswantini@gmail.com', 'Suswantini', '7c222fb2927d828af22f592134e8932480637c0d', 'Jati Asri', 2, 'N');

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
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `p_type`
--
ALTER TABLE `p_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`item_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `p_type`
--
ALTER TABLE `p_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD CONSTRAINT `p_unit_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_unit_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
