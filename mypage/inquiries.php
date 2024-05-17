<?php
$title = '마이페이지-문의내역';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

$sql = "SELECT q.*, qr.r_content 
        FROM qna q
        LEFT JOIN qna_reply qr ON q.qid = qr.r_idx";
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
  <?php if ($result->num_rows > 0) { ?>
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
        <a href="#" class="btn btn-outline-secondary btn-sm">문의하러가기qna페이지로 연결고고</a>
      </div>
    </div>
    <!-- nodata(e) -->
  <?php } ?>
</div>
</div>
</main>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>