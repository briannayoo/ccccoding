<?php
$title = '이벤트관리';
session_start();
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';


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
  $e_date_type = $_GET['e_date_type'] ?? '';
  $e_status = $_GET['status'] ?? '';
  
  // search_where 조건에 맞게
  $search_where = '';

  // if ($discount == '1') {
  //     $search_where .= " AND coupon_type = 1";
  // } elseif ($discount == '2') {
  //     $search_where .= " AND coupon_type = 2";
  // }
  
  if ($e_name) {
      $search_where .= " AND e_name LIKE '%$e_name%'";
  }
  
  if ($e_startdate) {
      $search_where .= " AND e_startdate >= '$e_startdate'";
  }
  if ($e_enddate) {
      $search_where .= " AND e_enddate <= '$e_enddate'";
  }
  
  if ($e_status == '1') {
      $search_where .= " AND status = 1";
  } elseif ($e_status == '2') {
      $search_where .= " AND status = 2";
  }
  
  // 활성화 값이 1인 경우의 개수 조회
  $sql_act_1 = "SELECT COUNT(*) AS act_1_cnt FROM event WHERE status = 1";
  $sql_act_1 .= $search_where;
  $result_act_1 = $mysqli->query($sql_act_1);
  $count_act_1 = $result_act_1->fetch_object();
  $count_act_1 = $count_act_1->act_1_cnt;
  
  // 비활성화 값이 2인 경우의 개수 조회
  $sql_act_2 = "SELECT COUNT(*) AS act_2_cnt FROM event WHERE status = 2";
  $sql_act_2 .= $search_where;
  $result_act_2 = $mysqli->query($sql_act_2);
  $count_act_2 = $result_act_2->fetch_object();
  $count_act_2 = $count_act_2->act_2_cnt;
  
  //총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM event WHERE 1=1";
  $sql .= $search_where;
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();
  
  $totalcount = $count->cnt; //총검색건수
  
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';
  
  //페이지네이션
  $sql = "SELECT * FROM event WHERE 1=1";
  $sql .= $search_where;
  $order = " order by eid desc";
  $sql .= $order;
  $limit = " LIMIT  $startLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;
  
  $result = $mysqli->query($sql);
  

  
  
  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
  ?>

<div class="page-tit-area">
        <h2 class="tit-h2">이벤트관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="d-flex justify-content-end mb-5">
        <a href="event_up.php" class="btn btn-primary btn-lg">이벤트등록</a>
      </div>


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
                  <option selected>전체</option>
                  <option value="1">1주</option>
                  <option value="2">1개월</option>
                  <option value="3">6개월</option>
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
              <select class="form-select form-select-sm" id="mix-01" name="e_status"aria-label="select">
                  <option selected>전체</option>
                  <option value="1">활성화</option>
                  <option value="2">비활성화</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-area">
            <button type="submit" class="btn btn-primary btn-lg">검색</button>
          </div>
      </form>
      <!-- 총건수 -->
      <div class="total">
          <span>총 <em><?=$totalcount;?></em>건</span>
          <span class="point">활성화 <em><?=$count_act_1;?></em>건</span>
          <span>비활성화 <em><?=$count_act_2;?></em>건</span>
        </div>

      <!-- 이벤트 리스트 -->
            <ul class="list-group  box-list list-3 event">
      <?php
      if(isset($rsArr)){
        foreach($rsArr as $ea){
          ?>
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
      <?php
        }
      }
      ?>
            </ul>    
      </nav>
        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'event.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'event.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"event.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"event.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'event.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'event.php?pageNumber=' . $total_page; ?>">
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
  <script src="/ccccoding/admin/js/datepicker.js"></script>
  <script src="/ccccoding/admin/js/event.js"></script>
</body>
</html>