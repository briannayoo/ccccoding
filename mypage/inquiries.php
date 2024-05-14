<?php
  $title = '마이페이지-문의내역';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';
?>
      
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