<?php
  $title = '마이페이지-홈';
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
          <p class="desc tit-h3">ㅋㅋㅋ코딩과 <em>100일</em>째 성장중!</p>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <div class="line-box-list list-3">
          <div class="list">
            <div class="inner">
              <div class="tit-h4">모든 수강신청 강의</div>
              <span class="num">10</span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강중인 강의</div>
              <span class="num">8</span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강완료</div>
              <span class="num">2</span>
            </div>
          </div>
        </div>

        <h3 class="tit-h2">평균학습 진도율</h3>
        <div class="progress">
          <div class="graph" style="width:0%;">
            <span class="count"><em>0</em>%</span>
            <span class="txt">얼마 안남았어요! 힘을 내요!</span>
          </div>
        </div>
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