-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2016 pada 08.04
-- Versi Server: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `sumber` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `halaman` varchar(20) NOT NULL,
  `reporter` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `upload` text NOT NULL,
  `label` varchar(100) NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `sumber`, `tanggal`, `halaman`, `reporter`, `foto`, `upload`, `label`, `resume`) VALUES
(1, 'berita', '1', '2016-07-22', '54', 'ade', '1_905167001l.jpg', 'kartu-peserta.pdf', 'negatif', 'kitu we lah'),
(2, 'Demam Pokemon di Bandung', '2', '2016-07-25', '10', 'Danis Yogaswara', '', 'avatar.jpg', 'pokemon', 'Hari ini banyak sekali manusia yang berburu pokemon sungguh luar binasa :v'),
(3, 'Wabah Penyakin Pokemon Go', '1', '2016-07-25', '20', 'Dikdik Alfiana Rosyada', 'a.jpg', 'manual_book.pdf', 'positif', 'Pokemon go menyerang kalangan anak anak di usia dini sehingga dapat mengakibatkan penyakit yang bisa membuat anak kecanduan'),
(4, 'Berita Heboh', '3', '2016-07-25', '20', 'Dikdik', '', '', 'bebas', 'wesweyy'),
(5, 'berita lampu merah', '4', '2016-07-25', '12', '23', '', '', '23', '232'),
(6, 'XXX', '1', '2016-07-25', '12', 'asas', '11376100_838275302886865_1490006877_n.jpg', 'Kartu_Tes_(16319300010).pdf', 'positif', 'asasasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_pim` varchar(100) NOT NULL,
  `nip_pim` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `nama`, `alamat`, `nama_pim`, `nip_pim`, `logo`) VALUES
(1, 'HUMAS PEMDA KARAWANG', 'Jl. Ahmad Yani No. 1, Karawang Barat, Karawang, Jawa Barat', 'Dikdik Alfiana Rosyada', '19680317 198910 1 001', 'kab_krwg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE IF NOT EXISTS `sumber` (
  `id_sumber` int(11) NOT NULL,
  `sumber` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `sumber`, `ket`) VALUES
(1, 'Koran Sindo', 'Koran Sindo'),
(2, 'Tribun Jabar', 'Tribun Jabar'),
(3, 'Pikiran Rakyat', 'Pikiran Rakyat'),
(4, 'Lampu Merah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `namalengkap` varchar(30) NOT NULL,
  `level` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `password`, `namalengkap`, `level`, `foto`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'Dikdik Alfiana', 'Super Admin', ''),
('user', 'd41d8cd98f00b204e9800998ecf8427e', 'Danis Yogaswara', 'Super Admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
