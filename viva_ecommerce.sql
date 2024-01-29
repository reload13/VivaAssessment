-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 24, 2024 at 08:36 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viva_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` mediumint(8) NOT NULL,
  `OrderCode` varchar(255) NOT NULL,
  `TransactionId` varchar(255) DEFAULT NULL,
  `Products` text,
  `StateId` enum('0','1','2','3') DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `CustomerEmail` varchar(255) DEFAULT NULL,
  `CustomerFullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `OrderCode`, `TransactionId`, `Products`, `StateId`, `Discount`, `Amount`, `CustomerEmail`, `CustomerFullname`) VALUES
(6, '4134480758872606', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '2', 20, 8, 'asd@asd.com', 'sot lol'),
(7, '4991851203272605', NULL, ',d65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '2', 20, 9, 'asd@asd.com', 'sot lol'),
(8, '5007689713672606', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '2', 20, 10, 'asd@asd.com', 'sot lol'),
(9, '5304665209372603', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '2', 20, 0, 'asd@asd.com', 'sot lol'),
(10, '6250739678772600', NULL, 'f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 9, 'asd@asd.com', 'sot lol'),
(11, '6365195448872609', 'd1843727-79f6-44fd-8465-b19cd817737e', 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '3', 20, 1, 'asd@asd.com', 'sot lol'),
(13, '6609939278972602', NULL, '', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(14, '7584826267772601', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(15, '7710057558072603', NULL, 'f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 9, 'asd@asd.com', 'sot lol'),
(16, '8024230647172606', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(17, '8470160253672600', NULL, ',d65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 9, 'asd@asd.com', 'sot lol'),
(18, '8581328531172607', NULL, ',d65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 7, 'asd@asd.com', 'sot lol'),
(19, '8866744318772609', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(20, '9073354846072608', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 14, 'asd@asd.com', 'sot lol'),
(21, '9099512364872603', '17ce96ba-de08-4f6a-8e87-002cca0394ba', 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '3', 20, 5, 'asd@asd.com', 'sot lol'),
(22, '9336447912972604', NULL, ',d65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 9, 'asd@asd.com', 'sot lol'),
(23, '9825588693272609', NULL, ',d65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 10, 'asd@asd.com', 'sot lol'),
(24, '7528365338272609', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(25, '8202469491872604', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e1,34d69140-d883-48d5-9af6-cecae5e653e2,34d69140-d883-48d5-9af6-cecae5e653e3,f02c5db3-35f2-4c30-b1b8-09d166417232', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(26, '1954744153072601', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678,34d69140-d883-48d5-9af6-cecae5e653e2', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(27, '2098846354872605', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1', '0', 20, 0, 'asd@asd.com', 'sot lol'),
(28, '4128099396172608', NULL, '34d69140-d883-48d5-9af6-cecae5e653e1', '0', 0, 3, 'asd@asd.com', 'sot lol'),
(29, '9864976387972602', NULL, '51405659-f333-4f68-871d-fe0fc4706678', '0', 0, 6, 'asd@asd.com', 'sot lol'),
(30, '4483032123072605', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1', '0', 0, 4, 'asd@asd.com', 'sot lol'),
(31, '7917664974672601', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1', '0', 0, 2, 'asd@asd.com', 'sot lol'),
(32, '2417744517572603', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,51405659-f333-4f68-871d-fe0fc4706678', '0', 0, 7, 'reload1917@gmail.com', 'Sotos Lolakas'),
(33, '3134595708572607', NULL, 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1,34d69140-d883-48d5-9af6-cecae5e653e1', '0', 0, 8, 'reload1917@gmail.com', 'Sotos Lolakas'),
(34, '2981501695572602', '1c52edf6-9643-4703-8145-b534333c75a2', 'd65d349b-2a77-4fdb-9d7a-0ab85eb84fd1', '3', 0, 4, 'reload1917@gmail.com', 'Sotos Lolakas'),
(35, '6018832709572603', '067c68f9-1df8-4553-b152-1c9798abcf0f', '51405659-f333-4f68-871d-fe0fc4706678', '3', 0, 6, 'reload1917@gmail.com', 'Sotos Lolakas'),
(36, '3546295369772601', '067c68f9-1df8-4553-b152-1c9798abcf0f', 'f02c5db3-35f2-4c30-b1b8-09d166417232', '3', 0, 99, 'reload1917@gmail.com', 'Sotos Lolakas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'C',
  `user_login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(128) NOT NULL DEFAULT '',
  `lastname` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `phone` varchar(128) NOT NULL DEFAULT '',
  `birthday` int(11) NOT NULL DEFAULT '0',
  `roles` varchar(255) NOT NULL DEFAULT 'C',
  `coupon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `user_login`, `password`, `firstname`, `lastname`, `email`, `phone`, `birthday`, `roles`, `coupon`) VALUES
(16, 'C', '', '$2y$10$HvDaI/Njg6K408F5FNO59O1RKTjRts6yNyww2HXy4/wiKHr6Xylt.', 'Sotos', 'Lolakas', 'reload1917@gmail.com', '', 0, 'A,C', ''),
(3, 'C', 'customer', '91ec1f9324753048c0096d036a694f86', 'asd', 'asdasd', 'asd@asd.ddd', '+77777777777', 0, 'C', 'HAPPYBIRTHDAY'),
(4, 'C', '', '$2y$10$zTDM1WJyqc5F7myCEVQpleiFmigrjkZrchg/Hxjkbxwqf3Azg2YEW', '', '', 'asd', '', 0, 'C', ''),
(5, 'C', '', '$2y$10$ZI/1KB1ZT9n/HbUVdDDzZuf5unBIiN.TcSgXuKA.4/a8o.YbBsJxa', '', '', 'asd@asd.da', '', 0, 'C', ''),
(6, 'C', '', '$2y$10$llIe2q5I6Z5uhTvx6Tn4TuzZwqEtIiwt6QAoRGyVIw2zGCA.iM8oK', '', '', 'asd@asd.da', '', 0, 'C', ''),
(7, 'C', '', '$2y$10$mmCUEi8KgfhJ/oRaUX9RQ.q5iHv8S06DgVo4MCRAWX9cZMefR6rle', '', '', 'asd@asd.da', '', 0, 'C', ''),
(8, 'C', '', '$2y$10$g.w0Y02GB09ktd2/vA.UguU0qTZV8CImZ3RDScSyfrVj3l6GxsU8m', '', '', 'asd@asd.da', '', 0, 'C', ''),
(9, 'C', '', '$2y$10$3FVyBFh5Fmi67Cyi5hKbg.nYl9EhnN7ghg5cyCGZbc/vUNTgc5F1e', '', '', 'asd@asd.da', '', 0, 'C', ''),
(10, 'C', '', '$2y$10$pJpzlOawdNXvFlTwS6i4TuYZHa2p33m2g8WmS0frcEf3kppDHurPi', '', '', 'asd@asd.asd', '', 0, 'C', ''),
(11, 'C', '', '$2y$10$MP7zI2iNbMQ1ZaaAZsG7/u3dmiCgPUvZ4./8Q5EC7GzTdIvFF/fbW', '', '', 'asd@asd.asd', '', 0, 'C', ''),
(12, 'C', '', '$2y$10$aPKMHaD/3ruLlGsni2SZL.YuWkbsg0JUSbujTcjg/cyWl4Y1nQQVq', '', '', 'asd@asd.asd', '', 0, 'C', ''),
(13, 'C', '', '$2y$10$xFcvT9A0gPqe2Lq8OJFs4OAmoQ2uH..tqAfZs7JsXiFBib35Pl6B6', '', '', 'asd@asd.asd', '', 0, 'C', ''),
(14, 'C', '', '$2y$10$c.uGUOf5WiFHdnya3ceufOzUHrCxloTtt5kBMQKR6RKoeFazZQpI2', '', '', 'asd@asd.asd', '', 0, 'C', ''),
(15, 'C', '', '$2y$10$0NPyVYiq7vOvRGHFVZmQI.11ypvqMWmEEfdWAbknHPAeAkTf2trGC', '', '', 'asd@asd.asd', '', 0, 'C', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `OrderCode` (`OrderCode`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `OrderCode_2` (`OrderCode`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_login` (`user_login`),
  ADD KEY `uname` (`firstname`,`lastname`),
  ADD KEY `idx_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
