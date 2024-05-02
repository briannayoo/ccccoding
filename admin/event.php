<?php
$title = '이벤트관리';
session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

  // $keyword = $_GET['e_keyword'] ?? '';
  // $eventSql = "SELECT * FROM event WHERE 1=1 and (e_name like '%$keyword%' or e_title like '%$keyword%')";
  // $eventResult = mysqli_query($mysqli, $eventSql);
  
  // while ($row = mysqli_fetch_object($eventResult)) {
  //   $eventArr[] = $row;
  //}  

  
  // 각자 테이블 컬럼
  $eid = $_GET['eid'] ?? '';
  $e_name = $_GET['e_name'] ?? '';
  $e_text = $_GET['e_text'] ?? '';
  $e_img = $_GET['e_img'] ?? '';
  $e_file = $_GET['e_file'] ?? '';
  $e_startdate = $_GET['e_startdate'] ?? '';
  $e_enddate = $_GET['e_enddate'] ?? '';
  $e_status = $_GET['e_status'] ?? '';
  
  // search_where 조건에 맞게
  $search_where = '';

  // if ($discount == '1') {
  //     $search_where .= " AND coupon_type = 1";
  // } elseif ($discount == '2') {
  //     $search_where .= " AND coupon_type = 2";
  // }
  
  if ($e_name) {
      $search_where .= " AND coupon_name LIKE '%$e_name%'";
  }
  
  if ($start_date) {
      $search_where .= " AND start_date >= '$start_date'";
  }
  if ($end_date) {
      $search_where .= " AND end_date <= '$end_date'";
  }
  
  if ($status == '1') {
      $search_where .= " AND status = 1";
  } elseif ($status == '2') {
      $search_where .= " AND status = 2";
  }
  
  // 활성화 값이 1인 경우의 개수 조회
  $sql_act_1 = "SELECT COUNT(*) AS act_1_cnt FROM coupons WHERE status = 1";
  $sql_act_1 .= $search_where;
  $result_act_1 = $mysqli->query($sql_act_1);
  $count_act_1 = $result_act_1->fetch_object();
  $count_act_1 = $count_act_1->act_1_cnt;
  
  // 비활성화 값이 2인 경우의 개수 조회
  $sql_act_2 = "SELECT COUNT(*) AS act_2_cnt FROM coupons WHERE status = 2";
  $sql_act_2 .= $search_where;
  $result_act_2 = $mysqli->query($sql_act_2);
  $count_act_2 = $result_act_2->fetch_object();
  $count_act_2 = $count_act_2->act_2_cnt;
  
  //총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM coupons WHERE 1=1";
  $sql .= $search_where;
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();
  
  $totalcount = $count->cnt; //총검색건수
  $targetTable = 'coupons';
  include_once $_SERVER['DOCUMENT_ROOT'].'/easy_bbs/inc/pagination.php';
  
  //페이지네이션
  $sql = "SELECT * FROM coupons WHERE 1=1";
  $sql .= $search_where;
  $order = " order by cid desc";
  $sql .= $order;
  $limit = " LIMIT  $starLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;
  
  $result = $mysqli->query($sql);
  
  $sql = "SELECT * FROM coupons";
  
  if(isset($_GET['cid'])) {
    $cid = $_GET['cid'];
  } else {
    $cid = ""; // 기본값 설정
  }
  
  
  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
  ?>
?>

<div class="page-tit-area">
        <h2 class="tit-h2">이벤트관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <!-- 이벤트검색 -->
      <form action="" class="form-list">
        <div class="row">
          <label for="search" class="col-md-1 col-form-label tit-h4">이벤트명</label>
          <div class="col-md-11">
            <div class="input-group search">
              <div class="col-md-6 ipt-wrap">
                <input class="form-control" type="search" id="search" name="e_keyword" placeholder="이벤트명을 입력하세요..." aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- 이벤트 기한 -->
        <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">이벤트 기한</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
                <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="date-wrap col-md-8">
                <div class="col-md-6 ipt-wrap">
                  <input type="text" class="ipt-datepicker form-control" id="datepicker-01" name="datepicker-01" placeholder="YYYY-MM-DD">
                  <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                </div>
                <div class="col-md-6 ipt-wrap">
                  <input type="text" class="ipt-datepicker form-control" id="datepicker-02" name="datepicker-02" placeholder="YYYY-MM-DD">
                  <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- 이벤트 상태 -->
        <div class="row">
          <label for="mix-01" class="col-md-1 col-form-label tit-h4">상태</label>
          <div class="col-md-11">
            <div class="input-group">
              <div class="col-md-4 ipt-wrap">
                <select class="form-select form-select-sm" id="mix-01" aria-label="select">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- 총건수 -->
      <div class="total">
        <span>총 <em>8</em>건</span>
        <span class="point">활성화 <em>8</em>건</span>
        <span>비활성화 <em>8</em>건</span>
      </div>

      <!-- 이벤트 리스트 -->
      <?php
      // if(isset($eventArr)){
      //   foreach($eventArr as $ea){
          ?>
            <ul class="list-group  box-list list-3 event">
              <li class="list-group-item flex-column">
                <a href="#" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
                  <img src="image/event1.jpg" alt="이미지">
                </a>
                <div class="info-area">
                  <div class="tit-event">
                    <strong class="tit-h3"><?= $ea -> e_title;?></strong>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="toggle1">
                      <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                    </div>
                  </div>
                  <div class="txt-group">
                    <p class="date">이벤트기한 YYYY-MM-DD - YYYY-MM-DD</p>
                  </div>
                  <div class="edit-btn-group">
                    <button type="button" class="btn correc">
                      <span class="visually-hidden">수정</span>
                      <i class="fa-solid fa-pen-to-square fa-small"></i>
                    </button>
                    <button type="button" class="btn del">
                      <span class="visually-hidden">삭제</span>
                      <i class="fa-solid fa-trash-can fa-small"></i>
                    </button>
                  </div>
                </div>
              </li>
            </ul>    
      <?php
      //   }
      // }
      ?>
      </nav>
    </div>
  </div>
  <script src="/ccccoding/admin/js/datepicker.js"></script>
  <script src="/ccccoding/admin/js/event.js"></script>
</body>
</html>