-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 21-02-02 15:07
-- 서버 버전: 8.0.22
-- PHP 버전: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `opentutorials`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `profile` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `author`
--

INSERT INTO `author` (`id`, `name`, `profile`) VALUES
(1, 'egoing', 'developer'),
(2, 'duru', 'DBA'),
(3, 'taeho', 'Data scientist');

-- --------------------------------------------------------

--
-- 테이블 구조 `testblob`
--

CREATE TABLE `testblob` (
  `img_id` int NOT NULL,
  `img_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` mediumblob NOT NULL,
  `img_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `topic`
--

CREATE TABLE `topic` (
  `id` int NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created` datetime NOT NULL,
  `author_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `topic`
--

INSERT INTO `topic` (`id`, `title`, `description`, `created`, `author_id`) VALUES
(1, 'MySQL', 'MySQL is ....', '2021-01-27 21:48:21', 1),
(2, 'PHP', 'PHP is...', '2021-01-27 22:10:55', 1),
(4, 'Bitnami', 'Bitnami is...', '2021-01-29 10:48:42', 3),
(6, 'Github', 'Github is...', '2021-01-29 16:57:24', 3),
(8, '고양이', '고양이 귀여워', '2021-01-31 14:35:25', 1),
(9, '강아지', '강아지 귀여워', '2021-01-31 14:35:44', 2),
(10, '앵무새', '앵무새도 귀여워', '2021-02-01 12:29:05', 1),
(11, '햄스터', '햄스터 졸귀', '2021-02-01 13:31:00', 3),
(13, '고먐미', '먐먐먐', '2021-02-01 14:26:30', 2),
(19, 'asdf', 'asetasdf', '2021-02-01 16:52:56', 1),
(20, 'oijuweuh', 'zxgf', '2021-02-01 16:53:23', 2),
(21, 'hfshsf', 'sdfsdx', '2021-02-01 16:59:07', 3),
(22, 'aw', 'dfsd', '2021-02-01 17:02:17', 1),
(24, 'waefasdf', 'asdfas', '2021-02-01 23:47:57', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `testblob`
--
ALTER TABLE `testblob`
  ADD PRIMARY KEY (`img_id`);

--
-- 테이블의 인덱스 `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
