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
          <label for="userid">아이디</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="passwd" id="passwd" placeholder="PW: 1234">
          <label for="passwd">비밀번호</label>
        </div>
        <div class="mt-3">
          <button class="btn btn-primary log-btn">로그인</button>
        </div>
      </form>
    </div>
  </div>
</body>

