-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 05:51 PM
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
-- Database: `academic`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `t_id` int(11) NOT NULL,
  `academic_semester` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `name`, `t_id`, `academic_semester`, `status`) VALUES
(1, 'Pengantar Pemograman', 2, 'Semester Ganjil 2024/2025', 'active'),
(2, 'Penatalayanan 1', 4, 'Semester Ganjil 2024/2025', 'active'),
(4, 'Penatalayanan 2', 4, 'Semester Genap 2024/2025', 'active'),
(5, 'Biologi Tumbuhan', 3, 'Semester Ganjil 2024/2025', 'active'),
(6, 'Struktur Basis Data ', 1, 'Semester Genap 2024/2025', 'active'),
(7, 'Pemograman Web', 2, 'Semester Ganjil 2025/2026', 'active'),
(8, 'Statistika', 4, 'Semester Ganjil 2025/2026', 'active'),
(9, 'Gambar Tehnik Arsistektur', 5, 'Semester Ganjil 2025/2026', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `e_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `academic_semester` varchar(50) NOT NULL,
  `assignment` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`e_id`, `c_id`, `s_id`, `academic_semester`, `assignment`, `test`, `final`) VALUES
(1, 1, 1, 'Semester Ganjil 2024/2025', 90, 80, 91),
(2, 1, 2, 'Semester Ganjil 2024/2025', 97, 78, 80),
(3, 5, 3, 'Semester Ganjil 2024/2025', 80, 80, 92),
(4, 2, 4, 'Semester Ganjil 2024/2025', 90, 0, 91),
(5, 2, 2, 'Semester Ganjil 2024/2025', 90, 0, 91),
(6, 2, 1, 'Semester Ganjil 2024/2025', 90, 0, 91),
(7, 2, 3, 'Semester Ganjil 2024/2025', 90, 0, 91),
(8, 4, 4, 'Semester Genap 2024/2025', 90, 0, 91),
(9, 6, 1, 'Semester Genap 2024/2025', 90, 0, 91),
(10, 8, 1, 'Semester Ganjil 2025/2026', 90, 0, 91),
(12, 4, 1, 'Semester Genap 2024/2025', 90, 0, 91),
(13, 7, 1, 'Semester Ganjil 2025/2026', 90, 0, 91),
(14, 9, 4, 'Semester Ganjil 2025/2026', 90, 0, 91);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(300) NOT NULL,
  `department` text NOT NULL,
  `GPA` float NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `full_name`, `date_of_birth`, `email`, `department`, `GPA`, `password`, `status`) VALUES
(1, 'Luke Pearce', '2014-05-16', 'luke05@student.com', 'IBDA', 3.9, '16db44e212a2c3fd1c5c0dc07da7025a', 'active'),
(2, 'Artem Wing', '2014-05-01', 'artem01@student.com', 'SCCE', 3.8, 'd9b2caa6c651b8c57dfc0e29f907758f', 'active'),
(3, 'Vyn Ritcher', '2014-02-28', 'vyn02@student.com', 'BMS', 3.95, '2d4b0cf3b5caff69af07da9f26a21e36', 'active'),
(4, 'Marius Von Hagen', '2014-07-08', 'marius07@student.com', 'ASD', 3.7, '259553c8d87077d48c227bfe1fd8d7ee', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `department` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `full_name`, `date_of_birth`, `email`, `department`, `password`, `status`) VALUES
(1, 'Choi Saeran', '2014-07-11', 'ray11@teacher.com', 'IBDA', 'c57f0fb93ae12de1bcd861d4a8c16c35', 'active'),
(2, 'Choi Saeyoung', '2014-07-11', 'seven11@teacher.com', 'IBDA', '1c7b915a9e8b349fe42d126d6ef6c7e3', 'active'),
(3, 'Kim Rika', '2004-03-09', 'rika09@teacher.com', 'BMS', 'c549a9f35cebbbfad57ef623b8639dfa', 'active'),
(4, 'Jumin Han', '2004-03-15', 'jumin15@teacher.com', 'RLAC', 'fd3af8c008224b391c2d687c061a758e', 'active'),
(5, 'Kim Yooha', '2000-03-08', 'yooha08@teacher.com', 'ASD', '447042440bf9d0dd0d82f30377e4d0c7', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `fk_teacher` (`t_id`);

--
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `fk_student` (`s_id`),
  ADD KEY `fk_course` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_teacher` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
