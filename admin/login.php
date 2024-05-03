<?php
session_start();

  if(isset($_SESSION['AUID'])){
    echo "<script>
      alert('이미 로그인 되었습니다.');
      location.href='/ccccoding/admin/index.php';
    </script>";
  }
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

  <link rel="stylesheet" href="/ccccoding/admin/css/datepicker.material.css">
  <link rel="stylesheet" href="/ccccoding/admin/css/common.css">
  <link rel="stylesheet" href="/ccccoding/admin/css/layout.css">
  <link rel="stylesheet" href="/ccccoding/admin/css/content.css">

  <!-- 부트스트랩 js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="/ccccoding/admin/js/common.js"></script>

</head>
<body>
  <div id="login-wrap">
    <div class="login-bg">
      <form action="login_ok.php" method="POST" class="form-list row justify-content-center">
        <h1 class="text-center bnr-tit-l mb-3 logo"><img src="/ccccoding/admin/image/logo.png" alt="" class="login_logo">관리자 로그인</h1>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="userid" id="userid" placeholder="ID: admin">
          <label for="userid">ID: admin</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="passwd" id="passwd" placeholder="PW: 1234">
          <label for="passwd">PW: 1111</label>
        </div>
        <div class="mt-3">
          <button class="btn btn-primary log-btn">로그인</button>
        </div>
      </form>
    </div>
  </div>
  <div class="info-modal">
    <div class="modal_wrapper">
    <img src="/ccccoding/admin/image/logo.png" alt="포트폴리오페이지안내" class="login_logo">
      <h2>LMS 관리자 페이지 제작 프로젝트</h2>
      <br>
      <p>본 사이트는 <em>구직용 포트폴리오 웹사이트</em>이며, <br> 실제로 운영되는 사이트가 아닙니다.</p>
      <hr>
      <p><em>시크릿 쥬쥬:</em> 유*현(팀장),박*현, 우*지</p>
      <p><em>제작기간:</em> 2024.04.04 ~ 2024.05.03</p>
      <p><em>기획서:</em> <a href="#" title="기획서바로가기" target="_blank">figma</a> <em>버전관리:</em> <a href="https://github.com/briannayoo/ccccoding.git" title="ccccoding 깃허브 바로가기" target="_blank">Github</a></p>
      <p><em>개발환경:</em> HTML5, CSS3, Jquery</p>
      <hr>
      <span><em>업무분장</em></span>
      <p><em>기획:</em> 팀원 전체</p>
      <p><em>디자인:</em> 구현 담당자</p>
      <p>	&#45; 구현 완료 페이지	&#45; </p>
      <p class="color"><em>유*현: QnA&#44; 이벤트&#44; 공지사항</em></p>
      <p class="color"><em>박*현: 대시보드(기획)&#44; 쿠폰관리&#44; 수강관리&#44; 회원관리</em></p>
      <p class="color"><em>우*지: 대시보드(디자인,구현)&#44; 로그인&#44; 강의관리&#44; 카테고리</em></p>
    </div>
    <p class="modal_input">
      <input type="checkbox" id="checkbox" name="checkbox">
      <label for="checkbox">오늘하루 열지 않음</label> 
      <a href="#" class="modal_close">close</a>
    </p>
  </div>
  <script src="/ccccoding/admin/js/cookie.js"></script>
</body>

