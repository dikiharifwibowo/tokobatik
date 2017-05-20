-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2016 at 02:17 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbmonera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` char(10) NOT NULL,
  `Nama_Admin` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`Id_Admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Nama_Admin`, `Username`, `Password`) VALUES
('1', 'admin_monera', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produk` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produk` (`produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `barangses`
--

CREATE TABLE IF NOT EXISTS `barangses` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `produk` varchar(20) NOT NULL,
  `jumlah` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_distribusi`
--

CREATE TABLE IF NOT EXISTS `detail_distribusi` (
  `Id_Distribusi` char(10) NOT NULL,
  `Id_Produk` char(10) NOT NULL,
  `Jumlah` int(5) NOT NULL,
  KEY `Id_Produk` (`Id_Produk`),
  KEY `Id_Distribusi` (`Id_Distribusi`),
  KEY `Id_Distribusi_2` (`Id_Distribusi`),
  KEY `Id_Distribusi_3` (`Id_Distribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_distribusi`
--

INSERT INTO `detail_distribusi` (`Id_Distribusi`, `Id_Produk`, `Jumlah`) VALUES
('H0001', 'P0006', 2),
('H0002', 'P0006', 2),
('H0002', 'P0008', 3),
('H0002', 'P0009', 4),
('H0003', 'P0006', 2),
('H0003', 'P0008', 4),
('H0004', 'P0006', 1),
('H0004', 'P0008', 3),
('H0004', 'P0009', 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE IF NOT EXISTS `detail_order` (
  `Kd_Order` char(10) NOT NULL,
  `Id_Produk` char(10) NOT NULL,
  `Id_Detail` int(5) NOT NULL AUTO_INCREMENT,
  `Harga` int(11) NOT NULL,
  `Quantity` int(5) NOT NULL,
  PRIMARY KEY (`Id_Detail`),
  KEY `Kd_Order` (`Kd_Order`),
  KEY `Id_Produk` (`Id_Produk`),
  KEY `Kd_Order_2` (`Kd_Order`),
  KEY `Kd_Order_3` (`Kd_Order`),
  KEY `Kd_Order_4` (`Kd_Order`),
  KEY `Kd_Order_5` (`Kd_Order`),
  KEY `Kd_Order_6` (`Kd_Order`),
  KEY `Kd_Order_7` (`Kd_Order`),
  KEY `Kd_Order_8` (`Kd_Order`),
  KEY `Kd_Order_9` (`Kd_Order`),
  KEY `Kd_Order_10` (`Kd_Order`),
  KEY `Kd_Order_11` (`Kd_Order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=340 ;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`Kd_Order`, `Id_Produk`, `Id_Detail`, `Harga`, `Quantity`) VALUES
