<?php
  $title = '공지사항';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/header.php';

  //idx번호글 조회
  $bno = $_GET['idx'];
  $sql = "SELECT * FROM notice where idx = {$bno}";
//   echo $sql;
  $result = $mysqli->query($sql);
  $resultArr = mysqli_fetch_assoc($result);

  

   // 조회수 업데이트
    $hit = $resultArr['hit'] + 1;
    $sqlUpdate = "UPDATE notice SET hit={$hit} WHERE idx = {$bno}";
    $mysqli->query($sqlUpdate);

    // 이전 공지사항 ID 가져오기
$sql_prev = "SELECT MAX(idx) AS prev_id FROM notice WHERE idx < $bno";
$result_prev = $mysqli->query($sql_prev);
$row_prev = $result_prev->fetch_assoc();
$prev_id = $row_prev['prev_id'];

// 다음 공지사항 ID 가져오기
$sql_next = "SELECT MIN(idx) AS next_id FROM notice WHERE idx > $bno";
$result_next = $mysqli->query($sql_next);
$row_next = $result_next->fetch_assoc();
$next_id = $row_next['next_id'];
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
                            <div class="notice-text"><?= nl2br($resultArr['content']);?></div>
                            <div>
                                <div class="border notice-fix">
                                    <p class="notice-sec txt-md">ㅋㅋㅋ코딩 공지사항</p>
                                    <ul>
                                    <?php
                                    $sql = "SELECT * FROM notice";
                                    $result = $mysqli -> query($sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <li><a href="/ccccoding/community/notice_view.php?idx=<?= $row['idx'] ?>"><?= $row['title']?></a></li>
                                    <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-area d-flex justify-content-end">

                    <?php if ($prev_id !== null) : ?>
                    <a href="notice_view.php?idx=<?= $prev_id; ?>" class="btn btn-primary btn-sm">이전</a>
                <?php else : ?>
                    <a href="#" class="btn btn-primary btn-sm disabled">이전</a>
                <?php endif; ?>

                <?php if ($next_id !== null) : ?>
                    <a href="notice_view.php?idx=<?= $next_id; ?>" class="btn btn-outline-secondary btn-sm">다음</a>
                <?php else : ?>
                    <a href="#" class="btn btn-outline-secondary btn-sm disabled">다음</a>
                <?php endif; ?>


                        <!-- <button type="button" class="btn btn-primary btn-sm">이전</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm">다음</button> -->
                    </div>
                </div>
            </div>
        </div>
</main>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/inc/footer.php';
?>