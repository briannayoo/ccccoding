<?php
  $title = '공지사항';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  //idx번호글 조회
  $bno = $_GET['idx'];
  $sql = "SELECT * FROM notice where idx = {$bno}";
  $result = $mysqli->query($sql);
  $resultArr = mysqli_fetch_assoc($result);

    //조회수 업데이트
    $hit = $resultArr['hit'] + 1;
    $sqlUpdate = "UPDATE notice SET hit={$hit} WHERE idx = {$bno}";
    $mysqli->query($sqlUpdate);
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
                    <h2 class="tit-h1">공지사항</h2>
                </div>

                <!-- notice_view start 아래에서 부터 작업영역입니다 -->
                <div class="notice-view">
                    <div class="border-bottom notice-list">
                        <h2 class="tit-h2 list-h2"><?= $resultArr['title'];?></h2>
                        <hr>
                        <div class="d-flex list-text notice-profil">
                            <p>작성자 : <?= $resultArr['name'];?></p>
                            <p><i class="fa-solid fa-eye fa-small"></i> : <?= $resultArr['hit'];?></p>
                            <p><?= $resultArr['date'];?></p>
                        </div>
                        <div class="d-flex notice-content">
                            <div class="notice-text"><?= nl3br($resultArr['content']);?></div>
                            <div>
                                <div class="border notice-fix">
                                    <p>ㅋㅋㅋ코딩 공지사항</p>
                                    <ul>
                                        <li>ㅋㅋㅋ코딩 개인정보 처리방침 개정 안내</li>
                                        <li>ㅋㅋㅋ코딩 군교육 서비스 종료 안내</li>
                                        <li> 학습 질문 Ai 답변 서비스 시범 운영 안내</li>
                                        <li>강의명 변경 안내</li>
                                        <li>학습질문 서비스 이용 안내 (이용기간 / 경로 / 방법 등)</li>
                                        <li>설 연휴 스파르타코딩클럽 서비스 운영 관련 안내</li>
                                        <li>교재 증정 이벤트 마감 안내</li>
                                        <li>버닝이벤트 당첨자 안내</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-area d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm">버튼</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm">버튼</button>
                    </div>
                </div>
            </div>
        </div>
</main>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>