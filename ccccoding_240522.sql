-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-05-21 23:35
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
(4, 'admin', 'admin@ccccoding.com', '관리자', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2024-04-08 14:59:14', 100, '2024-05-22 06:30:53', NULL);

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
  `total` int(11) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `userid`, `ssid`, `options`, `cnt`, `total`, `regdate`) VALUES
(37, 33, '', NULL, NULL, NULL, NULL, '2024-05-21 15:10:56'),
(38, 27, 'aaa', NULL, NULL, NULL, NULL, '2024-05-21 15:13:01'),
(51, 16, 'code01', NULL, NULL, NULL, NULL, '2024-05-22 06:34:41');

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `step` tinyint(4) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cid`, `code`, `pcode`, `name`, `step`, `icon`) VALUES
(18, 'A0002', '', 'UI/UX 디자인', 1, 'fa-palette'),
(19, 'B0001', 'A0002', '기획', 2, ''),
(20, 'B0002', 'A0002', '디자인', 2, ''),
(21, 'B0003', 'A0002', '구현', 2, ''),
(22, 'A0003', '', '웹개발', 1, 'fa-laptop-code'),
(23, 'A0004', '', '데이터 사이언스', 1, 'fa-chart-column'),
(24, 'A0005', '', '컴퓨터 사이언스', 1, 'fa-desktop'),
(25, 'A0006', '', '프로그래밍 언어', 1, 'fa-atom'),
(26, 'B0004', 'A0003', '프론트엔드', 2, ''),
(28, 'B0005', 'A0003', '백엔드', 2, ''),
(29, 'B0006', 'A0003', '풀스택', 2, ''),
(30, 'B0007', 'A0004', '데이터분석', 2, ''),
(31, 'B0008', 'A0004', '인공지능', 2, ''),
(32, 'B0009', 'A0005', '프로그래밍 기초', 2, ''),
(33, 'B00010', 'A0005', '알고리즘,자료구조', 2, ''),
(34, 'B00011', 'A0005', '객체 지향 프로그래밍', 2, ''),
(35, 'B00012', 'A0006', 'Python', 2, ''),
(36, 'B00013', 'A0006', 'JavaScript', 2, ''),
(37, 'C0001', 'B0001', '엑셀', 3, ''),
(38, 'C0002', 'B0002', '일러스트', 3, ''),
(39, 'C0003', 'B0002', '포토샵', 3, ''),
(40, 'C0004', 'B0002', '피그마', 3, ''),
(41, 'C0005', 'B0004', '반응형 웹 퍼블리싱', 3, ''),
(42, 'C0006', 'B0004', '인터렉션 자바스크립트', 3, ''),
(43, 'C0007', 'B0004', 'CSS핵심 개념', 3, ''),
(44, 'C0008', 'B0004', 'HTML 핵심 개념', 3, ''),
(45, 'C0009', 'B0005', 'Express 기본기', 3, ''),
(46, 'C00010', 'B0005', 'Node.js 기본기', 3, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cid` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL COMMENT '쿠폰명',
  `coupon_desc` varchar(255) NOT NULL COMMENT '쿠폰설명',
  `coupon_image` varchar(100) NOT NULL COMMENT '쿠폰이미지',
  `coupon_type` varchar(10) NOT NULL COMMENT '할인종류',
  `coupon_price` double NOT NULL COMMENT '할인금액',
  `coupon_ratio` double NOT NULL COMMENT '할인비율',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '상태',
  `regdate` datetime NOT NULL COMMENT '등록일',
  `userid` varchar(100) NOT NULL COMMENT '등록한유저',
  `max_value` double DEFAULT NULL COMMENT '최대할인금액',
  `use_min_price` double DEFAULT NULL COMMENT '최소사용금액',
  `use_date_type` varchar(10) DEFAULT NULL COMMENT '사용기한',
  `start_date` date DEFAULT NULL COMMENT '사용기한 시작날짜',
  `end_date` date DEFAULT NULL COMMENT '사용기한 마감날짜'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `coupons`
--

INSERT INTO `coupons` (`cid`, `coupon_name`, `coupon_desc`, `coupon_image`, `coupon_type`, `coupon_price`, `coupon_ratio`, `status`, `regdate`, `userid`, `max_value`, `use_min_price`, `use_date_type`, `start_date`, `end_date`) VALUES
(85, '휴먼고객 15% 할인쿠폰', '휴먼고객에게 드리는 15% 할인쿠폰입니다.', '/ccccoding/admin/c_upload/20240502173546116388.jpg', '2', 0, 15, 1, '2024-05-02 17:35:46', '', 10000, 50000, '2', '2024-05-03', '2024-05-31'),
(86, '수험생 20% 할인쿠폰', '코딩을 공부하는 수험생에게 주는 할인쿠폰입니다.', '/ccccoding/admin/c_upload/20240502173812160216.jpg', '2', 0, 20, 2, '2024-05-02 17:38:12', '', 10000, 50000, '2', '2023-11-09', '2023-11-30'),
(87, '여름에도 코딩공부하자!', '썸머이벤트 5000원쿠폰입니다.', '/ccccoding/admin/c_upload/20240502173948103475.jpg', '1', 5000, 0, 1, '2024-05-02 17:39:48', '', 10, 50000, '2', '2024-08-01', '2024-08-01'),
(88, '블랙프라이데이', '블랙프라이데이 최대 70% 쿠폰', '/ccccoding/admin/c_upload/20240502174614150905.jpg', '2', 0, 70, 2, '2024-05-02 17:46:14', '', 20000, 70000, '2', '2024-12-01', '2024-12-31'),
(97, '첫 수강 지원 스폐셜 할인쿠폰', '첫 수강하는 강의에 스폐셜 증정 할인쿠폰입니다.', '/ccccoding/admin/c_upload/20240502192800207556.png', '1', 5000, 0, 1, '2024-05-02 19:28:00', '', 0, 1000, '1', '0000-00-00', '0000-00-00'),
(98, '강의 1+1 쿠폰 (50%할인)', '강의 하나들으면 강의하나가 공짜', '/ccccoding/admin/c_upload/20240502193007114801.png', '2', 0, 50, 1, '2024-05-02 19:30:07', '', 0, 50000, '2', '2024-05-03', '2024-05-25');

