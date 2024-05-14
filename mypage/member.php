<?php
  $title = '마이페이지-회원정보수정';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
?>

  <!-- 공통 부분 (s) -->
  <main class="sub mypage">
    <div class="container">
      <div class="my-gnb-wrap">
        <!-- 프로필 (s) -->
        <div class="pf-area">
          <div class="img-wrap">
            <img src="/ccccoding/image/img_my_profile.png" alt="">
          </div>
          <div class="content">
            <span>반갑습니다!</span>
            <span><em>시크릿쥬쥬</em> 님!</span>
          </div>
        </div>
        <!-- 프로필 (e) -->
        <!-- 가지고 있는 쿠폰/ 리스트(s) -->
        <ul class="list-group user-bf-list">
          <li class="list-group-item">
            <div class="item">쿠폰</div>
            <div class="val"><a href="/ccccoding/mypage/benefit.php" class="num">0</a>개</div>
          </li>
          <li class="list-group-item">
            <div class="item">포인트</div>
            <div class="val"><a href="/ccccoding/mypage/benefit.php" class="num">10</a>P</div>
          </li>
        </ul>
        <!-- 가지고 있는 쿠폰/ 리스트(e) -->
        <nav class="sub-menu">
          <ul class="list-group">
            <li class="list-group-item">
              <a href="/ccccoding/mypage/mypage.php" class="accordion-button tit-h4">HOME</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/course.php" class="accordion-button tit-h4">내강의 보기</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/order.php" class="accordion-button tit-h4">수강바구니</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/payment.php" class="accordion-button tit-h4">구매내역</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/inquiries.php" class="accordion-button tit-h4">문의내역</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/benefit.php" class="accordion-button tit-h4">쿠폰&amp;포인트</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/member.php" class="accordion-button tit-h4">회원정보 수정</a>
            </li>
          </ul>

          <div class="logout">
            <a href="#" class="tit-h4">로그아웃</a>
          </div>
        </nav>
      </div>
      
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

  <!-- footer 박소현 (s) -->
  <footer>
    <div class="container">
      <ul class="list-group etc-list link">
        <li class="list-group-item">
          <a href="/" class="logo">
            <img src="../image/logo_foot.png" alt="ㅋㅋㅋ코딩"> <!--경로수정해야함-->
          </a>
        </li>
        <li class="list-group-item">
          <a href="">
            이용약관
          </a>
        </li>
        <li class="list-group-item">
          <a href="">
            개인정보처리방침
          </a>
        </li>
        <li class="list-group-item">
          <a href="">
            고객센터
          </a>
        </li>
      </ul>

      <ul class="list-group etc-list">
        <li class="list-group-item">
          <span class="visually-hidden">회사명</span>
          ㅋㅋㅋ
        </li>
        <li class="list-group-item">
          대표:박소현,우예지,유부현
        </li>
        <li class="list-group-item">
          개인정보보호책임자:김동주
        </li>
        <li class="list-group-item">
          이메일:<a href="mailto:juju@ccccoding.com">juju@ccccoding.com</a>
        </li>
      </ul>

      <ul class="list-group etc-list">
        <li class="list-group-item">
          사업자 번호:111-11-11111 
        </li>
        <li class="list-group-item">
          통신판매업 제 2024-서울종로- 1111 호
        </li>
        <li class="list-group-item">
          주소 서울특별시 종로구 수표로 96 쥬쥬빌딩
        </li>
        <li class="list-group-item">
          이메일:<a href="mailto:juju@ccccoding.com">juju@ccccoding.com</a>
        </li>
      </ul>

      <p class="copy">Copyright &copy; CCCCODING CORPORATION.,Ltd All Rights Reserved.</p>
    </div>
  </footer>
  <!-- footer 박소현 (e) -->
</body>
</html>