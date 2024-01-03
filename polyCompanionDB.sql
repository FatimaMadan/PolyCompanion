-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2024 at 10:22 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db202001312`
--

-- --------------------------------------------------------

--
-- Table structure for table `ActivityLog`
--

CREATE TABLE `ActivityLog` (
  `ActivityId` int(11) NOT NULL,
  `UserName` int(11) DEFAULT NULL,
  `ActivityText` varchar(500) DEFAULT NULL,
  `Time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ActivityLog`
--

INSERT INTO `ActivityLog` (`ActivityId`, `UserName`, `ActivityText`, `Time`) VALUES
(2, 202001312, 'added a question', '2023-12-04 17:06:50'),
(3, 202001312, 'added a FAQ', '2023-12-05 14:28:54'),
(22, 202001312, 'added a FAQ', '2023-12-27 00:45:06'),
(23, 202001312, 'added a FAQ', '2023-12-27 00:45:43'),
(24, 202001312, 'edited a FAQ', '2023-12-27 00:56:58'),
(25, 202001312, 'deleted a question', '2023-12-27 01:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `AnsId` int(11) NOT NULL,
  `AnsText` varchar(500) NOT NULL,
  `Likes` int(11) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Questions_QuestionId` int(11) NOT NULL,
  `User_UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`AnsId`, `AnsText`, `Likes`, `Time`, `Questions_QuestionId`, `User_UserId`) VALUES
(23, 'Cybersecurity refers to the practice of protecting computer systems, networks, and data from unauthorized access, use, disclosure, disruption, modification, or destruction. It involves implementing measures to prevent, detect, and respond to threats and attacks that can compromise the security of digital assets. Have a look at it', 1, '2024-01-02 18:56:41', 55, 1),
(25, 'Virtualization is the process of creating a virtual representation or simulation of computer hardware, operating systems, storage devices, or networks. It enables multiple virtual instances to run independently on a single physical machine, maximizing resource utilization and improving efficiency. Have a look at my files.', 0, '2024-01-02 19:15:03', 55, 1),
(26, 'The RSA algorithm, where the recipient publishes their public key for anyone to use for encryption, and they keep their private key secret for decryption.', 0, '2024-01-02 19:23:03', 55, 1),
(27, 'Symmetric encryption and asymmetric encryption are two fundamental encryption techniques used to secure data. The main difference lies in the way encryption and decryption keys are used.', 1, '2024-01-02 19:23:49', 55, 1),
(28, 'In summary, symmetric encryption uses a single shared key for both encryption and decryption, while asymmetric encryption uses a pair of keys a public key for encryption and a private key for decryption. Symmetric encryption is faster, but asymmetric encryption provides enhanced security and enables secure communication between parties.', 0, '2024-01-02 19:25:41', 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bot_history`
--

