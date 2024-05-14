<?php
  $title = '이벤트';
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
        <!-- 질문하기 start -->
        <div class="con-wrap">
          <div class="page-tit-area">
            <h2 class="tit-h1">이벤트</h2>
          </div>
          <div class="d-flex justify-content-end event-top-btn">
            <button>진행중 이벤트</button>
            <button>종료된 이벤트</button>
          </div>

          <hr>
          
          <div>
            <h2>동주T 프론트엔드 강의 오픈기념</h2>
            <p>YYYY-MM-DD - YYYY-MM-DD</p>
          </div>
          <div>
            <a href="#" class=""> <!--이미지 클릭해도 수정페이지이동-->
                <img src="image/event_view1.png" alt="이미지">
              </a>
          </div>
          <button type="button" class="btn btn-outline-secondary btn-sm pm-line d-flex justify-content-center">목록가기</button>



        </div>
      </div>
    </div>
  </main>

<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>