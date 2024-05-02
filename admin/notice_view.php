
<?php
  session_start();
  $title = '공지사항';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

   //idx 번호의 글조회
    $bno = $_GET['idx'];
    $sql = "SELECT * FROM notice WHERE idx = {$bno}";
    $result = $mysqli->query($sql);
    $resultArr = mysqli_fetch_assoc($result);
    
   //조회수 업데이트
    $hit = $resultArr['hit'] + 1;
    $sqlUpdate = "UPDATE notice SET hit={$hit} WHERE idx = {$bno}";
    $mysqli->query($sqlUpdate);
?>

      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <h2><?= $resultArr['title'];?></h2>
        <div class="pro-box3 d-flex">
          <div class="profile-box">
            <img class="pro-img" src="image/profilimg_1.png" alt="profilimg_1">
          </div>
          <h3 class="tit-h5">작성자 : <?= $resultArr['name'];?></h3>
          <h4 class="txt-m"><?= $resultArr['date'];?></h4>
        </div>
        <div class="question box-shadow box">
          <div class="q-box"> 
            <p><?= nl2br($resultArr['content']);?></p>
          </div>
        </div>
        <div class="attachment">
         
          <?php
          if(isset($resultArr['is_img']) !== '' && $resultArr['is_img'] == 1){
            ?>
            <img src="/ccccoding/admin/upload/<?= $resultArr['file'];?>" alt="<?= $resultArr['file'];?>">
          <?php
        }else{
          ?>
              <a href="/ccccoding/admin/upload/<?= $resultArr['file'];?>" target="_blank"><?= $resultArr['file'];?></a>
          <?php
        } 
        ?>
          

        </div>
      </div>
      <div class="btn-area">
        <a href="notice_edit.php?idx=<?= $bno;?>" class="btn btn-primary btn-lg">수정</a>
        <a href="notice_del.php?idx=<?= $bno;?>" class="btn btn-secondary btn-lg">삭제</a>
      </div>
    </div>
  </div>
</body>
</html>