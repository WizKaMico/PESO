-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 03:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `title_announcement` text NOT NULL,
  `description` text NOT NULL,
  `date_posted` varchar(255) NOT NULL,
  `time_posted` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_archive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `uid`, `title_announcement`, `description`, `date_posted`, `time_posted`, `post_status`, `post_archive`) VALUES
(2, 0, 'Lorem Ipusm', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo aliquam tempora ab quasi est nisi pariatur adipisci? Facilis, velit. Minima, dolor illo repellendus impedit id laboriosam optio reiciendis dicta accusantium.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo aliquam tempora ab quasi est nisi pariatur adipisci? Facilis, velit. Minima, dolor illo repellendus impedit id laboriosam optio reiciendis dicta accusantium.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo aliquam tempora ab quasi est nisi pariatur adipisci? Facilis, velit. Minima, dolor illo repellendus impedit id laboriosam optio reiciendis dicta accusantium.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo aliquam tempora ab quasi est nisi pariatur adipisci? Facilis, velit. Minima, dolor illo repellendus impedit id laboriosam optio reiciendis dicta accusantium.</p>', ' 2022/01/10 ', ' 11:04:26 pm ', 'Posted', 'DeArchived');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_education_profile`
--

CREATE TABLE `applicant_education_profile` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `current_school_status` varchar(10) NOT NULL,
  `current_education_status` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `course_year` varchar(255) NOT NULL,
  `awards` varchar(255) NOT NULL,
  `awards_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_education_profile`
--

INSERT INTO `applicant_education_profile` (`id`, `aid`, `current_school_status`, `current_education_status`, `school_year`, `school_name`, `course`, `course_year`, `awards`, `awards_year`) VALUES
(2, 5, 'No', 'High School Level', '2010', 'UST', 'BSBA', '2015', '', '0'),
(3, 43, '', '', '', '', '', '', '', ''),
(4, 44, '', '', '', '', '', '', '', ''),
(5, 45, '', '', '', '', '', '', '', ''),
(6, 46, 'No', 'College Graduate', '452', 'qwewq', 'qewq', '454', 'qwqe', 'qweqe'),
(7, 47, '', '', '', '', '', '', '', ''),
(8, 48, '', '', '', '', '', '', '', ''),
(9, 49, 'No', 'College Graduate', '1234', 'qweqw', 'qweq', '1234', 'qweq', '1234'),
(10, 50, '', '', '', '', '', '', '', ''),
(11, 51, 'No', 'College Graduate', '1234', 'aada', 'qweqwe', '2345', 'asdq', '3456');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_employment_profile`
--

CREATE TABLE `applicant_employment_profile` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `employment_status` varchar(10) NOT NULL,
  `employment_type` varchar(100) NOT NULL,
  `employment_location` varchar(255) NOT NULL,
  `find_work_status` varchar(10) NOT NULL,
  `find_work_comment` varchar(255) NOT NULL,
  `prompt_work_status` varchar(10) NOT NULL,
  `prompt_work_comment` varchar(255) NOT NULL,
  `beneficiary_status` varchar(10) NOT NULL,
  `beneficiary_id` varchar(100) NOT NULL,
  `work_location_status` varchar(255) NOT NULL,
  `work_location_overseas` text NOT NULL,
  `work_location_local` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_employment_profile`
--

INSERT INTO `applicant_employment_profile` (`id`, `aid`, `employment_status`, `employment_type`, `employment_location`, `find_work_status`, `find_work_comment`, `prompt_work_status`, `prompt_work_comment`, `beneficiary_status`, `beneficiary_id`, `work_location_status`, `work_location_overseas`, `work_location_local`) VALUES
(2, 5, 'Unemployed', 'Fresh Graduate', '', 'No', '', 'Yes', '', 'No', '', 'Local', '', ''),
(3, 43, '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 44, '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 45, '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 46, 'Employed', '', '', 'Yes', '', '', '', 'No', '', 'Local', '', ''),
(7, 47, '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 48, '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 49, 'Employed', '', '', 'No', '', 'Yes', '', 'No', '', 'Overseas', '', ''),
(10, 50, '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 51, 'Employed', '', '', 'Yes', '', '', '', 'No', '', 'Local', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_file`
--

CREATE TABLE `applicant_file` (
  `id` int(11) NOT NULL,
  `aid` varchar(100) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_location` text NOT NULL,
  `file_date` text NOT NULL,
  `file_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_preference_profile`
--

CREATE TABLE `applicant_preference_profile` (
  `id` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `occupation_type` varchar(255) NOT NULL,
  `industry_type` varchar(255) NOT NULL,
  `salary_expecation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_preference_profile`
--

INSERT INTO `applicant_preference_profile` (`id`, `aid`, `occupation_type`, `industry_type`, `salary_expecation`) VALUES
(2, 5, 'Admin Assistant', 'Admininstration', ''),
(3, 43, '', '', ''),
(4, 44, '', '', ''),
(5, 45, '', '', ''),
(6, 46, '', 'qwwq', ''),
(7, 47, '', '', ''),
(8, 48, '', '', ''),
(9, 49, 'eqwe', 'qwe', ''),
(10, 50, '', '', ''),
(11, 51, 'wqewq', 'qwewq', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile`
--

CREATE TABLE `applicant_profile` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthmonth` varchar(10) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `birthyear` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `primary_contact_number` varchar(11) NOT NULL,
  `secondary_contact_number` varchar(11) NOT NULL,
  `landline` varchar(11) NOT NULL,
  `build_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_profile`
--

INSERT INTO `applicant_profile` (`id`, `uid`, `lname`, `fname`, `mname`, `suffix`, `gender`, `birthmonth`, `birthdate`, `birthyear`, `religion`, `civil_status`, `email`, `primary_contact_number`, `secondary_contact_number`, `landline`, `build_no`, `street_name`, `city`, `province`, `zip_code`) VALUES
(2, 5, 'user1', 'user1', 'u', '', '', '', '', '', 'Catholic', '', 'user1@email.com', '09123456789', '09987654321', '0', '10', 'Rizal', 'Dagupan', 'Pangasinan', '2432'),
(3, 42, '', '', '', '', '', '', '', '', '', '', 'sad@asd.com', '', '', '', '', '', '', '', ''),
(4, 43, '', '', '', '', '', '', '', '', '', '', 'wew@wew.com', '', '', '', '', '', '', '', ''),
(5, 44, '', '', '', '', '', '', '', '', '', '', 'wew1@wew.com', '', '', '', '', '', '', '', ''),
(6, 45, '', '', '', '', '', '', '', '', '', '', 'wew2@wew.com', '', '', '', '', '', '', '', ''),
(7, 46, 'adsa', 'asdsda', 'as', '', 'Male', '1', '', '2019', 'aa', 'Single', 'user3@email.com', '09123456789', '09987654321', '', '123`', 'qweq', 'qweq', 'qweqw', '123'),
(8, 47, '', '', '', '', '', '', '', '', '', '', 'userr3@email.com', '', '', '', '', '', '', '', ''),
(9, 48, '', '', '', '', '', '', '', '', '', '', 'u4@email.com', '', '', '', '', '', '', '', ''),
(10, 49, 'u4', 'u4', 'u', '', 'Male', '4', '', '2017', 'qweqw', 'Single', 'u5@email.com', '09123456789', '09987654321', '', '1234', 'qewwq', 'qwwq', 'qweq', 'qwe'),
(11, 50, '', '', '', '', '', '', '', '', '', '', 'u6@email.com', '', '', '', '', '', '', '', ''),
(12, 51, 'u7', 'u7', 'u', '', 'Female', '5', '', '2014', 'qeqw', 'Single', 'u7@email.com', '09123456789', '09987654321', '', '1234', 'qewwq', 'qwwq', 'qweq', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_vacancy_file`
--

CREATE TABLE `applicant_vacancy_file` (
  `id` int(11) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `aid` varchar(255) NOT NULL,
  `jid` varchar(255) NOT NULL,
  `fid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `career_categories`
--

CREATE TABLE `career_categories` (
  `id` int(11) NOT NULL,
  `career_categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_categories`
--

INSERT INTO `career_categories` (`id`, `career_categories`) VALUES
(1, 'Accounting/Finance'),
(2, 'Admin/Human Resources'),
(3, 'Arts/Media/Communications'),
(4, 'Building/Construction'),
(5, 'Computer/Information Technology'),
(6, 'Education/Training'),
(7, 'Engineering/Science/Manufacturing'),
(8, 'Healthcare'),
(9, 'Hotel/Restaurant'),
(10, 'Services'),
(11, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `career_type`
--

CREATE TABLE `career_type` (
  `id` int(11) NOT NULL,
  `career_categories` varchar(255) NOT NULL,
  `career_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employer_announcement`
--

CREATE TABLE `employer_announcement` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_description` text NOT NULL,
  `announcement_date_posted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_announcement`
--

INSERT INTO `employer_announcement` (`id`, `eid`, `announcement_title`, `announcement_description`, `announcement_date_posted`) VALUES
(2, 4, 'sdadas', '', ' 2022/01/14 '),
(3, 4, 'qwewqe', '<p>qweqwe</p>', ' 2022/01/15 '),
(4, 53, 'announcement12', '<p>announcement</p>', ' 2022/01/19 ');

-- --------------------------------------------------------

--
-- Table structure for table `employer_company_profile`
--

CREATE TABLE `employer_company_profile` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_description` text NOT NULL,
  `industry_type` varchar(100) NOT NULL,
  `building_no` varchar(100) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `barangay_name` varchar(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `province_name` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_company_profile`
--

INSERT INTO `employer_company_profile` (`id`, `eid`, `company_name`, `company_description`, `industry_type`, `building_no`, `street_name`, `barangay_name`, `city_name`, `province_name`, `zip_code`) VALUES
(2, 4, 'ktech10', '', '', '', '', '', '', '', ''),
(3, 52, '', '', '', '', '', '', '', '', ''),
(4, 53, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employer_profile`
--

CREATE TABLE `employer_profile` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `primary_number` varchar(11) NOT NULL,
  `secondary_number` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_profile`
--

INSERT INTO `employer_profile` (`id`, `uid`, `lname`, `fname`, `mname`, `suffix`, `position`, `primary_number`, `secondary_number`, `email`) VALUES
(3, 4, '', '', '', '', '', '', '', 'ktech@ktech.com'),
(4, 52, '', '', '', '', '', '', '', 'company2@email.com'),
(5, 53, '', '', '', '', '', '', '', 'c3@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `employer_vacancy_applicant`
--

CREATE TABLE `employer_vacancy_applicant` (
  `id` int(11) NOT NULL,
  `eid` varchar(100) NOT NULL,
  `aid` varchar(100) NOT NULL,
  `jid` varchar(100) NOT NULL,
  `apply_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employer_vacancy_profile`
--

CREATE TABLE `employer_vacancy_profile` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_qualifications` text NOT NULL,
  `job_summary` text NOT NULL,
  `job_requirements` text NOT NULL,
  `job_posted` varchar(50) NOT NULL,
  `job_categories` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_salary` varchar(255) NOT NULL,
  `job_status` varchar(50) NOT NULL,
  `job_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_vacancy_profile`
--

INSERT INTO `employer_vacancy_profile` (`id`, `eid`, `job_title`, `job_qualifications`, `job_summary`, `job_requirements`, `job_posted`, `job_categories`, `job_type`, `job_salary`, `job_status`, `job_location`) VALUES
(11, 4, 'HR', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', '<p>Summary</p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', ' 10:34:16 pm at 2021/12/31 ', 'Admin/Human Resources', ' Full-TIme', ' 15000', 'Hired', ' Manila'),
(12, 4, 'Clerk', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', '<p>Summary</p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', ' 09:16:54 pm at 2022/01/01 ', 'Administration', 'Full-TIme', '12000.00', 'Hiring', 'Manila'),
(13, 4, 'HR Assistant', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', '<p>Summary</p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', ' 09:18:23 pm at 2022/01/01 ', 'Administration', 'Full-TIme', '12500.00', 'Hiring', 'Manila'),
(14, 4, 'Clerk II', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', '<p>Summary</p>\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', '<ul>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</li>\r\n</ul>', ' 09:20:36 pm at 2022/01/01 ', 'Administration', 'Full-TIme', '12000.00', 'Hiring', 'Manila'),
(15, 4, 'Animator I', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aperiam accusamus illum hic autem, laudantium blanditiis exercitationem? Laboriosam ipsum quidem quia, provident repudiandae aperiam quam veritatis exercitationem consequatur suscipit ipsa.</p>', ' 09:26:02 pm at 2022/01/01 ', 'Designer', 'Full-TIme', '18000.00', 'Hiring', 'Manila'),
(16, 4, 'Accounting I', '<p>qualifications</p>', '<p>summary</p>', '<p>requirements</p>', ' 12:24:50 am at 2022/01/03 ', 'Accounting/Finance', 'Full-Time', '20000', 'Hiring', 'Manila'),
(17, 4, 'Assistant I', '<p>Lorem Ipsum</p>', '<p>Lorem Ipsum</p>', '<p>Lorem Ipsum</p>', ' 2022/01/13 ', 'Admin/Human Resources', 'Full-Time', '12000', 'Hiring', 'Manila'),
(19, 4, 'Encoder', '<p>qwewq</p>', '<p>qweq</p>', '<p>qwewqe</p>', ' 2022/01/15 ', 'Accounting/Finance', 'Permanent', '15000', 'Hiring', 'Manila'),
(20, 4, 'Clerk II', '<p>lorem ipsum</p>', '<p>Lorem ipsum</p>', '<p>lorem ipsum</p>', ' 2022/01/17 ', 'Accounting/Finance', 'Full-Time', '15000', 'Hiring', 'Manila'),
(21, 4, 'Clerk II', '<p>Lorem Ipsum</p>', '<p>Lorem ipsum</p>', '<p>Lorem Ipsum</p>', ' 2022/01/17 ', 'Accounting/Finance', 'Full-Time', '15000', 'Hiring', 'Manila'),
(22, 4, 'Clerk II', '<p>Lorem Ipsum</p>', '<p>Lorem Ipsum</p>', '<p>Lorem Ipsum</p>', ' 2022/01/17 ', 'Admin/Human Resources', 'Full-Time', '15000', 'Hiring', 'Cavite');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `job_type`) VALUES
(1, 'Full-Time'),
(2, 'Part-Time'),
(3, 'Contractual'),
(4, 'Partial'),
(5, 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `salary_grade`
--

CREATE TABLE `salary_grade` (
  `id` int(11) NOT NULL,
  `salary_grade` int(11) NOT NULL,
  `salary_range` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_grade`
--

INSERT INTO `salary_grade` (`id`, `salary_grade`, `salary_range`) VALUES
(1, 1, '0'),
(2, 2, '10,000'),
(3, 3, '20,000'),
(4, 4, '30,000'),
(5, 5, '40,000'),
(6, 6, '50,000'),
(7, 7, '60,000'),
(8, 8, '70,000'),
(9, 9, '80,000'),
(10, 10, '90,000'),
(11, 11, '100,000'),
(12, 12, '100,000+');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_activation` varchar(50) NOT NULL,
  `user_archived` varchar(50) NOT NULL,
  `date_registered` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_status`, `user_activation`, `user_archived`, `date_registered`) VALUES
(1, 'admin', 'admin', 'Admin', 'Activated', 'DeArchived', ''),
(4, 'ktech10', 'ktech10', 'Employer', 'Activated', 'DeArchived', ' 10:48:49 pm at 2021/12/27 '),
(5, 'user1', 'user1', 'Applicant', 'Activated', 'DeArchived', ' 07:25:47 pm at 2022/01/03 '),
(42, 'sad', 'sad', 'Applicant', 'Activated', 'DeArchived', ' 01:06:48 am at 2022/01/14 '),
(43, 'wew', 'wew', 'Applicant', 'Activated', 'DeArchived', ' 01:10:44 am at 2022/01/14 '),
(44, 'wew1', 'wew1', 'Applicant', 'Activated', 'DeArchived', ' 01:11:39 am at 2022/01/14 '),
(45, 'wew2', 'wew2', 'Applicant', 'Activated', 'DeArchived', ' 01:12:15 am at 2022/01/14 '),
(46, 'user3', 'user3', 'Applicant', 'Activated', 'DeArchived', ' 09:57:56 pm at 2022/01/14 '),
(47, 'u3', 'user3', 'Applicant', 'Activated', 'DeArchived', ' 06:13:06 pm at 2022/01/16 '),
(48, 'u4', 'u4', 'Applicant', 'Activated', 'DeArchived', ' 06:25:06 pm at 2022/01/16 '),
(49, 'u5', 'u5', 'Applicant', 'Activated', 'DeArchived', ' 06:34:24 pm at 2022/01/16 '),
(50, 'user6', 'user6', 'Applicant', 'Activated', 'DeArchived', ' 09:22:31 pm at 2022/01/16 '),
(51, 'user7', 'user7', 'Applicant', 'Activated', 'DeArchived', ' 09:25:46 pm at 2022/01/16 '),
(52, 'cm2', 'cm2', 'Employer', 'Activated', 'DeArchived', ' 10:44:10 pm at 2022/01/19 '),
(53, 'c3', 'c3', 'Employer', 'Activated', 'DeArchived', ' 10:52:53 pm at 2022/01/19 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_education_profile`
--
ALTER TABLE `applicant_education_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_employment_profile`
--
ALTER TABLE `applicant_employment_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_file`
--
ALTER TABLE `applicant_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_preference_profile`
--
ALTER TABLE `applicant_preference_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_vacancy_file`
--
ALTER TABLE `applicant_vacancy_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_categories`
--
ALTER TABLE `career_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_type`
--
ALTER TABLE `career_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_announcement`
--
ALTER TABLE `employer_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_company_profile`
--
ALTER TABLE `employer_company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_profile`
--
ALTER TABLE `employer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_vacancy_applicant`
--
ALTER TABLE `employer_vacancy_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_vacancy_profile`
--
ALTER TABLE `employer_vacancy_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_grade`
--
ALTER TABLE `salary_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_education_profile`
--
ALTER TABLE `applicant_education_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `applicant_employment_profile`
--
ALTER TABLE `applicant_employment_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `applicant_file`
--
ALTER TABLE `applicant_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_preference_profile`
--
ALTER TABLE `applicant_preference_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `applicant_vacancy_file`
--
ALTER TABLE `applicant_vacancy_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_categories`
--
ALTER TABLE `career_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `career_type`
--
ALTER TABLE `career_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_announcement`
--
ALTER TABLE `employer_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employer_company_profile`
--
ALTER TABLE `employer_company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employer_profile`
--
ALTER TABLE `employer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employer_vacancy_applicant`
--
ALTER TABLE `employer_vacancy_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_vacancy_profile`
--
ALTER TABLE `employer_vacancy_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary_grade`
--
ALTER TABLE `salary_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
