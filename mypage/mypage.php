<?php
  $title = '마이페이지-홈';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';
  
  $midsql = "SELECT mid 
            FROM members
            WHERE userid = '{$userid}'";
  $midresult = $mysqli->query($midsql);
  $midrow = $midresult->fetch_object();
  $mid = $midrow->mid;

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

  // 모든 수강신청 강의 수
  $psql = "SELECT COUNT(*) AS cnt FROM payments WHERE mid = '{$mid}'";
  $presult = $mysqli->query($psql);
  $prow = $presult->fetch_object();

  // 수강중인 강의 수
  $ingsql = "SELECT COUNT(*) AS cnt FROM payments WHERE mid = '{$mid}' AND (status = 1 or status = '' )";
  $ingresult = $mysqli->query($ingsql);
  $ingrow = $ingresult->fetch_object();

  // 수강완료 강의 수
  $csql = "SELECT COUNT(*) AS cnt FROM payments WHERE mid = '{$mid}' AND status = 2";
  $cresult = $mysqli->query($csql);
  $crow = $cresult->fetch_object();

  // 수강완료 강의 수의 비율 계산
  if ($prow->cnt > 0) {
    $completion_rate = floor(($crow->cnt / $prow->cnt) * 100);
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
              <span class="num"><?= $prow->cnt ?></span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강중인 강의</div>
              <span class="num"><?= $ingrow->cnt ?></span>
            </div>
          </div>
          <div class="list">
            <div class="inner">
              <div class="tit-h4">수강완료</div>
              <span class="num"><?= $crow->cnt ?></span>
            </div>
          </div>
        </div>

        <h3 class="tit-h2">평균학습 진도율</h3>
        <div class="progress-area">
          <div class="bg-graph">
            <div class="graph" style="width:0%;" data-value="<?=$completion_rate?>">
              <div class="val-area">
                <span class="count"><em><?=$completion_rate?></em>%</span>
                <span class="txt"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>