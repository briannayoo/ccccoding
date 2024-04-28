<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
?>
    <div class="container">
      <!-- 상단 until-list (s) -->
      <ul class="list-unstyled top-util-list">
        <li class="alarm">
          <button type="button" class="btn">
            <i class="fa-solid fa-bell fa-small" aria-hidden="true">
            </i>
            <span class="tit-h3">알림</span>
            <span class="badge rounded-pill">
              <span class="visually-hidden">읽지않은 메시지</span>
              <em class="txt-s">9</em>
              <span class="visually-hidden">건</span>
            </span>
          </button>
        </li>
        <li class="profile">
          <div class="profile-wrap">
            <img src="image/img_pf_admin.jpg" alt="프로필이미지"> <!--실제로는 경로변경해야함 ../이거빼야됨-->
          </div>
          <span class="admin tit-h3">관리자</span>
        </li>
      </ul>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">이벤트 등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <!-- 썸네일 -->
        <form action="#" enctype="multipart/form-data">
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
          </form>
          <form action="#" class="form-list">
            <!-- 제목 -->
            <div class="row">
              <label for="txt03" class="col-md-1 col-form-label tit-h4">제목</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <input type="text" class="form-control" id="fm-txt03" placeholder="제목을 입력해주세요">
                  </div>
                </div>
              </div>
            </div>
            <!--데이트피커  -->
            <div class="row">
              <label for="datepicker-01" class="col-md-1 col-form-label tit-h4">이벤트기한</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-4 ipt-wrap">
                    <input type="text" class="datepicker" placeholder="YYYY-MM-DD">
                  </div>
                  <div class="col-md-4 ipt-wrap">
                    <input type="text" class="datepicker" placeholder="YYYY-MM-DD">
                  </div>
                </div>
              </div>
            </div>
            <!-- 참여방법 -->
            <div class="row">
              <label for="txt03" class="col-md-1 col-form-label tit-h4">참여방법</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <input type="text" class="form-control" id="fm-txt03" placeholder="내용을 입력해주세요">
                  </div>
                </div>
              </div>
            </div>
            <!-- 당첨안내 -->
            <div class="row">
              <label for="txt03" class="col-md-1 col-form-label tit-h4">당첨안내</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <input type="text" class="form-control" id="fm-txt03" placeholder="내용을 입력해주세요">
                  </div>
                </div>
              </div>
            </div>
            <!-- 이벤트 내용 -->
            <div class="row">
              <label for="txt03" class="col-md-1 col-form-label tit-h4">이벤트 내용</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <input type="text" class="form-control" id="fm-txt03" placeholder="내용을 입력해주세요">
                  </div>
                </div>
              </div>
            </div>
            <!-- 첨부파일 -->
            <div class="row">
              <label for="file" class="col-md-1 col-form-label tit-h4">파일첨부</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <input class="form-control" type="file" id="file">
                  </div>
                </div>
              </div>
            </div>
            <!-- 버튼 -->
            <div class="btn-area">
              <button type="button" class="btn btn-primary btn-lg">등록</button>
              <button type="button" class="btn btn-secondary btn-lg">취소</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</body>
</html>