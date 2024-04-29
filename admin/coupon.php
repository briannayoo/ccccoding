<?php
 session_start();
 $title = '쿠폰리스트';

  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';

//  $search_where = "";
//  $search_keyword = $_GET['keyword'] ?? '';

//  if($search_keyword){
//    $search_where .= " and (coupon_name LIKE '%{$search_keyword}%')";
//  }

//  $paginationTarget = 'coupons';
//  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

 $sql = "SELECT * FROM coupons where 1=1"; //모든 상품 조회 쿼리
//  $sql .= $search_where;
//  $order = " order by cid desc";
//  $sql .= $order;
//  $limit = " LIMIT $startLimit, $endLimit";
//  $sql .= $limit;

//  $result = $mysqli->query($sql);

 $rsArr = [];

//  while ($rs = $result->fetch_object()) {
//    $rsArr[] = $rs;
//  }
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">쿠폰관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="d-flex justify-content-end mb-5">
        <a href="coupon_registration.php" class="btn btn-primary btn-lg">쿠폰등록</a>
      </div>

      <!-- form-list (s) -->
      <!-- <form action="#" class="form-list"> -->
          <!-- 할인종류 (s) -->
          <!-- <div class="row">
            <label for="discount" class="col-md-1 col-form-label tit-h4">할인종류</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="discount" name="discount" aria-label="select">
                    <option selected>전체</option>
                    <option value="1">할인금액</option>
                    <option value="2">할인율</option>
                  </select>
                </div>
              </div>
            </div>
          </div> -->
          <!-- 할인종류 (e) -->

          <!-- 쿠폰명 1/3 (s) -->
          <!-- <div class="row">
            <label for="coupon-name" class="col-md-1 col-form-label tit-h4">쿠폰명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap ipt-wrap">
                  <input type="text" class="form-control" id="coupon-name" name="coupon-name" placeholder="쿠폰명을 입력하세요.">
                </div>
              </div>
            </div>
          </div> -->
          <!-- 쿠폰명 1/3 (e) -->

          <!-- 사용기한 (s) -->
          <!-- <div class="row">
            <label for="use-date" class="col-md-1 col-form-label tit-h4">사용기한</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="use-date" name="use-date" aria-label="select">
                    <option selected>전체</option>
                    <option value="1">무제한</option>
                    <option value="2">기간설정</option>
                  </select>
                </div>
                <div class="date-wrap col-md-8">
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" id="datepicker-01" name="datepicker-01" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" id="datepicker-02" name="datepicker-02" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- 사용기한 (e) -->

          <!-- 상태 (s) -->
          <!-- <div class="row">
            <label for="status" class="col-md-1 col-form-label tit-h4">상태</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="status" name="status" aria-label="select">
                    <option selected>전체</option>
                    <option value="1">활성화</option>
                    <option value="2">비활성화</option>
                  </select>
                </div>
              </div>
            </div>
          </div> -->
          <!-- 상태 (e) -->

          <!-- <div class="btn-area">
            <button type="button" class="btn btn-primary btn-lg">검색</button>
          </div> -->
      <!-- </form> -->
      <!-- form-list (e) -->

      <div class="content"> 
        <div class="total">
          <span>총 <em>8</em>건</span>
          <span class="point">활성화 <em>8</em>건</span>
          <span>비활성화 <em>8</em>건</span>
        </div>

        <ul class="list-group box-list">
          <?php
            if (isset($rsArr)) {
            foreach ($rsArr as $item) {
          ?>
          <li class="list-group-item">
            <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
              <img src="<?= $item->coupon_image; ?>" alt="이미지">
            </a>
            <div class="info-area">
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
              <div class="tit-group">
                <strong class="tit-h3"><?= $item->coupon_name; ?></strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1">
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한 <?= $item->start_date; ?> ~ <?= $item->endt_date; ?></p>
                <p class="money">최소사용금액 :  <?= $item->use_min_price; ?>원</p>
                <p class="discount"><?= $item->coupon_price; ?>원 할인</p>
              </div>
            </div>
          </li>
          <?php
            }
          }
          ?>
          <!--
          <li class="list-group-item">
            <a href="#" class="img-wrap">
              <img src="image/img_coupon_02.jpg" alt="이미지">
            </a>
            <div class="info-area">
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
              <div class="tit-group">
                <strong class="tit-h3">쿠폰제목</strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1">
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한 YYYY-MM-DD</p>
                <p class="money">최소사용금액 :  25,000원</p>
                <p class="discount">2,000원 할인</p>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a href="#" class="img-wrap">
              <img src="image/img_coupon_03.jpg" alt="이미지">
            </a>
            <div class="info-area">
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
              <div class="tit-group">
                <strong class="tit-h3">쿠폰제목</strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1">
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한 YYYY-MM-DD</p>
                <p class="money">최소사용금액 :  25,000원</p>
                <p class="discount">2,000원 할인</p>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a href="#" class="img-wrap">
              <img src="image/img_coupon_04.jpg" alt="이미지">
            </a>
            <div class="info-area">
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
              <div class="tit-group">
                <strong class="tit-h3">쿠폰제목</strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1">
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한 YYYY-MM-DD</p>
                <p class="money">최소사용금액 :  25,000원</p>
                <p class="discount">2,000원 할인</p>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a href="#" class="img-wrap">
              <img src="image/img_coupon_05.jpg" alt="이미지">
            </a>
            <div class="info-area">
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
              <div class="tit-group">
                <strong class="tit-h3">쿠폰제목</strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1">
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한 YYYY-MM-DD</p>
                <p class="money">최소사용금액 :  25,000원</p>
                <p class="discount">2,000원 할인</p>
              </div>
            </div>
          </li>
          <li class="list-group-item">
            <a href="#" class="img-wrap">
              <img src="image/img_coupon_06.jpg" alt="이미지">
            </a>
            <div class="info-area">
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
              <div class="tit-group">
                <strong class="tit-h3">쿠폰제목</strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1">
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한 YYYY-MM-DD</p>
                <p class="money">최소사용금액 :  25,000원</p>
                <p class="discount">2,000원 할인</p>
              </div>
            </div>
          </li>
-->
        </ul>

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
  </div>
  <!-- wwilsman 데이트픽커 js -->
  <script src="/ccccoding/admin/js/datepicker.js"></script>
</body>
</html>