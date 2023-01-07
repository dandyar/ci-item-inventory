-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 11:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` bigint(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama`, `kategori`, `stok`) VALUES
(6, 'Mouse Wireless', 'Elektronik', 30),
(7, 'Keyboard', 'Elektronik', 26),
(8, 'Camera DSLR', 'Elektronik', 19),
(9, 'Tripod Camera DSLR', 'Elektronik', 18),
(10, 'Proyektor', 'Elektronik', 34),
(11, 'Laptop', 'Elektronik', 33),
(12, 'Kabel HDMI', 'Elektronik', 17);

-- --------------------------------------------------------

--
-- Table structure for table `barang_peminjam`
--

CREATE TABLE `barang_peminjam` (
  `kode` varchar(35) NOT NULL,
  `kd_barang` bigint(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jml` bigint(5) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_peminjam`
--

INSERT INTO `barang_peminjam` (`kode`, `kd_barang`, `nama_barang`, `jml`, `penanggung_jawab`) VALUES
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530620', 10, 'Proyektor', 3, 'Dandy Alfaz Ramadhan'),
('07042017_1491530620', 11, 'Laptop', 3, 'Dandy Alfaz Ramadhan'),
('07042017_1491530671', 10, 'Proyektor', 1, 'Dandy Alfaz Ramadhan'),
('07042017_1491552837', 8, 'Camera DSLR', 1, 'Dandy Alfaz Ramadhan'),
('07042017_1491552837', 12, 'Kabel HDMI', 3, 'Dandy Alfaz Ramadhan'),
('07042017_1491552837', 9, 'Tripod Camera DSLR', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491552837', 7, 'Keyboard', 4, 'Dandy Alfaz Ramadhan'),
('07042017_1491552837', 11, 'Laptop', 1, 'Dandy Alfaz Ramadhan'),
('07042017_1491558723', 6, 'Mouse Wireless', 5, 'Dandy Alfaz Ramadhan');

--
-- Triggers `barang_peminjam`
--
DELIMITER $$
CREATE TRIGGER `pinjam_barang` AFTER INSERT ON `barang_peminjam` FOR EACH ROW BEGIN
 UPDATE barang
 SET stok = stok - NEW.jml
 WHERE
 kd_barang = NEW.kd_barang;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjam`
--

CREATE TABLE `data_peminjam` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tujuan` varchar(35) NOT NULL,
  `tgl_pinjam` varchar(15) NOT NULL,
  `tgl_kembali` varchar(15) DEFAULT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_peminjam`
--

INSERT INTO `data_peminjam` (`id`, `nama`, `bidang`, `tujuan`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('07042017_1491530576', 'Sakata Gintoki', 'Prakerin', 'Tugas Sekolah', '2017/04/07', '2017/04/07', 'SELESAI'),
('07042017_1491530620', 'Akane Tsunemori', 'Prakerin', 'Tugas Sekolah', '2017/04/07', NULL, 'Active'),
('07042017_1491530671', 'Nobuchika Ginoza', 'Prakerin', 'Tugas Sekolah', '2017/04/07', '2017/04/07', 'SELESAI'),
('07042017_1491552837', 'Nobuchika', 'Prakerin', 'Tugas Sekolah', '2017/04/07', NULL, 'Active'),
('07042017_1491558723', 'Nobuchika 45', 'Prakerin', 'Tugas Sekolah', '2017/04/07', '2017/04/07', 'SELESAI');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode` varchar(30) NOT NULL,
  `kd_barang` bigint(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jml` bigint(15) NOT NULL,
  `penanggung_jawab` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`kode`, `kd_barang`, `nama_barang`, `jml`, `penanggung_jawab`) VALUES
('2131342', 6, 'Mouse Wireless', 10, ''),
('', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530620', 10, 'Proyektor', 3, 'Dandy Alfaz Ramadhan'),
('07042017_1491530620', 11, 'Laptop', 3, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 10, 'Proyektor', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530576', 11, 'Laptop', 2, 'Dandy Alfaz Ramadhan'),
('07042017_1491530671', 10, 'Proyektor', 1, 'Dandy Alfaz Ramadhan'),
('07042017_1491558723', 6, 'Mouse Wireless', 5, 'Dandy Alfaz Ramadhan');

--
-- Triggers `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `pengembalian_barang` AFTER INSERT ON `pengembalian` FOR EACH ROW BEGIN
 INSERT INTO barang SET
 kd_barang = NEW.kd_barang, stok=New.jml
 ON DUPLICATE KEY UPDATE stok=stok+New.jml;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dummy`
--

CREATE TABLE `tbl_dummy` (
  `kd_barang` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` bigint(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `username`, `password`, `level`) VALUES
(1, 'Dandy Alfaz Ramadhan', 'dandy', '21232f297a57a5a743894a0e4a801fc3', '1'),
(4, 'Gintoki Sakata', 'gintoki', 'afb91ef692fd08c445e8cb1bab2ccf9c', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` bigint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
