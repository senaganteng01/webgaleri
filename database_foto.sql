-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 08:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `email`, `password`) VALUES
(1, 'hakii', 'bobi@gamil.com', '$2y$10$7noFLJg0O3k1KaIUdywQj.50EzLjeKNAPzf016ggyBWhkWFumReLm'),
(2, 'hakiki', 'dodo.@yahoo.com', '$2y$10$FTpyCY.Y7b/Rrfz4Y/0tPehqzYMqIieO0S1fUPWFo4Ut3xdEl5Kly'),
(3, 'mursidil', 'dodo.@yahoo.com', '$2y$10$IkZPQi9IZru/1qEX9x/CNu8m0CRcw5D8WuQ4zXFeTD0OSm2c47BvG'),
(4, 'admin', 'admin@gmail.com', '$2y$10$nPZ72ivBQ3c38MYMIJ6hve82qaux1dsXC/8B7n.H9VdKMW8ZE9ura'),
(5, 'sena', 'sena@gmail.com', '$2y$10$/mChu9jHsmePlZV3VnHD4.XfE5jkrYcM2Jv9uR.qk03iwxcabYzHy'),
(8, 'bobi', 'jaki@gmail.com', '$2y$10$l.Y97CD5DOurywXICpHKmOAWfC01KdKQfvb/t3O/v.2NHWuBU9QzC'),
(9, 'bisa', 'bisa@gmail.com', '$2y$10$RjnUQ4z.rpA1X52WzwV0ouhmXjfc4TZlAwcHbR/antOD.xjpsGlvK'),
(10, 'rafi', 'sena@gmail.com', '$2y$10$iw.6HzdweGqMH4jkruXs6.sKtQpM8Q9Hiqf7UfclBqt5eekTNKDpy'),
(11, 'fitri', 'fitri@gail.com', '$2y$10$kyPNocDneDTp89yyrYeJu.umFvp6g2Y.0iybtkQzSURGpSthDQWy.'),
(12, 'far', 'far@gmail.com', '$2y$10$JHPtRC02kgy9aGtScxaNUulfpTJnfYRaTHuurgu14ndcJCs7zyMxy'),
(13, 'abi', 'abi@gmail.com', '$2y$10$cRqk5HZ/5LUoiBNGkgiFNuazcM8HCBg.v0HEcm.Dy4VsoJSIxU8wa'),
(14, 'sa', 'sena@gmail.com', '$2y$10$NircYgJ4xbWGtNy4pLEGQuhHHcq9.U5x0fpQk83Kf5/MQdkEgnI2C');

-- --------------------------------------------------------

--
-- Table structure for table `albumfoto`
--

CREATE TABLE `albumfoto` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albumfoto`
--

INSERT INTO `albumfoto` (`id`, `foto`, `judul`, `deskripsi`) VALUES
(28, '65e94ee6a3a76.jpeg', 'abi', 'sabi');

-- --------------------------------------------------------

--
-- Table structure for table `halaman_pengguna_12`
--

CREATE TABLE `halaman_pengguna_12` (
  `id` int(11) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halaman_pengguna_13`
--

CREATE TABLE `halaman_pengguna_13` (
  `id` int(11) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halaman_pengguna_14`
--

CREATE TABLE `halaman_pengguna_14` (
  `id` int(11) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albumfoto`
--
ALTER TABLE `albumfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman_pengguna_12`
--
ALTER TABLE `halaman_pengguna_12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman_pengguna_13`
--
ALTER TABLE `halaman_pengguna_13`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman_pengguna_14`
--
ALTER TABLE `halaman_pengguna_14`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `albumfoto`
--
ALTER TABLE `albumfoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `halaman_pengguna_12`
--
ALTER TABLE `halaman_pengguna_12`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halaman_pengguna_13`
--
ALTER TABLE `halaman_pengguna_13`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halaman_pengguna_14`
--
ALTER TABLE `halaman_pengguna_14`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
