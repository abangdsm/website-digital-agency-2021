-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2022 pada 02.41
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myporto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `confirmbayar`
--

CREATE TABLE `confirmbayar` (
  `id` int(11) NOT NULL,
  `tgl_order` varchar(50) NOT NULL,
  `tgl_bayar` varchar(50) NOT NULL,
  `nama_jasa` varchar(50) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `rekening` varchar(125) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_jasa` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `confirmbayar`
--

INSERT INTO `confirmbayar` (`id`, `tgl_order`, `tgl_bayar`, `nama_jasa`, `bukti_transfer`, `rekening`, `nama_user`, `id_jasa`) VALUES
(1, '2022/04/10 21:00', '2022/04/10 22:39', 'Custom Website', '6252fa5e3de9e.jpg', 'Dwi Star Muda', 'Dwi Star Muda', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sts_order`
--

CREATE TABLE `sts_order` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sts_order`
--

INSERT INTO `sts_order` (`id`, `status`) VALUES
(1, 'Open Order'),
(2, 'Down Payment'),
(3, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(1, 'id.reversal@gmail.com'),
(2, 'takethis.coffee@gmail.com'),
(3, 'genhubsumut@gmail.com'),
(4, 'takethiscoffee.tamora@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbclient`
--

CREATE TABLE `tbclient` (
  `id` int(11) NOT NULL,
  `tgl_reg` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbclient`
--

INSERT INTO `tbclient` (`id`, `tgl_reg`, `nama`, `email`, `whatsapp`, `username`, `password`) VALUES
(2, '2022/03/28 23:20', 'Dwi Star Muda', 'id.reversal@gmail.com', '081264643110', 'dwistarmuda', '$2y$10$1I4luY16vjXGDFDIaRJUpeNl/OmcYyD8h1xIPk9IWYohOa6mw3z22'),
(8, '2022/04/02 00:46', 'User Baru', 'userbaru@gmail.com', '085278965412', 'newuser', '$2y$10$r/6/KpSgnantq2Werz5GxuQEz.2nMChnZo976/pz.QEgxYLDej63G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjasa`
--

CREATE TABLE `tbjasa` (
  `id` int(11) NOT NULL,
  `nama_jasa` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `proses_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbjasa`
--

INSERT INTO `tbjasa` (`id`, `nama_jasa`, `harga`, `proses_kerja`) VALUES
(1, 'Custom Website', 5500000, '5 - 7 hari kerja'),
(2, 'Company Profile', 1499000, '5 - 7 hari kerja'),
(3, 'Landing Page', 499000, '1 hari kerja'),
(4, 'CMS', 599000, '1 - 3 hari kerja'),
(5, 'Toko Online', 2499000, '5 - 7 hari kerja'),
(6, 'Rebuild Website', 99000, '5 - 7 hari kerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tborder`
--

CREATE TABLE `tborder` (
  `id` int(11) NOT NULL,
  `tgl_order` varchar(50) NOT NULL,
  `jasa` varchar(125) NOT NULL,
  `harga` int(50) NOT NULL,
  `status_order` int(10) NOT NULL,
  `status_project` int(11) NOT NULL,
  `id_nama` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tborder`
--

INSERT INTO `tborder` (`id`, `tgl_order`, `jasa`, `harga`, `status_order`, `status_project`, `id_nama`) VALUES
(1, '2022/04/10 21:00', 'Custom Website', 5500000, 3, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpesan`
--

CREATE TABLE `tbpesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpesan`
--

INSERT INTO `tbpesan` (`id`, `nama`, `email`, `whatsapp`, `pesan`) VALUES
(1, 'Nama Pengirim', 'Email', 'whatsapp', 'Isi pesan dari pengirim'),
(2, 'Dwi Star Muda', 'dsm@thisoneway.com', '081364643110', 'Ini adalah isi pesan dari halaman custom website.'),
(3, 'Sandiaga Uno', 'sandiaga@menprakerkraf.go.id', '081264643110', 'Dear Dwi Star Muda. Saya adalah menteri. Melalui pesan ini saya ingin menampilkan permohonan maaf saya karena saya adalah menteri. Saya paham posisi kamu adalah sebagai web developer tetapi dengan posisi saya sebagai menteri, saya ingin mengundang kamu dan seluruh warga negera Indonesia untuk hadir dalam acara khitanan cucu saya yang ke 192. Tolong hadir ya.  Biar ada yang habisin seluruh makanan yang ada.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbporto`
--

CREATE TABLE `tbporto` (
  `id` int(11) NOT NULL,
  `nama_porto` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbporto`
--

INSERT INTO `tbporto` (`id`, `nama_porto`, `foto`) VALUES
(1, 'Sistem Informasi Pemilihan Kepala Desa', 'siskades3.png'),
(2, 'SISKADES', 'siskades.png'),
(3, 'Company Profile - Takethis Coffee', 'takethis-porto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbtestimoni`
--

CREATE TABLE `tbtestimoni` (
  `id` int(11) NOT NULL,
  `foto` varchar(125) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `komentar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbtestimoni`
--

INSERT INTO `tbtestimoni` (`id`, `foto`, `nama`, `domain`, `komentar`) VALUES
(1, 'rudi.jpg', 'Rudi', 'www.aigometaland.com', 'Desainnya unik, clean, menarik dan eye catching banget. Hostingnya cepat banget. Ini jasa termurah se-Indonesia untuk kualitas sebagus ini.'),
(2, 'nanda.jpg', 'Nanda', 'www.almirashop.com', 'Awalnya ragu mau buat toko online. Tetapi disaranin untuk mengintegrasikannya dengan whatsapp dan beberapa tools digital marketing lainnya. Jujurly, omset meningkat 8kali lipat semenjak jualan via toko online. Fiturnya keren harganya murah gilaaa...'),
(3, 'nirmalasari.jpg', 'Nirmala Sari', 'www.takethis.online', 'Custom website yang hampir sempurna. Bisa custom fitur membership juga dengan harga yang: Murah bangeeettt!!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id`, `email`, `username`, `password`) VALUES
(1, 'id.reversal@gmail.com', 'abangdsm', '$2y$10$jdw2z1yZ2QP3jE0hTnHEx.2t3pOUNtRg/ly6Mr9XvV0o8TDlFAMza');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proses`
--

CREATE TABLE `tb_proses` (
  `id` int(11) NOT NULL,
  `proses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_proses`
--

INSERT INTO `tb_proses` (`id`, `proses`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Under Development'),
(3, 'Selesai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `confirmbayar`
--
ALTER TABLE `confirmbayar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jasa` (`id_jasa`);

--
-- Indeks untuk tabel `sts_order`
--
ALTER TABLE `sts_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbclient`
--
ALTER TABLE `tbclient`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbjasa`
--
ALTER TABLE `tbjasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tborder`
--
ALTER TABLE `tborder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nama` (`id_nama`),
  ADD KEY `status_project` (`status_project`);

--
-- Indeks untuk tabel `tbpesan`
--
ALTER TABLE `tbpesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbporto`
--
ALTER TABLE `tbporto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbtestimoni`
--
ALTER TABLE `tbtestimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_proses`
--
ALTER TABLE `tb_proses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `confirmbayar`
--
ALTER TABLE `confirmbayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sts_order`
--
ALTER TABLE `sts_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbclient`
--
ALTER TABLE `tbclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbjasa`
--
ALTER TABLE `tbjasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tborder`
--
ALTER TABLE `tborder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbpesan`
--
ALTER TABLE `tbpesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbporto`
--
ALTER TABLE `tbporto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbtestimoni`
--
ALTER TABLE `tbtestimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_proses`
--
ALTER TABLE `tb_proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tborder`
--
ALTER TABLE `tborder`
  ADD CONSTRAINT `tborder_ibfk_1` FOREIGN KEY (`id_nama`) REFERENCES `tbclient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tborder_ibfk_2` FOREIGN KEY (`status_project`) REFERENCES `tb_proses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
