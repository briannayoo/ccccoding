<?php
  $title = '질문하기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

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
            <h2 class="tit-h1">질문하기</h2>
          </div>
          
          <!-- 제목쓰기 -->
          <div class="input-group">
              <div class="col-md-12 ipt-wrap qna-up-title">
                <input type="text" class="form-control" id="fm-txt03" placeholder="질문에 핵심내용을 요약해보세요">
              </div>
          </div>
          <div class="border qna-up-text">
            <div id="summernote" name="desc" class="w-100" ></div>
          </div>
          <div class="btn-area d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm">등록</button>
            <button type="button" class="btn btn-outline-secondary btn-sm">취소</button>
          </div>
          
        </div>
      </div>
    </div>
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="/ccccoding/js/qna_up.js"></script>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
  ?>