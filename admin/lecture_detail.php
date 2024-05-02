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
  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }

  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  };

  $cate = [];
  for ($step = 1; $step <= 3; $step++) {
      $sql = "SELECT * FROM category WHERE step = $step";
      $result = $mysqli->query($sql);
      while ($row = $result->fetch_object()) {
          $cate[$step][] = $row;
      }
  }

  ?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">강의 상세</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <?php
          if (isset($rsArr)) {  
            foreach ($rsArr as $item) {
        ?>
        <div class="lecture_detail box-shadow d-flex gap-5 align-items-center">
          <img src="<?=$item->thumbnail;?>" alt="">
          <div class="d-flex">
          <p class="search-result tit-h5"><span><?= $cate[1][3]->name; ?></span><i class="fa-solid fa-angle-right fa-xsmall"></i><span><?= $cate[2][3]->name; ?></span></p>
            <h2 class="bnr-tit-m"><?= $item->name;?></h2>
            <p class="tit-h4"><?= $item->content;?></p>
            <p><span><?= $item->sale_start_date;?></span> ~ <span><?= $item->sale_end_date;?></span></p>
            <div class="lecture_video tit-h4"><a href="<?= $item->url;?>">강의영상보러 바로가기</a></div>
          </div>
        </div>
          <?php
            }}
          ?>
        <div class="btn-area">
          <a href="/ccccoding/admin/lecture_list.php" class="btn btn-primary btn-lg">확인</a>
          <a href="lecture_edit.php?pid=<?= $item->pid;?>" class="btn btn-secondary btn-lg">수정</a>
      </div>

      </div>
    </div>
  </div>
</body>
</html>