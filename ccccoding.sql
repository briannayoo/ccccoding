-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 24-05-02 09:42
-- 서버 버전: 8.0.36
-- PHP 버전: 8.2.18

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
  `idx` int NOT NULL,
  `userid` varchar(145) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(245) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(145) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passwd` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `level` tinyint DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `end_login_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admins`
--

INSERT INTO `admins` (`idx`, `userid`, `email`, `username`, `passwd`, `regdate`, `level`, `last_login`, `end_login_date`) VALUES
(4, 'admin', 'admin@ccccoding.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:14', 100, '2024-05-01 23:36:27', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `cartid` int NOT NULL,
  `pid` int DEFAULT NULL,
  `userid` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ssid` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `options` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cnt` int DEFAULT NULL,
  `total` int NOT NULL,
  `regdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cid` int NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `pcode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `step` tinyint NOT NULL
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
  `cid` int NOT NULL,
  `coupon_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '쿠폰명',
  `coupon_desc` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '쿠폰설명',
  `coupon_image` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '쿠폰이미지',
  `coupon_type` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '할인종류',
  `coupon_price` double DEFAULT NULL COMMENT '할인금액',
  `coupon_ratio` double DEFAULT NULL COMMENT '할인비율',
  `status` tinyint DEFAULT '0' COMMENT '상태',
  `regdate` datetime DEFAULT NULL COMMENT '등록일',
  `userid` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '등록한유저',
  `max_value` double DEFAULT NULL COMMENT '최대할인금액',
  `use_min_price` double DEFAULT NULL COMMENT '최소사용금액',
  `use_date_type` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '사용기한',
  `start_date` date NOT NULL COMMENT '사용기한 시작날짜',
  `end_date` date NOT NULL COMMENT '사용기한 마감날짜'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cid`, `coupon_name`, `coupon_desc`, `coupon_image`, `coupon_type`, `coupon_price`, `coupon_ratio`, `status`, `regdate`, `userid`, `max_value`, `use_min_price`, `use_date_type`, `start_date`, `end_date`) VALUES
