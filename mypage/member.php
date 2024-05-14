<?php
  $title = '마이페이지-회원정보수정';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';
?>
      
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">마이페이지</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <h3 class="tit-h4">이미지프로필</h3>
        <form action="" class="form-list">
          <!-- 프로필 (s) -->
          <div class="pf-area">
            <div class="img-wrap">
              <img src="../image/img_my_profile.png" alt="">
            </div>
            <div class="content">
              <button type="button" class="btn btn-primary gray">변경</button>
              <span class="txt-xs">확장자: png, jpg, jpeg / 용량: 1MB 이하</span>
            </div>
          </div>
          <!-- 프로필 (e) -->

          <!-- input text 1 (s) -->
          <div class="row">
            <label for="name" class="col-md-1 col-form-label tit-h4">이름</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="text" class="form-control" id="name" name="name" placeholder="이름을 입력해주세요">
                </div>
              </div>
            </div>
          </div>
          <!-- input text 1 (e) -->

          <!-- input email + button (s) -->
          <div class="row mix">
            <label for="email" class="col-md-1 col-form-label tit-h4">이메일</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="email" class="form-control" id="email" name="email" placeholder="이메일을 입력해주세요.">
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm">인증</button>
                <p class="txt-info">*이메일 변경 후 재인증 필요</p>
              </div>
            </div>
          </div>
          <!-- input email + button (e) -->

          <!-- input password (s) -->
          <div class="row pw">
            <label for="password" class="col-md-1 col-form-label tit-h4">비밀번호</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="password" class="form-control" id="password" placeholder="현재 비밀번호">
                </div>
                <div class="ipt-wrap">
                  <input type="password" class="form-control" id="password" placeholder="새 비밀번호">
                </div>
                <div class="ipt-wrap">
                  <input type="password" class="form-control" id="password" placeholder="새 비밀번호 확인">
                </div>
              </div>
            </div>
          </div>
          <!-- input password (e) -->

          <!-- input tel + button (s) -->
          <div class="row mix">
            <label for="name" class="col-md-1 col-form-label tit-h4">휴대폰번호</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="ipt-wrap">
                  <input type="tel" class="form-control" id="name" placeholder="휴대폰번호를 입력해주세요.">
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm">인증</button>
                <p class="txt-info">*휴대폰번호 변경 후 재인증 필요</p>
              </div>
            </div>
          </div>
          <!-- input tel + button (e) -->

          <a href="# " class="links">회원탈퇴하기</a>

          <div class="btn-area">
            <button type="button" class="btn btn-primary btn-md">수정완료</button>
          </div>
        </form>
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>