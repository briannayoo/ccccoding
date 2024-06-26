<?php
  $title = '수강관리';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  // include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';

    // 각자 테이블 컬럼 (검색)

    // search_whre 검색조건에 맞게
    $search_where = '';
    
    //총개수 조회
    $sql = "SELECT COUNT(*) AS cnt FROM payments WHERE mid = '{$mid}'";
    $sql .= $search_where;
    $result = $mysqli->query($sql);
    $count = $result->fetch_object();

    $totalcount = $count->cnt; //총검색건수
    $targetTable = 'payments';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

    //페이지네이션
    $sql = "SELECT * FROM payments WHERE mid = '{$mid}'";
    $sql .= $search_where;
    $order = " order by oid desc";
    $sql .= $order;
    $limit = " LIMIT  $startLimit, $endLimit";
    $sql .= $limit;
    // echo $sql;

    // $result = $mysqli->query($sql);
    // $sql = "SELECT * FROM payments";

    if(isset($_GET['oid'])) {
      $oid = $_GET['oid'];
    } else {
      $oid = ""; // 기본값 설정
    }

    while ($rs = $result->fetch_object()) {
      $rsArr[] = $rs;
    }

    $osql = "SELECT o.*, m.userid, m.username, p.name, p.sale_start_date, p.sale_end_date 
    FROM payments o
    LEFT JOIN members m ON o.mid = m.mid
    LEFT JOIN products p ON o.pid = p.pid";

    $result = $mysqli->query($osql);

    while ($rs = $result->fetch_object()) {
      $rsArr[] = $rs;
    }
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">수강관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <form action="#" class="form-list">
          <!-- select + datepicker (s) -->
          <div class="row">
            <label for="src-date" class="col-md-1 col-form-label tit-h4 visually-hidden">수강관리 날짜로 정보검색</label> <!-- label hidden으로 사용  -->
            <div class="col-md-12">
              <div class="input-group justify-content-between align-items-center">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="src-date" name="src-date" aria-label="select">
                    <option  value="1" selected>결제일</option>
                    <option  value="2">사용기한</option>
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
          <!-- elect + datepicker 1/3 (e) -->
          <!-- select + text + button (s) -->
          <div class="row">
            <label for="info-select" class="col-md-1 col-form-label tit-h4 visually-hidden">수강관리 회원정보로 검색</label> <!-- label hidden으로 사용  -->
            <div class="col-md-12">
              <div class="input-group justify-content-between align-items-center">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="info-select" name="info-select" aria-label="select">
                    <option value="1" selected>이름</option>
                    <option value="2">아이디</option>
                    <option value="3">강의명</option>
                  </select>
                </div>
                <div class="col-md-7 ipt-wrap">
                  <input type="text" class="form-control" id="search" name="search" placeholder="검색어를 입력하세요">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">검색</button>
              </div>
            </div>
          </div>
          <!-- elect + text + button 1/3 (e) -->
        </form>

        <div class="total">
          <span>총 <em><?=$totalcount;?></em>건</span>
        </div>

        <!-- table(s) -->
        <table class="table table-bordered text-center" id="orderTable">
          <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
          <colgroup>
            <colgroup>
              <col style="width:auto" span="3">
              <col style="width:35%">
              <col style="width:auto" span="4">
            </colgroup>
          </colgroup>
          <thead>
            <tr>
              <th scope="col">
                <div>
                  <span class="visually-hidden">전체선택</span>
                  <input class="form-check-input" type="checkbox" id="all-check" name="check-group" value="" aria-label="checkbox"> 
                </div>
              </th>
              <th scope="col">결제일</th>
              <th scope="col">이름</th>
              <th scope="col">아이디</th>
              <th scope="col">강의명</th>
              <th scope="col">금액</th>
              <!-- <th scope="col">쿠폰사용</th> -->
              <!-- <th scope="col">사용기한</th> -->
              <th scope="col">취소신청</th>
              <th scope="col">환불신청</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($rsArr)) {
                foreach ($rsArr as $item) {
              ?>
            <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="" name="check-group" value="<?= $item->oid?>" aria-label="checkbox">
                </div>
              </td>
              <td><?= $item->orders_date?></td>
              <td><?= $item->username ?></td>
              <td><?= $item->userid ?></td>
              <td><?= $item->name ?></td>
              <td><?= $item->total_price ?>원</td>
              <!-- <td>$item->coupon_used</td>
              <td>$item->sale_start_date ?> ~ $item->sale_end_date ?></td> -->
              <td class="request"><?= $item->cancel_request ?></td>
              <td class="refund"><?= $item->refund_request ?></td>
            </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
        <!-- table(e) -->

        <div class="btn-area">
          <button type="button" class="btn btn-secondary btn-sm" id="cancelOrder">취소</button>
          <button type="button" class="btn btn-secondary btn-sm" id="refundOrder">환불</button>
        </div>

        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'order.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'order.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"order.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"order.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'order.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'order.php?pageNumber=' . $total_page; ?>">
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
  <!-- wwilsman 데이트픽커 js -->
  <script src="/ccccoding/admin/js/datepicker.js"></script>
  <script src="/ccccoding/admin/js/order.js"></script>
</body>
</html>