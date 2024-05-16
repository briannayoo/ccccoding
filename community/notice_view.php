<?php
  $title = '공지사항';
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
                    <h2 class="tit-h1">공지사항</h2>
                </div>

                <!-- notice_view start 아래에서 부터 작업영역입니다 -->
                <div class="">
                    <!--temp-area 지우고 본인 작업 영역하면됨!-->

                    <div class="border-bottom notice-list">
                        <h2 class="tit-h2 list-h2">ㅋㅋㅋ코딩 개인정보 처리방침 개정 안내</h2>
                        <hr>
                        <div class="d-flex list-text notice-profil">
                            <p>작성자 : 관리자</p>
                            <p><i class="fa-solid fa-eye fa-small"></i> : 26</p>
                            <p>2024-03-01</p>
                        </div>
                        <div class="d-flex notice-content">
                            <div class="notice-text">
                                안녕하세요.
                                ㅋㅋㅋ코딩을 비롯한 팀스파르타의 서비스를 이용해주시는 여러분들께 진심으로 감사드립니다.
                                ㅋㅋㅋ코딩의 개인정보 처리방침 개정 관련 공지드립니다.

                                개인정보 처리방침 변경 안내

                                기업교육 서비스가 추가됨에 따라, ㅋㅋㅋ코딩의 개인정보 처리방침이 아래와 같이 일부 변경되어 2024년 03월 30일 부로 시행됩니다.

                                [변경내용]
                                1 개정 내용
                                a. 제1조(수집하는 개인정보 항목 및 수집방법) 중 '기업교육 서비스 이용 시' 내용 추가
                                b. 제3조(개인정보 보유 및 이용기간) 중 '기업교육 서비스' 관련 내용 추가
                                c. 제4조(이용자의 권리 및 의무) 중 '기업교육 서비스' 관련 내용 추가

                                2 개정 사유: 기업교육 서비스 제공에 따른 개인정보 수집 및 활용 안내를 위함

                                3 시행 일자: 2024년 03월 30일
                                * 시행일까지 회원이 별도의 동의 또는 거부의 의사표시를 하지 않을 경우, 승낙한 것으로 간주됩니다.

                                4 개인정보 처리방침 확인하기
                                관련하여 궁금하신 사항은 홈페이지 우측 하단 [문의하기]를 이용해주세요.
                                언제나 ㅋㅋㅋ코딩 서비스를 사랑해주시고 이용해주셔서 진심으로 감사합니다.
                            </div>
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