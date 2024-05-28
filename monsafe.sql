-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 05:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monsafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `batas_amonia`
--

CREATE TABLE `batas_amonia` (
  `id_amonia` int(11) NOT NULL,
  `volume_air` int(11) NOT NULL,
  `intensitas_normal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batas_amonia`
--

INSERT INTO `batas_amonia` (`id_amonia`, `volume_air`, `intensitas_normal`) VALUES
(1, 1, 0.02),
(2, 2, 0.04),
(3, 3, 0.06),
(4, 4, 0.08),
(5, 5, 0.1),
(6, 6, 0.12),
(7, 7, 0.14),
(8, 8, 0.16),
(9, 9, 0.18),
(10, 10, 0.2),
(11, 15, 0.3),
(12, 20, 0.4),
(13, 25, 0.5),
(14, 30, 0.6),
(15, 35, 0.7),
(16, 40, 0.8),
(17, 45, 0.9),
(18, 50, 1),
(19, 55, 1.1),
(20, 60, 1.2),
(21, 65, 1.3),
(22, 70, 1.4);

-- --------------------------------------------------------

--
-- Table structure for table `data_kolam`
--

CREATE TABLE `data_kolam` (
  `id_kolam` int(11) NOT NULL,
  `id_amonia` int(11) NOT NULL,
  `area_kolam` varchar(255) NOT NULL,
  `id_pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kolam`
--

INSERT INTO `data_kolam` (`id_kolam`, `id_amonia`, `area_kolam`, `id_pemilik`) VALUES
(0, 9, 'Kolam lelee(Depan)', 6),
(1, 1, 'Kolam panen', 6),
(2, 6, 'Kolam bibit', 6),
(3, 5, 'Kolam Kerin', 6),
(4, 5, 'Kolam gatul', 6),
(5, 2, 'kolam kunnuy', 6),
(6, 8, 'kolam bawah pohon', 6);

--
-- Triggers `data_kolam`
--
DELIMITER $$
CREATE TRIGGER `tambah_data_monitoring` AFTER INSERT ON `data_kolam` FOR EACH ROW BEGIN
    DECLARE waktu_sekarang TIMESTAMP;
    DECLARE max_id_monitoring INT;

    -- Ambil waktu saat ini
    SET waktu_sekarang = NOW();

    -- Ambil nilai maksimum dari id_monitoring yang ada di tabel data_monitoring
    SELECT MAX(id_monitoring) INTO max_id_monitoring FROM data_monitoring;

    -- Jika max_id_monitoring adalah NULL, atur nilainya menjadi 0
    IF max_id_monitoring IS NULL THEN
        SET max_id_monitoring = 0;
    END IF;

    -- Masukkan data ke dalam tabel data_monitoring dengan id_monitoring yang unik
    INSERT INTO data_monitoring (id_monitoring, id_kolam, waktu_tanggal)
    VALUES (max_id_monitoring + 1, NEW.id_kolam, waktu_sekarang);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_monitoring`
--

CREATE TABLE `data_monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `konsentrasi_amonia` double DEFAULT NULL,
  `waktu_tanggal` datetime NOT NULL,
  `id_notifikasi` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_monitoring`
--

INSERT INTO `data_monitoring` (`id_monitoring`, `id_kolam`, `konsentrasi_amonia`, `waktu_tanggal`, `id_notifikasi`, `status`) VALUES
(0, 0, 8.8, '2024-05-27 17:26:11', 1, 'OFF'),
(1, 1, NULL, '2024-05-20 19:51:19', 0, '0'),
(2, 2, NULL, '2024-05-16 23:42:41', 0, '0'),
(3, 3, NULL, '2024-05-17 20:02:04', 0, '0'),
(4, 6, NULL, '2024-05-27 21:27:46', 0, '');

--
-- Triggers `data_monitoring`
--
DELIMITER $$
CREATE TRIGGER `trig_update_id_notifikasi_insert` BEFORE INSERT ON `data_monitoring` FOR EACH ROW BEGIN
    DECLARE v_intensitasNormal DECIMAL(10, 2);
    
    -- Mendapatkan nilai intensitas_normal berdasarkan id_kolam dan id_amonia yang sama
    SELECT ba.intensitas_normal
    INTO v_intensitasNormal
    FROM batas_amonia ba
    JOIN data_kolam dk ON ba.id_amonia = dk.id_amonia
    WHERE dk.id_kolam = NEW.id_kolam
    LIMIT 1;
    
    -- Memeriksa apakah konsentrasi_amonia lebih dari v_intensitasNormal
    IF NEW.konsentrasi_amonia > v_intensitasNormal THEN
        SET NEW.id_notifikasi = 1;
    ELSE
        SET NEW.id_notifikasi = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_update_id_notifikasi_update` BEFORE UPDATE ON `data_monitoring` FOR EACH ROW BEGIN
    DECLARE v_intensitasNormal DECIMAL(10, 2);
    
    -- Mendapatkan nilai intensitas_normal berdasarkan id_kolam dan id_amonia yang sama
    SELECT ba.intensitas_normal
    INTO v_intensitasNormal
    FROM batas_amonia ba
    JOIN data_kolam dk ON ba.id_amonia = dk.id_amonia
    WHERE dk.id_kolam = NEW.id_kolam
    LIMIT 1;
    
    -- Memeriksa apakah konsentrasi_amonia lebih dari v_intensitasNormal
    IF NEW.konsentrasi_amonia > v_intensitasNormal THEN
        SET NEW.id_notifikasi = 1;
    ELSE
        SET NEW.id_notifikasi = 0;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_pemilik`
--

CREATE TABLE `data_pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pemilik`
--

INSERT INTO `data_pemilik` (`id_pemilik`, `username`, `password`, `nama_pemilik`, `alamat_usaha`, `email`) VALUES
(1, 'firdaus_', 'firdaus25', 'Firdaus', 'Jl. Rengganis, Dusun Krajan Lor, Desa Rambigundam, Jember', 'firdausus@gmail.com'),
(2, 'iqbaal.e', 'iqbaal123', 'Iqbaal Ramadhan', 'Sumbersari, Jember', 'iqbaale@gmail.com'),
(3, 'juanalv', 'juan134', 'Juan', 'Rambipuji, Jember', 'juanalv@gmail.com'),
(4, 'arta', '123', 'Arta2003', 'Jl.Soekarno Hatta No.39', 'arta@gmail.com'),
(5, 'tataka', '$2y$10$n9QBNPNbgQnL1dyiE6MrD.JRK//XQqQZ4FF09vMhvTELoFDR.0NCC', 'tata', 'mcbdjzhc', 'tata@gmail.com'),
(6, 'kKerin ', 'Qwerty321', 'Kerin ', 'rumah ', 'kerin@gmail.com'),
(7, 'Lili', '$2y$10$WXIdgckgRTfGFqkE7lxGIe3byXlEVJqKGBj5g3lrAyutcgpYm0M9y', 'apaya', 'Jl Alamat', 'tika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `pesan`) VALUES
(0, '\"Tidak ada notifikasi\"'),
(1, '\"Intensitas Amonia Kolam Mu melebihi batas normal ! Segera Lakukan Pengurasan !\"');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_monitoring`
--

CREATE TABLE `riwayat_monitoring` (
  `id_riwayat` int(11) NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `konsentrasi_amonia` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `riwayat_monitoring`
--
DELIMITER $$
CREATE TRIGGER `update_konsentrasi_amonia` AFTER INSERT ON `riwayat_monitoring` FOR EACH ROW BEGIN
    UPDATE data_monitoring
    SET konsentrasi_amonia = NEW.konsentrasi_amonia,
        waktu_tanggal = NEW.waktu
    WHERE id_kolam = NEW.id_kolam
    ORDER BY waktu_tanggal DESC
    LIMIT 1;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batas_amonia`
--
ALTER TABLE `batas_amonia`
  ADD PRIMARY KEY (`id_amonia`);

--
-- Indexes for table `data_kolam`
--
ALTER TABLE `data_kolam`
  ADD PRIMARY KEY (`id_kolam`),
  ADD KEY `id_amonia` (`id_amonia`,`id_pemilik`),
  ADD KEY `data_kolam_id_pemilik_foreign` (`id_pemilik`);

--
-- Indexes for table `data_monitoring`
--
ALTER TABLE `data_monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `id_kolam` (`id_kolam`),
  ADD KEY `id_notifikasi` (`id_notifikasi`);

--
-- Indexes for table `data_pemilik`
--
ALTER TABLE `data_pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD UNIQUE KEY `data_pemilik_username_unique` (`username`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `riwayat_monitoring`
--
ALTER TABLE `riwayat_monitoring`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_kolam` (`id_kolam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_monitoring`
--
ALTER TABLE `riwayat_monitoring`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9449;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kolam`
--
ALTER TABLE `data_kolam`
  ADD CONSTRAINT `batas_amonia_id_amonia_foreign` FOREIGN KEY (`id_amonia`) REFERENCES `batas_amonia` (`id_amonia`),
  ADD CONSTRAINT `data_kolam_id_pemilik_foreign` FOREIGN KEY (`id_pemilik`) REFERENCES `data_pemilik` (`id_pemilik`);

--
-- Constraints for table `data_monitoring`
--
ALTER TABLE `data_monitoring`
  ADD CONSTRAINT `data_monitoring_ibfk_1` FOREIGN KEY (`id_notifikasi`) REFERENCES `notifikasi` (`id_notifikasi`),
  ADD CONSTRAINT `data_monitoring_id_kolam_foreign` FOREIGN KEY (`id_kolam`) REFERENCES `data_kolam` (`id_kolam`);

--
-- Constraints for table `riwayat_monitoring`
--
ALTER TABLE `riwayat_monitoring`
  ADD CONSTRAINT `riwayat_monitoring_ibfk_1` FOREIGN KEY (`id_kolam`) REFERENCES `data_kolam` (`id_kolam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
