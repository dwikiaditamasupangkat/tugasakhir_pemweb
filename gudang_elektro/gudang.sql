-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 05:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `kode_barang`, `tanggal`, `jumlah`, `penerima`, `keterangan`) VALUES
(1, 1112, '2021-01-09', 157, 'Achmad Latief Alwy', 'Lunas'),
(2, 1971, '2021-01-09', 252, 'Bambang Hartono', 'Lunas'),
(3, 2255, '2021-01-09', 361, 'Catresia Lucia', 'DP'),
(4, 2575, '2021-01-09', 302, 'Elly Lestari Adiutama', 'Lunas'),
(5, 2805, '2021-01-09', 211, 'Lilis Dwi Ningkrum', 'DP'),
(6, 3365, '2021-01-09', 102, 'Qaidah Rahmatika Rosida', 'DP'),
(7, 3861, '2021-01-09', 257, 'Dhika Nugraha', 'Lunas'),
(8, 4352, '2021-01-09', 245, 'David Yerli Afandi', 'Lunas'),
(9, 4703, '2021-01-09', 186, 'Reza Darmawangsa', 'Lunas'),
(10, 5149, '2021-01-09', 467, 'El Jaewon Ahmad', 'Lunas'),
(11, 5474, '2021-01-09', 351, 'Irghi Fahrezi', 'DP'),
(12, 5711, '2021-01-09', 500, 'Afghan Al Bhaihaqi', 'Lunas'),
(13, 6207, '2021-01-09', 243, 'Putra Dwi Cahyono', 'Lunas'),
(14, 6621, '2021-01-09', 137, 'Rian Devi Astuti', 'DP'),
(15, 7267, '2021-01-09', 223, 'Gea Trisa Amalia', 'Lunas'),
(16, 7693, '2021-01-09', 263, 'Maulidyah Rahmah', 'Lunas'),
(17, 7768, '2021-01-09', 144, 'Imaniar Pustaka Rini', 'DP'),
(18, 8563, '2021-01-09', 421, 'Gilang Passasi', 'Lunas'),
(19, 8742, '2021-01-09', 351, 'Anggita Ferlyana Syamsyudin', 'Lunas'),
(20, 9539, '2021-01-09', 236, 'Fahmi Aziz Ibadurrahman', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `kode_barang`, `tanggal`, `jumlah`, `keterangan`) VALUES
(1, 1112, '2021-01-09', 323, 'Lengkap'),
(2, 1971, '2021-01-09', 421, 'Lengkap'),
(3, 2255, '2021-01-09', 257, 'Lengkap'),
(4, 2575, '2021-01-09', 521, 'Lengkap'),
(5, 2805, '2021-01-09', 206, 'Lengkap'),
(6, 3431, '2021-01-09', 361, 'Lengkap'),
(7, 3745, '2021-01-09', 521, 'Lengkap'),
(8, 4352, '2021-01-09', 333, 'Lengkap'),
(9, 4703, '2021-01-09', 426, 'Lengkap'),
(10, 5332, '2021-01-09', 456, 'Lengkap'),
(11, 5474, '2021-01-09', 628, 'Lengkap'),
(12, 5814, '2021-01-09', 322, 'Lengkap'),
(13, 6207, '2021-01-09', 456, 'Lengkap'),
(14, 6910, '2021-01-09', 453, 'Lengkap'),
(15, 7267, '2021-01-09', 237, 'Lengkap'),
(16, 7693, '2021-01-09', 376, 'Lengkap'),
(17, 7768, '2021-01-09', 132, 'Lengkap'),
(18, 8563, '2021-01-09', 346, 'Lengkap'),
(19, 8742, '2021-01-09', 453, 'Lengkap'),
(20, 9539, '2021-01-09', 549, 'Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kategori`
--

CREATE TABLE `detail_kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `content` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kategori`
--

INSERT INTO `detail_kategori` (`id_kategori`, `content`) VALUES
(1, 'AC'),
(2, 'BLENDER'),
(3, 'CCTV'),
(4, 'DISPENSER'),
(5, 'HAIR DRYER'),
(6, 'HP'),
(7, 'KAMERA'),
(8, 'KIPAS ANGIN'),
(9, 'KULKAS'),
(10, 'LAPTOP'),
(11, 'MESIN CUCI'),
(12, 'MICROWAVE'),
(13, 'MIXER'),
(14, 'OVEN'),
(15, 'POWER BANK'),
(16, 'RICE COOKER'),
(17, 'SETRIKA'),
(18, 'SPEAKER'),
(19, 'TV'),
(20, 'VACCUM CLEANER');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lokasi`
--

CREATE TABLE `detail_lokasi` (
  `id_lokasi` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `keterangan_lokasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_lokasi`
--

INSERT INTO `detail_lokasi` (`id_lokasi`, `id_kategori`, `keterangan_lokasi`) VALUES
(111, 1, 'BLOCK A RAK 1'),
(112, 1, 'BLOCK A RAK 2'),
(113, 1, 'BLOCK A RAK 3'),
(114, 1, 'BLOCK A RAK 4'),
(115, 1, 'BLOCK A RAK 5'),
(116, 2, 'BLOCK B RAK 1'),
(117, 2, 'BLOCK B RAK 2'),
(118, 2, 'BLOCK B RAK 3'),
(119, 2, 'BLOCK B RAK 4'),
(120, 2, 'BLOCK B RAK 5'),
(121, 3, 'BLOCK F RAK 1'),
(122, 3, 'BLOCK F RAK 2'),
(123, 3, 'BLOCK F RAK 3'),
(124, 3, 'BLOCK F RAK 4'),
(125, 3, 'BLOCK F RAK 5'),
(126, 4, 'BLOCK G RAK 1'),
(127, 4, 'BLOCK G RAK 2'),
(128, 4, 'BLOCK G RAK 3'),
(129, 4, 'BLOCK G RAK 4'),
(130, 4, 'BLOCK G RAK 5'),
(131, 5, 'BLOCK D RAK 1'),
(132, 5, 'BLOCK D RAK 2'),
(133, 5, 'BLOCK D RAK 3'),
(134, 5, 'BLOCK D RAK 4'),
(135, 5, 'BLOCK D RAK 5'),
(136, 6, 'BLOCK E RAK 1'),
(137, 6, 'BLOCK E RAK 2'),
(138, 6, 'BLOCK E RAK 3'),
(139, 6, 'BLOCK E RAK 4'),
(140, 6, 'BLOCK E RAK 5'),
(141, 7, 'BLOCK F RAK 6'),
(142, 7, 'BLOCK F RAK 7'),
(143, 7, 'BLOCK F RAK 8'),
(144, 7, 'BLOCK F RAK 9'),
(145, 7, 'BLOCK F RAK 10'),
(146, 8, 'BLOCK A RAK 6'),
(147, 8, 'BLOCK A RAK 7'),
(148, 8, 'BLOCK A RAK 8'),
(149, 8, 'BLOCK A RAK 9'),
(150, 8, 'BLOCK A RAK 10'),
(151, 9, 'BLOCK G RAK 6'),
(152, 9, 'BLOCK G RAK 7'),
(153, 9, 'BLOCK G RAK 8'),
(154, 9, 'BLOCK G RAK 9'),
(155, 9, 'BLOCK G RAK 10'),
(156, 10, 'BLOCK E RAK 6'),
(157, 10, 'BLOCK E RAK 7'),
(158, 10, 'BLOCK E RAK 8'),
(159, 10, 'BLOCK E RAK 9'),
(160, 10, 'BLOCK E RAK 10'),
(161, 11, 'BLOCK G RAK 11'),
(162, 11, 'BLOCK G RAK 12'),
(163, 11, 'BLOCK G RAK 13'),
(164, 11, 'BLOCK G RAK 14'),
(165, 11, 'BLOCK G RAK 15'),
(166, 12, 'BLOCK B RAK 6'),
(167, 12, 'BLOCK B RAK 7'),
(168, 12, 'BLOCK B RAK 8'),
(169, 12, 'BLOCK B RAK 9'),
(170, 12, 'BLOCK B RAK 10'),
(171, 13, 'BLOCK C RAK 1'),
(172, 13, 'BLOCK C RAK 2'),
(173, 13, 'BLOCK C RAK 3'),
(174, 13, 'BLOCK C RAK 4'),
(175, 13, 'BLOCK C RAK 5'),
(176, 14, 'BLOCK B RAK 11'),
(177, 14, 'BLOCK B RAK 12'),
(178, 14, 'BLOCK B RAK 13'),
(179, 14, 'BLOCK B RAK 14'),
(180, 14, 'BLOCK B RAK 15'),
(181, 15, 'BLOCK E RAK 11'),
(182, 15, 'BLOCK E RAK 12'),
(183, 15, 'BLOCK E RAK 13'),
(184, 15, 'BLOCK E RAK 14'),
(185, 15, 'BLOCK E RAK 15'),
(186, 16, 'BLOCK C RAK 6'),
(187, 16, 'BLOCK C RAK 7'),
(188, 16, 'BLOCK C RAK 8'),
(189, 16, 'BLOCK C RAK 9'),
(190, 16, 'BLOCK C RAK 10'),
(191, 17, 'BLOCK D RAK 6'),
(192, 17, 'BLOCK D RAK 7'),
(193, 17, 'BLOCK D RAK 8'),
(194, 17, 'BLOCK D RAK 9'),
(195, 17, 'BLOCK D RAK 10'),
(196, 18, 'BLOCK H RAK 1'),
(197, 18, 'BLOCK H RAK 2'),
(198, 18, 'BLOCK H RAK 3'),
(199, 18, 'BLOCK H RAK 4'),
(200, 18, 'BLOCK H RAK 5'),
(201, 19, 'BLOCK H RAK 6'),
(202, 19, 'BLOCK H RAK 7'),
(203, 19, 'BLOCK H RAK 8'),
(204, 19, 'BLOCK H RAK 9'),
(205, 19, 'BLOCK H RAK 10'),
(206, 20, 'BLOCK I RAK 1'),
(207, 20, 'BLOCK I RAK 2'),
(208, 20, 'BLOCK I RAK 3'),
(209, 20, 'BLOCK I RAK 4'),
(210, 20, 'BLOCK I RAK 5');

-- --------------------------------------------------------

--
-- Table structure for table `logindata`
--

CREATE TABLE `logindata` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindata`
--

INSERT INTO `logindata` (`id_pegawai`, `nama_pegawai`, `jabatan`, `password`, `username`, `role`) VALUES
(1, 'manajer', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer', 'manajer'),
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(3, 'dwiki', 'manajer', '2314b026f8163ccf63c8897999a57517', 'dwiki', 'manajer');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `merk_barang` varchar(100) DEFAULT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `jumlah_stok` int(11) DEFAULT NULL,
  `id_lokasi` int(10) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`kode_barang`, `nama_barang`, `merk_barang`, `id_kategori`, `jumlah_stok`, `id_lokasi`, `image`) VALUES
(1112, 'AC Polytron Split PAC 09VG 1PK Standard', 'POLYTRON', 1, 291, 111, '../temp/1112.png'),
(1303, 'Sharp AC Standard AH-AP7SSY 3/4 PK Jetstream PCI Series', 'SHARP', 1, 164, 113, '../temp/1303.png'),
(1627, 'Miyako KAD-1227B Kipas Angin 2in1 12 Inch', 'MIYAKO', 8, 137, 146, '../temp/1627.png'),
(1971, 'Cosmos 16-SDB Kipas Angin Berdiri / Stand Fan [16 Inch]', 'COSMOS', 8, 374, 149, '../temp/1971.png'),
(2255, 'MITRA ANDA88 Blender National Kaca Matsunichi 3 IN 1 Kapasitas 1 Liter', 'MATSUNICHI', 2, 137, 117, '../temp/2255.png'),
(2386, 'Miyako BL-102PL Blender Plastik 1 L', 'MIYAKO', 2, 211, 118, '../temp/2386.png'),
(2464, 'Sharp Microwave R-728(K)-IN', 'SHARP', 12, 247, 166, '../temp/2464.png'),
(2575, 'Microwave Samsung ME731K 1150 Watt 20 Liter ME731K/XEU', 'SAMSUNG', 12, 526, 167, '../temp/2575.png'),
(2805, 'HAN RIVER HROV002 Oven Listrik Layar Sentuh 12 L-800 Watt', 'HAN RIVER', 14, 141, 179, '../temp/2805.png'),
(2951, 'ADVANCE Electric Oven (Oven Listrik ) AOV-100 Kapasitas 9L', 'ADVANCE', 14, 298, 180, '../temp/2951.png'),
(3365, 'HAN RIVER Hand Mixer HE -133 / HE -133 - Putih', 'HAN RIVER', 13, 74, 173, '../temp/3365.png'),
(3431, 'Philips HR1559/50 Stand Mixer - Grey', 'PHILIPS', 13, 753, 174, '../temp/3431.png'),
(3745, 'CUCKOO All in One IH Twin Pressure Cooker CRP-JHT1012F', 'CUCKOO', 16, 972, 187, '../temp/3745.png'),
(3861, 'PHILIPS Digital Rice Cooker [1.8 L] HD4515/33', 'PHILIPS', 16, 164, 188, '../temp/3861.png'),
(4198, 'HAN RIVER Hair Dryer HRCFS01 ONE STEP SISIR PENGERING RAMBUT 3IN1', 'HAN RIVER', 5, 434, 131, '../temp/4198.png'),
(4352, 'Panasonic Hair Dryer EH ND11 pengering rambut', 'PANASONIC', 5, 341, 133, '../temp/4352.png'),
(4703, 'Cosmos CIS-418 Setrika / Iron', 'COSMOS', 17, 559, 192, '../temp/4703.png'),
(4882, 'Miyako EI-1008M Setrika Listrik', 'MIYAKO', 17, 163, 193, '../temp/4882.png'),
(5149, 'Samsung Galaxy A51 - Prism Crush Black 6/128 GB', 'SAMSUNG', 6, 231, 136, '../temp/5149.png'),
(5332, 'Apple iPhone 12 128GB, Black', 'APPLE', 6, 1410, 138, '../temp/5332.png'),
(5474, 'ASUS UX481FL-HJ551TS (14\",i5-10210U/MX250/8G/512G PCIe/DUO/SPAD/BLUE/OPI)', 'ASUS', 10, 916, 157, '../temp/5474.png'),
(5595, 'Acer Nitro 5 AN515-55-58X3 [i5-10300H/W10+OHS] Black [NH.Q7NSN.003]', 'ACER', 10, 558, 159, '../temp/5595.png'),
(5711, 'GROTIC Power Bank 20000 mAh 3.1A Fast Charging LED Flashlight 2 Output 2 Input Powerbank GYF20', 'GROTIC', 15, 283, 181, '../temp/5711.png'),
(5814, 'VIVAN Powerbank 10000 mAh Power Bank 3 Output Fast Charging 18W QC3.0 PD Support iPhone 12 VPB-F10S', 'VIVAN', 15, 953, 184, '../temp/5814.png'),
(6207, 'EZVIZ HUSKY C3WN - Outdoor WIFI Camera Full HD 1080P IP Camera CCTV', 'EZVIZ', 3, 1055, 122, '../temp/6207.png'),
(6487, 'Yi Lite K2 Xiaoyi Wifi IP Camera CCTV Full HD1080p International Version', 'YI LITE', 3, 768, 124, '../temp/6487.png'),
(6621, 'Canon Camera Mirrorless EOS M100 Black with EF-M15-45mm', 'CANON', 7, 516, 141, '../temp/6621.png'),
(6910, 'SONY DSC-W810 Digital Compact Camera / DSC W810 / DSCW810', 'SONY', 7, 1232, 145, '../temp/6910.png'),
(7267, 'Miyako Dispenser WD 190 PH / 190PH [HOT & NORMAL]', 'MIYAKO', 4, 467, 127, '../temp/7267.png'),
(7361, 'Cosmos Dispenser - Portable Dispenser - CWD-1060 - Hot & Fresh', 'COSMOS', 4, 558, 128, '../temp/7361.png'),
(7488, 'Sharp SJ246XIMK Kulkas / Lemari Es 2 Pintu 205L', 'SHARP', 9, 431, 153, '../temp/7488.png'),
(7693, 'LG GNB215SQMT Kulkas 2 Pintu Smart Inverter', 'LG', 9, 642, 154, '../temp/7693.png'),
(7768, 'Sharp Mesin Cuci Twin Tube 2 Tabung EST75NTBL 7 Kg', 'SHARP', 11, 671, 162, '../temp/7768.png'),
(7915, 'POLYTRON New Zeromatic Automatic Washing Maching PAW 90517WB', 'POLYTRON', 11, 462, 165, '../temp/7915.png'),
(8309, 'Advance ES030U - Wireless Speaker', 'ADVANCE', 18, 763, 198, '../temp/8309.png'),
(8563, 'JOYSEUS JS02 Speaker Mini Portable Stereo Bluetooth 5.0 - OT0029', 'JOYSEUS', 18, 789, 200, '../temp/8563.png'),
(8742, 'LG LN56 EASY SMART TV 32\" - 32LN560BPTA', 'LG', 19, 693, 202, '../temp/8742.png'),
(8819, 'Samsung UA43N5001AK Full HD LED TV [43 Inch]', 'SAMSUNG', 19, 832, 203, '../temp/8819.png'),
(9271, 'Sharp EC-8305-P Vacuum Cleaner - Pink', 'SHARP', 20, 943, 207, '../temp/9271.png'),
(9539, 'Philips FC6404/01 Vacuum Cleaner Bermuda Powerpro Aqua', 'PHILIPS', 20, 1191, 210, '../temp/9539.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `detail_kategori`
--
ALTER TABLE `detail_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `detail_lokasi`
--
ALTER TABLE `detail_lokasi`
  ADD PRIMARY KEY (`id_lokasi`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `logindata`
--
ALTER TABLE `logindata`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_kategori`
--
ALTER TABLE `detail_kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `detail_lokasi`
--
ALTER TABLE `detail_lokasi`
  MODIFY `id_lokasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
