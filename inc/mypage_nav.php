<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/dbcon.php';
  $sql = "SELECT COUNT(*) AS coupon_count FROM user_coupons WHERE userid = '$userid'";
  $result = $mysqli -> query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_object();
      $coupon_count = $row->coupon_count;
  } else {
      $coupon_count = 0;
  }

  // 사용자 정보 조회(프로필사진(박소현))
  $msql = "SELECT * FROM members WHERE userid = ?";
  $mstmt = $mysqli->prepare($msql);
  $mstmt->bind_param("s", $userid);
  $mstmt->execute();
  $mresult = $mstmt->get_result();
  $mrs = $mresult->fetch_object();
?>    
  <!-- 공통 부분 작업담당자:박소현 (s) -->
  <main class="sub mypage">
    <div class="container">
      <div class="my-gnb-wrap">
        <!-- 프로필 (s) -->
        <div class="pf-area">
          <div class="img-wrap">
            <img src="<?= $mrs->profile_image ?: '/ccccoding/image/img_my_profile.png'; ?>" alt="프로필 이미지">
          </div>
          <div class="content">
            <span>반갑습니다!</span>
            <span><em><?= $_SESSION['UID'] ?></em> 님!</span>
          </div>
        </div>
        <!-- 프로필 (e) -->
        <!-- 가지고 있는 쿠폰/ 리스트(s) -->
        <ul class="list-group user-bf-list">
          <li class="list-group-item">
            <div class="item">쿠폰</div>
            <div class="val"><a href="/ccccoding/mypage/coupon.php" class="num"><?=$coupon_count?></a>개</div>
          </li>
          <li class="list-group-item">
            <div class="item">포인트</div>
            <?php if ($mrs->point > 0) { ?>
            <div class="val"><a href="/ccccoding/mypage/point.php" class="num"><?=$mrs->point?></a>P</div>
            <?php } else { ?>
            <div class="val"><a href="/ccccoding/mypage/point.php" class="num">0</a>P</div>
            <?php } ?>
          </li>
        </ul>
        <!-- 가지고 있는 쿠폰/ 리스트(e) -->
        <nav class="sub-menu">
          <ul class="list-group">
            <li class="list-group-item">
              <a href="/ccccoding/mypage/mypage.php" class="accordion-button tit-h4">HOME</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/course.php" class="accordion-button tit-h4">내강의 보기</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/pdata/cart.php" class="accordion-button tit-h4">수강바구니</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/payment.php" class="accordion-button tit-h4">구매내역</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/inquiries.php" class="accordion-button tit-h4">문의내역</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/coupon.php" class="accordion-button tit-h4">쿠폰</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/point.php" class="accordion-button tit-h4">포인트</a>
            </li>
            <li class="list-group-item">
              <a href="/ccccoding/mypage/member.php" class="accordion-button tit-h4">회원정보 수정</a>
            </li>
          </ul>

          <div class="logout">
            <a href="/ccccoding/admin/logout.php" class="tit-h4">로그아웃</a>
          </div>
        </nav>
      </div>