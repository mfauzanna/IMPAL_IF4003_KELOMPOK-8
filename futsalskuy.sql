-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 03:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsalskuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama_lapangan` varchar(25) NOT NULL,
  `alamat_lapangan` varchar(100) NOT NULL,
  `jenis_lapangan` varchar(25) NOT NULL,
  `foto_lp1` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `id_pemilik`, `nama_lapangan`, `alamat_lapangan`, `jenis_lapangan`, `foto_lp1`, `deskripsi`, `status`) VALUES
(3, 1, 'LAPANGAN A', 'Jl.Sukabirus', 'Lapangan Rumput', '1_Peluang-Bisnis-Unik-Rumput-Sintesis-dengan-Keuntungan-Besar1.jpg', 'bblakbal pokoknya bagus', 'Belum Dipesan'),
(4, 1, 'LAPANGAN B', 'Jl. balsdasdasdasdasd', 'Lapangan Matras', 'Vsport.jpg', 'asdasdasdasdasd', 'Belum Dipesan'),
(5, 1, 'LAPANGAN C', 'ASDASDASD', 'Lapangan Rumput', '9073234_500000006_352918.jpg', 'ASDASDASDASDASD', 'Belum Dipesan'),
(6, 1, 'LAPANGAN IFI', 'JL.ADASDASD', 'Lapangan Matras', 'ukuran_lapanganfutsal_standar_internasional.jpg', 'ASDSADKASKASASDASD', 'Belum Dipesan');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_lapangan` int(100) NOT NULL,
  `id_penyewa` int(100) NOT NULL,
  `kode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_pemilik`
--

CREATE TABLE `user_pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(25) NOT NULL,
  `email_pemilik` varchar(25) NOT NULL,
  `password_pemilik` varchar(100) NOT NULL,
  `kelamin_pemilik` varchar(10) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `nohp_pemilik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pemilik`
--

INSERT INTO `user_pemilik` (`id_pemilik`, `nama_pemilik`, `email_pemilik`, `password_pemilik`, `kelamin_pemilik`, `alamat_pemilik`, `nohp_pemilik`) VALUES
(1, 'asdasd112', '123123@123.com', '123123', '', 'asdasdasdasdasd13123', '123124123123');

-- --------------------------------------------------------

--
-- Table structure for table `user_penyewa`
--

CREATE TABLE `user_penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama_penyewa` varchar(25) NOT NULL,
  `email_penyewa` varchar(25) NOT NULL,
  `password_penyewa` varchar(100) NOT NULL,
  `kelamin_penyewa` varchar(10) NOT NULL,
  `alamat_penyewa` varchar(100) NOT NULL,
  `nohp_penyewa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_penyewa`
--

INSERT INTO `user_penyewa` (`id_penyewa`, `nama_penyewa`, `email_penyewa`, `password_penyewa`, `kelamin_penyewa`, `alamat_penyewa`, `nohp_penyewa`) VALUES
(1, 'Muhammad Fadli', 'asdasdasd123@yahoo.com', '123123', '', 'asdasdasdasd', '00215515'),
(2, 'asdasd', 'asdasdasdsdasda@yahoo.co.', '123123', '', 'asdasdasd', '123123123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `id_penyewa` (`id_penyewa`);

--
-- Indexes for table `user_pemilik`
--
ALTER TABLE `user_pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `user_penyewa`
--
ALTER TABLE `user_penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_pemilik`
--
ALTER TABLE `user_pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_penyewa`
--
ALTER TABLE `user_penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `user_pemilik` (`id_pemilik`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_penyewa`) REFERENCES `user_penyewa` (`id_penyewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
