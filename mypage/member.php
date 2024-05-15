<?php
  session_start();
  $title = '마이페이지-회원정보수정';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';
  
  // 로그인 확인
  if (!isset($_SESSION['UID'])) {
    header("Location: login.php");
    exit();
  }

  $userid = $_SESSION['UID']; 
  $sql = "SELECT * FROM members WHERE userid = '{$userid}'";
  $result = $mysqli -> query($sql);
  $rs = $result->fetch_object();

?>

<div class="con-wrap">
  <div class="page-tit-area">
    <h2 class="tit-h1">마이페이지</h2>
  </div>
  <!-- 공통 부분 (e) -->

  <!-- 아래에서 부터 작업영역입니다 -->
  <h3 class="tit-h4">회원정보 수정</h3>
  <form action="member_ok.php" method="POST" enctype="multipart/form-data" class="form-list">
    <!-- 프로필 이미지 (s) -->
    <div class="pf-area">
      <div class="img-wrap">
        <img id="profileImage" src="<?= $rs->profile_image ?: '/ccccoding/image/img_my_profile.png'; ?>" alt="프로필 이미지">
      </div>
      <div class="content">
        <input type="file" id="uploadImage" name="profile_image" accept="/ccccoding/image/*" style="display:none;">
        <button type="button" id="img-change-button" class="btn btn-primary gray">변경</button>
        <span class="txt-xs">확장자: png, jpg, jpeg / 용량: 1MB 이하</span>
      </div>
    </div>
    <!-- 프로필 이미지 (e) -->

    <!-- input text 1 (s) -->
    <div class="row">
      <label for="name" class="col-md-1 col-form-label tit-h4">이름</label>
      <div class="col-md-11">
        <div class="input-group">
          <div class="ipt-wrap">
            <input type="text" class="form-control" id="name" name="username" placeholder="이름을 입력해주세요" value="<?= $rs->username; ?>" required>
          </div>
        </div>
      </div>
    </div>
    <!-- input text 1 (e) -->

    <!-- input email (s) -->
    <div class="row">
      <label for="email" class="col-md-1 col-form-label tit-h4">이메일</label>
      <div class="col-md-11">
        <div class="input-group">
          <div class="ipt-wrap">
            <input type="email" class="form-control" id="email" name="email" placeholder="이메일을 입력해주세요." value="<?= $rs->email; ?>" required>
          </div>
        </div>
      </div>
    </div>
    <!-- input email (e) -->

    <!-- input password (s) -->
    <div class="row">
      <label for="password" class="col-md-1 col-form-label tit-h4">비밀번호</label>
      <div class="col-md-11">
        <div class="input-group">
          <div class="ipt-wrap">
            <input type="password" class="form-control" id="password" name="current_password" placeholder="현재 비밀번호" required>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-11">
        <div class="input-group">
          <div class="ipt-wrap">
            <input type="password" class="form-control" id="new_pw" name="new_password" placeholder="새 비밀번호" required>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-11">
        <div class="input-group">
          <div class="ipt-wrap">
            <input type="password" class="form-control" id="new_pw_confirm" name="confirm_password" placeholder="새 비밀번호 확인" required>
          </div>
        </div>
      </div>
    </div>
    <!-- input password (e) -->

    <!-- input tel (s) -->
    <div class="row">
      <label for="phone" class="col-md-1 col-form-label tit-h4">휴대폰번호</label>
      <div class="col-md-11">
        <div class="input-group">
          <div class="ipt-wrap">
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="휴대폰번호를 입력해주세요." value="<?= $rs->phone; ?>" required>
          </div>
        </div>
      </div>
    </div>
    <!-- input tel (e) -->

    <a href="# " class="links">회원탈퇴하기</a>

    <div class="btn-area">
      <button type="submit" class="btn btn-primary btn-md">수정완료</button>
    </div>
  </form>
</div>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
