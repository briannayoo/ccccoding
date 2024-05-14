<?php
//회원 검사
if (isset($_SESSION['UID'])) {
  echo "<script>
    alert('이미 로그인되어 있습니다.');
    location.href='/ccccoding/index.php';
  </script>";
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인 - ccccoding</title>
  <!-- 부트스트랩 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="/ccccoding/css/common.css">
  <link rel="stylesheet" href="/ccccoding/css/layout.css">
  <link rel="stylesheet" href="/ccccoding/css/content.css">
  <!-- 부트스트랩 js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
  <!-- 우예지(s) -->
  <div id="login-wrap">
    <div class="login-bg">
      <form action="login_ok.php" method="POST" class="form-list row justify-content-center" id="loginForm">
        <h1 class="text-center bnr-tit-l mb-6"><img src="/ccccoding/image/logo_big.png" alt="로고"></h1>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="userid" id="userid" placeholder="아이디">
          <label for="userid" class="label-ml">아이디</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="passwd" id="passwd" placeholder="비밀번호">
          <label for="passwd" class="label-ml">비밀번호</label>
        </div>
        <div class="list-group list-group-horizontal">
          <div class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="chk-list-04" checked  id="rememberMe">
              <label class="form-check-label" for="chk-list-04">
                아이디 저장
              </label>
            </div>
          </div>
          <div class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="chk-list-05">
              <label class="form-check-label" for="chk-list-05">
                자동 로그인
              </label>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <button class="btn btn-primary log-btn">Login</button>
        </div>
        <ul class="list-group etc-list">
          <li class="list-group-item"><a href="#">아이디 찾기</a></li>
          <li class="list-group-item"><a href="#">비밀번호 찾기</a></li>
          <li class="list-group-item"><a href="signup.html">회원가입</a></li>
        </ul>
      </form>
    </div>
  </div>
  <script src="/ccccoding/js/login_cookie.js"></script>
    <!-- 우예지(e) -->
</body>
</html>