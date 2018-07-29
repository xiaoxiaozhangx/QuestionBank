-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 01:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) NOT NULL,
  `chapterNo` varchar(100) NOT NULL,
  `chapterName` text NOT NULL,
  `subject_fk` int(11) NOT NULL,
  `department_fk` int(10) NOT NULL,
  `class_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapters`
--


-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) NOT NULL,
  `className` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `className`) VALUES
(1, 'Class 1'),
(2, 'Class 2'),
(3, 'Class 3'),
(4, 'Class 4'),
(5, 'Class 5'),
(6, 'Class 6'),
(7, 'Class 7'),
(8, 'Class 8'),
(9, 'Class 9'),
(10, 'Class 10'),
(11, 'S.S.C'),
(12, 'H.S.C');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(100) NOT NULL,
  `department_fk` int(10) NOT NULL,
  `class_fk` int(10) NOT NULL,
  `sub_fk` int(10) NOT NULL,
  `chapter_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--


-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(5) NOT NULL,
  `departmentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departmentName`) VALUES
(1, 'Genarel'),
(2, 'Science'),
(3, 'Earths'),
(4, 'Comarce');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(100) NOT NULL,
  `multipleChoise` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--


-- --------------------------------------------------------

--
-- Table structure for table `questionssets`
--

CREATE TABLE `questionssets` (
  `id` int(10) NOT NULL,
  `questiontable_fk` int(10) NOT NULL,
  `option1` int(10) NOT NULL,
  `option2` int(10) NOT NULL,
  `option3` int(10) NOT NULL,
  `option4` int(10) NOT NULL,
  `courses_fk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionssets`
--

INSERT INTO `questionssets` (`id`, `questiontable_fk`, `option1`, `option2`, `option3`, `option4`, `courses_fk`) VALUES
(1, 1, 1, 2, 3, 4, '2-9-10-3'),
(2, 2, 5, 6, 7, 8, '1-1-1-1'),
(3, 3, 9, 10, 11, 12, '1-1-1-1'),
(4, 4, 13, 14, 15, 16, '1-1-1-1'),
(5, 5, 17, 18, 19, 20, '1-1-1-1'),
(6, 6, 21, 22, 23, 24, '1-1-1-1');

-- --------------------------------------------------------

--
-- Table structure for table `questionstable`
--

CREATE TABLE `questionstable` (
  `id` int(10) NOT NULL,
  `question` text NOT NULL,
  `ans_fk` int(10) NOT NULL,
  `questionSet_fk` int(10) NOT NULL,
  `courses_fk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionstable`
--


-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `Sub` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `Sub`) VALUES
(1, 'Bangla First Paper'),
(2, 'Bangla Second Paper'),
(3, 'English First Paper'),
(4, 'English Second Paper'),
(5, 'Religion-Islam'),
(6, 'Religion-Hindu'),
(7, 'Religion-Buddhis'),
(8, 'Religion-christian'),
(9, 'Information and communications technology'),
(10, 'physics First Paper'),
(11, 'physics Second Paper'),
(12, 'Bangladesh History and World Literature'),
(13, 'Finance and Banking'),
(14, 'Chemistry First Paper'),
(15, 'Chemistry Second Paper'),
(16, 'Civics and Citizenship (??????? ??? ??????????)'),
(17, 'Initiative in business (আমার পরিচয়)'),
(18, 'Bangladesh and World Identity (???????? ? ????? ?????)'),
(19, 'Botany'),
(20, 'Zoology'),
(21, 'economic'),
(22, 'Accounting'),
(23, 'Genarel Science'),
(24, 'Geography and Environment (????? ? ??????)'),
(25, 'Higher Math');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_fk` (`subject_fk`),
  ADD KEY `department_fk` (`department_fk`),
  ADD KEY `class_fk` (`class_fk`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_fk` (`department_fk`),
  ADD KEY `class_fk` (`class_fk`),
  ADD KEY `sub_fk` (`sub_fk`),
  ADD KEY `chaper_fk` (`chapter_fk`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionssets`
--
ALTER TABLE `questionssets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questiontable_fk` (`questiontable_fk`),
  ADD KEY `option1` (`option1`),
  ADD KEY `option2` (`option2`),
  ADD KEY `option3` (`option3`),
  ADD KEY `option4` (`option4`),
  ADD KEY `chapter_fk` (`courses_fk`);

--
-- Indexes for table `questionstable`
--
ALTER TABLE `questionstable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ans_fk` (`ans_fk`),
  ADD KEY `questionSet_fk` (`questionSet_fk`),
  ADD KEY `chapter_fk` (`courses_fk`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `questionssets`
--
ALTER TABLE `questionssets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `questionstable`
--
ALTER TABLE `questionstable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
