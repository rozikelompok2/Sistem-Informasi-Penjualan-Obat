-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2021 pada 05.37
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbobat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jualsatuan` double NOT NULL,
  `stok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_pembelian`, `nama_barang`, `harga_beli`, `harga_jualsatuan`, `stok`) VALUES
('B001', 'L001', 'LASERIN 60ML', 15500, 11000, 50),
('B002', 'L002', 'STMUNO SYRUP GRAPE 60ML', 22000, 24000, 10),
('B003', 'L002', 'STIMUNO SYRUP ORANGE BERRY 60ML', 22000, 24000, 10),
('B004', 'L003', 'MINYAK OTOT GELIGA 30ML', 13200, 9300, 35),
('B005', 'L002', 'MINYAK ANGIN HIJAU NO 1 12ML', 17600, 18500, 20),
('B006', 'L001', 'INSTO MOIST 7,5ML', 15500, 8000, 45),
('B007', 'L003', 'HUFAGRIP PILEK 60ML', 11720, 13000, 10),
('B008', 'L001', 'PARAMEX 1 BOX', 14000, 12000, 40),
('B009', 'L004', 'HAND SANITIZER', 12000, 15000, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `no_bukti` char(10) DEFAULT NULL,
  `diskon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id_pembelian`, `id_supplier`, `nama_supplier`, `tgl_beli`, `no_bukti`, `diskon`) VALUES
('L001', 'S004', 'PT MULYA W', '2018-12-27', 'N086', 0),
('L002', 'S001', 'PT SALASA BAROKAH', '2019-02-02', 'N202', 0),
('L003', 'S003', 'PT SABDA BADRANAYA MULYA', '2019-02-07', '4826', 0),
('L004', 'S003', 'PT SABDA BADRANAYA MULYA', '2019-02-07', 'N117', 0),
('L005', 'S005', 'PT KEBAYORAN PHARMA', '2020-09-17', 'UI89', 0),
('L006', 'S001', 'PT SALASA BAROKAH', '2021-12-24', '3RE0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `keluhan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `no_telp`, `keluhan`) VALUES
('P001', 'ARMAN P', 'PATUK', '08995202698', 'DIABETES'),
('P002', 'TEGUH', 'BINTARAN', '082178348293', 'GATAL JAMUR'),
('P003', 'IKKE', 'POITAN', '085634781092', 'VERTIGO'),
('P004', 'YANTI', 'PATUK', '089953982293', 'ALERGI'),
('P005', 'LINA', 'TEGALYOSO', '082184773838', 'ALERGI'),
('P006', 'FARHAN', 'KUTON', '087836293810', 'ASAM URAT'),
('P007', 'ANGGIT', 'PATUK', '087856452343', 'ALERGI'),
('P008', 'SANTI', 'PIYUNGAN', '08952023434', 'MUAL'),
('P009', 'ROZI HERMAWAN', 'BATUBARA', '081245354368', 'MAG'),
('P010', 'Abdurazik', 'Pekanbaru', '082178872180', 'Hidung Tersumbat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat_pasien` varchar(100) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jml_obat` int(5) NOT NULL,
  `aturan_pakai` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id_resep`, `id_pasien`, `nama_pasien`, `alamat_pasien`, `keluhan`, `nama_obat`, `jml_obat`, `aturan_pakai`, `harga`) VALUES
('S001', 'P006', 'FARHAN', 'KUTON', 'ASAM URAT', 'ALLUPUMINOL', 1, '1X1', 3000),
('S002', 'P008', 'SANTI', 'PIYUNGAN', 'MUAL', 'DRAMAMIN', 30, '2X1', 75),
('S003', 'P007', 'ANGGIT', 'PATUK', 'ALERGI', 'CETERIZIN', 10, '1X1', 5),
('S004', 'P002', 'ARMAN P', 'PATUK', 'DIABETES', 'METFORMIN', 20, '3X1', 8),
('S005', 'P009', 'Muhammad ROZI HERMAWAN', 'BATUBARA', 'SAKIT KEPALA', 'PARAMEX', 1, '3X1', 1000),
('S006', 'P010', 'Abdurazik', 'Pekanbaru', 'Hidung Tersumbat', 'KOMIK OBH', 6, '3X1', 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telpon`) VALUES
('S001', 'PT SALASA BAROKAH', 'MADUMURTI, PATANGPULUHAN, WIROBRAJAN', '02744287727'),
('S002', 'APOTEK SARI ASIH', 'JL R.E MARTADINARA NO 44 SOLO', '0271644206'),
('S003', 'PT SABDA BADRANAYA MULYA', 'JL IMOGIRI TIMUR 121A GIWANGAN YK', '0274372382'),
('S004', 'PT MULYA W', 'YOGYAKATA', '02744287734'),
('S005', 'PT KEBAYORAN PHARMA', 'JL MELATI WETAN, BACIRO, GONDOKUSUMAN', '02198563929'),
('S006', 'PT CINTA SEJATI', 'JL IMAM BONJOL', '0821323142'),
('S007', 'PT CINTA HOAX', 'JL KEMARAU SENJA', '084214525135');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kd_transaksi` varchar(20) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `no_nota` char(20) NOT NULL,
  `harga` double NOT NULL,
  `jml_beli` int(3) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_pembelian` double NOT NULL,
  `jml_bayar` double NOT NULL,
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kd_transaksi`, `id_barang`, `id_pasien`, `no_nota`, `harga`, `jml_beli`, `tgl_penjualan`, `total_pembelian`, `jml_bayar`, `kembalian`) VALUES
(1, 'T001', 'B002', 'P002', '0001', 24000, 1, '2019-04-27', 24000, 30000, 6000),
(2, 'T002', 'B005', 'P001', '0002', 18500, 1, '2019-04-27', 18500, 20000, 1500),
(3, 'T003', 'B001', 'P001', '0003', 9000, 1, '2019-04-27', 27500, 30000, 2500),
(4, 'T003', 'B005', 'P001', '0003', 18500, 1, '2019-04-27', 27500, 30000, 2500),
(5, 'T004', 'B007', 'P005', '0004', 26000, 2, '2019-04-27', 26000, 30000, 4000),
(6, 'T005', 'B003', 'P003', '0005', 48000, 2, '2019-04-27', 48000, 50000, 2000),
(7, 'T006', 'B002', 'P007', '0006', 24000, 1, '2019-04-30', 24000, 100000, 76000),
(8, 'T007', 'B001', 'P007', '0007', 9000, 1, '2019-05-09', 9000, 20000, 11000),
(9, 'T008', 'B006', 'P009', '0008', 28000, 2, '2020-11-04', 28000, 30000, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(25) CHARACTER SET latin1 NOT NULL,
  `paswd` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'rozi@gmail.com', 'rozi7m', 1, 'administrasi'),
('karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan@gmail.com', 'karyawan', 2, 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`,`id_pasien`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `beli` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_4` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
