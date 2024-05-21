<?php
  session_start();
  $title = '강의관리';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/category_func.php';

  $cates1 = $_GET['cate1'] ?? '';
  $cate2 = $_GET['cate2'] ?? '';
  $cate3 = $_GET['cate3'] ?? '';
  $isgold = $_GET['isgold'] ?? '';
  $issilver = $_GET['issilver'] ?? '';
  $iscopper = $_GET['iscopper'] ?? '';
  $search_keyword = $_GET['search_keyword'] ?? '';
  $cates = $cates1.$cate2.$cate3;

  $search_where = "";

  if($cates){
    $search_where .= " and cate LIKE '%{$cates}%'";
  }
  if($isgold){
    $search_where .= " and isgold = 1";
  }
  if($issilver){
    $search_where .= " and issilver = 1";
  }
  if($iscopper){
    $search_where .= " and iscopper = 1";
  }
  
  if($search_keyword){
    $search_where .= " and (name LIKE '%{$search_keyword}%' or content LIKE '%{$search_keyword}%')";
  }

//총개수 조회
  $sql = "SELECT COUNT(*) AS cnt FROM products WHERE 1=1";
  $sql .= $search_where;
  $result = $mysqli->query($sql);
  $count = $result->fetch_object();

  $totalcount = $count->cnt; //총검색건수
  $targetTable = 'coupons';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

  $sql = "SELECT * FROM products where 1=1";
  $sql .= $search_where;
  $order = " order by pid desc";
  $sql .= $order;
  $limit = " LIMIT $startLimit, $endLimit";
  $sql .= $limit;
  // echo $sql;
  $result = $mysqli->query($sql);

  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
  
  //$totalcount = count($rsArr);
  
  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  };
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">강의 관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">

        <!-- 강의검색 select-->
        <form action="" class="form-list lecture-search" id="search_form">
          <div class="row">
            <label for="slect-01" class="col-md-1 col-form-label tit-h4">강의검색</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate1" name="cate1"aria-label="대분류" required>
                    <option selected disabled>대분류</option>
                    <?php
                    foreach ($cate1 as $c1) {
                    ?>

                      <option value="<?= $c1->code; ?>"><?= $c1->name; ?></option>

                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate2" name="cate2" aria-label="중분류">
                  <option selected disabled>중분류</option>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate3" name="cate3" aria-label="소분류">
                  <option selected disabled>소분류</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
  
          <!-- 강의검색 -->
          <div class="row">
            <div class="col-md-11">
              <div class="input-group search">
                <h3 for="search" class="col-md-1 tit-h4">난이도</h3>
                <div class="col-md-3 ipt-wrap">
                  <!-- 난이도 -->
                  <div class="list-group list-group-horizontal lh-2">
                    <div class="list-group-item">
                      <div class="form-check list-mt">
                        <input class="form-check-input" type="checkbox" value="1" id="isgold" name="isgold">
                        <label class="form-check-label" for="isgold">
                          상
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check list-mt">
                        <input class="form-check-input" type="checkbox" value="1" id="issilver" name="issilver">
                        <label class="form-check-label" for="issilver">
                          중
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check list-mt">
                        <input class="form-check-input" type="checkbox" value="1" id="iscopper" name="iscopper">
                        <label class="form-check-label" for="iscopper">
                          하
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <label for="search" class="col-md-1 col-form-label tit-h4">타이틀</label> -->
                <div class="col-md-7 ipt-wrap d-flex align-items-center gap-3">
                  <input class="form-control" type="text" name="search_keyword" id="search_keyword" placeholder="검색어를 입력하세요..." aria-label="search_keyword">
                  <button class="btn btn-primary btn-sm">검색</button>
                  <!-- <div class="input-group-append">
                    <i class="fas fa-search lh-2"></i>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </form>
        <hr>  
          <div>
            검색결과: <?= $totalcount;?>
          </div>
        <hr>
        <!-- 강의리스트 -->
          <form action="clist_save.php" method="POST" class="lecture_list_wrap">
            <ul class="list-group box-list aic gap-5">
            <?php
              if (isset($rsArr)) {  
                foreach ($rsArr as $item) {
            ?>
              <li class="lecture_list_item box-shadow">
                <a href="lecture_detail.php?pid=<?= $item->pid; ?>"><img src="<?=$item->thumbnail;?>" alt="이미지"></a>
                <div class="info-area">
                  <P class="lecture_chaption"><strong class="tit-h5"><?=$item->name;?></strong><i class="fa-solid fa-circle-user fa-xsmall txt-m tender-color">3.5만</i><i class="fa-solid fa-heart fa-xsmall txt-m tender-color">4.35</i></P>
                  <P class="lecture_text"><?=$item->content;?></P>
                  <P class="tender-color">수강기간 <?=$item->sale_start_date;?> ~ <?=$item->sale_end_date;?></P>
                </div>
                <div class="etc-group">
                  <p class="search-result txt-s"><span><?= $c1->name; ?></span><i class="fa-solid fa-angle-right fa-xsmall"></i><span>디자인</span></p>
                  <select class="form-select form-select-sm" id="select-01" aria-label="select">
                    <option selected value="1">판매중</option>
                    <option value="2">판매 예정</option>
                    <option value="-1">판매 중지</option>
                  </select>
                  <div class="edit-btn-group d-flex align-items-center">
                    <span class="tit-h4"><?= $item->price;?>원</span>
                    <a href="lecture_edit.php?pid=<?= $item->pid;?>" class="btn correc">
                      <span class="visually-hidden">수정</span>
                      <i class="fa-solid fa-pen-to-square fa-small"></i>
                    </a>
                    <a href="lecture_del.php?pid=<?= $item->pid; ?>" type="button" class="btn lec-del del_check">
                      <span class="visually-hidden">삭제</span>
                      <i class="fa-solid fa-trash-can fa-small"></i>
                    </a>
                  </div>
                </div>
              </li>
            <?php
            }}
            ?>
            </ul>
            <div class="btn-area">
              <a href="/ccccoding/admin/lecture_up.php" class="btn btn-primary btn-lg">강의등록</a>
              <a href="lecture_clear_ok.php" class="btn btn-secondary btn-lg">일괄삭제</a>
          </div>
          </form>
      </div>

        <!-- pagination(s) -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'lecture_list.php?pageNumber=1'; ?>" tabindex="-1">
                <span class="visually-hidden">처음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == 1 ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == 1 ? '#' : 'lecture_list.php?pageNumber=' . ($pageNumber - 1); ?>" tabindex="-1">
                <span class="visually-hidden">이전</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
              </a>
            </li>
            <?php
            for($i = $block_start; $i <= $block_end; $i++) {
              if($i == $pageNumber) {
                echo "<li class=\"page-item active\"><a href=\"lecture_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              } else {
                echo "<li class=\"page-item\"><a href=\"lecture_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            ?>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'lecture_list.php?pageNumber=' . ($pageNumber + 1); ?>">
                <span class="visually-hidden">다음</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            </li>
            <li class="page-item <?php echo $pageNumber == $total_page ? 'disabled' : ''; ?>">
              <a class="page-link" href="<?php echo $pageNumber == $total_page ? '#' : 'lecture_list.php?pageNumber=' . $total_page; ?>">
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
  <script src="/ccccoding/admin/js/makeoption.js"></script>
</body>
</html>