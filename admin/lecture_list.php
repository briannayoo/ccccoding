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
  $isrecom = $_GET['isrecom'] ?? '';
  $sale_start_date = $_GET['sale_start_date'] ?? '';
  $sale_end_date = $_GET['sale_end_date'] ?? '';
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

  if($isrecom){
    $search_where .= " and isrecom = 1";
  }
  if($sale_start_date){
    $search_where .= " and sale_start_date >=  CAST('{$sale_start_date}' AS datetime)";
  }
  if($sale_end_date){
    $search_where .= " and sale_end_date >=  CAST('{$sale_end_date}' AS datetime)";
  }
  if($search_keyword){
    $search_where .= " and (name LIKE '%{$search_keyword}%' or content LIKE '%{$search_keyword}%')";
  }

  $paginationTarget = 'products';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/pagination.php';

  $sql = "SELECT * FROM products where 1=1";
  $sql .= $search_where;
  $order = " order by pid desc";
  $sql .= $order;
  $limit = " LIMIT $startLimit, $endLimit";
  $sql .= $limit;

  $result = $mysqli->query($sql);

  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }
  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  };
  $sql = "SELECT * FROM category where step = 2";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate2[] = $row;
  };
  $sql = "SELECT * FROM category where step = 3";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate3[] = $row;
  };
?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">강의 관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">

        <!-- 강의검색 select-->
        <form action="#" class="form-list lecture-search">
          <div class="row">
            <label for="slect-01" class="col-md-1 col-form-label tit-h4">강의검색</label>
            <div class="col-md-11">
              <div class="input-group">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate1" name="cate1"aria-label="대분류" required>
                    <option>대분류</option>
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
                  <option>중분류</option>
                  <?php
                      foreach ($cate2 as $c2) {
                    ?>
                      <option value="<?= $c2->code; ?>"><?= $c2->name; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate3" name="cate3" aria-label="소분류">
                  <option>소분류</option>
                  <?php
                      foreach ($cate3 as $c3) {
                    ?>
                      <option value="<?= $c3->code; ?>"><?= $c3->name; ?></option>
                    <?php
                      }
                    ?>
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
                        <input class="form-check-input" type="checkbox" value="" id="chk-list-04">
                        <label class="form-check-label" for="chk-list-04">
                          상
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check list-mt">
                        <input class="form-check-input" type="checkbox" value="1" id="chk-list-04">
                        <label class="form-check-label" for="chk-list-04"  value="1">
                          중
                        </label>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="form-check list-mt">
                        <input class="form-check-input" type="checkbox" value="" id="chk-list-04" value="1">
                        <label class="form-check-label" for="chk-list-04">
                          하
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <label for="search" class="col-md-1 col-form-label tit-h4">타이틀</label> -->
                <div class="col-md-7 ipt-wrap">
                  <input class="form-control" type="search" id="search" placeholder="검색어를 입력하세요..." aria-label="Search">
                  <div class="input-group-append">
                    <i class="fas fa-search lh-2"></i>
                  </div>
                </div>
  
              </div>
            </div>
          </div>
        </form>
        <hr>  
          <div>
            검색결과: <?= $count;  ?>
          </div>
        <hr>
        <!-- 강의리스트 -->
          <form action="clist_save.php" method="POST" class="lecture_list_wrap">
            <ul class="list-group box-list aic">
            <?php
              if (isset($rsArr)) {  
                foreach ($rsArr as $item) {
            ?>
              <li class="lecture_list_item box-shadow">
                <img src="image/img_lecture_01.jpg" alt="이미지">
                <div class="info-area">
                  <P class="lecture_chaption"><strong class="tit-h5"><?=$item->name;?></strong><i class="fa-solid fa-circle-user fa-xsmall txt-m tender-color">3.5만</i><i class="fa-solid fa-heart fa-xsmall txt-m tender-color">4.35</i></P>
                  <P class="lecture_text"><?=$item->content;?></P>
                  <P class="tender-color">수강기간 <?=$item->sale_start_date;?> ~ <?=$item->sale_end_date;?></P>
                </div>
                <div class="etc-group">
                  <p class="search-result"><span><?= $c1->name; ?></span><i class="fa-solid fa-angle-right fa-small"></i><span><?= $c2->name; ?></span></p>
                  <select class="form-select form-select-sm" id="select-01" aria-label="select">
                    <option selected value="1">판매중</option>
                    <option value="2">판매 예정</option>
                    <option value="-1">판매 중지</option>
                  </select>
                  <div class="edit-btn-group">
                    <a href="lecture_edit.php?pid=<?= $item->pid; ?>" class="btn correc">
                      <span class="visually-hidden">수정</span>
                      <i class="fa-solid fa-pen-to-square fa-small"></i>
                    </a>
                    <button type="button" class="btn del">
                      <span class="visually-hidden">삭제</span>
                      <i class="fa-solid fa-trash-can fa-small"></i>
                    </button>
                  </div>
                </div>
              </li>
            <?php
            }}
            ?>
            </ul>
            <div class="btn-area">
              <a href="/ccccoding/admin/lecture_up.php" class="btn btn-primary btn-lg">강의등록</a>
              <button class="btn btn-secondary btn-lg">일괄수정</button>
          </div>
          </form>
      </div>

        <!-- 페이지 네이션 -->
        <nav aria-label="페이지네이션">
          <ul class="pagination">
            <?php
              if($pageNumber > 1){
                echo "<li class=\"page-item\"><a href=\"product_list.php?pageNumber=1\" class=\"page-link\" >처음</a></li>";
                //이전
                if($block_num > 1){
                  $prev = 1 + ($block_num - 2) * $block_ct;
                  echo "<li class=\"page-item\"><a href=\"product_list.php?pageNumber=$prev\" class=\"page-link\">이전</a></li>";
                }
              }

                for($i=$block_start;$i<=$block_end;$i++){
                  if($i == $pageNumber){
                    echo "<li class=\"page-item active\"><a href=\"product_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
                  }else{
                    echo "<li class=\"page-item\"><a href=\"product_list.php?pageNumber=$i\" class=\"page-link\">$i</a></li>";
                  }            
                }  

                if($pageNumber < $total_page){
                  if($total_block > $block_num){
                    $next = $block_num * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"product_list.php?pageNumber=$next\" class=\"page-item\">다음</a></li>";
                  }
                  echo "<li class=\"page-item\"><a href=\"product_list.php?pageNumber=$total_page\" class=\"page-link\">마지막</a></li>";
                }        
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <script src="/pinkping/admin/js/makeoption.js"></script>
</body>
</html>