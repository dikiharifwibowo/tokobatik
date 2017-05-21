-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 09:19 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistempenjadwalankb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE IF NOT EXISTS `bidan` (
  `id_bidan` varchar(10) NOT NULL,
  `nama_bidan` varchar(50) NOT NULL,
  `tmpt_lahir_bidan` text NOT NULL,
  `tgl_lahir_bidan` text NOT NULL,
  `alamat_bidan` text NOT NULL,
  `nmr_tlpn_bidan` varchar(13) NOT NULL,
  PRIMARY KEY (`id_bidan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidan`
--

INSERT INTO `bidan` (`id_bidan`, `nama_bidan`, `tmpt_lahir_bidan`, `tgl_lahir_bidan`, `alamat_bidan`, `nmr_tlpn_bidan`) VALUES
('BD002', 'Dunuk Mudjasri', 'jhfgdhjkglhjkghcjfhdgzf', '04 April 2015', 'gjhfkfggjhk', '0202055828552'),
('BD011', 'Jemitri Eka L', 'wqdqwwqdqwdqwdqwd', '28 Februari 2014', 'asdasdasdasdas', '2132131232134'),
('BD012', 'Lisna', 'erterterterter', '03 Maret 2017', 'fsgssgsdgsdgsdgg', ''),
('BD013', 'DASFDASFDSA', 'asdsadasd', '31 Januari 2013', '										', '123123213214'),
('BD014', 'asdasdasd', 'asdasdasdas', '03 Maret 2017', 'asdasdasdasdasdasd', '1231231232133'),
('BD015', 'asd', 'asdad', '03/17/2017', 'as', '2341'),
('BD016', 'sdasdas', 'asddsa', '03/01/2017', 'vrrr', '44444');

-- --------------------------------------------------------

--
-- Table structure for table `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=255 ;

--
-- Triggers `inbox`
--
DROP TRIGGER IF EXISTS `inbox_timestamp`;
DELIMITER //
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox`
 FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kb`
--

CREATE TABLE IF NOT EXISTS `jenis_kb` (
  `id_kb` varchar(10) NOT NULL,
  `nama_kb` varchar(225) NOT NULL,
  `keterangan_kb` text NOT NULL,
  `jangka_waktukb` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kb`
--

INSERT INTO `jenis_kb` (`id_kb`, `nama_kb`, `keterangan_kb`, `jangka_waktukb`) VALUES
('KB01', 'IUD', 'Sebuah alat kontrasepsi (IUD atau coil) adalah perangkat kontrasepsi berukuran kecil, sering berbentuk ''T'', mengandung tembaga atau levonorgestrel, yang dimasukkan ke dalam rahim. Alat ini adalah salah satu bentuk kontrasepsi jangka panjang reversibel yang merupakan metode pengendalian kelahiran yang paling efektif.', '< 1 bln'),
('KB02', 'MOW', 'Medis Operatif Wanita (MOW), adalah prosedur bedah sukarela untuk menghentikan fertilisasi (kesuburan) seorang wanita. Dengan kata lain penghambatan perjalanan sel telur dengan cara menutup (operasi) saluran sel telur.', '2 bln'),
('KB03', 'MOP', 'Medis Operatif Pria (MOP), adalah prosedur klinik untuk menghentikan kapasitas reproduksi pria dengan jalan melakukan oklusi vasa deferensia sehingga alur transportasi sperma terhambat dan proses fertilisasi (penyatuan dengan ovum) tidak terjadi.', '2 bln'),
('KB04', 'Kondom', 'Adalah alat kontrasepsi atau alat untuk mencegah kehamilan atau penularan penyakit kelamin pada saat bersanggama. Kondom biasanya dibuat dari bahan karet latex dan dipakaikan pada alat kelamin pria atau wanita pada keadaan ereksi sebelum bersanggama (bersetubuh) atau berhubungan suami-istri.', '< 1 bln'),
('KB05', 'Implant', 'Adalah alat kontrasepsi bawah kulit (biasanya pada lengan atas) yang mengandung progestin yang dibungkus dalam kapsul silastik silikon polidimetri. Pemasangan susuk biasanya dilakukan saat ibu menstruasi atau berada dalam masa nifas (hingga 42 hari setelah bersalin).', '1 bln'),
('KB06', 'Suntikan ', 'Adalah salah satu metode kontrasepsi yang biasa digunakan untuk menunda kehamilan. Namun seperti metode kontrasepsi lainnya, suntik KB memiliki beberapa kekurangan dan tidak disarankan bagi wanita yang memiliki kondisi kesehatan tertentu.', '1 bln'),
('KB07', 'PIL', 'Mengandung hormon yaitu hormon estrogen dan progestin. Kedua jenis hormon ini akan bekerja untuk menghambat produksi hormon yang bisa mencegah kehamilan.', '< 1 bln');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Triggers `outbox`
--
DROP TRIGGER IF EXISTS `outbox_timestamp`;
DELIMITER //
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nama_peserta_kb` text NOT NULL,
  `tmpt_lahir_pasien` varchar(225) NOT NULL,
  `tgl_lahir_pasien` text NOT NULL,
  `pendidikan_suami_istri` varchar(225) NOT NULL,
  `alamat_pasien_kb` text NOT NULL,
  `nmr_tlpn_psn` varchar(160) NOT NULL,
  `pekerjaan_suami_istri` text NOT NULL,
  `jumlah_anak_hidup` varchar(2) NOT NULL,
  `umur_anak_terkecil` varchar(4) NOT NULL,
  `status_peserta_kb` text NOT NULL,
  `kb_terakhir` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_peserta_kb`, `tmpt_lahir_pasien`, `tgl_lahir_pasien`, `pendidikan_suami_istri`, `alamat_pasien_kb`, `nmr_tlpn_psn`, `pekerjaan_suami_istri`, `jumlah_anak_hidup`, `umur_anak_terkecil`, `status_peserta_kb`, `kb_terakhir`) VALUES
('P0001', 'Agung Aryanto', 'Yogyakarta', '03/01/2017', 'Tamat PT', 'Tegalrejo, Yogyakarta', '085755662647', 'Pegawai Pemerintah', '10', '17', 'Baru Pertama Kali', ''),
('P0002', 'Udin', 'adda', '20 Januari 2017', 'Tamat SD', 'Wonogiri Sono			', '085632222446', 'Pegawai Pemerintah', '3', '3', 'Baru Pertama Kali', ''),
('P0003', 'Aminudin', 'jogja', '09 Juni 1999', 'Tamat SD', 'Demakan Baru', '085868333446', 'Pegawai Pemerintah', '1', '2', 'Baru Pertama Kali', ''),
('P0004', 'asdasdasd', 'asdasdasdasd', '03 Maret 2017', 'Tidak Tamat SD', 'Demakan Baru', '085643123654', 'Nelayan', '', '', 'Baru Pertama Kali', ''),
('P0005', 'sgdfgSDFGDF', 'FDSGFDSGSDFGFDSG', '06 Maret 2017', 'Tamat SD', 'DFGDFSGSDFGDFG', '324324322352', 'Pegawai Swasta', '2', '15', 'Baru Pertama Kali', ''),
('P0006', 'tested', 'brebs', '03/14/2017', 'Tamat SD', 'asd', '082328722687', 'Lainnya', '8', '18', 'Baru Pertama Kali', '');

-- --------------------------------------------------------

--
-- Table structure for table `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  `Foto` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `pbk`
--

INSERT INTO `pbk` (`ID`, `GroupID`, `Name`, `Number`, `Foto`) VALUES
(1, 2, 'ijul', '090909090', 'assets/img/4sai-wika salim.jpg'),
(28, 3, 'lisna', '0898989898', 'assets/img/f0460009.jpg'),
(29, 8, 'Entis Sutisna', '08989898989', 'assets/img/f0460145.jpg'),
(30, 2, 'Steven', '+62838898989898', 'assets/img/10609104_453027394838895_590088178_n.jpg'),
(31, 2, 'Siti Maemunah', '08989898', 'assets/img/302984-one-piece-sabo-luffy-and-ace.jpg'),
(33, 2, 'sadsadasd', '0988098989', 'assets/img/greekalphabet2col.jpg'),
(34, 2, 'Dina', '0898989898', 'assets/img/'),
(35, 2, 'Dina', '0898989898', 'assets/img/'),
(36, 2, 'Pak Jamil', '08989898', 'assets/img/'),
(37, 2, 'Pak Jamil', '08989898', 'assets/img/');

-- --------------------------------------------------------

--
-- Table structure for table `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `NameGroup` text NOT NULL,
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`GroupID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pbk_groups`
--

INSERT INTO `pbk_groups` (`NameGroup`, `GroupID`) VALUES
('Keluarga', 2),
('Teman', 3),
('Group Nakal', 9),
('Client', 8),
('Group 2', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id_pemeriksaan` varchar(10) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `keadaan_umum` text NOT NULL,
  `berat_badan` varchar(3) NOT NULL,
  `tekanan_darah` text NOT NULL,
  `haid_terakhir` date NOT NULL,
  `jumlah_gravida` varchar(2) NOT NULL,
  `jumlah_partus` varchar(2) NOT NULL,
  `jumlah_abortus` varchar(2) NOT NULL,
  `status_menyusui` text NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `id_bidan` varchar(10) NOT NULL,
  `id_kb` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pemeriksaan`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_bidan` (`id_bidan`),
  KEY `id_kb` (`id_kb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `tgl_pemeriksaan`, `keadaan_umum`, `berat_badan`, `tekanan_darah`, `haid_terakhir`, `jumlah_gravida`, `jumlah_partus`, `jumlah_abortus`, `status_menyusui`, `id_pasien`, `id_bidan`, `id_kb`) VALUES
('P0002', '2017-03-23', 'BAIK', '55', '44', '2017-03-23', '17', '18', '18', 'YA', 'P0001', 'BD002', 'KB01'),
('P0003', '2017-03-23', '', '60', '120', '2017-03-22', '', '', '', 'YA', 'P0001', 'BD002', 'KB01'),
('P0004', '2017-03-19', 'BAIK', '44', '44', '0000-00-00', '16', '16', '16', 'YA', 'P0006', 'BD002', 'KB02'),
('P0005', '2017-03-24', 'KURANG', '33', '33', '0000-00-00', '', '', '', 'YA', 'P0001', 'BD002', 'KB01'),
('P0006', '2017-03-24', 'KURANG', '3', '3', '2017-03-07', '', '', '', 'YA', 'P0002', 'BD002', 'KB01');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` varchar(10) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `tmpt_lahir_user` varchar(200) NOT NULL,
  `tgl_lahir_user` text NOT NULL,
  `alamat_user` text NOT NULL,
  `nmr_tlpn_user` varchar(13) NOT NULL,
  `email_user` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` text NOT NULL,
  `level_pengguna` varchar(10) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_user`, `tmpt_lahir_user`, `tgl_lahir_user`, `alamat_user`, `nmr_tlpn_user`, `email_user`, `username`, `password`, `level_pengguna`, `foto`) VALUES
('US006', 'admin', 'klaten', '03/15/2017', 'klaten', '028334371234', 'user@gmail.com', 'admin', 'admin', '1', 'Chrysanthemum.jpg'),
('US007', 'user', 'jogja', '03/15/2017', 'kaliurang', '082371256312', 'dikih@gmail.com', 'user', 'user', '2', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('', '2017-03-22 06:26:37', '2017-03-22 06:07:50', '2017-03-22 06:26:47', 'yes', 'yes', '352445047827879', 'Gammu 1.33.0, Windows Server 2007 SP1, GCC 4.7, MinGW 3.11', 0, 60, 4, 0);

--
-- Triggers `phones`
--
DROP TRIGGER IF EXISTS `phones_timestamp`;
DELIMITER //
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2017-03-22 06:07:54', '2017-03-22 06:00:11', '2017-03-22 06:07:54', NULL, '00640069006B0069007300610073006A00680068', '085643123654', 'Default_No_Compression', '', '+6289644000001', -1, 'dikisasjhh', 247, '', 1, 'SendingOKNoReport', -1, 4, 255, 'Gammu'),
('2017-03-22 06:07:59', '2017-03-22 06:02:00', '2017-03-22 06:07:59', NULL, '005400650073007400650064002000470061006D006D0075', '085868333446', 'Default_No_Compression', '', '+6289644000001', -1, 'Tested Gammu', 248, '', 1, 'SendingOKNoReport', -1, 5, 255, 'Gammu'),
('2017-03-22 06:08:03', '2017-03-22 06:05:00', '2017-03-22 06:08:03', NULL, '007300640068006100730064006800610073006B006400610073006B00640068006B0061', '082328722687', 'Default_No_Compression', '', '+6289644000001', -1, 'sdhasdhaskdaskdhka', 249, '', 1, 'SendingOKNoReport', -1, 6, 255, 'Gammu');

--
-- Triggers `sentitems`
--
DROP TRIGGER IF EXISTS `sentitems_timestamp`;
DELIMITER //
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autoreply`
--

CREATE TABLE IF NOT EXISTS `tbl_autoreply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword1` varchar(25) NOT NULL,
  `keyword2` varchar(25) NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_autoreply`
--

INSERT INTO `tbl_autoreply` (`id`, `keyword1`, `keyword2`, `result`) VALUES
(1, 'REG', 'SAGA', 'Terima kasih telah mendaftar SMS Gateway SAGA'),
(2, 'UNREG', 'SAGA', 'Anda sudah menonaktifkan acount SAGA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `DestinationNumber` varchar(160) NOT NULL,
  `nama_peserta_kb` varchar(225) NOT NULL,
  `TextDecoded` varchar(15) NOT NULL,
  `CreatorID` varchar(5) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_event` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `DestinationNumber`, `nama_peserta_kb`, `TextDecoded`, `CreatorID`, `Time`, `nama_event`) VALUES
