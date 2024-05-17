<?php
 session_start();
 $title = '공지사항등록';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
?>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항 등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

        <div class="content"> 
          <form action="notice_up_ok.php" method="POST" class="form-list" enctype="multipart/form-data">
              <!-- 제목 -->
              <div class=" justify-content-between">
                <div class="row">
                  <label for="txt03" class="col-md-1 col-form-label tit-h4">제목</label>
                  <div class="col-md-11">
                    <div class="input-group">
                      <div class="col-md-12 ipt-wrap">
                        <input type="text" class="form-control" id="fm-txt03" name="title" placeholder="제목을 입력해주세요" required>
                      </div>
                      
                    </div>
                    </div>
                  </div>
                </div>
              <!-- 작성자 -->
              <div class="row">
          <label for="txt03" class="col-md-1 col-form-label tit-h4">작성자</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-12 ipt-wrap">
                <input type="text" class="form-control" id="fm-txt03" name="name" placeholder="이름을 입력해주세요" required>
              </div>
            </div>
          </div>
        </div>
                <!-- 텍스트 에어리어 -->
            <div class="row">
              <label for="txtarea" class="col-md-1 col-form-label tit-h4">내용</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap notice-textbox">
                    <textarea class="form-control" id="txtarea" name="content" placeholder="내용을 입력하세요." required></textarea>
                  </div>
                </div>
              </div>
            </div>

        <div class="row">
          <label for="file" class="col-md-1 col-form-label tit-h4">파일첨부</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-12 ipt-wrap file-input-container">
                <input type="text" class="form-control file-input-text" placeholder="선택된 파일 없음" readonly>
                <button class="btn btn-primary btn-sm" type="button" id="custom-button" >파일추가</button>
                <input type="file" id="file-upload" name="file">
              </div>
            </div>
          </div>
        </div>

            <!-- 버튼 -->
            <div class="btn-area">
              <button type="submit" class="btn btn-primary btn-lg">등록</button>
              <button type="reset" class="btn btn-secondary btn-lg n-cancel">취소</button>
            </div>
          </form>
        </div>
  </div>
  <script src="/ccccoding/admin/js/notice.js"></script>
</body>
</html>