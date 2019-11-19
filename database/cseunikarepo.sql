-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2019 pada 12.12
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cseunikarepo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosens`
--

INSERT INTO `dosens` (`nid`, `nama`, `user_id`, `created_at`, `updated_at`) VALUES
('A50', 'Don D', '8', NULL, NULL),
('A51', 'Donbi D ', '9', NULL, NULL),
('A52', 'Dondon', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `Judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bukti` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_Bukti` enum('SK','Proposal','LPJ') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('Individu','BEM','HMPSSI','HMPTI','Senat') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kevalidan` enum('Menunggu validasi','Valid','Invalid','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu validasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `user_id`, `Judul`, `Tanggal`, `Deskripsi`, `Bukti`, `Jenis_Bukti`, `Foto`, `Status`, `Kevalidan`, `created_at`, `updated_at`) VALUES
(1, 3, 'Peserta PKM bidang Teknologi', '2018-01-02', 'Mengikuti PKM di bidang teknologi sebagai anggota tim yang dilombakan pada tanggal 01/02/2018.', 'Sertifikat peserta PKM', 'SK', 'Foto PKM', 'Individu', 'Valid', '2019-10-03 16:52:09', '2019-10-28 04:56:30'),
(3, 3, 'Ikut Seminar Internasional', '2018-01-03', 'Mengikuti seminar', 'Sertifikat seminar', 'SK', 'foto seminar', 'Individu', 'Valid', '2019-10-03 20:51:24', '2019-10-28 05:39:05'),
(4, 2, 'Pelatihan oleh Google 2019', '2019-10-29', 'Mengikuti pelatihan Google tentang optimalisasi Google Ads di bulan Oktober 2019.', 'Sertifikasi Google', 'SK', 'Foto Ikut Pelatihan Google', 'Individu', 'Valid', '2019-10-28 23:17:19', '2019-11-05 00:45:22'),
(5, 2, 'Juara I Catur IKOM CUP 2018', '2018-11-20', 'Ikut lomba catur IKOM CUP 2018 dan menjadi juara kesatu.', 'Sertifikat IKOM CUP Catur 2018', 'SK', 'Foto aktivitas IKOM CUP Catur 2018', 'Individu', 'Valid', '2019-10-28 23:20:35', '2019-11-05 00:44:31'),
(6, 4, 'Seminar Big Data di Unika 2019', '2019-04-15', 'Mengikuti Seminar Big Data pada hari Senin, 15 April 2019 di Unika.', 'Sertifikat Ikut Seminar', 'SK', 'Foto Seminar', 'Individu', 'Invalid', '2019-10-29 00:13:47', '2019-11-04 20:39:06'),
(7, 4, 'Seminar Aplikasi HIV 2018', '2018-05-25', 'Mengikuti Seminar tentang aplikasi HIV 2018 di Unika.', 'Foto Absen Ikut Seminar', 'SK', 'Foto Seminar', 'Individu', 'Invalid', '2019-10-29 00:21:25', '2019-11-04 20:36:23'),
(8, 2, 'Sosialisasi Penggunaan Sikat Gigi di Unika 2018', '2018-07-17', 'Melakukan sosialisasi ke daerah terpencil tentang cara menggunakan sikat gigi yang baik dan benar. Sosialisasi dilakukan oleh tim Unika pada tahun 2019.', 'Dokumentasi acara sosialisasi dan ijin dari desa tertuju', 'SK', 'Foto melakukan sosialisasi', 'Individu', 'Invalid', '2019-11-05 00:49:27', '2019-11-05 00:50:09'),
(9, 2, 'Sosialisasi Pengenalan Game Technology di SMA X 2018', '2018-06-14', 'Melakukan sosialisasi tentang masa depan game technology di SMA X pada tahun 2018. Sosialisasi dilakukan oleh tim dari fakulatas GameTech, Sistem Informasi, dan fakultas X.', 'Bukti ijin dan surat kerjasama dengan SMA X', 'SK', 'Foto melakukan sosialisasi di SMA X', 'Individu', 'Menunggu validasi', '2019-11-05 00:53:41', '2019-11-05 00:53:41'),
(10, 3, 'Sosialisasi Penggunakan Pasta Gigi di Daerah X 2018', '2018-09-11', 'Melakukan sosialisasi tentang pentingnya menggunakan pasta gigi di daerah X oleh tim Unika pada tahun 2018.', 'Dokumen ijin kunjungan sosialisasi.', 'SK', 'Foto sosialisasi di daerah X.', 'Individu', 'Menunggu validasi', '2019-11-05 01:02:23', '2019-11-05 01:02:23'),
(11, 3, 'Sosialisasi Penggunaan Laptop di Daerah X Tahun 2019', '2019-09-11', 'Melakukan sosialisasi tentang kegunaan laptop di jaman sekarang untuk melakukan produktivitas. Sosialisasi dilakukan oleh tim Unika dengan melakukan kunjungan ke daerah X pada tahun 2019.', 'Surat ijin kunjungan ke daerah X', 'SK', 'Foto sosialisasi penggunaan laptop', 'Individu', 'Valid', '2019-11-05 01:06:22', '2019-11-12 00:29:04'),
(12, 5, 'Halo Bonba', '2018-10-28', 'Kegiatan tahun 2018 Bonba', 'test', NULL, 'test', NULL, 'Menunggu validasi', '2019-11-18 23:59:30', '2019-11-18 23:59:30'),
(13, 5, 'Seminar Google Ads', '2018-11-30', 'Mengikuti Google Ads', 'Sertifikat Google Ads', NULL, 'Kegiatan Google Ads', NULL, 'Menunggu validasi', '2019-11-19 00:00:50', '2019-11-19 00:09:44'),
(14, 5, 'Seminar Brand Awareness dengan Video', '2018-10-22', 'Mengikuti seminar cara menigkatkan brand awareness dengan video.', 'Sertifikat seminar brand awareness', NULL, 'Kegiatan seminar brand awareness', NULL, 'Menunggu validasi', '2019-11-19 00:01:10', '2019-11-19 00:11:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_09_11_120750_create_listings_table', 2),
(17, '2014_10_12_000000_create_users_table', 3),
(18, '2014_10_12_100000_create_password_resets_table', 3),
(19, '2019_09_24_034100_create_kegiatans_table', 3),
(20, '2019_10_01_075652_create_perans_table', 3),
(21, '2019_10_01_160945_create_siswas_table', 3),
(22, '2019_10_01_161203_create_dosens_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perans`
--

