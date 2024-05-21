<?php
  $title = '이벤트';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  // 각자 테이블 컬럼
  $eid = $_GET['eid'] ?? '';
  $e_name = $_GET['e_name'] ?? '';
  $e_img = $_GET['e_img'] ?? '';
  $e_file = $_GET['e_file'] ?? '';
  $event_date = $_GET['event_date'] ?? '';
  $start_date = $_GET['start_date'] ?? '';
  $end_date = $_GET['end_date'] ?? '';
  $status = $_GET['status'] ?? '';
  $search_where = '';

  if ($e_name) {
    $search_where .= " AND e_name LIKE '%$e_name%'";
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

include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

//페이지네이션
$sql = "SELECT * FROM event WHERE 1=1";
$sql .= $search_where;
$order = " order by eid desc";
$sql .= $order;
$limit = " LIMIT  $startLimit, $endLimit";
$sql .= $limit;
echo $sql;

$result = $mysqli->query($sql);

while ($rs = $result->fetch_object()) {
  $rsArr[] = $rs;
}

?>
  <!-- 공통 부분 (s) -->
  <main class="sub">
    <div class="section">
        <div class="container">
            <nav class="sub-menu">
                <ul class="list-group">
                    <!-- 아코디언 하위메뉴 있을 때 case(s) -->
                    <li class="list-group-item acco">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <i class="fa-solid fa-comment-dots fa-middle"></i>
                                        <span>커뮤니티</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group depth-2">
                                            <li class="list-group-item">
                                                <a href="/ccccoding/community/notice.php">공지사항</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="/ccccoding/community/qna.php">Q&amp;A</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item on">
                        <a href="/ccccoding/event/event.php" class="accordion-button">
                            <i class="fa-solid fa-gift fa-middle"></i>
                            <span>이벤트</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <!-- 질문하기 start -->
        <?php
        $sql = "SELECT * FROM event";
        $result = $mysqli -> query($sql);
        while($rs = $result->fetch_object()){
          $esArr[] = $rs;
        }
        ?>
        <div class="con-wrap">
          <div class="page-tit-area">
            <h2 class="tit-h1">이벤트</h2>
          </div>
          <div class="d-flex justify-content-end event-top-btn">
            <a href="/ccccoding/event/event.php?status=1" >진행중 이벤트</a>
            <a href="/ccccoding/event/event.php?status=2" >종료된 이벤트</a>
          </div>

          <hr>
          <ul class="list-group box-list event">
        <?php
        if(isset($rsArr)){
          foreach($rsArr as $ea){
        ?>
          <li class="list-group-item">
            <a href="event_detail.php?eid=<?= $ea->eid; ?>" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
              <img src="<?= $ea->e_img; ?>" alt="이미지">
            </a>
            <div class="info-area">
              <p class="event-title"></p>
              <p class="date">진행기한:
              <?php 
                    if ($ea->event_time == 2) {
                        echo $ea->start_date . '~' . $ea->end_date; 
                    } else if ($ea->event_time == 1) {
                        echo '종료됨';
                    }
                  ?>
              </p>
            </div>
          </li>
        <?php
          }
        }
        ?>
          </ul>
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
    </div>
  </main>

<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>