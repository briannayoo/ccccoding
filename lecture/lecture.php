<?php
  $title = 'ccccoding';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  // $sql = "SELECT * FROM products  WHERE ismain = 1 AND status = 1 ORDER BY pid DESC LIMIT 0, 15";
  // $result = $mysqli -> query($sql);

  // while($row = $result->fetch_object()){
  //   $rsc[] = $row;
  // }

  //메인상품 카테고리명, 코드 출력
  // $sql = "SELECT c.name, c.code
  // FROM products p
  // JOIN category c ON p.cate LIKE CONCAT('%', c.code, '%')
  // WHERE p.ismain = 1 AND p.status = 1
  // GROUP BY c.name, c.code";

  // $result = $mysqli -> query($sql);
  // while($rs = $result->fetch_object()){
  //   $resultArr[] = $rs;
  // }
  //print_r($resultArr);

?>

  <!-- 우예지 (s) -->
  <main class="sub">
    <div class="section">
      <div class="container">
      <nav class="sub-menu">
        <ul class="list-group">
          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa-solid fa-laptop-code fa-middle"></i>
                    <span>웹개발</span>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                      <li class="list-group-item on">
                        <a href="#">전체</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">프론트 엔드</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">백엔드</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">풀스텍</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa-solid fa-chart-column fa-middle"></i>
                    <span>데이터 사이언스</span>
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                      <li class="list-group-item on">
                        <a href="#">전체</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">데이터 분석</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">인공지능</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                    <i class="fa-solid fa-desktop fa-middle"></i>
                    <span>컴퓨터 사이언스</span>
                  </button>
                </h2>
                <div id="collapseTree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                      <li class="list-group-item on">
                        <a href="#">전체</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">프로그래밍 기초</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">알고리즘,자료구조</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">객체지향프로그래밍</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                    <i class="fa-solid fa-atom fa-middle"></i>
                    <span>프로그래밍 언어</span>
                  </button>
                </h2>
                <div id="collapseFor" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                      <li class="list-group-item on">
                        <a href="#">전체</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">파이썬</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">자바스크립트</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                    <i class="fa-solid fa-palette fa-middle"></i>
                    <span>디자인</span>
                  </button>
                </h2>
                <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                      <li class="list-group-item on">
                        <a href="#">전체</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">디자인 기초</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">피그마</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">기타</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          
        </ul>
      </nav>
        <div class="con-wrap">
          <div class="page-tit-area">
            <h2 class="tit-h1">전체 강의</h2>
          </div>

          <form action="" class="filter-area">
            <div class="difficulty">
              <strong class="tit-h5">난이도</strong>
              <div class="list-group list-group-horizontal">
                <div class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="difficulty_01" name="difficulty_01">
                    <label class="form-check-label" for="difficulty_01">
                      상
                    </label>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="difficulty_02" name="difficulty_02">
                    <label class="form-check-label" for="difficulty_02">
                      중
                    </label>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="difficulty_03" name="difficulty_03">
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
              // if(isset($rsc)){
              //   foreach($rsc as $item){
              //   $codeArr = str_split($item->cate,5);
              //   $code = '';
              //   foreach($codeArr as $c){
              //       $code .= $c.' ';
              //   }
                //$code = substr($item->cate, -5);
              ?>
              <li><a href="#">
                <img src="./image/img_lecture.png" alt="">
                <h3 class="tit-h4">따라하며 배우는 리액트 A-Z</h3>
                <p>이 강의를 통해 리액트 기초부터 중급까지 배우게 됩니다. 하나의 강의로 개념도 익히고 실습도 하며, 리액트를 위해 필요한 대부분의 지식을 한번에 습득할 수 있도록 만들었습니다.</p>
              </a></li>
            <?php
              //   }
              // } else {
              //   echo "<p>조회 상품이 없습니다.</p>";
              // }
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

<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>
