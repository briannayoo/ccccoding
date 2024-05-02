<?php
session_start();
$title = '쿠폰리스트';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';


// 각자 테이블 컬럼
$discount = $_GET['discount'] ?? '';
$coupon_name = $_GET['coupon_name'] ?? '';
$use_date = $_GET['use-date'] ?? '';
$start_date = $_GET['datepicker-01'] ?? '';
$end_date = $_GET['datepicker-02'] ?? '';
$status = $_GET['status'] ?? '';

// search_where 조건에 맞게
$search_where = '';
if ($discount == '1') {
    $search_where .= " AND coupon_type = 1";
} elseif ($discount == '2') {
    $search_where .= " AND coupon_type = 2";
}

if ($coupon_name) {
    $search_where .= " AND coupon_name LIKE '%$coupon_name%'";
}

if ($use_date == '1') {
    $search_where .= " AND use_date_type = 1";
} elseif ($use_date == '2') {
    $search_where .= " AND use_date_type = 2";
    if ($start_date) {
        $search_where .= " AND start_date >= '$start_date'";
    }
    if ($end_date) {
        $search_where .= " AND end_date <= '$end_date'";
    }
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
include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

//페이지네이션
$sql = "SELECT * FROM coupons WHERE 1=1";
$sql .= $search_where;
$order = " order by cid desc";
$sql .= $order;
$limit = " LIMIT  $startLimit, $endLimit";
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
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">쿠폰관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="d-flex justify-content-end mb-5">
        <a href="coupon_up.php" class="btn btn-primary btn-lg">쿠폰등록</a>
      </div>

      <!-- form-list (s) -->
      <form action="#" class="form-list">
          <!-- 할인종류 (s) -->
          <div class="row">
            <label for="discount" class="col-md-1 col-form-label tit-h4">할인종류</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="discount" name="discount" aria-label="select">
                    <option selected>전체</option>
                    <option value="1">할인금액</option>
                    <option value="2">할인율</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- 할인종류 (e) -->

          <!-- 쿠폰명 1/3 (s) -->
          <div class="row">
            <label for="coupon-name" class="col-md-1 col-form-label tit-h4">쿠폰명</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap ipt-wrap">
                  <input type="text" class="form-control" id="coupon-name" name="coupon-name" placeholder="쿠폰명을 입력하세요.">
                </div>
              </div>
            </div>
          </div>
          <!-- 쿠폰명 1/3 (e) -->

          <!-- 사용기한 (s) -->
          <div class="row">
            <label for="use-date" class="col-md-1 col-form-label tit-h4">사용기한</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="use-date" name="use-date" aria-label="select">
                    <option selected>전체</option>
                    <option value="1">무제한</option>
                    <option value="2">기간설정</option>
                  </select>
                </div>
                <div class="date-wrap col-md-8">
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" id="datepicker-01" name="datepicker-01" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                  <div class="col-md-6 ipt-wrap">
                    <input type="text" class="ipt-datepicker" id="datepicker-02" name="datepicker-02" placeholder="YYYY-MM-DD">
                    <button type="button" class="open"><span class="visually-hidden">달력 레이어 열기</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- 사용기한 (e) -->

          <!-- 상태 (s) -->
          <div class="row">
            <label for="status" class="col-md-1 col-form-label tit-h4">상태</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="status" name="status" aria-label="select">
                    <option selected>전체</option>
                    <option value="1">활성화</option>
                    <option value="2">비활성화</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- 상태 (e) -->

          <div class="btn-area">
            <button type="submit" class="btn btn-primary btn-lg">검색</button>
          </div>
      </form>
      <!-- form-list (e) -->

      <div class="content"> 
        <div class="total">
          <span>총 <em><?=$totalcount;?></em>건</span>
          <span class="point">활성화 <em><?=$count_act_1;?></em>건</span>
          <span>비활성화 <em><?=$count_act_2;?></em>건</span>
        </div>

        <ul class="list-group box-list">
          <?php
            if (isset($rsArr)) {
              foreach($rsArr as $item){
          ?>
          <li class="list-group-item">
            <a href="coupon_view.php" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
              <img src="<?= $item->coupon_image; ?>" alt="이미지">
            </a>
            <div class="info-area">
              <div class="edit-btn-group">
                <a href="coupon_edit.php?cid=<?= $item->cid; ?>" class="btn correc">
                  <span class="visually-hidden">수정</span>
                  <i class="fa-solid fa-pen-to-square fa-small"></i>
                </a>
                <a href="coupon_del.php?cid=<?= $item->cid;?>" class="btn del">
                  <span class="visually-hidden">삭제</span>
                  <i class="fa-solid fa-trash-can fa-small"></i>
                </a>
              </div>
              <div class="tit-group">
                <strong class="tit-h3"><?= $item->coupon_name; ?></strong>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="toggle1" <?php if($item->status == 1) echo 'checked'; ?> >
                  <label class="form-check-label visually-hidden" for="toggle1">활성화</label>
                </div>
              </div>
              <div class="txt-group">
                <p class="date">사용기한:
                  <?php 
                    if ($item->use_date_type == 2) {
                        echo $item->start_date . '~' . $item->end_date; 
                    } else if ($item->use_date_type == 1) {
                        echo '무제한';
                    }
                  ?>
                </p>
                <p class="money">최소사용금액 :  <?= $item->use_min_price; ?>원</p>
                <p class="discount">
                <?php
                if ($item->coupon_type == '1') {
                    echo $item->coupon_price . '원 할인';
                } elseif ($item->coupon_type == '2') {
                    echo $item->coupon_ratio . '% 할인';
                }
                ?>
                </p>
              </div>
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
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'coupon_list.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'coupon_list.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"coupon_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"coupon_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'coupon_list.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'coupon_list.php?pageNumber=' . $total_page; ?>">
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
  <script src="/ccccoding/admin/js/coupon.js"></script>
</body>
</html>