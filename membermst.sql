-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 2 朁E16 日 02:17
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `membermst`
--

CREATE TABLE `membermst` (
  `memId` char(4) NOT NULL,
  `memName` varchar(256) NOT NULL,
  `memMail` varchar(256) NOT NULL,
  `comName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `membermst`
--

INSERT INTO `membermst` (`memId`, `memName`, `memMail`, `comName`) VALUES
('0000', '山口', 'yamaguchi@email.com', 'google'),
('0001', '田中', 'tanaka@email.com', 'yahoo'),
('0002', '大田', 'oota@email.com', 'naver'),
('0003', '鈴木', 'suzuki@email.com', '富士通'),
('0004', '木村', 'kimura@email.com', 'bufs'),
('0005', '中村', 'nakamura@email.com', 'tomato'),
('0006', '山田', 'yamada@email.com', 'toyota'),
('0007', '高橋', 'takahashi@email.com', 'jsl'),
('0008', '山本', 'yamamoto@email.com', 'sis'),
('0009', '加藤', 'kato@email.com', 'enet'),
('0010', '小林', 'kobayashi@email.com', 'menpower');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membermst`
--
ALTER TABLE `membermst`
  ADD PRIMARY KEY (`memId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
