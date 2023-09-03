-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 06:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indian_rail_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bms_block_register`
--

CREATE TABLE `bms_block_register` (
  `id` int(11) NOT NULL,
  `dateTime` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `board` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `fromStation` varchar(50) NOT NULL,
  `toStation` varchar(50) NOT NULL,
  `blockType` varchar(50) NOT NULL,
  `mainWork` varchar(50) NOT NULL,
  `subWork` varchar(50) NOT NULL,
  `organisation` varchar(50) NOT NULL,
  `sseName` varchar(50) NOT NULL,
  `mobileNo` varchar(50) NOT NULL,
  `kmFrom` varchar(50) NOT NULL,
  `kmTo` varchar(50) NOT NULL,
  `otherLineAffected` varchar(50) NOT NULL,
  `signalAffected` varchar(50) NOT NULL,
  `workDetails` varchar(50) NOT NULL,
  `typeOfDemand` varchar(50) NOT NULL,
  `quantumOfWorkDemand` varchar(50) NOT NULL,
  `resourcesNeeded` varchar(50) NOT NULL,
  `dayNight` varchar(50) NOT NULL,
  `demandHrs` varchar(50) NOT NULL,
  `corridorFrom` varchar(50) NOT NULL,
  `corridorTo` varchar(50) NOT NULL,
  `ohe` varchar(50) NOT NULL,
  `sAndT` varchar(50) NOT NULL,
  `btnPower` varchar(50) NOT NULL,
  `sasm` varchar(50) NOT NULL,
  `vahicle` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `operatedFrom` varchar(50) NOT NULL,
  `operatedTo` varchar(50) NOT NULL,
  `operatedOrNot` varchar(50) NOT NULL,
  `progress` varchar(50) NOT NULL,
  `resonRemark` varchar(50) NOT NULL,
  `oheSecFrom` varchar(50) NOT NULL,
  `oheSecTo` varchar(50) NOT NULL,
  `created_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_block_register`
--

INSERT INTO `bms_block_register` (`id`, `dateTime`, `department`, `board`, `line`, `fromStation`, `toStation`, `blockType`, `mainWork`, `subWork`, `organisation`, `sseName`, `mobileNo`, `kmFrom`, `kmTo`, `otherLineAffected`, `signalAffected`, `workDetails`, `typeOfDemand`, `quantumOfWorkDemand`, `resourcesNeeded`, `dayNight`, `demandHrs`, `corridorFrom`, `corridorTo`, `ohe`, `sAndT`, `btnPower`, `sasm`, `vahicle`, `status`, `operatedFrom`, `operatedTo`, `operatedOrNot`, `progress`, `resonRemark`, `oheSecFrom`, `oheSecTo`, `created_date`) VALUES
(1, '2023-08-26', 'ENGG', 'CSMT-CLA', '1', 'CSMT', 'MSD', 'A', '1', '1', 'Railway', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'DAY', '11:11', '11:59', '01:01', 'No', 'No', 'No', 'No', '1', 'Demand', '11:11', '11:11', 'Operated', '1', '1', '11', '1', '2023-08-26 08:22:31'),
(2, '2023-08-27', 'ENGG', 'CLA-KYN', '11', 'CSMT', 'MSD', 'A', '1', '11', 'Railway', '11', '111', '10', '100', '1', '1', '1', '1', '1', '1', 'NIGHT', '16:14', '04:02', '03:01', 'No', 'No', 'No', 'No', 'qq', 'Demand', '14:13', '02:01', 'Operated', '1', '1', '1', '1', '2023-08-27 03:14:34'),
(3, '2023-08-27', 'S&T', 'CSMT-CLA', 'line1', 'CSMT', 'MSD', 'B', '1', '1234', 'Railway', 'qwer', '11111222333', '1', '10', '12', '121', '1211', '222', '223', '333', 'NIGHT', '17:28', '05:28', '17:30', 'No', 'No', 'No', 'No', 'verr123', 'Demand', '21:29', '23:29', 'Operated', '1232', '442', '32342', '23234', '2023-08-27 05:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `component_modal`
--

CREATE TABLE `component_modal` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_date` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `component_modal`
--

