-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2023 at 04:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_sman12`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(255) DEFAULT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `jenis_buku` varchar(50) DEFAULT NULL,
  `rak` varchar(255) DEFAULT NULL,
  `kode_klasifikasi` varchar(50) DEFAULT NULL,
  `status_buku` varchar(255) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_buku`, `kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `jenis_buku`, `rak`, `kode_klasifikasi`, `status_buku`, `gambar`, `created_at`, `updated_at`) VALUES
(1141096, 'R600', 'Ilmu Pengetahuan Populer Jilid 9', 'Grolier International, Inc.', 'PT Widyadara', 1999, 2, 'Referensi', 'buku referensi, lemari 3-kolom kelima', NULL, 'Tersedia - Tidak Bisa Dipinjam', '1689738559_9865ff306a879e447954.jpeg', '2023-07-19 10:49:19', '2023-07-19 11:04:27'),
(1399997, 'P510', 'Matematika Kelas XI', 'Sudianto Manullang, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734937_ef7e50f41ba41bce46d6.jpeg', '2023-07-19 09:48:57', '2023-07-19 09:48:57'),
(1559553, 'R420', 'Kamus Lengkap 310.000, Inggris-Indonesia', 'Yan Pramadya Puspa, dkk.', 'CV. Aneka Ilmu', 2005, 5, 'Referensi', 'buku referensi, lemari 3-kolom ketiga', NULL, 'Tersedia - Tidak Bisa Dipinjam', '1689738889_c6b44cf90537dd391db3.jpeg', '2023-07-19 10:54:49', '2023-07-19 11:04:09'),
(1645970, 'P410', 'Bahasa Indonesia Kelas XII', 'Maman Suryaman, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2018, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734323_7546278a16ad87dc0685.jpeg', '2023-07-19 09:38:43', '2023-07-19 09:38:43'),
(2177598, 'P570', 'Biologi Kelas XI', 'Slamet Prawirohartono, dkk.', 'Bumi Aksara', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689735520_9efc47d49e90f9e0b0a1.jpeg', '2023-07-19 09:58:40', '2023-07-19 09:58:40'),
(2296783, 'P510', 'Matematika Kelas XII', 'Abdur Rahman As\'ari, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2018, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689735023_718d9a6f8789bd3b6c12.jpeg', '2023-07-19 09:50:23', '2023-07-19 09:50:23'),
(2717784, 'P410', 'Bahasa Indonesia Kelas X', 'Suherli, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689600383_dcbeee0a54f65dc03751.jpeg', '2023-07-17 20:26:23', '2023-07-19 09:35:24'),
(2793552, 'P360', 'Sosiologi Kelas 3', 'Yad Mulyadi, dkk.', 'Yudistira', 2016, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689735847_ac09ce4875ce7beda383.jpeg', '2023-07-19 10:04:07', '2023-07-19 10:04:07'),
(3862822, 'U080', 'Setangkai Melati di Sayap Jibril', 'Dr. Sungkomo M', 'Departemen Pendidikan Nasional', 2005, 3, 'Umum', 'buku umum, lemari 1-kolom pertama', NULL, 'Tersedia - Bisa Dipinjam', '1689736974_404a616afd4c5af96713.jpeg', '2023-07-19 10:22:54', '2023-07-19 11:05:59'),
(3919919, 'R210', 'Yuk Menghafal Al-Qur\'an dengan Mudah dan Menyenangkan', 'Ustadz Farid Wajdi Nakib, Lc.,M.A.', 'Emir Cakrawala Islam', 2017, 2, 'Referensi', 'buku referensi, lemari 3-kolom pertama', NULL, 'Tersedia - Tidak Bisa Dipinjam', '1689739324_82e3993bdd65949128cd.jpeg', '2023-07-19 11:02:04', '2023-07-19 11:02:04'),
(4739565, 'P530', 'Aktif dan Kreatif Belajar Fisika Kelas 2', 'Ketut Kamajaya dan Wawan Purnama', 'Grafindo Media Pratama', 2016, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689735197_4d0385c81afd6edf3f88.jpeg', '2023-07-19 09:53:17', '2023-07-19 09:53:17'),
(5090066, 'F1000', 'Babad tanah leluhur', 'Dr. Purwadi, M.Hum', 'Shira Media', 2015, 1, 'Fiksi', 'lemari buku fiksi', NULL, 'Tersedia - Bisa Dipinjam', '1689740095_600795d87684d1d09fcd.jpeg', '2023-07-19 11:14:55', '2023-07-19 11:14:55'),
(5580254, 'R030', 'Ensiklopedi Indonesia Edisi Khusus 5', 'Hassan Shadily', 'PT Ichtiar Baru-Van Hoeve, Jakarta', 1992, 3, 'Referensi', 'buku referensi, lemari 1-kolom pertama', NULL, 'Tersedia - Tidak Bisa Dipinjam', '1689738133_efc4a983ccfed97fbe05.jpeg', '2023-07-19 10:42:13', '2023-07-19 11:03:13'),
(6159982, 'P540', 'Kimia Kelas Xi', 'Tine Maria Kuswati, dkk.', 'Bumi Aksara', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689735654_e3ed4f3d70766a27bfc5.jpeg', '2023-07-19 10:00:54', '2023-07-19 10:00:54'),
(6435411, 'R570', 'Kamus Biologi Edisi Lengkap', 'Tim Reality', 'Reality Publisher Surabaya', 2009, 5, 'Referensi', 'buku referensi, lemari 3-kolom keempat', NULL, 'Tersedia - Tidak Bisa Dipinjam', '1689739042_33b0a2a72544ed97b389.jpeg', '2023-07-19 10:57:22', '2023-07-19 11:02:36'),
(7130970, 'P410', 'Bahasa Inggris Kelas XI', 'Mahrukh Bashir,dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734594_c1b6fdb34be91108576c.jpeg', '2023-07-19 09:43:14', '2023-07-19 09:43:14'),
(7237159, 'P420', 'Bahasa Inggris Kelas XII', 'Utami Widiati, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2018, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734704_d83877cbc211bf523f19.jpeg', '2023-07-19 09:45:04', '2023-07-19 09:45:04'),
(7584804, 'P410', 'Bahasa Indonesia Kelas XI', 'Suherli, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734095_0ea7794187335f8131d2.jpeg', '2023-07-19 09:34:55', '2023-07-19 09:35:52'),
(7606511, 'F1000', 'Dzikir-dzikir cinta', 'Anam Khoirul Anam', 'Diva Press', 2007, 1, 'Fiksi', 'lemari buku fiksi', NULL, 'Tersedia - Bisa Dipinjam', '1689740324_52d9acd6c918bd3188da.jpeg', '2023-07-19 11:18:44', '2023-07-19 11:18:44'),
(7714210, 'F1000', 'Harry Potter And The Goblet of Fire', 'J.K. Rowling', 'PT Gramedia Pustaka Utama', 2006, 1, 'Fiksi', 'lemari buku fiksi', NULL, 'Tersedia - Bisa Dipinjam', '1689739809_5f8dd37df68403ab3cd5.jpeg', '2023-07-19 11:10:09', '2023-07-19 11:12:54'),
(7996257, 'F1000', 'Harry Potter and the deathly hallowd', 'J.K. Rowling', 'Bloomsbury', 2007, 1, 'Fiksi', 'lemari buku fiksi', NULL, 'Tersedia - Bisa Dipinjam', '1689739959_067844d421e2aa15ccd9.jpeg', '2023-07-19 11:12:39', '2023-07-19 11:12:39'),
(8289048, 'U200', 'Aku Beribadah Haji', 'Drs. H. Arsyad Siddik', 'PT Indah Jaya Bandung', 1993, 5, 'Umum', 'buku umum, lemari 1-kolom ketiga', NULL, 'Tersedia - Bisa Dipinjam', '1689736666_b44c8ce151df281fe0bd.jpeg', '2023-07-19 10:17:46', '2023-07-19 11:06:42'),
(8338113, 'P420', 'Bahasa Inggris Kelas X', 'Utami Widiati, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734469_273d7ad4eceb25d8421c.jpeg', '2023-07-19 09:41:10', '2023-07-19 09:41:10'),
(8435140, 'P510', 'Matematika Kelas X', 'Bornok Sinaga, dkk.', 'Kementrian Pendidikan dan Kebudayaan RI', 2017, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689734866_6db30276e44460729e09.jpeg', '2023-07-19 09:47:46', '2023-07-19 09:47:46'),
(8561829, 'F1000', 'Warisan arung palakka', 'Leonard Y. Andaya', 'Ininnawa', 2013, 1, 'Fiksi', 'lemari buku fiksi', NULL, 'Tersedia - Bisa Dipinjam', '1689740200_20f25632a5210bcaf215.jpeg', '2023-07-19 11:16:40', '2023-07-19 11:16:40'),
(9128351, 'U420', 'English Natural and Social Science Programs', 'Murdibjono dan Arwijati Wahyudi', 'Departemen Pendidikan dan Kebudyaan', 1997, 10, 'Umum', 'buku umum, lemari 2-kolom kedua', NULL, 'Tersedia - Bisa Dipinjam', '1689736431_a469163add4211fca3a0.jpeg', '2023-07-19 10:13:51', '2023-07-19 11:07:11'),
(9770997, 'P330', 'Ekonomi Kelas 3', 'Endang mulyadi dan Eri Kasman', 'Yudistira', 2016, 360, 'Paket', 'buku paket', NULL, 'Tersedia - Bisa Dipinjam', '1689735964_f12cdf15607afb54b7ac.jpeg', '2023-07-19 10:06:04', '2023-07-19 10:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `headmaster`
--

CREATE TABLE `headmaster` (
  `id_kepala_sekolah` int(11) NOT NULL,
  `nama_kepala_sekolah` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headmaster`
