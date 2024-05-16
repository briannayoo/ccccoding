<?php
  $title = 'ccccoding';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

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
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/pagination.php';

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
  
  //$count = count($rsArr);
  
  $sql = "SELECT * FROM category where step = 1";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_object()) {
    $cate1[] = $row;
  };
?>

  <!-- 우예지 (s) -->
  <main class="sub">
    <div class="section">
      <div class="container">
      <nav class="sub-menu">
        <ul class="list-group">
        <?php
          foreach ($cate1 as $c1) {
        ?>
          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$c1->code?>" aria-expanded="false" aria-controls="collapseOne" id="cate1">
                    <i class="fa-solid <?=$c1->icon?> fa-middle"></i>
                    <span><?= $c1->name; ?></span>
                  </button>
                </h2>
                <div id="collapse<?=$c1->code?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                    <li class="list-group-item on">
                      
                      <a href="lecture.php?pid=<?= $c1->code; ?>">전체</a> /
                    </li>
                    <?php
                      $c2sql ="SELECT * FROM category where step = 2 and pcode = '{$c1->code}'";
                      $c2result = $mysqli -> query($c2sql);

                      if ($c2result->num_rows > 0) {
                        $cate2 = [];
                        while ($row2 = $c2result->fetch_object()) {
                            $cate2[] = $row2;
                        }
                        foreach($cate2 as $c2){
                          ?>
                        <li class="list-group-item">
                          <a href="lecture.php?pid=<?= $c2->code; ?>"><?=$c2->name?></a> /
                        </li>
                          <?php 
                        }
                    ?>
                    <?php
                      }
                    ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php
          }
        ?>
        </ul>
      </nav>
        <div class="con-wrap">
          <div class="page-tit-area">
            <h2 class="tit-h1">전체 강의</h2>
          </div>

          <form action=""class="filter-area lecture-search" id="search_form">
            <div class="difficulty">
              <strong class="tit-h5">난이도</strong>
              <div class="list-group list-group-horizontal">
                <div class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="isgold" name="isgold">
                    <label class="form-check-label" for="difficulty_01" >
                      상
                    </label>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="issilver" name="issilver">
                    <label class="form-check-label" for="difficulty_02">
                      중
                    </label>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="iscopper" name="iscopper">
                    <label class="form-check-label" for="difficulty_03">
                      하
                    </label>
                  </div>
                </div>
              </div>
            </div>
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

          <!-- 우예지 -->
          <div class="lecture-area">
            <ul>
            <?php
              if (isset($rsArr)) {  
                foreach ($rsArr as $item) {
              ?>
              <li><a href="lecture_detail.php?pid=<?= $item->pid; ?>">
                <img src="<?=$item->thumbnail;?>" alt="">
                <h3 class="tit-h4"><?=$item->name;?></h3>
                <p><?=$item->content;?></p>
              </a></li>
            <?php
              }}
            ?>
            </ul>
          </div>
          <!-- pagination(s) -->
          <nav aria-label="페이지네이션">
            <ul class="pagination">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="visually-hidden">처음</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  </svg>
                </a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="visually-hidden">이전</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                  </svg>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active"> <!--active일떄 블라인드 현재페이지 스크립트로 넣어야함-->
                <a class="page-link" href="#">2</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <span class="visually-hidden">다음</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                  </svg>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">
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
  <!-- <script src="/ccccoding/admin/js/makeoption.js"></script> -->
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
