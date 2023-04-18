-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 06:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buspassdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `cityName` varchar(200) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `cityName`, `state_id`) VALUES
(1, 'Nagpur', 1),
(2, 'Firozabad', 2),
(3, 'Mehrauli', 2),
(4, 'Amravati', 1),
(5, 'Pune', 1),
(6, 'New Delhi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `sortname` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phonecode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afgalistan', '98'),
(2, 'IN', 'India', '91'),
(3, 'AL', 'Albania', '355'),
(4, 'DZ', 'Algeria', '213');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `username`, `contact`, `password`, `cpassword`) VALUES
(11, 'yogi@gmail.com', 'yogi123', '4654464646', '$2y$10$GWqelJm3zXKRPkHY0EkZOuyK4ATUK2mQ.pAvqpKG0TqQGnEndpoZW', '$2y$10$e3xn98q2Iyo397/qWU/tJe3oQCw/7OKBVuy6VWMxqhcxWkAlTdLx.'),
(13, 'avinash@gmail.com', 'avinash', '7418695230', '$2y$10$sYtmd3EVctpR.jk..RueWeGk.Ne1aqDjhOhFSCT/4c7lE5wbeUs8i', '$2y$10$Ht4L0/KWa1lxKgei.f/l.uEAR58EbRQPXvDkUv8ZPHsPv6EcMKgIu'),
(26, 'pinkygedam143@gmail.com', 'pinky', '8329550202', '$2y$10$jDAJM6j2.peo0OOTa7wIb.RdA.LnYdVbWjUf9vjcx9hYENHUPY/zS', '$2y$10$jX75nMWNYsui9ez2Y9ljaORTdj/xqDFNH9RYPyG0jTqh7qh8iSRA2'),
(36, 'kriti@gmail.com', 'kriti', '7847878787', '$2y$10$iVCn3wrrfk0EDxmtGanhnuCdl8XgwlW6x.oIiTc0BnIlR5d0UBnMC', '$2y$10$bV4gDnWg4.5Gjptkyx6aUupxMd5LR9j/lPmwXpaQHarVbCvPX.Kq6'),
(37, 'adityakothekar79@gmail.com', 'aditya85', '8530926168', '$2y$10$2KJS7Iad.e.UOAta9fRuF.HhlN9lvT056i5pOCyA9mPkJgoEH6uCq', '$2y$10$A/L2K7qVVs3wOUyiDWwIa.QMHd2lAa7eWYPOPaW/Mbo6NgfMytjoa'),
(38, 'shrutikothekar01@gmail.com', 'shruti', '9623798166', '$2y$10$rBTVXc04rwvTBkbb8wnAJuy5DU6dV5.G5qfdyQibsgMkl0XbvKTBa', '$2y$10$4MU0D297FZAT85XJWfenZOMg4jU/lzIgH96JnOiF1OZPsJRw7lwyy');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `countryid` int(11) DEFAULT NULL,
  `statename` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `countryid`, `statename`) VALUES
