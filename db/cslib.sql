-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 01:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cslib`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_ID` int(11) NOT NULL,
  `book_title` tinytext NOT NULL,
  `book_author` tinytext NOT NULL,
  `cat_ID` int(11) NOT NULL,
  `book_img` tinytext,
  `book_pages` int(11) DEFAULT NULL,
  `book_status` tinytext,
  `p_id` int(11) NOT NULL,
  `ISBN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `book_title`, `book_author`, `cat_ID`, `book_img`, `book_pages`, `book_status`, `p_id`, `ISBN`) VALUES
(1, 'Bara Afsanay', 'Ibnay Muneeb', 2, 'img/media/12afsanay.jpg', 95, 'Available', 0, '978-3-16-148410-0'),
(2, 'Base Camp', 'Tariq Ismail Sagar', 4, 'img/media/base-camp.jpg', 223, 'Available', 0, '978-3-16-148410-0'),
(3, 'Iblees', 'Nimra Ahmad', 2, 'img/media/iblees.jpg', 5, 'Available', 0, '978-3-16-148410-0'),
(4, 'Red Eye', 'Ahmed Shaheer', 2, 'img/media/red-eye.jpg', 355, 'Available', 0, '978-3-16-148410-0'),
(5, 'Caravan', 'MA Rahat', 4, 'img/media/default.jpg', 452, 'Available', 0, '978-3-16-148410-0'),
(6, 'Sitamgar', 'Muhammad Farooq Anjum', 2, 'img/media/default.jpg', 547, 'Issued To Ali Ahmad', 0, '978-3-16-148410-0'),
(7, 'Namal', 'Nimra Ahmad', 5, 'img/media/namal.jpg', 624, 'Available', 0, '978-3-16-148410-0'),
(8, 'Lalkar', 'Tahir Javed Mughal', 4, 'img/media/lalkar.jpg', 245, 'Available', 0, '978-3-16-148410-0'),
(9, 'Total Zero', 'Mazhar Kaleem MA', 4, 'img/media/total-zero.jpg', 421, 'Available', 0, '978-3-16-148410-0'),
(10, 'Idrak', 'Aliya Tauseef', 2, 'img/media/idrak.jpg', 75, 'Issued To Asad Rehman', 0, '978-3-16-148410-0'),
(11, 'Dasht e Aarzoo', 'Iqra Sagheer Ahmed', 5, 'img/media/dasht-e-arzo.jpg', 412, 'Available', 0, '978-3-16-148410-0'),
(12, 'Black Day', 'Mazhar Kaleem MA', 5, 'img/media/black-day.jpg', 435, 'Available', 0, '978-3-16-148410-0'),
(13, 'Mata e Dil', 'Nabila Abar Raja', 5, 'img/media/mata-e-dil.jpg', 140, 'Available', 0, '978-3-16-148410-0'),
(14, 'Danger Plan', 'Khalid Noor', 4, 'img/media/default.jpg', 73, 'Available', 0, '978-3-16-148410-0'),
(15, 'Fast Agent', 'Khalid Noor', 4, 'img/media/default.jpg', 203, 'Available', 0, '978-3-16-148410-0'),
(16, 'Piyas', 'Aliya Tauseef', 5, 'img/media/piyas.jpg', 245, 'Available', 0, '978-3-16-148410-0'),
(17, 'Silah', 'Aimen Ali', 5, 'img/media/silah.jpg', 91, 'Available', 0, '978-3-16-148410-0'),
(18, 'Action Agency', 'Mazhar Kaleem M.A', 4, 'img/media/action-agency.jpg', 103, 'Available', 0, '978-3-16-148410-0'),
(19, 'Adam Zad', 'Aitbar Sajid', 2, 'img/media/adam-zad.jpg', 275, 'Available', 0, '978-3-16-148410-0'),
(20, 'Aatish Parast', 'Wajiha Sehar', 2, 'img/media/default.jpg', 104, 'Available', 0, '978-3-16-148410-0'),
(21, 'Target Kahuta', 'Tariq Ismail Sagar', 5, 'img/media/Target-Kahuta.jpg', 245, 'Available', 0, '978-3-16-148410-0'),
(22, 'Safaid Gulab', 'Mehmood Zafar Iqbal Hashmi', 5, 'img/media/safaid-gulab.jpg', 305, 'Available', 0, '978-3-16-148410-0'),
(23, 'Aakas Bail', 'Shireen Haider', 5, 'img/media/akas-bail.jpg', 354, 'Available', 0, '978-3-16-148410-0'),
(24, 'Sehar Ek Istara Hay', 'Umaira Ahmad', 5, 'img/media/sehar-aik-Istara-hai.jpg', 289, 'Available', 0, '978-3-16-148410-0'),
(25, 'Hasil', 'Umaira Ahmed', 5, 'img/media/hasil.jpg', 316, 'Available', 0, '978-3-16-148410-0'),
(26, 'Zindagi Gulzar Hey', 'Umaira Ahmed', 5, 'img/media/zindagi-gulzar-hai.jpg', 213, 'Available', 0, '978-3-16-148410-0'),
(27, 'Bazigar', 'Muhammad Azam Khan', 5, 'img/media/bazigar.jpg', 245, 'Available', 0, '978-3-16-148410-0'),
(28, 'Deewana Iblees', 'Sarfraz Ahmad Rahi', 5, 'img/media/Deewana-Iblees.jpg', 217, 'Available', 0, '978-3-16-148410-0'),
(29, 'Aatish Parast', 'Aslam Rahi', 5, 'img/media/default.jpg', 145, 'Available', 0, '978-3-16-148410-0'),
(30, 'Humsafar', 'Farhat Ishtiaq', 5, 'img/media/humsafar.jpg', 302, 'Available', 0, '978-3-16-148410-0'),
(31, 'Doosri Fasal', 'Aleem ul Haq Haqqi', 5, 'img/media/Doosri-Fasal.jpg', 352, 'Available', 0, '978-3-16-148410-0'),
(32, 'Mere Khaab Reza Reza', 'Maha Malik', 2, 'img/media/mere-khab-reza-reza.jpg', 111, 'Available', 0, '978-3-16-148410-0'),
(33, 'Zulmat Kada', 'Dr. Sabir Ali Hashmi ', 2, 'img/media/default.jpg', 106, 'Available', 0, '978-3-16-148410-0'),
(34, 'Nadan Lahori', 'Ibnay Muneeb', 6, 'img/media/nadan-lahori.jpg', 95, 'Available', 0, '978-3-16-148410-0'),
(35, 'Deewan e Ghalib', 'Mirza Ghalib', 6, 'img/media/deewan-e-ghalib.jpg', 815, 'Available', 0, '978-3-16-148410-0'),
(36, 'Kuliyat e Iqbal', 'Allama Iqbal', 6, 'img/media/kuliyat-e-iqbal.jpg', 995, 'Available', 0, '978-3-16-148410-0'),
(37, 'Diwali', 'M.A Rahat', 3, 'img/media/diwali.jpg', 114, 'Available', 0, '978-3-16-148410-0'),
(38, 'Champa Kali', 'A Hameed', 3, 'img/media/default.jpg', 45, 'Available', 0, '978-3-16-148410-0'),
(39, 'Call Bell', 'Seema Ghazal', 3, 'img/media/call-bell.jpg', 372, 'Available', 0, '978-3-16-148410-0'),
(40, 'Muhammad Bin Qasim', 'Naseem Hijazi', 1, 'img/media/muhammad-bin-qasim.jpg', 405, 'Available', 0, '978-3-16-148410-0'),
(41, 'Kaleesa Aur Aag', 'Naseem Hijazi', 1, 'img/media/kalesa-or-aag.jpg', 445, 'Available', 0, '978-3-16-148410-0'),
(42, 'Daastan e Mujahid', 'Naseem Hijazi', 1, 'img/media/dastan-e-mujahid.jpg', 328, 'Available', 0, '978-3-16-148410-0'),
(43, 'Akhri Maarka', 'Naseem Hijazi', 1, 'img/media/akhri-marka.jpg', 493, 'Available', 0, '978-3-16-148410-0'),
(44, 'Yousaf Bin Tashfeen', 'Naseem Hijazi', 1, 'img/media/yousaf-bin-tashfin.jpg', 575, 'Issued To Ali Ahmad', 0, '978-3-16-148410-0'),
(45, 'Qaiser o Kisra', 'Naseem Hijazi', 1, 'img/media/qaisar-o-kisra.jpg', 457, 'Available', 0, '978-3-16-148410-0'),
(46, 'Safaid Jazeera', 'Naseem Hijazi', 1, 'img/media/safaid-jazeera.jpg', 478, 'Issued To Ali Ahmad', 0, '978-3-16-148410-0'),
(47, 'Bichoo', 'M.A Rahat', 3, 'img/media/default.jpg', 278, 'Available', 0, '978-3-16-148410-0'),
(48, 'Harry Potter and the Chamber of Secrets', 'J.K Rowling', 3, 'img/media/harry-potter-and-the-chamber-of-Secrets.jpg', 725, 'Available', 0, '978-3-16-148410-0'),
(49, 'Akhri Chattan', 'Naseem Hijazi', 1, 'img/media/akhri-chattan.jpg', 585, 'Available', 0, '978-3-16-148410-0'),
(50, 'Muqaddas Lamhay', 'Ibnay Muneeb', 6, 'img/media/muqaddas-lamhay.jpg', 154, 'Available', 0, '978-3-16-148410-0');

-- --------------------------------------------------------

--
-- Table structure for table `books_issued`
--

CREATE TABLE `books_issued` (
  `std_id` int(11) DEFAULT NULL,
  `book_ID` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_issued`
