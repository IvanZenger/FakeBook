-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 27. Mrz 2019 um 09:54
-- Server-Version: 10.1.37-MariaDB-0+deb9u1
-- PHP-Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `zurbrueggn`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Hilfe`
--

CREATE TABLE `Hilfe` (
  `ID_Hilfe` int(11) NOT NULL,
  `Hilfe` varchar(400) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Hilfe`
--

INSERT INTO `Hilfe` (`ID_Hilfe`, `Hilfe`, `User_ID`) VALUES
(1, 'Hallo', 9),
(2, 'Guten Tag es ist dumm', 9),
(3, 'Hallo', NULL),
(4, 'fefe', NULL),
(5, 'Hallo ', 27);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kollegen`
--

CREATE TABLE `kollegen` (
  `FromUser_ID` int(11) NOT NULL,
  `ToUser_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kollegen`
--

INSERT INTO `kollegen` (`FromUser_ID`, `ToUser_ID`) VALUES
(9, 9),
(9, 45),
(9, 62);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `ID_Kommentar` int(11) NOT NULL,
  `Kommentar` varchar(400) DEFAULT NULL,
  `Post_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kommentar`
--

INSERT INTO `kommentar` (`ID_Kommentar`, `Kommentar`, `Post_ID`, `User_ID`, `Time`) VALUES
(4, 'Jaa ish guuet', 66, 9, '2019-03-22 10:37:32'),
(17, 'Hallo', 66, 27, '2019-03-22 11:49:51'),
(18, 'Hallo', 66, 27, '2019-03-22 13:32:54'),
(21, 'Hallo', 74, 9, '2019-03-22 13:55:40'),
(22, 'hallo', 74, 9, '2019-03-22 14:01:57'),
(23, 'Hi', 74, 9, '2019-03-22 14:03:41'),
(24, 'hg', 74, 9, '2019-03-22 14:06:28'),
(25, 'fa', 74, 9, '2019-03-22 14:08:26'),
(26, '', 74, 9, '2019-03-22 14:08:28'),
(27, '', 74, 9, '2019-03-22 14:08:29'),
(28, '', 74, 9, '2019-03-22 14:08:29'),
(29, 'na super', 74, 9, '2019-03-22 14:08:40'),
(30, '', 74, 9, '2019-03-22 14:08:41'),
(31, '', 74, 9, '2019-03-22 14:08:46'),
(32, '', 74, 9, '2019-03-22 14:08:47'),
(33, '', 74, 9, '2019-03-22 14:08:48'),
(34, '', 74, 9, '2019-03-22 14:08:48'),
(35, '', 74, 9, '2019-03-22 14:08:49'),
(36, '', 74, 9, '2019-03-22 14:08:49'),
(37, '', 74, 9, '2019-03-22 14:08:49'),
(38, '', 74, 9, '2019-03-22 14:08:50'),
(39, 'df', 74, 9, '2019-03-22 14:09:30'),
(40, 'Super Toll XSS ist genialéé!', 77, 9, '2019-03-22 14:32:05'),
(41, '<script>alert(\"Hwoe\"); </script> <h1> owejowjo</h1>', 77, 9, '2019-03-22 14:32:32'),
(42, 'x\'; SELECT * from users; #', 77, 9, '2019-03-22 14:38:57'),
(43, 'x\'; $Seife = SELECT * from users; echo $Seife;#', 77, 9, '2019-03-22 14:39:31'),
(44, 'wfweew', 73, NULL, '2019-03-22 14:45:01'),
(45, 'Can\'t find me??????????', 79, NULL, '2019-03-22 14:58:11'),
(46, '??????????', 79, NULL, '2019-03-22 14:58:25'),
(47, '123', 79, NULL, '2019-03-22 14:58:28'),
(48, '??????????', 66, NULL, '2019-03-22 14:59:08'),
(49, '123344', 79, NULL, '2019-03-22 14:59:47'),
(50, 'Hallo', 81, 27, '2019-03-22 15:01:48'),
(51, 'HI', 81, NULL, '2019-03-22 15:02:17'),
(52, 'hi', 81, NULL, '2019-03-22 15:02:21'),
(53, '??????????', 81, NULL, '2019-03-22 15:02:25'),
(54, '??????????', 81, 9, '2019-03-22 15:02:43'),
(55, 'qwe', 81, 9, '2019-03-22 15:02:46');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `liken`
--

CREATE TABLE `liken` (
  `User_ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `liken`
