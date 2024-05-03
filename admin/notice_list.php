<?php
session_start();
$title = '공지사항';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

  
  $keyword = $_GET['keyword'] ?? '';
  $noticesql = "SELECT * FROM notice WHERE 1=1 and (name like '%$keyword%' or title like '%$keyword%')order by idx desc ";
  $noticeResult = mysqli_query($mysqli, $noticesql);
  
  while ($row = mysqli_fetch_object($noticeResult)) {
    $noticeArr[] = $row;
  }  

  // 각자 테이블 컬럼
$idx = $_GET['idx '] ?? '';
$name = $_GET['name'] ?? '';
$pw = $_GET['pw'] ?? '';
$title = $_GET['title'] ?? '';
$content = $_GET['content'] ?? '';
$date = $_GET['date'] ?? '';
$hit = $_GET['hit'] ?? '';
$thumbsup = $_GET['thumbsup'] ?? '';
$is_img = $_GET['is_img'] ?? '';
$file = $_GET['file'] ?? '';

// search_where 조건에 맞게
$search_where = '';

if ($name) {
    $search_where .= " AND name LIKE '%$name%'";
}

if ($date == '1') {
    $search_where .= " AND date = 1";
} else if ($date == '2') {
    $search_where .= " AND date = 2";
}





    //총개수 조회
    $sql = "SELECT COUNT(*) AS cnt FROM notice WHERE 1=1";
    $sql .= $search_where;
    $result = $mysqli->query($sql);
    $count = $result->fetch_object();

    $totalcount = $count->cnt; //총검색건수
   

    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';


  //페이지네이션
  $sql = "SELECT * FROM notice WHERE 1=1";
  $sql .= $search_where;
  $order = " order by idx desc";
  $sql .= $order;
  $limit = " LIMIT  $startLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;

  $result = $mysqli->query($sql);

  $sql = "SELECT * FROM notice";

  if(isset($_GET['idx'])) {
    $idx = $_GET['idx'];
  } else {
    $idx = ""; // 기본값 설정
  }


  while ($ns = $result->fetch_object()) {
    $rsArr[] = $ns;
  }



?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-list mb-4">
          <div class="row">
            <label for="search" class="col-md-1 col-form-label tit-h4">검색</label>
            <div class="col-md-11">
              <div class="input-group search">
                <div class="col-md-6 ipt-wrap">
                  <input class="form-control" type="search" id="search" name="keyword" placeholder="검색어를 입력하세요..." aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

          <!-- table(s) -->
          <table class="table table-bordered text-center notice-table notice_table">
            <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
            <colgroup>
              <col style="width:10%">
              <col style="width:30%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:10%">
            </colgroup>
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">제목</th>
                <th scope="col">작성자</th>
                <th scope="col">작성일</th>
                <th scope="col">조회수</th>
                <th scope="col">관리</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  
                  // $sql = "SELECT * FROM notice order by idx desc";
                  // $result = $mysqli -> query($sql);
                  // while($row = mysqli_fetch_assoc($result)){
                  //   $title = $row['title'];
                  //   if(iconv_strlen($title) > 10){
                  //   $title = str_replace($title,iconv_substr($title,0,10,'utf-8').'...', $title);
                  //   }
                  if(isset($noticeArr)){
                    foreach($noticeArr as $na){
                      ?>
                    <tr>
                      <td><?= $na -> idx;?></td>
                      <td><a href="notice_view.php?idx=<?=$na -> idx; ?>"><?= $na -> title; ?></a></td>
                      <td><?= $na -> name;?></td>
                      <td><?=$na -> date;?></td>
                      <td><?= $na -> hit;?></td>
                      <td>
                        <a href="notice_edit.php?idx=<?=  $na -> idx;?>">
                          <i class="fa-solid fa-pen-to-square fa-small"><span class="visually-hidden">수정</span></i>
                        </a>
                        <a href="notice_del.php?idx=<?=  $na -> idx;?>">
                          <i class="fa-solid fa-trash-can fa-small"><span class="visually-hidden">삭제</span></i>
                        </a>
                      </td>
                    </tr> 
                      <?php
                    }
                  }
                ?>
            </tbody>
          </table>
          <div class="mt-3 d-flex justify-content-end">
          <a href="notice_up.php" class="btn btn-primary btn-lg">글쓰기</a>
          </div>
          <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'notice_list.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'notice_list.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"notice_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"notice_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'notice_list.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'notice_list.php?pageNumber=' . $total_page; ?>">
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
          </nav>
      </div>
        </div>
  </div>
  <?php
    $mysqli->close();
  ?>
</body>
</html>