(7, '085755662647', 'Agung Aryanto', 'khgkjgu', 'Gammu', '0000-00-00 00:00:00', ''),
(8, '324324322352', 'sgdfgSDFGDF', 'asdas', 'Gammu', '0000-00-00 00:00:00', ''),
(9, '324324322352', 'sgdfgSDFGDF', 'asd', 'Gammu', '2017-03-16 08:08:00', ''),
(10, '082328722687', 'asdasdasd', 'dikisasjhh', 'Gammu', '2017-03-20 09:52:00', 'saga_event_10'),
(11, '082328722687', 'tested', 'tested sms gate', 'Gammu', '2017-03-20 08:58:00', 'saga_event_11'),
(12, '085868333446', 'Aminudin', 'Tested Gammu', 'Gammu', '2017-03-22 06:02:00', 'saga_event_12'),
(13, '082328722687', 'tested', 'sdhasdhaskdaskd', 'Gammu', '2017-03-22 06:05:00', 'saga_event_13'),
(18, '085755662647', 'Agung Aryanto', 'hari ini tangga', 'Gammu', '2017-06-20 23:43:32', 'saga_event_18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level_user` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `w_login` datetime NOT NULL,
  `photo` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `pass`, `level_user`, `email`, `status`, `w_login`, `photo`, `nohp`) VALUES
