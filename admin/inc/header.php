<?php
// session_start();

// include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
//include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

$sql = "SELECT * FROM qna WHERE 1=1 ORDER BY qid DESC LIMIT 0, 10";
$result = $mysqli -> query($sql);
while($row = $result ->fetch_object()){
    $qnaArr[] = $row;
}

?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title?> - ccccoding</title>
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="/ccccoding/image/favi/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/ccccoding/image/favi/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/ccccoding/image/favi/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/ccccoding/image/favi/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/ccccoding/image/favi/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/ccccoding/image/favi/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/ccccoding/image/favi/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/ccccoding/image/favi/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/ccccoding/image/favi/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/ccccoding/image/favi/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/ccccoding/image/favi/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/ccccoding/image/favi/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/ccccoding/image/favi/favicon-16x16.png">
  <link rel="manifest" href="/ccccoding/image/favi/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ccccoding/image/favi/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- 폰트어썸 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- 부트스트랩 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- <link rel="stylesheet" href="/ccccoding/admin/css/bootstrap.css"> -->
  <link rel="stylesheet" href="/ccccoding/admin/css/datepicker.material.css">
  <link rel="stylesheet" href="/ccccoding/admin/css/common.css">
  <link rel="stylesheet" href="/ccccoding/admin/css/layout.css">
  <link rel="stylesheet" href="/ccccoding/admin/css/content.css">

  <!-- 제이쿼리 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- <script src="/ccccoding/admin/css/bootstrap.bundle.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="/ccccoding/admin/js/datepicker.js"></script>
  <script src="/ccccoding/admin/js/common.js"></script>
  
</head>

<body>
  <div class="admin-wrapper">
    <nav class="gnb">
      <h1 class="logo">
        <a href="/ccccoding/admin/index.php">
          <span class="visually-hidden">ccccoding</span>
        </a>
      </h1>
      <ul class="list-group gnb-list">
        <li class="list-group-item">
          <a href="/ccccoding/admin/index.php" class="text-decoration-none">
            <i class="fa-solid fa-house fa-big"></i>
            <span>대시보드</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/ccccoding/admin/category.php" class="text-decoration-none">
            <i class="fa-solid fa-list fa-big"></i>
            <span>카테고리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/ccccoding/admin/lecture_list.php" class="text-decoration-none">
            <i class="fa-solid fa-chalkboard-user fa-big"></i>
            <span>강의관리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/ccccoding/admin/membership.php" class="text-decoration-none">
            <i class="fa-solid fa-address-card fa-big"></i>
            <span>회원관리</span>
          </a>
        </li>
        <li class="list-group-item acco">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <i class="fa-solid fa-comments fa-big"></i>
                  <span>커뮤니티</span>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul class="list-group depth-2">
                    <li class="list-group-item on">
                      <a href="/ccccoding/admin/notice_list.php" class="text-decoration-none">-공지사항</a>
                    </li>
                    <li class="list-group-item">
                      <a href="/ccccoding/admin/qna.php" class="text-decoration-none">-Q&amp;A</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <a href="/ccccoding/admin/event.php" class="text-decoration-none">
            <i class="fa-solid fa-gift fa-big"></i>
            <span>이벤트 관리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/ccccoding/admin/order.php" class="text-decoration-none">
            <i class="fa-solid fa-cart-plus fa-big"></i>
            <span>수강관리</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/ccccoding/admin/coupon_list.php" class="text-decoration-none">
            <i class="fa-solid fa-ticket-simple fa-big"></i>
            <span>쿠폰관리</span>
          </a>
        </li>
      </ul>

      <ul class="list-group util-list">
        <li class="list-group-item logout_click">
          <a href="/ccccoding/admin/logout.php" class="text-decoration-none">
            <i class="fa-solid fa-power-off fa-small"></i>
            <span>로그아웃</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-gear fa-small"></i>
            <span>설정</span>
          </a>
        </li>
      </ul>
    </nav>

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
              <em class="txt-s"><?=count($qnaArr)?></em>
              <span class="visually-hidden">건</span>
            </span>
          </button>
        </li>
        <li class="profile">
          <div class="profile-wrap">
            <img src="/ccccoding/admin/image/img_pf_admin.jpg" alt="프로필이미지"> <!--실제로는 경로변경해야함 ../이거빼야됨-->
          </div>
          <span class="admin tit-h3">관리자</span>
        </li>
      </ul>
      <!-- 상단 until-list (e) -->
      <!-- 상단 알림 팝업 (s) -->
      <div class="alarm-popup box-shadow">
        <div class="alarm-cantent">
          <h2 class="tit-h4">새로운 알림 <span>(<?=count($qnaArr)?>)</span></h2>
          <hr>
          <div class="alarm_list">
            <ul>
            <?php
              if(isset($qnaArr)){
                foreach($qnaArr as $item){
            ?>
              <li>
                <a href="/ccccoding/admin/qna.php?qid=<?= $item ->qid;?>" class="d-flex justify-content-between gap-3">
                  <span>Q&A</span>
                  <div>
                    <h3><?=$item->title?></h3>
                    <p><?=$item->content?></p>
                  </div>
                  <span><?=$item->date?></span>
                </a>
              </li>
              <?php
                }}
              ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- 상단 알림 팝업 (e) -->