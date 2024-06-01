-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2024 pada 15.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `username` varchar(10) NOT NULL,
  `angka` int(11) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`username`, `angka`, `password`, `hak_akses`) VALUES
('A', 1, '65d684247f8bd7adcb2b5617621040b0f07976a8', 'User'),
('Admin', 0, '258b39fb7a7c84d9285596ad789d93fe61ee6097', 'Admin'),
('B', 2, '65d684247f8bd7adcb2b5617621040b0f07976a8', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bell`
--

CREATE TABLE `tbl_bell` (
  `id_bel` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poin`
--

CREATE TABLE `tbl_poin` (
  `id_poin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_bell`
--
ALTER TABLE `tbl_bell`
  ADD PRIMARY KEY (`id_bel`),
  ADD KEY `fk_bell_akun` (`username`);

--
-- Indeks untuk tabel `tbl_poin`
--
ALTER TABLE `tbl_poin`
  ADD PRIMARY KEY (`id_poin`),
  ADD KEY `fk_poin_akun` (`username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_bell`
--
ALTER TABLE `tbl_bell`
  ADD CONSTRAINT `fk_bell_akun` FOREIGN KEY (`username`) REFERENCES `tbl_akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_poin`
--
ALTER TABLE `tbl_poin`
  ADD CONSTRAINT `fk_poin_akun` FOREIGN KEY (`username`) REFERENCES `tbl_akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
