<?php
  $title = '마이페이지-내 강의 보기';
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
          <h2 class="tit-h1">내 강의 보기</h2>
        </div>

        <form action="" class="filter-area">
          <div class="difficulty">
            <strong class="tit-h5">난이도</strong>
            <div class="list-group list-group-horizontal">
              <div class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="difficulty_01" name="difficulty_01">
                  <label class="form-check-label" for="difficulty_01">
                    상
                  </label>
                </div>
              </div>
              <div class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="difficulty_02" name="difficulty_02">
                  <label class="form-check-label" for="difficulty_02">
                    중
                  </label>
                </div>
              </div>
              <div class="list-group-item">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="difficulty_03" name="difficulty_03">
                  <label class="form-check-label" for="difficulty_03">
                    하
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="ipt-wrap">
            <input type="search" class="form-control" placeholder="검색어를 입력하세요.">
            <button class="ico-search">
              <span class="visually-hidden">검색</span>
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>

        <div class="sort-area">
          <select class="form-select" aria-label="정렬 순서 선택">
            <option value="1" selected>최신순</option>
            <option value="2">인기순</option>
            <option value="3">추천순</option>
          </select>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <div class="lecture-area">
          <ul>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <!-- progress bar (s) -->
                <div class="progress">
                  <div class="graph" style="width:0%;">
                    <span class="count"><em>0</em>%</span>
                    <span class="txt">얼마 안남았어요! 힘을 내요!</span>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
          </ul>
        </div>

        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">진행중인 강의가 없습니다.</p>
        </div>
        <!-- nodata(e) -->

        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"> <!--active일떄 블라인드 현재페이지 스크립트로 넣어야함-->
              <a class="page-link" href="#">2</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="visually-hidden">마지막</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                  <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
          </ul>
        </nav>
        <!-- pagination(e) -->
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>