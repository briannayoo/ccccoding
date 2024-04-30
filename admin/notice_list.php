<?php
session_start();

  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';

?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">공지사항</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content"> <!--temp-area 빼야됨-->
        <form action="notice_search.php" class="form-list mb-4">
          <div class="row">
            <label for="search" class="col-md-1 col-form-label tit-h4">검색</label>
            <div class="col-md-11">
              <div class="input-group search">
                <div class="col-md-6 ipt-wrap">
                  <input class="form-control" type="search" id="search" name="keyword" placeholder="검색어를 입력하세요..." aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

          <!-- table(s) -->
          <table class="table table-bordered text-center notice-table">
            <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
            <colgroup>
              <col style="width:10%">
              <col style="width:30%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:10%">
            </colgroup>
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">제목</th>
                <th scope="col">작성자</th>
                <th scope="col">작성일</th>
                <th scope="col">조회수</th>
                <th scope="col">관리</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $sql = "SELECT * FROM notice order by idx desc";
                  $result = $mysqli -> query($sql);
                  while($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    if(iconv_strlen($title) > 10){
                    $title = str_replace($title,iconv_substr($title,0,10,'utf-8').'...', $title);
                    }
                ?>
            <tr>
              <td><?= $row['idx'] ?></td>
              <td><a href="notice_view.php?idx=<?= $row['idx']?>"><?= $title; ?></a></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['date'] ?></td>
              <td><?= $row['hit'] ?></td>
              <td>
                <a href="notice_modify.php?idx=<?= $row->idx; ?>">
                  <i class="fa-solid fa-pen-to-square fa-small">수정</i>
                </a>
                <a href="notice_delete.php">
                  <i class="fa-solid fa-trash-can fa-small">삭제</i>
                </a>
              </td>
            </tr> 

              <?php
                }
              ?>

            </tbody>
          </table>
          <div class="mt-3 d-flex justify-content-end">
          <a href="notice_up.php" class="btn btn-primary btn-lg">글쓰기</a>
          </div>
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
      </div>
        </div>
  </div>
  <?php
    $mysqli->close();
  ?>
</body>
</html>