-- --------------------------------------------------------

--
-- 테이블 구조 `event`
--

CREATE TABLE `event` (
  `eid` int(11) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_img` varchar(100) NOT NULL,
  `e_file` varchar(100) NOT NULL,
  `event_time` varchar(10) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `event`
--

INSERT INTO `event` (`eid`, `e_name`, `e_img`, `e_file`, `event_time`, `start_date`, `end_date`, `status`) VALUES
(7, '김동주 강사의 프론트 오픈 이벤트', '/ccccoding/admin/image/20240521132900342121.jpg', '', '', '2024-05-21', '2024-05-23', 1),
(8, '네모칸을 채워라!', '/ccccoding/admin/image/20240521132926493168.jpg', '', '', '2024-05-22', '2024-05-25', 1),
(9, '얼리버드 특가', '/ccccoding/admin/image/20240521132955344223.jpg', '', '', '2024-05-01', '2024-05-03', 2),
(10, '50%할인 이벤트', '/ccccoding/admin/image/20240521133026524763.jpg', '', '', '2024-05-21', '2024-05-31', 1),
(11, 'ㅋㅋㅋ 코딩 오픈 이벤트', '/ccccoding/admin/image/20240521133152176948.jpg', '', '', '2024-05-22', '2024-06-21', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `userid` varchar(145) NOT NULL,
  `email` varchar(245) NOT NULL,
  `username` varchar(145) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `age` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`mid`, `userid`, `email`, `username`, `passwd`, `regdate`, `age`, `status`, `phone`, `profile_image`, `point`) VALUES
(34, 'code01', 'code01@ccc.com', '박소현', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-01-03 00:04:20', 20, NULL, '010-2468-2681', '/ccccoding/mypage/uploads/ㄱ변경또현찌.jpg', '1,0000'),
(36, 'code02', 'code02@ccc.com', '우예지', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-06 00:06:32', 25, NULL, '010-2428-2354', '/ccccoding/mypage/uploads/예지찌.jpg', '2,000'),
(37, 'code03', 'code03@ccc.com', '유부현', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-16 00:07:33', 28, NULL, '010-8756-2356', '/ccccoding/mypage/uploads/부현찌.jpg', '3,000'),
(38, 'code04', 'code04@ccc.com', '박나연', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:08:02', 15, '휴먼', '010-5135-2121', NULL, '4,000'),
(39, 'code05', 'code05@ccc.com', '허웅', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:08:40', 23, '휴먼', '010-5692-5638', NULL, '8,000'),
(40, 'code06', 'code06@ccc.com', '최재이', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:09:22', 20, '탈퇴', '010-8583-5628', NULL, NULL),
(41, 'code07', 'code07@ccc.com', '박코딩', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:10:26', 35, NULL, '010-5623-5623', NULL, NULL),
(42, 'code08', 'code08@ccc.com', '강유정', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:11:56', 39, NULL, '010-5678-5622', NULL, NULL),
(43, 'code09', 'code09@ccc.com', '정경민', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:12:21', 18, NULL, '010-5214-5352', NULL, NULL),
(44, 'code10', 'code10@ccc.com', '정유나', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:12:55', 16, '휴먼', '010-5322-8985', NULL, NULL),
(45, 'code11', 'code11@ccc.com', '장다은', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:13:13', 29, NULL, '010-1214-8659', NULL, NULL),
(46, 'code12', 'code12@ccc.com', '안지은', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2024-05-22 00:13:49', 32, '탈퇴', '010-5656-8996', NULL, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) DEFAULT NULL,
  `thumbsup` int(11) DEFAULT NULL,
  `is_img` tinyint(4) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`idx`, `name`, `pw`, `title`, `content`, `date`, `hit`, `thumbsup`, `is_img`, `file`) VALUES
(30, '관리자', '', '이용 약관 변경 안내', '안녕하세요!\r\nㅋㅋㅋ코딩 찾아주신 수강생분들께 진심으로 감사드립니다.\r\n\r\n이용 약관이 변경되어 안내드립니다.\r\n\r\n\r\n변경된 이용 약관은 2024년04월01일 사전 고지 후 2024년04월02일 부터 효력이 발생합니다.\r\n\r\n- 시행예정일 : 2024년04월02일\r\n- 변경내용 : 하단 링크를 통해 상세 비교표 확인 가능 (현행 약관과 개정 약관의 내용 비교)\r\n\r\n▷Link : 이용 약관 전후비교표\r\n\r\n2024년04월02일 부터 시행 될 이용약관의 주요 개정내용은 하단 상세링크를 통해 확인 가능합니다.\r\n\r\n▷ Link : 이용약관 \'개정안\' 전문 보기\r\n\r\n※ 회원 여러분께서 본 공지일로부터 30일 내에 별도 의사표시를 하지 않는 경우, 변경 후 이용약관에 동의하신 것으로 간주합니다.\r\n변경 후 약관의 적용에 동의하지 않는 회원은 이용계약을 해지하고 회원 탈퇴를 요청할 수 있습니다.\r\n\r\n회원 여러분께 더 좋은 서비스로 보답하겠습니다.\r\n감사합니다.\r\n', '2024-05-16', 6, NULL, 0, ''),
(31, '관리자', '', 'ㅋㅋㅋ코딩 군교육 서비스 종료 안내 ', '안녕하세요, ㅋㅋㅋ코딩입니다.\r\n\r\n저희 ㅋㅋㅋ코딩 군 교육을 이용해주셔서 진심으로 감사드립니다.\r\n\r\n여러분의 열띤 학습 의지와 참여 덕분에 지금까지 약 5천여 명의 장병분들께 코딩 교육을 제공해 드릴 수 있었습니다.\r\n\r\nㅋㅋㅋ코딩 군 교육은 정부에서 주관한 \'AISW 국방분야 역량강화\' 사업의 지원으로 개발•운영되는 교육입니다.\r\n\r\n아쉽게도, 올해를 기점으로 사업이 공식적으로 종료되어 ㅋㅋㅋ코딩 군교육 운영이 곧 종료될 예정입니다. \r\n\r\n\r\n서비스 종료는 아래와 같이 순차적으로 진행됩니다.\r\n\r\n\r\n1) 진도율 독려 \'찐한관리 서비스\' - 4/29일까지 제공\r\n\r\n2) 학습질문 서비스 - 4/29일까지 제공\r\n\r\n*학습 질문 서비스의 경우 종료와 동시에 앱 내에서 해당 페이지에 접근하실 수 없으니 양해부탁드립니다. \r\n\r\n3) 신규 수강신청 - 24/05/01까지 제공\r\n\r\n4) 강의 제공 - 24/05/01까지 제공\r\n\r\n멀지 않은 미래에 다시 만날 수 있기를 기대하며, \r\n\r\n여러분의 전역 이후에도 각자의 \'큰일\'을 내시는데 ㅋㅋㅋ코딩이 든든한 조력자가 되겠습니다.\r\n\r\n감사합니다.\r\n\r\n\r\nㅋㅋㅋ코딩 드림', '2024-05-16', 9, NULL, 0, ''),
(32, '관리자', '', '개인정보 처리방침 개정 안내', '안녕하세요.\r\n\r\nㅋㅋㅋ코딩의 서비스를 이용해주시는 여러분들께 진심으로 감사드립니다.\r\n\r\nㅋㅋㅋ코딩의 개인정보 처리방침 개정 관련 공지드립니다.\r\n\r\n\r\n개인정보 처리방침 변경 안내\r\n\r\nㅋㅋㅋ코딩의 개인정보 처리방침이 아래와 같이 일부 변경되어 2024년 05월 01일 부로 시행됩니다.\r\n\r\n\r\n[변경내용]\r\n\r\n1) 개정 내용\r\n\r\na. 제1조(수집하는 개인정보 항목 및 수집방법) 중 \'부트캠프 취업지원 서비스 이용 시\' 내용 추가\r\nb. 제6조(개인정보의 처리위탁) 중 \'부트캠프 취업지원 서비스\' 관련 제3자 제공 내용 추가\r\n\r\n2) 개정 사유: 부트캠프 취업지원 서비스 제공에 따른 개인정보 수집 및 활용 안내를 위함\r\n\r\n3) 시행 일자: 2024년 05월01일\r\n\r\n* 시행일까지 회원이 별도의 동의 또는 거부의 의사표시를 하지 않을 경우, 승낙한 것으로 간주됩니다.\r\n\r\n4) 개인정보 처리방침 확인하기\r\n\r\n\r\n관련하여 궁금하신 사항은 홈페이지 Q&A를 이용해주세요.\r\n\r\n언제나 ㅋㅋㅋ코딩 서비스를 사랑해주시고 이용해주셔서 진심으로 감사합니다.', '2024-05-16', 10, NULL, 0, ''),
(33, '관리자', '', '개인정보보호법 개정안에 따른 휴면 정책 변경 안내', '                     안녕하세요 ㅋㅋㅋ코딩입니다. \r\nㅋㅋㅋ코딩을 이용해 주시는 여러분께 항상 감사드립니다.\r\n\r\n2024년05월02일 부터 개정된 개인정보보호법이 시행됨에 따라 인프런의 운영정책이 아래와 같이 변경되어 안내드립니다.\r\n\r\n[변경사항]\r\n\r\n개인정보보호법 개정(제 39조의 6.개인정보 유효기간제 폐지)에 따라 기존 \"휴면계정\"으로 분류되었던 계정은 2024년05월02일부터 순차적으로 휴면 해제 처리되어 \"활성계정\"으로 전환됩니다.\r\n개정된 개인정보보호법의 내용에 따라 아래와 같이 인프런 서비스 이용약관 및 개인정보처리방침의 일부 내용이 삭제됩니다.\r\n(이용약관 삭제)    \r\n4.   “회사”는 “회원“이 [1년, 3년, 5년] 동안 로그인 하지 않는 경우로서 별도 통지일로부터 7일 이내에 로그인 하지 않은 경우, 해당 “회원“의 계정을 휴면 처리 또는 탈퇴 처리 할 수 있습니다. 해당 “회원“의 계정이 휴면 처리된 이후에도 해당 “회원“이 [1]년 동안 로그인 하지 않는 경우에는 “회사“는 “회원“의 계정을 탈퇴 처리할 수 있습니다.\r\n\r\n(개인정보처리방침 삭제)\r\n2. 회사는 위 기준과 별도로 1년간 서비스를 이용하지 않은 회원의 개인정보는 휴면 계정으로 전환하여 별도로 분리하여 보관하거나 삭제할 수 있습니다. \r\n\r\n[변경일자]\r\n개정된 서비스 이용약관 및 개인정보처리방침은 2024년05월02일부터 적용됩니다.\r\n\r\n감사합니다.\r\nㅋㅋㅋ코딩 드림                                        ', '2024-05-21', 25, NULL, 0, '');

-- --------------------------------------------------------

--
-- 테이블 구조 `payments`
--

CREATE TABLE `payments` (
  `oid` int(11) NOT NULL,
  `orders_date` date NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cancel_request` varchar(50) DEFAULT NULL,
  `refund_request` varchar(50) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `pid` varchar(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `payments`
--

INSERT INTO `payments` (`oid`, `orders_date`, `start_date`, `end_date`, `cancel_request`, `refund_request`, `mid`, `pid`, `total_price`, `status`) VALUES
(45, '2024-05-22', NULL, NULL, NULL, NULL, 34, '42', 449850, 2),
(46, '2024-05-22', NULL, NULL, NULL, NULL, 34, '43', 19950, 2),
(47, '2024-05-22', NULL, NULL, NULL, NULL, 34, '44', 289905, 2),
(48, '2024-05-22', NULL, NULL, NULL, NULL, 34, '45', 284000, 2),
(49, '2024-05-22', NULL, NULL, NULL, NULL, 36, '46', 449850, 0),
(50, '2024-05-22', NULL, NULL, NULL, NULL, 36, '47', 445000, 2),
(51, '2024-05-22', NULL, NULL, NULL, NULL, 37, '48', 289905, 0),
(52, '2024-05-22', NULL, NULL, NULL, NULL, 37, '49', 340000, 2),
(53, '2024-05-22', NULL, NULL, NULL, NULL, 37, '50', 445000, 0);

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
  `price_select` tinyint(4) DEFAULT NULL,
  `sale_ratio` double DEFAULT NULL,
  `cnt` int(11) DEFAULT NULL,
  `textbook` varchar(100) NOT NULL,
  `sale_cnt` int(11) DEFAULT NULL,
  `isgold` tinyint(4) DEFAULT NULL,
  `issilver` tinyint(4) DEFAULT NULL,
  `iscopper` tinyint(4) DEFAULT NULL,
  `isrecom` tinyint(4) DEFAULT NULL,
  `locate` tinyint(4) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `sale_start_date` date NOT NULL,
  `sale_end_date` date DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `hit` int(11) NOT NULL,
  `good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `products`
--

INSERT INTO `products` (`pid`, `name`, `cate`, `content`, `thumbnail`, `price`, `price_select`, `sale_ratio`, `cnt`, `textbook`, `sale_cnt`, `isgold`, `issilver`, `iscopper`, `isrecom`, `locate`, `userid`, `sale_start_date`, `sale_end_date`, `reg_date`, `status`, `delivery_fee`, `url`, `hit`, `good`) VALUES
(1, '데이터 분석 SQL Fundamentals', 'A0004B0007', 'SQL 기본 구문부터 시작하여 데이터 조작, 관리 및 분석을 위한 고급 기술까지 다루며, 실무 데이터를 활용한 복잡한 쿼리 작성법을 배웁니다.', '/ccccoding/admin/upload/20240520095448206142.png', 450000, 1, 0, 0, 'SQL 마스터 가이드', 5000, 1, 0, 0, 0, 0, 'admin', '2024-05-10', '2024-05-20', '2024-05-20 16:54:48', 1, 0, '', 0, 0),
(2, '한 장의 CheatSheet로 살펴보는 C#', 'A0005B00011', 'C#의 핵심 개념과 구문을 한눈에 볼 수 있는 치트시트를 중심으로 배우는 강의입니다. 객체 지향 프로그래밍, 오류 처리, 데이터 구조 등을 효율적으로 학습할 수 있습니다. 실무에 바로 적용 가능한 C# 프로그래밍 방법을 빠르게 익힐 수 있습니다.', '/ccccoding/admin/upload/20240520095522130804.png', 500000, 1, 0, 0, 'C# 초보자를 위한 핸드북', 7500, 0, 0, 0, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 16:55:22', 1, 0, '', 0, 0),
(3, '처음 만난 리액트(React)', 'A0003B0006', '리액트를 처음 접하는 개발자를 위해 컴포넌트 기반의 구조와 상태 관리 방법 등 리액트의 기본적인 요소를 설명합니다.', '/ccccoding/admin/upload/20240520095615129131.png', 300000, 1, 0, 0, '리액트 입문', 100000, 1, 1, 0, 0, 0, 'admin', '2024-08-15', '2024-09-15', '2024-05-20 16:56:15', 1, 0, '', 0, 0),
(4, '[인프런x코드캠프] 강력한 CSS', 'A0003B0004C0007', 'CSS의 기본부터 고급 기술까지 다루며, 효과적인 스타일링 방법을 배웁니다. 반응형 디자인과 애니메이션 기법을 익혀 세련된 웹 페이지를 제작할 수 있습니다. 최신 CSS 프레임워크를 활용한 실습을 통해 실무에서의 활용 능력을 높입니다.', '/ccccoding/admin/upload/20240520095652141229.png', 250000, 1, 0, 0, 'CSS 프로가 되는 길', 8000, 0, 0, 1, 0, 0, 'admin', '2024-10-01', '2024-11-01', '2024-05-20 16:56:52', 1, 0, '', 0, 0),
(6, '실무로 배우는 Illustrator CC 2020', 'A0002B0002C0002', 'Adobe Illustrator의 다양한 도구와 기능을 실무에 적용하며 배우는 강의입니다. 로고 디자인, 일러스트레이션, 인쇄 미디어 디자인 등을 프로젝트를 통해 습득하고, 전문성을 키울 수 있습니다.', '/ccccoding/admin/upload/20240520095738795564.png', 149000, 1, 0, 0, 'Illustrator CC 2020', 8000, 1, 0, 0, 0, 0, 'admin', '2024-05-01', '2024-06-01', '2024-05-20 16:57:38', 1, 0, '', 0, 0),
(7, '2022 30분 요약 강좌 시즌 1 : HTML', 'A0003B0004C0008', 'HTML의 기본 태그 사용법을 신속하게 학습하고 웹 페이지 구조의 이해를 돕는 강의입니다. 바쁜 학습자를 위해 간결하고 명확하게 내용을 전달하며, HTML의 핵심을 빠르게 파악할 수 있습니다.', '/ccccoding/admin/upload/20240520095834107673.png', 200000, 1, 0, 0, 'HTML 빠른 학습', 5000, 0, 0, 1, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 16:58:34', 1, 0, '', 0, 0),
(8, '따라하며 배우는 HTML, CSS', 'A0003B0004C0005', '실제 웹사이트를 만들면서 HTML과 CSS를 배우는 실습 중심의 강의입니다. 기본적인 웹 페이지 제작부터 스타일링, 레이아웃 설정까지 단계별로 진행됩니다. 실습을 통해 웹 개발의 기초를 확실히 다질 수 있습니다.', '/ccccoding/admin/upload/20240520095907622594.png', 220000, 1, 0, 0, 'HTML, CSS 실습', 6000, 0, 1, 1, 0, 0, 'admin', '2024-07-01', '2024-08-01', '2024-05-20 16:59:07', 1, 0, '', 0, 0),
(9, '입문자를 위한 HTML 기초 강의', 'A0003B0004C0008', '웹 개발의 기초가 되는 HTML을 처음 배우는 사람들을 대상으로, 태그, 속성, 문서 구조화의 기본 원칙을 체계적으로 소개합니다. 실습을 통해 HTML 문서를 직접 작성해보며 이해도를 높일 수 있습니다.', '/ccccoding/admin/upload/20240520095934823780.jpg', 180000, 1, 0, 0, 'HTML 기초', 4000, 0, 0, 1, 0, 0, 'admin', '2024-05-01', '2024-06-01', '2024-05-20 16:59:34', 1, 0, '', 0, 0),
(10, '코딩은 처음이라 with 웹 퍼블리싱 - HTML', 'A0003B0004C0005', '웹 퍼블리싱의 기초를 다루며 HTML과 CSS를 활용하여 간단한 웹 페이지를 제작하는 방법을 배웁니다. 기초부터 차근차근 설명하여 초보자도 쉽게 따라할 수 있도록 구성된 강의입니다.', '/ccccoding/admin/upload/20240520100008208176.jpg', 250000, 1, 0, 0, 'HTML 퍼블리싱', 5500, 0, 0, 1, 0, 0, 'admin', '2024-08-01', '2024-09-01', '2024-05-20 17:00:08', 1, 0, '', 0, 0),
(11, '처음시작하는 HTML & HTML5 Tutorials', 'A0003B0004C0008', 'HTML5의 새로운 요소와 기능을 소개하며, 기존 HTML 지식을 확장하는 데 도움을 주는 강의입니다. 실습을 통해 최신 웹 기술을 배우고, HTML5의 강력한 기능을 활용하는 방법을 익힙니다.', '/ccccoding/admin/upload/20240520100045176388.png', 280000, 1, 0, 0, 'HTML5 Tutorials', 6000, 0, 0, 1, 0, 0, 'admin', '2024-07-01', '2024-08-01', '2024-05-20 17:00:45', 1, 0, '', 0, 0),
(12, '생애 첫 SQL', '', 'SQL 프로그래밍을 처음 시작하는 이들을 위한 강의로, 데이터베이스 기초와 간단한 쿼리 작성법을 배웁니다. 실습을 통해 SQL의 기본을 다지고, 데이터베이스 관리 능력을 키울 수 있습니다.', '/ccccoding/admin/upload/20240520100711541352.png', 540000, 1, 0, 0, 'SQL 초보자 가이드', 7000, 1, 1, 0, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 17:07:11', 1, 0, '', 0, 0),
(15, '입문자를 위한 웹 + PHP', 'A0003B0006', '웹 개발의 기초인 HTML과 CSS에 이어, PHP를 사용한 서버 사이드 프로그래밍을 배웁니다. 동적 웹 페이지를 제작하는 방법과 데이터베이스 연동 기술을 익힐 수 있습니다.', '/ccccoding/admin/upload/20240520100327191463.png', 300000, 1, 0, 0, '웹 + PHP 입문', 8000, 1, 1, 0, 0, 0, 'admin', '2024-09-01', '2024-10-01', '2024-05-20 17:03:27', 1, 0, '', 0, 0),
(16, 'Figma 디자인 기초 배우기', 'A0002B0003', 'Figma를 사용하여 웹 및 모바일 UI 디자인의 기초를 배우는 강의입니다. Figma의 기본 도구와 기능을 익히고, 실제 프로젝트를 통해 디자인 실력을 향상시킬 수 있습니다.', '/ccccoding/admin/upload/20240520100406141456.png', 320000, 1, 0, 0, 'Figma 기초', 50000, 0, 0, 1, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 17:04:06', 1, 0, '', 0, 0),
(17, 'Javascript 입문자를 위한 강의', 'A0006B00013', '자바스크립트의 기초 개념부터 변수, 함수, 이벤트 핸들링과 같은 핵심적인 스킬들을 배우는 강의입니다. 실습을 통해 웹 페이지를 동적으로 조작하는 방법을 배우며, 간단한 웹 애플리케이션을 직접 만들어 봅니다.', '/ccccoding/admin/upload/20240520100457171021.png', 350000, 1, 0, 0, '자바스크립트 입문', 10000, 1, 0, 0, 0, 0, 'admin', '2024-08-01', '2024-09-01', '2024-05-20 17:04:57', 1, 0, '', 0, 0),
(18, 'Javascript Real 웹앱 개발', 'A0006B00013', '자바스크립트를 사용하여 실제 웹 애플리케이션을 개발하는 강의입니다. 프론트엔드와 백엔드 기술을 모두 다루며, 완성도 높은 프로젝트를 통해 실무 능력을 향상시킬 수 있습니다.', '/ccccoding/admin/upload/20240520100526175154.jpg', 400000, 1, 0, 0, 'Real 웹앱 개발', 15000, 1, 0, 0, 0, 0, 'admin', '2024-09-01', '2024-10-01', '2024-05-20 17:05:26', 1, 0, '', 0, 0),
(19, '처음 시작하는 C언어', 'A0005B00011', '프로그래밍의 기초가 되는 C언어를 처음부터 체계적으로 배우는 강의입니다. 변수, 자료형, 제어문 등 기본 문법을 익히고, 실습을 통해 C언어의 이해도를 높입니다.', '/ccccoding/admin/upload/20240520100602110885.jpg', 330000, 1, 0, 0, 'C언어 기초', 7000, 1, 1, 0, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 17:06:02', 1, 0, '', 0, 0),
(20, 'PHP 8, 새로운 기능 살펴보기', 'A0004B0007', 'PHP 8에서 새롭게 추가된 기능과 개선된 점을 살펴보는 강의입니다. 최신 PHP 버전의 주요 변경 사항을 이해하고, 이를 실제 프로젝트에 적용하는 방법을 배웁니다.', '/ccccoding/admin/upload/20240520100648432413.png', 290000, 1, 0, 0, 'PHP 8 기능', 6000, 1, 1, 0, 0, 0, 'admin', '2024-07-01', '2024-08-01', '2024-05-20 17:06:48', 1, 0, '', 0, 0),
(21, '모의해킹 실무자가 알려주는, SQL Injection 공격 기법과 시큐어 코딩', 'A0005B0009', 'SQL Injection 공격 기법과 이를 방어하는 시큐어 코딩 방법을 배우는 강의입니다. 실무 경험을 바탕으로 한 모의해킹 사례를 통해 실습을 진행합니다.', '/ccccoding/admin/upload/20240520100757111556.png', 45000, 1, 0, 0, 'SQL Injection 방어', 8000, 1, 1, 0, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 17:07:57', 1, 0, '', 0, 0),
(22, 'jQuery 입문자를 위한 강의', 'A0003B0004C0005', 'jQuery의 기본 사용법과 주요 기능을 배우는 강의입니다. DOM 조작, 이벤트 처리, AJAX 등을 활용하여 웹 페이지의 상호작용을 강화하는 방법을 익힙니다.', '/ccccoding/admin/upload/20240520095415169668.png', 240000, 1, 0, 0, 'jQuery 입문', 5000, 0, 0, 1, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 16:54:15', 1, 0, '', 0, 0),
(23, 'CSS Flex와 Grid 제대로 익히기', 'A0003B0004C0005', 'CSS의 Flexbox와 Grid 레이아웃 시스템을 깊이 있게 배우는 강의입니다. 실습을 통해 현대적인 웹 레이아웃을 구현하는 기술을 익힙니다.', '/ccccoding/admin/upload/20240520095336943637.png', 270000, 1, 0, 0, 'CSS Flex와 Grid', 7500, 0, 0, 1, 0, 0, 'admin', '2024-07-01', '2024-08-01', '2024-05-20 16:53:36', 1, 0, '', 0, 0),
(24, '웹디자인을 위한 포토샵(PS) 기초 다지기', 'A0002B0002C0003', '웹디자인에 필요한 포토샵 기초 기술을 배우는 강의입니다. 포토샵의 기본 도구와 기능을 익히고, 실습을 통해 웹 디자인 프로젝트에 활용하는 방법을 학습합니다.', '/ccccoding/admin/upload/20240520095301144322.png', 110000, 1, 0, 0, '포토샵 기초', 6500, 0, 0, 1, 0, 0, 'admin', '2024-08-01', '2024-09-01', '2024-05-20 16:53:01', 1, 0, '', 0, 0),
(25, '처음 시작하는 jQuery Programming', 'A0003B0004C0005', 'jQuery를 처음 배우는 사람들을 위한 강의로, 기본 문법과 사용법을 체계적으로 설명합니다. 실습을 통해 jQuery를 활용한 동적 웹 페이지 제작 방법을 익힙니다.', '/ccccoding/admin/upload/20240520095200800742.png', 280000, 1, 0, 0, 'jQuery Programming', 5500, 0, 1, 1, 0, 0, 'admin', '2024-09-01', '2024-10-01', '2024-05-20 16:52:00', 1, 0, '', 0, 0),
(26, 'WEB3 - PHP & MySQL', 'A0004B0007', 'PHP와 MySQL을 사용하여 웹 애플리케이션을 개발하는 강의입니다. 서버 사이드 프로그래밍과 데이터베이스 관리 기술을 익히고, 실습 프로젝트를 통해 학습 내용을 적용합니다.', '/ccccoding/admin/upload/20240520095055170070.jpg', 650000, 1, 0, 0, 'PHP & MySQL', 10000, 1, 0, 0, 0, 0, 'admin', '2024-10-01', '2024-11-01', '2024-05-20 16:50:55', 1, 0, '', 0, 0),
(27, '왕초보를 위한 Adobe Photoshop(PS) 가이드', 'A0002B0002C0003', '포토샵을 처음 접하는 사람들을 위한 기초 강의입니다. 포토샵의 기본 도구와 기능을 익히고, 다양한 실습을 통해 기초부터 차근차근 학습할 수 있습니다.', '/ccccoding/admin/upload/20240520095020394663.png', 290000, 1, 0, 0, '포토샵 가이드', 4500, 0, 0, 1, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 16:50:20', 1, 0, '', 0, 0),
(28, 'PHP 기초강좌 - 쩡원의 게시판 홈페이지 제작 무작정 따라하기', 'A0003B0005', 'PHP를 활용하여 게시판 홈페이지를 제작하는 강의입니다. 기초 문법부터 데이터베이스 연동, 게시판 기능 구현까지 단계별로 따라하며 학습할 수 있습니다.', '/ccccoding/admin/upload/20240520094941144242.png', 400000, 1, 0, 0, 'PHP 게시판 제작', 8500, 1, 1, 0, 0, 0, 'admin', '2024-07-01', '2024-08-01', '2024-05-20 16:49:41', 1, 0, '', 0, 0),
(29, '웹 프론트엔드를 위한 Javascript 첫 걸음', 'A0003B0004C0005', '웹 프론트엔드 개발을 위한 자바스크립트의 기초를 배우는 강의입니다. 변수, 함수, 이벤트 처리 등 기본 개념을 익히고, 실습을 통해 웹 페이지에 적용하는 방법을 배웁니다.', '/ccccoding/admin/upload/20240520094848121704.png', 290000, 1, 0, 0, '자바스크립트 첫 걸음', 95, 0, 1, 0, 0, 0, 'admin', '2024-08-01', '2024-09-01', '2024-05-20 16:48:48', 1, 0, '', 0, 0),
(30, '[Javascript] 코어 자바스크립트', 'A0003B0004C0006', '자바스크립트의 핵심 개념과 심화 주제를 다루는 강의입니다. 비동기 프로그래밍, 객체 지향, 모듈 시스템 등 고급 기술을 학습하며, 실무에 바로 적용할 수 있는 방법을 익힙니다.', '/ccccoding/admin/upload/20240520094352624758.jpg', 480000, 1, 0, 0, '코어 자바스크립트', 120, 1, 1, 0, 0, 0, 'admin', '2024-09-01', '2024-10-01', '2024-05-20 16:43:52', 1, 0, '', 0, 0),
(31, '초보자를 위한 HTML 기초', 'A0003B0004C0008', 'HTML의 기초 개념과 기본 태그 사용법을 배우는 강의입니다. 실습을 통해 웹 페이지의 기본 구조를 이해하고, HTML 문서를 작성하는 방법을 익힙니다.', '/ccccoding/admin/upload/20240520094119968425.png', 20000, 1, 0, 0, 'HTML 기초', 50, 0, 0, 1, 0, 0, 'admin', '2024-06-01', '2024-07-01', '2024-05-20 16:41:19', 1, 0, '', 0, 0),
(32, 'Javascript ES6+ 제대로 알아보기', '', 'ES6 이후 자바스크립트의 새로운 기능들을 학습하는 강의입니다. 화살표 함수, 클래스, 모듈, 비동기 함수 등 최신 문법을 익히고, 실무에서의 활용 방법을 배웁니다.', '/ccccoding/admin/upload/20240520094036319249.jpg', 350000, 1, 0, 0, 'ES6+ 자바스크립트', 70, 1, 1, 0, 0, 0, 'admin', '2024-07-01', '2024-08-01', '2024-05-20 16:41:32', 1, 0, '', 0, 0),
(33, 'PHP 프로그래밍 실무 완전 정복! with MySQL', '', 'PHP와 MySQL을 사용하여 실제 웹 애플리케이션을 개발하는 강의입니다. 서버 사이드 프로그래밍, 데이터베이스 관리, 보안 등을 종합적으로 다루며, 실무 프로젝트를 통해 완성도 높은 웹 사이트를 제작합니다.', '/ccccoding/admin/upload/20240520093951822550.png', 450000, 1, 0, 0, 'PHP 실무', 150, 1, 1, 0, 0, 0, 'admin', '2024-08-01', '2024-09-01', '2024-05-21 15:06:36', 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `qid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) DEFAULT NULL,
  `thumbsup` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `qna`
--

INSERT INTO `qna` (`qid`, `userid`, `pw`, `title`, `content`, `date`, `hit`, `thumbsup`, `status`) VALUES
(28, 'code01', '$2y$10$xdDr4JLJbQPI2aBmXkQQ/up2vtP6KdxOefKxUD5aKGCcvYVQCez0e단일쓰레드로 어디까지 커버가 될까요?', '단일쓰레드로 어디까지 커버가 될까요?', '루키스님 강의 잘 듣고 여러가지 연동을 시도해서 컨텐츠를 만드는 중인데요 지금은 데이터나 오브젝트들이 많지 않아서 별 문제가 없는데 나중에 3d 포폴도 이걸 기반으로 만들고 싶어서 멀티쓰레드를 사용해야할 정도는 어느정도 되야하는지가 궁긍합니다.     그리고 마지막에 aws 에 서버 올리시는 부분을 잠깐 언급해주셨는데 c++서버강의엔 그런부분이 없는것 같아 그부분 강의 예정이 있는지도, 아니면 관련 자료나 공부를 어떻게 해야하는지도 궁급합니다', '2024-04-01', 20, 0, 1),
(29, 'code01', '$2y$10$n9qEtMj6Z1Jpl1w9404t3.V8bn3/3P2RY7lKCoz3WKENxTg3BaXua', '행일치 관련해서 개념이 헷갈립니다.', '인강에서 배운코드는 위와 같고 간단하게 X_train[cols]와 y_train을 display하면 아래와 같이 나옵니다.제가 궁금한 것은 X_train과 y_train이 어쨌든 각 행별 id가 서로 1:1 매칭이되기 때문에 심플하게 submit = pd.DataFrame( { \'id\':X_test[\'id\'], \'income\':pred } )이렇게 표기할 수 있는것같은데 만약에 X_train과 y_train이 서로 id별로 뒤죽박죽이면 둘다 id별로 sort_value를 하고 해야하는게 맞을까요? 그리고 시험문제에서는 이정도까지 처리를 요구할까요?  ', '2024-05-01', NULL, 0, 1),
(30, 'code01', '$2y$10$WE6KvKh6ajnw4RRw4UUdc.GrsvT.GD/uMRGtk.4lSdq/MM7JJWlo.', '강의자료 구글 드라이버가 끈겨습니다', '언리얼 C++은 의지가 있어야 합니다. 저는 여러분들이 프로그래밍 언어와 언리얼 엔진에 대해서 많은 관심이 있어서 강의를 듣는다고 생각합니다. 여러분들의 미래를 위해서 시간 투자 많이 해주시고, 네이버 카페를 통해서 적극적으로 해 주셔서 언리얼 엔진에 푸짐하게 익숙해 지셔서 여러분들의 미래를 여러분들이 만들어 가기를 바랍니다.', '2024-05-19', NULL, 0, NULL),
(31, 'code02', '$2y$10$gQam3fk9kY/2gb2uI7P/aeFJPGsQFxdtOPMhzVqW618lgq1fWE3Ai', '사용하시는 테마가 궁금합니다', '', '2024-05-16', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `qna_reply`
--

CREATE TABLE `qna_reply` (
  `idx` int(11) NOT NULL,
  `r_idx` int(11) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_content` text NOT NULL,
  `r_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `qna_reply`
--

INSERT INTO `qna_reply` (`idx`, `r_idx`, `r_name`, `r_content`, `r_date`) VALUES
(8, 28, '관리자', '단일 쓰레드로도 많은 부분을 커버할 수 있습니다. 하지만 동시에 처리해야 할 작업이 많아지면 한계에 부딪힐 수 있죠.\r\n단일 쓰레드의 장점은 다음과 같습니다:\r\n\r\n구현이 간단하고 자원 관리가 쉽습니다.\r\n쓰레드 간의 동기화 문제가 발생하지 않습니다.\r\n컨텍스트 스위칭 오버헤드가 없어 단일 작업 처리가 빠릅니다.\r\n디버깅과 테스트가 쉽습니다.', '2024-04-02 06:09:33'),
(9, 29, '관리자', '행 일치(Row-Level Locking)는 데이터베이스에서 동시성 제어를 위해 사용되는 잠금(Locking) 방법 중 하나입니다. 이는 테이블 내의 개별 행(Row)에 대해 잠금을 설정하는 것을 말합니다.\r\n\r\n개념:\r\n\r\n행 일치는 테이블의 특정 행에 대한 액세스를 제어합니다.\r\n한 트랜잭션이 특정 행을 수정하고 있을 때, 다른 트랜잭션은 해당 행에 대해 읽기 또는 쓰기 작업을 할 수 없습니다.\r\n행 일치는 동시에 여러 트랜잭션이 같은 테이블의 서로 다른 행에 액세스할 수 있도록 허용합니다.\r\n\r\n\r\n장점:\r\n\r\n세분화된 잠금 제어가 가능하므로 동시성이 향상됩니다.\r\n테이블 수준의 잠금보다 경합이 적습니다.\r\n다른 행에 대한 액세스가 가능하므로 병렬 처리 성능이 향상됩니다.\r\n\r\n\r\n단점:\r\n\r\n행 수준의 잠금을 관리하는 오버헤드가 발생할 수 있습니다.\r\n많은 수의 행에 대해 잠금을 설정하면 성능이 저하될 수 있습니다.\r\n데드락(Deadlock) 가능성이 있으므로 주의해야 합니다.\r\n\r\n\r\n사용 예시:\r\n\r\n온라인 티켓 예매 시스템에서 동시에 같은 좌석을 예매하지 못하도록 행 일치를 사용할 수 있습니다.\r\n은행 시스템에서 동시에 같은 계좌에 대해 입출금이 이루어지지 않도록 행 일치를 사용할 수 있습니다.\r\n\r\n\r\n\r\n행 일치는 동시성 제어를 위한 효과적인 방법이지만, 상황에 따라 테이블 수준의 잠금이나 다른 잠금 방법을 사용할 수도 있습니다. 적절한 잠금 방법을 선택하여 데이터 무결성을 유지하면서 동시성을 최대화하는 것이 중요합니다.', '2024-05-01 06:09:33');

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
-- 테이블의 덤프 데이터 `user_coupons`
--

INSERT INTO `user_coupons` (`ucid`, `couponid`, `userid`, `status`, `use_max_date`, `regdate`, `reason`) VALUES
(28, 0, 'code01', 1, '2024-06-20 23:59:59', '2024-05-22 00:04:20', '회원가입'),
(29, 0, 'code02', 1, '2024-06-20 23:59:59', '2024-05-22 00:05:09', '회원가입'),
(30, 0, 'code02', 1, '2024-06-20 23:59:59', '2024-05-22 00:06:32', '회원가입'),
(31, 0, 'code03', 1, '2024-06-20 23:59:59', '2024-05-22 00:07:33', '회원가입'),
(32, 0, 'code04', 1, '2024-06-20 23:59:59', '2024-05-22 00:08:02', '회원가입'),
(33, 0, 'code05', 1, '2024-06-20 23:59:59', '2024-05-22 00:08:40', '회원가입'),
(34, 0, 'code06', 1, '2024-06-20 23:59:59', '2024-05-22 00:09:22', '회원가입'),
(35, 0, 'code07', 1, '2024-06-20 23:59:59', '2024-05-22 00:10:26', '회원가입'),
(36, 0, 'code08', 1, '2024-06-20 23:59:59', '2024-05-22 00:11:56', '회원가입'),
(37, 0, 'code09', 1, '2024-06-20 23:59:59', '2024-05-22 00:12:21', '회원가입'),
(38, 0, 'code10', 1, '2024-06-20 23:59:59', '2024-05-22 00:12:55', '회원가입'),
(39, 0, 'code11', 1, '2024-06-20 23:59:59', '2024-05-22 00:13:13', '회원가입'),
(40, 0, 'code12', 1, '2024-06-20 23:59:59', '2024-05-22 00:13:49', '회원가입'),
(41, 98, 'code01', 1, '2024-06-20 23:59:59', '2024-05-22 00:30:06', '강의 1 1 쿠폰 (50%할인)'),
(42, 97, 'code01', 1, '2024-06-20 23:59:59', '2024-05-22 00:30:27', '첫 수강 지원 스폐셜 할인쿠폰');

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
  ADD PRIMARY KEY (`eid`);

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
-- 테이블의 인덱스 `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`oid`),
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
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- 테이블의 AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 테이블의 AUTO_INCREMENT `payments`
--
ALTER TABLE `payments`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 테이블의 AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 테이블의 AUTO_INCREMENT `qna_reply`
--
ALTER TABLE `qna_reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
