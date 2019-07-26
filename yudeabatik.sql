-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2019 pada 15.48
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yudeabatik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'JAKARTA (REG 2-3 Hari)', 9000),
(2, 'JAKARTA (YES 1 HARI)', 18000),
(3, 'DENPANSAR (REG 2-3 HARI)', 28000),
(4, 'DENPANSAR (YES 1 HARI)', 50000),
(5, 'BANDUNG (REG 2-3 HARI)', 11000),
(6, 'BANDUNG (YES 1 HARI)', 24000),
(7, 'MEDAN (REG 2-3 HARI)', 37000),
(8, 'MEDAN (YES 1 HARI)', 53000),
(9, 'MAKASAR (REG 2-3 HARI)', 43000),
(10, 'MAKASAR (YES 1 HARI)', 75000),
(11, 'PALEMBANG (REG 2-3 HARI)', 22000),
(12, 'PALEMBANG (YES 1 HARI)', 46000),
(13, 'PADANG (REG 2-3 HARI)', 35000),
(14, 'PADANG (YES 1 HARI)', 49000),
(15, 'PEKANBARU (REG 2-3 HARI)', 35000),
(16, 'PEKANBARU (YES 1 HARI)', 49000),
(17, 'SEMARANG (REG 2-3 HARI)', 18000),
(18, 'SEMARANG (YES 1 HARI)', 35000),
(19, 'SURABAYA (REG 2-3 HARI)', 19000),
(20, 'SURABAYA (YES 1 HARI)', 37000),
(21, 'YOGYAKARTA (REG 2-3 HARI)', 18000),
(22, 'YOGYAKARTA (YES 1 HARI)', 35000),
(23, 'BEKASI (REG 2-3 HARI)', 9000),
(24, 'BEKASI (YES 1 HARI)', 18000),
(25, 'DEPOK (REG 2-3 HARI)', 9000),
(26, 'DEPOK (YES 1 HARI)', 18000),
(27, 'TANGERANG (REG 2-3 HARI)', 9000),
(28, 'TANGERANG (YES 1 HARI)', 18000),
(29, 'BOGOR (REG 2-3 HARI)', 9000),
(30, 'BOGOR (YES 1 HARI)', 18000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'user@user.com', 'user', 'User', '080808080808', 'Jl. User 1 No 1 Rt1 Rw 1 Pondok Gede, Bekasi'),
(2, 'user2@user2.com', 'user2', 'User 2', '0000000000', 'Jl. User2'),
(3, 'user3@user3.com', 'user3', 'User3', '090909090910', 'Jalan User3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(4, 7, 'User', 'BCA', 737000, '2019-04-05', '201904051345592.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Pending',
  `catatan_pembelian` text NOT NULL,
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `catatan_pembelian`, `resi_pengiriman`) VALUES
(1, 2, 1, '2019-04-03', 125000, 'Jakarta', 10000, 'Jl. User 2', 'Pending', '', ''),
(2, 1, 1, '2019-04-04', 150000, 'Jakarta', 10000, 'Jl. User 1', 'Sudah Dibayar', '', ''),
(7, 1, 7, '2019-04-05', 737000, 'MEDAN (REG 2-3 HARI)', 37000, 'Jl. User 1 No 1 Rt1 Rw 1 Pondok Gede, Bekasi', 'Lunas', '', 'JNE234545912'),
(8, 1, 22, '2019-04-05', 160000, 'YOGYAKARTA (YES 1 HARI)', 35000, 'Jl. User 1 No 1 Rt1 Rw 1 Pondok Gede, Bekasi', 'Pending', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(4, 7, 5, 4, 'SB3 - 1 Set Batik Baju - Celana Motif Bunga Warna Ungu', 175000, 700000),
(5, 8, 6, 1, 'SB4 - Celana Batik Kulot<br><br>', 125000, 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stock_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stock_produk`) VALUES
(3, 'SB1 - 1 Set Batik Baju - Celana Motif Bunga Warna Biru', 175000, '1SetBatikBaju-CelanaWanitaMotifBungaWarnaBiru(New).jpg', 'Satu set batik baju dan celana dengan motif bunga warna biru <br>\r\nUkuran Allsize', 15),
(4, 'SB2 - 1 Set Batik Baju - Celana Motif Bunga Warna Pink', 175000, '1SetBatikBaju-CelanaWanitaMotifBungaWarnaPink(New).jpg', 'Satu set batik baju dan celana dengan motif bunga warna pink<br>\r\nUkuran Allsize', 15),
(5, 'SB3 - 1 Set Batik Baju - Celana Motif Bunga Warna Ungu', 175000, '1SetBatikBaju-CelanaWanitaMotifBungaWarnaUngu(New).jpg', 'Satu set batik baju dan celana dengan motif bunga warna ungu<br>\r\nUkuran Allsize', 11),
(6, 'SB4 - Celana Batik Kulot<br><br>', 125000, 'CelanaKulotBatik1(New).jpg', 'Celana Batik Kulot <br>\r\nUkuran Allsize', 14),
(7, 'SB5 - Celana Batik Kulot<br><br>', 125000, 'CelanaKulotBatik2(New).jpg', 'Celana Batik Kulot <br>\r\nUkuran Allsize', 15),
(8, 'SB6 - Celana Batik Kulot<br><br>', 125000, 'CelanaKulotBatik(New).jpg', 'Celana Batik Kulot <br>\r\nUkuran Allsize', 12),
(9, 'SB7 - Daster Batik Model Kelelawar Warna Coklat', 190000, 'DasterKelelawarWarnaCoklat(New).jpg', 'Daster Batik Kelelawar Wanita Warna Coklat <br>\r\nUkuran Allsize', 15),
(10, 'SB8 - Daster Batik Model Kelelawar Warna Coklat', 190000, 'DasterKelelawarWarnaBiruUngu(New).jpg', 'Daster Batik Kelelawar Wanita Warna Biru Ungu<br>\r\nUkuran Allsize', 13),
(11, 'SB9 - Daster Batik Panjang Warna Kuning', 150000, 'DasterPanjangWanitaWarnaKuning(New).jpg', 'Daster Panjang Warna Kuning <br>\r\nUkuran Allsize', 15),
(12, 'SB10 - Daster Batik Panjang Warna Orange', 150000, 'DasterPanjangWanitaWarnaOrange.jpg', 'Daster Panjang Warna Orange <br>\r\nUkuran Allsize', 15),
(13, 'SB11 - Daster Batik Pendek Warna Kuning', 125000, 'DasterPendekCewekWarnaKuning(New).jpg', 'Daster Batik Pendek Warna Kuning <br>\r\nUkuran Allsize', 13),
(14, 'SB12 - Daster Batik Pendek Warna Orange', 125000, 'DasterPendekCewekWarnaOrange(New).jpg', 'Daster Batik Pendek Warna Orange <br>\r\nUkuran Allsize', 15),
(15, 'SB13 - Kemeja Batik Pria Corak Biru <br><br>', 145000, 'KemejaBatikPria1(New).jpg', 'Kemeja Batik Pria Corak Biru <br>\r\nUkuran tersedia M, L, XL', 15),
(16, 'SB14 - Kemeja Batik Pria Corak Pink <br><br>', 145000, 'KemejaBatikPria2(New).jpg', 'Kemeja Batik Pria Corak Pink<br>\r\nUkuran tersedia M, L, XL', 15),
(17, 'SB15 - Kemeja Batik Pria Corak Kuning-Hijau', 145000, 'KemejaBatikPria3(New).jpg', 'Kemeja Batik Pria Corak Kuning-Hijau<br>\r\nUkuran tersedia M, L, XL', 15),
(18, 'SB16 - Kemeja Batik Pria <br><br>', 145000, 'KemejaBatikPria4(New).jpg', 'Kemeja Batik Pria<br>\r\nUkuran tersedia M, L, XL', 15),
(19, 'SB17 - Kemeja Batik Pria <br><br>', 145000, 'KemejaBatikPria5(New).jpg', 'Kemeja Batik Pria <br>\r\nUkuran tersedia M, L, XL', 15),
(20, 'SB18 - Kemeja Batik Pria <br><br>', 145000, 'KemejaBatikPria6(New).jpg', 'Kemeja Batik Pria <br>\r\nUkuran tersedia M, L, XL', 15),
(21, 'SB19 - Kemeja Batik Wanita Panjang Slimfit', 165000, 'KemejaBatikWanitaPanjang1(New).jpg', 'Kemeja Batik Wanita Panjang Slimfit<br>\r\nUkuran tersedia M, L, XL', 15),
(22, 'SB20 - Kemeja Batik Wanita Panjang Slimfit', 165000, 'KemejaBatikWanitaPanjang2(New).jpg', 'Kemeja Batik Wanita Panjang Slimfit <br>\r\nUkuran tersedia M, L, XL', 15),
(23, 'SB21 - Kemeja Batik Wanita Panjang', 170000, 'KemejaBatikWanitaPanjang3(New).jpg', 'Kemeja Batik Wanita Panjang <br>\r\nUkuran tersedia M, L, XL', 15),
(24, 'SB21 - Kemeja Batik Wanita Panjang', 170000, 'KemejaBatikWanitaPanjang4(New).jpg', 'Kemeja Batik Wanita Panjang <br>\r\nUkuran tersedia M, L, XL', 15);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
