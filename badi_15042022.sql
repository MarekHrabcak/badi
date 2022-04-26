-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2022 at 12:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badi`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspects`
--

CREATE TABLE `aspects` (
  `id` int(25) NOT NULL,
  `aspect_type` varchar(250) NOT NULL,
  `aspect_name` varchar(250) NOT NULL,
  `aspect_value` varchar(250) DEFAULT NULL,
  `aspect_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aspects`
--

INSERT INTO `aspects` (`id`, `aspect_type`, `aspect_name`, `aspect_value`, `aspect_description`) VALUES
(1, 'dataclass', 'Not Applicable [0]', '0', 'Not Applicable [0]'),
(2, 'dataclass', 'Public [1]', '1', 'Public [1]'),
(3, 'dataclass', 'Internal [4]', '4', 'Internal [4]'),
(4, 'dataclass', 'Confidential [6]', '6', 'Confidential [6]'),
(5, 'dataclass', 'Strictly confidential, unknown data classification [9]', '9', 'Strictly confidential, unknown data classification [9]'),
(6, 'architect', 'Not Applicable [0]', '0', 'Not Applicable [0]'),
(7, 'architect', 'More than 3-tier [4]', '4', 'More than 3-tier [4]'),
(8, 'architect', '3-tier [5]', '5', '3-tier [5]'),
(9, 'architect', '2-tier [7]', '7', '2-tier [7]'),
(10, 'architect', '1-tier, Unknown architecture [9]', '9', '1-tier, Unknown architecture [9]'),
(11, 'netloc', 'Not Applicable [0]', '0', 'Not Applicable [0]'),
(12, 'netloc', 'No inspection [1]', '1', 'No inspection [1]'),
(13, 'netloc', '1 inspection node [3]', '3', '1 inspection node [3]'),
(14, 'netloc', '2 inspection nodes [4]', '4', '2 inspection nodes [4]'),
(15, 'netloc', '3 inspection nodes [5]', '5', '3 inspection nodes [5]'),
(16, 'netloc', '4 inspection nodes [7]', '7', '4 inspection nodes [7]'),
(17, 'netloc', 'More than 4, Unknown Location [9]', '9', 'More than 4, Unknown Location [9]'),
(18, 'authfact', 'Not Applicable [0]', '0', 'Not Applicable [0]'),
(19, 'authfact', 'Multi factor authentication [1]', '1', 'Multi factor authentication [1]'),
(20, 'authfact', '3 factor authentication [2]', '2', '3 factor authentication [2]'),
(21, 'authfact', '2 factor authentication  [3]', '3', '2 factor authentication  [3]'),
(22, 'authfact', '1 factor authentication [5]', '5', '1 factor authentication [5]'),
(23, 'authfact', 'User identification only [7]', '7', 'User identification only [7]'),
(24, 'authfact', 'No authentication [9] ', '9', 'No authentication [9] '),
(25, 'sign', 'Not Applicable [0]', '0', 'Not Applicable [0]'),
(26, 'sign', 'RSA Asymmetric Signature [1]', '1', 'RSA Asymmetric Signature [1]'),
(27, 'sign', 'HMAC symmetric signature [2]', '2', 'HMAC symmetric signature [2]'),
(28, 'sign', 'Event based token [5]', '5', 'Event based token [5]'),
(29, 'sign', 'Time based token [6]', '6', 'Time based token [6]'),
(30, 'sign', 'Timestamp [7]', '7', 'Timestamp [7]'),
(31, 'sign', 'HASH [8]', '8', 'HASH [8]'),
(32, 'sign', 'None, Unknown signing [9]', '9', 'None, Unknown signing [9]'),
(33, 'enc', 'Not Applicable [0]', '0', 'Not Applicable [0]'),
(34, 'enc', 'RSA, ECC, GPG, PGP, Hybrid [2]', '2', 'RSA, ECC, GPG, PGP, Hybrid [2]'),
(35, 'enc', 'AES [4]', '4', 'AES [4]'),
(36, 'enc', '3DES [6]', '6', '3DES [6]'),
(37, 'enc', 'DES [7]', '7', 'DES [7]'),
(38, 'enc', 'ENCODE [8]', '8', 'ENCODE [8]'),
(39, 'enc', 'None, Unknown encryption [9]', '9', 'None, Unknown encryption [9]'),
(40, 'userpriv', 'Anonymous web User [0]', '0', 'Anonymous web User [0]'),
(41, 'userpriv', 'User with valid credentials [2]', '2', 'User with valid credentials [2]'),
(42, 'userpriv', 'DB server Administrator[4]', '4', 'DB server Administrator[4]'),
(43, 'userpriv', 'Service provider Administrator [5]', '5', 'Service provider Administrator [5]'),
(44, 'userpriv', 'Service provider user process [7]', '7', 'Service provider user process [7]'),
(45, 'userpriv', 'Service provider root/administrator process [9]', '9', 'Service provider root/administrator process [9]'),
(46, 'authprot', 'Certificate', NULL, 'Certificate'),
(47, 'authprot', 'SAML', NULL, 'SAML'),
(48, 'authprot', 'OAuth2', NULL, 'OAuth2'),
(49, 'authprot', 'OIDC', NULL, 'OIDC'),
(50, 'authprot', 'Kerberos/SPNEGO', NULL, 'Kerberos/SPNEGO'),
(51, 'authprot', 'NTLM', NULL, 'NTLM'),
(52, 'authprot', 'Digest access authentication', NULL, 'Digest access authentication'),
(53, 'authprot', 'LDAP', NULL, 'LDAP'),
(54, 'authprot', 'RADIUS', NULL, 'RADIUS'),
(55, 'authprot', 'OTP', NULL, 'OTP'),
(56, 'authprot', 'CAPTCHA', NULL, 'CAPTCHA'),
(57, 'authprot', 'APIKEY', NULL, 'APIKEY'),
(58, 'authprot', 'BASE64', NULL, 'BASE64'),
(59, 'authprot', 'ClearText', NULL, 'ClearText'),
(60, 'authprot', 'Cookies', NULL, 'Cookies');

-- --------------------------------------------------------

--
-- Table structure for table `dread`
--

CREATE TABLE `dread` (
  `id` int(11) NOT NULL,
  `dread_name` varchar(45) NOT NULL,
  `dread_level` int(11) NOT NULL,
  `dread_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dread`
--

INSERT INTO `dread` (`id`, `dread_name`, `dread_level`, `dread_description`) VALUES
(1, 'sl', 9, 'No technical skills (9)'),
(2, 'sl', 6, 'Some technical skills (6)'),
(3, 'sl', 5, 'Advanced computer user (5)'),
(4, 'sl', 3, 'Network and programming skills (3)'),
(5, 'sl', 1, 'Security penetration skills (1)'),
(8, 'm', 1, 'Low or no reward (1)'),
(9, 'm', 4, 'Possible reward (4)'),
(10, 'm', 9, 'High reward (9)'),
(11, 'o', 0, 'Full access or expensive resources required (0)'),
(12, 'o', 4, 'Special access or resources required (4)'),
(15, 'o', 7, 'Some access or resources required (7)'),
(16, 'o', 9, 'No access or resources required (9)'),
(17, 's', 2, 'Developers, System administrators (2)'),
(18, 's', 4, 'Intranet users (4)'),
(19, 's', 5, 'Partners (5)'),
(20, 's', 6, 'Authenticated users (6)'),
(21, 's', 9, 'Anonymous Internet users (9)'),
(22, 'lc', 2, 'Minimal non-sensitive data disclosed (2)'),
(23, 'lc', 6, 'minimal critical data disclosed (6)'),
(24, 'lc', 6, 'extensive non-sensitive data disclosed (6)'),
(25, 'lc', 7, 'extensive critical data disclosed (7)'),
(26, 'lc', 9, 'all data disclosed (9)'),
(27, 'lav', 1, 'Minimal secondary services interrupted (1)'),
(28, 'lav', 5, 'Minimal primary services interrupted (5)'),
(29, 'lav', 5, 'Extensive secondary services interrupted (5)'),
(30, 'lav', 7, 'Extensive primary services interrupted (7)'),
(31, 'lav', 9, 'All services completely lost (9)'),
(32, 'lac', 1, 'Fully traceable (1)'),
(33, 'lac', 7, 'Possibly traceable (7)'),
(34, 'lac', 9, 'Completely anonymous (9)'),
(35, 'ed', 1, 'Practically impossible (1)'),
(36, 'ed', 3, 'Difficult (3)'),
(37, 'ed', 7, 'Easy (7)'),
(38, 'ed', 9, 'Automated tools available (9)'),
(39, 'ee', 1, 'Theoretical (1)'),
(40, 'ee', 3, 'Difficult (3)'),
(41, 'ee', 5, 'Easy (7)'),
(42, 'ee', 9, 'Automated tools available (9)'),
(43, 'a', 1, 'Unknown (1)'),
(44, 'a', 4, 'Hidden (4)'),
(45, 'a', 6, 'Obvious (6)'),
(46, 'a', 9, 'Public knowledge (9)'),
(47, 'ide', 1, 'Active detection in application (1)'),
(48, 'ide', 3, 'Logged and reviewed (3)'),
(49, 'ide', 8, 'Logged without review (8)'),
(50, 'ide', 9, 'Not logged (9)'),
(51, 'fd', 1, 'Less than the cost to fix the vulnerability (1)'),
(52, 'fd', 3, 'Minor effect on annual profit (3)'),
(53, 'fd', 7, 'Significant effect on annual profit (7)'),
(54, 'fd', 9, 'Bankruptcy (9)'),
(55, 'rd', 1, 'Minimal damage (1)'),
(56, 'rd', 4, 'Loss of major accounts (4)'),
(57, 'rd', 5, 'Loss of goodwill (5)'),
(58, 'rd', 9, 'Brand damage (9)'),
(59, 'nc', 2, 'Minor violation (2)'),
(60, 'nc', 5, 'Clear violation (5)'),
(61, 'nc', 7, 'High profile violation (7)'),
(62, 'pv', 3, 'One individual (3)'),
(63, 'pv', 5, 'Hundreds of people (5)'),
(64, 'pv', 7, 'Thousands of people (7)'),
(65, 'pv', 9, 'Millions of people (9)'),
(66, 'li', 1, 'Minimal slightly corrupt data (1)'),
(67, 'li', 3, 'Minimal seriously corrupt data (3)'),
(68, 'li', 5, 'Extensive slightly corrupt data (5)'),
(69, 'li', 7, 'Extensive seriously corrupt data (7)'),
(70, 'li', 9, 'All data totally corrupt (9)');

-- --------------------------------------------------------

--
-- Table structure for table `dshb_menu`
--

CREATE TABLE `dshb_menu` (
  `id` int(11) NOT NULL,
  `icon` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `href` varchar(25) NOT NULL,
  `min_user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dshb_menu`
--

INSERT INTO `dshb_menu` (`id`, `icon`, `name`, `href`, `min_user_role`) VALUES
(1, 'fa fa-users', 'Aspects', 'index.php?page=aspects', 3),
(2, 'fa fa-chart-pie', 'Threats', 'index.php?page=threats', 3),
(3, 'fa fa-file', 'Models', 'index.php?page=models', 2),
(4, 'fa fa-users', 'Users', 'index.php?page=users', 4);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(255) NOT NULL,
  `sl` int(10) NOT NULL DEFAULT 9,
  `m` int(10) NOT NULL DEFAULT 9,
  `o` int(10) NOT NULL DEFAULT 9,
  `s` int(10) NOT NULL DEFAULT 9,
  `ed` int(10) NOT NULL DEFAULT 9,
  `ee` int(10) NOT NULL DEFAULT 9,
  `a` int(10) NOT NULL DEFAULT 9,
  `ide` int(10) NOT NULL DEFAULT 9,
  `lc` int(10) NOT NULL DEFAULT 9,
  `li` int(10) NOT NULL DEFAULT 9,
  `lav` int(10) NOT NULL DEFAULT 9,
  `lac` int(10) NOT NULL DEFAULT 9,
  `fd` int(10) NOT NULL DEFAULT 9,
  `rd` int(10) NOT NULL DEFAULT 9,
  `nc` int(10) NOT NULL DEFAULT 9,
  `pv` int(10) NOT NULL DEFAULT 9,
  `model_name` varchar(150) DEFAULT NULL,
  `model_description` varchar(250) DEFAULT NULL,
  `dataclass` varchar(150) DEFAULT NULL,
  `architect` varchar(150) DEFAULT NULL,
  `authprot` varchar(150) DEFAULT NULL,
  `netloc` varchar(150) DEFAULT NULL,
  `authfact` varchar(150) DEFAULT NULL,
  `sign` varchar(150) DEFAULT NULL,
  `enc` varchar(150) DEFAULT NULL,
  `userpriv` varchar(150) DEFAULT NULL,
  `risklevel` varchar(150) DEFAULT NULL,
  `liklevel` varchar(150) DEFAULT NULL,
  `likvalue` varchar(150) DEFAULT NULL,
  `implevel` varchar(150) DEFAULT NULL,
  `impvalue` varchar(150) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `sl`, `m`, `o`, `s`, `ed`, `ee`, `a`, `ide`, `lc`, `li`, `lav`, `lac`, `fd`, `rd`, `nc`, `pv`, `model_name`, `model_description`, `dataclass`, `architect`, `authprot`, `netloc`, `authfact`, `sign`, `enc`, `userpriv`, `risklevel`, `liklevel`, `likvalue`, `implevel`, `impvalue`, `timestamp`) VALUES
(77, 9, 9, 7, 9, 7, 9, 9, 8, 7, 7, 7, 7, 7, 9, 7, 7, 'test', 'test', 'Internal [4]', '', 'APIKEY', '', '', '', '', '', 'CRITICAL', 'HIGH', '8.375', 'HIGH', '7.25', '2022-03-30 22:30:47'),
(78, 1, 1, 4, 2, 1, 1, 1, 1, 2, 1, 5, 1, 1, 1, 2, 3, '', '', 'Confidential [6]', '', 'SAML', '', '', '', 'AES [4]', 'DB server Administrator[4]', 'INFO', 'LOW', '1.5', 'LOW', '2', '2022-03-31 08:54:14'),
(79, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, 7, 7, 7, 4, 5, 5, '', '', 'Internal [4]', '', 'APIKEY', '', '', '', 'AES [4]', '', 'MEDIUM', 'MEDIUM', '5.125', 'MEDIUM', '5.75', '2022-03-31 13:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `threats`
--

CREATE TABLE `threats` (
  `id` int(255) NOT NULL,
  `sl` int(10) DEFAULT NULL,
  `m` int(10) DEFAULT NULL,
  `o` int(10) DEFAULT NULL,
  `s` int(10) DEFAULT NULL,
  `ed` int(10) DEFAULT NULL,
  `ee` int(10) DEFAULT NULL,
  `a` int(10) DEFAULT NULL,
  `ide` int(10) DEFAULT NULL,
  `lc` int(10) DEFAULT NULL,
  `li` int(10) DEFAULT NULL,
  `lav` int(10) DEFAULT NULL,
  `lac` int(10) DEFAULT NULL,
  `fd` int(10) DEFAULT NULL,
  `rd` int(10) DEFAULT NULL,
  `nc` int(10) DEFAULT NULL,
  `pv` int(10) DEFAULT NULL,
  `threat_name` varchar(150) DEFAULT NULL,
  `threat_description` varchar(250) DEFAULT NULL,
  `dataclass` varchar(150) DEFAULT NULL,
  `architect` varchar(150) DEFAULT NULL,
  `authprot` varchar(150) DEFAULT NULL,
  `netloc` varchar(150) DEFAULT NULL,
  `authfact` varchar(150) DEFAULT NULL,
  `sign` varchar(150) DEFAULT NULL,
  `enc` varchar(150) DEFAULT NULL,
  `userpriv` varchar(150) DEFAULT NULL,
  `risklevel` varchar(150) DEFAULT NULL,
  `liklevel` varchar(150) DEFAULT '1',
  `likvalue` varchar(150) DEFAULT NULL,
  `implevel` varchar(150) DEFAULT NULL,
  `impvalue` varchar(150) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threats`
--

INSERT INTO `threats` (`id`, `sl`, `m`, `o`, `s`, `ed`, `ee`, `a`, `ide`, `lc`, `li`, `lav`, `lac`, `fd`, `rd`, `nc`, `pv`, `threat_name`, `threat_description`, `dataclass`, `architect`, `authprot`, `netloc`, `authfact`, `sign`, `enc`, `userpriv`, `risklevel`, `liklevel`, `likvalue`, `implevel`, `impvalue`, `timestamp`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, 1, 1, 2, 3, 'dc(1)', 'Data classification (1)', 'Public [1]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INFO', 'LOW', '0.125', 'LOW', '1.125', '2022-04-13 21:16:15'),
(2, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, NULL, NULL, 3, 4, 2, 3, 'dc(4)', 'Data classification (4)', 'Internal [4]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LOW', 'LOW', '0.5', 'MEDIUM', '3.375', '2022-03-31 14:05:10'),
(3, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, 6, 5, NULL, NULL, 7, 5, 5, 5, 'dc(6)', 'Data classification (6)', 'Confidential [6]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LOW', 'LOW', '1.125', 'MEDIUM', '4.5', '2022-03-31 14:06:16'),
(4, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, 9, 7, NULL, NULL, 9, 9, 7, 9, 'dc(9)', 'Data classification (9)', 'Strictly confidential, unknown data classification [9]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LOW', 'LOW', '1.125', 'MEDIUM', '5.375', '2022-03-31 14:04:41'),
(5, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, 5, 7, 7, 4, 5, 5, 'architect(4)', 'Number of tiers(4)', NULL, 'More than 3-tier [4]', NULL, NULL, NULL, NULL, NULL, NULL, 'MEDIUM', 'MEDIUM ', '5.125', 'MEDIUM', '5.5', '2022-03-13 16:18:04'),
(6, 5, 9, 7, 5, 7, 5, 6, 8, 6, 5, 5, 7, 7, 5, 5, 5, 'architect(5)', 'Number of tiers(5)', NULL, '3-tier [5]', NULL, NULL, NULL, NULL, NULL, NULL, 'HIGH', 'HIGH', '6.5', 'MEDIUM', '5.625', '2022-03-13 16:18:04'),
(7, 9, 9, 7, 9, 7, 9, 9, 8, 7, 7, 7, 7, 7, 9, 7, 7, 'architect(7)', 'Number of tiers(7)', NULL, '2-tier [7]', NULL, NULL, NULL, NULL, NULL, NULL, 'CRITICAL', 'HIGH', '8.375', 'HIGH', '7.25', '2022-03-13 16:18:04'),
(8, 9, 9, 9, 9, 9, 9, 9, 9, 9, 7, 9, 9, 9, 9, 7, 9, 'architect(9)', 'Number of tiers(9)', NULL, '1-tier, Unknown architecture [9]', NULL, NULL, NULL, NULL, NULL, NULL, 'CRITICAL', 'HIGH', '9', 'HIGH', '8.5', '2022-03-13 16:18:04'),
(9, 1, 1, 4, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, 3, 'netloc(1)', 'Number of inspect nodes(1)', NULL, NULL, NULL, 'No inspection [1]', NULL, NULL, NULL, NULL, 'INFO', 'LOW', '1.5', 'LOW', '1.5', '2022-03-13 16:18:04'),
(10, 3, 4, 4, 4, 3, 3, 4, 3, 6, 3, 5, 7, 3, 4, 5, 3, 'netloc(3)', 'Number of inspect nodes(3)', NULL, NULL, NULL, '1 inspection node [3]', NULL, NULL, NULL, NULL, 'MEDIUM', 'MEDIUM ', '3.5', 'MEDIUM', '4.5', '2022-03-13 16:18:04'),
(11, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, 5, 7, 7, 4, 5, 5, 'netloc(4)', 'Number of inspect nodes(4)', NULL, NULL, NULL, '2 inspection nodes [4]', NULL, NULL, NULL, NULL, 'MEDIUM', 'MEDIUM ', '5.125', 'MEDIUM', '5.5', '2022-03-13 16:18:04'),
(12, 5, 9, 7, 5, 7, 5, 6, 8, 6, 5, 5, 7, 7, 5, 5, 5, 'netloc(5)', 'Number of inspect nodes(5)', NULL, NULL, NULL, '3 inspection nodes [5]', NULL, NULL, NULL, NULL, 'HIGH', 'HIGH', '6.5', 'MEDIUM', '5.625', '2022-03-13 16:18:04'),
(13, 9, 9, 7, 9, 7, 9, 9, 8, 7, 7, 7, 7, 7, 9, 7, 7, 'netloc(7)', 'Number of inspect nodes(7)', NULL, NULL, NULL, '4 inspection nodes [7]', NULL, NULL, NULL, NULL, 'CRITICAL', 'HIGH', '8.375', 'HIGH', '7.25', '2022-03-13 16:18:04'),
(14, 9, 9, 9, 9, 9, 9, 9, 9, 9, 7, 9, 9, 9, 9, 7, 9, 'netloc(9)', 'Number of inspect nodes(9)', NULL, NULL, NULL, 'More than 4, Unknown Location [9]', NULL, NULL, NULL, NULL, 'CRITICAL', 'HIGH', '9', 'HIGH', '8.5', '2022-03-13 16:18:04'),
(15, 1, 1, 4, 2, NULL, 1, 1, 1, NULL, NULL, 1, 1, 1, 1, 2, 3, 'authfact(1)', 'Authentication factors(1)', NULL, NULL, NULL, NULL, 'Multi factor authentication [1]', NULL, NULL, NULL, 'INFO', 'LOW', '1.375', 'LOW', '1.125', '2022-03-13 16:18:04'),
(16, 3, 4, 4, 2, NULL, 3, 4, 3, NULL, NULL, 5, 7, 3, 4, 2, 3, 'authfact(2)', 'Authentication factors(2)', NULL, NULL, NULL, NULL, '3 factor authentication [2]', NULL, NULL, NULL, 'LOW', 'LOW', '2.875', 'MEDIUM', '3', '2022-03-13 16:18:04'),
(17, 3, 4, 4, 4, NULL, 3, 4, 3, NULL, NULL, 5, 7, 3, 4, 5, 3, 'authfact(3)', 'Authentication factors(3)', NULL, NULL, NULL, NULL, '2 factor authentication  [3]', NULL, NULL, NULL, 'MEDIUM', 'MEDIUM ', '3.125', 'MEDIUM', '3.375', '2022-03-13 16:18:04'),
(18, 5, 9, 7, 5, NULL, 5, 6, 8, NULL, NULL, 5, 7, 7, 5, 5, 5, 'authfact(5)', 'Authentication factors(5)', NULL, NULL, NULL, NULL, '1 factor authentication [5]', NULL, NULL, NULL, 'MEDIUM', 'MEDIUM ', '5.625', 'MEDIUM', '4.25', '2022-03-13 16:18:04'),
(19, 9, 9, 7, 9, NULL, 9, 9, 8, NULL, NULL, 7, 7, 7, 9, 7, 7, 'authfact(7)', 'Authentication factors(7)', NULL, NULL, NULL, NULL, 'User identification only [7]', NULL, NULL, NULL, 'HIGH', 'HIGH', '7.5', 'MEDIUM', '5.5', '2022-03-13 16:18:04'),
(20, 9, 9, 9, 9, NULL, 9, 9, 9, NULL, NULL, 9, 9, 9, 9, 7, 9, 'authfact(9)', 'Authentication factors(9)', NULL, NULL, NULL, NULL, 'No authentication [9] ', NULL, NULL, NULL, 'CRITICAL', 'HIGH', '7.875', 'HIGH', '6.5', '2022-03-13 16:18:04'),
(21, 1, 1, 4, 2, 1, 1, 1, 1, 2, 1, NULL, 1, 1, 1, 2, 3, 'sign(1)', 'Signature (1)', NULL, NULL, NULL, NULL, NULL, 'RSA Asymmetric Signature [1]', NULL, NULL, 'INFO', 'LOW', '1.5', 'LOW', '1.375', '2022-03-14 16:18:04'),
(22, 3, 4, 4, 2, 3, 3, 4, 3, 2, 3, NULL, 7, 3, 4, 2, 3, 'sign(2)', 'Signature (2)', NULL, NULL, NULL, NULL, NULL, 'HMAC symmetric signature [2]', NULL, NULL, 'MEDIUM', 'MEDIUM ', '3.25', 'MEDIUM', '3', '2022-03-15 16:18:04'),
(23, 5, 9, 7, 5, 7, 5, 6, 8, 6, 5, NULL, 7, 7, 5, 5, 5, 'sign(5)', 'Signature (5)', NULL, NULL, NULL, NULL, NULL, 'Event based token [5]', NULL, NULL, 'HIGH', 'HIGH', '6.5', 'MEDIUM', '5', '2022-03-16 16:18:04'),
(24, 6, 9, 7, 6, 7, 9, 6, 8, 6, 7, NULL, 7, 7, 9, 7, 7, 'sign(6)', 'Signature (6)', NULL, NULL, NULL, NULL, NULL, 'Time based token [6]', NULL, NULL, 'CRITICAL', 'HIGH', '7.25', 'HIGH', '6.25', '2022-03-17 16:18:04'),
(25, 9, 9, 7, 9, 7, 9, 9, 8, 7, 7, NULL, 7, 7, 9, 7, 7, 'sign(7)', 'Signature (7)', NULL, NULL, NULL, NULL, NULL, 'Timestamp [7]', NULL, NULL, 'CRITICAL', 'HIGH', '8.375', 'HIGH', '6.375', '2022-03-18 16:18:04'),
(26, 9, 9, 9, 9, 9, 9, 9, 8, 9, 7, NULL, 9, 9, 9, 7, 9, 'sign(8)', 'Signature (8)', NULL, NULL, NULL, NULL, NULL, 'HASH [8]', NULL, NULL, 'CRITICAL', 'HIGH', '8.875', 'HIGH', '7.375', '2022-03-19 16:18:04'),
(27, 9, 9, 9, 9, 9, 9, 9, 9, 9, 7, NULL, 9, 9, 9, 7, 9, 'sign(9)', 'Signature (9)', NULL, NULL, NULL, NULL, NULL, 'None, Unknown signing [9]', NULL, NULL, 'CRITICAL', 'HIGH', '9', 'HIGH', '7.375', '2022-03-20 16:18:04'),
(28, 3, 4, 4, 2, 3, 3, 4, 3, 2, 3, NULL, NULL, 3, 4, 2, 3, 'enc(2)', 'Encryption type (2)', NULL, NULL, NULL, NULL, NULL, NULL, 'RSA, ECC, GPG, PGP, Hybrid [2]', NULL, 'LOW', 'MEDIUM ', '3.25', 'LOW', '2.125', '2022-03-21 16:18:04'),
(29, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, NULL, NULL, 7, 4, 5, 5, 'enc(4)', 'Encryption type (4)', NULL, NULL, NULL, NULL, NULL, NULL, 'AES [4]', NULL, 'MEDIUM', 'MEDIUM ', '5.125', 'MEDIUM', '4', '2022-03-22 16:18:04'),
(30, 6, 9, 7, 6, 7, 9, 6, 8, 6, 7, NULL, NULL, 7, 9, 7, 7, 'enc(6)', 'Encryption type (6)', NULL, NULL, NULL, NULL, NULL, NULL, '3DES [6]', NULL, 'HIGH', 'HIGH', '7.25', 'MEDIUM', '5.375', '2022-03-23 16:18:04'),
(31, 9, 9, 7, 9, 7, 9, 9, 8, 7, 7, NULL, NULL, 7, 9, 7, 7, 'enc(7)', 'Encryption type (7)', NULL, NULL, NULL, NULL, NULL, NULL, 'DES [7]', NULL, 'HIGH', 'HIGH', '8.375', 'MEDIUM', '5.5', '2022-03-24 16:18:04'),
(32, 9, 9, 9, 9, 9, 9, 9, 8, 9, 7, NULL, NULL, 9, 9, 7, 9, 'enc(8)', 'Encryption type (8)', NULL, NULL, NULL, NULL, NULL, NULL, 'ENCODE [8]', NULL, 'CRITICAL', 'HIGH', '8.875', 'HIGH', '6.25', '2022-03-01 16:18:04'),
(33, 9, 9, 9, 9, 9, 9, 9, 9, 9, 7, NULL, NULL, 9, 9, 7, 9, 'enc(9)', 'Encryption type (9)', NULL, NULL, NULL, NULL, NULL, NULL, 'None, Unknown encryption [9]', NULL, 'CRITICAL', 'HIGH', '9', 'HIGH', '6.25', '2022-03-02 16:18:04'),
(34, 3, 4, 4, 2, 3, 3, 4, NULL, 2, NULL, NULL, NULL, 3, 4, 2, 3, 'up(2)', 'User privelege level (2)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User with valid credentials [2]', 'INFO', 'LOW', '2.875', 'LOW', '1.75', '2022-03-03 16:18:04'),
(35, 5, 4, 4, 4, 7, 5, 4, NULL, 6, NULL, NULL, NULL, 7, 4, 5, 5, 'up(4)', 'User privelege level (4)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DB server Administrator[4]', 'MEDIUM', 'MEDIUM ', '4.125', 'MEDIUM', '3.375', '2022-03-04 16:18:04'),
(36, 5, 9, 7, 5, 7, 5, 6, NULL, 6, NULL, NULL, NULL, 7, 5, 5, 5, 'up(5)', 'User privelege level (5)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Service provider Administrator [5]', 'MEDIUM', 'MEDIUM ', '5.5', 'MEDIUM', '3.5', '2022-03-05 16:18:04'),
(37, 9, 9, 7, 9, 7, 9, 9, NULL, 7, NULL, NULL, NULL, 7, 9, 7, 7, 'up(7)', 'User privelege level (7)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Service provider user process [7]', 'HIGH', 'HIGH', '7.375', 'MEDIUM', '4.625', '2022-03-06 16:18:04'),
(38, 9, 9, 9, 9, 9, 9, 9, NULL, 9, NULL, NULL, NULL, 9, 9, 7, 9, 'up(9)', 'User privelege level (9)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Service provider root/administrator process [9]', 'HIGH', 'HIGH', '7.875', 'MEDIUM', '5.375', '2022-03-07 16:18:04'),
(39, 3, 4, 4, 2, 3, 3, 4, 3, 2, 3, 5, 7, 3, 4, 2, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '2-tier [7]', 'Certificate', '1 inspection node [3]', '2 factor authentication  [3]', 'None, Unknown signing [9]', 'RSA, ECC, GPG, PGP, Hybrid [2]', 'User with valid credentials [2]', 'MEDIUM', 'MEDIUM ', '3.25', 'MEDIUM', '3.625', '2022-03-02 16:18:04'),
(40, 1, 1, 4, 2, 1, 1, 1, 1, 2, 1, 5, 1, 1, 1, 2, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '3-tier [5]', 'SAML', '2 inspection nodes [4]', '1 factor authentication [5]', 'RSA Asymmetric Signature [1]', 'None, Unknown encryption [9]', 'User with valid credentials [2]', 'INFO', 'LOW', '1.5', 'LOW', '2', '2022-03-03 16:18:04'),
(41, 1, 1, 4, 2, 1, 1, 1, 1, 2, 1, 5, 1, 1, 1, 2, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '3-tier [5]', 'OAuth2', '2 inspection nodes [4]', '1 factor authentication [5]', 'RSA Asymmetric Signature [1]', 'None, Unknown encryption [9]', 'User with valid credentials [2]', 'INFO', 'LOW', '1.5', 'LOW', '2', '2022-03-04 16:18:04'),
(42, 1, 1, 4, 2, 1, 1, 1, 1, 2, 1, 5, 1, 1, 1, 2, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', 'More than 3-tier [4]', 'OIDC', '3 inspection nodes [5]', '1 factor authentication [5]', 'RSA Asymmetric Signature [1]', 'None, Unknown encryption [9]', 'User with valid credentials [2]', 'INFO', 'LOW', '1.5', 'LOW', '2', '2022-03-05 16:18:04'),
(43, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, 5, 7, 7, 4, 5, 5, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', 'More than 3-tier [4]', 'Kerberos/SPNEGO', '2 inspection nodes [4]', '1 factor authentication [5]', 'Time based token [6]', 'AES, TLS [4]', 'Service provider Administrator [5]', 'MEDIUM', 'MEDIUM ', '5.125', 'MEDIUM', '5.5', '2022-03-06 16:18:04'),
(44, 3, 4, 4, 4, 3, 3, 4, 3, 6, 3, 5, 7, 3, 4, 5, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', 'More than 3-tier [4]', 'NTLM', '1 inspection node [3]', '1 factor authentication [5]', 'HASH [8]', 'None, Unknown encryption [9]', 'Service provider Administrator [5]', 'MEDIUM', 'MEDIUM ', '3.5', 'MEDIUM', '4.5', '2022-03-07 16:18:04'),
(45, 3, 4, 4, 4, 3, 3, 4, 3, 6, 3, 5, 7, 3, 4, 5, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', 'More than 3-tier [4]', 'Digest access authentication', '1 inspection node [3]', '1 factor authentication [5]', 'HASH [8]', 'None, Unknown encryption [9]', 'Service provider Administrator [5]', 'MEDIUM', 'MEDIUM ', '3.5', 'MEDIUM', '4.5', '2022-03-08 16:18:04'),
(46, 3, 4, 4, 4, 3, 3, 4, 3, 6, 3, 5, 7, 3, 4, 5, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '2-tier [7]', 'LDAP', '1 inspection node [3]', '1 factor authentication [5]', 'HASH [8]', 'None, Unknown encryption [9]', 'Service provider user process [7]', 'MEDIUM', 'MEDIUM ', '3.5', 'MEDIUM', '4.5', '2022-03-09 16:18:04'),
(47, 3, 4, 4, 4, 3, 3, 4, 3, 6, 3, 5, 7, 3, 4, 5, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '2-tier [7]', 'RADIUS', '1 inspection node [3]', '1 factor authentication [5]', 'Timestamp [7]', 'None, Unknown encryption [9]', 'Service provider user process [7]', 'MEDIUM', 'MEDIUM ', '3.5', 'MEDIUM', '4.5', '2022-03-10 16:18:04'),
(48, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, 5, 7, 7, 4, 5, 5, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '3-tier [5]', 'OTP', '2 inspection nodes [4]', 'User identification only [7]', 'None, Unknown signing [9]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'MEDIUM', 'MEDIUM ', '5.125', 'MEDIUM', '5.5', '2022-03-11 16:18:04'),
(49, 5, 4, 4, 4, 7, 5, 4, 8, 6, 5, 5, 7, 7, 4, 5, 5, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '2-tier [7]', 'CAPTCHA', '2 inspection nodes [4]', 'User identification only [7]', 'Event based token [5]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'MEDIUM', 'MEDIUM ', '5.125', 'MEDIUM', '5.5', '2022-03-12 16:18:04'),
(50, 5, 4, 4, 4, 7, 5, 4, 8, 5, 5, 5, 7, 7, 4, 5, 5, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '2-tier [7]', 'APIKEY', 'More than 4, Unknown Location [9]', 'User identification only [7]', 'None, Unknown signing [9]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'CRITICAL', 'HIGH', '8.375', 'HIGH', '7.25', '2022-03-31 14:29:13'),
(51, 5, 9, 7, 5, 7, 5, 6, 8, 7, 7, 5, 7, 7, 5, 5, 5, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '2-tier [7]', 'BASE64', 'More than 4, Unknown Location [9]', '1 factor authentication [5]', 'None, Unknown signing [9]', 'ENCODE [8]', 'Service provider root/administrator process [9]', 'CRITICAL', 'HIGH', '6.5', 'HIGH', '6', '2022-03-31 14:27:54'),
(52, 9, 9, 7, 9, 9, 9, 9, 8, 9, 7, 7, 7, 7, 9, 7, 7, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '1-tier, Unknown architecture [9]', 'ClearText', 'More than 4, Unknown Location [9]', 'User identification only [7]', 'None, Unknown signing [9]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'CRITICAL', 'HIGH', '8.625', 'HIGH', '7.5', '2022-03-15 16:18:04'),
(53, 3, 4, 4, 4, 3, 3, 4, 3, 6, 3, 5, 7, 3, 4, 5, 3, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', 'More than 3-tier [4]', 'Cookies', '1 inspection node [3]', '1 factor authentication [5]', 'None, Unknown signing [9]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'MEDIUM', 'MEDIUM ', '3.5', 'MEDIUM', '4.5', '2022-03-16 16:18:04'),
(54, 9, 9, 9, 9, 9, 9, 9, 9, 9, 7, 9, 9, 9, 9, 7, 9, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '1-tier, Unknown architecture [9]', 'Unknown', 'More than 4, Unknown Location [9]', 'No authentication [9] ', 'None, Unknown signing [9]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'CRITICAL', 'HIGH', '9', 'HIGH', '8.5', '2022-03-17 16:18:04'),
(55, 9, 9, 9, 9, 9, 9, 9, 9, 9, 7, 9, 9, 9, 9, 7, 9, 'tmp0', 'Worst case scenario', 'Strictly confidential, unknown data classification [9]', '1-tier, Unknown architecture [9]', 'None', 'More than 4, Unknown Location [9]', 'No authentication [9] ', 'None, Unknown signing [9]', 'None, Unknown encryption [9]', 'Service provider root/administrator process [9]', 'CRITICAL', 'HIGH', '9', 'HIGH', '8.5', '2022-03-17 16:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `role`) VALUES
(1, 'user', '$2y$10$lqFaPhPzlBGdfg/oJ0yvZOL2c2Oo5tTeU3HL00GTtqhca2AYmzm.W', 2, 1),
(3, 'admin', '$2y$10$LxORxn8uNARIQ8iT3yCyy.HOeIHws.A4AbmhWwQ8IXGGa/VomlfRi', 2, 4),
(4, 'operator', '$2y$10$yvvZKGWPdLvcQak8Yy39ae/C1y/g95cK/t8s1RG5t0NYV7twsZQ0O', 2, 2),
(21, 'ra', '$2y$10$N1sAxA5KsQ2O2IkmpR5YmeH1q9epg8SYY6eyZBFwYspIBkvZTYGUK', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `code`, `name`) VALUES
(1, 'USER', 'Standard user'),
(2, 'OPERATOR', 'Operátor modelov'),
(3, 'RISK_ANALYST', 'Risk analytic'),
(4, 'ADMIN', 'Administrátor aplikácie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspects`
--
ALTER TABLE `aspects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dread`
--
ALTER TABLE `dread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dshb_menu`
--
ALTER TABLE `dshb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threats`
--
ALTER TABLE `threats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD KEY `ix_role` (`role`) USING BTREE;

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspects`
--
ALTER TABLE `aspects`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `dread`
--
ALTER TABLE `dread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `dshb_menu`
--
ALTER TABLE `dshb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `threats`
--
ALTER TABLE `threats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
