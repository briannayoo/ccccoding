<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>

<div class="page-tit-area">
        <h2 class="tit-h2">이벤트관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <!-- 이벤트검색 -->
      <form action="" class="form-list">
        <div class="row">
          <label for="search" class="col-md-1 col-form-label tit-h4">이벤트명</label>
          <div class="col-md-11">
            <div class="input-group search">
              <div class="col-md-6 ipt-wrap">
                <input class="form-control" type="search" id="search" placeholder="이벤트명을 입력하세요..." aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- 이벤트 기한 -->
        <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">이벤트 기한</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
                <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
                  <div class="col-md-4 ipt-wrap">
                    <input type="text" class="datepicker" placeholder="YYYY-MM-DD">
                  </div>
                  <div class="col-md-4 ipt-wrap">
                    <input type="text" class="datepicker" placeholder="YYYY-MM-DD">
                  </div>
            </div>
          </div>
        </div>
          <!-- 이벤트 상태 -->
        <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">상태</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
                <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- 총건수 -->
      <div class="total">
        <span>총 <em>8</em>건</span>
        <span class="point">활성화 <em>8</em>건</span>
        <span>비활성화 <em>8</em>건</span>
      </div>

      <!-- 이벤트 리스트 -->
      <ul class="list-group  box-list list-3 event">
        <li class="list-group-item flex-column">
          <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
            <img src="image/event1.jpg" alt="이미지">
          </a>
          <div class="info-area">
            <div class="tit-event">
              <strong class="tit-h3">쿠폰제목</strong>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle1">
                <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
              </div>
            </div>
            <div class="txt-group">
              <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
            </div>
            <div class="edit-btn-group">
              <button type="button" class="btn correc">
                <span class="visually-hidden">수정</span>
                <i class="fa-solid fa-pen-to-square fa-small"></i>
              </button>
              <button type="button" class="btn del">
                <span class="visually-hidden">삭제</span>
                <i class="fa-solid fa-trash-can fa-small"></i>
              </button>
            </div>
          </div>
        </li>
        <li class="list-group-item flex-column">
          <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
            <img src="image/event2.jpg" alt="이미지">
          </a>
          <div class="info-area">
            <div class="tit-event">
              <strong class="tit-h3">쿠폰제목</strong>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle1">
                <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
              </div>
            </div>
            <div class="txt-group">
              <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
            </div>
            <div class="edit-btn-group">
              <button type="button" class="btn correc">
                <span class="visually-hidden">수정</span>
                <i class="fa-solid fa-pen-to-square fa-small"></i>
              </button>
              <button type="button" class="btn del">
                <span class="visually-hidden">삭제</span>
                <i class="fa-solid fa-trash-can fa-small"></i>
              </button>
            </div>
          </div>
        </li>
        <li class="list-group-item flex-column">
          <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
            <img src="image/event3.jpg" alt="이미지">
          </a>
          <div class="info-area">
            <div class="tit-event">
              <strong class="tit-h3">쿠폰제목</strong>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle1">
                <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
              </div>
            </div>
            <div class="txt-group">
              <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
            </div>
            <div class="edit-btn-group">
              <button type="button" class="btn correc">
                <span class="visually-hidden">수정</span>
                <i class="fa-solid fa-pen-to-square fa-small"></i>
              </button>
              <button type="button" class="btn del">
                <span class="visually-hidden">삭제</span>
                <i class="fa-solid fa-trash-can fa-small"></i>
              </button>
            </div>
          </div>
        </li>
        <li class="list-group-item flex-column">
          <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
            <img src="image/event4.jpg" alt="이미지">
          </a>
          <div class="info-area">
            <div class="tit-event">
              <strong class="tit-h3">쿠폰제목</strong>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle1">
                <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
              </div>
            </div>
            <div class="txt-group">
              <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
            </div>
            <div class="edit-btn-group">
              <button type="button" class="btn correc">
                <span class="visually-hidden">수정</span>
                <i class="fa-solid fa-pen-to-square fa-small"></i>
              </button>
              <button type="button" class="btn del">
                <span class="visually-hidden">삭제</span>
                <i class="fa-solid fa-trash-can fa-small"></i>
              </button>
            </div>
          </div>
        </li>
        <li class="list-group-item flex-column">
          <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
            <img src="image/event5.jpg" alt="이미지">
          </a>
          <div class="info-area">
            <div class="tit-event">
              <strong class="tit-h3">쿠폰제목</strong>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle1">
                <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
              </div>
            </div>
            <div class="txt-group">
              <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
            </div>
            <div class="edit-btn-group">
              <button type="button" class="btn correc">
                <span class="visually-hidden">수정</span>
                <i class="fa-solid fa-pen-to-square fa-small"></i>
              </button>
              <button type="button" class="btn del">
                <span class="visually-hidden">삭제</span>
                <i class="fa-solid fa-trash-can fa-small"></i>
              </button>
            </div>
          </div>
        </li>
        <li class="list-group-item flex-column">
          <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
            <img src="image/event6.jpg" alt="이미지">
          </a>
          <div class="info-area">
            <div class="tit-event">
              <strong class="tit-h3">쿠폰제목</strong>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="toggle1">
                <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
              </div>
            </div>
            <div class="txt-group">
              <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
            </div>
            <div class="edit-btn-group">
              <button type="button" class="btn correc">
                <span class="visually-hidden">수정</span>
                <i class="fa-solid fa-pen-to-square fa-small"></i>
              </button>
              <button type="button" class="btn del">
                <span class="visually-hidden">삭제</span>
                <i class="fa-solid fa-trash-can fa-small"></i>
              </button>
            </div>
          </div>
        </li>
      </ul>
      
      <!-- 페이지네이션 -->
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
    </div>
  </div>
</body>
</html>