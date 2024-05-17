<?php
  session_start();
  $title = '이벤트등록';

  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">이벤트 등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
      <form action="event_up_ok.php" class="form-list" enctype="multipart/form-data"  method="POST" onsubmit="return save()">
        <input type="hidden" name="eid" id="eid">
        <input type="hidden" name="e-img" id="e-img">
        <!-- 썸네일 -->
            <div class="row tumbnail_wrap">
              <label for="e_tumbnail" class="col-md-1 col-form-label tit-h4">썸네일</label>
              <div class="col-md-11">
                <input type="file" multiple name="e_img" id="thumbnail" class="d-none"  accept="image/*">
                <div>
                  <button type="button" class="btn btn-primary btn-sm thumb-text" id="addImage">파일 선택</button>
                  <p class="remove">*5M이하 / gif,png,jpg만 등록가능합니다.</p>
                </div>
                <div id="addedImages">
                </div>
              </div>
            </div>

            <!-- 제목 -->
            <div class="row">
              <label for="e_name" class="col-md-1 col-form-label tit-h4">이벤트명</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                  <input type="text" class="form-control" id="e_name" name="e_name" placeholder="이벤트명을 입력하세요." required>
                  </div>
                </div>
              </div>
            </div>

            <!--데이트피커  -->
            <div class="row">
            <label for="event_date" class="col-md-1 col-form-label tit-h4">이벤트 기한</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="date-wrap col-md-10">
                  <div class="col-md-4 ipt-wrap">
                    <input type="text" class="ipt-datepicker form-control" placeholder="YYYY-MM-DD" id="start_date" name="start_date">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-4 ipt-wrap">
                    <input type="text" class="ipt-datepicker form-control" placeholder="YYYY-MM-DD" id="end_date" name="end_date">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">상태</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
              <select class="form-select form-select-sm" id="mix-01" name="status"aria-label="select">
                  <option selected>전체</option>
                  <option value="1">활성화</option>
                  <option value="2">비활성화</option>
                </select>
              </div>
            </div>
          </div>
        </div>
           
            <!-- 첨부파일 -->
        <div class="row">
          <label for="file" class="col-md-1 col-form-label tit-h4">파일첨부</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-12 ipt-wrap file-input-container">
                <input type="text" class="form-control file-input-text" name="e_file" id="e_file" placeholder="파일을 선택해주세요" readonly>
                <button type="button" class="btn btn-primary btn-sm" id="custom-button">파일추가</button>
                <input type="file" id="file-upload">
              </div>
            </div>
          </div>
        </div>
            <!-- 버튼 -->
            <div class="btn-area">
            <button type="submit" class="btn btn-primary btn-lg">등록</button>
            <button type="button" class="btn btn-secondary btn-lg cancel">취소</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</body>
</html>