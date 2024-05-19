<?php
  $title = '마이페이지-홈';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  // 가입일 디데이 날짜 관련 (s)
  $sql = "SELECT DATE(regdate) AS regdate FROM members WHERE userid = '$userid'";
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
      $row = $result->fetch_object();
      $regdate = $row->regdate;
  }

  // 문자열을 DateTime 객체로 변환
  $regdate_obj = date_create($regdate);
  $today_obj = date_create(date("Y-m-d"));

  // 가입일로부터 오늘까지의 날짜 차이 계산
  $diff = date_diff($regdate_obj, $today_obj);
  $days_since_registration = $diff->format("%a");
  // 가입일 디데이 날짜 관련 (e)

  $psql = "SELECT *
  FROM payments AS pa
  INNER JOIN products AS p
  ON pa.pid = p.pid";

  $presult = $mysqli->query($psql);

  $prsArr = [];
  while ($prs = $presult->fetch_object()) {
    $prsArr[] = $prs;
  }

  // 모든 수강신청 강의 수
  $total_orders_sql = "SELECT COUNT(DISTINCT oid) AS total_orders FROM payments";
  $total_orders_result = $mysqli->query($total_orders_sql);
  if ($total_orders_result->num_rows > 0) {
      $total_orders_row = $total_orders_result->fetch_object();
      $total_orders = $total_orders_row->total_orders;
  } else {
      $total_orders = 0;
  }

  // 수강중인 강의 수
  $ongoing_orders_sql = "SELECT COUNT(DISTINCT oid) AS ongoing_orders FROM payments WHERE status = 1";
  $ongoing_orders_result = $mysqli->query($ongoing_orders_sql);
  if ($ongoing_orders_result->num_rows > 0) {
      $ongoing_orders_row = $ongoing_orders_result->fetch_object(); 
      $ongoing_orders = $ongoing_orders_row->ongoing_orders;
  } else {
      $ongoing_orders = 0;
  }

  // 수강완료 강의 수
  $completed_orders_sql = "SELECT COUNT(DISTINCT oid) AS completed_orders FROM payments WHERE status = 2";
  $completed_orders_result = $mysqli->query($completed_orders_sql);
  if ($completed_orders_result->num_rows > 0) {
      $completed_orders_row = $completed_orders_result->fetch_object();
      $completed_orders = $completed_orders_row->completed_orders;
  } else {
      $completed_orders = 0;
  }

  // 수강완료 강의 수의 비율 계산
  if ($total_orders > 0) {
    $completion_rate = floor(($completed_orders / $total_orders) * 100);
    $formatted_rate = number_format($completion_rate, 2);
  } else {
    $completion_rate = 0;
    $formatted_rate = '0.00';
  }
?>

      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">마이페이지</h2>
          <p class="desc tit-h3">ㅋㅋㅋ코딩과 <em><?=$days_since_registration?>일</em>째 성장중!</p>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <div class="line-box-list list-3">
          <div class="list">
            <div class="inner">
              <div class="tit-h4">모든 수강신청 강의</div>
              <span class="num"><?= $total_orders ?></span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강중인 강의</div>
              <span class="num"><?= $ongoing_orders ?></span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강완료</div>
              <span class="num"><?= $completed_orders ?></span>
            </div>
          </div>
        </div>

        <h3 class="tit-h2">평균학습 진도율</h3>
        <div class="progress-area">
          <div class="bg-graph">
            <div class="graph" style="width:0%;" data-value="<?=$completion_rate?>"></div>
          </div>
          <div class="val-area">
            <span class="count"><em><?=$completion_rate?></em>%</span>
            <span class="txt"></span>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>