CREATE TABLE `bot_history` (
  `convo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bot_history`
--

INSERT INTO `bot_history` (`convo_id`, `user_id`, `timestamp`, `action`) VALUES
(789, 1, '2024-01-03 20:02:07', 'access Polybot page'),
(790, 1, '2024-01-03 21:07:51', 'access Polybot page'),
(791, 1, '2024-01-03 21:07:54', 'user agreed to Polbot policy'),
(792, 1, '2024-01-03 21:07:55', 'access Polybot page'),
(793, 1, '2024-01-03 21:07:57', 'I have a question about a specific course'),
(794, 1, '2024-01-03 21:08:00', 'Cyber Security'),
(795, 1, '2024-01-03 21:08:02', ' Year 1'),
(796, 1, '2024-01-03 21:08:03', ' Semester A'),
(797, 1, '2024-01-03 21:08:09', 'Core ICT'),
(798, 1, '2024-01-03 21:08:10', ' Year 1'),
(799, 1, '2024-01-03 21:08:11', ' Semester A'),
(800, 1, '2024-01-03 21:08:13', ' Year 3'),
(801, 1, '2024-01-03 21:08:14', ' Semester A'),
(802, 1, '2024-01-03 22:17:10', 'access Polybot page'),
(803, 1, '2024-01-03 22:17:14', 'I have a question about a specific course'),
(804, 1, '2024-01-03 22:17:15', 'I have a question about a specific course'),
(805, 1, '2024-01-03 22:17:18', 'Programming'),
(806, 1, '2024-01-03 22:17:30', 'Core ICT'),
(807, 1, '2024-01-03 22:18:15', 'Information Systems'),
(808, 1, '2024-01-03 22:18:16', 'Database Systems'),
(809, 1, '2024-01-03 22:18:18', 'Networking'),
(810, 1, '2024-01-03 22:18:19', 'Programming'),
(811, 1, '2024-01-03 22:18:21', 'Core ICT'),
(812, 1, '2024-01-03 22:19:02', 'access Polybot page'),
(813, 1, '2024-01-03 22:19:05', 'I have a question about a specific course'),
(814, 1, '2024-01-03 22:19:05', 'Programming'),
(815, 1, '2024-01-03 22:19:07', 'Core ICT'),
(816, 1, '2024-01-03 22:19:51', 'access Polybot page'),
(817, 1, '2024-01-03 22:19:57', 'I have a question about a specific course'),
(818, 1, '2024-01-03 22:19:58', 'Programming'),
(819, 1, '2024-01-03 22:19:59', ' Year 2'),
(820, 1, '2024-01-03 22:20:00', ' Semester A'),
(821, 1, '2024-01-03 22:20:03', ' Semester B'),
(822, 1, '2024-01-03 22:20:05', 'Database 2'),
(823, 1, '2024-01-03 22:20:10', 'owner'),
(824, 1, '2024-01-03 22:20:13', 'Year'),
(825, 1, '2024-01-03 22:20:15', 'CourseAim'),
(826, 1, '2024-01-03 22:20:22', ' Yes'),
(827, 1, '2024-01-03 22:20:23', 'I want to see the Most Frequently Asked Questions'),
(828, 1, '2024-01-03 22:21:00', 'access Polybot page'),
(829, 1, '2024-01-03 22:21:02', 'I want to see the Most Frequently Asked Questions'),
(830, 1, '2024-01-03 22:21:31', 'access Polybot page'),
(831, 1, '2024-01-03 22:21:32', 'I want to see the Most Frequently Asked Questions'),
(832, 1, '2024-01-03 22:21:49', 'access Polybot page'),
(833, 1, '2024-01-03 22:21:50', 'I want to see the Most Frequently Asked Questions'),
(834, 1, '2024-01-03 22:21:53', 'Is there a library on campus?'),
(835, 1, '2024-01-03 22:21:57', ' Yes'),
(836, 1, '2024-01-03 22:21:58', 'I have a question about a specific course'),
(837, 1, '2024-01-03 22:21:59', 'Information Systems'),
(838, 1, '2024-01-03 22:22:02', ' Year 3'),
(839, 1, '2024-01-03 22:22:03', ' Semester A'),
(840, 1, '2024-01-03 22:22:04', 'Systems Administration'),
(841, 1, '2024-01-03 22:22:05', 'ShortTitle');

--
-- Triggers `bot_history`
--
DELIMITER $$
CREATE TRIGGER `bot_history_trigger` AFTER INSERT ON `bot_history` FOR EACH ROW BEGIN
    DECLARE last_hour TIMESTAMP;
    DECLARE current_hour TIMESTAMP;
    DECLARE existing_report INT;
    
    SET last_hour = DATE_SUB(NOW(), INTERVAL 1 HOUR);
    SET current_hour = NOW();
    
    -- Check if a report already exists for the current hour and action
    SELECT COUNT(*) INTO existing_report
    FROM bot_reports
    WHERE report_date = DATE(current_hour)
        AND report_hour = HOUR(current_hour)
        AND action = NEW.action;

    IF NOT (NEW.action <=> 'Overall Usage') THEN
        IF existing_report > 0 THEN
            -- Update the existing report's clicks value
            UPDATE bot_reports
            SET clicks = clicks + 1
            WHERE report_date = DATE(current_hour)
                AND report_hour = HOUR(current_hour)
                AND action = NEW.action;
        ELSE
            -- Insert a new report for the current hour and action
            INSERT INTO bot_reports (report_date, report_hour, action, clicks)
            VALUES (DATE(current_hour), HOUR(current_hour), NEW.action, 1);
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bot_reports`
--

CREATE TABLE `bot_reports` (
  `report_id` int(11) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `clicks` int(11) NOT NULL,
  `report_date` date DEFAULT NULL,
  `report_hour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bot_reports`
--

INSERT INTO `bot_reports` (`report_id`, `action`, `clicks`, `report_date`, `report_hour`) VALUES
(514, ' Semester A', 1, '2023-12-31', 0),
(515, 'I want to see the Most Frequently Asked Questions', 1, '2023-12-31', 8),
(516, 'How many credits can a students take per semester?', 1, '2023-12-31', 8),
(517, ' Yes', 1, '2023-12-31', 8),
(518, 'I have a question about a specific course', 3, '2023-12-31', 8),
(519, 'Programming', 3, '2023-12-31', 8),
(520, ' Year 1', 3, '2023-12-31', 8),
(521, ' Semester A', 3, '2023-12-31', 8),
(522, 'System Administration', 3, '2023-12-31', 8),
(523, 'Credits', 1, '2023-12-31', 8),
(524, 'CourseLevel', 3, '2023-12-31', 8),
(525, ' No', 3, '2023-12-31', 8),
(526, ' Very helpful', 1, '2023-12-31', 8),
(527, ' Not helpful', 3, '2023-12-31', 8),
(528, 'access Polybot page', 3, '2024-01-01', 2),
(529, 'access Polybot page', 14, '2024-01-01', 3),
(530, 'access Polybot page', 7, '2024-01-01', 11),
(531, 'I have a question about a specific course', 1, '2024-01-01', 11),
(532, 'I want to see the Most Frequently Asked Questions', 1, '2024-01-01', 11),
(533, 'How many credits can a students take per semester?', 1, '2024-01-01', 11),
(534, ' Yes', 1, '2024-01-01', 11),
(535, ' No', 1, '2024-01-01', 11),
(536, ' Very helpful', 2, '2024-01-01', 11),
(537, 'access Polybot page', 12, '2024-01-01', 12),
(538, 'I want to see the Most Frequently Asked Questions', 2, '2024-01-01', 13),
(539, 'How many credits can a students take per semester?', 1, '2024-01-01', 13),
(540, ' Yes', 2, '2024-01-01', 13),
(541, 'I have a question about a specific course', 1, '2024-01-01', 13),
(542, 'Programming', 1, '2024-01-01', 13),
(543, ' Year 1', 1, '2024-01-01', 13),
(544, 'When will the semester fees pay period end?', 1, '2024-01-01', 13),
(545, ' No', 1, '2024-01-01', 13),
(546, ' Very helpful', 1, '2024-01-01', 13),
(547, 'access Polybot page', 1, '2024-01-01', 13),
(548, 'access Polybot page', 5, '2024-01-01', 14),
(549, 'I have a question about a specific course', 1, '2024-01-01', 14),
(550, 'Programming', 1, '2024-01-01', 14),
(551, ' Year 1', 2, '2024-01-01', 14),
(552, ' Semester A', 2, '2024-01-01', 14),
(553, ' Year 2', 1, '2024-01-01', 14),
(554, ' Semester B', 2, '2024-01-01', 14),
(555, 'Database Systems', 1, '2024-01-01', 14),
(556, 'access Polybot page', 12, '2024-01-01', 15),
(557, 'access Polybot page', 37, '2024-01-01', 16),
(558, 'I have a question about a specific course', 10, '2024-01-01', 16),
(559, 'I want to see the Most Frequently Asked Questions', 2, '2024-01-01', 16),
(560, 'Programming', 5, '2024-01-01', 16),
(561, ' Year 1', 6, '2024-01-01', 16),
(562, ' Semester A', 6, '2024-01-01', 16),
(563, 'System Administration', 4, '2024-01-01', 16),
(564, 'Major_MajorId', 1, '2024-01-01', 16),
(565, 'Information Systems', 1, '2024-01-01', 16),
(566, 'CourseCode', 1, '2024-01-01', 16),
(567, 'ShortTitle', 1, '2024-01-01', 16),
(568, 'CourseTitle', 1, '2024-01-01', 16),
(569, 'Credits', 1, '2024-01-01', 16),
(570, 'access Polybot page', 21, '2024-01-01', 17),
(571, 'access Polybot page', 4, '2024-01-01', 18),
(572, 'access Polybot page', 3, '2024-01-01', 19),
(573, 'I have a question about a specific course', 1, '2024-01-01', 19),
(574, 'Programming', 1, '2024-01-01', 19),
(575, ' Year 1', 1, '2024-01-01', 19),
(576, ' Semester A', 1, '2024-01-01', 19),
(577, 'System Administration', 1, '2024-01-01', 19),
(578, 'CourseCode', 1, '2024-01-01', 19),
(579, ' No', 2, '2024-01-01', 19),
(580, ' Very helpful', 1, '2024-01-01', 19),
(581, ' Yes', 1, '2024-01-01', 19),
(582, ' Not helpful', 2, '2024-01-01', 19),
(583, 'I want to see the Most Frequently Asked Questions', 1, '2024-01-01', 19),
(584, 'How many credits can a students take per semester?', 1, '2024-01-01', 19),
(585, 'access Polybot page', 1, '2024-01-01', 22),
(586, 'access Polybot page', 1, '2024-01-02', 10),
(587, 'access Polybot page', 1, '2024-01-02', 15),
(588, 'access Polybot page', 1, '2024-01-02', 17),
(589, 'access Polybot page', 10, '2024-01-02', 18),
(590, 'I want to see the Most Frequently Asked Questions', 2, '2024-01-02', 18),
(591, 'How many credits can a students take per semester?', 2, '2024-01-02', 18),
(592, ' Yes', 2, '2024-01-02', 18),
(593, 'I have a question about a specific course', 2, '2024-01-02', 18),
(594, 'Programming', 2, '2024-01-02', 18),
(595, ' Year 1', 3, '2024-01-02', 18),
(596, ' Semester A', 4, '2024-01-02', 18),
(597, 'System Administration', 2, '2024-01-02', 18),
(598, 'ShortTitle', 1, '2024-01-02', 18),
(599, ' No', 2, '2024-01-02', 18),
(600, ' Not helpful', 2, '2024-01-02', 18),
(601, 'Cyber Security', 1, '2024-01-02', 18),
(602, ' Year 2', 1, '2024-01-02', 18),
(603, ' Semester B', 2, '2024-01-02', 18),
(604, 'PreRequisite', 1, '2024-01-02', 18),
(605, ' Very helpful', 1, '2024-01-02', 18),
(606, 'access Polybot page', 3, '2024-01-02', 20),
(607, 'I want to see the Most Frequently Asked Questions', 1, '2024-01-02', 20),
(608, 'How many credits can a students take per semester?', 1, '2024-01-02', 20),
(609, ' Yes', 2, '2024-01-02', 20),
(610, 'I have a question about a specific course', 4, '2024-01-02', 20),
(611, 'Programming', 4, '2024-01-02', 20),
(612, ' Year 1', 3, '2024-01-02', 20),
(613, ' Semester A', 4, '2024-01-02', 20),
(614, 'System Administration', 3, '2024-01-02', 20),
(615, 'owner', 1, '2024-01-02', 20),
(616, ' Year 2', 1, '2024-01-02', 20),
(617, 'test', 1, '2024-01-02', 20),
(618, 'CourseCode', 1, '2024-01-02', 20),
(619, 'uncontrolledAssess', 1, '2024-01-02', 20),
(620, ' No', 1, '2024-01-02', 20),
(621, ' Very helpful', 1, '2024-01-02', 20),
(622, 'access Polybot page', 12, '2024-01-02', 21),
(623, 'access Polybot page', 6, '2024-01-02', 22),
(624, 'I want to see the Most Frequently Asked Questions', 2, '2024-01-02', 22),
(625, 'How many credits can a students take per semester?', 2, '2024-01-02', 22),
(626, ' Yes', 2, '2024-01-02', 22),
(627, 'I have a question about a specific course', 2, '2024-01-02', 22),
(628, 'Programming', 1, '2024-01-02', 22),
(629, ' Year 1', 1, '2024-01-02', 22),
(630, ' Semester A', 1, '2024-01-02', 22),
(631, 'System Administration', 1, '2024-01-02', 22),
(632, 'CourseCode', 1, '2024-01-02', 22),
(633, ' No', 2, '2024-01-02', 22),
(634, ' Very helpful', 4, '2024-01-02', 22),
(635, ' Not helpful', 1, '2024-01-02', 22),
(636, 'access Polybot page', 4, '2024-01-02', 23),
(637, 'I have a question about a specific course', 3, '2024-01-02', 23),
(638, 'Cyber Security', 1, '2024-01-02', 23),
(639, ' Year 1', 3, '2024-01-02', 23),
(640, ' Semester A', 5, '2024-01-02', 23),
(641, 'Information Systems', 3, '2024-01-02', 23),
(642, ' Semester B', 6, '2024-01-02', 23),
(643, ' Year 2', 2, '2024-01-02', 23),
(644, 'Database Systems 2', 1, '2024-01-02', 23),
(645, 'uncontrolledAssess', 1, '2024-01-02', 23),
(646, 'PreRequisite', 2, '2024-01-02', 23),
(647, 'Programming', 1, '2024-01-02', 23),
(648, 'access Polybot page', 1, '2024-01-03', 0),
(649, 'access Polybot page', 1, '2024-01-03', 3),
(650, 'access Polybot page', 7, '2024-01-03', 5),
(651, 'access Polybot page', 3, '2024-01-03', 6),
(652, 'access Polybot page', 9, '2024-01-03', 17),
(653, 'user disagreed to Polbot policy', 4, '2024-01-03', 17),
(654, 'user agreed to Polbot policy', 4, '2024-01-03', 17),
(655, 'access Polybot page', 43, '2024-01-03', 18),
(656, 'I have a question about a specific course', 1, '2024-01-03', 18),
(657, 'user agreed to Polbot policy', 3, '2024-01-03', 18),
(658, 'user disagreed to Polbot policy', 1, '2024-01-03', 18),
(659, 'I want to see the Most Frequently Asked Questions', 1, '2024-01-03', 18),
(660, 'access Polybot page', 9, '2024-01-03', 19),
(661, 'I want to see the Most Frequently Asked Questions', 1, '2024-01-03', 19),
(662, 'How many credits can a students take per semester?', 1, '2024-01-03', 19),
(663, ' Yes', 1, '2024-01-03', 19),
(664, 'I have a question about a specific course', 1, '2024-01-03', 19),
(665, 'Programming', 1, '2024-01-03', 19),
(666, ' Year 1', 1, '2024-01-03', 19),
(667, ' Semester A', 1, '2024-01-03', 19),
(668, 'System Administration', 1, '2024-01-03', 19),
(669, 'Credits', 1, '2024-01-03', 19),
(670, ' No', 1, '2024-01-03', 19),
(671, ' Not helpful', 1, '2024-01-03', 19),
(672, 'access Polybot page', 1, '2024-01-03', 20),
(673, 'access Polybot page', 2, '2024-01-03', 21),
(674, 'user agreed to Polbot policy', 1, '2024-01-03', 21),
(675, 'I have a question about a specific course', 1, '2024-01-03', 21),
(676, 'Cyber Security', 1, '2024-01-03', 21),
(677, ' Year 1', 2, '2024-01-03', 21),
(678, ' Semester A', 3, '2024-01-03', 21),
(679, 'Core ICT', 1, '2024-01-03', 21),
(680, ' Year 3', 1, '2024-01-03', 21),
(681, 'access Polybot page', 6, '2024-01-03', 22),
(682, 'I have a question about a specific course', 5, '2024-01-03', 22),
(683, 'Programming', 4, '2024-01-03', 22),
(684, 'Core ICT', 3, '2024-01-03', 22),
(685, 'Information Systems', 2, '2024-01-03', 22),
(686, 'Database Systems', 1, '2024-01-03', 22),
(687, 'Networking', 1, '2024-01-03', 22),
(688, ' Year 2', 1, '2024-01-03', 22),
(689, ' Semester A', 2, '2024-01-03', 22),
(690, ' Semester B', 1, '2024-01-03', 22),
(691, 'Database 2', 1, '2024-01-03', 22),
(692, 'owner', 1, '2024-01-03', 22),
(693, 'Year', 1, '2024-01-03', 22),
(694, 'CourseAim', 1, '2024-01-03', 22),
(695, ' Yes', 2, '2024-01-03', 22),
(696, 'I want to see the Most Frequently Asked Questions', 4, '2024-01-03', 22),
(697, 'Is there a library on campus?', 1, '2024-01-03', 22),
(698, ' Year 3', 1, '2024-01-03', 22),
(699, 'Systems Administration', 1, '2024-01-03', 22),
(700, 'ShortTitle', 1, '2024-01-03', 22);

-- --------------------------------------------------------

--
-- Table structure for table `CLO`
--

CREATE TABLE `CLO` (
  `OutcomeID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `OutcomeDescription` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CLO`
--

INSERT INTO `CLO` (`OutcomeID`, `CourseID`, `OutcomeDescription`) VALUES
(223, 59, 'Critically evaluate and implement appropriate solutions to interior and exterior routing protocol problems.'),
(224, 59, 'Use specialist skills when designing and configuring a complex LAN infrastructure.'),
(225, 59, 'Critically evaluate and implement Layer 2/Layer 3 Virtual Private Networks (VPNs).'),
(226, 59, 'Design, implement and troubleshoot enterprise level networks.'),
(227, 61, 'Identify and apply a range of statistical measures to defined and undefined ICT scenarios.'),
(228, 61, 'Determine and utilize algebraic number theory principles to solve ICT problems.'),
(229, 61, 'Use some advanced geometrical methods in simulation applications.'),
(230, 61, 'Solve advanced cryptography related problems which are linked to information security.'),
(231, 62, 'Describe the main differences between a Windows-based OS and Unix-based OS'),
(232, 62, 'Use the command-line on a UNIX system'),
(233, 62, 'Manage a Linux server system (including files, processes, users)'),
(234, 62, 'Write scripts to automate repetitive tasks'),
(235, 63, 'Demonstrate detailed knowledge of core database and database design concepts.'),
(236, 63, 'Perform data modelling to produce logical data models using ERD techniques and normalization'),
(237, 63, 'Design and implement a database suitable for an information system'),
(238, 63, 'Use Structured Query Language to perform database operations'),
(239, 63, 'Discuss the principles, regulations and laws related to privacy both in the GCC and Internationally'),
(240, 64, 'Demonstrate detail knowledge of the fundamentals, concepts and technologies of the TCP/IP and OSI networking models.'),
(241, 64, 'Design and implement an IP addressing scheme using VLSM.'),
(242, 64, 'Configure, test and verify network devices.'),
(243, 64, 'Demonstrate detail knowledge of different routing protocols that operate in the network.'),
(244, 65, 'Demonstrate detailed knowledge of primitive data types and basic data structures'),
(245, 65, 'Describe the sequence of steps that a computer takes to translate source code into executable code'),
(246, 65, 'Use diagrams to design solutions for programming problems from a problem description'),
(247, 65, 'Create and test programming solutions to problems using the Java programming language in accordance with best practice, industry standards and professional ethics and following programming and documentation conventions'),
(248, 65, 'Analyse and debug existing programs by following a test plan'),
(249, 66, 'Demonstrate detailed knowledge of the principles of information security and state measures to secure information.'),
(250, 66, 'Develop an information security policy to demonstrate security awareness.'),
(251, 66, 'Perform and report upon an ethical penetration test.'),
(252, 66, 'Demonstrate detailed knowledge of cryptographic methods.'),
(253, 67, 'Design and structure a multi-page website'),
(254, 67, 'Implement consistent and maintainable styling and page structure for a website'),
(255, 67, 'Provide user interactivity in a website'),
(256, 67, 'Demonstrate knowledge of the fundamentals of website implementation'),
(257, 68, 'Demonstrate advanced knowledge of the concepts and basic principles of system development to meet client / community requirements.'),
(258, 68, 'Produce a set of documents and models for a new system by applying fact finding, problem solving and object-oriented analysis modelling techniques and by using appropriate software tools.'),
(259, 69, 'Demonstrate detailed knowledge of core database and database design concepts.'),
(260, 69, 'Perform data modelling to produce logical data models using ERD techniques and normalization'),
(261, 69, 'Design and implement a database suitable for an information system'),
(262, 70, 'Undertake database administration tasks to deal with defined and undefined database operations and to solve encountered issues.'),
(263, 70, 'Demonstrate knowledge of advanced SQL and its usage to solve problems and achieve some specialist level skills.'),
(264, 71, 'Analyze, design and plan an ICT product'),
(265, 71, 'Create a variety of technical documents conforming to industry standards.'),
(266, 71, 'Independently develop an ICT solution according to a design'),
(267, 71, 'Apply specialized skills and detailed knowledge gained in the Bachelor of ICT programme to an approved industry project.'),
(268, 71, 'Critically analyze and evaluate the employability skills required of a work-ready graduate.'),
(269, 72, 'Install and configure an enterprise database to provide a solution for a given customer requirement following industry best practices.'),
(270, 72, 'Plan and implement security policies and procedures to ensure data integrity.'),
(271, 73, 'Utilise data mining software to solve defined and undefined problems'),
(272, 73, 'Interpret and evaluate obtained numerical and graphical data to recommend the best model to be used for prediction purposes.'),
(273, 74, 'Design a user-centric user interface that follows UI and UX best practice.'),
(274, 74, 'Implement complex programs (or Apps) for a mobile platform to a given business requirement'),
(275, 75, 'Demonstrate critical knowledge in Computer Graphics principles and game development concepts, and apply them in a specialised game environment'),
(276, 75, 'Work in teams to create games to a given brief following SCRUM methodology'),
(277, 76, 'Demonstrate critical knowledge of systems administration concepts and principles'),
(278, 76, 'Critically evaluate the requirements of an organisation to design an appropriate server infrastructure'),
(279, 77, 'Demonstrate critical knowledge of the planning, design, deployment, and administration of server systems to support advanced business functions.'),
(280, 77, 'Undertake deployment of server solutions for complex business enterprise requirements.'),
(281, 77, 'Analyse how internet commerce concepts, strategies and infrastructure are brought together to produce an eCommerce solution'),
(282, 77, 'Critically evaluate security practices required for an internet commerce solution according to industry standards'),
(283, 77, 'Demonstrate advanced knowledge of the required protocols for VLAN implementation'),
(284, 77, 'Implement and troubleshoot the VLAN Trunking Protocol (VTP), Inter-VLAN Routing and Spanning Tree Protocol (STP)'),
(285, 78, 'Demonstrate critical knowledge of the security threats facing modern network infrastructures.'),
(286, 78, 'Secure network device access and implement AAA on network devices.'),
(287, 79, 'Demonstrate critical knowledge and understanding of the communications theory fundamentals that allow mobile/wireless networks to function.'),
(288, 79, 'Plan, design and implement wireless communication technologies for given scenarios.');

-- --------------------------------------------------------

--
-- Table structure for table `Complain`
--

CREATE TABLE `Complain` (
  `ComplainId` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `Subject` varchar(200) DEFAULT NULL,
  `Message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Complain`
--

INSERT INTO `Complain` (`ComplainId`, `username`, `Subject`, `Message`) VALUES
(1, 'Sana Hassan', 'Can not open inquiry page.', 'Hi i\'m trying to view the inquiry page but for some reason it keeps giving me error.');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `CourseId` int(11) NOT NULL,
  `CourseCode` varchar(45) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `ShortTitle` varchar(100) DEFAULT NULL,
  `CourseLevel` varchar(50) DEFAULT NULL,
  `ValidFrom` date DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `AssessmentMethod` varchar(100) DEFAULT NULL,
  `CourseAim` varchar(400) DEFAULT NULL,
  `PreRequisite` varchar(100) DEFAULT NULL,
  `Major_MajorId` int(11) NOT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Semester` varchar(2) DEFAULT NULL,
  `uncontrolledAssess` varchar(255) DEFAULT NULL,
  `exams` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CourseId`, `CourseCode`, `CourseTitle`, `ShortTitle`, `CourseLevel`, `ValidFrom`, `Credits`, `AssessmentMethod`, `CourseAim`, `PreRequisite`, `Major_MajorId`, `owner`, `Year`, `Semester`, `uncontrolledAssess`, `exams`) VALUES
(59, 'IT8323', 'Advanced Networking', 'Networking 4', '8', NULL, 15, 'Achievement', 'To provide students with an advanced skills in current network technologies. The course will have a heavy emphasis on troubleshooting problems that occur in networks. Students will have to show problem solving and initiative to solve complex scenarios.   ', 'IT7003', 5, 'ICT', 3, 'B', 'Project (Group)', 'Examination (Practical)'),
(61, 'IT6010', 'Maths for Computing', 'Maths for Computing', '6', NULL, 15, 'Achievement', 'To develop the ability to apply standard mathematical and statistical techniques which can be used in the ICT sector.', '', 6, 'ICT', 1, 'A', 'Practical Project', 'Examination (Practical)'),
(62, 'IT6004', 'Unix Systems', 'UXS', '6', NULL, 15, 'Achievement', 'This course introduces the UNIX operating system from the point of view of an administrator. It has been designed to help students gain the knowledge and skills needed to install, maintain and configure UNIX systems. It defines the essential duties of a UNIX system administrator. This unit also provides students with skills to scripting to automate repetitive tasks.', '', 6, 'ICT', 1, 'A', 'No Uncontrolled Assessments', 'Examination (Theory)'),
(63, 'IT6005', 'Database Systems 1', 'DB1', '6', NULL, 15, 'Achievement', 'To provide students with a detailed knowledge of Database Management Systems used in modern IT organisations. The course will focus on one widely used commercial database, Oracle, and provide students with market relevant skills.', '', 6, 'ICT', 1, 'B', 'Project (Group)', 'Online Quiz'),
(64, 'IT6003', 'Networks and Data Communications', 'Networking 1', '6', NULL, 15, 'Achievement', 'To provide students with an understanding of Computer Networking and the practical skills to implement and troubleshoot small to medium computer networks. Students will configure networks and manage the routers. Students will be introduced to the fundamental building blocks of a communication system and to a variety of networking technologies.', '', 6, 'ICT', 1, 'B', 'Practical Project', 'Examination (Practical)'),
(65, 'IT6008', 'Computer Programming 1', 'CP1', '6', NULL, 15, 'Achievement', 'To provide students with an overview of programming, problem-solving, testing and debugging. It explores many fundamental programming concepts with emphasis on applying theoretical knowledge to a practical situation. It will introduce students to problem-solving with a view to meeting user requirements and designing solutions to programming problems.', '', 6, 'ICT', 1, 'B', 'Online Quiz', 'Examination (Practical)'),
(66, 'IT6011', 'Introduction to Information Security', 'Intro to Info Sec', '6', NULL, 15, 'Achievement', 'To provide students with an understanding of what information security is and its value in modern technology. Students will gain a detailed knowledge of information security through practical skills and analysis of the security requirements of organisations.', 'IT6004 ', 6, 'ICT', 2, 'A', 'Project (Group)', 'Examination (Practical)'),
(67, 'IT6012', 'Web Fundamentals', 'Web Fund', '6', NULL, 15, 'Achievement', 'To introduce students to the fundamental of Web Design and Implementation', 'IT6004 ', 6, 'ICT', 2, 'A', 'Practical Project', 'Examination (Practical)'),
(68, 'IT7001', 'Systems Analysis and Design', 'SAD', '7', NULL, 15, 'Achievement', 'To develop studentsâ€™ abilities to analyse simple and complex information systems, model business and systems requirements, and document logical and physical design solutions by using appropriate methods, techniques, tools and industry standards.', 'IT6005', 6, 'ICT', 2, 'A', 'Project (Group/Individual)', 'Examination (Practical)'),
(69, 'IT6007', 'Database 2', 'DB2', '6', NULL, 15, 'Online Quiz', 'To provide students with a detailed knowledge of Database Management Systems used in modern IT organisations. The course will focus on one widely used commercial database, Oracle, and provide students with market relevant skills.', '', 2, 'ICT', 2, 'B', 'Project (Group)', 'None'),
(70, 'IT7005', 'Database Systems 2', 'DB2', '7', NULL, 15, 'Achievement', 'This course aims to further demonstrate advanced knowledge of database systems, core theories, principles and concepts where such systems fall within an Information Technology infrastructure in an organisation. The course will also expand on database concepts learnt in Database Systems 1 and introduce new database constructs relevant to the workplace.', 'IT6005', 4, 'ICT', 2, 'B', 'Project (Group)', 'Online Quiz'),
(71, 'IT7099', 'IT Project', 'ITP', '7', NULL, 60, 'Achievement', 'To provide students with the skills and attitudes necessary to effectively take the managerial and technical leads on a small project from start to finish.', 'IT7001', 6, 'ICT', 4, 'A', 'Essay', 'No Examinations'),
(72, 'IT8406', 'Database Administration', 'DBA', '8', NULL, 15, 'Achievement', 'To develop expertise in the creation and maintenance of an enterprise class database ensuring its availability and security, improving performance and implementing suitable backup and recovery strategies.', 'IT7005', 4, 'ICT', 3, 'A', 'Project (Group)', 'Examination (Practical)'),
(73, 'IT8416', 'Data Mining', 'DM', '8', NULL, 15, 'Achievement', '	\r\nTo introduce students to the fundamental concepts, algorithms and techniques of Data Mining. To develop studentsâ€™ abilities to apply techniques and software tools to discover hidden  patterns and regularities in databases. Students will then perform analysis to predict future trends.', 'IT6010 ', 4, 'ICT', 3, 'B', 'Project (Group)', 'Examination (quiz)'),
(74, 'IT8108', 'Mobile Programming', 'MP1', '8', NULL, 15, 'Achievement', 'The course introduces fundamental specialized programming concepts for a mobile platform. It provides students with an opportunity to apply the software development life cycle to build an app that meets business requirements with a user-centered focus.', 'IT7008', 2, 'ICT', 3, 'A', 'Project Demonstration', 'No Examinations'),
(75, 'IT8101', 'Games Development', 'Game Dev', '8', NULL, 15, 'Viva voce examination', 'The course introduces advanced game development concepts using a commercial game engine to allow students to develop practical skills in constructing game components and integrating them to a playable game demo (developed using rapid prototyping)   ', 'IT7008', 2, 'ICT', 3, 'B', 'Project (Group)', '\r\nNo Examinations'),
(76, 'IT8203', 'Systems Administration', 'SysAdmin', '8', NULL, 15, 'Achievement', 'The aim of this course is to enable students to operate with current technologies, tools and techniques in Systems Administration. Students will be able to design server infrastructure to meet the demands of a modern IT Organisation, while demonstrating a critical awareness of industry best practice and norms.', 'IT6004 & IT7004 ', 3, 'ICT', 3, 'A', 'Practical Project', 'Examination (Unseen)'),
(77, 'IT7004', 'Operating Systems and Platforms', 'OSP', '7', NULL, 15, 'Achievement', 'During this course students will build their technical skills in IT planning, design, installation, configuration and administration of server infrastructure for an enterprise environment.', 'IT6003 & IT6001 ', 3, 'ICT', 2, 'B', 'Practical Project', 'Online Quiz'),
(78, 'IT8303', 'Computer Networking 3', 'Networking 3', '8', NULL, 15, 'Achievement', 'To introduce the core security concepts and skills needed for the installation, troubleshooting, and monitoring of network devices to maintain the integrity, confidentiality, and availability of data, infrastructure and services.', 'IT7003	', 5, 'ICT', 3, 'A', 'Project (Group)', 'Examination (Practical)'),
(79, 'IT8313', 'Wireless Communications', 'WirelessComm', '8', NULL, 15, 'Achievement', 'To provide students with an advanced understanding of mobile and wireless communication concepts. To allow students to design and implement a modern mobile/wireless infrastructure in a specialist level, similar to the ones implemented by the mobile carriers in Bahrain.', 'IT7003', 5, 'ICT', 3, 'B', 'Project (Group)', 'Oral questioning after observation');

-- --------------------------------------------------------

--
-- Table structure for table `Descriptor`
--

CREATE TABLE `Descriptor` (
  `FileId` int(11) NOT NULL,
  `FileLocation` varchar(255) DEFAULT NULL,
  `FileType` varchar(50) DEFAULT NULL,
  `FileName` varchar(100) DEFAULT NULL,
  `User_UserId` int(11) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Descriptor`
--

INSERT INTO `Descriptor` (`FileId`, `FileLocation`, `FileType`, `FileName`, `User_UserId`, `CourseId`) VALUES
(28, 'images/9119546_Course Advanced Networking    Advanced Networking   .pdf', '', '9119546_Course Advanced Networking    Advanced Networking   .pdf', 1, 1),
(29, 'images/8368851_Course Advanced Networking    Advanced Networking   .pdf', '', '8368851_Course Advanced Networking    Advanced Networking   .pdf', 1, 59),
(30, 'images/5263608_Course Maths for Computing Maths for Computing.pdf', '', '5263608_Course Maths for Computing Maths for Computing.pdf', 1, 61),
(31, 'images/2501876_Course Unix Systems Unix Systems.pdf', '', '2501876_Course Unix Systems Unix Systems.pdf', 1, 62),
(32, 'images/9569697_Course Database Systems 1 Database Systems 1.pdf', '', '9569697_Course Database Systems 1 Database Systems 1.pdf', 1, 63),
(33, 'images/3477472_Course Networks and Data Communications Networks and Data Communications.pdf', '', '3477472_Course Networks and Data Communications Networks and Data Communications.pdf', 1, 64),
(34, 'images/6890652_Course Computer Programming 1 Computer Programming 1.pdf', '', '6890652_Course Computer Programming 1 Computer Programming 1.pdf', 1, 65),
(35, 'images/8955057_Course Introduction to Information Security Introduction to Information Security.pdf', '', '8955057_Course Introduction to Information Security Introduction to Information Security.pdf', 1, 66),
(36, 'images/4975699_Course Web Fundamentals Web Fundamentals (1).pdf', '', '4975699_Course Web Fundamentals Web Fundamentals (1).pdf', 1, 67),
(37, 'images/9696571_Course Systems Analysis and Design  Systems Analysis and Design .pdf', '', '9696571_Course Systems Analysis and Design  Systems Analysis and Design .pdf', 1, 68),
(38, 'images/3295963_Course Database Systems 1 Database Systems 1 (1).pdf', '', '3295963_Course Database Systems 1 Database Systems 1 (1).pdf', 1, 69),
(39, 'images/1411514_Course Database Systems 2 Database Systems 2.pdf', '', '1411514_Course Database Systems 2 Database Systems 2.pdf', 1, 70),
(40, 'images/6327628_Course IT Project  IT Project .pdf', '', '6327628_Course IT Project  IT Project .pdf', 1, 71),
(41, 'images/8013937_Course Database Administration  Database Administration .pdf', '', '8013937_Course Database Administration  Database Administration .pdf', 1, 72),
(42, 'images/8381741_Course Data Mining    Data Mining   .pdf', '', '8381741_Course Data Mining    Data Mining   .pdf', 1, 73),
(43, 'images/7361896_Course Mobile Programming  Mobile Programming .pdf', '', '7361896_Course Mobile Programming  Mobile Programming .pdf', 1, 74),
(44, 'images/171117_Course Games Development  Games Development .pdf', '', '171117_Course Games Development  Games Development .pdf', 1, 75),
(45, 'images/3700122_Course Systems Administration  Systems Administration .pdf', '', '3700122_Course Systems Administration  Systems Administration .pdf', 1, 76),
(46, 'images/1022543_Course Operating Systems and Platforms Operating Systems and Platforms.pdf', '', '1022543_Course Operating Systems and Platforms Operating Systems and Platforms.pdf', 1, 77),
(47, 'images/6692057_Course Computer Networking 3  Computer Networking 3 .pdf', '', '6692057_Course Computer Networking 3  Computer Networking 3 .pdf', 1, 78),
(48, 'images/1930127_Course Wireless Communications    Wireless Communications   .pdf', '', '1930127_Course Wireless Communications    Wireless Communications   .pdf', 1, 79);

-- --------------------------------------------------------

--
-- Table structure for table `FAQ`
--

CREATE TABLE `FAQ` (
  `FaqId` int(11) NOT NULL,
  `FQuestion` varchar(200) NOT NULL,
  `FAnswer` varchar(200) NOT NULL,
  `User_UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FAQ`
--

INSERT INTO `FAQ` (`FaqId`, `FQuestion`, `FAnswer`, `User_UserId`) VALUES
(12, 'How many credits can a student take per semester?', '75 credits', 1),
(15, 'When will the registration for new semester open?', 'Jan 2024', 1),
(16, 'Where can i find the course guides?', 'Moodle -> Support -> Information Hub -> Courses', 1),
(17, 'What are the NRQ courses available this semester (2023-2024)?', 'Introductory Arabic, Bahrain History, Arabic, Human Rights.', 1),
(19, 'What resources are available for career counseling and job placement?', 'Our Career Services department offers counseling, workshops, and connects students with employers.', 1),
(20, 'Is there a library on campus?', 'Yes, we have a well-equipped library with a wide range of resources and study facilities.', 1),
(21, 'How can I get involved in extracurricular activities and clubs?', 'Visit our Student Affairs office or check our website for a list of clubs and organizations to join.', 1),
(22, 'What academic support services are available for students?', 'We offer tutoring, study skills workshops, and a writing center for academic support.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Files`
--

CREATE TABLE `Files` (
  `FileId` int(11) NOT NULL,
  `FileLocation` varchar(300) NOT NULL,
  `FileType` varchar(300) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `Answers_AnsId` int(11) NOT NULL,
  `User_UserId` int(11) NOT NULL,
  `Questions_QuestionId` int(11) NOT NULL,
  `QId` int(11) DEFAULT NULL,
  `AId` int(11) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Flag`
--

CREATE TABLE `Flag` (
  `FlagId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `QuestionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Flag`
--

INSERT INTO `Flag` (`FlagId`, `UserId`, `QuestionId`) VALUES
(25, 10, 54);

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `LikesId` int(11) NOT NULL,
  `action` enum('like','dislike') DEFAULT NULL,
  `Answers_AnsId` int(11) NOT NULL,
  `Answers_Questions_QuestionId` int(11) NOT NULL,
  `Answers_User_UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Logs`
--

CREATE TABLE `Logs` (
  `LogId` int(11) NOT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Action` varchar(50) DEFAULT NULL,
  `Time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Logs`
--

INSERT INTO `Logs` (`LogId`, `UserName`, `Action`, `Time`) VALUES
(4, '202003059', 'Logged in', '2023-11-19 14:01:51'),
(5, '202003059', 'Logged out', '2023-11-19 14:06:19'),
(6, '202003059', 'Logged in', '2023-11-19 14:12:32'),
(7, '202003059', 'Logged in', '2023-11-20 10:15:11'),
(8, '202003059', 'Logged in', '2023-11-20 10:21:47'),
(9, '202003059', 'Logged in', '2023-11-20 12:05:18'),
(29, '202003059', 'Logged in', '2023-12-04 13:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `Major`
--

CREATE TABLE `Major` (
  `MajorId` int(11) NOT NULL,
  `MajorName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Major`
--

INSERT INTO `Major` (`MajorId`, `MajorName`) VALUES
(2, 'Programming'),
(3, 'Information Systems'),
(4, 'Database Systems'),
(5, 'Networking'),
(6, 'Core ICT');

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

CREATE TABLE `Notifications` (
  `NotifId` int(11) NOT NULL,
  `NotifMsg` varchar(45) NOT NULL,
  `TimeStamp` date NOT NULL,
  `ReadStatus` varchar(45) NOT NULL,
  `User_UserId` int(11) NOT NULL,
  `Answers_AnsId` int(11) NOT NULL,
  `Course_CourseId` int(11) NOT NULL,
  `Questions_QuestionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `QuestionId` int(11) NOT NULL,
  `QuesTitle` varchar(100) NOT NULL,
  `QuesDescription` varchar(2000) NOT NULL,
  `Tags` varchar(300) DEFAULT NULL,
  `Likes` int(11) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Course_CourseId` int(11) NOT NULL,
  `User_UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`QuestionId`, `QuesTitle`, `QuesDescription`, `Tags`, `Likes`, `Time`, `Course_CourseId`, `User_UserId`) VALUES
(47, 'What is the most easiest elective to take from the major subjects?', 'Hi have to choose an elective along with my in-house, I have two options to choose from IT7405 and IT8042, Can you guys advise as to which one would be easier?', '', 0, '2023-12-07 11:29:49', 59, 1),
(50, 'Is AWS CIC programme a good opportunity in final semester?', 'Hi, I have to take CLP course next semester, and for that I need to choose a company, I have applied to the AWS CIC Program, but I am just a little worried if it would be too hard as I will also have an elective next semester. Any suggestion guys?\r\n', 'CLP, Final Year', 0, '2023-12-27 01:42:39', 61, 1),
(54, 'Explain the concept of cloud computing.', 'Cloud services can easily scale up or down to meet changing demands, allowing businesses to quickly adjust their resource allocation without the need for significant hardware investments. Can you help with this submission ', 'CLP, Final Year', 0, '2024-01-02 18:40:02', 63, 1),
(55, 'Can someone please xplain the concept of cybersecurity', 'Hi i\'m having ahard time understanding the concept of cybersecurity. Could you please help?', 'CLP, Final Year', 0, '2024-01-02 18:56:36', 65, 1),
(59, 'What is symmetric encryption and asymmetric encryption? Provide an example of each.', 'Hi, could you please help me with this question?', '', 0, '2024-01-02 19:24:47', 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`RoleId`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'Program Manager'),
(3, 'Registry'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `SavedPosts`
--

CREATE TABLE `SavedPosts` (
  `SavedPostId` int(11) NOT NULL,
  `User_UserId` int(11) DEFAULT NULL,
  `Questions_QuestionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Subscriptions`
--

CREATE TABLE `Subscriptions` (
  `SubsId` int(11) NOT NULL,
  `User_UserId` int(11) NOT NULL,
  `Course_CourseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subscriptions`
--

INSERT INTO `Subscriptions` (`SubsId`, `User_UserId`, `Course_CourseId`) VALUES
(5, 1, 59),
(6, 1, 62),
(9, 2, 64),
(10, 1, 67);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Roles_RoleId` int(11) NOT NULL,
  `UserDp` varchar(200) DEFAULT NULL,
  `Saved_posts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `agree_to_policy` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `UserName`, `Email`, `FirstName`, `LastName`, `Password`, `Roles_RoleId`, `UserDp`, `Saved_posts`, `agree_to_policy`) VALUES
(1, '202001312', '202001312@student.polytechnic.bh', 'Fatima', 'Madan', '½Ÿr8â_¡ÄlûÓY¯b', 1, 'img//WhatsApp Image 2023-12-08 at 10.13.03 PM (1).jpeg', NULL, 1),
(2, '202001313', '202001313@student.polytechnic.bh', 'Aysha', 'Amjad', '½Ÿr8â_¡ÄlûÓY¯b', 4, 'img/dp.jpg', NULL, 0),
(3, '202001314', '202001314@student.polytechnic.bh', 'Zahraa', 'Alasbool', '½Ÿr8â_¡ÄlûÓY¯b', 2, 'img//team-3.jpg', NULL, 0),
(4, '202001315', '202001315@student.polytechnic.bh', 'Malak', 'Almajed', '½Ÿr8â_¡ÄlûÓY¯b', 3, 'img/dp.jpg', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`AnsId`,`Questions_QuestionId`,`User_UserId`),
  ADD KEY `fk_Answers_Questions1_idx` (`Questions_QuestionId`),
  ADD KEY `fk_Answers_User1_idx` (`User_UserId`);

--
-- Indexes for table `bot_history`
--
ALTER TABLE `bot_history`
  ADD PRIMARY KEY (`convo_id`),
  ADD KEY `fk_bot_history_user_id` (`user_id`);

--
-- Indexes for table `bot_reports`
--
ALTER TABLE `bot_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `CLO`
--
ALTER TABLE `CLO`
  ADD PRIMARY KEY (`OutcomeID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`CourseId`,`Major_MajorId`),
  ADD UNIQUE KEY `CourseCode_UNIQUE` (`CourseCode`),
  ADD KEY `fk_Course_Major1_idx` (`Major_MajorId`);
ALTER TABLE `Course` ADD FULLTEXT KEY `CourseCode` (`CourseCode`,`CourseTitle`,`ShortTitle`);
ALTER TABLE `Course` ADD FULLTEXT KEY `CourseCode_2` (`CourseCode`,`CourseTitle`,`ShortTitle`);

--
-- Indexes for table `Descriptor`
--
ALTER TABLE `Descriptor`
  ADD PRIMARY KEY (`FileId`),
  ADD KEY `User_UserId` (`User_UserId`);

--
-- Indexes for table `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`FaqId`,`User_UserId`),
  ADD KEY `fk_FAQ_User1_idx` (`User_UserId`);

--
-- Indexes for table `Files`
--
ALTER TABLE `Files`
  ADD PRIMARY KEY (`FileId`,`Answers_AnsId`,`User_UserId`,`Questions_QuestionId`),
  ADD KEY `fk_Files_Answers1_idx` (`Answers_AnsId`),
  ADD KEY `fk_Files_User1_idx` (`User_UserId`),
  ADD KEY `fk_Files_Questions1_idx` (`Questions_QuestionId`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`LikesId`,`Answers_AnsId`,`Answers_Questions_QuestionId`,`Answers_User_UserId`),
  ADD KEY `fk_Likes_Answers1` (`Answers_AnsId`,`Answers_Questions_QuestionId`,`Answers_User_UserId`);

--
-- Indexes for table `Major`
--
ALTER TABLE `Major`
  ADD PRIMARY KEY (`MajorId`);

--
-- Indexes for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`NotifId`,`User_UserId`,`Answers_AnsId`,`Course_CourseId`,`Questions_QuestionId`),
  ADD KEY `fk_Notifications_User1_idx` (`User_UserId`),
  ADD KEY `fk_Notifications_Answers1_idx` (`Answers_AnsId`),
  ADD KEY `fk_Notifications_Course1_idx` (`Course_CourseId`),
  ADD KEY `fk_Notifications_Questions1_idx` (`Questions_QuestionId`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`QuestionId`,`Course_CourseId`,`User_UserId`),
  ADD KEY `fk_QuestionBank_Course1_idx` (`Course_CourseId`),
  ADD KEY `fk_Questions_User1_idx` (`User_UserId`);
ALTER TABLE `Questions` ADD FULLTEXT KEY `QuesTitle` (`QuesTitle`,`QuesDescription`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `SavedPosts`
--
ALTER TABLE `SavedPosts`
  ADD PRIMARY KEY (`SavedPostId`),
  ADD KEY `User_UserId` (`User_UserId`),
  ADD KEY `Questions_QuestionId` (`Questions_QuestionId`);

--
-- Indexes for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  ADD PRIMARY KEY (`SubsId`,`User_UserId`,`Course_CourseId`),
  ADD KEY `fk_Subscriptions_User1_idx` (`User_UserId`),
  ADD KEY `fk_Subscriptions_Course1_idx` (`Course_CourseId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`,`Roles_RoleId`),
  ADD KEY `fk_Users_Roles_idx` (`Roles_RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answers`
--
ALTER TABLE `Answers`
  MODIFY `AnsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bot_history`
--
ALTER TABLE `bot_history`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=842;

--
-- AUTO_INCREMENT for table `bot_reports`
--
ALTER TABLE `bot_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;

--
-- AUTO_INCREMENT for table `CLO`
--
ALTER TABLE `CLO`
  MODIFY `OutcomeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `Descriptor`
--
ALTER TABLE `Descriptor`
  MODIFY `FileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `FaqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `Files`
--
ALTER TABLE `Files`
  MODIFY `FileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `LikesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Major`
--
ALTER TABLE `Major`
  MODIFY `MajorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `NotifId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `SavedPosts`
--
ALTER TABLE `SavedPosts`
  MODIFY `SavedPostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  MODIFY `SubsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `Answers_ibfk_1` FOREIGN KEY (`Questions_QuestionId`) REFERENCES `Questions` (`QuestionId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Answers_User1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bot_history`
--
ALTER TABLE `bot_history`
  ADD CONSTRAINT `fk_bot_history_user_id` FOREIGN KEY (`user_id`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `CLO`
--
ALTER TABLE `CLO`
  ADD CONSTRAINT `CLO_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseId`) ON DELETE CASCADE;

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `fk_Course_Major1` FOREIGN KEY (`Major_MajorId`) REFERENCES `Major` (`MajorId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Descriptor`
--
ALTER TABLE `Descriptor`
  ADD CONSTRAINT `Descriptor_ibfk_1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `FAQ`
--
ALTER TABLE `FAQ`
  ADD CONSTRAINT `fk_FAQ_User1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Files`
--
ALTER TABLE `Files`
  ADD CONSTRAINT `fk_Files_Answers1` FOREIGN KEY (`Answers_AnsId`) REFERENCES `Answers` (`AnsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Files_Questions1` FOREIGN KEY (`Questions_QuestionId`) REFERENCES `Questions` (`QuestionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Files_User1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`Answers_AnsId`,`Answers_Questions_QuestionId`,`Answers_User_UserId`) REFERENCES `Answers` (`AnsId`, `Questions_QuestionId`, `User_UserId`) ON DELETE CASCADE;

--
-- Constraints for table `Notifications`
--
ALTER TABLE `Notifications`
  ADD CONSTRAINT `fk_Notifications_Answers1` FOREIGN KEY (`Answers_AnsId`) REFERENCES `Answers` (`AnsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Notifications_Course1` FOREIGN KEY (`Course_CourseId`) REFERENCES `Course` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Notifications_Questions1` FOREIGN KEY (`Questions_QuestionId`) REFERENCES `Questions` (`QuestionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Notifications_User1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `fk_QuestionBank_Course1` FOREIGN KEY (`Course_CourseId`) REFERENCES `Course` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Questions_User1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SavedPosts`
--
ALTER TABLE `SavedPosts`
  ADD CONSTRAINT `SavedPosts_ibfk_1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `SavedPosts_ibfk_3` FOREIGN KEY (`Questions_QuestionId`) REFERENCES `Questions` (`QuestionId`) ON DELETE CASCADE;

--
-- Constraints for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  ADD CONSTRAINT `fk_Subscriptions_Course1` FOREIGN KEY (`Course_CourseId`) REFERENCES `Course` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Subscriptions_User1` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `fk_Users_Roles` FOREIGN KEY (`Roles_RoleId`) REFERENCES `Role` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
