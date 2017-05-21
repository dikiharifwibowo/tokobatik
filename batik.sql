-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 09:30 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `batik`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`Kd_Order`, `Id_Produk`, `Id_Detail`, `Harga`, `Quantity`) VALUES
('F0021', 'P0005', 1, 8000, 3),
('F0021', 'P0004', 2, 5400, 2);

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
('K0001', 'Batik Solo'),
('K0002', 'Batik Jogja'),
('K0003', 'Batik Pekalongan');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`Id_Keranjang`, `Id_Produk`, `Id_Session`, `Tanggal_Keranjang`, `Qty`, `harga`) VALUES
(1, 'P0005', 'r3nd6q92bqm57jfn3io5t7u3u2', '0000-00-00', 1, 8000),
(4, 'P0005', '4uo9cpi6jec39gfnv7hcuadqg0', '0000-00-00', 2, 8000),
(5, 'P0006', '4uo9cpi6jec39gfnv7hcuadqg0', '0000-00-00', 1, 4500),
(6, 'P0005', 'nd2ckbncvgotbep8hcj1rkpek4', '0000-00-00', 4, 8000),
(7, 'P0006', 'nd2ckbncvgotbep8hcj1rkpek4', '0000-00-00', 2, 4500),
(8, 'P0002', 'nd2ckbncvgotbep8hcj1rkpek4', '0000-00-00', 1, 35000),
(9, 'P0005', 'nd62amcol3plpjdpcpddf3j8l2', '0000-00-00', 1, 8000),
(10, 'P0005', '7bldimab1mbflp218jaqh2ndb2', '0000-00-00', 1, 8000),
(11, 'P0006', 'srgu4pvu86s1uon9e5f1bt65l0', '0000-00-00', 1, 4500),
(12, 'P0005', 'qrfq2t5hk0qf6qoll0jto0cn73', '0000-00-00', 1, 8000);

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
  `status` enum('Menunggu Konfirmasi','Konfirmasi Pembayaran','Proses Kirim','Di Batalkan') NOT NULL,
  PRIMARY KEY (`Kd_Order`),
  KEY `Id_Pelanggan` (`Id_Pelanggan`),
  KEY `Id_Pelanggan_2` (`Id_Pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`Kd_Order`, `Id_Pelanggan`, `Jumlah`, `Tanggal`, `Total_Harga`, `status`) VALUES
('F0001', 'Y0002', 3, '2016-11-11 22:40:07', 34789, 'Menunggu Konfirmasi'),
('F0002', 'Y0002', 2, '2016-11-11 22:43:49', 25789, 'Menunggu Konfirmasi'),
('F0003', 'Y0002', 1, '2016-11-11 22:44:36', 10000, 'Menunggu Konfirmasi'),
('F0004', 'Y0002', 4, '2016-11-11 22:45:30', 25789, 'Menunggu Konfirmasi'),
('F0005', 'Y0002', 4, '2016-11-11 22:50:39', 103156, 'Menunggu Konfirmasi'),
('F0006', 'Y0002', 4, '2016-11-11 22:53:08', 76000, 'Menunggu Konfirmasi'),
('F0007', 'Y0002', 4, '2016-11-11 22:56:26', 76000, 'Menunggu Konfirmasi'),
('F0008', 'Y0002', 4, '2016-11-11 23:02:11', 76000, 'Menunggu Konfirmasi'),
('F0009', 'Y0002', 4, '2016-11-11 23:39:58', 38000, 'Menunggu Konfirmasi'),
('F0010', 'Y0002', 6, '2016-11-12 10:10:42', 77367, 'Menunggu Konfirmasi'),
('F0011', 'Y0002', 6, '2016-11-12 10:11:53', 77367, 'Menunggu Konfirmasi'),
('F0012', 'Y0002', 5, '2016-11-12 10:13:14', 78945, 'Menunggu Konfirmasi'),
('F0013', 'Y0002', 3, '2016-11-30 08:17:56', 925789, 'Menunggu Konfirmasi'),
('F0014', 'Y0002', 9, '2016-12-07 16:27:00', 3165000, 'Menunggu Konfirmasi'),
('F0015', 'Y0002', 1, '2016-12-13 21:54:52', 900000, 'Menunggu Konfirmasi'),
('F0016', 'Y0002', 1, '2016-12-13 22:01:35', 700000, 'Menunggu Konfirmasi'),
('F0017', 'Y0002', 1, '2016-12-13 22:12:10', 900000, 'Menunggu Konfirmasi'),
('F0018', 'Y0002', 3, '2016-12-13 22:20:29', 2500000, 'Menunggu Konfirmasi'),
('F0019', 'Y0002', 1, '2016-12-13 00:00:00', 700000, 'Proses Kirim'),
('F0020', 'Y0002', 10, '2016-12-18 00:00:00', 8800000, 'Proses Kirim'),
('F0021', 'Y0002', 5, '2016-12-18 00:00:00', 34800, 'Proses Kirim');

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
('Y0002', 'user', 'user1234', 'jogja', 'user@gmail.com', 2147483647),
('Y0003', 'budi', 'budi1234', 'jogja', 'budi@gmail.com', 2147483647),
('Y0004', 'acer', 'acer1234', 'klaten', 'acer@gmail.com', 2147483647),
('Y0005', 'latif', 'latif123', 'jogja', 'latif@gmail.com', 2147483647),
('Y0006', 'farhan', 'farhan12', 'jogja', 'farhan@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `kode` varchar(10) NOT NULL,
  `id_pelanggan` char(10) NOT NULL,
  `jasa` enum('JNE','POS INDONESIA','TIKI','WAHANA') NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `tarif` int(10) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  PRIMARY KEY (`kode`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_pelanggan_2` (`id_pelanggan`),
  KEY `id_pelanggan_3` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`kode`, `id_pelanggan`, `jasa`, `provinsi`, `kabupaten`, `kodepos`, `tarif`, `id_session`) VALUES
