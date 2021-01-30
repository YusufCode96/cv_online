-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 03:52 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `negara` varchar(20) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `foto`, `isi`, `nama`, `bagian`, `ttl`, `alamat`, `negara`, `no_hp`, `email`) VALUES
(2, 'Untitled2.png', 'Dunia programming merupakan dunia bagi para programmer yang ada didunia ini. Mereka dapat menciptakan aplikasi atau game di berbagai platform berbeda. Begitu juga dengan saya, saya memulai terjun di dunia programming mulai dari saya masuk SMK. Dimasa-masa itu saya diajari berbagai bahasa pemograman seperti PHP, Android, Java, C#, C++, VB.Net, Asp.Net, Database dan yang lainnya. Disamping bahasa pemograman yang diberikan di sekolah saya mencoba mengulik bahasa pemograman lain. Dari sekian bahasa pemrograman yang dipelajari saya tertarik pada dunia web dan mobile, khusunya PHP dan Android. Mengapa saya pilih itu ? karena 2 platform tersebut merupakan platform yang sering dijumpai banyak orang dan syntaknya pun sangat mudah dipahamai. Untuk kedepannya saya akan mengembangkan aplikasi-aplikasi atau program yang lebih baik lagi yang kelak bermanfaat untuk orang banyak diluar sana.', 'Fajar Subeki', 'Android Developer', '06 April 2001', 'Cisarua Puncak Bogor Jawa Barat', 'Indonesia', '087741280963', 'fajarsub06@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_award`
--

CREATE TABLE `tb_award` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_award`
--

INSERT INTO `tb_award` (`id`, `judul`) VALUES
(1, 'GOOGLE ANALYTICS CERTIFIED DEVELOPER'),
(2, 'MOBILE WEB SPECIALIST CERTIFIED DEVELOPER'),
(3, 'Awarding Event IAK 2017'),
(4, 'Microsoft Sertification Devoloper Dekstop');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `nama_user`, `email`, `subject`, `message`) VALUES
(1, 'Abil Muhammad Imani', 'abilimani@gmail.com', 'Comment', 'Jar Fajar'),
(2, 'M. Ahrul', 'ahrululum@gmail.com', 'Tugas', 'Jar Tugas tea udah lum'),
(51, 'Sri Putri', 'spm@gmail.com', 'Work', 'Hai Fajar I Would you give prize if you finished my project.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_education`
--

CREATE TABLE `tb_education` (
  `id` int(11) NOT NULL,
  `nama_instan` varchar(30) NOT NULL,
  `nama_edu` varchar(30) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_education`
--

INSERT INTO `tb_education` (`id`, `nama_instan`, `nama_edu`, `tahun`) VALUES
(27, 'Taman Kanak-Kanak', 'TK Bunda Citeko', '2006-2007'),
(28, 'Sekolah Dasar', 'SDN Citeko 02', '2007-2013'),
(29, 'Sekolah Menengah Pertama', 'SMP YPC Cisarua', '2013-2016'),
(30, 'Sekolah Menengah Kejuruan', 'SMK Wikrama Bogor', '2016-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_experience`
--

CREATE TABLE `tb_experience` (
  `id` int(11) NOT NULL,
  `foto_exper` varchar(30) NOT NULL,
  `tahun` int(4) NOT NULL,
  `judul_exper` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_experience`
--

INSERT INTO `tb_experience` (`id`, `foto_exper`, `tahun`, `judul_exper`) VALUES
(1, 'programmer-1653351_960_720.png', 2018, 'Write Code Fast '),
(2, 'web-1668927_960_720.jpg', 2017, 'Web Design the best'),
(3, 'laptop-2557576_960_720.jpg', 2018, 'Working in Office Google');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama_user`, `username`, `password`) VALUES
(1, 'Fajar Subeki', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_portofolio`
--

CREATE TABLE `tb_portofolio` (
  `id` int(11) NOT NULL,
  `gambar_porto` varchar(30) NOT NULL,
  `judul_porto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_portofolio`
--

INSERT INTO `tb_portofolio` (`id`, `gambar_porto`, `judul_porto`) VALUES
(3, 'computer-2788918_960_720.jpg', 'Sedang ngoding'),
(7, 'macbook-2617705_960_720.jpg', 'Laptop Masa SMK'),
(8, 'laptop-2452814_960_720.jpg', 'Type Syntak PHP'),
(9, 'programmer-1653351_960_720.png', 'Typing Code'),
(10, 'coding-924920_960_720.jpg', 'Coding With Coffee'),
(11, 'programmer-1653351_960_720.png', 'Type Millio Syntak'),
(12, 'mindmap-2123973_960_720.jpg', 'Thingking'),
(13, 'laptop-2557586_960_720.jpg', 'Enjoy With My Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skill`
--

CREATE TABLE `tb_skill` (
  `id` int(11) NOT NULL,
  `nama_skil` varchar(30) NOT NULL,
  `percent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_skill`
--

INSERT INTO `tb_skill` (`id`, `nama_skil`, `percent`) VALUES
(1, 'Web Design', '80'),
(4, 'Web Devoloper', '95'),
(5, 'Database Analyst', '85'),
(6, 'Devoloper Android', '80'),
(7, 'Game Devoloper', '85'),
(8, 'Construct Devoloper', '70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_award`
--
ALTER TABLE `tb_award`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_education`
--
ALTER TABLE `tb_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_experience`
--
ALTER TABLE `tb_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_award`
--
ALTER TABLE `tb_award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_education`
--
ALTER TABLE `tb_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_experience`
--
ALTER TABLE `tb_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_skill`
--
ALTER TABLE `tb_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
