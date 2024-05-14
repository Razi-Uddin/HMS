-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 10:43 AM
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
-- Database: `myhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `city`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`) VALUES
(4, 1, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 'Islamabad', 550, '2020-02-14', '10:00:00', 1, 0),
(4, 2, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 'Lahore', 700, '2020-02-28', '10:00:00', 0, 1),
(4, 3, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Amit', 'Lahore', 1000, '2020-02-19', '03:00:00', 0, 1),
(11, 4, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'ashok', 'Karachi', 500, '2020-02-29', '20:00:00', 1, 1),
(4, 5, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 'Lahore', 700, '2020-02-28', '12:00:00', 1, 1),
(4, 6, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 'Islamabad', 550, '2020-02-26', '15:00:00', 0, 1),
(2, 8, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'Ganesh', 'Islamabad', 550, '2020-03-21', '10:00:00', 1, 1),
(5, 9, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'Ganesh', 'Islamabad', 550, '2020-03-19', '20:00:00', 1, 0),
(4, 10, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 'Islamabad', 550, '0000-00-00', '14:00:00', 1, 0),
(4, 11, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 'Lahore', 700, '2020-03-27', '15:00:00', 1, 1),
(9, 12, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Kumar', 'Faisalabad', 800, '2020-03-26', '12:00:00', 1, 1),
(9, 13, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Tiwary', 'Islamabad', 450, '2020-03-26', '14:00:00', 1, 1),
(0, 14, 'abdul', 'basit', 'Male', 'basit@gmail.com', '0323230245', 'Razi', 'Karachi', 1000, '2024-01-19', '12:00:00', 0, 1),
(0, 15, 'abdul', 'basit', 'Male', 'basit@gmail.com', '0323230245', 'Razi', 'Karachi', 1000, '2024-01-24', '14:00:00', 1, 0),
(0, 16, 'abdul', 'basit', 'Male', 'basit@gmail.com', '0323230245', 'saad', 'Lahore', 2000, '2024-01-29', '16:00:00', 1, 0),
(17, 17, 'jamal', 'uddin', 'Male', 'j@gmail.com', '0312256320', 'Razi', 'Karachi', 1000, '2024-01-29', '08:00:00', 1, 0),
(22, 18, 'Amir', 'Hafeez', 'Male', 'amir@gmail.com', '0923313598', 'Amit', '', 1000, '2024-03-01', '14:00:00', 1, 1),
(25, 19, 'rafay', 'khan', 'Male', 'rafay@gmail.com', '0332258966', 'Uzair', '', 1500, '2024-02-19', '16:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `contact`, `message`) VALUES
(1, 'Anu', 'anu@gmail.com', '7896677554', 'Hey Admin'),
(2, ' Viki', 'viki@gmail.com', '9899778865', 'Good Job, Pal'),
(3, 'Ananya', 'ananya@gmail.com', '9997888879', 'How can I reach you?'),
(4, 'Aakash', 'aakash@gmail.com', '8788979967', 'Love your site'),
(5, 'Mani', 'mani@gmail.com', '8977768978', 'Want some coffee?'),
(6, 'Karthick', 'karthi@gmail.com', '9898989898', 'Good service'),
(7, 'Abbis', 'abbis@gmail.com', '8979776868', 'Love your service'),
(8, 'Asiq', 'asiq@gmail.com', '9087897564', 'Love your service. Thank you!'),
(9, 'Jane', 'jane@gmail.com', '7869869757', 'I love your service!'),
(10, 'Muhammad Razi Uddin', 'm.raziuddin99@gmail.com', '3091256320', 'Hello ! 23131231231564');

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `availability` varchar(20) NOT NULL DEFAULT 'Daily',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`id`, `username`, `password`, `email`, `spec`, `docFees`, `city`, `availability`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(2, 'Dinesh', 'dinesh123', 'dinesh@gmail.com', 'General', 700, 'Lahore', 'Daily', NULL, NULL, NULL, NULL),
(4, 'Kumar', 'kumar123', 'kumar@gmail.com', 'Pediatrician', 800, 'Faisalabad', 'Daily', NULL, NULL, NULL, NULL),
(5, 'Amit', 'amit123', 'amit@gmail.com', 'Cardiologist', 1000, 'Lahore', 'Daily', NULL, NULL, NULL, NULL),
(6, 'Abbis', 'abbis123', 'abbis@gmail.com', 'Neurologist', 1500, 'Faisalabad', 'Daily', NULL, NULL, NULL, NULL),
(7, 'Tiwary', 'tiwary123', 'tiwary@gmail.com', 'Pediatrician', 450, 'Islamabad', 'Daily', NULL, NULL, NULL, NULL),
(9, 'saad', '123', 'saad@gmail.com', 'General', 1500, 'Lahore', 'Daily', NULL, NULL, NULL, NULL),
(11, 'Nooruddin', '123456', 'noor@gmail.com', 'Cardiologist', 1500, 'Karachi', 'Daily', NULL, NULL, NULL, NULL),
(12, 'Ahmed', '123456', 'ahmed@gmail.com', 'Neurologist', 3000, 'Islamabad', 'Daily', NULL, NULL, NULL, NULL),
(14, 'Raziuddin', '123456', 'm.raziuddin99@gmail.com', 'Cardiologist', 2000, 'Karachi', 'Daily', NULL, NULL, NULL, NULL),
(15, 'Uzair', '123456', 'uzair@gmail.com', 'Cardiologist', 1500, 'Karachi', 'Daily', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patreg`
--

CREATE TABLE `patreg` (
  `pid` int(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patreg`
--

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`) VALUES
(1, 'abdul', 'basit', 'Male', 'basit@gmail.com', '0323230245', 'basit321', 'basit321'),
(2, 'shafia', 'Noor', 'Female', 'shafia@gmail.com', '1234567891', '123456', 'ram123'),
(3, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'alia123', 'alia123'),
(4, 'Shahrukh', 'khan', 'Male', 'shahrukh@gmail.com', '8976898463', 'shahrukh123', 'shahrukh123'),
(5, 'Raheem', 'Uddin', 'Male', 'raheem@gmail.com', '0313525365', '123456', 'kishan123'),
(6, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'gautam123', 'gautam123'),
(7, 'Sushant', 'Singh', 'Male', 'sushant@gmail.com', '9059986865', 'sushant123', 'sushant123'),
(8, 'Nancy', 'Deborah', 'Female', 'nancy@gmail.com', '9128972454', 'nancy123', 'nancy123'),
(9, 'Kenny', 'Sebastian', 'Male', 'kenny@gmail.com', '9809879868', 'kenny123', 'kenny123'),
(10, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'william123', 'william123'),
(11, 'Peter', 'Norvig', 'Male', 'peter@gmail.com', '9609362815', 'peter123', 'peter123'),
(12, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'shraddha123', 'shraddha123'),
(14, 'raaz', 'udi', 'Male', 'raz@gmail.com', '+923313598', '123456', '123456'),
(17, 'jamal', 'uddin', 'Male', 'j@gmail.com', '0312256320', '123456', '123456'),
(18, 'Jamal', 'Uddin', 'Male', 'abcnsdkakllc@masladsc', 'sdcsdcsdcs', '123456', '123456'),
(19, 'aalock', 'gulab', 'Male', 'aalock@mail.com', '0312256320', '112233', '112233'),
(20, 'Sohail', 'Ahmed', 'Male', 'sohail@gmail.com', '1234567891', 'sohail', 'sohail'),
(21, 'Taha', 'Umair', 'Male', 'taha@gmail.com', '1234567891', '123456', '123456'),
(22, 'Amir', 'Hafeez', 'Male', 'amir@gmail.com', '0923313598', '123', '123'),
(23, 'Abdullah', 'Mustaqeem', 'Male', 'abdullah@gmail.com', '0313525365', '123456', '123456'),
(24, 'Shahzaib', 'khan', 'Male', 'shah@gmail.com', '0331359811', '123', '123'),
(25, 'rafay', 'khan', 'Male', 'rafay@gmail.com', '0332258966', '654321', '654321');

-- --------------------------------------------------------

--
-- Table structure for table `prestb`
--

CREATE TABLE `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 4, 11, 'Kishan', 'Lal', '2020-03-27', '15:00:00', 'Cough', 'Nothing', 'Just take a teaspoon of Benadryl every night'),
('Ganesh', 2, 8, 'Alia', 'Bhatt', '2020-03-21', '10:00:00', 'Severe Fever', 'Nothing', 'Take bed rest'),
('Kumar', 9, 12, 'William', 'Blake', '2020-03-26', '12:00:00', 'Sever fever', 'nothing', 'Paracetamol -> 1 every morning and night'),
('Tiwary', 9, 13, 'William', 'Blake', '2020-03-26', '14:00:00', 'Cough', 'Skin dryness', 'Intake fruits with more water content'),
('Razi', 0, 15, 'abdul', 'basit', '2024-01-24', '14:00:00', 'Nothing', 'No Allergies', 'asddfdkfklcnv chbdkcmvkld sdjchukwdhc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctb`
--
ALTER TABLE `doctb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patreg`
--
ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctb`
--
ALTER TABLE `doctb`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patreg`
--
ALTER TABLE `patreg`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