('F0001', 'P0006', 302, 10000, 1),
('F0001', 'P0008', 303, 15789, 1),
('F0001', 'P0009', 304, 9000, 1),
('F0002', 'P0008', 305, 15789, 1),
('F0002', 'P0006', 306, 10000, 1),
('F0003', 'P0006', 307, 10000, 1),
('F0004', 'P0008', 308, 15789, 2),
('F0004', 'P0006', 309, 10000, 2),
('F0005', 'P0006', 310, 10000, 2),
('F0005', 'P0008', 311, 15789, 2),
('F0006', 'P0009', 312, 9000, 2),
('F0006', 'P0006', 313, 10000, 2),
('F0007', 'P0009', 314, 9000, 2),
('F0007', 'P0006', 315, 10000, 2),
('F0008', 'P0009', 316, 9000, 2),
('F0008', 'P0006', 317, 10000, 2),
('F0009', 'P0006', 332, 10000, 2),
('F0009', 'P0009', 333, 9000, 2),
('F0010', 'P0006', 334, 10000, 3),
('F0010', 'P0008', 335, 15789, 3),
('F0011', 'P0008', 336, 15789, 3),
('F0011', 'P0006', 337, 10000, 3),
('F0012', 'P0008', 338, 15789, 5),
('F0013', 'P0010', 339, 900000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE IF NOT EXISTS `distribusi` (
  `Id_Distribusi` char(10) NOT NULL,
  `Id_Admin` char(10) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Total` int(5) NOT NULL,
  PRIMARY KEY (`Id_Distribusi`),
  KEY `Id_Admin` (`Id_Admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`Id_Distribusi`, `Id_Admin`, `Tanggal`, `Total`) VALUES
('H0001', '1', '2016-10-11 15:23:27', 5),
('H0002', '1', '2016-11-04 00:43:18', 9),
('H0003', '1', '2016-11-04 00:56:07', 6),
('H0004', '1', '2016-11-05 09:07:06', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `Id_Kategori` char(10) NOT NULL,
  `Nama_Kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`Id_Kategori`, `Nama_Kategori`) VALUES
('K0001', 'Minuman'),
('K0002', 'batik Solo');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `Id_Keranjang` int(5) NOT NULL AUTO_INCREMENT,
  `Id_Produk` char(10) NOT NULL,
  `Id_Session` varchar(100) NOT NULL,
  `Tanggal_Keranjang` date NOT NULL,
  `Qty` int(4) NOT NULL,
  `harga` int(16) NOT NULL,
  PRIMARY KEY (`Id_Keranjang`),
  KEY `Id_Keranjang` (`Id_Keranjang`),
  KEY `Id_Produk` (`Id_Produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`Id_Keranjang`, `Id_Produk`, `Id_Session`, `Tanggal_Keranjang`, `Qty`, `harga`) VALUES
(41, 'P0006', '4g858b36hiho2a6dcd4r29sbv0', '2016-11-11', 1, 10000),
(60, 'P0008', 'mmr1l3e9m20jg07g7he6ja8rf1', '2016-11-12', 90, 15789),
(61, 'P0006', 'mmr1l3e9m20jg07g7he6ja8rf1', '2016-11-12', 3, 10000),
(63, 'P0010', '7h0tnaaf99cllgt8htkiqi88i1', '2016-11-14', 1, 900000),
(64, 'P0010', 'mqeb5aiuktaruc01tkjk3hk5b2', '2016-11-15', 2, 900000),
(65, 'P0008', 'mqeb5aiuktaruc01tkjk3hk5b2', '2016-11-15', 1, 15789),
(66, 'P0010', 'rgal2hpvp1e71sie4bm8f3kmg1', '2016-11-16', 3, 900000),
(67, 'P0010', '9mo7qulmc328ecbrokufeilts6', '2016-11-16', 1, 900000),
(68, 'P0008', '9mo7qulmc328ecbrokufeilts6', '2016-11-16', 1, 15789),
(69, 'P0008', 'nv2rfr2tpstagtj6ftuts9j7k1', '2016-11-22', 4, 15789),
(70, 'P0008', 'ukmpe2vj19v2tuc4qmm5abf9m1', '2016-11-22', 4, 15789),
(71, 'P0006', 'nkgtqf14c4b10lgqvo4f2aft22', '2016-11-23', 1, 10000),
(72, 'P0010', 'nkgtqf14c4b10lgqvo4f2aft22', '2016-11-23', 1, 900000),
(73, 'P0008', 'nkgtqf14c4b10lgqvo4f2aft22', '2016-11-23', 1, 15789);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE IF NOT EXISTS `makanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `makanan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `makanan`) VALUES
(1, 'Jagung Bakar'),
(4, 'Monday,Tuesday,Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE IF NOT EXISTS `orderan` (
  `Kd_Order` char(10) NOT NULL,
  `Id_Pelanggan` char(10) NOT NULL,
  `Jumlah` int(5) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Total_Harga` int(15) NOT NULL,
  PRIMARY KEY (`Kd_Order`),
  KEY `Id_Pelanggan` (`Id_Pelanggan`),
  KEY `Id_Pelanggan_2` (`Id_Pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`Kd_Order`, `Id_Pelanggan`, `Jumlah`, `Tanggal`, `Total_Harga`) VALUES
