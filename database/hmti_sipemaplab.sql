-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 03:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmti_sipemaplab`
--

-- --------------------------------------------------------

--
-- Table structure for table `absenlab_tbl`
--

CREATE TABLE `absenlab_tbl` (
  `absenlab_id` int(11) NOT NULL,
  `absenlab_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `absenlab_alasan` varchar(50) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `aslab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absenlab_tbl`
--

INSERT INTO `absenlab_tbl` (`absenlab_id`, `absenlab_time`, `absenlab_alasan`, `mahasiswa_id`, `aslab_id`) VALUES
(53, '2020-08-24 13:45:15', 'halo', 2, 3),
(54, '2020-08-24 13:48:11', 'csa', 2, 3),
(55, '2020-08-24 13:48:15', 'csa', 2, 3),
(56, '2020-08-24 13:48:37', 'sad', 2, 3),
(57, '2020-08-24 13:50:48', 'scs', 2, 3),
(58, '2020-08-24 13:56:07', 'asc', 2, 3),
(59, '2020-08-24 13:56:25', 'sc', 2, 3),
(60, '2020-08-24 14:00:15', 'asc', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aslab_tbl`
--

CREATE TABLE `aslab_tbl` (
  `aslab_id` int(11) NOT NULL,
  `aslab_nim` char(15) NOT NULL,
  `aslab_nama` varchar(50) NOT NULL,
  `aslab_angkatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aslab_tbl`
--

INSERT INTO `aslab_tbl` (`aslab_id`, `aslab_nim`, `aslab_nama`, `aslab_angkatan`) VALUES
(1, 'E1E117065', 'TIYAN', 2017),
(3, 'E1E117040', 'Muhamad Danil', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `dosenlab_tbl`
--

CREATE TABLE `dosenlab_tbl` (
  `dosenlab_id` int(11) NOT NULL,
  `dosenlab_nip` int(20) NOT NULL,
  `dosenlab_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosenlab_tbl`
--

INSERT INTO `dosenlab_tbl` (`dosenlab_id`, `dosenlab_nip`, `dosenlab_nama`) VALUES
(1, 12345679, 'Statiswati, ST');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `employee_position` varchar(200) NOT NULL,
  `employee_nip` varchar(50) NOT NULL,
  `employee_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`employee_id`, `employee_name`, `employee_position`, `employee_nip`, `employee_picture`) VALUES