--

INSERT INTO `liken` (`User_ID`, `Post_ID`) VALUES
(9, 32),
(9, 36),
(9, 37),
(9, 38),
(9, 39),
(9, 43),
(9, 44),
(9, 45),
(9, 47),
(9, 48),
(9, 52),
(9, 54),
(9, 58),
(9, 60),
(9, 61),
(9, 63),
(9, 65),
(9, 66),
(9, 73),
(9, 77),
(27, 32),
(27, 66);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `ID_Post` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Beitrag` varchar(1000) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`ID_Post`, `User_ID`, `Beitrag`, `Time`) VALUES
(32, 9, 'Guten tag ich bin der MIke ein Idiot\r\n', '2019-03-20 13:10:46'),
(36, 9, 'Na wie geits e so?\r\n', '2019-03-21 06:46:57'),
(37, 9, 'Hi', '2019-03-21 07:06:01'),
(38, 9, 'Na', '2019-03-21 07:06:05'),
(39, 9, 'Supi', '2019-03-21 07:06:10'),
(43, 9, 'najaaaaaaa', '2019-03-21 12:32:55'),
(44, 9, 'Hallo\r\n', '2019-03-21 12:33:14'),
(45, 9, 'fjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföe', '2019-03-21 12:33:50'),
(46, 27, 'Hallo', '2019-03-21 12:34:19'),
(47, 9, 'fjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdal\r\nhföefjkdalhföefjkdalhföe\r\nfjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjk\r\ndalhföefjkdalhföefjkdalhföefjkdalhföe\r\nfjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkd\r\nalhföefjkdalhföefjkdalhföefjkdalhföe\r\nfjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalhföefjkdalh\r\nföefjkdalhföefjkdalhföefff', '2019-03-21 12:34:20'),
(48, 9, 'Wie geits dir Ivan?', '2019-03-21 12:34:35'),
(49, 27, 'bir abrag uf d Biträg uf dr home.php SIte, musch no d Sortierig mit DESC erwitere, de stoöh obe immer die neuste Bitreg.\r\n\r\n$sql = \"Select ID_Post,Profilbild,Username,Beitrag,Time FROM post Join user ON ID_User = User_ID order by Time DESC;\";', '2019-03-21 12:36:28'),
(51, 60, 'Registation Funktioniert :)', '2019-03-21 12:40:58'),
(52, 9, 'Ja es geit alles ;)\r\n', '2019-03-21 12:41:26'),
(53, 60, 'Ahh s \"Löschen\"-Icon wird richtig eig. richtig Ahzeigt, abr es versteckt sech irgendwie komsich.\r\n\r\nWen uf eh bimene Post vo dir unger Rechts drüber Hover-isch chunt eh \"Löschen\"-Icon', '2019-03-21 12:42:56'),
(54, 9, 'Hoi Seppli\r\n', '2019-03-21 12:44:18'),
(56, 61, 'd Mobile Variante, het noh es par buugs. Chöimer aber ou as Feature vrchoufe.', '2019-03-21 12:48:12'),
(58, 9, 'chasch du es script machä, wo immer wider d posts teut aktualisiere?', '2019-03-21 12:49:42'),
(60, 9, 'i ha de e validator für alles gmacht', '2019-03-21 12:51:03'),
(61, 9, 'also benutzername name numä fürä Post u hilfe ischer nid dinä', '2019-03-21 12:51:40'),
(62, 61, 'Ja, chani mache.\r\n\r\nD Suech-Bar het ehh Bug dine. Und dr erst Satz vomene Bitrag, wird immer ir Mitti dargsteut.', '2019-03-21 12:52:13'),
(63, 9, 'lueg mal d usersitä a die si super', '2019-03-21 12:53:00'),
(64, 61, 'Ahh s \"Löschen\"-Icon wird richtig dargsteut wuhhhhh:))', '2019-03-21 12:53:36'),
(65, 61, 'D User-Site si wück hueeere guet. Bis uf es Detail ==> D Biträg he kenni Icons. ', '2019-03-21 12:54:55'),
(66, 9, 'Du muesch ja ono öpis ds tüe ha :)', '2019-03-21 12:57:43'),
(71, 62, 'Hallliiihallloooo\r\n', '2019-03-21 19:29:31'),
(73, 45, 'Hallo', '2019-03-22 07:05:54'),
(74, 66, 'Ich habe kein Profilbild', '2019-03-22 11:22:16'),
(76, 9, 'hallo', '2019-03-22 14:27:56'),
(77, 9, '<h1> Hallo </h1> <script> alert(\"Hi\"); </script>', '2019-03-22 14:28:50'),
(78, 9, 'qwfwef2qf', '2019-03-22 14:44:48'),
(79, 9, '1¨ü340kih92v ¨5\'86/(&ç)(\"un98/&\"%&\")\'9tr29§^\',8??6,!M????????????????????)::-x:-()?????????????', '2019-03-22 14:57:23'),
(80, 9, '??????????\r\ntESTEWOFJ2O3', '2019-03-22 14:59:34'),
(81, 9, '??????????\r\n', '2019-03-22 15:01:12'),
(82, 27, 'Hallo', '2019-03-22 15:03:37'),
(83, 70, 'Hehehe @Nici du hast mein Profilbild geklaut!!!!\r\n', '2019-03-22 15:08:01'),
(84, 72, '<img src=\"https://static.giga.de/wp-content/uploads/2015/05/shutterstock_135704441-rcm992x0.jpg\">', '2019-03-26 09:41:03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sms`
--

