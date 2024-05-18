<?php
  $title = '쿠폰발급받기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/coupon_func.php';

 //총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM coupons WHERE 1=1";
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();

  $totalcount = $count->cnt; //총검색건수
  $targetTable = 'coupons';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

  //페이지네이션
  $sql = "SELECT * FROM coupons WHERE 1=1";
  $order = " order by cid desc";
  $sql .= $order;
  $limit = " LIMIT  $startLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;

  $result = $mysqli->query($sql);
  while ($rs = $result->fetch_object()) {
      $rsArr[] = $rs;
  }
?>
  <main class="full">
    <div class="container">
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">쿠폰발급받기</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <!-- coupon-list(s) -->
        
        <div class="coupon-list down">
          <?php foreach ($rsArr as $rs) { 
            $current_date = date("Y-m-d");
            $end_date = $rs->end_date;
            $is_expired = ($rs->coupon_type == 2 && $current_date > $end_date);
          ?>
          <div class="list">
            <div class="inner">
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
              <strong class="tit-h5"><?=$rs->coupon_name?></strong>
              <div class="btn-area">
                <a href="<?=$is_expired ? 'javascript:void(0);' : 'coupon_down_ok.php?cid='.$rs->cid.'&name='.$rs->coupon_name?>" class="btn btn-primary btn-sm <?=$is_expired ? 'disabled' : ''?>">발급받기</a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <!-- coupon-list(e) -->

        <?php
        if ($result->num_rows == 0) {
          // 다운로드 가능한 쿠폰이 없을 때
        ?>
          <div class="nodata">
            <p class="txt">다운로드 가능한 쿠폰 내역이 없습니다.</p>
          </div>
        <?php  
        }
        ?>

        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'coupon_down.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'coupon_down.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"coupon_down.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"coupon_down.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'coupon_down.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'coupon_down.php?pageNumber=' . $total_page; ?>">
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