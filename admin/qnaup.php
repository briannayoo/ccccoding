<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
?>
      <!-- 상단 until-list (e) -->
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">Q&amp;A 답변등록</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <!-- 작성자 질문 -->
        <div class="d-flex">
          <div class="pro-box">
            <div class="profile-box">
              <img class="pro-img" src="image/profilimg_1.png" alt="profilimg_1">
            </div>
            <div>
              <h3 class="tit-h5">작성자</h3>
              <h4 class="txt-m">YYYY-MM-DD</h4>
            </div>
          </div>
          <div class="qnatitle">
            <div class="qna">
              <h3 class="tit-h3">질문있습니다.</h3>
            </div>
          </div>
        </div>
        <!-- 질문내용 -->
        <div class="question box-shadow box">
          <div class="q-box"> 
            <p>질문있어요</p>
          </div>
        </div>

        <!-- 답변등록 -->
        <div class="answer d-flex">
          <div class="a-box box-shadow box">
            <textarea class="a-boxform form-control" id="txtarea" placeholder="내용을 입력하세요."></textarea>
          </div>
          
          <div class="pro-box2">
            <div class="profile-box">
              <img class="pro-img" src="image/profilimg_2.png" alt="profilimg_2">
            </div>
            <div>
              <h3 class="tit-h5">관리자</h3>
            </div>
          </div>
        </div>
        <!-- 버튼 -->
        <div class="btn-area">
          <button type="button" class="btn btn-primary btn-lg">등록</button>
          <button type="button" class="btn btn-secondary btn-lg">취소</button>
        </div>


      </div>
    </div>
  </div>
</body>
</html>