(18, 'dddd', '쿠폰설명', '/ccccoding/admin/c_upload/20240501104647160192.webp', 'amount', 111, 0, 0, '2024-05-01 10:46:47', NULL, 50000, 10000, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- 테이블 구조 `event`
--

CREATE TABLE `event` (
  `ein` int NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_startdate` date NOT NULL,
  `e_enddate` date NOT NULL,
  `e_status` int NOT NULL,
  `e_img` int NOT NULL,
  `e_text` text,
  `e_file` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `mid` int NOT NULL,
  `join_date` date NOT NULL,
  `userid` varchar(145) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(245) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(145) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passwd` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `age` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`mid`, `join_date`, `userid`, `email`, `username`, `passwd`, `regdate`, `age`, `status`, `phone`) VALUES
(6, '2022-03-08', 'pgongju01', 'pgongju01@abc.com', '박공주', NULL, '2024-04-30 14:10:37', 20, '', '010-1111-1111'),
(7, '2023-03-09', 'wgongju01', 'wgongju01@abc.com', '우공주', NULL, '2024-04-30 14:10:37', 21, '탈퇴', '010-2222-2222'),
(8, '2024-03-10', 'ugongju01', 'ugongju01@abc.com', '유공주', NULL, '2024-04-30 14:10:37', 22, '휴먼', '010-3333-3333');

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `idx` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pw` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `hit` int DEFAULT NULL,
  `thumbsup` int DEFAULT NULL,
  `is_img` tinyint DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`idx`, `name`, `pw`, `title`, `content`, `date`, `hit`, `thumbsup`, `is_img`, `file`) VALUES
(1, '관리자', '1234', 'ㅋㅋㅋ코딩 개인정보 처리방침 개정 안내(2024.03.30)', '안녕하세요.\r\n\r\nㅋㅋㅋ코딩의 서비스를 이용해주시는 여러분들께 진심으로 감사드립니다.\r\n\r\n\r\nㅋㅋㅋ코딩의 개인정보 처리방침 개정 관련 공지드립니다.\r\n\r\n\r\n\r\n개인정보 처리방침 변경 안내\r\n\r\n기업교육 서비스가 추가됨에 따라, ㅋㅋㅋ코딩의 개인정보 처리방침이 아래와 같이 일부 변경되어 2024년 03월 30일 부로 시행됩니다.\r\n\r\n\r\n\r\n[변경내용]\r\n\r\n1) 개정 내용\r\n\r\na. 제1조(수집하는 개인정보 항목 및 수집방법) 중 \'기업교육 서비스 이용 시\' 내용 추가\r\n\r\nb. 제3조(개인정보 보유 및 이용기간) 중 \'기업교육 서비스\' 관련 내용 추가\r\n\r\nc. 제4조(이용자의 권리 및 의무) 중 \'기업교육 서비스\' 관련 내용 추가\r\n\r\n\r\n\r\n2) 개정 사유: 기업교육 서비스 제공에 따른 개인정보 수집 및 활용 안내를 위함\r\n\r\n\r\n\r\n3) 시행 일자: 2024년 03월 30일\r\n\r\n* 시행일까지 회원이 별도의 동의 또는 거부의 의사표시를 하지 않을 경우, 승낙한 것으로 간주됩니다.\r\n\r\n\r\n\r\n4) 개인정보 처리방침 확인하기\r\n\r\n\r\n\r\n관련하여 궁금하신 사항은 홈페이지 우측 하단 [문의하기]를 이용해주세요.\r\n\r\n\r\n\r\n언제나 ㅋㅋㅋ코딩 서비스를 사랑해주시고 이용해주셔서 진심으로 감사합니다.', '2024-03-30', 15, NULL, NULL, NULL),
(2, '', '', '', '\"ㅋㅋㅋ코딩에서 6월 월간 코딩 후기 작성 블로그 체험단을 모집합니다!\"\r\n\r\nㅋㅋㅋ코딩에서 공부도 하고, 대외활동 경험도 쌓아보세요~!\r\n\r\n\r\n\r\n1) 6월 월간코딩이란?\r\n\r\n: ㅋㅋㅋ코딩 6월 한정 무료특강이예요! 무료로 1시간 만에 코딩을 배워 추억기록 네컷 사진으로 만들어볼 수 있답니다!\r\n\r\n\r\n\r\n2) 접수 마감일 : 5월 12일 (일) 23:59까지\r\n\r\n- 합격자 발표: 5월 20일(월) 지원서에 기재된 번호로 개별 통지\r\n\r\n\r\n\r\n3) 지원 분야/자격 (10명 모집)\r\n\r\n- 블로그 SNS 온라인 활동이 활발하신 분\r\n\r\n- 코딩 또는 IT 분야 관심 있으신 분\r\n\r\n\r\n\r\n4) 활동 안내\r\n\r\n- 활동 기간: 6/1(토) ~ 6/12(금) *총 7일*\r\n\r\n- 활동 내용: 6월 월간코딩 강의 수강 후, 개인 블로그 후기 작성 (전체 공개)\r\n\r\n\r\n\r\n5) 활동 혜택\r\n\r\n- 소정의 원고료 및 ㅋㅋㅋ코딩 무료강의 지급\r\n\r\n- 원고료는 체험단 활동 종료 후 7월 중 지급됩니다(별도 안내 예정).\r\n\r\n[문의처]\r\n\r\n\"briannayoo94@gmail.com\" 메일로 연락', '2024-04-29', NULL, NULL, NULL, NULL),
(5, '관리자', '', 'ㅋㅋㅋ코딩 블로그 체험단을 모집합니다!', '                    \r\n\"ㅋㅋㅋ코딩에서 6월 월간 코딩 후기 작성 블로그 체험단을 모집합니다!\"\r\n\r\nㅋㅋㅋ코딩에서 공부도 하고, 대외활동 경험도 쌓아보세요~!\r\n\r\n\r\n\r\n1) 6월 월간코딩이란?\r\n\r\n: ㅋㅋㅋ코딩 6월 한정 무료특강이예요! 무료로 1시간 만에 코딩을 배워 추억기록 네컷 사진으로 만들어볼 수 있답니다!\r\n\r\n\r\n\r\n2) 접수 마감일 : 5월 12일 (일) 23:59까지\r\n\r\n- 합격자 발표: 5월 20일(월) 지원서에 기재된 번호로 개별 통지\r\n\r\n\r\n\r\n3) 지원 분야/자격 (10명 모집)\r\n\r\n- 블로그 SNS 온라인 활동이 활발하신 분\r\n\r\n- 코딩 또는 IT 분야 관심 있으신 분\r\n\r\n\r\n\r\n4) 활동 안내\r\n\r\n- 활동 기간: 6/1(토) ~ 6/12(금) *총 7일*\r\n\r\n- 활동 내용: 6월 월간코딩 강의 수강 후, 개인 블로그 후기 작성 (전체 공개)\r\n\r\n\r\n\r\n5) 활동 혜택\r\n\r\n- 소정의 원고료 및 ㅋㅋㅋ코딩 무료강의 지급\r\n\r\n- 원고료는 체험단 활동 종료 후 7월 중 지급됩니다(별도 안내 예정).\r\n\r\n[문의처]\r\n\r\n\"briannayoo94@gmail.com\" 메일로 연락                    ', '2024-05-01', 10, NULL, NULL, NULL),
(8, '', '', '', '', '2024-05-01', NULL, NULL, 0, ''),
(9, '', '', '', '', '2024-05-01', NULL, NULL, 0, ''),
(10, '', '', '', '', '2024-05-01', NULL, NULL, 0, ''),
(11, '', '', '', '', '2024-05-01', NULL, NULL, 0, ''),
(12, '', '', '', '', '2024-05-01', NULL, NULL, 0, ''),
(14, 'ㅇㅇㅇㅇ', '', 'ㄹㄹㄹ', 'ㅇㄹㄴㄹㄴㄹㄴㄹ', '2024-05-01', NULL, NULL, 0, ''),
(15, 'ㅇㅇㅇ', '', 'ㅇㅇㅇsssss', '                    ㅇㅇㅇㅇ                    ', '2024-05-01', 1, NULL, 1, '20240430153950686406.png'),
(16, 'ㄹㄹㄹ', '', 'ㄹㄹㄹssss', '                                        ㄹㄹㄹㄹㄹ                    dddd                    ', '2024-05-01', 5, NULL, 1, '20240430152541123878.png'),
(18, 'sss', '', 'sss', '                    sss                    ', '2024-05-01', 2, NULL, 0, ''),
(19, 'dfsf', '', 'dsfsf', 'sdsdfsf', '2024-05-01', 1, NULL, 1, '20240501044802109992.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `orders`
--

CREATE TABLE `orders` (
  `oid` int NOT NULL,
  `orders_date` date NOT NULL,
  `coupon_used` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cancel_request` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `refund_request` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pid` int DEFAULT NULL,
  `mid` int DEFAULT NULL,
  `lecture_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '강의명',
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `orders`
--

INSERT INTO `orders` (`oid`, `orders_date`, `coupon_used`, `start_date`, `end_date`, `cancel_request`, `refund_request`, `pid`, `mid`, `lecture_name`, `price`) VALUES
(1, '2024-04-30', '2,000원쿠폰사용', '2024-04-17', '2025-04-17', '', '신청', NULL, NULL, 'html 기초', 0),
(2, '2024-04-30', '2,000원쿠폰사용', '2024-04-17', '2025-04-17', '신청', NULL, NULL, NULL, 'css 기초', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `products`
--

CREATE TABLE `products` (
  `pid` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cate` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` double NOT NULL,
  `price_select` tinyint DEFAULT NULL,
  `sale_ratio` double DEFAULT NULL,
  `cnt` int DEFAULT NULL,
  `textbook` text COLLATE utf8mb4_general_ci,
  `isgold` tinyint DEFAULT NULL,
  `issilver` tinyint DEFAULT NULL,
  `iscopper` tinyint DEFAULT NULL,
  `isrecom` tinyint DEFAULT NULL,
  `locate` tinyint DEFAULT NULL,
  `userid` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sale_start_date` date DEFAULT NULL,
  `sale_end_date` date DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `products`
--

INSERT INTO `products` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `price_select`, `sale_ratio`, `cnt`, `textbook`, `isgold`, `issilver`, `iscopper`, `isrecom`, `locate`, `userid`, `sale_start_date`, `sale_end_date`, `reg_date`, `status`, `delivery_fee`, `url`) VALUES
(42, 'ㅁㅁㅁ', 'A0002B0001', 'ㅁㅁㅁ', '/ccccoding/admin/upload/20240501042236405824.png', 10000, 2, 0, 0, 'ㅋㅋㅋ', 0, 1, 0, 0, 0, 'admin', '2024-05-01', '2024-05-03', '2024-05-01 11:22:46', 1, 0, 'ㅋㅋㅋㅋ'),
(43, 'ㅁㅁㅁㅁ', 'A0002B0002', 'ㅁㅁㅁ', '/ccccoding/admin/upload/20240501044007134350.png', 1000, 2, 0, 0, 'ㅁㅁㅁ', 0, 1, 0, 0, 0, 'admin', '2024-05-01', '2024-05-10', '2024-05-01 11:40:16', 1, 0, 'product2.png'),
(44, 'aaaaaa', 'A0002B0001', 'aaaa', '/ccccoding/admin/upload/20240501044643202980.png', 100, 3, 0, 0, 'aaaaaa', 0, 1, 0, 0, 0, 'admin', '2024-05-01', '2024-05-16', '2024-05-01 11:46:58', 1, 0, 'product3.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `status` tinyint DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `qid` int NOT NULL,
  `hit` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `qna`
--

INSERT INTO `qna` (`status`, `title`, `content`, `name`, `date`, `qid`, `hit`) VALUES
(NULL, '질문이요', '질문이요', '루루', '0000-00-00 00:00:00', 1, NULL),
(NULL, '안녕하세요', '안녕하세요', '히히', '0000-00-00 00:00:00', 2, NULL),
(NULL, '저기요', '저기요', '키키', '2024-05-01 04:13:53', 3, NULL),
(NULL, '문의해요', '문의해요', '코코', '2024-05-01 04:55:53', 4, 15);

-- --------------------------------------------------------

--
-- 테이블 구조 `qna_reply`
--

CREATE TABLE `qna_reply` (
  `idx` int NOT NULL,
  `r_idx` int DEFAULT NULL,
  `r_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `r_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `r_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `user_coupons`
--

CREATE TABLE `user_coupons` (
  `ucid` int NOT NULL,
  `couponid` int DEFAULT NULL COMMENT '쿠폰아이디',
  `userid` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '유저아이디',
  `status` int DEFAULT '1' COMMENT '상태',
  `use_max_date` datetime DEFAULT NULL COMMENT '사용기한',
  `regdate` datetime DEFAULT NULL COMMENT '등록일',
  `reason` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '쿠폰취득사유'
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
-- 테이블의 인덱스 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ein`);

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `fk_product` (`pid`),
  ADD KEY `fk_member` (`mid`);

--
-- 테이블의 인덱스 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`qid`);

--
-- 테이블의 인덱스 `qna_reply`
--
ALTER TABLE `qna_reply`
  ADD PRIMARY KEY (`idx`);

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
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 테이블의 AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `ein` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `mid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 테이블의 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `qid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `qna_reply`
--
ALTER TABLE `qna_reply`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `ucid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`mid`) REFERENCES `members` (`mid`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
