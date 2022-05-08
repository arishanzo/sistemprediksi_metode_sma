-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2022 pada 12.14
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbprediksibaby`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(2, 'Ilmiyah1', 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` char(100) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id_data`, `id_admin`, `id_kategori`, `nama_kategori`, `bulan`, `tahun`, `jumlah`) VALUES
(10, 2, 1, 'Stroler', 'Juli', 2021, 65),
(11, 2, 1, 'Stroler', 'Agustus', 2021, 67),
(12, 2, 1, 'Stroler', 'September', 2021, 78),
(13, 2, 1, 'Stroler', 'Oktober', 2021, 81),
(14, 2, 1, 'Stroler', 'November', 2021, 75),
(15, 2, 1, 'Stroler', 'Desember', 2021, 83),
(16, 2, 1, 'Stroler', 'Januari', 2022, 91),
(17, 2, 2, 'Perlengkapan Makan', 'Juli', 2021, 72),
(18, 2, 2, 'Perlengkapan Makan', 'Agustus', 2021, 63),
(19, 2, 2, 'Perlengkapan Makan', 'September', 2021, 69),
(20, 2, 2, 'Perlengkapan Makan', 'Oktober', 2021, 79),
(21, 2, 2, 'Perlengkapan Makan', 'November', 2021, 81),
(22, 2, 2, 'Perlengkapan Makan', 'Desember', 2021, 71),
(23, 2, 2, 'Perlengkapan Makan', 'Januari', 2022, 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Stroler'),
(2, 'Perlengkapan Makan'),
(3, 'Pempers'),
(4, 'Baju Anak (LK)'),
(5, 'Baju Anak (pr)'),
(6, 'Perlengkapan Mandi'),
(7, 'Bedak'),
(8, 'Mainan Bayi'),
(9, 'Gendong Bayi'),
(10, 'Baju Bayi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hasil_peramalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id_peramalan`, `id_admin`, `nama_kategori`, `bulan`, `tahun`, `jumlah`, `hasil_peramalan`) VALUES
(228, 2, 'Stroler', 'Oktober', '2021', 81, 70),
(229, 2, 'Stroler', 'November', '2021', 75, 75),
(230, 2, 'Stroler', 'Desember', '2021', 83, 78),
(231, 2, 'Stroler', 'Januari', '2022', 91, 80),
(232, 2, 'Stroler', 'Februari', '2022', 0, 83),
(233, 2, 'Perlengkapan Makan', 'Oktober', '2021', 79, 68),
(234, 2, 'Perlengkapan Makan', 'November', '2021', 81, 70),
(235, 2, 'Perlengkapan Makan', 'Desember', '2021', 71, 76),
(236, 2, 'Perlengkapan Makan', 'Januari', '2022', 85, 77),
(237, 2, 'Perlengkapan Makan', 'Februari', '2022', 0, 79);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `id_peramalan` int(11) NOT NULL,
  `rekomendet` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `id_peramalan`, `rekomendet`) VALUES
(40, 232, 'Kurangi Stok Barang'),
(41, 237, 'Kurangi Stok Barang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id_peramalan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`),
  ADD KEY `id_peramalan` (`id_peramalan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `data_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `peramalan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD CONSTRAINT `rekomendasi_ibfk_1` FOREIGN KEY (`id_peramalan`) REFERENCES `peramalan` (`id_peramalan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
