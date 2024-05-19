<?php
  $title = '마이페이지-쿠폰&포인트';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  $userid = $_SESSION['UID'];
  $sql = "SELECT * FROM members WHERE userid = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("s", $userid);
  $stmt->execute();
  $result = $stmt->get_result();
  $rs = $result->fetch_object();
?>

      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">포인트</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <h3 class="tit-h2">포인트</h3>
        <?php if ($rs->point > 0) { ?>
        <p class="tit-h3 point-txt">현재 사용가능한 포인트는 <em><?=$rs->point?></em>입니다.</p>
        <?php } else { ?>

        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">포인트 내역이 없습니다.</p>
          <div class="btn-area">
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