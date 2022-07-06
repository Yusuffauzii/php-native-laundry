-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2022 pada 06.05
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(11) NOT NULL,
  `nm_paket` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nm_paket`, `harga`) VALUES
('PKT11001', 'Cuci', '5000'),
('PKT11002', 'Cuci & Setrika', '7000'),
('PKT11003', 'Cuci, Pewang & Strika', '9000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(11) NOT NULL,
  `nm_pel` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nm_pel`, `alamat`, `hp`) VALUES
('PEL12001', 'Riksania', 'Cicalengka Bandung', '0882798010'),
('PEL12002', 'Yusuf Ahmad Fauzi', 'Ciranjang Cianjur', '083817112491');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `harga` varchar(10) NOT NULL,
  `jml_kilo` varchar(10) NOT NULL,
  `total` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `id_paket`, `tgl_transaksi`, `harga`, `jml_kilo`, `total`) VALUES
('TRK13001', 'USR10001', 'PEL12001', 'PKT11003', '2022-01-13', '9000', '3', '27000'),
('TRK13002', 'USR10001', 'PEL12002', 'PKT11001', '2022-01-13', '5000', '3', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `password`, `level`) VALUES
('USR10001', 'Yusuffauzi', '270700', 'Manager'),
('USR10002', 'Siti Aminah', '12345', 'Kasir');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
