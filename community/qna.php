<?php
  $title = '질문하기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  // 각자 테이블 컬럼
$status = $_GET['status'] ?? '';
$title = $_GET['title'] ?? '';
$content = $_GET['content'] ?? '';
$userid = $_GET['userid'] ?? '';
$date = $_GET['date'] ?? '';
$qid = $_GET['qid'] ?? '';
$hit = $_GET['hit'] ?? '';

// search_where 조건에 맞게
$search_where = '';

if ($userid) {
    $search_where .= " AND userid LIKE '%$userid%'";
}

if ($date == '1') {
    $search_where .= " AND date = 1";
} else if ($date == '2') {
    $search_where .= " AND date = 2";
}

if ($status == '1') {
    $search_where .= " AND status = 1";
} elseif ($status == '2') {
    $search_where .= " AND status = 2";
}



    //총개수 조회
    $sql = "SELECT COUNT(*) AS cnt FROM qna WHERE 1=1";
    $sql .= $search_where;
    $result = $mysqli->query($sql);
    $count = $result->fetch_object();

    $totalcount = $count->cnt; //총검색건수
   

    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

          //페이지네이션
          $sql = "SELECT * FROM qna WHERE 1=1";
          $sql .= $search_where;
          $order = " order by qid desc";
          $sql .= $order;
          $limit = " LIMIT  $startLimit, $endLimit";
          $sql .= $limit;
          // echo $sql;

          $result = $mysqli->query($sql);


          while ($ns = $result->fetch_object()) {
            $rsArr[] = $ns;
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
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group depth-2">
                                            <li class="list-group-item">
                                                <a href="/ccccoding/community/notice.php">공지사항</a>
                                            </li>
                                            <li class="list-group-item on">
                                                <a href="/ccccoding/community/qna.php">Q&amp;A</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <a href="/ccccoding/event/event.php" class="accordion-button">
                            <i class="fa-solid fa-gift fa-middle"></i>
                            <span>이벤트</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <div class="con-wrap">
          <div class="page-tit-area">
            <h2 class="tit-h1">Q&amp;A</h2>
          </div>

          <form action="" class="filter-area">
            <div class="ipt-wrap">
              <input type="search" class="form-control" placeholder="검색어를 입력하세요.">
              <button class="ico-search">
                <span class="visually-hidden">검색</span>
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </form>

          <div class="sort-area">
            <select class="form-select" aria-label="정렬 순서 선택">
              <option value="1" selected>최신순</option>
              <option value="2">인기순</option>
              <option value="3">추천순</option>
            </select>
          </div>
          <!-- 공통 부분 (e) -->
          <hr>
          <!-- qna start -->
          <?php
            $sql = "SELECT * FROM qna order by qid desc";
            $result = $mysqli -> query($sql);
            while($row = mysqli_fetch_assoc($result)){
              $title = $row['title'];
              if(iconv_strlen($title)> 80 ){
                $title = str_replace($title, iconv_substr($title,0,80,'utf-8').'...',$title);
              }
              ?>
            <div class="">
              <div class="border-bottom qna-list">
                <h2 class="txt-lg list-h2"><a href="/ccccoding/community/qna_view.php?qid=<?= $row['qid'] ?>"><?= $title ?></a></h2>
                <p class="txt-md qna-text"><?= $row['content']?></p>
                <div class="d-flex justify-content-between">
                  <div class="d-flex list-text">
                    <p>답변 : <span class="qna-span"><?= $row['status']?></span></p>
                    <p><i class="fa-solid fa-eye fa-small"></i> : <?= $row['hit']?></p>
                    <p><i class="fa-solid fa-heart fa-small"></i> : <?= $row['thumbsup']?></p>
                  </div>
                  <div class="d-flex list-text">
                    <p>작성자 : <?= $row['userid']?></p>
                    <p><?= $row['date']?></p>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
            <div class="d-flex justify-content-end qna-btn">
              <a href="/ccccoding/community/qna_up.php" class="btn btn-primary btn-sm ">질문하기</a>
            </div>
          
           <!-- pagination(s) -->
           <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'qna.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'qna.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"qna.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"qna.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'qna.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'qna.php?pageNumber=' . $total_page; ?>">
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
    </div>
  </main>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>