(1, 'Ir. NISMAWATI, M.Si', 'Kepala Dinas', '19690302 199401 2 001', ''),
(2, 'H. SUGIANTO, SH', 'Sekretaris', '19680513 198810 1 001', 'employee-19680513_198810_1_001-2019121216320657549.jpeg'),
(3, 'HARIANI. R, SH, M.Si', 'Sub Bagian Umum Dan Kepegawaian', '19671001 200212 2 006', ''),
(4, 'INDRIATI HAMRA, SE, M.Si', 'Sub Bagian Perencanaan Pelaporan & Keuangan', '19690115 200212 2 001', 'employee-19690115_200212_2_001-2019121216325690486.jpeg'),
(5, 'HAERUL UMAM, S.IP', 'Pj. Sub Bagian Sarana dan Prasarana', '198012132007011008', 'employee-198012132007011008-2019121216332395706.jpeg'),
(6, 'RATNA SAKAY, S.Si, MT', 'Bidang Tata Lingkungan', '19720213 200003 2 002', 'employee-19720213_200003_2_002-2019121216334973390.jpeg'),
(7, 'ARIFIN, S.Hut, M.Si', 'Bidang Peningkatan Kapasitas dan Pemantauan Lingkungan', '19710622 199803 1 009', 'employee-19710622_199803_1_009-2019121216340564956.jpeg'),
(8, 'PRAYITNO RIADI, S.Si', 'Bidang Persampahan dan Limbah B3', '19691217 199008 1 001', 'employee-19691217_199008_1_001-2019121307383592901.jpeg'),
(9, 'TAJWID, S.Sos', 'Bidang Kebersihan', '19690307 200604 1 013', 'employee-19690307_200604_1_013-2019121307390665468.jpeg'),
(10, 'Drs. LA ETE', 'Seksi Inventarisasi, RPPLH dan KLHS', '19631230 200312 1 002', 'employee-19631230_200312_1_002-2019121307521960706.png'),
(11, 'ZULKARNAIM, SP, M.Si', 'Seksi Pemantauan,Pencemaran & Kerusakan Lingkungan', '19741211 199503 1 004', 'employee-19741211_199503_1_004-2019121307411512784.jpeg'),
(12, 'ISHAK BAFADAL, S.ST, MT', 'Seksi Pengurangan Sampah dan Limbah B3', '19770512 200502 1 004', ''),
(13, 'LA SANIFU, SH', 'Seksi Kebersihan Lingkungan', '19691231 200701 1 191', 'employee-19691231_200701_1_191-2019121307520098498.png'),
(14, 'ARNIATY DAENG KANANG, SP, M.Si', 'Seksi Kajian Dampak Lingkungan Hidup', '19780920 201101 2 006', 'employee-19780920_201101_2_006-2019121307422518499.jpeg'),
(15, 'H. KASMAN KASIM MAREWA', 'Seksi Peningkatan Kapasitas', '19851029 201407 1 001', 'employee-19851029_201407_1_001-2019121307425482371.jpeg'),
(16, 'SUHARDIN TAHERONG, SE', 'Seksi Penanganan Sampah', '19810505 200312 1 006', 'employee-19810505_200312_1_006-2019121307432210265.jpeg'),
(17, 'HASIDIN, SE', 'Seksi Drainase, Kali dan Sungai', '19631011 200212 1 006', 'employee-19631011_200212_1_006-2019121307440164913.jpeg'),
(18, 'HARIS SARIHI, SP', 'Seksi Pemeliharan Lingkungan dan RTH', '19800115 200901 1 010', 'employee-19800115_200901_1_010-2019121307444214954.jpeg'),
(19, 'IRAWAN, SP.', 'Seksi Penaatan Lingkungan', '19770512 200801 1 015', 'employee-19770512_200801_1_015-2019121307450782633.jpeg'),
(20, 'ABDULLAH. S, SE', 'Seksi Pengelolaan TPA', '19650805 198611 1 002', 'employee-19650805_198611_1_002-2019121307453679926.jpeg'),
(21, 'HENDRO, ST', 'Seksi Kebersihan Teluk dan Pesisir', '19680612 200701 1 067', 'employee-19680612_200701_1_067-2019121307523626154.png'),
(22, 'ABDUL GAFAR, SP.', 'Pj. Ka UPTD KEBUN RAYA KENDARI', '19661015 201407 1 002', ''),
(23, 'BURHAN AKZAR U, S.Pt', 'Ka UPTD LABORATORIUM', '19730103 200212 1 007', 'employee-19730103_200212_1_007-2019121307464993516.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tbl`
--

CREATE TABLE `gallery_tbl` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(200) NOT NULL,
  `gallery_file` text NOT NULL,
  `gallery_category` varchar(20) NOT NULL,
  `gallery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_tbl`
--

INSERT INTO `gallery_tbl` (`gallery_id`, `gallery_name`, `gallery_file`, `gallery_category`, `gallery_date`) VALUES
(1, 'hadiah', 'gallery-gambar-2020082201293528261.jpg', 'gambar', '2020-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE `group_tbl` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_tbl`
--

INSERT INTO `group_tbl` (`group_id`, `group_name`) VALUES
(1, 'Administrator'),
(2, 'Dosen Laboratorium'),
(3, 'Asisten Laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `log_id` int(11) NOT NULL,
  `log_message` text NOT NULL,
  `log_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_tbl`
--

INSERT INTO `log_tbl` (`log_id`, `log_message`, `log_time`, `user_id`) VALUES
(1, 'Welly Sugeng. R melakukan login ke sistem', '2019-12-24 12:18:21', 3),
(2, 'Welly Sugeng. R melakukan login ke sistem', '2019-12-24 12:20:47', 3),
(3, 'Tambah Data Pengajuan Dokling ', '2019-12-24 13:19:22', 3),
(4, 'Update Data Pengajuan Dokling ', '2019-12-24 14:06:34', 3),
(5, 'Hj. SUleha Sanusi melakukan login ke sistem', '2019-12-24 14:15:45', 2),
(6, 'Welly Sugeng. R melakukan login ke sistem', '2019-12-24 14:16:04', 3),
(7, 'Tambah Data Pengajuan Matriks ', '2019-12-24 14:38:50', 3),
(8, 'Tambah Data Pengajuan Matriks ', '2019-12-24 14:48:09', 3),
(9, 'Tambah Data Pengajuan Matriks ', '2019-12-24 14:54:21', 3),
(10, 'Administrator Sistems melakukan login ke sistem', '2019-12-24 18:42:04', 1),
(11, 'Mengubah Data proper 1', '2019-12-24 19:08:25', 1),
(12, 'Welly Sugeng. R melakukan login ke sistem', '2019-12-24 19:12:06', 3),
(13, 'Welly Sugeng. R melakukan login ke sistem', '2019-12-25 10:27:24', 3),
(14, 'Update Data Pengajuan Matriks', '2019-12-25 10:50:25', 3),
(15, 'Menghapus Data Tahapan Matrix Konstruksi 2s', '2019-12-25 11:12:52', 3),
(16, 'Menghapus Data Proper Usaha Pengumpulan Limbah B3 (oli bekas) dan barang -barang khusus', '2019-12-25 11:48:28', 3),
(17, 'Tambah Data Pengajuan Dokling ', '2019-12-25 11:49:10', 3),
(18, 'Update Data Pengajuan Dokling', '2019-12-25 11:49:16', 3),
(19, 'Update Data Pengajuan Dokling', '2019-12-25 11:49:22', 3),
(20, 'Tambah Data Pengajuan Matriks ', '2019-12-25 11:49:50', 3),
(21, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 11:55:02', 1),
(22, 'Mengubah Data proper 1', '2019-12-25 11:58:03', 1),
(23, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 12:00:25', 1),
(24, 'Mengubah Data Aduan ', '2019-12-25 12:12:32', 1),
(25, 'Mengubah Data proper 1', '2019-12-25 12:23:19', 1),
(26, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 12:42:09', 1),
(27, 'Mengubah Data employee Ir. NISMAWATI, M.Si', '2019-12-25 12:43:37', 1),
(28, 'Hj. Suleha Sanusi melakukan login ke sistem', '2019-12-25 12:45:24', 2),
(29, 'Tambah Data Pengajuan Dokling ', '2019-12-25 12:46:15', 2),
(30, 'Tambah Data Pengajuan Matriks ', '2019-12-25 12:46:53', 2),
(31, 'Tambah Data Pengajuan Matriks ', '2019-12-25 12:47:13', 2),
(32, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 12:47:27', 1),
(33, 'Mengubah Data proper 2', '2019-12-25 12:47:57', 1),
(34, 'Indra Pratama Apsarton melakukan login ke sistem', '2019-12-25 13:10:04', 4),
(35, 'Tambah Data Pengajuan Dokling ', '2019-12-25 13:11:34', 4),
(36, 'Tambah Data Pengajuan Matriks ', '2019-12-25 13:12:09', 4),
(37, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 13:12:24', 1),
(38, 'Mengubah Data proper 3', '2019-12-25 13:13:23', 1),
(39, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 13:40:09', 1),
(40, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 20:42:58', 1),
(41, 'Welly Sugeng. R melakukan login ke sistem', '2019-12-25 20:47:46', 3),
(42, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 22:25:15', 1),
(43, 'Administrator Sistems melakukan login ke sistem', '2019-12-25 22:53:52', 1),
(44, 'Menambah Data Gallery Dinas Lingkungan Hidup dan Kehutanan', '2019-12-25 23:39:43', 1),
(45, 'Menambah Data slider xxx', '2019-12-26 00:34:17', 1),
(46, 'Mengubah Data slider Slider', '2019-12-26 00:34:46', 1),
(47, 'Mengedit Data User suleha', '2019-12-26 00:39:26', 1),
(48, 'Hj. Suleha Sanusi melakukan login ke sistem', '2019-12-26 01:27:57', 2),
(49, 'Administrator Sistems melakukan login ke sistem', '2019-12-26 01:32:23', 1),
(50, 'Hj. Suleha Sanusi melakukan login ke sistem', '2019-12-26 02:38:51', 2),
(51, 'Administrator Sistems melakukan login ke sistem', '2019-12-26 03:33:57', 1),
(52, 'Hj. Suleha Sanusi melakukan login ke sistem', '2019-12-26 03:46:56', 2),
(53, 'Tambah Data Pengajuan Dokling', '2019-12-26 03:47:39', 2),
(54, 'Administrator Sistems melakukan login ke sistem', '2019-12-26 03:48:22', 1),
(55, 'Mengubah Data proper 4', '2019-12-26 04:22:52', 1),
(56, 'Hj. Suleha Sanusi melakukan login ke sistem', '2019-12-26 05:28:53', 2),
(57, 'Administrator Sistems melakukan login ke sistem', '2019-12-27 06:27:45', 1),
(58, 'Menghapus Data gallery Dinas Lingkungan Hidup dan Kehutanan', '2019-12-27 06:28:56', 1),
(59, 'Administrator Sistems Update Profile', '2019-12-27 06:31:10', 1),
(60, 'Administrator Sistems melakukan login ke sistem', '2019-12-27 06:31:25', 1),
(61, 'Hj. Suleha Sanusi melakukan login ke sistem', '2019-12-27 06:40:09', 2),
(62, 'PT. Dhana Jaya Properti  melakukan login ke sistem', '2019-12-27 06:41:59', 5),
(63, 'Tambah Data Pengajuan Dokling ', '2019-12-27 06:48:05', 5),
(64, 'Irfandi Adriyanto Update Profile', '2019-12-27 06:48:17', 5),
(65, 'Tambah Data Pengajuan Matriks ', '2019-12-27 06:57:14', 5),
(66, 'Update Data Pengajuan Matriks', '2019-12-27 06:57:35', 5),
(67, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:00:32', 5),
(68, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:02:06', 5),
(69, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:04:45', 5),
(70, 'Administrator Sistems melakukan login ke sistem', '2019-12-27 07:07:57', 1),
(71, 'Mengubah Data proper 1', '2019-12-27 07:08:20', 1),
(72, 'Irfandi Adriyanto melakukan login ke sistem', '2019-12-27 07:08:53', 5),
(73, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:10:32', 5),
(74, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:11:31', 5),
(75, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:12:51', 5),
(76, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:13:56', 5),
(77, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:14:43', 5),
(78, 'Tambah Data Pengajuan Matriks ', '2019-12-27 07:15:50', 5),
(79, 'Administrator Sistems melakukan login ke sistem', '2019-12-27 07:16:05', 1),
(80, 'Administrator Sistems melakukan login ke sistem', '2019-12-27 08:33:56', 1),
(81, 'Administrator Sistems melakukan login ke sistem', '2019-12-27 08:34:28', 1),
(82, 'Administrator Sistems melakukan login ke sistem', '2020-07-11 16:01:05', 1),
(83, 'Administrator Sistems melakukan login ke sistem', '2020-08-19 21:24:38', 1),
(84, 'Administrator Sistems melakukan login ke sistem', '2020-08-20 13:52:06', 1),
(85, 'Administrator Sistems melakukan login ke sistem', '2020-08-20 18:45:03', 1),
(86, 'Menghapus Data User grahareksakencana', '2020-08-20 18:45:15', 1),
(87, 'Mengedit Data User danil', '2020-08-20 18:45:32', 1),
(88, 'Indra Pratama Apsarton melakukan login ke sistem', '2020-08-20 18:45:49', 4),
(89, 'Administrator Sistems melakukan login ke sistem', '2020-08-20 18:46:28', 1),
(90, 'Administrator Sistems melakukan login ke sistem', '2020-08-21 19:00:05', 1),
(91, 'Administrator Sistems melakukan login ke sistem', '2020-08-21 19:01:08', 1),
(92, 'Administrator Sistems melakukan login ke sistem', '2020-08-21 19:28:30', 1),
(93, 'Administrator Sistems melakukan login ke sistem', '2020-08-21 19:30:33', 1),
(94, 'Administrator Sistems melakukan login ke sistem', '2020-08-21 19:34:11', 1),
(95, 'Mengedit Data User danil', '2020-08-21 19:55:40', 1),
(96, 'Menghapus Data User welly', '2020-08-21 20:03:37', 1),
(97, 'Menghapus Data User suleha', '2020-08-21 20:03:40', 1),
(98, 'Menambah Data User tiyan', '2020-08-21 20:04:01', 1),
(99, 'Mengedit Data User danil', '2020-08-21 20:11:56', 1),
(100, 'Mengedit Data User admin', '2020-08-21 20:12:13', 1),
(101, 'Tiyan melakukan login ke sistem', '2020-08-21 20:18:34', 6),
(102, 'Tiyan melakukan login ke sistem', '2020-08-21 20:20:26', 6),
(103, 'Administrator Sistem melakukan login ke sistem', '2020-08-21 20:21:33', 1),
(104, 'Danil melakukan login ke sistem', '2020-08-21 20:22:14', 4),
(105, 'Danil melakukan login ke sistem', '2020-08-21 20:23:56', 4),
(106, 'Administrator Sistem melakukan login ke sistem', '2020-08-21 20:25:32', 1),
(107, 'Administrator Sistem melakukan login ke sistem', '2020-08-22 00:02:44', 1),
(108, 'Mengubah Data mahasiswa ', '2020-08-22 00:47:05', 1),
(109, 'Danil melakukan login ke sistem', '2020-08-22 00:49:30', 4),
(110, 'Tiyan melakukan login ke sistem', '2020-08-22 00:49:52', 6),
(111, 'Administrator Sistem melakukan login ke sistem', '2020-08-22 00:50:13', 1),
(112, 'Menambah Data mahasiswa d', '2020-08-22 01:10:21', 0),
(113, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:12:46', 0),
(114, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:12:53', 0),
(115, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:13:01', 0),
(116, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:13:10', 0),
(117, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:13:24', 0),
(118, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:13:32', 0),
(119, 'Mengedit Data mahasiswa dsc', '2020-08-22 01:14:41', 0),
(120, 'Mengedit Data mahasiswa TIYAN', '2020-08-22 01:14:59', 0),
(121, 'Menghapus Data mahasiswa ', '2020-08-22 01:15:15', 0),
(122, 'Menambah Data aslab TIYAN', '2020-08-22 01:21:58', 0),
(123, 'Menambah Data aslab DSC', '2020-08-22 01:22:11', 0),
(124, 'Mengedit Data aslab DSC', '2020-08-22 01:22:16', 0),
(125, 'Menghapus Data aslab ', '2020-08-22 01:22:19', 0),
(126, 'Menambah Data dosenlab Statiswati, ST', '2020-08-22 01:28:08', 0),
(127, 'Mengedit Data dosenlab Statiswati, ST', '2020-08-22 01:28:55', 0),
(128, 'Menambah Data Gallery hadiah', '2020-08-22 01:29:35', 1),
(129, 'Administrator Sistem melakukan login ke sistem', '2020-08-22 18:29:56', 1),
(130, 'Menambah Data profillab Laboratorium Sistem Informasi', '2020-08-22 19:00:59', 0),
(131, 'Menambah Data aslab Muhamad Danil', '2020-08-22 19:28:44', 0),
(132, 'Administrator Sistem melakukan login ke sistem', '2020-08-22 23:47:07', 1),
(133, 'Menambah Data Absen Laboratorium ', '2020-08-23 01:25:18', 0),
(134, 'Menambah Data Absen Laboratorium ', '2020-08-23 01:29:27', 0),
(135, 'Menambah Data Absen Laboratorium ', '2020-08-23 10:59:32', 0),
(136, 'Menambah Data Absen Laboratorium TIYAN', '2020-08-23 10:59:38', 0),
(137, 'Menambah Data Absen Laboratorium TIYAN', '2020-08-23 10:59:42', 0),
(138, 'Menambah Data Absen Laboratorium Muhamad Danil', '2020-08-23 11:05:38', 0),
(139, 'Menambah Data Absen Laboratorium TIYAN', '2020-08-23 11:06:02', 0),
(140, 'Menambah Data Absen Laboratorium TIYAN', '2020-08-23 11:06:46', 0),
(141, 'Menambah Data Absen Laboratorium ', '2020-08-23 11:10:52', 0),
(142, 'Administrator Sistem melakukan login ke sistem', '2020-08-23 11:21:22', 1),
(143, 'Administrator Sistem melakukan login ke sistem', '2020-08-24 20:15:01', 1),
(144, 'Menambah Data Absen Laboratorium Muhamad Danil', '2020-08-24 20:20:43', 0),
(145, 'Menambah Data Absen Laboratorium ', '2020-08-24 20:28:58', 0),
(146, 'Menambah Data Absen Laboratorium ', '2020-08-24 20:29:08', 0),
(147, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:08:38', 0),
(148, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:12:32', 0),
(149, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:03', 0),
(150, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:05', 0),
(151, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:07', 0),
(152, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:08', 0),
(153, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:08', 0),
(154, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:09', 0),
(155, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:09', 0),
(156, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:09', 0),
(157, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:12', 0),
(158, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:12', 0),
(159, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:12', 0),
(160, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:13', 0),
(161, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:13', 0),
(162, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:19', 0),
(163, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:19', 0),
(164, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:19', 0),
(165, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:20', 0),
(166, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:13:58', 0),
(167, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:15:07', 0),
(168, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:16:36', 0),
(169, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:16:52', 0),
(170, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:16:58', 0),
(171, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:17:11', 0),
(172, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:27:12', 0),
(173, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:35:34', 0),
(174, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:35:36', 0),
(175, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:36:02', 0),
(176, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:36:35', 0),
(177, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:39:30', 0),
(178, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:41:17', 0),
(179, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:41:52', 0),
(180, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:43:08', 0),
(181, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:43:42', 0),
(182, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:43:57', 0),
(183, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:44:08', 0),
(184, 'Menambah Data Absen Laboratorium ', '2020-08-24 21:45:15', 0),
(185, 'Menambah Data Absen Laboratorium 2', '2020-08-24 21:48:37', 0),
(186, 'Menambah Data Absen Laboratorium 2', '2020-08-24 21:50:48', 0),
(187, 'Menambah Data Absen Laboratorium 2', '2020-08-24 21:56:07', 0),
(188, 'Menambah Data Absen Laboratorium 2', '2020-08-24 21:56:25', 0),
(189, 'Menambah Data Absen Laboratorium 2', '2020-08-24 22:00:15', 0),
(190, 'Mengedit Data mahasiswa Muhamad Danil', '2020-09-17 16:20:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_tbl`
--

CREATE TABLE `mahasiswa_tbl` (
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_nim` char(15) NOT NULL,
  `mahasiswa_nama` varchar(50) NOT NULL,
  `mahasiswa_angkatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_tbl`
--

INSERT INTO `mahasiswa_tbl` (`mahasiswa_id`, `mahasiswa_nim`, `mahasiswa_nama`, `mahasiswa_angkatan`) VALUES
(1, 'E1E117040324', 'Muhamad Danil', 2017),
(2, 'E1E117065', 'TIYAN', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `profillab_tbl`
--

CREATE TABLE `profillab_tbl` (
  `profillab_id` int(11) NOT NULL,
  `profillab_nama` varchar(50) NOT NULL,
  `profillab_visi` varchar(100) NOT NULL,
  `profillab_misi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profillab_tbl`
--

INSERT INTO `profillab_tbl` (`profillab_id`, `profillab_nama`, `profillab_visi`, `profillab_misi`) VALUES
(1, 'Laboratorium Sistem Informasi', 'Menjadi laboratorium unggul dalam pengembangan ilmu pengetahuan di bidang ilmu komputer dan teknolog', 'Mendukung kegiatan pembelajaran di Fakultas Ilmu Komputer. Mengembangkan kemampuan dan keterampilan ');

-- --------------------------------------------------------

--
-- Table structure for table `setting_tbl`
--

CREATE TABLE `setting_tbl` (
  `setting_id` int(11) NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(20) NOT NULL,
  `setting_origin_app` varchar(100) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(50) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_tbl`
--

INSERT INTO `setting_tbl` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_origin_app`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`) VALUES
(1, 'Sistem Informasi Peminjaman Lab', 'SIPEMAPLEB', 'Teknik Informatika', 'HMTI-UHO', '(0401) - 0000 000', 'hmti-uho@gmail.com', 'Jl. xxxxx', 'settinglogo11.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `slider_id` int(11) NOT NULL,
  `slider_big_title` varchar(100) NOT NULL,
  `slider_text` varchar(200) NOT NULL,
  `slider_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`slider_id`, `slider_big_title`, `slider_text`, `slider_picture`) VALUES
(1, 'Slider', 'Slider', 'slider-2019122600341775977.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_photo` text NOT NULL,
  `user_address` text NOT NULL,
  `user_bussiness` varchar(200) NOT NULL,
  `user_sector` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_photo`, `user_address`, `user_bussiness`, `user_sector`, `group_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator Sistem', 'US2019041100000.jpg', '', '', '', 1),
(4, 'danil', '1b62d2b76347ebd300b15b458ce52b39', 'Danil', '', 'Jl. Komp. BTN Bumi Graha AsriKelurahan WatulondoKecamatan Puuwatu', 'Pem. Perumahan Graha Asri Puuwatu The Rosemary', 'Perumahan', 3),
(6, 'tiyan', '58bb0118acc153bfba1853ea02c81489', 'Tiyan', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `visit_tbl`
--

CREATE TABLE `visit_tbl` (
  `visit_id` int(11) NOT NULL,
  `visit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit_tbl`
--

INSERT INTO `visit_tbl` (`visit_id`, `visit_date`) VALUES
(1, '2019-07-29 22:24:23'),
(2, '2019-07-29 22:24:33'),
(3, '2019-07-29 22:24:49'),
(4, '2019-07-30 04:34:05'),
(5, '2019-07-30 04:59:24'),
(6, '2019-07-30 05:05:02'),
(7, '2019-07-30 05:05:03'),
(8, '2019-07-30 05:20:59'),
(9, '2019-07-30 05:22:29'),
(10, '2019-07-30 05:22:30'),
(11, '2019-07-30 05:22:30'),
(12, '2019-07-30 05:59:20'),
(13, '2019-07-30 06:00:13'),
(14, '2019-07-30 06:07:05'),
(15, '2019-07-30 09:30:45'),
(16, '2019-07-30 09:30:50'),
(17, '2019-07-30 09:35:05'),
(18, '2019-07-30 09:37:37'),
(19, '2019-07-30 09:38:00'),
(20, '2019-07-30 09:39:32'),
(21, '2019-07-30 09:39:32'),
(22, '2019-07-30 09:39:33'),
(23, '2019-07-30 09:40:20'),
(24, '2019-07-30 09:40:21'),
(25, '2019-07-30 09:40:21'),
(26, '2019-07-30 09:40:21'),
(27, '2019-07-30 09:40:38'),
(28, '2019-07-30 09:40:39'),
(29, '2019-07-30 09:40:39'),
(30, '2019-07-30 09:40:39'),
(31, '2019-07-30 09:40:44'),
(32, '2019-07-30 09:40:49'),
(33, '2019-07-30 09:41:08'),
(34, '2019-07-30 09:41:08'),
(35, '2019-07-30 09:41:09'),
(36, '2019-07-30 09:41:09'),
(37, '2019-07-30 09:41:24'),
(38, '2019-07-30 09:41:25'),
(39, '2019-07-30 09:41:25'),
(40, '2019-07-30 09:41:25'),
(41, '2019-07-30 09:41:34'),
(42, '2019-07-30 09:41:34'),
(43, '2019-07-30 09:41:34'),
(44, '2019-07-30 09:41:34'),
(45, '2019-07-30 09:42:19'),
(46, '2019-07-30 09:42:40'),
(47, '2019-07-30 09:42:41'),
(48, '2019-07-30 09:42:42'),
(49, '2019-07-30 09:42:54'),
(50, '2019-07-30 09:43:59'),
(51, '2019-07-30 09:44:06'),
(52, '2019-07-30 09:44:21'),
(53, '2019-07-30 09:55:43'),
(54, '2019-07-30 09:57:48'),
(55, '2019-07-30 09:58:04'),
(56, '2019-07-30 09:58:23'),
(57, '2019-07-30 09:59:28'),
(58, '2019-07-30 09:59:28'),
(59, '2019-07-30 09:59:28'),
(60, '2019-07-30 09:59:28'),
(61, '2019-07-30 09:59:28'),
(62, '2019-07-30 09:59:28'),
(63, '2019-07-30 09:59:36'),
(64, '2019-07-30 13:50:18'),
(65, '2019-07-30 14:15:11'),
(66, '2019-07-30 17:48:13'),
(67, '2019-12-12 09:34:42'),
(68, '2019-12-12 09:34:52'),
(69, '2019-12-12 09:34:56'),
(70, '2019-12-12 09:34:57'),
(71, '2019-12-12 09:34:57'),
(72, '2019-12-12 09:34:57'),
(73, '2019-12-12 09:34:57'),
(74, '2019-12-12 09:34:57'),
(75, '2019-12-12 09:34:58'),
(76, '2019-12-12 09:34:58'),
(77, '2019-12-12 09:34:58'),
(78, '2019-12-12 09:34:58'),
(79, '2019-12-12 09:34:58'),
(80, '2019-12-12 09:38:01'),
(81, '2019-12-12 09:39:55'),
(82, '2019-12-12 09:40:01'),
(83, '2019-12-12 09:40:50'),
(84, '2019-12-12 09:42:59'),
(85, '2019-12-12 09:43:04'),
(86, '2019-12-12 09:43:05'),
(87, '2019-12-12 09:43:06'),
(88, '2019-12-12 09:43:46'),
(89, '2019-12-12 09:43:54'),
(90, '2019-12-12 09:44:13'),
(91, '2019-12-12 09:44:20'),
(92, '2019-12-12 09:50:22'),
(93, '2019-12-12 09:50:23'),
(94, '2019-12-12 09:50:24'),
(95, '2019-12-12 09:50:24'),
(96, '2019-12-12 09:50:24'),
(97, '2019-12-12 09:50:24'),
(98, '2019-12-12 09:50:24'),
(99, '2019-12-12 09:50:24'),
(100, '2019-12-12 09:50:25'),
(101, '2019-12-12 09:50:25'),
(102, '2019-12-12 09:50:25'),
(103, '2019-12-12 09:50:25'),
(104, '2019-12-12 09:50:25'),
(105, '2019-12-12 09:50:25'),
(106, '2019-12-12 09:50:26'),
(107, '2019-12-12 09:50:26'),
(108, '2019-12-12 09:50:26'),
(109, '2019-12-12 09:50:26'),
(110, '2019-12-12 09:50:26'),
(111, '2019-12-12 09:50:27'),
(112, '2019-12-12 09:50:27'),
(113, '2019-12-12 09:50:27'),
(114, '2019-12-12 09:50:27'),
(115, '2019-12-12 09:50:27'),
(116, '2019-12-12 09:50:27'),
(117, '2019-12-12 09:50:28'),
(118, '2019-12-12 09:50:28'),
(119, '2019-12-12 09:50:28'),
(120, '2019-12-12 09:50:41'),
(121, '2019-12-12 09:50:41'),
(122, '2019-12-12 09:50:42'),
(123, '2019-12-12 09:50:42'),
(124, '2019-12-12 09:50:42'),
(125, '2019-12-12 09:50:42'),
(126, '2019-12-12 09:50:43'),
(127, '2019-12-12 09:50:43'),
(128, '2019-12-12 09:50:43'),
(129, '2019-12-12 09:50:43'),
(130, '2019-12-12 09:50:43'),
(131, '2019-12-12 09:50:47'),
(132, '2019-12-12 09:51:54'),
(133, '2019-12-12 09:51:55'),
(134, '2019-12-12 09:51:55'),
(135, '2019-12-12 09:51:56'),
(136, '2019-12-12 09:51:56'),
(137, '2019-12-12 09:51:56'),
(138, '2019-12-12 09:52:13'),
(139, '2019-12-12 09:54:35'),
(140, '2019-12-12 09:55:25'),
(141, '2019-12-12 09:55:32'),
(142, '2019-12-12 09:55:32'),
(143, '2019-12-12 10:25:05'),
(144, '2019-12-12 10:25:06'),
(145, '2019-12-12 10:25:15'),
(146, '2019-12-12 10:26:13'),
(147, '2019-12-12 10:26:14'),
(148, '2019-12-12 10:26:14'),
(149, '2019-12-12 10:26:14'),
(150, '2019-12-12 10:26:14'),
(151, '2019-12-12 10:26:14'),
(152, '2019-12-12 10:26:15'),
(153, '2019-12-12 10:26:15'),
(154, '2019-12-12 10:26:15'),
(155, '2019-12-12 10:26:15'),
(156, '2019-12-12 10:26:15'),
(157, '2019-12-12 10:26:15'),
(158, '2019-12-12 10:26:16'),
(159, '2019-12-12 10:26:24'),
(160, '2019-12-12 10:26:25'),
(161, '2019-12-12 10:26:25'),
(162, '2019-12-12 10:26:25'),
(163, '2019-12-12 10:26:25'),
(164, '2019-12-12 10:26:25'),
(165, '2019-12-12 10:26:28'),
(166, '2019-12-12 10:26:29'),
(167, '2019-12-12 10:26:29'),
(168, '2019-12-12 10:26:29'),
(169, '2019-12-12 10:26:29'),
(170, '2019-12-12 10:26:30'),
(171, '2019-12-12 10:26:52'),
(172, '2019-12-12 10:26:53'),
(173, '2019-12-12 10:26:53'),
(174, '2019-12-12 10:26:59'),
(175, '2019-12-12 10:26:59'),
(176, '2019-12-12 10:27:00'),
(177, '2019-12-12 10:27:00'),
(178, '2019-12-12 10:27:00'),
(179, '2019-12-12 10:27:00'),
(180, '2019-12-12 10:27:00'),
(181, '2019-12-12 10:27:00'),
(182, '2019-12-12 10:27:01'),
(183, '2019-12-12 10:27:01'),
(184, '2019-12-12 10:27:01'),
(185, '2019-12-12 10:27:01'),
(186, '2019-12-12 10:27:45'),
(187, '2019-12-12 10:27:47'),
(188, '2019-12-12 10:27:48'),
(189, '2019-12-12 10:27:48'),
(190, '2019-12-12 10:27:48'),
(191, '2019-12-12 10:27:49'),
(192, '2019-12-12 10:27:49'),
(193, '2019-12-12 10:28:20'),
(194, '2019-12-12 10:28:28'),
(195, '2019-12-12 10:35:27'),
(196, '2019-12-12 10:35:28'),
(197, '2019-12-12 10:35:34'),
(198, '2019-12-12 10:41:48'),
(199, '2019-12-12 12:53:54'),
(200, '2019-12-12 14:26:23'),
(201, '2019-12-12 14:27:02'),
(202, '2019-12-12 14:46:55'),
(203, '2019-12-12 15:49:37'),
(204, '2019-12-12 16:22:38'),
(205, '2019-12-12 18:53:43'),
(206, '2019-12-12 19:11:57'),
(207, '2019-12-12 19:53:50'),
(208, '2019-12-12 19:53:57'),
(209, '2019-12-12 19:54:37'),
(210, '2019-12-13 07:06:53'),
(211, '2019-12-13 07:23:09'),
(212, '2019-12-13 07:26:07'),
(213, '2019-12-13 07:31:25'),
(214, '2019-12-13 07:35:24'),
(215, '2019-12-13 07:37:09'),
(216, '2019-12-13 07:48:32'),
(217, '2019-12-13 07:53:04'),
(218, '2019-12-13 07:56:46'),
(219, '2019-12-13 08:01:00'),
(220, '2019-12-13 08:01:04'),
(221, '2019-12-13 08:01:47'),
(222, '2019-12-13 08:01:48'),
(223, '2019-12-13 08:01:49'),
(224, '2019-12-13 08:01:49'),
(225, '2019-12-13 08:02:05'),
(226, '2019-12-13 10:08:12'),
(227, '2019-12-13 10:08:38'),
(228, '2019-12-17 14:42:09'),
(229, '2019-12-17 14:42:26'),
(230, '2019-12-17 14:46:39'),
(231, '2019-12-17 14:52:25'),
(232, '2019-12-17 14:54:44'),
(233, '2019-12-17 16:45:55'),
(234, '2019-12-17 20:05:16'),
(235, '2019-12-18 09:24:22'),
(236, '2019-12-18 09:34:47'),
(237, '2019-12-19 15:22:05'),
(238, '2019-12-19 16:49:17'),
(239, '2019-12-20 09:18:06'),
(240, '2019-12-21 20:24:54'),
(241, '2019-12-21 20:24:59'),
(242, '2019-12-23 10:44:23'),
(243, '2019-12-23 16:35:35'),
(244, '2019-12-24 09:51:23'),
(245, '2019-12-24 10:40:45'),
(246, '2019-12-24 12:14:06'),
(247, '2019-12-24 12:17:52'),
(248, '2019-12-24 12:18:15'),
(249, '2019-12-24 12:20:41'),
(250, '2019-12-24 14:15:39'),
(251, '2019-12-24 14:15:58'),
(252, '2019-12-24 18:42:01'),
(253, '2019-12-24 19:12:01'),
(254, '2019-12-25 10:27:15'),
(255, '2019-12-25 11:54:59'),
(256, '2019-12-25 12:00:20'),
(257, '2019-12-25 12:42:06'),
(258, '2019-12-25 12:45:19'),
(259, '2019-12-25 12:47:23'),
(260, '2019-12-25 13:09:58'),
(261, '2019-12-25 13:12:20'),
(262, '2019-12-25 13:40:05'),
(263, '2019-12-25 13:41:47'),
(264, '2019-12-25 13:41:57'),
(265, '2019-12-25 13:42:05'),
(266, '2019-12-25 14:05:48'),
(267, '2019-12-25 20:37:31'),
(268, '2019-12-25 20:38:00'),
(269, '2019-12-25 20:38:33'),
(270, '2019-12-25 20:38:35'),
(271, '2019-12-25 20:38:43'),
(272, '2019-12-25 20:42:21'),
(273, '2019-12-25 20:47:06'),
(274, '2019-12-25 20:47:37'),
(275, '2019-12-25 20:48:12'),
(276, '2019-12-25 22:18:34'),
(277, '2019-12-25 22:22:30'),
(278, '2019-12-25 22:22:33'),
(279, '2019-12-25 22:22:35'),
(280, '2019-12-25 22:22:43'),
(281, '2019-12-25 22:23:12'),
(282, '2019-12-25 22:23:36'),
(283, '2019-12-25 22:23:52'),
(284, '2019-12-25 22:25:03'),
(285, '2019-12-25 22:29:17'),
(286, '2019-12-25 22:51:11'),
(287, '2019-12-25 22:53:42'),
(288, '2019-12-26 01:27:37'),
(289, '2019-12-26 01:27:42'),
(290, '2019-12-26 01:29:27'),
(291, '2019-12-26 01:32:16'),
(292, '2019-12-26 01:42:54'),
(293, '2019-12-26 01:43:09'),
(294, '2019-12-26 01:43:12'),
(295, '2019-12-26 02:38:42'),
(296, '2019-12-26 02:41:26'),
(297, '2019-12-26 02:55:02'),
(298, '2019-12-26 03:33:50'),
(299, '2019-12-26 03:46:43'),
(300, '2019-12-26 03:46:47'),
(301, '2019-12-26 03:47:53'),
(302, '2019-12-26 03:48:15'),
(303, '2019-12-26 05:24:13'),
(304, '2019-12-26 05:28:10'),
(305, '2019-12-26 10:21:59'),
(306, '2019-12-26 12:11:58'),
(307, '2019-12-26 12:16:06'),
(308, '2019-12-26 12:18:21'),
(309, '2019-12-26 16:18:40'),
(310, '2019-12-26 16:18:43'),
(311, '2019-12-26 22:17:18'),
(312, '2019-12-26 22:19:23'),
(313, '2019-12-26 22:19:46'),
(314, '2019-12-26 22:20:00'),
(315, '2019-12-27 06:27:38'),
(316, '2019-12-27 06:27:41'),
(317, '2019-12-27 06:31:15'),
(318, '2019-12-27 06:31:17'),
(319, '2019-12-27 06:32:46'),
(320, '2019-12-27 06:36:40'),
(321, '2019-12-27 06:36:59'),
(322, '2019-12-27 06:37:06'),
(323, '2019-12-27 06:37:17'),
(324, '2019-12-27 06:41:39'),
(325, '2019-12-27 06:41:51'),
(326, '2019-12-27 07:07:48'),
(327, '2019-12-27 07:07:50'),
(328, '2019-12-27 07:08:26'),
(329, '2019-12-27 07:08:46'),
(330, '2019-12-27 07:15:56'),
(331, '2019-12-27 07:15:58'),
(332, '2019-12-27 07:26:41'),
(333, '2019-12-27 08:30:30'),
(334, '2019-12-27 08:32:01'),
(335, '2019-12-27 08:33:41'),
(336, '2019-12-27 08:34:17'),
(337, '2019-12-27 08:37:38'),
(338, '2019-12-27 14:21:56'),
(339, '2019-12-27 14:22:46'),
(340, '2019-12-28 13:04:13'),
(341, '2020-01-02 10:07:21'),
(342, '2020-03-22 18:24:51'),
(343, '2020-03-22 18:25:19'),
(344, '2020-07-11 15:31:21'),
(345, '2020-07-11 15:32:07'),
(346, '2020-07-11 15:32:20'),
(347, '2020-07-11 15:32:28'),
(348, '2020-07-11 15:32:44'),
(349, '2020-07-11 15:33:18'),
(350, '2020-07-11 15:34:13'),
(351, '2020-07-11 15:34:21'),
(352, '2020-07-11 15:37:49'),
(353, '2020-07-11 15:38:19'),
(354, '2020-07-11 15:38:29'),
(355, '2020-07-11 15:38:43'),
(356, '2020-07-11 15:40:58'),
(357, '2020-07-11 15:42:06'),
(358, '2020-07-11 15:42:42'),
(359, '2020-07-11 15:42:44'),
(360, '2020-07-11 15:42:48'),
(361, '2020-07-11 15:43:36'),
(362, '2020-07-11 15:44:08'),
(363, '2020-07-11 15:45:30'),
(364, '2020-07-11 15:45:54'),
(365, '2020-07-11 15:46:20'),
(366, '2020-07-11 15:49:30'),
(367, '2020-07-11 15:49:33'),
(368, '2020-07-11 15:50:24'),
(369, '2020-07-11 15:50:27'),
(370, '2020-07-11 15:52:09'),
(371, '2020-07-11 15:53:11'),
(372, '2020-07-11 15:54:27'),
(373, '2020-07-11 15:54:33'),
(374, '2020-07-11 15:55:28'),
(375, '2020-08-19 14:08:21'),
(376, '2020-08-19 21:04:41'),
(377, '2020-08-19 21:05:29'),
(378, '2020-08-19 21:06:45'),
(379, '2020-08-19 21:24:30'),
(380, '2020-08-19 21:25:15'),
(381, '2020-08-19 21:25:30'),
(382, '2020-08-20 13:25:47'),
(383, '2020-08-20 18:44:57'),
(384, '2020-08-20 18:45:42'),
(385, '2020-08-20 18:45:44'),
(386, '2020-08-20 18:46:17'),
(387, '2020-08-20 18:46:20'),
(388, '2020-08-20 19:08:38'),
(389, '2020-08-20 19:23:54'),
(390, '2020-08-20 19:24:09'),
(391, '2020-08-20 19:42:54'),
(392, '2020-08-20 19:44:18'),
(393, '2020-08-20 19:47:24'),
(394, '2020-08-20 19:47:36'),
(395, '2020-08-20 19:48:30'),
(396, '2020-08-20 19:50:10'),
(397, '2020-08-20 19:50:37'),
(398, '2020-08-20 19:50:45'),
(399, '2020-08-20 19:51:26'),
(400, '2020-08-20 19:51:51'),
(401, '2020-08-20 19:52:07'),
(402, '2020-08-20 19:54:18'),
(403, '2020-08-21 18:55:06'),
(404, '2020-08-21 18:58:47'),
(405, '2020-08-21 18:59:00'),
(406, '2020-08-21 18:59:36'),
(407, '2020-08-21 18:59:48'),
(408, '2020-08-21 18:59:59'),
(409, '2020-08-21 19:01:01'),
(410, '2020-08-21 19:27:10'),
(411, '2020-08-21 19:27:52'),
(412, '2020-08-21 19:28:20'),
(413, '2020-08-21 19:29:01'),
(414, '2020-08-21 19:29:38'),
(415, '2020-08-21 19:30:27'),
(416, '2020-08-21 19:34:07'),
(417, '2020-08-21 20:18:26'),
(418, '2020-08-21 20:19:48'),
(419, '2020-08-21 20:19:52'),
(420, '2020-08-21 20:19:57'),
(421, '2020-08-21 20:20:06'),
(422, '2020-08-21 20:20:12'),
(423, '2020-08-21 20:20:20'),
(424, '2020-08-21 20:20:39'),
(425, '2020-08-21 20:20:44'),
(426, '2020-08-21 20:22:09'),
(427, '2020-08-21 20:22:53'),
(428, '2020-08-21 20:25:26'),
(429, '2020-08-21 23:48:24'),
(430, '2020-08-22 00:49:22'),
(431, '2020-08-22 00:49:46'),
(432, '2020-08-22 00:50:08'),
(433, '2020-08-22 18:29:50'),
(434, '2020-08-22 23:34:30'),
(435, '2020-08-22 23:47:03'),
(436, '2020-08-23 11:21:18'),
(437, '2020-08-24 20:11:22'),
(438, '2020-08-24 20:11:25'),
(439, '2020-08-24 20:14:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absenlab_tbl`
--
ALTER TABLE `absenlab_tbl`
  ADD PRIMARY KEY (`absenlab_id`);

--
-- Indexes for table `aslab_tbl`
--
ALTER TABLE `aslab_tbl`
  ADD PRIMARY KEY (`aslab_id`);

--
-- Indexes for table `dosenlab_tbl`
--
ALTER TABLE `dosenlab_tbl`
  ADD PRIMARY KEY (`dosenlab_id`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `group_tbl`
--
ALTER TABLE `group_tbl`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mahasiswa_tbl`
--
ALTER TABLE `mahasiswa_tbl`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `profillab_tbl`
--
ALTER TABLE `profillab_tbl`
  ADD PRIMARY KEY (`profillab_id`);

--
-- Indexes for table `setting_tbl`
--
ALTER TABLE `setting_tbl`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visit_tbl`
--
ALTER TABLE `visit_tbl`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absenlab_tbl`
--
ALTER TABLE `absenlab_tbl`
  MODIFY `absenlab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `aslab_tbl`
--
ALTER TABLE `aslab_tbl`
  MODIFY `aslab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosenlab_tbl`
--
ALTER TABLE `dosenlab_tbl`
  MODIFY `dosenlab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `mahasiswa_tbl`
--
ALTER TABLE `mahasiswa_tbl`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profillab_tbl`
--
ALTER TABLE `profillab_tbl`
  MODIFY `profillab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_tbl`
--
ALTER TABLE `setting_tbl`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visit_tbl`
--
ALTER TABLE `visit_tbl`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
