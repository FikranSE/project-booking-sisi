-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 08:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_driver`
--

CREATE TABLE `booking_driver` (
  `id_booking_driver` varchar(10) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `destinasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('pending','tolak','setuju') NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `id_driver` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `booking_driver`
--
DELIMITER $$
CREATE TRIGGER `before_insert_booking_driver` BEFORE INSERT ON `booking_driver` FOR EACH ROW BEGIN
    SET NEW.id_booking_driver = CONCAT('BD_', LPAD((SELECT COALESCE(MAX(CAST(SUBSTRING(id_booking_driver, 4) AS SIGNED)), 0) + 1 FROM booking_driver), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_ruangan`
--

CREATE TABLE `booking_ruangan` (
  `id_booking_ruangan` varchar(10) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `agenda` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('pending','tolak','setuju') NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `id_ruangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `booking_ruangan`
--
DELIMITER $$
CREATE TRIGGER `before_insert_booking_ruangan` BEFORE INSERT ON `booking_ruangan` FOR EACH ROW BEGIN
    SET NEW.id_booking_ruangan = CONCAT('BR_', LPAD((SELECT IFNULL(MAX(SUBSTRING(id_booking_ruangan, 4)) + 1, 1) FROM booking_ruangan), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama`, `telp`) VALUES
('D_001', 'DRIVER 1', '081234567890'),
('D_004', 'Driver 2', '081254367812');

--
-- Triggers `driver`
--
DELIMITER $$
CREATE TRIGGER `id_driver` BEFORE INSERT ON `driver` FOR EACH ROW BEGIN
    SET NEW.id_driver = CONCAT('D_', LPAD((SELECT COALESCE(MAX(CAST(SUBSTRING(id_driver, 4) AS SIGNED)), 0) + 1 FROM driver), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kapasitas` varchar(50) DEFAULT NULL,
  `fasilitas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama`, `kapasitas`, `fasilitas`) VALUES
('R_001', 'Meeting room 1', '10 - 20 orang', 'Kursi, Meja, Tv, Speaker, Kamera'),
('R_002', 'Meeting room 2', '10 - 20 orang', 'Meja\r\nkursi\r\ntv\r\naudio\r\nkamera'),
('R_003', 'Meeting Room 3', '10-20 orang', 'meja\r\nkursi\r\ntv\r\naudio');

--
-- Triggers `ruangan`
--
DELIMITER $$
CREATE TRIGGER `id_ruangan` BEFORE INSERT ON `ruangan` FOR EACH ROW BEGIN
    SET NEW.id_ruangan = CONCAT('R_', LPAD((SELECT COALESCE(MAX(CAST(SUBSTRING(id_ruangan, 4) AS SIGNED)), 0) + 1 FROM ruangan), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(13) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','karyawan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `email`, `phone_no`, `password`, `role`) VALUES
('2111521114', 'Prabhat Pandey', 'prabhat@mail.com', '8888888888', '$2y$10$e9NC3NQ3pdxn70buaKjl4.zVzU3k0RuNgJHj0HpYmKnWaQjGEXyH6', 'karyawan'),
('2111523021', 'Rahul Sharma', 'rahul_sharma@mail.com', '7899654125', '$2y$10$/eDhDHsX4eDeO3PCtcY.Y.FNerLoqJOz6yZjWBtiLgRNs1H9I8tpS', 'admin'),
('2111523024', 'aca', 'haloaa@gmail.com', '', '$2b$10$Naf.3dQcAnSOETP1LkC9MeBnRpNQ2Dk38.mrKKBvx4fBwaB476VFu', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_driver`
--
ALTER TABLE `booking_driver`
  ADD PRIMARY KEY (`id_booking_driver`),
  ADD KEY `username` (`username`),
  ADD KEY `id_driver` (`id_driver`);

--
-- Indexes for table `booking_ruangan`
--
ALTER TABLE `booking_ruangan`
  ADD PRIMARY KEY (`id_booking_ruangan`),
  ADD UNIQUE KEY `id__booking_ruangan` (`id_booking_ruangan`),
  ADD KEY `username` (`username`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`),
  ADD UNIQUE KEY `id_driver` (`id_driver`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD UNIQUE KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_driver`
--
ALTER TABLE `booking_driver`
  ADD CONSTRAINT `booking_driver_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_driver_ibfk_2` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `booking_ruangan`
--
ALTER TABLE `booking_ruangan`
  ADD CONSTRAINT `booking_ruangan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ruangan_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