--

INSERT INTO `headmaster` (`id_kepala_sekolah`, `nama_kepala_sekolah`, `username`, `password`, `photo`) VALUES
(7874727, 'Kepala Sekolah', 'kepalasekolah', '123456789', '1690091803_83e048da1f687d45670c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_harus_kembali` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id_pinjam`, `id_buku`, `id_staff`, `id_siswa`, `tanggal_pinjam`, `tanggal_harus_kembali`, `tanggal_kembali`, `status`, `created_at`, `updated_at`) VALUES
(2106478, 2296783, 2324355, 9584846, '2023-07-17', '2023-07-22', '2023-07-22', '2', '2023-07-21 11:56:43', '2023-07-22 16:21:10'),
(7736130, 3919919, 2324355, 9615474, '2023-07-17', '2023-07-21', '2023-07-21', '2', '2023-07-20 09:53:53', '2023-07-21 09:21:22'),
(8692063, 7714210, 2324355, 9615474, '2023-07-17', '2023-07-19', '2023-07-20', '2', '2023-07-20 09:54:29', '2023-07-20 09:55:14'),
(8810067, 1645970, 2324355, 9584846, '2023-07-17', '2023-07-19', '2023-07-21', '2', '2023-07-21 11:56:02', '2023-07-21 11:56:59'),
(9978469, 2717784, 2324355, 9615474, '2023-07-17', '2023-07-20', '2023-07-20', '2', '2023-07-20 09:53:15', '2023-07-20 09:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id_login` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id_login`, `id_user`, `username`, `password`, `role`) VALUES
(4, 7874727, 'kepalasekolah', '123456789', 3),
(5, 2324355, 'staff', 'staff012', 2),
(17, 9615474, '230001', 'perpus12', 1),
(18, 4100908, '230002', 'perpus12', 1),
(19, 7540662, '230003', 'perpus12', 1),
(20, 4932481, '230004', 'perpus12', 1),
(21, 2196107, '230005', 'perpus12', 1),
(22, 6723891, '230006', 'perpus12', 1),
(23, 8274756, '230007', 'perpus12', 1),
(24, 1756369, '230008', 'perpus12', 1),
(25, 9300450, '230009', 'perpus12', 1),
(26, 1053879, '230010', 'perpus12', 1),
(27, 7496304, '230011', 'perpus12', 1),
(28, 5088428, '230012', 'perpus12', 1),
(29, 6775956, '230013', 'perpus12', 1),
(30, 5811882, '230014', 'perpus12', 1),
(31, 9094760, '230015', 'perpus12', 1),
(32, 3822320, '230016', 'perpus12', 1),
(33, 9584846, '230017', 'perpus12', 1),
(34, 8100351, '230018', 'perpus12', 1),
(35, 4246617, '230019', 'perpus12', 1),
(36, 4931366, '230020', 'perpus12', 1),
(37, 8888814, '230021', 'perpus12', 1),
(38, 6409105, '230022', 'perpus12', 1),
(39, 5404774, '230023', 'perpus12', 1),
(40, 4496063, '230024', 'perpus12', 1),
(41, 4311775, '230025', 'perpus12', 1),
(42, 6052774, '230026', 'perpus12', 1),
(43, 5642405, '230027', 'perpus12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id_registrasi` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `nisn` varchar(20) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `nomor_anggota` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id_registrasi`, `id_siswa`, `nisn`, `tanggal_daftar`, `kelas`, `nomor_anggota`, `alamat`, `nomor_telepon`, `photo`, `created_at`, `updated_at`) VALUES
(1100306, 8888814, '0064995440', '2023-07-19', '3 IPA', '230021', 'Jl Bontobila XII', '08980158949', NULL, '2023-07-19 15:49:14', '2023-07-19 15:49:14'),
(1326681, 4311775, '0061954980', '2023-07-19', '3 IPA', '230025', 'Bumi samata permai', '085342546117', NULL, '2023-07-19 15:55:42', '2023-07-19 15:55:42'),
(1980344, 5404774, '0055607038', '2023-07-19', '3 IPA', '230023', 'jl toddopuli raya', '085340283185', NULL, '2023-07-19 15:53:54', '2023-07-19 15:53:54'),
(2207527, 1756369, '0063729292', '2023-07-19', '3 IPS', '230008', 'Jalan Tamangapa raya no 32', '083132942228', NULL, '2023-07-19 15:20:36', '2023-07-19 15:20:36'),
(2904947, 6409105, '0071826374', '2023-07-19', '3 IPA', '230022', 'Jl ujung bori lama ', '0895 3376 74574', NULL, '2023-07-19 15:50:19', '2023-07-19 15:50:19'),
(2911110, 7540662, '0079042668', '2023-07-19', '1 IPS', '230003', 'Jl Paccinang raya V no 33 ', '082219996673', '1690092065_e8199d41c3027e4b91f1.jpeg', '2023-07-19 15:12:23', '2023-07-23 13:01:05'),
(2997363, 8100351, '0068850052', '2023-07-19', '3 IPA', '230018', 'Jl. Abdesir lr 2 ', '081340737849', NULL, '2023-07-19 15:43:51', '2023-07-19 15:43:51'),
(3034116, 4246617, '0079942572', '2023-07-19', '3 IPA', '230019', 'Jl. Swadaya Mas 2 No. 36', '081341962341', NULL, '2023-07-19 15:45:19', '2023-07-19 15:45:19'),
(3815706, 6723891, '0061887133', '2023-07-19', '3 IPS', '230006', 'Jl borong raya baru 1 no 2', '085326602768', NULL, '2023-07-19 15:17:33', '2023-07-19 15:17:33'),
(3863586, 5642405, '0054640959', '2023-07-19', '3 IPA', '230027', 'jl tamalate 6 stp 12 no 170', '087851672351‬', NULL, '2023-07-19 16:00:39', '2023-07-19 16:00:39'),
(4356916, 8274756, '0061659410', '2023-07-19', '3 IPS', '230007', 'jalan al falah blok 1 perumnas antang', '081524094991', NULL, '2023-07-19 15:18:33', '2023-07-19 15:18:33'),
(4755562, 6775956, '0074929276', '2023-07-19', '2 IPA', '230013', 'jln biring romang raya no.34 blok 1, perumnas Antang ', '083132942412', NULL, '2023-07-19 15:30:38', '2023-07-19 15:30:38'),
(4843635, 6052774, '0087090254', '2023-07-19', '3 IPA', '230026', 'Jl. Birta Perum. Griya Mulya Asri', '087851672351', NULL, '2023-07-19 15:59:43', '2023-07-19 16:03:12'),
(4890902, 7496304, '0067372685', '2023-07-19', '1 IPA', '230011', 'aspol antang c no 3', '085347376877', NULL, '2023-07-19 15:28:15', '2023-07-19 15:28:15'),
(5109725, 4100908, '0076402017', '2023-07-19', '1 IPS', '230002', 'jl biring romang 1 no 77', '087750816554', NULL, '2023-07-19 15:10:05', '2023-07-19 15:10:05'),
(5585997, 9094760, '0076041036', '2023-07-19', '2 IPA', '230015', 'jalan kajenjeng raya nomor 9 ', '081355533751', NULL, '2023-07-19 15:33:06', '2023-07-19 15:33:06'),
(6160276, 1053879, '0071190293', '2023-07-19', '1 IPA', '230010', 'Bukit Baruga 2 , Jln.manggala bakti no 36', '083830589288', NULL, '2023-07-19 15:26:59', '2023-07-19 15:26:59'),
(6237229, 9300450, '007328475', '2023-07-19', '1 IPA', '230009', 'Jl dg tawalla', '089520905080', NULL, '2023-07-19 15:22:04', '2023-07-19 15:22:04'),
(6386125, 5811882, '0063337382', '2023-07-19', '2 IPA', '230014', 'jl kabila barat no 2 bukit baruga antang manggala ', '081999851603', NULL, '2023-07-19 15:32:04', '2023-07-19 15:32:04'),
(6414360, 2196107, '0069782724', '2023-07-19', '2 IPS', '230005', 'jl raya baruga', '085923717884', NULL, '2023-07-19 15:15:47', '2023-07-19 15:15:47'),
(8272674, 9615474, '0076938014', '2023-07-19', '1 IPS', '230001', 'Jl. Abd Dg Sirua lr.8', '081543484178', NULL, '2023-07-19 07:13:08', '2023-07-19 07:13:08'),
(8474781, 4496063, '0062033608', '2023-07-19', '3 IPA', '230024', 'jl nipa nipa', '082195164299', NULL, '2023-07-19 15:54:57', '2023-07-19 15:54:57'),
(8566886, 4932481, '0078435979', '2023-07-19', '1 IPS', '230004', 'Puri Baruga asri (perumahan Bank Bukopin)', '082194543532', NULL, '2023-07-19 15:14:06', '2023-07-19 15:14:06'),
(8816005, 5088428, '0072817046', '2023-07-19', '2 IPA', '230012', 'jl bukit batu', '082311214296', NULL, '2023-07-19 15:29:43', '2023-07-19 15:29:43'),
(9616928, 4931366, '0061326736', '2023-07-19', '1 IPA', '230020', 'BCM Blok E9', '089530769193', NULL, '2023-07-19 15:46:08', '2023-07-19 15:46:08'),
(9667547, 9584846, '0056926615', '2023-07-19', '3 IPA', '230017', 'jalan toddopuli 22', '087870097173', NULL, '2023-07-19 15:42:02', '2023-07-19 15:42:02'),
(9986939, 3822320, '0068293537', '2023-07-19', '2 IPA', '230016', 'Jl.aroepala hertasning no 23', '089654441244', NULL, '2023-07-19 15:37:16', '2023-07-19 15:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `username`, `password`, `photo`) VALUES
(2324355, 'Staff', 'staff', 'staff012', '1690092372_01518a18e01903b3e26f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_siswa`, `nama_siswa`, `username`, `password`) VALUES
(1053879, 'Nur Rezki Andira', '230010', 'perpus12'),
(1756369, 'Resky Muliyana Akbar ', '230008', 'perpus12'),
(2196107, 'Selvina Karaeng', '230005', 'perpus12'),
(3822320, 'Naharani eka putri ', '230016', 'perpus12'),
(4100908, 'Mark Jireh stevano', '230002', 'perpus12'),
(4246617, 'Anasyah Zalsabila ', '230019', 'perpus12'),
(4311775, 'Andi Hijrah Mujziah Budiman', '230025', 'perpus12'),
(4496063, 'Tysa', '230024', 'perpus12'),
(4931366, 'M. Arsyad Agus C.', '230020', 'perpus12'),
(4932481, 'Siti saffanah Zahwa Ramadhani ', '230004', 'perpus12'),
(5088428, 'Rinelius suleman', '230012', 'perpus12'),
(5404774, 'Aulia', '230023', 'perpus12'),
(5642405, 'Naisyiah Puttiri A. Maradhy ', '230027', 'perpus12'),
(5811882, 'Radjasyah Abdul Asiz', '230014', 'perpus12'),
(6052774, 'Odelia Carissa Mahalia', '230026', 'perpus12'),
(6409105, 'Raihana taufiqah ', '230022', 'perpus12'),
(6723891, 'Nur Afni Jufri ', '230006', 'perpus12'),
(6775956, 'anugrah wulan jauri ', '230013', 'perpus12'),
(7496304, 'Nadia Zalsabila ', '230011', 'perpus12'),
(7540662, 'Nadia Adelita Ranggani ', '230003', 'perpus12'),
(8100351, 'Alya tri Hapsari ', '230018', 'perpus12'),
(8274756, 'Muh.Fargiawan Yusuf', '230007', 'perpus12'),
(8888814, 'Nur Arifah', '230021', 'perpus12'),
(9094760, 'Siti Andalusia Noor Mei ', '230015', 'perpus12'),
(9300450, 'Aliya Khumaira ', '230009', 'perpus12'),
(9584846, 'Raudhah Salsabila', '230017', 'perpus12'),
(9615474, 'Abd. Rahman Assudais', '230001', 'perpus12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `headmaster`
--
ALTER TABLE `headmaster`
  ADD PRIMARY KEY (`id_kepala_sekolah`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD UNIQUE KEY `nomor_anggota` (`nomor_anggota`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
