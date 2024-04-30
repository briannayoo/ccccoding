
<?php
 session_start();

 include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
?>

      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <h2>제목</h2>
        <div class="pro-box3 d-flex">
          <div class="profile-box">
            <img class="pro-img" src="image/profilimg_1.png" alt="profilimg_1">
          </div>
          <h3 class="tit-h5">작성자 : </h3>
          <h4 class="txt-m">YYYY-MM-DD</h4>
        </div>
        <div class="question box-shadow box">
          <div class="q-box"> 
            <p>질문내용</p>
          </div>
        </div>
      </div>
      <div class="btn-area">
        <button type="button" class="btn btn-primary btn-lg">버튼</button>
        <button type="button" class="btn btn-secondary btn-lg">버튼</button>
      </div>
    </div>
  </div>
</body>
</html>