(2, 'andez', '79803a0eaab30ae84b7b807bb46419f5', 1, 'andeztea@gmail.com', 1, '2015-07-03 10:27:24', 'assets/img/users_lock.png', '+08989899898');

-- --------------------------------------------------------

--
-- Table structure for table `t_kalendar_agenda`
--

CREATE TABLE IF NOT EXISTS `t_kalendar_agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_acara` date NOT NULL,
  `tgl_kalendar` varchar(10) NOT NULL,
  `subjek` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_kalendar_agenda`
--

INSERT INTO `t_kalendar_agenda` (`id`, `tgl_acara`, `tgl_kalendar`, `subjek`, `keterangan`) VALUES
(1, '2017-03-23', '23-03-2017', 'Resepsi Pernikahan Dirut', 'Resepsi Pernikahan Dirut PT. BUM\r\n\r\nBalai Samudera \r\nKelapa Gading'),
(2, '2017-03-23', '23-03-2017', 'Operasi Plastik', 'Agus operasi plastik biar muka mirip Nicholas Saputra');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`id_bidan`) REFERENCES `bidan` (`id_bidan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan_ibfk_3` FOREIGN KEY (`id_kb`) REFERENCES `jenis_kb` (`id_kb`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `saga_event_16` ON SCHEDULE AT '2017-06-20 18:37:26' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('085755662647', 'sads', 'Gammu')$$

CREATE DEFINER=`root`@`localhost` EVENT `saga_event_15` ON SCHEDULE AT '2017-06-20 17:18:13' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('085755662647', 'indriyani
', 'Gammu')$$

CREATE DEFINER=`root`@`localhost` EVENT `saga_event_17` ON SCHEDULE AT '2017-06-20 18:39:12' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('085755662647', 'asdsadasdasdasdasd', 'Gammu')$$

CREATE DEFINER=`root`@`localhost` EVENT `saga_event_18` ON SCHEDULE AT '2017-06-21 06:43:32' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('085755662647', 'hari ini tanggal 23-03-2017', 'Gammu')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
