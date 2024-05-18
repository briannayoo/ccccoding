<?php
  $title = '마이페이지-결제내역';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  $sql = "SELECT * FROM payments";
  $result = $mysqli->query($sql);

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
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