INSERT INTO `component_modal` (`id`, `name`, `email`, `created_date`) VALUES
(1, 'ram', 'ram@gamil.com', '2023-08-13 11:28:22'),
(2, 'VISHNU SAHANI', 'vishnu@gmail.com', '2023-08-13 11:29:41'),
(3, 'm', 'n', '2023-08-13 11:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(8) NOT NULL DEFAULT 0,
  `state_id` int(8) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`) VALUES
(1, 1, 'North Andaman'),
(2, 1, 'South Andaman'),
(3, 1, 'Nicobar'),
(4, 2, 'Adilabad'),
(5, 2, 'Anantapur'),
(6, 2, 'Chittoor'),
(7, 2, 'East Godavari'),
(8, 2, 'Guntur'),
(9, 2, 'Hyderabad'),
(10, 2, 'Karimnagar'),
(11, 2, 'Khammam'),
(12, 2, 'Krishna'),
(13, 2, 'Kurnool'),
(14, 2, 'Mahbubnagar'),
(15, 2, 'Medak'),
(16, 2, 'Nalgonda'),
(17, 2, 'Nizamabad'),
(18, 2, 'Prakasam'),
(19, 2, 'Ranga Reddy'),
(20, 2, 'Srikakulam'),
(21, 2, 'Sri Potti Sri Ramulu Nellore'),
(22, 2, 'Vishakhapatnam'),
(23, 2, 'Vizianagaram'),
(24, 2, 'Warangal'),
(25, 2, 'West Godavari'),
(26, 2, 'Cudappah'),
(27, 3, 'Anjaw'),
(28, 3, 'Changlang'),
(29, 3, 'East Siang'),
(30, 3, 'East Kameng'),
(31, 3, 'Kurung Kumey'),
(32, 3, 'Lohit'),
(33, 3, 'Lower Dibang Valley'),
(34, 3, 'Lower Subansiri'),
(35, 3, 'Papum Pare'),
(36, 3, 'Tawang'),
(37, 3, 'Tirap'),
(38, 3, 'Dibang Valley'),
(39, 3, 'Upper Siang'),
(40, 3, 'Upper Subansiri'),
(41, 3, 'West Kameng'),
(42, 3, 'West Siang'),
(43, 4, 'Baksa'),
(44, 4, 'Barpeta'),
(45, 4, 'Bongaigaon'),
(46, 4, 'Cachar'),
(47, 4, 'Chirang'),
(48, 4, 'Darrang'),
(49, 4, 'Dhemaji'),
(50, 4, 'Dima Hasao'),
(51, 4, 'Dhubri'),
(52, 4, 'Dibrugarh'),
(53, 4, 'Goalpara'),
(54, 4, 'Golaghat'),
(55, 4, 'Hailakandi'),
(56, 4, 'Jorhat'),
(57, 4, 'Kamrup'),
(58, 4, 'Kamrup Metropolitan'),
(59, 4, 'Karbi Anglong'),
(60, 4, 'Karimganj'),
(61, 4, 'Kokrajhar'),
(62, 4, 'Lakhimpur'),
(63, 4, 'Morigaon'),
(64, 4, 'Nagaon'),
(65, 4, 'Nalbari'),
(66, 4, 'Sivasagar'),
(67, 4, 'Sonitpur'),
(68, 4, 'Tinsukia'),
(69, 4, 'Udalguri'),
(70, 5, 'Araria'),
(71, 5, 'Arwal'),
(72, 5, 'Aurangabad'),
(73, 5, 'Banka'),
(74, 5, 'Begusarai'),
(75, 5, 'Bhagalpur'),
(76, 5, 'Bhojpur'),
(77, 5, 'Buxar'),
(78, 5, 'Darbhanga'),
(79, 5, 'East Champaran'),
(80, 5, 'Gaya'),
(81, 5, 'Gopalganj'),
(82, 5, 'Jamui'),
(83, 5, 'Jehanabad'),
(84, 5, 'Kaimur'),
(85, 5, 'Katihar'),
(86, 5, 'Khagaria'),
(87, 5, 'Kishanganj'),
(88, 5, 'Lakhisarai'),
(89, 5, 'Madhepura'),
(90, 5, 'Madhubani'),
(91, 5, 'Munger'),
(92, 5, 'Muzaffarpur'),
(93, 5, 'Nalanda'),
(94, 5, 'Nawada'),
(95, 5, 'Patna'),
(96, 5, 'Purnia'),
(97, 5, 'Rohtas'),
(98, 5, 'Saharsa'),
(99, 5, 'Samastipur'),
(100, 5, 'Saran'),
(101, 5, 'Sheikhpura'),
(102, 5, 'Sheohar'),
(103, 5, 'Sitamarhi'),
(104, 5, 'Siwan'),
(105, 5, 'Supaul'),
(106, 6, 'Chandigarh'),
(107, 7, 'Bastar'),
(108, 7, 'Bijapur'),
(109, 7, 'Bilaspur'),
(110, 7, 'Dantewada'),
(111, 7, 'Dhamtari'),
(112, 7, 'Durg'),
(113, 7, 'Jashpur'),
(114, 7, 'Janjgir-Champa'),
(115, 7, 'Korba'),
(116, 7, 'Koriya'),
(117, 7, 'Kanker'),
(118, 7, 'Kabirdham (formerly Kawardha)'),
(119, 7, 'Mahasamund'),
(120, 7, 'Narayanpur'),
(121, 7, 'Raigarh'),
(122, 7, 'Rajnandgaon'),
(123, 7, 'Raipur'),
(124, 7, 'Surguja'),
(125, 8, 'Dadra and Nagar Haveli'),
(126, 9, 'Daman'),
(127, 9, 'Diu'),
(128, 10, 'Central Delhi'),
(129, 10, 'East Delhi'),
(130, 10, 'New Delhi'),
(131, 10, 'North Delhi'),
(132, 10, 'North East Delhi'),
(133, 10, 'North West Delhi'),
(134, 10, 'South Delhi'),
(135, 10, 'South West Delhi'),
(136, 10, 'West Delhi'),
(137, 11, 'North Goa'),
(138, 11, 'South Goa'),
(139, 12, 'Ahmedabad'),
(140, 12, 'Amreli district'),
(141, 12, 'Anand'),
(142, 12, 'Banaskantha'),
(143, 12, 'Bharuch'),
(144, 12, 'Bhavnagar'),
(145, 12, 'Dahod'),
(146, 12, 'The Dangs'),
(147, 12, 'Gandhinagar'),
(148, 12, 'Jamnagar'),
(149, 12, 'Junagadh'),
(150, 12, 'Kutch'),
(151, 12, 'Kheda'),
(152, 12, 'Mehsana'),
(153, 12, 'Narmada'),
(154, 12, 'Navsari'),
(155, 12, 'Patan'),
(156, 12, 'Panchmahal'),
(157, 12, 'Porbandar'),
(158, 12, 'Rajkot'),
(159, 12, 'Sabarkantha'),
(160, 12, 'Surendranagar'),
(161, 12, 'Surat'),
(162, 12, 'Tapi'),
(163, 12, 'Vadodara'),
(164, 12, 'Valsad'),
(165, 13, 'Ambala'),
(166, 13, 'Bhiwani'),
(167, 13, 'Faridabad'),
(168, 13, 'Fatehabad'),
(169, 13, 'Gurgaon'),
(170, 13, 'Hissar'),
(171, 13, 'Jhajjar'),
(172, 13, 'Jind'),
(173, 13, 'Karnal'),
(174, 13, 'Kaithal'),
(175, 13, 'Kurukshetra'),
(176, 13, 'Mahendragarh'),
(177, 13, 'Mewat'),
(178, 13, 'Palwal'),
(179, 13, 'Panchkula'),
(180, 13, 'Panipat'),
(181, 13, 'Rewari'),
(182, 13, 'Rohtak'),
(183, 13, 'Sirsa'),
(184, 13, 'Sonipat'),
(185, 13, 'Yamuna Nagar'),
(186, 14, 'Bilaspur'),
(187, 14, 'Chamba'),
(188, 14, 'Hamirpur'),
(189, 14, 'Kangra'),
(190, 14, 'Kinnaur'),
(191, 14, 'Kullu'),
(192, 14, 'Lahaul and Spiti'),
(193, 14, 'Mandi'),
(194, 14, 'Shimla'),
(195, 14, 'Sirmaur'),
(196, 14, 'Solan'),
(197, 14, 'Una'),
(198, 15, 'Anantnag'),
(199, 15, 'Badgam'),
(200, 15, 'Bandipora'),
(201, 15, 'Baramulla'),
(202, 15, 'Doda'),
(203, 15, 'Ganderbal'),
(204, 15, 'Jammu'),
(205, 15, 'Kargil'),
(206, 15, 'Kathua'),
(207, 15, 'Kishtwar'),
(208, 15, 'Kupwara'),
(209, 15, 'Kulgam'),
(210, 15, 'Leh'),
(211, 15, 'Poonch'),
(212, 15, 'Pulwama'),
(213, 15, 'Rajouri'),
(214, 15, 'Ramban'),
(215, 15, 'Reasi'),
(216, 15, 'Samba'),
(217, 15, 'Shopian'),
(218, 15, 'Srinagar'),
(219, 15, 'Udhampur'),
(220, 16, 'Bokaro'),
(221, 16, 'Chatra'),
(222, 16, 'Deoghar'),
(223, 16, 'Dhanbad'),
(224, 16, 'Dumka'),
(225, 16, 'East Singhbhum'),
(226, 16, 'Garhwa'),
(227, 16, 'Giridih'),
(228, 16, 'Godda'),
(229, 16, 'Gumla'),
(230, 16, 'Hazaribag'),
(231, 16, 'Jamtara'),
(232, 16, 'Khunti'),
(233, 16, 'Koderma'),
(234, 16, 'Latehar'),
(235, 16, 'Lohardaga'),
(236, 16, 'Pakur'),
(237, 16, 'Palamu'),
(238, 16, 'Ramgarh'),
(239, 16, 'Ranchi'),
(240, 16, 'Sahibganj'),
(241, 16, 'Seraikela Kharsawan'),
(242, 16, 'Simdega'),
(243, 16, 'West Singhbhum'),
(244, 17, 'Bagalkot'),
(245, 17, 'Bangalore Rural'),
(246, 17, 'Bangalore Urban'),
(247, 17, 'Belgaum'),
(248, 17, 'Bellary'),
(249, 17, 'Bidar'),
(250, 17, 'Bijapur'),
(251, 17, 'Chamarajnagar'),
(252, 17, 'Chikkamagaluru'),
(253, 17, 'Chikkaballapur'),
(254, 17, 'Chitradurga'),
(255, 17, 'Davanagere'),
(256, 17, 'Dharwad'),
(257, 17, 'Dakshina Kannada'),
(258, 17, 'Gadag'),
(259, 17, 'Gulbarga'),
(260, 17, 'Hassan'),
(261, 17, 'Haveri district'),
(262, 17, 'Kodagu'),
(263, 17, 'Kolar'),
(264, 17, 'Koppal'),
(265, 17, 'Mandya'),
(266, 17, 'Mysore'),
(267, 17, 'Raichur'),
(268, 17, 'Shimoga'),
(269, 17, 'Tumkur'),
(270, 17, 'Udupi'),
(271, 17, 'Uttara Kannada'),
(272, 17, 'Ramanagara'),
(273, 17, 'Yadgir'),
(274, 18, 'Alappuzha'),
(275, 18, 'Ernakulam'),
(276, 18, 'Idukki'),
(277, 18, 'Kannur'),
(278, 18, 'Kasaragod'),
(279, 18, 'Kollam'),
(280, 18, 'Kottayam'),
(281, 18, 'Kozhikode'),
(282, 18, 'Malappuram'),
(283, 18, 'Palakkad'),
(284, 18, 'Pathanamthitta'),
(285, 18, 'Thrissur'),
(286, 18, 'Thiruvananthapuram'),
(287, 18, 'Wayanad'),
(288, 19, 'Lakshadweep'),
(289, 20, 'Agar'),
(290, 20, 'Alirajpur'),
(291, 20, 'Anuppur'),
(292, 20, 'Ashok Nagar'),
(293, 20, 'Balaghat'),
(294, 20, 'Barwani'),
(295, 20, 'Betul'),
(296, 20, 'Bhind'),
(297, 20, 'Bhopal'),
(298, 20, 'Burhanpur'),
(299, 20, 'Chhatarpur'),
(300, 20, 'Chhindwara'),
(301, 20, 'Damoh'),
(302, 20, 'Datia'),
(303, 20, 'Dewas'),
(304, 20, 'Dhar'),
(305, 20, 'Dindori'),
(306, 20, 'Guna'),
(307, 20, 'Gwalior'),
(308, 20, 'Harda'),
(309, 20, 'Hoshangabad'),
(310, 20, 'Indore'),
(311, 20, 'Jabalpur'),
(312, 20, 'Jhabua'),
(313, 20, 'Katni'),
(314, 20, 'Khandwa (East Nimar)'),
(315, 20, 'Khargone (West Nimar)'),
(316, 20, 'Mandla'),
(317, 20, 'Mandsaur'),
(318, 20, 'Morena'),
(319, 20, 'Narsinghpur'),
(320, 20, 'Neemuch'),
(321, 20, 'Panna'),
(322, 20, 'Raisen'),
(323, 20, 'Rajgarh'),
(324, 20, 'Ratlam'),
(325, 20, 'Rewa'),
(326, 20, 'Sagar'),
(327, 20, 'Satna'),
(328, 20, 'Sehore'),
(329, 20, 'Seoni'),
(330, 20, 'Shahdol'),
(331, 20, 'Shajapur'),
(332, 20, 'Sheopur'),
(333, 20, 'Shivpuri'),
(334, 20, 'Sidhi'),
(335, 20, 'Singrauli'),
(336, 20, 'Tikamgarh'),
(337, 20, 'Ujjain'),
(338, 20, 'Umaria'),
(339, 20, 'Vidisha'),
(340, 21, 'Ahmednagar'),
(341, 21, 'Akola'),
(342, 21, 'Amravati'),
(343, 21, 'Aurangabad'),
(344, 21, 'Beed'),
(345, 21, 'Bhandara'),
(346, 21, 'Buldhana'),
(347, 21, 'Chandrapur'),
(348, 21, 'Dhule'),
(349, 21, 'Gadchiroli'),
(350, 21, 'Gondia'),
(351, 21, 'Hingoli'),
(352, 21, 'Jalgaon'),
(353, 21, 'Jalna'),
(354, 21, 'Kolhapur'),
(355, 21, 'Latur'),
(356, 21, 'Mumbai City'),
(357, 21, 'Mumbai suburban'),
(358, 21, 'Nanded'),
(359, 21, 'Nandurbar'),
(360, 21, 'Nagpur'),
(361, 21, 'Nashik'),
(362, 21, 'Osmanabad'),
(363, 21, 'Parbhani'),
(364, 21, 'Pune'),
(365, 21, 'Raigad'),
(366, 21, 'Ratnagiri'),
(367, 21, 'Sangli'),
(368, 21, 'Satara'),
(369, 21, 'Sindhudurg'),
(370, 21, 'Solapur'),
(371, 21, 'Thane'),
(372, 21, 'Wardha'),
(373, 21, 'Washim'),
(374, 21, 'Yavatmal'),
(375, 22, 'Bishnupur'),
(376, 22, 'Churachandpur'),
(377, 22, 'Chandel'),
(378, 22, 'Imphal East'),
(379, 22, 'Senapati'),
(380, 22, 'Tamenglong'),
(381, 22, 'Thoubal'),
(382, 22, 'Ukhrul'),
(383, 22, 'Imphal West'),
(384, 23, 'East Garo Hills'),
(385, 23, 'East Khasi Hills'),
(386, 23, 'Jaintia Hills'),
(387, 23, 'Ri Bhoi'),
(388, 23, 'South Garo Hills'),
(389, 23, 'West Garo Hills'),
(390, 23, 'West Khasi Hills'),
(391, 24, 'Aizawl'),
(392, 24, 'Champhai'),
(393, 24, 'Kolasib'),
(394, 24, 'Lawngtlai'),
(395, 24, 'Lunglei'),
(396, 24, 'Mamit'),
(397, 24, 'Saiha'),
(398, 24, 'Serchhip'),
(399, 25, 'Dimapur'),
(400, 25, 'Kiphire'),
(401, 25, 'Kohima'),
(402, 25, 'Longleng'),
(403, 25, 'Mokokchung'),
(404, 25, 'Mon'),
(405, 25, 'Peren'),
(406, 25, 'Phek'),
(407, 25, 'Tuensang'),
(408, 25, 'Wokha'),
(409, 25, 'Zunheboto'),
(410, 26, 'Angul'),
(411, 26, 'Boudh (Bauda)'),
(412, 26, 'Bhadrak'),
(413, 26, 'Balangir'),
(414, 26, 'Bargarh (Baragarh)'),
(415, 26, 'Balasore'),
(416, 26, 'Cuttack'),
(417, 26, 'Debagarh (Deogarh)'),
(418, 26, 'Dhenkanal'),
(419, 26, 'Ganjam'),
(420, 26, 'Gajapati'),
(421, 26, 'Jharsuguda'),
(422, 26, 'Jajpur'),
(423, 26, 'Jagatsinghpur'),
(424, 26, 'Khordha'),
(425, 26, 'Kendujhar (Keonjhar)'),
(426, 26, 'Kalahandi'),
(427, 26, 'Kandhamal'),
(428, 26, 'Koraput'),
(429, 26, 'Kendrapara'),
(430, 26, 'Malkangiri'),
(431, 26, 'Mayurbhanj'),
(432, 26, 'Nabarangpur'),
(433, 26, 'Nuapada'),
(434, 26, 'Nayagarh'),
(435, 26, 'Puri'),
(436, 26, 'Rayagada'),
(437, 26, 'Sambalpur'),
(438, 26, 'Subarnapur (Sonepur)'),
(439, 26, 'Sundergarh'),
(440, 27, 'Karaikal'),
(441, 27, 'Mahe'),
(442, 27, 'Pondicherry'),
(443, 27, 'Yanam'),
(444, 28, 'Amritsar'),
(445, 28, 'Barnala'),
(446, 28, 'Bathinda'),
(447, 28, 'Firozpur'),
(448, 28, 'Faridkot'),
(449, 28, 'Fatehgarh Sahib'),
(450, 28, 'Fazilka[6]'),
(451, 28, 'Gurdaspur'),
(452, 28, 'Hoshiarpur'),
(453, 28, 'Jalandhar'),
(454, 28, 'Kapurthala'),
(455, 28, 'Ludhiana'),
(456, 28, 'Mansa'),
(457, 28, 'Moga'),
(458, 28, 'Sri Muktsar Sahib'),
(459, 28, 'Pathankot'),
(460, 28, 'Patiala'),
(461, 28, 'Rupnagar'),
(462, 28, 'Ajitgarh (Mohali)'),
(463, 28, 'Sangrur'),
(464, 28, 'Shahid Bhagat Singh Nagar'),
(465, 28, 'Tarn Taran'),
(466, 29, 'Ajmer'),
(467, 29, 'Alwar'),
(468, 29, 'Bikaner'),
(469, 29, 'Barmer'),
(470, 29, 'Banswara'),
(471, 29, 'Bharatpur'),
(472, 29, 'Baran'),
(473, 29, 'Bundi'),
(474, 29, 'Bhilwara'),
(475, 29, 'Churu'),
(476, 29, 'Chittorgarh'),
(477, 29, 'Dausa'),
(478, 29, 'Dholpur'),
(479, 29, 'Dungapur'),
(480, 29, 'Ganganagar'),
(481, 29, 'Hanumangarh'),
(482, 29, 'Jhunjhunu'),
(483, 29, 'Jalore'),
(484, 29, 'Jodhpur'),
(485, 29, 'Jaipur'),
(486, 29, 'Jaisalmer'),
(487, 29, 'Jhalawar'),
(488, 29, 'Karauli'),
(489, 29, 'Kota'),
(490, 29, 'Nagaur'),
(491, 29, 'Pali'),
(492, 29, 'Pratapgarh'),
(493, 29, 'Rajsamand'),
(494, 29, 'Sikar'),
(495, 29, 'Sawai Madhopur'),
(496, 29, 'Sirohi'),
(497, 29, 'Tonk'),
(498, 29, 'Udaipur'),
(499, 30, 'East Sikkim'),
(500, 30, 'North Sikkim'),
(501, 30, 'South Sikkim'),
(502, 30, 'West Sikkim'),
(503, 31, 'Ariyalur'),
(504, 31, 'Chennai'),
(505, 31, 'Coimbatore'),
(506, 31, 'Cuddalore'),
(507, 31, 'Dharmapuri'),
(508, 31, 'Dindigul'),
(509, 31, 'Erode'),
(510, 31, 'Kanchipuram'),
(511, 31, 'Kanyakumari'),
(512, 31, 'Karur'),
(513, 31, 'Krishnagiri'),
(514, 31, 'Madurai'),
(515, 31, 'Nagapattinam'),
(516, 31, 'Nilgiris'),
(517, 31, 'Namakkal'),
(518, 31, 'Perambalur'),
(519, 31, 'Pudukkottai'),
(520, 31, 'Ramanathapuram'),
(521, 31, 'Salem'),
(522, 31, 'Sivaganga'),
(523, 31, 'Tirupur'),
(524, 31, 'Tiruchirappalli'),
(525, 31, 'Theni'),
(526, 31, 'Tirunelveli'),
(527, 31, 'Thanjavur'),
(528, 31, 'Thoothukudi'),
(529, 31, 'Tiruvallur'),
(530, 31, 'Tiruvarur'),
(531, 31, 'Tiruvannamalai'),
(532, 31, 'Vellore'),
(533, 31, 'Viluppuram'),
(534, 31, 'Virudhunagar'),
(535, 32, 'Dhalai'),
(536, 32, 'North Tripura'),
(537, 32, 'South Tripura'),
(538, 32, 'Khowai[7]'),
(539, 32, 'West Tripura'),
(540, 33, 'Agra'),
(541, 33, 'Aligarh'),
(542, 33, 'Allahabad'),
(543, 33, 'Ambedkar Nagar'),
(544, 33, 'Auraiya'),
(545, 33, 'Azamgarh'),
(546, 33, 'Bagpat'),
(547, 33, 'Bahraich'),
(548, 33, 'Ballia'),
(549, 33, 'Balrampur'),
(550, 33, 'Banda'),
(551, 33, 'Barabanki'),
(552, 33, 'Bareilly'),
(553, 33, 'Basti'),
(554, 33, 'Bijnor'),
(555, 33, 'Budaun'),
(556, 33, 'Bulandshahr'),
(557, 33, 'Chandauli'),
(558, 33, 'Chhatrapati Shahuji Maharaj Nagar[8]'),
(559, 33, 'Chitrakoot'),
(560, 33, 'Deoria'),
(561, 33, 'Etah'),
(562, 33, 'Etawah'),
(563, 33, 'Faizabad'),
(564, 33, 'Farrukhabad'),
(565, 33, 'Fatehpur'),
(566, 33, 'Firozabad'),
(567, 33, 'Gautam Buddh Nagar'),
(568, 33, 'Ghaziabad'),
(569, 33, 'Ghazipur'),
(570, 33, 'Gonda'),
(571, 33, 'Gorakhpur'),
(572, 33, 'Hamirpur'),
(573, 33, 'Hardoi'),
(574, 33, 'Hathras'),
(575, 33, 'Jalaun'),
(576, 33, 'Jaunpur district'),
(577, 33, 'Jhansi'),
(578, 33, 'Jyotiba Phule Nagar'),
(579, 33, 'Kannauj'),
(580, 33, 'Kanpur'),
(581, 33, 'Kanshi Ram Nagar'),
(582, 33, 'Kaushambi'),
(583, 33, 'Kushinagar'),
(584, 33, 'Lakhimpur Kheri'),
(585, 33, 'Lalitpur'),
(586, 33, 'Lucknow'),
(587, 33, 'Maharajganj'),
(588, 33, 'Mahoba'),
(589, 33, 'Mainpuri'),
(590, 33, 'Mathura'),
(591, 33, 'Mau'),
(592, 33, 'Meerut'),
(593, 33, 'Mirzapur'),
(594, 33, 'Moradabad'),
(595, 33, 'Muzaffarnagar'),
(596, 33, 'Panchsheel Nagar district (Hapur)'),
(597, 33, 'Pilibhit'),
(598, 33, 'Pratapgarh'),
(599, 33, 'Raebareli'),
(600, 33, 'Ramabai Nagar (Kanpur Dehat)'),
(601, 33, 'Rampur'),
(602, 33, 'Saharanpur'),
(603, 33, 'Sant Kabir Nagar'),
(604, 33, 'Sant Ravidas Nagar'),
(605, 33, 'Shahjahanpur'),
(606, 33, 'Shamli[9]'),
(607, 33, 'Shravasti'),
(608, 33, 'Siddharthnagar'),
(609, 33, 'Sitapur'),
(610, 33, 'Sonbhadra'),
(611, 33, 'Sultanpur'),
(612, 33, 'Unnao'),
(613, 33, 'Varanasi'),
(614, 34, 'Almora'),
(615, 34, 'Bageshwar'),
(616, 34, 'Chamoli'),
(617, 34, 'Champawat'),
(618, 34, 'Dehradun'),
(619, 34, 'Haridwar'),
(620, 34, 'Nainital'),
(621, 34, 'Pauri Garhwal'),
(622, 34, 'Pithoragarh'),
(623, 34, 'Rudraprayag'),
(624, 34, 'Tehri Garhwal'),
(625, 34, 'Udham Singh Nagar'),
(626, 34, 'Uttarkashi'),
(627, 35, 'Bankura'),
(628, 35, 'Bardhaman'),
(629, 35, 'Birbhum'),
(630, 35, 'Cooch Behar'),
(631, 35, 'Dakshin Dinajpur'),
(632, 35, 'Darjeeling'),
(633, 35, 'Hooghly'),
(634, 35, 'Howrah'),
(635, 35, 'Jalpaiguri'),
(636, 35, 'Kolkata'),
(637, 35, 'Maldah'),
(638, 35, 'Murshidabad'),
(639, 35, 'Nadia'),
(640, 35, 'North 24 Parganas'),
(641, 35, 'Paschim Medinipur'),
(642, 35, 'Purba Medinipur'),
(643, 35, 'Purulia'),
(644, 35, 'South 24 Parganas'),
(645, 35, 'Uttar Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `emp_info_rail`
--

CREATE TABLE `emp_info_rail` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `empdesg` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `date_of_app` varchar(20) NOT NULL,
  `date_of_ret` varchar(20) NOT NULL,
  `pme_date` varchar(15) NOT NULL,
  `rme_date` varchar(15) NOT NULL,
  `created_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_info_rail`
--

INSERT INTO `emp_info_rail` (`id`, `section_id`, `station_id`, `section_name`, `station_name`, `empid`, `empname`, `empdesg`, `phone`, `date_of_app`, `date_of_ret`, `pme_date`, `rme_date`, `created_date`) VALUES
(1, 1, 1, 'PRRB-BSBS', 'PRRB', '50408023992', 'ADARSH MISHRA', 'MCM', '7518650216', '16/10/2008', '30/11/2036', '', '05/02/2021', ''),
(2, 1, 2, 'PRRB-BSBS', 'DRGJ', '332NP212227', 'VIJAY KUMAR YADAV', 'MCM', '8173087071', '27/11/2013', '31/07/2045', '', '28/07/2023', ''),
(3, 1, 2, 'PRRB-BSBS', 'DRGJ', '50468140165', 'LAKSHAMAN Pd.MINA', 'ESM-I', '8303170313', '06/02/2014', '31/07/2049', '', '10/06/2023', ''),
(4, 1, 3, 'PRRB-BSBS', 'JI', '50408023980', 'SANJIT KUMAR MISHRA', 'MCM', '7518650217', '15/10/2008', '30/11/2038', '', '28/07/2023', ''),
(5, 1, 4, 'PRRB-BSBS', 'RTR', '9229800389', 'FATEH SINGH MEENA', 'ESM-II', '7355136443', '09/10/2017', '31/07/2046', '', '28/07/2023', ''),
(6, 1, 5, 'PRRB-BSBS', 'HDK', '50488821316', 'RAHUL VERMA', 'ESM-III', '8090422480', '22/08/2013', '31/05/2051', '', '23/10/2021', ''),
(7, 1, 6, 'PRRB-BSBS', 'BYH', '3229804038', 'ABHISHEK VISHWAKARMA', 'ESM-III', '8299031548', '05/02/2020', '31/12/2054', '', '12/07/2022', ''),
(8, 1, 7, 'PRRB-BSBS', 'GYN', '9229800101', 'RAVINDRA SINGH', 'ESM-III', '8303170316', '15/07/2016', '28/02/2055', '', '23/03/2022', ''),
(9, 1, 7, 'PRRB-BSBS', 'GYN', '9229802862', 'RAKESH KUMAR MEENA', 'ESM-III', '9414249864', '10/07/2020', '31/10/2056', '', '30/04/2022', ''),
(10, 1, 8, 'PRRB-BSBS', 'MBS', '50405945227', 'SUNIL JEVIOR KHAKA', 'MCM', '7518650145', '04/09/1989', '30/06/2027', '', '15/01/2022', ''),
(11, 1, 8, 'PRRB-BSBS', 'MBS', '50468130292', 'RAM NAYAN', 'ESM-III', '7905917496', '06/09/2013', '30/04/2036', '', '12/07/2022', ''),
(12, 1, 8, 'PRRB-BSBS', 'MBS', '9229802867', 'DIPAK KUMAR', 'ESM-III', '7543956003', '09/07/2020', '31/05/2053', '', '30/04/2022', ''),
(13, 1, 9, 'PRRB-BSBS', 'KFK', '50420838554', 'DHARMENDRA KUMAR', 'ESM-III', '8630036351', '25/07/2013', '31/08/2050', '', '19/10/2022', ''),
(14, 1, 9, 'PRRB-BSBS', 'KFK', '33429800748', 'RAKESH KUMAR', 'ESM-III', '9870890787', '25/01/2016', '31/08/2050', '', '01/01/1970', ''),
(15, 1, 12, 'PRRB-BSBS', 'RTB', '50405945999', 'JAY PRAKASH', 'MCM', '9795581491', '16/10/1997', '30/06/2033', '', '28/07/2023', ''),
(16, 1, 13, 'PRRB-BSBS', 'HDT', '50400010339', 'ANIL KUMAR', 'SM-I', '8303170369', '18/01/2013', '31/07/2047', '', '10/07/2021', ''),
(17, 1, 13, 'PRRB-BSBS', 'HDT', '21429804567', 'RAVINDRA KUMAR PAL', 'ESM-III', '9549600162', '20/07/2016', '30/09/2047', '', '01/01/1970', ''),
(18, 1, 14, 'PRRB-BSBS', 'BSBS', '50405947819', 'KALLAN RAM', 'MCM', '8303170320', '03/03/2003', '31/07/2036', '', '28/12/2022', ''),
(19, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130657', 'RAJENDRA PRASAD GUPTA', 'MCM', '8303170321', '13/11/2013', '31/07/2052', '', '12/07/2022', ''),
(20, 1, 14, 'PRRB-BSBS', 'BSBS', '50405948010', ' ANUPAM MISHRA', 'MCM', '8303170322', '27/06/2003', '31/10/2044', '', '29/11/2022', ''),
(21, 1, 14, 'PRRB-BSBS', 'BSBS', '50405946268', ' RAKESH CHAND MISHRA', 'SM-I', '8303170323', '12/02/1998', '29/02/2032', '', '28/07/2023', ''),
(22, 1, 14, 'PRRB-BSBS', 'BSBS', '504NPS03669', 'AMIT PANDEY', 'ESM-I', '7518650218', '15/02/2007', '31/07/2048', '', '27/07/2019', ''),
(23, 1, 14, 'PRRB-BSBS', 'BSBS', '50405687240', 'MOHAN LAL', 'ESM-I', '8303170338', '13/08/1998', '31/10/2028', '', '12/01/2022', ''),
(24, 1, 14, 'PRRB-BSBS', 'BSBS', '50405947108', 'NIRAJ KR. SINGH', 'ESM-I', '8303170327', '26/06/2000', '31/01/2042', '', '28/11/2022', ''),
(25, 1, 14, 'PRRB-BSBS', 'BSBS', '50405947200', 'VIKASH', 'ESM-I', '8303170315', '25/04/2000', '31/07/2041', '', '28/07/2023', ''),
(26, 1, 14, 'PRRB-BSBS', 'BSBS', '50406010210', 'RAGHWENDRA KUMAR', 'MCM', '7518650222', '11/11/2004', '31/10/2041', '', '12/12/2021', ''),
(27, 1, 14, 'PRRB-BSBS', 'BSBS', '50714501923', 'AJAY KUMAR SINGH', 'ESM-I', '8303170325', '25/03/2006', '30/06/2038', '', '28/02/2023', ''),
(28, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130750', 'ROHIT ', 'ESM-II', '8303170224', '06/09/2013', '30/06/2052', '', '25/01/2021', ''),
(29, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130291', 'SAILESH KUMAR', 'ESM-III', '9918621594', '16/09/2013', '31/07/2048', '', '12/07/2022', ''),
(30, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130939', 'VIKASH GUPTA', 'ESM-III', '9335664496', '26/12/2013', '31/05/2043', '', '31/08/2022', ''),
(31, 1, 14, 'PRRB-BSBS', 'BSBS', '50405946578', 'VIJAY PRASAD', 'ESM-III', '9005881074', '26/09/1998', '28/02/2035', '', '01/01/1970', ''),
(32, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405946062', 'RANJEET KUMAR VERMA', 'MCM', '7518650189', '26/02/1998', '30/06/2028', '', '10/07/2021', ''),
(33, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405945896', 'LALAN RAM', 'SM-I', '8004176050', '31/08/1996', '31/10/2025', '', '01/01/1970', ''),
(34, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405946670', 'INAYTULLAH ANSARI', 'SM-I', '8303170339', '16/11/1999', '30/09/2036', '', '01/05/2018', ''),
(35, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405946700', 'OM PRAKASH', 'SM-I', '9956463020', '25/01/2000', '31/08/2032', '', '01/01/1970', ''),
(36, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '504NPS01812', 'AKHILESH YADAV', 'ESM-III', '8858771240', '27/11/2009', '30/06/2050', '', '01/01/1970', ''),
(37, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50468130449', 'SHIVCHARN PASWAN', 'ESM-II', '8303170353', '08/10/2013', '31/01/2048', '', '01/03/2020', ''),
(38, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '504NPS06724', 'JITENDRA KUMAR', 'SM-I', '8303170350', '06/04/2015', '31/07/2043', '', '26/10/2018', ''),
(39, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '504NPS04432', 'AKASH KR. RAWAT', 'ESM-III', '7905027466', '11/08/2015', '31/08/2053', '', '16/01/2022', ''),
(40, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50470130789', 'TANVIR ALAM', 'ESM-III', '9608521321', '25/07/2013', '28/02/2050', '', '17/02/2022', ''),
(41, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '9229800461', 'PRATIK SHARMA', 'SM-I', '7518650148', '22/01/2014', '30/09/2051', '', '01/01/1970', ''),
(42, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50468140162', 'CHANDAN', 'SM-I', '7518650149', '18/02/2014', '31/10/2051', '', '01/01/1970', ''),
(43, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '9229803340', 'SANDEEP KUMAR', 'ESM-III', '9981220407', '15/12/2020', '28/02/2050', '', '01/01/1970', ''),
(44, 2, 15, 'BCY-ARJ', 'BCY', '50405546540', 'RAJESH KR. TIWARI', 'MCM', '7518650151', '25/04/1997', '31/12/2033', '', '01/11/2018', ''),
(45, 2, 15, 'BCY-ARJ', 'BCY', '50382606006', 'PRINCE KUMAR GUPTA', 'MCM', '7705011304', '06/07/2013', '28/02/2045', '', '10/06/2023', ''),
(46, 2, 15, 'BCY-ARJ', 'BCY', '50411212690', ' PRAVIR KR. RAI', 'MCM', '7619004307', '21/02/2000', '28/02/2025', '', '01/12/2020', ''),
(47, 2, 15, 'BCY-ARJ', 'BCY', '50408034783', 'TAMRADHWAJ SINGH', 'ESM-I', '7518650219', '14/02/2008', '31/01/2047', '', '28/07/2023', ''),
(48, 2, 15, 'BCY-ARJ', 'BCY', '504NPS05742', ' MANKAR YADAY', 'ESM-I', '8303170345', '27/02/2015', '30/06/2052', '', '26/10/2018', ''),
(49, 2, 15, 'BCY-ARJ', 'BCY', '504IE071033', 'SREE NARAYAN CHTURVEDI', 'ESM-I', '8303170354', '11/12/2007', '30/09/2037', '', '28/07/2023', ''),
(50, 2, 15, 'BCY-ARJ', 'BCY', '50405946130', ' ISTEKHARULLAH', 'ESM-I', '8303170342', '18/02/1998', '31/01/2039', '', '29/11/2018', ''),
(51, 2, 15, 'BCY-ARJ', 'BCY', '50405946748', ' RAMESHWAR PRASAD', 'ESM-I', '8303170343', '18/11/1999', '31/07/2036', '', '28/07/2023', ''),
(52, 2, 15, 'BCY-ARJ', 'BCY', '504NPS06939', 'MONIKA SINGH', 'ESM-III', '8303170344', '07/01/2016', '31/08/2045', '', '27/07/2019', ''),
(53, 2, 15, 'BCY-ARJ', 'BCY', '504NPS04548', 'INDRA K. MAURYA', 'ESM-III', '7398026351', '18/08/2015', '31/12/2050', '', '28/02/2023', ''),
(54, 2, 16, 'BCY-ARJ', 'SRNT', '50405946165', 'AJAY K. SRIVASTAVA', 'ESM-I', '8303170347', '09/05/1998', '31/05/2034', '', '28/12/2022', ''),
(55, 2, 16, 'BCY-ARJ', 'SRNT', '50407023972', 'RAMASRAY PRASAD', 'ESM-I', '8303170348', '25/08/2007', '30/06/2035', '', '28/07/2023', ''),
(56, 2, 16, 'BCY-ARJ', 'SRNT', '50406200175', 'SUBHNARAYAN CHAUBEY', 'MCM', '8303170359', '18/01/2006', '31/07/2042', '', '29/11/2022', ''),
(57, 2, 17, 'BCY-ARJ', 'KDQ', '50405946657', ' RAM MILAN', 'ESM-I', '8303170349', '18/11/1999', '30/06/2037', '', '26/10/2018', ''),
(58, 2, 18, 'BCY-ARJ', 'RJI', '9229802863', 'GYANI GOSWAMI', 'ESM-III', '8303170346', '09/07/2020', '30/06/2052', '', '31/08/2022', ''),
(59, 2, 19, 'BCY-ARJ', 'ARJ', '50405945884', ' VIJAY KUMAR', 'MCM', '7393029210', '31/08/1996', '30/06/2027', '', '28/07/2023', ''),
(60, 2, 19, 'BCY-ARJ', 'ARJ', '50406201520', 'RAJ KUMAR I', 'MCM', '7518650221', '11/07/2006', '30/04/2035', '', '15/01/2022', ''),
(61, 2, 19, 'BCY-ARJ', 'ARJ', '50405946694', 'RAJ KUMAR II', 'ESM-I', '8303170352', '19/11/1999', '31/07/2041', '', '01/05/2019', ''),
(62, 2, 19, 'BCY-ARJ', 'ARJ', '504NPS03599', 'VIVEK KUMAR SINGH', 'ESM-I', '9453323943', '18/05/2015', '31/07/2056', '', '01/01/1970', ''),
(63, 2, 19, 'BCY-ARJ', 'ARJ', '27314402701', 'RAJESH KUMAR', 'ESM-III', '8252232921', '26/07/2014', '31/07/2052', '', '28/02/2023', ''),
(64, 2, 19, 'BCY-ARJ', 'ARJ', '334NP002742', 'SURENDRA KR. YADAV', 'ESM-III', '8070442297', '05/04/2012', '31/07/2040', '', '19/10/2022', ''),
(65, 2, 19, 'BCY-ARJ', 'ARJ', '334NP002887', ' SHASHI KANT YADAV', 'ESM-III', '8303170351', '25/04/2012', '31/08/2049', '', '01/07/2022', ''),
(66, 2, 19, 'BCY-ARJ', 'ARJ', '50468130651', 'AMIT RAM', 'ESM-III', '9608107780', '22/10/2013', '31/01/2051', '', '19/10/2022', ''),
(67, 2, 19, 'BCY-ARJ', 'ARJ', '504NPS04177', ' SATISH K. SINGH', 'ESM-III', '9118952025', '19/06/2015', '31/08/2045', '', '28/07/2023', ''),
(68, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405202437', 'VYAS YADAV ', 'MCM', '7518650203', '27/12/2005', '31/12/2025', '18/07/2023', '27/01/2020', ''),
(69, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405945963', 'SARITA RAI', 'ESM-I', '8303170218', '21/12/1996', '31/07/2029', '04/07/2023', '28/02/2023', ''),
(70, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50488812868', 'CHANDRASEKHAR', 'ESM-I', '9670576001', '05/07/2013', '30/06/2043', '', '27/02/2021', ''),
(71, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405947558', 'MAHENDRA KUMAR', 'ESM-II', '8303170216', '22/08/1998', '31/03/2033', '04/07/2023', '25/01/2021', ''),
(72, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50468140190', 'SANJAY YADAV', 'ESM-II', '8303170220', '04/03/2014', '31/08/2046', '', '01/01/1970', ''),
(73, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405944648', 'DHRUV', 'MCM', '7518650190', '14/08/1984', '30/06/2024', '17/07/2023', '19/10/2022', ''),
(74, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405947030', 'CHHOTELAL', 'ESM-I', '8303170215', '31/01/2000', '31/01/2029', '18/07/2023', '29/11/2022', ''),
(75, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405947492', 'RAMA YADAV', 'ESM-I', '8303170213', '03/07/2001', '31/07/2040', '', '31/08/2022', ''),
(76, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50468110084', 'KANCHAN RAJBHAR', 'ESM-I', '8303170214', '28/11/2011', '30/06/2050', '', '23/03/2020', ''),
(77, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '9229802859', 'MANOJ KUMAR KUSHWAHA', 'ESM-III', '9336060545', '09/07/2020', '30/06/2053', '', '30/04/2022', ''),
(78, 3, 22, 'ARJ(EX.)-BTT(EX.)', 'DLR', '50405945628', 'KAMLESH KUMAR', 'MCM', '7518650191', '19/09/1994', '31/10/2027', '20/07/2023', '28/10/2010', ''),
(79, 3, 22, 'ARJ(EX.)-BTT(EX.)', 'DLR', '9229802864', 'SALMAN KHAN', 'ESM-III', '9335330719', '09/07/2020', '31/03/2055', '', '22/02/2022', ''),
(80, 3, 23, 'ARJ(EX.)-BTT(EX.)', 'PPH', '50406202330', 'SANTOSH KUMAR RAWAT', 'ESM-II', '8303170225', '24/10/2006', '31/07/2047', '', '15/01/2022', ''),
(81, 3, 21, 'ARJ(EX.)-BTT(EX.)', 'JKN', '50400009003', 'RAJESH YADAV', 'ESM-I', '8303170212', '25/02/2012', '31/05/2045', '', '13/12/2021', ''),
(82, 3, 20, 'ARJ(EX.)-BTT(EX.)', 'SDT', '50410020111', 'SANJAY KUMAR', 'ESM-I', '7518650205', '13/04/2009', '31/01/2045', '', '05/02/2021', ''),
(83, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '50405202425', 'LALLAN CHAUHAN', 'MCM', '7518650202', '09/12/2005', '31/01/2032', '04/07/2023', '23/03/2020', ''),
(84, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '50405947560', 'RAVI PRAKASH', 'ESM-III', '9140605188', '02/08/1997', '30/06/2032', '01/01/1970', '30/04/2022', ''),
(85, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '50468130720', 'VINOD KUMAR', 'ESM-III', '9555147582', '12/11/2013', '30/06/2044', '', '12/07/2022', ''),
(86, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '9229803168', 'ANKIT SINGH', 'ESM-III', '8303170226', '21/10/2020', '31/08/2059', '', '22/02/2022', ''),
(87, 3, 29, 'ARJ(EX.)-BTT(EX.)', 'SRU', '50405947789', 'RAJKUMAR YADAV', 'MCM', '8303170288', '26/02/2003', '31/07/2041', '', '19/10/2022', ''),
(88, 3, 28, 'ARJ(EX.)-BTT(EX.)', 'LRD', '50405947868', 'SUNIL KUMAR', 'ESM-I', '8303170283', '22/07/2003', '31/08/2044', '', '21/03/2020', ''),
(89, 3, 26, 'ARJ(EX.)-BTT(EX.)', 'KER', '50468130259', 'DHIRENDRA SAROJ', 'ESM-III', '9616483804', '20/09/2013', '30/04/2051', '', '30/04/2022', ''),
(90, 3, 29, 'ARJ(EX.)-BTT(EX.)', 'SRU', '50410020573', 'DHARMRAJ MAURYA', 'MCM', '7518650206', '07/05/2008', '28/02/2043', '', '23/03/2020', ''),
(91, 4, 30, 'ARJ(EX.)-JNU(EX.)', 'DHE', '50468130284', 'SANJEEV KR. GAUTAM', 'ESM-II', '8931005016', '04/09/2013', '31/12/2049', '', '13/07/1905', ''),
(92, 4, 30, 'ARJ(EX.)-JNU(EX.)', 'DHE', '50468130286', 'DHARMENDRA KUMAR', 'ESM-III', '7317877764', '04/09/2013', '31/07/2048', '', '01/01/1970', ''),
(93, 4, 31, 'ARJ(EX.)-JNU(EX.)', 'KCT', '9229801489', 'RAHUL KUMAR PRASAD', 'ESM-III', '7563946356', '01/08/2019', '30/09/2056', '', '01/01/1970', ''),
(94, 4, 32, 'ARJ(EX.)-JNU(EX.)', 'MFJ', '50405948022', ' RATANDEEP GUPTA', 'ESM-I', '8303170355', '27/06/2003', '30/09/2041', '', '01/01/2021', ''),
(95, 4, 32, 'ARJ(EX.)-JNU(EX.)', 'MFJ', '334NP002860', 'SANJAY KR. YADAV', 'ESM-III', '7607908712', '18/04/2012', '29/02/2040', '', '01/07/2020', ''),
(96, 5, 33, 'ARJ(EX.)-CPR(EX.)', 'SYH', '9229802857', 'ANIL YADAV', 'ESM-III', '9892910199', '07/07/2020', '31/01/2054', '', '12/07/2022', ''),
(97, 5, 34, 'ARJ(EX.)-CPR(EX.)', 'TRN', '50405945471', ' INDRADEV YADAV', 'MCM', '8303170358', '01/10/1993', '31/01/2027', '', '12/01/2022', ''),
(98, 5, 34, 'ARJ(EX.)-CPR(EX.)', 'TRN', '50468130937', 'YOGESH KUMAR', 'ESM-III', '8429440920', '05/12/2013', '31/08/2046', '', '19/10/2022', ''),
(99, 5, 35, 'ARJ(EX.)-CPR(EX.)', 'NDJ', '27223007409', 'MADINDRA NATH', 'ESM-I', '7518650154', '19/06/2015', '29/02/2056', '', '12/07/2022', ''),
(100, 5, 36, 'ARJ(EX.)-CPR(EX.)', 'AKS', '50305030272', 'RAVISH CHANDRA', 'ESM-II', '8303170362', '09/04/2005', '31/05/2040', '', '29/11/2018', ''),
(101, 5, 36, 'ARJ(EX.)-CPR(EX.)', 'AKS', '50468130660', 'PRAMOD KUMAR BHARTI', 'ESM-III', '7800348713', '08/11/2013', '30/06/2050', '', '28/02/2023', ''),
(102, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '50410032010', 'BHUPENDRA NATH YADAV', 'ESM-I', '8303170363', '29/12/2008', '30/06/2039', '', '13/01/2021', ''),
(103, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '504NPS06496', 'SHIVAM KHARE', 'ESM-I', '8303170364', '12/03/2015', '28/02/2054', '', '10/07/2021', ''),
(104, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '50405946529', 'SYAM BADAN UADAV', 'ESM-I', '8303170373', '08/02/1999', '30/06/2040', '', '19/10/2022', ''),
(105, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '50468130474', 'SANTOSH URAO', 'ESM-I', '8303170365', '18/11/2013', '28/02/2043', '', '01/01/1970', ''),
(106, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '275N0002807', 'AJEET SINGH KUSHWAHA', 'ESM-III', '6200013305', '24/05/2012', '31/10/2046', '', '28/02/2023', ''),
(107, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '9229802854', 'ASHISH KUMAR SINGH', 'ESM-III', '7903231175', '07/07/2020', '31/03/2057', '', '30/04/2022', ''),
(108, 5, 0, 'ARJ(EX.)-CPR(EX.)', 'SBK', '9229802856', 'SAKET KUMAR', 'ESM-III', '8539990709', '10/07/2020', '31/07/2058', '', '28/07/2023', ''),
(109, 5, 38, 'ARJ(EX.)-CPR(EX.)', 'YFP', '33329801611', 'ANURAG KUMAR', 'ESM-I', '8303170370', '22/09/2014', '31/07/2052', '', '13/01/2021', ''),
(110, 5, 0, 'ARJ(EX.)-CPR(EX.)', 'DDD', '9229802881', 'AJEET KUMAR SINGH', 'ESM-III', '7050524444', '13/07/2020', '28/02/2057', '', '30/04/2022', ''),
(111, 5, 39, 'ARJ(EX.)-CPR(EX.)', 'KMDR', '507TR150100', 'ANAND KUMAR', 'ESM-I', '8303170371', '27/10/2015', '31/05/2053', '', '13/01/2021', ''),
(112, 5, 39, 'ARJ(EX.)-CPR(EX.)', 'KMDR', '504NPS06737', 'ANURAG KR. GUPTA', 'ESM-II', '8303170372', '30/08/2013', '31/07/2051', '', '12/01/2022', ''),
(113, 5, 48, 'ARJ(EX.)-CPR(EX.)', 'GTST', '50468130659', 'AMRESH SINGH YADAV', 'ESM-III', '7652078122', '11/11/2013', '30/06/2042', '', '29/12/2022', ''),
(114, 5, 47, 'ARJ(EX.)-CPR(EX.)', 'BKLA', '50405945768', 'HARINATH PD KUSHWAHA', 'MCM ', '9065528569', '31/07/1996', '31/03/2035', '31/07/2023', '01/12/2021', ''),
(115, 5, 45, 'ARJ(EX.)-CPR(EX.)', 'SIP', '9229802874', 'AJEET KUMAR SINGH', 'ESM-III', '8957726536', '07/07/2020', '31/10/2053', '', '01/07/2022', ''),
(116, 5, 45, 'ARJ(EX.)-CPR(EX.)', 'SIP', '504NPS06736', 'SATYENDRA KUMAR SINGH', 'ESM-I', '8303170270', '16/05/2015', '30/06/2048', '', '01/01/2022', ''),
(117, 5, 0, 'ARJ(EX.)-CPR(EX.)', 'ROI', '50406201325', 'ABHISHEK KUMAR', 'ESM-I', '7518650198', '11/07/2006', '31/05/2043', '', '01/07/2022', ''),
(118, 5, 44, 'ARJ(EX.)-CPR(EX.)', 'STW', '9229802871', 'GAURAV KUMAR', 'ESM-III', '8407094954', '09/07/2020', '28/02/2058', '', '01/02/2022', ''),
(119, 5, 43, 'ARJ(EX.)-CPR(EX.)', 'BCD', '50405201986', 'KAMALESH KR YADAV', 'ESM-I', '8303170271', '13/09/2005', '31/12/2032', '31/07/2023', '01/07/2021', ''),
(120, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '9229802858', 'ASHUTOSH KUMAR PAL', 'ESM-III', '8687761739', '07/07/2020', '30/06/2056', '', '01/02/2022', ''),
(121, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50403762245', 'SUBHASH SINGH', 'MCM ', '7518650156', '10/07/1995', '28/02/2029', '31/07/2023', '01/02/2021', ''),
(122, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50406201337', 'DINESH KUMAR', 'ESM-I', '8303170265', '13/07/2006', '31/12/2036', '', '01/02/2021', ''),
(123, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50473100040', 'ATUL KUMAR SRIVASTAV', 'ESM-I', '8303170267', '05/05/2010', '31/01/2042', '', '01/10/2022', ''),
(124, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50405946475', 'RAM PRAVESH YADAV', 'ESM-I', '8303170273', '11/02/1999', '31/07/2036', '31/07/2023', '01/12/2021', ''),
(125, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50400010340', 'UMESH KUMAR RAM', 'ESM-II', '8303170269', '14/02/2012', '30/04/2046', '', '01/02/2021', ''),
(126, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '9229803130', 'RANJEET KUMAR', 'ESM-III', '7301135147', '21/10/2020', '31/10/2055', '', '01/08/2022', ''),
(127, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '50413021187', 'DINESH KUMAR RAM', 'ESM-I', '8303170271', '01/05/2013', '30/09/2042', '01/08/2023', '01/07/2022', ''),
(128, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '50405947376', 'SHEKHAR KUMAR', 'ESM-II', '7800642200', '12/01/2001', '31/12/2036', '', '01/09/2019', ''),
(129, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '50405947870', 'V.S.PRAJAPATI', 'ESM-I', '8887973263', '30/08/2003', '30/06/2042', '', '01/10/2022', ''),
(130, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '275N0009157', 'JANARDAN YADAV', 'ESM-III', '9696625940', '12/06/2012', '31/08/2046', '', '01/02/2023', ''),
(131, 5, 40, 'ARJ(EX.)-CPR(EX.)', 'CBN', '50408024248', 'SUNIL KR SRIVASTAVA', 'ESM-I', '7518650199', '04/12/2008', '31/10/2036', '20/07/2023', '01/02/2021', ''),
(132, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '533P9899316', 'SUNIL KUMAR DUBEY ', 'ESM-I', '8303170332', '26/02/2009', '31/01/2039', '', '01/01/2019', ''),
(133, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '504NPS06722', 'ANITA YADAV ', 'ESM-I', '8303170336', '29/10/2015', '30/06/2052', '', '27/02/2021', ''),
(134, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50468130174', 'M. SANTOSH KUMAR ', 'ESM-I', '8303170335', '13/07/2013', '31/05/2050', '', '01/11/2014', ''),
(135, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405947443', 'JAY PRAKASH GAUTAM ', 'MCM', '9532985658', '16/07/1999', '31/08/2033', '', '01/12/2022', ''),
(136, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405945770', 'P.C. SHRIVASTAV', 'ESM-I', '8303170331', '03/08/1996', '30/06/2030', '', '27/02/2021', ''),
(137, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405202395', 'RAVINDER MISHRA', 'MCM', '8303170328', '16/09/2005', '31/08/2034', '', '01/08/2021', ''),
(138, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405945434', 'M. PARWEJ RABBANI', 'MCM', '9935955537', '27/01/1995', '30/06/2032', '', '01/12/2022', ''),
(139, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '9229803506', ' SWATI KUMARI', 'ESM-III', '6299451460', '15/11/2021', '30/04/2057', '', '29/05/2022', ''),
(140, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '9229803507', 'MATA PRASAD', 'ESM-III', '6283128430', '28/10/2021', '31/08/2056', '', '29/05/2022', ''),
(141, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '9329802722', 'RAHUL KUMAR SINGH', 'ESM-III', '7979851327', '21/08/2020', '31/12/2055', '', '12/07/2022', ''),
(142, 6, 50, 'MAU(EX.)-SHG(EX.)', 'KRND', '9229803110', 'PUSHPENDRA KUMAR SINGH', 'ESM-III', '9621600989', '28/09/2020', '31/01/2055', '', '12/11/2022', ''),
(143, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '9229803012', 'ALOK SAROJ', 'ESM-III', '9005747897', '28/09/2020', '31/03/2053', '', '12/11/2022', ''),
(144, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '9229803231', 'ADITYA KUMAR', 'ESM-III', '9140962634', '15/12/2020', '31/07/2050', '', '12/11/2022', ''),
(145, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50405947832', 'RAMBACHAN', 'MCM', '7518650224', '04/03/2003', '31/08/2041', '', '15/01/2022', ''),
(146, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50405947005', 'DEENDAYAL', 'ESM-I', '8303170221', '28/01/2000', '31/12/2040', '', '13/12/2021', ''),
(147, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50468130717', 'RINKU KUMAR', 'ESM-III', '9918342357', '23/10/2013', '31/05/2048', '', '12/07/2022', ''),
(148, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50468130662', 'DINESH CHANDRA BHARTI', 'ESM-III', '8303170253', '21/09/2013', '30/06/2047', '', '06/10/2023', ''),
(149, 6, 56, 'MAU(EX.)-SHG(EX.)', 'KRT', '9229800083', 'MANOJ YADAV', 'ESM-III', '8303170253', '07/07/2016', '31/05/2054', '', '13/12/2021', ''),
(150, 6, 55, 'MAU(EX.)-SHG(EX.)', 'MMA', '50406203346', 'JANERDAN YADAV', 'ESM-II', '8303170219', '22/12/2006', '31/08/2048', '', '25/01/2021', ''),
(151, 6, 54, 'MAU(EX.)-SHG(EX.)', 'SAA', '50468130210', 'RADHESHYAM', 'ESM-III', '8303170223', '06/08/2013', '31/07/2039', '', '15/01/2022', ''),
(152, 6, 52, 'MAU(EX.)-SHG(EX.)', 'PHY', '332NP209909', 'DEEPAK KUMAR YADAV', 'ESM-III', '8423445600', '19/06/2013', '31/05/2051', '', '30/04/2022', ''),
(153, 6, 51, 'MAU(EX.)-SHG(EX.)', 'SMZ', '50468140453', 'CHHOTELAL BHARDHWAJ', 'ESM-III', '9170613636', '23/04/2014', '31/08/2054', '', '30/04/2022', ''),
(154, 6, 50, 'MAU(EX.)-SHG(EX.)', 'KRND', '9229803496', 'ARVIND KUMAR', 'ESM-III', '8115518418', '28/10/2021', '31/08/2053', '', '28/02/2023', ''),
(155, 6, 50, 'MAU(EX.)-SHG(EX.)', 'KRND', '504NPS05236', 'SANDIP KUSHWAHA', 'ESM-III', '8318212139', '18/08/2015', '30/09/2054', '', '12/07/2022', ''),
(156, 6, 49, 'MAU(EX.)-SHG(EX.)', 'DJD', '9229802891', 'AVANISH PANKAJ', 'ESM-III', '8423308686', '22/07/2020', '31/12/2052', '', '22/02/2022', ''),
(157, 7, 57, 'IAA(EX.)-PEP(EX.)', 'RTP', '50400008679', 'UPENDRA KUMAR', 'ESM  I', '8303170227', '07/02/2012', '30/06/2041', '', '05/02/2021', ''),
(158, 7, 59, 'IAA(EX.)-PEP(EX.)', 'CHR', '504NPS03689', 'PRAVEEN KUMAR SOREN', 'ESM-I', '8303170228', '22/05/2015', '30/06/2049', '', '15/01/2022', ''),
(159, 13, 117, 'GKP', 'GKP', '50411213735', 'AJIT KUMAR MALL', 'MCM/ESM', '7518650165', '20/09/1989', '31/07/2029', '20/06/2022', '28/07/2023', ''),
(160, 13, 117, 'GKP', 'GKP', '50405945215', 'NAVEEN RANA', 'MCM/MSM', '7518650164', '07/09/1989', '31/05/2027', '30/06/2022', '01/01/1970', ''),
(161, 13, 117, 'GKP', 'GKP', '50405946621', 'ARUN', 'SM-II', '8303170312', '19/11/1999', '31/12/2039', '', '30/11/2022', ''),
(162, 13, 117, 'GKP', 'GKP', '50400010364', 'RAJNISH KUMAR SINGH', 'ESM-I', '7518650209', '28/01/2013', '31/08/2047', '', '25/01/2021', ''),
(163, 13, 117, 'GKP', 'GKP', '50405947480', 'BHUWANESHWAR Pt. SI', 'SM-II', '8303170297', '13/11/2000', '30/04/2030', '27/11/2018', '29/03/2023', ''),
(164, 13, 117, 'GKP', 'GKP', '50429800467', 'UMESH KUMAR SINGH', 'SM-II', '7518650170', '21/01/2016', '31/05/2055', '', '30/11/2022', ''),
(165, 13, 117, 'GKP', 'GKP', '504NPS05622', 'BHUPENDRA KUMAR CHAURASHIYA', 'SM-III', '7518650163', '12/08/2015', '31/07/2048', '07/05/2015', '30/11/2022', ''),
(166, 13, 117, 'GKP', 'GKP', '504NPS05623', 'RAM KARAN NISHAD', 'SM-III', '8303170299', '18/08/2015', '31/08/2056', '07/05/2015', '28/12/2022', ''),
(167, 8, 60, 'KHM-CHPG', 'KHM', '50400010273', 'INDRASEN YADAV', 'ESM-I', '7518650208', '25/01/2013', '31/07/2049', '', '23/09/2019', ''),
(168, 8, 60, 'KHM-CHPG', 'KHM', '9229802890', 'PANKAJ KUMAR  BHARTI', 'ESM-III', '9452442388', '13/07/2020', '31/08/2053', '', '19/10/2022', ''),
(169, 8, 61, 'KHM-CHPG', 'SANR', '50411211120', 'K.K.VISHWAKARMA', 'MCM/ESM', '7518650177', '03/05/1989', '31/07/2028', '21/06/2022', '12/12/2021', ''),
(170, 8, 61, 'KHM-CHPG', 'SANR', '50405946293', 'P K BHARATI', 'ESM-I', '9621623205', '13/07/1998', '28/02/2038', '', '23/03/2020', ''),
(171, 8, 62, 'KHM-CHPG', 'CC', '50406202287', 'ASHUTOSH KUMAR', 'SM-I', '8303170293', '24/10/2006', '31/07/2048', '', '12/01/2022', ''),
(172, 8, 62, 'KHM-CHPG', 'CC', '50400010352', 'INDRESH KUMAR', 'ESM-I', '8303170234', '23/05/2013', '31/07/2042', '', '12/12/2021', ''),
(173, 8, 63, 'KHM-CHPG', 'GB', '50411213050', 'BABURAM', 'MCM/ESM', '7518650180', '16/09/1990', '31/01/2027', '20/06/2022', '12/12/2021', ''),
(174, 8, 63, 'KHM-CHPG', 'GB', '9229802954', 'DINA NATH', 'ESM-III', '8303170291', '12/08/2020', '31/05/2055', '', '22/02/2022', ''),
(175, 8, 64, 'KHM-CHPG', 'BALR', '50405946943', 'CHANDRA SHEKHAR', 'MCM/ESM', '7518650185', '01/04/2000', '31/12/2033', '27/01/2020', '29/03/2023', ''),
(176, 8, 65, 'KHM-CHPG', 'DEOS', '50401121194', 'ARVIND KUMAR TIWARI', 'MCM/ESM', '7518650182', '02/05/1989', '31/01/2027', '12/07/2022', '28/07/2023', ''),
(177, 8, 65, 'KHM-CHPG', 'DEOS', '50405945690', 'GOPAL PRASAD', 'MCM/ESM', '7518650196', '23/06/1994', '31/12/2028', '10/04/2019', '28/07/2023', ''),
(178, 8, 65, 'KHM-CHPG', 'DEOS', '50411212020', 'ARVIND KUMAR SHARMA', 'MCM/ESM', '7518650184', '26/09/1989', '31/05/2025', '22/06/2022', '23/03/2020', ''),
(179, 8, 65, 'KHM-CHPG', 'DEOS', '50407200110', 'RAKESH KUMAR SINGH', 'MCM/ESM', '7518650213', '19/01/2007', '31/08/2042', '', '10/06/2023', ''),
(180, 8, 65, 'KHM-CHPG', 'DEOS', '50405945793', 'SURESH KUMAR YADAV', 'SM-I', '8303170300', '06/08/1996', '30/06/2033', '08/07/2022', '12/12/2021', ''),
(181, 8, 66, 'KHM-CHPG', 'NRA', '42610D00253', 'RANA PRATAP SINGH', 'ESM-I', '7518650169', '13/02/2009', '30/09/2045', '', '25/11/2019', ''),
(182, 8, 67, 'KHM-CHPG', 'BTT', '50405945800', 'MANOJ KUMAR DIXIT', 'MCM/ESM', '7518650214', '01/08/1996', '30/06/2030', '12/07/2022', '28/07/2023', ''),
(183, 8, 67, 'KHM-CHPG', 'BTT', '50411211143', 'SUBHASH CH. SINGH', 'MCM/ESM', '7518650186', '02/05/1989', '30/04/2027', '28/06/2022', '10/06/2023', ''),
(184, 8, 67, 'KHM-CHPG', 'BTT', '50405945586', 'S.N.MISHRA', 'MCM/ESM', '7518650187', '24/02/1995', '31/07/2024', '20/06/2022', '27/01/2020', ''),
(185, 8, 67, 'KHM-CHPG', 'BTT', '50405946920', 'NAYEEM ANSARI', 'ESM-I', '8303170286', '28/01/2000', '30/09/2041', '', '29/03/2023', ''),
(186, 8, 67, 'KHM-CHPG', 'BTT', '50405947546', 'DASHRATH', 'ESM-I', '8303170287', '16/07/1998', '31/08/2033', '07/02/2017', '13/12/2021', ''),
(187, 8, 67, 'KHM-CHPG', 'BTT', '50407200109', 'JANARDAN YADAV', 'MCM/ESM', '8303170289', '19/01/2007', '30/11/2039', '', '31/08/2022', ''),
(188, 8, 67, 'KHM-CHPG', 'BTT', '504NPS01708', 'SUNIL KUMAR', 'ESM-I', '7518650215', '05/06/2009', '31/12/2046', '', '30/04/2022', ''),
(189, 8, 67, 'KHM-CHPG', 'BTT', '50409020100', 'MANOJ KUMAR SINGH', 'ESM-III', '7518850162', '01/11/2007', '31/12/2041', '19/10/2007', '30/11/2022', ''),
(190, 8, 68, 'KHM-CHPG', 'BHTR', '50411210904', 'ASHOK KUMAR', 'MCM', '7518650160', '21/09/1989', '29/02/2024', '06/10/2020', '28/07/2023', ''),
(191, 8, 68, 'KHM-CHPG', 'BHTR', '50413021333', 'JAY GANESH PRASAD', 'SM-I', '8303170284', '01/05/2013', '31/10/2042', '', '31/08/2022', ''),
(192, 8, 68, 'KHM-CHPG', 'BHTR', '504NPS04437', 'SANTOSH KR. PRASAD', 'SM-II', '8303170368', '24/07/2015', '30/04/2053', '', '27/01/2020', ''),
(193, 8, 68, 'KHM-CHPG', 'BHTR', '9229803480', 'SANDEEP KUMAR', 'ESM-III', '9065528584', '01/09/2021', '30/06/2060', '', '28/07/2023', ''),
(194, 8, 69, 'KHM-CHPG', 'BTK', '50405946955', 'SHANTOSH SINGH', 'SM-I', '7518650158', '26/05/2000', '31/12/2041', '', '28/03/2023', ''),
(195, 8, 70, 'KHM-CHPG', 'MW', '50408022859', 'MANOJ KUMAR', 'MCM', '9065528586', '19/02/2007', '31/01/2040', '', '12/07/2022', ''),
(196, 8, 71, 'KHM-CHPG', 'ZRDE', '50408020840', 'UPENDRA KR. YADAV', 'MCM', '9065528588', '07/05/2008', '28/02/2041', '', '13/12/2021', ''),
(197, 8, 71, 'KHM-CHPG', 'ZRDE', '50470131092', 'RAJU GAUND', 'ESM-III', '9771206801', '26/02/2013', '31/07/2051', '', '01/01/1970', ''),
(198, 8, 72, 'KHM-CHPG', 'SV', '50406100156', 'PRAMOD MANDAL', 'MCM', '9065528575', '11/11/2004', '31/03/2033', '27/10/2021', '13/01/2021', ''),
(199, 8, 72, 'KHM-CHPG', 'SV', '50405947522', 'SANDEEP KUMAR', 'MCM', '9065528574', '06/05/2000', '31/01/2037', '', '28/12/2022', ''),
(200, 8, 72, 'KHM-CHPG', 'SV', '50401121674', 'VIRENDRA KUMAR SHUKLA', 'MCM', '6388938203', '21/05/1987', '30/06/2024', '', '01/01/1970', ''),
(201, 8, 72, 'KHM-CHPG', 'SV', '50405946761', 'HARIDWAR YADAV', 'SM-I', '8303170281', '19/11/1997', '31/03/2031', '27/10/2021', '22/01/2022', ''),
(202, 8, 72, 'KHM-CHPG', 'SV', '50405947054', 'RAJ KISHOR YADAV', 'SM-I', '8303170277', '09/06/2000', '31/01/2035', '06/10/2021', '30/04/2022', ''),
(203, 8, 72, 'KHM-CHPG', 'SV', '50307030531', 'CHHOTE LAL', 'ESM-II', '8303170326', '13/12/2007', '31/01/2044', '', '13/01/2021', ''),
(204, 8, 72, 'KHM-CHPG', 'SV', '504NPS01334', 'MANJEET KUMAR SINGH', 'ESM-II', '9065528573', '06/09/2014', '31/12/2053', '', '01/01/1970', ''),
(205, 8, 73, 'KHM-CHPG', 'PCK', '50447204515', 'SANTOSH KUMAR SHARMA', 'SM-I', '9065528572', '25/06/1996', '30/04/2037', '', '31/08/2022', ''),
(206, 8, 74, 'KHM-CHPG', 'DDA', '50405945835', 'UMA PATI PRASAD', 'MCM', '9065528577', '02/09/1996', '30/06/2025', '17/10/2016', '30/04/2022', ''),
(207, 8, 74, 'KHM-CHPG', 'DDA', '504NPS04429', 'AMIT KUMAR', 'SM-III', '8303170275', '09/07/2015', '31/01/2054', '', '21/02/2022', ''),
(208, 8, 75, 'KHM-CHPG', 'CW', '50406100260', 'SUJEET KUMAR', 'MCM', '9065528583', '11/11/2004', '31/01/2044', '', '10/07/2021', ''),
(209, 8, 80, 'KHM-CHPG', 'CPR', '50403182630', 'RAJESH KUMAR UPADHYAY', 'ESM-III', '9931982635', '12/07/2001', '31/12/2034', '', '01/01/1970', ''),
(210, 8, 80, 'KHM-CHPG', 'CPR', '27621001684', 'MUNNA KUMAR YADAV', 'ESM-I', '8303170236', '04/11/2010', '31/01/2040', '', '01/07/2020', ''),
(211, 8, 80, 'KHM-CHPG', 'CPR', '50412021647', 'MANOJ KUMAR ', 'ESM-I', '8303170242', '04/10/2012', '31/01/2039', '', '01/12/2022', ''),
(212, 8, 80, 'KHM-CHPG', 'CPR', '504NPS06551', 'PRADEEP KUMAR', 'ESM-II', '8303170245', '16/09/2015', '31/01/2053', '', '01/12/2022', ''),
(213, 8, 80, 'KHM-CHPG', 'CPR', '50409020275', 'S K CHAKRADHARI', 'ESM-III', '8303170237', '30/01/2009', '28/02/2046', '', '01/11/2022', ''),
(214, 8, 80, 'KHM-CHPG', 'CPR', '50400594804', 'UMASHANKAR RAY', 'ESM-I', '8303170239', '17/06/2003', '31/07/2034', '', '01/02/2023', ''),
(215, 8, 80, 'KHM-CHPG', 'CPR', '275N0001777', 'SUSHIL KUMAR', 'ESM-I', '7518650201', '17/11/2008', '31/10/2040', '', '01/07/2021', ''),
(216, 8, 80, 'KHM-CHPG', 'CPR', '50405946426', 'SARVANAND RAM', 'ESM-I', '8303170243', '06/02/1999', '30/04/2037', '', '28/07/2023', ''),
(217, 8, 80, 'KHM-CHPG', 'CPR', '50468140266', 'DWARIKA SAH', 'ESM-I', '8303170238', '27/01/2014', '31/01/2037', '', '01/01/2022', ''),
(218, 8, 80, 'KHM-CHPG', 'CPR', '50405202152', 'MANAN KUMAR BHUSHAN', 'MCM', '9065528590', '08/12/2005', '29/02/2040', '', '01/02/2021', ''),
(219, 8, 80, 'KHM-CHPG', 'CPR', '50407200122', 'JITENDRA KUMAR SINGH', 'ESM-I', '9065528591', '19/01/2007', '28/02/2045', '', '01/12/2021', ''),
(220, 8, 80, 'KHM-CHPG', 'CPR', '50407182016', 'PRASHANT KUMAR DEV', 'ESM-I', '8303170230', '31/10/2006', '31/08/2044', '', '01/02/2022', ''),
(221, 8, 80, 'KHM-CHPG', 'CPR', '50200650020', 'PRAVEEN KUMAR', 'ESM-I', '8303170231', '18/01/2008', '31/01/2042', '', '01/09/2019', ''),
(222, 8, 79, 'KHM-CHPG', 'TKV', '50468140268', 'MANAN PANDEY', 'ESM-III', '7903335788', '06/02/2014', '31/03/2047', '', '01/12/2022', ''),
(223, 8, 79, 'KHM-CHPG', 'TKV', '504NPS02061', 'AMIT KUMAR', 'ESM-III', '7549821985', '30/09/2014', '30/06/2045', '', '01/12/2022', ''),
(224, 8, 78, 'KHM-CHPG', 'KPS', '9229803372', 'KULDEEP THAKUR', 'ESM-III', '8303170264', '25/02/2021', '31/10/2054', '', '01/08/2022', ''),
(225, 8, 77, 'KHM-CHPG', 'DDP', '50408020930', 'SANJAY KUMAR SHARMA', 'ESM-I', '8303170261', '09/04/2008', '30/06/2039', '', '28/07/2023', ''),
(226, 8, 77, 'KHM-CHPG', 'DDP', '50405946256', 'TARKESHWAR SHAH', 'ESM-II', '8303170263', '16/10/1998', '31/12/2031', '', '01/12/2022', ''),
(227, 8, 77, 'KHM-CHPG', 'DDP', '9229803374', 'PRAKASH KUMAR SINGH', 'ESM-III', '9555501603', '26/02/2021', '31/01/2054', '', '01/12/2022', ''),
(228, 8, 76, 'KHM-CHPG', 'EM', '504NPS03773', 'CHANDAN KUMAR', 'ESM-I', '8303170259', '27/05/2015', '31/01/2050', '', '01/01/2022', ''),
(229, 8, 76, 'KHM-CHPG', 'EM', '50405947170', 'BASANT KR. SINGH', 'ESM-III', '9142201285', '29/05/2000', '31/03/2030', '', '01/10/2022', ''),
(230, 8, 81, 'KHM-CHPG', 'CI', '27621003329', 'RAJESH RANJAN', 'ESM-I', '8303170244', '24/12/2012', '31/01/2048', '', '01/02/2023', ''),
(231, 8, 81, 'KHM-CHPG', 'CI', '50405946992', 'RAJESH KUMAR', 'ESM-I', '9065528581', '22/11/1999', '31/01/2038', '21/07/2023', '01/12/2021', ''),
(232, 8, 81, 'KHM-CHPG', 'CI', '50468130964', 'VIJAY KUMAR RAM', 'ESM-III', '9065528568', '26/12/2013', '31/01/2051', '', '01/02/2021', ''),
(233, 8, 81, 'KHM-CHPG', 'CI', '9229802860', 'SUJEET KUMAR', 'ESM-III', '8789050293', '09/07/2020', '31/07/2058', '', '01/08/2022', ''),
(234, 8, 82, 'KHM-CHPG', 'CHPG', '50406010246', 'BRIJMOHAN KUMAR', 'ESM-I', '9065528580', '11/11/2004', '31/05/2040', '', '01/04/2022', ''),
(235, 8, 82, 'KHM-CHPG', 'CHPG', '27223004494', 'SABIR HUSAIN', 'ESM-I', '8303170247', '01/11/2012', '30/09/2049', '', '01/02/2021', ''),
(236, 8, 82, 'KHM-CHPG', 'CHPG', '50481303142', 'JITENDRA KUMAR', 'ESM-I', '8303170248', '08/05/2013', '28/02/2047', '', '01/12/2022', ''),
(237, 8, 82, 'KHM-CHPG', 'CHPG', '50405946724', 'YOGENDRA RAI', 'ESM-I', '8303170249', '12/11/1999', '31/10/2035', '', '01/07/2022', ''),
(238, 8, 82, 'KHM-CHPG', 'CHPG', '9229802878', 'RAVI KUMAR', 'ESM-III', '6202180669', '09/07/2020', '31/12/2057', '', '01/10/2022', ''),
(239, 9, 85, 'UNLA-PNYA', 'UNLA', '27223008808', 'MOHAN LAL', 'ESM-III', '7518650166', '21/12/2015', '30/04/2046', '', '28/12/2022', ''),
(240, 9, 86, 'UNLA-PNYA', 'PPC', '50405948034', 'PRAMOD KUMAR MISHRA', 'MCM/ESM', '7518650204', '03/07/2003', '31/01/2041', '', '21/03/2020', ''),
(241, 9, 87, 'UNLA-PNYA', 'BBW', '50468130709', 'RAMESH PASWAN', 'SM-II', '8303170294', '05/09/2013', '30/04/2046', '', '30/11/2022', ''),
(242, 9, 88, 'UNLA-PNYA', 'CPJ', '50411210916', 'SURYANATH', 'MCM/ESM', '7518650167', '16/09/1990', '30/09/2024', '29/06/2022', '25/11/2019', ''),
(243, 9, 88, 'UNLA-PNYA', 'CPJ', '50405946736', 'GOVARDHAN', 'SM-I', '8303170295', '16/11/1999', '31/05/2038', '', '23/09/2019', ''),
(244, 9, 88, 'UNLA-PNYA', 'CPJ', '50405946888', 'PRAHALAD SINGH', 'SM-I', '8303170307', '12/05/2000', '30/09/2039', '', '30/11/2022', ''),
(245, 9, 88, 'UNLA-PNYA', 'CPJ', '9229802888', 'RAJANI KUMARI', 'ESM-III', '7388257090', '10/07/2020', '31/05/2058', '', '19/10/2022', ''),
(246, 9, 89, 'UNLA-PNYA', 'GH', '504NPS05259', 'S K SINGH', 'ESM-III', '7518650175', '11/08/2015', '31/10/2050', '', '29/03/2023', ''),
(247, 9, 90, 'UNLA-PNYA', 'SBZ', '50411212962', 'NANHELAL', 'MCM/ESM', '7518650168', '20/09/1989', '30/06/2028', '20/06/2022', '28/02/2023', ''),
(248, 9, 91, 'UNLA-PNYA', 'KZA', '9229803132', 'KISHAN KUSHWAHA', 'ESM-III', '8303170309', '21/10/2020', '31/05/2057', '', '30/11/2022', ''),
(249, 9, 92, 'UNLA-PNYA', 'PNYA', '9229802886', 'DESHBANDHU SINGH', 'ESM-III', '7518650181', '07/07/2020', '31/10/2054', '', '19/10/2022', ''),
(250, 10, 93, 'CPJ(EX.)-THE-CI(EX.)', 'LIJ', '9229803129', 'AJAY KUMAR TANTI', 'ESM-III', '7518650179', '22/10/2020', '31/10/2050', '', '22/02/2022', ''),
(251, 10, 94, 'CPJ(EX.)-THE-CI(EX.)', 'RKL', '50481303129', 'KANHAIYALAL', 'ESM-I', '7518650172', '10/05/2013', '31/01/2040', '17/04/2013', '25/01/2021', ''),
(252, 10, 94, 'CPJ(EX.)-THE-CI(EX.)', 'RKL', '50400010248', 'UMASHANKAR', 'ESM-I', '8303170298', '13/02/2012', '31/07/2051', '', '23/03/2020', ''),
(253, 10, 95, 'CPJ(EX.)-THE-CI(EX.)', 'BAGJ', '50468140112', 'SHREE NIWAS SINGH', 'ESM-III', '7518650171', '06/02/2014', '31/08/2050', '', '30/11/2022', ''),
(254, 10, 96, 'CPJ(EX.)-THE-CI(EX.)', 'POU', '50413021424', 'RAHUL KUMAR DUBEY', 'ESM-III', '7518650161', '09/05/2013', '31/07/2051', '', '30/11/2022', ''),
(255, 10, 96, 'CPJ(EX.)-THE-CI(EX.)', 'POU', '50405946797', 'RAM DARASH', 'SM-III', '8303170306', '18/11/1999', '31/07/2031', '28/07/2022', '12/01/2022', ''),
(256, 10, 98, 'CPJ(EX.)-THE-CI(EX.)', 'DUE', '50405947250', 'SAIFUL HAQUE', 'SM-II', '8303170308', '03/11/2000', '30/09/2035', '17/12/2020', '12/01/2022', ''),
(257, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '504NPS06212', 'SARVESH KUMAR YADAV', 'ESM-III', '7518650173', '18/08/2015', '30/06/2051', '', '19/10/2022', ''),
(258, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '50411211659', 'GIREESH PRASAD', 'MCM B/S', '7518650174', '12/02/1990', '31/01/2025', '13/07/2022', '01/01/1970', ''),
(259, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '50410301835', 'SHYAM SUNDAR YADAV', 'MCM', '8303170310', '15/10/1992', '28/02/2030', '20/06/2022', '28/02/2023', ''),
(260, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '50405300836', 'VIJAY PRASAD', 'ESM-III', '7518650188', '01/06/2005', '31/08/2046', '14/05/2005', '29/11/2022', ''),
(261, 10, 100, 'CPJ(EX.)-THE-CI(EX.)', 'TRJ', '50405945811', 'RAMPALAT PRASAD', 'MCM/ESM', '7518650211', '01/08/1996', '31/03/2030', '28/06/2022', '30/04/2022', ''),
(262, 10, 84, 'CPJ(EX.)-THE-CI(EX.)', 'HTW', '50468130282', 'MUKESH KUMAR', 'ESM-III', '9065528578', '19/09/2013', '29/02/2048', '', '12/01/2022', ''),
(263, 10, 83, 'CPJ(EX.)-THE-CI(EX.)', 'ALS', '9229802884', 'ADARSK KUMAR PANDEY', 'ESM-III', '8303170282', '08/07/2020', '31/01/2056', '', '19/10/2022', ''),
(264, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50468070002', 'RAJU PRASAD', 'ESM-I', '9065528582', '08/03/2007', '31/01/2045', '', '01/08/2022', ''),
(265, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50405947790', 'VINAY KUMAR MISHRA', 'ESM-I', '9065528567', '04/04/2003', '31/03/2030', '', '01/01/1970', ''),
(266, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50407200134', 'MANOJ KR SRIVASTAVA', 'ESM-I', '8303170233', '14/02/2007', '31/07/2024', '', '01/01/1970', ''),
(267, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50405947091', 'SUNIL KUMAR PASWAN', 'ESM-II', '8303170272', '04/04/2000', '30/06/2041', '', '01/10/2022', ''),
(268, 10, 114, 'CPJ(EX.)-THE-CI(EX.)', 'KYH', '50405946566', 'RAM PARAS RAI', 'ESM-I', '8303170250', '16/08/1999', '31/08/2036', '', '01/07/2022', ''),
(269, 10, 112, 'CPJ(EX.)-THE-CI(EX.)', 'MEW', '9229800396', 'SHIV PUJAN SINGH', 'ESM-II', '8303170251', '14/11/2016', '30/06/2048', '', '28/07/2023', ''),
(270, 10, 107, 'CPJ(EX.)-THE-CI(EX.)', 'SQW', '50412021660', 'MANOJ KUMAR', 'ESM-I', '8303170254', '04/10/2012', '29/02/2044', '', '01/09/2019', ''),
(271, 10, 107, 'CPJ(EX.)-THE-CI(EX.)', 'SQW', '50405947285', 'ROHIT KUMAR RAI', 'ESM-II', '8303170255', '12/02/2001', '31/05/2042', '', '01/02/2023', ''),
(272, 10, 104, 'CPJ(EX.)-THE-CI(EX.)', 'GOPG', '504NPS05183', 'JAYKISHORE KUMAR', 'ESM-III', '8825132198', '24/07/2015', '28/02/2050', '', '01/10/2022', ''),
(273, 10, 106, 'CPJ(EX.)-THE-CI(EX.)', 'RTU', '50468130712', 'MANTOSH KUMAR MAHTO', 'ESM-III', '9852674319', '20/08/2013', '31/05/2053', '', '01/12/2022', ''),
(274, 10, 108, 'CPJ(EX.)-THE-CI(EX.)', 'DWDI', '50473130015', 'RAJESH KUMAR', 'ESM-I', '7292957735', '01/02/2013', '31/08/2046', '', '01/04/2023', ''),
(275, 10, 108, 'CPJ(EX.)-THE-CI(EX.)', 'DWDI', '50468130258', 'SATYENDRA KUMAR SHARMA', 'ESM-III', '7739376112', '20/08/2013', '30/11/2051', '', '01/10/2022', ''),
(276, 10, 109, 'CPJ(EX.)-THE-CI(EX.)', 'RPV', '50405947066', 'RAMESH TIWARI', 'ESM-I', '8303170252', '04/02/2000', '31/03/2034', '', '01/12/2022', ''),
(277, 10, 111, 'CPJ(EX.)-THE-CI(EX.)', 'SMKR', '9229802875', 'SHUBHAM KUMAR', 'ESM-III', '7277320916', '10/07/2020', '31/07/2059', '', '01/12/2022', ''),
(278, 10, 113, 'CPJ(EX.)-THE-CI(EX.)', 'PEE', '50468130458', 'SHILA NATH RAI', 'ESM-III', '9682423185', '26/08/2013', '31/12/2042', '', '01/12/2022', ''),
(279, 10, 102, 'CPJ(EX.)-THE-CI(EX.)', 'SSU', '9229802872', 'GAUTAM SIDHANT', 'ESM-III', '8178483444', '08/07/2020', '31/08/2056', '', '01/12/2022', ''),
(280, 11, 118, 'SV (HRR)', 'SV (HRR)', '50490179020', 'YAMUNA PRASAD VERMA', 'MCM', '9065528587', '15/01/1993', '31/01/2026', '06/10/2021', '29/11/2017', ''),
(281, 11, 118, 'SV (HRR)', 'SV (HRR)', '50405948009', 'VINOD RANJAN', 'MCM', '9065528576', '17/06/2003', '31/01/2030', '03/01/2020', '13/01/2021', ''),
(282, 11, 118, 'SV (HRR)', 'SV (HRR)', '50405946116', 'KRISHNA YADAV', 'SM-I', '9065528589', '17/10/1998', '31/03/2037', '', '29/03/2023', ''),
(283, 11, 118, 'SV (HRR)', 'SV (HRR)', '50405946580', 'MD JAN KHAN', 'SM-I', '8303170276', '22/06/1999', '31/01/2037', '', '29/10/2022', ''),
(284, 11, 118, 'SV (HRR)', 'SV (HRR)', '50313004399', 'SHASHI KANT PRASAD', 'ESM-III', '7518650154', '06/06/2013', '31/10/2049', '', '12/01/2022', ''),
(285, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50401121236', 'VIJAY KUMAR SINHA', 'MCM ', '9065528566', '03/05/1989', '31/10/2023', '', '01/01/1970', ''),
(286, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405945926', 'OM PRAKASH RAM', 'MCM (DES.)', '8303170237', '31/08/1996', '30/09/2024', '', '01/01/1970', ''),
(287, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405947893', 'ASHUTOSH KUMAR', 'ESM-I', '9065528579', '17/02/2002', '31/12/2040', '', '01/12/2021', ''),
(288, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50406201301', 'SUBODH KUMAR', 'ESM-I', '8303170229', '13/07/2006', '31/03/2042', '', '01/04/2022', ''),
(289, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405947406', 'BABLOO KUMAR', 'ESM-I', '8303170268', '18/08/1999', '31/01/2031', '01/01/1970', '01/02/2023', ''),
(290, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405946876', 'SONA BABOO', 'ESM-II', '8303170232', '21/03/2000', '28/02/2042', '', '01/10/2022', ''),
(291, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50881301716', 'SUNIL KUMAR CHAUDHARY', 'ESM-I', '9827383696', '19/11/2013', '30/04/2046', '', '01/08/2022', ''),
(292, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50468140267', 'SURENDRA KUMAR SAH', 'ESM-III', '7033937150', '08/03/2014', '31/01/2048', '', '01/12/2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `ep1_form`
--

CREATE TABLE `ep1_form` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `section_id` varchar(10) NOT NULL,
  `section_name` varchar(33) NOT NULL,
  `station_id` varchar(10) NOT NULL,
  `station_name` varchar(33) NOT NULL,
  `component_name` varchar(20) NOT NULL,
  `sub_component` varchar(20) NOT NULL,
  `ep1_1` varchar(11) NOT NULL,
  `ep1_2` varchar(11) NOT NULL,
  `ep1_3` varchar(11) NOT NULL,
  `ep1_4` varchar(11) NOT NULL,
  `ep1_5` varchar(11) NOT NULL,
  `ep1_6` varchar(11) NOT NULL,
  `ep1_7` varchar(11) NOT NULL,
  `ep1_8` varchar(11) NOT NULL,
  `ep1_9` varchar(11) NOT NULL,
  `ep1_10` varchar(11) NOT NULL,
  `ep1_11` varchar(11) NOT NULL,
  `created_date` varchar(33) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep1_form`
--

INSERT INTO `ep1_form` (`id`, `emp_id`, `section_id`, `section_name`, `station_id`, `station_name`, `component_name`, `sub_component`, `ep1_1`, `ep1_2`, `ep1_3`, `ep1_4`, `ep1_5`, `ep1_6`, `ep1_7`, `ep1_8`, `ep1_9`, `ep1_10`, `ep1_11`, `created_date`, `updated_date`, `status`) VALUES
(1, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'Done', 'Done', 'Done', 'Not Done', 'Done', 'Done', 'Done', 'Done', 'Done', 'Done', 'Not Done', '2023-09-20 02:39:37', '2023-07-20 02:39:37', 'true'),
(2, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'Done', 'Done', 'Not Done', 'Not Done', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', '2023-08-18 02:58:06', '2023-09-03 02:58:06', 'true'),
(4, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'Not Done', 'Done', 'Done', 'Done', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', '2023-08-23 04:18:04', '2023-09-03 04:18:04', 'true'),
(5, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'Not Done', 'Done', 'Done', 'Done', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', 'OK', '2023-08-20 04:20:51', '2023-09-03 04:20:51', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ep1_info`
--

CREATE TABLE `ep1_info` (
  `id` int(11) NOT NULL,
  `ep_id` varchar(20) NOT NULL,
  `ep_details` varchar(500) NOT NULL,
  `ep_option` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep1_info`
--

INSERT INTO `ep1_info` (`id`, `ep_id`, `ep_details`, `ep_option`, `status`) VALUES
(1, 'EP1_1', 'The machine for tightness and free from rust & dirt. Cleaning, graphite/oiling of slide chairs. Lubrication of slide\nchairs and assembly up to 3 sleepers from the toe of switch by S&T staff.', 'Done,Not Done', 'true'),
(2, 'EP1_2', 'Checking of Point Gear Assembly, slides, rollers & pins. Ensure that roller is free from wear and tear and falls freely \r\non control and lift out disc.', 'Done,Not Done', 'true'),
(3, 'EP1_3', 'Tightening of all nuts, check nuts & bolts, lock nuts holding the detector slides & lock slides with lugs and condition of split pins to be checked.', 'Done,Not Done', 'true'),
(4, 'EP1_4', 'The Lubrication / Greasing of all gears and bearings, cleanliness & smoothness of commutator, checking contacts for freedom from pitting and proper adjustment.', 'Done,Not Done', 'true'),
(5, 'EP1_5', 'Visual checks of Points insulations and stretcher bars not rubbing with any fixture.', 'OK,Not OK', 'true'),
(6, 'EP1_6', 'The contacts for proper adjustment contact pressure& free from pitting. Wires are neatly dressed & clear of all moving part. Ensure they do not get trapped in the lid when closed.', 'OK,Not OK', 'true'),
(7, 'EP1_7', 'All the bridge contacts make & break at the same time.', 'OK,Not OK', 'true'),
(8, 'EP1_8', 'The setting of switch for having required amount of spring action.', 'OK,Not OK', 'true'),
(9, 'EP1_9', 'Obstruction test of points with 5 mm test piece (to be kept at 150 mm from the toe of the switch) to ensure that point cannot be locked, detection contacts shall not make & friction clutch should also slip. However Detection contacts shall make with obstruction of 1.6 mm test piece (to be kept at 150 mm from the toe of the switch)', 'OK,Not OK', 'true'),
(10, 'EP1_10', 'Also ensure that both sleepers are well packed & Ground connection rods are free from ballast.', 'OK,Not OK', 'true'),
(11, 'EP1_11', 'Checked the insulation of Gauge tie plate, all stretcher bars, P/D brackets & driving lug and replaced if found damaged/broken.', 'OK,Not OK', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ep2_form`
--

CREATE TABLE `ep2_form` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `section_id` varchar(10) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `station_id` varchar(10) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `component_name` varchar(20) NOT NULL,
  `sub_component` varchar(20) NOT NULL,
  `ep2_1` varchar(20) NOT NULL,
  `ep2_2` varchar(11) NOT NULL,
  `ep2_3` varchar(11) NOT NULL,
  `ep2_4` varchar(11) NOT NULL,
  `ep2_5` varchar(11) NOT NULL,
  `op_v_N_R` varchar(50) NOT NULL,
  `op_v_R_N` varchar(50) NOT NULL,
  `ob_v_N_R` varchar(50) NOT NULL,
  `ob_v_R_N` varchar(50) NOT NULL,
  `det_v_N_R` varchar(50) NOT NULL,
  `det_v_R_N` varchar(50) NOT NULL,
  `nwc_N_R` varchar(50) NOT NULL,
  `nwc_R_N` varchar(50) NOT NULL,
  `ob_sc_N_R` varchar(50) NOT NULL,
  `ob_sc_R_N` varchar(50) NOT NULL,
  `ob_t_N_R` varchar(50) NOT NULL,
  `ob_t_R_N` varchar(50) NOT NULL,
  `gt_N_R` varchar(50) NOT NULL,
  `gt_R_N` varchar(50) NOT NULL,
  `operatingTimeSecond` varchar(50) NOT NULL,
  `operatingTime_dbt` varchar(50) NOT NULL,
  `friction_c_s` varchar(50) NOT NULL,
  `track_locking` varchar(50) NOT NULL,
  `remark_brief` varchar(50) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `created_date` varchar(22) NOT NULL,
  `updated_date` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep2_form`
--

INSERT INTO `ep2_form` (`id`, `emp_id`, `section_id`, `section_name`, `station_id`, `station_name`, `component_name`, `sub_component`, `ep2_1`, `ep2_2`, `ep2_3`, `ep2_4`, `ep2_5`, `op_v_N_R`, `op_v_R_N`, `ob_v_N_R`, `ob_v_R_N`, `det_v_N_R`, `det_v_R_N`, `nwc_N_R`, `nwc_R_N`, `ob_sc_N_R`, `ob_sc_R_N`, `ob_t_N_R`, `ob_t_R_N`, `gt_N_R`, `gt_R_N`, `operatingTimeSecond`, `operatingTime_dbt`, `friction_c_s`, `track_locking`, `remark_brief`, `signature`, `created_date`, `updated_date`) VALUES
(1, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', '2023-09-03', 'Done', 'OK', 'Done', 'Not Done', 'hj', 'h', 'j', 'h', 'h', 'h', 'h', 'h', 'h', 'hh', 'h', 'h', 'h', 'hh', 'h', 'h', 'h', 'h', 'h', 'h', '2023-09-03 08:55:17', '2023-09-03 08:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `ep4_form`
--

CREATE TABLE `ep4_form` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `section_id` varchar(10) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `station_id` varchar(10) NOT NULL,
  `station_name` varchar(100) NOT NULL,
  `component_name` varchar(20) NOT NULL,
  `sub_component` varchar(20) NOT NULL,
  `ep4_1` varchar(11) NOT NULL,
  `ep4_2` varchar(11) NOT NULL,
  `ep4_3` varchar(11) NOT NULL,
  `ep4_4` varchar(11) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `updated_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep4_form`
--

INSERT INTO `ep4_form` (`id`, `emp_id`, `section_id`, `section_name`, `station_id`, `station_name`, `component_name`, `sub_component`, `ep4_1`, `ep4_2`, `ep4_3`, `ep4_4`, `created_date`, `updated_date`) VALUES
(1, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'Done', 'Not Done', 'Done', 'Not OK', '2023-09-02 05:39:55', '2023-09-02 05:39:55'),
(2, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'Done', 'Done', 'Done', 'OK', '2023-09-03 08:59:10', '2023-09-03 08:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `ep4_info`
--

CREATE TABLE `ep4_info` (
  `id` int(11) NOT NULL,
  `ep_id` varchar(10) NOT NULL,
  `ep_details` varchar(500) NOT NULL,
  `ep_option` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep4_info`
--

INSERT INTO `ep4_info` (`id`, `ep_id`, `ep_details`, `ep_option`, `status`) VALUES
(1, 'EP4_1', 'Greasing/Oiling of point machine and Checking of all grease nipples in position.', 'Done,Not Done', 'true'),
(2, 'EP4_2', 'Oiling of Point Gear Assembly, slides, rollers & pins with medium grade axle oil IS 1628. Avoid overflowing.', 'Done,Not Done', 'true'),
(3, 'EP4_3', 'Smoothness& cleaning of Commutator, carbon brushes.', 'Done, Not Done', 'true'),
(4, 'EP4_4', 'Ensure painting of connecting rods is satisfactory.', 'OK,Not OK', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ep5_form`
--

CREATE TABLE `ep5_form` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `section_id` varchar(10) NOT NULL,
  `section_name` varchar(33) NOT NULL,
  `station_id` varchar(10) NOT NULL,
  `station_name` varchar(33) NOT NULL,
  `component_name` varchar(20) NOT NULL,
  `sub_component` varchar(20) NOT NULL,
  `ep5_1` varchar(20) NOT NULL,
  `ep5_2` varchar(20) NOT NULL,
  `ep5_3` varchar(20) NOT NULL,
  `ep5_4` varchar(20) NOT NULL,
  `ep5_5` varchar(20) NOT NULL,
  `ep5_6` varchar(20) NOT NULL,
  `created_date` varchar(33) NOT NULL,
  `updated_date` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep5_form`
--

INSERT INTO `ep5_form` (`id`, `emp_id`, `section_id`, `section_name`, `station_id`, `station_name`, `component_name`, `sub_component`, `ep5_1`, `ep5_2`, `ep5_3`, `ep5_4`, `ep5_5`, `ep5_6`, `created_date`, `updated_date`) VALUES
(1, '50408023992', '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A', 'OK', 'OK', 'OK', 'Not Done', 'Not Done', 'Not Done', '2023-09-02 05:54:53', '2023-09-02 05:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `ep5_info`
--

CREATE TABLE `ep5_info` (
  `id` int(11) NOT NULL,
  `ep_id` varchar(10) NOT NULL,
  `ep_details` varchar(500) NOT NULL,
  `ep_option` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ep5_info`
--

INSERT INTO `ep5_info` (`id`, `ep_id`, `ep_details`, `ep_option`, `status`) VALUES
(1, 'EP5_1', 'Check for detector contacts and cleaning if required, control contacts, friction clutch. Ensure contact pressure of control and detection contact is adequate. Ensure Brass tip on finger contact is intact. Conduct obstruction test.', 'OK,Not OK', 'true'),
(2, 'EP5_2', 'Visual check of brass strips provided between detector slides, without removing them.', 'OK,Not OK', 'true'),
(3, 'EP5_3', 'Checking of contact, connections and its effectiveness during power operation points.', 'OK,Not OK', 'true'),
(4, 'EP5_4', 'Working of point using crank handle shall also be checked. It shall not be possible to insert Crank Handle without assigned Key. Interlocking with signals shall be checked ', 'Done,Not Done', 'true'),
(5, 'EP5_5', 'Checking of point motor insulation, cable and wire insulation (by 100 V Megger).', 'Done,Not Done', 'true'),
(6, 'EP5_6', 'Testing of point tail cable from K Rack in N & R position of point with 100 V megger.', 'Done,Not Done', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL DEFAULT 'MMIT EVENT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `date`, `category`, `image`, `des`) VALUES
(5, '2020-12-26', 'NEWS & EVENTS', 'WIN_20190531_084125.JPG', 'jkjlj'),
(6, '2021-01-03', 'NEWS & EVENTS', 'Django11.png', 'kjkjk'),
(7, '2021-01-03', 'OUR ACHIEVEMENTS', 'Django14 - Copy (5).png', 'jlkj'),
(8, '2021-01-03', 'NEWS & EVENTS', 'Django15.png', 'hfhfj');

-- --------------------------------------------------------

--
-- Table structure for table `ibn_signup_distributor`
--

CREATE TABLE `ibn_signup_distributor` (
  `id` int(11) NOT NULL,
  `ibn_id` varchar(100) NOT NULL,
  `customer_type` varchar(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `mobile_no` varchar(111) NOT NULL,
  `father_name` varchar(111) NOT NULL,
  `mother_name` varchar(111) NOT NULL,
  `aadhar_img` varchar(300) NOT NULL,
  `pan_img` varchar(300) NOT NULL,
  `bank_img` varchar(300) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `shop_name` varchar(300) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `distict` varchar(100) NOT NULL,
  `aadhar_no` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `aSoice6325` varchar(255) NOT NULL DEFAULT '0',
  `ajhk28` varchar(255) NOT NULL DEFAULT '0',
  `ajhk29` varchar(255) NOT NULL DEFAULT '0',
  `aSoic1` varchar(255) NOT NULL DEFAULT '0',
  `aRoin2` varchar(255) NOT NULL DEFAULT '0',
  `aRapi3` varchar(255) NOT NULL DEFAULT '0',
  `aBank4` varchar(255) NOT NULL DEFAULT '0',
  `bank_no` varchar(100) NOT NULL,
  `ifsc_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ibn_signup_distributor`
--

INSERT INTO `ibn_signup_distributor` (`id`, `ibn_id`, `customer_type`, `first_name`, `last_name`, `email`, `password`, `mobile_no`, `father_name`, `mother_name`, `aadhar_img`, `pan_img`, `bank_img`, `gender`, `shop_name`, `locality`, `pincode`, `state`, `distict`, `aadhar_no`, `pan_no`, `aSoice6325`, `ajhk28`, `ajhk29`, `aSoic1`, `aRoin2`, `aRapi3`, `aBank4`, `bank_no`, `ifsc_no`) VALUES
(1, 'IBND0001', 'Distributor', 'ASHWANI KUMAR GUPTA', '', 'aswanibtech@gmail.com', '7784860173', '9956477677', 'HKHKJHJH', 'GHGJ', 'as884WIN20190531083419.JPG', 'as513WIN20190531083434.JPG', 'as830WIN20190531084125.JPG', 'Male', 'KKJKKJH', 'GJGJHGHJGJ', '454665', 'Uttar Pradesh (UP)', 'Agra', '687676768778', '76676', '0', '0', '0', '0', '0', '0', '0', '', ''),
(2, 'IBND0002', 'Distributor', 'ASHWANI KUMAR GUPTA', '', 'swarn.mall@gmail.com', '7784860173', '9956477677', 'JHKJKJJ', 'JHJHJHKH', 'sw107WIN20190531083419.JPG', 'sw62WIN20190531083434.JPG', 'sw4WIN20190531084125.JPG', 'Male', 'JHJHKJHJH', 'JHHHKJHKJ', '273001', 'Uttar Pradesh (UP)', 'Agra', '090090909009', '090909090', '0', '0', '0', '0', '0', '0', '0', '090909090', '090090909');

-- --------------------------------------------------------

--
-- Table structure for table `ibn_signup_retailer`
--

CREATE TABLE `ibn_signup_retailer` (
  `id` int(11) NOT NULL,
  `ibn_id` varchar(100) NOT NULL,
  `customer_type` varchar(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `mobile_no` varchar(111) NOT NULL,
  `father_name` varchar(111) NOT NULL,
  `mother_name` varchar(111) NOT NULL,
  `aadhar_img` varchar(300) NOT NULL,
  `pan_img` varchar(300) NOT NULL,
  `bank_img` varchar(300) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `shop_name` varchar(300) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `distict` varchar(100) NOT NULL,
  `aadhar_no` varchar(100) NOT NULL,
  `pan_no` varchar(100) NOT NULL,
  `distributer_id` varchar(100) NOT NULL,
  `aSoice5623` varchar(255) NOT NULL DEFAULT '0',
  `ajhk7324` varchar(255) NOT NULL DEFAULT '0',
  `aSoice6325` varchar(255) NOT NULL DEFAULT '0',
  `ajhk28` varchar(255) NOT NULL DEFAULT '0',
  `ajhk29` varchar(255) NOT NULL DEFAULT '0',
  `aSoic1` varchar(255) NOT NULL DEFAULT '0',
  `aRoin2` varchar(255) NOT NULL DEFAULT '0',
  `aRapi3` varchar(255) NOT NULL DEFAULT '0',
  `aBank4` varchar(255) NOT NULL DEFAULT '0',
  `bank_no` varchar(100) NOT NULL,
  `ifsc_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ibn_signup_retailer`
--

INSERT INTO `ibn_signup_retailer` (`id`, `ibn_id`, `customer_type`, `first_name`, `last_name`, `email`, `password`, `mobile_no`, `father_name`, `mother_name`, `aadhar_img`, `pan_img`, `bank_img`, `gender`, `shop_name`, `locality`, `pincode`, `state`, `distict`, `aadhar_no`, `pan_no`, `distributer_id`, `aSoice5623`, `ajhk7324`, `aSoice6325`, `ajhk28`, `ajhk29`, `aSoic1`, `aRoin2`, `aRapi3`, `aBank4`, `bank_no`, `ifsc_no`) VALUES
(1, 'hum', 'Retailer', 'Admin', '', 'ab@gmail.com', 'tum', '9956477677', 'AN', 'IN', 'ab9781332083011488424484916347412473679606613031o.jpg', 'ab340WhatsAppImage2020-12-25at11.09.47PM.jpeg', 'ab959SLID-4.jpg', 'Male', 'TE', 'GORAKHPUR', '273001', 'Uttar Pradesh (UP)', 'Agra', '423222222222', '53333333333333333ddsf', 'NA', '0', '0', '0', '0', '0', '1', '1', '0', '0', '423222222222222222', 'sdf4fe');

-- --------------------------------------------------------

--
-- Table structure for table `pmerme_info_rail`
--

CREATE TABLE `pmerme_info_rail` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `empdesg` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `date_of_app` varchar(20) NOT NULL,
  `date_of_ret` varchar(20) NOT NULL,
  `pme_date` varchar(15) NOT NULL,
  `rme_date` varchar(15) NOT NULL,
  `created_date` varchar(25) NOT NULL,
  `pme_file` varchar(200) NOT NULL,
  `rme_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pmerme_info_rail`
--

INSERT INTO `pmerme_info_rail` (`id`, `section_id`, `station_id`, `section_name`, `station_name`, `empid`, `empname`, `empdesg`, `phone`, `date_of_app`, `date_of_ret`, `pme_date`, `rme_date`, `created_date`, `pme_file`, `rme_file`) VALUES
(1, 1, 1, 'PRRB-BSBS', 'PRRB', '50408023992', 'ADARSH MISHRA', 'MCM', '7518650216', '16/10/2008', '30/11/2036', '', '05/02/2021', '', '', '1692677183_WhatsAppImage2023-08-20at13.02.28.jpeg'),
(2, 1, 2, 'PRRB-BSBS', 'DRGJ', '332NP212227', 'VIJAY KUMAR YADAV', 'MCM', '8173087071', '27/11/2013', '31/07/2045', '', '28/07/2023', '', '', ''),
(3, 1, 2, 'PRRB-BSBS', 'DRGJ', '50468140165', 'LAKSHAMAN Pd.MINA', 'ESM-I', '8303170313', '06/02/2014', '31/07/2049', '', '10/06/2023', '', '', ''),
(4, 1, 3, 'PRRB-BSBS', 'JI', '50408023980', 'SANJIT KUMAR MISHRA', 'MCM', '7518650217', '15/10/2008', '30/11/2038', '', '28/07/2023', '', '', ''),
(5, 1, 4, 'PRRB-BSBS', 'RTR', '9229800389', 'FATEH SINGH MEENA', 'ESM-II', '7355136443', '09/10/2017', '31/07/2046', '', '28/07/2023', '', '', ''),
(6, 1, 5, 'PRRB-BSBS', 'HDK', '50488821316', 'RAHUL VERMA', 'ESM-III', '8090422480', '22/08/2013', '31/05/2051', '', '23/10/2021', '', '', ''),
(7, 1, 6, 'PRRB-BSBS', 'BYH', '3229804038', 'ABHISHEK VISHWAKARMA', 'ESM-III', '8299031548', '05/02/2020', '31/12/2054', '', '12/07/2022', '', '', ''),
(8, 1, 7, 'PRRB-BSBS', 'GYN', '9229800101', 'RAVINDRA SINGH', 'ESM-III', '8303170316', '15/07/2016', '28/02/2055', '', '23/03/2022', '', '', ''),
(9, 1, 7, 'PRRB-BSBS', 'GYN', '9229802862', 'RAKESH KUMAR MEENA', 'ESM-III', '9414249864', '10/07/2020', '31/10/2056', '', '30/04/2022', '', '', ''),
(10, 1, 8, 'PRRB-BSBS', 'MBS', '50405945227', 'SUNIL JEVIOR KHAKA', 'MCM', '7518650145', '04/09/1989', '30/06/2027', '', '15/01/2022', '', '', ''),
(11, 1, 8, 'PRRB-BSBS', 'MBS', '50468130292', 'RAM NAYAN', 'ESM-III', '7905917496', '06/09/2013', '30/04/2036', '', '12/07/2022', '', '', ''),
(12, 1, 8, 'PRRB-BSBS', 'MBS', '9229802867', 'DIPAK KUMAR', 'ESM-III', '7543956003', '09/07/2020', '31/05/2053', '', '30/04/2022', '', '', ''),
(13, 1, 9, 'PRRB-BSBS', 'KFK', '50420838554', 'DHARMENDRA KUMAR', 'ESM-III', '8630036351', '25/07/2013', '31/08/2050', '', '19/10/2022', '', '', ''),
(14, 1, 9, 'PRRB-BSBS', 'KFK', '33429800748', 'RAKESH KUMAR', 'ESM-III', '9870890787', '25/01/2016', '31/08/2050', '', '01/01/1970', '', '', ''),
(15, 1, 12, 'PRRB-BSBS', 'RTB', '50405945999', 'JAY PRAKASH', 'MCM', '9795581491', '16/10/1997', '30/06/2033', '', '28/07/2023', '', '', ''),
(16, 1, 13, 'PRRB-BSBS', 'HDT', '50400010339', 'ANIL KUMAR', 'SM-I', '8303170369', '18/01/2013', '31/07/2047', '', '10/07/2021', '', '', ''),
(17, 1, 13, 'PRRB-BSBS', 'HDT', '21429804567', 'RAVINDRA KUMAR PAL', 'ESM-III', '9549600162', '20/07/2016', '30/09/2047', '', '01/01/1970', '', '', ''),
(18, 1, 14, 'PRRB-BSBS', 'BSBS', '50405947819', 'KALLAN RAM', 'MCM', '8303170320', '03/03/2003', '31/07/2036', '', '28/12/2022', '', '', ''),
(19, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130657', 'RAJENDRA PRASAD GUPTA', 'MCM', '8303170321', '13/11/2013', '31/07/2052', '', '12/07/2022', '', '', ''),
(20, 1, 14, 'PRRB-BSBS', 'BSBS', '50405948010', ' ANUPAM MISHRA', 'MCM', '8303170322', '27/06/2003', '31/10/2044', '', '29/11/2022', '', '', ''),
(21, 1, 14, 'PRRB-BSBS', 'BSBS', '50405946268', ' RAKESH CHAND MISHRA', 'SM-I', '8303170323', '12/02/1998', '29/02/2032', '', '28/07/2023', '', '', ''),
(22, 1, 14, 'PRRB-BSBS', 'BSBS', '504NPS03669', 'AMIT PANDEY', 'ESM-I', '7518650218', '15/02/2007', '31/07/2048', '', '27/07/2019', '', '', ''),
(23, 1, 14, 'PRRB-BSBS', 'BSBS', '50405687240', 'MOHAN LAL', 'ESM-I', '8303170338', '13/08/1998', '31/10/2028', '', '12/01/2022', '', '', ''),
(24, 1, 14, 'PRRB-BSBS', 'BSBS', '50405947108', 'NIRAJ KR. SINGH', 'ESM-I', '8303170327', '26/06/2000', '31/01/2042', '', '28/11/2022', '', '', ''),
(25, 1, 14, 'PRRB-BSBS', 'BSBS', '50405947200', 'VIKASH', 'ESM-I', '8303170315', '25/04/2000', '31/07/2041', '', '28/07/2023', '', '', ''),
(26, 1, 14, 'PRRB-BSBS', 'BSBS', '50406010210', 'RAGHWENDRA KUMAR', 'MCM', '7518650222', '11/11/2004', '31/10/2041', '', '12/12/2021', '', '', ''),
(27, 1, 14, 'PRRB-BSBS', 'BSBS', '50714501923', 'AJAY KUMAR SINGH', 'ESM-I', '8303170325', '25/03/2006', '30/06/2038', '', '28/02/2023', '', '', ''),
(28, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130750', 'ROHIT ', 'ESM-II', '8303170224', '06/09/2013', '30/06/2052', '', '25/01/2021', '', '', ''),
(29, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130291', 'SAILESH KUMAR', 'ESM-III', '9918621594', '16/09/2013', '31/07/2048', '', '12/07/2022', '', '', ''),
(30, 1, 14, 'PRRB-BSBS', 'BSBS', '50468130939', 'VIKASH GUPTA', 'ESM-III', '9335664496', '26/12/2013', '31/05/2043', '', '31/08/2022', '', '', ''),
(31, 1, 14, 'PRRB-BSBS', 'BSBS', '50405946578', 'VIJAY PRASAD', 'ESM-III', '9005881074', '26/09/1998', '28/02/2035', '', '01/01/1970', '', '', ''),
(32, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405946062', 'RANJEET KUMAR VERMA', 'MCM', '7518650189', '26/02/1998', '30/06/2028', '', '10/07/2021', '', '', ''),
(33, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405945896', 'LALAN RAM', 'SM-I', '8004176050', '31/08/1996', '31/10/2025', '', '01/01/1970', '', '', ''),
(34, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405946670', 'INAYTULLAH ANSARI', 'SM-I', '8303170339', '16/11/1999', '30/09/2036', '', '01/05/2018', '', '', ''),
(35, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50405946700', 'OM PRAKASH', 'SM-I', '9956463020', '25/01/2000', '31/08/2032', '', '01/01/1970', '', '', ''),
(36, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '504NPS01812', 'AKHILESH YADAV', 'ESM-III', '8858771240', '27/11/2009', '30/06/2050', '', '01/01/1970', '', '', ''),
(37, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50468130449', 'SHIVCHARN PASWAN', 'ESM-II', '8303170353', '08/10/2013', '31/01/2048', '', '01/03/2020', '', '', ''),
(38, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '504NPS06724', 'JITENDRA KUMAR', 'SM-I', '8303170350', '06/04/2015', '31/07/2043', '', '26/10/2018', '', '', ''),
(39, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '504NPS04432', 'AKASH KR. RAWAT', 'ESM-III', '7905027466', '11/08/2015', '31/08/2053', '', '16/01/2022', '', '', ''),
(40, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50470130789', 'TANVIR ALAM', 'ESM-III', '9608521321', '25/07/2013', '28/02/2050', '', '17/02/2022', '', '', ''),
(41, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '9229800461', 'PRATIK SHARMA', 'SM-I', '7518650148', '22/01/2014', '30/09/2051', '', '01/01/1970', '', '', ''),
(42, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '50468140162', 'CHANDAN', 'SM-I', '7518650149', '18/02/2014', '31/10/2051', '', '01/01/1970', '', '', ''),
(43, 15, 115, 'BSB (HRR)', 'BSB (HRR)', '9229803340', 'SANDEEP KUMAR', 'ESM-III', '9981220407', '15/12/2020', '28/02/2050', '', '01/01/1970', '', '', ''),
(44, 2, 15, 'BCY-ARJ', 'BCY', '50405546540', 'RAJESH KR. TIWARI', 'MCM', '7518650151', '25/04/1997', '31/12/2033', '', '01/11/2018', '', '', ''),
(45, 2, 15, 'BCY-ARJ', 'BCY', '50382606006', 'PRINCE KUMAR GUPTA', 'MCM', '7705011304', '06/07/2013', '28/02/2045', '', '10/06/2023', '', '', ''),
(46, 2, 15, 'BCY-ARJ', 'BCY', '50411212690', ' PRAVIR KR. RAI', 'MCM', '7619004307', '21/02/2000', '28/02/2025', '', '01/12/2020', '', '', ''),
(47, 2, 15, 'BCY-ARJ', 'BCY', '50408034783', 'TAMRADHWAJ SINGH', 'ESM-I', '7518650219', '14/02/2008', '31/01/2047', '', '28/07/2023', '', '', ''),
(48, 2, 15, 'BCY-ARJ', 'BCY', '504NPS05742', ' MANKAR YADAY', 'ESM-I', '8303170345', '27/02/2015', '30/06/2052', '', '26/10/2018', '', '', ''),
(49, 2, 15, 'BCY-ARJ', 'BCY', '504IE071033', 'SREE NARAYAN CHTURVEDI', 'ESM-I', '8303170354', '11/12/2007', '30/09/2037', '', '28/07/2023', '', '', ''),
(50, 2, 15, 'BCY-ARJ', 'BCY', '50405946130', ' ISTEKHARULLAH', 'ESM-I', '8303170342', '18/02/1998', '31/01/2039', '', '29/11/2018', '', '', ''),
(51, 2, 15, 'BCY-ARJ', 'BCY', '50405946748', ' RAMESHWAR PRASAD', 'ESM-I', '8303170343', '18/11/1999', '31/07/2036', '', '28/07/2023', '', '', ''),
(52, 2, 15, 'BCY-ARJ', 'BCY', '504NPS06939', 'MONIKA SINGH', 'ESM-III', '8303170344', '07/01/2016', '31/08/2045', '', '27/07/2019', '', '', ''),
(53, 2, 15, 'BCY-ARJ', 'BCY', '504NPS04548', 'INDRA K. MAURYA', 'ESM-III', '7398026351', '18/08/2015', '31/12/2050', '', '28/02/2023', '', '', ''),
(54, 2, 16, 'BCY-ARJ', 'SRNT', '50405946165', 'AJAY K. SRIVASTAVA', 'ESM-I', '8303170347', '09/05/1998', '31/05/2034', '', '28/12/2022', '', '', ''),
(55, 2, 16, 'BCY-ARJ', 'SRNT', '50407023972', 'RAMASRAY PRASAD', 'ESM-I', '8303170348', '25/08/2007', '30/06/2035', '', '28/07/2023', '', '', ''),
(56, 2, 16, 'BCY-ARJ', 'SRNT', '50406200175', 'SUBHNARAYAN CHAUBEY', 'MCM', '8303170359', '18/01/2006', '31/07/2042', '', '29/11/2022', '', '', ''),
(57, 2, 17, 'BCY-ARJ', 'KDQ', '50405946657', ' RAM MILAN', 'ESM-I', '8303170349', '18/11/1999', '30/06/2037', '', '26/10/2018', '', '', ''),
(58, 2, 18, 'BCY-ARJ', 'RJI', '9229802863', 'GYANI GOSWAMI', 'ESM-III', '8303170346', '09/07/2020', '30/06/2052', '', '31/08/2022', '', '', ''),
(59, 2, 19, 'BCY-ARJ', 'ARJ', '50405945884', ' VIJAY KUMAR', 'MCM', '7393029210', '31/08/1996', '30/06/2027', '', '28/07/2023', '', '', ''),
(60, 2, 19, 'BCY-ARJ', 'ARJ', '50406201520', 'RAJ KUMAR I', 'MCM', '7518650221', '11/07/2006', '30/04/2035', '', '15/01/2022', '', '', ''),
(61, 2, 19, 'BCY-ARJ', 'ARJ', '50405946694', 'RAJ KUMAR II', 'ESM-I', '8303170352', '19/11/1999', '31/07/2041', '', '01/05/2019', '', '', ''),
(62, 2, 19, 'BCY-ARJ', 'ARJ', '504NPS03599', 'VIVEK KUMAR SINGH', 'ESM-I', '9453323943', '18/05/2015', '31/07/2056', '', '01/01/1970', '', '', ''),
(63, 2, 19, 'BCY-ARJ', 'ARJ', '27314402701', 'RAJESH KUMAR', 'ESM-III', '8252232921', '26/07/2014', '31/07/2052', '', '28/02/2023', '', '', ''),
(64, 2, 19, 'BCY-ARJ', 'ARJ', '334NP002742', 'SURENDRA KR. YADAV', 'ESM-III', '8070442297', '05/04/2012', '31/07/2040', '', '19/10/2022', '', '', ''),
(65, 2, 19, 'BCY-ARJ', 'ARJ', '334NP002887', ' SHASHI KANT YADAV', 'ESM-III', '8303170351', '25/04/2012', '31/08/2049', '', '01/07/2022', '', '', ''),
(66, 2, 19, 'BCY-ARJ', 'ARJ', '50468130651', 'AMIT RAM', 'ESM-III', '9608107780', '22/10/2013', '31/01/2051', '', '19/10/2022', '', '', ''),
(67, 2, 19, 'BCY-ARJ', 'ARJ', '504NPS04177', ' SATISH K. SINGH', 'ESM-III', '9118952025', '19/06/2015', '31/08/2045', '', '28/07/2023', '', '', ''),
(68, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405202437', 'VYAS YADAV ', 'MCM', '7518650203', '27/12/2005', '31/12/2025', '18/07/2023', '27/01/2020', '', '', ''),
(69, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405945963', 'SARITA RAI', 'ESM-I', '8303170218', '21/12/1996', '31/07/2029', '04/07/2023', '28/02/2023', '', '', ''),
(70, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50488812868', 'CHANDRASEKHAR', 'ESM-I', '9670576001', '05/07/2013', '30/06/2043', '', '27/02/2021', '', '', ''),
(71, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405947558', 'MAHENDRA KUMAR', 'ESM-II', '8303170216', '22/08/1998', '31/03/2033', '04/07/2023', '25/01/2021', '', '', ''),
(72, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50468140190', 'SANJAY YADAV', 'ESM-II', '8303170220', '04/03/2014', '31/08/2046', '', '01/01/1970', '', '', ''),
(73, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405944648', 'DHRUV', 'MCM', '7518650190', '14/08/1984', '30/06/2024', '17/07/2023', '19/10/2022', '', '', ''),
(74, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405947030', 'CHHOTELAL', 'ESM-I', '8303170215', '31/01/2000', '31/01/2029', '18/07/2023', '29/11/2022', '', '', ''),
(75, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50405947492', 'RAMA YADAV', 'ESM-I', '8303170213', '03/07/2001', '31/07/2040', '', '31/08/2022', '', '', ''),
(76, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '50468110084', 'KANCHAN RAJBHAR', 'ESM-I', '8303170214', '28/11/2011', '30/06/2050', '', '23/03/2020', '', '', ''),
(77, 3, 24, 'ARJ(EX.)-BTT(EX.)', 'MAU', '9229802859', 'MANOJ KUMAR KUSHWAHA', 'ESM-III', '9336060545', '09/07/2020', '30/06/2053', '', '30/04/2022', '', '', ''),
(78, 3, 22, 'ARJ(EX.)-BTT(EX.)', 'DLR', '50405945628', 'KAMLESH KUMAR', 'MCM', '7518650191', '19/09/1994', '31/10/2027', '20/07/2023', '28/10/2010', '', '1693289230_WhatsAppImage2023-08-23at21.38.45.jpeg', ''),
(79, 3, 22, 'ARJ(EX.)-BTT(EX.)', 'DLR', '9229802864', 'SALMAN KHAN', 'ESM-III', '9335330719', '09/07/2020', '31/03/2055', '', '22/02/2022', '', '', '1693286008_WhatsAppImage2023-08-23at21.38.48(2).jpeg'),
(80, 3, 23, 'ARJ(EX.)-BTT(EX.)', 'PPH', '50406202330', 'SANTOSH KUMAR RAWAT', 'ESM-II', '8303170225', '24/10/2006', '31/07/2047', '', '15/01/2022', '', '', ''),
(81, 3, 21, 'ARJ(EX.)-BTT(EX.)', 'JKN', '50400009003', 'RAJESH YADAV', 'ESM-I', '8303170212', '25/02/2012', '31/05/2045', '', '13/12/2021', '', '', ''),
(82, 3, 20, 'ARJ(EX.)-BTT(EX.)', 'SDT', '50410020111', 'SANJAY KUMAR', 'ESM-I', '7518650205', '13/04/2009', '31/01/2045', '', '05/02/2021', '', '', ''),
(83, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '50405202425', 'LALLAN CHAUHAN', 'MCM', '7518650202', '09/12/2005', '31/01/2032', '04/07/2023', '23/03/2020', '', '', ''),
(84, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '50405947560', 'RAVI PRAKASH', 'ESM-III', '9140605188', '02/08/1997', '30/06/2032', '01/01/1970', '30/04/2022', '', '', ''),
(85, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '50468130720', 'VINOD KUMAR', 'ESM-III', '9555147582', '12/11/2013', '30/06/2044', '', '12/07/2022', '', '', ''),
(86, 3, 25, 'ARJ(EX.)-BTT(EX.)', 'IAA', '9229803168', 'ANKIT SINGH', 'ESM-III', '8303170226', '21/10/2020', '31/08/2059', '', '22/02/2022', '', '', ''),
(87, 3, 29, 'ARJ(EX.)-BTT(EX.)', 'SRU', '50405947789', 'RAJKUMAR YADAV', 'MCM', '8303170288', '26/02/2003', '31/07/2041', '', '19/10/2022', '', '', ''),
(88, 3, 28, 'ARJ(EX.)-BTT(EX.)', 'LRD', '50405947868', 'SUNIL KUMAR', 'ESM-I', '8303170283', '22/07/2003', '31/08/2044', '', '21/03/2020', '', '', ''),
(89, 3, 26, 'ARJ(EX.)-BTT(EX.)', 'KER', '50468130259', 'DHIRENDRA SAROJ', 'ESM-III', '9616483804', '20/09/2013', '30/04/2051', '', '30/04/2022', '', '', ''),
(90, 3, 29, 'ARJ(EX.)-BTT(EX.)', 'SRU', '50410020573', 'DHARMRAJ MAURYA', 'MCM', '7518650206', '07/05/2008', '28/02/2043', '', '23/03/2020', '', '', ''),
(91, 4, 30, 'ARJ(EX.)-JNU(EX.)', 'DHE', '50468130284', 'SANJEEV KR. GAUTAM', 'ESM-II', '8931005016', '04/09/2013', '31/12/2049', '', '13/07/1905', '', '', ''),
(92, 4, 30, 'ARJ(EX.)-JNU(EX.)', 'DHE', '50468130286', 'DHARMENDRA KUMAR', 'ESM-III', '7317877764', '04/09/2013', '31/07/2048', '', '01/01/1970', '', '', ''),
(93, 4, 31, 'ARJ(EX.)-JNU(EX.)', 'KCT', '9229801489', 'RAHUL KUMAR PRASAD', 'ESM-III', '7563946356', '01/08/2019', '30/09/2056', '', '01/01/1970', '', '', ''),
(94, 4, 32, 'ARJ(EX.)-JNU(EX.)', 'MFJ', '50405948022', ' RATANDEEP GUPTA', 'ESM-I', '8303170355', '27/06/2003', '30/09/2041', '', '01/01/2021', '', '', ''),
(95, 4, 32, 'ARJ(EX.)-JNU(EX.)', 'MFJ', '334NP002860', 'SANJAY KR. YADAV', 'ESM-III', '7607908712', '18/04/2012', '29/02/2040', '', '01/07/2020', '', '', ''),
(96, 5, 33, 'ARJ(EX.)-CPR(EX.)', 'SYH', '9229802857', 'ANIL YADAV', 'ESM-III', '9892910199', '07/07/2020', '31/01/2054', '', '12/07/2022', '', '', ''),
(97, 5, 34, 'ARJ(EX.)-CPR(EX.)', 'TRN', '50405945471', ' INDRADEV YADAV', 'MCM', '8303170358', '01/10/1993', '31/01/2027', '', '12/01/2022', '', '', ''),
(98, 5, 34, 'ARJ(EX.)-CPR(EX.)', 'TRN', '50468130937', 'YOGESH KUMAR', 'ESM-III', '8429440920', '05/12/2013', '31/08/2046', '', '19/10/2022', '', '', ''),
(99, 5, 35, 'ARJ(EX.)-CPR(EX.)', 'NDJ', '27223007409', 'MADINDRA NATH', 'ESM-I', '7518650154', '19/06/2015', '29/02/2056', '', '12/07/2022', '', '', ''),
(100, 5, 36, 'ARJ(EX.)-CPR(EX.)', 'AKS', '50305030272', 'RAVISH CHANDRA', 'ESM-II', '8303170362', '09/04/2005', '31/05/2040', '', '29/11/2018', '', '', ''),
(101, 5, 36, 'ARJ(EX.)-CPR(EX.)', 'AKS', '50468130660', 'PRAMOD KUMAR BHARTI', 'ESM-III', '7800348713', '08/11/2013', '30/06/2050', '', '28/02/2023', '', '', ''),
(102, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '50410032010', 'BHUPENDRA NATH YADAV', 'ESM-I', '8303170363', '29/12/2008', '30/06/2039', '', '13/01/2021', '', '', ''),
(103, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '504NPS06496', 'SHIVAM KHARE', 'ESM-I', '8303170364', '12/03/2015', '28/02/2054', '', '10/07/2021', '', '', ''),
(104, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '50405946529', 'SYAM BADAN UADAV', 'ESM-I', '8303170373', '08/02/1999', '30/06/2040', '', '19/10/2022', '', '', ''),
(105, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '50468130474', 'SANTOSH URAO', 'ESM-I', '8303170365', '18/11/2013', '28/02/2043', '', '01/01/1970', '', '', ''),
(106, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '275N0002807', 'AJEET SINGH KUSHWAHA', 'ESM-III', '6200013305', '24/05/2012', '31/10/2046', '', '28/02/2023', '', '', ''),
(107, 5, 37, 'ARJ(EX.)-CPR(EX.)', 'GCT', '9229802854', 'ASHISH KUMAR SINGH', 'ESM-III', '7903231175', '07/07/2020', '31/03/2057', '', '30/04/2022', '', '', ''),
(108, 5, 0, 'ARJ(EX.)-CPR(EX.)', 'SBK', '9229802856', 'SAKET KUMAR', 'ESM-III', '8539990709', '10/07/2020', '31/07/2058', '', '28/07/2023', '', '', ''),
(109, 5, 38, 'ARJ(EX.)-CPR(EX.)', 'YFP', '33329801611', 'ANURAG KUMAR', 'ESM-I', '8303170370', '22/09/2014', '31/07/2052', '', '13/01/2021', '', '', ''),
(110, 5, 0, 'ARJ(EX.)-CPR(EX.)', 'DDD', '9229802881', 'AJEET KUMAR SINGH', 'ESM-III', '7050524444', '13/07/2020', '28/02/2057', '', '30/04/2022', '', '', ''),
(111, 5, 39, 'ARJ(EX.)-CPR(EX.)', 'KMDR', '507TR150100', 'ANAND KUMAR', 'ESM-I', '8303170371', '27/10/2015', '31/05/2053', '', '13/01/2021', '', '', ''),
(112, 5, 39, 'ARJ(EX.)-CPR(EX.)', 'KMDR', '504NPS06737', 'ANURAG KR. GUPTA', 'ESM-II', '8303170372', '30/08/2013', '31/07/2051', '', '12/01/2022', '', '', ''),
(113, 5, 48, 'ARJ(EX.)-CPR(EX.)', 'GTST', '50468130659', 'AMRESH SINGH YADAV', 'ESM-III', '7652078122', '11/11/2013', '30/06/2042', '', '29/12/2022', '', '', ''),
(114, 5, 47, 'ARJ(EX.)-CPR(EX.)', 'BKLA', '50405945768', 'HARINATH PD KUSHWAHA', 'MCM ', '9065528569', '31/07/1996', '31/03/2035', '31/07/2023', '01/12/2021', '', '', ''),
(115, 5, 45, 'ARJ(EX.)-CPR(EX.)', 'SIP', '9229802874', 'AJEET KUMAR SINGH', 'ESM-III', '8957726536', '07/07/2020', '31/10/2053', '', '01/07/2022', '', '', ''),
(116, 5, 45, 'ARJ(EX.)-CPR(EX.)', 'SIP', '504NPS06736', 'SATYENDRA KUMAR SINGH', 'ESM-I', '8303170270', '16/05/2015', '30/06/2048', '', '01/01/2022', '', '', ''),
(117, 5, 0, 'ARJ(EX.)-CPR(EX.)', 'ROI', '50406201325', 'ABHISHEK KUMAR', 'ESM-I', '7518650198', '11/07/2006', '31/05/2043', '', '01/07/2022', '', '', ''),
(118, 5, 44, 'ARJ(EX.)-CPR(EX.)', 'STW', '9229802871', 'GAURAV KUMAR', 'ESM-III', '8407094954', '09/07/2020', '28/02/2058', '', '01/02/2022', '', '', ''),
(119, 5, 43, 'ARJ(EX.)-CPR(EX.)', 'BCD', '50405201986', 'KAMALESH KR YADAV', 'ESM-I', '8303170271', '13/09/2005', '31/12/2032', '31/07/2023', '01/07/2021', '', '', ''),
(120, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '9229802858', 'ASHUTOSH KUMAR PAL', 'ESM-III', '8687761739', '07/07/2020', '30/06/2056', '', '01/02/2022', '', '', ''),
(121, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50403762245', 'SUBHASH SINGH', 'MCM ', '7518650156', '10/07/1995', '28/02/2029', '31/07/2023', '01/02/2021', '', '', ''),
(122, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50406201337', 'DINESH KUMAR', 'ESM-I', '8303170265', '13/07/2006', '31/12/2036', '', '01/02/2021', '', '', ''),
(123, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50473100040', 'ATUL KUMAR SRIVASTAV', 'ESM-I', '8303170267', '05/05/2010', '31/01/2042', '', '01/10/2022', '', '', ''),
(124, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50405946475', 'RAM PRAVESH YADAV', 'ESM-I', '8303170273', '11/02/1999', '31/07/2036', '31/07/2023', '01/12/2021', '', '', ''),
(125, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '50400010340', 'UMESH KUMAR RAM', 'ESM-II', '8303170269', '14/02/2012', '30/04/2046', '', '01/02/2021', '', '', ''),
(126, 5, 42, 'ARJ(EX.)-CPR(EX.)', 'BUI', '9229803130', 'RANJEET KUMAR', 'ESM-III', '7301135147', '21/10/2020', '31/10/2055', '', '01/08/2022', '', '', ''),
(127, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '50413021187', 'DINESH KUMAR RAM', 'ESM-I', '8303170271', '01/05/2013', '30/09/2042', '01/08/2023', '01/07/2022', '', '', ''),
(128, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '50405947376', 'SHEKHAR KUMAR', 'ESM-II', '7800642200', '12/01/2001', '31/12/2036', '', '01/09/2019', '', '', ''),
(129, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '50405947870', 'V.S.PRAJAPATI', 'ESM-I', '8887973263', '30/08/2003', '30/06/2042', '', '01/10/2022', '', '', ''),
(130, 5, 41, 'ARJ(EX.)-CPR(EX.)', 'PEP', '275N0009157', 'JANARDAN YADAV', 'ESM-III', '9696625940', '12/06/2012', '31/08/2046', '', '01/02/2023', '', '', ''),
(131, 5, 40, 'ARJ(EX.)-CPR(EX.)', 'CBN', '50408024248', 'SUNIL KR SRIVASTAVA', 'ESM-I', '7518650199', '04/12/2008', '31/10/2036', '20/07/2023', '01/02/2021', '', '', ''),
(132, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '533P9899316', 'SUNIL KUMAR DUBEY ', 'ESM-I', '8303170332', '26/02/2009', '31/01/2039', '', '01/01/2019', '', '', ''),
(133, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '504NPS06722', 'ANITA YADAV ', 'ESM-I', '8303170336', '29/10/2015', '30/06/2052', '', '27/02/2021', '', '', ''),
(134, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50468130174', 'M. SANTOSH KUMAR ', 'ESM-I', '8303170335', '13/07/2013', '31/05/2050', '', '01/11/2014', '', '', ''),
(135, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405947443', 'JAY PRAKASH GAUTAM ', 'MCM', '9532985658', '16/07/1999', '31/08/2033', '', '01/12/2022', '', '', ''),
(136, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405945770', 'P.C. SHRIVASTAV', 'ESM-I', '8303170331', '03/08/1996', '30/06/2030', '', '27/02/2021', '', '', ''),
(137, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405202395', 'RAVINDER MISHRA', 'MCM', '8303170328', '16/09/2005', '31/08/2034', '', '01/08/2021', '', '', ''),
(138, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '50405945434', 'M. PARWEJ RABBANI', 'MCM', '9935955537', '27/01/1995', '30/06/2032', '', '01/12/2022', '', '', ''),
(139, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '9229803506', ' SWATI KUMARI', 'ESM-III', '6299451460', '15/11/2021', '30/04/2057', '', '29/05/2022', '', '', ''),
(140, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '9229803507', 'MATA PRASAD', 'ESM-III', '6283128430', '28/10/2021', '31/08/2056', '', '29/05/2022', '', '', ''),
(141, 14, 116, 'SIGNAL CONTROL', 'SIGNAL CONTROL', '9329802722', 'RAHUL KUMAR SINGH', 'ESM-III', '7979851327', '21/08/2020', '31/12/2055', '', '12/07/2022', '', '', ''),
(142, 6, 50, 'MAU(EX.)-SHG(EX.)', 'KRND', '9229803110', 'PUSHPENDRA KUMAR SINGH', 'ESM-III', '9621600989', '28/09/2020', '31/01/2055', '', '12/11/2022', '', '', ''),
(143, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '9229803012', 'ALOK SAROJ', 'ESM-III', '9005747897', '28/09/2020', '31/03/2053', '', '12/11/2022', '', '', ''),
(144, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '9229803231', 'ADITYA KUMAR', 'ESM-III', '9140962634', '15/12/2020', '31/07/2050', '', '12/11/2022', '', '', ''),
(145, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50405947832', 'RAMBACHAN', 'MCM', '7518650224', '04/03/2003', '31/08/2041', '', '15/01/2022', '', '', ''),
(146, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50405947005', 'DEENDAYAL', 'ESM-I', '8303170221', '28/01/2000', '31/12/2040', '', '13/12/2021', '', '', ''),
(147, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50468130717', 'RINKU KUMAR', 'ESM-III', '9918342357', '23/10/2013', '31/05/2048', '', '12/07/2022', '', '', ''),
(148, 6, 53, 'MAU(EX.)-SHG(EX.)', 'AMH', '50468130662', 'DINESH CHANDRA BHARTI', 'ESM-III', '8303170253', '21/09/2013', '30/06/2047', '', '06/10/2023', '', '', ''),
(149, 6, 56, 'MAU(EX.)-SHG(EX.)', 'KRT', '9229800083', 'MANOJ YADAV', 'ESM-III', '8303170253', '07/07/2016', '31/05/2054', '', '13/12/2021', '', '', ''),
(150, 6, 55, 'MAU(EX.)-SHG(EX.)', 'MMA', '50406203346', 'JANERDAN YADAV', 'ESM-II', '8303170219', '22/12/2006', '31/08/2048', '', '25/01/2021', '', '', ''),
(151, 6, 54, 'MAU(EX.)-SHG(EX.)', 'SAA', '50468130210', 'RADHESHYAM', 'ESM-III', '8303170223', '06/08/2013', '31/07/2039', '', '15/01/2022', '', '', ''),
(152, 6, 52, 'MAU(EX.)-SHG(EX.)', 'PHY', '332NP209909', 'DEEPAK KUMAR YADAV', 'ESM-III', '8423445600', '19/06/2013', '31/05/2051', '', '30/04/2022', '', '', ''),
(153, 6, 51, 'MAU(EX.)-SHG(EX.)', 'SMZ', '50468140453', 'CHHOTELAL BHARDHWAJ', 'ESM-III', '9170613636', '23/04/2014', '31/08/2054', '', '30/04/2022', '', '', ''),
(154, 6, 50, 'MAU(EX.)-SHG(EX.)', 'KRND', '9229803496', 'ARVIND KUMAR', 'ESM-III', '8115518418', '28/10/2021', '31/08/2053', '', '28/02/2023', '', '', ''),
(155, 6, 50, 'MAU(EX.)-SHG(EX.)', 'KRND', '504NPS05236', 'SANDIP KUSHWAHA', 'ESM-III', '8318212139', '18/08/2015', '30/09/2054', '', '12/07/2022', '', '', ''),
(156, 6, 49, 'MAU(EX.)-SHG(EX.)', 'DJD', '9229802891', 'AVANISH PANKAJ', 'ESM-III', '8423308686', '22/07/2020', '31/12/2052', '', '22/02/2022', '', '', ''),
(157, 7, 57, 'IAA(EX.)-PEP(EX.)', 'RTP', '50400008679', 'UPENDRA KUMAR', 'ESM  I', '8303170227', '07/02/2012', '30/06/2041', '', '05/02/2021', '', '', ''),
(158, 7, 59, 'IAA(EX.)-PEP(EX.)', 'CHR', '504NPS03689', 'PRAVEEN KUMAR SOREN', 'ESM-I', '8303170228', '22/05/2015', '30/06/2049', '', '15/01/2022', '', '', ''),
(159, 13, 117, 'GKP', 'GKP', '50411213735', 'AJIT KUMAR MALL', 'MCM/ESM', '7518650165', '20/09/1989', '31/07/2029', '20/06/2022', '28/07/2023', '', '', ''),
(160, 13, 117, 'GKP', 'GKP', '50405945215', 'NAVEEN RANA', 'MCM/MSM', '7518650164', '07/09/1989', '31/05/2027', '30/06/2022', '01/01/1970', '', '', ''),
(161, 13, 117, 'GKP', 'GKP', '50405946621', 'ARUN', 'SM-II', '8303170312', '19/11/1999', '31/12/2039', '', '30/11/2022', '', '', ''),
(162, 13, 117, 'GKP', 'GKP', '50400010364', 'RAJNISH KUMAR SINGH', 'ESM-I', '7518650209', '28/01/2013', '31/08/2047', '', '25/01/2021', '', '', ''),
(163, 13, 117, 'GKP', 'GKP', '50405947480', 'BHUWANESHWAR Pt. SI', 'SM-II', '8303170297', '13/11/2000', '30/04/2030', '27/11/2018', '29/03/2023', '', '', ''),
(164, 13, 117, 'GKP', 'GKP', '50429800467', 'UMESH KUMAR SINGH', 'SM-II', '7518650170', '21/01/2016', '31/05/2055', '', '30/11/2022', '', '', ''),
(165, 13, 117, 'GKP', 'GKP', '504NPS05622', 'BHUPENDRA KUMAR CHAURASHIYA', 'SM-III', '7518650163', '12/08/2015', '31/07/2048', '07/05/2015', '30/11/2022', '', '', ''),
(166, 13, 117, 'GKP', 'GKP', '504NPS05623', 'RAM KARAN NISHAD', 'SM-III', '8303170299', '18/08/2015', '31/08/2056', '07/05/2015', '28/12/2022', '', '', ''),
(167, 8, 60, 'KHM-CHPG', 'KHM', '50400010273', 'INDRASEN YADAV', 'ESM-I', '7518650208', '25/01/2013', '31/07/2049', '', '23/09/2019', '', '', '1693096682_WhatsAppImage2023-08-23at21.38.48(2).jpeg'),
(168, 8, 60, 'KHM-CHPG', 'KHM', '9229802890', 'PANKAJ KUMAR  BHARTI', 'ESM-III', '9452442388', '13/07/2020', '31/08/2053', '', '19/10/2022', '', '', ''),
(169, 8, 61, 'KHM-CHPG', 'SANR', '50411211120', 'K.K.VISHWAKARMA', 'MCM/ESM', '7518650177', '03/05/1989', '31/07/2028', '21/06/2022', '12/12/2021', '', '', ''),
(170, 8, 61, 'KHM-CHPG', 'SANR', '50405946293', 'P K BHARATI', 'ESM-I', '9621623205', '13/07/1998', '28/02/2038', '', '23/03/2020', '', '', ''),
(171, 8, 62, 'KHM-CHPG', 'CC', '50406202287', 'ASHUTOSH KUMAR', 'SM-I', '8303170293', '24/10/2006', '31/07/2048', '', '12/01/2022', '', '', ''),
(172, 8, 62, 'KHM-CHPG', 'CC', '50400010352', 'INDRESH KUMAR', 'ESM-I', '8303170234', '23/05/2013', '31/07/2042', '', '12/12/2021', '', '', ''),
(173, 8, 63, 'KHM-CHPG', 'GB', '50411213050', 'BABURAM', 'MCM/ESM', '7518650180', '16/09/1990', '31/01/2027', '20/06/2022', '12/12/2021', '', '', ''),
(174, 8, 63, 'KHM-CHPG', 'GB', '9229802954', 'DINA NATH', 'ESM-III', '8303170291', '12/08/2020', '31/05/2055', '', '22/02/2022', '', '', ''),
(175, 8, 64, 'KHM-CHPG', 'BALR', '50405946943', 'CHANDRA SHEKHAR', 'MCM/ESM', '7518650185', '01/04/2000', '31/12/2033', '27/01/2020', '29/03/2023', '', '', ''),
(176, 8, 65, 'KHM-CHPG', 'DEOS', '50401121194', 'ARVIND KUMAR TIWARI', 'MCM/ESM', '7518650182', '02/05/1989', '31/01/2027', '12/07/2022', '28/07/2023', '', '', ''),
(177, 8, 65, 'KHM-CHPG', 'DEOS', '50405945690', 'GOPAL PRASAD', 'MCM/ESM', '7518650196', '23/06/1994', '31/12/2028', '10/04/2019', '28/07/2023', '', '', ''),
(178, 8, 65, 'KHM-CHPG', 'DEOS', '50411212020', 'ARVIND KUMAR SHARMA', 'MCM/ESM', '7518650184', '26/09/1989', '31/05/2025', '22/06/2022', '23/03/2020', '', '', ''),
(179, 8, 65, 'KHM-CHPG', 'DEOS', '50407200110', 'RAKESH KUMAR SINGH', 'MCM/ESM', '7518650213', '19/01/2007', '31/08/2042', '', '10/06/2023', '', '', ''),
(180, 8, 65, 'KHM-CHPG', 'DEOS', '50405945793', 'SURESH KUMAR YADAV', 'SM-I', '8303170300', '06/08/1996', '30/06/2033', '08/07/2022', '12/12/2021', '', '', ''),
(181, 8, 66, 'KHM-CHPG', 'NRA', '42610D00253', 'RANA PRATAP SINGH', 'ESM-I', '7518650169', '13/02/2009', '30/09/2045', '', '25/11/2019', '', '', ''),
(182, 8, 67, 'KHM-CHPG', 'BTT', '50405945800', 'MANOJ KUMAR DIXIT', 'MCM/ESM', '7518650214', '01/08/1996', '30/06/2030', '12/07/2022', '28/07/2023', '', '', ''),
(183, 8, 67, 'KHM-CHPG', 'BTT', '50411211143', 'SUBHASH CH. SINGH', 'MCM/ESM', '7518650186', '02/05/1989', '30/04/2027', '28/06/2022', '10/06/2023', '', '', ''),
(184, 8, 67, 'KHM-CHPG', 'BTT', '50405945586', 'S.N.MISHRA', 'MCM/ESM', '7518650187', '24/02/1995', '31/07/2024', '20/06/2022', '27/01/2020', '', '', ''),
(185, 8, 67, 'KHM-CHPG', 'BTT', '50405946920', 'NAYEEM ANSARI', 'ESM-I', '8303170286', '28/01/2000', '30/09/2041', '', '29/03/2023', '', '', ''),
(186, 8, 67, 'KHM-CHPG', 'BTT', '50405947546', 'DASHRATH', 'ESM-I', '8303170287', '16/07/1998', '31/08/2033', '07/02/2017', '13/12/2021', '', '', ''),
(187, 8, 67, 'KHM-CHPG', 'BTT', '50407200109', 'JANARDAN YADAV', 'MCM/ESM', '8303170289', '19/01/2007', '30/11/2039', '', '31/08/2022', '', '', ''),
(188, 8, 67, 'KHM-CHPG', 'BTT', '504NPS01708', 'SUNIL KUMAR', 'ESM-I', '7518650215', '05/06/2009', '31/12/2046', '', '30/04/2022', '', '', ''),
(189, 8, 67, 'KHM-CHPG', 'BTT', '50409020100', 'MANOJ KUMAR SINGH', 'ESM-III', '7518850162', '01/11/2007', '31/12/2041', '19/10/2007', '30/11/2022', '', '', ''),
(190, 8, 68, 'KHM-CHPG', 'BHTR', '50411210904', 'ASHOK KUMAR', 'MCM', '7518650160', '21/09/1989', '29/02/2024', '06/10/2020', '28/07/2023', '', '', ''),
(191, 8, 68, 'KHM-CHPG', 'BHTR', '50413021333', 'JAY GANESH PRASAD', 'SM-I', '8303170284', '01/05/2013', '31/10/2042', '', '31/08/2022', '', '', ''),
(192, 8, 68, 'KHM-CHPG', 'BHTR', '504NPS04437', 'SANTOSH KR. PRASAD', 'SM-II', '8303170368', '24/07/2015', '30/04/2053', '', '27/01/2020', '', '', ''),
(193, 8, 68, 'KHM-CHPG', 'BHTR', '9229803480', 'SANDEEP KUMAR', 'ESM-III', '9065528584', '01/09/2021', '30/06/2060', '', '28/07/2023', '', '', ''),
(194, 8, 69, 'KHM-CHPG', 'BTK', '50405946955', 'SHANTOSH SINGH', 'SM-I', '7518650158', '26/05/2000', '31/12/2041', '', '28/03/2023', '', '', ''),
(195, 8, 70, 'KHM-CHPG', 'MW', '50408022859', 'MANOJ KUMAR', 'MCM', '9065528586', '19/02/2007', '31/01/2040', '', '12/07/2022', '', '', ''),
(196, 8, 71, 'KHM-CHPG', 'ZRDE', '50408020840', 'UPENDRA KR. YADAV', 'MCM', '9065528588', '07/05/2008', '28/02/2041', '', '13/12/2021', '', '', ''),
(197, 8, 71, 'KHM-CHPG', 'ZRDE', '50470131092', 'RAJU GAUND', 'ESM-III', '9771206801', '26/02/2013', '31/07/2051', '', '01/01/1970', '', '', ''),
(198, 8, 72, 'KHM-CHPG', 'SV', '50406100156', 'PRAMOD MANDAL', 'MCM', '9065528575', '11/11/2004', '31/03/2033', '27/10/2021', '13/01/2021', '', '', ''),
(199, 8, 72, 'KHM-CHPG', 'SV', '50405947522', 'SANDEEP KUMAR', 'MCM', '9065528574', '06/05/2000', '31/01/2037', '', '28/12/2022', '', '', ''),
(200, 8, 72, 'KHM-CHPG', 'SV', '50401121674', 'VIRENDRA KUMAR SHUKLA', 'MCM', '6388938203', '21/05/1987', '30/06/2024', '', '01/01/1970', '', '', ''),
(201, 8, 72, 'KHM-CHPG', 'SV', '50405946761', 'HARIDWAR YADAV', 'SM-I', '8303170281', '19/11/1997', '31/03/2031', '27/10/2021', '22/01/2022', '', '', ''),
(202, 8, 72, 'KHM-CHPG', 'SV', '50405947054', 'RAJ KISHOR YADAV', 'SM-I', '8303170277', '09/06/2000', '31/01/2035', '06/10/2021', '30/04/2022', '', '', ''),
(203, 8, 72, 'KHM-CHPG', 'SV', '50307030531', 'CHHOTE LAL', 'ESM-II', '8303170326', '13/12/2007', '31/01/2044', '', '13/01/2021', '', '', ''),
(204, 8, 72, 'KHM-CHPG', 'SV', '504NPS01334', 'MANJEET KUMAR SINGH', 'ESM-II', '9065528573', '06/09/2014', '31/12/2053', '', '01/01/1970', '', '', ''),
(205, 8, 73, 'KHM-CHPG', 'PCK', '50447204515', 'SANTOSH KUMAR SHARMA', 'SM-I', '9065528572', '25/06/1996', '30/04/2037', '', '31/08/2022', '', '', ''),
(206, 8, 74, 'KHM-CHPG', 'DDA', '50405945835', 'UMA PATI PRASAD', 'MCM', '9065528577', '02/09/1996', '30/06/2025', '17/10/2016', '30/04/2022', '', '', ''),
(207, 8, 74, 'KHM-CHPG', 'DDA', '504NPS04429', 'AMIT KUMAR', 'SM-III', '8303170275', '09/07/2015', '31/01/2054', '', '21/02/2022', '', '', ''),
(208, 8, 75, 'KHM-CHPG', 'CW', '50406100260', 'SUJEET KUMAR', 'MCM', '9065528583', '11/11/2004', '31/01/2044', '', '10/07/2021', '', '', ''),
(209, 8, 80, 'KHM-CHPG', 'CPR', '50403182630', 'RAJESH KUMAR UPADHYAY', 'ESM-III', '9931982635', '12/07/2001', '31/12/2034', '', '01/01/1970', '', '', ''),
(210, 8, 80, 'KHM-CHPG', 'CPR', '27621001684', 'MUNNA KUMAR YADAV', 'ESM-I', '8303170236', '04/11/2010', '31/01/2040', '', '01/07/2020', '', '', ''),
(211, 8, 80, 'KHM-CHPG', 'CPR', '50412021647', 'MANOJ KUMAR ', 'ESM-I', '8303170242', '04/10/2012', '31/01/2039', '', '01/12/2022', '', '', ''),
(212, 8, 80, 'KHM-CHPG', 'CPR', '504NPS06551', 'PRADEEP KUMAR', 'ESM-II', '8303170245', '16/09/2015', '31/01/2053', '', '01/12/2022', '', '', ''),
(213, 8, 80, 'KHM-CHPG', 'CPR', '50409020275', 'S K CHAKRADHARI', 'ESM-III', '8303170237', '30/01/2009', '28/02/2046', '', '01/11/2022', '', '', ''),
(214, 8, 80, 'KHM-CHPG', 'CPR', '50400594804', 'UMASHANKAR RAY', 'ESM-I', '8303170239', '17/06/2003', '31/07/2034', '', '01/02/2023', '', '', ''),
(215, 8, 80, 'KHM-CHPG', 'CPR', '275N0001777', 'SUSHIL KUMAR', 'ESM-I', '7518650201', '17/11/2008', '31/10/2040', '', '01/07/2021', '', '', ''),
(216, 8, 80, 'KHM-CHPG', 'CPR', '50405946426', 'SARVANAND RAM', 'ESM-I', '8303170243', '06/02/1999', '30/04/2037', '', '28/07/2023', '', '', ''),
(217, 8, 80, 'KHM-CHPG', 'CPR', '50468140266', 'DWARIKA SAH', 'ESM-I', '8303170238', '27/01/2014', '31/01/2037', '', '01/01/2022', '', '', ''),
(218, 8, 80, 'KHM-CHPG', 'CPR', '50405202152', 'MANAN KUMAR BHUSHAN', 'MCM', '9065528590', '08/12/2005', '29/02/2040', '', '01/02/2021', '', '', ''),
(219, 8, 80, 'KHM-CHPG', 'CPR', '50407200122', 'JITENDRA KUMAR SINGH', 'ESM-I', '9065528591', '19/01/2007', '28/02/2045', '', '01/12/2021', '', '', ''),
(220, 8, 80, 'KHM-CHPG', 'CPR', '50407182016', 'PRASHANT KUMAR DEV', 'ESM-I', '8303170230', '31/10/2006', '31/08/2044', '', '01/02/2022', '', '', ''),
(221, 8, 80, 'KHM-CHPG', 'CPR', '50200650020', 'PRAVEEN KUMAR', 'ESM-I', '8303170231', '18/01/2008', '31/01/2042', '', '01/09/2019', '', '', ''),
(222, 8, 79, 'KHM-CHPG', 'TKV', '50468140268', 'MANAN PANDEY', 'ESM-III', '7903335788', '06/02/2014', '31/03/2047', '', '01/12/2022', '', '', ''),
(223, 8, 79, 'KHM-CHPG', 'TKV', '504NPS02061', 'AMIT KUMAR', 'ESM-III', '7549821985', '30/09/2014', '30/06/2045', '', '01/12/2022', '', '', ''),
(224, 8, 78, 'KHM-CHPG', 'KPS', '9229803372', 'KULDEEP THAKUR', 'ESM-III', '8303170264', '25/02/2021', '31/10/2054', '', '01/08/2022', '', '', ''),
(225, 8, 77, 'KHM-CHPG', 'DDP', '50408020930', 'SANJAY KUMAR SHARMA', 'ESM-I', '8303170261', '09/04/2008', '30/06/2039', '', '28/07/2023', '', '', ''),
(226, 8, 77, 'KHM-CHPG', 'DDP', '50405946256', 'TARKESHWAR SHAH', 'ESM-II', '8303170263', '16/10/1998', '31/12/2031', '', '01/12/2022', '', '', ''),
(227, 8, 77, 'KHM-CHPG', 'DDP', '9229803374', 'PRAKASH KUMAR SINGH', 'ESM-III', '9555501603', '26/02/2021', '31/01/2054', '', '01/12/2022', '', '', ''),
(228, 8, 76, 'KHM-CHPG', 'EM', '504NPS03773', 'CHANDAN KUMAR', 'ESM-I', '8303170259', '27/05/2015', '31/01/2050', '', '01/01/2022', '', '', ''),
(229, 8, 76, 'KHM-CHPG', 'EM', '50405947170', 'BASANT KR. SINGH', 'ESM-III', '9142201285', '29/05/2000', '31/03/2030', '', '01/10/2022', '', '', ''),
(230, 8, 81, 'KHM-CHPG', 'CI', '27621003329', 'RAJESH RANJAN', 'ESM-I', '8303170244', '24/12/2012', '31/01/2048', '', '01/02/2023', '', '', ''),
(231, 8, 81, 'KHM-CHPG', 'CI', '50405946992', 'RAJESH KUMAR', 'ESM-I', '9065528581', '22/11/1999', '31/01/2038', '21/07/2023', '01/12/2021', '', '', ''),
(232, 8, 81, 'KHM-CHPG', 'CI', '50468130964', 'VIJAY KUMAR RAM', 'ESM-III', '9065528568', '26/12/2013', '31/01/2051', '', '01/02/2021', '', '', ''),
(233, 8, 81, 'KHM-CHPG', 'CI', '9229802860', 'SUJEET KUMAR', 'ESM-III', '8789050293', '09/07/2020', '31/07/2058', '', '01/08/2022', '', '', ''),
(234, 8, 82, 'KHM-CHPG', 'CHPG', '50406010246', 'BRIJMOHAN KUMAR', 'ESM-I', '9065528580', '11/11/2004', '31/05/2040', '', '01/04/2022', '', '', ''),
(235, 8, 82, 'KHM-CHPG', 'CHPG', '27223004494', 'SABIR HUSAIN', 'ESM-I', '8303170247', '01/11/2012', '30/09/2049', '', '01/02/2021', '', '', ''),
(236, 8, 82, 'KHM-CHPG', 'CHPG', '50481303142', 'JITENDRA KUMAR', 'ESM-I', '8303170248', '08/05/2013', '28/02/2047', '', '01/12/2022', '', '', ''),
(237, 8, 82, 'KHM-CHPG', 'CHPG', '50405946724', 'YOGENDRA RAI', 'ESM-I', '8303170249', '12/11/1999', '31/10/2035', '', '01/07/2022', '', '', ''),
(238, 8, 82, 'KHM-CHPG', 'CHPG', '9229802878', 'RAVI KUMAR', 'ESM-III', '6202180669', '09/07/2020', '31/12/2057', '', '01/10/2022', '', '', ''),
(239, 9, 85, 'UNLA-PNYA', 'UNLA', '27223008808', 'MOHAN LAL', 'ESM-III', '7518650166', '21/12/2015', '30/04/2046', '', '28/12/2022', '', '', ''),
(240, 9, 86, 'UNLA-PNYA', 'PPC', '50405948034', 'PRAMOD KUMAR MISHRA', 'MCM/ESM', '7518650204', '03/07/2003', '31/01/2041', '', '21/03/2020', '', '', ''),
(241, 9, 87, 'UNLA-PNYA', 'BBW', '50468130709', 'RAMESH PASWAN', 'SM-II', '8303170294', '05/09/2013', '30/04/2046', '', '30/11/2022', '', '', ''),
(242, 9, 88, 'UNLA-PNYA', 'CPJ', '50411210916', 'SURYANATH', 'MCM/ESM', '7518650167', '16/09/1990', '30/09/2024', '29/06/2022', '25/11/2019', '', '', ''),
(243, 9, 88, 'UNLA-PNYA', 'CPJ', '50405946736', 'GOVARDHAN', 'SM-I', '8303170295', '16/11/1999', '31/05/2038', '', '23/09/2019', '', '', ''),
(244, 9, 88, 'UNLA-PNYA', 'CPJ', '50405946888', 'PRAHALAD SINGH', 'SM-I', '8303170307', '12/05/2000', '30/09/2039', '', '30/11/2022', '', '', ''),
(245, 9, 88, 'UNLA-PNYA', 'CPJ', '9229802888', 'RAJANI KUMARI', 'ESM-III', '7388257090', '10/07/2020', '31/05/2058', '', '19/10/2022', '', '', ''),
(246, 9, 89, 'UNLA-PNYA', 'GH', '504NPS05259', 'S K SINGH', 'ESM-III', '7518650175', '11/08/2015', '31/10/2050', '', '29/03/2023', '', '', ''),
(247, 9, 90, 'UNLA-PNYA', 'SBZ', '50411212962', 'NANHELAL', 'MCM/ESM', '7518650168', '20/09/1989', '30/06/2028', '20/06/2022', '28/02/2023', '', '', ''),
(248, 9, 91, 'UNLA-PNYA', 'KZA', '9229803132', 'KISHAN KUSHWAHA', 'ESM-III', '8303170309', '21/10/2020', '31/05/2057', '', '30/11/2022', '', '', ''),
(249, 9, 92, 'UNLA-PNYA', 'PNYA', '9229802886', 'DESHBANDHU SINGH', 'ESM-III', '7518650181', '07/07/2020', '31/10/2054', '', '19/10/2022', '', '', ''),
(250, 10, 93, 'CPJ(EX.)-THE-CI(EX.)', 'LIJ', '9229803129', 'AJAY KUMAR TANTI', 'ESM-III', '7518650179', '22/10/2020', '31/10/2050', '', '22/02/2022', '', '', ''),
(251, 10, 94, 'CPJ(EX.)-THE-CI(EX.)', 'RKL', '50481303129', 'KANHAIYALAL', 'ESM-I', '7518650172', '10/05/2013', '31/01/2040', '17/04/2013', '25/01/2021', '', '', ''),
(252, 10, 94, 'CPJ(EX.)-THE-CI(EX.)', 'RKL', '50400010248', 'UMASHANKAR', 'ESM-I', '8303170298', '13/02/2012', '31/07/2051', '', '23/03/2020', '', '', ''),
(253, 10, 95, 'CPJ(EX.)-THE-CI(EX.)', 'BAGJ', '50468140112', 'SHREE NIWAS SINGH', 'ESM-III', '7518650171', '06/02/2014', '31/08/2050', '', '30/11/2022', '', '', ''),
(254, 10, 96, 'CPJ(EX.)-THE-CI(EX.)', 'POU', '50413021424', 'RAHUL KUMAR DUBEY', 'ESM-III', '7518650161', '09/05/2013', '31/07/2051', '', '30/11/2022', '', '', ''),
(255, 10, 96, 'CPJ(EX.)-THE-CI(EX.)', 'POU', '50405946797', 'RAM DARASH', 'SM-III', '8303170306', '18/11/1999', '31/07/2031', '28/07/2022', '12/01/2022', '', '', ''),
(256, 10, 98, 'CPJ(EX.)-THE-CI(EX.)', 'DUE', '50405947250', 'SAIFUL HAQUE', 'SM-II', '8303170308', '03/11/2000', '30/09/2035', '17/12/2020', '12/01/2022', '', '', ''),
(257, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '504NPS06212', 'SARVESH KUMAR YADAV', 'ESM-III', '7518650173', '18/08/2015', '30/06/2051', '', '19/10/2022', '', '', ''),
(258, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '50411211659', 'GIREESH PRASAD', 'MCM B/S', '7518650174', '12/02/1990', '31/01/2025', '13/07/2022', '01/01/1970', '', '', ''),
(259, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '50410301835', 'SHYAM SUNDAR YADAV', 'MCM', '8303170310', '15/10/1992', '28/02/2030', '20/06/2022', '28/02/2023', '', '', ''),
(260, 10, 99, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', '50405300836', 'VIJAY PRASAD', 'ESM-III', '7518650188', '01/06/2005', '31/08/2046', '14/05/2005', '29/11/2022', '', '', ''),
(261, 10, 100, 'CPJ(EX.)-THE-CI(EX.)', 'TRJ', '50405945811', 'RAMPALAT PRASAD', 'MCM/ESM', '7518650211', '01/08/1996', '31/03/2030', '28/06/2022', '30/04/2022', '', '', ''),
(262, 10, 84, 'CPJ(EX.)-THE-CI(EX.)', 'HTW', '50468130282', 'MUKESH KUMAR', 'ESM-III', '9065528578', '19/09/2013', '29/02/2048', '', '12/01/2022', '', '', ''),
(263, 10, 83, 'CPJ(EX.)-THE-CI(EX.)', 'ALS', '9229802884', 'ADARSK KUMAR PANDEY', 'ESM-III', '8303170282', '08/07/2020', '31/01/2056', '', '19/10/2022', '', '', ''),
(264, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50468070002', 'RAJU PRASAD', 'ESM-I', '9065528582', '08/03/2007', '31/01/2045', '', '01/08/2022', '', '', ''),
(265, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50405947790', 'VINAY KUMAR MISHRA', 'ESM-I', '9065528567', '04/04/2003', '31/03/2030', '', '01/01/1970', '', '', ''),
(266, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50407200134', 'MANOJ KR SRIVASTAVA', 'ESM-I', '8303170233', '14/02/2007', '31/07/2024', '', '01/01/1970', '', '', ''),
(267, 10, 103, 'CPJ(EX.)-THE-CI(EX.)', 'THE', '50405947091', 'SUNIL KUMAR PASWAN', 'ESM-II', '8303170272', '04/04/2000', '30/06/2041', '', '01/10/2022', '', '', ''),
(268, 10, 114, 'CPJ(EX.)-THE-CI(EX.)', 'KYH', '50405946566', 'RAM PARAS RAI', 'ESM-I', '8303170250', '16/08/1999', '31/08/2036', '', '01/07/2022', '', '', ''),
(269, 10, 112, 'CPJ(EX.)-THE-CI(EX.)', 'MEW', '9229800396', 'SHIV PUJAN SINGH', 'ESM-II', '8303170251', '14/11/2016', '30/06/2048', '', '28/07/2023', '', '', ''),
(270, 10, 107, 'CPJ(EX.)-THE-CI(EX.)', 'SQW', '50412021660', 'MANOJ KUMAR', 'ESM-I', '8303170254', '04/10/2012', '29/02/2044', '', '01/09/2019', '', '', ''),
(271, 10, 107, 'CPJ(EX.)-THE-CI(EX.)', 'SQW', '50405947285', 'ROHIT KUMAR RAI', 'ESM-II', '8303170255', '12/02/2001', '31/05/2042', '', '01/02/2023', '', '', ''),
(272, 10, 104, 'CPJ(EX.)-THE-CI(EX.)', 'GOPG', '504NPS05183', 'JAYKISHORE KUMAR', 'ESM-III', '8825132198', '24/07/2015', '28/02/2050', '', '01/10/2022', '', '', ''),
(273, 10, 106, 'CPJ(EX.)-THE-CI(EX.)', 'RTU', '50468130712', 'MANTOSH KUMAR MAHTO', 'ESM-III', '9852674319', '20/08/2013', '31/05/2053', '', '01/12/2022', '', '', ''),
(274, 10, 108, 'CPJ(EX.)-THE-CI(EX.)', 'DWDI', '50473130015', 'RAJESH KUMAR', 'ESM-I', '7292957735', '01/02/2013', '31/08/2046', '', '01/04/2023', '', '', ''),
(275, 10, 108, 'CPJ(EX.)-THE-CI(EX.)', 'DWDI', '50468130258', 'SATYENDRA KUMAR SHARMA', 'ESM-III', '7739376112', '20/08/2013', '30/11/2051', '', '01/10/2022', '', '', ''),
(276, 10, 109, 'CPJ(EX.)-THE-CI(EX.)', 'RPV', '50405947066', 'RAMESH TIWARI', 'ESM-I', '8303170252', '04/02/2000', '31/03/2034', '', '01/12/2022', '', '', ''),
(277, 10, 111, 'CPJ(EX.)-THE-CI(EX.)', 'SMKR', '9229802875', 'SHUBHAM KUMAR', 'ESM-III', '7277320916', '10/07/2020', '31/07/2059', '', '01/12/2022', '', '', ''),
(278, 10, 113, 'CPJ(EX.)-THE-CI(EX.)', 'PEE', '50468130458', 'SHILA NATH RAI', 'ESM-III', '9682423185', '26/08/2013', '31/12/2042', '', '01/12/2022', '', '', ''),
(279, 10, 102, 'CPJ(EX.)-THE-CI(EX.)', 'SSU', '9229802872', 'GAUTAM SIDHANT', 'ESM-III', '8178483444', '08/07/2020', '31/08/2056', '', '01/12/2022', '', '', ''),
(280, 11, 118, 'SV (HRR)', 'SV (HRR)', '50490179020', 'YAMUNA PRASAD VERMA', 'MCM', '9065528587', '15/01/1993', '31/01/2026', '06/10/2021', '29/11/2017', '', '', ''),
(281, 11, 118, 'SV (HRR)', 'SV (HRR)', '50405948009', 'VINOD RANJAN', 'MCM', '9065528576', '17/06/2003', '31/01/2030', '03/01/2020', '13/01/2021', '', '', ''),
(282, 11, 118, 'SV (HRR)', 'SV (HRR)', '50405946116', 'KRISHNA YADAV', 'SM-I', '9065528589', '17/10/1998', '31/03/2037', '', '29/03/2023', '', '', ''),
(283, 11, 118, 'SV (HRR)', 'SV (HRR)', '50405946580', 'MD JAN KHAN', 'SM-I', '8303170276', '22/06/1999', '31/01/2037', '', '29/10/2022', '', '', ''),
(284, 11, 118, 'SV (HRR)', 'SV (HRR)', '50313004399', 'SHASHI KANT PRASAD', 'ESM-III', '7518650154', '06/06/2013', '31/10/2049', '', '12/01/2022', '', '', ''),
(285, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50401121236', 'VIJAY KUMAR SINHA', 'MCM ', '9065528566', '03/05/1989', '31/10/2023', '', '01/01/1970', '', '', ''),
(286, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405945926', 'OM PRAKASH RAM', 'MCM (DES.)', '8303170237', '31/08/1996', '30/09/2024', '', '01/01/1970', '', '', ''),
(287, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405947893', 'ASHUTOSH KUMAR', 'ESM-I', '9065528579', '17/02/2002', '31/12/2040', '', '01/12/2021', '', '', ''),
(288, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50406201301', 'SUBODH KUMAR', 'ESM-I', '8303170229', '13/07/2006', '31/03/2042', '', '01/04/2022', '', '', ''),
(289, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405947406', 'BABLOO KUMAR', 'ESM-I', '8303170268', '18/08/1999', '31/01/2031', '01/01/1970', '01/02/2023', '', '', ''),
(290, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50405946876', 'SONA BABOO', 'ESM-II', '8303170232', '21/03/2000', '28/02/2042', '', '01/10/2022', '', '', ''),
(291, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50881301716', 'SUNIL KUMAR CHAUDHARY', 'ESM-I', '9827383696', '19/11/2013', '30/04/2046', '', '01/08/2022', '', '', ''),
(292, 12, 119, 'CPR (HRR)', 'CPR (HRR)', '50468140267', 'SURENDRA KUMAR SAH', 'ESM-III', '7033937150', '08/03/2014', '31/01/2048', '', '01/12/2022', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`section_id`, `section_name`) VALUES
(1, 'PRRB-BSBS'),
(2, 'BCY-ARJ'),
(3, 'ARJ(EX.)-BTT(EX.)'),
(4, 'ARJ(EX.)-JNU(EX.)'),
(5, 'ARJ(EX.)-CPR(EX.)'),
(6, 'MAU(EX.)-SHG(EX.)'),
(7, 'IAA(EX.)-PEP(EX.)'),
(8, 'KHM-CHPG'),
(9, 'UNLA-PNYA'),
(10, 'CPJ(EX.)-THE-CI(EX.)'),
(11, 'SV (HRR)'),
(12, 'CPR (HRR)\r\n'),
(13, 'GKP'),
(14, 'SIGNAL CONTROL'),
(15, 'BSB (HRR)');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Andaman and Nicobar (AN)'),
(2, 'Andhra Pradesh (AP)'),
(3, 'Arunachal Pradesh (AR)'),
(4, 'Assam (AS)'),
(5, 'Bihar (BR)'),
(6, 'Chandigarh (CH)'),
(7, 'Chhattisgarh (CG)'),
(8, 'Dadra and Nagar Haveli (DN)'),
(9, 'Daman and Diu (DD)'),
(10, 'Delhi (DL)'),
(11, 'Goa (GA)'),
(12, 'Gujarat (GJ)'),
(13, 'Haryana (HR)'),
(14, 'Himachal Pradesh (HP)'),
(15, 'Jammu and Kashmir (JK)'),
(16, 'Jharkhand (JH)'),
(17, 'Karnataka (KA)'),
(18, 'Kerala (KL)'),
(19, 'Lakshdweep (LD)'),
(20, 'Madhya Pradesh (MP)'),
(21, 'Maharashtra (MH)'),
(22, 'Manipur (MN)'),
(23, 'Meghalaya (ML)'),
(24, 'Mizoram (MZ)'),
(25, 'Nagaland (NL)'),
(26, 'Odisha (OD)'),
(27, 'Puducherry (PY)'),
(28, 'Punjab (PB)'),
(29, 'Rajasthan (RJ)'),
(30, 'Sikkim (SK)'),
(31, 'Tamil Nadu (TN)'),
(32, 'Tripura (TR)'),
(33, 'Uttar Pradesh (UP)'),
(34, 'Uttarakhand (UK)'),
(35, 'West Bengal (WB)');

-- --------------------------------------------------------

--
-- Table structure for table `station_component_info`
--

CREATE TABLE `station_component_info` (
  `id` int(11) NOT NULL,
  `section_id` varchar(20) NOT NULL,
  `section_name` varchar(33) NOT NULL,
  `station_id` varchar(20) NOT NULL,
  `station_name` varchar(20) NOT NULL,
  `station_component` varchar(100) NOT NULL,
  `sub_component` varchar(300) NOT NULL,
  `created_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station_component_info`
--

INSERT INTO `station_component_info` (`id`, `section_id`, `section_name`, `station_id`, `station_name`, `station_component`, `sub_component`, `created_date`) VALUES
(1, '1', 'PRRB-BSBS', '1', 'PRRB', 'POINT', '201A,VISHNU', '2023-08-19 08:08:53'),
(2, '1', 'PRRB-BSBS', '1', 'PRRB', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(3, '1', 'PRRB-BSBS', '1', 'PRRB', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(4, '1', 'PRRB-BSBS', '2', 'DRGJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(5, '1', 'PRRB-BSBS', '2', 'DRGJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(6, '1', 'PRRB-BSBS', '2', 'DRGJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(7, '1', 'PRRB-BSBS', '3', 'JI', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(8, '1', 'PRRB-BSBS', '3', 'JI', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(9, '1', 'PRRB-BSBS', '3', 'JI', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(10, '1', 'PRRB-BSBS', '4', 'RTR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(11, '1', 'PRRB-BSBS', '4', 'RTR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(12, '1', 'PRRB-BSBS', '4', 'RTR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(13, '1', 'PRRB-BSBS', '5', 'HDK', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(14, '1', 'PRRB-BSBS', '5', 'HDK', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(15, '1', 'PRRB-BSBS', '5', 'HDK', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(16, '1', 'PRRB-BSBS', '6', 'BYH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(17, '1', 'PRRB-BSBS', '6', 'BYH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(18, '1', 'PRRB-BSBS', '6', 'BYH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(19, '1', 'PRRB-BSBS', '7', 'GYN', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(20, '1', 'PRRB-BSBS', '7', 'GYN', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(21, '1', 'PRRB-BSBS', '7', 'GYN', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(22, '1', 'PRRB-BSBS', '8', 'MBS', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(23, '1', 'PRRB-BSBS', '8', 'MBS', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(24, '1', 'PRRB-BSBS', '8', 'MBS', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(25, '1', 'PRRB-BSBS', '9', 'KFK', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(26, '1', 'PRRB-BSBS', '9', 'KFK', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(27, '1', 'PRRB-BSBS', '9', 'KFK', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(28, '1', 'PRRB-BSBS', '10', 'KWH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(29, '1', 'PRRB-BSBS', '10', 'KWH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(30, '1', 'PRRB-BSBS', '10', 'KWH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(31, '1', 'PRRB-BSBS', '11', 'NTU', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(32, '1', 'PRRB-BSBS', '11', 'NTU', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(33, '1', 'PRRB-BSBS', '11', 'NTU', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(34, '1', 'PRRB-BSBS', '12', 'RTB', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(35, '1', 'PRRB-BSBS', '12', 'RTB', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(36, '1', 'PRRB-BSBS', '12', 'RTB', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(37, '1', 'PRRB-BSBS', '13', 'HDT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(38, '1', 'PRRB-BSBS', '13', 'HDT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(39, '1', 'PRRB-BSBS', '13', 'HDT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(40, '1', 'PRRB-BSBS', '14', 'BSBS', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(41, '1', 'PRRB-BSBS', '14', 'BSBS', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(42, '1', 'PRRB-BSBS', '14', 'BSBS', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(43, '2', 'BCY-ARJ', '15', 'BCY', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(44, '2', 'BCY-ARJ', '15', 'BCY', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(45, '2', 'BCY-ARJ', '15', 'BCY', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(46, '2', 'BCY-ARJ', '16', 'SRNT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(47, '2', 'BCY-ARJ', '16', 'SRNT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(48, '2', 'BCY-ARJ', '16', 'SRNT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(49, '2', 'BCY-ARJ', '17', 'KDQ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(50, '2', 'BCY-ARJ', '17', 'KDQ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(51, '2', 'BCY-ARJ', '17', 'KDQ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(52, '2', 'BCY-ARJ', '18', 'RJI', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(53, '2', 'BCY-ARJ', '18', 'RJI', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(54, '2', 'BCY-ARJ', '18', 'RJI', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(55, '2', 'BCY-ARJ', '19', 'ARJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(56, '2', 'BCY-ARJ', '19', 'ARJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(57, '2', 'BCY-ARJ', '19', 'ARJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(58, '3', 'ARJ(EX.)-BTT(EX.)', '20', 'SDT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(59, '3', 'ARJ(EX.)-BTT(EX.)', '20', 'SDT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(60, '3', 'ARJ(EX.)-BTT(EX.)', '20', 'SDT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(61, '3', 'ARJ(EX.)-BTT(EX.)', '21', 'JKN', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(62, '3', 'ARJ(EX.)-BTT(EX.)', '21', 'JKN', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(63, '3', 'ARJ(EX.)-BTT(EX.)', '21', 'JKN', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(64, '3', 'ARJ(EX.)-BTT(EX.)', '22', 'DLR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(65, '3', 'ARJ(EX.)-BTT(EX.)', '22', 'DLR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(66, '3', 'ARJ(EX.)-BTT(EX.)', '22', 'DLR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(67, '3', 'ARJ(EX.)-BTT(EX.)', '23', 'PPH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(68, '3', 'ARJ(EX.)-BTT(EX.)', '23', 'PPH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(69, '3', 'ARJ(EX.)-BTT(EX.)', '23', 'PPH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(70, '3', 'ARJ(EX.)-BTT(EX.)', '24', 'MAU', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(71, '3', 'ARJ(EX.)-BTT(EX.)', '24', 'MAU', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(72, '3', 'ARJ(EX.)-BTT(EX.)', '24', 'MAU', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(73, '3', 'ARJ(EX.)-BTT(EX.)', '25', 'IAA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(74, '3', 'ARJ(EX.)-BTT(EX.)', '25', 'IAA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(75, '3', 'ARJ(EX.)-BTT(EX.)', '25', 'IAA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(76, '3', 'ARJ(EX.)-BTT(EX.)', '26', 'KER', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(77, '3', 'ARJ(EX.)-BTT(EX.)', '26', 'KER', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(78, '3', 'ARJ(EX.)-BTT(EX.)', '26', 'KER', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(79, '3', 'ARJ(EX.)-BTT(EX.)', '27', 'BLTR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(80, '3', 'ARJ(EX.)-BTT(EX.)', '27', 'BLTR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(81, '3', 'ARJ(EX.)-BTT(EX.)', '27', 'BLTR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(82, '3', 'ARJ(EX.)-BTT(EX.)', '28', 'LRD', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(83, '3', 'ARJ(EX.)-BTT(EX.)', '28', 'LRD', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(84, '3', 'ARJ(EX.)-BTT(EX.)', '28', 'LRD', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(85, '3', 'ARJ(EX.)-BTT(EX.)', '29', 'SRU', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(86, '3', 'ARJ(EX.)-BTT(EX.)', '29', 'SRU', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(87, '3', 'ARJ(EX.)-BTT(EX.)', '29', 'SRU', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(88, '4', 'ARJ(EX.)-JNU(EX.)', '30', 'DHE', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(89, '4', 'ARJ(EX.)-JNU(EX.)', '30', 'DHE', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(90, '4', 'ARJ(EX.)-JNU(EX.)', '30', 'DHE', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(91, '4', 'ARJ(EX.)-JNU(EX.)', '31', 'KCT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(92, '4', 'ARJ(EX.)-JNU(EX.)', '31', 'KCT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(93, '4', 'ARJ(EX.)-JNU(EX.)', '31', 'KCT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(94, '4', 'ARJ(EX.)-JNU(EX.)', '32', 'MFJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(95, '4', 'ARJ(EX.)-JNU(EX.)', '32', 'MFJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(96, '4', 'ARJ(EX.)-JNU(EX.)', '32', 'MFJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(97, '5', 'ARJ(EX.)-CPR(EX.)', '33', 'SYH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(98, '5', 'ARJ(EX.)-CPR(EX.)', '33', 'SYH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(99, '5', 'ARJ(EX.)-CPR(EX.)', '33', 'SYH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(100, '5', 'ARJ(EX.)-CPR(EX.)', '34', 'TRN', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(101, '5', 'ARJ(EX.)-CPR(EX.)', '34', 'TRN', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(102, '5', 'ARJ(EX.)-CPR(EX.)', '34', 'TRN', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(103, '5', 'ARJ(EX.)-CPR(EX.)', '35', 'NDJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(104, '5', 'ARJ(EX.)-CPR(EX.)', '35', 'NDJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(105, '5', 'ARJ(EX.)-CPR(EX.)', '35', 'NDJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(106, '5', 'ARJ(EX.)-CPR(EX.)', '36', 'AKS', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(107, '5', 'ARJ(EX.)-CPR(EX.)', '36', 'AKS', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(108, '5', 'ARJ(EX.)-CPR(EX.)', '36', 'AKS', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(109, '5', 'ARJ(EX.)-CPR(EX.)', '37', 'GCT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(110, '5', 'ARJ(EX.)-CPR(EX.)', '37', 'GCT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(111, '5', 'ARJ(EX.)-CPR(EX.)', '37', 'GCT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(112, '5', 'ARJ(EX.)-CPR(EX.)', '38', 'YFP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(113, '5', 'ARJ(EX.)-CPR(EX.)', '38', 'YFP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(114, '5', 'ARJ(EX.)-CPR(EX.)', '38', 'YFP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(115, '5', 'ARJ(EX.)-CPR(EX.)', '39', 'KMDR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(116, '5', 'ARJ(EX.)-CPR(EX.)', '39', 'KMDR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(117, '5', 'ARJ(EX.)-CPR(EX.)', '39', 'KMDR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(118, '5', 'ARJ(EX.)-CPR(EX.)', '40', 'CBN', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(119, '5', 'ARJ(EX.)-CPR(EX.)', '40', 'CBN', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(120, '5', 'ARJ(EX.)-CPR(EX.)', '40', 'CBN', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(121, '5', 'ARJ(EX.)-CPR(EX.)', '41', 'PEP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(122, '5', 'ARJ(EX.)-CPR(EX.)', '41', 'PEP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(123, '5', 'ARJ(EX.)-CPR(EX.)', '41', 'PEP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(124, '5', 'ARJ(EX.)-CPR(EX.)', '42', 'BUI', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(125, '5', 'ARJ(EX.)-CPR(EX.)', '42', 'BUI', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(126, '5', 'ARJ(EX.)-CPR(EX.)', '42', 'BUI', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(127, '5', 'ARJ(EX.)-CPR(EX.)', '43', 'BCD', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(128, '5', 'ARJ(EX.)-CPR(EX.)', '43', 'BCD', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(129, '5', 'ARJ(EX.)-CPR(EX.)', '43', 'BCD', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(130, '5', 'ARJ(EX.)-CPR(EX.)', '44', 'STW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(131, '5', 'ARJ(EX.)-CPR(EX.)', '44', 'STW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(132, '5', 'ARJ(EX.)-CPR(EX.)', '44', 'STW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(133, '5', 'ARJ(EX.)-CPR(EX.)', '45', 'SIP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(134, '5', 'ARJ(EX.)-CPR(EX.)', '45', 'SIP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(135, '5', 'ARJ(EX.)-CPR(EX.)', '45', 'SIP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(136, '5', 'ARJ(EX.)-CPR(EX.)', '46', 'MHT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(137, '5', 'ARJ(EX.)-CPR(EX.)', '46', 'MHT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(138, '5', 'ARJ(EX.)-CPR(EX.)', '46', 'MHT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(139, '5', 'ARJ(EX.)-CPR(EX.)', '47', 'BKLA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(140, '5', 'ARJ(EX.)-CPR(EX.)', '47', 'BKLA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(141, '5', 'ARJ(EX.)-CPR(EX.)', '47', 'BKLA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(142, '5', 'ARJ(EX.)-CPR(EX.)', '48', 'GTST', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(143, '5', 'ARJ(EX.)-CPR(EX.)', '48', 'GTST', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(144, '5', 'ARJ(EX.)-CPR(EX.)', '48', 'GTST', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(145, '6', 'MAU(EX.)-SHG(EX.)', '49', 'DJD', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(146, '6', 'MAU(EX.)-SHG(EX.)', '49', 'DJD', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(147, '6', 'MAU(EX.)-SHG(EX.)', '49', 'DJD', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(148, '6', 'MAU(EX.)-SHG(EX.)', '50', 'KRND', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(149, '6', 'MAU(EX.)-SHG(EX.)', '50', 'KRND', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(150, '6', 'MAU(EX.)-SHG(EX.)', '50', 'KRND', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(151, '6', 'MAU(EX.)-SHG(EX.)', '51', 'SMZ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(152, '6', 'MAU(EX.)-SHG(EX.)', '51', 'SMZ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(153, '6', 'MAU(EX.)-SHG(EX.)', '51', 'SMZ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(154, '6', 'MAU(EX.)-SHG(EX.)', '52', 'PHY', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(155, '6', 'MAU(EX.)-SHG(EX.)', '52', 'PHY', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(156, '6', 'MAU(EX.)-SHG(EX.)', '52', 'PHY', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(157, '6', 'MAU(EX.)-SHG(EX.)', '53', 'AMH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(158, '6', 'MAU(EX.)-SHG(EX.)', '53', 'AMH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(159, '6', 'MAU(EX.)-SHG(EX.)', '53', 'AMH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(160, '6', 'MAU(EX.)-SHG(EX.)', '54', 'SAA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(161, '6', 'MAU(EX.)-SHG(EX.)', '54', 'SAA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(162, '6', 'MAU(EX.)-SHG(EX.)', '54', 'SAA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(163, '6', 'MAU(EX.)-SHG(EX.)', '55', 'MMA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(164, '6', 'MAU(EX.)-SHG(EX.)', '55', 'MMA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(165, '6', 'MAU(EX.)-SHG(EX.)', '55', 'MMA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(166, '6', 'MAU(EX.)-SHG(EX.)', '56', 'KRT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(167, '6', 'MAU(EX.)-SHG(EX.)', '56', 'KRT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(168, '6', 'MAU(EX.)-SHG(EX.)', '56', 'KRT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(169, '7', 'IAA(EX.)-PEP(EX.)', '57', 'RTP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(170, '7', 'IAA(EX.)-PEP(EX.)', '57', 'RTP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(171, '7', 'IAA(EX.)-PEP(EX.)', '57', 'RTP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(172, '7', 'IAA(EX.)-PEP(EX.)', '58', 'RSR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(173, '7', 'IAA(EX.)-PEP(EX.)', '58', 'RSR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(174, '7', 'IAA(EX.)-PEP(EX.)', '58', 'RSR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(175, '7', 'IAA(EX.)-PEP(EX.)', '59', 'CHR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(176, '7', 'IAA(EX.)-PEP(EX.)', '59', 'CHR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(177, '7', 'IAA(EX.)-PEP(EX.)', '59', 'CHR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(178, '8', 'KHM-CHPG', '60', 'KHM', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(179, '8', 'KHM-CHPG', '60', 'KHM', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(180, '8', 'KHM-CHPG', '60', 'KHM', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(181, '8', 'KHM-CHPG', '61', 'SANR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(182, '8', 'KHM-CHPG', '61', 'SANR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(183, '8', 'KHM-CHPG', '61', 'SANR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(184, '8', 'KHM-CHPG', '62', 'CC', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(185, '8', 'KHM-CHPG', '62', 'CC', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(186, '8', 'KHM-CHPG', '62', 'CC', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(187, '8', 'KHM-CHPG', '63', 'GB', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(188, '8', 'KHM-CHPG', '63', 'GB', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(189, '8', 'KHM-CHPG', '63', 'GB', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(190, '8', 'KHM-CHPG', '64', 'BALR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(191, '8', 'KHM-CHPG', '64', 'BALR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(192, '8', 'KHM-CHPG', '64', 'BALR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(193, '8', 'KHM-CHPG', '65', 'DEOS', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(194, '8', 'KHM-CHPG', '65', 'DEOS', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(195, '8', 'KHM-CHPG', '65', 'DEOS', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(196, '8', 'KHM-CHPG', '66', 'NRA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(197, '8', 'KHM-CHPG', '66', 'NRA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(198, '8', 'KHM-CHPG', '66', 'NRA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(199, '8', 'KHM-CHPG', '67', 'BTT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(200, '8', 'KHM-CHPG', '67', 'BTT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(201, '8', 'KHM-CHPG', '67', 'BTT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(202, '8', 'KHM-CHPG', '68', 'BHTR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(203, '8', 'KHM-CHPG', '68', 'BHTR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(204, '8', 'KHM-CHPG', '68', 'BHTR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(205, '8', 'KHM-CHPG', '69', 'BTK', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(206, '8', 'KHM-CHPG', '69', 'BTK', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(207, '8', 'KHM-CHPG', '69', 'BTK', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(208, '8', 'KHM-CHPG', '70', 'MW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(209, '8', 'KHM-CHPG', '70', 'MW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(210, '8', 'KHM-CHPG', '70', 'MW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(211, '8', 'KHM-CHPG', '71', 'ZRDE', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(212, '8', 'KHM-CHPG', '71', 'ZRDE', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(213, '8', 'KHM-CHPG', '71', 'ZRDE', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(214, '8', 'KHM-CHPG', '72', 'SV', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(215, '8', 'KHM-CHPG', '72', 'SV', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(216, '8', 'KHM-CHPG', '72', 'SV', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(217, '8', 'KHM-CHPG', '73', 'PCK', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(218, '8', 'KHM-CHPG', '73', 'PCK', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(219, '8', 'KHM-CHPG', '73', 'PCK', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(220, '8', 'KHM-CHPG', '74', 'DDA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(221, '8', 'KHM-CHPG', '74', 'DDA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(222, '8', 'KHM-CHPG', '74', 'DDA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(223, '8', 'KHM-CHPG', '75', 'CW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(224, '8', 'KHM-CHPG', '75', 'CW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(225, '8', 'KHM-CHPG', '75', 'CW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(226, '8', 'KHM-CHPG', '76', 'EM', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(227, '8', 'KHM-CHPG', '76', 'EM', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(228, '8', 'KHM-CHPG', '76', 'EM', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(229, '8', 'KHM-CHPG', '77', 'DDP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(230, '8', 'KHM-CHPG', '77', 'DDP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(231, '8', 'KHM-CHPG', '77', 'DDP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(232, '8', 'KHM-CHPG', '78', 'KPS', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(233, '8', 'KHM-CHPG', '78', 'KPS', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(234, '8', 'KHM-CHPG', '78', 'KPS', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(235, '8', 'KHM-CHPG', '79', 'TKV', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(236, '8', 'KHM-CHPG', '79', 'TKV', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(237, '8', 'KHM-CHPG', '79', 'TKV', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(238, '8', 'KHM-CHPG', '80', 'CPR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(239, '8', 'KHM-CHPG', '80', 'CPR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(240, '8', 'KHM-CHPG', '80', 'CPR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(241, '8', 'KHM-CHPG', '81', 'CI', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(242, '8', 'KHM-CHPG', '81', 'CI', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(243, '8', 'KHM-CHPG', '81', 'CI', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(244, '8', 'KHM-CHPG', '82', 'CHPG', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(245, '8', 'KHM-CHPG', '82', 'CHPG', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(246, '8', 'KHM-CHPG', '82', 'CHPG', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(247, '8', 'KHM-CHPG', '83', 'ALS', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(248, '8', 'KHM-CHPG', '83', 'ALS', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(249, '8', 'KHM-CHPG', '83', 'ALS', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(250, '8', 'KHM-CHPG', '84', 'HTW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(251, '8', 'KHM-CHPG', '84', 'HTW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(252, '8', 'KHM-CHPG', '84', 'HTW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(253, '9', 'UNLA-PNYA', '85', 'UNLA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(254, '9', 'UNLA-PNYA', '85', 'UNLA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(255, '9', 'UNLA-PNYA', '85', 'UNLA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(256, '9', 'UNLA-PNYA', '86', 'PPC', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(257, '9', 'UNLA-PNYA', '86', 'PPC', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(258, '9', 'UNLA-PNYA', '86', 'PPC', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(259, '9', 'UNLA-PNYA', '87', 'BBW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(260, '9', 'UNLA-PNYA', '87', 'BBW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(261, '9', 'UNLA-PNYA', '87', 'BBW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(262, '9', 'UNLA-PNYA', '88', 'CPJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(263, '9', 'UNLA-PNYA', '88', 'CPJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(264, '9', 'UNLA-PNYA', '88', 'CPJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(265, '9', 'UNLA-PNYA', '89', 'GH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(266, '9', 'UNLA-PNYA', '89', 'GH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(267, '9', 'UNLA-PNYA', '89', 'GH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(268, '9', 'UNLA-PNYA', '90', 'SBZ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(269, '9', 'UNLA-PNYA', '90', 'SBZ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(270, '9', 'UNLA-PNYA', '90', 'SBZ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(271, '9', 'UNLA-PNYA', '91', 'KZA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(272, '9', 'UNLA-PNYA', '91', 'KZA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(273, '9', 'UNLA-PNYA', '91', 'KZA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(274, '9', 'UNLA-PNYA', '92', 'PNYA', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(275, '9', 'UNLA-PNYA', '92', 'PNYA', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(276, '9', 'UNLA-PNYA', '92', 'PNYA', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(277, '10', 'CPJ(EX.)-THE-CI(EX.)', '93', 'LIJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(278, '10', 'CPJ(EX.)-THE-CI(EX.)', '93', 'LIJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(279, '10', 'CPJ(EX.)-THE-CI(EX.)', '93', 'LIJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(280, '10', 'CPJ(EX.)-THE-CI(EX.)', '94', 'RKL', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(281, '10', 'CPJ(EX.)-THE-CI(EX.)', '94', 'RKL', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(282, '10', 'CPJ(EX.)-THE-CI(EX.)', '94', 'RKL', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(283, '10', 'CPJ(EX.)-THE-CI(EX.)', '95', 'BAGJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(284, '10', 'CPJ(EX.)-THE-CI(EX.)', '95', 'BAGJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(285, '10', 'CPJ(EX.)-THE-CI(EX.)', '95', 'BAGJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(286, '10', 'CPJ(EX.)-THE-CI(EX.)', '96', 'POU', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(287, '10', 'CPJ(EX.)-THE-CI(EX.)', '96', 'POU', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(288, '10', 'CPJ(EX.)-THE-CI(EX.)', '96', 'POU', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(289, '10', 'CPJ(EX.)-THE-CI(EX.)', '97', 'KKT', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(290, '10', 'CPJ(EX.)-THE-CI(EX.)', '97', 'KKT', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(291, '10', 'CPJ(EX.)-THE-CI(EX.)', '97', 'KKT', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(292, '10', 'CPJ(EX.)-THE-CI(EX.)', '98', 'DUE', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(293, '10', 'CPJ(EX.)-THE-CI(EX.)', '98', 'DUE', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(294, '10', 'CPJ(EX.)-THE-CI(EX.)', '98', 'DUE', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(295, '10', 'CPJ(EX.)-THE-CI(EX.)', '99', 'TOI', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(296, '10', 'CPJ(EX.)-THE-CI(EX.)', '99', 'TOI', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(297, '10', 'CPJ(EX.)-THE-CI(EX.)', '99', 'TOI', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(298, '10', 'CPJ(EX.)-THE-CI(EX.)', '100', 'TRJ', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(299, '10', 'CPJ(EX.)-THE-CI(EX.)', '100', 'TRJ', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(300, '10', 'CPJ(EX.)-THE-CI(EX.)', '100', 'TRJ', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(301, '10', 'CPJ(EX.)-THE-CI(EX.)', '101', 'JGP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(302, '10', 'CPJ(EX.)-THE-CI(EX.)', '101', 'JGP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(303, '10', 'CPJ(EX.)-THE-CI(EX.)', '101', 'JGP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(304, '10', 'CPJ(EX.)-THE-CI(EX.)', '102', 'SSU', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(305, '10', 'CPJ(EX.)-THE-CI(EX.)', '102', 'SSU', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(306, '10', 'CPJ(EX.)-THE-CI(EX.)', '102', 'SSU', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(307, '10', 'CPJ(EX.)-THE-CI(EX.)', '103', 'THE', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(308, '10', 'CPJ(EX.)-THE-CI(EX.)', '103', 'THE', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(309, '10', 'CPJ(EX.)-THE-CI(EX.)', '103', 'THE', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(310, '10', 'CPJ(EX.)-THE-CI(EX.)', '104', 'GOPG', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(311, '10', 'CPJ(EX.)-THE-CI(EX.)', '104', 'GOPG', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(312, '10', 'CPJ(EX.)-THE-CI(EX.)', '104', 'GOPG', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(313, '10', 'CPJ(EX.)-THE-CI(EX.)', '105', 'MJV', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(314, '10', 'CPJ(EX.)-THE-CI(EX.)', '105', 'MJV', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(315, '10', 'CPJ(EX.)-THE-CI(EX.)', '105', 'MJV', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(316, '10', 'CPJ(EX.)-THE-CI(EX.)', '106', 'RTU', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(317, '10', 'CPJ(EX.)-THE-CI(EX.)', '106', 'RTU', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(318, '10', 'CPJ(EX.)-THE-CI(EX.)', '106', 'RTU', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(319, '10', 'CPJ(EX.)-THE-CI(EX.)', '107', 'SQW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(320, '10', 'CPJ(EX.)-THE-CI(EX.)', '107', 'SQW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(321, '10', 'CPJ(EX.)-THE-CI(EX.)', '107', 'SQW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(322, '10', 'CPJ(EX.)-THE-CI(EX.)', '108', 'DWDI', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(323, '10', 'CPJ(EX.)-THE-CI(EX.)', '108', 'DWDI', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(324, '10', 'CPJ(EX.)-THE-CI(EX.)', '108', 'DWDI', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(325, '10', 'CPJ(EX.)-THE-CI(EX.)', '109', 'RPV', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(326, '10', 'CPJ(EX.)-THE-CI(EX.)', '109', 'RPV', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(327, '10', 'CPJ(EX.)-THE-CI(EX.)', '109', 'RPV', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(328, '10', 'CPJ(EX.)-THE-CI(EX.)', '110', 'MHC', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(329, '10', 'CPJ(EX.)-THE-CI(EX.)', '110', 'MHC', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(330, '10', 'CPJ(EX.)-THE-CI(EX.)', '110', 'MHC', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(331, '10', 'CPJ(EX.)-THE-CI(EX.)', '111', 'SMKR', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(332, '10', 'CPJ(EX.)-THE-CI(EX.)', '111', 'SMKR', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(333, '10', 'CPJ(EX.)-THE-CI(EX.)', '111', 'SMKR', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(334, '10', 'CPJ(EX.)-THE-CI(EX.)', '112', 'MEW', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(335, '10', 'CPJ(EX.)-THE-CI(EX.)', '112', 'MEW', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(336, '10', 'CPJ(EX.)-THE-CI(EX.)', '112', 'MEW', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(337, '10', 'CPJ(EX.)-THE-CI(EX.)', '113', 'PEE', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(338, '10', 'CPJ(EX.)-THE-CI(EX.)', '113', 'PEE', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(339, '10', 'CPJ(EX.)-THE-CI(EX.)', '113', 'PEE', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(340, '10', 'CPJ(EX.)-THE-CI(EX.)', '114', 'KYH', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(341, '10', 'CPJ(EX.)-THE-CI(EX.)', '114', 'KYH', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(342, '10', 'CPJ(EX.)-THE-CI(EX.)', '114', 'KYH', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:53'),
(343, '15', 'BSB (HRR)', '115', 'BSB (HRR)', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(344, '15', 'BSB (HRR)', '115', 'BSB (HRR)', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(345, '15', 'BSB (HRR)', '115', 'BSB (HRR)', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(346, '14', 'SIGNAL CONTROL', '116', 'SIGNAL CONTROL', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(347, '14', 'SIGNAL CONTROL', '116', 'SIGNAL CONTROL', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(348, '14', 'SIGNAL CONTROL', '116', 'SIGNAL CONTROL', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(349, '13', 'GKP', '117', 'GKP', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(350, '13', 'GKP', '117', 'GKP', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(351, '13', 'GKP', '117', 'GKP', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(352, '11', 'SV (HRR)', '118', 'SV (HRR)', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(353, '11', 'SV (HRR)', '118', 'SV (HRR)', 'TRACK', '205A,205B', '2023-08-19 08:08:54'),
(354, '11', 'SV (HRR)', '118', 'SV (HRR)', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(355, '12', 'CPR (HRR)', '119', 'CPR (HRR)\r\n', 'POINT', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(356, '12', 'CPR (HRR)', '119', 'CPR (HRR)\r\n', 'TRACK', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(357, '12', 'CPR (HRR)', '119', 'CPR (HRR)\r\n', 'LC', '201A,201B,201C,202A,202B', '2023-08-19 08:08:54'),
(358, '3', 'ARJ(EX.)-BTT(EX.)', '27', 'BLTR', 'POINT2', '201A', '2023-08-19 07:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `station_tbl`
--

CREATE TABLE `station_tbl` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `section_id` int(35) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `station_name` varchar(100) NOT NULL,
  `station_full_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `station_tbl`
--

INSERT INTO `station_tbl` (`id`, `station_id`, `section_id`, `section_name`, `station_name`, `station_full_name`) VALUES
(1, 1, 1, 'PRRB-BSBS', 'PRRB', 'PARYAG RAJ RAM BAG'),
(2, 2, 1, 'PRRB-BSBS', 'DRGJ', 'DARAGANJ'),
(3, 3, 1, 'PRRB-BSBS', 'JI', 'JHUNSI'),
(4, 4, 1, 'PRRB-BSBS', 'RTR', 'RAMNATHPUR'),
(5, 5, 1, 'PRRB-BSBS', 'HDK', 'HANDIAKHAS'),
(6, 6, 1, 'PRRB-BSBS', 'BYH', 'BHITI'),
(7, 7, 1, 'PRRB-BSBS', 'GYN', 'GYANPUR ROAD '),
(8, 8, 1, 'PRRB-BSBS', 'MBS', 'MADHOSINGH'),
(9, 9, 1, 'PRRB-BSBS', 'KFK', 'KATKA'),
(10, 10, 1, 'PRRB-BSBS', 'KWH', 'KACHHWA ROAD'),
(11, 11, 1, 'PRRB-BSBS', 'NTU', 'NIGATPUR'),
(12, 12, 1, 'PRRB-BSBS', 'RTB', 'RAJA TALAB'),
(13, 13, 1, 'PRRB-BSBS', 'HDT', 'HARDATTPUR'),
(14, 14, 1, 'PRRB-BSBS', 'BSBS', 'VANARAS'),
(15, 15, 2, 'BCY-ARJ', 'BCY', 'VARANASI CITY'),
(16, 16, 2, 'BCY-ARJ', 'SRNT', 'SARNATH'),
(17, 17, 2, 'BCY-ARJ', 'KDQ', 'KADIPUR'),
(18, 18, 2, 'BCY-ARJ', 'RJI', 'RAJWARI'),
(19, 19, 2, 'BCY-ARJ', 'ARJ', 'AUNRIHAR Jn.'),
(20, 20, 3, 'ARJ(EX.)-BTT(EX.)', 'SDT', 'SADAT'),
(21, 21, 3, 'ARJ(EX.)-BTT(EX.)', 'JKN', 'JAKHANIYA'),
(22, 22, 3, 'ARJ(EX.)-BTT(EX.)', 'DLR', 'DULLAHPUR'),
(23, 23, 3, 'ARJ(EX.)-BTT(EX.)', 'PPH', 'PIPRIDIH'),
(24, 24, 3, 'ARJ(EX.)-BTT(EX.)', 'MAU', 'MAU Jn.'),
(25, 25, 3, 'ARJ(EX.)-BTT(EX.)', 'IAA', 'INDARA Jn.'),
(26, 26, 3, 'ARJ(EX.)-BTT(EX.)', 'KER', 'KIRIHARAPUR'),
(27, 27, 3, 'ARJ(EX.)-BTT(EX.)', 'BLTR', 'BELTHARA ROAD'),
(28, 28, 3, 'ARJ(EX.)-BTT(EX.)', 'LRD', 'LAR ROAD '),
(29, 29, 3, 'ARJ(EX.)-BTT(EX.)', 'SRU', 'SALEMPUR'),
(30, 30, 4, 'ARJ(EX.)-JNU(EX.)', 'DHE', 'DOBHI'),
(31, 31, 4, 'ARJ(EX.)-JNU(EX.)', 'KCT', 'KERAKAT'),
(32, 32, 4, 'ARJ(EX.)-JNU(EX.)', 'MFJ', 'MUFTIGANJ'),
(33, 33, 5, 'ARJ(EX.)-CPR(EX.)', 'SYH', 'SAIDPUR BHITRI'),
(34, 34, 5, 'ARJ(EX.)-CPR(EX.)', 'TRN', 'TARAON'),
(35, 35, 5, 'ARJ(EX.)-CPR(EX.)', 'NDJ', 'NANDGANJ'),
(36, 36, 5, 'ARJ(EX.)-CPR(EX.)', 'AKS', 'ANKUSHPUR'),
(37, 37, 5, 'ARJ(EX.)-CPR(EX.)', 'GCT', 'GHAZIPUR CITY'),
(38, 38, 5, 'ARJ(EX.)-CPR(EX.)', 'YFP', 'YUSUFPUR'),
(39, 39, 5, 'ARJ(EX.)-CPR(EX.)', 'KMDR', 'KARIMUDDINPUR'),
(40, 40, 5, 'ARJ(EX.)-CPR(EX.)', 'CBN', 'CHITBARAGAON'),
(41, 41, 5, 'ARJ(EX.)-CPR(EX.)', 'PEP', 'PHEPHNA Jn.'),
(42, 42, 5, 'ARJ(EX.)-CPR(EX.)', 'BUI', 'BALLIA'),
(43, 43, 5, 'ARJ(EX.)-CPR(EX.)', 'BCD', 'BANSDIH ROAD'),
(44, 44, 5, 'ARJ(EX.)-CPR(EX.)', 'STW', 'SAHATWAR'),
(45, 45, 5, 'ARJ(EX.)-CPR(EX.)', 'SIP', 'SURAIMANPUR'),
(46, 46, 5, 'ARJ(EX.)-CPR(EX.)', 'MHT', 'MANJHI'),
(47, 47, 5, 'ARJ(EX.)-CPR(EX.)', 'BKLA', 'BAKULHA'),
(48, 48, 5, 'ARJ(EX.)-CPR(EX.)', 'GTST', 'GAUTAM ASTHAN'),
(49, 49, 6, 'MAU(EX.)-SHG(EX.)', 'DJD', 'DIDARGANJ ROAD'),
(50, 50, 6, 'MAU(EX.)-SHG(EX.)', 'KRND', 'KHORASAN ROAD'),
(51, 51, 6, 'MAU(EX.)-SHG(EX.)', 'SMZ', 'SARAIMIR'),
(52, 52, 6, 'MAU(EX.)-SHG(EX.)', 'PHY', 'PHARIA'),
(53, 53, 6, 'MAU(EX.)-SHG(EX.)', 'AMH', 'AZAMGARH'),
(54, 54, 6, 'MAU(EX.)-SHG(EX.)', 'SAA', 'SATHIYAON'),
(55, 55, 6, 'MAU(EX.)-SHG(EX.)', 'MMA', 'MUHAMMADABAD '),
(56, 56, 6, 'MAU(EX.)-SHG(EX.)', 'KRT', 'KHURHAT'),
(57, 57, 7, 'IAA(EX.)-PEP(EX.)', 'RTP', 'RATANPURA'),
(58, 58, 7, 'IAA(EX.)-PEP(EX.)', 'RSR', 'RASRA'),
(59, 59, 7, 'IAA(EX.)-PEP(EX.)', 'CHR', 'CHILKAHAR'),
(60, 60, 8, 'KHM-CHPG', 'KHM', 'KUSMHI'),
(61, 61, 8, 'KHM-CHPG', 'SANR', 'SARDARNAGAR'),
(62, 62, 8, 'KHM-CHPG', 'CC', 'CHAURI CHAURA'),
(63, 63, 8, 'KHM-CHPG', 'GB', 'GAURI BAZAR'),
(64, 64, 8, 'KHM-CHPG', 'BALR', 'BAITALPUR'),
(65, 65, 8, 'KHM-CHPG', 'DEOS', 'DEORIA SADAR'),
(66, 66, 8, 'KHM-CHPG', 'NRA', 'NUNKHAR'),
(67, 67, 8, 'KHM-CHPG', 'BTT', 'BHATNI Jn.'),
(68, 68, 8, 'KHM-CHPG', 'BHTR', 'BHATPAR RANI '),
(69, 69, 8, 'KHM-CHPG', 'BTK', 'BANKATA'),
(70, 70, 8, 'KHM-CHPG', 'MW', 'MAIRWA'),
(71, 71, 8, 'KHM-CHPG', 'ZRDE', 'ZIRADEI'),
(72, 72, 8, 'KHM-CHPG', 'SV', 'SIVAN Jn'),
(73, 73, 8, 'KHM-CHPG', 'PCK', 'PACHRUKHI'),
(74, 74, 8, 'KHM-CHPG', 'DDA', 'DURAUNDHA Jn.'),
(75, 75, 8, 'KHM-CHPG', 'CW', 'CHAINWA'),
(76, 76, 8, 'KHM-CHPG', 'EM', 'EKMA'),
(77, 77, 8, 'KHM-CHPG', 'DDP', 'DAUDPUR'),
(78, 78, 8, 'KHM-CHPG', 'KPS', 'KOPA SAMHOTA'),
(79, 79, 8, 'KHM-CHPG', 'TKV', 'TEKNIWAS'),
(80, 80, 8, 'KHM-CHPG', 'CPR', 'CHHAPRA Jn.'),
(81, 81, 8, 'KHM-CHPG', 'CI', 'CHHAPRA KACHERI'),
(82, 82, 8, 'KHM-CHPG', 'CHPG', 'CHHAPRA GRAMIN'),
(83, 83, 8, 'KHM-CHPG', 'ALS', 'AMLORI SARSAR'),
(84, 84, 8, 'KHM-CHPG', 'HTW', 'HATHUA Jn.'),
(85, 85, 9, 'UNLA-PNYA', 'UNLA', 'UNAULA'),
(86, 86, 9, 'UNLA-PNYA', 'PPC', 'PIPRAICH'),
(87, 87, 9, 'UNLA-PNYA', 'BBW', 'BODARWAR'),
(88, 88, 9, 'UNLA-PNYA', 'CPJ', 'KAPTANGANJ'),
(89, 89, 9, 'UNLA-PNYA', 'GH', 'GHUGHLI'),
(90, 90, 9, 'UNLA-PNYA', 'SBZ', 'SISWABAZAR'),
(91, 91, 9, 'UNLA-PNYA', 'KZA', 'KHADDA'),
(92, 92, 9, 'UNLA-PNYA', 'PNYA', 'PANIYAHWA'),
(93, 93, 10, 'CPJ(EX.)-THE-CI(EX.)', 'LIJ', 'LAXMIGANJ'),
(94, 94, 10, 'CPJ(EX.)-THE-CI(EX.)', 'RKL', 'RAMKOLA'),
(95, 95, 10, 'CPJ(EX.)-THE-CI(EX.)', 'BAGJ', 'BARHARAGANJ'),
(96, 96, 10, 'CPJ(EX.)-THE-CI(EX.)', 'POU', 'PADRAUNA'),
(97, 97, 10, 'CPJ(EX.)-THE-CI(EX.)', 'KKT', 'KATHKUIYAN'),
(98, 98, 10, 'CPJ(EX.)-THE-CI(EX.)', 'DUE', 'DUDAHI'),
(99, 99, 10, 'CPJ(EX.)-THE-CI(EX.)', 'TOI', 'TAMKUHI ROAD'),
(100, 100, 10, 'CPJ(EX.)-THE-CI(EX.)', 'TRJ', 'TARAYA SUJAN'),
(101, 101, 10, 'CPJ(EX.)-THE-CI(EX.)', 'JGP', 'JALALPUR'),
(102, 102, 10, 'CPJ(EX.)-THE-CI(EX.)', 'SSU', 'SASAMUSA'),
(103, 103, 10, 'CPJ(EX.)-THE-CI(EX.)', 'THE', 'THAWE Jn.'),
(104, 104, 10, 'CPJ(EX.)-THE-CI(EX.)', 'GOPG', 'GOPALGANJ'),
(105, 105, 10, 'CPJ(EX.)-THE-CI(EX.)', 'MJV', 'MANJHAGARH'),
(106, 106, 10, 'CPJ(EX.)-THE-CI(EX.)', 'RTU', 'RATANSARAI'),
(107, 107, 10, 'CPJ(EX.)-THE-CI(EX.)', 'SQW', 'SIDHAWALIA'),
(108, 108, 10, 'CPJ(EX.)-THE-CI(EX.)', 'DWDI', 'DIGHWA DUBAULI'),
(109, 109, 10, 'CPJ(EX.)-THE-CI(EX.)', 'RPV', 'RAJAPATTI'),
(110, 110, 10, 'CPJ(EX.)-THE-CI(EX.)', 'MHC', 'MASRAKH'),
(111, 111, 10, 'CPJ(EX.)-THE-CI(EX.)', 'SMKR', 'SHAMKAURIA'),
(112, 112, 10, 'CPJ(EX.)-THE-CI(EX.)', 'MEW', 'MARHAURA'),
(113, 113, 10, 'CPJ(EX.)-THE-CI(EX.)', 'PEE', 'PATERAHI'),
(114, 114, 10, 'CPJ(EX.)-THE-CI(EX.)', 'KYH', 'KHAIRA'),
(115, 115, 15, 'BSB (HRR)', 'BSB (HRR)', 'BSB (HRR)'),
(116, 116, 14, 'SIGNAL CONTROL', 'SIGNAL CONTROL\r\n', 'SIGNAL CONTROL'),
(117, 117, 13, 'GKP', 'GKP', 'GKP'),
(118, 118, 11, 'SV (HRR)', 'SV (HRR)\r\n', 'SV (HRR)\r\n'),
(119, 119, 12, 'CPR (HRR)', 'CPR (HRR)\r\n', 'CPR (HRR)\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'Tcs2018@gmail.com', 'HumTumMpp'),
(3, 'ibn#786$tcs', 'digital#NaAf');

-- --------------------------------------------------------

--
-- Table structure for table `user_id_details`
--

CREATE TABLE `user_id_details` (
  `id` int(15) NOT NULL,
  `product_name` varchar(111) NOT NULL,
  `retailer_id` varchar(111) NOT NULL,
  `reg_id` varchar(111) NOT NULL,
  `reg_email` varchar(111) NOT NULL,
  `reg_phone` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `counter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`counter`) VALUES
(2940),
(2967);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bms_block_register`
--
ALTER TABLE `bms_block_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_modal`
--
ALTER TABLE `component_modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_info_rail`
--
ALTER TABLE `emp_info_rail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep1_form`
--
ALTER TABLE `ep1_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep1_info`
--
ALTER TABLE `ep1_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep2_form`
--
ALTER TABLE `ep2_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep4_form`
--
ALTER TABLE `ep4_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep4_info`
--
ALTER TABLE `ep4_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep5_form`
--
ALTER TABLE `ep5_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ep5_info`
--
ALTER TABLE `ep5_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibn_signup_distributor`
--
ALTER TABLE `ibn_signup_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibn_signup_retailer`
--
ALTER TABLE `ibn_signup_retailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmerme_info_rail`
--
ALTER TABLE `pmerme_info_rail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station_component_info`
--
ALTER TABLE `station_component_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station_tbl`
--
ALTER TABLE `station_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_id_details`
--
ALTER TABLE `user_id_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`counter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bms_block_register`
--
ALTER TABLE `bms_block_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `component_modal`
--
ALTER TABLE `component_modal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_info_rail`
--
ALTER TABLE `emp_info_rail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `ep1_form`
--
ALTER TABLE `ep1_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ep1_info`
--
ALTER TABLE `ep1_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ep2_form`
--
ALTER TABLE `ep2_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ep4_form`
--
ALTER TABLE `ep4_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ep4_info`
--
ALTER TABLE `ep4_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ep5_form`
--
ALTER TABLE `ep5_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ep5_info`
--
ALTER TABLE `ep5_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ibn_signup_distributor`
--
ALTER TABLE `ibn_signup_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ibn_signup_retailer`
--
ALTER TABLE `ibn_signup_retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pmerme_info_rail`
--
ALTER TABLE `pmerme_info_rail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `station_component_info`
--
ALTER TABLE `station_component_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT for table `station_tbl`
--
ALTER TABLE `station_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_id_details`
--
ALTER TABLE `user_id_details`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
