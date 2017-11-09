-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Okt 2017 pada 02.19
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_beasiswa`
--
CREATE DATABASE IF NOT EXISTS `spk_beasiswa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spk_beasiswa`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `NPM` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `No_HP` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NPM`, `Nama`, `Jenis_Kelamin`, `Alamat`, `No_HP`) VALUES
('123', 'TOMMY SUINDRA', 'Laki-laki', 'fadfsd', '2222'),
('12345', 'TOMMY SUINDRA', 'Laki-laki', 'dfsdf', '085266187958'),
('166666', 'qwr', 'Perempuan', 'sdfg', '45454'),
('222', 'TOMMY SUINDRA', 'Laki-laki', 'asdfsf', '085266187958'),
('555', 'wewe', 'Laki-laki', 'dsfsdfsdf', '333333'),
('5555', 'sdfsdfsdf', 'Laki-laki', 'sdfsdf', '56757'),
('77', 'TOMMY SUINDRA', 'Laki-laki', '435', '335'),
('787878', 'ghfghg', 'Laki-laki', 'dsfsdf', '768678'),
('8888', 'wwdf', 'Perempuan', 'xcbvxcv', '666666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NPM`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
