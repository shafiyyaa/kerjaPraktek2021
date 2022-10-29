-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2021 pada 08.37
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadaancherry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `hargajual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `merk`, `stok`, `hargajual`) VALUES
(1, 'Creamy Tint Shade 01 Bricktown ', 'Emina', 4, 42000),
(2, 'Creamy Tint Shade 02 Peach Crush', 'Emina', 4, 42000),
(5, 'Creamy Tint Shade 05 Cherry Soda', 'Emina', 4, 42000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idkeluar` int(11) NOT NULL,
  `kodekeluar` varchar(20) NOT NULL,
  `kodepermintaan` varchar(20) NOT NULL,
  `tanggalkeluar` date NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`idkeluar`, `kodekeluar`, `kodepermintaan`, `tanggalkeluar`, `namabarang`, `jumlah`) VALUES
(1, 'BK1423', 'PB3103', '2021-06-01', 'Creamy Tint Shade 02 Peach Crush', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idmasuk` int(11) NOT NULL,
  `kodemasuk` varchar(20) NOT NULL,
  `tglmasuk` date NOT NULL,
  `namasupplier` varchar(50) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`idmasuk`, `kodemasuk`, `tglmasuk`, `namasupplier`, `namabarang`, `jumlah`) VALUES
(2, 'bm060402', '2021-04-23', 'Mncbeauty', 'Creamy Tint Shade 01 Bricktown ', 3),
(3, 'bm0604', '2021-04-24', 'Kotty Kosmetik', 'Creamy Tint Shade 02 Peach Crush', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('cherrybeauty@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(50) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `notelp`) VALUES
(1, '   Fachran', '   081234569814'),
(2, 'Rara ', '08123456908');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesananbarang`
--

CREATE TABLE `pemesananbarang` (
  `idpemesanan` int(11) NOT NULL,
  `tanggalpemesanan` date NOT NULL,
  `kodepemesanan` varchar(20) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `namasupplier` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesananbarang`
--

INSERT INTO `pemesananbarang` (`idpemesanan`, `tanggalpemesanan`, `kodepemesanan`, `namabarang`, `namasupplier`, `jumlah`) VALUES
(3, '2021-04-21', 'PB06042', 'Creamy Tint Shade 02 Peach Crush', 'Mncbeauty', 1),
(4, '2021-06-01', 'PB0106', 'Creamy Tint Shade 02 Peach Crush', 'Kotty Kosmetik', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaanbarang`
--

CREATE TABLE `permintaanbarang` (
  `idpermintaan` int(11) NOT NULL,
  `kodepermintaan` varchar(20) NOT NULL,
  `tglpermintaan` date NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `namapelanggan` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaanbarang`
--

INSERT INTO `permintaanbarang` (`idpermintaan`, `kodepermintaan`, `tglpermintaan`, `namabarang`, `namapelanggan`, `jumlah`) VALUES
(4, 'PB2703', '2021-06-01', '', '   Fachran', 2),
(5, 'PB0106', '2021-06-01', 'Creamy Tint Shade 05 Cherry Soda', 'Rara ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `namasupplier` varchar(50) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `namasupplier`, `notelp`, `alamat`) VALUES
(2, 'Mncbeauty', '0852437865', 'Medan'),
(3, 'Kotty Kosmetik', '085245367545', 'Banda Aceh'),
(4, 'SafiIndonesia', '0852436723', 'Jakarta/Medan'),
(5, 'Ceria Kosmetik', '0852436545', 'Medan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `pemesananbarang`
--
ALTER TABLE `pemesananbarang`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- Indeks untuk tabel `permintaanbarang`
--
ALTER TABLE `permintaanbarang`
  ADD PRIMARY KEY (`idpermintaan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemesananbarang`
--
ALTER TABLE `pemesananbarang`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permintaanbarang`
--
ALTER TABLE `permintaanbarang`
  MODIFY `idpermintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
