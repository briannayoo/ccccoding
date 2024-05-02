<?php
 session_start();
  $title = 'Q&A';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">Q&amp;A</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        
        <table class="table table-bordered text-center qna-table">
          <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
          <colgroup>
            <col style="width:auto">
            <col style="width:50%">
            <col style="width:auto">
            <col style="width:auto">
          </colgroup>
          <thead>
            <tr>
              <th scope="col">처리현황</th>
              <th scope="col">제목</th>
              <th scope="col">작성자</th>
              <th scope="col">등록일</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $qnaSql = "SELECT * FROM qna order by qid desc";
              $qnaResult = $mysqli -> query($qnaSql);
              while ($qnrow = mysqli_fetch_object($qnaResult)) {
                $qnaArr[] = $qnrow;
              }

              if(isset($qnaArr)){
                foreach($qnaArr as $qa){
            ?>
              <tr>
                <td>
                  <button type="button" class="btn btn-<?php if ($qa->status == 1) {echo 'primary';} else { echo 'secondary';};  ?> btn-sm"><?php if ($qa->status == 1) { echo '답변완료';} else { echo '답변미답';}; ?></button>
                  
                </td>
                <td><a href="qna_up.php?qid=<?=$qa -> qid; ?>"><?=$qa -> title; ?></a></td>
                <td><?= $qa -> name;?></td>
                <td><?= $qa -> date;?></td>
              </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
        <?php
          $search_where = '';

          //페이지네이션
          $sql = "SELECT * FROM qna WHERE 1=1";
          $sql .= $search_where;
          $order = " order by qid desc";
          $sql .= $order;
          $limit = " LIMIT  $startLimit, $endLimit";
          $sql .= $limit;
          // echo $sql;

          $result = $mysqli->query($sql);

          $sql = "SELECT * FROM qna";

          if(isset($_GET['qid'])) {
            $idx = $_GET['qid'];
          } else {
            $idx = ""; // 기본값 설정
          }


          while ($ns = $result->fetch_object()) {
            $rsArr[] = $ns;
          }

        ?>
        <div class="mt-3 justify-content-end">
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
</body>
</html>