CREATE TABLE `sms` (
  `ID_Sms` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `sms`
--

INSERT INTO `sms` (`ID_Sms`, `Time`) VALUES
(1, '00:00:00'),
(2, '00:00:00'),
(3, '00:00:00'),
(4, '00:00:00'),
(5, '00:00:00'),
(6, '00:00:00'),
(7, '09:30:57'),
(8, '09:32:10'),
(9, '09:37:52'),
(10, '09:44:20');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Vorname` varchar(40) DEFAULT NULL,
  `Passwort` varchar(80) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telephone` varchar(12) NOT NULL,
  `Profilbild` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID_User`, `Name`, `Vorname`, `Passwort`, `username`, `Email`, `Telephone`, `Profilbild`) VALUES
(9, 'Zurbügg', 'Nicola', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Nici', 'nicolazurbruegg@gmail.com', '41789118066', 'u4-2.2019-03-27-08-03-01.jpg'),
(27, 'db', 'df', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Ivan', 'dfb@gdfg.df', '41792727139', '../picture/DefaultProfilbild.png'),
(45, 'Test', 'Test', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'test', 'test@gmail.com', '', 'meinebilder2.jpg'),
(46, 'Peter', 'Hans', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Hanspeter', 'PeterHans@gmail.com', '', '../picture/DefaultProfilbild.png'),
(59, 'Alles', 'Super', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Supi', 'Super@gmail.com', '', '../picture/DefaultProfilbild.png'),
(60, 'TESTER2', 'Test2', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Test2', 'Test2@mail.ch', '', '../picture/DefaultProfilbild.png'),
(61, 'Test3', 'Test3', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Test3', 'Test2@email.ch', '', '../picture/DefaultProfilbild.png'),
(62, 'Fritz', 'Ruth', 'd31fbdad5f7c7bb15999fb4a416fbf9ace77e6ce2f0b1d3547fcc46191a3c3c7', 'RuFri', 'lazu@gmx.ch', '', '17.png'),
(63, '', 'Hallo', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'aehgui', 'hh@hh.dd', '', 'facebook.jpg'),
(64, 'Huawei', 'huawei', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'NiciAlmighty', 'nicolazurbruegg@gmx.com', '', '../picture/DefaultProfilbild.png'),
(65, 'Zenger', 'Ivan', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Ivan2', 'Ivan@itzengedr.ch', '', '../picture/DefaultProfilbild.png'),
(66, 'Chuck', 'Norris', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'chucknorris', 'chuck.norris@gmail.com', '', 'ictCampus.png'),
(67, 'qwfqjfo', 'qofqjwofj', '9ff0d03790019a23c53395a4aabf8a26089353b5577dcd9873c64fcff099195c', 'fofj', 'o@s.com', '', '../picture/DefaultProfilbild.png'),
(68, 'h1HIh1', '1234567890', 'c3dc87a9d38df00cbb056dff3e1237b3bedd6150d0b30451f32f50b8ec1f7662', '1234567890', '1234567890@com.com', '', '../picture/DefaultProfilbild.png'),
(69, 'd', 'd', '472386a80f7fe5b5c6d513ebaa0f68a2c49312e47ef25b0d4d7fa0e1d7ba350e', 'd', 'ddd@d.ch', '', '../picture/DefaultProfilbild.png'),
(70, 'Zweistein', 'Zweistein', '4fa4fef122a3997c3e88f0d2946690b4cf68c79f969dedbedba79d3044996a88', 'Zweistein', 'Zweistein@stein.ch', '', '../picture/DefaultProfilbild.png'),
(71, 'chuck', 'noris', '4fa4fef122a3997c3e88f0d2946690b4cf68c79f969dedbedba79d3044996a88', 'chuckn', 'chuck-norris@gmail.com', '', '../picture/DefaultProfilbild.png'),
(72, 'Administrator', 'Admin', '4fa4fef122a3997c3e88f0d2946690b4cf68c79f969dedbedba79d3044996a88', 'administrator', 'admin@admin.admin', '', '../picture/DefaultProfilbild.png'),
(73, 'Admin', 'Admin', '4fa4fef122a3997c3e88f0d2946690b4cf68c79f969dedbedba79d3044996a88', 'admin', 'admin@mike.ch', '', 'Screenshot (2).2019-03-26-02-03-55.png'),
(74, 'db', 'df', '8fc586fd8b2749d430a25657c68cd1c939400d17eec1f61d2f1edc8d7b0e0ce4', 'Ivan', 'dfb@gdfg.df', '41792727139', '../picture/DefaultProfilbild.png'),
(75, '', '', NULL, '', NULL, '', '../picture/DefaultProfilbild.png');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Hilfe`
--
ALTER TABLE `Hilfe`
  ADD PRIMARY KEY (`ID_Hilfe`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indizes für die Tabelle `kollegen`
--
ALTER TABLE `kollegen`
  ADD PRIMARY KEY (`FromUser_ID`,`ToUser_ID`),
  ADD KEY `ToUser_ID` (`ToUser_ID`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`ID_Kommentar`),
  ADD KEY `Post_ID` (`Post_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indizes für die Tabelle `liken`
--
ALTER TABLE `liken`
  ADD PRIMARY KEY (`User_ID`,`Post_ID`),
  ADD KEY `Post_ID` (`Post_ID`),
  ADD KEY `Post_ID_2` (`Post_ID`);

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_Post`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indizes für die Tabelle `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`ID_Sms`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Hilfe`
--
ALTER TABLE `Hilfe`
  MODIFY `ID_Hilfe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `ID_Kommentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `ID_Post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT für Tabelle `sms`
--
ALTER TABLE `sms`
  MODIFY `ID_Sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Hilfe`
--
ALTER TABLE `Hilfe`
  ADD CONSTRAINT `Hilfe_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID_User`);

--
-- Constraints der Tabelle `kollegen`
--
ALTER TABLE `kollegen`
  ADD CONSTRAINT `kollegen_ibfk_1` FOREIGN KEY (`FromUser_ID`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kollegen_ibfk_2` FOREIGN KEY (`ToUser_ID`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD CONSTRAINT `kommentar_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID_Post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kommentar_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `liken`
--
ALTER TABLE `liken`
  ADD CONSTRAINT `liken_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liken_ibfk_2` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID_Post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
