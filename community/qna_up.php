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
                <form action="qna_up_ok.php" method="POST">
                    <input type="hidden" name="content" id="contents">
                    <div class="input-group">
                        <div class="col-md-12 ipt-wrap qna-up-title">
                            <input type="text" class="qna-control" id="fm-txt03" name="title" placeholder="질문에 핵심내용을 요약해보세요.">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="col-md-12 ipt-wrap qna-up-title">
                            <input type="text" class="qna-control" id="fm-txt03" name="name" placeholder="작성자 이름을 입력해주세요.">
                        </div>
                    </div>
                    <div class="border qna-up-text">
                        <div id="summernote" name="content" class="w-100"></div>
                    </div>
                    <div class="row mix">
                    <label for="name" class="col-md-1 col-form-label tit-h4">비밀번호</label>
                    <div class="col-md-11">
                        <div class="input-group">
                        <div class="ipt-wrap">
                            <input type="password" class="form-control" id="pw" name="pw" placeholder="비밀번호를 입력해주세요.">
                        </div>
                        <p class="txt-info">*비밀글을 원하시면 비밀번호를 입력해주세요.</p>
                        </div>
                    </div>
                    </div>
                    <div class="btn-area d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm">등록</button>
                        <button type="reset" class="btn btn-outline-secondary btn-sm">취소</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="/ccccoding/js/qna_up.js"></script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
  ?>