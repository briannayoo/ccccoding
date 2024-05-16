<?php
  $title = '질문하기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';
// qid번호글 조회
  $qno = $_GET['qid'];
  $sql = "SELECT * FROM qna where qid = {$qno}";
  $result = $mysqli->query($sql);
  $resultArr = mysqli_fetch_assoc($result);
  
  //조회수 업데이트
  $hit = $resultArr['hit'] + 1;
  $sqlUpdate = "UPDATE qna SET hit={$hit} WHERE qid = {$qno}";
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
            <h2 class="tit-h1">Q&amp;A</h2>
          </div>

          <!-- question-view -->
          <div class="d-flex justify-content-between">
            <div class="d-flex">
              <div class="qna-icon">
                <h2 class="tit-h1 question-icon">Q</h2>
              </div>
              <p class="tit-h3 question-title"><?= $resultArr['title'];?></p>
            </div>
            <button type="button" class="btn btn-primary btn-sm">답변완료</button>
          </div>
          <hr>
          <div class="d-flex list-text question-data">
            <p>작성자 : <?= $resultArr['name'];?></p>
            <p><i class="fa-solid fa-eye fa-small"></i> : <?= $resultArr['hit'];?></p>
            <p><i class="fa-solid fa-heart fa-small"></i> : <?= $resultArr['thumbsup'];?></p>
            <p><?= $resultArr['date'];?></p>
          </div>
          <div class="border rounded-2">
            <div class="question-text">
              <p class=""><?= nl2br($resultArr['content']);?></p>
              <button><i class="fa-solid fa-heart fa-small"></i> : <?= $resultArr['thumbsup'];?></button>
            </div>
          </div>
          <hr>
          <!-- comment view -->
          <div class="border rounded-2">
            <div class="question-text">
              <div class="d-flex justify-content-between">
                <div class="d-flex">
                  <div class="qna-icon2">
                    <h2 class="tit-h1 comment-icon">A</h2>
                  </div>
                  <p class="tit-h3 question-title">답변이 등록되었어요</p>
                </div>  
              </div>
              <div class="d-flex list-text question-data">
                <p>작성자 : 유공주</p>
                <p>2024-04-01</p>
              </div>
              <p class="">ajax 방식으로 fetch 통해 page값을 넘겨
                Domparser 사용해서 html을 새로 그린다는건 알겠는데 get방법을 사용한 이유가 있나요?
                왜 li태그 안에내용만 쿼리내용이 업데이트되어 그려질수 있는지 모르겠는데 조금 더 자세한 설명 없나요?
                page값이 변경된 새로운 쿼리를 실행시켜 실행된 값들을 저장하는 코드가 어느부분인걸가요?
              </p>
            </div>
          </div>
          <div class="btn-area d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm">이전</button>
            <button type="button" class="btn btn-outline-secondary btn-sm">다음</button>
          </div>


          



        </div>
      </div>
    </div>
  </main>
  
  <?php
  $title = '질문하기';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>