-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 09:05 AM
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
-- Database: `bloodmg`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `view_donor_eligibility` (IN `donor_id` INT(10))  begin
declare hl varchar(10);
declare msg varchar(100);
declare bloods varchar(10);
declare bloodp varchar(10);
select HLevel into hl from Donor where d_id = donor_id;
select BS into bloods from Donor where d_id = donor_id;
select BP into bloodp from Donor where d_id = donor_id;
if hl = 'normal' and bloods = 'normal' and bloodp = 'normal' then
	update donor set eligibility = 'Eligible!!' where d_id = donor_id;
else
	update donor set eligibility = 'Not Eligible!' where d_id = donor_id;
end if;

end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `view_stock` (`blood_grp` VARCHAR(5)) RETURNS INT(11) begin
declare quantity int;
select sum(b_qnty) into quantity from blood_stock where b_grp = blood_grp group by B_grp ;
return quantity; 
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bbmanager`
--

CREATE TABLE `bbmanager` (
  `M_id` int(11) NOT NULL,
  `M_name` varchar(10) DEFAULT NULL,
  `M_phno` varchar(10) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bbmanager`
--

INSERT INTO `bbmanager` (`M_id`, `M_name`, `M_phno`, `password`) VALUES
(100, 'Sam', '0123456789', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `id` int(5) NOT NULL,
  `reci_name` varchar(10) NOT NULL,
  `reci_bgrp` varchar(5) NOT NULL,
  `reci_bqnty` int(10) NOT NULL,
  `reci_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`id`, `reci_name`, `reci_bgrp`, `reci_bqnty`, `reci_id`) VALUES
(30, 'Allen', 'AB+', 2, 5),
(32, 'pranavvv', 'O+', 1, 8);

--
-- Triggers `blood_request`
--
DELIMITER $$
CREATE TRIGGER `delete_blood_stock1` AFTER DELETE ON `blood_request` FOR EACH ROW UPDATE blood_stock set b_qnty = b_qnty - old.reci_bqnty WHERE b_grp = old.reci_bgrp
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `stockid` int(50) NOT NULL,
  `b_grp` varchar(3) NOT NULL,
  `B_qnty` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`stockid`, `b_grp`, `B_qnty`) VALUES
(1, 'A+', 8),
(2, 'B+', 10),
(3, 'O+', 10),
(4, 'AB+', 10),
(5, 'A-', 10),
(6, 'B-', 10),
(7, 'O-', 10),
(8, 'AB-', 10);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `D_id` int(10) NOT NULL,
  `D_name` varchar(10) DEFAULT NULL,
  `D_age` int(11) DEFAULT NULL,
  `D_sex` varchar(10) DEFAULT NULL,
  `D_phno` varchar(10) DEFAULT NULL,
  `D_bgrp` varchar(5) DEFAULT NULL,
  `HLevel` varchar(10) DEFAULT NULL,
  `BS` varchar(10) DEFAULT NULL,
  `BP` varchar(10) DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `eligibility` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`D_id`, `D_name`, `D_age`, `D_sex`, `D_phno`, `D_bgrp`, `HLevel`, `BS`, `BP`, `rdate`, `eligibility`) VALUES
(5, 'manoranjan', 20, 'male', '7878798989', 'AB+', 'normal', 'normal', 'normal', '2021-09-23', 'Eligible!!'),
(6, 'parth', 20, 'male', '8787699087', 'A+', 'normal', 'normal', 'normal', '2021-10-08', 'Eligible!!'),
(7, 'tim', 33, 'male', '8765498987', 'A+', 'normal', 'HIGH', 'normal', '2021-10-08', 'Not Eligible!');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `reci_id` int(5) NOT NULL,
  `reci_name` varchar(10) NOT NULL,
  `reci_age` int(11) DEFAULT NULL,
  `reci_sex` varchar(10) DEFAULT NULL,
  `reci_phno` varchar(10) DEFAULT NULL,
  `reci_bgrp` varchar(5) DEFAULT NULL,
  `reci_reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`reci_id`, `reci_name`, `reci_age`, `reci_sex`, `reci_phno`, `reci_bgrp`, `reci_reg_date`) VALUES
(4, 'don', 55, 'Male', '6767589897', 'A+', '2021-10-02'),
(5, 'Allen', 25, 'Female', '9987899876', 'AB+', '2021-10-02'),
(7, 'Mill', 44, '23', '8878799897', 'B+', '2021-10-08'),
(8, 'pranavvv', 21, 'male', '1234567891', 'O+', '2021-10-09'),
(11, 'Singhh', 22, 'Male', '6767589897', 'A+', '2021-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'sample', 'sample@email.com', '0123456789', 'admin123'),
(2, 'atharv', 'atharvagurav01@gmail.com', '0826203541', 'a152e841783914146e4bcd4f39100686'),
(3, 'max', 'max@gmail.com', '1212134343', '33f4d8d0f9cdd179799fb33d3bd1e1ee'),
(4, 'aamir', 'aamir01@gmail.com', '9090934343', '5bae6e3b79392e92d2065bf527bd8136'),
(5, 'Sam', 'sam@gmail.com', '9191234567', '56fafa8964024efa410773781a5f9e93'),
(10, 'Singh', 'exaample@gmail.com', '0123456789', 'b5b73fae0d87d8b4e2573105f8fbe7bc'),
(14, 'abc', 'abc@gmail.com', '0826203541', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbmanager`
--
ALTER TABLE `bbmanager`
  ADD PRIMARY KEY (`M_id`),
  ADD UNIQUE KEY `M_phno` (`M_phno`);

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reci_id` (`reci_id`,`reci_name`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`D_id`),
  ADD UNIQUE KEY `D_phno` (`D_phno`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`reci_id`,`reci_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbmanager`
--
ALTER TABLE `bbmanager`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `blood_stock`
--
ALTER TABLE `blood_stock`
  MODIFY `stockid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `D_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `reci_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD CONSTRAINT `blood_request_ibfk_1` FOREIGN KEY (`reci_id`,`reci_name`) REFERENCES `recipient` (`reci_id`, `reci_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
