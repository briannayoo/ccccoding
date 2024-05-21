<?php
session_start();
$title = 'Q$A답변등록';
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
<!-- sub-page-tit-area (s) -->
  <div class="page-tit-area">
    <h2 class="tit-h2">Q&amp;A 답변등록</h2>
  </div>
  <!-- sub-page-tit-area (e) -->
  <div class="content">
    <!-- 작성자 질문 -->
    <div class="d-flex">
      <div class="pro-box">
        <div class="profile-box">
          <img class="pro-img" src="image/profilimg_1.png" alt="profilimg_1">
        </div>
        <div>
          <h3 class="tit-h5"><?=$qa -> userid; ?></h3>
          <h4 class="txt-m"><?=$qa -> date; ?></h4>
        </div>
      </div>
      <div class="qnatitle align-self-center">
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
    <?php
    $qid = $_GET['qid'];
    $reply_sql = "SELECT * FROM qna_reply WHERE r_idx = {$qid} order by idx desc";
    $reply_result = $mysqli->query($reply_sql);
    while($row = mysqli_fetch_object($reply_result)){
      $replyArr[]=$row;
    }
    if(isset($replyArr)){
    
      foreach($replyArr as $ra){
    ?>
    <!-- 댓글 출력 -->
    <div class="reply-wrapper">
      <input type="hidden" name="idx" value="<?=$qid;?>">
      <input type="hidden" name="r_name" value="관리자">
      <div class="answer d-flex">
        <div class="a-box box-shadow box">
          <div class="q-box">
            <p><?=$ra -> r_content; ?></p>
          </div>
        </div>
        <div class="pro-box2 align-self-center">
          <div class="profile-box">
            <img class="pro-img" src="image/profilimg_2.png" alt="profilimg_2">
          </div>
          <div>
            <h3 class="tit-h5">관리자</h3>
          </div>
        </div>
      </div>
      <div class="reply-btn pt-3">
        <button class="reply-edit"><i class="fa-solid fa-pen-to-square fa-small"><span class="visually-hidden">수정</span></i></button>
        <a href="qna_reply_del.php?rno=<?=$ra -> idx;?>" class="reply-del"><i class="fa-solid fa-trash-can fa-small reply-a-btn "><span class="visually-hidden">삭제</span></i></a>
      </div>
    </div>  
      <!-- 댓글 수정 폼 -->
      <dialog class="edit_dialog">
        <form action="qna_reply_edit_ok.php" method="POST">
          <input type="hidden" name="reply_no" value="<?=$ra -> idx;?>">
          <div class="answer d-flex">
            <div class="question box-shadow box">
              <div class="q-box">
                <textarea name="r_content" id="" cols="30" rows="10"><?=$ra -> r_content;?></textarea>
              </div>
              <div class="pro-box2">
                <div class="profile-box">
                  <img class="pro-img" src="image/profilimg_2.png" alt="profilimg_2">
                </div>
              </div>
              <h3 class="tit-h5">관리자</h3>
            </div>
          </div>
          <button class="btn btn-primary btn-sm">수정</button>
          <button type="button" class="btn btn-primary btn-sm del_check">취소</button>
        </form>
      </dialog>
    </div>
    <?php
      }
    }
    ?>
    <!--// reply -->
    <!-- 댓글 입력창 -->
    <div class="reply-new">
      <h4 class="tit-h4">답변등록</h4>
      <form action="qna_reply_ok.php" class="reply-form" method="POST">
        <input type="hidden" name="idx" value="<?=$qid;?>">
        <input type="hidden" name="r_name" value="관리자">
        <div class="answer d-flex">
          <div class="a-box">
            <textarea class=" form-control" id="txtarea" name="r_content" placeholder="내용을 입력하세요.">
            </textarea>
          </div>
        </div>
        <!-- 버튼 -->
        <div class="btn-area">
          <button type="submit" class="btn btn-primary btn-lg">등록</button>
          <button type="reset" class="btn btn-secondary btn-lg del_check">취소</button>
        </div>
      </form>
    </div>
  </div>
<script src="/ccccoding/admin/js/common.js"></script>
<script src="/ccccoding/admin/js/qna.js"></script>
</body>
</html>