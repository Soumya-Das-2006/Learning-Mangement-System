-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2025 at 07:33 PM
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
-- Database: `parul_university_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'admin', '2025-09-11 13:52:18', 'Add User soumyadas_topper'),
(2, 'teacher.00', '2025-09-29 19:37:36', 'Add Subject 3224'),
(3, 'teacher.00', '2025-09-29 19:38:50', 'Add User PU1111'),
(4, 'prof.sharma', '2025-09-29 19:40:18', 'Add User hello1'),
(5, 'prof.sharma', '2025-09-29 19:41:55', 'Add School Year 2026-2027');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(1, 1, 'Interpreter Language', 'A'),
(2, 1, 'Assembly language', 'B'),
(3, 1, 'help', 'C'),
(4, 1, 'all of above', 'D'),
(5, 3, 'Interpreter Language', 'A'),
(6, 3, 'Assembly language', 'B'),
(7, 3, 'help', 'C'),
(8, 3, 'all of above', 'D'),
(9, 4, 'hello world', 'A'),
(10, 4, 'Hello', 'B'),
(11, 4, 'World', 'C'),
(12, 4, 'HELLO WORLD', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(1, 'admin/uploads/2538_File_IMCA -Weekly Class Test -Semester-3 (1).pdf', '2025-09-12 08:40:21', 'Assigment', 5, 6, 'MySQL'),
(2, 'admin/uploads/5033_File_soumyadeephacakthon.docx', '2025-09-29 19:51:34', 'Hello', 6, 7, 'Assigment 1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, 'B.Tech CSE 3rd Year A'),
(2, 'B.Tech CSE 3rd Year B'),
(3, 'B.Tech IT 2nd Year A'),
(4, 'B.Tech IT 2nd Year B'),
(5, 'MBA 1st Year A'),
(6, 'MBA 1st Year B'),
(7, 'B.Pharm 4th Year A'),
(8, 'B.Pharm 4th Year B'),
(9, 'B.Tech CSE 1st Year A'),
(10, 'B.Tech CSE 1st Year B'),
(11, 'B.Tech CSE 2nd Year A'),
(12, 'B.Tech CSE 2nd Year B'),
(13, 'B.Tech CSE 4th Year A'),
(14, 'B.Tech CSE 4th Year B'),
(15, 'B.Tech IT 1st Year A'),
(16, 'B.Tech IT 1st Year B'),
(17, 'B.Tech IT 3rd Year A'),
(18, 'B.Tech IT 3rd Year B'),
(19, 'B.Tech IT 4th Year A'),
(20, 'B.Tech IT 4th Year B'),
(21, 'MBA 2nd Year A'),
(22, 'MBA 2nd Year B'),
(23, 'B.Pharm 1st Year A'),
(24, 'B.Pharm 1st Year B'),
(25, 'B.Pharm 2nd Year A'),
(26, 'B.Pharm 2nd Year B'),
(27, 'B.Pharm 3rd Year A'),
(28, 'B.Pharm 3rd Year B'),
(29, 'B.Des 1st Year A'),
(30, 'B.Des 1st Year B'),
(31, 'B.Des 2nd Year A'),
(32, 'B.Des 2nd Year B'),
(33, 'B.Des 3rd Year A'),
(34, 'B.Des 3rd Year B'),
(35, 'B.Des 4th Year A'),
(36, 'B.Des 4th Year B'),
(37, 'LLB 1st Year A'),
(38, 'LLB 1st Year B'),
(39, 'LLB 2nd Year A'),
(40, 'LLB 2nd Year B'),
(41, 'LLB 3rd Year A'),
(42, 'LLB 3rd Year B'),
(43, 'Class 1'),
(44, 'Class 11');

-- --------------------------------------------------------

--
-- Table structure for table `class_attendance`
--

CREATE TABLE `class_attendance` (
  `attendance_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `join_time` datetime NOT NULL,
  `leave_time` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_attendance`
--

INSERT INTO `class_attendance` (`attendance_id`, `class_id`, `student_id`, `join_time`, `leave_time`, `duration`) VALUES
(1, 5, 5, '2025-09-12 19:12:53', NULL, 0),
(2, 5, 5, '2025-09-12 19:16:27', NULL, 0),
(3, 5, 5, '2025-09-12 20:07:15', NULL, 0),
(4, 5, 5, '2025-09-12 20:18:11', NULL, 0),
(5, 5, 5, '2025-09-12 21:35:38', NULL, 0),
(6, 5, 5, '2025-09-12 21:49:12', NULL, 0),
(7, 5, 5, '2025-09-12 21:50:02', NULL, 0),
(8, 5, 5, '2025-09-12 21:54:38', NULL, 0),
(9, 5, 5, '2025-09-12 22:15:18', NULL, 0),
(10, 5, 5, '2025-09-12 22:16:30', NULL, 0),
(15, 32, 5, '2025-09-13 00:00:57', NULL, 0),
(16, 33, 5, '2025-09-13 00:02:40', NULL, 0),
(17, 33, 5, '2025-09-13 14:34:08', NULL, 0),
(18, 31, 5, '2025-09-13 15:03:37', NULL, 0),
(19, 31, 5, '2025-09-13 15:07:02', NULL, 0),
(20, 31, 5, '2025-09-13 15:11:52', NULL, 0),
(21, 31, 5, '2025-09-15 17:57:22', NULL, 0),
(23, 32, 5, '2025-09-29 19:58:13', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_chat`
--

