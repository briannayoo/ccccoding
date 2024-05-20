<?php
  $title = '마이페이지-결제내역';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  $midsql = "SELECT mid 
            FROM members
            WHERE userid = '{$userid}'";
  $midresult = $mysqli->query($midsql);
  $midrow = $midresult->fetch_object();
  $mid = $midrow->mid;

  //총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM payments WHERE mid = '{$mid}'";
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();
  $totalcount = $count->cnt; //총검색건수

  $targetTable = 'payments';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

  //페이지네이션
  $sql = "SELECT * FROM payments WHERE mid = '{$mid}'";
  $order = " ORDER BY oid DESC";
  $sql .= $order;
  $limit = " LIMIT $startLimit, $endLimit";
  $sql .= $limit;

  $result = $mysqli->query($sql);
  $rsArr = array();
  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
?>

<!-- HTML 코드 생략 -->

<?php if (count($rsArr) > 0) { ?>
<div class="line-box-list">
  <?php foreach ($rsArr as $item) { ?>
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
          <a href="/ccccoding/lecture/lecture_detail.php?pid=<?=$item->pid?>" class="btn btn-primary">강의로 이동</a>
        </div>
        <div class="btn-area cancel full">
          <a href="#" class="btn btn-outline-secondary btn-sm cancel-request" data-order-id="<?=$item->oid?>">취소신청</a>
          <a href="#" class="btn btn-outline-secondary btn-sm refund-request" data-order-id="<?=$item->oid?>">환불신청</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<?php } else { ?>
<div class="nodata">
  <p class="txt">구매하신 내역이 없습니다.</p>
</div>
<?php } ?>

<!-- 페이지네이션 코드 생략 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>