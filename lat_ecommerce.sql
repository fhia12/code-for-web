-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 01:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lat_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `kat_produk`
--

CREATE TABLE `kat_produk` (
  `id_kp` int(2) NOT NULL,
  `nama_kat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_produk`
--

INSERT INTO `kat_produk` (`id_kp`, `nama_kat`) VALUES
(6, 'Romantis'),
(7, 'Mistis'),
(8, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pmlk` tinyint(2) NOT NULL,
  `nama_lgkp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak` enum('1','2') NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pmlk`, `nama_lgkp`, `username`, `password`, `hak`, `status`) VALUES
(27, 'fhia', 'fhia', '62ba05bee0eb3d4057edcd6999534699', '2', 'on'),
(31, 'Ani', 'ani', '29d1e2357d7c14db51e885053a58ec67', '1', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_kp` int(2) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(6) NOT NULL,
  `berat` float(4,2) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kp`, `nama_produk`, `harga`, `berat`, `detail`, `gambar`, `status`) VALUES
(20, 6, 'buku2', 20000, 1.00, 'buku romantis dua sejoli', '77357-BOOK.jpg', 'on'),
(21, 7, 'buku3', 60000, 1.00, 'buku tentang perjalanan hantu', '90090-BOOK.jpg', 'on'),
(22, 8, 'buku4', 20000, 1.00, 'buku tentang olahraga', '74649-BOOK.jpg', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `qty` int(5) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `payment` varchar(225) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `produk`, `qty`, `alamat_tujuan`, `harga_beli`, `total_bayar`, `payment`, `waktu_transaksi`) VALUES
(5, 1, 'buku4', 3, 'depok', 20000, 60000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123', '2021-03-24 13:40:09'),
(6, 1, 'buku4', 6, 'depok', 20000, 120000, 'Pembayaran anda akan dilakukan dengan COD', '2021-03-24 13:40:17'),
(7, 1, 'buku4', 5, 'rerrrere', 20000, 100000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BNI dengan nomor rekening 123', '2021-03-24 13:51:10'),
(8, 1, 'buku4', 5, 'rerrrere', 20000, 100000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BNI dengan nomor rekening 123', '2021-03-24 13:51:48'),
(9, 1, 'buku4', 5, 'rerrrere', 20000, 100000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BNI dengan nomor rekening 123', '2021-03-24 13:52:33'),
(10, 1, 'buku4', 5, 'rerrrere', 20000, 100000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BNI dengan nomor rekening 123', '2021-03-24 13:59:07'),
(11, 1, 'buku2', 1, 'Alamat kantor: jl.Margonda raya 142', 20000, 20000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123', '2021-03-24 23:05:10'),
(12, 1, 'buku2', 3, 'depok', 20000, 60000, 'Pembayaran anda akan dilakukan dengan COD', '2021-03-24 23:07:15'),
(13, 1, 'buku2', 5, 'Jl. margonda no.142, depok, indonesia', 20000, 100000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123', '2021-03-24 23:08:42'),
(14, 0, 'buku4', 2, 'deok', 20000, 40000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123', '2021-03-25 01:24:42'),
(15, 0, 'buku4', 0, '', 20000, 0, '', '2021-03-25 01:24:44'),
(16, 0, 'buku4', 0, '', 20000, 0, '', '2021-03-25 01:24:45'),
(17, 0, 'buku4', 0, '', 20000, 0, '', '2021-03-25 01:24:46'),
(18, 1, 'buku2', 10, 'depok', 20000, 200000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123', '2021-03-25 01:33:18'),
(19, 1, 'buku2', 5, 'Depok', 20000, 100000, 'Pembayaran anda akan dilakukan dengan COD', '2021-04-08 02:10:13'),
(20, 1, 'buku2', 5, 'Depok', 20000, 100000, 'Transaksi anda akan diproses setelah mentransfer ke rekening BCA dengan nomor rekening 123', '2021-04-08 02:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `username`, `password`, `alamat`, `no_hp`) VALUES
(1, 'Alifhia Dhiya Herlia', 'alifhia@gmail.com', 'alifhia', '4b73bb11432717b251f523491b03b3ab', 'jakarta timur 13790', '082288164512'),
(10, 'Lidya', 'lidya@gmail.com', 'Lidya', '3fe3ac2faf5f026751897eef152d29dd', 'jakarta utara', '082288756431');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kat_produk`
--
ALTER TABLE `kat_produk`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pmlk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kat_produk`
--
ALTER TABLE `kat_produk`
  MODIFY `id_kp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pmlk` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
