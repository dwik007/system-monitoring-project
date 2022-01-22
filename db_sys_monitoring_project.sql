-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 12:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sys_monitoring_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `id_project` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(11) NOT NULL,
  `id_leader` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`id_project`, `project_name`, `client_name`, `start_date`, `end_date`, `progress`, `id_leader`) VALUES
(13, 'Kampus Merdeka', 'Kemendikbud', '2022-01-22', '2022-01-25', 50, 1),
(14, 'Alfamart', 'alfamart', '2022-01-20', '2022-01-26', 30, 1),
(15, 'Indomart', 'idnomart', '2022-01-19', '2022-01-27', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_project_leader`
--

CREATE TABLE `tb_project_leader` (
  `id_leader` int(10) UNSIGNED NOT NULL,
  `leader_name` varchar(100) NOT NULL,
  `leader_email` varchar(100) NOT NULL,
  `img_profile_leader` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project_leader`
--

INSERT INTO `tb_project_leader` (`id_leader`, `leader_name`, `leader_email`, `img_profile_leader`) VALUES
(1, 'Indra Setiawan', 'indra.setiawan@gmail.com', 'ghozali1.jpg'),
(2, 'Hilman Syaputera', 'hilman.syah@gmail.com', 'ghozali2.png'),
(3, 'Febri Gunawan', 'febri.gunawan@gmail.com', 'ghozali3.jpg'),
(4, 'Handoko Aji', 'handoko.aji@gmail.com', 'ghozali4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `fk_project_leader` (`id_leader`);

--
-- Indexes for table `tb_project_leader`
--
ALTER TABLE `tb_project_leader`
  ADD PRIMARY KEY (`id_leader`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id_project` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_project_leader`
--
ALTER TABLE `tb_project_leader`
  MODIFY `id_leader` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD CONSTRAINT `fk_project_leader` FOREIGN KEY (`id_leader`) REFERENCES `tb_project_leader` (`id_leader`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
