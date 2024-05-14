<?php
  $title = '마이페이지-문의내역';
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
          <h2 class="tit-h1">문의내역</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <!-- line-box-list(s) -->
        <div class="line-box-list qa">
          <div class="list">
            <span class="date">문의날짜: <em>YYYY-MM-DD</em></span>
            <div class="inner">
              <div class="item">
                <div class="top">
                  <span class="flag-state-incomplete">
                    미해결
                  </span>
                  <p class="state-txt">답변을 준비중입니다.</p>
                </div>
                <div class="tit-h4">
                  따라하며 배우는 리액트 A-Z
                </div>
              </div>
            </div>
          </div>
          <div class="list">
            <span class="date">문의날짜: <em>YYYY-MM-DD</em></span>
            <div class="inner">
              <div class="item">
                <div class="top">
                  <span class="flag-state-primary">
                    답변완료
                  </span>
                  <p class="state-txt bold">답변을 완료하였습니다.</p>
                </div>
                <div class="tit-h4">
                  따라하며 배우는 리액트 A-Z
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- line-box-list(e) -->

        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">문의하신 내역이 없습니다.</p>
          <div class="btn-area">
            <a href="#" class="btn btn-outline-secondary btn-sm">강의찾기</a>
          </div>
        </div>
        <!-- nodata(e) -->
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>