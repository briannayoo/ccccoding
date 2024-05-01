<?php
session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

    //idx 번호의 글조회
   $qno = $_GET['qid'];

    $qnaSql = "SELECT * FROM qna WHERE qid = {$qno}";
    $qnaResult = $mysqli -> query($qnaSql);
    $qa = $qnaResult -> fetch_object();



   //조회수 업데이트
 
    $qnahit = $qa -> hit + 1;
    $qnaUpdate = "UPDATE qna SET hit={$qnahit} WHERE qid = {$qno}";
    $mysqli->query($qnaUpdate);
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
              <h3 class="tit-h5"><?=$qa -> name; ?></h3>
              <h4 class="txt-m"><?=$qa -> date; ?></h4>
            </div>
          </div>
          <div class="qnatitle">
            <div class="qna">
              <h3 class="tit-h3"><?=$qa -> title; ?></h3>
            </div>
            <div class="qna">
            <h4 class="txt-m">조회수 :<?=$qa -> hit; ?> </h4>
            </div>
          </div>
        </div>
        <!-- 질문내용 -->
        <div class="question box-shadow box">
          <div class="q-box"> 
            <p><?=$qa -> content; ?></p>
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