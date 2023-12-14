-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2023 pada 14.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manajemen_proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(50) DEFAULT NULL,
  `satuan_item` varchar(11) DEFAULT NULL,
  `harga_item` int(11) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `satuan_item`, `harga_item`, `supplier`) VALUES
(1, 'Semen', 'Sack', 70000, 'PT Semen Gresik'),
(3, 'Batu Bara', 'Pickup', 900000, 'PT BATAM BAHAGIA'),
(4, 'Kerikil', 'Pickup', 5000000, 'PT Bumindo Sakti'),
(6, 'Batu Bata Merah', 'pickup', 900000, 'PT Bataku Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerja`
--

CREATE TABLE `pekerja` (
  `id_pekerja` int(11) NOT NULL,
  `nama_pekerja` varchar(100) DEFAULT NULL,
  `gaji` varchar(50) DEFAULT NULL,
  `tanggal_masuk` varchar(100) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerja`
--

INSERT INTO `pekerja` (`id_pekerja`, `nama_pekerja`, `gaji`, `tanggal_masuk`, `id_proyek`) VALUES
(1, 'Ahmad Mahdi K', '5000000', '0222-01-12', 1),
(11, 'Firda Arinda Eka Putri', '900021', '2022-11-11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `tanggal_pengeluaran` varchar(50) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `deskripsi`, `jumlah`, `tanggal_pengeluaran`, `id_proyek`, `id_item`) VALUES
(1, 'Penggadaan Semen', '70', '2023-12-02', 1, 3),
(7, 'Pengadaan Bata Merah', '800', '2023-12-08', NULL, NULL),
(9, 'Penggadaan Kerikil', '800', '2022-01-09', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(100) DEFAULT NULL,
  `lokasi_proyek` varchar(100) DEFAULT NULL,
  `tgl_mulai` varchar(50) DEFAULT NULL,
  `tgl_selesai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `lokasi_proyek`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, 'Pembangunan Aspal', 'Prancis', '2022-11-14', '2025-12-2'),
(19, 'Pembangunan Panti Asuhan', 'Probolinggo-Malang', '2022-11-11', '2023-12-12'),
(22, 'Pembangunan Sekolah SDN 2 Malang', 'Malang Kota Raya', '2023-12-05', '2023-12-27');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_pekerja`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_pekerja` (
`id_pekerja` int(11)
,`nama_pekerja` varchar(100)
,`gaji` varchar(50)
,`tanggal_masuk` varchar(100)
,`nama_proyek` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_pengeluaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_pengeluaran` (
`id_pengeluaran` int(11)
,`deskripsi` varchar(50)
,`jumlah` varchar(50)
,`harga_item` int(11)
,`nama_item` varchar(50)
,`total` double
,`tanggal_pengeluaran` varchar(50)
,`nama_proyek` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_pekerja`
--
DROP TABLE IF EXISTS `vw_pekerja`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pekerja`  AS SELECT `pekerja`.`id_pekerja` AS `id_pekerja`, `pekerja`.`nama_pekerja` AS `nama_pekerja`, `pekerja`.`gaji` AS `gaji`, `pekerja`.`tanggal_masuk` AS `tanggal_masuk`, `proyek`.`nama_proyek` AS `nama_proyek` FROM (`pekerja` join `proyek`) WHERE `proyek`.`id_proyek` = `pekerja`.`id_proyek``id_proyek`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_pengeluaran`
--
DROP TABLE IF EXISTS `vw_pengeluaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pengeluaran`  AS SELECT `pengeluaran`.`id_pengeluaran` AS `id_pengeluaran`, `pengeluaran`.`deskripsi` AS `deskripsi`, `pengeluaran`.`jumlah` AS `jumlah`, `item`.`harga_item` AS `harga_item`, `item`.`nama_item` AS `nama_item`, `item`.`harga_item`* `pengeluaran`.`jumlah` AS `total`, `pengeluaran`.`tanggal_pengeluaran` AS `tanggal_pengeluaran`, `proyek`.`nama_proyek` AS `nama_proyek` FROM ((`pengeluaran` join `proyek`) join `item`) WHERE `pengeluaran`.`id_proyek` = `proyek`.`id_proyek` AND `pengeluaran`.`id_item` = `item`.`id_item``id_item`  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id_pekerja`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `FK_pengeluaran_proyek` (`id_proyek`),
  ADD KEY `FK_pengeluaran_item` (`id_item`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id_pekerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD CONSTRAINT `FK_pekerja_proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `FK_pengeluaran_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `FK_pengeluaran_proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
