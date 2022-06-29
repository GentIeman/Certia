-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 29 2022 г., 11:38
-- Версия сервера: 8.0.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `certia`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `accountloanpayments`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `accountloanpayments` (
`AccountId` int unsigned
,`AmountAccount` int
,`AmountDebiting` double
,`DateDebiting` date
,`PaymentStatus` tinyint(1)
,`ClientId` int unsigned
,`FullName` varchar(191)
,`phone` varchar(191)
,`AccountType` varchar(191)
);

-- --------------------------------------------------------

--
-- Структура таблицы `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id` int UNSIGNED NOT NULL,
  `amount_account` int NOT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `clients_id` int UNSIGNED DEFAULT NULL,
  `plans_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `bankaccounts`
--

INSERT INTO `bankaccounts` (`id`, `amount_account`, `opening_date`, `closing_date`, `status`, `clients_id`, `plans_id`) VALUES
(1, -17315, '2022-06-19', '2022-06-19', 'open', 1, 1),
(2, -2000, '2022-06-01', '2022-06-29', 'open', 2, 2),
(3, -1000, '2022-06-02', '2022-06-28', 'open', 12, 3),
(4, -5000, '2022-05-05', '2022-07-15', 'open', 3, 4),
(5, 3800, '2022-06-17', '2022-06-22', 'open', 1, 5),
(6, 2000, '2022-06-27', '2022-06-29', 'Closed', 12, 5),
(7, 27880, '2022-06-17', '2022-06-25', 'Closed', 12, 5),
(8, 6090, '2022-06-17', '2022-06-22', 'open', 12, 5),
(60, -70176, '2021-01-27', '2022-01-27', 'Closed', 12, 1),
(61, 1000, '2022-06-22', '2022-06-30', 'open', 2, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `number` bigint NOT NULL,
  `bankaccounts_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `name`, `number`, `bankaccounts_id`) VALUES