(1, 2, 'Maharashtra'),
(2, 2, 'Dilhi'),
(3, 2, 'Andra Pradesh'),
(4, 2, 'Assam');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'ADMIN', 'admin', 1234567891, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-14 01:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(8, 'AC Bus', '2021-07-04 08:57:53'),
(9, 'Non AC Bus', '2021-07-04 08:58:32'),
(10, 'Volvo Bus', '2021-07-04 08:58:47'),
(11, 'Delux Bus', '2021-07-04 08:59:01'),
(14, 'Star Bus', '2023-03-01 08:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `MobileNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `MobileNumber`) VALUES
(4, 'Khushbu Thakur', 'khushbu@gmail.com', 'I want to apply for pass', '2023-03-01 18:09:14', 1, '5568878452'),
(8, 'Shitij Meshram', 'shitij@gmail.com', 'Hello i want t apply for pass please contact me soon', '2023-03-02 11:17:47', 1, '7894561237'),
(9, 'Akash Gupta', 'akash@gmail.com', 'Hello i am akash i want to apply for passplease contact with me', '2023-03-02 11:43:55', 1, '7894556898'),
(12, 'Avinash Mehra', 'avinash@gmail.com', 'hello i  want to make pass online', '2023-03-03 11:41:17', 1, '7418695230'),
(15, 'harsh mohndas', 'harsh@gmail.com', 'hgfj', '2023-03-12 15:41:38', NULL, '899556566'),
(24, 'kriti verma', 'kriti@gmail.com', 'nkj', '2023-03-15 15:03:00', 1, '7878787878'),
(26, 'ridhi verma', 'ridhi@gmail.com', 'jhhjj', '2023-03-22 02:49:52', NULL, '8788785452'),
(27, 'kirti avirma', 'kirti@gmail.com', 'jhhjj', '2023-03-22 02:50:16', NULL, '8788785452'),
(28, 'deepak verma', 'deepak@gmail.com', 'jhhjj', '2023-03-22 02:50:47', NULL, '8409671140'),
(29, 'pragati gedam', 'pragati@gmail.com', 'jhhjj', '2023-03-22 02:51:09', NULL, '8409671140'),
(30, 'ritika lohare', 'ritika@gmail.com', 'dfgf', '2023-03-22 09:36:24', NULL, '7887878787'),
(31, 'ram verma', 'ram@gmail.com', '5', '2023-03-22 09:37:12', NULL, '7877874544'),
(32, 'fgdfgfdg', 'fgfdgfdg@gmail.com', 'dfdf', '2023-03-31 17:19:32', NULL, 'fgfggggggg'),
(33, 'llllll', 'llll@gmail.com', 'llll', '2023-03-31 17:36:09', NULL, 'llll');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<span style=\"color: rgb(10, 13, 19); font-family: &quot;Open Sans&quot;, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Bus pass web system to put it simply, means system can provides pass identification using bar-code, Pass renewal, cancellation, updating, Student discount etc.</span><br style=\"color: rgb(10, 13, 19); font-family: &quot;Open Sans&quot;, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(10, 13, 19); font-family: &quot;Open Sans&quot;, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Using this website we can check all details related Bus pass and instruction like how to renew pass how to update it, and also provide details of student discount. This website keeps all information of all Bus pass.</span><br>', NULL, NULL, '2023-03-01 10:02:39'),
(2, 'contactus', 'Contact Us', 'V M Institute of Engineering and Technology ,\r\nDongargaon, Nagpur, NH-7, Mancherial Chandrapur Nagpur Road, Nagpur, Nagpur, Maharashtra 441108', 'vmit@gmail.com', 997562818, '2023-03-15 03:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblpass`
--

CREATE TABLE `tblpass` (
  `ID` int(10) NOT NULL,
  `PassNumber` varchar(200) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `ProfileImage` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `IdentityType` varchar(200) DEFAULT NULL,
  `IdentityCardno` varchar(200) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Source` varchar(200) DEFAULT NULL,
  `Destination` varchar(200) DEFAULT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `PasscreationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpass`
--

INSERT INTO `tblpass` (`ID`, `PassNumber`, `FullName`, `ProfileImage`, `ContactNumber`, `Email`, `IdentityType`, `IdentityCardno`, `Category`, `Source`, `Destination`, `FromDate`, `ToDate`, `Cost`, `PasscreationDate`, `state`, `city`) VALUES
(1, '286529906', 'Yogesh Kumar', '62bf1edb36141f114521ec4bb41755791678644797.jpg', 4654464646, 'yogi@gmail.com', 'Adhar Card', 'AD-122346', 'Star Bus', 'mg road, nagpur', 'kgf hotel , nagpur', '2020-08-14', '2020-09-14', '1000', '2023-03-14 02:41:06', NULL, NULL),
(2, '915773340', 'Suresh Khanna', '8df7b73a7820f4aef47864f2a6c5fccf1678644946.jpg', 9879878978, 'suresh@gmail.com', 'Any Other Govt Issued Doc', 'KTI-896567', 'Star Bus', 'gg road', '101 office', '2020-04-14', '2020-07-31', '900', '2023-03-12 18:15:46', NULL, NULL),
(3, '884595667', 'Anuj kumar', '32a03ccfe376e30cb0a7f869918353e81677653508.jpg', 1234567890, 'phpgurukulofficial@Gmail.com', 'Voter Card', '5235252', 'Delux Bus', 'MG Road , Nagpur', 'GP College, Nagpur', '2020-05-16', '2020-06-19', '3', '2020-04-15 21:08:27', NULL, NULL),
(4, '210712236', 'Abir Singh', 'ac335d19396a35f1b6ec2f6fcdf8c3921678713975.jpg', 4654646546, 'abir@gmail.com', 'Voter Card', '5646465', 'Star Bus', 'abc', 'dbc', '2021-07-05', '2021-07-16', '900', '2023-03-13 13:26:15', NULL, NULL),
(5, '474965545', 'Augustya sharma', '1167610aa17b0813233fe82d99403e411678714069.jpg', 6546465464, 'aug@gmail.com', 'Student Card', '789456', 'Star Bus', 'Delhi', 'Meerut', '2021-07-05', '2021-07-31', '1800', '2023-03-13 13:27:49', NULL, NULL),
(6, '681924385', 'Anuj kumar', '1167610aa17b0813233fe82d99403e411678714108.jpg', 1234569870, 'ak@test.com', 'Driving License', 'GGGGGGHGH2423423432', 'Star Bus', 'Laxmi Nagar', 'Central Secretariat', '2021-07-15', '2021-07-30', '500', '2023-03-13 13:28:28', NULL, NULL),
(8, '561757766', 'Kiran Vali', 'edab7ba7e203cd7576d1200465194ea81678714149.jpg', 7878878787, 'kiran@gmail.com', 'PAN Card', '78787878', 'Star Bus', 'Goregaov', 'Dogergaov', '2023-03-02', '2023-04-05', '8000', '2023-03-13 13:29:09', NULL, NULL),
(9, '992807040', 'Aliya Mehta', 'edab7ba7e203cd7576d1200465194ea81677602079.jpg', 9623798166, 'aliya@gmail.com', 'Voter Card', '4545445', 'Non AC Bus', 'Tirupati Chowk ', 'Khapri', '2023-02-15', '2023-03-06', '8000', '2023-03-13 13:06:33', NULL, NULL),
(11, '170843502', 'Dikshit Mehra', 'd1543787f98d752cfd3455ed0d212de11677602234.jpg', 8455223655, 'dikshit@gmail.com', 'Any Official Card', '4444545', 'Delux Bus', 'Jarioata Nagpur', 'Nara', '2023-02-06', '2023-04-08', '7800', '2023-02-28 16:37:14', NULL, NULL),
(12, '171380501', 'Aditya Sharma', '71764d1f107bade44abfd7ad9089a0331677602770.jpg', 45545454, 'adi@gmail.com', 'Adhar Card', '55454545', 'Delux Bus', 'Trupti Hotel', 'Khapri Naka', '2023-03-05', '2023-04-08', '4400', '2023-02-28 16:46:10', NULL, NULL),
(35, '409159988', 'John Robinton', 'd1543787f98d752cfd3455ed0d212de11677613613.jpg', 6758788548, 'john@gmail.com', 'PAN Card', '456454564', 'AC Bus', 'ghfhfgh', 'jkkjk', '2023-08-05', '2023-09-06', '35', '2023-02-28 18:11:17', NULL, NULL),
(36, '406359002', 'Kiran Vali', 'f3ccdd27d2000e3f9255a7e3e2c488001677608034.jpg', 7878878787, 'kiran@gmail.com', 'PAN Card', '78787878', '11', 'Goregaov', 'Dogergaov', '2023-03-02', '2023-04-05', '8000', '2023-02-28 18:13:54', NULL, NULL),
(37, '918822702', 'Rishibh Dogre', 'ac335d19396a35f1b6ec2f6fcdf8c3921677657746.jpg', 7822123566, 'rishubh@gmail.com', 'PAN Card', '564545', 'Non AC Bus', 'Yashodhara Nagar', 'Shivaji Chowk ', '2023-05-05', '2023-06-05', '800', '2023-03-01 08:02:26', NULL, NULL),
(38, '861852954', 'Manish Kumar', 'b89c4cc90e26a826ef04a7adfea8c40d1677658010.jpg', 9215425512, 'manish@gmail.com', 'PAN Card', '54545454', 'Volvo Bus', 'GHH', 'HGGHG', '2023-04-06', '2023-06-06', '656', '2023-03-01 08:06:50', NULL, NULL),
(40, '240903625', 'Kiran Bhosle', '95caf6ffc1016c2acc83120e888bc6321677773654.jpg', 84454854545, 'Kran@gmail.com', 'Voter Card', '445588', 'Star Bus', 't point road ', 'Higna', '2023-05-15', '2023-06-15', '40', '2023-03-02 15:57:29', NULL, NULL),
(41, '491105853', 'Anuja thakre', '8df7b73a7820f4aef47864f2a6c5fccf1677773047.jpg', 784545858, 'anuja@gmail.com', 'PAN Card', '78447411', 'Star Bus', 'mg road', 'Butibori', '2023-06-15', '2023-07-15', '8000', '2023-03-02 16:04:07', NULL, NULL),
(42, '561627888', 'Yashika Mane', 'f17bd7feb90130b5ef6241618dd854311677783666.jpg', 7456891234, 'yashika@gmail.com', 'Voter Card', '78455852', 'Star Bus', 'burdi ', 'buttibori', '2023-04-15', '2023-05-15', '7000', '2023-03-02 19:01:06', NULL, NULL),
(43, '325144002', 'pinky gedam', '9b3c76fdfe42ae5f624e92c97158753a1678631813.jpg', 8329550202, 'pinkygedam143@gmail.com', 'PAN Card', 'PN-74854578', 'Star Bus', 'Trimurti Nagar', 'Dogergaov', '2023-06-07', '2023-07-08', '500', '2023-03-12 10:10:25', NULL, NULL),
(53, '752918816', 'amisha rauut', '3e250dcd726ff5ed5436aae64191875c1679456945.jpg', 9623798166, 'amisha@gmail.com', 'PAN Card', '5455445', 'Star Bus', 'Nagpur', '5545', '2023-03-10', '2023-04-22', '8000', '2023-03-22 03:49:05', NULL, NULL),
(54, '911402235', 'Shruti Kothekar', '34db07c1a2403a3567f2d77229936e031679457199.jpg', 9623798166, 'shrutikothekar01@gmail.com', 'PAN Card', 'PN-123456789', 'Star Bus', 'Nagpur', 'Mohgaov, Butibori', '2023-05-22', '2023-06-22', '500', '2023-03-22 03:56:13', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpass`
--
ALTER TABLE `tblpass`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpass`
--
ALTER TABLE `tblpass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
