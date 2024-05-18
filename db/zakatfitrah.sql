-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2022 pada 14.04
-- Versi server: 10.4.21-MariaDB-log
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakatfitrah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id_zakat` int(11) NOT NULL,
  `nama_muzakki` varchar(255) DEFAULT NULL,
  `jumlah_tanggungan` int(255) DEFAULT NULL,
  `jenis_bayar` varchar(10) DEFAULT NULL,
  `jumlah_tanggunganyangdibayar` int(255) DEFAULT NULL,
  `bayar_beras` float(25,0) DEFAULT NULL,
  `bayar_uang` float(25,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bayarzakat`
--

INSERT INTO `bayarzakat` (`id_zakat`, `nama_muzakki`, `jumlah_tanggungan`, `jenis_bayar`, `jumlah_tanggunganyangdibayar`, `bayar_beras`, `bayar_uang`) VALUES
(12, 'Muhammad Hanif Insani', 6, 'Uang', 6, 0, 180000),
(13, 'Ace Hermawan', 5, 'Beras', 5, 12, 0),
(14, 'Muhammad Ghibran Al Khamaeni', 3, 'Uang', 3, 0, 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  `jumlah_hak` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`id_kategori`, `nama_kategori`, `jumlah_hak`) VALUES
(12, 'Miskin', 18),
(13, 'Fakir', 20),
(14, 'Mampu', 4),
(15, 'Ibnu Sabil', 7),
(16, 'Muallaf', 10),
(17, 'Fisabilillah', 5),
(18, 'Amil', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id_mustahiklainnya` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `hak` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`id_mustahiklainnya`, `nama`, `kategori`, `hak`) VALUES
(16, 'Alyce Robertson', 'Ibnu Sabil', 7),
(17, 'loki', 'Muallaf', 10),
(18, 'Emang Joko', 'Fisabilillah', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id_mustahikwarga` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `hak` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id_mustahikwarga`, `nama`, `kategori`, `hak`) VALUES
(10, 'Annisa Pebrianti Kusmayadi', 'Mampu', 4),
(11, 'Agung Alwi Akbar', 'Miskin', 18),
(13, 'Arqi Muhammad Fauzi', 'Mampu', 4),
(14, 'Raihan Nurul Alam', 'Miskin', 18),
(15, 'Amzad Zulfikar', 'Amil', 10),
(16, 'Muhamad Septian Jaelani', 'Fakir', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(11) NOT NULL,
  `nama_muzakki` varchar(100) DEFAULT NULL,
  `jumlah_tanggupan` int(10) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `jumlah_tanggupan`, `keterangan`) VALUES
(1, 'Ace Hermawan', 5, 'Warga Tetap'),
(2, 'Annisa Pebrianti Kusmayadi', 6, 'Warga Tidak Tetap'),
(3, 'Raihan Nurul Alam', 6, 'Warga Luar'),
(4, 'Agung Alwi Akbar', 3, 'Warga Luar'),
(5, 'Salsabila Nur Hudayani', 4, 'Warga Tetap'),
(6, 'Muhammad Hanif Insani', 6, 'Warga Luar'),
(7, 'Teddy Adhitya', 2, 'Warga Tidak Tetap'),
(8, 'Adrian Dandi Gunawan', 4, 'Warga Tidak Tetap'),
(9, 'Mega Trini Oktaviani', 3, 'Warga Luar'),
(10, 'Arqi Muhammad Fauzi', 4, 'Warga Tetap'),
(11, 'Dony Ramdani Akmal', 4, 'Warga Tidak Tetap'),
(12, 'Fahmi Rizky fauzi', 3, 'Warga Tidak Tetap'),
(13, 'Adam Firdaus Hermawan', 6, 'Warga Luar'),
(14, 'Amzad Zulfikar', 3, 'Warga Tetap'),
(15, 'Isam Maulana Maliki', 6, 'Warga Tidak Tetap'),
(16, 'Resti Amalia Ananda Putri', 3, 'Warga Tetap'),
(17, 'Nurul Fitriani', 3, 'Warga Luar'),
(18, 'Zeni Zaenil Waro', 6, 'Warga Tidak Tetap'),
(19, 'Yuke Nurul Fajriani', 4, 'Warga Tetap'),
(20, 'Fadhly Thoriq Aziz', 3, 'Warga Tidak Tetap'),
(21, 'Muhammad Alif Prasetyo', 2, 'Warga Tetap'),
(22, 'Dzikri Ahmad Maulid', 4, 'Warga Tetap'),
(23, 'Muammar Farhan Londjo', 5, 'Warga Luar'),
(24, 'Muhammad Fajri Budiansyah', 3, 'Warga Luar'),
(25, 'Fadhillah  Ali Mulyono Putra', 6, 'Warga Tetap'),
(26, 'Aris Aditya Nugroho', 3, 'Warga Luar'),
(27, 'Ricky Indra Gunawan', 4, 'Warga Luar'),
(28, 'Bifahmi Ahmad \'Athoillah', 4, 'Warga Tidak Tetap'),
(29, 'Siva Nurul Asvia', 3, 'Warga Tidak Tetap'),
(30, 'Muhammad Bisma Nugraha', 5, 'Warga Tidak Tetap'),
(31, 'Wisnu Arya Nugraha', 3, 'Warga Luar'),
(32, 'Muhamad Septian Jaelani', 5, 'Warga Tetap'),
(33, 'Maulana Ridwan Ibrahim', 3, 'Warga Luar'),
(34, 'Annisa Wahyuni Enun', 2, 'Warga Tidak Tetap'),
(35, 'Daffa Rahma Putra', 3, 'Warga Luar'),
(36, 'Yusuf Sulaeman', 4, 'Warga Luar'),
(37, 'Gristian', 2, 'Warga Luar'),
(38, 'Fajar Aldiansyah', 2, 'Warga Tetap'),
(39, 'Firman Maulana', 3, 'Warga Luar'),
(40, 'Faridah Hanifah', 3, 'Warga Tidak Tetap'),
(41, 'Muhammad Irsyad Shiddiq', 4, 'Warga Luar'),
(42, 'Refki Yuwandhika', 6, 'Warga Tetap'),
(43, 'Muhammad Risky Sukma Himawan', 5, 'Warga Tetap'),
(44, 'Gilang Fachrurrozi', 5, 'Warga Tidak Tetap'),
(45, 'Putri Salha Nadia', 4, 'Warga Tidak Tetap'),
(46, 'Ilham Wahyudi', 4, 'Warga Tidak Tetap'),
(47, 'Muhammad Agung Fahrizal', 6, 'Warga Tidak Tetap'),
(48, 'Hasan Muhamad Iqbal', 5, 'Warga Tidak Tetap'),
(49, 'Muhammad Ghibran Al Khamaeni', 3, 'Warga Tetap'),
(50, 'Azka Fauzi Al Parisi', 2, 'Warga Luar'),
(51, 'Aditya Seftian Dwi Pramudia', 2, 'Warga Luar'),
(52, 'Maulana Yusuf Abdhullah', 4, 'Warga Luar'),
(53, 'Muhammad Ardhi Syaiduffin', 2, 'Warga Tidak Tetap'),
(54, 'Rheza Muharamdani', 3, 'Warga Tidak Tetap'),
(55, 'Alma Ariz Maftuhillah', 5, 'Warga Tetap'),
(56, 'Defri Crisna Pramudi', 2, 'Warga Tidak Tetap'),
(57, 'Angga Nasrulloh', 6, 'Warga Luar'),
(58, 'Farhan Aziz Gusfian', 4, 'Warga Tidak Tetap'),
(59, 'Rifda Tri Faishal', 5, 'Warga Tetap'),
(60, 'Hilmi Sakina', 6, 'Warga Tetap'),
(61, 'Susi Risnawati', 6, 'Warga Tidak Tetap'),
(62, 'Nisa Sufiana', 4, 'Warga Tetap'),
(63, 'Edi Nurdiana', 6, 'Warga Tidak Tetap'),
(64, 'Alfa Adriel Monico', 5, 'Warga Tetap'),
(65, 'Tasya Nurul Annisa', 4, 'Warga Tetap'),
(66, 'Nurul Azmi Husaeni', 6, 'Warga Luar'),
(67, 'Zhehan Gusityandi', 3, 'Warga Luar'),
(68, 'Dina Meilisa Nuranbiya', 2, 'Warga Tetap'),
(69, 'Muhammad Zakaria', 4, 'Warga Luar'),
(70, 'Wildan Kautsar', 6, 'Warga Tetap'),
(71, 'Zindy Ziandiny', 3, 'Warga Luar'),
(72, 'Nadia Rachmasari Biduri', 2, 'Warga Luar'),
(73, 'Intan Zulayka Nursholiha', 3, 'Warga Tidak Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `muzakki_bayar`
--

CREATE TABLE `muzakki_bayar` (
  `id_muzakki_bayar` int(11) NOT NULL,
  `nama_muzakki` varchar(100) DEFAULT NULL,
  `jumlah_tanggupan` int(10) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muzakki_bayar`
--

INSERT INTO `muzakki_bayar` (`id_muzakki_bayar`, `nama_muzakki`, `jumlah_tanggupan`, `keterangan`) VALUES
(2, 'Annisa Pebrianti Kusmayadi', 6, 'Warga Tidak Tetap'),
(3, 'Raihan Nurul Alam', 6, 'Warga Luar'),
(4, 'Agung Alwi Akbar', 3, 'Warga Luar'),
(5, 'Salsabila Nur Hudayani', 4, 'Warga Tetap'),
(7, 'Teddy Adhitya', 2, 'Warga Tidak Tetap'),
(8, 'Adrian Dandi Gunawan', 4, 'Warga Tidak Tetap'),
(9, 'Mega Trini Oktaviani', 3, 'Warga Luar'),
(10, 'Arqi Muhammad Fauzi', 4, 'Warga Tetap'),
(11, 'Dony Ramdani Akmal', 4, 'Warga Tidak Tetap'),
(12, 'Fahmi Rizky fauzi', 3, 'Warga Tidak Tetap'),
(13, 'Adam Firdaus Hermawan', 6, 'Warga Luar'),
(14, 'Amzad Zulfikar', 3, 'Warga Tetap'),
(15, 'Isam Maulana Maliki', 6, 'Warga Tidak Tetap'),
(16, 'Resti Amalia Ananda Putri', 3, 'Warga Tetap'),
(17, 'Nurul Fitriani', 3, 'Warga Luar'),
(18, 'Zeni Zaenil Waro', 6, 'Warga Tidak Tetap'),
(19, 'Yuke Nurul Fajriani', 4, 'Warga Tetap'),
(20, 'Fadhly Thoriq Aziz', 3, 'Warga Tidak Tetap'),
(21, 'Muhammad Alif Prasetyo', 2, 'Warga Tetap'),
(22, 'Dzikri Ahmad Maulid', 4, 'Warga Tetap'),
(23, 'Muammar Farhan Londjo', 5, 'Warga Luar'),
(24, 'Muhammad Fajri Budiansyah', 3, 'Warga Luar'),
(25, 'Fadhillah  Ali Mulyono Putra', 6, 'Warga Tetap'),
(26, 'Aris Aditya Nugroho', 3, 'Warga Luar'),
(27, 'Ricky Indra Gunawan', 4, 'Warga Luar'),
(28, 'Bifahmi Ahmad \'Athoillah', 4, 'Warga Tidak Tetap'),
(29, 'Siva Nurul Asvia', 3, 'Warga Tidak Tetap'),
(30, 'Muhammad Bisma Nugraha', 5, 'Warga Tidak Tetap'),
(31, 'Wisnu Arya Nugraha', 3, 'Warga Luar'),
(32, 'Muhamad Septian Jaelani', 5, 'Warga Tetap'),
(33, 'Maulana Ridwan Ibrahim', 3, 'Warga Luar'),
(34, 'Annisa Wahyuni Enun', 2, 'Warga Tidak Tetap'),
(35, 'Daffa Rahma Putra', 3, 'Warga Luar'),
(36, 'Yusuf Sulaeman', 4, 'Warga Luar'),
(37, 'Gristian', 2, 'Warga Luar'),
(38, 'Fajar Aldiansyah', 2, 'Warga Tetap'),
(39, 'Firman Maulana', 3, 'Warga Luar'),
(40, 'Faridah Hanifah', 3, 'Warga Tidak Tetap'),
(41, 'Muhammad Irsyad Shiddiq', 4, 'Warga Luar'),
(42, 'Refki Yuwandhika', 6, 'Warga Tetap'),
(43, 'Muhammad Risky Sukma Himawan', 5, 'Warga Tetap'),
(44, 'Gilang Fachrurrozi', 5, 'Warga Tidak Tetap'),
(45, 'Putri Salha Nadia', 4, 'Warga Tidak Tetap'),
(46, 'Ilham Wahyudi', 4, 'Warga Tidak Tetap'),
(47, 'Muhammad Agung Fahrizal', 6, 'Warga Tidak Tetap'),
(48, 'Hasan Muhamad Iqbal', 5, 'Warga Tidak Tetap'),
(50, 'Azka Fauzi Al Parisi', 2, 'Warga Luar'),
(51, 'Aditya Seftian Dwi Pramudia', 2, 'Warga Luar'),
(52, 'Maulana Yusuf Abdhullah', 4, 'Warga Luar'),
(53, 'Muhammad Ardhi Syaiduffin', 2, 'Warga Tidak Tetap'),
(54, 'Rheza Muharamdani', 3, 'Warga Tidak Tetap'),
(55, 'Alma Ariz Maftuhillah', 5, 'Warga Tetap'),
(56, 'Defri Crisna Pramudi', 2, 'Warga Tidak Tetap'),
(57, 'Angga Nasrulloh', 6, 'Warga Luar'),
(58, 'Farhan Aziz Gusfian', 4, 'Warga Tidak Tetap'),
(59, 'Rifda Tri Faishal', 5, 'Warga Tetap'),
(60, 'Hilmi Sakina', 6, 'Warga Tetap'),
(61, 'Susi Risnawati', 6, 'Warga Tidak Tetap'),
(62, 'Nisa Sufiana', 4, 'Warga Tetap'),
(63, 'Edi Nurdiana', 6, 'Warga Tidak Tetap'),
(64, 'Alfa Adriel Monico', 5, 'Warga Tetap'),
(65, 'Tasya Nurul Annisa', 4, 'Warga Tetap'),
(66, 'Nurul Azmi Husaeni', 6, 'Warga Luar'),
(67, 'Zhehan Gusityandi', 3, 'Warga Luar'),
(68, 'Dina Meilisa Nuranbiya', 2, 'Warga Tetap'),
(69, 'Muhammad Zakaria', 4, 'Warga Luar'),
(70, 'Wildan Kautsar', 6, 'Warga Tetap'),
(71, 'Zindy Ziandiny', 3, 'Warga Luar'),
(72, 'Nadia Rachmasari Biduri', 2, 'Warga Luar'),
(73, 'Intan Zulayka Nursholiha', 3, 'Warga Tidak Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `muzakki_distribusi`
--

CREATE TABLE `muzakki_distribusi` (
  `id_muzakki_distribusi` int(11) NOT NULL,
  `nama_muzakki` varchar(100) DEFAULT NULL,
  `jumlah_tanggupan` int(10) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muzakki_distribusi`
--

INSERT INTO `muzakki_distribusi` (`id_muzakki_distribusi`, `nama_muzakki`, `jumlah_tanggupan`, `keterangan`) VALUES
(1, 'Ace Hermawan', 5, 'Warga Tetap'),
(6, 'Muhammad Hanif Insani', 6, 'Warga Luar'),
(7, 'Teddy Adhitya', 2, 'Warga Tidak Tetap'),
(8, 'Adrian Dandi Gunawan', 4, 'Warga Tidak Tetap'),
(9, 'Mega Trini Oktaviani', 3, 'Warga Luar'),
(11, 'Dony Ramdani Akmal', 4, 'Warga Tidak Tetap'),
(12, 'Fahmi Rizky fauzi', 3, 'Warga Tidak Tetap'),
(13, 'Adam Firdaus Hermawan', 6, 'Warga Luar'),
(15, 'Isam Maulana Maliki', 6, 'Warga Tidak Tetap'),
(16, 'Resti Amalia Ananda Putri', 3, 'Warga Tetap'),
(17, 'Nurul Fitriani', 3, 'Warga Luar'),
(18, 'Zeni Zaenil Waro', 6, 'Warga Tidak Tetap'),
(19, 'Yuke Nurul Fajriani', 4, 'Warga Tetap'),
(20, 'Fadhly Thoriq Aziz', 3, 'Warga Tidak Tetap'),
(21, 'Muhammad Alif Prasetyo', 2, 'Warga Tetap'),
(22, 'Dzikri Ahmad Maulid', 4, 'Warga Tetap'),
(23, 'Muammar Farhan Londjo', 5, 'Warga Luar'),
(24, 'Muhammad Fajri Budiansyah', 3, 'Warga Luar'),
(25, 'Fadhillah  Ali Mulyono Putra', 6, 'Warga Tetap'),
(26, 'Aris Aditya Nugroho', 3, 'Warga Luar'),
(27, 'Ricky Indra Gunawan', 4, 'Warga Luar'),
(28, 'Bifahmi Ahmad \'Athoillah', 4, 'Warga Tidak Tetap'),
(29, 'Siva Nurul Asvia', 3, 'Warga Tidak Tetap'),
(30, 'Muhammad Bisma Nugraha', 5, 'Warga Tidak Tetap'),
(31, 'Wisnu Arya Nugraha', 3, 'Warga Luar'),
(33, 'Maulana Ridwan Ibrahim', 3, 'Warga Luar'),
(34, 'Annisa Wahyuni Enun', 2, 'Warga Tidak Tetap'),
(35, 'Daffa Rahma Putra', 3, 'Warga Luar'),
(36, 'Yusuf Sulaeman', 4, 'Warga Luar'),
(37, 'Gristian', 2, 'Warga Luar'),
(38, 'Fajar Aldiansyah', 2, 'Warga Tetap'),
(39, 'Firman Maulana', 3, 'Warga Luar'),
(40, 'Faridah Hanifah', 3, 'Warga Tidak Tetap'),
(41, 'Muhammad Irsyad Shiddiq', 4, 'Warga Luar'),
(42, 'Refki Yuwandhika', 6, 'Warga Tetap'),
(43, 'Muhammad Risky Sukma Himawan', 5, 'Warga Tetap'),
(44, 'Gilang Fachrurrozi', 5, 'Warga Tidak Tetap'),
(45, 'Putri Salha Nadia', 4, 'Warga Tidak Tetap'),
(46, 'Ilham Wahyudi', 4, 'Warga Tidak Tetap'),
(47, 'Muhammad Agung Fahrizal', 6, 'Warga Tidak Tetap'),
(48, 'Hasan Muhamad Iqbal', 5, 'Warga Tidak Tetap'),
(49, 'Muhammad Ghibran Al Khamaeni', 3, 'Warga Tetap'),
(50, 'Azka Fauzi Al Parisi', 2, 'Warga Luar'),
(51, 'Aditya Seftian Dwi Pramudia', 2, 'Warga Luar'),
(52, 'Maulana Yusuf Abdhullah', 4, 'Warga Luar'),
(53, 'Muhammad Ardhi Syaiduffin', 2, 'Warga Tidak Tetap'),
(54, 'Rheza Muharamdani', 3, 'Warga Tidak Tetap'),
(55, 'Alma Ariz Maftuhillah', 5, 'Warga Tetap'),
(56, 'Defri Crisna Pramudi', 2, 'Warga Tidak Tetap'),
(57, 'Angga Nasrulloh', 6, 'Warga Luar'),
(58, 'Farhan Aziz Gusfian', 4, 'Warga Tidak Tetap'),
(59, 'Rifda Tri Faishal', 5, 'Warga Tetap'),
(60, 'Hilmi Sakina', 6, 'Warga Tetap'),
(61, 'Susi Risnawati', 6, 'Warga Tidak Tetap'),
(62, 'Nisa Sufiana', 4, 'Warga Tetap'),
(63, 'Edi Nurdiana', 6, 'Warga Tidak Tetap'),
(64, 'Alfa Adriel Monico', 5, 'Warga Tetap'),
(65, 'Tasya Nurul Annisa', 4, 'Warga Tetap'),
(66, 'Nurul Azmi Husaeni', 6, 'Warga Luar'),
(67, 'Zhehan Gusityandi', 3, 'Warga Luar'),
(68, 'Dina Meilisa Nuranbiya', 2, 'Warga Tetap'),
(69, 'Muhammad Zakaria', 4, 'Warga Luar'),
(70, 'Wildan Kautsar', 6, 'Warga Tetap'),
(71, 'Zindy Ziandiny', 3, 'Warga Luar'),
(72, 'Nadia Rachmasari Biduri', 2, 'Warga Luar'),
(73, 'Intan Zulayka Nursholiha', 3, 'Warga Tidak Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext DEFAULT NULL,
  `pwdUsers` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'Jael', 'Jael@gmail.com', '$2y$10$Wb/2LPa3yPDI.GztCiJK8OY8v2qFgHZySLEFcpBFdyuQYgL/753t6'),
(3, 'Asep', 'asep@gmai.com', '$2y$10$OXNAUeKK8OORdPYW91ihHehFSuYPWD3NC.6V0bFlQ/vTwzs5vAskq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indeks untuk tabel `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id_mustahiklainnya`);

--
-- Indeks untuk tabel `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id_mustahikwarga`);

--
-- Indeks untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indeks untuk tabel `muzakki_bayar`
--
ALTER TABLE `muzakki_bayar`
  ADD PRIMARY KEY (`id_muzakki_bayar`);

--
-- Indeks untuk tabel `muzakki_distribusi`
--
ALTER TABLE `muzakki_distribusi`
  ADD PRIMARY KEY (`id_muzakki_distribusi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id_zakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id_mustahiklainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id_mustahikwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `muzakki_bayar`
--
ALTER TABLE `muzakki_bayar`
  MODIFY `id_muzakki_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `muzakki_distribusi`
--
ALTER TABLE `muzakki_distribusi`
  MODIFY `id_muzakki_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