('V0022', 'Y0002', 'POS INDONESIA', 'Sumut', 'Kulon Progo', '7777', 15000, 'pb2bedfmq6qlnl6lr2fbj1spi5'),
('V0023', 'Y0002', 'TIKI', 'Sumut', 'Bantul', '8888', 5000, 'pb2bedfmq6qlnl6lr2fbj1spi5'),
('V0024', 'Y0002', 'POS INDONESIA', 'aceh', 'Sleman', '3333', 7000, 'pb2bedfmq6qlnl6lr2fbj1spi5'),
('V0025', 'Y0002', 'JNE', 'sumbar', 'Sleman', '66666', 7000, 'pb2bedfmq6qlnl6lr2fbj1spi5'),
('V0026', 'Y0002', 'POS INDONESIA', 'sumbar', 'Kulon Progo', '7777', 15000, 'pb2bedfmq6qlnl6lr2fbj1spi5'),
('V0027', 'Y0002', 'POS INDONESIA', 'Sumut', 'Jogja', '2222', 3000, 'pb2bedfmq6qlnl6lr2fbj1spi5'),
('V0028', 'Y0002', 'JNE', 'Yogyakarta', 'Sleman', '111111', 7000, '25n93j60th39oa5415htn6j093'),
('V0029', 'Y0002', 'POS INDONESIA', 'Riau', 'Kulon Progo', '77777', 15000, '4uo9cpi6jec39gfnv7hcuadqg0'),
('V0030', 'Y0002', 'JNE', 'Yogyakarta', 'Sleman', '52271', 7000, 'nd2ckbncvgotbep8hcj1rkpek4'),
('V0031', 'Y0002', '', '-', '-', '5544', 0, 'nd2ckbncvgotbep8hcj1rkpek4');

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
  KEY `Id_Kategori_4` (`Id_Kategori`),
  KEY `Size` (`Size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Id_Kategori`, `Nama_Produk`, `Harga_Produk`, `Stock`, `Size`, `Gambar`, `Tanggal`) VALUES
('P0001', 'K0001', 'Batik Jogja', 15000, 180, 'S', 'batik5.jpeg', '2016-12-17 20:13:01'),
('P0002', 'K0001', 'Batik  Jogja Maliobo', 35000, 78, 'S', 'batik2.jpeg', '2016-12-17 20:13:38'),
('P0003', 'K0001', 'Batik Solo Keraton', 7000, 98, 'S', 'batik5.jpeg', '2016-12-17 20:14:08'),
('P0004', 'K0001', 'Batik Pekalongan EKB', 5400, 155, 'S', 'batik3.jpeg', '2016-12-17 20:14:42'),
('P0005', 'K0001', 'Batik Pekalongan Eks', 8000, 85, 'S', 'batik1.jpeg', '2016-12-17 20:15:05'),
('P0006', 'K0001', 'Batik Solo Lurik', 4500, 79, 'S', 'batik6.jpeg', '2016-12-17 20:15:58');

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
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `idpelpeng` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`Id_Pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `Id_Kategori` FOREIGN KEY (`Id_Kategori`) REFERENCES `kategori` (`Id_Kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
