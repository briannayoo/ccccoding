<?php
  session_start();
  $title = '강의관리';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  // include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/category_func.php';

  $pid=$_GET['pid'];
  $sql = "SELECT * FROM products where pid={$pid}";
  $result = $mysqli->query($sql);
  $item = $result->fetch_object();

  $cateStr = $item-> cate;
  $cateArr = str_split($cateStr, 5);
  ?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">강의 상세</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">

        <div class="lecture_detail box-shadow d-flex gap-5 align-items-center">
          <img src="<?=$item->thumbnail;?>" alt="">
          <div class="d-flex">
            <div class="d-flex align-items-center">
          <?php
              $i = 1;
              $count = count($cateArr);
              // $step1Name = '';
                if(isset($cateArr)){
                foreach($cateArr as $cate){
                  $sql ="SELECT name FROM category where code='{$cate}'";
                  $result = $mysqli -> query($sql);
                  $row = $result -> fetch_object();
                  // if($i == 1){
                  //   $step1Name = $row->name;
                  // }
              ?>
                <p class="search-result tit-h6"><span><?=$row->name;?>
                <?php
                  if($i < $count){
                  ?>
                  <i class="fa-solid fa-angle-right fa-small"></i>
                  <?php
                  }
                  ?>
                  <?php
                    $i++;
                  }}
                  ?>
                  </p>
              </div>
            <h2 class="bnr-tit-m"><?= $item->name;?></h2>
            <p class="tit-h4"><?= $item->content;?></p>
            <p><span><?= $item->sale_start_date;?></span> ~ <span><?= $item->sale_end_date;?></span></p>
            <div class="lecture_video tit-h4"><a href="<?= $item->url;?>">강의영상보러 바로가기</a></div>
          </div>
        </div>

        <div class="btn-area">
          <a href="/ccccoding/admin/lecture_list.php" class="btn btn-primary btn-lg">확인</a>
          <a href="lecture_edit.php?pid=<?= $item->pid;?>" class="btn btn-secondary btn-lg">수정</a>
      </div>

      </div>
    </div>
  </div>
</body>
</html>