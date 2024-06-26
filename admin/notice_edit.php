<?php
  session_start();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

     //idx 번호의 글조회
    $bno = $_GET['idx'];
    $sql = "SELECT * FROM notice WHERE idx = {$bno}";
    $result = $mysqli->query($sql);
    $resultArr = mysqli_fetch_assoc($result);

?>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항 수정</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

        <div class="content"> 
          <form action="notice_edit_ok.php" method="POST" class="form-list" enctype="multipart/form-data">
            <input type="hidden" name="idx" value="<?= $bno;?>">
              <!-- 제목 -->
              <div class=" justify-content-between">
                <div class="row">
                  <label for="txt03" class="col-md-1 col-form-label tit-h4">제목</label>
                  <div class="col-md-11">
                    <div class="input-group">
                      <div class="col-md-11 ipt-wrap">
                        <input type="text" class="form-control" id="fm-txt03" name="title" value="<?=  $resultArr['title']; ?>" placeholder="제목을 입력해주세요" required>
                      </div>
                      <!-- 고정체크박스 -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          고정
                        </label>
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
                <input type="text" class="form-control" id="fm-txt03" name="name" value="<?=  $resultArr['name']; ?>" placeholder="이름을 입력해주세요" required>
              </div>
            </div>
          </div>
        </div>
                <!-- 텍스트 에어리어 -->
            <div class="row">
              <label for="txtarea" class="col-md-1 col-form-label tit-h4">내용</label>
              <div class="col-md-11">
                <div class="input-group">
                  <div class="col-md-12 ipt-wrap">
                    <textarea class="form-control" id="txtarea" name="content" placeholder="내용을 입력하세요." required>
                    <?= $resultArr['content'];?>
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
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
              <button type="submit" class="btn btn-primary btn-lg">등록</button>
              <button type="reset" class="btn btn-secondary btn-lg n-cancel">취소</button>
            </div>
          </form>
        </div>
  </div>
  <script src="/ccccoding/admin/js/notice.js"></script>
</body>
</html>