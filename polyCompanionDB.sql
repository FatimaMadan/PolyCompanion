-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2024 at 07:12 PM
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
(4, 'Hey, yess go with web-fundamentals. if you need dufrfhja sfjsa kdsjg lkdsj gjkds giweupqr uqeiru lkasdjg mzsbgmzmv xzvsjdhfjk sagywuryewt znv xz lasdhkjdsf uweytiqtqpeiwuiy fsjdvbxznmv kajhdkda It\'s super easy. I took it last semester along with my in-house project and it went really well. There\'s just one mid-term exam and a project. You can easily get like an A in it.', 2, '2023-11-13 07:01:45', 41, 1),
(5, 'hjkhd', 3, '2023-11-13 07:01:45', 41, 1),
(6, 'hoooo', 2, '2023-11-13 07:01:45', 41, 1),
(7, 'he he ha ha is an answer ', 2, '2023-11-13 07:01:45', 41, 1),
(8, 'hhoooooooooo', 6, '2023-11-13 07:01:45', 41, 1),
(9, 'final answer file test ', 1, '2023-11-13 07:01:45', 41, 1),
(10, 'time test', 2, '2023-11-13 07:02:13', 41, 1),
(11, 'user test answer', 0, '2023-11-13 07:03:07', 41, 4),
(12, 'Hey, yess go with web-fundamentals. if you need dufrfhja sfjsa kdsjg lkdsj gjkds giweupqr uqeiru lkasdjg mzsbgmzmv xzvsjdhfjk sagywuryewt znv xz lasdhkjdsf uweytiqtqpeiwuiy fsjdvbxznmv kajhdkda It\'s super easy. I took it last semester along with my in-house project and it went really well. There\'s just one mid-term exam and a project. You can easily get like an A in it.', 1, '2023-11-13 07:03:33', 41, 4),
(14, 'hds', 2, '2024-01-02 18:31:24', 46, 8),
(15, 'hfhjsk', 11, '2024-01-02 18:31:36', 27, 8),
(16, 'fhjsdyfiuew', 9, '2024-01-02 18:31:51', 40, 7),
(17, 'fwgeu', 80, '2024-01-02 18:32:01', 39, 5),
(18, 'fuyeuir', 80, '2024-01-02 18:32:20', 40, 5),
(19, 'r8hfuhif', 3, '2024-01-02 18:32:20', 46, 3),
(20, 'hdjhfjd', 33, '2024-01-02 18:32:29', 19, 7),
(21, 'hii', 0, '2024-01-02 18:47:52', 54, 10);

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
(207, 8, '2023-12-13 17:57:38', 'How many credits can a students take per semester?'),
(208, 8, '2023-12-13 17:57:46', ' Yes'),
(209, 8, '2023-12-13 18:04:15', 'How many credits can a students take per semester?'),
(210, 8, '2023-12-13 18:04:30', ' No'),
(211, 8, '2023-12-13 18:04:35', ' Very helpful'),
(212, 8, '2023-12-13 18:07:39', 'I want to see the Most Frequently Asked Questions'),
(213, 8, '2023-12-13 18:07:41', 'How many credits can a students take per semester?'),
(214, 8, '2023-12-13 18:07:42', ' Yes'),
(215, 8, '2023-12-13 18:07:44', 'I want to see the Most Frequently Asked Questions'),
(216, 8, '2023-12-13 18:07:45', 'How many credits can a students take per semester?'),
(217, 8, '2023-12-13 18:07:47', 'When will the semester fees pay period end?'),
(218, 8, '2023-12-13 18:07:48', ' No'),
(219, 8, '2023-12-13 18:09:36', ' Yes'),
(220, 8, '2023-12-13 18:09:38', 'I want to see the Most Frequently Asked Questions'),
(221, 8, '2023-12-13 18:09:40', 'How many credits can a students take per semester?'),
(222, 8, '2023-12-13 18:09:41', ' Yes'),
(223, 8, '2023-12-13 18:09:42', 'I want to see the Most Frequently Asked Questions'),
(224, 8, '2023-12-13 18:09:44', 'How many credits can a students take per semester?'),
(225, 8, '2023-12-13 18:09:45', 'When will the semester fees pay period end?'),
(226, 8, '2023-12-13 18:09:46', ' No'),
(227, 8, '2023-12-13 18:09:48', ' Very helpful'),
(228, 8, '2023-12-13 18:11:46', ' Yes'),
(229, 8, '2023-12-13 18:11:48', 'I want to see the Most Frequently Asked Questions'),
(230, 8, '2023-12-13 18:11:49', 'I have a question about a specific course'),
(231, 8, '2023-12-13 18:11:50', 'How many credits can a students take per semester?'),
(232, 8, '2023-12-13 18:11:51', ' Yes'),
(233, 8, '2023-12-13 18:11:52', 'I want to see the Most Frequently Asked Questions'),
(234, 8, '2023-12-13 18:11:53', 'How many credits can a students take per semester?'),
(235, 8, '2023-12-13 18:11:55', ' Yes'),
(236, 8, '2023-12-13 18:11:55', 'I want to see the Most Frequently Asked Questions'),
(237, 8, '2023-12-13 18:11:57', 'When will the semester fees pay period end?'),
(238, 8, '2023-12-13 18:11:58', ' No'),
(239, 8, '2023-12-13 18:12:00', ' Very helpful'),
(240, 8, '2023-12-13 18:13:42', 'I want to see the Most Frequently Asked Questions'),
(241, 8, '2023-12-13 18:13:43', 'How many credits can a students take per semester?'),
(242, 8, '2023-12-13 18:13:45', ' No'),
(243, 8, '2023-12-13 18:13:46', ' Very helpful'),
(244, 8, '2023-12-13 18:13:47', ' Yes'),
(245, 8, '2023-12-13 18:13:49', 'I have a question about a specific course'),
(246, 8, '2023-12-13 18:13:50', 'Programming'),
(247, 8, '2023-12-13 18:13:51', ' Year 1'),
(248, 8, '2023-12-13 18:13:52', ' Semester A'),
(249, 8, '2023-12-13 18:13:54', 'I want to see the Most Frequently Asked Questions'),
(250, 8, '2023-12-13 18:13:56', 'How many credits can a students take per semester?'),
(251, 8, '2023-12-13 18:13:57', ' Yes'),
(252, 8, '2023-12-13 18:13:58', 'I want to see the Most Frequently Asked Questions'),
(253, 8, '2023-12-13 18:13:59', 'I have a question about a specific course'),
(254, 8, '2023-12-13 18:16:07', 'How many credits can a students take per semester?'),
(255, 8, '2023-12-13 18:16:09', 'How many credits can a students take per semester?'),
(256, 8, '2023-12-13 18:16:11', 'Programming'),
(257, 8, '2023-12-13 18:16:12', ' Yes'),
(258, 8, '2023-12-13 18:16:13', 'I want to see the Most Frequently Asked Questions'),
(259, 8, '2023-12-13 18:16:14', 'How many credits can a students take per semester?'),
(260, 8, '2023-12-13 18:16:15', 'I want to see the Most Frequently Asked Questions'),
(261, 8, '2023-12-13 18:16:17', 'How many credits can a students take per semester?'),
(262, 8, '2023-12-13 18:16:18', ' Yes'),
(263, 8, '2023-12-13 18:16:19', 'I want to see the Most Frequently Asked Questions'),
(264, 8, '2023-12-13 18:16:20', 'How many credits can a students take per semester?'),
(265, 8, '2023-12-13 18:16:22', ' No'),
(266, 8, '2023-12-13 18:16:23', ' Very helpful'),
(267, 8, '2023-12-13 18:18:10', ' Yes'),
(268, 8, '2023-12-13 18:18:11', 'I want to see the Most Frequently Asked Questions'),
(269, 8, '2023-12-13 18:18:12', 'How many credits can a students take per semester?'),
(270, 8, '2023-12-13 18:18:14', ' Yes'),
(271, 8, '2023-12-13 18:18:15', 'I want to see the Most Frequently Asked Questions'),
(272, 8, '2023-12-13 18:18:16', 'How many credits can a students take per semester?'),
(273, 8, '2023-12-13 18:18:18', ' Yes'),
(274, 8, '2023-12-13 18:22:22', 'I want to see the Most Frequently Asked Questions'),
(275, 8, '2023-12-13 18:22:23', 'How many credits can a students take per semester?'),
(276, 8, '2023-12-13 18:22:24', ' Yes'),
(277, 8, '2023-12-13 18:22:25', 'I want to see the Most Frequently Asked Questions'),
(278, 8, '2023-12-13 18:22:26', 'How many credits can a students take per semester?'),
(279, 8, '2023-12-13 18:22:28', ' No'),
(280, 8, '2023-12-13 18:22:29', ' Very helpful'),
(281, 8, '2023-12-13 18:23:01', ' Very helpful'),
(282, 8, '2023-12-13 18:23:03', ' Yes'),
(283, 8, '2023-12-13 18:23:04', 'I want to see the Most Frequently Asked Questions'),
(284, 8, '2023-12-13 18:23:05', 'How many credits can a students take per semester?'),
(285, 8, '2023-12-13 18:23:06', ' Yes'),
(286, 8, '2023-12-13 18:23:07', 'I want to see the Most Frequently Asked Questions'),
(287, 8, '2023-12-13 18:26:00', 'How many credits can a students take per semester?'),
(288, 8, '2023-12-13 18:26:01', ' Yes'),
(289, 8, '2023-12-13 18:26:02', 'I want to see the Most Frequently Asked Questions'),
(290, 8, '2023-12-13 18:26:03', 'How many credits can a students take per semester?'),
(291, 8, '2023-12-13 18:26:04', ' Yes'),
(292, 8, '2023-12-13 18:26:05', 'I want to see the Most Frequently Asked Questions'),
(293, 8, '2023-12-13 18:26:06', 'How many credits can a students take per semester?'),
(294, 8, '2023-12-13 18:26:07', ' Yes'),
(295, 8, '2023-12-28 22:43:14', 'I want to see the Most Frequently Asked Questions'),
(296, 8, '2023-12-28 22:43:15', 'How many credits can a students take per semester?'),
(297, 8, '2023-12-28 22:43:18', ' No'),
(298, 8, '2023-12-28 22:44:31', ' Very helpful'),
(299, 8, '2023-12-29 22:46:11', 'I have a question about a specific course'),
(348, 1, '2024-01-01 02:56:11', 'access Polybot page'),
(349, 10, '2024-01-01 02:57:27', 'access Polybot page'),
(350, 10, '2024-01-01 02:57:32', 'access Polybot page'),
(351, 10, '2024-01-01 03:02:30', 'access Polybot page'),
(352, 10, '2024-01-01 03:05:16', 'access Polybot page'),
(353, 10, '2024-01-01 03:29:12', 'access Polybot page'),
(354, 10, '2024-01-01 03:30:59', 'access Polybot page'),
(355, 10, '2024-01-01 03:31:04', 'access Polybot page'),
(356, 10, '2024-01-01 03:33:12', 'access Polybot page'),
(357, 10, '2024-01-01 03:34:28', 'access Polybot page'),
(358, 10, '2024-01-01 03:35:03', 'access Polybot page'),
(359, 10, '2024-01-01 03:36:22', 'access Polybot page'),
(360, 10, '2024-01-01 03:37:28', 'access Polybot page'),
(361, 10, '2024-01-01 03:38:23', 'access Polybot page'),
(362, 10, '2024-01-01 11:28:36', 'access Polybot page'),
(363, 10, '2024-01-01 11:29:37', 'access Polybot page'),
(364, 10, '2024-01-01 11:30:15', 'access Polybot page'),
(365, 10, '2024-01-01 11:30:17', 'I have a question about a specific course'),
(366, 10, '2024-01-01 11:30:19', 'I want to see the Most Frequently Asked Questions'),
(367, 10, '2024-01-01 11:30:20', 'How many credits can a students take per semester?'),
(368, 10, '2024-01-01 11:30:22', ' Yes'),
(369, 10, '2024-01-01 11:30:24', ' No'),
(370, 10, '2024-01-01 11:30:25', ' Very helpful'),
(371, 10, '2024-01-01 11:33:50', 'access Polybot page'),
(372, 10, '2024-01-01 11:33:59', ' Very helpful'),
(373, 10, '2024-01-01 11:45:57', 'access Polybot page'),
(374, 10, '2024-01-01 11:47:50', 'access Polybot page'),
(375, 10, '2024-01-01 11:49:56', 'access Polybot page'),
(376, 10, '2024-01-01 12:00:48', 'access Polybot page'),
(377, 10, '2024-01-01 12:02:20', 'access Polybot page'),
(378, 10, '2024-01-01 12:05:36', 'access Polybot page'),
(379, 10, '2024-01-01 12:11:48', 'access Polybot page'),
(380, 10, '2024-01-01 12:13:48', 'access Polybot page'),
(381, 10, '2024-01-01 12:15:02', 'access Polybot page'),
(382, 10, '2024-01-01 12:22:03', 'access Polybot page'),
(383, 10, '2024-01-01 12:25:57', 'access Polybot page'),
(400, 10, '2024-01-01 14:37:33', 'access Polybot page'),
(401, 10, '2024-01-01 14:43:18', 'access Polybot page'),
(402, 10, '2024-01-01 14:45:36', 'access Polybot page'),
(403, 10, '2024-01-01 14:45:56', 'access Polybot page'),
(404, 10, '2024-01-01 14:45:58', 'I have a question about a specific course'),
(405, 10, '2024-01-01 14:45:59', 'Programming'),
(406, 10, '2024-01-01 14:46:00', ' Year 1'),
(407, 10, '2024-01-01 14:46:02', ' Semester A'),
(408, 10, '2024-01-01 14:46:03', ' Year 2'),
(409, 10, '2024-01-01 14:46:04', ' Semester B'),
(410, 10, '2024-01-01 14:46:07', 'Database Systems'),
(411, 10, '2024-01-01 14:46:09', ' Year 1'),
(412, 10, '2024-01-01 14:46:09', ' Semester A'),
(413, 10, '2024-01-01 14:46:10', ' Semester B'),
(414, 10, '2024-01-01 14:46:22', 'access Polybot page'),
(415, 10, '2024-01-01 15:40:11', 'access Polybot page'),
(416, 10, '2024-01-01 15:42:43', 'access Polybot page'),
(417, 10, '2024-01-01 15:43:16', 'access Polybot page'),
(418, 10, '2024-01-01 15:45:02', 'access Polybot page'),
(419, 10, '2024-01-01 15:45:38', 'access Polybot page'),
(420, 10, '2024-01-01 15:45:41', 'access Polybot page'),
(421, 10, '2024-01-01 15:45:44', 'access Polybot page'),
(422, 10, '2024-01-01 15:45:52', 'access Polybot page'),
(423, 10, '2024-01-01 15:46:39', 'access Polybot page'),
(424, 10, '2024-01-01 15:49:04', 'access Polybot page'),
(425, 10, '2024-01-01 15:51:29', 'access Polybot page'),
(426, 10, '2024-01-01 15:59:50', 'access Polybot page'),
(427, 10, '2024-01-01 16:00:02', 'access Polybot page'),
(428, 10, '2024-01-01 16:00:04', 'access Polybot page'),
(429, 10, '2024-01-01 16:00:05', 'access Polybot page'),
(430, 10, '2024-01-01 16:00:15', 'access Polybot page'),
(431, 10, '2024-01-01 16:00:27', 'access Polybot page'),
(432, 10, '2024-01-01 16:07:05', 'access Polybot page'),
(433, 10, '2024-01-01 16:07:08', 'access Polybot page'),
(434, 10, '2024-01-01 16:07:21', 'access Polybot page'),
(435, 10, '2024-01-01 16:08:14', 'access Polybot page'),
(436, 10, '2024-01-01 16:08:16', 'access Polybot page'),
(437, 10, '2024-01-01 16:08:25', 'access Polybot page'),
(438, 10, '2024-01-01 16:10:14', 'access Polybot page'),
(439, 10, '2024-01-01 16:10:18', 'access Polybot page'),
(440, 10, '2024-01-01 16:10:27', 'access Polybot page'),
(441, 10, '2024-01-01 16:12:33', 'access Polybot page'),
(442, 10, '2024-01-01 16:12:45', 'access Polybot page'),
(443, 10, '2024-01-01 16:15:00', 'access Polybot page'),
(444, 10, '2024-01-01 16:15:04', 'access Polybot page'),
(445, 10, '2024-01-01 16:15:17', 'access Polybot page'),
(446, 10, '2024-01-01 16:18:05', 'access Polybot page'),
(447, 10, '2024-01-01 16:18:08', 'access Polybot page'),
(448, 10, '2024-01-01 16:18:17', 'access Polybot page'),
(449, 10, '2024-01-01 16:18:40', 'access Polybot page'),
(450, 10, '2024-01-01 16:26:16', 'I have a question about a specific course'),
(451, 10, '2024-01-01 16:26:16', 'access Polybot page'),
(452, 10, '2024-01-01 16:26:16', 'I have a question about a specific course'),
(453, 10, '2024-01-01 16:26:17', 'I want to see the Most Frequently Asked Questions'),
(454, 10, '2024-01-01 16:26:17', 'I have a question about a specific course'),
(455, 10, '2024-01-01 16:26:17', 'I want to see the Most Frequently Asked Questions'),
(456, 10, '2024-01-01 16:26:18', 'I have a question about a specific course'),
(457, 10, '2024-01-01 16:26:19', 'I have a question about a specific course'),
(458, 10, '2024-01-01 16:26:21', 'access Polybot page'),
(459, 10, '2024-01-01 16:26:32', 'Programming'),
(460, 10, '2024-01-01 16:26:32', 'I have a question about a specific course'),
(461, 10, '2024-01-01 16:26:34', ' Year 1'),
(462, 10, '2024-01-01 16:26:35', ' Semester A'),
(463, 10, '2024-01-01 16:26:37', 'System Administration'),
(464, 10, '2024-01-01 16:30:03', 'Major_MajorId'),
(465, 10, '2024-01-01 16:38:10', 'access Polybot page'),
(466, 10, '2024-01-01 16:38:12', 'I have a question about a specific course'),
(467, 10, '2024-01-01 16:38:15', 'Programming'),
(468, 10, '2024-01-01 16:38:15', ' Year 1'),
(469, 10, '2024-01-01 16:38:17', ' Semester A'),
(470, 10, '2024-01-01 16:38:19', 'System Administration'),
(471, 10, '2024-01-01 16:41:22', 'access Polybot page'),
(472, 10, '2024-01-01 16:41:24', 'I have a question about a specific course'),
(473, 10, '2024-01-01 16:41:25', 'Information Systems'),
(474, 10, '2024-01-01 16:41:27', ' Year 1'),
(475, 10, '2024-01-01 16:41:28', ' Semester A'),
(476, 10, '2024-01-01 16:41:30', 'Programming'),
(477, 10, '2024-01-01 16:41:31', ' Year 1'),
(478, 10, '2024-01-01 16:41:32', ' Semester A'),
(479, 10, '2024-01-01 16:41:33', 'System Administration'),
(480, 10, '2024-01-01 16:43:54', 'access Polybot page'),
(481, 10, '2024-01-01 16:43:55', 'I have a question about a specific course'),
(482, 10, '2024-01-01 16:43:59', 'Programming'),
(483, 10, '2024-01-01 16:44:00', ' Year 1'),
(484, 10, '2024-01-01 16:44:01', ' Semester A'),
(485, 10, '2024-01-01 16:45:34', 'access Polybot page'),
(486, 10, '2024-01-01 16:45:34', 'I have a question about a specific course'),
(487, 10, '2024-01-01 16:45:38', 'Programming'),
(488, 10, '2024-01-01 16:45:42', ' Year 1'),
(489, 10, '2024-01-01 16:45:46', ' Semester A'),
(490, 10, '2024-01-01 16:45:49', 'System Administration'),
(491, 10, '2024-01-01 16:45:53', 'CourseCode'),
(492, 10, '2024-01-01 16:45:55', 'ShortTitle'),
(493, 10, '2024-01-01 16:45:59', 'CourseTitle'),
(494, 10, '2024-01-01 16:46:02', 'Credits'),
(495, 10, '2024-01-01 16:51:11', 'access Polybot page'),
(496, 10, '2024-01-01 16:54:01', 'access Polybot page'),
(497, 10, '2024-01-01 16:54:09', 'access Polybot page'),
(498, 10, '2024-01-01 16:55:03', 'access Polybot page'),
(499, 10, '2024-01-01 16:56:52', 'access Polybot page'),
(506, 10, '2024-01-01 17:04:10', 'access Polybot page'),
(507, 10, '2024-01-01 17:05:33', 'access Polybot page'),
(508, 10, '2024-01-01 17:07:03', 'access Polybot page'),
(509, 10, '2024-01-01 17:08:28', 'access Polybot page'),
(510, 10, '2024-01-01 17:11:24', 'access Polybot page'),
(511, 10, '2024-01-01 17:15:17', 'access Polybot page'),
(512, 10, '2024-01-01 17:18:45', 'access Polybot page'),
(513, 10, '2024-01-01 17:20:55', 'access Polybot page'),
(514, 10, '2024-01-01 17:22:08', 'access Polybot page'),
(528, 11, '2024-01-01 19:54:03', 'access Polybot page'),
(529, 11, '2024-01-01 19:54:06', 'I have a question about a specific course'),
(530, 11, '2024-01-01 19:54:07', 'Programming'),
(531, 11, '2024-01-01 19:54:08', ' Year 1'),
(532, 11, '2024-01-01 19:54:09', ' Semester A'),
(533, 11, '2024-01-01 19:54:10', 'System Administration'),
(534, 11, '2024-01-01 19:54:11', 'CourseCode'),
(535, 11, '2024-01-01 19:54:15', ' No'),
(536, 11, '2024-01-01 19:54:16', ' Very helpful'),
(537, 11, '2024-01-01 19:54:17', ' Yes'),
(538, 11, '2024-01-01 19:54:19', ' Not helpful'),
(539, 11, '2024-01-01 19:54:23', 'access Polybot page'),
(540, 11, '2024-01-01 19:54:25', 'I want to see the Most Frequently Asked Questions'),
(541, 11, '2024-01-01 19:54:26', 'How many credits can a students take per semester?'),
(542, 11, '2024-01-01 19:54:28', ' No'),
(543, 11, '2024-01-01 19:54:29', ' Not helpful'),
(544, 11, '2024-01-01 19:55:06', 'access Polybot page'),
(545, 10, '2024-01-01 22:44:40', 'access Polybot page'),
(546, 10, '2024-01-02 10:31:36', 'access Polybot page'),
(547, 10, '2024-01-02 15:10:01', 'access Polybot page'),
(548, 10, '2024-01-02 17:28:37', 'access Polybot page'),
(549, 11, '2024-01-02 18:01:54', 'access Polybot page'),
(550, 10, '2024-01-02 18:10:05', 'access Polybot page'),
(551, 10, '2024-01-02 18:10:13', 'I want to see the Most Frequently Asked Questions'),
(552, 10, '2024-01-02 18:10:14', 'How many credits can a students take per semester?'),
(553, 10, '2024-01-02 18:10:20', ' Yes'),
(554, 10, '2024-01-02 18:10:21', 'I have a question about a specific course'),
(555, 10, '2024-01-02 18:10:23', 'Programming'),
(556, 10, '2024-01-02 18:10:24', ' Year 1'),
(557, 10, '2024-01-02 18:10:25', ' Semester A'),
(558, 10, '2024-01-02 18:10:27', 'System Administration'),
(559, 10, '2024-01-02 18:10:31', 'ShortTitle'),
(560, 10, '2024-01-02 18:10:33', ' No'),
(561, 10, '2024-01-02 18:10:35', ' Not helpful'),
(562, 10, '2024-01-02 18:11:31', 'access Polybot page'),
(563, 10, '2024-01-02 18:11:38', 'access Polybot page'),
(564, 10, '2024-01-02 18:11:53', 'access Polybot page'),
(565, 10, '2024-01-02 18:54:16', 'access Polybot page'),
(566, 10, '2024-01-02 18:54:26', 'access Polybot page'),
(567, 10, '2024-01-02 18:54:34', 'access Polybot page'),
(568, 10, '2024-01-02 18:54:38', 'I want to see the Most Frequently Asked Questions'),
(569, 10, '2024-01-02 18:54:39', 'How many credits can a students take per semester?'),
(570, 10, '2024-01-02 18:54:42', ' Yes'),
(571, 10, '2024-01-02 18:54:44', 'I have a question about a specific course'),
(572, 10, '2024-01-02 18:54:45', 'Cyber Security'),
(573, 10, '2024-01-02 18:54:46', ' Year 2'),
(574, 10, '2024-01-02 18:54:47', ' Semester A'),
(575, 10, '2024-01-02 18:54:49', ' Semester B'),
(576, 10, '2024-01-02 18:54:51', ' Year 1'),
(577, 10, '2024-01-02 18:54:52', ' Semester A'),
(578, 10, '2024-01-02 18:54:53', ' Semester B'),
(579, 10, '2024-01-02 18:55:00', 'Programming'),
(580, 10, '2024-01-02 18:55:01', ' Year 1'),
(581, 10, '2024-01-02 18:55:03', ' Semester A'),
(582, 10, '2024-01-02 18:55:04', 'System Administration'),
(583, 10, '2024-01-02 18:55:05', 'PreRequisite'),
(584, 10, '2024-01-02 18:55:07', ' No'),
(585, 10, '2024-01-02 18:55:08', ' Very helpful'),
(586, 10, '2024-01-02 18:55:09', ' Not helpful'),
(587, 10, '2024-01-02 18:55:14', 'access Polybot page'),
(588, 10, '2024-01-02 18:55:20', 'access Polybot page');

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
(489, 'How many credits can a students take per semester?', 3, '2023-12-13', 18),
(490, ' Yes', 3, '2023-12-13', 18),
(491, 'I want to see the Most Frequently Asked Questions', 2, '2023-12-13', 18),
(492, 'I want to see the Most Frequently Asked Questions', 1, '2023-12-28', 22),
(493, 'How many credits can a students take per semester?', 1, '2023-12-28', 22),
(494, ' No', 1, '2023-12-28', 22),
(495, ' Very helpful', 54, '2023-12-28', 22),
(496, 'I have a question about a specific course', 1, '2023-12-29', 22),
(497, 'I have a question about a specific course', 1, '2023-12-30', 23),
(498, 'Programming', 1, '2023-12-30', 23),
(499, ' Year 1', 1, '2023-12-30', 23),
(500, ' Semester A', 1, '2023-12-30', 23),
(501, 'System Administration', 1, '2023-12-30', 23),
(502, 'CurrentDeveloper', 1, '2023-12-30', 23),
(503, ' Yes', 1, '2023-12-30', 23),
(504, 'I want to see the Most Frequently Asked Questions', 1, '2023-12-30', 23),
(505, 'When will the semester fees pay period end?', 1, '2023-12-30', 23),
(506, ' No', 1, '2023-12-30', 23),
(507, ' Very helpful', 1, '2023-12-30', 23),
(508, ' Not helpful', 1, '2023-12-30', 23),
(509, 'I have a question about a specific course', 1, '2023-12-31', 0),
(510, 'Programming', 1, '2023-12-31', 0),
(511, 'Cyber Security', 1, '2023-12-31', 0),
(512, ' Year 1', 2, '2023-12-31', 0),
(513, ' Semester B', 1, '2023-12-31', 0),
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
(605, ' Very helpful', 1, '2024-01-02', 18);

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
(4, 2, 'Analyze and interpret financial statements'),
(5, 2, 'Apply financial models for forecasting'),
(6, 2, 'Evaluate investment opportunities'),
(7, 3, 'Apply statistical methods to analyze data'),
(8, 3, 'Interpret and present statistical findings'),
(9, 3, 'Design and conduct surveys'),
(13, 5, 'Demonstrate knowledge of historical events'),
(14, 5, 'Analyze historical documents and sources'),
(15, 5, 'Evaluate historical perspectives and interpretations'),
(41, 39, 'aDVfB'),
(42, 39, 'FBS'),
(43, 39, 'BSF'),
(44, 39, 'SBF'),
(45, 39, 'bsz'),
(46, 39, 'bdzsSB'),
(47, 39, 'agDA'),
(48, 39, 'ZSB'),
(49, 39, 'sht'),
(50, 47, 'fbfbx'),
(51, 2, 'Analyze and interpret financial statements'),
(52, 2, 'Apply financial models for forecasting'),
(53, 2, 'Evaluate investment opportunities'),
(54, 2, 'Analyze and interpret financial statements'),
(55, 2, 'Apply financial models for forecasting'),
(56, 2, 'Evaluate investment opportunities'),
(57, 2, 'Analyze and interpret financial statements'),
(58, 2, 'Apply financial models for forecasting'),
(59, 2, 'Evaluate investment opportunities'),
(60, 48, 'avd');

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
(2, 'IT6010', 'Maths For Computing', 'Maths Comp', '6', '2022-01-01', 45, 'Exams, Assignments', 'To develop mathematical skills for computing', 'Completion of Intro to Mathematics course', 4, 'OpenAI', 4, 'A', 'test', 'test2'),
(3, 'IT7005', 'Database Systems 2', 'Database Systems 2', '6', '2022-01-01', 60, 'Exams, Assignments', 'To explore advanced mathematical concepts and applications', 'Completion of Intro to Mathematics course', 3, 'OpenAI', 2, 'B', NULL, NULL),
(5, 'IT7003', 'Networking and Data Communication', 'Networking and Data Comm. 2', '6', '2022-01-01', 60, 'Exams, Assignments', 'To study networking and data communication concepts', 'Completion of Intro to Networking course', 4, 'OpenAI', 4, 'A', NULL, NULL),
(6, 'IT7006', 'Object Oriented Design', 'Object Oriented Design', '6', '2022-01-01', 60, 'Exams, Assignments', 'To learn object-oriented design principles and techniques', 'Completion of Object-Oriented Programming course', 3, 'OpenAI', 4, 'B', NULL, NULL),
(7, 'IT8203', 'System Administration', 'System Administration', '7', '2022-01-01', 65, 'Exams, Assignments', 'To develop skills in system administration and management', 'Completion of System Management course', 2, 'OpenAI', 1, 'A', NULL, NULL),
(8, 'IT6004', 'Unix Systems', 'Unix Systems', '6', '2022-01-01', 60, 'Exams, Assignments', 'To learn about Unix systems and command-line interface', 'Completion of Intro to Unix course', 2, 'OpenAI', 2, 'A', NULL, NULL),
(10, 'EL6002', 'English EDICT4', 'English EDICT4', '6', '2022-01-01', 60, 'Exams, Assignments', 'To further enhance English language skills', 'Completion of English EDICT3 course', 4, 'OpenAI', 2, 'B', NULL, NULL),
(17, 'ITTest', 'test', 'test', '5', NULL, 65, 'fs', 'sz', 'zbfx', 1, 'ICT', NULL, NULL, 'zfs', 'dba'),
(23, 'ITTesr', 'test', 'test', '5', NULL, 65, 'zf', 'ndcg', NULL, 1, 'ICT', NULL, NULL, 'sfxbs', 'cngd'),
(24, 'ITTeff', 'test', 'test', '5', NULL, 65, 'zf', 'xg', 'xv g', 1, 'ICT', NULL, NULL, 'nxs', 'ncdnd'),
(25, 'ITTyyy', 'test', 'test', '5', NULL, 65, 'zf', 'bzsf', 'xv g', 1, 'ICT', NULL, NULL, 'bzf', 'xfbf'),
(26, 'ITTyuu', 'test', 'test', '5', NULL, 65, 'zf', 'az', 'xv g', 1, 'ICT', NULL, NULL, 'nxc', 'gn'),
(27, 'ITTyrr', 'test', 'test', '5', NULL, 65, 'zf', 'sgnzd', 'xv g', 1, 'ICT', NULL, NULL, 'zv', 'fbx'),
(39, 'testeg', 'ngdx', 'ndd', '5', NULL, 45, 'ngdz', 'sBz', 'ngzd', 5, 'ICT', 2, 'B', 'aDV', 'bzvf'),
(47, 'tester', 'test', 'testfsvzs', '5', NULL, 45, 'vdz', 'zbf', 'bd', 2, 'ICT', 3, 'B', 'fb', 'zbf'),
(48, 'hello3', 'test', 'test', '5', NULL, 45, 'vdz', 'vSS', 'bd', 2, 'ICT', 2, 'A', 'avbSz', 'sbFzsvz');

