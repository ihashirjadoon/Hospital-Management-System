-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 05:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointify`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(30) NOT NULL,
  `a_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_id`, `a_name`, `a_email`, `a_password`, `a_image`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', ''),
(2, 'Admin', 'admin@gmail.com', 'admin123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `a_id` int(11) NOT NULL,
  `h_id` int(11) DEFAULT NULL,
  `a_date` date DEFAULT NULL,
  `a_time` time DEFAULT NULL,
  `a_status` enum('approved','pending','canceled','completed') DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`a_id`, `h_id`, `a_date`, `a_time`, `a_status`, `v_id`, `p_name`) VALUES
(9, 7, '2023-12-25', '03:30:00', 'approved', 3, 'Hashir '),
(10, 7, '2023-12-25', '04:33:00', 'approved', 1, 'Hashir '),
(11, 23, '2023-12-26', '15:19:00', 'pending', 5, 'Talha '),
(12, 9, '2023-12-25', '22:27:00', 'approved', 4, 'Hashir '),
(13, 7, '2023-12-23', '15:22:00', 'approved', 1, 'Mustafa ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_covid_test_request`
--

CREATE TABLE `tbl_covid_test_request` (
  `test_request_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `preferred_hospital_id` int(11) DEFAULT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` time NOT NULL,
  `test_status` enum('pending','approved','completed','cancelled') DEFAULT NULL,
  `result_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_covid_test_request`
--

INSERT INTO `tbl_covid_test_request` (`test_request_id`, `patient_name`, `preferred_hospital_id`, `preferred_date`, `preferred_time`, `test_status`, `result_file`) VALUES
(1, 'Talha', 7, '2222-02-22', '13:38:00', 'pending', ''),
(2, 'Talha', 7, '2222-02-22', '13:38:00', 'pending', ''),
(3, 'Hashir ', 9, '2023-12-27', '22:27:00', 'pending', NULL),
(4, 'Mustafa ', 7, '2023-12-24', '03:03:00', 'completed', '../hospital/result/4_Get_Started_With_Smallpdf.pdf'),
(5, 'Hashir', 7, '2023-12-26', '01:50:00', 'completed', ''),
(6, 'Hashir', 7, '2023-11-29', '17:49:00', 'pending', ''),
(7, 'Hashir', 7, '2023-12-21', '18:49:00', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

CREATE TABLE `tbl_hospital` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(50) NOT NULL,
  `h_contact` varchar(50) NOT NULL,
  `h_city` varchar(50) DEFAULT NULL,
  `h_address` varchar(80) NOT NULL,
  `h_email` varchar(50) NOT NULL,
  `h_password` varchar(50) NOT NULL,
  `h_is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`h_id`, `h_name`, `h_contact`, `h_city`, `h_address`, `h_email`, `h_password`, `h_is_active`) VALUES
(7, 'Kiran Hospital', '03272589566', 'Multan, Pakistan', 'Gulshan e Hadeed ', 'kiran@gmail.com', 'kiran123', 0),
(9, 'Alkhimat Hospital', '03003720727', 'Karachi', 'Malir Halt', 'alkhidmat@gmail.com', '12345', 0),
(10, 'Alkhimat Hospital', '03003720727', 'Karachi', 'Malir Halt', 'alkhidmat@gmail.com', '12345', 0),
(11, 'Kiran', '030', 'Multan', 'Gulshan e Hadeed', 'kiran@gmail.com', '1234', 0),
(12, 'Kiran', '0300588888', 'Multan', 'Gulshan e Hadeed', 'kiran@gmail.com', '1234', 0),
(23, 'Liaquat National', '03052018828', 'Karachi', 'ABC Street ', 'liaquat@gmail.com', '123', 1),
(24, 'Dow University of Health and Sciences', '94394394893', 'Karachi', 'Ojha,Karachi', 'dow@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_contact` varchar(20) NOT NULL,
  `p_city` varchar(50) DEFAULT NULL,
  `p_email` varchar(255) DEFAULT NULL,
  `p_password` varchar(255) DEFAULT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patients`
--

INSERT INTO `tbl_patients` (`p_id`, `p_name`, `p_contact`, `p_city`, `p_email`, `p_password`, `hospital_id`) VALUES
(5, 'Talha ', '09093434', 'Multan', 'talha@gmail.com', '123', 11),
(7, 'Ocean Moreno', 'Impedit cumque Nam ', 'Elit ullamco repudi', 'rawoh@mailinator.com', 'Pa$$w0rd!', 0),
(8, 'Taha', '0302320320', 'Karachi', 'taha@gmail.com', '123', 0),
(9, 'Hashir', '03052018828', 'Karachi', 'hashir@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `t_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL,
  `t_date` date DEFAULT NULL,
  `t_time` time DEFAULT NULL,
  `t_result` varchar(50) DEFAULT 'Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(30) NOT NULL,
  `v_status` varchar(40) NOT NULL DEFAULT 'Avaliable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`v_id`, `v_name`, `v_status`) VALUES
(1, 'Novavax', 'Avaliable'),
(2, 'Sinopharm', 'Avaliable'),
(3, 'Moderna', 'Avaliable'),
(4, 'Pfizer–BioNTech', 'Avaliable'),
(5, 'Janssen', 'Avaliable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `h_id` (`h_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `tbl_covid_test_request`
--
ALTER TABLE `tbl_covid_test_request`
  ADD PRIMARY KEY (`test_request_id`),
  ADD KEY `preferred_hospital_id` (`preferred_hospital_id`);

--
-- Indexes for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_covid_test_request`
--
ALTER TABLE `tbl_covid_test_request`
  MODIFY `test_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `tbl_appointment_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `tbl_hospital` (`h_id`),
  ADD CONSTRAINT `tbl_appointment_ibfk_3` FOREIGN KEY (`v_id`) REFERENCES `tbl_vaccine` (`v_id`);

--
-- Constraints for table `tbl_covid_test_request`
--
ALTER TABLE `tbl_covid_test_request`
  ADD CONSTRAINT `tbl_covid_test_request_ibfk_1` FOREIGN KEY (`preferred_hospital_id`) REFERENCES `tbl_hospital` (`h_id`);

--
-- Constraints for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD CONSTRAINT `tbl_test_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tbl_patients` (`p_id`),
  ADD CONSTRAINT `tbl_test_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `tbl_hospital` (`h_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
