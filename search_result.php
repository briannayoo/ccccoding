<?php
  $title = '전체강의'; 
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/sub_nav.php';
?>
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1"><?= $title ?></h2>
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
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="../image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a>
            </li>
          </ul>
        </div>

        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">검색한 결과가 없습니다.</p>
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