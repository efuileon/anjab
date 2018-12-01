-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 05:53 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organisasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `z_jabatans`
--

CREATE TABLE `z_jabatans` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL,
  `jenis_jab` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_jabatans`
--

INSERT INTO `z_jabatans` (`id_jabatan`, `nama_jabatan`, `jenis_jab`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris Daerah Kabupaten Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(2, 'Staf Ahli Bidang Kemasyarakatan dan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(3, 'Staf Ahli Bidang Ekonomi, Keuangan dan Pembangunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(4, 'Staf Ahli Bidang Pemerintahan, Hukum dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(5, 'Asisten Pemerintahan dan Kesejahteraan Rakyat', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(6, 'Kepala Bagian Administrasi Pemerintahaan dan Otonomi Daerah pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(7, 'Kepala Sub Bagian Pemerintahan Umum pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(8, 'Kepala Sub Bagian Administrasi Kewilayahan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(9, 'Kepala Sub Bagian Otonomi Daerah dan Kerjasama pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(10, 'Kepala Bagian Hukum pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(11, 'Kepala Sub Bagian Penyusunan Produk Hukum Daerah pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(12, 'Kepala Sub Bagian Dokumentasi dan Penyusunan Keputusan Bupati pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(13, 'Kepala Sub Bagian Bantuan Hukum pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(14, 'Kepala Bagian Hubungan Masyarakat dan Protokol pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(15, 'Kepala Sub Bagian Pengumpulan,Penyaringan dan Dokumentasi pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(16, 'Kepala Sub Bagian Media dan Komunikasi Publik pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(17, 'Kepala Sub Bagian Protokol pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(18, 'Kepala Bagian Administrasi Kesejahteraan Rakyat pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(19, 'Kepala Sub Bagian Sosial kemasyarakatan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(20, 'Kepala Sub Bagian Agama dan Lembaga Keagamaan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(21, 'Kepala Sub Bagian Kesejahteraan Masyarakat pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(22, 'Asisten Perekonomian dan Pembangunan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(23, 'Kepala Bagian Administrasi Perekonomian pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(24, 'Kepala Sub Bagian Pemberdayaan Ekonomi Kerakyatan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(25, 'Kepala Sub Bagian Sarana Perekonomian dan SDA pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(26, 'Kepala Sub Bagian Pembinaan dan Pengembangan BUMD pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(27, 'Kepala Bagian Administrasi Pembangunan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(28, 'Kepala Sub Bagian Penyusunan Pelaksanaan Pembangunan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(29, 'Kepala Sub Bagian Pengendalian Pelaksanaan Pembangunan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(30, 'Kepala Sub Bagian Pelaporan Administrasi Pelaksanaan Pembangunan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(31, 'Kepala Bagian Pengadaan Barang dan Jasa pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(32, 'Kepala Sub Bagian Perencanaan dan Pembinaan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(33, 'Kepala Sub Bagian Layanan Pengadaan Barang dan Jasa pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(34, 'Kepala Sub Bagian Evaluasi dan Pelaporan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(35, 'Asisten Administrasi Umum pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(36, 'Kepala Bagian Organisasi pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(37, 'Kepala Sub Bagian Kelembagaan dan Analisis Jabatan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(38, 'Kepala Sub Bagian Tatalaksana dan Pelayanan Publik pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(39, 'Kepala Sub Bagian Pengembangan Kinerja pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(40, 'Kepala Bagian Umum pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(41, 'Kepala Sub Bagian TU Pimpinan dan Penata Usahaan Perkantoran pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(42, 'Kepala Sub Bagian Rumah Tangga pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(43, 'Kepala Sub Bagian Perlengkapan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(44, 'Kepala Bagian Keuangan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(45, 'Kepala Sub Bagian Perbendaharaan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(46, 'Kepala Sub Bagian Akuntansi dan Penatausahaan Aset pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(47, 'Kepala Sub Bagian Perencanaan dan Pelaporan pada Sekretariat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(48, 'Sekretaris Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(49, 'Kepala Bagian Umum pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(50, 'Kepala Sub Bagian Tata Usaha dan Perlengkapan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(51, 'Kepala Sub Bagian Humas dan Protokol pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(52, 'Kepala Bagian Keuangan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(53, 'Kepala Sub Bagian Perencanaan dan Anggaran pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(54, 'Kepala Sub Bagian Perbendaharaan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(55, 'Kepala Bagian Persidangan dan Perundang-Undangan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(56, 'Kepala Sub Bagian Penyusunan Perundang-Undangan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(57, 'Kepala Sub Bagian Persidangan dan Risalah pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(58, 'Kepala Bagian Fasilitasi Pengawasan dan Penganggaran dan Alat kelengkapan Dewan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(59, 'Kepala Sub Bagian Fasilitasi Fungsi Pengawasan dan Anggaran pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(60, 'Kepala Sub Bagian Fasilitasi Alat Kelengkapan Dewan pada Sekretariat Dewan Perwakilan Rakyat Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(61, 'Inspektur Kabupaten Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(62, 'Sekretaris Inspektorat', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(63, 'Kepala Sub Bagian Perencanaan pada Inspektorat', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(64, 'Kepala Sub Bagian Administrasi dan Umum pada Inspektorat', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(65, 'Kepala Sub Bagian Evaluasi dan Pelaporan pada Inspektorat', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(66, 'Inspektur Pembantu Wilayah I', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(67, 'Inspektur Pembantu Wilayah II', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(68, 'Inspektur Pembantu Wilayah III', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(69, 'Inspektur Pembantu Wilayah IV', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(70, 'Kepala Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(71, 'Sekretaris Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(72, 'Kepala Sub Bagian Umum dan Kepegawaian pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(73, 'Kepala Sub Bagian Penyusunan program dan Keuangan pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(74, 'Kepala Bidang Pengadaan, Informasi dan Kesejahteraan Pagawai pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(75, 'Kepala Sub Bidang Fomasi dan Pengadaan pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(76, 'Kepala Sub Bidang Informasi dan Dokumentasi Kepegawaian pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(77, 'Kepala Sub Bidang Kesejahteraan Pegawai pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(78, 'Kepala Bidang Mutasi dan Kepangkatan pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(79, 'Kepala Sub Bidang Pengembangan Karier dan Mutasi pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(80, 'Kepala Sub Bidang Kepangkatan dan Pemberhentian pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(81, 'Kepala Sub Bidang Pembinaan Pegawai pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(82, 'Kepala Bidang Pengembangan Kompetensi Aparatur pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(83, 'Kepala Sub Bidang Pengembangan Kompetensi Manajerial pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(84, 'Kepala Sub Bidang Pengembangan Kompetensi Fungsional dan Sertifikasi Kompetensi pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(85, 'Kepala Sub Bidang Pengembengan Kompetensi Teknis dan Sosial Kultural pada Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(86, 'Kepala Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(87, 'Sekretaris Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(88, 'Kepala Sub Bagian Umum pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(89, 'Kepala Sub Bagian Keuangan pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(90, 'Kepala Sub Bagian Perencanaan, Evaluasi dan Pelaporan pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(91, 'Kepala Bidang Hubungan Antar Lembaga pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(92, 'Kepala Sub Bidang Lembaga Politik pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(93, 'Kepala Sub Bidang Lembaga Kemasyarakatan pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(94, 'Kepala Bidang Integrasi Bangsa pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(95, 'Kepala Sub Bidang Wawasan Kebangsaan pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(96, 'Kepala Sub Bidang Kerukunan dan Pembauran pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(97, 'Kepala Bidang Kewaspadaan pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(98, 'Kepala Sub Bidang Pencegahan Konflik pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(99, 'Kepala Sub Bidang Penanganan Konflik dan HAM pada Badan Kesatuan Bangsa dan Politik', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(100, 'Kepala Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(101, 'Sekretaris Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(102, 'Kepala Sub Bagian Umum pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(103, 'Kepala Sub Bagian Keuangan pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(104, 'Kepala Sub Bagian Perencanaan, Evaluasi Dan Pelaporan pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(105, 'Kepala Bidang Pencegahan Dan Kesiapsiagaan pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(106, 'Kepala Seksi pencegahan pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(107, 'Kepala Seksi kesiapsiagaan pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(108, 'Kepala Bidang kedaruratan dan logistik pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(109, 'Kepala Seksi kedaruratan pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(110, 'Kepala Seksi logistik pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(111, 'Kepala Bidang Rehabilitasi Dan Rekonstruksi pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(112, 'Kepala Seksi rehabilitasi pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(113, 'Kepala Seksi rekonstruksi pada Badan Penanggulangan Bencana Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(114, 'Kepala Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(115, 'Sekretaris Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(116, 'Kepala Sub Bagian Umum dan Kepegawaian pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(117, 'Kepala Sub Bagian Keuangan pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(118, 'Kepala Sub Bagian Penyusun Program pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(119, 'Kepala Bidang Pendapatan dan Penetapan Pajak dan Retribusi Daerah pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(120, 'Kepala Sub Bidang Pendapatan pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(121, 'Kepala Sub Bidang Pengolahan data pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(122, 'Kepala Sub Bidang Penetapan pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(123, 'Kepala Bidang Penagihan, Keberatan dan Penyuluhan Pajak dan Retribusi Daerah pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(124, 'Kepala Sub Bidang Penagihan pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(125, 'Kepala Sub Bidang Pelaporan dan Keberatan pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(126, 'Kepala Sub Bidang Penyuluhan,Monitoring dan Evaluasi pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(127, 'Kepala Bidang Perbendaharaan pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(128, 'Kepala Sub Bidang Penatausahaan Gaji dan Penerimaan Kas Daerah pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(129, 'Kepala Sub Bidang Penatausahaan Pengeluaran Kas Daerah pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(130, 'Kepala Sub Bidang Penatausahaan Surat Pertanggungjawaban Fungsional pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(131, 'Kepala Bidang Akuntansi pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(132, 'Kepala Sub Bidang Akuntansi Wilayah I pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(133, 'Kepala Sub Bidang Akuntansi Wilayah II pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(134, 'Kepala Sub Bidang Akuntansi Wilayah III pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(135, 'Kepala Bidang Anggaran pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(136, 'Kepala Sub Bidang Anggaran Wilayah I pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(137, 'Kepala Sub Bidang Anggaran Wilayah II pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(138, 'Kepala Sub Bidang Anggaran Wilayah III pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(139, 'Kepala Bidang Aset pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(140, 'Kepala Sub Bidang Analisa dan Kebutuhan Barang Milik Daerah pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(141, 'Kepala Sub Bidang Pemanfaatan, Pemeliharaan dan Pengamanan BMD pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(142, 'Kepala Sub Bidang Penatausahaan, Pemindahtanganan dan Penghapusan BDM pada Badan pendapatan, pengelolaan Keuangan dan Aset Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(143, 'Kepala Badan Perencanaan Pembangunan Daerah pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(144, 'Kepala Sekretariat pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(145, 'Kepala Sub Bagian Umum dan Kepegawaian pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(146, 'Kepala Sub Bagian Keuangan pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(147, 'Kepala Sub Bagian Penyusunan Program pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(148, 'Kepala Bidang Sosial, Budaya dan Pemerintahan pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(149, 'Kepala Sub Bidang Pedidikan dan Kesehatan pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(150, 'Kepala Sub Bidang Kesejahteraan Sosial pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(151, 'Kepala Sub Bidang Pemerintahan dan Aparatur pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(152, 'Kepala Bidang Ekonomi pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(153, 'Kepala Sub Bidang Pertanian pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(154, 'Kepala Sub Bidang Investasi dan Penanaman Modal pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(155, 'Kepala Sub Bidang Penindustrian, Perdagangan, Koperasi dan Usaha Mikro pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(156, 'Kepala Bidang Infrastruktur dan Pengembangan Wilayah pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(157, 'Kepala Sub Bidang Pekerjaan Umum dan Penataan Ruang pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(158, 'Kepala Sub Bidang Perhubungan, Komunikasi, Informatika, dan Permukiman pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(159, 'Kepala Sub Bidang Sumber Daya Alam dan Lingkungan Hidup pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(160, 'Kepala Bidang Penelitian, Pengembangan dan Perencanaan Pembangunan pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(161, 'Kepala Sub Bidang Penelitian dan Pengembangan pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(162, 'Kepala Sub Bidang Perencanaan dan Pendanaan pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(163, 'Kepala Sub Bidang Pengendalian dan Evaluasi pada Badan Perencanaan Pembangunan Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(164, 'Kepala Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(165, 'Sekretaris Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(166, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(167, 'Kepala Sub Bagian Keuangan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(168, 'Kepala Sub Bagian Penyusunan Program pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(169, 'Kepala Bidang Pelayanan Pendaftaran Penduduk pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(170, 'Kepala Seksi Identitas Penduduk pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(171, 'Kepala Seksi Pindah Tangan Penduduk pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(172, 'Kepala Bidang Pelayanan Pencatatn Sipil pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(173, 'Kepala Seksi Kelahiran dan kematian pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(174, 'Kepala Seksi Perkawinan, Perceraian, Perubahan Status Anak dan Pewarganegaraan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(175, 'Kepala Bidang Pengelolaan Informasi Administrasi Kependudukan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(176, 'Kepala Seksi Sistem Informasi Administrasi Kependudukan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(177, 'Kepala Seksi Pengolahan dan Penyajian Data Kependudukan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(178, 'Kepala Seksi Tata Kelola dan Sumber Daya Manusia Teknologi Informasi dan Komunikasi pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(179, 'Kepala Bidang Pemanfaatan Data dan Inovasi Pelayanan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(180, 'Kepala Seksi Kerjasama dan Inovasi Pelayanan pada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(181, 'Kepala Seksi Pemanfaatan Data dan Dokumen Kependudukanpada Dinas Kependudukan dan Pencatatan Sipil', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(182, 'Kepala Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(183, 'Sekretaris Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(184, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(185, 'Kepala Sub Bagian Keuangan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(186, 'Kepala Sub Bagian Penyusunan Program pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(187, 'Kepala Bidang Kesehatan Masyarakat pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(188, 'Kepala Seksi Promosi Kesehatan dan Pemberdayaan Masyarakat pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(189, 'Kepala Seksi Kesehatan Keluarga dan Gizi Masyarakat pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(190, 'Kepala Seksi Kesehatan Lingkungan, Kesehatan Kerja dan Olah raga pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(191, 'Kepala Bidang Pencegahan dan Pengendalian Penyakit pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(192, 'Kepala Seksi Surveilans dan Imunisasi pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(193, 'Kepala Seksi Pencegahan dan Pengendalian Penyakit Menular pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(194, 'Kepala Seksi Pencegahan dan Pengendalian Penyakit Tidak Menular dan Kesehatan Jiwa pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(195, 'Kepala Bidang Pelayanan Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(196, 'Kepala Seksi Pelayanan Kesehatan Primer dan Tradisional pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(197, 'Kepala Seksi Pelayanan Kesehatan Rujukan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(198, 'Kepala Seksi Peningkatan Mutu Fasilitas Pelayanan Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(199, 'Kepala Bidang Sumber Daya Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(200, 'Kepala Seksi Kefarmasia, Alat Kesehatan dan Perbekalan Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(201, 'Kepala Seksi Pembiayaan Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(202, 'Kepala Seksi Sumber Daya Manusia Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(203, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Situbondo pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(204, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Panarukan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(205, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Kendit pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(206, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Mlandingan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(207, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Bungatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(208, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Suboh pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(209, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Besuki pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(210, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Jatibanteng pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(211, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Sumbermalang pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(212, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Banyuglugur pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(213, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Panji pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(214, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Mangaran pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(215, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Kapongan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(216, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Arjasa pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(217, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Asembagus pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(218, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Jangkar pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(219, 'Kepala Sub Bagian Tata Usaha UPT Puskesmas Banyuputih pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(220, 'Kepala UPT Gudang Farmasi Kabupaten (GFK) pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(221, 'Kepala Sub Bagian Tata Usaha UPT Gudang Farmasi Kabupaten pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(222, 'Kepala UPT Laboratorium Kesehatan (Labkes) pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(223, 'Kepala Sub Bagian Tata Usaha UPT Laboratorium Kesehatan pada Dinas Kesehatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(224, 'Kepala Dinas Ketahanan Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(225, 'Kepala Sekretariat pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(226, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(227, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(228, 'Kepala Bidang Ketersediaan dan Distribusi Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(229, 'Kepala Seksi Ketersediaan Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(230, 'Kepala Seksi Distribusi dan Cadangan Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(231, 'Kepala Bidang Konsumsi, Penganekaragaman dan Keamanan Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(232, 'Kepala Seksi Konsumsi dan Keamanan Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(233, 'Kepala Seksi Penganekaragaman dan Kerawanan Pangan pada Dinas Ketahanan Pangan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(234, 'Kepala Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(235, 'Sekretaris Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(236, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(237, 'Kepala Sub Bagian Keuangan pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(238, 'Kepala Sub Bagian Penyusunan Program pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(239, 'Kepala Bidang Komunikasi dan Informasi Publik pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(240, 'Kepala Seksi Media Informasi Publik pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(241, 'Kepala Seksi Layanan Komunikasi Dan Informasi pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(242, 'Kepala Seksi Pengelolaan Informasi Publik pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(243, 'Kepala Bidang Teknologi Informasi dan Komunikasi pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(244, 'Kepala Seksi Infrastruktur dan Teknologi pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(245, 'Kepala Seksi Pengelolaan Sumberdaya Teknologi Informasi dan Teknologi pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(246, 'Kepala Seksi Pengembangan Aplikasi pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(247, 'Kepala Bidang Persandian pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(248, 'Kepala Seksi Penyelenggaraan Persandian pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(249, 'Kepala Seksi Penyelenggaraan statistik pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(250, 'Kepala Seksi Keamanan Informasi Daerah pada Dinas Komunikasi, Informatika dan Persandian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(251, 'Kepala Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(252, 'Sekretaris Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(253, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(254, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(255, 'Kepala Bidang Kelembagaan dan Pengawasan Koperasi pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(256, 'Kepala Seksi Kelembagaan Koperasi pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(257, 'Kepala Seksi Pengawasan Koperasi pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(258, 'Kepala Bidang Pemberdayaan dan Pengembangan Koperasi pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(259, 'Kepala Seksi Usaha Koperasi pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(260, 'Kepala Seksi Pembiayaan dan Simpan Pinjam pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(261, 'Kepala Bidang Bina Usaha Mikro pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(262, 'Kepala Seksi Sarana, Kemitraan dan Pemasaran pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(263, 'Kepala Seksi Kewirausahaan pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(264, 'Kepala Seksi Manajemen dan Informasi Bisnis pada Dinas Koperasi dan Usaha Mikro', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(265, 'Kepala Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(266, 'Sekretaris Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(267, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(268, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(269, 'Kepala Bidang Penataan dan Penaatan Lingkungan PPLH pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(270, 'Kepala Seksi Perencanaan dan Kajian Dampak Lingkungan pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(271, 'Kepala Seksi Pengaduan, Peyelesaian Sengketa dan Penegakan Hukum Lingkungan pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(272, 'Kepala Bidang Pengelolaan Sampah, Limbah B3 dan Peningkatan Kapasitas pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(273, 'Kepala Seksi Pengelolaan Sampah dan Limbah B3 pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(274, 'Kepala Seksi Peningkatan Kapasitas Lingkungan Hidup pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(275, 'Kepala Bidang Pengendalian Pencemaran dan Kerusakan Lingkungan Hidup pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(276, 'Kepala Seksi Pencemaran dan Kerusakan Lingkungan Hidup pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(277, 'Kepala Seksi Pemeliharaan Lingkungan dan Hutan pada Dinas Lingkungan Hidup', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(278, 'Kepala Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(279, 'Sekretaris Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(280, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(281, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(282, 'Kepala Bidang Pariwisata pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(283, 'Kepala Seksi Pemasaran, Sumberdaya, dan Ekonomi Kreatif pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(284, 'Kepala Seksi Pengembangan Infrastuktur dan Destinasi Wisata pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(285, 'Kepala Bidang Pemuda dan Olahraga pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(286, 'Kepala Seksi Pemberdayaan, Pengembangan, Infastruktur dan Kemitraan Pemuda pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(287, 'Kepala Seksi Pembudayaan, Peningkatan Prestasi, Infrastuktur dan Kemitraan Olah Raga pada Dinas Pariwisata', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(288, 'Kepala Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(289, 'Sekretaris Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(290, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(291, 'Kepala Sub Bagian Keuangan pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(292, 'Kepala Sub Bagian Penyusunan Program pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(293, 'Kepala Bidang Bina Marga pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(294, 'Kepala Seksi Pemeliharaan Jalan dan Jembatan pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(295, 'Kepala Seksi Pembangunan dan Perencanaan Teknis Bina Marga pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(296, 'Kepala Seksi Pembinaan Jalan dan Jembatan pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(297, 'Kepala Bidang Pengairan pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(298, 'Kepala Seksi Operasi dan Pemeliharaan Jaringan Irigasi pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(299, 'Kepala Seksi Pembangunan dan Perencanaan Teknis Pengairan pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(300, 'Kepala Seksi Pengendalian dan Konservasi Sumber Daya Air pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(301, 'Kepala Bidang Cipta Karya pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(302, 'Kepala Seksi Infrastuktur Permukiman dan Drainase pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(303, 'Kepala Seksi Pengembangan Penataan Lingkungan Permukiman pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(304, 'Kepala Seksi Penataan Bangunan dan Jasa Konstruksi pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(305, 'Kepala Bidang Tata Ruang dan Pengelolaan Aset pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(306, 'Kepala Seksi Tata Ruang pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(307, 'Kepala Seksi Pertanahan dan Pengelolaan Aset pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(308, 'Kepala Seksi Sarana Prasarana pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(309, 'Kepala UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Asembagus pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(310, 'Kepala Sub Bagian Tata Usaha UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Asembagus pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(311, 'Kepala UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Arjasa pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(312, 'Kepala Sub Bagian Tata Usaha UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Arjasa pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(313, 'Kepala UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Panji pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(314, 'Kepala Sub Bagian Tata Usaha UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Panji pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(315, 'Kepala UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Situbondo pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(316, 'Kepala Sub Bagian Tata Usaha UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Situbondo pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(317, 'Kepala UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Suboh pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(318, 'Kepala Sub Bagian Tata Usaha UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Suboh pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(319, 'Kepala UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Besuki pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(320, 'Kepala Sub Bagian Tata Usaha UPT Operasional dan Pemeliharaan Bina Marga dan Pengairan Wilayah Besuki pada Dinas Pekerjaan Umum dan Penataan Ruang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(321, 'Kepala Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(322, 'Sekretaris Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(323, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(324, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(325, 'Kepala Bidang Bina Pemerintah Desa pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(326, 'Kepala Seksi Bina Aparatur Pemerintah Desa pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(327, 'Kepala Seksi Bina Administrasi, Keuangan dan Aset Desa pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(328, 'Kepala Seksi Organisasi Pemerintahan Desa pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(329, 'Kepala Bidang Bina Pemberdayaan Masyarakat dan Kelembagaan Kemasyarakatan pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(330, 'Kepala Seksi Bina Pemberdayaan Masyarakat dan Kerjasama Desa pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(331, 'Kepala Seksi Pemberdayaan dan Kesejahteraan Keluarga pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(332, 'Kepala Seksi Bina Pemberdayaan Lembaga Kemasyarakatan pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(333, 'Kepala Bidang Pembangunan Desa pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(334, 'Kepala Seksi Pembangunan Desa dan Kawasan Perdesaan pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(335, 'Kepala Seksi Pengembangan Usaha Ekonomi, Sumber Daya Alam dan Teknologi Tepat Guna Perdesaan pada Dinas Pemberdayaan Masyarakat dan Desa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(336, 'Kepala Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(337, 'Sekretaris Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(338, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(339, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(340, 'Kepala Bidang Pemberdayaan Perempuan dan Kesetaraan Gender pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(341, 'Kepala Seksi Pemberdayaan Perempuan pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(342, 'Kepala Seksi Kesetaraan dan Informasi Gender pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(343, 'Kepala Bidang Perlindungan Perempuan dan Anak pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(344, 'Kepala Seksi Perlindungan Perempuan dan Anak pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(345, 'Kepala Seksi Pemenuhan Hak Anak dan Tumbuh Kembang Anak pada Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(346, 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(347, 'Sekretaris Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(348, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(349, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(350, 'Kepala Bidang Penanaman Modal pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(351, 'Kepala Seksi Pengembangan Iklim Penanaman Modal pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(352, 'Kepala Seksi Promosi dan Pengendalian Pelaksanaan Penanaman Modal pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00');
INSERT INTO `z_jabatans` (`id_jabatan`, `nama_jabatan`, `jenis_jab`, `created_at`, `updated_at`) VALUES
(353, 'Kepala Bidang Pelayanan Terpadu pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(354, 'Kepala Seksi Verifikasi pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(355, 'Kepala Seksi Penetapan dan Penerbitan pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(356, 'Kepala Bidang Data, Informasi dan Pengaduan pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(357, 'Kepala Seksi Data dan Sistem Informasi pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(358, 'Kepala Seksi Penanganan Pengaduan pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(359, 'Kepala Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(360, 'Sekretaris Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(361, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(362, 'Kepala Sub Bagian Keuangan pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(363, 'Kepala Sub Bagian Penyusunan Program pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(364, 'Kepala Bidang Pembinaan Paud dan Dikmas pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(365, 'Kepala Seksi Pembinaan Paud pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(366, 'Kepala Seksi Pembinaan Dikmas pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(367, 'Kepala Seksi Prasarana Paud dan Dikmas pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(368, 'Kepala Bidang Pembinaan Pendidikan Dasar pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(369, 'Kepala Seksi Pembinaan SD dan Layanan Khusus pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(370, 'Kepala Seksi Pembinaan SMP dan Layanan Khusus pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(371, 'Kepala Seksi Sarana Prasarana Pendidikan Dasar pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(372, 'Kepala Bidang Kebudayaan pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(373, 'Kepala Seksi Pelestarian Cagar Budaya dan Museum pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(374, 'Kepala Seksi Sejarah dan Tradisi pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(375, 'Kepala Seksi Kesenian pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(376, 'Kepala Bidang Pembinaan Pendidik dan Tenaga Kependidikan pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(377, 'Kepala Seksi Pembinaan PTK dan Paud, Dikmas dan Tenaga Kebudayaan pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(378, 'Kepala Seksi Pembinaan PTK Sekolah Dasar pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(379, 'Kepala Seksi Pembinaan PTK Sekolah Menengah Pertama pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(380, 'Kepala UPTD Sanggar Kegiatan Belajar pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(381, 'Kepala Sub Bagian Tata Usaha UPTD Sanggar Kegiatan Belajar pada Dinas Pendidikan dan Kebudayaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(382, 'Kepala Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(383, 'Sekretaris Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(384, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(385, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(386, 'Kepala Bidang Penendalian Penduduk, Penyuluhan dan Penggerakan pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(387, 'Kepala Seksi Advokasi dan Penggerakan pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(388, 'Kepala Seksi Penyuluhan dan Pendayagunaan PLKB dan Kader KB pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(389, 'Kepala Seksi Pengendalian Penduduk dan Informasi Keluarga pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(390, 'Kepala Bidang Keluarga Berencana, Ketahanan dan Kesejahteraan pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(391, 'Kepala Seksi Jaminan Ber-KB pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(392, 'Kepala Seksi Pembinaan Kesertaan Ber-KB pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(393, 'Kepala Seksi Ketahanan dan Kesejahteraan pada Dinas Pengendalian Penduduk dan Keluarga Berencana', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(394, 'Kepala Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(395, 'Sekretaris Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(396, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(397, 'Kepala Sub Bagian Keuangan pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(398, 'Kepala Sub Bagian Penyusunan Program pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(399, 'Kepala Bidang Perdagangan pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(400, 'Kepala Seksi Bina Usaha Perdagangan pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(401, 'Kepala Seksi Promosi dan Pengembangan Ekspor pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(402, 'Kepala Seksi Distribusi dan Informasi Perdagangan pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(403, 'Kepala Bidang Metrologi pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(404, 'Kepala Seksi Metrologi Legal pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(405, 'Kepala Seksi Pengawasan Kemetrologian pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(406, 'Kepala Bidang Pasar pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(407, 'Kepala Seksi Pengelolaan Pasar pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(408, 'Kepala Seksi Pengembangan dan Penataan Pasar pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(409, 'Kepala Bidang Perindustrian pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(410, 'Kepala Seksi Industri Agro dan Kimia pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(411, 'Kepala Seksi Industri Logam, Mesin, Elektronik, Tekstil dan Aneka pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(412, 'Kepala Seksi Industri Hasil Hutan pada Dinas Perdagangan dan Perindustrian', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(413, 'Kepala Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(414, 'Sekretaris Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(415, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(416, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(417, 'Kepala Bidang Lalu Lintas dan Angkutan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(418, 'Kepala Seksi Lalu Lintas pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(419, 'Kepala Seksi Angkutan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(420, 'Kepala Seksi Sarana Pengujian dan Pengembangan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(421, 'Kepala Bidang Prasarana dan Keselamatan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(422, 'Kepala Seksi Prasarana pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(423, 'Kepala Seksi Keselamatan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(424, 'Kepala Kelompok Jabatan Fungsional pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(425, 'Kepala UPTD Pelabuhan Jangkar pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(426, 'Kepala Sub Bagian Tata Usaha UPTD Pelabuhan Jangkar pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(427, 'Kepala UPTD Pelabuhan Panarukan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(428, 'Kepala Sub Bagian Tata Usaha UPTD Pelabuhan Panarukan pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(429, 'Kepala UPTD Pengujian Kendaraan Bermotor pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(430, 'Kepala Sub Bagian Tata Usaha UPTD Pngujian Kndaraan Bermotor pada Dinas Perhubungan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(431, 'Kepala Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(432, 'Sekretaris Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(433, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(434, 'Kepala Sub Bagian Keuangan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(435, 'Kepala Sub Bagian Penyusunan Program pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(436, 'Kepala Bidang Pemberdayaan Nelayan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(437, 'Kepala Seksi Peningkatan Kapasitas dan Pendampingan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(438, 'Kepala Seksi Kemitraan Nelayan, Penerapan IPTEK dan Lingkungan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(439, 'Kepala Seksi Kelembagaan dan Pengelolaan TPI pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(440, 'Kepala Bidang Perikanan Budidaya pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(441, 'Kepala Seksi Produksi Perikanan Budidaya pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(442, 'Kepala Seksi Kemitraan Usaha Budidaya dan Penerapan IPTEK pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(443, 'Kepala Seksi Pakan, Kesehatan Ikan dan Lingkungan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(444, 'Kepala Bidang Usaha Perikanan dan Pengendalian Sumberdaya Perairan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(445, 'Kepala Seksi Pengolahan dan Pemasaran Hasil Perikanan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(446, 'Kepala Seksi Pengawasan Usaha dan Hasil Perikanan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(447, 'Kepala Seksi Pengendalian Sumberdaya Perairan pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(448, 'Kepala UPTD Pusat Pendaratan Ikan Besuki pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(449, 'Kepala Sub Bagian TU UPTD Pusat Pendaratan Ikan Besuki pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(450, 'Kepala UPTD Pusat Pendaratan Ikan Pondok Mimbo pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(451, 'Kepala Sub Bagian TU UPTD Pusat Pendaratan Ikan Pondok Mimbo pada Dinas Perikanan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(452, 'Kepala Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(453, 'Sekretaris Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(454, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(455, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(456, 'Kepala Bidang Perpustakaan pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(457, 'Kepala Seksi Koleksi, Pelestarian dan Pengolahan Bahan Pustaka pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(458, 'Kepala Seksi Layanan, Otomasi, Kerja Sama, Pembinaan dan Pengembangan pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(459, 'Kepala Seksi Pembinaan Pengembangan Tenaga Perpustakaan Budaya Literasi pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(460, 'Kepala Bidang Kearsipan pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(461, 'Kepala Seksi Pembinaan Kearsipan pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(462, 'Kepala Seksi Pengawasan Kearsipan pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(463, 'Kepala Seksi Pengelolaan Arsip pada Dinas Perpustakaan dan Kearsipan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(464, 'Kepala Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(465, 'Sekretaris Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(466, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(467, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(468, 'Kepala Bidang Perumahan dan Permukiman pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(469, 'Kepala Seksi Perumahan pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(470, 'Kepala Seksi Permukiman pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(471, 'Kepala Seksi Pengembangan Kawasan pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(472, 'Kepala Bidang Pertamanan dan PJU pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(473, 'Kepala Seksi Pertamanan dan Pemakaman pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(474, 'Kepala Seksi Penerangan Jalan Umum pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(475, 'Kepala Seksi Perencanaan dan Pengembangan pada Dinas Perumahan dan Kawasan Permukiman', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(476, 'Kepala Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(477, 'Sekretaris Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(478, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(479, 'Kepala Sub Bagian Keuangan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(480, 'Kepala Sub Bagian Penyusunan Program pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(481, 'Kepala Bidang perbibitan dan Produksi Peternakan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(482, 'Kepala Seksi Perbibitan dan Kawasan Peternakan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(483, 'Kepala Seksi Pakan dan Teknologi Peternakan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(484, 'Kepala Seksi Budidaya dan Produksi Ternak pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(485, 'Kepala Bidang Kesehatan Hewa dan Masyarakat Veteriner pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(486, 'Kepala Seksi Pengamatan Penyakit Hewan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(487, 'Kepala Seksi Pencegahan, Pengendalian dan Penanggulangan Penyakit Hewan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(488, 'Kepala Seksi Kesehatan Masyarakat Veteriner pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(489, 'Kepala Bidang Sarana Prasarana dan Pemsaran Hasil Peternakan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(490, 'Kepala Seksi Sarana Prasarana dan Standarisasi Mutu pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(491, 'Kepala Seksi Pengolahan dan Pemasaran Hasil Peternakan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(492, 'Kepala Seksi Investasi Usaha dan Kelembagaan pada Dinas Peternakan dan Kesehatan Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(493, 'Kepala UPT Pasar Hewan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(494, 'Kepala Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(495, 'Sekretaris Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(496, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(497, 'Kepala Sub Bagian Keuangan pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(498, 'Kepala Sub Bagian Penyusunan Program pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(499, 'Kepala Bidang Perlindungan dan Jaminan Sosial pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(500, 'Kepala Seksi Korban Bencana Alam pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(501, 'Kepala Seksi Korban Bencana Sosial pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(502, 'Kepala Seksi Jaminan Sosial Keluarga pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(503, 'Kepala Bidang Rehabilitasi Sosial pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(504, 'Kepala Seksi Anak dan Lanjut Usia pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(505, 'Kepala Seksi Penyandang Desabilitas pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(506, 'Kepala Seksi Tuna Sosial pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(507, 'Kepala Bidang Pemberdayaan Sosial dan Penanganan Fakir Misin pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(508, 'Kepala Seksi Identifikasi dan Penguatan Kapasitas pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(509, 'Kepala Seksi Pemberdayaan Masyarakat, Penyaluran Bantuan Stimulan dan Penataan Lingkungan pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(510, 'Kepala Seksi Kelembagaan, Kepahlawanan dan Restorasi Sosial pada Dinas Sosial', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(511, 'Kepala Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(512, 'Sekretaris Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(513, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(514, 'Kepala Sub Bagian Keuangan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(515, 'Kepala Sub Bagian Penyusunan Program pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(516, 'Kepala Bidang Tanaman Pangan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(517, 'Kepala Seksi Sarana Prasarana Tanaman Pangan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(518, 'Kepala Seksi Produksi Tanaman Pangan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(519, 'Kepala Bidang Holtikultura pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(520, 'Kepala Seksi Sarana Prasarana Holtikultura pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(521, 'Kepala Seksi Produksi Holtikultura pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(522, 'Kepala Bidang Perkebunan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(523, 'Kepala Seksi Sarana Prasarana Perkebunan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(524, 'Kepala Seksi Produksi Perkebunan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(525, 'Kepala Bidang Penyuluhan Pertanian pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(526, 'Kepala Seksi Ketenagaan dan Kelembagaan pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(527, 'Kepala Seksi Metode dan Informasi pada Dinas Tanaman Pangan,Hortikultura dan Perkebunan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(528, 'Kepala Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(529, 'Sekretaris Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(530, 'Kepala Sub Bagian Umum dan Kepegawaian pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(531, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(532, 'Kepala Bidang Pelatihan Kerja dan Produktivitas pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(533, 'Kepala Seksi Penyelengaraan Pelatihan dan Produktivitas Kerja pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(534, 'Kepala Seksi Transmigrasi pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(535, 'Kepala Bidang Penempatan Tenaga Kerja dan Perluasan Kesempatan Kerja pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(536, 'Kepala Seksi Penempatan Tenaga Kerja pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(537, 'Kepala Seksi Pengembangan dan Perluasan Kesempatan Kerja pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(538, 'Kepala Bidang Hubungan Industrial dan Jaminan Sosial Tenaga Kerja pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(539, 'Kepala Seksi Persyaratan Kerja dan Penyelesaian Perselisihan Hubungan Industrial pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(540, 'Kepala Seksi Pengupahan dan Jaminan Sosial Tenaga Kerja pada Dinas Tenaga Kerja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(541, 'Kepala Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(542, 'Sekretaris Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(543, 'Kepala Sub Bagian Umum dan Kepegawaian pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(544, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(545, 'Kepala Bidang Penegakan Peraturan Perundang-Undangan Daerah pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(546, 'Kepala Seksi Penyelidikan dan Penyidikan pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(547, 'Kepala Seksi Pembinaan,Pengawasan dan Penyuluhan pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(548, 'Kepala Bidang Ketertiban Umum dan Ketentraman Rakyat pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(549, 'Kepala Seksi Operasional dan Pengendalian pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(550, 'Kepala Seksi Sumberdaya Aparatur dan Kerjasama pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(551, 'Kepala Bidang Perlindungan Masyarakat dan Kebakaran pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(552, 'Kepala Seksi Perlindungan Masyarakat dan Bina Potensi Masyarakat pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(553, 'Kepala Seksi Pemadam Kebakaran dan Penyelamatan pada Satuan Polisi Pamong Praja', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(554, 'Sekretaris Komisi Pemilihan Umum Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(555, 'Kepala Sub Bagian Umum Sekretariat pada Sekretariat Komisi Pemilihan Umum Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(556, 'Kepala Sub Bagian Penyelenggaraan Pemilu pada Sekretariat Komisi Pemilihan Umum Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(557, 'Kepala Sub Bagian Penyusunan Program pada Sekretariat Komisi Pemilihan Umum Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(558, 'Kepala Sub Bagian Penerangan & Hukum pada Sekretariat Komisi Pemilihan Umum Daerah', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(559, 'Kepala Bagian Tata Usaha pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(560, 'Kepala Sub Bagian Perencanaan, Evaluasi Dan Pelaporan pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(561, 'Kepala Sub Bagian Umum pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(562, 'Kepala Sub Bagian Kepegawaian pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(563, 'Kepala Bidang Pelayanan pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(564, 'Kepala Seksi Medis pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(565, 'Kepala Seksi Keperawatan pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(566, 'Kepala Bidang Penunjang pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(567, 'Kepala Seksi Penunjang Medis pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(568, 'Kepala Seksi Penunjang Non Medis pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(569, 'Kepala Bidang Keuangan pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(570, 'Kepala Seksi Perbendaharaan pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(571, 'Kepala Seksi Pengelolaan Dana Intern pada UPT Rumah Sakit Umum Daerah (RSUD) dr. Abdoer Rahem', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(572, 'Kepala Sub Bagian TU pada UPT RSUD Asembagus Tipe D', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(573, 'Kepala Seksi Pelayanan Medis dan Keperawatan pada UPT RSUD Asembagus Tipe D', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(574, 'Kepala Seksi Penunjang Medis&Penunjang Non Medis pada UPT RSUD Asembagus Tipe D', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(575, 'Camat Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(576, 'Sekretaris Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(577, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(578, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(579, 'Kepala Seksi Pemerintahan pada Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(580, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(581, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(582, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Situbondo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(583, 'Lurah Patokan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(584, 'Sekretaris Kelurahan Patokan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(585, 'Kepala Seksi Pemerintahan pada Kelurahan Patokan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(586, 'Kepala Seksi Ekonomi dan Pembangunan pada Kelurahan Patokan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(587, 'Kepala Seksi Sosial pada Kelurahan Patokan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(588, 'Lurah Dawuhan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(589, 'Sekretaris Kelurahan Dawuhan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(590, 'Kepala Seksi Pemerintahan pada Kelurahan Dawuhan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(591, 'Kepala Seksi Ekonomi dan Pembangunan pada Kelurahan Dawuhan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(592, 'Kepala Seksi Sosial pada Kelurahan Dawuhan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(593, 'Camat Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(594, 'Sekretaris Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(595, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(596, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(597, 'Kepala Seksi Pemerintahan pada Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(598, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(599, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(600, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Panji', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(601, 'Lurah Ardirejo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(602, 'Sekretaris Kelurahan Ardirejo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(603, 'Kepala Seksi Pemerintahan pada Kelurahan Ardirejo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(604, 'Kepala Seksi Ekonomi dan Pembangunan pada Kelurahan Ardirejo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(605, 'Kepala Seksi Sosial pada Kelurahan Ardirejo', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(606, 'Lurah Mimbaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(607, 'Sekretaris Kelurahan Mimbaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(608, 'Kepala Seksi Pemerintahan pada Kelurahan Mimbaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(609, 'Kepala Seksi Ekonomi dan Pembangunan pada Kelurahan Mimbaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(610, 'Kepala Seksi Sosial pada Kelurahan Mimbaan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(611, 'Camat Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(612, 'Sekretaris Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(613, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(614, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(615, 'Kepala Seksi Pemerintahan pada Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(616, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(617, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(618, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Arjasa', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(619, 'Camat Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(620, 'Sekretaris Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(621, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(622, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(623, 'Kepala Seksi Pemerintahan pada Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(624, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(625, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(626, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Asembagus', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(627, 'Camat Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(628, 'Sekretaris Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(629, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(630, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(631, 'Kepala Seksi Pemerintahan pada Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(632, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(633, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(634, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Banyuglugur', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(635, 'Camat Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(636, 'Sekretaris Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(637, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(638, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(639, 'Kepala Seksi Pemerintahan pada Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(640, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(641, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(642, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Banyuputih', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(643, 'Camat Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(644, 'Sekretaris Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(645, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(646, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(647, 'Kepala Seksi Pemerintahan pada Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(648, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(649, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(650, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Besuki', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(651, 'Camat Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(652, 'Sekretaris Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(653, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(654, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(655, 'Kepala Seksi Pemerintahan pada Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(656, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(657, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(658, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Bungatan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(659, 'Camat Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(660, 'Sekretaris Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(661, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(662, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(663, 'Kepala Seksi Pemerintahan pada Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(664, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(665, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(666, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Jangkar', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(667, 'Camat Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(668, 'Sekretaris Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(669, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(670, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(671, 'Kepala Seksi Pemerintahan pada Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(672, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(673, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(674, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Jatibanteng', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(675, 'Camat Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(676, 'Sekretaris Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(677, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(678, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(679, 'Kepala Seksi Pemerintahan pada Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(680, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(681, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(682, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Kapongan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(683, 'Camat Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(684, 'Sekretaris Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(685, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(686, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(687, 'Kepala Seksi Pemerintahan pada Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(688, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(689, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(690, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Kendit', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(691, 'Camat Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(692, 'Sekretaris Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(693, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(694, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(695, 'Kepala Seksi Pemerintahan pada Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(696, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(697, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(698, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Mangaran', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(699, 'Camat Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(700, 'Sekretaris Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(701, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(702, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(703, 'Kepala Seksi Pemerintahan pada Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(704, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(705, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(706, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Mlandingan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(707, 'Camat Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(708, 'Sekretaris Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(709, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(710, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(711, 'Kepala Seksi Pemerintahan pada Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(712, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(713, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(714, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Panarukan', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(715, 'Camat Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(716, 'Sekretaris Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(717, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(718, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(719, 'Kepala Seksi Pemerintahan pada Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(720, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(721, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(722, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Suboh', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(723, 'Camat Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(724, 'Sekretaris Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(725, 'Kepala Sub Bagian Umum dan Kepegawaian pada Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(726, 'Kepala Sub Bagian Penyusunan Program dan Keuangan pada Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(727, 'Kepala Seksi Pemerintahan pada Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(728, 'Kepala Seksi Perekonomian dan Pembangunan pada Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(729, 'Kepala Seksi Kesejahteraan Rakyat pada Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00'),
(730, 'Kepala Seksi Ketentraman dan Ketertiban pada Kecamatan Sumbermalang', 'STR', '2018-10-28 16:17:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `z_jabfungs`
--

CREATE TABLE `z_jabfungs` (
  `id_jabfung` int(11) NOT NULL,
  `kd_struktur` int(11) NOT NULL,
  `kd_fungsional` int(11) NOT NULL,
  `kode_jabatan` varchar(100) NOT NULL,
  `jenis_jabatan` varchar(200) NOT NULL,
  `ikhtisar_jabatan` varchar(200) NOT NULL,
  `pendidikan` varchar(200) NOT NULL,
  `diklat` varchar(200) NOT NULL,
  `pengalaman` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_jabfungs`
