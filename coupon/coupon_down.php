<?php
  $title = '쿠폰다운로드';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/coupon_func.php';

  $sql = "SELECT * FROM coupons";
  $result = $mysqli -> query($sql);
?>
  <main class="full">
    <div class="container">
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">쿠폰다운로드</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <!-- coupon-list(s) -->
        
        <div class="coupon-list down">
          <?php
          while ($row = $result->fetch_object()) {
            $coupon_name = $row->coupon_name;
            $coupon_desc = $row->coupon_desc;
            $coupon_image = $row->coupon_image;
            $coupon_type = $row->coupon_type;
            $coupon_price = $row->coupon_price;
            $coupon_ratio = $row->coupon_ratio;
            $status = $row->status;
            $regdate = $row->regdate;
            $userid = $row->userid;
            $max_value = $row->max_value;
            $use_min_price = $row->use_min_price;
            $use_date_type = $row->use_date_type;
            $start_date = $row->start_date;
            $end_date = $row->end_date;

            // 쿠폰 사용기한 텍스트 설정
            if ($use_date_type == 1) {
              $use_date_text = "무제한";
            } elseif ($use_date_type == 2) {
              $use_date_text = "$start_date ~ $end_date";
            } else {
              $use_date_text = "미정";
            }
          ?>
          <div class="list">
            <div class="inner">
              <span class="date"><?=$use_date_text?></span>
              <strong class="tit-h5"><?=$coupon_name?></strong>
              <div class="btn-area">
                <a href="coupon_down_ok.php?cid=<?=$row->cid?>&name=<?=$coupon_name?>" class="btn btn-primary btn-sm">발급받기</a>
              </div>
            </div>
          </div>
          <?php
          }

          if ($result->num_rows == 0) {
            // 다운로드 가능한 쿠폰이 없을 때
          ?>
            <div class="nodata">
              <p class="txt">다운로드 가능한 쿠폰 내역이 없습니다.</p>
            </div>
          <?php  
          }
          ?>
        </div>
        <!-- coupon-list(e) -->

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