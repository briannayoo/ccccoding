<?php
  $title = '마이페이지-내 강의 보기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/mypage_nav.php';

  // $sql = "SELECT * FROM payments";
  // $result = $mysqli->query($sql);

  $midsql = "SELECT mid 
            FROM members
            WHERE userid = '{$userid}'";
  $midresult = $mysqli->query($midsql);
  $midrow = $midresult->fetch_object();
  $mid = $midrow->mid;


  //총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM payments WHERE mid = '{$mid}'" ;
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();

  $totalcount = $count->cnt; //총검색건수
  $targetTable = 'payments';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

  //페이지네이션
  $sql = "SELECT pid FROM payments WHERE 1=1 AND mid = '{$mid}'";
  $order = " order by oid desc";
  $sql .= $order;
  $limit = " LIMIT  $startLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;
  $rsArr = array(); // 배열 초기화
  $result = $mysqli->query($sql);
  $rs = $result->fetch_object();

  $pids = $rs->pid;
  $pidarray = explode(',', $pids);

  $parr = array(); // 배열 초기화
  for($i=0; $i<count($pidarray);$i++){
    $sql ="SELECT * FROM products WHERE pid = $pidarray[$i]";
    $result = $mysqli->query($sql);
    $parr[] = $rs = $result->fetch_object();
    
  }
?>
      
      <div class="con-wrap">
        <div class="page-tit-area">
          <h2 class="tit-h1">내 강의 보기</h2>
        </div>
        <!-- 공통 부분 (e) -->

        <!-- 아래에서 부터 작업영역입니다 -->
        <?php if ($result->num_rows > 0) { ?>
        <div class="lecture-area">
          <ul>
            <?php
              if (isset($parr)) {  
                foreach ($parr as $item) {
            ?>
            <li>
              <a href="/ccccoding/lecture/lecture_detail.php?pid=<?= $item->pid; ?>">
                <img src="<?=$item->thumbnail;?>" alt="">
                <h3 class="tit-h4"><?=$item->name;?></h3>
                <!-- progress bar (s) -->
                <div class="progress-area">
                  <div class="bg-graph">
                    <div class="graph" style="width:0%;" data-value="">
                      <div class="val-area">
                      <span class="count">진행률 <em>3</em>%</span>
                      <span class="txt"></span>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- progress bar (e) -->
              </a>
            </li>
            <?php
              }}
            ?>
          </ul>
        </div>
        <?php } else { ?>
        <!-- nodata(s) -->
        <div class="nodata">
          <p class="txt">진행중인 강의가 없습니다.</p>
        </div>
        <!-- nodata(e) -->
        <?php } ?>
        
        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'course.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'course.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"course.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"course.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'course.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'course.php?pageNumber=' . $total_page; ?>">
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