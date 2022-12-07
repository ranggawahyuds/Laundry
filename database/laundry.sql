-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Des 2022 pada 12.41
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `total_order` varchar(10) NOT NULL,
  `tgl_order` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status_order` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2022071287 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `email`, `jenis`, `total_order`, `tgl_order`, `tgl_selesai`, `status_order`) VALUES
(2022071210, 'ranggawahyuds@gmail.com', 'baju', '1', '2022-12-08', '2022-12-02', NULL),
(2022071220, 'ranggawahyuds@gmail.com', 'celana', '10', '2022-12-01', '2022-12-02', 'selesai'),
(2022071275, 'ranggawahyuds@gmail.com', 'baju', '10', '2022-12-01', '2022-12-02', NULL),
(2022071286, 'ranggawahyuds@gmail.com', 'baju', '1', '2022-12-02', '2022-12-02', 'status');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'asdas', 'ranggawahyuds@gmail.com', 'default.jpg', '$2y$10$y3oDObt0ybjr4f3PTkrWLudhV/jAUfkpLtL1mSMK7HGBq76hM4CDK', 2, 1, 1669731841),
(7, 'dody', 'dody@gmail.com', 'default.jpg', '$2y$10$YcsrKFla6Aa26p6q5v40ZOh17skNdYXSS/7VYss.QInI81O3WRdSq', 1, 1, 1669771202),
(8, 'rquinn', 'dosdy@gmail.com', 'default.jpg', '$2y$10$GTYkvsSKEP5.yuVrCIndfunhHkCjUIkEKcRcFXywmUuAPHgwQOHbm', 2, 1, 1670122876);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2022071287;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
