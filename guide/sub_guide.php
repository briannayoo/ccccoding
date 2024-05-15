<?php
  $title = '이벤트'; /* 각자타이틀 입력하세요 */
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/sub_nav.php';
?>
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1"><?=$title?></h2>
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
        <div class="temp-area"> <!--temp-area 지우고 본인 작업 영역하면됨!-->
          작업영역
        </div>
      </div>
    </div>
  </main>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
  ?>