CREATE TABLE `class_chat` (
  `chat_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('teacher','student') NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_chat`
--

INSERT INTO `class_chat` (`chat_id`, `class_id`, `user_id`, `user_type`, `message`, `sent_at`) VALUES
(1, 5, 5, 'teacher', 'hii', '2025-09-12 16:43:58'),
(2, 5, 5, 'student', 'helllo', '2025-09-12 16:45:43'),
(5, 31, 5, 'teacher', 'hii', '2025-09-15 12:29:26'),
(6, 31, 5, 'student', 'hii', '2025-09-15 12:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `class_polls`
--

CREATE TABLE `class_polls` (
  `poll_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`)),
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`) VALUES
(1, 6, 1800, 1),
(2, 7, 1800, 2);

-- --------------------------------------------------------

--
-- Table structure for table `class_recordings`
--

CREATE TABLE `class_recordings` (
  `recording_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `file_path` varchar(500) NOT NULL,
  `recording_type` enum('teacher','student_auto') DEFAULT 'teacher',
  `duration` int(11) DEFAULT 0,
  `file_size` int(11) DEFAULT 0,
  `network_condition` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(1, 6, '<p>this is best and goood badia</p>\r\n'),
(2, 7, '<p>Hello</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(1, 'Title', '<p>Parul University Online Learning Management System</p>'),
(2, 'Mission', '<p>To provide quality education through innovative teaching and learning methodologies.</p>'),
(3, 'Vision', '<p>To be a leading institution in higher education that transforms students into globally competent professionals.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(1, 'Computer Science and Engineering', 'Dr. Rajesh Patel'),
(2, 'Information Technology', 'Dr. Sunita Sharma'),
(3, 'Business Administration', 'Dr. Amit Verma'),
(4, 'Pharmacy', 'Dr. Neeta Gupta'),
(5, 'Engineering and Technology', 'Dr. Sanjay Kumar'),
(6, 'Applied Sciences', 'Dr. Priya Singh'),
(7, 'Design Studies', 'Dr. Ananya Joshi'),
(8, 'Law', 'Dr. Vikram Singh'),
(9, 'Hello', 'Subham');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(1, 'Python', 6, '09/12/2025', '09/12/2025'),
(2, 'php', 6, '09/12/2025', '09/17/2025'),
(4, 'hello', 7, '09/10/2025', '09/20/2025'),
(5, 'Hii', 0, '09/17/2025', '09/29/2025');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(1, 'admin/uploads/8375_File_LMS_PROJECT_PROMPT.md', '2025-09-11 14:35:02', 'sa', 0, 6, 'ss', 'Student.'),
(2, 'admin/uploads/4634_File_LMS_PROJECT_PROMPT.md', '2025-09-11 14:44:55', 'you', 0, 187, 'st', ''),
(3, 'admin/uploads/6441_File_LMS_PROJECT_PROMPT.md', '2025-09-11 14:47:57', 'you', 0, 187, 'st', ''),
(4, 'admin/uploads/7410_File_Doctors Appointments.pdf', '2025-09-11 15:34:16', 'PPT', 0, 6, 'Soumya Das', 'Student.'),
(5, 'admin/uploads/3635_File_LCAT_Certificate_Soumya_Das.pdf', '2025-09-11 15:42:47', 'you', 5, 6, 'soumyadas', 'Teacher.'),
(6, 'admin/uploads/4634_File_download.jpeg', '2025-09-12 08:49:05', 'I dont Solve this..', 5, 6, 'Soumya Das Das', 'Teacher.'),
(7, 'admin/uploads/2637_File_SIH2025-IDEA-Presentation-Format.pptx', '2025-09-29 19:33:27', 'PPT', 0, 6, 'Assigment 1', 'Student.'),
(8, 'admin/uploads/7802_File_IMCA -Weekly Class Test -Semester-3 (1).pdf', '2025-09-29 19:46:31', 'PPT', 6, 7, 'Assigment 1', 'Helloteacher'),
(9, 'admin/uploads/1956_File_tele.py', '2025-09-29 19:50:52', 'I dont Solve this..', 0, 7, 'problem', 'StudentHello');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(1, 4, 'hii', '2025-09-11 14:37:55', 5, 'Anil Gupta', 'Student .', ''),
(2, 5, 'Hello ', '2025-09-12 08:48:32', 5, 'Student .', 'Teacher .', 'read'),
(3, 5, 'HII', '2025-09-12 08:54:32', 5, 'Teacher .', 'Student .', 'read'),
(4, 5, 'Hello', '2025-09-12 08:59:08', 5, 'Teacher .', 'Student .', 'read'),
(5, 5, 'Hello', '2025-09-12 08:59:09', 5, 'Teacher .', 'Student .', 'read'),
(6, 4, 'MAssage', '2025-09-29 19:30:23', 5, 'Neha Singh', 'Student .', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(1, 4, 'hii', '2025-09-11 14:37:55', 5, 'Anil Gupta', 'Student .'),
(2, 5, 'Hello ', '2025-09-12 08:48:32', 5, 'Student .', 'Teacher .'),
(3, 5, 'HII', '2025-09-12 08:54:32', 5, 'Teacher .', 'Student .'),
(4, 5, 'Hello', '2025-09-12 08:59:08', 5, 'Teacher .', 'Student .'),
(5, 5, 'Hello', '2025-09-12 08:59:09', 5, 'Teacher .', 'Student .'),
(6, 4, 'MAssage', '2025-09-29 19:30:23', 5, 'Neha Singh', 'Student .');

-- --------------------------------------------------------

--
-- Table structure for table `network_logs`
--

CREATE TABLE `network_logs` (
  `log_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `bitrate` int(11) DEFAULT 0,
  `packet_loss` decimal(5,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(1, 6, 'Add Downloadable Materials file name <b>soumyadas</b>', '2025-09-11 15:42:47', 'downloadable_student.php'),
(2, 6, 'Add Assignment file name <b>MySQL</b>', '2025-09-12 08:40:21', 'assignment_student.php'),
(3, 6, 'Add Practice Quiz file', '2025-09-12 08:42:43', 'student_quiz_list.php'),
(4, 6, 'Add Downloadable Materials file name <b>Soumya Das Das</b>', '2025-09-12 08:49:05', 'downloadable_student.php'),
(5, 6, 'Add Annoucements', '2025-09-12 08:49:36', 'announcements_student.php'),
(6, 6, 'New class scheduled: Python osq at Sep 12, 11:55 PM', '2025-09-12 23:57:52', 'join_class.php?class_id=32'),
(7, 6, 'New class scheduled: Ds at Sep 13, 12:02 AM', '2025-09-13 00:02:13', 'join_class.php?class_id=33'),
(8, 6, 'New class scheduled: Python oss at Sep 13, 8:50 AM', '2025-09-13 08:50:46', 'join_class.php?class_id=34'),
(9, 7, 'Add Downloadable Materials file name <b>Assigment 1</b>', '2025-09-29 19:46:31', 'downloadable_student.php'),
(10, 7, 'Add Annoucements', '2025-09-29 19:46:49', 'announcements_student.php'),
(11, 7, 'Add Practice Quiz file', '2025-09-29 19:47:27', 'student_quiz_list.php'),
(12, 7, 'Add Assignment file name <b>Assigment 1</b>', '2025-09-29 19:51:34', 'assignment_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(1, 5, 'yes', 1),
(2, 5, 'yes', 2),
(3, 5, 'yes', 4),
(4, 5, 'yes', 5),
(5, 5, 'yes', 3),
(6, 5, 'yes', 6),
(7, 5, 'yes', 8),
(8, 5, 'yes', 7),
(9, 6, 'yes', 11),
(10, 6, 'yes', 10),
(11, 6, 'yes', 12),
(12, 6, 'yes', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(1, 5, 'yes', 4),
(2, 5, 'yes', 1),
(3, 5, 'yes', 5),
(4, 5, 'yes', 6);

-- --------------------------------------------------------

--
-- Table structure for table `online_attendance`
--

CREATE TABLE `online_attendance` (
  `attendance_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `join_time` datetime DEFAULT current_timestamp(),
  `leave_time` datetime DEFAULT NULL,
  `status` enum('present','absent') DEFAULT 'present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_classes`
--

CREATE TABLE `online_classes` (
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` enum('scheduled','ongoing','completed') DEFAULT 'scheduled',
  `allow_recording` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_classes`
--

INSERT INTO `online_classes` (`class_id`, `teacher_id`, `teacher_class_id`, `subject_code`, `class_name`, `room_name`, `start_time`, `end_time`, `status`, `allow_recording`, `created_at`) VALUES
(5, 5, 0, 'MBA101', 'Python', 'parul_class_68c41d4fb4ba7', '2025-09-12 18:46:00', '2025-09-12 22:17:51', 'completed', 1, '2025-09-12 13:17:03'),
(25, 5, 0, 'MBA101', 'Python os', 'parul_class_68c45d1fbaee9', '2025-09-12 23:19:00', NULL, 'scheduled', 1, '2025-09-12 17:49:19'),
(26, 5, 0, 'MBA101', 'Python os', 'parul_class_68c45d625543b', '2025-09-12 23:19:00', NULL, 'scheduled', 1, '2025-09-12 17:50:26'),
(27, 5, 0, 'MBA101', 'Python os', 'parul_class_68c45d6646019', '2025-09-12 23:19:00', NULL, 'scheduled', 1, '2025-09-12 17:50:30'),
(28, 5, 0, 'MBA101', 'Python os', 'parul_class_68c45de15bed9', '2025-09-12 23:19:00', NULL, 'scheduled', 1, '2025-09-12 17:52:33'),
(29, 5, 0, 'MBA101', 'Python os', 'parul_class_68c460f9c2003', '2025-09-12 23:19:00', NULL, 'scheduled', 1, '2025-09-12 18:05:45'),
(30, 5, 0, 'MBA101', 'Python osq', 'parul_class_68c46582053b2', '2025-09-12 23:55:00', '2025-09-13 08:50:29', 'completed', 1, '2025-09-12 18:25:06'),
(31, 5, 0, 'MBA101', 'Python osq', 'parul_class_68c465b610559', '2025-09-12 23:55:00', '2025-09-15 18:02:58', 'completed', 1, '2025-09-12 18:25:58'),
(32, 5, 0, 'MBA101', 'Python osq', 'parul_class_68c466280aa6d', '2025-09-12 23:55:00', '2025-09-29 19:59:01', 'completed', 1, '2025-09-12 18:27:52'),
(33, 5, 0, 'MBA101', 'Ds', 'parul_class_68c4672db1286', '2025-09-13 00:02:00', '2025-09-13 15:01:23', 'completed', 1, '2025-09-12 18:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `vote_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `option_index` int(11) NOT NULL,
  `voted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(1, 'Python', 'Basic of Python ', '2025-09-12 08:42:30', 5),
(2, 'Python', 'Basic of Python ', '2025-09-29 19:47:22', 6);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(100) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(1, 1, '<p>What is python?</p>\r\n', 1, 0, '2025-09-12 08:43:46', 'C'),
(2, 1, '<p>you are good?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, 0, '2025-09-12 08:44:10', 'True'),
(3, 1, '<p>Hello what is name</p>\r\n', 1, 0, '2025-09-12 08:47:53', 'B'),
(4, 2, '<p>Hello</p>\r\n\r\n<p>print(&quot;hello world&quot;)</p>\r\n', 1, 0, '2025-09-29 19:48:25', 'A'),
(5, 2, '<p>print(Hello Python)</p>\r\n', 2, 0, '2025-09-29 19:48:58', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `recording_chunks`
--

CREATE TABLE `recording_chunks` (
  `chunk_id` int(11) NOT NULL,
  `recording_id` int(11) NOT NULL,
  `chunk_index` int(11) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(1, '2024-2025'),
(2, '2025-2026'),
(3, '2026-2027');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `username`, `password`, `location`, `status`) VALUES
(1, 'Rahul', 'Sharma', 1, 'PU2024001', 'password123', 'uploads/default.jpg', 'Registered'),
(2, 'Priya', 'Patel', 1, 'PU2024002', 'password123', 'uploads/default.jpg', 'Registered'),
(3, 'Amit', 'Verma', 2, 'PU2024003', 'password123', 'uploads/default.jpg', 'Registered'),
(4, 'Neha', 'Singh', 2, 'PU2024004', 'password123', 'uploads/default.jpg', 'Registered'),
(5, 'Student', '.', 5, 'PU0000', 'student', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(6, 'Student', 'Hello', 9, 'PU00000', 'student', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `floc`, `assignment_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(1, 1, 'admin/uploads/1618_File_LCAT_Certificate_Soumya_Das.pdf', '2025-09-12 08:40:55', 'Omlet', 'Soumya Das', 5, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_backpack`
--

INSERT INTO `student_backpack` (`file_id`, `floc`, `fdatein`, `fdesc`, `student_id`, `fname`) VALUES
(2, 'admin/uploads/4634_File_download.jpeg', '2025-09-12 08:58:19', 'I dont Solve this..', 5, 'Soumya Das Das');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `student_quiz_time`, `grade`) VALUES
(1, 1, 5, '3600', '0 out of 3'),
(2, 2, 6, '3600', '2 out of 2');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(1, 'CSE301', 'Data Structures', 'Core', 'Study of various data structures and their applications', 4, 'CSE201', '5th'),
(2, 'CSE302', 'Algorithm Design', 'Core', 'Design and analysis of algorithms', 4, 'CSE201', '5th'),
(3, 'MBA101', 'Principles of Management', 'Core', 'Fundamental principles of business management', 3, 'None', '1st'),
(4, 'PHARM401', 'Pharmaceutical Chemistry', 'Core', 'Advanced pharmaceutical chemistry concepts', 4, 'PHARM301', '7th'),
(5, 'CSE101', 'Introduction to Programming', 'Core', 'Basic programming concepts using C language', 4, 'None', '1st'),
(6, 'CSE102', 'Digital Logic Design', 'Core', 'Fundamentals of digital logic and circuit design', 4, 'None', '1st'),
(7, 'CSE201', 'Object Oriented Programming', 'Core', 'OOP concepts using Java', 4, 'CSE101', '3rd'),
(8, 'CSE202', 'Computer Organization', 'Core', 'Computer architecture and organization', 4, 'CSE102', '3rd'),
(9, 'CSE401', 'Artificial Intelligence', 'Core', 'Introduction to AI concepts and techniques', 4, 'CSE301', '7th'),
(12, 'IT201', 'Database Management Systems', 'Core', 'Relational database concepts and SQL', 4, 'None', '3rd'),
(13, 'IT301', 'Software Engineering', 'Core', 'Software development lifecycle and methodologies', 4, 'IT201', '5th'),
(14, 'IT401', 'Cloud Computing', 'Elective', 'Cloud infrastructure and services', 3, 'IT301', '7th'),
(15, 'MBA201', 'Marketing Management', 'Core', 'Principles and practices of marketing', 3, 'MBA101', '3rd'),
(16, 'MBA202', 'Financial Management', 'Core', 'Corporate finance and investment strategies', 3, 'MBA101', '3rd'),
(17, 'MBA301', 'Human Resource Management', 'Core', 'HR policies and practices', 3, 'MBA101', '5th'),
(18, 'MBA401', 'Strategic Management', 'Core', 'Business strategy formulation and implementation', 3, 'MBA201', '7th'),
(19, 'PHARM101', 'Pharmaceutics I', 'Core', 'Introduction to pharmaceutics', 4, 'None', '1st'),
(20, 'PHARM201', 'Pharmacology I', 'Core', 'Introduction to pharmacology', 4, 'PHARM101', '3rd'),
(21, 'PHARM301', 'Medicinal Chemistry', 'Core', 'Chemistry of medicinal compounds', 4, 'PHARM201', '5th'),
(22, 'DES101', 'Design Fundamentals', 'Core', 'Basic principles of design', 4, 'None', '1st'),
(23, 'DES201', 'Color Theory', 'Core', 'Theory and application of color in design', 4, 'DES101', '3rd'),
(24, 'DES301', 'User Interface Design', 'Core', 'Principles of UI/UX design', 4, 'DES201', '5th'),
(25, 'LAW101', 'Constitutional Law', 'Core', 'Study of constitutional framework', 4, 'None', '1st'),
(26, 'LAW201', 'Contract Law', 'Core', 'Principles of contract law', 4, 'LAW101', '3rd'),
(27, 'LAW301', 'Criminal Law', 'Core', 'Study of criminal justice system', 4, 'LAW201', '5th'),
(28, '3224', 'Hack', '', '<p>Hello</p>\r\n', 2, '', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(1, 'prof.sharma', 'password123', 'Rajesh', 'Sharma', 1, 'uploads/prof_sharma.jpg', 'Professor of Computer Science with 15 years of experience', 'Registered', 'Active'),
(2, 'dr.verma', 'password123', 'Sunil', 'Verma', 2, 'uploads/dr_verma.jpg', 'Associate Professor of Information Technology', 'Registered', 'Active'),
(4, 'dr.gupta', 'password123', 'Anil', 'Gupta', 4, 'uploads/dr_gupta.jpg', 'Professor of Pharmacy', 'Registered', 'Active'),
(5, 'teacher.00', 'teacher', 'Teacher', '.', 1, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Registered', ''),
(6, 'teacher.11', 'teacher', 'Hello', 'teacher', 1, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Registered', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(1, 1, 1, 1, 'admin/uploads/ds_thumbnail.jpg', '2024-2025'),
(2, 1, 2, 1, 'admin/uploads/ds_thumbnail.jpg', '2024-2025'),
(3, 2, 1, 2, 'admin/uploads/algo_thumbnail.jpg', '2024-2025'),
(4, 3, 5, 3, 'admin/uploads/mgmt_thumbnail.jpg', '2024-2025'),
(5, 4, 7, 4, 'admin/uploads/pharma_thumbnail.jpg', '2024-2025'),
(6, 5, 5, 3, 'admin/uploads/thumbnails.jpg', '2025-2026'),
(7, 6, 9, 6, 'admin/uploads/thumbnails.jpg', '2026-2027'),
(8, 5, 5, 3, 'admin/uploads/thumbnails.jpg', '2026-2027');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_class_announcements`
--

INSERT INTO `teacher_class_announcements` (`teacher_class_announcements_id`, `content`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(1, '<p>do this</p>\r\n', '5', 6, '2025-09-12 08:49:36'),
(2, '<p>Hello</p>\r\n', '6', 7, '2025-09-29 19:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 3, 1),
(4, 2, 4, 1),
(5, 3, 1, 2),
(6, 3, 2, 2),
(7, 6, 5, 5),
(8, 7, 6, 6),
(9, 8, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `assignment_id`) VALUES
(1, 6, 'Add Downloadable Materials file name <b>ss</b>', '2025-09-11 14:35:02', 'downloadable.php', 5, 0),
(2, 187, 'Add Downloadable Materials file name <b>st</b>', '2025-09-11 14:44:55', 'downloadable.php', 223, 0),
(3, 187, 'Add Downloadable Materials file name <b>st</b>', '2025-09-11 14:47:57', 'downloadable.php', 223, 0),
(4, 6, 'Add Downloadable Materials file name <b>Soumya Das</b>', '2025-09-11 15:34:16', 'downloadable.php', 5, 0),
(5, 6, 'Submit Assignment file name <b>Soumya Das</b>', '2025-09-12 08:40:55', 'view_submit_assignment.php', 5, 1),
(6, 6, 'Add Downloadable Materials file name <b>Assigment 1</b>', '2025-09-29 19:33:27', 'downloadable.php', 5, 0),
(7, 7, 'Add Downloadable Materials file name <b>problem</b>', '2025-09-29 19:50:52', 'downloadable.php', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'System', 'Administrator'),
(2, 'soumyadas_topper', 'soumya', 'Soumya', 'Das'),
(3, 'PU1111', 'pu', 'Hello', 'World'),
(4, 'hello1', 'pu', 'Hello', 'World1');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2025-09-11 13:49:16', '2025-09-29 19:53:18', 1),
(2, 'soumyadas_topper', '2025-09-11 14:18:05', '', 2),
(3, 'admin', '2025-09-11 15:36:37', '2025-09-29 19:53:18', 1),
(4, 'admin', '2025-09-11 21:20:22', '2025-09-29 19:53:18', 1),
(5, 'admin', '2025-09-16 18:21:11', '2025-09-29 19:53:18', 1),
(6, 'admin', '2025-09-29 19:37:02', '2025-09-29 19:53:18', 1),
(7, 'admin', '2025-09-29 19:39:18', '2025-09-29 19:53:18', 1),
(8, 'admin', '2025-09-29 19:54:43', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_attendance`
--
ALTER TABLE `class_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `fk_class_attendance_class` (`class_id`),
  ADD KEY `fk_class_attendance_student` (`student_id`);

--
-- Indexes for table `class_chat`
--
ALTER TABLE `class_chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class_polls`
--
ALTER TABLE `class_polls`
  ADD PRIMARY KEY (`poll_id`),
  ADD KEY `fk_class_polls_class` (`class_id`),
  ADD KEY `fk_class_polls_teacher` (`teacher_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_recordings`
--
ALTER TABLE `class_recordings`
  ADD PRIMARY KEY (`recording_id`),
  ADD KEY `fk_class_recordings_class` (`class_id`),
  ADD KEY `fk_class_recordings_teacher` (`teacher_id`),
  ADD KEY `fk_class_recordings_student` (`student_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `network_logs`
--
ALTER TABLE `network_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_network_logs_class` (`class_id`),
  ADD KEY `fk_network_logs_student` (`student_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `online_attendance`
--
ALTER TABLE `online_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `online_classes`
--
ALTER TABLE `online_classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `fk_online_classes_teacher` (`teacher_id`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`vote_id`),
  ADD UNIQUE KEY `unique_vote` (`poll_id`,`student_id`),
  ADD KEY `fk_poll_votes_student` (`student_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `recording_chunks`
--
ALTER TABLE `recording_chunks`
  ADD PRIMARY KEY (`chunk_id`),
  ADD KEY `fk_recording_chunks_recording` (`recording_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `class_attendance`
--
ALTER TABLE `class_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class_chat`
--
ALTER TABLE `class_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_polls`
--
ALTER TABLE `class_polls`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_recordings`
--
ALTER TABLE `class_recordings`
  MODIFY `recording_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `network_logs`
--
ALTER TABLE `network_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_attendance`
--
ALTER TABLE `online_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_classes`
--
ALTER TABLE `online_classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `question_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recording_chunks`
--
ALTER TABLE `recording_chunks`
  MODIFY `chunk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_attendance`
--
ALTER TABLE `class_attendance`
  ADD CONSTRAINT `class_attendance_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`),
  ADD CONSTRAINT `class_attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `fk_class_attendance_class` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_class_attendance_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_chat`
--
ALTER TABLE `class_chat`
  ADD CONSTRAINT `class_chat_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`);

--
-- Constraints for table `class_polls`
--
ALTER TABLE `class_polls`
  ADD CONSTRAINT `class_polls_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`),
  ADD CONSTRAINT `class_polls_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `fk_class_polls_class` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_class_polls_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_recordings`
--
ALTER TABLE `class_recordings`
  ADD CONSTRAINT `class_recordings_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`),
  ADD CONSTRAINT `class_recordings_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `class_recordings_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `fk_class_recordings_class` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_class_recordings_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_class_recordings_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `network_logs`
--
ALTER TABLE `network_logs`
  ADD CONSTRAINT `fk_network_logs_class` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_network_logs_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `network_logs_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`),
  ADD CONSTRAINT `network_logs_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `online_attendance`
--
ALTER TABLE `online_attendance`
  ADD CONSTRAINT `online_attendance_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `online_classes` (`class_id`) ON DELETE CASCADE;

--
-- Constraints for table `online_classes`
--
ALTER TABLE `online_classes`
  ADD CONSTRAINT `fk_online_classes_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `online_classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD CONSTRAINT `fk_poll_votes_poll` FOREIGN KEY (`poll_id`) REFERENCES `class_polls` (`poll_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_poll_votes_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poll_votes_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `class_polls` (`poll_id`),
  ADD CONSTRAINT `poll_votes_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `recording_chunks`
--
ALTER TABLE `recording_chunks`
  ADD CONSTRAINT `fk_recording_chunks_recording` FOREIGN KEY (`recording_id`) REFERENCES `class_recordings` (`recording_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recording_chunks_ibfk_1` FOREIGN KEY (`recording_id`) REFERENCES `class_recordings` (`recording_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
