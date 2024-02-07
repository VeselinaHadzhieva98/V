-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Време на генериране:  7 фев 2024 в 20:56
-- Версия на сървъра: 10.4.28-MariaDB
-- Версия на PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `horg_db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Схема на данните от таблица `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Структура на таблица `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `category`
--

INSERT INTO `category` (`id`, `type`, `name`) VALUES
(1, 'Income', 'Заплата'),
(4, 'Expenditure', 'Храна'),
(5, 'Expenditure', 'Сметка ток'),
(6, 'Expenditure', 'Сметка вода');

-- --------------------------------------------------------

--
-- Структура на таблица `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `priority` varchar(300) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `due` date DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `goals`
--

INSERT INTO `goals` (`id`, `email`, `title`, `priority`, `status`, `due`, `created`) VALUES
(30, 'veselina.hadzhieva@abv.bg', 'Да кача 10кг.', 'high', 'Open', '2024-05-04', '2024-01-25 21:09:35');

-- --------------------------------------------------------

--
-- Структура на таблица `prequest`
--

CREATE TABLE `prequest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `query` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `posting_date` date DEFAULT NULL,
  `remark` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Схема на данните от таблица `prequest`
--

INSERT INTO `prequest` (`id`, `name`, `email`, `contactno`, `company`, `services`, `others`, `query`, `status`, `posting_date`, `remark`) VALUES
(1, 'Mark Cooper', 'mcooper@mail.com', '09123654789', 'Test Only', '[\\\"Service\\\\/Support Needed 101\\\",\\\"Service\\\\/Support Needed 102\\\",\\\"Service\\\\/Support Needed 103\\\",\\\"Service\\\\/Support Needed 106\\\",\\\"Service\\\\/Support Needed 108\\\"]', '', 'Sample only', 0, '2022-11-29', 'Sample remarks');

-- --------------------------------------------------------

--
-- Структура на таблица `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `due` date DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `tasks`
--

INSERT INTO `tasks` (`id`, `email`, `title`, `description`, `due`, `status`, `created`) VALUES
(1, '0', 'Почисти кухнята', 'Не забравяй котлоните.', '2024-01-23', 'Open', '2024-01-22 21:36:21'),
(2, '0', 'Почисти хола', NULL, '2024-01-24', 'In process', '2024-01-22 21:51:08'),
(3, '0', 'Почисти Спалнята', NULL, '2024-01-24', 'Done', '2024-01-22 21:51:08'),
(25, '0', 'Запиши час при зъболекар', 'Запиши час за другата седмица около 15:00.', '2024-01-28', 'Open', '2023-12-28 12:23:20'),
(28, 'veselina.hadzhieva@abv.bg', 'Напазарувай', 'Не забравяй тоалетна хартия и паста за зъби', '2024-01-27', 'Open', '2024-01-25 12:34:51');

-- --------------------------------------------------------

--
-- Структура на таблица `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  `email_id` varchar(300) DEFAULT NULL,
  `subject` varchar(300) DEFAULT NULL,
  `task_type` varchar(300) DEFAULT NULL,
  `prioprity` varchar(300) DEFAULT NULL,
  `ticket` longtext DEFAULT NULL,
  `attachment` varchar(300) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `admin_remark` longtext DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `admin_remark_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Схема на данните от таблица `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_id`, `email_id`, `subject`, `task_type`, `prioprity`, `ticket`, `attachment`, `status`, `admin_remark`, `posting_date`, `admin_remark_date`) VALUES
(13, '6', 'mcooper@mail.com', 'My Samplle Ticket', 'Option 3', 'urgent(functional problem)', 'Sample Description of the ticket', NULL, 'closed', 'test', '2022-11-29', '2022-11-29 05:53:10'),
(14, '7', 'mcooper@mail.com', 'Sample ticket 102', 'Option 4', 'non-urgent', 'Sample only', NULL, 'closed', 'done', '2022-11-29', '2022-11-29 05:53:52');

-- --------------------------------------------------------

--
-- Структура на таблица `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `email` varchar(300) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `transactions`
--

INSERT INTO `transactions` (`id`, `email`, `type`, `category`, `description`, `date`, `amount`, `account`, `created`) VALUES
(34, 'veselina.hadzhieva@abv.bg', 'Income', 'Заплата', 'Месечна заплата', '2024-01-05', 1540.25, 'Bank account', '2024-01-06 21:57:40');

-- --------------------------------------------------------

--
-- Структура на таблица `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Схема на данните от таблица `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alt_email`, `password`, `mobile`, `gender`, `address`, `status`, `posting_date`) VALUES
(1, 'Veselina Hadzhieva', 'veselina.hadzhieva@abv.bg', 'veselina.hadzhieva@abv.bg', 'admin123', '1234567890', 'female', 'Block 6, Lot 14, 23 St., Here City, Down There, 2306 ', NULL, '2021-04-22 12:25:19'),
(2, 'Mark Cooper', 'mcooper@mail.com', 'mcoop123@mail.com', 'mcooper1234', '09123654789', 'm', 'Sample Address only', NULL, '2022-11-29 03:28:28');

-- --------------------------------------------------------

--
-- Структура на таблица `usercheck`
--

CREATE TABLE `usercheck` (
  `id` int(11) NOT NULL,
  `logindate` varchar(255) DEFAULT '',
  `logintime` varchar(255) DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `ip` varbinary(16) DEFAULT NULL,
  `mac` varbinary(16) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Схема на данните от таблица `usercheck`
--

INSERT INTO `usercheck` (`id`, `logindate`, `logintime`, `user_id`, `username`, `email`, `ip`, `mac`, `city`, `country`) VALUES
(4, '2022/11/29', '09:36:21am', 2, 'Mark Cooper', 'mcooper@mail.com', 0x3a3a31, 0x30302d30422d32422d30322d36352d44, '', ''),
(3, '2022/11/29', '09:01:36am', 2, 'Mark Cooper', 'mcooper@mail.com', 0x3a3a31, 0x30302d30422d32422d30322d36352d44, '', ''),
(5, '2024/01/22', '05:45:53pm', 1, 'Admin Administrator', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', ''),
(6, '2024/01/22', '05:49:21pm', 1, 'Admin Administrator', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', ''),
(7, '2024/01/22', '01:51:01am', 1, 'Veselina Hadzhieva', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', ''),
(8, '2024/01/23', '04:37:50pm', 1, 'Veselina Hadzhieva', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', ''),
(9, '2024/01/23', '05:40:50pm', 1, 'Veselina Hadzhieva', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', ''),
(10, '2024/01/23', '05:41:35pm', 1, 'Veselina Hadzhieva', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', ''),
(11, '2024/02/07', '12:41:47am', 1, 'Veselina Hadzhieva', 'veselina.hadzhieva@abv.bg', 0x3132372e302e302e31, 0x38432d31362d34352d33432d32352d36, '', '');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `prequest`
--
ALTER TABLE `prequest`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `usercheck`
--
ALTER TABLE `usercheck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `prequest`
--
ALTER TABLE `prequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