-- --------------------------------------------------------

--
-- Table structure for table `Descriptor`
--

CREATE TABLE `Descriptor` (
  `FileId` int(11) NOT NULL,
  `FileLocation` varchar(255) DEFAULT NULL,
  `FileType` varchar(50) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `User_UserId` int(11) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'How many credits can a students take per semester?', '60 credits', 1),
(10, 'When will the semester fees pay period end?', '4 September 2023', 1);

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

--
-- Dumping data for table `Files`
--

INSERT INTO `Files` (`FileId`, `FileLocation`, `FileType`, `FileName`, `Answers_AnsId`, `User_UserId`, `Questions_QuestionId`, `QId`, `AId`, `Type`) VALUES
(266, 'images/1329529_Screenshot (1).png', 'image/png', '1329529_Screenshot (1).png', 19, 10, 46, 47, 1, 'Question'),
(267, 'images/4834803_Screenshot (1).png', 'image/png', '4834803_Screenshot (1).png', 19, 10, 46, 54, 1, 'Question'),
(268, 'images/1535630_Screenshot (1).png', 'image/png', '1535630_Screenshot (1).png', 19, 10, 54, 54, 21, 'Answer');

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

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`LikesId`, `action`, `Answers_AnsId`, `Answers_Questions_QuestionId`, `Answers_User_UserId`) VALUES
(1, 'like', 4, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Logs`
--

CREATE TABLE `Logs` (
  `LogId` int(11) NOT NULL,
  `LogText` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Cyber Security'),
(2, 'Programming'),
(3, 'Information Systems'),
(4, 'Database Systems'),
(5, 'Networking');

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
(4, 'blah', 'blah hahaha', NULL, 2, '2023-10-31 07:10:58', 5, 5),
(7, 'What is your favorite book or movie, and why does it resonate with you?', 'I need some help with the whole projects, does anyone know where to go and look for resources that could help me in succeeding in IT6001 course?', NULL, 8, '2023-10-31 07:10:58', 8, 4),
(8, 'What is your favorite hobby or activity that helps you relax and unwind?', 'I need some help with the whole projects, does anyone know where to go and look for resources that could help me in succeeding in IT6001 course?', NULL, 4, '2023-10-31 07:10:58', 3, 4),
(9, 'What is your favorite book or movie, and why does it resonate with you?', 'I need some help with the whole projects, does anyone know where to go and look for resources that could help me in succeeding in IT6001 course?', NULL, 9, '2023-10-31 07:10:58', 3, 4),
(10, 'test 3 ', 'hghfhagfa d ajshdkjsa', NULL, NULL, '2023-10-31 07:10:58', 3, 5),
(12, 'JHJDS', 'JJ ', 'UWEOW', 3, '2023-10-31 07:10:58', 7, 1),
(13, ' oye hoeye', 'jhsdjds', 'jds', 0, '2023-10-31 07:10:58', 3, 1),
(14, 'iiii', 'iiiioiuo', 'uioio', 0, '2023-10-31 07:10:58', 3, 1),
(16, 'ja ja ja', 'jaj dksajdk sadsajflksa f', 'kjhkds falk', 0, '2023-10-31 07:10:58', 5, 1),
(19, 'iop', 'iop', 'iopiwoeiqpo', 0, '2023-10-31 07:10:58', 2, 1),
(20, 'yui', 'yui', 'yui', 0, '2023-10-31 07:10:58', 2, 1),
(22, 'JHJDShkj', 'hkjh', 'jhjh', 0, '2023-10-31 07:10:58', 3, 1),
(27, 'iop', 'iop', 'ipp', 0, '2023-10-31 07:10:58', 2, 1),
(28, 'uuuu', 'uuu', 'u', 0, '2023-10-31 07:10:58', 2, 1),
(30, 'pppppppppppP', 'pp', 'pp', 0, '2023-10-31 07:10:58', 3, 1),
(33, 'uioiweoqw riuqreiq', 'uwqoi urqeiour', 'uiouio', 0, '2023-10-31 07:10:58', 6, 1),
(35, 'Okay one more serious qt for you all', 'yuio', 'ui', 0, '2023-10-31 07:10:58', 10, 5),
(37, 'Hello g kya haal hai test 2?', 'hellojkdjashkjd akdjald ajkdjaslk', '', 0, '2023-11-09 09:16:19', 5, 1),
(39, 'Hello g kya haal hai', 'yrr pata nahi kya', '', 0, '2023-11-10 11:41:26', 7, 4),
(40, 'iop', 'hiiiloo jakjdsk ', 'jdksajdal ', 0, '2023-11-12 17:07:43', 6, 1),
(41, 'Hello g kya haal hai', 'dksmdls', '', 0, '2023-11-12 17:13:28', 8, 1),
(43, 'lgaf', 'fkv,', 'gj', 0, '2024-01-01 02:13:23', 2, 10),
(44, 'dvb', 'd', '', 0, '2024-01-01 21:22:19', 2, 10),
(45, 'fhdshfhjds', 'jhskjdhfskj', 'jhfkjshfs', 67, '2024-01-02 18:27:46', 7, 9),
(46, 'hsdfjsshfdsjf', 'fhdshfds', 'hgfjs', 0, '2024-01-01 21:46:56', 6, 5),
(47, 'fkdj', 'dfgd', 'gj', 0, '2024-01-02 18:33:21', 24, 10),
(48, 'tytp[', 'ipoytip', 'ioyp', 0, '2024-01-02 18:36:39', 6, 10),
(49, 'tytp[', 'ipoytip', 'ioyp', 0, '2024-01-02 18:36:57', 6, 10),
(50, 'tytp[', 'ipoytip', 'ioyp', 0, '2024-01-02 18:36:57', 6, 10),
(51, 'dsjd', 'sdgds', 'dsgdsjh', 0, '2024-01-02 18:37:47', 23, 10),
(52, 'pppp', 'dshfsjkhkfs', '', 0, '2024-01-02 18:38:17', 17, 10),
(53, 'po6po', 'ot6po', 'op', 0, '2024-01-02 18:44:20', 5, 10),
(54, 'heeloo', 'ehkeke', 'SVz', 0, '2024-01-02 18:47:26', 6, 10);

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
(1, '202003059', 'ayeshaamjad469@gmail.com', 'Max', 'David', 'mœ°¦Ð»”>z×>~­', 3, 'img//team-3.jpg', NULL, 0),
(2, '202003058', 'kainatcheema469@gmail.com', 'Kainat', 'Amjad', 'mœ°¦Ð»”>z×>~­', 2, 'img/dp.jpg', NULL, 0),
(3, '202003060', 'sanaali469@gmail.com', 'Sana', 'Ali', 'mœ°¦Ð»”>z×>~­', 4, 'img/testimonial-3.jpg', NULL, 0),
(4, '202003061', 'mashaalsaad469@gmail.com', 'Mashaal', 'Saad', 'mœ°¦Ð»”>z×>~­', 1, 'img//team-4.jpg', NULL, 0),
(5, '202003062', 'najmaahmed469@gmail.com', 'Najma', 'Ahmed', 'mœ°¦Ð»”>z×>~­', 4, 'img/testimonial-1.jpg', NULL, 0),
(7, 'fatima', 'fatimamadan02@gmail.com', 'fatima', 'fatima', 'fatima', 1, '', NULL, 0),
(8, 'fatimamadan', 'fatimamadan02@gmail.com', 'fatima', 'fatima', '›¿Å &õÉ&ÝiÐàG ¦', 1, 'tt', NULL, 0),
(9, 'Noor', 'fatimamadan02@gmail.com', 'Noor', 'Noor', '›¿Å &õÉ&ÝiÐàG ¦', 1, 'dnxdfdb', NULL, 0),
(10, '202001312', '202001312@student.polytechnic.bh', 'Fatima', 'Madan', '½Ÿr8â_¡ÄlûÓY¯b', 1, 'img//WhatsApp Image 2023-12-08 at 10.13.03 PM (1).jpeg', NULL, 1),
(11, '202001313', '202001313@student.polytechnic.bh', 'Fatima', 'Madan', '½Ÿr8â_¡ÄlûÓY¯b', 4, 'img/dp.jpg', NULL, 1);

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
  ADD KEY `CourseId` (`CourseId`),
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
-- Indexes for table `Logs`
--
ALTER TABLE `Logs`
  ADD PRIMARY KEY (`LogId`);

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
  MODIFY `AnsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bot_history`
--
ALTER TABLE `bot_history`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT for table `bot_reports`
--
ALTER TABLE `bot_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `CLO`
--
ALTER TABLE `CLO`
  MODIFY `OutcomeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `Descriptor`
--
ALTER TABLE `Descriptor`
  MODIFY `FileId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `FaqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Files`
--
ALTER TABLE `Files`
  MODIFY `FileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `LikesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Logs`
--
ALTER TABLE `Logs`
  MODIFY `LogId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Major`
--
ALTER TABLE `Major`
  MODIFY `MajorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `NotifId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `SubsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `Descriptor_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `Course` (`CourseId`),
  ADD CONSTRAINT `Descriptor_ibfk_2` FOREIGN KEY (`User_UserId`) REFERENCES `User` (`UserId`);

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
