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
  <title>로그인(관리자) - ccccoding</title>
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
</head>
<body>
<div class="container">
  <form action="login_ok.php" method="POST">
    <h1 class="text-center">관리자 로그인</h1>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="userid" id="userid" placeholder="admin">
      <label for="userid">아이디</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="passwd" id="passwd" placeholder="1111">
      <label for="passwd">비밀번호</label>
    </div>
    <div class="mt-3 text-end">
    <button class="btn btn-primary">로그인</button>
    </div>
  </form>
</div>
</body>
<?php

?>