-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-04-30 11:14
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `ccccoding`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admins`
--

CREATE TABLE `admins` (
  `idx` int(11) NOT NULL,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `level` tinyint(4) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `end_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admins`
--

INSERT INTO `admins` (`idx`, `userid`, `email`, `username`, `passwd`, `regdate`, `level`, `last_login`, `end_login_date`) VALUES
(4, 'admin', 'admin@ccccoding.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:14', 100, '2024-04-30 11:43:57', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `ssid` varchar(100) DEFAULT NULL,
  `options` varchar(100) DEFAULT NULL,
  `cnt` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `regdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `step` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cid`, `code`, `pcode`, `name`, `step`) VALUES
(18, 'A0002', '', 'UI/UX 디자인', 1),
(19, 'B0001', 'A0002', '기획', 2),
(20, 'B0002', 'A0002', '디자인', 2),
(21, 'B0003', 'A0002', '구현', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cid` int(11) NOT NULL,
  `coupon_name` varchar(100) DEFAULT NULL COMMENT '쿠폰명',
  `coupon_desc` varchar(100) DEFAULT NULL COMMENT '쿠폰설명',
  `coupon_image` varchar(100) DEFAULT NULL COMMENT '쿠폰이미지',
  `coupon_type` tinyint(4) DEFAULT NULL COMMENT '쿠폰타입',
  `coupon_price` double DEFAULT NULL COMMENT '할인금액',
  `coupon_ratio` double DEFAULT NULL COMMENT '할인비율',
  `status` tinyint(4) DEFAULT 0 COMMENT '상태',
  `regdate` datetime DEFAULT NULL COMMENT '등록일',
  `start_date` datetime DEFAULT NULL COMMENT '쿠폰 시작일',
  `end_date` datetime DEFAULT NULL COMMENT '쿠폰 종료일',
  `userid` varchar(100) DEFAULT NULL COMMENT '등록한유저',
  `max_value` double DEFAULT NULL COMMENT '최대할인금액',
  `use_min_price` double DEFAULT NULL COMMENT '최소사용금액'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL,
  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cate` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `price-select` tinyint(4) DEFAULT NULL,
  `sale_ratio` double DEFAULT NULL,
  `cnt` int(11) DEFAULT NULL,
  `sale_cnt` int(11) DEFAULT NULL,
  `isgold` tinyint(4) DEFAULT NULL,
  `issilver` tinyint(4) DEFAULT NULL,
  `iscopper` tinyint(4) DEFAULT NULL,
  `isrecom` tinyint(4) DEFAULT NULL,
  `locate` tinyint(4) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `sale_start_date` datetime NOT NULL,
  `sale_end_date` datetime DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `products`
--

INSERT INTO `products` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `price-select`, `sale_ratio`, `cnt`, `sale_cnt`, `isgold`, `issilver`, `iscopper`, `isrecom`, `locate`, `userid`, `sale_start_date`, `sale_end_date`, `reg_date`, `status`, `delivery_fee`, `url`) VALUES
(29, 'ddd', 'A0002B0001소분류', '', '/ccccoding/admin/upload/20240430051342237221.jpg', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-04-30 12:13:42', 1, 0, NULL),
(34, 'asd', 'A0002B0001', '', '/ccccoding/admin/upload/20240430060433186140.png', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'admin', '2024-04-11 00:00:00', '2024-04-11 00:00:00', '2024-04-30 13:05:07', 1, 0, '화면 캡처 2024-04-12 123535.png'),
(39, 'asd', 'A0002B0001', 'asd', '/ccccoding/admin/upload/20240430060957158863.jpg', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'admin', '2024-04-19 00:00:00', '2024-04-30 00:00:00', '2024-04-30 13:10:35', 1, 0, 'KakaoTalk_20240409_182049473_04.jpg'),
(40, 'asd', 'A0002B0001', 'asd', '/ccccoding/admin/upload/20240430061426126149.jpg', 3, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'admin', '2024-04-05 00:00:00', '2024-04-03 00:00:00', '2024-04-30 13:14:26', 1, 0, '화면 캡처 2024-04-12 123535.png'),
(41, 'asd', 'A0002B0001', 'asd', '/ccccoding/admin/upload/20240430061446163352.jpg', 3, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'admin', '2024-04-05 00:00:00', '2024-04-03 00:00:00', '2024-04-30 13:14:46', 1, 0, '화면 캡처 2024-04-12 123535.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `product_image_table`
--

CREATE TABLE `product_image_table` (
  `imgid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `regdate` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `product_options`
--

CREATE TABLE `product_options` (
  `poid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `cate` varchar(100) DEFAULT NULL,
  `option_name` varchar(100) DEFAULT NULL,
  `option_cnt` int(11) DEFAULT NULL,
  `option_price` int(11) DEFAULT NULL,
  `image_url` varchar(300) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `user_coupons`
--

CREATE TABLE `user_coupons` (
  `ucid` int(11) NOT NULL,
  `couponid` int(11) DEFAULT NULL COMMENT '쿠폰아이디',
  `userid` varchar(100) DEFAULT NULL COMMENT '유저아이디',
  `status` int(11) DEFAULT 1 COMMENT '상태',
  `use_max_date` datetime DEFAULT NULL COMMENT '사용기한',
  `regdate` datetime DEFAULT NULL COMMENT '등록일',
  `reason` varchar(100) DEFAULT NULL COMMENT '쿠폰취득사유'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `cart_pid_IDX` (`pid`),
  ADD KEY `cart_userid_IDX` (`userid`);

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- 테이블의 인덱스 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- 테이블의 인덱스 `product_image_table`
--
ALTER TABLE `product_image_table`
  ADD PRIMARY KEY (`imgid`);

--
-- 테이블의 인덱스 `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`poid`),
  ADD KEY `newtable_pid_IDX` (`pid`) USING BTREE;

--
-- 테이블의 인덱스 `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`ucid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 테이블의 AUTO_INCREMENT `product_image_table`
--
ALTER TABLE `product_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 테이블의 AUTO_INCREMENT `product_options`
--
ALTER TABLE `product_options`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 테이블의 AUTO_INCREMENT `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
