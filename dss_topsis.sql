-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2019 pada 19.10
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_topsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fuzzy`
--

CREATE TABLE `data_fuzzy` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga_tanah` float UNSIGNED NOT NULL,
  `jarak_gudang` float UNSIGNED NOT NULL,
  `persaingan` float UNSIGNED NOT NULL,
  `investasi` float UNSIGNED NOT NULL,
  `jumlah_peternak` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_fuzzy`
--

INSERT INTO `data_fuzzy` (`id`, `lokasi`, `harga_tanah`, `jarak_gudang`, `persaingan`, `investasi`, `jumlah_peternak`) VALUES
(1, 'Semampir', 0.6, 0.8, 0.2, 0.75, 0.6),
(2, 'Wlingi', 0.4, 0.8, 0.8, 0.75, 0.8),
(3, 'Karangrejo', 0.6, 0.8, 1, 0.5, 0.2),
(5, 'Ngunut', 0.8, 0.4, 0.8, 0.5, 0.4),
(6, 'Grogol', 0.2, 0.8, 0.4, 0.75, 0.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_survey`
--

CREATE TABLE `data_survey` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga_tanah` double UNSIGNED NOT NULL,
  `jarak_gudang` int(11) NOT NULL,
  `persaingan` enum('0.2','0.4','0.6','0.8','1') NOT NULL,
  `investasi` int(3) NOT NULL,
  `jumlah_peternak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_survey`
--

INSERT INTO `data_survey` (`id`, `lokasi`, `harga_tanah`, `jarak_gudang`, `persaingan`, `investasi`, `jumlah_peternak`) VALUES
(1, 'Semampir', 3750000, 1400, '0.2', 60, 25),
(2, 'Wlingi', 2750000, 2500, '0.8', 73, 33),
(3, 'Karangrejo', 3015000, 4300, '1', 39, 8),
(5, 'Ngunut', 4732000, 370, '0.8', 46, 14),
(6, 'Grogol', 1845000, 2900, '0.4', 69, 27);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_fuzzy`
--
ALTER TABLE `data_fuzzy`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_survey`
--
ALTER TABLE `data_survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_fuzzy`
--
ALTER TABLE `data_fuzzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_survey`
--
ALTER TABLE `data_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
