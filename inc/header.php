<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';
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
                <span class="id">시크릿쥬쥬</span>님
              </div>
              <ul class="list-group user-menu-list">
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
                <li class="list-group-item line">
                  <a href="/ccccoding/member/logout.php">로그아웃</a>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/padata/order.php">수강바구니</a>
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
                  <a href="#">카테고리</a>
                  <div class="sub-wrap">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <a href="#">웹개발</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">데이터 사이언스</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">컴퓨터 사이언스</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">프로그래임 언어</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">디자인</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="list-group-item">
                  <a href="#">수강후기</a>
                </li>
                <li class="list-group-item">
                  <a href="#">이벤트</a>
                </li>
                <li class="list-group-item">
                  <a href="#">커뮤니티</a>
                  <div class="sub-wrap">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <a href="#">공지사항</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">Q&amp;A</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>

            <form action="" class="filter-area">
              <div class="ipt-wrap">
                <input type="search" class="form-control" placeholder="찾고싶은 강의 주제를 입력해주세요.">
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
