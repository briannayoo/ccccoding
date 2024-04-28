<?php
  // session_start();

  // include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">쿠폰등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> 
        <!-- form-list (s) -->
        <form action="#" method="POST" enctype="multipart/form-data"  class="form-list">
          <!-- input text 1/3 (s) -->
          <div class="row">
            <label for="c-name" class="col-md-1 col-form-label tit-h4">쿠폰명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="form-control" id="c-name" name="c-name" placeholder="쿠폰명을 입력하세요." required>
                </div>
              </div>
            </div>
          </div>
          <!-- input text 1/3 (e) -->

          <!-- input text 1 (s) -->
          <div class="row">
            <label for="c-desc" class="col-md-1 col-form-label tit-h4">쿠폰설명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap">
                  <input type="text" class="form-control" id="c-desc" name="c-desc" placeholder="쿠폰설명을 입력하세요.">
                </div>
              </div>
            </div>
          </div>
          <!-- input text 1 (e) -->

          <!-- input text 단위 1/3 (s) -->
          <div class="row">
            <label for="min-amount" class="col-md-1 col-form-label tit-h4">최소사용금액</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap ipt-wrap">
                  <input type="text" class="form-control text-end" id="min-amount" name="min-amount">
                  <span class="unit">원</span>
                </div>
              </div>
            </div>
          </div>
          <!-- input text 단위 1/3 (e) -->

          <!-- select + input text 혼합(s) -->

          <!-- 할인금액 선택시 (s) -->
          <div class="row">
            <label for="discount" class="col-md-1 col-form-label tit-h4">할인종류</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="discount" name="discount" aria-label="할인 종류 선택">
                    <option selected>선택해주세요</option>
                    <option value="amount" >할인금액</option>
                    <option value="rate">할인율</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap dc-wrap amount">
                  <input type="text" class="form-control text-end" id="dc-amount" name="dc-amount">
                  <span class="unit">원</span>
                </div>
                <div class="col-md-4 ipt-wrap dc-wrap percent">
                  <input type="text" class="form-control text-end" id="dc-percent" name="dc-percent">
                  <span class="unit">%</span>
                </div>
              </div>
            </div>
          </div>
          <!-- 할인금액 선택시 (e) -->
          <!-- select + input text 혼합(e) -->

          <!-- 기간설정 시 (s) -->
          <div class="row">
            <label for="use-date" class="col-md-1 col-form-label tit-h4">사용기한</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="use-date" aria-label="사용기한 선택">
                    <option selected>선택해주세요</option>
                    <option value="unlimited">무제한</option>
                    <option value="limited">기간설정</option>
                  </select>
                </div>
                <div class="date-wrap col-md-8">
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 기간설정 시 (e) -->

          <div class="row">
            <label for="form01" class="col-md-1 col-form-label tit-h4">썸네일</label>
            <div class="col-md-11">
              <input type="file" multiple name="upfile[]" id="upfile" class="d-none">
              <div>
                <button type="button" class="btn btn-primary btn-sm thumb-text" id="addImage">파일 선택</button>
              </div>
              <div id="addedImages" class="d-flex gap-3">
              </div>
            </div>
          </div>

          <!-- 하단버튼 (s) -->
          <div class="btn-area">
            <button type="button" class="btn btn-primary btn-lg">등록</button>
            <button type="button" class="btn btn-secondary btn-lg">취소</button>
          </div>
          <!-- 하단버튼(e) -->
        </form>
        <!-- form-list (e) -->
      </div>
  </div>
  <!-- wwilsman 데이트픽커 js -->
  <script src="/ccccoding/admin/js/datepicker.js"></script>
  <script src="/ccccoding/admin/js/coupon.js"></script>
</body>
</html>