(1, 'MasterCard', 1234567890123456, 1),
(2, 'Visa Gold', 4556535174081328, 3),
(3, 'Visa', 4716273740726567, 7),
(4, 'Maestro', 4929377800943740, 8),
(15, 'Visa', 4929377800943741, 5),
(37, 'Visa', 4929377800943742, 60);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pswd` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `role` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `address`, `phone`, `email`, `pswd`, `birthday`, `gender`, `role`, `avatar`) VALUES
(1, 'Kachalov Nikita Matveehich', 'Krasnoznamensk, st. Gomelskaya, 29', '+7 (906) 173 25 66', 'kachalov@gmail.com', '$2y$10$qhnm8rjEYrv7GVEANxmaY.DK3Ju3E.t48NN/K263dBzvQR317BsuO', '1990-10-12', 'man', 'user', NULL),
(2, 'Zheleznaya Marietta Valentinovna', 'Niva, st. Side alley, 135', '+7 (921) 422 58 48', 'zheleznaya@gmail.com', '$2y$10$qhnm8rjEYrv7GVEANxmaY.DK3Ju3E.t48NN/K263dBzvQR317BsuO', '1995-07-10', 'woman', 'user', NULL),
(3, 'Bazhenov Rostislav Zakirovich', 'Novopokrovskaya, st. Berdskoe highway, 162', '+7 (972) 114 60 87', 'bazhenov@gmail.com', '$2y$10$qhnm8rjEYrv7GVEANxmaY.DK3Ju3E.t48NN/K263dBzvQR317BsuO', '1980-01-01', 'man', 'user', NULL),
(4, 'Kamensky Luchezar Sergeevich', 'Sretensk, st. Veshnih Vody, 3', '+7 (928) 855 26 35', 'kamensky@gmail.com', '$2y$10$qhnm8rjEYrv7GVEANxmaY.DK3Ju3E.t48NN/K263dBzvQR317BsuO', '1978-05-16', 'man', 'user', NULL),
(12, 'Ilya Shepelev', 'Moscow, st. Lenina, 98', '+7 (900) 123 45 67', 'ilya@gmail.com', '$2y$10$qhnm8rjEYrv7GVEANxmaY.DK3Ju3E.t48NN/K263dBzvQR317BsuO', '2022-06-01', 'man', 'admin', 'e9ff7d530f7ce2fc2ddf3e9f3560a99d.jpeg');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `clientsbankaccounts`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `clientsbankaccounts` (
`ClientId` int unsigned
,`Fullname` varchar(191)
,`Address` varchar(191)
,`Phone` varchar(191)
,`Email` varchar(191)
,`Birthday` date
,`Gender` varchar(191)
,`AccountId` int unsigned
,`AmountAccount` int
,`AccountType` varchar(191)
,`Percent` double
,`OpeningDate` date
,`ClosingDate` date
,`Status` varchar(191)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `clientscards`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `clientscards` (
`ClientId` int unsigned
,`FullName` varchar(191)
,`CardId` int unsigned
,`CardName` varchar(191)
,`CardNumber` bigint
,`AccountId` int unsigned
,`AmountAccount` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `clients_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `username`, `email`, `phone`, `content`, `clients_id`) VALUES
(23, 'Ilya Shepelev', 'ilya@gmail.com', '+7 (900) 123 45 67', 'test feedback', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `loanpayments`
--

CREATE TABLE `loanpayments` (
  `id` int UNSIGNED NOT NULL,
  `amount_debiting` double DEFAULT NULL,
  `date_debiting` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `bankaccount_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `loanpayments`
--

INSERT INTO `loanpayments` (`id`, `amount_debiting`, `date_debiting`, `status`, `bankaccount_id`) VALUES
(1, 4000, '2022-05-19', 0, 1),
(2, 3000, '2022-05-17', 0, 2),
(3, 4300, '2022-06-07', 0, 3),
(4, 1850, '2022-06-13', 0, 4),
(5, 4000, '2022-06-19', 1, 1),
(6, 3000, '2022-07-19', 0, 1),
(197, 352, '2021-02-27', 0, 60),
(198, 352, '2021-03-27', 0, 60),
(199, 352, '2021-04-27', 0, 60),
(200, 352, '2021-05-27', 0, 60),
(201, 352, '2021-06-27', 0, 60),
(202, 352, '2021-07-27', 0, 60),
(203, 352, '2021-08-27', 0, 60),
(204, 352, '2021-09-27', 0, 60),
(205, 352, '2021-10-27', 0, 60),
(206, 352, '2021-11-27', 0, 60),
(207, 352, '2021-12-27', 0, 60),
(208, 352, '2022-01-27', 0, 60),
(209, 352, '2022-01-27', 0, 60);

-- --------------------------------------------------------

--
-- Структура таблицы `movemoney`
--

CREATE TABLE `movemoney` (
  `id` int UNSIGNED NOT NULL,
  `from_whom` int DEFAULT NULL,
  `to_whom` int DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operation` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `movemoney`
--

INSERT INTO `movemoney` (`id`, `from_whom`, `to_whom`, `amount`, `timestamp`, `operation`) VALUES
(8, 7, 1, 22, '2022-06-23 19:11:36', NULL),
(9, 7, NULL, 22, '2022-06-23 19:13:44', NULL),
(10, 7, 1, 51, '2022-06-23 19:51:43', NULL),
(55, NULL, 7, 100, '2022-06-26 16:59:14', NULL),
(56, NULL, 29, 0, '2022-06-26 17:46:09', 'open'),
(57, 29, 8, 100, '2022-06-26 17:52:19', NULL),
(166, NULL, 60, 1000, '2021-03-10 20:12:07', NULL),
(167, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(168, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(169, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(170, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(171, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(172, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(173, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(174, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(175, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(176, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(177, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(178, 60, 60, -704, '2022-06-27 20:12:33', 'dept'),
(211, 7, 1, 100, '2022-06-28 12:22:35', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `plans`
--

CREATE TABLE `plans` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `amount` int UNSIGNED DEFAULT NULL,
  `percent` double DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `term` int DEFAULT NULL COMMENT '0 - неограниченный период',
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `plans`
--

INSERT INTO `plans` (`id`, `name`, `amount`, `percent`, `description`, `term`, `type`) VALUES
(1, 'Cash loan', 4000, 5.6, 'Don\'t delay shopping - fill out an application \nand get a loan for your needs', 365, 'Credit'),
(2, 'Education loan', 2000, 4.3, 'Education may be available', 1460, 'Credit'),
(3, 'Loan for equipment', 1000, 3.2, 'Replacement of your favorite equipment without collateral and guarantors', 365, 'Credit'),
(4, 'Repair loan', 5000, 7.8, 'Cosmetic or capital. Apartments or houses. Without collateral and guarantors', 1095, 'Credit'),
(5, 'Behind the wall', 10, NULL, NULL, 270, 'Saving'),
(6, 'New time', 1000, NULL, NULL, 180, 'Cumulative'),
(7, 'A solid foundation', 2000, NULL, NULL, 360, 'Calculated'),
(8, 'History of success', 5000, NULL, NULL, 720, 'Saving');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `plansbankaccounts`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `plansbankaccounts` (
`PlansID` int unsigned
,`PlansName` varchar(191)
,`PlansAmount` int unsigned
,`PlansType` varchar(191)
,`BankaccountsID` int unsigned
,`AccountAmount` int
,`OpeningDate` date
,`ClosingDate` date
,`Status` varchar(191)
);

-- --------------------------------------------------------

--
-- Структура для представления `accountloanpayments`
--
DROP TABLE IF EXISTS `accountloanpayments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `accountloanpayments`  AS SELECT `bankaccounts`.`id` AS `AccountId`, `bankaccounts`.`amount_account` AS `AmountAccount`, `loanpayments`.`amount_debiting` AS `AmountDebiting`, `loanpayments`.`date_debiting` AS `DateDebiting`, `loanpayments`.`status` AS `PaymentStatus`, `clients`.`id` AS `ClientId`, `clients`.`fullname` AS `FullName`, `clients`.`phone` AS `phone`, `plans`.`type` AS `AccountType` FROM (((`bankaccounts` join `loanpayments` on((`bankaccounts`.`id` = `loanpayments`.`bankaccount_id`))) join `clients` on((`clients`.`id` = `bankaccounts`.`clients_id`))) join `plans` on((`plans`.`id` = `bankaccounts`.`plans_id`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `clientsbankaccounts`
--
DROP TABLE IF EXISTS `clientsbankaccounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `clientsbankaccounts`  AS SELECT `clients`.`id` AS `ClientId`, `clients`.`fullname` AS `Fullname`, `clients`.`address` AS `Address`, `clients`.`phone` AS `Phone`, `clients`.`email` AS `Email`, `clients`.`birthday` AS `Birthday`, `clients`.`gender` AS `Gender`, `bankaccounts`.`id` AS `AccountId`, `bankaccounts`.`amount_account` AS `AmountAccount`, `plans`.`type` AS `AccountType`, `plans`.`percent` AS `Percent`, `bankaccounts`.`opening_date` AS `OpeningDate`, `bankaccounts`.`closing_date` AS `ClosingDate`, `bankaccounts`.`status` AS `Status` FROM ((`clients` join `bankaccounts` on((`clients`.`id` = `bankaccounts`.`clients_id`))) join `plans` on((`plans`.`id` = `bankaccounts`.`plans_id`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `clientscards`
--
DROP TABLE IF EXISTS `clientscards`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `clientscards`  AS SELECT `clients`.`id` AS `ClientId`, `clients`.`fullname` AS `FullName`, `cards`.`id` AS `CardId`, `cards`.`name` AS `CardName`, `cards`.`number` AS `CardNumber`, `cards`.`bankaccounts_id` AS `AccountId`, `bankaccounts`.`amount_account` AS `AmountAccount` FROM ((`cards` join `bankaccounts` on((`cards`.`bankaccounts_id` = `bankaccounts`.`id`))) join `clients` on((`bankaccounts`.`clients_id` = `clients`.`id`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `plansbankaccounts`
--
DROP TABLE IF EXISTS `plansbankaccounts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `plansbankaccounts`  AS SELECT `plans`.`id` AS `PlansID`, `plans`.`name` AS `PlansName`, `plans`.`amount` AS `PlansAmount`, `plans`.`type` AS `PlansType`, `bankaccounts`.`id` AS `BankaccountsID`, `bankaccounts`.`amount_account` AS `AccountAmount`, `bankaccounts`.`opening_date` AS `OpeningDate`, `bankaccounts`.`closing_date` AS `ClosingDate`, `bankaccounts`.`status` AS `Status` FROM (`plans` join `bankaccounts` on((`plans`.`id` = `bankaccounts`.`plans_id`)))  ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_bankaccount_clients` (`clients_id`),
  ADD KEY `index_foreignkey_bankaccount_plans` (`plans_id`);

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_cards_bankaccount` (`bankaccounts_id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_feedbacks_clients` (`clients_id`);

--
-- Индексы таблицы `loanpayments`
--
ALTER TABLE `loanpayments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_loanpayments_bankaccount` (`bankaccount_id`);

--
-- Индексы таблицы `movemoney`
--
ALTER TABLE `movemoney`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `loanpayments`
--
ALTER TABLE `loanpayments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT для таблицы `movemoney`
--
ALTER TABLE `movemoney`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT для таблицы `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD CONSTRAINT `c_fk_bankaccount_clients_id` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_bankaccount_plans_id` FOREIGN KEY (`plans_id`) REFERENCES `plans` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `c_fk_cards_bankaccount_id` FOREIGN KEY (`bankaccounts_id`) REFERENCES `bankaccounts` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `c_fk_feedbacks_clients_id` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `loanpayments`
--
ALTER TABLE `loanpayments`
  ADD CONSTRAINT `c_fk_loanpayments_bankaccount_id` FOREIGN KEY (`bankaccount_id`) REFERENCES `bankaccounts` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