('F0001', 'Y0002', 3, '2016-11-11 22:40:07', 34789),
('F0002', 'Y0002', 2, '2016-11-11 22:43:49', 25789),
('F0003', 'Y0002', 1, '2016-11-11 22:44:36', 10000),
('F0004', 'Y0002', 4, '2016-11-11 22:45:30', 25789),
('F0005', 'Y0002', 4, '2016-11-11 22:50:39', 103156),
('F0006', 'Y0002', 4, '2016-11-11 22:53:08', 76000),
('F0007', 'Y0002', 4, '2016-11-11 22:56:26', 76000),
('F0008', 'Y0002', 4, '2016-11-11 23:02:11', 76000),
('F0009', 'Y0002', 4, '2016-11-11 23:39:58', 38000),
('F0010', 'Y0002', 6, '2016-11-12 10:10:42', 77367),
('F0011', 'Y0002', 6, '2016-11-12 10:11:53', 77367),
('F0012', 'Y0002', 5, '2016-11-12 10:13:14', 78945),
('F0013', 'Y0002', 3, '2016-11-14 22:37:24', 2700000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `Id_Pelanggan` char(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Alamat` varchar(80) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Telepon` int(15) NOT NULL,
  PRIMARY KEY (`Id_Pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `Username`, `Password`, `Alamat`, `Email`, `Telepon`) VALUES
('Y0001', 'malasngoding', 'malasngodi', 'jogja bisa', 'asdas@gmail.com', 2),
('Y0002', 'user', 'user1234', 'jogja', 'user@gmail.com', 2147483647),
('Y0003', 'budi', 'budi1234', 'jogja', 'budi@gmail.com', 2147483647),
('Y0004', 'acer', 'acer1234', 'klaten', 'acer@gmail.com', 2147483647),
('Y0005', 'latif', 'latif123', 'jogja', 'latif@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `Id_Produk` char(10) NOT NULL,
  `Id_Kategori` char(10) NOT NULL,
  `Nama_Produk` varchar(20) NOT NULL,
  `Harga_Produk` int(11) NOT NULL,
  `Stock` int(5) NOT NULL,
  `Size` enum('S','M','L','XL') NOT NULL,
  `Gambar` varchar(50) NOT NULL,
  `Tanggal` datetime NOT NULL,
  PRIMARY KEY (`Id_Produk`),
  KEY `Id_Kategori` (`Id_Kategori`),
  KEY `Id_Kategori_2` (`Id_Kategori`),
  KEY `Id_Produk` (`Id_Produk`),
  KEY `Id_Kategori_3` (`Id_Kategori`),
  KEY `Id_Kategori_4` (`Id_Kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Id_Kategori`, `Nama_Produk`, `Harga_Produk`, `Stock`, `Size`, `Gambar`, `Tanggal`) VALUES
('P0006', 'K0001', 'keraton batik', 10000, 57, 'S', 'Lighthouse.jpg', '2016-10-10 21:56:29'),
('P0008', 'K0002', 'solo kencono batik', 15789, 34, 'S', 'Tulips.jpg', '2016-10-11 12:56:27'),
('P0009', 'K0001', 'aeadasd', 9000, 0, 'S', 'Desert.jpg', '2016-10-20 15:06:55'),
('P0010', 'K0001', 'Tested aja gan', 900000, 77, 'S', 'Lighthouse.jpg', '2016-11-14 22:36:05');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_prod_bar` FOREIGN KEY (`produk`) REFERENCES `produk` (`Id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_distribusi`
--
ALTER TABLE `detail_distribusi`
  ADD CONSTRAINT `iddist` FOREIGN KEY (`Id_Distribusi`) REFERENCES `distribusi` (`Id_Distribusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idpdis` FOREIGN KEY (`Id_Produk`) REFERENCES `produk` (`Id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `idpdetail` FOREIGN KEY (`Id_Produk`) REFERENCES `produk` (`Id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_ord` FOREIGN KEY (`Kd_Order`) REFERENCES `orderan` (`Kd_Order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `ida` FOREIGN KEY (`Id_Admin`) REFERENCES `admin` (`Id_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `id_prod_ker` FOREIGN KEY (`Id_Produk`) REFERENCES `produk` (`Id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderan`
--
ALTER TABLE `orderan`
  ADD CONSTRAINT `idpelangganorder` FOREIGN KEY (`Id_Pelanggan`) REFERENCES `pelanggan` (`Id_Pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `Id_Kategori` FOREIGN KEY (`Id_Kategori`) REFERENCES `kategori` (`Id_Kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
