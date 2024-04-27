<?php
  session_start();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  //include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';

?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>대시보드 - ccccoding</title>
  <!-- 부트스트랩 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/content.css">

  <!-- 부트스트랩 js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
  <script src="/admin/js/common.js"></script>
  <script src="/admin/js/chart.js"></script>
  <script src="/admin/js/dashboard.js"></script>

</head>
<body>
  <div class="admin-wrapper">
    <nav class="gnb">
      <h1 class="logo">
        <a href="index.html">
          <span class="visually-hidden">ccccoding</span>
        </a>
      </h1>
      <ul class="list-group gnb-list">
        <li class="list-group-item on">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-house fa-big"></i>
            <span>대시보드</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-list fa-big"></i>
            <span>카테고리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-chalkboard-user fa-big"></i>
            <span>강의관리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-address-card fa-big"></i>
            <span>회원관리</span>
          </a>
        </li>
        <li class="list-group-item on acco">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fa-solid fa-comments fa-big"></i>
                  <span>커뮤니티</span>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="list-group depth-2">
                    <li class="list-group-item on">
                      <a href="#" class="text-decoration-none">-공지사항</a>
                    </li>
                    <li class="list-group-item">
                      <a href="#" class="text-decoration-none">-Q&amp;A</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-gift fa-big"></i>
            <span>이벤트 관리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-cart-plus fa-big"></i>
            <span>수강관리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-ticket-simple fa-big"></i>
            <span>쿠폰관리</span>
          </a>
        </li>
      </ul>

      <ul class="list-group util-list">
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-power-off fa-small"></i>
            <span>로그아웃</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-gear fa-small"></i>
            <span>설정</span>
          </a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <!-- 상단 until-list (s) -->
      <ul class="list-unstyled top-util-list">
        <li class="alarm">
          <button type="button" class="btn">
            <i class="fa-solid fa-bell fa-small" aria-hidden="true">
            </i>
            <span class="tit-h3">알림</span>
            <span class="badge rounded-pill">
              <span class="visually-hidden">읽지않은 메시지</span>
              <em class="txt-s">9</em>
              <span class="visually-hidden">건</span>
            </span>
          </button>
        </li>
        <li class="profile">
          <div class="profile-wrap">
            <img src="image/img_pf_admin.jpg" alt="프로필이미지"> <!--실제로는 경로변경해야함 ../이거빼야됨-->
          </div>
          <span class="admin tit-h3">관리자</span>
        </li>
      </ul>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">대시보드</h2>
      </div>
      <!-- sub-page-tit-area (e) -->