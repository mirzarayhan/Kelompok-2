-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2020 pada 17.01
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
(5, 'Silvia Amali', 'P', '087755635625', 'Ambulu, Jember', '2020-03-05 02:40:54', '2020-03-04 20:41:34');

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
(1, 'Family', '2020-03-05 03:40:11', '2020-03-09 15:03:38', 'aktif'),
(2, 'ATV Trip', '2020-03-05 03:40:57', '2020-03-04 23:38:50', 'aktif'),
(3, 'Beach Tour', '2020-03-05 03:43:12', '2020-03-04 23:55:33', 'aktif'),
(4, 'Mountain Trip', '2020-03-05 03:43:23', '2020-03-04 23:52:29', 'aktif'),
(7, 'Snorecling', '2020-03-05 05:59:00', NULL, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_language`
--

CREATE TABLE `p_language` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `duration` varchar(50) NOT NULL,
  `groupsize` varchar(50) NOT NULL DEFAULT '',
  `language` varchar(50) NOT NULL,
  `overview` text NOT NULL,
  `tourtype` int(11) NOT NULL,
  `tourcategory` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `address`, `duration`, `groupsize`, `language`, `overview`, `tourtype`, `tourcategory`, `created`, `updated`) VALUES
(1, 'WONDERFUL BROMO AND IJEN TRIP – START MALANG', 'Kawah Ijen, East Java, Indonesia', '2 days 1 nights', 'Unlimitid', 'English', 'Bromo tour combined with Ijen Crater began the journey from Malang to Sukapura village by driving on the first day. You’ll find many interesting spots along the way to reach Sukapura village, e.g. Singosari Temple, Lawang traditional market and Purwodadai Botanical Garden. After arriving at Sukapura village, you’ll check in at the hotel that near from farming area. So you can witness the daily of the Tenggerese people in your free time.', 0, 0, '2020-04-24 11:07:11', NULL);

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
(10, 'Week Tour', '085667443666', 'Dinoyo, Malang', 'Agen Perjalanan daerah malang saja', '2020-03-04 10:53:48', '2020-03-04 05:46:11');

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
(1, 'Admin', '', 'M. Irvan Alfi Hidayat', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Banyuwangi', 1, 'Y'),
(2, 'kasir1', '', 'Yusril Ihza', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Banyuwangi', 2, 'Y'),
(3, 'Kepopo', '', 'Denny Nur Ramadhan', '601f1889667efaebb33b8c12572835da3f027f78', 'Malang', 2, 'Y'),
(4, 'koceng', '', 'Ahmad cnyder', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Betek', 2, 'N'),
(8, 'huda123', '', 'miftahul huda', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'banyuwangi', 1, 'Y');

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
-- Indeks untuk tabel `p_language`
--
ALTER TABLE `p_language`
  ADD PRIMARY KEY (`unit_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `p_language`
--
ALTER TABLE `p_language`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `p_type`
--
ALTER TABLE `p_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