--

INSERT INTO `z_jabfungs` (`id_jabfung`, `kd_struktur`, `kd_fungsional`, `kode_jabatan`, `jenis_jabatan`, `ikhtisar_jabatan`, `pendidikan`, `diklat`, `pengalaman`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '', '', '', '', '', '', '2018-10-29 07:33:47', '2018-10-29 07:33:47'),
(2, 5, 1, '', '', '', '', '', '', '2018-11-07 19:32:27', '2018-11-07 19:32:27'),
(3, 5, 2, '', '', '', '', '', '', '2018-11-07 20:46:38', '2018-11-07 20:46:38'),
(4, 6, 2, '', '', '', '', '', '', '2018-11-07 20:55:01', '2018-11-07 20:55:01'),
(5, 28, 1, '', '', '', '', '', '', '2018-11-28 04:12:13', '2018-11-28 04:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `z_menus`
--

CREATE TABLE `z_menus` (
  `id_menu` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `menu_link` varchar(200) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `list_unker` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_menus`
--

INSERT INTO `z_menus` (`id_menu`, `id_parent`, `menu`, `menu_link`, `icon`, `list_unker`, `created_at`, `updated_at`) VALUES
(1, 0, 'Home', 'home', 'fa fa-home', 0, '2018-10-25 17:12:48', '0000-00-00 00:00:00'),
(3, 0, 'Daftar Unit Kerja', 'organisasi/unit_kerja', 'fa fa-bank', 0, '2018-10-25 17:13:10', '0000-00-00 00:00:00'),
(4, 0, 'Struktur Organisasi', 'organisasi/struktur', 'fa fa-cubes', 1, '2018-10-28 07:06:49', '0000-00-00 00:00:00'),
(5, 0, 'Daftar Jabatan', 'musjab/daftar_jabatan', 'ti-reload', 0, '2018-10-26 12:27:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `z_m_fungsionals`
--

CREATE TABLE `z_m_fungsionals` (
  `id_fungsional` int(11) NOT NULL,
  `nama_fungsional` varchar(200) NOT NULL,
  `urusan_pemerintahan` text NOT NULL,
  `kualifikasi_pendidikan` text NOT NULL,
  `tugas_jabatan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_m_fungsionals`
--

INSERT INTO `z_m_fungsionals` (`id_fungsional`, `nama_fungsional`, `urusan_pemerintahan`, `kualifikasi_pendidikan`, `tugas_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Analis Akuntabilitas Kinerja Aparatur', 'Perencanaan', 'Sarjana (S1)/ Diploma IV di bidang Ekonomi pembangunan/ Akuntansi/ Manajemen/ Ilmu administrasi atau bidang lain yang relevan dengan tugas jabatan', 'Melakukan kegiatan yang meliputi pengumpulan, pengklasifikasian dan penelaahan untuk menyimpulkan dan menyusun rekomendasi di bidang akuntabilitas kinerja aparatur\r\n', '2018-10-29 13:50:09', '0000-00-00 00:00:00'),
(2, 'Analis Kemitraan\r\n', 'Perencanaan', 'Sarjana (S1)/ Diploma IV di bidang Ekonomi pembangunan/ Akuntansi/ Manajemen atau bidang lain yang relevan dengan tugas jabatan', 'Melakukan kegiatan yang\r\nmeliputi pengumpulan, pengklasifikasian dan penelaahan untuk menyimpulkan dan menyusun rekomendasi di bidang kemitraan', '2018-11-08 03:46:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `z_strukturs`
--

CREATE TABLE `z_strukturs` (
  `id_struktur` int(11) NOT NULL,
  `id_unker` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `judul_organisasi` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `head` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_strukturs`
--

INSERT INTO `z_strukturs` (`id_struktur`, `id_unker`, `child`, `judul_organisasi`, `jabatan`, `head`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '', '70', 1, '2018-10-28 10:58:59', '2018-10-28 10:58:59'),
(2, 1, 1, '', '71', 1, '2018-10-28 18:04:16', '2018-10-28 11:01:15'),
(3, 1, 1, '', '78', 1, '2018-10-28 18:04:19', '2018-10-28 11:01:29'),
(4, 1, 1, '', '74', 1, '2018-10-28 18:04:20', '2018-10-28 11:01:47'),
(5, 1, 2, '', '72', 1, '2018-10-28 18:04:48', '2018-10-28 11:02:06'),
(6, 1, 2, '', '73', 1, '2018-10-28 18:04:51', '2018-10-28 11:02:21'),
(7, 1, 3, '', '80', 1, '2018-10-28 18:05:11', '2018-10-28 11:02:40'),
(8, 1, 3, '', '81', 1, '2018-10-28 18:05:17', '2018-10-28 11:02:50'),
(9, 1, 4, '', '77', 1, '2018-10-28 18:05:25', '2018-10-28 11:02:59'),
(10, 1, 4, '', '75', 1, '2018-10-28 18:05:27', '2018-10-28 11:03:12'),
(11, 2, 0, '', '265', 1, '2018-10-28 16:10:59', '2018-10-28 16:10:59'),
(12, 3, 0, '', '494', 1, '2018-10-28 17:35:15', '2018-10-28 17:35:15'),
(13, 4, 0, '', '431', 1, '2018-10-28 17:39:45', '2018-10-28 17:39:45'),
(15, 5, 0, '', '278', 1, '2018-10-28 19:42:37', '2018-10-28 19:42:37'),
(16, 5, 15, '', '279', 1, '2018-10-28 19:42:55', '2018-10-28 19:42:55'),
(17, 5, 16, '', '280', 1, '2018-10-28 19:43:17', '2018-10-28 19:43:17'),
(18, 5, 16, '', '281', 1, '2018-10-28 19:43:36', '2018-10-28 19:43:36'),
(20, 6, 0, '', '224', 1, '2018-10-29 00:57:24', '2018-10-29 00:57:24'),
(21, 6, 20, '', '225', 1, '2018-10-29 00:57:43', '2018-10-29 00:57:43'),
(22, 6, 21, '', '226', 1, '2018-10-29 00:58:10', '2018-10-29 00:58:10'),
(23, 6, 21, '', '227', 1, '2018-10-29 00:58:26', '2018-10-29 00:58:26'),
(24, 6, 20, '', '228', 1, '2018-10-29 01:00:20', '2018-10-29 01:00:20'),
(25, 1, 1, '', '82', 1, '2018-10-29 01:15:02', '2018-10-29 01:15:02'),
(26, 1, 25, '', '79', 1, '2018-10-29 01:15:30', '2018-10-29 01:15:30'),
(27, 3, 12, '', '495', 1, '2018-11-28 04:11:26', '2018-11-28 04:11:26'),
(28, 3, 27, '', '496', 1, '2018-11-28 04:11:51', '2018-11-28 04:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `z_unit_kerjas`
--

CREATE TABLE `z_unit_kerjas` (
  `id_unker` int(11) NOT NULL,
  `unit_kerja` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_unit_kerjas`
--

INSERT INTO `z_unit_kerjas` (`id_unker`, `unit_kerja`, `created_at`, `updated_at`) VALUES
(1, 'Badan Kepegawaian Daerah dan Sumber Daya Manusia', '2018-10-26 02:46:51', '2018-10-25 19:46:51'),
(2, 'Dinas Lingkungan Hidup', '2018-10-25 10:59:38', '2018-10-25 10:59:38'),
(3, 'Dinas Sosial', '2018-10-25 20:15:38', '2018-10-25 20:15:38'),
(4, 'Dinas Perikanan', '2018-10-25 20:15:53', '2018-10-25 20:15:53'),
(5, 'Dinas Pariwisata', '2018-10-28 00:11:23', '2018-10-28 00:11:23'),
(6, 'Dinas Ketahanan Pangan', '2018-10-28 20:10:00', '2018-10-28 20:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `z_jabatans`
--
ALTER TABLE `z_jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `z_jabfungs`
--
ALTER TABLE `z_jabfungs`
  ADD PRIMARY KEY (`id_jabfung`);

--
-- Indexes for table `z_menus`
--
ALTER TABLE `z_menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `z_m_fungsionals`
--
ALTER TABLE `z_m_fungsionals`
  ADD PRIMARY KEY (`id_fungsional`);

--
-- Indexes for table `z_strukturs`
--
ALTER TABLE `z_strukturs`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `z_unit_kerjas`
--
ALTER TABLE `z_unit_kerjas`
  ADD PRIMARY KEY (`id_unker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `z_jabatans`
--
ALTER TABLE `z_jabatans`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT for table `z_jabfungs`
--
ALTER TABLE `z_jabfungs`
  MODIFY `id_jabfung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `z_menus`
--
ALTER TABLE `z_menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `z_m_fungsionals`
--
ALTER TABLE `z_m_fungsionals`
  MODIFY `id_fungsional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `z_strukturs`
--
ALTER TABLE `z_strukturs`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `z_unit_kerjas`
--
ALTER TABLE `z_unit_kerjas`
  MODIFY `id_unker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
