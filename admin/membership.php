<?php
  $title = '회원관리';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/dbcon.php';
  // include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/ccccoding/admin/inc/header.php';

  $sql = "SELECT * FROM members";
  $result = $mysqli->query($sql);

  while ($rs = $result->fetch_object()) {
    $rsArr[] = $rs;
  }

?>
      <!-- sub-page-tit-area (s) -->
      <div class="page-tit-area">
        <h2 class="tit-h2">회원관리</h2>
      </div>
      <!-- sub-page-tit-area (e) -->

      <div class="content">
        <form action="#">
          <!-- select + text +button (s) -->
          <div class="row">
            <label for="mb-select" class="col-md-1 col-form-label tit-h4 visually-hidden">회원관리 정보로 검색</label> <!-- label hidden으로 사용  -->
            <div class="col-md-12">
              <div class="input-group justify-content-between align-items-center">
                <div class="col-md-4 ipt-wrap">
                  <select class="form-select form-select-sm" id="mb-select" name="mb-select" aria-label="select">
                    <option value="1" selected>이름</option>
                    <option value="2">아이디</option>
                  </select>
                </div>
                <div class="col-md-7 ipt-wrap">
                  <input type="text" class="form-control" id="search" name="search" placeholder="검색어를 입력하세요">
                </div>
                <button type="button" class="btn btn-primary btn-sm">검색</button>
              </div>
            </div>
          </div>
          <!-- elect + text +button 1/3 (e) -->
        </form>

        <div class="total">
          <span>총 <em>8</em>건</span>
        </div>

        <!-- table(s) -->
        <table class="table table-bordered text-center">
          <!-- 각자 크기에 맞게 위드값 조정 합쳐서 100% -->
          <colgroup>
            <col style="width:auto" span="5">
            <col style="width:35%">
            <col style="width:auto">
          </colgroup>
          <thead>
            <tr>
              <th scope="col">
                <div>
                  <span class="visually-hidden">전체선택</span>
                  <input class="form-check-input" type="checkbox" id="all-check" name="check-group" value="" aria-label="checkbox">
                </div>
              </th>
              <th scope="col">가입일</th>
              <th scope="col">이름</th>
              <th scope="col">아이디</th>
              <th scope="col">나이</th>
              <th scope="col">메일 / SMS</th>
              <th scope="col">상태</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($rsArr)) {
              foreach ($rsArr as $item) {
            ?>
            <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="check-01" value="" name="check-group" aria-label="checkbox">
                </div>
              </td>
              <td><?=$item -> join_date ?></td>
              <td><?=$item -> username ?></td>
              <td><?=$item -> userid ?></td>
              <td><?=$item -> age ?></td>
              <td><?=$item -> email ?> / <?=$item -> phone ?></td>
              <td><?=$item -> status ?></td>
            </tr>
            <?php
              }
            }else {
                echo "<tr><td colspan='7'>데이터가 없습니다.</td></tr>";
            }
            ?>
            <!-- <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="check-02" value="" aria-label="checkbox">
                </div>
              </td>
              <td>YYYY-MM-DD</td>
              <td>우공주</td>
              <td>wgongju01</td>
              <td>21</td>
              <td>abc@abc.com / 010-1111-1111</td>
              <td>탈퇴</td>
            </tr>
            <tr>
              <td>
                <div>
                  <input class="form-check-input" type="checkbox" id="check-03" value="" aria-label="checkbox">
                </div>
              </td>
              <td>YYYY-MM-DD</td>
              <td>유공주</td>
              <td>ugongju01</td>
              <td>22</td>
              <td>abc@abc.com / 010-1111-1111</td>
              <td>휴먼</td>
            </tr> -->
          </tbody>
        </table>
        <!-- table(e) -->

        <div class="btn-area">
          <button type="button" class="btn btn-secondary btn-sm">삭제</button>
        </div>
      </div>

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
</body>
</html>