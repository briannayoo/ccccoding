<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';

  if(isset($_COOKIE['recent_viewed'])){
    $recent_viewed = json_decode($_COOKIE['recent_viewed']);
    $resultString = implode(",", $recent_viewed);

    $sql = "SELECT * FROM products WHERE pid in ({$resultString})";

    $result = $mysqli -> query($sql);
    while($row = $result ->fetch_object()){
        $rva[] = $row;
    }
    //print_r($rva);
  }
  //장바구니 조회 $cartSql, $cartResult $cartArr, product테이블에서 pid와 일치하는 데이터에서 thumbnail, name

  if(isset($_SESSION['UID'])){
      $userid = $_SESSION['UID'];
      $ssid = '';
  } else {
      $ssid = session_id();
      $userid = '';
  }

  // $cartSql = "SELECT * FROM cart WHERE ssid = '{$ssid}'";

  $cartSql = "SELECT p.thumbnail,p.name,p.price,p.pid,p.sale_cnt,p.sale_start_date,p.sale_end_date,c.cartid,c.cnt,c.options,c.total
    FROM products p
      INNER JOIN cart c
      ON c.pid = p.pid
      WHERE c.ssid = '{$ssid}' or c.userid = '{$userid}'
  ";

  $cartResult = $mysqli -> query($cartSql);
  while($row = $cartResult->fetch_object()){
      $cartArr[] = $row;
  }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?> - ccccoding</title>
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="/ccccoding/image/favi/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/ccccoding/image/favi/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/ccccoding/image/favi/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/ccccoding/image/favi/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/ccccoding/image/favi/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/ccccoding/image/favi/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/ccccoding/image/favi/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/ccccoding/image/favi/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/ccccoding/image/favi/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/ccccoding/image/favi/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/ccccoding/image/favi/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/ccccoding/image/favi/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/ccccoding/image/favi/favicon-16x16.png">
  <link rel="manifest" href="/ccccoding/image/favi/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ccccoding/image/favi/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- 부트스트랩 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="/ccccoding/css/common.css">
  <link rel="stylesheet" href="/ccccoding/css/main.css"> 
  <link rel="stylesheet" href="/ccccoding/css/layout.css"> 
  <link rel="stylesheet" href="/ccccoding/css/content.css"> 

  <!-- 제이쿼리 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- <script src="/ccccoding/admin/css/bootstrap.bundle.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="/ccccoding/js/common.js"></script>
  
</head>
<body>
  <div class="wrapper">
    <!-- header 박소현 (s) -->
    <header>
      <div class="top-area">
        <div class="container">
          <ul class="list-group util-list">
          <?php
          if (!isset($_SESSION['UID'])) { //없다면
          ?>
            <!-- 로그인 전(s) -->
            <li class="list-group-item">
              <a href="/ccccoding/member/signup.php">회원가입</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/member/login.php">로그인</a>
            </li>
            <li class="list-group-item">
              <a href="#">고객센터</a>
            </li>
            <!-- 로그인 전(e) -->
          <?php
          } else{ //있다면
          ?>  
            <!-- 로그인 후(s) -->
            <li class="list-group-item user-menu">
              <div class="login-profile">
                <div class="img-wrap">
                  <img src="/ccccoding/image/img_header_pf.png" alt="프로필 이미지">
                </div>
                <span class="id"><?= $_SESSION['UID'] ?></span>님
              </div>
              <ul class="list-group user-menu-list">
                <!-- 24-05-15  박소현: home추가 (s) -->
                <li class="list-group-item">
                  <a href="/ccccoding/mypage/mypage.php">HOME</a>
                </li>
                <!-- 24-05-15  박소현: home추가 (e) -->
                <li class="list-group-item">
                  <a href="/ccccoding/mypage/course.php">내 강의 보기</a>
                </li>
                <li class="list-group-item">
                  <a href="/ccccoding/mypage/payment.php">구매내역</a>
                </li>
                <li class="list-group-item">
                  <a href="/ccccoding/mypage/inquiries.php">문의내역</a>
                </li>
                <li class="list-group-item">
                  <a href="/ccccoding/mypage/member.php">회원정보 수정</a>
                </li>
                <!-- 24-05-15  박소현: home추가 (s) -->
                <li class="list-group-item">
                  <a href="/ccccoding/mypage/benefit.php">쿠폰&amp;포인트</a>
                </li>
                <!-- 24-05-15  박소현: home추가 (e) -->
                <li class="list-group-item line">
                  <a href="/ccccoding/member/logout.php">로그아웃</a>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/pdata/cart.php">수강바구니</a>
            </li>
            <li class="list-group-item">
              <a href="#">고객센터</a>
            </li>
            <!-- 로그인 후(e) -->
          <?php
          }
          ?>
          </ul>
        </div>
      </div>
      <div class="gnb-area">
        <div class="container">
          <div class="gnb">
            <div class="left">
              <h1 class="logo">
                <a href="/ccccoding/index.php">
                  <span class="visually-hidden">ㅋㅋㅋ코딩</span>
                </a>
              </h1>
              <ul class="list-group gnb-list">
                <li class="list-group-item">
                  <a href="/ccccoding/lecture/lecture.php">카테고리</a>
                  <div class="sub-wrap">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <a href="/ccccoding/lecture/lecture.php?cate=A0002">UI/UX 디자인</a>
                      </li>
                      <li class="list-group-item">
                        <a href="/ccccoding/lecture/lecture.php?cate=A0003">웹개발</a>
                      </li>
                      <li class="list-group-item">
                        <a href="/ccccoding/lecture/lecture.php?cate=A0004">데이터 사이언스</a>
                      </li>
                      <li class="list-group-item">
                        <a href="/ccccoding/lecture/lecture.php?cate=A0005">컴퓨터 사이언스</a>
                      </li>
                      <li class="list-group-item">
                        <a href="/ccccoding/lecture/lecture.php?cate=A0006">프로그래임 언어</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="list-group-item">
                  <a href="#">수강후기</a>
                </li>
                <li class="list-group-item">
                  <a href="/ccccoding/event/event.php">이벤트</a>
                </li>
                <li class="list-group-item">
                  <a href="/ccccoding/community/notice.php">커뮤니티</a>
                  <div class="sub-wrap">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <a href="/ccccoding/community/notice.php">공지사항</a>
                      </li>
                      <li class="list-group-item">
                        <a href="/ccccoding/community/qna.php">Q&amp;A</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="list-group-item">
                  <a href="/ccccoding/coupon/coupon_down.php">쿠폰</a>
                </li>
              </ul>
            </div>

            <form action="/ccccoding/lecture/lecture.php" class="filter-area">
              <div class="ipt-wrap">
                <input type="search" class="form-control" placeholder="찾고싶은 강의 주제를 입력해주세요." name="search">
                <button class="ico-search">
                  <span class="visually-hidden">검색</span>
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    <!-- header 박소현 (e) -->
