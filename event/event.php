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
        <?php
        $sql = "SELECT * FROM event";
        $result = $mysqli -> query($sql);
        while($rs = $result->fetch_object()){
          $esArr[] = $rs;
        }
        ?>
        <div class="con-wrap">
          <div class="page-tit-area">
            <h2 class="tit-h1">이벤트</h2>
          </div>
          <div class="d-flex justify-content-end event-top-btn">
            <button>진행중 이벤트</button>
            <button>종료된 이벤트</button>
          </div>

          <hr>
          <ul class="list-group box-list">
        <?php
        if(isset($esArr)){
          foreach($esArr as $item){
        ?>
          <li class="list-group-item">
            <a href="event_detail.php?eid=<?= $item->eid; ?>" class="img-wrap"> <!--이미지 클릭해도 수정페이지이동-->
              <img src="<?= $item->e_img; ?>" alt="이미지">
            </a>
            <div class="info-area">
              <p class="event-title"></p>
              <p class="date">진행기한:
              <?php 
                    if ($item->event_time == 2) {
                        echo $item->start_date . '~' . $item->end_date; 
                    } else if ($item->event_time == 1) {
                        echo '종료됨';
                    }
                  ?>
              </p>
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