--

INSERT INTO `books_issued` (`std_id`, `book_ID`, `issue_date`, `due_date`) VALUES
(2, 6, '2016-12-19', '2016-12-26'),
(2, 44, '2016-12-20', '2016-12-27'),
(1, 10, '2016-12-22', '2016-12-29'),
(2, 46, '2016-12-20', '2016-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Historical Fiction'),
(2, 'Litrature'),
(3, 'Mystries'),
(4, 'Thrillers'),
(5, 'Social Romantic'),
(6, 'Poetry');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `p_id` int(11) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `dealer` tinytext,
  `date` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` int(11) NOT NULL,
  `std_name` text NOT NULL,
  `std_enr_no` text NOT NULL,
  `std_sem` int(1) NOT NULL,
  `std_photo` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_name`, `std_enr_no`, `std_sem`, `std_photo`) VALUES
(1, 'Asad Rehman', '1358/BS/CS/M/13', 3, 'img/student/default.jpg'),
(2, 'Ali Ahmad', '3764/BS/CS/M/21', 3, 'img/student/default.jpg'),
(3, 'Ahmad Khan', '3476/BS/CS/M/76', 2, 'img/student/default.jpg'),
(4, 'Sajjad Ali', '3476/BS/CS/M/45', 2, 'img/student/default.jpg'),
(5, 'Waqar Ahmad', '3475/BS/CS/E/23', 3, 'img/student/default.jpg'),
(6, 'Asad Ali', '3764/BS/CS/M/28', 4, 'img/student/default.jpg'),
(7, 'Zabid Iqbal', '3476/BS/CS/M/34', 7, 'img/student/default.jpg'),
(11, 'Habib Khan', '3764/BS/CS/M/25', 2, 'img/student/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(20) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `email_id` tinytext NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `f_name`, `l_name`, `email_id`, `user_password`) VALUES
('Admin', '', '', 'shehzad3880@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_ID`),
  ADD KEY `cat_ID` (`cat_ID`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `books_issued`
--
ALTER TABLE `books_issued`
  ADD KEY `std_id` (`std_id`),
  ADD KEY `book_ID` (`book_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `books_issued`
--
ALTER TABLE `books_issued`
  ADD CONSTRAINT `books_issued_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`),
  ADD CONSTRAINT `books_issued_ibfk_2` FOREIGN KEY (`book_ID`) REFERENCES `books` (`book_ID`);

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `books` (`p_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
