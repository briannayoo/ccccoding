<?php
  $title = '마이페이지-홈';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';
?>

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

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>