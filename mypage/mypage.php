<?php
  $title = '마이페이지-홈';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  // 가입일 디데이 날짜 관련 (s)
  $sql = "SELECT regdate FROM members WHERE userid = '$userid'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_object();
      $regdate = $row->regdate;
  }

  // 가입일로부터 오늘까지의 날짜 차이 계산
  $today = date("Y-m-d");
  $diff = date_diff(date_create($regdate), date_create($today));
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

  // 수강강의수 세기
  $oids_sql = "SELECT COUNT(DISTINCT oid) AS total_oids FROM payments";
  $oids_result = $mysqli->query($oids_sql);

  if ($oids_result->num_rows > 0) {
    $oids_row = $oids_result->fetch_object();
    $total_oids = $oids_row->total_oids;
  } else {
    $total_oids = 0;
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
              <span class="num"><?= count($prsArr) ?></span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강중인 강의</div>
              <span class="num"><?= count($prsArr) ?></span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강완료</div>
              <span class="num"><?= count($prsArr) ?></span>
            </div>
          </div>
        </div>

        <h3 class="tit-h2">평균학습 진도율</h3>
        <div class="progress">
          <div class="graph" style="width:0%;">
            <span class="count"><em>0</em>%</span>
            <span class="txt">얼마 안남았어요! 힘을 내요!</span>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>