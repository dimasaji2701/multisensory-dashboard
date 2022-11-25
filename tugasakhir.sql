-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2022 pada 05.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sensor1`
--

CREATE TABLE `tb_sensor1` (
  `id` int(11) NOT NULL,
  `waterlevel` float NOT NULL,
  `waterflow` float NOT NULL,
  `tanngal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sensor1`
--

INSERT INTO `tb_sensor1` (`id`, `waterlevel`, `waterflow`, `tanngal`) VALUES
(1, 2.3, 0.02, '2022-11-21 12:18:40'),
(2, 3, 0.03, '2022-11-21 12:23:59'),
(3, 2.4, 0.02, '2022-11-21 12:24:13'),
(4, 2.5, 0.03, '2022-11-21 12:24:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sensor2`
--

CREATE TABLE `tb_sensor2` (
  `id` int(11) NOT NULL,
  `turbidity` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sensor2`
--

INSERT INTO `tb_sensor2` (`id`, `turbidity`, `tanggal`) VALUES
(1, 18, '2022-11-21 12:18:52'),
(2, 16, '2022-11-21 12:24:56'),
(3, 17, '2022-11-21 12:24:58'),
(4, 16, '2022-11-21 12:25:02'),
(5, 19, '2022-11-21 12:25:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`) VALUES
(1, 'Dimas Aji Pangestu', 'daji18201@gmail.com', '$2y$10$nUNesKBSCzwzsBJyvvRk.euYQkyCzdAUZwCkHTLMYTw9LB5vaPwVG', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `title`, `menu_id`, `url`, `icon`, `is_active`) VALUES
(1, 'Admin', 1, 'Admin', '', 1),
(2, 'Change Password', 1, 'admin/changepassword', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_sensor1`
--
ALTER TABLE `tb_sensor1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sensor2`
--
ALTER TABLE `tb_sensor2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_sensor1`
--
ALTER TABLE `tb_sensor1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_sensor2`
--
ALTER TABLE `tb_sensor2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
