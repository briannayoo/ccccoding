<?php
$title = '마이페이지-문의내역';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

//총개수 조회
$sql = "SELECT COUNT(*) AS cnt FROM qna WHERE userid = '{$userid}'";
$result = $mysqli->query($sql);
$count = $result->fetch_object();

$totalcount = $count->cnt; //총검색건수
$targetTable = 'qna';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

//페이지네이션
$sql = "SELECT q.*, qr.r_content 
FROM qna q
LEFT JOIN qna_reply qr ON q.qid = qr.r_idx
WHERE q.userid = '{$userid}'";
$order = " order by qid desc";
$sql .= $order;
$limit = " LIMIT  $startLimit, $endLimit";
$sql .= $limit;
// echo $sql;

$result = $mysqli->query($sql);

while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}
?>

<div class="con-wrap">
  <div class="page-tit-area">
    <h2 class="tit-h1">문의내역</h2>
  </div>
  <!-- 공통 부분 (e) -->

  <!-- 아래에서 부터 작업영역입니다 -->
  <?php if (isset($rsArr)) { ?>
    <!-- line-box-list(s) -->
    <div class="line-box-list qa">
      <?php foreach ($rsArr as $rs) { ?>
        <div class="list">
          <span class="date">문의날짜: <em><?=$rs->date?></em></span>
          <div class="inner">
            <div class="item">
              <div class="top">
                <?php if($rs->status == 0): ?>
                  <span class="flag-state-incomplete">미해결</span>
                  <p class="state-txt">답변을 준비중입니다.</p>
                <?php else: ?>
                  <span class="flag-state-primary">답변완료</span>
                  <p class="state-txt bold">답변을 완료하였습니다.</p>
                <?php endif; ?>
              </div>
              <div class="tit-h4">
                <?=$rs->title?>
              </div>
              <?php if($rs->status == 1 && !empty($rs->r_content)): ?>
                <div class="answer"><?=$rs->r_content?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- line-box-list(e) -->
  <?php } else { ?>
    <!-- nodata(s) -->
    <div class="nodata">
      <p class="txt">문의하신 내역이 없습니다.</p>
      <div class="btn-area">
        <a href="ccccoding/community/qna.php" class="btn btn-outline-secondary btn-sm">문의하러가기</a>
      </div>
    </div>
    <!-- nodata(e) -->
  <?php } ?>

  <!-- pagination(s) -->
  <nav aria-label="페이지네이션">
    <ul class="pagination">
      <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
        <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'inquiries.php?pageNumber=1'; ?>" tabindex="-1">
          <span class="visually-hidden">처음</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
          </svg>
        </a>
      </li>
      <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
        <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'inquiries.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
          <span class="visually-hidden">이전</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
          </svg>
        </a>
      </li>
      <?php
      for($i = $block_start; $i <= $block_end; $i++) {
        if($i == $pageNumber) {
          echo "<li class=\"page-item active\"><a href=\"inquiries.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
        } else {
          echo "<li class=\"page-item\"><a href=\"inquiries.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
        }
      }
      ?>
      <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
        <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'inquiries.php?pageNumber=' . ($pageNumber + 1); ?>">
          <span class="visually-hidden">다음</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
          </svg>
        </a>
      </li>
      <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
        <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'inquiries.php?pageNumber=' . $total_page; ?>">
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