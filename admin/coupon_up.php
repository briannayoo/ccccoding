<?php
  session_start();
  $title = '쿠폰등록';

  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">쿠폰등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> 
        <!-- form-list (s) -->
        <form action="coupon_ok.php" enctype="multipart/form-data" method="POST" class="form-list" onsubmit="return save()">
          <input type="hidden" name="cid" id="cid">
          <input type="hidden" name="coupon_image" id="coupon_image">
          <!-- input text 1/3 (s) -->
          <div class="row">
            <label for="coupon_name" class="col-md-1 col-form-label tit-h4">쿠폰명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="쿠폰명을 입력하세요." required>
                </div>
              </div>
            </div>
          </div>
          <!-- input text 1/3 (e) -->

          <!-- input text 1 (s) -->
          <div class="row">
            <label for="coupon_desc" class="col-md-1 col-form-label tit-h4">쿠폰설명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-12 ipt-wrap">
                  <input type="text" class="form-control" id="coupon_desc" name="coupon_desc" placeholder="쿠폰설명을 입력하세요." required>
                </div>
              </div>
            </div>
          </div>
          <!-- input text 1 (e) -->

          <!-- input text 단위 1/3 (s) -->
          <div class="row">
            <label for="use_min_price" class="col-md-1 col-form-label tit-h4">최소사용금액</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="form-control text-end" id="use_min_price" name="use_min_price" required>
                  <span class="unit">원</span>
                </div>
              </div>
            </div>
          </div>
          <!-- input text 단위 1/3 (e) -->

          <!-- input text 단위 1/3 (s) -->
          <div class="row">
            <label for="max_value" class="col-md-1 col-form-label tit-h4">최대할인금액</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <input type="text" class="form-control text-end" id="max_value" name="max_value" required>
                  <span class="unit">원</span>
                </div>
              </div>
            </div>
          </div>
          <!-- input text 단위 1/3 (e) -->

          <!-- select + input text 혼합(s) -->

          <div class="row">
            <label for="coupon_type" class="col-md-1 col-form-label tit-h4">할인종류</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="coupon_type" name="coupon_type" aria-label="할인 종류 선택" required>
                    <option selected>선택해주세요</option>
                    <option value="1" >할인금액</option>
                    <option value="2">할인율</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap dc-wrap amount">
                  <input type="text" class="form-control text-end" id="coupon_price" name="coupon_price">
                  <span class="unit">원</span>
                </div>
                <div class="col-md-4 ipt-wrap dc-wrap percent">
                  <input type="text" class="form-control text-end" id="coupon_ratio" name="coupon_ratio">
                  <span class="unit">%</span>
                </div>
              </div>
            </div>
          </div>
          <!-- select + input text 혼합(e) -->

          <!-- 기간설정 시 (s) -->
          <div class="row">
            <label for="use_date_type" class="col-md-1 col-form-label tit-h4">사용기한</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="use_date_type" name="use_date_type" aria-label="사용기한 선택" required>
                    <option selected>선택해주세요</option>
                    <option value="1">무제한</option>
                    <option value="2">기간설정</option>
                  </select>
                </div>
                <div class="date-wrap col-md-8">
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker form-control" placeholder="YYYY-MM-DD" id="start_date" name="start_date">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker form-control" placeholder="YYYY-MM-DD" id="end_date" name="end_date">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 기간설정 시 (e) -->

          <div class="row">
            <label for="status" class="col-md-1 col-form-label tit-h4">상태</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="status" name="status" aria-label="상태 선택"  required>
                    <option selected>선택해주세요</option>
                    <option value="1">활성화</option>
                    <option value="2">비활성화</option>
                  </select>
                </div>
              </div>
            </div>
          </div>



          <!-- thumbnail image (s) -->
          <div class="row tumbnail_wrap">
            <label for="thumbnail" class="col-md-1 col-form-label tit-h4">썸네일</label>
            <div class="col-md-11">
              <input type="file" multiple name="coupon_image" id="thumbnail" class="d-none" accept="image/*">
              <div>
                <button type="button" class="btn btn-primary btn-sm thumb-text" id="addImage">파일 선택</button>
                <p class="remove">*5M이하 / gif,png,jpg만 등록가능합니다.</p>
              </div>
              <div id="addedImages">
              </div>
            </div>
          </div>
          <!-- thumbnail image (e) -->

          <!-- 하단버튼 (s) -->
          <div class="btn-area">
            <button type="submit" class="btn btn-primary btn-lg">등록</button>
            <button type="button" class="btn btn-secondary btn-lg cancel">취소</button>
          </div>
          <!-- 하단버튼(e) -->
        </form>
        <!-- form-list (e) -->
      </div>
  </div>
  <!-- wwilsman 데이트픽커 js -->
  
  <script src="/ccccoding/admin/js/coupon.js"></script>
  <!-- <script>
    function save() {
        if (!$('#coupon_image').val()) {
            alert('썸네일을 등록하십시오.');
            return false;
        }
    }
  </script> -->
</body>
</html>