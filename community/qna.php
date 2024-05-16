<?php
  $title = '질문하기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
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
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group depth-2">
                                            <li class="list-group-item">
                                                <a href="/ccccoding/community/notice.php">공지사항</a>
                                            </li>
                                            <li class="list-group-item">
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
              ?>
            <div class="">
              <div class="border-bottom qna-list">
                <h2 class="txt-xl list-h2"><a href=""></a><?= $row['title']?></h2>
                <p class="txt-md qna-text"><?= $row['content']?></p>
                <div class="d-flex justify-content-between">
                  <div class="d-flex list-text">
                    <p>답변 : <span class="qna-span"><?= $row['status']?></span></p>
                    <p><i class="fa-solid fa-eye fa-small"></i> : <?= $row['hit']?></p>
                    <p><i class="fa-solid fa-heart fa-small"></i> : <?= $row['thumbsup']?></p>
                  </div>
                  <div class="d-flex list-text">
                    <p>작성자 : <?= $row['name']?></p>
                    <p><?= $row['date']?></p>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <a href="/ccccoding/community/qna_up.php" class="btn btn-primary btn-sm ">질문하기</a>
              </div>
            <?php
            }
          ?>
          
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
    </div>
  </main>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>