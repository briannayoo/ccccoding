<?php
  $title = '마이페이지-쿠폰&포인트';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  // $sql = "SELECT userid FROM user_coupons WHERE userid = '$userid'";
  $sql = "SELECT *
  FROM user_coupons
      INNER JOIN coupons
      ON user_coupons.couponid = coupons.cid
  ";
  $result = $mysqli->query($sql);

  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
?>

      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">쿠폰</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <h3 class="tit-h2">쿠폰</h3>
        <!-- coupon-list(s) -->
        <div class="coupon-list">
          <?php foreach ($rsArr as $rs) { ?>
          <div class="list">
            <div class="inner">
              <div class="state-wrap">
              <?php
                $current_date = date("Y-m-d");
                $end_date = $rs->end_date;
                $diff_days = (strtotime($end_date) - strtotime($current_date)) / (60 * 60 * 24);

                // 사용완료케이스 해야함!
                if ($rs->coupon_type == 2) {
                  if ($diff_days < 0) {
                    echo '<span class="flag-state-incomplete">만료</span>';
                    $update_sql = "UPDATE user_coupons SET status = 0 WHERE ucid = $rs->ucid";
                    $mysqli->query($update_sql);
                  } elseif ($diff_days <= 5) {
                    echo '<span class="flag-state-negative">만료임박</span>';
                  } else {
                    echo '<span class="flag-state-primary">사용가능</span>';
                  }
                } else {
                  echo '<span class="flag-state-primary">사용가능</span>';
                }
              ?>
              </div>
              <strong class="tit-h5"><?=$rs->reason?></strong>
              <span class="date">
                <?php
                  if ($rs->coupon_type == 1) {
                    echo "무제한";
                } elseif ($rs->coupon_type == 2) {
                  echo $rs->start_date.'~'.$rs->end_date;
                } else {
                  $use_date_text = "미정";
                }
                ?>
              </span>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="list">
            <div class="inner">
              <div class="state-wrap">
                <span class="flag-state-negative">
                  만료임박
                </span>
              </div>
              <strong class="tit-h5">가입환영 5000원 할인쿠폰</strong>
              <span class="date">YYYY-MM-DD~YYYY-MM-DD</span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="state-wrap">
                <span class="flag-state-incomplete">
                  사용완료
                </span>
              </div>
              <strong class="tit-h5">가입환영 5000원 할인쿠폰</strong>
              <span class="date">YYYY-MM-DD~YYYY-MM-DD</span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="state-wrap">
                <span class="flag-state-primary">
                  사용가능
                </span>
              </div>
              <strong class="tit-h5">가입환영 5000원 할인쿠폰</strong>
              <span class="date">무제한</span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="state-wrap">
                <span class="flag-state-negative">
                  만료임박
                </span>
              </div>
              <strong class="tit-h5">가입환영 5000원 할인쿠폰</strong>
              <span class="date">YYYY-MM-DD~YYYY-MM-DD</span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="state-wrap">
                <span class="flag-state-incomplete">
                  사용완료
                </span>
              </div>
              <strong class="tit-h5">가입환영 5000원 할인쿠폰</strong>
              <span class="date">YYYY-MM-DD~YYYY-MM-DD</span>
            </div>
          </div> -->
        </div>
        <!-- coupon-list(e) -->
        
        <?php
        if ($result->num_rows == 0) {
          // 쿠폰이 없을 때
        ?>
          <!-- nodata(s) -->
          <div class="nodata">
            <p class="txt">쿠폰 내역이 없습니다.</p>
            <div class="btn-area">
            </div>
          </div>
          <!-- nodata(e) -->
        <?php  
        }
        ?>
        
        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"> <!--active일떄 블라인드 현재페이지 스크립트로 넣어야함-->
              <a class="page-link" href="#">2</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span class="visually-hidden">마지막</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                  <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
          </ul>
        </nav>
        <!-- pagination(e) -->

      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>