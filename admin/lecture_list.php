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
  if($isbest){
    $search_where .= " and isbest = 1";
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

                  </select>
                </div>
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="cate3" name="cate3" aria-label="소분류">

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

        <!-- 강의리스트 -->
          <form action="clist_save.php" method="POST" class="lecture_list_wrap">
            <ul class="list-group box-list aic">
              <li class="lecture_list_item box-shadow">
                <img src="image/img_lecture_01.jpg" alt="이미지">
                <div class="info-area">
                  <P class="lecture_chaption"><strong class="tit-h5">생활코딩</strong><i class="fa-solid fa-circle-user fa-xsmall txt-m tender-color">3.5만</i><i class="fa-solid fa-heart fa-xsmall txt-m tender-color">4.35</i></P>
                  <P class="lecture_text"> Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. </P>
                  <P class="tender-color">수강기간 2024.05.15 ~ 2024.10.15</P>
                </div>
                <div class="etc-group">
                  <p class="search-result"><span>프론트엔드</span><i class="fa-solid fa-angle-right fa-small"></i><span>HTML</span></p>
                  <select class="form-select form-select-sm" id="select-01" aria-label="select">
                    <option selected value="1">판매중</option>
                    <option value="2">판매 예정</option>
                    <option value="-1">판매 중지</option>
                  </select>
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

            </ul>
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