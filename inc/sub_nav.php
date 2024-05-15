<!-- 공통 부분 작업담당자:박소현 (s) -->
<main class="sub">
    <div class="container">
      <nav class="sub-menu">
        <ul class="list-group">
          <?php
            if ($title == '웹개발' || $title == '데이터 사이언스' || $title == '컴퓨터 사이언스' || $title == '프로그래밍 언어' || $title == '디자인') {
          ?>
          <!-- 아코디언 하위메뉴 있을 때 case(s) -->
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
          <!-- 아코디언 하위메뉴 있을 때 case(e) -->

          <!-- 바로링크이동 case(s) -->
          <li class="list-group-item">
            
            <a href="#" class="accordion-button">
              <i class="fa-solid fa-chart-column fa-middle"></i>
              <span>데이터 사이언스</span>
            </a>
          </li>
          <!-- 바로링크이동 case(e) -->
        
          <li class="list-group-item">
            <a href="#" class="accordion-button">
              <i class="fa-solid fa-desktop fa-middle"></i>
              <span>컴퓨터 사이언스</span>
            </a>
          </li>

          <li class="list-group-item">
            <a href="#" class="accordion-button">
              <i class="fa-solid fa-atom fa-middle"></i>
              <span>프로그래밍 언어</span>
            </a>
          </li>

          <li class="list-group-item">
            
            <a href="#" class="accordion-button">
              <i class="fa-solid fa-palette fa-middle"></i>
              <span>디자인</span>
            </a>
          </li>
          <?php
            } elseif ($title == '이벤트' || $title == '공지사항' || $title == 'Q&amp;A') {
          ?>

          <li class="list-group-item acco">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa-solid fa-comment-dots fa-middle"></i>
                    <span>커뮤니티</span>
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group depth-2">
                      <li class="list-group-item on">
                        <a href="#">전체</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">공지사항</a>
                      </li>
                      <li class="list-group-item">
                        <a href="#">Q&amp;A</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <a href="#" class="accordion-button">
              <i class="fa-solid fa-gift fa-middle"></i>
              <span>이벤트</span>
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
      </nav>