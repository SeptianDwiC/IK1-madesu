-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 03:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `misi` text NOT NULL,
  `visi` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `judul`, `deskripsi`, `misi`, `visi`, `gambar`) VALUES
(1, 'About Us', 'E-POTEK adalah suatu website yang menyediakan layanan berupa penjualan obat yang dapat dilakukan secara Online dan bisa diakses kapan saja & dimana saja.', 'Kami ingin melakukan sebuah inovasi yang belum ada di masa sebelumnya dengan mengikuti perkembangan zaman.', 'Tujuan kami membuat aplikasi ini adalah untuk memudahkan pengguna untuk dapat melakukan transaksi penjualan obat secara efektif & efisien.', 'about.svg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `alamat`, `email`, `username`, `pass`, `telepon`) VALUES
(1, 'Septian', 'JL. Slamet Riadi', 'ratascommunity87@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08278927722');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `email`, `username`, `pass`, `telepon`) VALUES
(8, 'Septian Dwi Cahya', 'JL. Candi II', 'tiancahya755@gmail.com', 'septian', '5b3bb3e5458e02aa356f2fc671ae08d9', '082112162128'),
(11, 'achmad fausi', 'JL. Parteker', 'lelioktika@gmail.com', 'achmad', 'e590ad4b83ac97f84569825e8f00c730', '082112162128');

-- --------------------------------------------------------

--
-- Table structure for table `detail_trans`
--

CREATE TABLE `detail_trans` (
  `id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_trans`
--

INSERT INTO `detail_trans` (`id`, `nota`, `produk_id`, `qty`, `subtotal`) VALUES
(10, 8, 30, 1, 2000),
(11, 9, 32, 1, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `subjudul` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `judul`, `subjudul`, `keterangan`, `gambar`) VALUES
(1, 'Selamat Datang,', 'Semoga Senantiasa Diberi Kesehatan Dan Keselamatan', 'E-POTEK adalah suatu aplikasi berbasis web yang menyediakan transaksi penjualan obat secara Online dan dapat digunakan kapan saja.', 'Icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Obat Batuk'),
(2, 'Obat Demam'),
(3, 'Obat Flu'),
(4, 'Obat Sakit Kepala'),
(5, 'Obat Maag'),
(6, 'Obat Mulut'),
(7, 'Obat Nyeri');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `barang_id`) VALUES
(1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `judul`, `icon`) VALUES
(1, 'Icon Login Page', 'Group Login Icon.png'),
(6, 'Icon Card User', 'user-icon.svg'),
(7, 'Icon Username', 'username.svg'),
(8, 'Icon Password', '61dc4152bef2c.svg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_min` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `jenis`, `deskripsi`, `kategori`, `harga`, `stok_awal`, `stok_min`, `stok_akhir`, `gambar`) VALUES
(13, 'PANADOL', 'Pil', 'Meredakan sakit kepala', 4, 1000, 30, 5, 30, 'Panadol.png'),
(14, 'MYLANTA', 'Cair', 'Meredakan Gejala Maag', 5, 6000, 23, 5, 23, 'Mylanta.png'),
(16, 'PROCOLD', 'Pil', 'Meredakan gejala flu', 3, 8000, 23, 5, 23, 'Procold.png'),
(27, 'PRORIS', 'Cair', 'Meredakan Demam', 2, 2000, 23, 5, 23, '61c5988a3c7b1.png'),
(28, 'BODREX', 'Pil', 'Meredakan Sakit Kepala', 4, 4000, 27, 5, 27, '61c6a0eff1046.png'),
(30, 'LISTERINE', 'Cair', 'Membersihkan Karang Gigi', 6, 2000, 23, 5, 22, '61ca73be55e44.png'),
(32, 'ASAM MEFENAMAT', 'Pil', 'Membantu meredakan gejala nyeri yang mengganggu', 7, 25000, 25, 5, 23, '61efe7d867cd3.png'),
(34, 'Tera-F', 'Cair', 'Membantu meredakan gejala Flu', 3, 25000, 25, 5, 24, '61f00f4bc66a7.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `judul`, `gambar`) VALUES
(1, 'Menyediakan Segala Jenis Obat', 'Medicine.svg'),
(2, 'Aman & Terpercaya', 'Safety.svg'),
(3, 'Mudah Di Akses', 'Acces.svg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `nota` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`nota`, `customer_id`, `tgl_trans`, `total_harga`) VALUES
(8, 11, '2022-01-28', 2000),
(9, 8, '2022-01-30', 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_trans`
--
ALTER TABLE `detail_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota` (`nota`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nota`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_trans`
--
ALTER TABLE `detail_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_trans`
--
ALTER TABLE `detail_trans`
  ADD CONSTRAINT `detail_trans_ibfk_2` FOREIGN KEY (`nota`) REFERENCES `transaksi` (`nota`),
  ADD CONSTRAINT `detail_trans_ibfk_3` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
