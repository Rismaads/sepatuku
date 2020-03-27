-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jul 2019 pada 05.41
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosepatuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'flatshoes'),
(2, 'sneakers'),
(3, 'heels'),
(4, 'wedges');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_sepatu` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_transaksi`, `id_sepatu`, `jumlah`) VALUES
(2, 2, 2, 1),
(6, 6, 1, 1),
(8, 9, 1, 1),
(9, 10, 3, 2),
(15, 15, 1, 2),
(16, 16, 1, 1),
(17, 17, 1, 1),
(18, 18, 11, 1),
(19, 19, 1, 1),
(20, 20, 6, 1),
(21, 20, 4, 1),
(22, 21, 3, 1),
(23, 21, 4, 1),
(24, 22, 4, 1),
(25, 22, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` int(11) NOT NULL,
  `nama_sepatu` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `nama_sepatu`, `tahun`, `id_kategori`, `harga`, `foto`, `stok`) VALUES
(1, 'converse', 2017, 2, 200000, 'conver1.jpg', 4),
(3, 'adidas', 2018, 2, 1500000, 'adi1.jpg', 14),
(4, 'Skechers', 2020, 2, 899000, 'sk2.jpg', 2),
(5, 'H&M', 2016, 1, 500000, 'fl21.jpg', 9),
(6, 'Fila', 2018, 2, 2000000, 'fila2.jpg', 11),
(7, 'Diadora', 2015, 2, 700000, 'dora2.jpg', 6),
(8, 'Gucci', 2016, 4, 750000, 'wed1.jpg', 4),
(9, 'Chanel', 2018, 3, 900000, 'heels1.jpg', 12),
(10, 'Vans', 2021, 2, 1000000, 'adigung1.jpg', 3),
(11, 'nike', 2011, 2, 200000, 'air1.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `status` text NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama_pembeli`, `total`, `tanggal_beli`, `status`, `bukti`) VALUES
(2, 1, 'MANDA', 7000000, '2019-02-05', '', ''),
(6, 1, 'Annisa', 200000, '2019-02-06', '', ''),
(9, 2, 'siti', 200000, '2019-02-11', '', ''),
(10, 2, 'risma', 1500000, '2019-02-11', '', ''),
(15, 2, '', 400000, '2019-02-11', '', ''),
(16, 2, 'sekar', 200000, '2019-02-11', '', ''),
(17, 2, 'cheryl', 200000, '2019-02-11', '', ''),
(18, 2, 'manda', 200000, '2019-02-12', '', ''),
(19, 6, 'Annisa', 200000, '2019-02-24', '', ''),
(20, 2, 'nanak', 2899000, '2019-04-27', '', ''),
(21, 2, 'xxx', 2399000, '2019-04-27', '', ''),
(22, 2, 'Annisa', 1599000, '2019-04-27', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'rismanda', 'admin', 'admin', 'admin'),
(2, 'rismanda', 'admin1', 'admin1', 'kasir'),
(3, 'rismanda', 'rismanda', 'rismanda', 'admin'),
(4, 'risma', 'risma', '123456', 'kasir'),
(5, 'risma', 'rismaads', '12345678', 'kasir'),
(6, 'Rismaayu', 'risma', '12345678', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_sepatu` (`id_sepatu`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD CONSTRAINT `sepatu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
