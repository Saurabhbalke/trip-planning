-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 06:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` varchar(50) NOT NULL,
  `apass` int(8) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `apass`, `name`) VALUES
('20bcs198@gmail.com', 12345, 'sarthak'),
('20bcs201@gmail.com', 12345, 'saurabh'),
('20bcs205@gmail.com', 12345, 'shivam');

-- --------------------------------------------------------

--
-- Table structure for table `curr_loc`
--

CREATE TABLE `curr_loc` (
  `c_id` int(8) NOT NULL,
  `c_city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curr_loc`
--

INSERT INTO `curr_loc` (`c_id`, `c_city`) VALUES
(201, 'Delhi'),
(202, 'Mumbai'),
(203, 'Kolkata'),
(204, 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `uid` varchar(50) NOT NULL,
  `upass` varchar(15) NOT NULL,
  `name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`uid`, `upass`, `name`) VALUES
('mehul1@gmail.com', '1234', 'mehul'),
('nikhil1@gmail.com', '1234', 'nikhil'),
('sarthak@gmail.com', '1234', 'sarthak'),
('saurabh36@gmail.com', '1234', 'saurabh'),
('shivam@gmail.com', '1234', 'shivam');

-- --------------------------------------------------------

--
-- Table structure for table `des_loc`
--

CREATE TABLE `des_loc` (
  `d_id` int(8) NOT NULL,
  `d_city` varchar(20) NOT NULL,
  `d_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `des_loc`
--

INSERT INTO `des_loc` (`d_id`, `d_city`, `d_link`) VALUES
(1, 'egypt', 'https://images.unsplash.com/photo-1584719866406-c76ddee48493?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=774&q=80'),
(401, 'Newyork', 'https://images.unsplash.com/photo-1434828927397-62ea053f7a35?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'),
(402, 'Bangkok', 'https://images.unsplash.com/photo-1582652840955-5da18538b6dd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80'),
(403, 'Hawaii', 'https://images.unsplash.com/photo-1550143140-a808693b609f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=871&q=80'),
(404, 'Maldives', 'https://images.unsplash.com/photo-1573843981267-be1999ff37cd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=774&q=80'),
(405, 'Dubai', 'https://images.unsplash.com/photo-1489516408517-0c0a15662682?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=774&q=80'),
(406, 'Singapore', 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=752&q=80');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `h_id` int(8) NOT NULL,
  `h_info` varchar(60) DEFAULT NULL,
  `h_price` int(8) DEFAULT NULL,
  `did` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`h_id`, `h_info`, `h_price`, `did`) VALUES
(4001, ' The rockway hotel ', 25429, 401),
(4012, 'Washington jefferson Hotel', 10431, 401),
(4013, 'Indigo Hotel', 13411, 401),
(4014, 'Crowne Plaza', 18803, 401),
(4015, 'Hayden Hotel', 17897, 401),
(4021, ' Anantara riverside Bangkok resort ', 4519, 402),
(4022, 'VIE Hotel', 6288, 402),
(4023, 'The peninsula', 25363, 402),
(4024, 'Ook wood suites', 5210, 402),
(4025, 'Sky view Hotel', 8752, 402),
(4031, ' Royal Kona Resort ', 18239, 403),
(4032, 'Renew Hotel', 9660, 403),
(4033, 'Aqua Oasis', 9053, 403),
(4034, 'Kquai shores Hotel', 16399, 403),
(4035, 'Coral Reef Hotel', 22389, 403),
(4041, 'Emerald maldives resort and spa', 24612, 404),
(4042, 'Lux South  Ari Atoll', 37216, 404),
(4043, 'Kurumba Maldives', 17819, 404),
(4044, 'Dhigufaru Island Resort, Maldives', 69500, 404),
(4051, ' Park Hyatt , Dubai ', 4519, 405),
(4052, 'Atana Hotel', 8154, 405),
(4053, 'Five Jumeriah village', 12843, 405),
(4054, 'Flora Inn Hotel', 7339, 405),
(4055, 'THe meydon Hotel', 13231, 405),
(4061, 'Marina bag sands hotel , singapore', 30306, 406),
(4062, 'Quayside wing', 16305, 406),
(4063, 'The scarlet singapore', 9417, 406),
(4064, 'Naumi Hotel', 14993, 406),
(4065, 'Carlton Hotel', 13294, 406);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pkg_id` int(8) NOT NULL,
  `pkg_price` int(8) DEFAULT NULL,
  `contents` text DEFAULT NULL,
  `pkg_link` text NOT NULL,
  `pkg_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pkg_id`, `pkg_price`, `contents`, `pkg_link`, `pkg_name`) VALUES
