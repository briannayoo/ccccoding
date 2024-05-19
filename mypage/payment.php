<?php
  $title = '마이페이지-결제내역';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  $sql = "SELECT * FROM payments";
  $result = $mysqli->query($sql);

  //총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM payments WHERE 1=1";
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();

  $totalcount = $count->cnt; //총검색건수
  $targetTable = 'payments';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

  //페이지네이션
  $sql = "SELECT * FROM payments WHERE 1=1";
  $order = " order by oid desc";
  $sql .= $order;
  $limit = " LIMIT  $startLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;

  $result = $mysqli->query($sql);
  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }

  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
?>

      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">구매내역</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <!-- line-box-list(s) -->
        <?php if ($result->num_rows > 0) { ?>
        <div class="line-box-list">
            <?php
              if (isset($rsArr)) {  
                foreach ($rsArr as $item) {
            ?>
          <div class="list">
            <span class="date">주문날짜: <em><?=$item->orders_date?></em></span>
            <div class="inner">
              <div class="item">
                <div class="top">
                  <span class="flag-state-primary">
                    결제완료
                  </span>
                  <span class="order-num">
                    주문번호:
                    <em>1111-1111-1111</em>
                  </span>
                </div>
                <div class="tit-h4">
                  <?=$item->name?>
                </div>
              </div>
              <div class="item">
                <div class="price">
                  <em><?=$item->total_price?></em>원
                </div>
                <a href="/ccccoding/lecture/lecture_detail.php?pid=<?= $item->pid; ?>" class="btn btn-primary">강의로 이동</a>
              </div>
              <div class="btn-area cancel full">
              <a href="#" class="btn btn-outline-secondary btn-sm cancel-request" data-order-id="<?= $item->oid; ?>">취소신청</a>
              <a href="#" class="btn btn-outline-secondary btn-sm refund-request" data-order-id="<?= $item->oid; ?>">환불신청</a>
              </div>
            </div>
          </div>
          <?php
            }}
          ?>
          <!-- <div class="list">
            <span class="date">주문날짜: <em>YYYY-MM-DD</em></span>
            <div class="inner">
              <div class="item">
                <div class="top">
                  <span class="flag-state-negative">
                    결제취소
                  </span>
                  <span class="order-num">
                    주문번호:
                    <em>1111-1111-1111</em>
                  </span>
                </div>
                <div class="tit-h4">
                  따라하며 배우는 리액트 A-Z
                </div>
              </div>
              <div class="item">
                <div class="price">
                  <em>7,900</em>원
                </div>
                <a href="#" class="btn btn-primary">강의로 이동</a>
              </div>
            </div>
          </div>
          <div class="list">
            <span class="date">주문날짜: <em>YYYY-MM-DD</em></span>
            <div class="inner">
              <div class="item">
                <div class="top">
                  <span class="flag-state-complete">
                    환불완료
                  </span>
                  <span class="order-num">
                    주문번호:
                    <em>1111-1111-1111</em>
                  </span>
                </div>
                <div class="tit-h4">
                  따라하며 배우는 리액트 A-Z
                </div>
              </div>
              <div class="item">
                <div class="price">
                  <em>7,900</em>원
                </div>
                <a href="#" class="btn btn-primary">강의로 이동</a>
              </div>
            </div>
          </div> -->
        </div>
        <!-- line-box-list(e) -->
        <?php } else { ?>

        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">구매하신 내역이 없습니다.</p>
        </div>
        <!-- nodata(e) -->
        <?php } ?>

        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'payment.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'payment.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"payment.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"payment.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'payment.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'payment.php?pageNumber=' . $total_page; ?>">
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