CREATE TABLE `perans` (
  `id` int(11) NOT NULL,
  `peran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perans`
--

INSERT INTO `perans` (`id`, `peran`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'guest', NULL, NULL),
(3, 'mahasiswa', NULL, NULL),
(4, 'bem', NULL, NULL),
(5, 'hmpssi', NULL, NULL),
(6, 'senat', NULL, NULL),
(7, 'hmpti', NULL, NULL),
(8, 'dosen', NULL, NULL),
(9, 'dekan', NULL, NULL),
(10, 'kaprogdi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`nim`, `nama`, `dosen_id`, `user_id`, `created_at`, `updated_at`) VALUES
('17.N1.0016', 'Putro', 'A50', '2', NULL, NULL),
('17.N1.0050', 'Bonbu', 'A51', '3', NULL, NULL),
('17.N1.0051', 'Bonbi', 'A52', '4', NULL, NULL),
('17.N1.0052', 'Bonba', 'A50', '5', NULL, NULL),
('17.N1.0053', 'Bonbon', 'A51', '6', NULL, NULL),
('17.N1.0054', 'Bonbiri', 'A52', '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_peran` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_peran`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 1, NULL, NULL, NULL),
(2, 'Putro', '17n10016@student.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 3, 'RWCZHEVYqyl0MphEA1cRmPf9AqZYDpHe95ANSL4nPHiqeRRYJrFQfEKkvrjH', NULL, NULL),
(3, 'Bonbu', '17n10050@student.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 4, 'b1B9AaD5RxZGkcFpTLaComHf3ISm18lP36dVuKjjgruED51rCIiEUnsXcNgE', NULL, NULL),
(4, 'Bonbi', '17n10051@student.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 4, 'HxKc1iTcQr5neqvMDdHL8U8qa5KfgIJ2Pok5vbGwaGiCMjlmub5IstnweSAs', NULL, NULL),
(5, 'Bonba', '17n10052@student.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 5, 'Zp49lnacG9BfE9Awg9Zk2Ovbw0B1GqThU1EltiRcp9RQ1ylcbPxn5CTgX13H', NULL, NULL),
(6, 'Bonbon', '17n10053@student.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 6, NULL, NULL, NULL),
(7, 'Bonbiri', '17n10054@student.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 7, NULL, NULL, NULL),
(8, 'Don', 'a50@teacher.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 8, '7mV1kJBvoeNZfZ2PcsYHwxT41j7FqWkV4sl1cBd4Cfv4mxwe1GBI0TjaZqMU', NULL, NULL),
(9, 'Donbi', 'a51@teacher.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 9, 'XIysmgh6Sjua9xcC2sxxtaYvUnEZdVKH0WClb99jIrSyBI24Mz7eKQEiqbat', NULL, NULL),
(10, 'Dondon', 'a52@teacher.unika.ac.id', '$2y$10$jHmwxQF53HPlAA7JtP6UPOlSvy7JPvVstR9kbBlHeDVFun.ESLzui', 10, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`nid`);

--
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `perans`
--
ALTER TABLE `perans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