(1001, 140000, 'Check-in Time: 02:00 PM |\r\nCheck-out Time: 12:00 PM | \r\nResort Location: Male North Harbour, Boduthakurufaanu Magu. | Duration: 4D/3N.\r\n\r\n', 'https://images.unsplash.com/photo-1574223706388-0e0f6f0390b2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80', 'Dhigufaru island resort maldives'),
(1002, 127990, 'Check-in Time: 09:30 AM | Check-out Time: 11:40 PM | Resort Location: Résidence Charles Floquet. | Duration: 3D/4N.', 'https://images.unsplash.com/photo-1549144511-f099e773c147?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80', 'Eiffel Tower Skip The Line Access In Par'),
(1003, 146011, 'Check-in Time: 09:30 AM | Check-out Time: 11:40 PM | Resort Location:Hotel Krone Regensberg. | Duration: 3D/4N.', 'https://images.unsplash.com/photo-1517490560101-4ffe479ef5c3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=465&q=80', 'Glimpses of Switzerland'),
(1004, 154908, 'Check-in Time: 09:30 AM | Check-out Time: 11:40 PM | Resort Location: InterContinental Istanbul, an IHG Hotel. | Duration: 5D/4N.\r\n\r\n', 'https://images.unsplash.com/photo-1526048598645-62b31f82b8f5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=387&q=80', 'Albelu Turkey ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `uid` varchar(50) NOT NULL,
  `pkgid` int(8) NOT NULL,
  `card_num` int(15) NOT NULL,
  `cvv` int(3) NOT NULL,
  `exp_date` date NOT NULL,
  `price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`uid`, `pkgid`, `card_num`, `cvv`, `exp_date`, `price`) VALUES
('sarthak@gmail.com', 1001, 87879898, 233, '2022-10-25', 140000),
('saurabh36@gmail.com', 1001, 87879898, 566, '2022-07-27', 140000),
('saurabh36@gmail.com', 1003, 87879898, 455, '2022-07-26', 146011),
('shivam@gmail.com', 1002, 87879898, 344, '2021-11-25', 127990);

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `p_id` int(8) NOT NULL,
  `p_price` int(8) DEFAULT NULL,
  `p_name` varchar(15) DEFAULT NULL,
  `p_timea` time DEFAULT NULL,
  `p_timeb` time DEFAULT NULL,
  `cid` int(8) NOT NULL,
  `did` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`p_id`, `p_price`, `p_name`, `p_timea`, `p_timeb`, `cid`, `did`) VALUES
(30, 41038, 'japan_airways', '20:05:00', '08:40:00', 201, 404),
(37, 16178, 'go_air', '07:20:00', '21:50:00', 201, 406),
(41, 20575, 'indigo', '20:25:00', '03:15:00', 203, 406),
(75, 18070, 'indigo', '13:40:00', '19:15:00', 204, 402),
(77, 20755, 'indigo', '21:10:00', '01:15:00', 203, 402),
(103, 42094, 'spicejet', '18:25:00', '15:00:00', 201, 401),
(193, 18611, 'air_india', '00:20:00', '10:20:00', 204, 406),
(217, 35192, 'etihod', '02:15:00', '15:00:00', 204, 401),
(251, 28140, 'ai_express', '07:25:00', '09:10:00', 202, 405),
(267, 8159, 'air_india', '06:40:00', '11:50:00', 201, 404),
(268, 46493, 'indigo', '19:55:00', '15:15:00', 203, 401),
(271, 11116, 'vistara', '11:05:00', '13:10:00', 202, 404),
(316, 15228, 'thai_airways', '00:20:00', '11:15:00', 201, 406),
(319, 9891, 'thai_airways', '00:20:00', '05:45:00', 201, 402),
(355, 36374, 'virgin_atlentic', '02:20:00', '01:40:00', 202, 401),
(557, 38202, 'qatar_airways', '04:25:00', '03:15:00', 202, 401),
(561, 88452, 'qatar_airways', '08:50:00', '07:05:00', 202, 402),
(569, 10186, 'emirates', '04:20:00', '06:50:00', 204, 405),
(571, 37814, 'qatar_airways', '21:30:00', '14:30:00', 201, 401),
(573, 36282, 'qatar_airways', '03:45:00', '14:30:00', 204, 401),
(577, 42302, 'qatar_airways', '03:45:00', '15:30:00', 204, 403),
(598, 45219, 'qatar_airways', '10:05:00', '05:53:00', 202, 403),
(599, 74298, 'qatar_airways', '10:05:00', '10:00:00', 202, 402),
(603, 27226, 'airindia', '06:15:00', '19:25:00', 202, 406),
(611, 15584, 'airindia', '11:00:00', '07:00:00', 202, 405),
(708, 28302, 'vistra', '22:20:00', '06:15:00', 203, 405),
(770, 30443, 'air_india', '20:30:00', '14:05:00', 203, 402),
(778, 28135, 'vistra', '15:20:00', '10:20:00', 203, 406),
(830, 84217, 'go_first', '22:01:00', '23:20:00', 202, 403),
(837, 9309, 'go_air', '07:20:00', '13:00:00', 201, 402),
(839, 45558, 'air_india', '21:30:00', '20:20:00', 201, 403),
(841, 14332, 'go_air', '02:15:00', '12:40:00', 204, 406),
(906, 29347, 'indigo', '18:50:00', '06:00:00', 203, 405),
(1102, 33106, 'air_india', '07:25:00', '07:20:00', 202, 406),
(1403, 13097, 'indigo', '03:05:00', '05:30:00', 201, 405),
(1530, 8506, 'united', '10:10:00', '12:20:00', 202, 404),
(1770, 42999, 'air_india', '20:30:00', '07:55:00', 203, 401),
(2129, 56696, 'indigo', '22:30:00', '21:20:00', 203, 403),
(2670, 14943, 'vistra', '22:00:00', '00:30:00', 201, 405),
(3310, 44785, 'spice_jet', '22:25:00', '20:30:00', 204, 403),
(5574, 15790, 'air_india', '22:10:00', '16:30:00', 203, 404),
(6456, 11040, 'indigo_airlines', '05:00:00', '11:55:00', 204, 404),
(6731, 12836, 'indigo', '23:20:00', '16:40:00', 203, 404),
(6732, 53945, 'air_asia', '22:10:00', '21:15:00', 203, 403),
(7654, 123, 'indigo', '05:00:00', '12:00:00', 201, 401),
(8132, 7005, 'go_air', '12:50:00', '14:35:00', 204, 404),
(8385, 9098, 'go_first', '05:45:00', '18:45:00', 204, 402),
(9497, 11739, 'air_arabia', '03:30:00', '06:00:00', 204, 405),
(81531, 10619, 'go_air', '20:05:00', '08:20:00', 201, 404);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `pkgid` int(8) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `rating` int(2) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`pkgid`, `u_id`, `rating`, `comment`) VALUES
(1001, 'sarthak@gmail.com', 4, 'good experience '),
(1001, 'saurabh36@gmail.com', 4, 'It was a good experience and have a enjoyful vaccation'),
(1003, 'sarthak@gmail.com', 4, 'good'),
(1003, 'saurabh36@gmail.com', 3, 'Trip was good though but due to climate change we cant enjoy some of the places. so it will be good if you will prepare for this kind of circumstances.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tourist_place`
--

CREATE TABLE `tourist_place` (
  `t_id` int(8) NOT NULL,
  `t_address` varchar(50) DEFAULT NULL,
  `did` int(8) DEFAULT NULL,
  `reach_cost` int(8) DEFAULT NULL,
  `eat_cost` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist_place`
--

INSERT INTO `tourist_place` (`t_id`, `t_address`, `did`, `reach_cost`, `eat_cost`) VALUES
(901, 'Male city', 404, 6000, 2000),
(902, 'COMO cocoa Island', 404, 9000, 3000),
(903, 'The Muraka-conrad', 404, 5000, 2000),
(904, 'Vaadhoo Island', 404, 10000, 3000),
(905, 'Universal studios ', 406, 7860, 2300),
(906, 'Singapore flyer ', 406, 8756, 2400),
(907, 'Marina bay ', 406, 9870, 3100),
(908, 'Sentore island ', 406, 10320, 2800),
(909, 'Volcanoes national park ', 403, 7356, 3400),
(9010, 'Waikiki beach & Diamond head state ', 403, 8670, 3200),
(9011, 'Kona coffee living history farm ', 403, 7020, 2990),
(9012, 'Beauty Grand Palace', 402, 3490, 2390),
(9013, 'National Muscum & Wang na palace ', 402, 4790, 3280),
(9014, 'River Cruise', 402, 1090, 4320),
(9015, 'Wat traimit', 402, 8760, 2670),
(9016, 'Temple of Golden Buddha', 402, 2390, 1990),
(9017, 'Statue of liberty', 401, 1280, 5690),
(9018, 'Times square', 401, 13700, 4990),
(9019, 'Brooklyn bridge', 401, 11780, 6590),
(9020, 'Wall street', 401, 12480, 4690),
(9021, 'Burj khalifa', 405, 10780, 5590),
(9022, 'Dubai wall', 405, 12760, 6730),
(9023, 'Dubai underwater Zoo', 405, 15790, 5820),
(9024, 'Palm jumerah', 405, 13250, 4980),
(9025, 'Hamakav heritage couridor ', 403, 8990, 3190);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `curr_loc`
--
ALTER TABLE `curr_loc`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `des_loc`
--
ALTER TABLE `des_loc`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pkg_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`uid`,`pkgid`),
  ADD KEY `pkgid` (`pkgid`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `did` (`did`,`cid`) USING BTREE,
  ADD KEY `plane_ibfk_1` (`cid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`pkgid`,`u_id`),
  ADD KEY `review_ibfk_2` (`u_id`);

--
-- Indexes for table `tourist_place`
--
ALTER TABLE `tourist_place`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `did` (`did`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`did`) REFERENCES `des_loc` (`d_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `customer` (`uid`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`pkgid`) REFERENCES `package` (`pkg_id`);

--
-- Constraints for table `plane`
--
ALTER TABLE `plane`
  ADD CONSTRAINT `plane_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `curr_loc` (`c_id`),
  ADD CONSTRAINT `plane_ibfk_2` FOREIGN KEY (`did`) REFERENCES `des_loc` (`d_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`pkgid`) REFERENCES `package` (`pkg_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `customer` (`uid`);

--
-- Constraints for table `tourist_place`
--
ALTER TABLE `tourist_place`
  ADD CONSTRAINT `tourist_place_ibfk_1` FOREIGN KEY (`did`) REFERENCES `des_loc` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
